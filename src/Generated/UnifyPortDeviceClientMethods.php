<?php

/**
 * 此文件由 `composer generate` 根据 contracts/device.openapi.yaml 生成。
 * 生成边界用于保持 PHP SDK 与公开 Node SDK 同步；请修改来源，不要手工编辑。
 */

declare(strict_types=1);

namespace UnifyPort\Sdk\Generated;

use UnifyPort\Sdk\Api\AccountAuthApi;
use UnifyPort\Sdk\Api\AccountRuntimeApi;
use UnifyPort\Sdk\Api\AccountsApi;
use UnifyPort\Sdk\Api\ApiKeysApi;
use UnifyPort\Sdk\Api\CallsApi;
use UnifyPort\Sdk\Api\ContactsApi;
use UnifyPort\Sdk\Api\ConversationsApi;
use UnifyPort\Sdk\Api\GroupsApi;
use UnifyPort\Sdk\Api\MessagesApi;
use UnifyPort\Sdk\Api\PostsApi;
use UnifyPort\Sdk\Api\ProvidersApi;
use UnifyPort\Sdk\Api\WebhookEndpointsApi;
use UnifyPort\Sdk\Api\WorkspaceApi;
use UnifyPort\Sdk\ApiResult;
use UnifyPort\Sdk\OperationRequest;
use UnifyPort\Sdk\RequestExecutionOptions;

