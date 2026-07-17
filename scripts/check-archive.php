<?php

declare(strict_types=1);

$root = dirname(__DIR__);
$temporary = sys_get_temp_dir() . '/unifyport-sdk-archive-' . bin2hex(random_bytes(8));
if (!mkdir($temporary, 0700, true) && !is_dir($temporary)) {
    throw new RuntimeException('无法创建 archive 检查目录');
}

$command = [
    'composer',
    'archive',
    '--format=tar',
    '--dir=' . $temporary,
    '--file=unifyport-sdk-php-check',
    '--no-interaction',
];
$descriptor = [
    0 => ['pipe', 'r'],
    1 => ['pipe', 'w'],
    2 => ['pipe', 'w'],
];
$environment = getenv();
$environment['COMPOSER_CACHE_DIR'] = $temporary . '/composer-cache';
$process = proc_open($command, $descriptor, $pipes, $root, $environment);
if (!is_resource($process)) {
    cleanup($temporary);
    throw new RuntimeException('无法启动 composer archive');
}
fclose($pipes[0]);
$stdout = stream_get_contents($pipes[1]);
$stderr = stream_get_contents($pipes[2]);
fclose($pipes[1]);
fclose($pipes[2]);
$exitCode = proc_close($process);
if ($exitCode !== 0) {
    cleanup($temporary);
    fwrite(STDERR, (string) $stdout . (string) $stderr);
    exit($exitCode);
}

$archivePath = $temporary . '/unifyport-sdk-php-check.tar';
if (!is_file($archivePath)) {
    cleanup($temporary);
    throw new RuntimeException('composer archive 未生成预期文件');
}

$forbiddenPaths = [
    '.idea/',
    '.phpunit.cache/',
    '.vscode/',
    'build/',
    'coverage/',
    'vendor/',
];
$forbiddenContent = [
    '#/' . 'Users/[A-Za-z0-9._-]+/#',
    '#/' . 'home/[A-Za-z0-9._-]+/#',
    '#BEGIN ' . '(?:RSA |EC |OPENSSH )?PRIVATE KEY#',
    '/\bdk_(?:live|prod)(?:_[A-Za-z0-9_-]{16,}|[A-Za-z0-9_-]{24,})\b/i',
    '/\bUNIFYPORT_DEVICE_API_KEY\s*=\s*(?!replace-|example|changeme|<|\$\{)[^\s#]+/i',
    '/(?:gh[pousr]_[A-Za-z0-9]{20,}|AKIA[0-9A-Z]{16}|npm_[A-Za-z0-9]{20,}|'
        . 'glpat-[A-Za-z0-9_-]{20,}|xox(?:a|b|p|r|s)-[A-Za-z0-9-]{20,})/',
    '/eyJ[A-Za-z0-9_-]{8,}\.[A-Za-z0-9_-]{8,}\.[A-Za-z0-9_-]{8,}/',
    '/(?:API_KEY|PASSWORD|SECRET|TOKEN)\s*=\s*["\']'
        . '(?!<(?:api-key|password|secret|token)>)[A-Za-z0-9_.\/+=:-]{16,}["\']/',
    '#[A-Za-z]:\\\\' . 'Users\\\\#',
    '#https?://(?:10\.[0-9.]+|192\.168\.[0-9.]+|172\.(?:1[6-9]|2[0-9]|3[01])\.[0-9.]+|'
        . '[A-Za-z0-9.-]+\.(?:corp|internal|lan|local))(?:[:/]|$)#i',
];
$files = 0;
$violations = [];
$archive = new PharData($archivePath);
$iterator = new RecursiveIteratorIterator($archive);
foreach ($iterator as $file) {
    if (!$file->isFile()) {
        continue;
    }
    ++$files;
    $uri = $file->getPathname();
    $separator = '.tar/';
    $offset = strpos($uri, $separator);
    $relative = $offset === false ? $uri : substr($uri, $offset + strlen($separator));
    if ($relative === '.env' || (str_starts_with($relative, '.env.') && $relative !== '.env.example')) {
        $violations[] = $relative;
    }
    foreach ($forbiddenPaths as $forbidden) {
        if ($relative === rtrim($forbidden, '/') || str_starts_with($relative, $forbidden)) {
            $violations[] = $relative;
        }
    }
    $content = $file->getContent();
    foreach ($forbiddenContent as $pattern) {
        if (preg_match($pattern, $content) === 1) {
            $violations[] = $relative . ' contains forbidden local or secret material';
        }
    }
}

cleanup($temporary);
if ($violations !== []) {
    fwrite(STDERR, "Archive safety check failed:\n");
    foreach (array_values(array_unique($violations)) as $violation) {
        fwrite(STDERR, sprintf("- %s\n", $violation));
    }
    exit(1);
}

fwrite(STDERR, sprintf("[archive:check] inspected %d packaged files\n", $files));

function cleanup(string $directory): void
{
    // 仅清理本脚本创建的随机临时目录，避免 archive 验证在 CI 留下构建产物。
    if (!str_starts_with($directory, sys_get_temp_dir() . '/unifyport-sdk-archive-')) {
        throw new RuntimeException('拒绝清理非 archive 检查目录');
    }
    if (!is_dir($directory)) {
        return;
    }
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($directory, FilesystemIterator::SKIP_DOTS),
        RecursiveIteratorIterator::CHILD_FIRST,
    );
    foreach ($iterator as $item) {
        $item->isDir() ? rmdir($item->getPathname()) : unlink($item->getPathname());
    }
    rmdir($directory);
}
