<?php

declare(strict_types=1);

namespace UnifyPort\Sdk\Tests;

use Nyholm\Psr7\Response;
use PHPUnit\Framework\TestCase;
use UnifyPort\Sdk\Exception\UnifyPortApiException;
use UnifyPort\Sdk\Generated\SchemaCatalog;
use UnifyPort\Sdk\Tests\Support\QueueHttpClient;
use UnifyPort\Sdk\Tests\Support\SdkFactory;

final class FacebookTest extends TestCase
{
    public function testFacebookUsesExistingCreationAndSessionEndpoints(): void
    {
        // FB 只扩充渠道值，不能替换旧渠道或引入另一套认证传输。
        self::assertContains('facebook', SchemaCatalog::all()['ProviderName']['enum']);
        self::assertContains('whatsapp-protocol', SchemaCatalog::all()['ProviderName']['enum']);
        $http = new QueueHttpClient([
            new Response(201, [], '{"data":{"provider":"facebook","runtime_status":"starting"}}'),
            new Response(200, [], '{"data":{"status":"authorized"}}'),
        ]);
        $client = SdkFactory::client($http);
        $created = $client->createAccount([
            'body' => ['provider' => 'facebook', 'region' => 'sg', 'auth_mode' => 'session'],
            'headers' => ['Idempotency-Key' => 'facebook-example'],
        ]);
        $client->importAccountAuthSession([
            'params' => ['path' => ['account_id' => 'acc_example']],
            'body' => ['session_url' => 'https://example.com/temporary-session.json'],
        ]);
        self::assertSame('starting', $created->data['data']['runtime_status']);
        self::assertSame('facebook-example', $http->requests[0]->getHeaderLine('Idempotency-Key'));
        self::assertSame('/v1/accounts/acc_example/auth/session', $http->requests[1]->getUri()->getPath());
    }

    public function testUncertainFacebookSendAndSessionImportAreNotRetried(): void
    {
        foreach (
            [
            'sendMessage' => ['body' => [
                'account_id' => 'acc_example', 'to' => ['id' => '9007199254740995', 'type' => 'user'],
                'message' => ['type' => 'text', 'text' => 'Hello'],
            ]],
            'importAccountAuthSession' => [
                'params' => ['path' => ['account_id' => 'acc_example']],
                'body' => ['session_url' => 'https://example.com/temporary-session.json'],
            ],
            ] as $operation => $input
        ) {
            $http = new QueueHttpClient([new Response(502, [], '{"error":{"code":"provider_unavailable"}}')]);
            try {
                SdkFactory::client($http)->$operation($input);
                self::fail('Expected API error');
            } catch (UnifyPortApiException) {
                self::assertCount(1, $http->requests);
            }
        }
    }
}