/**
 * operation 别名从同一 OpenAPI 生成，方法继续使用 array 与 OperationRequest 的运行时边界。
 * @phpstan-import-type BlockContactOperationRequest from ApiTypes
 * @phpstan-import-type BlockContactOperationResponse from ApiTypes
 * @phpstan-import-type CancelAccountAuthOperationRequest from ApiTypes
 * @phpstan-import-type CancelAccountAuthOperationResponse from ApiTypes
 * @phpstan-import-type CheckAccountQrAuthOperationRequest from ApiTypes
 * @phpstan-import-type CheckAccountQrAuthOperationResponse from ApiTypes
 * @phpstan-import-type ConfirmAccountPasskeyOperationRequest from ApiTypes
 * @phpstan-import-type ConfirmAccountPasskeyOperationResponse from ApiTypes
 * @phpstan-import-type CreateAccountOperationRequest from ApiTypes
 * @phpstan-import-type CreateAccountOperationResponse from ApiTypes
 * @phpstan-import-type CreateAccountAuthSessionOperationRequest from ApiTypes
 * @phpstan-import-type CreateAccountAuthSessionOperationResponse from ApiTypes
 * @phpstan-import-type CreateApiKeyOperationRequest from ApiTypes
 * @phpstan-import-type CreateApiKeyOperationResponse from ApiTypes
 * @phpstan-import-type CreateCallOperationRequest from ApiTypes
 * @phpstan-import-type CreateCallOperationResponse from ApiTypes
 * @phpstan-import-type CreateContactOperationRequest from ApiTypes
 * @phpstan-import-type CreateContactOperationResponse from ApiTypes
 * @phpstan-import-type CreateGroupOperationRequest from ApiTypes
 * @phpstan-import-type CreateGroupOperationResponse from ApiTypes
 * @phpstan-import-type CreateWebhookEndpointOperationRequest from ApiTypes
 * @phpstan-import-type CreateWebhookEndpointOperationResponse from ApiTypes
 * @phpstan-import-type DeactivateWebhookEndpointOperationRequest from ApiTypes
 * @phpstan-import-type DeactivateWebhookEndpointOperationResponse from ApiTypes
 * @phpstan-import-type DeleteAccountOperationRequest from ApiTypes
 * @phpstan-import-type DeleteAccountOperationResponse from ApiTypes
 * @phpstan-import-type DeleteConversationLabelOperationRequest from ApiTypes
 * @phpstan-import-type DeleteConversationLabelOperationResponse from ApiTypes
 * @phpstan-import-type DeleteWebhookEndpointOperationRequest from ApiTypes
 * @phpstan-import-type DeleteWebhookEndpointOperationResponse from ApiTypes
 * @phpstan-import-type EditMessageOperationRequest from ApiTypes
 * @phpstan-import-type EditMessageOperationResponse from ApiTypes
 * @phpstan-import-type GetAccountOperationRequest from ApiTypes
 * @phpstan-import-type GetAccountOperationResponse from ApiTypes
 * @phpstan-import-type GetAccountAuthStateOperationRequest from ApiTypes
 * @phpstan-import-type GetAccountAuthStateOperationResponse from ApiTypes
 * @phpstan-import-type GetAccountOperationOperationRequest from ApiTypes
 * @phpstan-import-type GetAccountOperationOperationResponse from ApiTypes
 * @phpstan-import-type GetActiveCallOperationRequest from ApiTypes
 * @phpstan-import-type GetActiveCallOperationResponse from ApiTypes
 * @phpstan-import-type GetContactOperationRequest from ApiTypes
 * @phpstan-import-type GetContactOperationResponse from ApiTypes
 * @phpstan-import-type GetContactMembershipOperationRequest from ApiTypes
 * @phpstan-import-type GetContactMembershipOperationResponse from ApiTypes
 * @phpstan-import-type GetConversationOperationRequest from ApiTypes
 * @phpstan-import-type GetConversationOperationResponse from ApiTypes
 * @phpstan-import-type GetGroupOperationRequest from ApiTypes
 * @phpstan-import-type GetGroupOperationResponse from ApiTypes
 * @phpstan-import-type GetGroupInviteCodeOperationRequest from ApiTypes
 * @phpstan-import-type GetGroupInviteCodeOperationResponse from ApiTypes
 * @phpstan-import-type GetPostOperationRequest from ApiTypes
 * @phpstan-import-type GetPostOperationResponse from ApiTypes
 * @phpstan-import-type GetWebhookEndpointOperationRequest from ApiTypes
 * @phpstan-import-type GetWebhookEndpointOperationResponse from ApiTypes
 * @phpstan-import-type GetWorkspaceOperationRequest from ApiTypes
 * @phpstan-import-type GetWorkspaceOperationResponse from ApiTypes
 * @phpstan-import-type HangupCallOperationRequest from ApiTypes
 * @phpstan-import-type HangupCallOperationResponse from ApiTypes
 * @phpstan-import-type ImportAccountAuthSessionOperationRequest from ApiTypes
 * @phpstan-import-type ImportAccountAuthSessionOperationResponse from ApiTypes
 * @phpstan-import-type LeaveGroupOperationRequest from ApiTypes
 * @phpstan-import-type LeaveGroupOperationResponse from ApiTypes
 * @phpstan-import-type ListAccountsOperationRequest from ApiTypes
 * @phpstan-import-type ListAccountsOperationResponse from ApiTypes
 * @phpstan-import-type ListApiKeysOperationRequest from ApiTypes
 * @phpstan-import-type ListApiKeysOperationResponse from ApiTypes
 * @phpstan-import-type ListContactBlocklistOperationRequest from ApiTypes
 * @phpstan-import-type ListContactBlocklistOperationResponse from ApiTypes
 * @phpstan-import-type ListContactsOperationRequest from ApiTypes
 * @phpstan-import-type ListContactsOperationResponse from ApiTypes
 * @phpstan-import-type ListConversationLabelsOperationRequest from ApiTypes
 * @phpstan-import-type ListConversationLabelsOperationResponse from ApiTypes
 * @phpstan-import-type ListConversationMembersOperationRequest from ApiTypes
 * @phpstan-import-type ListConversationMembersOperationResponse from ApiTypes
 * @phpstan-import-type ListConversationsOperationRequest from ApiTypes
 * @phpstan-import-type ListConversationsOperationResponse from ApiTypes
 * @phpstan-import-type ListGroupJoinRequestsOperationRequest from ApiTypes
 * @phpstan-import-type ListGroupJoinRequestsOperationResponse from ApiTypes
 * @phpstan-import-type ListGroupsOperationRequest from ApiTypes
 * @phpstan-import-type ListGroupsOperationResponse from ApiTypes
 * @phpstan-import-type ListPostCommentsOperationRequest from ApiTypes
 * @phpstan-import-type ListPostCommentsOperationResponse from ApiTypes
 * @phpstan-import-type ListPostsOperationRequest from ApiTypes
 * @phpstan-import-type ListPostsOperationResponse from ApiTypes
 * @phpstan-import-type ListProviderRegionsOperationRequest from ApiTypes
 * @phpstan-import-type ListProviderRegionsOperationResponse from ApiTypes
 * @phpstan-import-type ListWebhookEndpointsOperationRequest from ApiTypes
 * @phpstan-import-type ListWebhookEndpointsOperationResponse from ApiTypes
 * @phpstan-import-type MarkConversationReadOperationRequest from ApiTypes
 * @phpstan-import-type MarkConversationReadOperationResponse from ApiTypes
 * @phpstan-import-type MarkConversationUnreadOperationRequest from ApiTypes
 * @phpstan-import-type MarkConversationUnreadOperationResponse from ApiTypes
 * @phpstan-import-type MuteConversationOperationRequest from ApiTypes
 * @phpstan-import-type MuteConversationOperationResponse from ApiTypes
 * @phpstan-import-type PinConversationOperationRequest from ApiTypes
 * @phpstan-import-type PinConversationOperationResponse from ApiTypes
 * @phpstan-import-type PinMessageOperationRequest from ApiTypes
 * @phpstan-import-type PinMessageOperationResponse from ApiTypes
 * @phpstan-import-type ReactMessageOperationRequest from ApiTypes
 * @phpstan-import-type ReactMessageOperationResponse from ApiTypes
 * @phpstan-import-type ReconnectAccountRuntimeOperationRequest from ApiTypes
 * @phpstan-import-type ReconnectAccountRuntimeOperationResponse from ApiTypes
 * @phpstan-import-type RefreshAccountRuntimeOperationRequest from ApiTypes
 * @phpstan-import-type RefreshAccountRuntimeOperationResponse from ApiTypes
 * @phpstan-import-type ReplyPostCommentOperationRequest from ApiTypes
 * @phpstan-import-type ReplyPostCommentOperationResponse from ApiTypes
 * @phpstan-import-type RequestConversationHistoryOperationRequest from ApiTypes
 * @phpstan-import-type RequestConversationHistoryOperationResponse from ApiTypes
 * @phpstan-import-type RevokeMessageOperationRequest from ApiTypes
 * @phpstan-import-type RevokeMessageOperationResponse from ApiTypes
 * @phpstan-import-type RotateApiKeyOperationRequest from ApiTypes
 * @phpstan-import-type RotateApiKeyOperationResponse from ApiTypes
 * @phpstan-import-type SendMessageOperationRequest from ApiTypes
 * @phpstan-import-type SendMessageOperationResponse from ApiTypes
 * @phpstan-import-type SetContactNoteOperationRequest from ApiTypes
 * @phpstan-import-type SetContactNoteOperationResponse from ApiTypes
 * @phpstan-import-type SetConversationLabelMembersOperationRequest from ApiTypes
 * @phpstan-import-type SetConversationLabelMembersOperationResponse from ApiTypes
 * @phpstan-import-type SetGroupJoinApprovalModeOperationRequest from ApiTypes
 * @phpstan-import-type SetGroupJoinApprovalModeOperationResponse from ApiTypes
 * @phpstan-import-type StartAccountAuthOperationRequest from ApiTypes
 * @phpstan-import-type StartAccountAuthOperationResponse from ApiTypes
 * @phpstan-import-type StartAccountQrAuthOperationRequest from ApiTypes
 * @phpstan-import-type StartAccountQrAuthOperationResponse from ApiTypes
 * @phpstan-import-type StartAccountRuntimeOperationRequest from ApiTypes
 * @phpstan-import-type StartAccountRuntimeOperationResponse from ApiTypes
 * @phpstan-import-type StopAccountRuntimeOperationRequest from ApiTypes
 * @phpstan-import-type StopAccountRuntimeOperationResponse from ApiTypes
 * @phpstan-import-type SubmitAccountAuthCodeOperationRequest from ApiTypes
 * @phpstan-import-type SubmitAccountAuthCodeOperationResponse from ApiTypes
 * @phpstan-import-type SubmitAccountAuthPasswordOperationRequest from ApiTypes
 * @phpstan-import-type SubmitAccountAuthPasswordOperationResponse from ApiTypes
 * @phpstan-import-type SubmitAccountPasskeyResponseOperationRequest from ApiTypes
 * @phpstan-import-type SubmitAccountPasskeyResponseOperationResponse from ApiTypes
 * @phpstan-import-type UnblockContactOperationRequest from ApiTypes
 * @phpstan-import-type UnblockContactOperationResponse from ApiTypes
 * @phpstan-import-type UnmuteConversationOperationRequest from ApiTypes
 * @phpstan-import-type UnmuteConversationOperationResponse from ApiTypes
 * @phpstan-import-type UnpinConversationOperationRequest from ApiTypes
 * @phpstan-import-type UnpinConversationOperationResponse from ApiTypes
 * @phpstan-import-type UpdateAccountOperationRequest from ApiTypes
 * @phpstan-import-type UpdateAccountOperationResponse from ApiTypes
 * @phpstan-import-type UpdateApiKeyStatusOperationRequest from ApiTypes
 * @phpstan-import-type UpdateApiKeyStatusOperationResponse from ApiTypes
 * @phpstan-import-type UpdateGroupInfoOperationRequest from ApiTypes
 * @phpstan-import-type UpdateGroupInfoOperationResponse from ApiTypes
 * @phpstan-import-type UpdateGroupJoinRequestsOperationRequest from ApiTypes
 * @phpstan-import-type UpdateGroupJoinRequestsOperationResponse from ApiTypes
 * @phpstan-import-type UpdateGroupMembersOperationRequest from ApiTypes
 * @phpstan-import-type UpdateGroupMembersOperationResponse from ApiTypes
 * @phpstan-import-type UpdateWebhookEndpointOperationRequest from ApiTypes
 * @phpstan-import-type UpdateWebhookEndpointOperationResponse from ApiTypes
 * @phpstan-import-type UpdateWorkspaceOperationRequest from ApiTypes
 * @phpstan-import-type UpdateWorkspaceOperationResponse from ApiTypes
 * @phpstan-import-type UpsertConversationLabelOperationRequest from ApiTypes
 * @phpstan-import-type UpsertConversationLabelOperationResponse from ApiTypes
 */
