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
 * @phpstan-type AccountInput array{ billing?: AccountBillingInput, id: string, name: string,
 *     provider: ProviderNameInput, region: string, status: string, runtime_status: RuntimeStatusInput,
 *     auth_mode?: string, capabilities?: list<string>, metadata?: FreeFormObjectInput,
 *     provider_account_ref?: string, proxy?: FreeFormObjectInput, provider_profile?: ProviderProfileInput,
 *     ...<string, mixed>}
 * @phpstan-type AccountOutput array{ billing?: AccountBillingOutput, id: string, name: string,
 *     provider: ProviderNameOutput, region: string, status: string, runtime_status: RuntimeStatusOutput,
 *     auth_mode?: string, capabilities?: list<string>, metadata?: FreeFormObjectOutput,
 *     provider_account_ref?: string, proxy?: FreeFormObjectOutput, provider_profile?: ProviderProfileOutput,
 *     ...<string, mixed>}
 * @phpstan-type AccountBillingInput array{ period_start_at: string, period_end_at: string, amount_minor: int,
 *     currency: 'USD', operation_id: string, state: 'ACTIVE'|'DELETING'|'DELETED'|'COMPENSATED'|'REVIEW'}
 * @phpstan-type AccountBillingOutput array{ period_start_at: string, period_end_at: string,
 *     amount_minor: int|string, currency: 'USD', operation_id: string,
 *     state: 'ACTIVE'|'DELETING'|'DELETED'|'COMPENSATED'|'REVIEW'}
 * @phpstan-type AccountCreateRequestInput array{ name?: string, provider: ProviderInputNameInput, region: string,
 *     status?: string, runtime_status?: RuntimeStatusInput, auth_mode: 'qrcode'|'code'|'session',
 *     capabilities?: list<string>, metadata?: FreeFormObjectInput, provider_account_ref?: string,
 *     provider_data?: FreeFormObjectInput, proxy?: FreeFormObjectInput, ...<string, mixed>}
 * @phpstan-type AccountCreateRequestOutput array{ name?: string, provider: ProviderInputNameOutput, region: string,
 *     status?: string, runtime_status?: RuntimeStatusOutput, auth_mode: 'qrcode'|'code'|'session',
 *     capabilities?: list<string>, metadata?: FreeFormObjectOutput, provider_account_ref?: string,
 *     provider_data?: FreeFormObjectOutput, proxy?: FreeFormObjectOutput, ...<string, mixed>}
 * @phpstan-type AccountListResultInput array{ items: list<AccountInput>, has_more: bool, next_cursor?: string,
 *     ...<string, mixed>}
 * @phpstan-type AccountListResultOutput array{ items: list<AccountOutput>, has_more: bool, next_cursor?: string,
 *     ...<string, mixed>}
 * @phpstan-type AccountOperationInput array{ operation_id: string, kind: 'QUOTE'|'CREATE'|'DELETE'|'COMPENSATE',
 *     state: 'QUOTED'|'CONSUMED'|'EXPIRED'|'PENDING'|'PROCESSING'|'SUCCEEDED'|'FAILED'|'REVIEW',
 *     account_id?: string, last_error_code?: string}
 * @phpstan-type AccountOperationOutput array{ operation_id: string, kind: 'QUOTE'|'CREATE'|'DELETE'|'COMPENSATE',
 *     state: 'QUOTED'|'CONSUMED'|'EXPIRED'|'PENDING'|'PROCESSING'|'SUCCEEDED'|'FAILED'|'REVIEW',
 *     account_id?: string, last_error_code?: string}
 * @phpstan-type AccountProfileUpdatedWebhookEventInput array{ id: string, type: 'account.profile.updated',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{ account?: array{
 *     provider_account_ref?: string, ...<string, mixed>}, profile: array{ display_name: string, push_name: string,
 *     business_name?: string, avatar_url: string, ...<string, mixed>}, event: array{
 *     kind: 'account_profile_updated', source: 'full_sync'|'self_rename'|'avatar_change',
 *     changed_fields?: list<'display_name'|'push_name'|'business_name'|'avatar_url'>, ...<string, mixed>},
 *     ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type AccountProfileUpdatedWebhookEventOutput array{ id: string, type: 'account.profile.updated',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{ account?: array{
 *     provider_account_ref?: string, ...<string, mixed>}, profile: array{ display_name: string, push_name: string,
 *     business_name?: string, avatar_url: string, ...<string, mixed>}, event: array{
 *     kind: 'account_profile_updated', source: 'full_sync'|'self_rename'|'avatar_change',
 *     changed_fields?: list<'display_name'|'push_name'|'business_name'|'avatar_url'>, ...<string, mixed>},
 *     ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type AccountSessionInput array{ account_id: string, status: string, auth_fields?: list<AuthFieldInput>,
 *     auth_payload?: array<string, mixed>, expires_at?: string, last_error?: string, ...<string, mixed>}
 * @phpstan-type AccountSessionOutput array{ account_id: string, status: string,
 *     auth_fields?: list<AuthFieldOutput>, auth_payload?: array<string, mixed>, expires_at?: string,
 *     last_error?: string, ...<string, mixed>}
 * @phpstan-type AccountStartedWebhookEventInput array{ id: string, type: 'account.started',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{ runtime_status: 'running',
 *     event: array{ kind: 'account_started', runtime_status: 'running', ...<string, mixed>}, ...<string, mixed>},
 *     ...<string, mixed>}
 * @phpstan-type AccountStartedWebhookEventOutput array{ id: string, type: 'account.started',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{
 *     runtime_status: 'running', event: array{ kind: 'account_started', runtime_status: 'running', ...<string,
 *     mixed>}, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type AccountUpdateRequestInput array{ name?: string, provider?: ProviderInputNameInput, region?: string,
 *     status?: string, runtime_status?: RuntimeStatusInput, auth_mode?: 'qrcode'|'code'|'session',
 *     capabilities?: list<string>, metadata?: FreeFormObjectInput, provider_account_ref?: string,
 *     provider_data?: FreeFormObjectInput, proxy?: FreeFormObjectInput, ...<string, mixed>}
 * @phpstan-type AccountUpdateRequestOutput array{ name?: string, provider?: ProviderInputNameOutput,
 *     region?: string, status?: string, runtime_status?: RuntimeStatusOutput,
 *     auth_mode?: 'qrcode'|'code'|'session', capabilities?: list<string>, metadata?: FreeFormObjectOutput,
 *     provider_account_ref?: string, provider_data?: FreeFormObjectOutput, proxy?: FreeFormObjectOutput,
 *     ...<string, mixed>}
 * @phpstan-type AccountWebhookErrorInput array{
 *     code: 'account_auth_failed'|'account_logged_out'|'account_restricted', numeric_code: '20100'|'20101'|'20102',
 *     message: string, ...<string, mixed>}
 * @phpstan-type AccountWebhookErrorOutput array{
 *     code: 'account_auth_failed'|'account_logged_out'|'account_restricted', numeric_code: '20100'|'20101'|'20102',
 *     message: string, ...<string, mixed>}
 * @phpstan-type ActiveCallDataInput array{ call_id: string,
 *     state: 'preparing'|'dialing'|'ringing'|'connecting'|'active', direction: 'inbound'|'outbound',
 *     media_type: 'voice'|'video'}
 * @phpstan-type ActiveCallDataOutput array{ call_id: string,
 *     state: 'preparing'|'dialing'|'ringing'|'connecting'|'active', direction: 'inbound'|'outbound',
 *     media_type: 'voice'|'video'}
 * @phpstan-type AuthFieldInput array{ type: string, required: bool, label?: string, placeholder?: string,
 *     ...<string, mixed>}
 * @phpstan-type AuthFieldOutput array{ type: string, required: bool, label?: string, placeholder?: string,
 *     ...<string, mixed>}
 * @phpstan-type CallAnsweredWebhookEventInput array{ id: string, type: 'call.answered',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{
 *     sender: CallEventSenderInput, call: CallEventCallInput, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type CallAnsweredWebhookEventOutput array{ id: string, type: 'call.answered',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{
 *     sender: CallEventSenderOutput, call: CallEventCallOutput, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type CallEndedWebhookEventInput array{ id: string, type: 'call.ended', provider: ProviderNameInput,
 *     account_id: string, occurred_at: string, data: (array{ sender: array{ id: string, display_name?: string,
 *     ...<string, mixed>}, call: array{ id: string, direction: 'inbound', media_type: 'voice'|'video',
 *     state: 'ringing'|'active'|'ended', ...<string, mixed>},
 *     reason: 'declined'|'caller_cancelled'|'local_hangup'|'remote_hangup'|'answer_failed'|'provider_disconnected'|'media_failed'|'expired'|'remote_busy'|'no_answer'|'dial_failed',
 *     duration_seconds: int, ...<string, mixed>}|array{ sender?: CallEventSenderInput, call: array{ id: string,
 *     direction: 'outbound', media_type: 'voice'|'video', state: 'ringing'|'active'|'ended', ...<string, mixed>},
 *     reason: 'declined'|'caller_cancelled'|'local_hangup'|'remote_hangup'|'answer_failed'|'provider_disconnected'|'media_failed'|'expired'|'remote_busy'|'no_answer'|'dial_failed',
 *     duration_seconds: int, ...<string, mixed>}), ...<string, mixed>}
 * @phpstan-type CallEndedWebhookEventOutput array{ id: string, type: 'call.ended', provider: ProviderNameOutput,
 *     account_id: string, occurred_at: string, data: (array{ sender: array{ id: string, display_name?: string,
 *     ...<string, mixed>}, call: array{ id: string, direction: 'inbound', media_type: 'voice'|'video',
 *     state: 'ringing'|'active'|'ended', ...<string, mixed>},
 *     reason: 'declined'|'caller_cancelled'|'local_hangup'|'remote_hangup'|'answer_failed'|'provider_disconnected'|'media_failed'|'expired'|'remote_busy'|'no_answer'|'dial_failed',
 *     duration_seconds: int|string, ...<string, mixed>}|array{ sender?: CallEventSenderOutput, call: array{
 *     id: string, direction: 'outbound', media_type: 'voice'|'video', state: 'ringing'|'active'|'ended',
 *     ...<string, mixed>},
 *     reason: 'declined'|'caller_cancelled'|'local_hangup'|'remote_hangup'|'answer_failed'|'provider_disconnected'|'media_failed'|'expired'|'remote_busy'|'no_answer'|'dial_failed',
 *     duration_seconds: int|string, ...<string, mixed>}), ...<string, mixed>}
 * @phpstan-type CallEventCallInput array{ id: string, direction: 'inbound'|'outbound', media_type: 'voice'|'video',
 *     state: 'ringing'|'active'|'ended', ...<string, mixed>}
 * @phpstan-type CallEventCallOutput array{ id: string, direction: 'inbound'|'outbound',
 *     media_type: 'voice'|'video', state: 'ringing'|'active'|'ended', ...<string, mixed>}
 * @phpstan-type CallEventSenderInput array{ id: string, display_name?: string, ...<string, mixed>}
 * @phpstan-type CallEventSenderOutput array{ id: string, display_name?: string, ...<string, mixed>}
 * @phpstan-type CallIncomingWebhookEventInput array{ id: string, type: 'call.incoming',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{
 *     sender: CallEventSenderInput, call: array{ id: string, direction: 'inbound', media_type: 'voice'|'video',
 *     state: 'ringing', ...<string, mixed>}, join_url: string, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type CallIncomingWebhookEventOutput array{ id: string, type: 'call.incoming',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{
 *     sender: CallEventSenderOutput, call: array{ id: string, direction: 'inbound', media_type: 'voice'|'video',
 *     state: 'ringing', ...<string, mixed>}, join_url: string, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type CallMessageInput array{ id: string, type: 'call', direction?: 'inbound'|'outbound',
 *     sent_at?: string, call: CallMessageCallInput}
 * @phpstan-type CallMessageOutput array{ id: string, type: 'call', direction?: 'inbound'|'outbound',
 *     sent_at?: string, call: CallMessageCallOutput}
 * @phpstan-type CallMessageCallInput (array{ id: string, status: 'offered'|'accepted'|'ended',
 *     accepted_at?: string, media_type?: 'audio'|'video', end_reason?: never, ended_by?: 'remote'}|array{
 *     id: string, status: 'offered'|'accepted'|'ended', accepted_at?: string, media_type?: 'audio'|'video',
 *     end_reason?: 'timeout'|'rejected_elsewhere', ended_by?: never})
 * @phpstan-type CallMessageCallOutput (array{ id: string, status: 'offered'|'accepted'|'ended',
 *     accepted_at?: string, media_type?: 'audio'|'video', end_reason?: never, ended_by?: 'remote'}|array{
 *     id: string, status: 'offered'|'accepted'|'ended', accepted_at?: string, media_type?: 'audio'|'video',
 *     end_reason?: 'timeout'|'rejected_elsewhere', ended_by?: never})
 * @phpstan-type CallMessageReceivedWebhookEventInput array{ id: string, type: 'message.received',
 *     provider: 'whatsapp', account_id: string, occurred_at: string, data: array{ message: array{ id: string,
 *     type: 'call', direction: 'inbound', sent_at?: string, call: (array{ id: string, status: 'offered',
 *     accepted_at?: never, media_type?: 'audio'|'video', end_reason?: never, ended_by?: never})},
 *     conversation?: array{ id: string, type: 'user', ...<string, mixed>}, sender?: array{ id: string,
 *     type?: 'user', ...<string, mixed>}, account?: array{ provider_account_ref?: string, ...<string, mixed>},
 *     event?: array{ kind?: 'message_received'|'message_updated', ...<string, mixed>}, ...<string, mixed>},
 *     ...<string, mixed>}
 * @phpstan-type CallMessageReceivedWebhookEventOutput array{ id: string, type: 'message.received',
 *     provider: 'whatsapp', account_id: string, occurred_at: string, data: array{ message: array{ id: string,
 *     type: 'call', direction: 'inbound', sent_at?: string, call: (array{ id: string, status: 'offered',
 *     accepted_at?: never, media_type?: 'audio'|'video', end_reason?: never, ended_by?: never})},
 *     conversation?: array{ id: string, type: 'user', ...<string, mixed>}, sender?: array{ id: string,
 *     type?: 'user', ...<string, mixed>}, account?: array{ provider_account_ref?: string, ...<string, mixed>},
 *     event?: array{ kind?: 'message_received'|'message_updated', ...<string, mixed>}, ...<string, mixed>},
 *     ...<string, mixed>}
 * @phpstan-type CallMessageUpdatedWebhookEventInput array{ id: string, type: 'message.updated',
 *     provider: 'whatsapp', account_id: string, occurred_at: string, data: array{ message: array{ id: string,
 *     type: 'call', direction?: never, sent_at?: never, call: (array{ id: string, status: 'accepted',
 *     accepted_at?: string, media_type?: 'audio'|'video', end_reason?: never, ended_by?: never}|array{ id: string,
 *     status: 'ended', accepted_at?: never, media_type?: 'audio'|'video', end_reason?: never,
 *     ended_by?: 'remote'}|array{ id: string, status: 'ended', accepted_at?: never, media_type?: 'audio'|'video',
 *     end_reason?: 'timeout'|'rejected_elsewhere', ended_by?: never})}, conversation?: array{ id: string,
 *     type: 'user', ...<string, mixed>}, sender?: array{ id: string, type?: 'user', ...<string, mixed>},
 *     account?: array{ provider_account_ref?: string, ...<string, mixed>}, event?: array{
 *     kind?: 'message_received'|'message_updated', ...<string, mixed>}, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type CallMessageUpdatedWebhookEventOutput array{ id: string, type: 'message.updated',
 *     provider: 'whatsapp', account_id: string, occurred_at: string, data: array{ message: array{ id: string,
 *     type: 'call', direction?: never, sent_at?: never, call: (array{ id: string, status: 'accepted',
 *     accepted_at?: string, media_type?: 'audio'|'video', end_reason?: never, ended_by?: never}|array{ id: string,
 *     status: 'ended', accepted_at?: never, media_type?: 'audio'|'video', end_reason?: never,
 *     ended_by?: 'remote'}|array{ id: string, status: 'ended', accepted_at?: never, media_type?: 'audio'|'video',
 *     end_reason?: 'timeout'|'rejected_elsewhere', ended_by?: never})}, conversation?: array{ id: string,
 *     type: 'user', ...<string, mixed>}, sender?: array{ id: string, type?: 'user', ...<string, mixed>},
 *     account?: array{ provider_account_ref?: string, ...<string, mixed>}, event?: array{
 *     kind?: 'message_received'|'message_updated', ...<string, mixed>}, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type CallMessageWebhookEventInput array{ id: string, type: 'message.received'|'message.updated',
 *     provider: 'whatsapp', account_id: string, occurred_at: string, data: array{ message: CallMessageInput,
 *     conversation?: array{ id: string, type: 'user', ...<string, mixed>}, sender?: array{ id: string,
 *     type?: 'user', ...<string, mixed>}, account?: array{ provider_account_ref?: string, ...<string, mixed>},
 *     event?: array{ kind?: 'message_received'|'message_updated', ...<string, mixed>}, ...<string, mixed>},
 *     ...<string, mixed>}
 * @phpstan-type CallMessageWebhookEventOutput array{ id: string, type: 'message.received'|'message.updated',
 *     provider: 'whatsapp', account_id: string, occurred_at: string, data: array{ message: CallMessageOutput,
 *     conversation?: array{ id: string, type: 'user', ...<string, mixed>}, sender?: array{ id: string,
 *     type?: 'user', ...<string, mixed>}, account?: array{ provider_account_ref?: string, ...<string, mixed>},
 *     event?: array{ kind?: 'message_received'|'message_updated', ...<string, mixed>}, ...<string, mixed>},
 *     ...<string, mixed>}
 * @phpstan-type ContactInput array{ id: string, conversation_id: string, display_name: string, avatar_url: string,
 *     provider_user_id: string, is_blocked?: bool, extra?: ContactExtraInput, ...<string, mixed>}
 * @phpstan-type ContactOutput array{ id: string, conversation_id: string, display_name: string, avatar_url: string,
 *     provider_user_id: string, is_blocked?: bool, extra?: ContactExtraOutput, ...<string, mixed>}
 * @phpstan-type ContactAddressBookInput array{ full_name?: string, first_name?: string}
 * @phpstan-type ContactAddressBookOutput array{ full_name?: string, first_name?: string}
 * @phpstan-type ContactBlocklistResultInput array{ blocklist: list<string>, dhash?: string, ...<string, mixed>}
 * @phpstan-type ContactBlocklistResultOutput array{ blocklist: list<string>, dhash?: string, ...<string, mixed>}
 * @phpstan-type ContactCardInput array{ name: string, phones?: list<ContactPhoneInput>,
 *     emails?: list<ContactEmailInput>, organization?: string, title?: string, ...<string, mixed>}
 * @phpstan-type ContactCardOutput array{ name: string, phones?: list<ContactPhoneOutput>,
 *     emails?: list<ContactEmailOutput>, organization?: string, title?: string, ...<string, mixed>}
 * @phpstan-type ContactCreateRequestInput array{ phone_number?: string, username?: string,
 *     whatsapp_options?: WhatsAppContactCreateOptionsInput}&(array{ phone_number: string, ...<string,
 *     mixed>}|array{ username: string, ...<string, mixed>})
 * @phpstan-type ContactCreateRequestOutput array{ phone_number?: string, username?: string,
 *     whatsapp_options?: WhatsAppContactCreateOptionsOutput}&(array{ phone_number: string, ...<string,
 *     mixed>}|array{ username: string, ...<string, mixed>})
 * @phpstan-type ContactEmailInput array{ address: string, type?: string, ...<string, mixed>}
 * @phpstan-type ContactEmailOutput array{ address: string, type?: string, ...<string, mixed>}
 * @phpstan-type ContactExtraInput array{ phone?: string, first_name?: string, full_name?: string,
 *     push_name?: string, username?: string, business_name?: string, redacted_phone?: string, ...<string, mixed>}
 * @phpstan-type ContactExtraOutput array{ phone?: string, first_name?: string, full_name?: string,
 *     push_name?: string, username?: string, business_name?: string, redacted_phone?: string, ...<string, mixed>}
 * @phpstan-type ContactIdRequestInput array{ contact_id: string, ...<string, mixed>}
 * @phpstan-type ContactIdRequestOutput array{ contact_id: string, ...<string, mixed>}
 * @phpstan-type ContactListResultInput array{ items: list<ContactInput>, next_cursor?: string, has_more: bool,
 *     ...<string, mixed>}
 * @phpstan-type ContactListResultOutput array{ items: list<ContactOutput>, next_cursor?: string, has_more: bool,
 *     ...<string, mixed>}
 * @phpstan-type ContactMembershipInput array{ contact_id: string, is_in_contacts: bool}
 * @phpstan-type ContactMembershipOutput array{ contact_id: string, is_in_contacts: bool}
 * @phpstan-type ContactMessagePayloadInput array{ type: 'contact', contacts: list<ContactCardInput>, ...<string,
 *     mixed>}
 * @phpstan-type ContactMessagePayloadOutput array{ type: 'contact', contacts: list<ContactCardOutput>, ...<string,
 *     mixed>}
 * @phpstan-type ContactNoteRequestInput array{ contact_id: string, note: string, ...<string, mixed>}
 * @phpstan-type ContactNoteRequestOutput array{ contact_id: string, note: string, ...<string, mixed>}
 * @phpstan-type ContactPhoneInput array{ number: string, type?: string, ...<string, mixed>}
 * @phpstan-type ContactPhoneOutput array{ number: string, type?: string, ...<string, mixed>}
 * @phpstan-type ContactUpdateChangeInput array{ kind: 'contact_updated', source: 'address_book'|'full_sync',
 *     changed_fields: list<'address_book.full_name'|'address_book.first_name'>, changed_at?: string}
 * @phpstan-type ContactUpdateChangeOutput array{ kind: 'contact_updated', source: 'address_book'|'full_sync',
 *     changed_fields: list<'address_book.full_name'|'address_book.first_name'>, changed_at?: string}
 * @phpstan-type ContactUpdateReferenceInput array{ id: string, conversation_id?: string,
 *     address_book: ContactAddressBookInput}
 * @phpstan-type ContactUpdateReferenceOutput array{ id: string, conversation_id?: string,
 *     address_book: ContactAddressBookOutput}
 * @phpstan-type ContactUpdatedDataInput array{ account?: ConversationStateAccountInput,
 *     contact: ContactUpdateReferenceInput, event: ContactUpdateChangeInput}
 * @phpstan-type ContactUpdatedDataOutput array{ account?: ConversationStateAccountOutput,
 *     contact: ContactUpdateReferenceOutput, event: ContactUpdateChangeOutput}
 * @phpstan-type ContactUpdatedWebhookEventInput array{ id: string, type: 'contact.updated',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: ContactUpdatedDataInput,
 *     ...<string, mixed>}
 * @phpstan-type ContactUpdatedWebhookEventOutput array{ id: string, type: 'contact.updated',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: ContactUpdatedDataOutput,
 *     ...<string, mixed>}
 * @phpstan-type ConversationInput array{ conversation_id: string, type: ConversationTypeInput, title: string,
 *     username?: string, avatar_url: string, description?: string, last_message_at?: string,
 *     last_message_text?: string, unread_count: int, members_count?: int, subscribers_count?: int, is_pinned: bool,
 *     is_muted: bool, created_at?: string, extra?: array{ is_announcement_group?: bool, ...<string, mixed>},
 *     ...<string, mixed>}
 * @phpstan-type ConversationOutput array{ conversation_id: string, type: ConversationTypeOutput, title: string,
 *     username?: string, avatar_url: string, description?: string, last_message_at?: string,
 *     last_message_text?: string, unread_count: int|string, members_count?: int|string,
 *     subscribers_count?: int|string, is_pinned: bool, is_muted: bool, created_at?: string, extra?: array{
 *     is_announcement_group?: bool, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type ConversationDisappearingMessagesChangeInput array{ kind: 'conversation_updated',
 *     change_type: 'disappearing_messages', changed_at?: string}
 * @phpstan-type ConversationDisappearingMessagesChangeOutput array{ kind: 'conversation_updated',
 *     change_type: 'disappearing_messages', changed_at?: string}
 * @phpstan-type ConversationDisappearingMessagesStateInput (array{ enabled: false, duration_seconds: 0, ...<string,
 *     mixed>}|array{ enabled: true, duration_seconds: int, ...<string, mixed>})
 * @phpstan-type ConversationDisappearingMessagesStateOutput (array{ enabled: false, duration_seconds: 0,
 *     ...<string, mixed>}|array{ enabled: true, duration_seconds: int|string, ...<string, mixed>})
 * @phpstan-type ConversationDisappearingMessagesUpdatedWebhookEventInput array{ id: string,
 *     type: 'conversation.updated', provider: ProviderNameInput, account_id: string, occurred_at: string,
 *     data: array{ account?: ConversationStateAccountInput, conversation: ConversationStateReferenceInput,
 *     disappearing_messages: ConversationDisappearingMessagesStateInput, actor?: ConversationStateActorInput,
 *     event: ConversationDisappearingMessagesChangeInput}, ...<string, mixed>}
 * @phpstan-type ConversationDisappearingMessagesUpdatedWebhookEventOutput array{ id: string,
 *     type: 'conversation.updated', provider: ProviderNameOutput, account_id: string, occurred_at: string,
 *     data: array{ account?: ConversationStateAccountOutput, conversation: ConversationStateReferenceOutput,
 *     disappearing_messages: ConversationDisappearingMessagesStateOutput, actor?: ConversationStateActorOutput,
 *     event: ConversationDisappearingMessagesChangeOutput}, ...<string, mixed>}
 * @phpstan-type ConversationHistoryAcceptedInput array{ status: 'accepted', conversation_id: string, limit: int,
 *     ...<string, mixed>}
 * @phpstan-type ConversationHistoryAcceptedOutput array{ status: 'accepted', conversation_id: string,
 *     limit: int|string, ...<string, mixed>}
 * @phpstan-type ConversationHistoryBeforeInput array{ message_id: string, sent_at: string,
 *     direction: 'inbound'|'outbound', ...<string, mixed>}
 * @phpstan-type ConversationHistoryBeforeOutput array{ message_id: string, sent_at: string,
 *     direction: 'inbound'|'outbound', ...<string, mixed>}
 * @phpstan-type ConversationHistoryMessageInput array{ id?: string, type?: string, text?: string, sent_at?: string,
 *     direction?: 'inbound'|'outbound', referral?: MessageReferralInput, ...<string, mixed>}
 * @phpstan-type ConversationHistoryMessageOutput array{ id?: string, type?: string, text?: string,
 *     sent_at?: string, direction?: 'inbound'|'outbound', referral?: MessageReferralOutput, ...<string, mixed>}
 * @phpstan-type ConversationHistoryRequestInput array{ conversation_id: string,
 *     before: ConversationHistoryBeforeInput, limit?: int, ...<string, mixed>}
 * @phpstan-type ConversationHistoryRequestOutput array{ conversation_id: string,
 *     before: ConversationHistoryBeforeOutput, limit?: int|string, ...<string, mixed>}
 * @phpstan-type ConversationHistorySourceInput array{ source: 'on_demand'}
 * @phpstan-type ConversationHistorySourceOutput array{ source: 'on_demand'}
 * @phpstan-type ConversationHistoryWebhookEventInput array{ id: string, type: 'conversation.history',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{ conversation: array{
 *     id: string, type: ConversationTypeInput, ...<string, mixed>},
 *     messages: list<ConversationHistoryMessageInput>, history?: ConversationHistorySourceInput, ...<string,
 *     mixed>}, ...<string, mixed>}
 * @phpstan-type ConversationHistoryWebhookEventOutput array{ id: string, type: 'conversation.history',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{ conversation: array{
 *     id: string, type: ConversationTypeOutput, ...<string, mixed>},
 *     messages: list<ConversationHistoryMessageOutput>, history?: ConversationHistorySourceOutput, ...<string,
 *     mixed>}, ...<string, mixed>}
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
 *     avatar_url: string, role?: 'member'|'admin'|'superadmin', joined_at?: string, extra?: FreeFormObjectInput,
 *     ...<string, mixed>}
 * @phpstan-type ConversationMemberOutput array{ peer_id: string, username?: string, display_name: string,
 *     avatar_url: string, role?: 'member'|'admin'|'superadmin', joined_at?: string, extra?: FreeFormObjectOutput,
 *     ...<string, mixed>}
 * @phpstan-type ConversationMemberListResultInput array{ items: list<ConversationMemberInput>,
 *     next_cursor?: string, has_more: bool, ...<string, mixed>}
 * @phpstan-type ConversationMemberListResultOutput array{ items: list<ConversationMemberOutput>,
 *     next_cursor?: string, has_more: bool, ...<string, mixed>}
 * @phpstan-type ConversationMuteRequestInput array{ conversation_id: string, duration?: int, mute_until?: string,
 *     ...<string, mixed>}
 * @phpstan-type ConversationMuteRequestOutput array{ conversation_id: string, duration?: int|string,
 *     mute_until?: string, ...<string, mixed>}
 * @phpstan-type ConversationReadRequestInput array{ conversation_id: string, up_to_message_id?: string,
 *     up_to_message_sender_id?: string, ...<string, mixed>}
 * @phpstan-type ConversationReadRequestOutput array{ conversation_id: string, up_to_message_id?: string,
 *     up_to_message_sender_id?: string, ...<string, mixed>}
 * @phpstan-type ConversationStateAccountInput array{ provider_account_ref: string}
 * @phpstan-type ConversationStateAccountOutput array{ provider_account_ref: string}
 * @phpstan-type ConversationStateActorInput array{ id: string, type?: 'user', name?: string}
 * @phpstan-type ConversationStateActorOutput array{ id: string, type?: 'user', name?: string}
 * @phpstan-type ConversationStateReferenceInput array{ id: string, type: ConversationTypeInput}
 * @phpstan-type ConversationStateReferenceOutput array{ id: string, type: ConversationTypeOutput}
 * @phpstan-type ConversationTypeInput 'user'|'group'|'channel'
 * @phpstan-type ConversationTypeOutput 'user'|'group'|'channel'
 * @phpstan-type CreateCallDataInput array{ call_id: string, direction: 'outbound', media_type: 'voice'|'video',
 *     state: 'preparing', join_url: string, expires_at: string, ...<string, mixed>}
 * @phpstan-type CreateCallDataOutput array{ call_id: string, direction: 'outbound', media_type: 'voice'|'video',
 *     state: 'preparing', join_url: string, expires_at: string, ...<string, mixed>}
 * @phpstan-type CreateCallRequestInput array{ account_id: string, to: array{ id: string,
 *     type: ConversationTypeInput, ...<string, mixed>}, media_type: 'voice'|'video', ...<string, mixed>}
 * @phpstan-type CreateCallRequestOutput array{ account_id: string, to: array{ id: string,
 *     type: ConversationTypeOutput, ...<string, mixed>}, media_type: 'voice'|'video', ...<string, mixed>}
 * @phpstan-type EndedCallDataInput array{ call_id: string, state: 'ended'|'failed',
 *     direction: 'inbound'|'outbound', media_type: 'voice'|'video'}
 * @phpstan-type EndedCallDataOutput array{ call_id: string, state: 'ended'|'failed',
 *     direction: 'inbound'|'outbound', media_type: 'voice'|'video'}
 * @phpstan-type ErrorInput array{ code: string, numeric_code: string, message: string, ...<string, mixed>}
 * @phpstan-type ErrorOutput array{ code: string, numeric_code: string, message: string, ...<string, mixed>}
 * @phpstan-type ErrorEnvelopeInput array{ request_id?: string, client_request_id?: string, error: ErrorInput,
 *     ...<string, mixed>}
 * @phpstan-type ErrorEnvelopeOutput array{ request_id?: string, client_request_id?: string, error: ErrorOutput,
 *     ...<string, mixed>}
 * @phpstan-type FacebookAccountAuthFailedWebhookEventInput array{ id: string, type: 'account.auth.failed',
 *     provider: 'facebook', account_id: string, occurred_at: string, data: array{ account?: array{
 *     provider_account_ref?: string, ...<string, mixed>}, event?: array{ kind?: string, runtime_status?: string,
 *     ...<string, mixed>}, auth_status: 'failed', runtime_status: 'disconnected', last_error?: string, ...<string,
 *     mixed>}, ...<string, mixed>}
 * @phpstan-type FacebookAccountAuthFailedWebhookEventOutput array{ id: string, type: 'account.auth.failed',
 *     provider: 'facebook', account_id: string, occurred_at: string, data: array{ account?: array{
 *     provider_account_ref?: string, ...<string, mixed>}, event?: array{ kind?: string, runtime_status?: string,
 *     ...<string, mixed>}, auth_status: 'failed', runtime_status: 'disconnected', last_error?: string, ...<string,
 *     mixed>}, ...<string, mixed>}
 * @phpstan-type FacebookAccountAuthSucceededWebhookEventInput array{ id: string, type: 'account.auth.succeeded',
 *     provider: 'facebook', account_id: string, occurred_at: string, data: array{ account?: array{
 *     provider_account_ref?: string, ...<string, mixed>}, event?: array{ kind?: string, runtime_status?: string,
 *     ...<string, mixed>}, auth_status: 'authorized', runtime_status: 'running', ...<string, mixed>}, ...<string,
 *     mixed>}
 * @phpstan-type FacebookAccountAuthSucceededWebhookEventOutput array{ id: string, type: 'account.auth.succeeded',
 *     provider: 'facebook', account_id: string, occurred_at: string, data: array{ account?: array{
 *     provider_account_ref?: string, ...<string, mixed>}, event?: array{ kind?: string, runtime_status?: string,
 *     ...<string, mixed>}, auth_status: 'authorized', runtime_status: 'running', ...<string, mixed>}, ...<string,
 *     mixed>}
 * @phpstan-type FacebookAccountStatusUpdatedWebhookEventInput array{ id: string, type: 'account.status.updated',
 *     provider: 'facebook', account_id: string, occurred_at: string, data: array{ account?: array{
 *     provider_account_ref?: string, ...<string, mixed>}, event?: array{ kind?: string, runtime_status?: string,
 *     ...<string, mixed>}, runtime_status: 'error', last_error?: string, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type FacebookAccountStatusUpdatedWebhookEventOutput array{ id: string, type: 'account.status.updated',
 *     provider: 'facebook', account_id: string, occurred_at: string, data: array{ account?: array{
 *     provider_account_ref?: string, ...<string, mixed>}, event?: array{ kind?: string, runtime_status?: string,
 *     ...<string, mixed>}, runtime_status: 'error', last_error?: string, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type FacebookAttachmentMetadataInput array{ filename?: string, sticker_id?: string, error_code?: string,
 *     upload_error_code?: string, preview_error_code?: string, preview_upload_error_code?: string,
 *     width?: float|int, height?: float|int, duration?: float|int, ptt?: bool, animated?: bool,
 *     download_status?: 'pending'|'ready'|'failed'|'restricted'|'expired'|'unavailable', ...<string, mixed>}
 * @phpstan-type FacebookAttachmentMetadataOutput array{ filename?: string, sticker_id?: string,
 *     error_code?: string, upload_error_code?: string, preview_error_code?: string,
 *     preview_upload_error_code?: string, width?: float|int|string, height?: float|int|string,
 *     duration?: float|int|string, ptt?: bool, animated?: bool,
 *     download_status?: 'pending'|'ready'|'failed'|'restricted'|'expired'|'unavailable', ...<string, mixed>}
 * @phpstan-type FacebookMessageInput array{ id: string, direction: 'inbound'|'outbound', type?: 'sticker',
 *     text?: string, sent_at?: string, reply_to_message_id?: string,
 *     attachments?: list<FacebookMessageAttachmentInput>, ...<string, mixed>}
 * @phpstan-type FacebookMessageOutput array{ id: string, direction: 'inbound'|'outbound', type?: 'sticker',
 *     text?: string, sent_at?: string, reply_to_message_id?: string,
 *     attachments?: list<FacebookMessageAttachmentOutput>, ...<string, mixed>}
 * @phpstan-type FacebookMessageAttachmentInput array{ id?: string, type: 'image'|'video'|'audio'|'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, title?: string, description?: string,
 *     metadata?: FacebookAttachmentMetadataInput, ...<string, mixed>}
 * @phpstan-type FacebookMessageAttachmentOutput array{ id?: string, type: 'image'|'video'|'audio'|'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, title?: string,
 *     description?: string, metadata?: FacebookAttachmentMetadataOutput, ...<string, mixed>}
 * @phpstan-type FacebookMessageReceivedWebhookEventInput array{ id: string, type: 'message.received',
 *     provider: 'facebook', account_id: string, occurred_at: string, data: array{ account?: array{
 *     provider_account_ref?: string, ...<string, mixed>}, event?: array{ kind?: string, runtime_status?: string,
 *     ...<string, mixed>}, conversation: array{ id: string, type: 'user', ...<string, mixed>}, sender: array{
 *     id: string, type: 'user', ...<string, mixed>}, message: FacebookMessageInput, ...<string, mixed>},
 *     ...<string, mixed>}
 * @phpstan-type FacebookMessageReceivedWebhookEventOutput array{ id: string, type: 'message.received',
 *     provider: 'facebook', account_id: string, occurred_at: string, data: array{ account?: array{
 *     provider_account_ref?: string, ...<string, mixed>}, event?: array{ kind?: string, runtime_status?: string,
 *     ...<string, mixed>}, conversation: array{ id: string, type: 'user', ...<string, mixed>}, sender: array{
 *     id: string, type: 'user', ...<string, mixed>}, message: FacebookMessageOutput, ...<string, mixed>},
 *     ...<string, mixed>}
 * @phpstan-type FreeFormObjectInput array<string, mixed>
 * @phpstan-type FreeFormObjectOutput array<string, mixed>
 * @phpstan-type GroupInput array{ id: string, conversation_id: string, name: string, avatar_url: string,
 *     member_count?: int, joined_at?: string, created_at?: string, description?: string,
 *     permissions?: GroupPermissionsInput, extra?: array{ is_announcement_group?: bool, ...<string, mixed>},
 *     ...<string, mixed>}
 * @phpstan-type GroupOutput array{ id: string, conversation_id: string, name: string, avatar_url: string,
 *     member_count?: int|string, joined_at?: string, created_at?: string, description?: string,
 *     permissions?: GroupPermissionsOutput, extra?: array{ is_announcement_group?: bool, ...<string, mixed>},
 *     ...<string, mixed>}
 * @phpstan-type GroupAnnouncementChangeInput array{ kind: 'announcement_changed', admins_only: bool}
 * @phpstan-type GroupAnnouncementChangeOutput array{ kind: 'announcement_changed', admins_only: bool}
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
 * @phpstan-type GroupInviteLinkChangeInput array{ kind: 'invite_link_changed'}
 * @phpstan-type GroupInviteLinkChangeOutput array{ kind: 'invite_link_changed'}
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
 * @phpstan-type GroupPermissionsInput array{ admins_only?: bool}
 * @phpstan-type GroupPermissionsOutput array{ admins_only?: bool}
 * @phpstan-type GroupSettingsEventInput array{ kind: 'group_updated', changed_at?: string}
 * @phpstan-type GroupSettingsEventOutput array{ kind: 'group_updated', changed_at?: string}
 * @phpstan-type GroupSettingsUpdatedWebhookEventInput array{ id: string, type: 'group.updated',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{
 *     account?: ConversationStateAccountInput, conversation: ConversationStateReferenceInput,
 *     actor?: ConversationStateActorInput, changes: list<GroupUpdatedChangeInput>, event: GroupSettingsEventInput},
 *     ...<string, mixed>}
 * @phpstan-type GroupSettingsUpdatedWebhookEventOutput array{ id: string, type: 'group.updated',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{
 *     account?: ConversationStateAccountOutput, conversation: ConversationStateReferenceOutput,
 *     actor?: ConversationStateActorOutput, changes: list<GroupUpdatedChangeOutput>,
 *     event: GroupSettingsEventOutput}, ...<string, mixed>}
 * @phpstan-type GroupUpdatedChangeInput (GroupAnnouncementChangeInput|GroupInviteLinkChangeInput|array{
 *     kind: string, ...<string, mixed>})
 * @phpstan-type GroupUpdatedChangeOutput (GroupAnnouncementChangeOutput|GroupInviteLinkChangeOutput|array{
 *     kind: string, ...<string, mixed>})
 * @phpstan-type LinkPreviewMessagePayloadInput array{ type: 'link_preview', text: string,
 *     link_preview: SendMessageLinkPreviewInput}
 * @phpstan-type LinkPreviewMessagePayloadOutput array{ type: 'link_preview', text: string,
 *     link_preview: SendMessageLinkPreviewOutput}
 * @phpstan-type MediaMessagePayloadInput (array{ type: 'image'|'video'|'audio'|'document'|'file', url?: string,
 *     file_url?: string, file_key?: string, caption?: string, ...<string, mixed>})&(array{ url: mixed, ...<string,
 *     mixed>}|array{ file_url: mixed, ...<string, mixed>}|array{ file_key: mixed, ...<string, mixed>})
 * @phpstan-type MediaMessagePayloadOutput (array{ type: 'image'|'video'|'audio'|'document'|'file', url?: string,
 *     file_url?: string, file_key?: string, caption?: string, ...<string, mixed>})&(array{ url: mixed, ...<string,
 *     mixed>}|array{ file_url: mixed, ...<string, mixed>}|array{ file_key: mixed, ...<string, mixed>})
 * @phpstan-type MentionInput (array{ type?: 'member'|'all', id?: string, ...<string, mixed>})&(array{
 *     type?: 'member', id: string, ...<string, mixed>}|array{ type: 'all', id?: never, ...<string, mixed>})
 * @phpstan-type MentionOutput (array{ type?: 'member'|'all', id?: string, ...<string, mixed>})&(array{
 *     type?: 'member', id: string, ...<string, mixed>}|array{ type: 'all', id?: never, ...<string, mixed>})
 * @phpstan-type MessageCommerceInput (array{ id?: string, referral?: MessageReferralInput, type: 'product',
 *     product: array{ id?: string, title?: string, description?: string, url?: string, image_url?: string,
 *     price?: array{ amount?: string, currency?: string}}, order?: never, ...<string, mixed>}|array{ id?: string,
 *     referral?: MessageReferralInput, type: 'order', product?: never, order: array{ id?: string, title?: string,
 *     item_count?: int, status?: 'inquiry'|'accepted'|'declined', thumbnail_url?: string, total?: array{
 *     amount?: string, currency?: string}}, ...<string, mixed>})
 * @phpstan-type MessageCommerceOutput (array{ id?: string, referral?: MessageReferralOutput, type: 'product',
 *     product: array{ id?: string, title?: string, description?: string, url?: string, image_url?: string,
 *     price?: array{ amount?: string, currency?: string}}, order?: never, ...<string, mixed>}|array{ id?: string,
 *     referral?: MessageReferralOutput, type: 'order', product?: never, order: array{ id?: string, title?: string,
 *     item_count?: int|string, status?: 'inquiry'|'accepted'|'declined', thumbnail_url?: string, total?: array{
 *     amount?: string, currency?: string}}, ...<string, mixed>})
 * @phpstan-type MessageCommerceHTTPURLInput string
 * @phpstan-type MessageCommerceHTTPURLOutput string
 * @phpstan-type MessageCommerceHistoryWebhookEventInput array{ id: string, type: 'conversation.history',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{ message?: (array{
 *     id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'product', product: array{ id?: string, title?: string, description?: string, url?: string,
 *     image_url?: string, price?: array{ amount?: string, currency?: string}}, order?: never, ...<string,
 *     mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'order', product?: never, order: array{ id?: string, title?: string, item_count?: int,
 *     status?: 'inquiry'|'accepted'|'declined', thumbnail_url?: string, total?: array{ amount?: string,
 *     currency?: string}}, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type?: mixed, product?: never,
 *     order?: never, ...<string, mixed>}), messages: list<MessageWithOptionalCommerceInput>, ...<string, mixed>},
 *     ...<string, mixed>}
 * @phpstan-type MessageCommerceHistoryWebhookEventOutput array{ id: string, type: 'conversation.history',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{ message?: (array{
 *     id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'product', product: array{ id?: string, title?: string, description?: string, url?: string,
 *     image_url?: string, price?: array{ amount?: string, currency?: string}}, order?: never, ...<string,
 *     mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'order', product?: never, order: array{ id?: string, title?: string, item_count?: int|string,
 *     status?: 'inquiry'|'accepted'|'declined', thumbnail_url?: string, total?: array{ amount?: string,
 *     currency?: string}}, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type?: mixed, product?: never,
 *     order?: never, ...<string, mixed>}), messages: list<MessageWithOptionalCommerceOutput>, ...<string, mixed>},
 *     ...<string, mixed>}
 * @phpstan-type MessageCommerceMoneyInput array{ amount?: string, currency?: string}
 * @phpstan-type MessageCommerceMoneyOutput array{ amount?: string, currency?: string}
 * @phpstan-type MessageCommerceReceivedWebhookEventInput array{ id: string, type: 'message.received',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{ message: (array{
 *     id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'product', product: array{ id?: string, title?: string, description?: string, url?: string,
 *     image_url?: string, price?: array{ amount?: string, currency?: string}}, order?: never, ...<string,
 *     mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'order', product: never, order: never, ...<string, mixed>}|array{ id?: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'product', product: never,
 *     order: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'order', product?: never,
 *     order: array{ id?: string, title?: string, item_count?: int, status?: 'inquiry'|'accepted'|'declined',
 *     thumbnail_url?: string, total?: array{ amount?: string, currency?: string}}, ...<string, mixed>}|array{
 *     id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'product', product: never, order?: never, ...<string, mixed>}|array{ id?: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'order', product?: never,
 *     order: never, ...<string, mixed>}), messages?: list<MessageWithOptionalCommerceInput>, ...<string, mixed>},
 *     ...<string, mixed>}
 * @phpstan-type MessageCommerceReceivedWebhookEventOutput array{ id: string, type: 'message.received',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{ message: (array{
 *     id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'product', product: array{ id?: string, title?: string, description?: string, url?: string,
 *     image_url?: string, price?: array{ amount?: string, currency?: string}}, order?: never, ...<string,
 *     mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'order', product: never, order: never, ...<string, mixed>}|array{ id?: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'product', product: never,
 *     order: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'order', product?: never,
 *     order: array{ id?: string, title?: string, item_count?: int|string, status?: 'inquiry'|'accepted'|'declined',
 *     thumbnail_url?: string, total?: array{ amount?: string, currency?: string}}, ...<string, mixed>}|array{
 *     id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'product', product: never, order?: never, ...<string, mixed>}|array{ id?: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'order', product?: never,
 *     order: never, ...<string, mixed>}), messages?: list<MessageWithOptionalCommerceOutput>, ...<string, mixed>},
 *     ...<string, mixed>}
 * @phpstan-type MessageCommerceUpdatedWebhookEventInput array{ id: string, type: 'message.updated',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{ message: (array{
 *     id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'product', product: array{ id?: string, title?: string, description?: string, url?: string,
 *     image_url?: string, price?: array{ amount?: string, currency?: string}}, order?: never, ...<string,
 *     mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'order', product: never, order: never, ...<string, mixed>}|array{ id: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'product', product: never,
 *     order: never, ...<string, mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'order', product?: never,
 *     order: array{ id?: string, title?: string, item_count?: int, status?: 'inquiry'|'accepted'|'declined',
 *     thumbnail_url?: string, total?: array{ amount?: string, currency?: string}}, ...<string, mixed>}|array{
 *     id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'product', product: never, order?: never, ...<string, mixed>}|array{ id: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'order', product?: never,
 *     order: never, ...<string, mixed>}), messages?: list<MessageWithOptionalCommerceInput>, ...<string, mixed>},
 *     ...<string, mixed>}
 * @phpstan-type MessageCommerceUpdatedWebhookEventOutput array{ id: string, type: 'message.updated',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{ message: (array{
 *     id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'product', product: array{ id?: string, title?: string, description?: string, url?: string,
 *     image_url?: string, price?: array{ amount?: string, currency?: string}}, order?: never, ...<string,
 *     mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'order', product: never, order: never, ...<string, mixed>}|array{ id: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'product', product: never,
 *     order: never, ...<string, mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'order', product?: never,
 *     order: array{ id?: string, title?: string, item_count?: int|string, status?: 'inquiry'|'accepted'|'declined',
 *     thumbnail_url?: string, total?: array{ amount?: string, currency?: string}}, ...<string, mixed>}|array{
 *     id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'product', product: never, order?: never, ...<string, mixed>}|array{ id: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'order', product?: never,
 *     order: never, ...<string, mixed>}), messages?: list<MessageWithOptionalCommerceOutput>, ...<string, mixed>},
 *     ...<string, mixed>}
 * @phpstan-type MessageCommerceWebhookEventInput array{ id: string,
 *     type: 'message.received'|'message.updated'|'conversation.history', provider: ProviderNameInput,
 *     account_id: string, occurred_at: string, data: array{ message?: (array{ id?: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'product', product: array{
 *     id?: string, title?: string, description?: string, url?: string, image_url?: string, price?: array{
 *     amount?: string, currency?: string}}, order?: never, ...<string, mixed>}|array{ id?: string,
 *     referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'order', product?: never,
 *     order: array{ id?: string, title?: string, item_count?: int, status?: 'inquiry'|'accepted'|'declined',
 *     thumbnail_url?: string, total?: array{ amount?: string, currency?: string}}, ...<string, mixed>}|array{
 *     id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type?: mixed, product?: never, order?: never, ...<string, mixed>}),
 *     messages?: list<MessageWithOptionalCommerceInput>, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessageCommerceWebhookEventOutput array{ id: string,
 *     type: 'message.received'|'message.updated'|'conversation.history', provider: ProviderNameOutput,
 *     account_id: string, occurred_at: string, data: array{ message?: (array{ id?: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'product', product: array{
 *     id?: string, title?: string, description?: string, url?: string, image_url?: string, price?: array{
 *     amount?: string, currency?: string}}, order?: never, ...<string, mixed>}|array{ id?: string,
 *     referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'order', product?: never,
 *     order: array{ id?: string, title?: string, item_count?: int|string, status?: 'inquiry'|'accepted'|'declined',
 *     thumbnail_url?: string, total?: array{ amount?: string, currency?: string}}, ...<string, mixed>}|array{
 *     id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type?: mixed, product?: never, order?: never, ...<string, mixed>}),
 *     messages?: list<MessageWithOptionalCommerceOutput>, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessageContactCardsInput array{ id?: string, type?: 'contact',
 *     contacts: list<ReceivedContactCardInput>, ...<string, mixed>}&(array{ text: string, contacts?: mixed,
 *     ...<string, mixed>}|array{ id: string, text?: never, reply_token?: never, type: 'contact', ...<string,
 *     mixed>})
 * @phpstan-type MessageContactCardsOutput array{ id?: string, type?: 'contact',
 *     contacts: list<ReceivedContactCardOutput>, ...<string, mixed>}&(array{ text: string, contacts?: mixed,
 *     ...<string, mixed>}|array{ id: string, text?: never, reply_token?: never, type: 'contact', ...<string,
 *     mixed>})
 * @phpstan-type MessageContactCardsHistoryWebhookEventInput array{ id: string, type: 'conversation.history',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{
 *     message?: MessageWithOptionalReferralInput, messages: list<MessageWithOptionalContactCardsInput>, ...<string,
 *     mixed>}, ...<string, mixed>}
 * @phpstan-type MessageContactCardsHistoryWebhookEventOutput array{ id: string, type: 'conversation.history',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{
 *     message?: MessageWithOptionalReferralOutput, messages: list<MessageWithOptionalContactCardsOutput>,
 *     ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessageContactCardsReceivedWebhookEventInput array{ id: string, type: 'message.received',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{ message: (array{
 *     id?: string, referral?: MessageReferralInput, type?: 'contact', contacts: list<ReceivedContactCardInput>,
 *     text: string, ...<string, mixed>}|array{ id: string, referral?: MessageReferralInput, type: 'contact',
 *     contacts: list<ReceivedContactCardInput>, text?: never, reply_token?: never, ...<string, mixed>}),
 *     messages?: list<MessageWithOptionalReferralInput>, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessageContactCardsReceivedWebhookEventOutput array{ id: string, type: 'message.received',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{ message: (array{
 *     id?: string, referral?: MessageReferralOutput, type?: 'contact', contacts: list<ReceivedContactCardOutput>,
 *     text: string, ...<string, mixed>}|array{ id: string, referral?: MessageReferralOutput, type: 'contact',
 *     contacts: list<ReceivedContactCardOutput>, text?: never, reply_token?: never, ...<string, mixed>}),
 *     messages?: list<MessageWithOptionalReferralOutput>, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessageContactCardsUpdatedWebhookEventInput array{ id: string, type: 'message.updated',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{ message: (array{
 *     id: string, referral?: MessageReferralInput, type?: 'contact', contacts: list<ReceivedContactCardInput>,
 *     text: string, ...<string, mixed>}|array{ id: string, referral?: MessageReferralInput, type: 'contact',
 *     contacts: list<ReceivedContactCardInput>, text?: never, reply_token?: never, ...<string, mixed>}),
 *     messages?: list<MessageWithOptionalReferralInput>, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessageContactCardsUpdatedWebhookEventOutput array{ id: string, type: 'message.updated',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{ message: (array{
 *     id: string, referral?: MessageReferralOutput, type?: 'contact', contacts: list<ReceivedContactCardOutput>,
 *     text: string, ...<string, mixed>}|array{ id: string, referral?: MessageReferralOutput, type: 'contact',
 *     contacts: list<ReceivedContactCardOutput>, text?: never, reply_token?: never, ...<string, mixed>}),
 *     messages?: list<MessageWithOptionalReferralOutput>, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessageEditRequestInput array{ account_id: string, conversation_id: string, message_id: string,
 *     content: string, ...<string, mixed>}
 * @phpstan-type MessageEditRequestOutput array{ account_id: string, conversation_id: string, message_id: string,
 *     content: string, ...<string, mixed>}
 * @phpstan-type MessageInteractiveInput (array{ kind: 'buttons'|'template', header?: MessageInteractiveHeaderInput,
 *     body?: string, footer?: string, buttons?: list<MessageInteractiveButtonInput>})&(array{
 *     header: MessageInteractiveHeaderInput, ...<string, mixed>}|array{ body: string, ...<string, mixed>}|array{
 *     footer: string, ...<string, mixed>}|array{ buttons: list<MessageInteractiveButtonInput>, ...<string, mixed>})
 * @phpstan-type MessageInteractiveOutput (array{ kind: 'buttons'|'template',
 *     header?: MessageInteractiveHeaderOutput, body?: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>})&(array{ header: MessageInteractiveHeaderOutput, ...<string,
 *     mixed>}|array{ body: string, ...<string, mixed>}|array{ footer: string, ...<string, mixed>}|array{
 *     buttons: list<MessageInteractiveButtonOutput>, ...<string, mixed>})
 * @phpstan-type MessageInteractiveAttachmentInput array{ id?: string, type: 'image'|'video'|'document',
 *     url?: MessageCommerceHTTPURLInput, thumbnail_url?: MessageCommerceHTTPURLInput, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: MessageInteractiveAttachmentMetadataInput, title?: string,
 *     description?: string, expired?: bool}
 * @phpstan-type MessageInteractiveAttachmentOutput array{ id?: string, type: 'image'|'video'|'document',
 *     url?: MessageCommerceHTTPURLOutput, thumbnail_url?: MessageCommerceHTTPURLOutput, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: MessageInteractiveAttachmentMetadataOutput,
 *     title?: string, description?: string, expired?: bool}
 * @phpstan-type MessageInteractiveAttachmentMetadataInput array{ width?: int, height?: int, file_length?: int,
 *     size?: int, is_big_file?: bool}
 * @phpstan-type MessageInteractiveAttachmentMetadataOutput array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}
 * @phpstan-type MessageInteractiveButtonInput (array{ type: 'reply'|'url'|'phone', id?: string, title?: string,
 *     url?: MessageCommerceHTTPURLInput, phone_number?: string, index?: int})&(array{ type?: 'reply', url?: never,
 *     phone_number?: never, ...<string, mixed>}|array{ type?: 'url', id?: never, phone_number?: never, ...<string,
 *     mixed>}|array{ type?: 'phone', id?: never, url?: never, ...<string, mixed>})
 * @phpstan-type MessageInteractiveButtonOutput (array{ type: 'reply'|'url'|'phone', id?: string, title?: string,
 *     url?: MessageCommerceHTTPURLOutput, phone_number?: string, index?: int|string})&(array{ type?: 'reply',
 *     url?: never, phone_number?: never, ...<string, mixed>}|array{ type?: 'url', id?: never, phone_number?: never,
 *     ...<string, mixed>}|array{ type?: 'phone', id?: never, url?: never, ...<string, mixed>})
 * @phpstan-type MessageInteractiveHeaderInput (array{ type: 'text'|'image'|'video'|'document', text?: string,
 *     attachment?: MessageInteractiveAttachmentInput})&(array{ type: 'text', attachment?: never, text: string,
 *     ...<string, mixed>}|array{ type: 'image', text?: never, attachment: array{ type?: 'image', ...<string,
 *     mixed>}, ...<string, mixed>}|array{ type: 'video', text?: never, attachment: array{ type?: 'video',
 *     ...<string, mixed>}, ...<string, mixed>}|array{ type: 'document', text?: never, attachment: array{
 *     type?: 'document', ...<string, mixed>}, ...<string, mixed>})
 * @phpstan-type MessageInteractiveHeaderOutput (array{ type: 'text'|'image'|'video'|'document', text?: string,
 *     attachment?: MessageInteractiveAttachmentOutput})&(array{ type: 'text', attachment?: never, text: string,
 *     ...<string, mixed>}|array{ type: 'image', text?: never, attachment: array{ type?: 'image', ...<string,
 *     mixed>}, ...<string, mixed>}|array{ type: 'video', text?: never, attachment: array{ type?: 'video',
 *     ...<string, mixed>}, ...<string, mixed>}|array{ type: 'document', text?: never, attachment: array{
 *     type?: 'document', ...<string, mixed>}, ...<string, mixed>})
 * @phpstan-type MessageInteractiveHistoryWebhookEventInput array{ id: string, type: 'conversation.history',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{ message?: (array{
 *     id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'interactive', interactive: (array{ kind: 'buttons'|'template', header: (array{ type: 'text',
 *     text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{ type: 'video',
 *     text: never, attachment: never}|array{ type: 'document', text: never, attachment: never}|array{ type: 'text',
 *     text: never, attachment: never}|array{ type: 'image', text?: never, attachment: array{ id?: string,
 *     type: 'image', url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int,
 *     metadata?: array{ width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool},
 *     title?: string, description?: string, expired?: bool}}|array{ type: 'video', text?: never, attachment: array{
 *     id?: string, type: 'video', url?: string, thumbnail_url?: string, mimetype?: string, size?: int,
 *     duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string, expired?: bool}}),
 *     body?: string, footer?: string, buttons?: list<MessageInteractiveButtonInput>}|array{
 *     kind: 'buttons'|'template', header: (array{ type: 'text', text: string, attachment?: never}|array{
 *     type: 'image', text: never, attachment: never}|array{ type: 'video', text: never, attachment: never}|array{
 *     type: 'document', text: never, attachment: never}|array{ type: 'text', text: never, attachment: never}|array{
 *     type: 'image', text?: never, attachment: array{ id?: string, type: 'image', url?: string,
 *     thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int,
 *     height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string,
 *     type: 'document', url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int,
 *     metadata?: array{ width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool},
 *     title?: string, description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}), interactive_response?: never, product?: never, order?: never,
 *     ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive_response',
 *     interactive?: never, interactive_response: (array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index: int, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int, title?: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index?: int, title: string}), product?: never, order?: never, ...<string, mixed>}|array{
 *     id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'product', product: array{ id?: string, title?: string, description?: string, url?: string,
 *     image_url?: string, price?: array{ amount?: string, currency?: string}}, order?: never, interactive?: never,
 *     interactive_response?: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'order', product?: never,
 *     order: array{ id?: string, title?: string, item_count?: int, status?: 'inquiry'|'accepted'|'declined',
 *     thumbnail_url?: string, total?: array{ amount?: string, currency?: string}}, interactive?: never,
 *     interactive_response?: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type?: mixed, product?: never,
 *     order?: never, interactive?: never, interactive_response?: never, ...<string, mixed>}),
 *     messages: list<MessageWithOptionalInteractiveInput>, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessageInteractiveHistoryWebhookEventOutput array{ id: string, type: 'conversation.history',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{ message?: (array{
 *     id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'interactive', interactive: (array{ kind: 'buttons'|'template', header: (array{ type: 'text',
 *     text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{ type: 'video',
 *     text: never, attachment: never}|array{ type: 'document', text: never, attachment: never}|array{ type: 'text',
 *     text: never, attachment: never}|array{ type: 'image', text?: never, attachment: array{ id?: string,
 *     type: 'image', url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string,
 *     duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}), interactive_response?: never, product?: never,
 *     order?: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive_response',
 *     interactive?: never, interactive_response: (array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int|string, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int|string, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index?: int|string, title: string}), product?: never, order?: never, ...<string, mixed>}|array{
 *     id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'product', product: array{ id?: string, title?: string, description?: string, url?: string,
 *     image_url?: string, price?: array{ amount?: string, currency?: string}}, order?: never, interactive?: never,
 *     interactive_response?: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'order', product?: never,
 *     order: array{ id?: string, title?: string, item_count?: int|string, status?: 'inquiry'|'accepted'|'declined',
 *     thumbnail_url?: string, total?: array{ amount?: string, currency?: string}}, interactive?: never,
 *     interactive_response?: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type?: mixed, product?: never,
 *     order?: never, interactive?: never, interactive_response?: never, ...<string, mixed>}),
 *     messages: list<MessageWithOptionalInteractiveOutput>, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessageInteractiveMessageInput (array{ id?: string, referral?: MessageReferralInput,
 *     type: 'interactive', interactive: (array{ kind: 'buttons'|'template', header: (array{ type: 'text',
 *     text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{ type: 'video',
 *     text: never, attachment: never}|array{ type: 'document', text: never, attachment: never}|array{ type: 'text',
 *     text: never, attachment: never}|array{ type: 'image', text?: never, attachment: array{ id?: string,
 *     type: 'image', url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int,
 *     metadata?: array{ width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool},
 *     title?: string, description?: string, expired?: bool}}|array{ type: 'video', text?: never, attachment: array{
 *     id?: string, type: 'video', url?: string, thumbnail_url?: string, mimetype?: string, size?: int,
 *     duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string, expired?: bool}}),
 *     body?: string, footer?: string, buttons?: list<MessageInteractiveButtonInput>}|array{
 *     kind: 'buttons'|'template', header: (array{ type: 'text', text: string, attachment?: never}|array{
 *     type: 'image', text: never, attachment: never}|array{ type: 'video', text: never, attachment: never}|array{
 *     type: 'document', text: never, attachment: never}|array{ type: 'text', text: never, attachment: never}|array{
 *     type: 'image', text?: never, attachment: array{ id?: string, type: 'image', url?: string,
 *     thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int,
 *     height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string,
 *     type: 'document', url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int,
 *     metadata?: array{ width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool},
 *     title?: string, description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}), interactive_response?: never, product?: never, order?: never,
 *     ...<string, mixed>}|array{ id?: string, referral?: MessageReferralInput, type: 'interactive_response',
 *     interactive?: never, interactive_response: (array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index: int, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int, title?: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index?: int, title: string}), product?: never, order?: never, ...<string, mixed>})
 * @phpstan-type MessageInteractiveMessageOutput (array{ id?: string, referral?: MessageReferralOutput,
 *     type: 'interactive', interactive: (array{ kind: 'buttons'|'template', header: (array{ type: 'text',
 *     text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{ type: 'video',
 *     text: never, attachment: never}|array{ type: 'document', text: never, attachment: never}|array{ type: 'text',
 *     text: never, attachment: never}|array{ type: 'image', text?: never, attachment: array{ id?: string,
 *     type: 'image', url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string,
 *     duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}), interactive_response?: never, product?: never,
 *     order?: never, ...<string, mixed>}|array{ id?: string, referral?: MessageReferralOutput,
 *     type: 'interactive_response', interactive?: never, interactive_response: (array{
 *     kind: 'button'|'template_button', selected_id: string, selected_index?: int|string, title?: string}|array{
 *     kind: 'button'|'template_button', selected_id: string, selected_index: int|string, title?: string}|array{
 *     kind: 'button'|'template_button', selected_id: string, selected_index?: int|string, title: string}|array{
 *     kind: 'button'|'template_button', selected_id?: string, selected_index: int|string, title?: string}|array{
 *     kind: 'button'|'template_button', selected_id?: string, selected_index: int|string, title: string}|array{
 *     kind: 'button'|'template_button', selected_id?: string, selected_index?: int|string, title: string}),
 *     product?: never, order?: never, ...<string, mixed>})
 * @phpstan-type MessageInteractiveReceivedWebhookEventInput array{ id: string, type: 'message.received',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{ message: (array{
 *     id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'interactive', interactive: (array{ kind: 'buttons'|'template', header: (array{ type: 'text',
 *     text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{ type: 'video',
 *     text: never, attachment: never}|array{ type: 'document', text: never, attachment: never}|array{ type: 'text',
 *     text: never, attachment: never}|array{ type: 'image', text?: never, attachment: array{ id?: string,
 *     type: 'image', url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int,
 *     metadata?: array{ width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool},
 *     title?: string, description?: string, expired?: bool}}|array{ type: 'video', text?: never, attachment: array{
 *     id?: string, type: 'video', url?: string, thumbnail_url?: string, mimetype?: string, size?: int,
 *     duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string, expired?: bool}}),
 *     body?: string, footer?: string, buttons?: list<MessageInteractiveButtonInput>}|array{
 *     kind: 'buttons'|'template', header: (array{ type: 'text', text: string, attachment?: never}|array{
 *     type: 'image', text: never, attachment: never}|array{ type: 'video', text: never, attachment: never}|array{
 *     type: 'document', text: never, attachment: never}|array{ type: 'text', text: never, attachment: never}|array{
 *     type: 'image', text?: never, attachment: array{ id?: string, type: 'image', url?: string,
 *     thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int,
 *     height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string,
 *     type: 'document', url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int,
 *     metadata?: array{ width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool},
 *     title?: string, description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}), interactive_response?: never, product?: never, order?: never,
 *     ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive_response',
 *     interactive: never, interactive_response: never, product?: never, order?: never, ...<string, mixed>}|array{
 *     id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'interactive', interactive: never, interactive_response: never, product?: never, order?: never,
 *     ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive_response',
 *     interactive?: never, interactive_response: (array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index: int, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int, title: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index: int, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int, title?: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index?: int, title: string}), product?: never, order?: never, ...<string, mixed>}|array{
 *     id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: never, product: never, order?: never, interactive: never, interactive_response?: never, ...<string,
 *     mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: never, product: never, order?: never, interactive?: never, interactive_response: never, ...<string,
 *     mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: never, product?: never, order: never, interactive: never, interactive_response?: never, ...<string,
 *     mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: never, product?: never, order: never, interactive?: never, interactive_response: never, ...<string,
 *     mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'interactive', product?: never, order?: never, interactive: never, interactive_response?: never,
 *     ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive_response',
 *     product?: never, order?: never, interactive?: never, interactive_response: never, ...<string, mixed>}),
 *     messages?: list<MessageWithOptionalInteractiveInput>, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessageInteractiveReceivedWebhookEventOutput array{ id: string, type: 'message.received',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{ message: (array{
 *     id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'interactive', interactive: (array{ kind: 'buttons'|'template', header: (array{ type: 'text',
 *     text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{ type: 'video',
 *     text: never, attachment: never}|array{ type: 'document', text: never, attachment: never}|array{ type: 'text',
 *     text: never, attachment: never}|array{ type: 'image', text?: never, attachment: array{ id?: string,
 *     type: 'image', url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string,
 *     duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}), interactive_response?: never, product?: never,
 *     order?: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive_response',
 *     interactive: never, interactive_response: never, product?: never, order?: never, ...<string, mixed>}|array{
 *     id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'interactive', interactive: never, interactive_response: never, product?: never, order?: never,
 *     ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive_response',
 *     interactive?: never, interactive_response: (array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int|string, title: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index: int|string, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int|string, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index?: int|string, title: string}), product?: never, order?: never, ...<string, mixed>}|array{
 *     id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: never, product: never, order?: never, interactive: never, interactive_response?: never, ...<string,
 *     mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: never, product: never, order?: never, interactive?: never, interactive_response: never, ...<string,
 *     mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: never, product?: never, order: never, interactive: never, interactive_response?: never, ...<string,
 *     mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: never, product?: never, order: never, interactive?: never, interactive_response: never, ...<string,
 *     mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'interactive', product?: never, order?: never, interactive: never, interactive_response?: never,
 *     ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive_response',
 *     product?: never, order?: never, interactive?: never, interactive_response: never, ...<string, mixed>}),
 *     messages?: list<MessageWithOptionalInteractiveOutput>, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessageInteractiveResponseInput (array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index?: int, title?: string})&(array{ selected_id: string, ...<string, mixed>}|array{
 *     selected_index: int, ...<string, mixed>}|array{ title: string, ...<string, mixed>})
 * @phpstan-type MessageInteractiveResponseOutput (array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index?: int|string, title?: string})&(array{ selected_id: string, ...<string, mixed>}|array{
 *     selected_index: int|string, ...<string, mixed>}|array{ title: string, ...<string, mixed>})
 * @phpstan-type MessageInteractiveUpdatedWebhookEventInput array{ id: string, type: 'message.updated',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{ message: (array{
 *     id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'interactive', interactive: (array{ kind: 'buttons'|'template', header: (array{ type: 'text',
 *     text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{ type: 'video',
 *     text: never, attachment: never}|array{ type: 'document', text: never, attachment: never}|array{ type: 'text',
 *     text: never, attachment: never}|array{ type: 'image', text?: never, attachment: array{ id?: string,
 *     type: 'image', url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int,
 *     metadata?: array{ width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool},
 *     title?: string, description?: string, expired?: bool}}|array{ type: 'video', text?: never, attachment: array{
 *     id?: string, type: 'video', url?: string, thumbnail_url?: string, mimetype?: string, size?: int,
 *     duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string, expired?: bool}}),
 *     body?: string, footer?: string, buttons?: list<MessageInteractiveButtonInput>}|array{
 *     kind: 'buttons'|'template', header: (array{ type: 'text', text: string, attachment?: never}|array{
 *     type: 'image', text: never, attachment: never}|array{ type: 'video', text: never, attachment: never}|array{
 *     type: 'document', text: never, attachment: never}|array{ type: 'text', text: never, attachment: never}|array{
 *     type: 'image', text?: never, attachment: array{ id?: string, type: 'image', url?: string,
 *     thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int,
 *     height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string,
 *     type: 'document', url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int,
 *     metadata?: array{ width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool},
 *     title?: string, description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}), interactive_response?: never, product?: never, order?: never,
 *     ...<string, mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive_response',
 *     interactive: never, interactive_response: never, product?: never, order?: never, ...<string, mixed>}|array{
 *     id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'interactive', interactive: never, interactive_response: never, product?: never, order?: never,
 *     ...<string, mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive_response',
 *     interactive?: never, interactive_response: (array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index: int, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int, title: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index: int, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int, title?: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index?: int, title: string}), product?: never, order?: never, ...<string, mixed>}|array{ id: string,
 *     referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, product: never,
 *     order?: never, interactive: never, interactive_response?: never, ...<string, mixed>}|array{ id: string,
 *     referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, product: never,
 *     order?: never, interactive?: never, interactive_response: never, ...<string, mixed>}|array{ id: string,
 *     referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, product?: never,
 *     order: never, interactive: never, interactive_response?: never, ...<string, mixed>}|array{ id: string,
 *     referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, product?: never,
 *     order: never, interactive?: never, interactive_response: never, ...<string, mixed>}|array{ id: string,
 *     referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive', product?: never,
 *     order?: never, interactive: never, interactive_response?: never, ...<string, mixed>}|array{ id: string,
 *     referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive_response',
 *     product?: never, order?: never, interactive?: never, interactive_response: never, ...<string, mixed>}),
 *     messages?: list<MessageWithOptionalInteractiveInput>, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessageInteractiveUpdatedWebhookEventOutput array{ id: string, type: 'message.updated',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{ message: (array{
 *     id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'interactive', interactive: (array{ kind: 'buttons'|'template', header: (array{ type: 'text',
 *     text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{ type: 'video',
 *     text: never, attachment: never}|array{ type: 'document', text: never, attachment: never}|array{ type: 'text',
 *     text: never, attachment: never}|array{ type: 'image', text?: never, attachment: array{ id?: string,
 *     type: 'image', url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string,
 *     duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}), interactive_response?: never, product?: never,
 *     order?: never, ...<string, mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive_response',
 *     interactive: never, interactive_response: never, product?: never, order?: never, ...<string, mixed>}|array{
 *     id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'interactive', interactive: never, interactive_response: never, product?: never, order?: never,
 *     ...<string, mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive_response',
 *     interactive?: never, interactive_response: (array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int|string, title: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index: int|string, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int|string, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index?: int|string, title: string}), product?: never, order?: never, ...<string, mixed>}|array{
 *     id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: never, product: never, order?: never, interactive: never, interactive_response?: never, ...<string,
 *     mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: never, product: never, order?: never, interactive?: never, interactive_response: never, ...<string,
 *     mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: never, product?: never, order: never, interactive: never, interactive_response?: never, ...<string,
 *     mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: never, product?: never, order: never, interactive?: never, interactive_response: never, ...<string,
 *     mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'interactive', product?: never, order?: never, interactive: never, interactive_response?: never,
 *     ...<string, mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive_response',
 *     product?: never, order?: never, interactive?: never, interactive_response: never, ...<string, mixed>}),
 *     messages?: list<MessageWithOptionalInteractiveOutput>, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessageInteractiveWebhookEventInput array{ id: string,
 *     type: 'message.received'|'message.updated'|'conversation.history', provider: ProviderNameInput,
 *     account_id: string, occurred_at: string, data: array{ message?: (array{ id?: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive',
 *     interactive: (array{ kind: 'buttons'|'template', header: (array{ type: 'text', text: string,
 *     attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{ type: 'video', text: never,
 *     attachment: never}|array{ type: 'document', text: never, attachment: never}|array{ type: 'text', text: never,
 *     attachment: never}|array{ type: 'image', text?: never, attachment: array{ id?: string, type: 'image',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string,
 *     type: 'video', url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int,
 *     metadata?: array{ width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool},
 *     title?: string, description?: string, expired?: bool}}|array{ type: 'document', text?: never,
 *     attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}), interactive_response?: never, product?: never, order?: never,
 *     ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive_response',
 *     interactive?: never, interactive_response: (array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index: int, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int, title?: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index?: int, title: string}), product?: never, order?: never, ...<string, mixed>}|array{
 *     id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'product', product: array{ id?: string, title?: string, description?: string, url?: string,
 *     image_url?: string, price?: array{ amount?: string, currency?: string}}, order?: never, interactive?: never,
 *     interactive_response?: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'order', product?: never,
 *     order: array{ id?: string, title?: string, item_count?: int, status?: 'inquiry'|'accepted'|'declined',
 *     thumbnail_url?: string, total?: array{ amount?: string, currency?: string}}, interactive?: never,
 *     interactive_response?: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type?: mixed, product?: never,
 *     order?: never, interactive?: never, interactive_response?: never, ...<string, mixed>}),
 *     messages?: list<MessageWithOptionalInteractiveInput>, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessageInteractiveWebhookEventOutput array{ id: string,
 *     type: 'message.received'|'message.updated'|'conversation.history', provider: ProviderNameOutput,
 *     account_id: string, occurred_at: string, data: array{ message?: (array{ id?: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive',
 *     interactive: (array{ kind: 'buttons'|'template', header: (array{ type: 'text', text: string,
 *     attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{ type: 'video', text: never,
 *     attachment: never}|array{ type: 'document', text: never, attachment: never}|array{ type: 'text', text: never,
 *     attachment: never}|array{ type: 'image', text?: never, attachment: array{ id?: string, type: 'image',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string,
 *     type: 'document', url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string,
 *     duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}), body?: string, footer?: string, buttons?: list<MessageInteractiveButtonOutput>}|array{
 *     kind: 'buttons'|'template', header: (array{ type: 'text', text: string, attachment?: never}|array{
 *     type: 'image', text: never, attachment: never}|array{ type: 'video', text: never, attachment: never}|array{
 *     type: 'document', text: never, attachment: never}|array{ type: 'text', text: never, attachment: never}|array{
 *     type: 'image', text?: never, attachment: array{ id?: string, type: 'image', url?: string,
 *     thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{
 *     width?: int|string, height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool},
 *     title?: string, description?: string, expired?: bool}}|array{ type: 'video', text?: never, attachment: array{
 *     id?: string, type: 'video', url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string,
 *     duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}), interactive_response?: never, product?: never,
 *     order?: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive_response',
 *     interactive?: never, interactive_response: (array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int|string, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int|string, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index?: int|string, title: string}), product?: never, order?: never, ...<string, mixed>}|array{
 *     id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'product', product: array{ id?: string, title?: string, description?: string, url?: string,
 *     image_url?: string, price?: array{ amount?: string, currency?: string}}, order?: never, interactive?: never,
 *     interactive_response?: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'order', product?: never,
 *     order: array{ id?: string, title?: string, item_count?: int|string, status?: 'inquiry'|'accepted'|'declined',
 *     thumbnail_url?: string, total?: array{ amount?: string, currency?: string}}, interactive?: never,
 *     interactive_response?: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type?: mixed, product?: never,
 *     order?: never, interactive?: never, interactive_response?: never, ...<string, mixed>}),
 *     messages?: list<MessageWithOptionalInteractiveOutput>, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessageLinkPreviewInput array{ url: MessageLinkPreviewHTTPURLInput, title?: string,
 *     description?: string, image_url?: string}
 * @phpstan-type MessageLinkPreviewOutput array{ url: MessageLinkPreviewHTTPURLOutput, title?: string,
 *     description?: string, image_url?: string}
 * @phpstan-type MessageLinkPreviewHTTPURLInput string
 * @phpstan-type MessageLinkPreviewHTTPURLOutput string
 * @phpstan-type MessageLinkPreviewHistoryWebhookEventInput array{ id: string, type: 'conversation.history',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{ message?: (array{
 *     id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'link_preview', text?: string, link_preview: MessageLinkPreviewInput, product?: never, order?: never,
 *     interactive?: never, interactive_response?: never, ...<string, mixed>}|array{ id?: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive',
 *     interactive: (array{ kind: 'buttons'|'template', header: (array{ type: 'text', text: string,
 *     attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{ type: 'video', text: never,
 *     attachment: never}|array{ type: 'document', text: never, attachment: never}|array{ type: 'text', text: never,
 *     attachment: never}|array{ type: 'image', text?: never, attachment: array{ id?: string, type: 'image',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string,
 *     type: 'video', url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int,
 *     metadata?: array{ width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool},
 *     title?: string, description?: string, expired?: bool}}|array{ type: 'document', text?: never,
 *     attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}), interactive_response?: never, product?: never, order?: never,
 *     link_preview?: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive_response',
 *     interactive?: never, interactive_response: (array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index: int, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int, title?: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index?: int, title: string}), product?: never, order?: never, link_preview?: never, ...<string,
 *     mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'product', product: array{ id?: string, title?: string, description?: string, url?: string,
 *     image_url?: string, price?: array{ amount?: string, currency?: string}}, order?: never, interactive?: never,
 *     interactive_response?: never, link_preview?: never, ...<string, mixed>}|array{ id?: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'order', product?: never,
 *     order: array{ id?: string, title?: string, item_count?: int, status?: 'inquiry'|'accepted'|'declined',
 *     thumbnail_url?: string, total?: array{ amount?: string, currency?: string}}, interactive?: never,
 *     interactive_response?: never, link_preview?: never, ...<string, mixed>}|array{ id?: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type?: mixed, product?: never,
 *     order?: never, interactive?: never, interactive_response?: never, link_preview?: never, ...<string, mixed>}),
 *     messages: list<MessageWithOptionalLinkPreviewInput>, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessageLinkPreviewHistoryWebhookEventOutput array{ id: string, type: 'conversation.history',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{ message?: (array{
 *     id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'link_preview', text?: string, link_preview: MessageLinkPreviewOutput, product?: never, order?: never,
 *     interactive?: never, interactive_response?: never, ...<string, mixed>}|array{ id?: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive',
 *     interactive: (array{ kind: 'buttons'|'template', header: (array{ type: 'text', text: string,
 *     attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{ type: 'video', text: never,
 *     attachment: never}|array{ type: 'document', text: never, attachment: never}|array{ type: 'text', text: never,
 *     attachment: never}|array{ type: 'image', text?: never, attachment: array{ id?: string, type: 'image',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string,
 *     type: 'document', url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string,
 *     duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}), body?: string, footer?: string, buttons?: list<MessageInteractiveButtonOutput>}|array{
 *     kind: 'buttons'|'template', header: (array{ type: 'text', text: string, attachment?: never}|array{
 *     type: 'image', text: never, attachment: never}|array{ type: 'video', text: never, attachment: never}|array{
 *     type: 'document', text: never, attachment: never}|array{ type: 'text', text: never, attachment: never}|array{
 *     type: 'image', text?: never, attachment: array{ id?: string, type: 'image', url?: string,
 *     thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{
 *     width?: int|string, height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool},
 *     title?: string, description?: string, expired?: bool}}|array{ type: 'video', text?: never, attachment: array{
 *     id?: string, type: 'video', url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string,
 *     duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}), interactive_response?: never, product?: never,
 *     order?: never, link_preview?: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive_response',
 *     interactive?: never, interactive_response: (array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int|string, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int|string, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index?: int|string, title: string}), product?: never, order?: never, link_preview?: never,
 *     ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'product', product: array{
 *     id?: string, title?: string, description?: string, url?: string, image_url?: string, price?: array{
 *     amount?: string, currency?: string}}, order?: never, interactive?: never, interactive_response?: never,
 *     link_preview?: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'order', product?: never,
 *     order: array{ id?: string, title?: string, item_count?: int|string, status?: 'inquiry'|'accepted'|'declined',
 *     thumbnail_url?: string, total?: array{ amount?: string, currency?: string}}, interactive?: never,
 *     interactive_response?: never, link_preview?: never, ...<string, mixed>}|array{ id?: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type?: mixed, product?: never,
 *     order?: never, interactive?: never, interactive_response?: never, link_preview?: never, ...<string, mixed>}),
 *     messages: list<MessageWithOptionalLinkPreviewOutput>, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessageLinkPreviewMessageInput array{ id?: string, referral?: MessageReferralInput,
 *     type: 'link_preview', text?: string, link_preview: MessageLinkPreviewInput, product?: never, order?: never,
 *     interactive?: never, interactive_response?: never, ...<string, mixed>}
 * @phpstan-type MessageLinkPreviewMessageOutput array{ id?: string, referral?: MessageReferralOutput,
 *     type: 'link_preview', text?: string, link_preview: MessageLinkPreviewOutput, product?: never, order?: never,
 *     interactive?: never, interactive_response?: never, ...<string, mixed>}
 * @phpstan-type MessageLinkPreviewReceivedWebhookEventInput array{ id: string, type: 'message.received',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{ message: (array{
 *     id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'link_preview', text?: string, link_preview: array{ url: string, title?: (''|string),
 *     description?: (''|string), image_url?: string}, product?: never, order?: never, interactive?: never,
 *     interactive_response?: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, interactive: never,
 *     interactive_response?: never, product?: never, order?: never, link_preview: never, text?: string, ...<string,
 *     mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: never, interactive?: never, interactive_response: never, product?: never, order?: never,
 *     link_preview: never, text?: string, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, product: never,
 *     order?: never, interactive?: never, interactive_response?: never, link_preview: never, text?: string,
 *     ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, product?: never,
 *     order: never, interactive?: never, interactive_response?: never, link_preview: never, text?: string,
 *     ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'link_preview', product?: never,
 *     order?: never, interactive?: never, interactive_response?: never, link_preview: never, text?: string,
 *     ...<string, mixed>}), messages?: list<MessageWithOptionalLinkPreviewInput>, ...<string, mixed>}, ...<string,
 *     mixed>}
 * @phpstan-type MessageLinkPreviewReceivedWebhookEventOutput array{ id: string, type: 'message.received',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{ message: (array{
 *     id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'link_preview', text?: string, link_preview: array{ url: string, title?: (''|string),
 *     description?: (''|string), image_url?: string}, product?: never, order?: never, interactive?: never,
 *     interactive_response?: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, interactive: never,
 *     interactive_response?: never, product?: never, order?: never, link_preview: never, text?: string, ...<string,
 *     mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: never, interactive?: never, interactive_response: never, product?: never, order?: never,
 *     link_preview: never, text?: string, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, product: never,
 *     order?: never, interactive?: never, interactive_response?: never, link_preview: never, text?: string,
 *     ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, product?: never,
 *     order: never, interactive?: never, interactive_response?: never, link_preview: never, text?: string,
 *     ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'link_preview', product?: never,
 *     order?: never, interactive?: never, interactive_response?: never, link_preview: never, text?: string,
 *     ...<string, mixed>}), messages?: list<MessageWithOptionalLinkPreviewOutput>, ...<string, mixed>}, ...<string,
 *     mixed>}
 * @phpstan-type MessageLinkPreviewTextUpdateInput array{ id: string, type: 'text', text?: string,
 *     link_preview?: never, product?: never, order?: never, interactive?: never, interactive_response?: never,
 *     ...<string, mixed>}
 * @phpstan-type MessageLinkPreviewTextUpdateOutput array{ id: string, type: 'text', text?: string,
 *     link_preview?: never, product?: never, order?: never, interactive?: never, interactive_response?: never,
 *     ...<string, mixed>}
 * @phpstan-type MessageLinkPreviewUpdatedWebhookEventInput array{ id: string, type: 'message.updated',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{ message: (array{
 *     id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'link_preview', text?: string, link_preview: array{ url: string, title?: (''|string),
 *     description?: (''|string), image_url?: string}, product?: never, order?: never, interactive?: never,
 *     interactive_response?: never, ...<string, mixed>}|array{ id: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, text?: string,
 *     link_preview: never, product?: never, order?: never, interactive?: never, interactive_response?: never,
 *     ...<string, mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, interactive: never,
 *     interactive_response?: never, product?: never, order?: never, link_preview: never, text?: string, ...<string,
 *     mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: never, interactive: never, interactive_response?: never, product?: never, order?: never,
 *     link_preview?: never, text?: string, ...<string, mixed>}|array{ id: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, interactive?: never,
 *     interactive_response: never, product?: never, order?: never, link_preview: never, text?: string, ...<string,
 *     mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: never, interactive?: never, interactive_response: never, product?: never, order?: never,
 *     link_preview?: never, text?: string, ...<string, mixed>}|array{ id: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, product: never,
 *     order?: never, interactive?: never, interactive_response?: never, link_preview: never, text?: string,
 *     ...<string, mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, product: never,
 *     order?: never, interactive?: never, interactive_response?: never, link_preview?: never, text?: string,
 *     ...<string, mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, product?: never,
 *     order: never, interactive?: never, interactive_response?: never, link_preview: never, text?: string,
 *     ...<string, mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, product?: never,
 *     order: never, interactive?: never, interactive_response?: never, link_preview?: never, text?: string,
 *     ...<string, mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'link_preview', product?: never,
 *     order?: never, interactive?: never, interactive_response?: never, link_preview: never, text?: string,
 *     ...<string, mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'text', product?: never,
 *     order?: never, interactive?: never, interactive_response?: never, link_preview?: never, text?: string,
 *     ...<string, mixed>}), messages?: list<MessageWithOptionalLinkPreviewInput>, ...<string, mixed>}, ...<string,
 *     mixed>}
 * @phpstan-type MessageLinkPreviewUpdatedWebhookEventOutput array{ id: string, type: 'message.updated',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{ message: (array{
 *     id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'link_preview', text?: string, link_preview: array{ url: string, title?: (''|string),
 *     description?: (''|string), image_url?: string}, product?: never, order?: never, interactive?: never,
 *     interactive_response?: never, ...<string, mixed>}|array{ id: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, text?: string,
 *     link_preview: never, product?: never, order?: never, interactive?: never, interactive_response?: never,
 *     ...<string, mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, interactive: never,
 *     interactive_response?: never, product?: never, order?: never, link_preview: never, text?: string, ...<string,
 *     mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: never, interactive: never, interactive_response?: never, product?: never, order?: never,
 *     link_preview?: never, text?: string, ...<string, mixed>}|array{ id: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, interactive?: never,
 *     interactive_response: never, product?: never, order?: never, link_preview: never, text?: string, ...<string,
 *     mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: never, interactive?: never, interactive_response: never, product?: never, order?: never,
 *     link_preview?: never, text?: string, ...<string, mixed>}|array{ id: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, product: never,
 *     order?: never, interactive?: never, interactive_response?: never, link_preview: never, text?: string,
 *     ...<string, mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, product: never,
 *     order?: never, interactive?: never, interactive_response?: never, link_preview?: never, text?: string,
 *     ...<string, mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, product?: never,
 *     order: never, interactive?: never, interactive_response?: never, link_preview: never, text?: string,
 *     ...<string, mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, product?: never,
 *     order: never, interactive?: never, interactive_response?: never, link_preview?: never, text?: string,
 *     ...<string, mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'link_preview', product?: never,
 *     order?: never, interactive?: never, interactive_response?: never, link_preview: never, text?: string,
 *     ...<string, mixed>}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'text', product?: never,
 *     order?: never, interactive?: never, interactive_response?: never, link_preview?: never, text?: string,
 *     ...<string, mixed>}), messages?: list<MessageWithOptionalLinkPreviewOutput>, ...<string, mixed>}, ...<string,
 *     mixed>}
 * @phpstan-type MessageLinkPreviewWebhookEventInput array{ id: string,
 *     type: 'message.received'|'message.updated'|'conversation.history', provider: ProviderNameInput,
 *     account_id: string, occurred_at: string, data: array{ message?: (array{ id?: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'link_preview', text?: string,
 *     link_preview: MessageLinkPreviewInput, product?: never, order?: never, interactive?: never,
 *     interactive_response?: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive',
 *     interactive: (array{ kind: 'buttons'|'template', header: (array{ type: 'text', text: string,
 *     attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{ type: 'video', text: never,
 *     attachment: never}|array{ type: 'document', text: never, attachment: never}|array{ type: 'text', text: never,
 *     attachment: never}|array{ type: 'image', text?: never, attachment: array{ id?: string, type: 'image',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string,
 *     type: 'video', url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int,
 *     metadata?: array{ width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool},
 *     title?: string, description?: string, expired?: bool}}|array{ type: 'document', text?: never,
 *     attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}), interactive_response?: never, product?: never, order?: never,
 *     link_preview?: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive_response',
 *     interactive?: never, interactive_response: (array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index: int, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int, title?: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index?: int, title: string}), product?: never, order?: never, link_preview?: never, ...<string,
 *     mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'product', product: array{ id?: string, title?: string, description?: string, url?: string,
 *     image_url?: string, price?: array{ amount?: string, currency?: string}}, order?: never, interactive?: never,
 *     interactive_response?: never, link_preview?: never, ...<string, mixed>}|array{ id?: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'order', product?: never,
 *     order: array{ id?: string, title?: string, item_count?: int, status?: 'inquiry'|'accepted'|'declined',
 *     thumbnail_url?: string, total?: array{ amount?: string, currency?: string}}, interactive?: never,
 *     interactive_response?: never, link_preview?: never, ...<string, mixed>}|array{ id?: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type?: mixed, product?: never,
 *     order?: never, interactive?: never, interactive_response?: never, link_preview?: never, ...<string, mixed>}),
 *     messages?: list<MessageWithOptionalLinkPreviewInput>, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessageLinkPreviewWebhookEventOutput array{ id: string,
 *     type: 'message.received'|'message.updated'|'conversation.history', provider: ProviderNameOutput,
 *     account_id: string, occurred_at: string, data: array{ message?: (array{ id?: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'link_preview', text?: string,
 *     link_preview: MessageLinkPreviewOutput, product?: never, order?: never, interactive?: never,
 *     interactive_response?: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive',
 *     interactive: (array{ kind: 'buttons'|'template', header: (array{ type: 'text', text: string,
 *     attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{ type: 'video', text: never,
 *     attachment: never}|array{ type: 'document', text: never, attachment: never}|array{ type: 'text', text: never,
 *     attachment: never}|array{ type: 'image', text?: never, attachment: array{ id?: string, type: 'image',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string,
 *     type: 'document', url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string,
 *     duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}), body?: string, footer?: string, buttons?: list<MessageInteractiveButtonOutput>}|array{
 *     kind: 'buttons'|'template', header: (array{ type: 'text', text: string, attachment?: never}|array{
 *     type: 'image', text: never, attachment: never}|array{ type: 'video', text: never, attachment: never}|array{
 *     type: 'document', text: never, attachment: never}|array{ type: 'text', text: never, attachment: never}|array{
 *     type: 'image', text?: never, attachment: array{ id?: string, type: 'image', url?: string,
 *     thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{
 *     width?: int|string, height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool},
 *     title?: string, description?: string, expired?: bool}}|array{ type: 'video', text?: never, attachment: array{
 *     id?: string, type: 'video', url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string,
 *     duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}), interactive_response?: never, product?: never,
 *     order?: never, link_preview?: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive_response',
 *     interactive?: never, interactive_response: (array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int|string, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int|string, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index?: int|string, title: string}), product?: never, order?: never, link_preview?: never,
 *     ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'product', product: array{
 *     id?: string, title?: string, description?: string, url?: string, image_url?: string, price?: array{
 *     amount?: string, currency?: string}}, order?: never, interactive?: never, interactive_response?: never,
 *     link_preview?: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'order', product?: never,
 *     order: array{ id?: string, title?: string, item_count?: int|string, status?: 'inquiry'|'accepted'|'declined',
 *     thumbnail_url?: string, total?: array{ amount?: string, currency?: string}}, interactive?: never,
 *     interactive_response?: never, link_preview?: never, ...<string, mixed>}|array{ id?: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type?: mixed, product?: never,
 *     order?: never, interactive?: never, interactive_response?: never, link_preview?: never, ...<string, mixed>}),
 *     messages?: list<MessageWithOptionalLinkPreviewOutput>, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessageLiveLocationInput array{ id: string, type: 'live_location', text?: never, latitude?: never,
 *     longitude?: never, location?: never, duration_seconds?: never, ended_at?: never, reply_token?: never,
 *     ...<string, mixed>}
 * @phpstan-type MessageLiveLocationOutput array{ id: string, type: 'live_location', text?: never, latitude?: never,
 *     longitude?: never, location?: never, duration_seconds?: never, ended_at?: never, reply_token?: never,
 *     ...<string, mixed>}
 * @phpstan-type MessageLiveLocationHistoryWebhookEventInput array{ id: string, type: 'conversation.history',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{
 *     message?: MessageWithOptionalReferralInput, messages: list<MessageWithOptionalLiveLocationInput>, ...<string,
 *     mixed>}, ...<string, mixed>}
 * @phpstan-type MessageLiveLocationHistoryWebhookEventOutput array{ id: string, type: 'conversation.history',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{
 *     message?: MessageWithOptionalReferralOutput, messages: list<MessageWithOptionalLiveLocationOutput>,
 *     ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessageLiveLocationReceivedWebhookEventInput array{ id: string, type: 'message.received',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{ message: array{
 *     id: string, referral?: MessageReferralInput, type: 'live_location', text?: never, latitude?: never,
 *     longitude?: never, location?: never, duration_seconds?: never, ended_at?: never, reply_token?: never,
 *     ...<string, mixed>}, messages?: list<MessageWithOptionalReferralInput>, ...<string, mixed>}, ...<string,
 *     mixed>}
 * @phpstan-type MessageLiveLocationReceivedWebhookEventOutput array{ id: string, type: 'message.received',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{ message: array{
 *     id: string, referral?: MessageReferralOutput, type: 'live_location', text?: never, latitude?: never,
 *     longitude?: never, location?: never, duration_seconds?: never, ended_at?: never, reply_token?: never,
 *     ...<string, mixed>}, messages?: list<MessageWithOptionalReferralOutput>, ...<string, mixed>}, ...<string,
 *     mixed>}
 * @phpstan-type MessageLiveLocationUpdatedWebhookEventInput array{ id: string, type: 'message.updated',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{ message: array{
 *     id: string, referral?: MessageReferralInput, type: 'live_location', text?: never, latitude?: never,
 *     longitude?: never, location?: never, duration_seconds?: never, ended_at?: never, reply_token?: never,
 *     ...<string, mixed>}, messages?: list<MessageWithOptionalReferralInput>, ...<string, mixed>}, ...<string,
 *     mixed>}
 * @phpstan-type MessageLiveLocationUpdatedWebhookEventOutput array{ id: string, type: 'message.updated',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{ message: array{
 *     id: string, referral?: MessageReferralOutput, type: 'live_location', text?: never, latitude?: never,
 *     longitude?: never, location?: never, duration_seconds?: never, ended_at?: never, reply_token?: never,
 *     ...<string, mixed>}, messages?: list<MessageWithOptionalReferralOutput>, ...<string, mixed>}, ...<string,
 *     mixed>}
 * @phpstan-type MessageOrderInput array{ id?: string, title?: string, item_count?: int,
 *     status?: 'inquiry'|'accepted'|'declined', thumbnail_url?: MessageCommerceHTTPURLInput,
 *     total?: MessageCommerceMoneyInput}
 * @phpstan-type MessageOrderOutput array{ id?: string, title?: string, item_count?: int|string,
 *     status?: 'inquiry'|'accepted'|'declined', thumbnail_url?: MessageCommerceHTTPURLOutput,
 *     total?: MessageCommerceMoneyOutput}
 * @phpstan-type MessagePayloadInput (array{ type: 'text', text: string, caption?: string, ...<string,
 *     mixed>}|array{ type: 'image'|'video'|'audio'|'document'|'file', url: string, file_url?: string,
 *     file_key?: string, caption?: string, ...<string, mixed>}|array{
 *     type: 'image'|'video'|'audio'|'document'|'file', url?: string, file_url: string, file_key?: string,
 *     caption?: string, ...<string, mixed>}|array{ type: 'image'|'video'|'audio'|'document'|'file', url?: string,
 *     file_url?: string, file_key: string, caption?: string, ...<string, mixed>}|array{ type: 'contact',
 *     contacts: list<ContactCardInput>, ...<string, mixed>}|array{ type: 'link_preview', text: string,
 *     link_preview: SendMessageLinkPreviewInput}|array{ type: 'poll', poll: SendMessagePollInput}|array{
 *     type: 'sticker', url: string, file_url?: string, file_key?: string}|array{ type: 'sticker', url?: string,
 *     file_url: string, file_key?: string}|array{ type: 'sticker', url?: string, file_url?: string,
 *     file_key: string})
 * @phpstan-type MessagePayloadOutput (array{ type: 'text', text: string, caption?: string, ...<string,
 *     mixed>}|array{ type: 'image'|'video'|'audio'|'document'|'file', url: string, file_url?: string,
 *     file_key?: string, caption?: string, ...<string, mixed>}|array{
 *     type: 'image'|'video'|'audio'|'document'|'file', url?: string, file_url: string, file_key?: string,
 *     caption?: string, ...<string, mixed>}|array{ type: 'image'|'video'|'audio'|'document'|'file', url?: string,
 *     file_url?: string, file_key: string, caption?: string, ...<string, mixed>}|array{ type: 'contact',
 *     contacts: list<ContactCardOutput>, ...<string, mixed>}|array{ type: 'link_preview', text: string,
 *     link_preview: SendMessageLinkPreviewOutput}|array{ type: 'poll', poll: SendMessagePollOutput}|array{
 *     type: 'sticker', url: string, file_url?: string, file_key?: string}|array{ type: 'sticker', url?: string,
 *     file_url: string, file_key?: string}|array{ type: 'sticker', url?: string, file_url?: string,
 *     file_key: string})
 * @phpstan-type MessagePinChangeInput array{ kind: 'message_updated', change_type: 'message_pin',
 *     changed_at?: string}
 * @phpstan-type MessagePinChangeOutput array{ kind: 'message_updated', change_type: 'message_pin',
 *     changed_at?: string}
 * @phpstan-type MessagePinMessageInput array{ id: string, pin: MessagePinStateInput}
 * @phpstan-type MessagePinMessageOutput array{ id: string, pin: MessagePinStateOutput}
 * @phpstan-type MessagePinParticipantInput array{ id: string, type?: 'user', name?: string}
 * @phpstan-type MessagePinParticipantOutput array{ id: string, type?: 'user', name?: string}
 * @phpstan-type MessagePinRequestInput array{ account_id: string, conversation_id: string, message_id: string,
 *     sender_id?: string, pinned: bool, duration_seconds?: int, ...<string, mixed>}
 * @phpstan-type MessagePinRequestOutput array{ account_id: string, conversation_id: string, message_id: string,
 *     sender_id?: string, pinned: bool, duration_seconds?: int|string, ...<string, mixed>}
 * @phpstan-type MessagePinStateInput (array{ pinned: false, duration_seconds?: never, expires_at?: never,
 *     ...<string, mixed>}|array{ pinned: true, duration_seconds?: int, expires_at?: string})
 * @phpstan-type MessagePinStateOutput (array{ pinned: false, duration_seconds?: never, expires_at?: never,
 *     ...<string, mixed>}|array{ pinned: true, duration_seconds?: int|string, expires_at?: string})
 * @phpstan-type MessagePinUpdatedWebhookEventInput array{ id: string, type: 'message.updated',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{
 *     message: MessagePinMessageInput, actor?: MessagePinParticipantInput, sender?: MessagePinParticipantInput,
 *     conversation?: array{ id: string, type: 'user'|'group'|'channel', ...<string, mixed>},
 *     event: MessagePinChangeInput, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessagePinUpdatedWebhookEventOutput array{ id: string, type: 'message.updated',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{
 *     message: MessagePinMessageOutput, actor?: MessagePinParticipantOutput, sender?: MessagePinParticipantOutput,
 *     conversation?: array{ id: string, type: 'user'|'group'|'channel', ...<string, mixed>},
 *     event: MessagePinChangeOutput, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessagePollInput array{ question: string, options: list<MessagePollOptionInput>,
 *     max_selections: int}
 * @phpstan-type MessagePollOutput array{ question: string, options: list<MessagePollOptionOutput>,
 *     max_selections: int|string}
 * @phpstan-type MessagePollHistoryWebhookEventInput array{ id: string, type: 'conversation.history',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{ message?: (array{
 *     id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'poll', poll: MessagePollInput, direction?: 'inbound'|'outbound', sent_at?: string,
 *     sender?: ConversationStateActorInput, mentions?: list<MentionInput>, reply_to_message_id?: string}|array{
 *     id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'link_preview', text?: string, link_preview: MessageLinkPreviewInput, product?: never, order?: never,
 *     interactive?: never, interactive_response?: never, poll?: never, poll_vote?: never, ...<string,
 *     mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'interactive', interactive: (array{ kind: 'buttons'|'template', header: (array{ type: 'text',
 *     text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{ type: 'video',
 *     text: never, attachment: never}|array{ type: 'document', text: never, attachment: never}|array{ type: 'text',
 *     text: never, attachment: never}|array{ type: 'image', text?: never, attachment: array{ id?: string,
 *     type: 'image', url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int,
 *     metadata?: array{ width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool},
 *     title?: string, description?: string, expired?: bool}}|array{ type: 'video', text?: never, attachment: array{
 *     id?: string, type: 'video', url?: string, thumbnail_url?: string, mimetype?: string, size?: int,
 *     duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string, expired?: bool}}),
 *     body?: string, footer?: string, buttons?: list<MessageInteractiveButtonInput>}|array{
 *     kind: 'buttons'|'template', header: (array{ type: 'text', text: string, attachment?: never}|array{
 *     type: 'image', text: never, attachment: never}|array{ type: 'video', text: never, attachment: never}|array{
 *     type: 'document', text: never, attachment: never}|array{ type: 'text', text: never, attachment: never}|array{
 *     type: 'image', text?: never, attachment: array{ id?: string, type: 'image', url?: string,
 *     thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int,
 *     height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string,
 *     type: 'document', url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int,
 *     metadata?: array{ width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool},
 *     title?: string, description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}), interactive_response?: never, product?: never, order?: never,
 *     link_preview?: never, poll?: never, poll_vote?: never, ...<string, mixed>}|array{ id?: string,
 *     referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive_response',
 *     interactive?: never, interactive_response: (array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index: int, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int, title?: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index?: int, title: string}), product?: never, order?: never, link_preview?: never, poll?: never,
 *     poll_vote?: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'product', product: array{
 *     id?: string, title?: string, description?: string, url?: string, image_url?: string, price?: array{
 *     amount?: string, currency?: string}}, order?: never, interactive?: never, interactive_response?: never,
 *     link_preview?: never, poll?: never, poll_vote?: never, ...<string, mixed>}|array{ id?: string,
 *     referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'order', product?: never,
 *     order: array{ id?: string, title?: string, item_count?: int, status?: 'inquiry'|'accepted'|'declined',
 *     thumbnail_url?: string, total?: array{ amount?: string, currency?: string}}, interactive?: never,
 *     interactive_response?: never, link_preview?: never, poll?: never, poll_vote?: never, ...<string,
 *     mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type?: mixed, product?: never, order?: never, interactive?: never, interactive_response?: never,
 *     link_preview?: never, poll?: never, poll_vote?: never, ...<string, mixed>}),
 *     messages: list<MessageWithOptionalPollInput>, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessagePollHistoryWebhookEventOutput array{ id: string, type: 'conversation.history',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{ message?: (array{
 *     id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'poll', poll: MessagePollOutput, direction?: 'inbound'|'outbound', sent_at?: string,
 *     sender?: ConversationStateActorOutput, mentions?: list<MentionOutput>, reply_to_message_id?: string}|array{
 *     id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'link_preview', text?: string, link_preview: MessageLinkPreviewOutput, product?: never, order?: never,
 *     interactive?: never, interactive_response?: never, poll?: never, poll_vote?: never, ...<string,
 *     mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'interactive', interactive: (array{ kind: 'buttons'|'template', header: (array{ type: 'text',
 *     text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{ type: 'video',
 *     text: never, attachment: never}|array{ type: 'document', text: never, attachment: never}|array{ type: 'text',
 *     text: never, attachment: never}|array{ type: 'image', text?: never, attachment: array{ id?: string,
 *     type: 'image', url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string,
 *     duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}), interactive_response?: never, product?: never,
 *     order?: never, link_preview?: never, poll?: never, poll_vote?: never, ...<string, mixed>}|array{ id?: string,
 *     referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive_response',
 *     interactive?: never, interactive_response: (array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int|string, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int|string, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index?: int|string, title: string}), product?: never, order?: never, link_preview?: never,
 *     poll?: never, poll_vote?: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'product', product: array{
 *     id?: string, title?: string, description?: string, url?: string, image_url?: string, price?: array{
 *     amount?: string, currency?: string}}, order?: never, interactive?: never, interactive_response?: never,
 *     link_preview?: never, poll?: never, poll_vote?: never, ...<string, mixed>}|array{ id?: string,
 *     referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'order', product?: never,
 *     order: array{ id?: string, title?: string, item_count?: int|string, status?: 'inquiry'|'accepted'|'declined',
 *     thumbnail_url?: string, total?: array{ amount?: string, currency?: string}}, interactive?: never,
 *     interactive_response?: never, link_preview?: never, poll?: never, poll_vote?: never, ...<string,
 *     mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type?: mixed, product?: never, order?: never, interactive?: never, interactive_response?: never,
 *     link_preview?: never, poll?: never, poll_vote?: never, ...<string, mixed>}),
 *     messages: list<MessageWithOptionalPollOutput>, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessagePollMessageInput array{ id: string, type: 'poll', poll: MessagePollInput,
 *     direction?: 'inbound'|'outbound', sent_at?: string, sender?: ConversationStateActorInput,
 *     mentions?: list<MentionInput>, reply_to_message_id?: string, referral?: MessageReferralInput}
 * @phpstan-type MessagePollMessageOutput array{ id: string, type: 'poll', poll: MessagePollOutput,
 *     direction?: 'inbound'|'outbound', sent_at?: string, sender?: ConversationStateActorOutput,
 *     mentions?: list<MentionOutput>, reply_to_message_id?: string, referral?: MessageReferralOutput}
 * @phpstan-type MessagePollOptionInput array{ id: string, title: string}
 * @phpstan-type MessagePollOptionOutput array{ id: string, title: string}
 * @phpstan-type MessagePollReceivedWebhookEventInput array{ id: string, type: 'message.received',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{ message: (array{
 *     id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'poll', poll: array{ question: string, options: list<MessagePollOptionInput>, max_selections: int},
 *     direction?: 'inbound'|'outbound', sent_at?: string, sender?: array{ id: string, type?: 'user',
 *     name?: string}, mentions?: list<MentionInput>, reply_to_message_id?: string}|array{ id: string,
 *     referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, text?: string,
 *     link_preview: MessageLinkPreviewInput, product?: never, order?: never, interactive?: never,
 *     interactive_response?: never, poll: never, poll_vote?: never, direction?: 'inbound'|'outbound',
 *     sent_at?: string, sender?: ConversationStateActorInput, mentions?: list<MentionInput>,
 *     reply_to_message_id?: string}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, interactive: (array{
 *     kind: 'buttons'|'template', header: (array{ type: 'text', text: string, attachment?: never}|array{
 *     type: 'image', text: never, attachment: never}|array{ type: 'video', text: never, attachment: never}|array{
 *     type: 'document', text: never, attachment: never}|array{ type: 'text', text: never, attachment: never}|array{
 *     type: 'image', text?: never, attachment: array{ id?: string, type: 'image', url?: string,
 *     thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int,
 *     height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string,
 *     type: 'document', url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int,
 *     metadata?: array{ width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool},
 *     title?: string, description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}), interactive_response?: never, product?: never, order?: never,
 *     link_preview?: never, poll: never, poll_vote?: never, direction?: 'inbound'|'outbound', sent_at?: string,
 *     sender?: ConversationStateActorInput, mentions?: list<MentionInput>, reply_to_message_id?: string}|array{
 *     id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: never, interactive?: never, interactive_response: (array{ kind: 'button'|'template_button',
 *     selected_id: string, selected_index?: int, title?: string}|array{ kind: 'button'|'template_button',
 *     selected_id: string, selected_index: int, title?: string}|array{ kind: 'button'|'template_button',
 *     selected_id: string, selected_index?: int, title: string}|array{ kind: 'button'|'template_button',
 *     selected_id?: string, selected_index: int, title?: string}|array{ kind: 'button'|'template_button',
 *     selected_id?: string, selected_index: int, title: string}|array{ kind: 'button'|'template_button',
 *     selected_id?: string, selected_index?: int, title: string}), product?: never, order?: never,
 *     link_preview?: never, poll: never, poll_vote?: never, direction?: 'inbound'|'outbound', sent_at?: string,
 *     sender?: ConversationStateActorInput, mentions?: list<MentionInput>, reply_to_message_id?: string}|array{
 *     id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: never, product: array{ id?: string, title?: string, description?: string, url?: string,
 *     image_url?: string, price?: array{ amount?: string, currency?: string}}, order?: never, interactive?: never,
 *     interactive_response?: never, link_preview?: never, poll: never, poll_vote?: never,
 *     direction?: 'inbound'|'outbound', sent_at?: string, sender?: ConversationStateActorInput,
 *     mentions?: list<MentionInput>, reply_to_message_id?: string}|array{ id: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, product?: never,
 *     order: array{ id?: string, title?: string, item_count?: int, status?: 'inquiry'|'accepted'|'declined',
 *     thumbnail_url?: string, total?: array{ amount?: string, currency?: string}}, interactive?: never,
 *     interactive_response?: never, link_preview?: never, poll: never, poll_vote?: never,
 *     direction?: 'inbound'|'outbound', sent_at?: string, sender?: ConversationStateActorInput,
 *     mentions?: list<MentionInput>, reply_to_message_id?: string}|array{ id: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'poll', product?: never,
 *     order?: never, interactive?: never, interactive_response?: never, link_preview?: never, poll: never,
 *     poll_vote?: never, direction?: 'inbound'|'outbound', sent_at?: string, sender?: ConversationStateActorInput,
 *     mentions?: list<MentionInput>, reply_to_message_id?: string}), messages?: list<MessageWithOptionalPollInput>,
 *     ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessagePollReceivedWebhookEventOutput array{ id: string, type: 'message.received',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{ message: (array{
 *     id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: 'poll', poll: array{ question: string, options: list<MessagePollOptionOutput>,
 *     max_selections: int|string}, direction?: 'inbound'|'outbound', sent_at?: string, sender?: array{ id: string,
 *     type?: 'user', name?: string}, mentions?: list<MentionOutput>, reply_to_message_id?: string}|array{
 *     id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: never, text?: string, link_preview: MessageLinkPreviewOutput, product?: never, order?: never,
 *     interactive?: never, interactive_response?: never, poll: never, poll_vote?: never,
 *     direction?: 'inbound'|'outbound', sent_at?: string, sender?: ConversationStateActorOutput,
 *     mentions?: list<MentionOutput>, reply_to_message_id?: string}|array{ id: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, interactive: (array{
 *     kind: 'buttons'|'template', header: (array{ type: 'text', text: string, attachment?: never}|array{
 *     type: 'image', text: never, attachment: never}|array{ type: 'video', text: never, attachment: never}|array{
 *     type: 'document', text: never, attachment: never}|array{ type: 'text', text: never, attachment: never}|array{
 *     type: 'image', text?: never, attachment: array{ id?: string, type: 'image', url?: string,
 *     thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{
 *     width?: int|string, height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool},
 *     title?: string, description?: string, expired?: bool}}|array{ type: 'video', text?: never, attachment: array{
 *     id?: string, type: 'video', url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string,
 *     duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}), interactive_response?: never, product?: never,
 *     order?: never, link_preview?: never, poll: never, poll_vote?: never, direction?: 'inbound'|'outbound',
 *     sent_at?: string, sender?: ConversationStateActorOutput, mentions?: list<MentionOutput>,
 *     reply_to_message_id?: string}|array{ id: string, referral?: array{ source?: 'ad', source_id?: string,
 *     source_url?: string, title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string,
 *     media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, interactive?: never,
 *     interactive_response: (array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int|string, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int|string, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index?: int|string, title: string}), product?: never, order?: never, link_preview?: never,
 *     poll: never, poll_vote?: never, direction?: 'inbound'|'outbound', sent_at?: string,
 *     sender?: ConversationStateActorOutput, mentions?: list<MentionOutput>, reply_to_message_id?: string}|array{
 *     id: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type: never, product: array{ id?: string, title?: string, description?: string, url?: string,
 *     image_url?: string, price?: array{ amount?: string, currency?: string}}, order?: never, interactive?: never,
 *     interactive_response?: never, link_preview?: never, poll: never, poll_vote?: never,
 *     direction?: 'inbound'|'outbound', sent_at?: string, sender?: ConversationStateActorOutput,
 *     mentions?: list<MentionOutput>, reply_to_message_id?: string}|array{ id: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: never, product?: never,
 *     order: array{ id?: string, title?: string, item_count?: int|string, status?: 'inquiry'|'accepted'|'declined',
 *     thumbnail_url?: string, total?: array{ amount?: string, currency?: string}}, interactive?: never,
 *     interactive_response?: never, link_preview?: never, poll: never, poll_vote?: never,
 *     direction?: 'inbound'|'outbound', sent_at?: string, sender?: ConversationStateActorOutput,
 *     mentions?: list<MentionOutput>, reply_to_message_id?: string}|array{ id: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'poll', product?: never,
 *     order?: never, interactive?: never, interactive_response?: never, link_preview?: never, poll: never,
 *     poll_vote?: never, direction?: 'inbound'|'outbound', sent_at?: string, sender?: ConversationStateActorOutput,
 *     mentions?: list<MentionOutput>, reply_to_message_id?: string}),
 *     messages?: list<MessageWithOptionalPollOutput>, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessagePollVoteInput (array{ status: 'decoded', voter_id: string,
 *     selected_option_ids: list<string>, voted_at?: string, reason?: never, ...<string, mixed>}|array{
 *     status: 'unavailable', voter_id: string, selected_option_ids?: never, voted_at?: string,
 *     reason?: 'decryption_failed'|'missing_poll_context'|'unknown', ...<string, mixed>})
 * @phpstan-type MessagePollVoteOutput (array{ status: 'decoded', voter_id: string,
 *     selected_option_ids: list<string>, voted_at?: string, reason?: never, ...<string, mixed>}|array{
 *     status: 'unavailable', voter_id: string, selected_option_ids?: never, voted_at?: string,
 *     reason?: 'decryption_failed'|'missing_poll_context'|'unknown', ...<string, mixed>})
 * @phpstan-type MessagePollVoteChangeInput array{ kind: 'message_updated', change_type: 'poll_vote'}
 * @phpstan-type MessagePollVoteChangeOutput array{ kind: 'message_updated', change_type: 'poll_vote'}
 * @phpstan-type MessagePollVoteMessageInput array{ id: string, type: 'poll', poll_vote: MessagePollVoteInput}
 * @phpstan-type MessagePollVoteMessageOutput array{ id: string, type: 'poll', poll_vote: MessagePollVoteOutput}
 * @phpstan-type MessagePollVoteUpdatedWebhookEventInput array{ id: string, type: 'message.updated',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{
 *     account?: ConversationStateAccountInput, conversation?: ConversationStateReferenceInput,
 *     message: MessagePollVoteMessageInput, actor: ConversationStateActorInput, event: MessagePollVoteChangeInput},
 *     ...<string, mixed>}
 * @phpstan-type MessagePollVoteUpdatedWebhookEventOutput array{ id: string, type: 'message.updated',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{
 *     account?: ConversationStateAccountOutput, conversation?: ConversationStateReferenceOutput,
 *     message: MessagePollVoteMessageOutput, actor: ConversationStateActorOutput,
 *     event: MessagePollVoteChangeOutput}, ...<string, mixed>}
 * @phpstan-type MessagePollWebhookEventInput array{ id: string,
 *     type: 'message.received'|'message.updated'|'conversation.history', provider: ProviderNameInput,
 *     account_id: string, occurred_at: string, data: array{ message?: (array{ id: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'poll', poll: MessagePollInput,
 *     direction?: 'inbound'|'outbound', sent_at?: string, sender?: ConversationStateActorInput,
 *     mentions?: list<MentionInput>, reply_to_message_id?: string}|array{ id?: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'link_preview', text?: string,
 *     link_preview: MessageLinkPreviewInput, product?: never, order?: never, interactive?: never,
 *     interactive_response?: never, poll?: never, poll_vote?: never, ...<string, mixed>}|array{ id?: string,
 *     referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive',
 *     interactive: (array{ kind: 'buttons'|'template', header: (array{ type: 'text', text: string,
 *     attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{ type: 'video', text: never,
 *     attachment: never}|array{ type: 'document', text: never, attachment: never}|array{ type: 'text', text: never,
 *     attachment: never}|array{ type: 'image', text?: never, attachment: array{ id?: string, type: 'image',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string,
 *     type: 'video', url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int,
 *     metadata?: array{ width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool},
 *     title?: string, description?: string, expired?: bool}}|array{ type: 'document', text?: never,
 *     attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}), interactive_response?: never, product?: never, order?: never,
 *     link_preview?: never, poll?: never, poll_vote?: never, ...<string, mixed>}|array{ id?: string,
 *     referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive_response',
 *     interactive?: never, interactive_response: (array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index: int, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int, title?: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index?: int, title: string}), product?: never, order?: never, link_preview?: never, poll?: never,
 *     poll_vote?: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'product', product: array{
 *     id?: string, title?: string, description?: string, url?: string, image_url?: string, price?: array{
 *     amount?: string, currency?: string}}, order?: never, interactive?: never, interactive_response?: never,
 *     link_preview?: never, poll?: never, poll_vote?: never, ...<string, mixed>}|array{ id?: string,
 *     referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'order', product?: never,
 *     order: array{ id?: string, title?: string, item_count?: int, status?: 'inquiry'|'accepted'|'declined',
 *     thumbnail_url?: string, total?: array{ amount?: string, currency?: string}}, interactive?: never,
 *     interactive_response?: never, link_preview?: never, poll?: never, poll_vote?: never, ...<string,
 *     mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type?: mixed, product?: never, order?: never, interactive?: never, interactive_response?: never,
 *     link_preview?: never, poll?: never, poll_vote?: never, ...<string, mixed>}),
 *     messages?: list<MessageWithOptionalPollInput>, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessagePollWebhookEventOutput array{ id: string,
 *     type: 'message.received'|'message.updated'|'conversation.history', provider: ProviderNameOutput,
 *     account_id: string, occurred_at: string, data: array{ message?: (array{ id: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'poll', poll: MessagePollOutput,
 *     direction?: 'inbound'|'outbound', sent_at?: string, sender?: ConversationStateActorOutput,
 *     mentions?: list<MentionOutput>, reply_to_message_id?: string}|array{ id?: string, referral?: array{
 *     source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'link_preview', text?: string,
 *     link_preview: MessageLinkPreviewOutput, product?: never, order?: never, interactive?: never,
 *     interactive_response?: never, poll?: never, poll_vote?: never, ...<string, mixed>}|array{ id?: string,
 *     referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive',
 *     interactive: (array{ kind: 'buttons'|'template', header: (array{ type: 'text', text: string,
 *     attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{ type: 'video', text: never,
 *     attachment: never}|array{ type: 'document', text: never, attachment: never}|array{ type: 'text', text: never,
 *     attachment: never}|array{ type: 'image', text?: never, attachment: array{ id?: string, type: 'image',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string,
 *     type: 'document', url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string,
 *     duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}), body?: string, footer?: string, buttons?: list<MessageInteractiveButtonOutput>}|array{
 *     kind: 'buttons'|'template', header: (array{ type: 'text', text: string, attachment?: never}|array{
 *     type: 'image', text: never, attachment: never}|array{ type: 'video', text: never, attachment: never}|array{
 *     type: 'document', text: never, attachment: never}|array{ type: 'text', text: never, attachment: never}|array{
 *     type: 'image', text?: never, attachment: array{ id?: string, type: 'image', url?: string,
 *     thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{
 *     width?: int|string, height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool},
 *     title?: string, description?: string, expired?: bool}}|array{ type: 'video', text?: never, attachment: array{
 *     id?: string, type: 'video', url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string,
 *     duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}), interactive_response?: never, product?: never,
 *     order?: never, link_preview?: never, poll?: never, poll_vote?: never, ...<string, mixed>}|array{ id?: string,
 *     referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'interactive_response',
 *     interactive?: never, interactive_response: (array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int|string, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int|string, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index?: int|string, title: string}), product?: never, order?: never, link_preview?: never,
 *     poll?: never, poll_vote?: never, ...<string, mixed>}|array{ id?: string, referral?: array{ source?: 'ad',
 *     source_id?: string, source_url?: string, title?: string, body?: string, media_type?: 'image'|'video',
 *     thumbnail_url?: string, media_url?: string, provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string,
 *     greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'product', product: array{
 *     id?: string, title?: string, description?: string, url?: string, image_url?: string, price?: array{
 *     amount?: string, currency?: string}}, order?: never, interactive?: never, interactive_response?: never,
 *     link_preview?: never, poll?: never, poll_vote?: never, ...<string, mixed>}|array{ id?: string,
 *     referral?: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string, body?: string,
 *     media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string, provider_extensions?: array{
 *     whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string, automated_greeting_message_shown?: bool,
 *     automated_greeting_message_cta_type?: string, source_app?: string, click_to_whatsapp_call?: bool,
 *     contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}}, type: 'order', product?: never,
 *     order: array{ id?: string, title?: string, item_count?: int|string, status?: 'inquiry'|'accepted'|'declined',
 *     thumbnail_url?: string, total?: array{ amount?: string, currency?: string}}, interactive?: never,
 *     interactive_response?: never, link_preview?: never, poll?: never, poll_vote?: never, ...<string,
 *     mixed>}|array{ id?: string, referral?: array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     type?: mixed, product?: never, order?: never, interactive?: never, interactive_response?: never,
 *     link_preview?: never, poll?: never, poll_vote?: never, ...<string, mixed>}),
 *     messages?: list<MessageWithOptionalPollOutput>, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessageProductInput array{ id?: string, title?: string, description?: string,
 *     url?: MessageCommerceHTTPURLInput, image_url?: MessageCommerceHTTPURLInput,
 *     price?: MessageCommerceMoneyInput}
 * @phpstan-type MessageProductOutput array{ id?: string, title?: string, description?: string,
 *     url?: MessageCommerceHTTPURLOutput, image_url?: MessageCommerceHTTPURLOutput,
 *     price?: MessageCommerceMoneyOutput}
 * @phpstan-type MessageReactionRequestInput array{ account_id: string, conversation_id: string, message_id: string,
 *     sender_id?: string, emoji?: string, ...<string, mixed>}
 * @phpstan-type MessageReactionRequestOutput array{ account_id: string, conversation_id: string,
 *     message_id: string, sender_id?: string, emoji?: string, ...<string, mixed>}
 * @phpstan-type MessageReferralInput array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: MessageReferralProviderExtensionsInput}
 * @phpstan-type MessageReferralOutput array{ source?: 'ad', source_id?: string, source_url?: string,
 *     title?: string, body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: MessageReferralProviderExtensionsOutput}
 * @phpstan-type MessageReferralHistoryWebhookEventInput array{ id: string, type: 'conversation.history',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{
 *     message?: MessageWithOptionalReferralInput, messages: list<MessageWithOptionalReferralInput>, ...<string,
 *     mixed>}, ...<string, mixed>}
 * @phpstan-type MessageReferralHistoryWebhookEventOutput array{ id: string, type: 'conversation.history',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{
 *     message?: MessageWithOptionalReferralOutput, messages: list<MessageWithOptionalReferralOutput>, ...<string,
 *     mixed>}, ...<string, mixed>}
 * @phpstan-type MessageReferralProviderExtensionsInput array{ whatsapp: WhatsAppMessageReferralExtensionInput}
 * @phpstan-type MessageReferralProviderExtensionsOutput array{ whatsapp: WhatsAppMessageReferralExtensionOutput}
 * @phpstan-type MessageReferralReceivedWebhookEventInput array{ id: string, type: 'message.received',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{ message: array{
 *     id?: string, referral: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     ...<string, mixed>}, messages?: list<MessageWithOptionalReferralInput>, ...<string, mixed>}, ...<string,
 *     mixed>}
 * @phpstan-type MessageReferralReceivedWebhookEventOutput array{ id: string, type: 'message.received',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{ message: array{
 *     id?: string, referral: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     ...<string, mixed>}, messages?: list<MessageWithOptionalReferralOutput>, ...<string, mixed>}, ...<string,
 *     mixed>}
 * @phpstan-type MessageReferralUpdatedWebhookEventInput array{ id: string, type: 'message.updated',
 *     provider: ProviderNameInput, account_id: string, occurred_at: string, data: array{ message: array{
 *     id: string, referral: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     ...<string, mixed>}, messages?: list<MessageWithOptionalReferralInput>, ...<string, mixed>}, ...<string,
 *     mixed>}
 * @phpstan-type MessageReferralUpdatedWebhookEventOutput array{ id: string, type: 'message.updated',
 *     provider: ProviderNameOutput, account_id: string, occurred_at: string, data: array{ message: array{
 *     id: string, referral: array{ source?: 'ad', source_id?: string, source_url?: string, title?: string,
 *     body?: string, media_type?: 'image'|'video', thumbnail_url?: string, media_url?: string,
 *     provider_extensions?: array{ whatsapp: array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}}},
 *     ...<string, mixed>}, messages?: list<MessageWithOptionalReferralOutput>, ...<string, mixed>}, ...<string,
 *     mixed>}
 * @phpstan-type MessageReferralWebhookEventInput array{ id: string,
 *     type: 'message.received'|'message.updated'|'conversation.history', provider: ProviderNameInput,
 *     account_id: string, occurred_at: string, data: array{ message?: MessageWithOptionalReferralInput,
 *     messages?: list<MessageWithOptionalReferralInput>, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessageReferralWebhookEventOutput array{ id: string,
 *     type: 'message.received'|'message.updated'|'conversation.history', provider: ProviderNameOutput,
 *     account_id: string, occurred_at: string, data: array{ message?: MessageWithOptionalReferralOutput,
 *     messages?: list<MessageWithOptionalReferralOutput>, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type MessageRevokeRequestInput MessageTargetRequestInput
 * @phpstan-type MessageRevokeRequestOutput MessageTargetRequestOutput
 * @phpstan-type MessageTargetRequestInput array{ account_id: string, conversation_id: string, message_id: string,
 *     sender_id?: string, ...<string, mixed>}
 * @phpstan-type MessageTargetRequestOutput array{ account_id: string, conversation_id: string, message_id: string,
 *     sender_id?: string, ...<string, mixed>}
 * @phpstan-type MessageWithOptionalCommerceInput (MessageCommerceInput|array{ id?: string,
 *     referral?: MessageReferralInput, type?: mixed, product?: never, order?: never, ...<string, mixed>})
 * @phpstan-type MessageWithOptionalCommerceOutput (MessageCommerceOutput|array{ id?: string,
 *     referral?: MessageReferralOutput, type?: mixed, product?: never, order?: never, ...<string, mixed>})
 * @phpstan-type MessageWithOptionalContactCardsInput array{ contacts?: list<ReceivedContactCardInput>, ...<string,
 *     mixed>}
 * @phpstan-type MessageWithOptionalContactCardsOutput array{ contacts?: list<ReceivedContactCardOutput>,
 *     ...<string, mixed>}
 * @phpstan-type MessageWithOptionalInteractiveInput (MessageInteractiveMessageInput|(array{ id?: string,
 *     referral?: MessageReferralInput, type: 'product', product: array{ id?: string, title?: string,
 *     description?: string, url?: string, image_url?: string, price?: array{ amount?: string, currency?: string}},
 *     order?: never, interactive?: never, interactive_response?: never, ...<string, mixed>}|array{ id?: string,
 *     referral?: MessageReferralInput, type: 'order', product?: never, order: array{ id?: string, title?: string,
 *     item_count?: int, status?: 'inquiry'|'accepted'|'declined', thumbnail_url?: string, total?: array{
 *     amount?: string, currency?: string}}, interactive?: never, interactive_response?: never, ...<string,
 *     mixed>}|array{ id?: string, referral?: MessageReferralInput, type?: mixed, product?: never, order?: never,
 *     interactive?: never, interactive_response?: never, ...<string, mixed>}))
 * @phpstan-type MessageWithOptionalInteractiveOutput (MessageInteractiveMessageOutput|(array{ id?: string,
 *     referral?: MessageReferralOutput, type: 'product', product: array{ id?: string, title?: string,
 *     description?: string, url?: string, image_url?: string, price?: array{ amount?: string, currency?: string}},
 *     order?: never, interactive?: never, interactive_response?: never, ...<string, mixed>}|array{ id?: string,
 *     referral?: MessageReferralOutput, type: 'order', product?: never, order: array{ id?: string, title?: string,
 *     item_count?: int|string, status?: 'inquiry'|'accepted'|'declined', thumbnail_url?: string, total?: array{
 *     amount?: string, currency?: string}}, interactive?: never, interactive_response?: never, ...<string,
 *     mixed>}|array{ id?: string, referral?: MessageReferralOutput, type?: mixed, product?: never, order?: never,
 *     interactive?: never, interactive_response?: never, ...<string, mixed>}))
 * @phpstan-type MessageWithOptionalLinkPreviewInput (MessageLinkPreviewMessageInput|(array{ id?: string,
 *     referral?: MessageReferralInput, type: 'interactive', interactive: (array{ kind: 'buttons'|'template',
 *     header: (array{ type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never,
 *     attachment: never}|array{ type: 'video', text: never, attachment: never}|array{ type: 'document',
 *     text: never, attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image',
 *     text?: never, attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string,
 *     type: 'document', url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int,
 *     metadata?: array{ width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool},
 *     title?: string, description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}), interactive_response?: never, product?: never, order?: never,
 *     link_preview?: never, ...<string, mixed>}|array{ id?: string, referral?: MessageReferralInput,
 *     type: 'interactive_response', interactive?: never, interactive_response: (array{
 *     kind: 'button'|'template_button', selected_id: string, selected_index?: int, title?: string}|array{
 *     kind: 'button'|'template_button', selected_id: string, selected_index: int, title?: string}|array{
 *     kind: 'button'|'template_button', selected_id: string, selected_index?: int, title: string}|array{
 *     kind: 'button'|'template_button', selected_id?: string, selected_index: int, title?: string}|array{
 *     kind: 'button'|'template_button', selected_id?: string, selected_index: int, title: string}|array{
 *     kind: 'button'|'template_button', selected_id?: string, selected_index?: int, title: string}),
 *     product?: never, order?: never, link_preview?: never, ...<string, mixed>}|array{ id?: string,
 *     referral?: MessageReferralInput, type: 'product', product: array{ id?: string, title?: string,
 *     description?: string, url?: string, image_url?: string, price?: array{ amount?: string, currency?: string}},
 *     order?: never, interactive?: never, interactive_response?: never, link_preview?: never, ...<string,
 *     mixed>}|array{ id?: string, referral?: MessageReferralInput, type: 'order', product?: never, order: array{
 *     id?: string, title?: string, item_count?: int, status?: 'inquiry'|'accepted'|'declined',
 *     thumbnail_url?: string, total?: array{ amount?: string, currency?: string}}, interactive?: never,
 *     interactive_response?: never, link_preview?: never, ...<string, mixed>}|array{ id?: string,
 *     referral?: MessageReferralInput, type?: mixed, product?: never, order?: never, interactive?: never,
 *     interactive_response?: never, link_preview?: never, ...<string, mixed>}))
 * @phpstan-type MessageWithOptionalLinkPreviewOutput (MessageLinkPreviewMessageOutput|(array{ id?: string,
 *     referral?: MessageReferralOutput, type: 'interactive', interactive: (array{ kind: 'buttons'|'template',
 *     header: (array{ type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never,
 *     attachment: never}|array{ type: 'video', text: never, attachment: never}|array{ type: 'document',
 *     text: never, attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image',
 *     text?: never, attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string,
 *     type: 'video', url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string,
 *     duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}), interactive_response?: never, product?: never,
 *     order?: never, link_preview?: never, ...<string, mixed>}|array{ id?: string,
 *     referral?: MessageReferralOutput, type: 'interactive_response', interactive?: never,
 *     interactive_response: (array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int|string, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int|string, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index?: int|string, title: string}), product?: never, order?: never, link_preview?: never,
 *     ...<string, mixed>}|array{ id?: string, referral?: MessageReferralOutput, type: 'product', product: array{
 *     id?: string, title?: string, description?: string, url?: string, image_url?: string, price?: array{
 *     amount?: string, currency?: string}}, order?: never, interactive?: never, interactive_response?: never,
 *     link_preview?: never, ...<string, mixed>}|array{ id?: string, referral?: MessageReferralOutput,
 *     type: 'order', product?: never, order: array{ id?: string, title?: string, item_count?: int|string,
 *     status?: 'inquiry'|'accepted'|'declined', thumbnail_url?: string, total?: array{ amount?: string,
 *     currency?: string}}, interactive?: never, interactive_response?: never, link_preview?: never, ...<string,
 *     mixed>}|array{ id?: string, referral?: MessageReferralOutput, type?: mixed, product?: never, order?: never,
 *     interactive?: never, interactive_response?: never, link_preview?: never, ...<string, mixed>}))
 * @phpstan-type MessageWithOptionalLiveLocationInput array<string, mixed>
 * @phpstan-type MessageWithOptionalLiveLocationOutput array<string, mixed>
 * @phpstan-type MessageWithOptionalPollInput (MessagePollMessageInput|(array{ id?: string,
 *     referral?: MessageReferralInput, type: 'link_preview', text?: string, link_preview: MessageLinkPreviewInput,
 *     product?: never, order?: never, interactive?: never, interactive_response?: never, poll?: never,
 *     poll_vote?: never, ...<string, mixed>}|array{ id?: string, referral?: MessageReferralInput,
 *     type: 'interactive', interactive: (array{ kind: 'buttons'|'template', header: (array{ type: 'text',
 *     text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{ type: 'video',
 *     text: never, attachment: never}|array{ type: 'document', text: never, attachment: never}|array{ type: 'text',
 *     text: never, attachment: never}|array{ type: 'image', text?: never, attachment: array{ id?: string,
 *     type: 'image', url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int,
 *     metadata?: array{ width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool},
 *     title?: string, description?: string, expired?: bool}}|array{ type: 'video', text?: never, attachment: array{
 *     id?: string, type: 'video', url?: string, thumbnail_url?: string, mimetype?: string, size?: int,
 *     duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string, expired?: bool}}),
 *     body?: string, footer?: string, buttons?: list<MessageInteractiveButtonInput>}|array{
 *     kind: 'buttons'|'template', header: (array{ type: 'text', text: string, attachment?: never}|array{
 *     type: 'image', text: never, attachment: never}|array{ type: 'video', text: never, attachment: never}|array{
 *     type: 'document', text: never, attachment: never}|array{ type: 'text', text: never, attachment: never}|array{
 *     type: 'image', text?: never, attachment: array{ id?: string, type: 'image', url?: string,
 *     thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int,
 *     height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string,
 *     type: 'document', url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int,
 *     metadata?: array{ width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool},
 *     title?: string, description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonInput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int, file_length?: int, size?: int,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'video',
 *     text?: never, attachment: array{ id?: string, type: 'video', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int, duration_ms?: int, metadata?: array{ width?: int, height?: int,
 *     file_length?: int, size?: int, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int, duration_ms?: int, metadata?: array{
 *     width?: int, height?: int, file_length?: int, size?: int, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonInput>}), interactive_response?: never, product?: never, order?: never,
 *     link_preview?: never, poll?: never, poll_vote?: never, ...<string, mixed>}|array{ id?: string,
 *     referral?: MessageReferralInput, type: 'interactive_response', interactive?: never,
 *     interactive_response: (array{ kind: 'button'|'template_button', selected_id: string, selected_index?: int,
 *     title?: string}|array{ kind: 'button'|'template_button', selected_id: string, selected_index: int,
 *     title?: string}|array{ kind: 'button'|'template_button', selected_id: string, selected_index?: int,
 *     title: string}|array{ kind: 'button'|'template_button', selected_id?: string, selected_index: int,
 *     title?: string}|array{ kind: 'button'|'template_button', selected_id?: string, selected_index: int,
 *     title: string}|array{ kind: 'button'|'template_button', selected_id?: string, selected_index?: int,
 *     title: string}), product?: never, order?: never, link_preview?: never, poll?: never, poll_vote?: never,
 *     ...<string, mixed>}|array{ id?: string, referral?: MessageReferralInput, type: 'product', product: array{
 *     id?: string, title?: string, description?: string, url?: string, image_url?: string, price?: array{
 *     amount?: string, currency?: string}}, order?: never, interactive?: never, interactive_response?: never,
 *     link_preview?: never, poll?: never, poll_vote?: never, ...<string, mixed>}|array{ id?: string,
 *     referral?: MessageReferralInput, type: 'order', product?: never, order: array{ id?: string, title?: string,
 *     item_count?: int, status?: 'inquiry'|'accepted'|'declined', thumbnail_url?: string, total?: array{
 *     amount?: string, currency?: string}}, interactive?: never, interactive_response?: never,
 *     link_preview?: never, poll?: never, poll_vote?: never, ...<string, mixed>}|array{ id?: string,
 *     referral?: MessageReferralInput, type?: mixed, product?: never, order?: never, interactive?: never,
 *     interactive_response?: never, link_preview?: never, poll?: never, poll_vote?: never, ...<string, mixed>}))
 * @phpstan-type MessageWithOptionalPollOutput (MessagePollMessageOutput|(array{ id?: string,
 *     referral?: MessageReferralOutput, type: 'link_preview', text?: string,
 *     link_preview: MessageLinkPreviewOutput, product?: never, order?: never, interactive?: never,
 *     interactive_response?: never, poll?: never, poll_vote?: never, ...<string, mixed>}|array{ id?: string,
 *     referral?: MessageReferralOutput, type: 'interactive', interactive: (array{ kind: 'buttons'|'template',
 *     header: (array{ type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never,
 *     attachment: never}|array{ type: 'video', text: never, attachment: never}|array{ type: 'document',
 *     text: never, attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image',
 *     text?: never, attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string,
 *     type: 'video', url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string,
 *     duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'document', text?: never, attachment: array{ id?: string, type: 'document',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons?: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer: string,
 *     buttons: list<MessageInteractiveButtonOutput>}|array{ kind: 'buttons'|'template', header?: (array{
 *     type: 'text', text: string, attachment?: never}|array{ type: 'image', text: never, attachment: never}|array{
 *     type: 'video', text: never, attachment: never}|array{ type: 'document', text: never,
 *     attachment: never}|array{ type: 'text', text: never, attachment: never}|array{ type: 'image', text?: never,
 *     attachment: array{ id?: string, type: 'image', url?: string, thumbnail_url?: string, mimetype?: string,
 *     size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string, height?: int|string,
 *     file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string, description?: string,
 *     expired?: bool}}|array{ type: 'video', text?: never, attachment: array{ id?: string, type: 'video',
 *     url?: string, thumbnail_url?: string, mimetype?: string, size?: int|string, duration_ms?: int|string,
 *     metadata?: array{ width?: int|string, height?: int|string, file_length?: int|string, size?: int|string,
 *     is_big_file?: bool}, title?: string, description?: string, expired?: bool}}|array{ type: 'document',
 *     text?: never, attachment: array{ id?: string, type: 'document', url?: string, thumbnail_url?: string,
 *     mimetype?: string, size?: int|string, duration_ms?: int|string, metadata?: array{ width?: int|string,
 *     height?: int|string, file_length?: int|string, size?: int|string, is_big_file?: bool}, title?: string,
 *     description?: string, expired?: bool}}), body?: string, footer?: string,
 *     buttons: list<MessageInteractiveButtonOutput>}), interactive_response?: never, product?: never,
 *     order?: never, link_preview?: never, poll?: never, poll_vote?: never, ...<string, mixed>}|array{ id?: string,
 *     referral?: MessageReferralOutput, type: 'interactive_response', interactive?: never,
 *     interactive_response: (array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id: string,
 *     selected_index?: int|string, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int|string, title?: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index: int|string, title: string}|array{ kind: 'button'|'template_button', selected_id?: string,
 *     selected_index?: int|string, title: string}), product?: never, order?: never, link_preview?: never,
 *     poll?: never, poll_vote?: never, ...<string, mixed>}|array{ id?: string, referral?: MessageReferralOutput,
 *     type: 'product', product: array{ id?: string, title?: string, description?: string, url?: string,
 *     image_url?: string, price?: array{ amount?: string, currency?: string}}, order?: never, interactive?: never,
 *     interactive_response?: never, link_preview?: never, poll?: never, poll_vote?: never, ...<string,
 *     mixed>}|array{ id?: string, referral?: MessageReferralOutput, type: 'order', product?: never, order: array{
 *     id?: string, title?: string, item_count?: int|string, status?: 'inquiry'|'accepted'|'declined',
 *     thumbnail_url?: string, total?: array{ amount?: string, currency?: string}}, interactive?: never,
 *     interactive_response?: never, link_preview?: never, poll?: never, poll_vote?: never, ...<string,
 *     mixed>}|array{ id?: string, referral?: MessageReferralOutput, type?: mixed, product?: never, order?: never,
 *     interactive?: never, interactive_response?: never, link_preview?: never, poll?: never, poll_vote?: never,
 *     ...<string, mixed>}))
 * @phpstan-type MessageWithOptionalReferralInput array{ id?: string, referral?: MessageReferralInput, ...<string,
 *     mixed>}
 * @phpstan-type MessageWithOptionalReferralOutput array{ id?: string, referral?: MessageReferralOutput, ...<string,
 *     mixed>}
 * @phpstan-type OkDataInput array{ ok: true, ...<string, mixed>}
 * @phpstan-type OkDataOutput array{ ok: true, ...<string, mixed>}
 * @phpstan-type PasskeyResponseRequestInput array{ webauthn_response: string, ...<string, mixed>}
 * @phpstan-type PasskeyResponseRequestOutput array{ webauthn_response: string, ...<string, mixed>}
 * @phpstan-type PollMessagePayloadInput array{ type: 'poll', poll: SendMessagePollInput}
 * @phpstan-type PollMessagePayloadOutput array{ type: 'poll', poll: SendMessagePollOutput}
 * @phpstan-type PostInput array{ id: PostResourceIDInput, text?: string, author?: PostAuthorInput,
 *     created_at?: string}
 * @phpstan-type PostOutput array{ id: PostResourceIDOutput, text?: string, author?: PostAuthorOutput,
 *     created_at?: string}
 * @phpstan-type PostAuthorInput array{ id: PostResourceIDInput, display_name?: string, avatar_url?: string}
 * @phpstan-type PostAuthorOutput array{ id: PostResourceIDOutput, display_name?: string, avatar_url?: string}
 * @phpstan-type PostCommentInput array{ id: PostResourceIDInput, post_id: PostResourceIDInput, text?: string,
 *     author?: PostAuthorInput, created_at?: string, parent_comment_id?: PostResourceIDInput}
 * @phpstan-type PostCommentOutput array{ id: PostResourceIDOutput, post_id: PostResourceIDOutput, text?: string,
 *     author?: PostAuthorOutput, created_at?: string, parent_comment_id?: PostResourceIDOutput}
 * @phpstan-type PostCommentCreatedWebhookEventInput array{ id: string, type: 'post.comment.created',
 *     provider: 'tiktok', account_id: string, occurred_at: string, data: array{ post: PostInput,
 *     comment: PostCommentInput, account?: array{ provider_account_ref: string}}}
 * @phpstan-type PostCommentCreatedWebhookEventOutput array{ id: string, type: 'post.comment.created',
 *     provider: 'tiktok', account_id: string, occurred_at: string, data: array{ post: PostOutput,
 *     comment: PostCommentOutput, account?: array{ provider_account_ref: string}}}
 * @phpstan-type PostCommentListRequestInput array{ post_id: PostResourceIDInput, cursor?: string, limit?: int}
 * @phpstan-type PostCommentListRequestOutput array{ post_id: PostResourceIDOutput, cursor?: string,
 *     limit?: int|string}
 * @phpstan-type PostCommentListResultInput array{ items: list<PostCommentInput>, has_more: bool,
 *     next_cursor?: string}&(array{ has_more?: true, next_cursor: string, ...<string, mixed>}|array{
 *     has_more?: false, next_cursor?: never, ...<string, mixed>})
 * @phpstan-type PostCommentListResultOutput array{ items: list<PostCommentOutput>, has_more: bool,
 *     next_cursor?: string}&(array{ has_more?: true, next_cursor: string, ...<string, mixed>}|array{
 *     has_more?: false, next_cursor?: never, ...<string, mixed>})
 * @phpstan-type PostCommentReplyRequestInput array{ post_id: PostResourceIDInput, comment_id?: PostResourceIDInput,
 *     text: string}
 * @phpstan-type PostCommentReplyRequestOutput array{ post_id: PostResourceIDOutput,
 *     comment_id?: PostResourceIDOutput, text: string}
 * @phpstan-type PostCommentReplyResultInput array{ status: 'accepted', comment?: PostCommentInput}
 * @phpstan-type PostCommentReplyResultOutput array{ status: 'accepted', comment?: PostCommentOutput}
 * @phpstan-type PostInfoRequestInput array{ post_id: PostResourceIDInput}
 * @phpstan-type PostInfoRequestOutput array{ post_id: PostResourceIDOutput}
 * @phpstan-type PostListResultInput array{ items: list<PostInput>, has_more: bool, next_cursor?: string}&(array{
 *     has_more?: true, next_cursor: string, ...<string, mixed>}|array{ has_more?: false, next_cursor?: never,
 *     ...<string, mixed>})
 * @phpstan-type PostListResultOutput array{ items: list<PostOutput>, has_more: bool, next_cursor?: string}&(array{
 *     has_more?: true, next_cursor: string, ...<string, mixed>}|array{ has_more?: false, next_cursor?: never,
 *     ...<string, mixed>})
 * @phpstan-type PostResourceIDInput string
 * @phpstan-type PostResourceIDOutput string
 * @phpstan-type ProviderAuthSessionInput array{ account_id: string, provider: ProviderNameInput, auth_mode: string,
 *     status: string, auth_payload?: array<string, mixed>, authorize_url: string, expires_at: string,
 *     switchable: bool, available_auth_modes: list<string>, ...<string, mixed>}
 * @phpstan-type ProviderAuthSessionOutput array{ account_id: string, provider: ProviderNameOutput,
 *     auth_mode: string, status: string, auth_payload?: array<string, mixed>, authorize_url: string,
 *     expires_at: string, switchable: bool, available_auth_modes: list<string>, ...<string, mixed>}
 * @phpstan-type ProviderInputNameInput 'telegram'|'whatsapp'|'line'|'twitter'|'facebook'|'zalo'|'tiktok'|'whatsapp-protocol'|'x'|'x_client'|'twitter_client'
 * @phpstan-type ProviderInputNameOutput 'telegram'|'whatsapp'|'line'|'twitter'|'facebook'|'zalo'|'tiktok'|'whatsapp-protocol'|'x'|'x_client'|'twitter_client'
 * @phpstan-type ProviderNameInput 'telegram'|'whatsapp'|'line'|'twitter'|'facebook'|'zalo'|'tiktok'|'whatsapp-protocol'
 * @phpstan-type ProviderNameOutput 'telegram'|'whatsapp'|'line'|'twitter'|'facebook'|'zalo'|'tiktok'|'whatsapp-protocol'
 * @phpstan-type ProviderProfileInput array{ id?: string, device_id?: WhatsAppDeviceIDInput, phone?: string,
 *     username?: string, display_name?: string, push_name?: string, business_name?: string, first_name?: string,
 *     last_name?: string, avatar_url?: string, bio?: string, platform?: string, ...<string, mixed>}
 * @phpstan-type ProviderProfileOutput array{ id?: string, device_id?: WhatsAppDeviceIDOutput, phone?: string,
 *     username?: string, display_name?: string, push_name?: string, business_name?: string, first_name?: string,
 *     last_name?: string, avatar_url?: string, bio?: string, platform?: string, ...<string, mixed>}
 * @phpstan-type ProviderRegionsResponseInput array{ provider: ProviderNameInput,
 *     regions: list<RegionAvailabilityInput>, ...<string, mixed>}
 * @phpstan-type ProviderRegionsResponseOutput array{ provider: ProviderNameOutput,
 *     regions: list<RegionAvailabilityOutput>, ...<string, mixed>}
 * @phpstan-type QRAuthCheckDataInput array{ provider?: ProviderNameInput, action?: 'check_qr_auth',
 *     status?: string, auth_status?: string, auth_payload?: QRAuthCheckPayloadInput, ...<string, mixed>}
 * @phpstan-type QRAuthCheckDataOutput array{ provider?: ProviderNameOutput, action?: 'check_qr_auth',
 *     status?: string, auth_status?: string, auth_payload?: QRAuthCheckPayloadOutput, ...<string, mixed>}
 * @phpstan-type QRAuthCheckPayloadInput array{ type?: string, qr_code?: string, public_key?: FreeFormObjectInput,
 *     ...<string, mixed>}
 * @phpstan-type QRAuthCheckPayloadOutput array{ type?: string, qr_code?: string, public_key?: FreeFormObjectOutput,
 *     ...<string, mixed>}
 * @phpstan-type ReceivedContactCardInput array{ name?: string, vcard: string}
 * @phpstan-type ReceivedContactCardOutput array{ name?: string, vcard: string}
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
 *     runtime_status: RuntimeStatusInput, runtime_error: string, auth_required?: bool, auth_status?: string,
 *     ...<string, mixed>}
 * @phpstan-type RuntimeActionResultOutput array{ account_id: string, provider: ProviderNameOutput,
 *     action: 'refresh_status'|'start'|'stop'|'reconnect', operation_status: string,
 *     runtime_status: RuntimeStatusOutput, runtime_error: string, auth_required?: bool, auth_status?: string,
 *     ...<string, mixed>}
 * @phpstan-type RuntimeStatusInput 'unknown'|'starting'|'running'|'stopping'|'stopped'|'reconnecting'|'disconnected'|'error'
 * @phpstan-type RuntimeStatusOutput 'unknown'|'starting'|'running'|'stopping'|'stopped'|'reconnecting'|'disconnected'|'error'
 * @phpstan-type SendMessageLinkPreviewInput array{ url: MessageLinkPreviewHTTPURLInput, title?: string,
 *     description?: string, image_url?: MessageLinkPreviewHTTPURLInput}
 * @phpstan-type SendMessageLinkPreviewOutput array{ url: MessageLinkPreviewHTTPURLOutput, title?: string,
 *     description?: string, image_url?: MessageLinkPreviewHTTPURLOutput}
 * @phpstan-type SendMessagePollInput array{ question: string, options: list<SendMessagePollOptionInput>,
 *     max_selections: int}
 * @phpstan-type SendMessagePollOutput array{ question: string, options: list<SendMessagePollOptionOutput>,
 *     max_selections: int|string}
 * @phpstan-type SendMessagePollOptionInput array{ title: string}
 * @phpstan-type SendMessagePollOptionOutput array{ title: string}
 * @phpstan-type SendMessageProviderDataInput array{ seconds?: int, waveform?: string, ...<string, mixed>}
 * @phpstan-type SendMessageProviderDataOutput array{ seconds?: int|string, waveform?: string, ...<string, mixed>}
 * @phpstan-type SendMessageRequestInput array{ account_id: string, to: RecipientInput,
 *     message: MessagePayloadInput, provider_data?: array<string, mixed>, reply_to?: ReplyToInput,
 *     mentions?: list<MentionInput>, ...<string, mixed>}
 * @phpstan-type SendMessageRequestOutput array{ account_id: string, to: RecipientOutput,
 *     message: MessagePayloadOutput, provider_data?: array<string, mixed>, reply_to?: ReplyToOutput,
 *     mentions?: list<MentionOutput>, ...<string, mixed>}
 * @phpstan-type SendMessageResultInput array{ message_id: string, account_id: string, status: string,
 *     provider_ref?: string, reply_token?: string, ...<string, mixed>}
 * @phpstan-type SendMessageResultOutput array{ message_id: string, account_id: string, status: string,
 *     provider_ref?: string, reply_token?: string, ...<string, mixed>}
 * @phpstan-type SessionImportRequestInput array{ session_url?: string,
 *     'whatsapp-protocol'?: WhatsAppProtocolSessionImportParamsInput, ...<string, mixed>}
 * @phpstan-type SessionImportRequestOutput array{ session_url?: string,
 *     'whatsapp-protocol'?: WhatsAppProtocolSessionImportParamsOutput, ...<string, mixed>}
 * @phpstan-type StandardEventTypeInput '*'|'contact.updated'|'post.comment.created'|'message.received'|'message.updated'|'message.deleted'|'message.read'|'message.reaction'|'message.delivered'|'call.incoming'|'call.answered'|'call.ended'|'conversation.updated'|'conversation.deleted'|'conversation.cleared'|'conversation.history'|'group.updated'|'group.join_request'|'account.status.updated'|'account.profile.updated'|'account.started'|'account.history.synced'|'account.auth.required'|'account.auth.succeeded'|'account.auth.failed'
 * @phpstan-type StandardEventTypeOutput '*'|'contact.updated'|'post.comment.created'|'message.received'|'message.updated'|'message.deleted'|'message.read'|'message.reaction'|'message.delivered'|'call.incoming'|'call.answered'|'call.ended'|'conversation.updated'|'conversation.deleted'|'conversation.cleared'|'conversation.history'|'group.updated'|'group.join_request'|'account.status.updated'|'account.profile.updated'|'account.started'|'account.history.synced'|'account.auth.required'|'account.auth.succeeded'|'account.auth.failed'
 * @phpstan-type StartCodeAuthDataInput array{ provider: ProviderNameInput, action: 'start_auth', status?: string,
 *     auth_status?: string, verify_code?: string, auth_payload?: array{ type?: string, ...<string, mixed>},
 *     ...<string, mixed>}
 * @phpstan-type StartCodeAuthDataOutput array{ provider: ProviderNameOutput, action: 'start_auth', status?: string,
 *     auth_status?: string, verify_code?: string, auth_payload?: array{ type?: string, ...<string, mixed>},
 *     ...<string, mixed>}
 * @phpstan-type StickerMessagePayloadInput array{ type: 'sticker', url?: string, file_url?: string,
 *     file_key?: string}&(array{ url: mixed, ...<string, mixed>}|array{ file_url: mixed, ...<string, mixed>}|array{
 *     file_key: mixed, ...<string, mixed>})
 * @phpstan-type StickerMessagePayloadOutput array{ type: 'sticker', url?: string, file_url?: string,
 *     file_key?: string}&(array{ url: mixed, ...<string, mixed>}|array{ file_url: mixed, ...<string, mixed>}|array{
 *     file_key: mixed, ...<string, mixed>})
 * @phpstan-type TextMessagePayloadInput array{ type: 'text', text: string, caption?: string, ...<string, mixed>}
 * @phpstan-type TextMessagePayloadOutput array{ type: 'text', text: string, caption?: string, ...<string, mixed>}
 * @phpstan-type WebhookEndpointInput array{ id: string, account_id?: string, url: string,
 *     status: 'active'|'inactive', subscribed_events?: list<StandardEventTypeInput>, signing_enabled: bool,
 *     retry_policy?: FreeFormObjectInput, ...<string, mixed>}
 * @phpstan-type WebhookEndpointOutput array{ id: string, account_id?: string, url: string,
 *     status: 'active'|'inactive', subscribed_events?: list<StandardEventTypeOutput>, signing_enabled: bool,
 *     retry_policy?: FreeFormObjectOutput, ...<string, mixed>}
 * @phpstan-type WebhookEndpointRequestInput array{ account_id?: string, url: string, status: 'active'|'inactive',
 *     subscribed_events?: list<StandardEventTypeInput>, signing_secret?: string,
 *     retry_policy?: FreeFormObjectInput, ...<string, mixed>}
 * @phpstan-type WebhookEndpointRequestOutput array{ account_id?: string, url: string, status: 'active'|'inactive',
 *     subscribed_events?: list<StandardEventTypeOutput>, signing_secret?: string,
 *     retry_policy?: FreeFormObjectOutput, ...<string, mixed>}
 * @phpstan-type WhatsAppAccountAuthFailedWebhookEventInput array{ id: string, type: 'account.auth.failed',
 *     provider: 'whatsapp', account_id: string, occurred_at: string, data: array{ auth_status: 'failed',
 *     runtime_status: 'disconnected', last_error?: string, error?: array{
 *     code: 'account_auth_failed'|'account_logged_out'|'account_restricted', numeric_code: '20100'|'20101'|'20102',
 *     message: string, ...<string, mixed>}, event: array{ kind: 'account_auth_status', auth_status: 'failed',
 *     runtime_status: 'disconnected', ...<string, mixed>}, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type WhatsAppAccountAuthFailedWebhookEventOutput array{ id: string, type: 'account.auth.failed',
 *     provider: 'whatsapp', account_id: string, occurred_at: string, data: array{ auth_status: 'failed',
 *     runtime_status: 'disconnected', last_error?: string, error?: array{
 *     code: 'account_auth_failed'|'account_logged_out'|'account_restricted', numeric_code: '20100'|'20101'|'20102',
 *     message: string, ...<string, mixed>}, event: array{ kind: 'account_auth_status', auth_status: 'failed',
 *     runtime_status: 'disconnected', ...<string, mixed>}, ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type WhatsAppContactCreateOptionsInput array{ first_name?: string, full_name?: string,
 *     sync_to_device_contacts?: bool}
 * @phpstan-type WhatsAppContactCreateOptionsOutput array{ first_name?: string, full_name?: string,
 *     sync_to_device_contacts?: bool}
 * @phpstan-type WhatsAppDeviceIDInput int
 * @phpstan-type WhatsAppDeviceIDOutput int|string
 * @phpstan-type WhatsAppMessageDeviceSenderInput array{ id?: string, device_id?: WhatsAppDeviceIDInput, ...<string,
 *     mixed>}
 * @phpstan-type WhatsAppMessageDeviceSenderOutput array{ id?: string, device_id?: WhatsAppDeviceIDOutput,
 *     ...<string, mixed>}
 * @phpstan-type WhatsAppMessageDeviceWebhookEventInput array{ id: string,
 *     type: 'message.received'|'message.updated', provider: 'whatsapp', account_id: string, occurred_at: string,
 *     data: array{ sender?: WhatsAppMessageDeviceSenderInput, account?: array{ provider_account_ref?: string,
 *     ...<string, mixed>}, message?: array{ id?: string, direction?: 'inbound'|'outbound', ...<string, mixed>},
 *     ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type WhatsAppMessageDeviceWebhookEventOutput array{ id: string,
 *     type: 'message.received'|'message.updated', provider: 'whatsapp', account_id: string, occurred_at: string,
 *     data: array{ sender?: WhatsAppMessageDeviceSenderOutput, account?: array{ provider_account_ref?: string,
 *     ...<string, mixed>}, message?: array{ id?: string, direction?: 'inbound'|'outbound', ...<string, mixed>},
 *     ...<string, mixed>}, ...<string, mixed>}
 * @phpstan-type WhatsAppMessageReferralExtensionInput array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}
 * @phpstan-type WhatsAppMessageReferralExtensionOutput array{ ctwa_clid?: string, greeting_message_body?: string,
 *     automated_greeting_message_shown?: bool, automated_greeting_message_cta_type?: string, source_app?: string,
 *     click_to_whatsapp_call?: bool, contains_auto_reply?: bool, contains_ctwa_flows_auto_reply?: bool}
 * @phpstan-type WhatsAppProtocolSessionImportParamsInput array{ phone: string, platform?: int,
 *     app_version?: string, server_address?: string, fallback_server_addresses?: list<string>, country?: string,
 *     device?: int, static_pub_key: string, static_pri_key: string, identity_pub_key: string,
 *     identity_pri_key: string, hash?: string, peer_kem_public?: string, auth_hex_data?: string,
 *     authhexdata?: string, pq_handshake_mode?: string, use_xxkem_handshake?: bool}
 * @phpstan-type WhatsAppProtocolSessionImportParamsOutput array{ phone: string, platform?: int|string,
 *     app_version?: string, server_address?: string, fallback_server_addresses?: list<string>, country?: string,
 *     device?: int|string, static_pub_key: string, static_pri_key: string, identity_pub_key: string,
 *     identity_pri_key: string, hash?: string, peer_kem_public?: string, auth_hex_data?: string,
 *     authhexdata?: string, pq_handshake_mode?: string, use_xxkem_handshake?: bool}
 * @phpstan-type WorkspaceInput array{ is_beta: bool, name: string, status: WorkspaceStatusInput,
 *     metadata?: array<string, string>, account_quota: int, account_quota_used: int, account_quota_unlimited: bool,
 *     ...<string, mixed>}
 * @phpstan-type WorkspaceOutput array{ is_beta: bool, name: string, status: WorkspaceStatusOutput,
 *     metadata?: array<string, string>, account_quota: int|string, account_quota_used: int|string,
 *     account_quota_unlimited: bool, ...<string, mixed>}
 * @phpstan-type WorkspaceStatusInput 'active'|'inactive'
 * @phpstan-type WorkspaceStatusOutput 'active'|'inactive'
 * @phpstan-type WorkspaceUpdateRequestInput array{ name: string, status: WorkspaceStatusInput,
 *     metadata?: array<string, string>, is_beta?: never, ...<string, mixed>}
 * @phpstan-type WorkspaceUpdateRequestOutput array{ name: string, status: WorkspaceStatusOutput,
 *     metadata?: array<string, string>, is_beta?: never, ...<string, mixed>}
 * @phpstan-type BlockContactOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: ContactIdRequestInput}
 * @phpstan-type BlockContactOperationResponse ResponseMetaOutput&array{ data: OkDataOutput, ...<string, mixed>}
 * @phpstan-type CancelAccountAuthOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body?: FreeFormObjectInput}
 * @phpstan-type CancelAccountAuthOperationResponse ResponseMetaOutput&array{ data: FreeFormObjectOutput,
 *     ...<string, mixed>}
 * @phpstan-type CheckAccountQrAuthOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body?: FreeFormObjectInput}
 * @phpstan-type CheckAccountQrAuthOperationResponse ResponseMetaOutput&array{ data: QRAuthCheckDataOutput,
 *     ...<string, mixed>}
 * @phpstan-type ConfirmAccountPasskeyOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>}
 * @phpstan-type ConfirmAccountPasskeyOperationResponse ResponseMetaOutput&array{ data: FreeFormObjectOutput,
 *     ...<string, mixed>}
 * @phpstan-type CreateAccountOperationRequest array{ params?: array{ header?: array<string, string>},
 *     headers?: array<string, string>, body: AccountCreateRequestInput}
 * @phpstan-type CreateAccountOperationResponse ResponseMetaOutput&array{ data: AccountOutput, ...<string, mixed>}
 * @phpstan-type CreateAccountAuthSessionOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>}
 * @phpstan-type CreateAccountAuthSessionOperationResponse ResponseMetaOutput&array{
 *     data: ProviderAuthSessionOutput, ...<string, mixed>}
 * @phpstan-type CreateApiKeyOperationRequest array{ params?: array{ header?: array<string, string>},
 *     headers?: array<string, string>, body: APIKeyCreateRequestInput}
 * @phpstan-type CreateApiKeyOperationResponse ResponseMetaOutput&array{ data: APIKeyCreateResultOutput, ...<string,
 *     mixed>}
 * @phpstan-type CreateCallOperationRequest array{ params?: array{ header?: array<string, string>},
 *     headers?: array<string, string>, body: CreateCallRequestInput}
 * @phpstan-type CreateCallOperationResponse ResponseMetaOutput&array{ data: CreateCallDataOutput, ...<string,
 *     mixed>}
 * @phpstan-type CreateContactOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: ContactCreateRequestInput}
 * @phpstan-type CreateContactOperationResponse ResponseMetaOutput&array{ data: ContactOutput, ...<string, mixed>}
 * @phpstan-type CreateGroupOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: GroupCreateRequestInput}
 * @phpstan-type CreateGroupOperationResponse ResponseMetaOutput&array{ data: GroupCreateResultOutput, ...<string,
 *     mixed>}
 * @phpstan-type CreateWebhookEndpointOperationRequest array{ params?: array{ header?: array<string, string>},
 *     headers?: array<string, string>, body: WebhookEndpointRequestInput}
 * @phpstan-type CreateWebhookEndpointOperationResponse ResponseMetaOutput&array{ data: WebhookEndpointOutput,
 *     ...<string, mixed>}
 * @phpstan-type DeactivateWebhookEndpointOperationRequest array{ params: array{ path: array{ endpoint_id: string},
 *     query?: array{ account_id?: string}, header?: array<string, string>}, headers?: array<string, string>}
 * @phpstan-type DeactivateWebhookEndpointOperationResponse ResponseMetaOutput&array{ data: WebhookEndpointOutput,
 *     ...<string, mixed>}
 * @phpstan-type DeleteAccountOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>}
 * @phpstan-type DeleteAccountOperationResponse (ResponseMetaOutput&array{ data: AccountOperationOutput, ...<string,
 *     mixed>})|null
 * @phpstan-type DeleteConversationLabelOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: ConversationLabelDeleteRequestInput}
 * @phpstan-type DeleteConversationLabelOperationResponse ResponseMetaOutput&array{
 *     data: ConversationLabelDeleteResultOutput, ...<string, mixed>}
 * @phpstan-type DeleteWebhookEndpointOperationRequest array{ params: array{ path: array{ endpoint_id: string},
 *     query?: array{ account_id?: string}, header?: array<string, string>}, headers?: array<string, string>}
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
 * @phpstan-type GetAccountOperationOperationRequest array{ params: array{ path: array{ operation_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>}
 * @phpstan-type GetAccountOperationOperationResponse ResponseMetaOutput&array{ data: AccountOperationOutput,
 *     ...<string, mixed>}
 * @phpstan-type GetActiveCallOperationRequest array{ params: array{ query: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>}
 * @phpstan-type GetActiveCallOperationResponse ResponseMetaOutput&(array{ data: (ActiveCallDataOutput|array<string,
 *     mixed>), ...<string, mixed>})
 * @phpstan-type GetContactOperationRequest array{ params: array{ path: array{ account_id: string}, query: array{
 *     contact_id: string}, header?: array<string, string>}, headers?: array<string, string>}
 * @phpstan-type GetContactOperationResponse ResponseMetaOutput&array{ data: ContactOutput, ...<string, mixed>}
 * @phpstan-type GetContactMembershipOperationRequest array{ params: array{ path: array{ account_id: string},
 *     query: array{ contact_id: string}, header?: array<string, string>}, headers?: array<string, string>}
 * @phpstan-type GetContactMembershipOperationResponse ResponseMetaOutput&array{ data: ContactMembershipOutput,
 *     ...<string, mixed>}
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
 * @phpstan-type GetPostOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: PostInfoRequestInput}
 * @phpstan-type GetPostOperationResponse ResponseMetaOutput&array{ data: PostOutput, ...<string, mixed>}
 * @phpstan-type GetWebhookEndpointOperationRequest array{ params: array{ path: array{ endpoint_id: string},
 *     query?: array{ account_id?: string}, header?: array<string, string>}, headers?: array<string, string>}
 * @phpstan-type GetWebhookEndpointOperationResponse ResponseMetaOutput&array{ data: WebhookEndpointOutput,
 *     ...<string, mixed>}
 * @phpstan-type GetWorkspaceOperationRequest array{ params?: array{ header?: array<string, string>},
 *     headers?: array<string, string>}
 * @phpstan-type GetWorkspaceOperationResponse ResponseMetaOutput&array{ data: WorkspaceOutput, ...<string, mixed>}
 * @phpstan-type HangupCallOperationRequest array{ params: array{ path: array{ call_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: array{ account_id: string,
 *     ...<string, mixed>}}
 * @phpstan-type HangupCallOperationResponse ResponseMetaOutput&array{ data: EndedCallDataOutput, ...<string,
 *     mixed>}
 * @phpstan-type ImportAccountAuthSessionOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body?: SessionImportRequestInput}
 * @phpstan-type ImportAccountAuthSessionOperationResponse ResponseMetaOutput&array{ data: FreeFormObjectOutput,
 *     ...<string, mixed>}
 * @phpstan-type LeaveGroupOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: GroupIdRequestInput}
 * @phpstan-type LeaveGroupOperationResponse ResponseMetaOutput&array{ data: OkDataOutput, ...<string, mixed>}
 * @phpstan-type ListAccountsOperationRequest array{ params?: array{ query?: array{ limit?: int, cursor?: string},
 *     header?: array<string, string>}, headers?: array<string, string>}
 * @phpstan-type ListAccountsOperationResponse ResponseMetaOutput&array{ data: AccountListResultOutput, ...<string,
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
 * @phpstan-type ListPostCommentsOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: PostCommentListRequestInput}
 * @phpstan-type ListPostCommentsOperationResponse ResponseMetaOutput&array{ data: PostCommentListResultOutput,
 *     ...<string, mixed>}
 * @phpstan-type ListPostsOperationRequest array{ params: array{ path: array{ account_id: string}, query?: array{
 *     cursor?: string, limit?: int}, header?: array<string, string>}, headers?: array<string, string>}
 * @phpstan-type ListPostsOperationResponse ResponseMetaOutput&array{ data: PostListResultOutput, ...<string,
 *     mixed>}
 * @phpstan-type ListProviderRegionsOperationRequest array{ params: array{ path: array{
 *     provider: ProviderInputNameInput}, header?: array<string, string>}, headers?: array<string, string>}
 * @phpstan-type ListProviderRegionsOperationResponse ResponseMetaOutput&array{ data: ProviderRegionsResponseOutput,
 *     ...<string, mixed>}
 * @phpstan-type ListWebhookEndpointsOperationRequest array{ params?: array{ query?: array{ account_id?: string},
 *     header?: array<string, string>}, headers?: array<string, string>}
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
 * @phpstan-type ReplyPostCommentOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: PostCommentReplyRequestInput}
 * @phpstan-type ReplyPostCommentOperationResponse ResponseMetaOutput&array{ data: PostCommentReplyResultOutput,
 *     ...<string, mixed>}
 * @phpstan-type RequestConversationHistoryOperationRequest array{ params: array{ path: array{ account_id: string},
 *     header?: array<string, string>}, headers?: array<string, string>, body: ConversationHistoryRequestInput}
 * @phpstan-type RequestConversationHistoryOperationResponse ResponseMetaOutput&array{
 *     data: ConversationHistoryAcceptedOutput, ...<string, mixed>}
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
 * @phpstan-type StartAccountAuthOperationResponse ResponseMetaOutput&array{ data: StartCodeAuthDataOutput,
 *     ...<string, mixed>}
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
 * @phpstan-type SubmitAccountPasskeyResponseOperationRequest array{ params: array{ path: array{
 *     account_id: string}, header?: array<string, string>}, headers?: array<string, string>,
 *     body: PasskeyResponseRequestInput}
 * @phpstan-type SubmitAccountPasskeyResponseOperationResponse ResponseMetaOutput&array{ data: FreeFormObjectOutput,
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
 *     header?: array<string, string>}, headers?: array<string, string>, body: AccountUpdateRequestInput}
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
