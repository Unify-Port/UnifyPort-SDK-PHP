<?php

/**
 * 此文件由 `composer generate` 根据 contracts/device.openapi.yaml 生成。
 * 生成边界用于保持 PHP SDK 与公开 Node SDK 同步；请修改来源，不要手工编辑。
 */

declare(strict_types=1);

namespace UnifyPort\Sdk\Generated;

// PHPStan union alias 跨行会被 phpdoc-parser 误判，因此仅豁免生成类型块的软行长限制。
// phpcs:disable Generic.Files.LineLength.TooLong
/**
 * OpenAPI 是唯一类型来源；标记类不创建运行时 DTO。
 * @phpstan-type APIKeyInput array{ id: string, name: string, key_prefix: string, status: 'active'|'inactive',
 *     ...<string, mixed>}
 * @phpstan-type APIKeyOutput array{ id: string, name: string, key_prefix: string, status: 'active'|'inactive',
 *     ...<string, mixed>}
 * @phpstan-type APIKeyCreateRequestInput array{ name: string, prefix?: string, ...<string, mixed>}
 * @phpstan-type APIKeyCreateRequestOutput array{ name: string, prefix?: string, ...<string, mixed>}
 * @phpstan-type APIKeyCreateResultInput array{ key: APIKeyInput, api_key: string, ...<string, mixed>}
 * @phpstan-type APIKeyCreateResultOutput array{ key: APIKeyOutput, api_key: string, ...<string, mixed>}
 * @phpstan-type APIKeyStatusUpdateRequestInput array{ status: 'active'|'inactive', ...<string, mixed>}
 * @phpstan-type APIKeyStatusUpdateRequestOutput array{ status: 'active'|'inactive', ...<string, mixed>}
 * @phpstan-type AccountInput array{ id: string, name: string, provider: ProviderNameInput, region: string,
 *     status: string, runtime_status?: RuntimeStatusInput, auth_mode?: string, capabilities?: list<string>,
 *     metadata?: FreeFormObjectInput, provider_account_ref?: string, proxy?: FreeFormObjectInput,
 *     provider_profile?: FreeFormObjectInput, ...<string, mixed>}
 * @phpstan-type AccountOutput array{ id: string, name: string, provider: ProviderNameOutput, region: string,
 *     status: string, runtime_status?: RuntimeStatusOutput, auth_mode?: string, capabilities?: list<string>,
 *     metadata?: FreeFormObjectOutput, provider_account_ref?: string, proxy?: FreeFormObjectOutput,
 *     provider_profile?: FreeFormObjectOutput, ...<string, mixed>}
 * @phpstan-type AccountRequestInput array{ name?: string, provider: ProviderNameInput, region: string,
 *     status?: string, runtime_status?: RuntimeStatusInput, auth_mode?: string, capabilities?: list<string>,
 *     metadata?: FreeFormObjectInput, provider_account_ref?: string, provider_data?: FreeFormObjectInput,
 *     proxy?: FreeFormObjectInput, ...<string, mixed>}
 * @phpstan-type AccountRequestOutput array{ name?: string, provider: ProviderNameOutput, region: string,
 *     status?: string, runtime_status?: RuntimeStatusOutput, auth_mode?: string, capabilities?: list<string>,
 *     metadata?: FreeFormObjectOutput, provider_account_ref?: string, provider_data?: FreeFormObjectOutput,
 *     proxy?: FreeFormObjectOutput, ...<string, mixed>}
 * @phpstan-type AccountSessionInput array{ account_id: string, status: string, auth_fields?: list<AuthFieldInput>,
 *     auth_payload?: FreeFormObjectInput, expires_at?: string, last_error?: string, ...<string, mixed>}
 * @phpstan-type AccountSessionOutput array{ account_id: string, status: string,
 *     auth_fields?: list<AuthFieldOutput>, auth_payload?: FreeFormObjectOutput, expires_at?: string,
 *     last_error?: string, ...<string, mixed>}
 * @phpstan-type AuthFieldInput array{ type: string, required: bool, label?: string, placeholder?: string,
 *     ...<string, mixed>}
 * @phpstan-type AuthFieldOutput array{ type: string, required: bool, label?: string, placeholder?: string,
 *     ...<string, mixed>}
 * @phpstan-type ContactInput array{ id: string, conversation_id: string, display_name: string, avatar_url: string,
 *     provider_user_id: string, is_blocked?: bool, extra?: FreeFormObjectInput, ...<string, mixed>}
 * @phpstan-type ContactOutput array{ id: string, conversation_id: string, display_name: string, avatar_url: string,
 *     provider_user_id: string, is_blocked?: bool, extra?: FreeFormObjectOutput, ...<string, mixed>}
 * @phpstan-type ContactBlocklistResultInput array{ blocklist: list<string>, dhash?: string, ...<string, mixed>}
 * @phpstan-type ContactBlocklistResultOutput array{ blocklist: list<string>, dhash?: string, ...<string, mixed>}
 * @phpstan-type ContactCardInput array{ name: string, phones?: list<ContactPhoneInput>,
 *     emails?: list<ContactEmailInput>, organization?: string, title?: string, ...<string, mixed>}
 * @phpstan-type ContactCardOutput array{ name: string, phones?: list<ContactPhoneOutput>,
 *     emails?: list<ContactEmailOutput>, organization?: string, title?: string, ...<string, mixed>}
 * @phpstan-type ContactEmailInput array{ address: string, type?: string, ...<string, mixed>}
 * @phpstan-type ContactEmailOutput array{ address: string, type?: string, ...<string, mixed>}
 * @phpstan-type ContactIdRequestInput array{ contact_id: string, ...<string, mixed>}
 * @phpstan-type ContactIdRequestOutput array{ contact_id: string, ...<string, mixed>}
 * @phpstan-type ContactListResultInput array{ items: list<ContactInput>, next_cursor?: string, has_more: bool,
 *     ...<string, mixed>}
 * @phpstan-type ContactListResultOutput array{ items: list<ContactOutput>, next_cursor?: string, has_more: bool,
 *     ...<string, mixed>}
 * @phpstan-type ContactNoteRequestInput array{ contact_id: string, note: string, ...<string, mixed>}
 * @phpstan-type ContactNoteRequestOutput array{ contact_id: string, note: string, ...<string, mixed>}
 * @phpstan-type ContactPhoneInput array{ number: string, type?: string, ...<string, mixed>}
 * @phpstan-type ContactPhoneOutput array{ number: string, type?: string, ...<string, mixed>}
 * @phpstan-type ConversationInput array{ conversation_id: string, type: ConversationTypeInput, title: string,
 *     username?: string, avatar_url: string, description?: string, last_message_at?: string,
 *     last_message_text?: string, unread_count: int, members_count?: int, subscribers_count?: int, is_pinned: bool,
 *     is_muted: bool, created_at?: string, extra?: FreeFormObjectInput, ...<string, mixed>}
 * @phpstan-type ConversationOutput array{ conversation_id: string, type: ConversationTypeOutput, title: string,
 *     username?: string, avatar_url: string, description?: string, last_message_at?: string,
 *     last_message_text?: string, unread_count: int|string, members_count?: int|string,
 *     subscribers_count?: int|string, is_pinned: bool, is_muted: bool, created_at?: string,
 *     extra?: FreeFormObjectOutput, ...<string, mixed>}
 * @phpstan-type ConversationIdRequestInput array{ conversation_id: string, ...<string, mixed>}
 * @phpstan-type ConversationIdRequestOutput array{ conversation_id: string, ...<string, mixed>}
 * @phpstan-type ConversationLabelInput array{ id: string, name: string, ...<string, mixed>}
 * @phpstan-type ConversationLabelOutput array{ id: string, name: string, ...<string, mixed>}
 * @phpstan-type ConversationLabelDeleteRequestInput array{ label_id: string, ...<string, mixed>}
 * @phpstan-type ConversationLabelDeleteRequestOutput array{ label_id: string, ...<string, mixed>}
 * @phpstan-type ConversationLabelDeleteResultInput array{ label_id: string, deleted: true, ...<string, mixed>}
 * @phpstan-type ConversationLabelDeleteResultOutput array{ label_id: string, deleted: true, ...<string, mixed>}
 * @phpstan-type ConversationLabelListResultInput array{ items: list<ConversationLabelInput>, next_cursor?: string,
 *     has_more: bool, ...<string, mixed>}
 * @phpstan-type ConversationLabelListResultOutput array{ items: list<ConversationLabelOutput>,
 *     next_cursor?: string, has_more: bool, ...<string, mixed>}
 * @phpstan-type ConversationLabelMembersRequestInput array{ label_id: string, action: 'add'|'remove',
 *     conversation_ids: list<string>, ...<string, mixed>}
 * @phpstan-type ConversationLabelMembersRequestOutput array{ label_id: string, action: 'add'|'remove',
 *     conversation_ids: list<string>, ...<string, mixed>}
 * @phpstan-type ConversationLabelMembersResultInput array{ label_id: string, action: 'add'|'remove',
 *     conversation_ids: list<string>, ...<string, mixed>}
 * @phpstan-type ConversationLabelMembersResultOutput array{ label_id: string, action: 'add'|'remove',
 *     conversation_ids: list<string>, ...<string, mixed>}
 * @phpstan-type ConversationLabelUpsertRequestInput array{ label_id?: string, name: string, ...<string, mixed>}
 * @phpstan-type ConversationLabelUpsertRequestOutput array{ label_id?: string, name: string, ...<string, mixed>}
 * @phpstan-type ConversationListResultInput array{ items: list<ConversationInput>, next_cursor?: string,
 *     has_more: bool, ...<string, mixed>}
 * @phpstan-type ConversationListResultOutput array{ items: list<ConversationOutput>, next_cursor?: string,
 *     has_more: bool, ...<string, mixed>}
 * @phpstan-type ConversationMemberInput array{ peer_id: string, username?: string, display_name: string,
 *     avatar_url: string, role?: string, joined_at?: string, extra?: FreeFormObjectInput, ...<string, mixed>}
 * @phpstan-type ConversationMemberOutput array{ peer_id: string, username?: string, display_name: string,
 *     avatar_url: string, role?: string, joined_at?: string, extra?: FreeFormObjectOutput, ...<string, mixed>}
 * @phpstan-type ConversationMemberListResultInput array{ items: list<ConversationMemberInput>,
 *     next_cursor?: string, has_more: bool, ...<string, mixed>}
 * @phpstan-type ConversationMemberListResultOutput array{ items: list<ConversationMemberOutput>,
 *     next_cursor?: string, has_more: bool, ...<string, mixed>}
 * @phpstan-type ConversationMuteRequestInput ConversationIdRequestInput&array{ duration?: int, mute_until?: string,
 *     ...<string, mixed>}
 * @phpstan-type ConversationMuteRequestOutput ConversationIdRequestOutput&(array{ duration?: int|string,
 *     mute_until?: string, ...<string, mixed>})
 * @phpstan-type ConversationReadRequestInput ConversationIdRequestInput&array{ up_to_message_id?: string,
 *     ...<string, mixed>}
 * @phpstan-type ConversationReadRequestOutput ConversationIdRequestOutput&array{ up_to_message_id?: string,
 *     ...<string, mixed>}
 * @phpstan-type ConversationTypeInput 'user'|'group'|'channel'
 * @phpstan-type ConversationTypeOutput 'user'|'group'|'channel'
 * @phpstan-type ErrorInput array{ code: string, message: string, ...<string, mixed>}
 * @phpstan-type ErrorOutput array{ code: string, message: string, ...<string, mixed>}
 * @phpstan-type ErrorEnvelopeInput ResponseMetaInput&array{ error: ErrorInput, ...<string, mixed>}
 * @phpstan-type ErrorEnvelopeOutput ResponseMetaOutput&array{ error: ErrorOutput, ...<string, mixed>}
 * @phpstan-type FreeFormObjectInput array<string, mixed>
 * @phpstan-type FreeFormObjectOutput array<string, mixed>
 * @phpstan-type GroupInput array{ id: string, conversation_id: string, name: string, avatar_url: string,
 *     member_count?: int, joined_at?: string, created_at?: string, description?: string,
 *     extra?: FreeFormObjectInput, ...<string, mixed>}
 * @phpstan-type GroupOutput array{ id: string, conversation_id: string, name: string, avatar_url: string,
 *     member_count?: int|string, joined_at?: string, created_at?: string, description?: string,
 *     extra?: FreeFormObjectOutput, ...<string, mixed>}
 * @phpstan-type GroupCreateRequestInput array{ name: string, members?: list<string>, ...<string, mixed>}
 * @phpstan-type GroupCreateRequestOutput array{ name: string, members?: list<string>, ...<string, mixed>}
 * @phpstan-type GroupCreateResultInput array{ id: string, ...<string, mixed>}
 * @phpstan-type GroupCreateResultOutput array{ id: string, ...<string, mixed>}
 * @phpstan-type GroupIdRequestInput array{ group_id: string, ...<string, mixed>}
 * @phpstan-type GroupIdRequestOutput array{ group_id: string, ...<string, mixed>}
 * @phpstan-type GroupInfoUpdateRequestInput array{ group_id: string, name?: string, description?: string,
 *     avatar_url?: string, ...<string, mixed>}
 * @phpstan-type GroupInfoUpdateRequestOutput array{ group_id: string, name?: string, description?: string,
 *     avatar_url?: string, ...<string, mixed>}
 * @phpstan-type GroupInviteCodeInput array{ invite_url: string, invite_code: string, ...<string, mixed>}
 * @phpstan-type GroupInviteCodeOutput array{ invite_url: string, invite_code: string, ...<string, mixed>}
 * @phpstan-type GroupJoinApprovalModeRequestInput array{ group_id: string, enabled: bool, ...<string, mixed>}
 * @phpstan-type GroupJoinApprovalModeRequestOutput array{ group_id: string, enabled: bool, ...<string, mixed>}
 * @phpstan-type GroupJoinRequestInput array{ id: string, phone?: string, lid?: string, requested_at?: string,
 *     ...<string, mixed>}
 * @phpstan-type GroupJoinRequestOutput array{ id: string, phone?: string, lid?: string, requested_at?: string,
 *     ...<string, mixed>}
 * @phpstan-type GroupJoinRequestsResultInput array{ group_id: string, items: list<GroupJoinRequestInput>,
 *     ...<string, mixed>}
 * @phpstan-type GroupJoinRequestsResultOutput array{ group_id: string, items: list<GroupJoinRequestOutput>,
 *     ...<string, mixed>}
 * @phpstan-type GroupJoinRequestsUpdateRequestInput array{ group_id: string, action: 'approve'|'reject',
 *     member_ids: list<string>, ...<string, mixed>}
 * @phpstan-type GroupJoinRequestsUpdateRequestOutput array{ group_id: string, action: 'approve'|'reject',
 *     member_ids: list<string>, ...<string, mixed>}
 * @phpstan-type GroupListResultInput array{ items: list<GroupInput>, next_cursor?: string, has_more: bool,
 *     ...<string, mixed>}
 * @phpstan-type GroupListResultOutput array{ items: list<GroupOutput>, next_cursor?: string, has_more: bool,
 *     ...<string, mixed>}
 * @phpstan-type GroupMemberUpdateRequestInput array{ group_id: string, action: 'add'|'remove'|'promote'|'demote',
 *     member_id: string, ...<string, mixed>}
 * @phpstan-type GroupMemberUpdateRequestOutput array{ group_id: string, action: 'add'|'remove'|'promote'|'demote',
 *     member_id: string, ...<string, mixed>}
 * @phpstan-type MentionInput array{ id: string, ...<string, mixed>}
 * @phpstan-type MentionOutput array{ id: string, ...<string, mixed>}
 * @phpstan-type MessageEditRequestInput array{ account_id: string, conversation_id: string, message_id: string,
 *     content: string, ...<string, mixed>}
 * @phpstan-type MessageEditRequestOutput array{ account_id: string, conversation_id: string, message_id: string,
 *     content: string, ...<string, mixed>}
 * @phpstan-type MessagePayloadInput array{ type: 'text'|'image'|'video'|'audio'|'document'|'file'|'contact',
 *     text?: string, url?: string, file_url?: string, file_key?: string, caption?: string,
 *     contacts?: list<ContactCardInput>, ...<string, mixed>}
 * @phpstan-type MessagePayloadOutput array{ type: 'text'|'image'|'video'|'audio'|'document'|'file'|'contact',
 *     text?: string, url?: string, file_url?: string, file_key?: string, caption?: string,
 *     contacts?: list<ContactCardOutput>, ...<string, mixed>}
 * @phpstan-type MessagePinRequestInput MessageTargetRequestInput&array{ pinned: bool, duration_seconds?: int,
 *     ...<string, mixed>}
 * @phpstan-type MessagePinRequestOutput MessageTargetRequestOutput&(array{ pinned: bool,
 *     duration_seconds?: int|string, ...<string, mixed>})
 * @phpstan-type MessageReactionRequestInput MessageTargetRequestInput&array{ emoji?: string, ...<string, mixed>}
 * @phpstan-type MessageReactionRequestOutput MessageTargetRequestOutput&array{ emoji?: string, ...<string, mixed>}
 * @phpstan-type MessageRevokeRequestInput MessageTargetRequestInput
 * @phpstan-type MessageRevokeRequestOutput MessageTargetRequestOutput
 * @phpstan-type MessageTargetRequestInput array{ account_id: string, conversation_id: string, message_id: string,
 *     sender_id?: string, ...<string, mixed>}
 * @phpstan-type MessageTargetRequestOutput array{ account_id: string, conversation_id: string, message_id: string,
 *     sender_id?: string, ...<string, mixed>}
 * @phpstan-type OkDataInput array{ ok: true, ...<string, mixed>}
 * @phpstan-type OkDataOutput array{ ok: true, ...<string, mixed>}
 * @phpstan-type ProviderNameInput 'telegram'|'whatsapp'|'line'|'twitter'|'x'|'zalo'|'tiktok'|'whatsapp_protocol'
 * @phpstan-type ProviderNameOutput 'telegram'|'whatsapp'|'line'|'twitter'|'x'|'zalo'|'tiktok'|'whatsapp_protocol'
 * @phpstan-type ProviderRegionsResponseInput array{ provider: ProviderNameInput,
 *     regions: list<RegionAvailabilityInput>, ...<string, mixed>}
 * @phpstan-type ProviderRegionsResponseOutput array{ provider: ProviderNameOutput,
 *     regions: list<RegionAvailabilityOutput>, ...<string, mixed>}
 * @phpstan-type RecipientInput array{ id: string, type: ConversationTypeInput, ...<string, mixed>}
 * @phpstan-type RecipientOutput array{ id: string, type: ConversationTypeOutput, ...<string, mixed>}
 * @phpstan-type RegionAvailabilityInput array{ region: string, supported: bool, allocatable: bool, ...<string,
 *     mixed>}
 * @phpstan-type RegionAvailabilityOutput array{ region: string, supported: bool, allocatable: bool, ...<string,
 *     mixed>}
 * @phpstan-type ReplyToInput array{ reply_token: string, ...<string, mixed>}
 * @phpstan-type ReplyToOutput array{ reply_token: string, ...<string, mixed>}
 * @phpstan-type ResponseMetaInput array{ request_id?: string, client_request_id?: string, ...<string, mixed>}
 * @phpstan-type ResponseMetaOutput array{ request_id?: string, client_request_id?: string, ...<string, mixed>}
 * @phpstan-type RuntimeActionResultInput array{ account_id: string, provider: ProviderNameInput,
 *     action: 'refresh_status'|'start'|'stop'|'reconnect', operation_status: string,
 *     runtime_status: RuntimeStatusInput, runtime_error: string, ...<string, mixed>}
 * @phpstan-type RuntimeActionResultOutput array{ account_id: string, provider: ProviderNameOutput,
 *     action: 'refresh_status'|'start'|'stop'|'reconnect', operation_status: string,
 *     runtime_status: RuntimeStatusOutput, runtime_error: string, ...<string, mixed>}
 * @phpstan-type RuntimeStatusInput 'unknown'|'starting'|'running'|'stopping'|'stopped'|'reconnecting'|'disconnected'|'error'
 * @phpstan-type RuntimeStatusOutput 'unknown'|'starting'|'running'|'stopping'|'stopped'|'reconnecting'|'disconnected'|'error'
 * @phpstan-type SendMessageRequestInput array{ account_id: string, to: RecipientInput,
 *     message: MessagePayloadInput, provider_data?: FreeFormObjectInput, reply_to?: ReplyToInput,
 *     mentions?: list<MentionInput>, ...<string, mixed>}
 * @phpstan-type SendMessageRequestOutput array{ account_id: string, to: RecipientOutput,
 *     message: MessagePayloadOutput, provider_data?: FreeFormObjectOutput, reply_to?: ReplyToOutput,
 *     mentions?: list<MentionOutput>, ...<string, mixed>}
 * @phpstan-type SendMessageResultInput array{ message_id: string, account_id: string, status: string,
 *     provider_ref?: string, ...<string, mixed>}
 * @phpstan-type SendMessageResultOutput array{ message_id: string, account_id: string, status: string,
 *     provider_ref?: string, ...<string, mixed>}
 * @phpstan-type StandardEventTypeInput 'message.received'|'message.updated'|'message.deleted'|'message.read'|'message.reaction'|'message.delivered'|'conversation.updated'|'conversation.deleted'|'conversation.cleared'|'group.updated'|'group.join_request'|'account.status.updated'|'account.started'|'account.auth.required'|'account.auth.succeeded'|'account.auth.failed'
 * @phpstan-type StandardEventTypeOutput 'message.received'|'message.updated'|'message.deleted'|'message.read'|'message.reaction'|'message.delivered'|'conversation.updated'|'conversation.deleted'|'conversation.cleared'|'group.updated'|'group.join_request'|'account.status.updated'|'account.started'|'account.auth.required'|'account.auth.succeeded'|'account.auth.failed'
 * @phpstan-type WebhookEndpointInput array{ id: string, url: string, status: string,
 *     subscribed_events?: list<StandardEventTypeInput>, signing_enabled: bool, retry_policy?: FreeFormObjectInput,
 *     ...<string, mixed>}
 * @phpstan-type WebhookEndpointOutput array{ id: string, url: string, status: string,
 *     subscribed_events?: list<StandardEventTypeOutput>, signing_enabled: bool,
 *     retry_policy?: FreeFormObjectOutput, ...<string, mixed>}
 * @phpstan-type WebhookEndpointRequestInput array{ url: string, status: string,
 *     subscribed_events?: list<StandardEventTypeInput>, signing_secret?: string,
 *     retry_policy?: FreeFormObjectInput, ...<string, mixed>}
 * @phpstan-type WebhookEndpointRequestOutput array{ url: string, status: string,
 *     subscribed_events?: list<StandardEventTypeOutput>, signing_secret?: string,
 *     retry_policy?: FreeFormObjectOutput, ...<string, mixed>}
 * @phpstan-type WorkspaceInput array{ name: string, status: string, metadata?: array<string, string>,
 *     account_quota: int, account_quota_unlimited: bool, ...<string, mixed>}
 * @phpstan-type WorkspaceOutput array{ name: string, status: string, metadata?: array<string, string>,
 *     account_quota: int|string, account_quota_unlimited: bool, ...<string, mixed>}
 * @phpstan-type WorkspaceUpdateRequestInput array{ name: string, status: string, metadata?: array<string, string>,
 *     ...<string, mixed>}
 * @phpstan-type WorkspaceUpdateRequestOutput array{ name: string, status: string, metadata?: array<string, string>,
 *     ...<string, mixed>}
 * @phpstan-type BlockContactOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: ContactIdRequestInput}
 * @phpstan-type BlockContactOperationResponse ResponseMetaOutput&array{ data: OkDataOutput, ...<string, mixed>}
 * @phpstan-type CancelAccountAuthOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body?: FreeFormObjectInput}
 * @phpstan-type CancelAccountAuthOperationResponse ResponseMetaOutput&array{ data: FreeFormObjectOutput,
 *     ...<string, mixed>}
 * @phpstan-type CheckAccountQrAuthOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body?: FreeFormObjectInput}
 * @phpstan-type CheckAccountQrAuthOperationResponse ResponseMetaOutput&array{ data: FreeFormObjectOutput,
 *     ...<string, mixed>}
 * @phpstan-type CreateAccountOperationRequest array{ params?: array{ header?: array<string, string>},
 *     headers?: array<string, string>, body: AccountRequestInput}
 * @phpstan-type CreateAccountOperationResponse ResponseMetaOutput&array{ data: AccountOutput, ...<string, mixed>}
 * @phpstan-type CreateApiKeyOperationRequest array{ params?: array{ header?: array<string, string>},
 *     headers?: array<string, string>, body: APIKeyCreateRequestInput}
 * @phpstan-type CreateApiKeyOperationResponse ResponseMetaOutput&array{ data: APIKeyCreateResultOutput, ...<string,
 *     mixed>}
 * @phpstan-type CreateGroupOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: GroupCreateRequestInput}
 * @phpstan-type CreateGroupOperationResponse ResponseMetaOutput&array{ data: GroupCreateResultOutput, ...<string,
 *     mixed>}
 * @phpstan-type CreateWebhookEndpointOperationRequest array{ params?: array{ header?: array<string, string>},
 *     headers?: array<string, string>, body: WebhookEndpointRequestInput}
 * @phpstan-type CreateWebhookEndpointOperationResponse ResponseMetaOutput&array{ data: WebhookEndpointOutput,
 *     ...<string, mixed>}
 * @phpstan-type DeactivateWebhookEndpointOperationRequest array{ params: array{ path: array{ endpoint_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>}
 * @phpstan-type DeactivateWebhookEndpointOperationResponse ResponseMetaOutput&array{ data: WebhookEndpointOutput,
 *     ...<string, mixed>}
 * @phpstan-type DeleteAccountOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>}
 * @phpstan-type DeleteAccountOperationResponse null
 * @phpstan-type DeleteConversationLabelOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: ConversationLabelDeleteRequestInput}
 * @phpstan-type DeleteConversationLabelOperationResponse ResponseMetaOutput&array{
 *     data: ConversationLabelDeleteResultOutput, ...<string, mixed>}
 * @phpstan-type DeleteWebhookEndpointOperationRequest array{ params: array{ path: array{ endpoint_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>}
 * @phpstan-type DeleteWebhookEndpointOperationResponse null
 * @phpstan-type EditMessageOperationRequest array{ params?: array{ header?: array<string, string>},
 *     headers?: array<string, string>, body: MessageEditRequestInput}
 * @phpstan-type EditMessageOperationResponse ResponseMetaOutput&array{ data: OkDataOutput, ...<string, mixed>}
 * @phpstan-type GetAccountOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>}
 * @phpstan-type GetAccountOperationResponse ResponseMetaOutput&array{ data: AccountOutput, ...<string, mixed>}
 * @phpstan-type GetAccountAuthStateOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>}
 * @phpstan-type GetAccountAuthStateOperationResponse ResponseMetaOutput&array{ data: AccountSessionOutput,
 *     ...<string, mixed>}
 * @phpstan-type GetContactOperationRequest array{ params: array{ path: array{ account_id: string}, query: array{
 *     contact_id: string}, header?: array<string, string>}, headers?: array<string, string>}
 * @phpstan-type GetContactOperationResponse ResponseMetaOutput&array{ data: ContactOutput, ...<string, mixed>}
 * @phpstan-type GetConversationOperationRequest array{ params: array{ path: array{ account_id: string},
 *     query: array{ conversation_id: string, type?: ConversationTypeInput}, header?: array<string, string>},
 *     headers?: array<string, string>}
 * @phpstan-type GetConversationOperationResponse ResponseMetaOutput&array{ data: ConversationOutput, ...<string,
 *     mixed>}
 * @phpstan-type GetGroupOperationRequest array{ params: array{ path: array{ account_id: string}, query: array{
 *     group_id: string}, header?: array<string, string>}, headers?: array<string, string>}
 * @phpstan-type GetGroupOperationResponse ResponseMetaOutput&array{ data: GroupOutput, ...<string, mixed>}
 * @phpstan-type GetGroupInviteCodeOperationRequest array{ params: array{ path: array{ account_id: string},
 *     query: array{ group_id: string}, header?: array<string, string>}, headers?: array<string, string>}
 * @phpstan-type GetGroupInviteCodeOperationResponse ResponseMetaOutput&array{ data: GroupInviteCodeOutput,
 *     ...<string, mixed>}
 * @phpstan-type GetWebhookEndpointOperationRequest array{ params: array{ path: array{ endpoint_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>}
 * @phpstan-type GetWebhookEndpointOperationResponse ResponseMetaOutput&array{ data: WebhookEndpointOutput,
 *     ...<string, mixed>}
 * @phpstan-type GetWorkspaceOperationRequest array{ params?: array{ header?: array<string, string>},
 *     headers?: array<string, string>}
 * @phpstan-type GetWorkspaceOperationResponse ResponseMetaOutput&array{ data: WorkspaceOutput, ...<string, mixed>}
 * @phpstan-type ImportAccountAuthSessionOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body?: FreeFormObjectInput}
 * @phpstan-type ImportAccountAuthSessionOperationResponse ResponseMetaOutput&array{ data: FreeFormObjectOutput,
 *     ...<string, mixed>}
 * @phpstan-type LeaveGroupOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: GroupIdRequestInput}
 * @phpstan-type LeaveGroupOperationResponse ResponseMetaOutput&array{ data: OkDataOutput, ...<string, mixed>}
 * @phpstan-type ListAccountsOperationRequest array{ params?: array{ header?: array<string, string>},
 *     headers?: array<string, string>}
 * @phpstan-type ListAccountsOperationResponse ResponseMetaOutput&array{ data: list<AccountOutput>, ...<string,
 *     mixed>}
 * @phpstan-type ListApiKeysOperationRequest array{ params?: array{ header?: array<string, string>},
 *     headers?: array<string, string>}
 * @phpstan-type ListApiKeysOperationResponse ResponseMetaOutput&array{ data: list<APIKeyOutput>, ...<string,
 *     mixed>}
 * @phpstan-type ListContactBlocklistOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>}
 * @phpstan-type ListContactBlocklistOperationResponse ResponseMetaOutput&array{ data: ContactBlocklistResultOutput,
 *     ...<string, mixed>}
 * @phpstan-type ListContactsOperationRequest array{ params: array{ path: array{ account_id: string}, query?: array{
 *     cursor?: string, limit?: int, q?: string, updated_since?: string}, header?: array<string, string>},
 *     headers?: array<string, string>}
 * @phpstan-type ListContactsOperationResponse ResponseMetaOutput&array{ data: ContactListResultOutput, ...<string,
 *     mixed>}
 * @phpstan-type ListConversationLabelsOperationRequest array{ params: array{ path: array{ account_id: string},
 *     query?: array{ cursor?: string, limit?: int}, header?: array<string, string>}, headers?: array<string,
 *     string>}
 * @phpstan-type ListConversationLabelsOperationResponse ResponseMetaOutput&array{
 *     data: ConversationLabelListResultOutput, ...<string, mixed>}
 * @phpstan-type ListConversationMembersOperationRequest array{ params: array{ path: array{ account_id: string},
 *     query: array{ conversation_id: string, type?: ConversationTypeInput, cursor?: string, limit?: int},
 *     header?: array<string, string>}, headers?: array<string, string>}
 * @phpstan-type ListConversationMembersOperationResponse ResponseMetaOutput&array{
 *     data: ConversationMemberListResultOutput, ...<string, mixed>}
 * @phpstan-type ListConversationsOperationRequest array{ params: array{ path: array{ account_id: string},
 *     query?: array{ type?: string, cursor?: string, limit?: int, label_id?: string}, header?: array<string,
 *     string>}, headers?: array<string, string>}
 * @phpstan-type ListConversationsOperationResponse ResponseMetaOutput&array{ data: ConversationListResultOutput,
 *     ...<string, mixed>}
 * @phpstan-type ListGroupJoinRequestsOperationRequest array{ params: array{ path: array{ account_id: string},
 *     query: array{ group_id: string}, header?: array<string, string>}, headers?: array<string, string>}
 * @phpstan-type ListGroupJoinRequestsOperationResponse ResponseMetaOutput&array{
 *     data: GroupJoinRequestsResultOutput, ...<string, mixed>}
 * @phpstan-type ListGroupsOperationRequest array{ params: array{ path: array{ account_id: string}, query?: array{
 *     cursor?: string, limit?: int}, header?: array<string, string>}, headers?: array<string, string>}
 * @phpstan-type ListGroupsOperationResponse ResponseMetaOutput&array{ data: GroupListResultOutput, ...<string,
 *     mixed>}
 * @phpstan-type ListProviderRegionsOperationRequest array{ params: array{ path: array{
 *     provider: ProviderNameInput}, header?: array<string, string>}, headers?: array<string, string>}
 * @phpstan-type ListProviderRegionsOperationResponse ResponseMetaOutput&array{ data: ProviderRegionsResponseOutput,
 *     ...<string, mixed>}
 * @phpstan-type ListWebhookEndpointsOperationRequest array{ params?: array{ header?: array<string, string>},
 *     headers?: array<string, string>}
 * @phpstan-type ListWebhookEndpointsOperationResponse ResponseMetaOutput&array{ data: list<WebhookEndpointOutput>,
 *     ...<string, mixed>}
 * @phpstan-type MarkConversationReadOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: ConversationReadRequestInput}
 * @phpstan-type MarkConversationReadOperationResponse ResponseMetaOutput&array{ data: OkDataOutput, ...<string,
 *     mixed>}
 * @phpstan-type MarkConversationUnreadOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: ConversationIdRequestInput}
 * @phpstan-type MarkConversationUnreadOperationResponse ResponseMetaOutput&array{ data: OkDataOutput, ...<string,
 *     mixed>}
 * @phpstan-type MuteConversationOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: ConversationMuteRequestInput}
 * @phpstan-type MuteConversationOperationResponse ResponseMetaOutput&array{ data: OkDataOutput, ...<string, mixed>}
 * @phpstan-type PinConversationOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: ConversationIdRequestInput}
 * @phpstan-type PinConversationOperationResponse ResponseMetaOutput&array{ data: OkDataOutput, ...<string, mixed>}
 * @phpstan-type PinMessageOperationRequest array{ params?: array{ header?: array<string, string>},
 *     headers?: array<string, string>, body: MessagePinRequestInput}
 * @phpstan-type PinMessageOperationResponse ResponseMetaOutput&array{ data: OkDataOutput, ...<string, mixed>}
 * @phpstan-type ReactMessageOperationRequest array{ params?: array{ header?: array<string, string>},
 *     headers?: array<string, string>, body: MessageReactionRequestInput}
 * @phpstan-type ReactMessageOperationResponse ResponseMetaOutput&array{ data: OkDataOutput, ...<string, mixed>}
 * @phpstan-type ReconnectAccountRuntimeOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body?: FreeFormObjectInput}
 * @phpstan-type ReconnectAccountRuntimeOperationResponse ResponseMetaOutput&array{ data: RuntimeActionResultOutput,
 *     ...<string, mixed>}
 * @phpstan-type RefreshAccountRuntimeOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body?: FreeFormObjectInput}
 * @phpstan-type RefreshAccountRuntimeOperationResponse ResponseMetaOutput&array{ data: RuntimeActionResultOutput,
 *     ...<string, mixed>}
 * @phpstan-type RevokeMessageOperationRequest array{ params?: array{ header?: array<string, string>},
 *     headers?: array<string, string>, body: MessageRevokeRequestInput}
 * @phpstan-type RevokeMessageOperationResponse ResponseMetaOutput&array{ data: OkDataOutput, ...<string, mixed>}
 * @phpstan-type RotateApiKeyOperationRequest array{ params: array{ path: array{ key_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: APIKeyCreateRequestInput}
 * @phpstan-type RotateApiKeyOperationResponse ResponseMetaOutput&array{ data: APIKeyCreateResultOutput, ...<string,
 *     mixed>}
 * @phpstan-type SendMessageOperationRequest array{ params?: array{ header?: array<string, string>},
 *     headers?: array<string, string>, body: SendMessageRequestInput}
 * @phpstan-type SendMessageOperationResponse ResponseMetaOutput&array{ data: SendMessageResultOutput, ...<string,
 *     mixed>}
 * @phpstan-type SetContactNoteOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: ContactNoteRequestInput}
 * @phpstan-type SetContactNoteOperationResponse ResponseMetaOutput&array{ data: OkDataOutput, ...<string, mixed>}
 * @phpstan-type SetConversationLabelMembersOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: ConversationLabelMembersRequestInput}
 * @phpstan-type SetConversationLabelMembersOperationResponse ResponseMetaOutput&array{
 *     data: ConversationLabelMembersResultOutput, ...<string, mixed>}
 * @phpstan-type SetGroupJoinApprovalModeOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: GroupJoinApprovalModeRequestInput}
 * @phpstan-type SetGroupJoinApprovalModeOperationResponse ResponseMetaOutput&array{ data: OkDataOutput, ...<string,
 *     mixed>}
 * @phpstan-type StartAccountAuthOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body?: FreeFormObjectInput}
 * @phpstan-type StartAccountAuthOperationResponse ResponseMetaOutput&array{ data: FreeFormObjectOutput, ...<string,
 *     mixed>}
 * @phpstan-type StartAccountQrAuthOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body?: FreeFormObjectInput}
 * @phpstan-type StartAccountQrAuthOperationResponse ResponseMetaOutput&array{ data: FreeFormObjectOutput,
 *     ...<string, mixed>}
 * @phpstan-type StartAccountRuntimeOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body?: FreeFormObjectInput}
 * @phpstan-type StartAccountRuntimeOperationResponse ResponseMetaOutput&array{ data: RuntimeActionResultOutput,
 *     ...<string, mixed>}
 * @phpstan-type StopAccountRuntimeOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body?: FreeFormObjectInput}
 * @phpstan-type StopAccountRuntimeOperationResponse ResponseMetaOutput&array{ data: RuntimeActionResultOutput,
 *     ...<string, mixed>}
 * @phpstan-type SubmitAccountAuthCodeOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body?: FreeFormObjectInput}
 * @phpstan-type SubmitAccountAuthCodeOperationResponse ResponseMetaOutput&array{ data: FreeFormObjectOutput,
 *     ...<string, mixed>}
 * @phpstan-type SubmitAccountAuthPasswordOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body?: FreeFormObjectInput}
 * @phpstan-type SubmitAccountAuthPasswordOperationResponse ResponseMetaOutput&array{ data: FreeFormObjectOutput,
 *     ...<string, mixed>}
 * @phpstan-type UnblockContactOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: ContactIdRequestInput}
 * @phpstan-type UnblockContactOperationResponse ResponseMetaOutput&array{ data: OkDataOutput, ...<string, mixed>}
 * @phpstan-type UnmuteConversationOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: ConversationIdRequestInput}
 * @phpstan-type UnmuteConversationOperationResponse ResponseMetaOutput&array{ data: OkDataOutput, ...<string,
 *     mixed>}
 * @phpstan-type UnpinConversationOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: ConversationIdRequestInput}
 * @phpstan-type UnpinConversationOperationResponse ResponseMetaOutput&array{ data: OkDataOutput, ...<string,
 *     mixed>}
 * @phpstan-type UpdateAccountOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: AccountRequestInput}
 * @phpstan-type UpdateAccountOperationResponse ResponseMetaOutput&array{ data: AccountOutput, ...<string, mixed>}
 * @phpstan-type UpdateApiKeyStatusOperationRequest array{ params: array{ path: array{ key_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: APIKeyStatusUpdateRequestInput}
 * @phpstan-type UpdateApiKeyStatusOperationResponse ResponseMetaOutput&array{ data: APIKeyOutput, ...<string,
 *     mixed>}
 * @phpstan-type UpdateGroupInfoOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: GroupInfoUpdateRequestInput}
 * @phpstan-type UpdateGroupInfoOperationResponse ResponseMetaOutput&array{ data: OkDataOutput, ...<string, mixed>}
 * @phpstan-type UpdateGroupJoinRequestsOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: GroupJoinRequestsUpdateRequestInput}
 * @phpstan-type UpdateGroupJoinRequestsOperationResponse ResponseMetaOutput&array{ data: OkDataOutput, ...<string,
 *     mixed>}
 * @phpstan-type UpdateGroupMembersOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: GroupMemberUpdateRequestInput}
 * @phpstan-type UpdateGroupMembersOperationResponse ResponseMetaOutput&array{ data: OkDataOutput, ...<string,
 *     mixed>}
 * @phpstan-type UpdateWebhookEndpointOperationRequest array{ params: array{ path: array{ endpoint_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: WebhookEndpointRequestInput}
 * @phpstan-type UpdateWebhookEndpointOperationResponse ResponseMetaOutput&array{ data: WebhookEndpointOutput,
 *     ...<string, mixed>}
 * @phpstan-type UpdateWorkspaceOperationRequest array{ params?: array{ header?: array<string, string>},
 *     headers?: array<string, string>, body: WorkspaceUpdateRequestInput}
 * @phpstan-type UpdateWorkspaceOperationResponse ResponseMetaOutput&array{ data: WorkspaceOutput, ...<string,
 *     mixed>}
 * @phpstan-type UpsertConversationLabelOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: ConversationLabelUpsertRequestInput}
 * @phpstan-type UpsertConversationLabelOperationResponse ResponseMetaOutput&array{ data: ConversationLabelOutput,
 *     ...<string, mixed>}
 */
// phpcs:enable Generic.Files.LineLength.TooLong
final class ApiTypes
{
}
