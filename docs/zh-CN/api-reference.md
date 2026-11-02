<!-- 此文件由 composer generate 生成；修改契约、policy 或 generator 后重新生成。 -->

# Device API operation 参考

PHP SDK 公开全部 78 个 Device API operation。

`UnifyPort\Sdk\Generated\ApiTypes` 从同一 OpenAPI 生成 input/output component schema 别名，
以及每个 operation 的 request/response 别名。方法 PHPDoc 会导入对应别名；
response 别名描述 `ApiResult::$data` 中的完整成功响应 envelope（无响应体时为 `null`）。

| 资源 | operationId | 方法 | 路径 | Request alias | Response alias | 必填输入 | 重试 | 敏感数据 |
| --- | --- | --- | --- | --- | --- | --- | --- | --- |
| Contacts | `blockContact` | POST | `/v1/accounts/{account_id}/contacts/block` | `BlockContactOperationRequest` | `BlockContactOperationResponse` | 是 | 从不 | - |
| Account Auth | `cancelAccountAuth` | POST | `/v1/accounts/{account_id}/auth/cancel` | `CancelAccountAuthOperationRequest` | `CancelAccountAuthOperationResponse` | 是 | 从不 | - |
| Account Auth | `checkAccountQrAuth` | POST | `/v1/accounts/{account_id}/auth/qr/check` | `CheckAccountQrAuthOperationRequest` | `CheckAccountQrAuthOperationResponse` | 是 | 从不 | 输出 |
| Account Auth | `confirmAccountPasskey` | POST | `/v1/accounts/{account_id}/auth/passkey-confirm` | `ConfirmAccountPasskeyOperationRequest` | `ConfirmAccountPasskeyOperationResponse` | 是 | 从不 | 输出 |
| Accounts | `createAccount` | POST | `/v1/accounts` | `CreateAccountOperationRequest` | `CreateAccountOperationResponse` | 是 | 从不 | 输入/输出 |
| Account Auth | `createAccountAuthSession` | POST | `/v1/accounts/{account_id}/auth-sessions` | `CreateAccountAuthSessionOperationRequest` | `CreateAccountAuthSessionOperationResponse` | 是 | 从不 | 输出 |
| API Keys | `createApiKey` | POST | `/v1/api-keys` | `CreateApiKeyOperationRequest` | `CreateApiKeyOperationResponse` | 是 | 从不 | 输出 |
| Calls | `createCall` | POST | `/v1/calls` | `CreateCallOperationRequest` | `CreateCallOperationResponse` | 是 | 从不 | 输出 |
| Contacts | `createContact` | POST | `/v1/accounts/{account_id}/contacts/add` | `CreateContactOperationRequest` | `CreateContactOperationResponse` | 是 | 从不 | - |
| Groups | `createGroup` | POST | `/v1/accounts/{account_id}/groups/create` | `CreateGroupOperationRequest` | `CreateGroupOperationResponse` | 是 | 从不 | - |
| Webhook Endpoints | `createWebhookEndpoint` | POST | `/v1/webhook-endpoints` | `CreateWebhookEndpointOperationRequest` | `CreateWebhookEndpointOperationResponse` | 是 | 从不 | 输入 |
| Webhook Endpoints | `deactivateWebhookEndpoint` | POST | `/v1/webhook-endpoints/{endpoint_id}/deactivate` | `DeactivateWebhookEndpointOperationRequest` | `DeactivateWebhookEndpointOperationResponse` | 是 | 从不 | - |
| Accounts | `deleteAccount` | DELETE | `/v1/accounts/{account_id}` | `DeleteAccountOperationRequest` | `DeleteAccountOperationResponse` | 是 | 从不 | - |
| Conversations | `deleteConversationLabel` | POST | `/v1/accounts/{account_id}/conversations/labels/delete` | `DeleteConversationLabelOperationRequest` | `DeleteConversationLabelOperationResponse` | 是 | 从不 | - |
| Webhook Endpoints | `deleteWebhookEndpoint` | DELETE | `/v1/webhook-endpoints/{endpoint_id}` | `DeleteWebhookEndpointOperationRequest` | `DeleteWebhookEndpointOperationResponse` | 是 | 从不 | - |
| Messages | `editMessage` | POST | `/v1/messages/edit` | `EditMessageOperationRequest` | `EditMessageOperationResponse` | 是 | 从不 | - |
| Accounts | `getAccount` | GET | `/v1/accounts/{account_id}` | `GetAccountOperationRequest` | `GetAccountOperationResponse` | 是 | 安全 | 输出 |
| Account Auth | `getAccountAuthState` | GET | `/v1/accounts/{account_id}/auth` | `GetAccountAuthStateOperationRequest` | `GetAccountAuthStateOperationResponse` | 是 | 安全 | 输出 |
| Accounts | `getAccountOperation` | GET | `/v1/account-operations/{operation_id}` | `GetAccountOperationOperationRequest` | `GetAccountOperationOperationResponse` | 是 | 从不 | - |
| Calls | `getActiveCall` | GET | `/v1/calls/active` | `GetActiveCallOperationRequest` | `GetActiveCallOperationResponse` | 是 | 从不 | - |
| Contacts | `getContact` | GET | `/v1/accounts/{account_id}/contacts/info` | `GetContactOperationRequest` | `GetContactOperationResponse` | 是 | 安全 | - |
| Contacts | `getContactMembership` | GET | `/v1/accounts/{account_id}/contacts/membership` | `GetContactMembershipOperationRequest` | `GetContactMembershipOperationResponse` | 是 | 从不 | - |
| Conversations | `getConversation` | GET | `/v1/accounts/{account_id}/conversations/info` | `GetConversationOperationRequest` | `GetConversationOperationResponse` | 是 | 安全 | - |
| Groups | `getGroup` | GET | `/v1/accounts/{account_id}/groups/info` | `GetGroupOperationRequest` | `GetGroupOperationResponse` | 是 | 安全 | - |
| Groups | `getGroupInviteCode` | GET | `/v1/accounts/{account_id}/groups/invite-code` | `GetGroupInviteCodeOperationRequest` | `GetGroupInviteCodeOperationResponse` | 是 | 安全 | 输出 |
| Posts | `getPost` | POST | `/v1/accounts/{account_id}/posts/info` | `GetPostOperationRequest` | `GetPostOperationResponse` | 是 | 从不 | - |
| Webhook Endpoints | `getWebhookEndpoint` | GET | `/v1/webhook-endpoints/{endpoint_id}` | `GetWebhookEndpointOperationRequest` | `GetWebhookEndpointOperationResponse` | 是 | 安全 | - |
| Workspace | `getWorkspace` | GET | `/v1/workspace` | `GetWorkspaceOperationRequest` | `GetWorkspaceOperationResponse` | 否 | 安全 | - |
| Calls | `hangupCall` | POST | `/v1/calls/{call_id}/hangup` | `HangupCallOperationRequest` | `HangupCallOperationResponse` | 是 | 从不 | - |
| Account Auth | `importAccountAuthSession` | POST | `/v1/accounts/{account_id}/auth/session` | `ImportAccountAuthSessionOperationRequest` | `ImportAccountAuthSessionOperationResponse` | 是 | 从不 | 输入 |
| Groups | `leaveGroup` | POST | `/v1/accounts/{account_id}/groups/leave` | `LeaveGroupOperationRequest` | `LeaveGroupOperationResponse` | 是 | 从不 | - |
| Accounts | `listAccounts` | GET | `/v1/accounts` | `ListAccountsOperationRequest` | `ListAccountsOperationResponse` | 否 | 安全 | 输出 |
| API Keys | `listApiKeys` | GET | `/v1/api-keys` | `ListApiKeysOperationRequest` | `ListApiKeysOperationResponse` | 否 | 安全 | - |
| Contacts | `listContactBlocklist` | GET | `/v1/accounts/{account_id}/contacts/blocklist` | `ListContactBlocklistOperationRequest` | `ListContactBlocklistOperationResponse` | 是 | 安全 | - |
| Contacts | `listContacts` | GET | `/v1/accounts/{account_id}/contacts` | `ListContactsOperationRequest` | `ListContactsOperationResponse` | 是 | 安全 | - |
| Conversations | `listConversationLabels` | GET | `/v1/accounts/{account_id}/conversations/labels` | `ListConversationLabelsOperationRequest` | `ListConversationLabelsOperationResponse` | 是 | 安全 | - |
| Conversations | `listConversationMembers` | GET | `/v1/accounts/{account_id}/conversations/members` | `ListConversationMembersOperationRequest` | `ListConversationMembersOperationResponse` | 是 | 安全 | - |
| Conversations | `listConversations` | GET | `/v1/accounts/{account_id}/conversations` | `ListConversationsOperationRequest` | `ListConversationsOperationResponse` | 是 | 安全 | - |
| Groups | `listGroupJoinRequests` | GET | `/v1/accounts/{account_id}/groups/join-requests` | `ListGroupJoinRequestsOperationRequest` | `ListGroupJoinRequestsOperationResponse` | 是 | 安全 | - |
| Groups | `listGroups` | GET | `/v1/accounts/{account_id}/groups` | `ListGroupsOperationRequest` | `ListGroupsOperationResponse` | 是 | 安全 | - |
| Posts | `listPostComments` | POST | `/v1/accounts/{account_id}/posts/comments/list` | `ListPostCommentsOperationRequest` | `ListPostCommentsOperationResponse` | 是 | 从不 | - |
| Posts | `listPosts` | GET | `/v1/accounts/{account_id}/posts` | `ListPostsOperationRequest` | `ListPostsOperationResponse` | 是 | 从不 | - |
| Providers | `listProviderRegions` | GET | `/v1/providers/{provider}/regions` | `ListProviderRegionsOperationRequest` | `ListProviderRegionsOperationResponse` | 是 | 安全 | - |
| Webhook Endpoints | `listWebhookEndpoints` | GET | `/v1/webhook-endpoints` | `ListWebhookEndpointsOperationRequest` | `ListWebhookEndpointsOperationResponse` | 否 | 安全 | - |
| Conversations | `markConversationRead` | POST | `/v1/accounts/{account_id}/conversations/read` | `MarkConversationReadOperationRequest` | `MarkConversationReadOperationResponse` | 是 | 从不 | - |
| Conversations | `markConversationUnread` | POST | `/v1/accounts/{account_id}/conversations/unread` | `MarkConversationUnreadOperationRequest` | `MarkConversationUnreadOperationResponse` | 是 | 从不 | - |
| Conversations | `muteConversation` | POST | `/v1/accounts/{account_id}/conversations/mute` | `MuteConversationOperationRequest` | `MuteConversationOperationResponse` | 是 | 从不 | - |
| Conversations | `pinConversation` | POST | `/v1/accounts/{account_id}/conversations/pin` | `PinConversationOperationRequest` | `PinConversationOperationResponse` | 是 | 从不 | - |
| Messages | `pinMessage` | POST | `/v1/messages/pin` | `PinMessageOperationRequest` | `PinMessageOperationResponse` | 是 | 从不 | - |
| Messages | `reactMessage` | POST | `/v1/messages/reaction` | `ReactMessageOperationRequest` | `ReactMessageOperationResponse` | 是 | 从不 | - |
| Account Runtime | `reconnectAccountRuntime` | POST | `/v1/accounts/{account_id}/runtime/reconnect` | `ReconnectAccountRuntimeOperationRequest` | `ReconnectAccountRuntimeOperationResponse` | 是 | 从不 | - |
| Account Runtime | `refreshAccountRuntime` | POST | `/v1/accounts/{account_id}/runtime/refresh` | `RefreshAccountRuntimeOperationRequest` | `RefreshAccountRuntimeOperationResponse` | 是 | 从不 | - |
| Posts | `replyPostComment` | POST | `/v1/accounts/{account_id}/posts/comments/reply` | `ReplyPostCommentOperationRequest` | `ReplyPostCommentOperationResponse` | 是 | 从不 | - |
| Conversations | `requestConversationHistory` | POST | `/v1/accounts/{account_id}/conversations/history/request` | `RequestConversationHistoryOperationRequest` | `RequestConversationHistoryOperationResponse` | 是 | 从不 | - |
| Messages | `revokeMessage` | POST | `/v1/messages/revoke` | `RevokeMessageOperationRequest` | `RevokeMessageOperationResponse` | 是 | 从不 | - |
| API Keys | `rotateApiKey` | POST | `/v1/api-keys/{key_id}/rotate` | `RotateApiKeyOperationRequest` | `RotateApiKeyOperationResponse` | 是 | 从不 | 输出 |
| Messages | `sendMessage` | POST | `/v1/messages` | `SendMessageOperationRequest` | `SendMessageOperationResponse` | 是 | 从不 | 输入/输出 |
| Contacts | `setContactNote` | POST | `/v1/accounts/{account_id}/contacts/note` | `SetContactNoteOperationRequest` | `SetContactNoteOperationResponse` | 是 | 从不 | - |
| Conversations | `setConversationLabelMembers` | POST | `/v1/accounts/{account_id}/conversations/labels` | `SetConversationLabelMembersOperationRequest` | `SetConversationLabelMembersOperationResponse` | 是 | 从不 | - |
| Groups | `setGroupJoinApprovalMode` | POST | `/v1/accounts/{account_id}/groups/join-approval-mode` | `SetGroupJoinApprovalModeOperationRequest` | `SetGroupJoinApprovalModeOperationResponse` | 是 | 从不 | - |
| Account Auth | `startAccountAuth` | POST | `/v1/accounts/{account_id}/auth/start` | `StartAccountAuthOperationRequest` | `StartAccountAuthOperationResponse` | 是 | 从不 | 输出 |
| Account Auth | `startAccountQrAuth` | POST | `/v1/accounts/{account_id}/auth/qr/start` | `StartAccountQrAuthOperationRequest` | `StartAccountQrAuthOperationResponse` | 是 | 从不 | 输出 |
| Account Runtime | `startAccountRuntime` | POST | `/v1/accounts/{account_id}/runtime/start` | `StartAccountRuntimeOperationRequest` | `StartAccountRuntimeOperationResponse` | 是 | 从不 | - |
| Account Runtime | `stopAccountRuntime` | POST | `/v1/accounts/{account_id}/runtime/stop` | `StopAccountRuntimeOperationRequest` | `StopAccountRuntimeOperationResponse` | 是 | 从不 | - |
| Account Auth | `submitAccountAuthCode` | POST | `/v1/accounts/{account_id}/auth/code` | `SubmitAccountAuthCodeOperationRequest` | `SubmitAccountAuthCodeOperationResponse` | 是 | 从不 | 输入 |
| Account Auth | `submitAccountAuthPassword` | POST | `/v1/accounts/{account_id}/auth/password` | `SubmitAccountAuthPasswordOperationRequest` | `SubmitAccountAuthPasswordOperationResponse` | 是 | 从不 | 输入 |
| Account Auth | `submitAccountPasskeyResponse` | POST | `/v1/accounts/{account_id}/auth/passkey-response` | `SubmitAccountPasskeyResponseOperationRequest` | `SubmitAccountPasskeyResponseOperationResponse` | 是 | 从不 | 输入/输出 |
| Contacts | `unblockContact` | POST | `/v1/accounts/{account_id}/contacts/unblock` | `UnblockContactOperationRequest` | `UnblockContactOperationResponse` | 是 | 从不 | - |
| Conversations | `unmuteConversation` | POST | `/v1/accounts/{account_id}/conversations/unmute` | `UnmuteConversationOperationRequest` | `UnmuteConversationOperationResponse` | 是 | 从不 | - |
| Conversations | `unpinConversation` | POST | `/v1/accounts/{account_id}/conversations/unpin` | `UnpinConversationOperationRequest` | `UnpinConversationOperationResponse` | 是 | 从不 | - |
| Accounts | `updateAccount` | PATCH | `/v1/accounts/{account_id}` | `UpdateAccountOperationRequest` | `UpdateAccountOperationResponse` | 是 | 从不 | 输入/输出 |
| API Keys | `updateApiKeyStatus` | PATCH | `/v1/api-keys/{key_id}` | `UpdateApiKeyStatusOperationRequest` | `UpdateApiKeyStatusOperationResponse` | 是 | 从不 | - |
| Groups | `updateGroupInfo` | POST | `/v1/accounts/{account_id}/groups/update-info` | `UpdateGroupInfoOperationRequest` | `UpdateGroupInfoOperationResponse` | 是 | 从不 | - |
| Groups | `updateGroupJoinRequests` | POST | `/v1/accounts/{account_id}/groups/join-requests/update` | `UpdateGroupJoinRequestsOperationRequest` | `UpdateGroupJoinRequestsOperationResponse` | 是 | 从不 | - |
| Groups | `updateGroupMembers` | POST | `/v1/accounts/{account_id}/groups/members` | `UpdateGroupMembersOperationRequest` | `UpdateGroupMembersOperationResponse` | 是 | 从不 | - |
| Webhook Endpoints | `updateWebhookEndpoint` | PATCH | `/v1/webhook-endpoints/{endpoint_id}` | `UpdateWebhookEndpointOperationRequest` | `UpdateWebhookEndpointOperationResponse` | 是 | 从不 | 输入 |
| Workspace | `updateWorkspace` | PATCH | `/v1/workspace` | `UpdateWorkspaceOperationRequest` | `UpdateWorkspaceOperationResponse` | 是 | 从不 | - |
| Conversations | `upsertConversationLabel` | POST | `/v1/accounts/{account_id}/conversations/labels/upsert` | `UpsertConversationLabelOperationRequest` | `UpsertConversationLabelOperationResponse` | 是 | 从不 | - |