trait UnifyPortDeviceClientMethods
{
    /**
     * 封锁联系人
     *
     * @param BlockContactOperationRequest|OperationRequest $request
     * @return ApiResult<BlockContactOperationResponse>
     */
    public function blockContact(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('blockContact', $request, $execution);
    }

    /**
     * 取消授权流程
     *
     * @param CancelAccountAuthOperationRequest|OperationRequest $request
     * @return ApiResult<CancelAccountAuthOperationResponse>
     */
    public function cancelAccountAuth(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('cancelAccountAuth', $request, $execution);
    }

    /**
     * 检查二维码授权结果
     *
     * @param CheckAccountQrAuthOperationRequest|OperationRequest $request
     * @return ApiResult<CheckAccountQrAuthOperationResponse>
     */
    public function checkAccountQrAuth(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('checkAccountQrAuth', $request, $execution);
    }

    /**
     * 确认 Passkey 授权
     *
     * @param ConfirmAccountPasskeyOperationRequest|OperationRequest $request
     * @return ApiResult<ConfirmAccountPasskeyOperationResponse>
     */
    public function confirmAccountPasskey(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('confirmAccountPasskey', $request, $execution);
    }

    /**
     * 创建账号
     *
     * @param CreateAccountOperationRequest|OperationRequest $request
     * @return ApiResult<CreateAccountOperationResponse>
     */
    public function createAccount(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('createAccount', $request, $execution);
    }

