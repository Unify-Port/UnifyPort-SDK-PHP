<?php

declare(strict_types=1);

$root = dirname(__DIR__);
$snippets = 0;
foreach (['README.md', 'README.zh-CN.md'] as $readme) {
    $markdown = (string) file_get_contents($root . '/' . $readme);
    preg_match_all('/```php\s*\n(.*?)```/s', $markdown, $matches);
    foreach ($matches[1] as $index => $snippet) {
        $source = str_starts_with(ltrim($snippet), '<?php') ? $snippet : "<?php\n" . $snippet;
        try {
            // README 片段依赖应用变量，使用 parser 验证语法；完整离线行为由下方示例执行。
            $tokens = token_get_all($source, TOKEN_PARSE);
            if ($tokens === []) {
                throw new ParseError('README PHP snippet produced no tokens');
            }
        } catch (ParseError $exception) {
            fwrite(STDERR, sprintf(
                "%s PHP snippet %d is invalid: %s\n",
                $readme,
                $index + 1,
                $exception->getMessage(),
            ));
            exit(1);
        }
        ++$snippets;
    }
}
if ($snippets === 0) {
    fwrite(STDERR, "README files contain no PHP snippets.\n");
    exit(1);
}

$result = require $root . '/examples/offline-demo.php';
if (!is_array($result) || ($result['workspace'] ?? null) !== 'Example Workspace') {
    fwrite(STDERR, "Offline README example did not return the expected result.\n");
    exit(1);
}

fwrite(STDERR, sprintf(
    "[examples:check] parsed %d README snippets and completed the offline example without network access\n",
    $snippets,
));
