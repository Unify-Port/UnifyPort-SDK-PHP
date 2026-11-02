<?php

declare(strict_types=1);

/**
 * @param array<string, mixed> $document
 * @return array<string, mixed>
 */
function typingDocument(array $document): array
{
    $resolve = static function (array $schema) use ($document): array {
        $ref = $schema['$ref'] ?? '';
        return str_starts_with($ref, '#/components/schemas/')
            ? $document['components']['schemas'][substr($ref, strlen('#/components/schemas/'))]
            : $schema;
    };
    $predicate = static function (array $schema) use (&$predicate): ?array {
        $fields = $schema['properties'] ?? [];
        if (count($fields) !== 1) {
            return null;
        }
        $name = array_key_first($fields);
        $field = $fields[$name];
        if (array_key_exists('const', $field)) {
            return [[$name], $field['const']];
        }
        $child = $predicate($field);
        return $child === null ? null : [[$name, ...$child[0]], $child[1]];
    };
    $visit = static function (mixed $value) use (&$visit, $resolve, $predicate): mixed {
        if (!is_array($value)) {
            return $value;
        }
        foreach ($value as &$child) {
            $child = $visit($child);
        }
        unset($child);
        foreach ($value['allOf'] ?? [] as $index => $clause) {
            if (!isset($clause['if'], $clause['then'])) {
                continue;
            }
            $condition = $predicate($clause['if']);
            if ($condition === null) {
                continue;
            }
            [$path, $literal] = $condition;
            $field = $value;
            foreach ($path as $key) {
                $field = $resolve($field);
                if (!in_array($key, $field['required'] ?? [], true)) {
                    continue 2;
                }
                $field = $field['properties'][$key] ?? [];
            }
            $field = $resolve($field);
            $domain = ($field['type'] ?? null) === 'boolean' ? [false, true] : ($field['enum'] ?? []);
            if (!in_array($literal, $domain, true) || count($domain) < 2) {
                continue;
            }
            $remaining = array_values(array_filter($domain, static fn ($item): bool => $item !== $literal));
            $branches = [];
            foreach ([[[$literal], $clause['then']], [$remaining, $clause['else'] ?? []]] as [$values, $rule]) {
                $guard = ['enum' => $values];
                foreach (array_reverse($path) as $key) {
                    $guard = ['type' => 'object', 'required' => [$key], 'properties' => [$key => $guard]];
                }
                foreach ($rule['required'] ?? [] as $key) {
                    if (!isset($rule['properties'][$key]) && isset($value['properties'][$key])) {
                        $rule['properties'][$key] = $value['properties'][$key];
                    }
                }
                $branches[] = ['allOf' => [$guard, $rule]];
            }
            // 有限必填判别字段等价展开，防止 PHPStan 忽略 if/then 后接受错误事件形状。
            $value['allOf'][$index] = ['oneOf' => $branches];
        }
        $negated = $value['not'] ?? [];
        if (array_keys($negated) === ['required'] && $negated['required'] !== []) {
            $branches = [];
            foreach ($negated['required'] as $key) {
                $branches[] = ['type' => 'object', 'properties' => [$key => false]];
            }
            $value['allOf'][] = ['anyOf' => $branches];
            unset($value['not']);
        } elseif (array_keys($negated) === ['anyOf']) {
            $fields = [];
            foreach ($negated['anyOf'] as $clause) {
                if (array_keys($clause) !== ['required'] || count($clause['required']) !== 1) {
                    return $value;
                }
                $fields[$clause['required'][0]] = false;
            }
            // 稀疏更新禁止出现的字段表达为 optional never，不误伤 false、0 或空字符串。
            $value['allOf'][] = ['type' => 'object', 'properties' => $fields];
            unset($value['not']);
        }
        foreach (['oneOf', 'anyOf'] as $kind) {
            foreach ($value[$kind] ?? [] as $index => $branch) {
                foreach ($branch['required'] ?? [] as $key) {
                    if (!isset($branch['properties'][$key]) && isset($value['properties'][$key])) {
                        $value[$kind][$index]['properties'][$key] = $value['properties'][$key];
                    }
                }
            }
        }
        return $value;
    };
    $result = $visit($document);
    $schemas = $result['components']['schemas'];
    foreach ($schemas as $name => $schema) {
        $result['components']['schemas'][$name] = structuralTypeSchema($schema, $schemas);
    }
    return $result;
}