    /**
     * 创建 Provider 授权会话
     *
     * @param CreateAccountAuthSessionOperationRequest|OperationRequest $request
     * @return ApiResult<CreateAccountAuthSessionOperationResponse>
     */
    public function createAccountAuthSession(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('createAccountAuthSession', $request, $execution);
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
        return $this->executeOperation('createApiKey', $request, $execution);
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
        return $this->executeOperation('createCall', $request, $execution);
    }

    /**
     * 添加联系人
     *
     * @param CreateContactOperationRequest|OperationRequest $request
     * @return ApiResult<CreateContactOperationResponse>
     */
    public function createContact(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('createContact', $request, $execution);
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
        return $this->executeOperation('createGroup', $request, $execution);
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
        return $this->executeOperation('createWebhookEndpoint', $request, $execution);
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
        return $this->executeOperation('deactivateWebhookEndpoint', $request, $execution);
    }

    /**
     * 删除账号
     *
     * @param DeleteAccountOperationRequest|OperationRequest $request
     * @return ApiResult<DeleteAccountOperationResponse>
     */
    public function deleteAccount(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('deleteAccount', $request, $execution);
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
        return $this->executeOperation('deleteConversationLabel', $request, $execution);
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
        return $this->executeOperation('deleteWebhookEndpoint', $request, $execution);
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
        return $this->executeOperation('editMessage', $request, $execution);
    }

