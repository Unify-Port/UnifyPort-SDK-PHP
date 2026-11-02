<?php

declare(strict_types=1);

use Symfony\Component\Yaml\Yaml;

require dirname(__DIR__) . '/vendor/autoload.php';
require __DIR__ . '/schema-types.php';

const HTTP_METHODS = ['get', 'put', 'post', 'delete', 'options', 'head', 'patch', 'trace'];

$root = dirname(__DIR__);
$arguments = $_SERVER['argv'] ?? [];
$arguments = is_array($arguments) ? $arguments : [];
$checkOnly = in_array('--check', $arguments, true);
$contractPath = $root . '/contracts/device.openapi.yaml';
$policyPath = $root . '/parity/operation-policies.json';
$sourcePath = $root . '/parity/source.json';

// YAML 默认把裸 RFC3339 转为整数；保留协议字符串，避免生成示例把 occurred_at 变成 Unix 时间。
$document = yamlProtocolValues(Yaml::parseFile($contractPath, Yaml::PARSE_DATETIME));
$policies = json_decode((string) file_get_contents($policyPath), true, 64, JSON_THROW_ON_ERROR);
$source = json_decode((string) file_get_contents($sourcePath), true, 64, JSON_THROW_ON_ERROR);
if (!is_array($document) || !is_array($policies) || !is_array($source)) {
    throw new RuntimeException('contract、policy 与 source 必须解析为 object');
}

$contractSha = hash_file('sha256', $contractPath);
if ($contractSha === false) {
    throw new RuntimeException('无法计算 contract hash');
}
if (($source['contract']['sha256'] ?? null) !== $contractSha) {
    throw new RuntimeException('本地 contract hash 与 parity/source.json 不一致，请先审查并更新 Node baseline');
}

$operations = collectOperations($document, $policies);
$schemas = $document['components']['schemas'] ?? [];
if (!is_array($schemas)) {
    throw new RuntimeException('components.schemas 必须是 object');
}

$artifacts = [];
$artifacts['src/Generated/OperationCatalog.php'] = generateOperationCatalog($operations);
$artifacts['src/Generated/SchemaCatalog.php'] = generateSchemaCatalog($schemas);
$typing = typingDocument($document);
$artifacts['src/Generated/ApiTypes.php'] = generateApiTypes($typing['components']['schemas'], $operations);
$artifacts['tests/WebhookExamples.php'] = generateWebhookExamples($document);
$artifacts['src/Generated/UnifyPortDeviceClientMethods.php'] = generateClientTrait($operations);
foreach (groupByTag($operations) as $tag => $tagOperations) {
    $artifacts['src/Api/' . tagClass($tag) . '.php'] = generateResourceClass($tag, $tagOperations);
}
$artifacts['parity/manifest.json'] = generateManifest($source, $contractSha, $operations, $schemas);
$artifacts['docs/api-reference.md'] = generateApiReference($operations, false);
$artifacts['docs/zh-CN/api-reference.md'] = generateApiReference($operations, true);

$stale = [];
foreach ($artifacts as $relative => $content) {
    $absolute = $root . '/' . $relative;
    $actual = is_file($absolute) ? file_get_contents($absolute) : false;
    if ($actual !== $content) {
        $stale[] = $relative;
        if (!$checkOnly) {
            $directory = dirname($absolute);
            if (!is_dir($directory) && !mkdir($directory, 0777, true) && !is_dir($directory)) {
                throw new RuntimeException('无法创建生成目录');
            }
            file_put_contents($absolute, $content);
            fwrite(STDERR, sprintf("[generate] %s\n", $relative));
        }
    }
}

foreach (['src/Generated', 'src/Api'] as $generatedDirectory) {
    $absoluteDirectory = $root . '/' . $generatedDirectory;
    if (!is_dir($absoluteDirectory)) {
        continue;
    }
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($absoluteDirectory));
    foreach ($iterator as $file) {
        if (!$file->isFile() || $file->getExtension() !== 'php') {
            continue;
        }
        $relative = substr($file->getPathname(), strlen($root) + 1);
        if (!array_key_exists($relative, $artifacts)) {
            $stale[] = $relative;
        }
    }
}

if ($checkOnly && $stale !== []) {
    fwrite(STDERR, "生成文件缺失或已漂移，请运行 composer generate:\n");
    foreach (array_unique($stale) as $path) {
        fwrite(STDERR, sprintf("- %s\n", $path));
    }
    exit(1);
}
if ($checkOnly) {
    fwrite(STDERR, "[generate:check] generated artifacts are current\n");
}

/**
 * @param array<string, mixed> $document
 * @param array<string, mixed> $policies
 * @return list<array<string, mixed>>
 */
