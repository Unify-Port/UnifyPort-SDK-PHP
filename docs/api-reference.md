<!-- 此文件由 composer generate 生成；修改契约、policy 或 generator 后重新生成。 -->

# Device API operation reference

The PHP SDK exposes all 78 public Device API operations.

`UnifyPort\Sdk\Generated\ApiTypes` generates input/output component schema aliases and per-operation
request/response aliases from the same OpenAPI document. Method PHPDoc imports the matching aliases;
a response alias describes the complete success envelope in `ApiResult::$data`
(`null` for a response without content).

| Resource | operationId | Method | Path | Request alias | Response alias | Required input | Retry | Secret |
| --- | --- | --- | --- | --- | --- | --- | --- | --- |
| Contacts | `blockContact` | POST | `/v1/accounts/{account_id}/contacts/block` | `BlockContactOperationRequest` | `BlockContactOperationResponse` | yes | never | - |
| Account Auth | `cancelAccountAuth` | POST | `/v1/accounts/{account_id}/auth/cancel` | `CancelAccountAuthOperationRequest` | `CancelAccountAuthOperationResponse` | yes | never | - |
| Account Auth | `checkAccountQrAuth` | POST | `/v1/accounts/{account_id}/auth/qr/check` | `CheckAccountQrAuthOperationRequest` | `CheckAccountQrAuthOperationResponse` | yes | never | output |
| Account Auth | `confirmAccountPasskey` | POST | `/v1/accounts/{account_id}/auth/passkey-confirm` | `ConfirmAccountPasskeyOperationRequest` | `ConfirmAccountPasskeyOperationResponse` | yes | never | output |
| Accounts | `createAccount` | POST | `/v1/accounts` | `CreateAccountOperationRequest` | `CreateAccountOperationResponse` | yes | never | input/output |
| Account Auth | `createAccountAuthSession` | POST | `/v1/accounts/{account_id}/auth-sessions` | `CreateAccountAuthSessionOperationRequest` | `CreateAccountAuthSessionOperationResponse` | yes | never | output |
| API Keys | `createApiKey` | POST | `/v1/api-keys` | `CreateApiKeyOperationRequest` | `CreateApiKeyOperationResponse` | yes | never | output |
| Calls | `createCall` | POST | `/v1/calls` | `CreateCallOperationRequest` | `CreateCallOperationResponse` | yes | never | output |
| Contacts | `createContact` | POST | `/v1/accounts/{account_id}/contacts/add` | `CreateContactOperationRequest` | `CreateContactOperationResponse` | yes | never | - |
| Groups | `createGroup` | POST | `/v1/accounts/{account_id}/groups/create` | `CreateGroupOperationRequest` | `CreateGroupOperationResponse` | yes | never | - |
| Webhook Endpoints | `createWebhookEndpoint` | POST | `/v1/webhook-endpoints` | `CreateWebhookEndpointOperationRequest` | `CreateWebhookEndpointOperationResponse` | yes | never | input |
| Webhook Endpoints | `deactivateWebhookEndpoint` | POST | `/v1/webhook-endpoints/{endpoint_id}/deactivate` | `DeactivateWebhookEndpointOperationRequest` | `DeactivateWebhookEndpointOperationResponse` | yes | never | - |
| Accounts | `deleteAccount` | DELETE | `/v1/accounts/{account_id}` | `DeleteAccountOperationRequest` | `DeleteAccountOperationResponse` | yes | never | - |
| Conversations | `deleteConversationLabel` | POST | `/v1/accounts/{account_id}/conversations/labels/delete` | `DeleteConversationLabelOperationRequest` | `DeleteConversationLabelOperationResponse` | yes | never | - |
| Webhook Endpoints | `deleteWebhookEndpoint` | DELETE | `/v1/webhook-endpoints/{endpoint_id}` | `DeleteWebhookEndpointOperationRequest` | `DeleteWebhookEndpointOperationResponse` | yes | never | - |
| Messages | `editMessage` | POST | `/v1/messages/edit` | `EditMessageOperationRequest` | `EditMessageOperationResponse` | yes | never | - |
| Accounts | `getAccount` | GET | `/v1/accounts/{account_id}` | `GetAccountOperationRequest` | `GetAccountOperationResponse` | yes | safe | output |
| Account Auth | `getAccountAuthState` | GET | `/v1/accounts/{account_id}/auth` | `GetAccountAuthStateOperationRequest` | `GetAccountAuthStateOperationResponse` | yes | safe | output |
| Accounts | `getAccountOperation` | GET | `/v1/account-operations/{operation_id}` | `GetAccountOperationOperationRequest` | `GetAccountOperationOperationResponse` | yes | never | - |
| Calls | `getActiveCall` | GET | `/v1/calls/active` | `GetActiveCallOperationRequest` | `GetActiveCallOperationResponse` | yes | never | - |
| Contacts | `getContact` | GET | `/v1/accounts/{account_id}/contacts/info` | `GetContactOperationRequest` | `GetContactOperationResponse` | yes | safe | - |
| Contacts | `getContactMembership` | GET | `/v1/accounts/{account_id}/contacts/membership` | `GetContactMembershipOperationRequest` | `GetContactMembershipOperationResponse` | yes | never | - |
| Conversations | `getConversation` | GET | `/v1/accounts/{account_id}/conversations/info` | `GetConversationOperationRequest` | `GetConversationOperationResponse` | yes | safe | - |
| Groups | `getGroup` | GET | `/v1/accounts/{account_id}/groups/info` | `GetGroupOperationRequest` | `GetGroupOperationResponse` | yes | safe | - |
| Groups | `getGroupInviteCode` | GET | `/v1/accounts/{account_id}/groups/invite-code` | `GetGroupInviteCodeOperationRequest` | `GetGroupInviteCodeOperationResponse` | yes | safe | output |
| Posts | `getPost` | POST | `/v1/accounts/{account_id}/posts/info` | `GetPostOperationRequest` | `GetPostOperationResponse` | yes | never | - |
| Webhook Endpoints | `getWebhookEndpoint` | GET | `/v1/webhook-endpoints/{endpoint_id}` | `GetWebhookEndpointOperationRequest` | `GetWebhookEndpointOperationResponse` | yes | safe | - |
| Workspace | `getWorkspace` | GET | `/v1/workspace` | `GetWorkspaceOperationRequest` | `GetWorkspaceOperationResponse` | no | safe | - |
| Calls | `hangupCall` | POST | `/v1/calls/{call_id}/hangup` | `HangupCallOperationRequest` | `HangupCallOperationResponse` | yes | never | - |
| Account Auth | `importAccountAuthSession` | POST | `/v1/accounts/{account_id}/auth/session` | `ImportAccountAuthSessionOperationRequest` | `ImportAccountAuthSessionOperationResponse` | yes | never | input |
| Groups | `leaveGroup` | POST | `/v1/accounts/{account_id}/groups/leave` | `LeaveGroupOperationRequest` | `LeaveGroupOperationResponse` | yes | never | - |
| Accounts | `listAccounts` | GET | `/v1/accounts` | `ListAccountsOperationRequest` | `ListAccountsOperationResponse` | no | safe | output |
| API Keys | `listApiKeys` | GET | `/v1/api-keys` | `ListApiKeysOperationRequest` | `ListApiKeysOperationResponse` | no | safe | - |
| Contacts | `listContactBlocklist` | GET | `/v1/accounts/{account_id}/contacts/blocklist` | `ListContactBlocklistOperationRequest` | `ListContactBlocklistOperationResponse` | yes | safe | - |
| Contacts | `listContacts` | GET | `/v1/accounts/{account_id}/contacts` | `ListContactsOperationRequest` | `ListContactsOperationResponse` | yes | safe | - |
| Conversations | `listConversationLabels` | GET | `/v1/accounts/{account_id}/conversations/labels` | `ListConversationLabelsOperationRequest` | `ListConversationLabelsOperationResponse` | yes | safe | - |
| Conversations | `listConversationMembers` | GET | `/v1/accounts/{account_id}/conversations/members` | `ListConversationMembersOperationRequest` | `ListConversationMembersOperationResponse` | yes | safe | - |
| Conversations | `listConversations` | GET | `/v1/accounts/{account_id}/conversations` | `ListConversationsOperationRequest` | `ListConversationsOperationResponse` | yes | safe | - |
| Groups | `listGroupJoinRequests` | GET | `/v1/accounts/{account_id}/groups/join-requests` | `ListGroupJoinRequestsOperationRequest` | `ListGroupJoinRequestsOperationResponse` | yes | safe | - |
| Groups | `listGroups` | GET | `/v1/accounts/{account_id}/groups` | `ListGroupsOperationRequest` | `ListGroupsOperationResponse` | yes | safe | - |
| Posts | `listPostComments` | POST | `/v1/accounts/{account_id}/posts/comments/list` | `ListPostCommentsOperationRequest` | `ListPostCommentsOperationResponse` | yes | never | - |
| Posts | `listPosts` | GET | `/v1/accounts/{account_id}/posts` | `ListPostsOperationRequest` | `ListPostsOperationResponse` | yes | never | - |
| Providers | `listProviderRegions` | GET | `/v1/providers/{provider}/regions` | `ListProviderRegionsOperationRequest` | `ListProviderRegionsOperationResponse` | yes | safe | - |
| Webhook Endpoints | `listWebhookEndpoints` | GET | `/v1/webhook-endpoints` | `ListWebhookEndpointsOperationRequest` | `ListWebhookEndpointsOperationResponse` | no | safe | - |
| Conversations | `markConversationRead` | POST | `/v1/accounts/{account_id}/conversations/read` | `MarkConversationReadOperationRequest` | `MarkConversationReadOperationResponse` | yes | never | - |
| Conversations | `markConversationUnread` | POST | `/v1/accounts/{account_id}/conversations/unread` | `MarkConversationUnreadOperationRequest` | `MarkConversationUnreadOperationResponse` | yes | never | - |
| Conversations | `muteConversation` | POST | `/v1/accounts/{account_id}/conversations/mute` | `MuteConversationOperationRequest` | `MuteConversationOperationResponse` | yes | never | - |
| Conversations | `pinConversation` | POST | `/v1/accounts/{account_id}/conversations/pin` | `PinConversationOperationRequest` | `PinConversationOperationResponse` | yes | never | - |
| Messages | `pinMessage` | POST | `/v1/messages/pin` | `PinMessageOperationRequest` | `PinMessageOperationResponse` | yes | never | - |
| Messages | `reactMessage` | POST | `/v1/messages/reaction` | `ReactMessageOperationRequest` | `ReactMessageOperationResponse` | yes | never | - |
| Account Runtime | `reconnectAccountRuntime` | POST | `/v1/accounts/{account_id}/runtime/reconnect` | `ReconnectAccountRuntimeOperationRequest` | `ReconnectAccountRuntimeOperationResponse` | yes | never | - |
| Account Runtime | `refreshAccountRuntime` | POST | `/v1/accounts/{account_id}/runtime/refresh` | `RefreshAccountRuntimeOperationRequest` | `RefreshAccountRuntimeOperationResponse` | yes | never | - |
| Posts | `replyPostComment` | POST | `/v1/accounts/{account_id}/posts/comments/reply` | `ReplyPostCommentOperationRequest` | `ReplyPostCommentOperationResponse` | yes | never | - |
| Conversations | `requestConversationHistory` | POST | `/v1/accounts/{account_id}/conversations/history/request` | `RequestConversationHistoryOperationRequest` | `RequestConversationHistoryOperationResponse` | yes | never | - |
| Messages | `revokeMessage` | POST | `/v1/messages/revoke` | `RevokeMessageOperationRequest` | `RevokeMessageOperationResponse` | yes | never | - |
| API Keys | `rotateApiKey` | POST | `/v1/api-keys/{key_id}/rotate` | `RotateApiKeyOperationRequest` | `RotateApiKeyOperationResponse` | yes | never | output |
| Messages | `sendMessage` | POST | `/v1/messages` | `SendMessageOperationRequest` | `SendMessageOperationResponse` | yes | never | input/output |
| Contacts | `setContactNote` | POST | `/v1/accounts/{account_id}/contacts/note` | `SetContactNoteOperationRequest` | `SetContactNoteOperationResponse` | yes | never | - |
| Conversations | `setConversationLabelMembers` | POST | `/v1/accounts/{account_id}/conversations/labels` | `SetConversationLabelMembersOperationRequest` | `SetConversationLabelMembersOperationResponse` | yes | never | - |
| Groups | `setGroupJoinApprovalMode` | POST | `/v1/accounts/{account_id}/groups/join-approval-mode` | `SetGroupJoinApprovalModeOperationRequest` | `SetGroupJoinApprovalModeOperationResponse` | yes | never | - |
| Account Auth | `startAccountAuth` | POST | `/v1/accounts/{account_id}/auth/start` | `StartAccountAuthOperationRequest` | `StartAccountAuthOperationResponse` | yes | never | output |
| Account Auth | `startAccountQrAuth` | POST | `/v1/accounts/{account_id}/auth/qr/start` | `StartAccountQrAuthOperationRequest` | `StartAccountQrAuthOperationResponse` | yes | never | output |
| Account Runtime | `startAccountRuntime` | POST | `/v1/accounts/{account_id}/runtime/start` | `StartAccountRuntimeOperationRequest` | `StartAccountRuntimeOperationResponse` | yes | never | - |
| Account Runtime | `stopAccountRuntime` | POST | `/v1/accounts/{account_id}/runtime/stop` | `StopAccountRuntimeOperationRequest` | `StopAccountRuntimeOperationResponse` | yes | never | - |
| Account Auth | `submitAccountAuthCode` | POST | `/v1/accounts/{account_id}/auth/code` | `SubmitAccountAuthCodeOperationRequest` | `SubmitAccountAuthCodeOperationResponse` | yes | never | input |
| Account Auth | `submitAccountAuthPassword` | POST | `/v1/accounts/{account_id}/auth/password` | `SubmitAccountAuthPasswordOperationRequest` | `SubmitAccountAuthPasswordOperationResponse` | yes | never | input |
| Account Auth | `submitAccountPasskeyResponse` | POST | `/v1/accounts/{account_id}/auth/passkey-response` | `SubmitAccountPasskeyResponseOperationRequest` | `SubmitAccountPasskeyResponseOperationResponse` | yes | never | input/output |
| Contacts | `unblockContact` | POST | `/v1/accounts/{account_id}/contacts/unblock` | `UnblockContactOperationRequest` | `UnblockContactOperationResponse` | yes | never | - |
| Conversations | `unmuteConversation` | POST | `/v1/accounts/{account_id}/conversations/unmute` | `UnmuteConversationOperationRequest` | `UnmuteConversationOperationResponse` | yes | never | - |
| Conversations | `unpinConversation` | POST | `/v1/accounts/{account_id}/conversations/unpin` | `UnpinConversationOperationRequest` | `UnpinConversationOperationResponse` | yes | never | - |
| Accounts | `updateAccount` | PATCH | `/v1/accounts/{account_id}` | `UpdateAccountOperationRequest` | `UpdateAccountOperationResponse` | yes | never | input/output |
| API Keys | `updateApiKeyStatus` | PATCH | `/v1/api-keys/{key_id}` | `UpdateApiKeyStatusOperationRequest` | `UpdateApiKeyStatusOperationResponse` | yes | never | - |
| Groups | `updateGroupInfo` | POST | `/v1/accounts/{account_id}/groups/update-info` | `UpdateGroupInfoOperationRequest` | `UpdateGroupInfoOperationResponse` | yes | never | - |
| Groups | `updateGroupJoinRequests` | POST | `/v1/accounts/{account_id}/groups/join-requests/update` | `UpdateGroupJoinRequestsOperationRequest` | `UpdateGroupJoinRequestsOperationResponse` | yes | never | - |
| Groups | `updateGroupMembers` | POST | `/v1/accounts/{account_id}/groups/members` | `UpdateGroupMembersOperationRequest` | `UpdateGroupMembersOperationResponse` | yes | never | - |
| Webhook Endpoints | `updateWebhookEndpoint` | PATCH | `/v1/webhook-endpoints/{endpoint_id}` | `UpdateWebhookEndpointOperationRequest` | `UpdateWebhookEndpointOperationResponse` | yes | never | input |
| Workspace | `updateWorkspace` | PATCH | `/v1/workspace` | `UpdateWorkspaceOperationRequest` | `UpdateWorkspaceOperationResponse` | yes | never | - |
| Conversations | `upsertConversationLabel` | POST | `/v1/accounts/{account_id}/conversations/labels/upsert` | `UpsertConversationLabelOperationRequest` | `UpsertConversationLabelOperationResponse` | yes | never | - |
