<?php

/**
 * 此文件由 `composer generate` 根据 contracts/device.openapi.yaml 生成。
 * 生成边界用于保持 PHP SDK 与公开 Node SDK 同步；请修改来源，不要手工编辑。
 */

declare(strict_types=1);

namespace UnifyPort\Sdk\Generated;

use UnifyPort\Sdk\Exception\UnifyPortConfigurationException;

final class SchemaCatalog
{
    /** @var array<string, array<string, mixed>> */
    private const SCHEMAS = [
        'APIKey' => [
            'type' => 'object',
            'required' => [
                'id',
                'name',
                'key_prefix',
                'status',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'examples' => [
                        'ak_xxx',
                    ],
                ],
                'name' => [
                    'type' => 'string',
                ],
                'key_prefix' => [
                    'type' => 'string',
                    'description' => '可展示的 Key 前缀，不是完整 API Key。',
                ],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'active',
                        'inactive',
                    ],
                ],
            ],
        ],
        'APIKeyCreateRequest' => [
            'type' => 'object',
            'required' => [
                'name',
            ],
            'properties' => [
                'name' => [
                    'type' => 'string',
                ],
                'prefix' => [
                    'type' => 'string',
                    'description' => '生成 API Key 时使用的前缀。',
                ],
            ],
        ],
        'APIKeyCreateResult' => [
            'type' => 'object',
            'required' => [
                'key',
                'api_key',
            ],
            'properties' => [
                'key' => [
                    '$ref' => '#/components/schemas/APIKey',
                ],
                'api_key' => [
                    'type' => 'string',
                    'description' => '完整明文 API Key，仅创建或轮换响应中出现一次。',
                ],
            ],
        ],
        'APIKeyStatusUpdateRequest' => [
            'type' => 'object',
            'required' => [
                'status',
            ],
            'properties' => [
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'active',
                        'inactive',
                    ],
                ],
            ],
        ],
        'Account' => [
            'type' => 'object',
            'required' => [
                'id',
                'name',
                'provider',
                'region',
                'status',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'examples' => [
                        'acc_xxx',
                    ],
                ],
                'name' => [
                    'type' => 'string',
                ],
                'provider' => [
                    '$ref' => '#/components/schemas/ProviderName',
                ],
                'region' => [
                    'type' => 'string',
                ],
                'status' => [
                    'type' => 'string',
                    'description' => '账号资源状态，例如 active、inactive、disabled。',
                ],
                'runtime_status' => [
                    '$ref' => '#/components/schemas/RuntimeStatus',
                ],
                'auth_mode' => [
                    'type' => 'string',
                    'description' => '授权模式，例如 qrcode、code、session。',
                ],
                'capabilities' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                    ],
                ],
                'metadata' => [
                    '$ref' => '#/components/schemas/FreeFormObject',
                ],
                'provider_account_ref' => [
                    'type' => 'string',
                    'description' => 'provider 侧账号公开标识。',
                ],
                'proxy' => [
                    '$ref' => '#/components/schemas/FreeFormObject',
                ],
                'provider_profile' => [
                    '$ref' => '#/components/schemas/FreeFormObject',
                ],
            ],
        ],
        'AccountRequest' => [
            'type' => 'object',
            'required' => [
                'provider',
                'region',
            ],
            'properties' => [
                'name' => [
                    'type' => 'string',
                ],
                'provider' => [
                    '$ref' => '#/components/schemas/ProviderName',
                ],
                'region' => [
                    'type' => 'string',
                ],
                'status' => [
                    'type' => 'string',
                ],
                'runtime_status' => [
                    '$ref' => '#/components/schemas/RuntimeStatus',
                ],
                'auth_mode' => [
                    'type' => 'string',
                ],
                'capabilities' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                    ],
                ],
                'metadata' => [
                    '$ref' => '#/components/schemas/FreeFormObject',
                ],
                'provider_account_ref' => [
                    'type' => 'string',
                ],
                'provider_data' => [
                    '$ref' => '#/components/schemas/FreeFormObject',
                ],
                'proxy' => [
                    '$ref' => '#/components/schemas/FreeFormObject',
                ],
            ],
        ],
        'AccountSession' => [
            'type' => 'object',
            'required' => [
                'account_id',
                'status',
            ],
            'properties' => [
                'account_id' => [
                    'type' => 'string',
                ],
                'status' => [
                    'type' => 'string',
                    'description' => '授权流程状态，例如 pending_auth、awaiting_qr_scan、authorized、failed。',
                ],
                'auth_fields' => [
                    'type' => 'array',
                    'items' => [
                        '$ref' => '#/components/schemas/AuthField',
                    ],
                ],
                'auth_payload' => [
                    '$ref' => '#/components/schemas/FreeFormObject',
                ],
                'expires_at' => [
                    'type' => 'string',
                ],
                'last_error' => [
                    'type' => 'string',
                ],
            ],
        ],
        'AuthField' => [
            'type' => 'object',
            'required' => [
                'type',
                'required',
            ],
            'properties' => [
                'type' => [
                    'type' => 'string',
                ],
                'required' => [
                    'type' => 'boolean',
                ],
                'label' => [
                    'type' => 'string',
                ],
                'placeholder' => [
                    'type' => 'string',
                ],
            ],
        ],
        'Contact' => [
            'type' => 'object',
            'required' => [
                'id',
                'conversation_id',
                'display_name',
                'avatar_url',
                'provider_user_id',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                ],
                'conversation_id' => [
                    'type' => 'string',
                ],
                'display_name' => [
                    'type' => 'string',
                ],
                'avatar_url' => [
                    'type' => 'string',
                ],
                'provider_user_id' => [
                    'type' => 'string',
                ],
                'is_blocked' => [
                    'type' => 'boolean',
                ],
                'extra' => [
                    '$ref' => '#/components/schemas/FreeFormObject',
                ],
            ],
        ],
        'ContactBlocklistResult' => [
            'type' => 'object',
            'required' => [
                'blocklist',
            ],
            'properties' => [
                'blocklist' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                    ],
                ],
                'dhash' => [
                    'type' => 'string',
                ],
            ],
        ],
        'ContactCard' => [
            'type' => 'object',
            'required' => [
                'name',
            ],
            'properties' => [
                'name' => [
                    'type' => 'string',
                ],
                'phones' => [
                    'type' => 'array',
                    'items' => [
                        '$ref' => '#/components/schemas/ContactPhone',
                    ],
                ],
                'emails' => [
                    'type' => 'array',
                    'items' => [
                        '$ref' => '#/components/schemas/ContactEmail',
                    ],
                ],
                'organization' => [
                    'type' => 'string',
                ],
                'title' => [
                    'type' => 'string',
                ],
            ],
        ],
        'ContactEmail' => [
            'type' => 'object',
            'required' => [
                'address',
            ],
            'properties' => [
                'address' => [
                    'type' => 'string',
                    'format' => 'email',
                ],
                'type' => [
                    'type' => 'string',
                ],
            ],
        ],
        'ContactIdRequest' => [
            'type' => 'object',
            'required' => [
                'contact_id',
            ],
            'properties' => [
                'contact_id' => [
                    'type' => 'string',
                ],
            ],
        ],
        'ContactListResult' => [
            'type' => 'object',
            'required' => [
                'items',
                'has_more',
            ],
            'properties' => [
                'items' => [
                    'type' => 'array',
                    'items' => [
                        '$ref' => '#/components/schemas/Contact',
                    ],
                ],
                'next_cursor' => [
                    'type' => 'string',
                ],
                'has_more' => [
                    'type' => 'boolean',
                ],
            ],
        ],
        'ContactNoteRequest' => [
            'type' => 'object',
            'required' => [
                'contact_id',
                'note',
            ],
            'properties' => [
                'contact_id' => [
                    'type' => 'string',
                ],
                'note' => [
                    'type' => 'string',
                    'description' => '传空字符串表示清空备注。',
                ],
            ],
        ],
        'ContactPhone' => [
            'type' => 'object',
            'required' => [
                'number',
            ],
            'properties' => [
                'number' => [
                    'type' => 'string',
                ],
                'type' => [
                    'type' => 'string',
                ],
            ],
        ],
        'Conversation' => [
            'type' => 'object',
            'required' => [
                'conversation_id',
                'type',
                'title',
                'avatar_url',
                'unread_count',
                'is_pinned',
                'is_muted',
            ],
            'properties' => [
                'conversation_id' => [
                    'type' => 'string',
                ],
                'type' => [
                    '$ref' => '#/components/schemas/ConversationType',
                ],
                'title' => [
                    'type' => 'string',
                ],
                'username' => [
                    'type' => 'string',
                ],
                'avatar_url' => [
                    'type' => 'string',
                ],
                'description' => [
                    'type' => 'string',
                ],
                'last_message_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                ],
                'last_message_text' => [
                    'type' => 'string',
                ],
                'unread_count' => [
                    'type' => 'integer',
                    'format' => 'int64',
                ],
                'members_count' => [
                    'type' => 'integer',
                    'format' => 'int64',
                ],
                'subscribers_count' => [
                    'type' => 'integer',
                    'format' => 'int64',
                ],
                'is_pinned' => [
                    'type' => 'boolean',
                ],
                'is_muted' => [
                    'type' => 'boolean',
                ],
                'created_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                ],
                'extra' => [
                    '$ref' => '#/components/schemas/FreeFormObject',
                ],
            ],
        ],
        'ConversationIdRequest' => [
            'type' => 'object',
            'required' => [
                'conversation_id',
            ],
            'properties' => [
                'conversation_id' => [
                    'type' => 'string',
                ],
            ],
        ],
        'ConversationLabel' => [
            'type' => 'object',
            'required' => [
                'id',
                'name',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                ],
                'name' => [
                    'type' => 'string',
                ],
            ],
        ],
        'ConversationLabelDeleteRequest' => [
            'type' => 'object',
            'required' => [
                'label_id',
            ],
            'properties' => [
                'label_id' => [
                    'type' => 'string',
                ],
            ],
        ],
        'ConversationLabelDeleteResult' => [
            'type' => 'object',
            'required' => [
                'label_id',
                'deleted',
            ],
            'properties' => [
                'label_id' => [
                    'type' => 'string',
                ],
                'deleted' => [
                    'type' => 'boolean',
                    'const' => true,
                ],
            ],
        ],
        'ConversationLabelListResult' => [
            'type' => 'object',
            'required' => [
                'items',
                'has_more',
            ],
            'properties' => [
                'items' => [
                    'type' => 'array',
                    'items' => [
                        '$ref' => '#/components/schemas/ConversationLabel',
                    ],
                ],
                'next_cursor' => [
                    'type' => 'string',
                ],
                'has_more' => [
                    'type' => 'boolean',
                ],
            ],
        ],
        'ConversationLabelMembersRequest' => [
            'type' => 'object',
            'required' => [
                'label_id',
                'action',
                'conversation_ids',
            ],
            'properties' => [
                'label_id' => [
                    'type' => 'string',
                ],
                'action' => [
                    'type' => 'string',
                    'enum' => [
                        'add',
                        'remove',
                    ],
                ],
                'conversation_ids' => [
                    'type' => 'array',
                    'minItems' => 1,
                    'items' => [
                        'type' => 'string',
                    ],
                ],
            ],
        ],
        'ConversationLabelMembersResult' => [
            'type' => 'object',
            'required' => [
                'label_id',
                'action',
                'conversation_ids',
            ],
            'properties' => [
                'label_id' => [
                    'type' => 'string',
                ],
                'action' => [
                    'type' => 'string',
                    'enum' => [
                        'add',
                        'remove',
                    ],
                ],
                'conversation_ids' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                    ],
                ],
            ],
        ],
        'ConversationLabelUpsertRequest' => [
            'type' => 'object',
            'required' => [
                'name',
            ],
            'properties' => [
                'label_id' => [
                    'type' => 'string',
                    'description' => '为空表示新建，非空表示更新。',
                ],
                'name' => [
                    'type' => 'string',
                ],
            ],
        ],
        'ConversationListResult' => [
            'type' => 'object',
            'required' => [
                'items',
                'has_more',
            ],
            'properties' => [
                'items' => [
                    'type' => 'array',
                    'items' => [
                        '$ref' => '#/components/schemas/Conversation',
                    ],
                ],
                'next_cursor' => [
                    'type' => 'string',
                ],
                'has_more' => [
                    'type' => 'boolean',
                ],
            ],
        ],
        'ConversationMember' => [
            'type' => 'object',
            'required' => [
                'peer_id',
                'display_name',
                'avatar_url',
            ],
            'properties' => [
                'peer_id' => [
                    'type' => 'string',
                ],
                'username' => [
                    'type' => 'string',
                ],
                'display_name' => [
                    'type' => 'string',
                ],
                'avatar_url' => [
                    'type' => 'string',
                ],
                'role' => [
                    'type' => 'string',
                ],
                'joined_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                ],
                'extra' => [
                    '$ref' => '#/components/schemas/FreeFormObject',
                ],
            ],
        ],
        'ConversationMemberListResult' => [
            'type' => 'object',
            'required' => [
                'items',
                'has_more',
            ],
            'properties' => [
                'items' => [
                    'type' => 'array',
                    'items' => [
                        '$ref' => '#/components/schemas/ConversationMember',
                    ],
                ],
                'next_cursor' => [
                    'type' => 'string',
                ],
                'has_more' => [
                    'type' => 'boolean',
                ],
            ],
        ],
        'ConversationMuteRequest' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/ConversationIdRequest',
                ],
                [
                    'type' => 'object',
                    'properties' => [
                        'duration' => [
                            'type' => 'integer',
                            'format' => 'int64',
                            'minimum' => 0,
                            'description' => '相对静音时长，单位秒；0 表示永久静音。',
                        ],
                        'mute_until' => [
                            'type' => 'string',
                            'format' => 'date-time',
                            'description' => 'RFC3339 绝对结束时间，与 `duration` 互斥。',
                        ],
                    ],
                ],
            ],
        ],
        'ConversationReadRequest' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/ConversationIdRequest',
                ],
                [
                    'type' => 'object',
                    'properties' => [
                        'up_to_message_id' => [
                            'type' => 'string',
                            'description' => '可选，省略时标记整个会话已读。',
                        ],
                    ],
                ],
            ],
        ],
        'ConversationType' => [
            'type' => 'string',
            'enum' => [
                'user',
                'group',
                'channel',
            ],
        ],
        'Error' => [
            'type' => 'object',
            'required' => [
                'code',
                'message',
            ],
            'properties' => [
                'code' => [
                    'type' => 'string',
                    'description' => '稳定的机器可读错误码。',
                    'examples' => [
                        'invalid_request',
                    ],
                ],
                'message' => [
                    'type' => 'string',
                    'description' => '面向开发者的错误说明，不建议作为客户端分支依据。',
                ],
            ],
        ],
        'ErrorEnvelope' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/ResponseMeta',
                ],
                [
                    'type' => 'object',
                    'required' => [
                        'error',
                    ],
                    'properties' => [
                        'error' => [
                            '$ref' => '#/components/schemas/Error',
                        ],
                    ],
                ],
            ],
        ],
        'FreeFormObject' => [
            'type' => 'object',
            'additionalProperties' => true,
        ],
        'Group' => [
            'type' => 'object',
            'required' => [
                'id',
                'conversation_id',
                'name',
                'avatar_url',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                ],
                'conversation_id' => [
                    'type' => 'string',
                ],
                'name' => [
                    'type' => 'string',
                ],
                'avatar_url' => [
                    'type' => 'string',
                ],
                'member_count' => [
                    'type' => 'integer',
                    'format' => 'int64',
                ],
                'joined_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                ],
                'created_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                ],
                'description' => [
                    'type' => 'string',
                ],
                'extra' => [
                    '$ref' => '#/components/schemas/FreeFormObject',
                ],
            ],
        ],
        'GroupCreateRequest' => [
            'type' => 'object',
            'required' => [
                'name',
            ],
            'properties' => [
                'name' => [
                    'type' => 'string',
                    'maxLength' => 100,
                ],
                'members' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                    ],
                ],
            ],
        ],
        'GroupCreateResult' => [
            'type' => 'object',
            'required' => [
                'id',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                ],
            ],
        ],
        'GroupIdRequest' => [
            'type' => 'object',
            'required' => [
                'group_id',
            ],
            'properties' => [
                'group_id' => [
                    'type' => 'string',
                ],
            ],
        ],
        'GroupInfoUpdateRequest' => [
            'type' => 'object',
            'required' => [
                'group_id',
            ],
            'properties' => [
                'group_id' => [
                    'type' => 'string',
                ],
                'name' => [
                    'type' => 'string',
                    'maxLength' => 100,
                ],
                'description' => [
                    'type' => 'string',
                    'description' => '传空字符串表示清空描述。',
                ],
                'avatar_url' => [
                    'type' => 'string',
                    'format' => 'uri',
                ],
            ],
        ],
        'GroupInviteCode' => [
            'type' => 'object',
            'required' => [
                'invite_url',
                'invite_code',
            ],
            'properties' => [
                'invite_url' => [
                    'type' => 'string',
                ],
                'invite_code' => [
                    'type' => 'string',
                ],
            ],
        ],
        'GroupJoinApprovalModeRequest' => [
            'type' => 'object',
            'required' => [
                'group_id',
                'enabled',
            ],
            'properties' => [
                'group_id' => [
                    'type' => 'string',
                ],
                'enabled' => [
                    'type' => 'boolean',
                ],
            ],
        ],
        'GroupJoinRequest' => [
            'type' => 'object',
            'required' => [
                'id',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                ],
                'phone' => [
                    'type' => 'string',
                ],
                'lid' => [
                    'type' => 'string',
                ],
                'requested_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                ],
            ],
        ],
        'GroupJoinRequestsResult' => [
            'type' => 'object',
            'required' => [
                'group_id',
                'items',
            ],
            'properties' => [
                'group_id' => [
                    'type' => 'string',
                ],
                'items' => [
                    'type' => 'array',
                    'items' => [
                        '$ref' => '#/components/schemas/GroupJoinRequest',
                    ],
                ],
            ],
        ],
        'GroupJoinRequestsUpdateRequest' => [
            'type' => 'object',
            'required' => [
                'group_id',
                'action',
                'member_ids',
            ],
            'properties' => [
                'group_id' => [
                    'type' => 'string',
                ],
                'action' => [
                    'type' => 'string',
                    'enum' => [
                        'approve',
                        'reject',
                    ],
                ],
                'member_ids' => [
                    'type' => 'array',
                    'minItems' => 1,
                    'items' => [
                        'type' => 'string',
                    ],
                ],
            ],
        ],
        'GroupListResult' => [
            'type' => 'object',
            'required' => [
                'items',
                'has_more',
            ],
            'properties' => [
                'items' => [
                    'type' => 'array',
                    'items' => [
                        '$ref' => '#/components/schemas/Group',
                    ],
                ],
                'next_cursor' => [
                    'type' => 'string',
                ],
                'has_more' => [
                    'type' => 'boolean',
                ],
            ],
        ],
        'GroupMemberUpdateRequest' => [
            'type' => 'object',
            'required' => [
                'group_id',
                'action',
                'member_id',
            ],
            'properties' => [
                'group_id' => [
                    'type' => 'string',
                ],
                'action' => [
                    'type' => 'string',
                    'enum' => [
                        'add',
                        'remove',
                        'promote',
                        'demote',
                    ],
                ],
                'member_id' => [
                    'type' => 'string',
                ],
            ],
        ],
        'Mention' => [
            'type' => 'object',
            'required' => [
                'id',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                ],
            ],
        ],
        'MessageEditRequest' => [
            'type' => 'object',
            'required' => [
                'account_id',
                'conversation_id',
                'message_id',
                'content',
            ],
            'properties' => [
                'account_id' => [
                    'type' => 'string',
                ],
                'conversation_id' => [
                    'type' => 'string',
                ],
                'message_id' => [
                    'type' => 'string',
                ],
                'content' => [
                    'type' => 'string',
                ],
            ],
        ],
        'MessagePayload' => [
            'type' => 'object',
            'required' => [
                'type',
            ],
            'properties' => [
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'text',
                        'image',
                        'video',
                        'audio',
                        'document',
                        'file',
                        'contact',
                    ],
                ],
                'text' => [
                    'type' => 'string',
                ],
                'url' => [
                    'type' => 'string',
                    'format' => 'uri',
                ],
                'file_url' => [
                    'type' => 'string',
                    'format' => 'uri',
                ],
                'file_key' => [
                    'type' => 'string',
                ],
                'caption' => [
                    'type' => 'string',
                ],
                'contacts' => [
                    'type' => 'array',
                    'items' => [
                        '$ref' => '#/components/schemas/ContactCard',
                    ],
                ],
            ],
        ],
        'MessagePinRequest' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageTargetRequest',
                ],
                [
                    'type' => 'object',
                    'required' => [
                        'pinned',
                    ],
                    'properties' => [
                        'pinned' => [
                            'type' => 'boolean',
                        ],
                        'duration_seconds' => [
                            'type' => 'integer',
                            'format' => 'uint32',
                        ],
                    ],
                ],
            ],
        ],
        'MessageReactionRequest' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageTargetRequest',
                ],
                [
                    'type' => 'object',
                    'properties' => [
                        'emoji' => [
                            'type' => 'string',
                            'description' => '空字符串表示取消回应。',
                        ],
                    ],
                ],
            ],
        ],
        'MessageRevokeRequest' => [
            '$ref' => '#/components/schemas/MessageTargetRequest',
        ],
        'MessageTargetRequest' => [
            'type' => 'object',
            'required' => [
                'account_id',
                'conversation_id',
                'message_id',
            ],
            'properties' => [
                'account_id' => [
                    'type' => 'string',
                ],
                'conversation_id' => [
                    'type' => 'string',
                ],
                'message_id' => [
                    'type' => 'string',
                ],
                'sender_id' => [
                    'type' => 'string',
                    'description' => '目标消息作者标识；缺省通常表示账号自身。',
                ],
            ],
        ],
        'OkData' => [
            'type' => 'object',
            'required' => [
                'ok',
            ],
            'properties' => [
                'ok' => [
                    'type' => 'boolean',
                    'const' => true,
                ],
            ],
        ],
        'ProviderName' => [
            'type' => 'string',
            'enum' => [
                'telegram',
                'whatsapp',
                'line',
                'twitter',
                'x',
                'zalo',
                'tiktok',
                'whatsapp_protocol',
            ],
            'description' => 'provider 名称；实际可用范围以当前账号能力为准。',
        ],
        'ProviderRegionsResponse' => [
            'type' => 'object',
            'required' => [
                'provider',
                'regions',
            ],
            'properties' => [
                'provider' => [
                    '$ref' => '#/components/schemas/ProviderName',
                ],
                'regions' => [
                    'type' => 'array',
                    'items' => [
                        '$ref' => '#/components/schemas/RegionAvailability',
                    ],
                ],
            ],
        ],
        'Recipient' => [
            'type' => 'object',
            'required' => [
                'id',
                'type',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'description' => 'provider 侧接收方 ID。',
                ],
                'type' => [
                    '$ref' => '#/components/schemas/ConversationType',
                ],
            ],
        ],
        'RegionAvailability' => [
            'type' => 'object',
            'required' => [
                'region',
                'supported',
                'allocatable',
            ],
            'properties' => [
                'region' => [
                    'type' => 'string',
                ],
                'supported' => [
                    'type' => 'boolean',
                ],
                'allocatable' => [
                    'type' => 'boolean',
                ],
            ],
        ],
        'ReplyTo' => [
            'type' => 'object',
            'required' => [
                'reply_token',
            ],
            'properties' => [
                'reply_token' => [
                    'type' => 'string',
                    'description' => '来自入站事件 `data.message.reply_token` 的不透明句柄。',
                ],
            ],
        ],
        'ResponseMeta' => [
            'type' => 'object',
            'properties' => [
                'request_id' => [
                    'type' => 'string',
                    'description' => '服务端生成的请求 ID。',
                ],
                'client_request_id' => [
                    'type' => 'string',
                    'description' => '当客户端请求头传入合法 `X-Request-Id` 时回显。',
                ],
            ],
        ],
        'RuntimeActionResult' => [
            'type' => 'object',
            'required' => [
                'account_id',
                'provider',
                'action',
                'operation_status',
                'runtime_status',
                'runtime_error',
            ],
            'properties' => [
                'account_id' => [
                    'type' => 'string',
                ],
                'provider' => [
                    '$ref' => '#/components/schemas/ProviderName',
                ],
                'action' => [
                    'type' => 'string',
                    'enum' => [
                        'refresh_status',
                        'start',
                        'stop',
                        'reconnect',
                    ],
                ],
                'operation_status' => [
                    'type' => 'string',
                    'examples' => [
                        'succeeded',
                    ],
                ],
                'runtime_status' => [
                    '$ref' => '#/components/schemas/RuntimeStatus',
                ],
                'runtime_error' => [
                    'type' => 'string',
                ],
            ],
        ],
        'RuntimeStatus' => [
            'type' => 'string',
            'enum' => [
                'unknown',
                'starting',
                'running',
                'stopping',
                'stopped',
                'reconnecting',
                'disconnected',
                'error',
            ],
        ],
        'SendMessageRequest' => [
            'type' => 'object',
            'required' => [
                'account_id',
                'to',
                'message',
            ],
            'properties' => [
                'account_id' => [
                    'type' => 'string',
                ],
                'to' => [
                    '$ref' => '#/components/schemas/Recipient',
                ],
                'message' => [
                    '$ref' => '#/components/schemas/MessagePayload',
                ],
                'provider_data' => [
                    '$ref' => '#/components/schemas/FreeFormObject',
                ],
                'reply_to' => [
                    '$ref' => '#/components/schemas/ReplyTo',
                ],
                'mentions' => [
                    'type' => 'array',
                    'items' => [
                        '$ref' => '#/components/schemas/Mention',
                    ],
                ],
            ],
        ],
        'SendMessageResult' => [
            'type' => 'object',
            'required' => [
                'message_id',
                'account_id',
                'status',
            ],
            'properties' => [
                'message_id' => [
                    'type' => 'string',
                ],
                'account_id' => [
                    'type' => 'string',
                ],
                'status' => [
                    'type' => 'string',
                    'examples' => [
                        'accepted',
                    ],
                ],
                'provider_ref' => [
                    'type' => 'string',
                ],
            ],
        ],
        'StandardEventType' => [
            'type' => 'string',
            'enum' => [
                'message.received',
                'message.updated',
                'message.deleted',
                'message.read',
                'message.reaction',
                'message.delivered',
                'conversation.updated',
                'conversation.deleted',
                'conversation.cleared',
                'group.updated',
                'group.join_request',
                'account.status.updated',
                'account.started',
                'account.auth.required',
                'account.auth.succeeded',
                'account.auth.failed',
            ],
        ],
        'WebhookEndpoint' => [
            'type' => 'object',
            'required' => [
                'id',
                'url',
                'status',
                'signing_enabled',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                ],
                'url' => [
                    'type' => 'string',
                    'format' => 'uri',
                ],
                'status' => [
                    'type' => 'string',
                ],
                'subscribed_events' => [
                    'type' => 'array',
                    'items' => [
                        '$ref' => '#/components/schemas/StandardEventType',
                    ],
                ],
                'signing_enabled' => [
                    'type' => 'boolean',
                ],
                'retry_policy' => [
                    '$ref' => '#/components/schemas/FreeFormObject',
                ],
            ],
        ],
        'WebhookEndpointRequest' => [
            'type' => 'object',
            'required' => [
                'url',
                'status',
            ],
            'properties' => [
                'url' => [
                    'type' => 'string',
                    'format' => 'uri',
                ],
                'status' => [
                    'type' => 'string',
                ],
                'subscribed_events' => [
                    'type' => 'array',
                    'items' => [
                        '$ref' => '#/components/schemas/StandardEventType',
                    ],
                    'description' => '为空或省略表示接收全部事件。',
                ],
                'signing_secret' => [
                    'type' => 'string',
                    'description' => '用于签名 webhook 投递的密钥；仅请求中提交，不会在响应中返回。',
                ],
                'retry_policy' => [
                    '$ref' => '#/components/schemas/FreeFormObject',
                ],
            ],
        ],
        'Workspace' => [
            'type' => 'object',
            'required' => [
                'name',
                'status',
                'account_quota',
                'account_quota_unlimited',
            ],
            'properties' => [
                'name' => [
                    'type' => 'string',
                ],
                'status' => [
                    'type' => 'string',
                ],
                'metadata' => [
                    'type' => 'object',
                    'additionalProperties' => [
                        'type' => 'string',
                    ],
                ],
                'account_quota' => [
                    'type' => 'integer',
                    'format' => 'uint64',
                ],
                'account_quota_unlimited' => [
                    'type' => 'boolean',
                ],
            ],
        ],
        'WorkspaceUpdateRequest' => [
            'type' => 'object',
            'required' => [
                'name',
                'status',
            ],
            'properties' => [
                'name' => [
                    'type' => 'string',
                ],
                'status' => [
                    'type' => 'string',
                ],
                'metadata' => [
                    'type' => 'object',
                    'additionalProperties' => [
                        'type' => 'string',
                    ],
                ],
            ],
        ],
    ];

    /** @return array<string, mixed> */
    public static function get(string $name): array
    {
        $schema = self::SCHEMAS[$name] ?? null;
        if (!is_array($schema)) {
            throw new UnifyPortConfigurationException('Unknown Device API schema');
        }

        return $schema;
    }

    /** @return array<string, array<string, mixed>> */
    public static function all(): array
    {
        return self::SCHEMAS;
    }
}