function collectOperations(array $document, array $policies): array
{
    $operations = [];
    $ids = [];
    $paths = $document['paths'] ?? [];
    if (!is_array($paths)) {
        throw new RuntimeException('paths 必须是 object');
    }

    foreach ($paths as $path => $pathItem) {
        if (!is_string($path) || !is_array($pathItem)) {
            throw new RuntimeException('path item 必须是 object');
        }
        foreach (HTTP_METHODS as $method) {
            $operation = $pathItem[$method] ?? null;
            if (!is_array($operation)) {
                continue;
            }
            $operationId = $operation['operationId'] ?? null;
            if (!is_string($operationId) || $operationId === '' || isset($ids[$operationId])) {
                throw new RuntimeException('operationId 必须存在且唯一');
            }
            $ids[$operationId] = true;
            $parameters = array_merge(
                is_array($pathItem['parameters'] ?? null) ? $pathItem['parameters'] : [],
                is_array($operation['parameters'] ?? null) ? $operation['parameters'] : [],
            );
            $pathParameters = [];
            $queryParameters = [];
            foreach ($parameters as $parameter) {
                if (!is_array($parameter)) {
                    continue;
                }
                $parameter = resolveLocalRef($document, $parameter);
                if (!is_string($parameter['name'] ?? null)) {
                    continue;
                }
                $normalized = [
                    'name' => $parameter['name'],
                    'required' => ($parameter['required'] ?? false) === true,
                    'schema' => is_array($parameter['schema'] ?? null) ? $parameter['schema'] : [],
                ];
                if (($parameter['in'] ?? null) === 'path') {
                    $pathParameters[] = $normalized;
                } elseif (($parameter['in'] ?? null) === 'query') {
                    $queryParameters[] = $normalized;
                }
            }

            $requestBody = $operation['requestBody'] ?? null;
            if (is_array($requestBody)) {
                $requestBody = resolveLocalRef($document, $requestBody);
            }
            $requestBodySchema = is_array($requestBody)
                ? jsonContentSchema($requestBody['content'] ?? null)
                : null;
            $responses = is_array($operation['responses'] ?? null) ? $operation['responses'] : [];
            $hasSuccessContent = false;
            $successResponseSchemas = [];
            foreach ($responses as $status => $response) {
                if (!preg_match('/^2[0-9][0-9]$/', (string) $status) || !is_array($response)) {
                    continue;
                }
                $response = resolveLocalRef($document, $response);
                $content = $response['content'] ?? null;
                if (is_array($content) && $content !== []) {
                    $hasSuccessContent = true;
                    $successResponseSchemas[] = jsonContentSchema($content);
                } else {
                    $successResponseSchemas[] = null;
                }
            }

            $readOnly = in_array($method, ['get', 'head', 'options'], true);
            $defaultMutability = $readOnly ? 'read' : ($method === 'delete' ? 'destructive' : 'write');
            $mutability = $policies['mutabilityOverrides'][$operationId] ?? $defaultMutability;
            $retryable = in_array($operationId, $policies['retryAllowlist'] ?? [], true);
            $secretInput = in_array($operationId, $policies['secretInput'] ?? [], true);
            $secretOutput = in_array($operationId, $policies['secretOutput'] ?? [], true);
            $mcpExposure = $policies['mcpExposure'][$operationId] ?? 'never';

            $operations[] = [
                'operationId' => $operationId,
                'method' => strtoupper($method),
                'path' => $path,
                'tag' => is_string($operation['tags'][0] ?? null) ? $operation['tags'][0] : 'Other',
                'summary' => is_string($operation['summary'] ?? null) ? $operation['summary'] : $operationId,
                'authRequired' => (($operation['security'] ?? $document['security'] ?? []) !== []),
                'mutability' => $mutability,
                'retryable' => $retryable,
                'secretInput' => $secretInput,
                'secretOutput' => $secretOutput,
                'mcpExposure' => $mcpExposure,
                'pathParameters' => $pathParameters,
                'queryParameters' => $queryParameters,
                'requestBodyRequired' => is_array($requestBody) && ($requestBody['required'] ?? false) === true,
                'hasSuccessContent' => $hasSuccessContent,
                'requestBodySchema' => $requestBodySchema,
                'successResponseSchemas' => $successResponseSchemas,
            ];
        }
    }

    validatePolicies($ids, $policies);
    usort($operations, static fn (array $left, array $right): int => $left['operationId'] <=> $right['operationId']);

    return $operations;
}

/**
 * @param mixed $content
 * @return array<string, mixed>
 */
function jsonContentSchema(mixed $content): array
{
    if (!is_array($content) || $content === []) {
        return [];
    }

    // Device API 以 JSON 为公开传输格式；保留 fallback 以兼容带 vendor suffix 的 JSON media type。
    $media = $content['application/json'] ?? null;
    if (!is_array($media)) {
        foreach ($content as $mediaType => $candidate) {
            if (is_string($mediaType) && str_ends_with($mediaType, '+json') && is_array($candidate)) {
                $media = $candidate;
                break;
            }
        }
    }
    if (!is_array($media)) {
        $candidate = reset($content);
        $media = is_array($candidate) ? $candidate : [];
    }

    return is_array($media['schema'] ?? null) ? $media['schema'] : [];
}

/**
 * @param array<string, mixed> $document
 * @param array<string, mixed> $value
 * @return array<string, mixed>
 */