    /**
     * 获取账号详情
     *
     * @param GetAccountOperationRequest|OperationRequest $request
     * @return ApiResult<GetAccountOperationResponse>
     */
    public function getAccount(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('getAccount', $request, $execution);
    }

    /**
     * 获取账号授权状态
     *
     * @param GetAccountAuthStateOperationRequest|OperationRequest $request
     * @return ApiResult<GetAccountAuthStateOperationResponse>
     */
    public function getAccountAuthState(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('getAccountAuthState', $request, $execution);
    }

    /**
     * 查询账号计费操作
     *
     * @param GetAccountOperationOperationRequest|OperationRequest $request
     * @return ApiResult<GetAccountOperationOperationResponse>
     */
    public function getAccountOperation(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('getAccountOperation', $request, $execution);
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
        return $this->executeOperation('getActiveCall', $request, $execution);
    }

    /**
     * 获取联系人详情
     *
     * @param GetContactOperationRequest|OperationRequest $request
     * @return ApiResult<GetContactOperationResponse>
     */
    public function getContact(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('getContact', $request, $execution);
    }

    /**
     * 查询联系人是否在联系人列表中
     *
     * @param GetContactMembershipOperationRequest|OperationRequest $request
     * @return ApiResult<GetContactMembershipOperationResponse>
     */
    public function getContactMembership(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('getContactMembership', $request, $execution);
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
        return $this->executeOperation('getConversation', $request, $execution);
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
        return $this->executeOperation('getGroup', $request, $execution);
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
        return $this->executeOperation('getGroupInviteCode', $request, $execution);
    }

    /**
     * 获取帖子详情
     *
     * @param GetPostOperationRequest|OperationRequest $request
     * @return ApiResult<GetPostOperationResponse>
     */
    public function getPost(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('getPost', $request, $execution);
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
        return $this->executeOperation('getWebhookEndpoint', $request, $execution);
    }

    /**
     * 获取当前 workspace
     *
     * @param GetWorkspaceOperationRequest|OperationRequest $request
     * @return ApiResult<GetWorkspaceOperationResponse>
     */
    public function getWorkspace(
        array|OperationRequest $request = [],
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('getWorkspace', $request, $execution);
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
        return $this->executeOperation('hangupCall', $request, $execution);
    }

    /**
     * 导入会话授权
     *
     * @param ImportAccountAuthSessionOperationRequest|OperationRequest $request
     * @return ApiResult<ImportAccountAuthSessionOperationResponse>
     */
    public function importAccountAuthSession(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('importAccountAuthSession', $request, $execution);
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
        return $this->executeOperation('leaveGroup', $request, $execution);
    }

