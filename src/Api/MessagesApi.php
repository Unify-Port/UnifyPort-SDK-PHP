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
 * @phpstan-import-type EditMessageOperationRequest from ApiTypes
 * @phpstan-import-type EditMessageOperationResponse from ApiTypes
 * @phpstan-import-type PinMessageOperationRequest from ApiTypes
 * @phpstan-import-type PinMessageOperationResponse from ApiTypes
 * @phpstan-import-type ReactMessageOperationRequest from ApiTypes
 * @phpstan-import-type ReactMessageOperationResponse from ApiTypes
 * @phpstan-import-type RevokeMessageOperationRequest from ApiTypes
 * @phpstan-import-type RevokeMessageOperationResponse from ApiTypes
 * @phpstan-import-type SendMessageOperationRequest from ApiTypes
 * @phpstan-import-type SendMessageOperationResponse from ApiTypes
 */
final readonly class MessagesApi
{
    public function __construct(private UnifyPortDeviceClient $client)
    {
    }

    /**
     * 编辑消息文本
     *
     * @param EditMessageOperationRequest|OperationRequest $request
     * @return ApiResult<EditMessageOperationResponse>
     */
    public function editMessage(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->editMessage($request, $execution);
    }

    /**
     * 置顶或取消置顶消息
     *
     * @param PinMessageOperationRequest|OperationRequest $request
     * @return ApiResult<PinMessageOperationResponse>
     */
    public function pinMessage(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->pinMessage($request, $execution);
    }

    /**
     * 给消息加表情回应或取消回应
     *
     * @param ReactMessageOperationRequest|OperationRequest $request
     * @return ApiResult<ReactMessageOperationResponse>
     */
    public function reactMessage(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->reactMessage($request, $execution);
    }

    /**
     * 撤回消息
     *
     * @param RevokeMessageOperationRequest|OperationRequest $request
     * @return ApiResult<RevokeMessageOperationResponse>
     */
    public function revokeMessage(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->revokeMessage($request, $execution);
    }

    /**
     * 发送消息
     *
     * @param SendMessageOperationRequest|OperationRequest $request
     * @return ApiResult<SendMessageOperationResponse>
     */
    public function sendMessage(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->sendMessage($request, $execution);
    }
}