function resolveLocalRef(array $document, array $value): array
{
    $ref = $value['$ref'] ?? null;
    if (!is_string($ref)) {
        return $value;
    }
    if (!str_starts_with($ref, '#/')) {
        throw new RuntimeException('仅支持本地 OpenAPI ref');
    }
    $current = $document;
    foreach (explode('/', substr($ref, 2)) as $part) {
        $key = str_replace(['~1', '~0'], ['/', '~'], $part);
        if (!is_array($current) || !array_key_exists($key, $current)) {
            throw new RuntimeException(sprintf('无法解析 OpenAPI ref: %s', $ref));
        }
        $current = $current[$key];
    }
    if (!is_array($current)) {
        throw new RuntimeException(sprintf('OpenAPI ref 不是 object: %s', $ref));
    }

    return resolveLocalRef($document, $current);
}

/**
 * @param array<string, true> $ids
 * @param array<string, mixed> $policies
 */
function validatePolicies(array $ids, array $policies): void
{
    $keys = array_merge(
        $policies['retryAllowlist'] ?? [],
        array_keys($policies['mutabilityOverrides'] ?? []),
        $policies['secretInput'] ?? [],
        $policies['secretOutput'] ?? [],
        array_keys($policies['mcpExposure'] ?? []),
    );
    foreach ($keys as $key) {
        if (!is_string($key) || !isset($ids[$key])) {
            throw new RuntimeException(sprintf('operation policy 未匹配公开 operation: %s', (string) $key));
        }
    }
}

/** @param list<array<string, mixed>> $operations */
function generateOperationCatalog(array $operations): string
{
    $entries = [];
    foreach ($operations as $operation) {
        $entries[$operation['operationId']] = operationMetadataData($operation);
    }

    return generatedHeader('contracts/device.openapi.yaml 与 parity/operation-policies.json')
        . "namespace UnifyPort\\Sdk\\Generated;\n\n"
        . "use UnifyPort\\Sdk\\Exception\\UnifyPortConfigurationException;\n"
        . "use UnifyPort\\Sdk\\OperationMetadata;\n\n"
        . "final class OperationCatalog\n{\n"
        . "    /** @var array<string, array<string, mixed>> */\n"
        . '    private const OPERATIONS = ' . phpValue($entries, 1) . ";\n\n"
        . "    public static function get(string \$operationId): OperationMetadata\n    {\n"
        . "        \$operation = self::OPERATIONS[\$operationId] ?? null;\n"
        . "        if (\$operation === null) {\n"
        . "            throw new UnifyPortConfigurationException('Unknown Device API operation');\n"
        . "        }\n\n"
        . "        return OperationMetadata::fromArray(\$operation);\n"
        . "    }\n\n"
        . "    /** @return array<string, OperationMetadata> */\n"
        . "    public static function all(): array\n    {\n"
        . "        \$result = [];\n"
        . "        foreach (array_keys(self::OPERATIONS) as \$operationId) {\n"
        . "            \$result[\$operationId] = self::get(\$operationId);\n"
        . "        }\n\n"
        . "        return \$result;\n"
        . "    }\n"
        . "}\n";
}

/**
 * @param array<string, mixed> $operation
 * @return array<string, mixed>
 */
function operationMetadataData(array $operation): array
{
    // schema 只服务静态类型生成，不能扩张既有 runtime catalog 与 parity manifest 的公开结构。
    unset($operation['requestBodySchema'], $operation['successResponseSchemas']);
    foreach (['pathParameters', 'queryParameters'] as $parameterGroup) {
        $parameters = is_array($operation[$parameterGroup] ?? null) ? $operation[$parameterGroup] : [];
        $runtimeParameters = [];
        foreach ($parameters as $parameter) {
            if (!is_array($parameter) || !is_string($parameter['name'] ?? null)) {
                throw new RuntimeException('operation parameter 缺少 runtime metadata');
            }
            $runtimeParameters[] = [
                'name' => $parameter['name'],
                'required' => ($parameter['required'] ?? false) === true,
            ];
        }
        $operation[$parameterGroup] = $runtimeParameters;
    }

    return $operation;
}

/** @param array<string, mixed> $schemas */
function generateSchemaCatalog(array $schemas): string
{
    ksort($schemas);

    return generatedHeader('contracts/device.openapi.yaml')
        . "namespace UnifyPort\\Sdk\\Generated;\n\n"
        . "use UnifyPort\\Sdk\\Exception\\UnifyPortConfigurationException;\n\n"
        . "// 契约描述保持原文，生成常量不按软行长拆分字符串。\n"
        . "// phpcs:disable Generic.Files.LineLength.TooLong\n"
        . "final class SchemaCatalog\n{\n"
        . "    /** @var array<string, array<string, mixed>> */\n"
        . '    private const SCHEMAS = ' . phpValue($schemas, 1) . ";\n\n"
        . "    /** @return array<string, mixed> */\n"
        . "    public static function get(string \$name): array\n    {\n"
        . "        \$schema = self::SCHEMAS[\$name] ?? null;\n"
        . "        if (!is_array(\$schema)) {\n"
        . "            throw new UnifyPortConfigurationException('Unknown Device API schema');\n"
        . "        }\n\n"
        . "        return \$schema;\n"
        . "    }\n\n"
        . "    /** @return array<string, array<string, mixed>> */\n"
        . "    public static function all(): array\n    {\n"
        . "        return self::SCHEMAS;\n"
        . "    }\n"
        . "}\n";
}

/**
 * @param array<string, mixed> $schemas
 * @param list<array<string, mixed>> $operations
 */
