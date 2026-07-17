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
 * @phpstan-import-type ReconnectAccountRuntimeOperationRequest from ApiTypes
 * @phpstan-import-type ReconnectAccountRuntimeOperationResponse from ApiTypes
 * @phpstan-import-type RefreshAccountRuntimeOperationRequest from ApiTypes
 * @phpstan-import-type RefreshAccountRuntimeOperationResponse from ApiTypes
 * @phpstan-import-type StartAccountRuntimeOperationRequest from ApiTypes
 * @phpstan-import-type StartAccountRuntimeOperationResponse from ApiTypes
 * @phpstan-import-type StopAccountRuntimeOperationRequest from ApiTypes
 * @phpstan-import-type StopAccountRuntimeOperationResponse from ApiTypes
 */
final readonly class AccountRuntimeApi
{
    public function __construct(private UnifyPortDeviceClient $client)
    {
    }

    /**
     * 重连账号运行态
     *
     * @param ReconnectAccountRuntimeOperationRequest|OperationRequest $request
     * @return ApiResult<ReconnectAccountRuntimeOperationResponse>
     */
    public function reconnectAccountRuntime(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->reconnectAccountRuntime($request, $execution);
    }

    /**
     * 刷新账号运行态
     *
     * @param RefreshAccountRuntimeOperationRequest|OperationRequest $request
     * @return ApiResult<RefreshAccountRuntimeOperationResponse>
     */
    public function refreshAccountRuntime(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->refreshAccountRuntime($request, $execution);
    }

    /**
     * 启动账号运行态
     *
     * @param StartAccountRuntimeOperationRequest|OperationRequest $request
     * @return ApiResult<StartAccountRuntimeOperationResponse>
     */
    public function startAccountRuntime(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->startAccountRuntime($request, $execution);
    }

    /**
     * 停止账号运行态
     *
     * @param StopAccountRuntimeOperationRequest|OperationRequest $request
     * @return ApiResult<StopAccountRuntimeOperationResponse>
     */
    public function stopAccountRuntime(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->stopAccountRuntime($request, $execution);
    }
}