/**
 * @param array<string, mixed> $schemas
 */
function structuralTypeSchema(mixed $value, array $schemas): mixed
{
    if (!is_array($value)) {
        return $value;
    }
    if (isset($value['allOf'])) {
        // PHPStan 不可靠地收窄深层 array intersection；先合并字段，再对状态联合生成完整 shape。
        $variants = typeSchemaVariants($value, $schemas);
        $normalized = array_map(static fn ($schema) => structuralTypeSchema($schema, $schemas), $variants);
        return count($normalized) === 1 ? $normalized[0] : ['anyOf' => $normalized];
    }
    // 无交集的联合保留命名引用，避免无意义展开放大 PHPStan 的分析开销。
    foreach (['oneOf', 'anyOf'] as $keyword) {
        foreach ($value[$keyword] ?? [] as $index => $branch) {
            $value[$keyword][$index] = structuralTypeSchema($branch, $schemas);
        }
    }
    foreach ($value['properties'] ?? [] as $name => $property) {
        $value['properties'][$name] = structuralTypeSchema($property, $schemas);
    }
    foreach (['items', 'additionalProperties'] as $key) {
        if (isset($value[$key])) {
            $value[$key] = structuralTypeSchema($value[$key], $schemas);
        }
    }
    return $value;
}

/**
 * @param array<string, mixed> $schema
 * @param array<string, mixed> $schemas
 * @return list<array<string, mixed>>
 */
function typeSchemaVariants(array $schema, array $schemas): array
{
    if (isset($schema['$ref'])) {
        return typeSchemaVariants($schemas[substr($schema['$ref'], strlen('#/components/schemas/'))], $schemas);
    }
    $common = $schema;
    unset($common['allOf'], $common['oneOf'], $common['anyOf']);
    $variants = [$common];
    $groups = [];
    foreach ($schema['allOf'] ?? [] as $clause) {
        $groups[] = typeSchemaVariants($clause, $schemas);
    }
    foreach (['oneOf', 'anyOf'] as $keyword) {
        if (isset($schema[$keyword])) {
            $choices = [];
            foreach ($schema[$keyword] as $clause) {
                array_push($choices, ...typeSchemaVariants($clause, $schemas));
            }
            $groups[] = $choices;
        }
    }
    foreach ($groups as $choices) {
        $next = [];
        foreach ($variants as $left) {
            foreach ($choices as $right) {
                $next[] = mergeTypeSchemas($left, $right);
            }
        }
        $variants = $next;
    }
    return $variants;
}

/**
 * @param array<string, mixed> $left
 * @param array<string, mixed> $right
 * @return array<string, mixed>
 */
function mergeTypeSchemas(array $left, array $right): array
{
    foreach ($right as $key => $value) {
        if ($key === 'properties') {
            foreach ($value as $name => $field) {
                if (array_key_exists($name, $left['properties'] ?? [])) {
                    $previous = $left['properties'][$name];
                    $left['properties'][$name] = $previous === false || $field === false
                        ? false : ['allOf' => [$previous, $field]];
                } else {
                    $left['properties'][$name] = $field;
                }
            }
        } elseif ($key === 'required') {
            $left[$key] = array_values(array_unique([...($left[$key] ?? []), ...$value]));
        } elseif ($key === 'enum' && isset($left[$key])) {
            $left[$key] = array_values(array_filter(
                $left[$key],
                static fn ($item): bool => in_array($item, $value, true),
            ));
            if ($left[$key] === []) {
                $left['x-sdk-never'] = true;
            }
        } else {
            $left[$key] = $value;
        }
    }
    return $left;
}