    /**
     * 列出账号
     *
     * @param ListAccountsOperationRequest|OperationRequest $request
     * @return ApiResult<ListAccountsOperationResponse>
     */
    public function listAccounts(
        array|OperationRequest $request = [],
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('listAccounts', $request, $execution);
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
        return $this->executeOperation('listApiKeys', $request, $execution);
    }

    /**
     * 查询联系人黑名单
     *
     * @param ListContactBlocklistOperationRequest|OperationRequest $request
     * @return ApiResult<ListContactBlocklistOperationResponse>
     */
    public function listContactBlocklist(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('listContactBlocklist', $request, $execution);
    }

    /**
     * 列出联系人
     *
     * @param ListContactsOperationRequest|OperationRequest $request
     * @return ApiResult<ListContactsOperationResponse>
     */
    public function listContacts(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('listContacts', $request, $execution);
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
        return $this->executeOperation('listConversationLabels', $request, $execution);
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
        return $this->executeOperation('listConversationMembers', $request, $execution);
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
        return $this->executeOperation('listConversations', $request, $execution);
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
        return $this->executeOperation('listGroupJoinRequests', $request, $execution);
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
        return $this->executeOperation('listGroups', $request, $execution);
    }

    /**
     * 列出帖子的一级评论
     *
     * @param ListPostCommentsOperationRequest|OperationRequest $request
     * @return ApiResult<ListPostCommentsOperationResponse>
     */
    public function listPostComments(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('listPostComments', $request, $execution);
    }

    /**
     * 列出本账号帖子
     *
     * @param ListPostsOperationRequest|OperationRequest $request
     * @return ApiResult<ListPostsOperationResponse>
     */
    public function listPosts(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('listPosts', $request, $execution);
    }

    /**
     * 查询 provider 地区可用性
     *
     * @param ListProviderRegionsOperationRequest|OperationRequest $request
     * @return ApiResult<ListProviderRegionsOperationResponse>
     */
    public function listProviderRegions(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('listProviderRegions', $request, $execution);
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
        return $this->executeOperation('listWebhookEndpoints', $request, $execution);
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
        return $this->executeOperation('markConversationRead', $request, $execution);
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
        return $this->executeOperation('markConversationUnread', $request, $execution);
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
        return $this->executeOperation('muteConversation', $request, $execution);
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
        return $this->executeOperation('pinConversation', $request, $execution);
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
        return $this->executeOperation('pinMessage', $request, $execution);
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
        return $this->executeOperation('reactMessage', $request, $execution);
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
        return $this->executeOperation('reconnectAccountRuntime', $request, $execution);
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
        return $this->executeOperation('refreshAccountRuntime', $request, $execution);
    }

    /**
     * 发布一级评论或回复一级评论
     *
     * @param ReplyPostCommentOperationRequest|OperationRequest $request
     * @return ApiResult<ReplyPostCommentOperationResponse>
     */
    public function replyPostComment(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('replyPostComment', $request, $execution);
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
        return $this->executeOperation('requestConversationHistory', $request, $execution);
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
        return $this->executeOperation('revokeMessage', $request, $execution);
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
        return $this->executeOperation('rotateApiKey', $request, $execution);
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
        return $this->executeOperation('sendMessage', $request, $execution);
    }

    /**
     * 设置或清空联系人备注
     *
     * @param SetContactNoteOperationRequest|OperationRequest $request
     * @return ApiResult<SetContactNoteOperationResponse>
     */
    public function setContactNote(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('setContactNote', $request, $execution);
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
        return $this->executeOperation('setConversationLabelMembers', $request, $execution);
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
        return $this->executeOperation('setGroupJoinApprovalMode', $request, $execution);
    }

    /**
     * 启动验证码类授权
     *
     * @param StartAccountAuthOperationRequest|OperationRequest $request
     * @return ApiResult<StartAccountAuthOperationResponse>
     */
    public function startAccountAuth(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('startAccountAuth', $request, $execution);
    }