function generateApiTypes(array $schemas, array $operations): string
{
    ksort($schemas);
    $aliases = [];
    foreach ($schemas as $name => $schema) {
        if (!is_array($schema)) {
            throw new RuntimeException('components.schemas 必须使用有效名称与 object schema');
        }
        foreach (['input', 'output'] as $direction) {
            addTypeAlias(
                $aliases,
                schemaAliasName($name, $direction),
                phpStanSchemaType($schema, $direction),
            );
        }
    }
    foreach ($operations as $operation) {
        addTypeAlias($aliases, operationRequestAlias($operation), operationRequestType($operation));
        addTypeAlias($aliases, operationResponseAlias($operation), operationResponseType($operation));
    }

    $typeLines = [];
    foreach ($aliases as $name => $type) {
        array_push($typeLines, ...formatTypeAlias($name, $type));
    }

    return generatedHeader('contracts/device.openapi.yaml')
        . "namespace UnifyPort\\Sdk\\Generated;\n\n"
        . "// PHPStan union alias 跨行会被 phpdoc-parser 误判，因此仅豁免生成类型块的软行长限制。\n"
        . "// phpcs:disable Generic.Files.LineLength.TooLong\n"
        . "/**\n"
        . " * OpenAPI 是唯一类型来源；标记类不创建运行时 DTO。\n"
        . implode("\n", $typeLines) . "\n"
        . " */\n"
        . "// phpcs:enable Generic.Files.LineLength.TooLong\n"
        . "final class ApiTypes\n{\n}\n";
}

/**
 * @return list<string>
 */
function formatTypeAlias(string $name, string $type): array
{
    $prefix = sprintf(' * @phpstan-type %s ', $name);
    $continuation = ' *     ';
    $lines = [];
    $line = $prefix;
    foreach (phpStanTypeSegments($type) as $segment) {
        $separator = $line === $prefix || str_ends_with($line, ' ') ? '' : ' ';
        if ($line !== $prefix && strlen($line . $separator . $segment) > 116) {
            $lines[] = rtrim($line);
            $line = $continuation . $segment;
            continue;
        }
        $line .= $separator . $segment;
    }
    $lines[] = rtrim($line);

    return $lines;
}

/** @return list<string> */
function phpStanTypeSegments(string $type): array
{
    $segments = [];
    $segment = '';
    $inLiteral = false;
    $escaped = false;
    $length = strlen($type);
    for ($index = 0; $index < $length; ++$index) {
        $character = $type[$index];
        $segment .= $character;
        if ($inLiteral) {
            if ($escaped) {
                $escaped = false;
            } elseif ($character === '\\') {
                $escaped = true;
            } elseif ($character === "'") {
                $inLiteral = false;
            }
            continue;
        }
        if ($character === "'") {
            $inLiteral = true;
            continue;
        }
        if (!in_array($character, ['{', ','], true)) {
            continue;
        }
        $segments[] = trim($segment);
        $segment = '';
        while (($type[$index + 1] ?? null) === ' ') {
            ++$index;
        }
    }
    if ($segment !== '') {
        $segments[] = trim($segment);
    }

    return $segments;
}

/**
 * @param array<string, string> $aliases
 */
function addTypeAlias(array &$aliases, string $name, string $type): void
{
    if (preg_match('/^[A-Za-z_][A-Za-z0-9_]*$/', $name) !== 1) {
        throw new RuntimeException(sprintf('无法生成 PHPStan type alias: %s', $name));
    }
    if (isset($aliases[$name])) {
        throw new RuntimeException(sprintf('PHPStan type alias 重复: %s', $name));
    }
    $aliases[$name] = $type;
}

/**
 * @param array<string, mixed> $schema
 * @param 'input'|'output' $direction
 */
function phpStanSchemaType(array $schema, string $direction): string
{
    $nullable = ($schema['nullable'] ?? false) === true;
    $type = phpStanSchemaTypeWithoutNullable($schema, $direction);
    if (!$nullable || $type === 'mixed') {
        return $type;
    }

    return phpStanUnion([$type, 'null']);
}

/**
 * @param array<string, mixed> $schema
 * @param 'input'|'output' $direction
 */
