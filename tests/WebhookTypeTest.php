<?php

declare(strict_types=1);

namespace UnifyPort\Sdk\Tests;

use PHPUnit\Framework\TestCase;

final class WebhookTypeTest extends TestCase
{
    public function testStaticTypesRejectCallSparseFieldsAndInvalidStateTypes(): void
    {
        $examples = json_decode((string) file_get_contents(__DIR__ . '/fixtures/webhook-examples.json'), true);
        self::assertIsArray($examples);
        $fixtures = [];
        foreach ($examples as $example) {
            $fixtures[$example['name']] = $example;
        }
        $cases = [
            $fixtures['callMessageReceived/audioInvitation'],
            $fixtures['callMessageUpdated/acceptance'],
            $fixtures['callMessageUpdated/termination'],
            $fixtures['conversationDisappearingMessagesUpdated/disabled'],
            $fixtures['messagePinUpdated/unpinned'],
            $fixtures['messagePollVoteUpdated/unavailable'],
        ];
        // FB 已知字段必须保持强类型，不能被开放扩展字段掩盖。
        $cases[] = $fixtures['facebookMessageReceived/inbound'];
        $cases[] = $fixtures['facebookMessageReceived/inbound'];
        $cases[] = $fixtures['facebookAccountAuthFailed/example'];
        $cases[6]['body']['data']['message']['direction'] = true;
        $cases[7]['body']['data']['message']['id'] = 123;
        $cases[8]['body']['provider'] = 'whatsapp';
        $cases[0]['body']['data']['message']['call']['ended_by'] = 'recipient';
        $cases[1]['body']['data']['message']['call']['end_reason'] = 'timeout';
        $cases[2]['body']['data']['message']['call']['accepted_at'] = '2026-09-17T08:00:05Z';
        $cases[3]['body']['data']['disappearing_messages']['duration_seconds'] = [];
        $cases[4]['body']['data']['message']['pin']['expires_at'] = 0;
        $cases[5]['body']['data']['message']['poll_vote']['status'] = 'invalid';

        $root = dirname(__DIR__);
        $file = $root . '/build/webhook-negative.php';
        if (!is_dir($root . '/build')) {
            self::assertTrue(mkdir($root . '/build', 0777, true));
        }
        $source = "<?php\ndeclare(strict_types=1);\n/**\n";
        foreach (array_unique(array_column($cases, 'schema')) as $schema) {
            $source .= ' * @phpstan-import-type ' . $schema
                . 'Output from \\UnifyPort\\Sdk\\Generated\\ApiTypes' . "\n";
        }
        $source .= " */\nfinal class WebhookNegative {\n";
        foreach ($cases as $index => $case) {
            $source .= '/** @return ' . $case['schema'] . 'Output */ public static function case' . $index;
            $source .= '(): array { return ' . var_export($case['body'], true) . "; }\n";
        }
        $source .= "}\n";
        file_put_contents($file, $source);
        // 反例必须得到具体的 return.type 诊断；布尔分支关联等未表达约束仍需接收边界校验。
        $process = proc_open([
            PHP_BINARY, $root . '/vendor/bin/phpstan', 'analyse', '--no-progress',
            '--error-format=json', '--memory-limit=512M',
            '-c', $root . '/phpstan.neon.dist', $file,
        ], [1 => ['pipe', 'w'], 2 => ['pipe', 'w']], $pipes, $root);
        self::assertIsResource($process);
        $output = stream_get_contents($pipes[1]);
        fclose($pipes[1]);
        stream_get_contents($pipes[2]);
        fclose($pipes[2]);
        self::assertSame(1, proc_close($process));
        self::assertIsString($output);
        $result = json_decode($output, true);
        self::assertIsArray($result);
        self::assertSame([], $result['errors']);
        $messages = $result['files'][$file]['messages'];
        foreach (array_keys($cases) as $index) {
            $found = false;
            foreach ($messages as $message) {
                if (
                    $message['identifier'] === 'return.type'
                    && str_contains($message['message'], '::case' . $index . '()')
                ) {
                    $found = true;
                }
            }
            self::assertTrue($found, 'Missing forbidden-field diagnostic for case ' . $index);
        }
    }
}