    /**
     * 启动二维码授权
     *
     * @param StartAccountQrAuthOperationRequest|OperationRequest $request
     * @return ApiResult<StartAccountQrAuthOperationResponse>
     */
    public function startAccountQrAuth(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('startAccountQrAuth', $request, $execution);
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
        return $this->executeOperation('startAccountRuntime', $request, $execution);
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
        return $this->executeOperation('stopAccountRuntime', $request, $execution);
    }

    /**
     * 提交验证码
     *
     * @param SubmitAccountAuthCodeOperationRequest|OperationRequest $request
     * @return ApiResult<SubmitAccountAuthCodeOperationResponse>
     */
    public function submitAccountAuthCode(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('submitAccountAuthCode', $request, $execution);
    }

    /**
     * 提交二次密码
     *
     * @param SubmitAccountAuthPasswordOperationRequest|OperationRequest $request
     * @return ApiResult<SubmitAccountAuthPasswordOperationResponse>
     */
    public function submitAccountAuthPassword(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('submitAccountAuthPassword', $request, $execution);
    }

    /**
     * 提交 Passkey 凭证响应
     *
     * @param SubmitAccountPasskeyResponseOperationRequest|OperationRequest $request
     * @return ApiResult<SubmitAccountPasskeyResponseOperationResponse>
     */
    public function submitAccountPasskeyResponse(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('submitAccountPasskeyResponse', $request, $execution);
    }

    /**
     * 解封联系人
     *
     * @param UnblockContactOperationRequest|OperationRequest $request
     * @return ApiResult<UnblockContactOperationResponse>
     */
    public function unblockContact(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('unblockContact', $request, $execution);
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
        return $this->executeOperation('unmuteConversation', $request, $execution);
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
        return $this->executeOperation('unpinConversation', $request, $execution);
    }

    /**
     * 更新账号
     *
     * @param UpdateAccountOperationRequest|OperationRequest $request
     * @return ApiResult<UpdateAccountOperationResponse>
     */
    public function updateAccount(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('updateAccount', $request, $execution);
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
        return $this->executeOperation('updateApiKeyStatus', $request, $execution);
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
        return $this->executeOperation('updateGroupInfo', $request, $execution);
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
        return $this->executeOperation('updateGroupJoinRequests', $request, $execution);
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
        return $this->executeOperation('updateGroupMembers', $request, $execution);
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
        return $this->executeOperation('updateWebhookEndpoint', $request, $execution);
    }

    /**
     * 更新当前 workspace
     *
     * @param UpdateWorkspaceOperationRequest|OperationRequest $request
     * @return ApiResult<UpdateWorkspaceOperationResponse>
     */
    public function updateWorkspace(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->executeOperation('updateWorkspace', $request, $execution);
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
        return $this->executeOperation('upsertConversationLabel', $request, $execution);
    }

    public function contacts(): ContactsApi
    {
        return new ContactsApi($this);
    }

    public function accountAuth(): AccountAuthApi
    {
        return new AccountAuthApi($this);
    }

    public function accounts(): AccountsApi
    {
        return new AccountsApi($this);
    }

    public function apiKeys(): ApiKeysApi
    {
        return new ApiKeysApi($this);
    }

    public function calls(): CallsApi
    {
        return new CallsApi($this);
    }

    public function groups(): GroupsApi
    {
        return new GroupsApi($this);
    }

    public function webhookEndpoints(): WebhookEndpointsApi
    {
        return new WebhookEndpointsApi($this);
    }

    public function conversations(): ConversationsApi
    {
        return new ConversationsApi($this);
    }

    public function messages(): MessagesApi
    {
        return new MessagesApi($this);
    }

    public function posts(): PostsApi
    {
        return new PostsApi($this);
    }

    public function workspace(): WorkspaceApi
    {
        return new WorkspaceApi($this);
    }

    public function providers(): ProvidersApi
    {
        return new ProvidersApi($this);
    }

    public function accountRuntime(): AccountRuntimeApi
    {
        return new AccountRuntimeApi($this);
    }
}