function phpStanSchemaTypeWithoutNullable(array $schema, string $direction): string
{
    if (($schema['x-sdk-never'] ?? false) === true) {
        return 'never';
    }
    // oneOf/anyOf/allOf 的共同字段同时生效，不能让候选分支覆盖账号或消息的必填字段。
    $parts = [];
    $shared = $schema;
    unset($shared['oneOf'], $shared['anyOf'], $shared['allOf']);
    $hasComposition = isset($schema['oneOf']) || isset($schema['anyOf']) || isset($schema['allOf']);
    if ($hasComposition) {
        if (isset($shared['type']) || isset($shared['properties']) || isset($shared['$ref'])) {
            $parts[] = phpStanSchemaTypeWithoutNullable($shared, $direction);
        }
        foreach (['oneOf', 'anyOf'] as $keyword) {
            $variants = $schema[$keyword] ?? [];
            if (is_array($variants) && $variants !== []) {
                $types = [];
                foreach ($variants as $variant) {
                    $types[] = is_array($variant) ? phpStanSchemaType($variant, $direction) : 'mixed';
                }
                $parts[] = phpStanUnion($types);
            }
        }
        foreach (is_array($schema['allOf'] ?? null) ? $schema['allOf'] : [] as $variant) {
            $parts[] = is_array($variant) ? phpStanSchemaType($variant, $direction) : 'mixed';
        }

        return phpStanIntersection($parts);
    }
    $ref = $schema['$ref'] ?? null;
    if (is_string($ref)) {
        return schemaAliasFromRef($ref, $direction);
    }

    if (array_key_exists('const', $schema)) {
        return phpStanLiteral($schema['const']);
    }

    $enum = $schema['enum'] ?? null;
    if (is_array($enum) && $enum !== []) {
        return phpStanUnion(array_values(array_map(
            static fn (mixed $value): string => phpStanLiteral($value),
            $enum,
        )));
    }

    $declaredType = $schema['type'] ?? null;
    if (is_array($declaredType)) {
        $types = [];
        foreach ($declaredType as $variant) {
            if (!is_string($variant)) {
                $types[] = 'mixed';
                continue;
            }
            $variantSchema = $schema;
            $variantSchema['type'] = $variant;
            $types[] = phpStanSchemaTypeWithoutNullable($variantSchema, $direction);
        }

        return phpStanUnion($types);
    }

    return match ($declaredType) {
        'array' => phpStanArrayType($schema, $direction),
        'boolean' => 'bool',
        'integer' => $direction === 'output' ? 'int|string' : 'int',
        'null' => 'null',
        'number' => $direction === 'output' ? 'float|int|string' : 'float|int',
        'object' => phpStanObjectType($schema, $direction),
        'string' => 'string',
        default => isset($schema['properties']) || array_key_exists('additionalProperties', $schema)
            ? phpStanObjectType($schema, $direction)
            : 'mixed',
    };
}

/**
 * @param array<string, mixed> $schema
 * @param 'input'|'output' $direction
 */
function phpStanArrayType(array $schema, string $direction): string
{
    $items = $schema['items'] ?? null;

    return sprintf('list<%s>', is_array($items) ? phpStanSchemaType($items, $direction) : 'mixed');
}

/**
 * @param array<string, mixed> $schema
 * @param 'input'|'output' $direction
 */
function phpStanObjectType(array $schema, string $direction): string
{
    $properties = is_array($schema['properties'] ?? null) ? $schema['properties'] : [];
    $required = is_array($schema['required'] ?? null) ? $schema['required'] : [];
    $requiredLookup = [];
    foreach ($required as $name) {
        if (is_string($name)) {
            $requiredLookup[$name] = true;
        }
    }

    if ($properties === []) {
        $additional = $schema['additionalProperties'] ?? true;
        if ($additional === false) {
            return 'array{}';
        }

        return sprintf(
            'array<string, %s>',
            is_array($additional) ? phpStanSchemaType($additional, $direction) : 'mixed',
        );
    }

    $entries = [];
    foreach ($properties as $name => $property) {
        if (!is_string($name)) {
            throw new RuntimeException('OpenAPI object property 名称必须是 string');
        }
        $entries[] = sprintf(
            '%s%s: %s',
            phpStanShapeKey($name),
            isset($requiredLookup[$name]) ? '' : '?',
            is_array($property) ? phpStanSchemaType($property, $direction) : ($property === false ? 'never' : 'mixed'),
        );
    }

    $additional = $schema['additionalProperties'] ?? true;
    if ($additional !== false) {
        $entries[] = sprintf(
            '...<string, %s>',
            is_array($additional) ? phpStanSchemaType($additional, $direction) : 'mixed',
        );
    }

    return 'array{' . implode(', ', $entries) . '}';
}

function phpStanShapeKey(string $name): string
{
    return preg_match('/^[A-Za-z_][A-Za-z0-9_]*$/', $name) === 1 ? $name : var_export($name, true);
}

function phpStanLiteral(mixed $value): string
{
    if (is_string($value) || is_int($value) || is_float($value) || is_bool($value) || $value === null) {
        return var_export($value, true);
    }

    return 'mixed';
}

/** @param 'input'|'output' $direction */
function schemaAliasFromRef(string $ref, string $direction): string
{
    $prefix = '#/components/schemas/';
    if (!str_starts_with($ref, $prefix)) {
        throw new RuntimeException(sprintf('PHPStan type 仅支持 component schema ref: %s', $ref));
    }
    $name = str_replace(['~1', '~0'], ['/', '~'], substr($ref, strlen($prefix)));
    if (preg_match('/^[A-Za-z_][A-Za-z0-9_]*$/', $name) !== 1) {
        throw new RuntimeException(sprintf('component schema 名称无法作为 PHPStan alias: %s', $name));
    }

    return schemaAliasName($name, $direction);
}

/** @param 'input'|'output' $direction */
function schemaAliasName(string $name, string $direction): string
{
    return $name . ucfirst($direction);
}

/** @param list<string> $types */
function phpStanUnion(array $types): string
{
    $types = array_values(array_unique($types));
    if (in_array('mixed', $types, true)) {
        return 'mixed';
    }
    if (count($types) === 1) {
        return $types[0];
    }

    return implode('|', array_map(
        static fn (string $type): string => str_contains($type, '&') ? '(' . $type . ')' : $type,
        $types,
    ));
}

