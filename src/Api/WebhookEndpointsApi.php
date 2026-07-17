<?php

/**
 * 此文件由 `composer generate` 根据 contracts/device.openapi.yaml 生成。
 * 生成边界用于保持 PHP SDK 与公开 Node SDK 同步；请修改来源，不要手工编辑。
 */

declare(strict_types=1);

namespace UnifyPort\Sdk\Api;

use UnifyPort\Sdk\ApiResult;
use UnifyPort\Sdk\Generated\ApiTypes;
use UnifyPort\Sdk\OperationRequest;
use UnifyPort\Sdk\RequestExecutionOptions;
use UnifyPort\Sdk\UnifyPortDeviceClient;

/**
 * operation 别名从同一 OpenAPI 生成，方法继续使用 array 与 OperationRequest 的运行时边界。
 * @phpstan-import-type CreateWebhookEndpointOperationRequest from ApiTypes
 * @phpstan-import-type CreateWebhookEndpointOperationResponse from ApiTypes
 * @phpstan-import-type DeactivateWebhookEndpointOperationRequest from ApiTypes
 * @phpstan-import-type DeactivateWebhookEndpointOperationResponse from ApiTypes
 * @phpstan-import-type DeleteWebhookEndpointOperationRequest from ApiTypes
 * @phpstan-import-type DeleteWebhookEndpointOperationResponse from ApiTypes
 * @phpstan-import-type GetWebhookEndpointOperationRequest from ApiTypes
 * @phpstan-import-type GetWebhookEndpointOperationResponse from ApiTypes
 * @phpstan-import-type ListWebhookEndpointsOperationRequest from ApiTypes
 * @phpstan-import-type ListWebhookEndpointsOperationResponse from ApiTypes
 * @phpstan-import-type UpdateWebhookEndpointOperationRequest from ApiTypes
 * @phpstan-import-type UpdateWebhookEndpointOperationResponse from ApiTypes
 */
final readonly class WebhookEndpointsApi
{
    public function __construct(private UnifyPortDeviceClient $client)
    {
    }

    /**
     * 创建 webhook endpoint
     *
     * @param CreateWebhookEndpointOperationRequest|OperationRequest $request
     * @return ApiResult<CreateWebhookEndpointOperationResponse>
     */
    public function createWebhookEndpoint(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->createWebhookEndpoint($request, $execution);
    }

    /**
     * 停用 webhook endpoint
     *
     * @param DeactivateWebhookEndpointOperationRequest|OperationRequest $request
     * @return ApiResult<DeactivateWebhookEndpointOperationResponse>
     */
    public function deactivateWebhookEndpoint(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->deactivateWebhookEndpoint($request, $execution);
    }

    /**
     * 删除 webhook endpoint
     *
     * @param DeleteWebhookEndpointOperationRequest|OperationRequest $request
     * @return ApiResult<DeleteWebhookEndpointOperationResponse>
     */
    public function deleteWebhookEndpoint(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->deleteWebhookEndpoint($request, $execution);
    }

    /**
     * 获取 webhook endpoint
     *
     * @param GetWebhookEndpointOperationRequest|OperationRequest $request
     * @return ApiResult<GetWebhookEndpointOperationResponse>
     */
    public function getWebhookEndpoint(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->getWebhookEndpoint($request, $execution);
    }

    /**
     * 列出 webhook endpoint
     *
     * @param ListWebhookEndpointsOperationRequest|OperationRequest $request
     * @return ApiResult<ListWebhookEndpointsOperationResponse>
     */
    public function listWebhookEndpoints(
        array|OperationRequest $request = [],
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->listWebhookEndpoints($request, $execution);
    }

    /**
     * 更新 webhook endpoint
     *
     * @param UpdateWebhookEndpointOperationRequest|OperationRequest $request
     * @return ApiResult<UpdateWebhookEndpointOperationResponse>
     */
    public function updateWebhookEndpoint(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->updateWebhookEndpoint($request, $execution);
    }
}
