<?php

declare(strict_types=1);

$root = dirname(__DIR__);
$excluded = ['.git', 'vendor', 'build', 'coverage', '.phpunit.cache'];
$extensions = ['php', 'json', 'md', 'yaml', 'yml', 'xml', 'dist', 'example'];
$forbiddenFiles = ['.env', 'id_rsa', 'id_ed25519'];
$patterns = [
    '/-----BEGIN (?:RSA |EC |OPENSSH )?PRIVATE KEY-----/',
    '/\bBearer\s+eyJ[A-Za-z0-9_-]+\./',
    '/\bsk_(?:live|prod)_[A-Za-z0-9]+/i',
    '/\bdk_(?:live|prod)(?:_[A-Za-z0-9_-]{16,}|[A-Za-z0-9_-]{24,})\b/i',
    '/\bUNIFYPORT_DEVICE_API_KEY\s*=\s*(?!replace-|example|changeme|<|\$\{)[^\s#]+/i',
    '/(?:gh[pousr]_[A-Za-z0-9]{20,}|AKIA[0-9A-Z]{16}|npm_[A-Za-z0-9]{20,}|'
        . 'glpat-[A-Za-z0-9_-]{20,}|xox(?:a|b|p|r|s)-[A-Za-z0-9-]{20,})/',
    '/eyJ[A-Za-z0-9_-]{8,}\.[A-Za-z0-9_-]{8,}\.[A-Za-z0-9_-]{8,}/',
    '/(?:API_KEY|PASSWORD|SECRET|TOKEN)\s*=\s*["\']'
        . '(?!<(?:api-key|password|secret|token)>)[A-Za-z0-9_.\/+=:-]{16,}["\']/',
    '#/(?:Users|home)/[^/\s]+/#',
    '#[A-Za-z]:\\\\Users\\\\#',
    '#https?://(?:10\.[0-9.]+|192\.168\.[0-9.]+|172\.(?:1[6-9]|2[0-9]|3[01])\.[0-9.]+|'
        . '[A-Za-z0-9.-]+\.(?:corp|internal|lan|local))(?:[:/]|$)#i',
    '/\b(?:var_dump|print_r)\s*\(/',
];

$iterator = new RecursiveIteratorIterator(
    new RecursiveCallbackFilterIterator(
        new RecursiveDirectoryIterator($root, FilesystemIterator::SKIP_DOTS),
        static function (SplFileInfo $file) use ($excluded): bool {
            return !$file->isDir() || !in_array($file->getFilename(), $excluded, true);
        },
    ),
);

$scanned = 0;
$violations = [];
foreach ($iterator as $file) {
    if (!$file->isFile()) {
        continue;
    }
    if ($file->getRealPath() === __FILE__) {
        // 扫描规则文本会命中自身；脚本本身通过 code review 与静态检查覆盖。
        continue;
    }
    $relative = substr($file->getPathname(), strlen($root) + 1);
    if (in_array($file->getFilename(), $forbiddenFiles, true)) {
        $violations[] = sprintf('%s: forbidden sensitive filename', $relative);
        continue;
    }
    if (!in_array($file->getExtension(), $extensions, true)) {
        continue;
    }
    ++$scanned;
    $contents = (string) file_get_contents($file->getPathname());
    foreach ($patterns as $pattern) {
        if (preg_match($pattern, $contents) === 1) {
            $violations[] = sprintf('%s: matched public safety pattern', $relative);
        }
    }
}

if ($violations !== []) {
    fwrite(STDERR, "Public repository safety check failed:\n");
    foreach ($violations as $violation) {
        fwrite(STDERR, sprintf("- %s\n", $violation));
    }
    exit(1);
}

fwrite(STDERR, sprintf("[public:check] scanned %d public project files\n", $scanned));