/** @param list<string> $types */
function phpStanIntersection(array $types): string
{
    $types = array_values(array_unique(array_filter($types, static fn (string $type): bool => $type !== 'mixed')));
    if ($types === []) {
        return 'mixed';
    }

    return implode('&', array_map(
        static fn (string $type): string => str_contains($type, '|') ? '(' . $type . ')' : $type,
        $types,
    ));
}

/** @param array<string, mixed> $operation */
function operationRequestAlias(array $operation): string
{
    return ucfirst((string) $operation['operationId']) . 'OperationRequest';
}

/** @param array<string, mixed> $operation */
function operationResponseAlias(array $operation): string
{
    return ucfirst((string) $operation['operationId']) . 'OperationResponse';
}

/** @param array<string, mixed> $operation */
function operationRequestType(array $operation): string
{
    $pathParameters = is_array($operation['pathParameters'] ?? null)
        ? array_values($operation['pathParameters'])
        : [];
    $queryParameters = is_array($operation['queryParameters'] ?? null)
        ? array_values($operation['queryParameters'])
        : [];
    $params = [];
    $paramsRequired = hasRequiredParameter(array_merge($pathParameters, $queryParameters));

    if ($pathParameters !== []) {
        $required = hasRequiredParameter($pathParameters);
        $params[] = sprintf('path%s: %s', $required ? '' : '?', operationParameterType($pathParameters));
    }
    if ($queryParameters !== []) {
        $required = hasRequiredParameter($queryParameters);
        $params[] = sprintf('query%s: %s', $required ? '' : '?', operationParameterType($queryParameters));
    }
    $params[] = 'header?: array<string, string>';

    // 顶层 headers 对齐 Node FetchOptions；params.header 仅作为旧版 PHP 调用的兼容入口保留。
    $request = [
        sprintf('params%s: array{%s}', $paramsRequired ? '' : '?', implode(', ', $params)),
        'headers?: array<string, string>',
    ];
    $requestBodySchema = $operation['requestBodySchema'] ?? null;
    if (is_array($requestBodySchema)) {
        $request[] = sprintf(
            'body%s: %s',
            ($operation['requestBodyRequired'] ?? false) === true ? '' : '?',
            phpStanSchemaType($requestBodySchema, 'input'),
        );
    }

    return 'array{' . implode(', ', $request) . '}';
}

/**
 * @param array<mixed> $parameters
 */
function operationParameterType(array $parameters): string
{
    $entries = [];
    foreach ($parameters as $parameter) {
        if (!is_array($parameter) || !is_string($parameter['name'] ?? null)) {
            throw new RuntimeException('operation parameter 必须包含 string name');
        }
        $schema = is_array($parameter['schema'] ?? null) ? $parameter['schema'] : [];
        $entries[] = sprintf(
            '%s%s: %s',
            phpStanShapeKey($parameter['name']),
            ($parameter['required'] ?? false) === true ? '' : '?',
            phpStanSchemaType($schema, 'input'),
        );
    }

    return 'array{' . implode(', ', $entries) . '}';
}

/** @param array<mixed> $parameters */
function hasRequiredParameter(array $parameters): bool
{
    foreach ($parameters as $parameter) {
        if (is_array($parameter) && ($parameter['required'] ?? false) === true) {
            return true;
        }
    }

    return false;
}

/** @param array<string, mixed> $operation */
function operationResponseType(array $operation): string
{
    $schemas = is_array($operation['successResponseSchemas'] ?? null)
        ? $operation['successResponseSchemas']
        : [];
    $types = [];
    foreach ($schemas as $schema) {
        $types[] = is_array($schema) ? phpStanSchemaType($schema, 'output') : 'null';
    }

    return $types === [] ? 'mixed' : phpStanUnion($types);
}

/** @param list<array<string, mixed>> $operations */
function typeImportDocblock(array $operations): string
{
    $lines = [
        '/**',
        ' * operation 别名从同一 OpenAPI 生成，方法继续使用 array 与 OperationRequest 的运行时边界。',
    ];
    foreach ($operations as $operation) {
        $lines[] = sprintf(' * @phpstan-import-type %s from ApiTypes', operationRequestAlias($operation));
        $lines[] = sprintf(' * @phpstan-import-type %s from ApiTypes', operationResponseAlias($operation));
    }
    $lines[] = ' */';

    return implode("\n", $lines);
}

/** @param list<array<string, mixed>> $operations */
function generateClientTrait(array $operations): string
{
    $imports = [];
    foreach (array_keys(groupByTag($operations)) as $tag) {
        $imports[] = sprintf('use UnifyPort\\Sdk\\Api\\%s;', tagClass($tag));
    }
    sort($imports);
    $methods = [];
    foreach ($operations as $operation) {
        $methods[] = operationMethod($operation, false);
    }
    foreach (array_keys(groupByTag($operations)) as $tag) {
        $class = tagClass($tag);
        $accessor = tagAccessor($tag);
        $methods[] = "    public function {$accessor}(): {$class}\n"
            . "    {\n"
            . "        return new {$class}(\$this);\n"
            . "    }";
    }

    return generatedHeader('contracts/device.openapi.yaml')
        . "namespace UnifyPort\\Sdk\\Generated;\n\n"
        . implode("\n", $imports) . "\n"
        . "use UnifyPort\\Sdk\\ApiResult;\n"
        . "use UnifyPort\\Sdk\\OperationRequest;\n"
        . "use UnifyPort\\Sdk\\RequestExecutionOptions;\n\n"
        . typeImportDocblock($operations) . "\n"
        . "trait UnifyPortDeviceClientMethods\n{\n"
        . implode("\n\n", $methods) . "\n"
        . "}\n";
}

