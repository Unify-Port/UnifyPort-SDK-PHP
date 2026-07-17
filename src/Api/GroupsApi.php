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
 * @phpstan-import-type CreateGroupOperationRequest from ApiTypes
 * @phpstan-import-type CreateGroupOperationResponse from ApiTypes
 * @phpstan-import-type GetGroupOperationRequest from ApiTypes
 * @phpstan-import-type GetGroupOperationResponse from ApiTypes
 * @phpstan-import-type GetGroupInviteCodeOperationRequest from ApiTypes
 * @phpstan-import-type GetGroupInviteCodeOperationResponse from ApiTypes
 * @phpstan-import-type LeaveGroupOperationRequest from ApiTypes
 * @phpstan-import-type LeaveGroupOperationResponse from ApiTypes
 * @phpstan-import-type ListGroupJoinRequestsOperationRequest from ApiTypes
 * @phpstan-import-type ListGroupJoinRequestsOperationResponse from ApiTypes
 * @phpstan-import-type ListGroupsOperationRequest from ApiTypes
 * @phpstan-import-type ListGroupsOperationResponse from ApiTypes
 * @phpstan-import-type SetGroupJoinApprovalModeOperationRequest from ApiTypes
 * @phpstan-import-type SetGroupJoinApprovalModeOperationResponse from ApiTypes
 * @phpstan-import-type UpdateGroupInfoOperationRequest from ApiTypes
 * @phpstan-import-type UpdateGroupInfoOperationResponse from ApiTypes
 * @phpstan-import-type UpdateGroupJoinRequestsOperationRequest from ApiTypes
 * @phpstan-import-type UpdateGroupJoinRequestsOperationResponse from ApiTypes
 * @phpstan-import-type UpdateGroupMembersOperationRequest from ApiTypes
 * @phpstan-import-type UpdateGroupMembersOperationResponse from ApiTypes
 */
final readonly class GroupsApi
{
    public function __construct(private UnifyPortDeviceClient $client)
    {
    }

    /**
     * 创建群组
     *
     * @param CreateGroupOperationRequest|OperationRequest $request
     * @return ApiResult<CreateGroupOperationResponse>
     */
    public function createGroup(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->createGroup($request, $execution);
    }

    /**
     * 获取群组详情
     *
     * @param GetGroupOperationRequest|OperationRequest $request
     * @return ApiResult<GetGroupOperationResponse>
     */
    public function getGroup(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->getGroup($request, $execution);
    }

    /**
     * 获取群邀请链接或邀请码
     *
     * @param GetGroupInviteCodeOperationRequest|OperationRequest $request
     * @return ApiResult<GetGroupInviteCodeOperationResponse>
     */
    public function getGroupInviteCode(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->getGroupInviteCode($request, $execution);
    }

    /**
     * 退出群组
     *
     * @param LeaveGroupOperationRequest|OperationRequest $request
     * @return ApiResult<LeaveGroupOperationResponse>
     */
    public function leaveGroup(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->leaveGroup($request, $execution);
    }

    /**
     * 列出待审批入群申请
     *
     * @param ListGroupJoinRequestsOperationRequest|OperationRequest $request
     * @return ApiResult<ListGroupJoinRequestsOperationResponse>
     */
    public function listGroupJoinRequests(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->listGroupJoinRequests($request, $execution);
    }

    /**
     * 列出群组
     *
     * @param ListGroupsOperationRequest|OperationRequest $request
     * @return ApiResult<ListGroupsOperationResponse>
     */
    public function listGroups(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->listGroups($request, $execution);
    }

    /**
     * 设置入群审批模式
     *
     * @param SetGroupJoinApprovalModeOperationRequest|OperationRequest $request
     * @return ApiResult<SetGroupJoinApprovalModeOperationResponse>
     */
    public function setGroupJoinApprovalMode(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->setGroupJoinApprovalMode($request, $execution);
    }

    /**
     * 修改群信息
     *
     * @param UpdateGroupInfoOperationRequest|OperationRequest $request
     * @return ApiResult<UpdateGroupInfoOperationResponse>
     */
    public function updateGroupInfo(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->updateGroupInfo($request, $execution);
    }

    /**
     * 处理入群申请
     *
     * @param UpdateGroupJoinRequestsOperationRequest|OperationRequest $request
     * @return ApiResult<UpdateGroupJoinRequestsOperationResponse>
     */
    public function updateGroupJoinRequests(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->updateGroupJoinRequests($request, $execution);
    }

    /**
     * 管理群成员
     *
     * @param UpdateGroupMembersOperationRequest|OperationRequest $request
     * @return ApiResult<UpdateGroupMembersOperationResponse>
     */
    public function updateGroupMembers(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->updateGroupMembers($request, $execution);
    }
}
