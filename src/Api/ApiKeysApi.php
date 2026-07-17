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
 * @phpstan-import-type CreateApiKeyOperationRequest from ApiTypes
 * @phpstan-import-type CreateApiKeyOperationResponse from ApiTypes
 * @phpstan-import-type ListApiKeysOperationRequest from ApiTypes
 * @phpstan-import-type ListApiKeysOperationResponse from ApiTypes
 * @phpstan-import-type RotateApiKeyOperationRequest from ApiTypes
 * @phpstan-import-type RotateApiKeyOperationResponse from ApiTypes
 * @phpstan-import-type UpdateApiKeyStatusOperationRequest from ApiTypes
 * @phpstan-import-type UpdateApiKeyStatusOperationResponse from ApiTypes
 */
final readonly class ApiKeysApi
{
    public function __construct(private UnifyPortDeviceClient $client)
    {
    }

    /**
     * 创建 API Key
     *
     * @param CreateApiKeyOperationRequest|OperationRequest $request
     * @return ApiResult<CreateApiKeyOperationResponse>
     */
    public function createApiKey(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->createApiKey($request, $execution);
    }

    /**
     * 列出 API Key
     *
     * @param ListApiKeysOperationRequest|OperationRequest $request
     * @return ApiResult<ListApiKeysOperationResponse>
     */
    public function listApiKeys(
        array|OperationRequest $request = [],
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->listApiKeys($request, $execution);
    }

    /**
     * 轮换 API Key
     *
     * @param RotateApiKeyOperationRequest|OperationRequest $request
     * @return ApiResult<RotateApiKeyOperationResponse>
     */
    public function rotateApiKey(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->rotateApiKey($request, $execution);
    }

    /**
     * 更新 API Key 状态
     *
     * @param UpdateApiKeyStatusOperationRequest|OperationRequest $request
     * @return ApiResult<UpdateApiKeyStatusOperationResponse>
     */
    public function updateApiKeyStatus(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->updateApiKeyStatus($request, $execution);
    }
}
