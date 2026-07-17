<?php

declare(strict_types=1);

$root = dirname(__DIR__);
$nodeRoot = $argv[1] ?? dirname($root) . '/unifyport-sdk-node';
$localManifestPath = $root . '/parity/manifest.json';
$nodeContractPath = $nodeRoot . '/contracts/device.openapi.yaml';
$nodeCatalogPath = $nodeRoot . '/packages/sdk/src/generated/device/operation-catalog.ts';

foreach ([$localManifestPath, $nodeContractPath, $nodeCatalogPath] as $required) {
    if (!is_file($required)) {
        fwrite(STDERR, sprintf("Required parity input is missing: %s\n", $required));
        exit(1);
    }
}

$manifest = json_decode((string) file_get_contents($localManifestPath), true, 64, JSON_THROW_ON_ERROR);
if (!is_array($manifest) || !is_array($manifest['operations'] ?? null)) {
    throw new RuntimeException('parity/manifest.json 格式无效');
}

$nodeContractSha = hash_file('sha256', $nodeContractPath);
if ($nodeContractSha === false) {
    throw new RuntimeException('无法计算 Node contract hash');
}
if ($nodeContractSha !== ($manifest['contractSha256'] ?? null)) {
    fwrite(STDERR, "Node contract 与 PHP baseline 不一致，请审查差异并运行同步流程。\n");
    exit(1);
}

$catalog = (string) file_get_contents($nodeCatalogPath);
$pattern = '/"operationId":\s*"([^"]+)".*?'
    . '"mutability":\s*"(read|write|destructive)".*?'
    . '"retryable":\s*(true|false).*?'
    . '"secretInput":\s*(true|false).*?'
    . '"secretOutput":\s*(true|false).*?'
    . '"mcpExposure":\s*"(read|write|destructive|never)"/s';
$count = preg_match_all($pattern, $catalog, $matches, PREG_SET_ORDER);
if ($count === false || $count !== count($manifest['operations'])) {
    fwrite(STDERR, "无法从 Node generated catalog 提取完整 policy。\n");
    exit(1);
}

$nodePolicies = [];
foreach ($matches as $match) {
    $nodePolicies[$match[1]] = [
        'mutability' => $match[2],
        'retryable' => $match[3] === 'true',
        'secretInput' => $match[4] === 'true',
        'secretOutput' => $match[5] === 'true',
        'mcpExposure' => $match[6],
    ];
}

$differences = [];
foreach ($manifest['operations'] as $operationId => $operation) {
    $node = $nodePolicies[$operationId] ?? null;
    if ($node === null) {
        $differences[] = sprintf('%s: missing from Node policy catalog', $operationId);
        continue;
    }
    foreach (['mutability', 'retryable', 'secretInput', 'secretOutput', 'mcpExposure'] as $field) {
        if (($operation[$field] ?? null) !== $node[$field]) {
            $differences[] = sprintf('%s.%s differs', $operationId, $field);
        }
    }
}

if ($differences !== []) {
    fwrite(STDERR, "Node/PHP operation policy drift detected:\n");
    foreach ($differences as $difference) {
        fwrite(STDERR, sprintf("- %s\n", $difference));
    }
    exit(1);
}

fwrite(
    STDERR,
    sprintf(
        "[parity:check] %d operations and contract %s match the Node SDK baseline\n",
        count($manifest['operations']),
        substr($nodeContractSha, 0, 12),
    ),
);
