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
 * @phpstan-import-type DeleteConversationLabelOperationRequest from ApiTypes
 * @phpstan-import-type DeleteConversationLabelOperationResponse from ApiTypes
 * @phpstan-import-type GetConversationOperationRequest from ApiTypes
 * @phpstan-import-type GetConversationOperationResponse from ApiTypes
 * @phpstan-import-type ListConversationLabelsOperationRequest from ApiTypes
 * @phpstan-import-type ListConversationLabelsOperationResponse from ApiTypes
 * @phpstan-import-type ListConversationMembersOperationRequest from ApiTypes
 * @phpstan-import-type ListConversationMembersOperationResponse from ApiTypes
 * @phpstan-import-type ListConversationsOperationRequest from ApiTypes
 * @phpstan-import-type ListConversationsOperationResponse from ApiTypes
 * @phpstan-import-type MarkConversationReadOperationRequest from ApiTypes
 * @phpstan-import-type MarkConversationReadOperationResponse from ApiTypes
 * @phpstan-import-type MarkConversationUnreadOperationRequest from ApiTypes
 * @phpstan-import-type MarkConversationUnreadOperationResponse from ApiTypes
 * @phpstan-import-type MuteConversationOperationRequest from ApiTypes
 * @phpstan-import-type MuteConversationOperationResponse from ApiTypes
 * @phpstan-import-type PinConversationOperationRequest from ApiTypes
 * @phpstan-import-type PinConversationOperationResponse from ApiTypes
 * @phpstan-import-type RequestConversationHistoryOperationRequest from ApiTypes
 * @phpstan-import-type RequestConversationHistoryOperationResponse from ApiTypes
 * @phpstan-import-type SetConversationLabelMembersOperationRequest from ApiTypes
 * @phpstan-import-type SetConversationLabelMembersOperationResponse from ApiTypes
 * @phpstan-import-type UnmuteConversationOperationRequest from ApiTypes
 * @phpstan-import-type UnmuteConversationOperationResponse from ApiTypes
 * @phpstan-import-type UnpinConversationOperationRequest from ApiTypes
 * @phpstan-import-type UnpinConversationOperationResponse from ApiTypes
 * @phpstan-import-type UpsertConversationLabelOperationRequest from ApiTypes
 * @phpstan-import-type UpsertConversationLabelOperationResponse from ApiTypes
 */
final readonly class ConversationsApi
{
    public function __construct(private UnifyPortDeviceClient $client)
    {
    }

    /**
     * 删除会话标签
     *
     * @param DeleteConversationLabelOperationRequest|OperationRequest $request
     * @return ApiResult<DeleteConversationLabelOperationResponse>
     */
    public function deleteConversationLabel(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->deleteConversationLabel($request, $execution);
    }

    /**
     * 获取会话详情
     *
     * @param GetConversationOperationRequest|OperationRequest $request
     * @return ApiResult<GetConversationOperationResponse>
     */
    public function getConversation(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->getConversation($request, $execution);
    }

    /**
     * 列出会话标签
     *
     * @param ListConversationLabelsOperationRequest|OperationRequest $request
     * @return ApiResult<ListConversationLabelsOperationResponse>
     */
    public function listConversationLabels(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->listConversationLabels($request, $execution);
    }

    /**
     * 列出会话成员
     *
     * @param ListConversationMembersOperationRequest|OperationRequest $request
     * @return ApiResult<ListConversationMembersOperationResponse>
     */
    public function listConversationMembers(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->listConversationMembers($request, $execution);
    }

    /**
     * 列出会话
     *
     * @param ListConversationsOperationRequest|OperationRequest $request
     * @return ApiResult<ListConversationsOperationResponse>
     */
    public function listConversations(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->listConversations($request, $execution);
    }

    /**
     * 标记会话已读
     *
     * @param MarkConversationReadOperationRequest|OperationRequest $request
     * @return ApiResult<MarkConversationReadOperationResponse>
     */
    public function markConversationRead(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->markConversationRead($request, $execution);
    }

    /**
     * 标记会话未读
     *
     * @param MarkConversationUnreadOperationRequest|OperationRequest $request
     * @return ApiResult<MarkConversationUnreadOperationResponse>
     */
    public function markConversationUnread(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->markConversationUnread($request, $execution);
    }

    /**
     * 静音会话
     *
     * @param MuteConversationOperationRequest|OperationRequest $request
     * @return ApiResult<MuteConversationOperationResponse>
     */
    public function muteConversation(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->muteConversation($request, $execution);
    }

    /**
     * 置顶会话
     *
     * @param PinConversationOperationRequest|OperationRequest $request
     * @return ApiResult<PinConversationOperationResponse>
     */
    public function pinConversation(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->pinConversation($request, $execution);
    }

    /**
     * 请求补拉会话历史消息
     *
     * @param RequestConversationHistoryOperationRequest|OperationRequest $request
     * @return ApiResult<RequestConversationHistoryOperationResponse>
     */
    public function requestConversationHistory(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->requestConversationHistory($request, $execution);
    }

    /**
     * 给会话打标或移除标签
     *
     * @param SetConversationLabelMembersOperationRequest|OperationRequest $request
     * @return ApiResult<SetConversationLabelMembersOperationResponse>
     */
    public function setConversationLabelMembers(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->setConversationLabelMembers($request, $execution);
    }

    /**
     * 取消静音会话
     *
     * @param UnmuteConversationOperationRequest|OperationRequest $request
     * @return ApiResult<UnmuteConversationOperationResponse>
     */
    public function unmuteConversation(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->unmuteConversation($request, $execution);
    }

    /**
     * 取消置顶会话
     *
     * @param UnpinConversationOperationRequest|OperationRequest $request
     * @return ApiResult<UnpinConversationOperationResponse>
     */
    public function unpinConversation(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->unpinConversation($request, $execution);
    }

    /**
     * 新建或更新会话标签
     *
     * @param UpsertConversationLabelOperationRequest|OperationRequest $request
     * @return ApiResult<UpsertConversationLabelOperationResponse>
     */
    public function upsertConversationLabel(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->upsertConversationLabel($request, $execution);
    }
}