/**
 * @param string $tag
 * @param list<array<string, mixed>> $operations
 */
function generateResourceClass(string $tag, array $operations): string
{
    $class = tagClass($tag);
    $methods = array_map(static fn (array $operation): string => operationMethod($operation, true), $operations);

    return generatedHeader('contracts/device.openapi.yaml')
        . "namespace UnifyPort\\Sdk\\Api;\n\n"
        . "use UnifyPort\\Sdk\\ApiResult;\n"
        . "use UnifyPort\\Sdk\\Generated\\ApiTypes;\n"
        . "use UnifyPort\\Sdk\\OperationRequest;\n"
        . "use UnifyPort\\Sdk\\RequestExecutionOptions;\n"
        . "use UnifyPort\\Sdk\\UnifyPortDeviceClient;\n\n"
        . typeImportDocblock($operations) . "\n"
        . "final readonly class {$class}\n{\n"
        . "    public function __construct(private UnifyPortDeviceClient \$client)\n    {\n    }\n\n"
        . implode("\n\n", $methods) . "\n"
        . "}\n";
}

/** @param array<string, mixed> $operation */
function operationMethod(array $operation, bool $delegate): string
{
    $required = $operation['requestBodyRequired'] === true
        || array_filter(
            array_merge($operation['pathParameters'], $operation['queryParameters']),
            static fn (array $parameter): bool => $parameter['required'] === true,
        ) !== [];
    $default = $required ? '' : ' = []';
    $operationId = $operation['operationId'];
    $requestAlias = operationRequestAlias($operation);
    $responseAlias = operationResponseAlias($operation);
    $summary = str_replace('*/', '* /', $operation['summary']);
    $target = $delegate ? '$this->client->' . $operationId : '$this->executeOperation';
    $call = $delegate
        ? sprintf('%s($request, $execution)', $target)
        : sprintf("%s('%s', \$request, \$execution)", $target, $operationId);

    return "    /**\n"
        . "     * {$summary}\n"
        . "     *\n"
        . "     * @param {$requestAlias}|OperationRequest \$request\n"
        . "     * @return ApiResult<{$responseAlias}>\n"
        . "     */\n"
        . "    public function {$operationId}(\n"
        . "        array|OperationRequest \$request{$default},\n"
        . "        ?RequestExecutionOptions \$execution = null,\n"
        . "    ): ApiResult {\n"
        . "        return {$call};\n"
        . "    }";
}

/**
 * @param array<string, mixed> $source
 * @param list<array<string, mixed>> $operations
 * @param array<string, mixed> $schemas
 */
function generateManifest(array $source, string $contractSha, array $operations, array $schemas): string
{
    $manifestOperations = [];
    foreach ($operations as $operation) {
        $manifestOperations[$operation['operationId']] = operationMetadataData($operation);
    }

    return json_encode(
        [
            'schemaVersion' => 1,
            'nodeSdk' => $source['nodeSdk'],
            'contractSha256' => $contractSha,
            'operationCount' => count($operations),
            'schemaCount' => count($schemas),
            'operations' => $manifestOperations,
        ],
        JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR,
    ) . "\n";
}

/** @param list<array<string, mixed>> $operations */
function generateApiReference(array $operations, bool $chinese): string
{
    // 两种语言共用 operation 数据，避免公开能力清单各自维护后产生漂移。
    $lines = $chinese ? [
        '<!-- 此文件由 composer generate 生成；修改契约、policy 或 generator 后重新生成。 -->',
        '',
        '# Device API operation 参考',
        '',
        sprintf('PHP SDK 公开全部 %d 个 Device API operation。', count($operations)),
        '',
        '`UnifyPort\\Sdk\\Generated\\ApiTypes` 从同一 OpenAPI 生成 input/output component schema 别名，',
        '以及每个 operation 的 request/response 别名。方法 PHPDoc 会导入对应别名；',
        'response 别名描述 `ApiResult::$data` 中的完整成功响应 envelope（无响应体时为 `null`）。',
        '',
        '| 资源 | operationId | 方法 | 路径 | Request alias | Response alias | 必填输入 | 重试 | 敏感数据 |',
        '| --- | --- | --- | --- | --- | --- | --- | --- | --- |',
    ] : [
        '<!-- 此文件由 composer generate 生成；修改契约、policy 或 generator 后重新生成。 -->',
        '',
        '# Device API operation reference',
        '',
        sprintf('The PHP SDK exposes all %d public Device API operations.', count($operations)),
        '',
        '`UnifyPort\\Sdk\\Generated\\ApiTypes` generates input/output component schema aliases and per-operation',
        'request/response aliases from the same OpenAPI document. Method PHPDoc imports the matching aliases;',
        'a response alias describes the complete success envelope in `ApiResult::$data`',
        '(`null` for a response without content).',
        '',
        '| Resource | operationId | Method | Path | Request alias | Response alias | Required input | Retry | Secret |',
        '| --- | --- | --- | --- | --- | --- | --- | --- | --- |',
    ];
    foreach ($operations as $operation) {
        $required = $operation['requestBodyRequired'] === true
            || array_filter(
                array_merge($operation['pathParameters'], $operation['queryParameters']),
                static fn (array $parameter): bool => $parameter['required'] === true,
            ) !== [];
        $secret = match (true) {
            $operation['secretInput'] && $operation['secretOutput'] => $chinese ? '输入/输出' : 'input/output',
            $operation['secretInput'] => $chinese ? '输入' : 'input',
            $operation['secretOutput'] => $chinese ? '输出' : 'output',
            default => '-',
        };
        $lines[] = sprintf(
            '| %s | `%s` | %s | `%s` | `%s` | `%s` | %s | %s | %s |',
            $operation['tag'],
            $operation['operationId'],
            $operation['method'],
            $operation['path'],
            operationRequestAlias($operation),
            operationResponseAlias($operation),
            $required ? ($chinese ? '是' : 'yes') : ($chinese ? '否' : 'no'),
            $operation['retryable'] ? ($chinese ? '安全' : 'safe') : ($chinese ? '从不' : 'never'),
            $secret,
        );
    }

    return implode("\n", $lines) . "\n";
}

