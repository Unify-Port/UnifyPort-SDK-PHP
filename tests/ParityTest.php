<?php

declare(strict_types=1);

namespace UnifyPort\Sdk\Tests;

use Nyholm\Psr7\Response;
use PHPUnit\Framework\TestCase;
use ReflectionMethod;
use UnifyPort\Sdk\Generated\OperationCatalog;
use UnifyPort\Sdk\Generated\SchemaCatalog;
use UnifyPort\Sdk\Tests\Support\QueueHttpClient;
use UnifyPort\Sdk\Tests\Support\SdkFactory;

final class ParityTest extends TestCase
{
    public function testEveryContractOperationHasAnExplicitClientMethod(): void
    {
        $client = SdkFactory::client(new QueueHttpClient([new Response()]));
        $operations = OperationCatalog::all();

        self::assertCount(78, $operations);
        foreach (array_keys($operations) as $operationId) {
            self::assertTrue(method_exists($client, $operationId), $operationId);
        }
        self::assertCount(225, SchemaCatalog::all());
    }

    public function testResourceAndPolicyCountsMatchNodeBaseline(): void
    {
        $tags = [];
        $policyCounts = [
            'read' => 0,
            'write' => 0,
            'destructive' => 0,
            'retryable' => 0,
            'secretInput' => 0,
            'secretOutput' => 0,
            'mcpRead' => 0,
            'mcpWrite' => 0,
            'mcpNever' => 0,
        ];
        foreach (OperationCatalog::all() as $operation) {
            $tags[$operation->tag] = ($tags[$operation->tag] ?? 0) + 1;
            ++$policyCounts[$operation->mutability];
            $policyCounts['retryable'] += (int) $operation->retryable;
            $policyCounts['secretInput'] += (int) $operation->secretInput;
            $policyCounts['secretOutput'] += (int) $operation->secretOutput;
            ++$policyCounts['mcp' . ucfirst($operation->mcpExposure)];
        }
        ksort($tags);

        self::assertSame([
            'API Keys' => 4,
            'Account Auth' => 11,
            'Account Runtime' => 4,
            'Accounts' => 6,
            'Calls' => 3,
            'Contacts' => 8,
            'Conversations' => 14,
            'Groups' => 10,
            'Messages' => 5,
            'Posts' => 4,
            'Providers' => 1,
            'Webhook Endpoints' => 6,
            'Workspace' => 2,
        ], $tags);
        self::assertSame([
            'read' => 25,
            'write' => 45,
            'destructive' => 8,
            'retryable' => 19,
            'secretInput' => 9,
            'secretOutput' => 16,
            'mcpRead' => 3,
            'mcpWrite' => 1,
            'mcpNever' => 74,
        ], $policyCounts);
    }

    public function testOnlyNodeOptionalOperationsHaveOptionalRequestArgument(): void
    {
        $optional = [];
        foreach (OperationCatalog::all() as $operationId => $_operation) {
            $parameter = (new ReflectionMethod(
                SdkFactory::client(new QueueHttpClient([new Response()])),
                $operationId,
            ))->getParameters()[0];
            if ($parameter->isDefaultValueAvailable()) {
                $optional[] = $operationId;
            }
        }

        self::assertSame(
            ['getWorkspace', 'listAccounts', 'listApiKeys', 'listWebhookEndpoints'],
            $optional,
        );
    }
}
