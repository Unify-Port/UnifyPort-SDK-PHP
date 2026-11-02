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
 * @phpstan-import-type CreateCallOperationRequest from ApiTypes
 * @phpstan-import-type CreateCallOperationResponse from ApiTypes
 * @phpstan-import-type GetActiveCallOperationRequest from ApiTypes
 * @phpstan-import-type GetActiveCallOperationResponse from ApiTypes
 * @phpstan-import-type HangupCallOperationRequest from ApiTypes
 * @phpstan-import-type HangupCallOperationResponse from ApiTypes
 */
final readonly class CallsApi
{
    public function __construct(private UnifyPortDeviceClient $client)
    {
    }

    /**
     * 准备主动通话
     *
     * @param CreateCallOperationRequest|OperationRequest $request
     * @return ApiResult<CreateCallOperationResponse>
     */
    public function createCall(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->createCall($request, $execution);
    }

    /**
     * 查询账号当前活动通话
     *
     * @param GetActiveCallOperationRequest|OperationRequest $request
     * @return ApiResult<GetActiveCallOperationResponse>
     */
    public function getActiveCall(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->getActiveCall($request, $execution);
    }

    /**
     * 挂断指定通话
     *
     * @param HangupCallOperationRequest|OperationRequest $request
     * @return ApiResult<HangupCallOperationResponse>
     */
    public function hangupCall(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->hangupCall($request, $execution);
    }
}