/**
 * @param list<array<string, mixed>> $operations
 * @return array<string, list<array<string, mixed>>>
 */
function groupByTag(array $operations): array
{
    $grouped = [];
    foreach ($operations as $operation) {
        $grouped[$operation['tag']][] = $operation;
    }

    return $grouped;
}

function tagClass(string $tag): string
{
    return pascalCase($tag) . 'Api';
}

function tagAccessor(string $tag): string
{
    return lcfirst(pascalCase($tag));
}

function pascalCase(string $value): string
{
    return str_replace(' ', '', ucwords(strtolower(preg_replace('/[^A-Za-z0-9]+/', ' ', $value) ?? $value)));
}

function generatedHeader(string $source): string
{
    return "<?php\n\n/**\n"
        . " * 此文件由 `composer generate` 根据 {$source} 生成。\n"
        . " * 生成边界用于保持 PHP SDK 与公开 Node SDK 同步；请修改来源，不要手工编辑。\n"
        . " */\n\ndeclare(strict_types=1);\n\n";
}

function phpValue(mixed $value, int $level = 0): string
{
    if (!is_array($value)) {
        return var_export($value, true);
    }
    if ($value === []) {
        return '[]';
    }

    $indent = str_repeat('    ', $level);
    $childIndent = str_repeat('    ', $level + 1);
    $list = array_is_list($value);
    $lines = [];
    foreach ($value as $key => $child) {
        $prefix = $list ? '' : var_export($key, true) . ' => ';
        $lines[] = $childIndent . $prefix . phpValue($child, $level + 1) . ',';
    }

    return "[\n" . implode("\n", $lines) . "\n{$indent}]";
}

/** @param array<string, mixed> $document */
function generateWebhookExamples(array $document): string
{
    $cases = [];
    $types = [];
    foreach ($document['webhooks'] as $name => $webhook) {
        $content = $webhook['post']['requestBody']['content']['application/json'];
        $type = schemaAliasFromRef($content['schema']['$ref'], 'output');
        $examples = $content['examples'] ?? [];
        if (isset($content['example'])) {
            $examples['example'] = ['value' => $content['example']];
        }
        foreach ($examples as $example) {
            if (array_key_exists('value', $example)) {
                $cases[] = [$type, $example['value']];
                $types[$type] = true;
            }
        }
    }
    $output = generatedHeader('contracts/device.openapi.yaml') . "namespace UnifyPort\\Sdk\\Tests;\n\n";
    $output .= "// 公开契约示例同时作为静态类型回归，避免 Webhook 嵌套字段在生成时丢失。\n";
    $output .= "/**\n";
    foreach (array_keys($types) as $type) {
        $output .= " * @phpstan-import-type " . $type . " from \\UnifyPort\\Sdk\\Generated\\ApiTypes\n";
    }
    $output .= " */\nfinal class WebhookExamples\n{\n";
    foreach ($cases as $index => [$type, $body]) {
        $output .= "    /** @return " . $type . " */\n";
        $output .= "    public static function example" . $index . "(): array\n    {\n";
        $output .= "        return " . phpValue($body, 2) . ";\n    }\n\n";
    }
    return rtrim($output) . "\n}\n";
}

function yamlProtocolValues(mixed $value): mixed
{
    if ($value instanceof DateTimeInterface) {
        // 保留亚秒精度，格式化不能把 .123Z 的发生时间截断到整秒。
        $fraction = rtrim($value->format('u'), '0');
        $text = $value->format('Y-m-d\TH:i:s');
        if ($fraction !== '') {
            $text .= '.' . $fraction;
        }
        return str_replace('+00:00', 'Z', $text . $value->format('P'));
    }
    if (is_array($value)) {
        return array_map('yamlProtocolValues', $value);
    }
    return $value;
}
