<?php

/**
 * 此文件由 `composer generate` 根据 contracts/device.openapi.yaml 生成。
 * 生成边界用于保持 PHP SDK 与公开 Node SDK 同步；请修改来源，不要手工编辑。
 */

declare(strict_types=1);

namespace UnifyPort\Sdk\Generated;

use UnifyPort\Sdk\Exception\UnifyPortConfigurationException;

// 契约描述保持原文，生成常量不按软行长拆分字符串。
// phpcs:disable Generic.Files.LineLength.TooLong
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
                    'description' => '生成 API Key 时使用的前缀。省略时使用默认前缀；不接受 null。',
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
                'runtime_status',
            ],
            'examples' => [
                [
                    'id' => 'acc_xxx',
                    'name' => 'Customer Support',
                    'provider' => 'whatsapp',
                    'region' => 'sg',
                    'status' => 'active',
                    'runtime_status' => 'running',
                ],
            ],
            'properties' => [
                'billing' => [
                    '$ref' => '#/components/schemas/AccountBilling',
                ],
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
                    'description' => '账号选择的默认网络出口地区。',
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
                    'description' => '渠道侧账号公开标识。',
                ],
                'proxy' => [
                    '$ref' => '#/components/schemas/FreeFormObject',
                    'description' => '客户显式配置的代理；不返回平台默认出口凭据。',
                ],
                'provider_profile' => [
                    '$ref' => '#/components/schemas/ProviderProfile',
                ],
            ],
            'allOf' => [
                [
                    'if' => [
                        'properties' => [
                            'provider' => [
                                'not' => [
                                    'const' => 'whatsapp',
                                ],
                            ],
                        ],
                    ],
                    'then' => [
                        'properties' => [
                            'provider_profile' => [
                                'properties' => [
                                    'device_id' => false,
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'AccountBilling' => [
            'type' => 'object',
            'additionalProperties' => false,
            'properties' => [
                'period_start_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                ],
                'period_end_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                ],
                'amount_minor' => [
                    'type' => 'integer',
                    'format' => 'int64',
                    'minimum' => 1,
                ],
                'currency' => [
                    'const' => 'USD',
                    'type' => 'string',
                ],
                'operation_id' => [
                    'type' => 'string',
                ],
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'ACTIVE',
                        'DELETING',
                        'DELETED',
                        'COMPENSATED',
                        'REVIEW',
                    ],
                ],
            ],
            'required' => [
                'period_start_at',
                'period_end_at',
                'amount_minor',
                'currency',
                'operation_id',
                'state',
            ],
            'description' => '独立的资金业务状态，不与 runtime_status 混用；周期时间按 RFC 3339 UTC Z 返回。',
        ],
        'AccountCreateRequest' => [
            'type' => 'object',
            'description' => '创建账号请求。`whatsapp-protocol` 凭证只能提交到 `/v1/accounts/{account_id}/auth/session` 的嵌套 `whatsapp-protocol` 对象；不能通过 provider_data 提交。`whatsapp-protocol` 账号不能在该 provider 与其他 provider 之间切换。',
            'required' => [
                'provider',
                'region',
                'auth_mode',
            ],
            'properties' => [
                'name' => [
                    'type' => 'string',
                ],
                'provider' => [
                    '$ref' => '#/components/schemas/ProviderInputName',
                ],
                'region' => [
                    'type' => 'string',
                    'minLength' => 1,
                ],
                'status' => [
                    'type' => 'string',
                ],
                'runtime_status' => [
                    '$ref' => '#/components/schemas/RuntimeStatus',
                ],
                'auth_mode' => [
                    'type' => 'string',
                    'enum' => [
                        'qrcode',
                        'code',
                        'session',
                    ],
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
                    'description' => 'TikTok 可设置 `provider_data.enable_comment` 为 Boolean，默认 false；字符串、数字、null 均返回 400 invalid_request。 在线修改后需 reconnect 生效，start 成功不证明配置已应用；关闭不撤回已排队事件。 渠道扩展配置。创建 Telegram 账号时，`provider_data.api_id` 和 `provider_data.api_hash` 均为可选，适用于 `auth_mode=code`、`qrcode` 和 `session`；未指定自定义应用凭证时使用平台默认 Telegram 应用凭证。 使用自定义应用凭证时，请成对提供同一 Telegram 应用的 `api_id` 和 `api_hash`，两者均使用字符串。 需要使用平台默认凭证但默认配置不可用时，创建请求失败；平台调整默认凭证不会自动替换已有账号凭证。',
                ],
                'proxy' => [
                    '$ref' => '#/components/schemas/FreeFormObject',
                ],
            ],
        ],
        'AccountListResult' => [
            'type' => 'object',
            'required' => [
                'items',
                'has_more',
            ],
            'properties' => [
                'items' => [
                    'type' => 'array',
                    'items' => [
                        '$ref' => '#/components/schemas/Account',
                    ],
                ],
                'has_more' => [
                    'type' => 'boolean',
                    'description' => '是否还有下一页。',
                ],
                'next_cursor' => [
                    'type' => 'string',
                    'description' => '下一页的不透明游标，仅在 has_more=true 时返回；续页时原样传入 cursor。',
                ],
            ],
        ],
        'AccountOperation' => [
            'type' => 'object',
            'additionalProperties' => false,
            'properties' => [
                'operation_id' => [
                    'type' => 'string',
                ],
                'kind' => [
                    'type' => 'string',
                    'enum' => [
                        'QUOTE',
                        'CREATE',
                        'DELETE',
                        'COMPENSATE',
                    ],
                ],
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'QUOTED',
                        'CONSUMED',
                        'EXPIRED',
                        'PENDING',
                        'PROCESSING',
                        'SUCCEEDED',
                        'FAILED',
                        'REVIEW',
                    ],
                ],
                'account_id' => [
                    'type' => 'string',
                ],
                'last_error_code' => [
                    'type' => 'string',
                ],
            ],
            'required' => [
                'operation_id',
                'kind',
                'state',
            ],
            'description' => 'Safe public business operation result.',
        ],
        'AccountProfileUpdatedWebhookEvent' => [
            'type' => 'object',
            'required' => [
                'id',
                'type',
                'provider',
                'account_id',
                'occurred_at',
                'data',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'description' => '用于幂等处理的事件 ID。',
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'account.profile.updated',
                    ],
                ],
                'provider' => [
                    '$ref' => '#/components/schemas/ProviderName',
                ],
                'account_id' => [
                    'type' => 'string',
                    'description' => 'device-api 签发的账号 public_id。',
                ],
                'occurred_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                ],
                'data' => [
                    'type' => 'object',
                    'required' => [
                        'profile',
                        'event',
                    ],
                    'properties' => [
                        'account' => [
                            'type' => 'object',
                            'description' => '渠道账号引用；渠道无法提供引用时可以省略该对象。',
                            'properties' => [
                                'provider_account_ref' => [
                                    'type' => 'string',
                                    'description' => '渠道侧账号标识；无法提供时可以省略。',
                                ],
                            ],
                        ],
                        'profile' => [
                            'type' => 'object',
                            'required' => [
                                'display_name',
                                'push_name',
                                'avatar_url',
                            ],
                            'properties' => [
                                'display_name' => [
                                    'type' => 'string',
                                    'description' => '按 BusinessName 优先、PushName 回退规则生成的展示名称。',
                                ],
                                'push_name' => [
                                    'type' => 'string',
                                    'description' => '消费时从 Provider 查询到的 WhatsApp 当前 PushName。',
                                ],
                                'business_name' => [
                                    'type' => 'string',
                                    'description' => 'WhatsApp BusinessName；渠道未返回时省略。',
                                ],
                                'avatar_url' => [
                                    'type' => 'string',
                                    'description' => '账号当前头像 URL；确认没有可用头像时返回空字符串。',
                                ],
                            ],
                        ],
                        'event' => [
                            'type' => 'object',
                            'required' => [
                                'kind',
                                'source',
                            ],
                            'properties' => [
                                'kind' => [
                                    'type' => 'string',
                                    'enum' => [
                                        'account_profile_updated',
                                    ],
                                ],
                                'source' => [
                                    'type' => 'string',
                                    'enum' => [
                                        'full_sync',
                                        'self_rename',
                                        'avatar_change',
                                    ],
                                    'description' => '`full_sync` 表示全量同步完成后的快照；`self_rename` 表示当前账号主动改名；`avatar_change` 表示账号头像变化。',
                                ],
                                'changed_fields' => [
                                    'type' => 'array',
                                    'description' => '本次相对已保存账号资料实际变化的公开字段；兼容旧事件，字段可以省略。',
                                    'items' => [
                                        'type' => 'string',
                                        'enum' => [
                                            'display_name',
                                            'push_name',
                                            'business_name',
                                            'avatar_url',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
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
                    'description' => '授权流程状态，例如 `pending_auth`、`awaiting_qr_scan`、`awaiting_code`、`pending`、`passkey_required`、 `passkey_pending`、`passkey_confirmation`、`passkey_confirmation_sent`、 `authorized`、`failed`。',
                ],
                'auth_fields' => [
                    'type' => 'array',
                    'items' => [
                        '$ref' => '#/components/schemas/AuthField',
                    ],
                ],
                'auth_payload' => [
                    'description' => '当前授权步骤所需的渠道载荷。Passkey 流程可能返回 `type=passkey` 和 `public_key`，或返回 `type=passkey_confirmation` 及确认提示字段。',
                    'allOf' => [
                        [
                            '$ref' => '#/components/schemas/FreeFormObject',
                        ],
                    ],
                ],
                'expires_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                ],
                'last_error' => [
                    'type' => 'string',
                ],
            ],
        ],
        'AccountStartedWebhookEvent' => [
            'type' => 'object',
            'required' => [
                'id',
                'type',
                'provider',
                'account_id',
                'occurred_at',
                'data',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'description' => '用于幂等处理的事件 ID。',
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'account.started',
                    ],
                ],
                'provider' => [
                    '$ref' => '#/components/schemas/ProviderName',
                ],
                'account_id' => [
                    'type' => 'string',
                    'description' => 'device-api 签发的账号 public_id。',
                ],
                'occurred_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                ],
                'data' => [
                    'type' => 'object',
                    'required' => [
                        'runtime_status',
                        'event',
                    ],
                    'properties' => [
                        'runtime_status' => [
                            'type' => 'string',
                            'enum' => [
                                'running',
                            ],
                        ],
                        'event' => [
                            'type' => 'object',
                            'required' => [
                                'kind',
                                'runtime_status',
                            ],
                            'properties' => [
                                'kind' => [
                                    'type' => 'string',
                                    'enum' => [
                                        'account_started',
                                    ],
                                ],
                                'runtime_status' => [
                                    'type' => 'string',
                                    'enum' => [
                                        'running',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'AccountUpdateRequest' => [
            'type' => 'object',
            'description' => 'PATCH 部分更新；字段省略时保留原值，显式 null 不合法，空数组或空对象表示清空对应集合。 实际改变 auth_mode 必须仅提交 auth_mode，不能混入其他字段或未知字段。 目标模式必须为该渠道支持的方式；相同模式保留原授权。Telegram、WhatsApp 实际切换会清除旧会话，包括已授权会话；成功后须重新授权。 `whatsapp-protocol` 凭证只能提交到 `/v1/accounts/{account_id}/auth/session` 的嵌套 `whatsapp-protocol` 对象，不能通过 provider_data 提交；不能在 whatsapp-protocol 与其他 provider 之间切换。',
            'properties' => [
                'name' => [
                    'type' => 'string',
                ],
                'provider' => [
                    '$ref' => '#/components/schemas/ProviderInputName',
                ],
                'region' => [
                    'type' => 'string',
                    'minLength' => 1,
                ],
                'status' => [
                    'type' => 'string',
                ],
                'runtime_status' => [
                    '$ref' => '#/components/schemas/RuntimeStatus',
                ],
                'auth_mode' => [
                    'type' => 'string',
                    'enum' => [
                        'qrcode',
                        'code',
                        'session',
                    ],
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
                    'description' => '渠道扩展配置；省略整个 `provider_data` 时保留原配置。 TikTok 的 `enable_comment` 仅接受 Boolean，未配置为 false；在线修改后需 reconnect 生效，关闭不撤回已排队事件。 Telegram 的 `provider_data.api_id` 和 `provider_data.api_hash` 均为可选； 更新自定义应用凭证时，请成对提供同一 Telegram 应用的两个字段，均使用字符串。 非空配置替换中的缺省凭证字段使用平台默认值；默认配置不可用时，该更新请求失败。 显式空对象表示清空，不补充默认凭证。',
                ],
                'proxy' => [
                    '$ref' => '#/components/schemas/FreeFormObject',
                    'description' => '自定义代理优先；清空后恢复账号创建时的默认配置。旧账号沿用原清空行为。',
                ],
            ],
        ],
        'AccountWebhookError' => [
            'type' => 'object',
            'required' => [
                'code',
                'numeric_code',
                'message',
            ],
            'description' => '账号事件中的失败原因，不代表回调 HTTP 投递失败。account_auth_failed / 20100：授权失败，具体原因未确定；按现有授权失败流程处理，不推断具体原因。 account_logged_out / 20101：当前登录态已失效；引导重新授权。 account_restricted / 20102：当前账号登录受限，不代表已确认封禁；到官方 WhatsApp 客户端检查并处理，恢复正常后再重新授权。',
            'properties' => [
                'code' => [
                    'type' => 'string',
                    'enum' => [
                        'account_auth_failed',
                        'account_logged_out',
                        'account_restricted',
                    ],
                    'description' => '稳定的机器可读失败分类。',
                ],
                'numeric_code' => [
                    'type' => 'string',
                    'pattern' => '^[1-9][0-9]{4}$',
                    'enum' => [
                        '20100',
                        '20101',
                        '20102',
                    ],
                    'description' => '与 code 对应的五位数字字符串，不作为数值计算。',
                ],
                'message' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'description' => '平台维护的英文说明，可以调整文案，不用于客户端分支。',
                ],
            ],
        ],
        'ActiveCallData' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'call_id',
                'state',
                'direction',
                'media_type',
            ],
            'properties' => [
                'call_id' => [
                    'type' => 'string',
                    'maxLength' => 128,
                ],
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'preparing',
                        'dialing',
                        'ringing',
                        'connecting',
                        'active',
                    ],
                ],
                'direction' => [
                    'type' => 'string',
                    'enum' => [
                        'inbound',
                        'outbound',
                    ],
                ],
                'media_type' => [
                    'type' => 'string',
                    'enum' => [
                        'voice',
                        'video',
                    ],
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
        'CallAnsweredWebhookEvent' => [
            'type' => 'object',
            'description' => '仅内测工作区订阅匹配时投递，`*`、空数组或省略订阅均可匹配，具体事件列表须包含 call.answered；每次投递及重试重新核验资格，与 message.* 通话记录独立。呼入暂未开放。',
            'required' => [
                'id',
                'type',
                'provider',
                'account_id',
                'occurred_at',
                'data',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'description' => '用于幂等处理的事件 ID。',
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'call.answered',
                    ],
                ],
                'provider' => [
                    '$ref' => '#/components/schemas/ProviderName',
                ],
                'account_id' => [
                    'type' => 'string',
                ],
                'occurred_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                ],
                'data' => [
                    'type' => 'object',
                    'required' => [
                        'sender',
                        'call',
                    ],
                    'properties' => [
                        'sender' => [
                            '$ref' => '#/components/schemas/CallEventSender',
                        ],
                        'call' => [
                            '$ref' => '#/components/schemas/CallEventCall',
                        ],
                    ],
                ],
            ],
        ],
        'CallEndedWebhookEvent' => [
            'type' => 'object',
            'required' => [
                'id',
                'type',
                'provider',
                'account_id',
                'occurred_at',
                'data',
            ],
            'description' => '仅内测工作区订阅匹配时投递，`*`、空数组或省略订阅均可匹配，具体事件列表须包含 call.ended；每次投递及重试重新核验资格，与 message.* 通话记录独立。呼入暂未开放。外呼在尚无对端标识时结束，省略 data.sender；来电结束仍必须提供 sender，提供时必须包含真实 id。',
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'description' => '用于幂等处理的事件 ID。',
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'call.ended',
                    ],
                ],
                'provider' => [
                    '$ref' => '#/components/schemas/ProviderName',
                ],
                'account_id' => [
                    'type' => 'string',
                ],
                'occurred_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                ],
                'data' => [
                    'type' => 'object',
                    'required' => [
                        'call',
                        'reason',
                        'duration_seconds',
                    ],
                    'allOf' => [
                        [
                            'if' => [
                                'properties' => [
                                    'call' => [
                                        'properties' => [
                                            'direction' => [
                                                'const' => 'inbound',
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                            'then' => [
                                'required' => [
                                    'sender',
                                ],
                            ],
                        ],
                    ],
                    'properties' => [
                        'sender' => [
                            '$ref' => '#/components/schemas/CallEventSender',
                        ],
                        'call' => [
                            '$ref' => '#/components/schemas/CallEventCall',
                        ],
                        'reason' => [
                            'type' => 'string',
                            'enum' => [
                                'declined',
                                'caller_cancelled',
                                'local_hangup',
                                'remote_hangup',
                                'answer_failed',
                                'provider_disconnected',
                                'media_failed',
                                'expired',
                                'remote_busy',
                                'no_answer',
                                'dial_failed',
                            ],
                        ],
                        'duration_seconds' => [
                            'type' => 'integer',
                            'minimum' => 0,
                        ],
                    ],
                ],
            ],
        ],
        'CallEventCall' => [
            'type' => 'object',
            'required' => [
                'id',
                'direction',
                'media_type',
                'state',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'description' => 'UnifyPort 本次通话 ID，同一通话生命周期内保持不变。',
                ],
                'direction' => [
                    'type' => 'string',
                    'enum' => [
                        'inbound',
                        'outbound',
                    ],
                ],
                'media_type' => [
                    'type' => 'string',
                    'enum' => [
                        'voice',
                        'video',
                    ],
                ],
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'ringing',
                        'active',
                        'ended',
                    ],
                ],
            ],
        ],
        'CallEventSender' => [
            'type' => 'object',
            'required' => [
                'id',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'description' => 'WhatsApp 对端标识；外呼事件中表示被呼叫方。',
                ],
                'display_name' => [
                    'type' => 'string',
                    'description' => '可用时返回对端展示名称。',
                ],
            ],
        ],
        'CallIncomingWebhookEvent' => [
            'type' => 'object',
            'description' => '来电事件，携带短期浏览器接听链接；仅内测工作区订阅匹配时投递，`*`、空数组或省略订阅均可匹配，具体事件列表须包含 call.incoming。与 message.* 通话记录独立。呼入暂未开放，内测资格不会自动开启呼入；投递及重试时重新核验资格。',
            'required' => [
                'id',
                'type',
                'provider',
                'account_id',
                'occurred_at',
                'data',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'description' => '用于幂等处理的事件 ID。',
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'call.incoming',
                    ],
                ],
                'provider' => [
                    '$ref' => '#/components/schemas/ProviderName',
                ],
                'account_id' => [
                    'type' => 'string',
                ],
                'occurred_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                ],
                'data' => [
                    'type' => 'object',
                    'required' => [
                        'sender',
                        'call',
                        'join_url',
                    ],
                    'properties' => [
                        'sender' => [
                            '$ref' => '#/components/schemas/CallEventSender',
                        ],
                        'call' => [
                            'allOf' => [
                                [
                                    '$ref' => '#/components/schemas/CallEventCall',
                                ],
                                [
                                    'type' => 'object',
                                    'properties' => [
                                        'direction' => [
                                            'const' => 'inbound',
                                        ],
                                        'state' => [
                                            'const' => 'ringing',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                        'join_url' => [
                            'type' => 'string',
                            'format' => 'uri',
                            'description' => '短期、一次性的 HTTPS 浏览器接听链接。',
                        ],
                    ],
                ],
            ],
        ],
        'CallMessage' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'id',
                'type',
                'call',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'description' => '通话消息记录 ID；邀请、接听和结束保持一致，仅用于记录关联，不代表支持原生消息操作。',
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'call',
                    ],
                ],
                'direction' => [
                    'type' => 'string',
                    'enum' => [
                        'inbound',
                        'outbound',
                    ],
                    'description' => '相对于接入账号的发起方向；首期邀请为 inbound，接听和结束通知省略。',
                ],
                'sent_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                    'description' => '可确认的邀请发生时间；缺失时省略，接听和结束通知不提供此字段。',
                ],
                'call' => [
                    '$ref' => '#/components/schemas/CallMessageCall',
                ],
            ],
        ],
        'CallMessageCall' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'id',
                'status',
            ],
            'not' => [
                'required' => [
                    'end_reason',
                    'ended_by',
                ],
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'description' => '同一次通话保持一致的不透明通话 ID；按 provider 与 account_id 隔离。',
                ],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'offered',
                        'accepted',
                        'ended',
                    ],
                    'description' => 'offered 表示收到邀请，accepted 表示收到接听确认，ended 表示呼叫尝试或通话结束；均不承诺媒体连接已建立。',
                ],
                'accepted_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                    'description' => '仅接听更新可有，可靠的接听确认时间；未知时省略，业务方在结束后仍应保留已有值。',
                ],
                'media_type' => [
                    'type' => 'string',
                    'enum' => [
                        'audio',
                        'video',
                    ],
                    'description' => 'audio 为语音，video 为视频；未知时省略，省略不清空原记录。',
                ],
                'end_reason' => [
                    'type' => 'string',
                    'enum' => [
                        'timeout',
                        'rejected_elsewhere',
                    ],
                    'description' => '仅 ended 可有；timeout 表示超时，rejected_elsewhere 表示其他端拒接，不确认具体设备或执行方。未知时省略，不抹去已有接听事实，不能单独证明从未接听。',
                ],
                'ended_by' => [
                    'type' => 'string',
                    'enum' => [
                        'remote',
                    ],
                    'description' => '仅明确确认对方结束时可有 remote，无法确认时省略；提供 end_reason 时不提供此字段。它不代表我方未接听，也不表示原消息的发起方向。',
                ],
            ],
        ],
        'CallMessageReceivedWebhookEvent' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/CallMessageWebhookEvent',
                ],
                [
                    'type' => 'object',
                    'properties' => [
                        'type' => [
                            'enum' => [
                                'message.received',
                            ],
                        ],
                        'data' => [
                            'properties' => [
                                'message' => [
                                    'required' => [
                                        'direction',
                                    ],
                                    'properties' => [
                                        'direction' => [
                                            'enum' => [
                                                'inbound',
                                            ],
                                        ],
                                        'call' => [
                                            'properties' => [
                                                'status' => [
                                                    'enum' => [
                                                        'offered',
                                                    ],
                                                ],
                                            ],
                                            'not' => [
                                                'anyOf' => [
                                                    [
                                                        'required' => [
                                                            'ended_by',
                                                        ],
                                                    ],
                                                    [
                                                        'required' => [
                                                            'accepted_at',
                                                        ],
                                                    ],
                                                    [
                                                        'required' => [
                                                            'end_reason',
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'CallMessageUpdatedWebhookEvent' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/CallMessageWebhookEvent',
                ],
                [
                    'type' => 'object',
                    'properties' => [
                        'type' => [
                            'enum' => [
                                'message.updated',
                            ],
                        ],
                        'data' => [
                            'properties' => [
                                'message' => [
                                    'not' => [
                                        'anyOf' => [
                                            [
                                                'required' => [
                                                    'direction',
                                                ],
                                            ],
                                            [
                                                'required' => [
                                                    'sent_at',
                                                ],
                                            ],
                                        ],
                                    ],
                                    'properties' => [
                                        'call' => [
                                            'oneOf' => [
                                                [
                                                    'properties' => [
                                                        'status' => [
                                                            'enum' => [
                                                                'accepted',
                                                            ],
                                                        ],
                                                    ],
                                                    'not' => [
                                                        'anyOf' => [
                                                            [
                                                                'required' => [
                                                                    'ended_by',
                                                                ],
                                                            ],
                                                            [
                                                                'required' => [
                                                                    'end_reason',
                                                                ],
                                                            ],
                                                        ],
                                                    ],
                                                ],
                                                [
                                                    'properties' => [
                                                        'status' => [
                                                            'enum' => [
                                                                'ended',
                                                            ],
                                                        ],
                                                    ],
                                                    'not' => [
                                                        'required' => [
                                                            'accepted_at',
                                                        ],
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'CallMessageWebhookEvent' => [
            'type' => 'object',
            'required' => [
                'id',
                'type',
                'provider',
                'account_id',
                'occurred_at',
                'data',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'description' => '事件幂等键；同一阶段重复投递保持一致，邀请、接听与结束使用不同事件 ID。',
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'message.received',
                        'message.updated',
                    ],
                ],
                'provider' => [
                    'type' => 'string',
                    'enum' => [
                        'whatsapp',
                    ],
                    'description' => '首期仅支持 WhatsApp 单聊通话消息。',
                ],
                'account_id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'description' => 'Device API 签发的账号 public_id。',
                ],
                'occurred_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                    'description' => '本次邀请、接听或结束的发生时间；无法确认时使用接收时间，重试保持不变，但接收时间不会用于填充 accepted_at。',
                ],
                'data' => [
                    'type' => 'object',
                    'required' => [
                        'message',
                    ],
                    'properties' => [
                        'message' => [
                            '$ref' => '#/components/schemas/CallMessage',
                        ],
                        'conversation' => [
                            'type' => 'object',
                            'required' => [
                                'id',
                                'type',
                            ],
                            'properties' => [
                                'id' => [
                                    'type' => 'string',
                                    'minLength' => 1,
                                    'description' => '对端 WhatsApp LID；无法确认会话时整个对象省略。',
                                ],
                                'type' => [
                                    'type' => 'string',
                                    'enum' => [
                                        'user',
                                    ],
                                ],
                            ],
                        ],
                        'sender' => [
                            'type' => 'object',
                            'required' => [
                                'id',
                            ],
                            'properties' => [
                                'id' => [
                                    'type' => 'string',
                                    'minLength' => 1,
                                    'description' => '原始通话发起者的 WhatsApp LID；邀请、接听和结束均可提供，不表示接听或结束通知的执行者。',
                                ],
                                'type' => [
                                    'type' => 'string',
                                    'enum' => [
                                        'user',
                                    ],
                                ],
                            ],
                        ],
                        'account' => [
                            'type' => 'object',
                            'properties' => [
                                'provider_account_ref' => [
                                    'type' => 'string',
                                    'description' => '渠道侧接入账号引用，无法提供时省略。',
                                ],
                            ],
                        ],
                        'event' => [
                            'type' => 'object',
                            'properties' => [
                                'kind' => [
                                    'type' => 'string',
                                    'enum' => [
                                        'message_received',
                                        'message_updated',
                                    ],
                                    'description' => '既有消息事件辅助信息；通话识别和状态以 message.type 与 message.call 为准。',
                                ],
                            ],
                        ],
                    ],
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
                    'description' => '联系人标识。',
                ],
                'conversation_id' => [
                    'type' => 'string',
                    'description' => '用于发送消息或定位会话的标识，请按不透明字符串保存和使用。',
                ],
                'display_name' => [
                    'type' => 'string',
                ],
                'avatar_url' => [
                    'type' => 'string',
                ],
                'provider_user_id' => [
                    'type' => 'string',
                    'description' => '渠道用户标识，请按不透明字符串保存和使用。',
                ],
                'is_blocked' => [
                    'type' => 'boolean',
                ],
                'extra' => [
                    '$ref' => '#/components/schemas/ContactExtra',
                ],
            ],
        ],
        'ContactAddressBook' => [
            'type' => 'object',
            'additionalProperties' => false,
            'minProperties' => 1,
            'description' => '本次提供的通讯录保存名；仅更新出现的字段，空字符串表示明确清空，缺省表示保持原值，null 非法。不要覆盖对方昵称。',
            'properties' => [
                'full_name' => [
                    'type' => 'string',
                    'description' => '通讯录保存全名；允许空字符串表示清空。',
                ],
                'first_name' => [
                    'type' => 'string',
                    'description' => '通讯录保存名字；允许空字符串表示清空。',
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
                    'minLength' => 1,
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
        'ContactCreateRequest' => [
            'type' => 'object',
            'additionalProperties' => false,
            'anyOf' => [
                [
                    'required' => [
                        'phone_number',
                    ],
                ],
                [
                    'required' => [
                        'username',
                    ],
                ],
            ],
            'properties' => [
                'phone_number' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'description' => '包含国家或地区代码的纯数字电话号码，不包含加号、空格或分隔符。',
                    'example' => '8613800000000',
                ],
                'username' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'description' => '渠道用户名，格式要求以目标渠道为准。',
                    'example' => 'alice',
                ],
                'whatsapp_options' => [
                    '$ref' => '#/components/schemas/WhatsAppContactCreateOptions',
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
        'ContactExtra' => [
            'type' => 'object',
            'additionalProperties' => true,
            'description' => '渠道联系人扩展资料；字段仅在 Provider 返回可靠值时出现。',
            'properties' => [
                'phone' => [
                    'type' => 'string',
                    'description' => 'WhatsApp phone JID 中解析出的纯手机号。',
                ],
                'first_name' => [
                    'type' => 'string',
                    'description' => '当前账号通讯录中保存的联系人简称或名字部分。',
                ],
                'full_name' => [
                    'type' => 'string',
                    'description' => '当前账号通讯录中保存的完整联系人名称。',
                ],
                'push_name' => [
                    'type' => 'string',
                    'description' => '联系人自行在 WhatsApp 设置的个人名称。',
                ],
                'username' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'description' => 'WhatsApp 联系人的用户名（provider=whatsapp），与个人名称 push_name 独立。列表和详情仅在已获取到非空用户名时返回；缺失表示当前未知，不代表对方未设置，也不应据此清空已保存的用户名。',
                    'example' => 'alice_handle',
                ],
                'business_name' => [
                    'type' => 'string',
                    'description' => 'WhatsApp Business 账号的商业或认证名称。',
                ],
                'redacted_phone' => [
                    'type' => 'string',
                    'description' => 'Provider 仅返回部分号码时的遮蔽手机号。',
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
                    'description' => '渠道侧联系人标识。WhatsApp 封锁和解封操作必须传 LID，格式为 `数字@lid`。',
                    'example' => '123456789012345@lid',
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
        'ContactMembership' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'contact_id',
                'is_in_contacts',
            ],
            'properties' => [
                'contact_id' => [
                    'type' => 'string',
                    'description' => '查询请求中的联系人标识。',
                ],
                'is_in_contacts' => [
                    'type' => 'boolean',
                    'description' => '是否存在于目标账号的渠道联系人列表中。',
                ],
            ],
        ],
        'ContactMessagePayload' => [
            'type' => 'object',
            'required' => [
                'type',
                'contacts',
            ],
            'properties' => [
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'contact',
                    ],
                ],
                'contacts' => [
                    'type' => 'array',
                    'minItems' => 1,
                    'items' => [
                        '$ref' => '#/components/schemas/ContactCard',
                    ],
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
        'ContactUpdateChange' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'kind',
                'source',
                'changed_fields',
            ],
            'properties' => [
                'kind' => [
                    'type' => 'string',
                    'enum' => [
                        'contact_updated',
                    ],
                ],
                'source' => [
                    'type' => 'string',
                    'enum' => [
                        'address_book',
                        'full_sync',
                    ],
                    'description' => 'address_book 表示通讯录更新；full_sync 表示收到的同步快照，不表示刚刚手动改名，也不保证完整通讯录或同步完成通知。',
                ],
                'changed_fields' => [
                    'type' => 'array',
                    'minItems' => 1,
                    'maxItems' => 2,
                    'uniqueItems' => true,
                    'description' => '与本次 address_book 中出现的字段精确对应，顺序无含义；表示提供的更新字段，不证明服务端已比较旧值。',
                    'items' => [
                        'type' => 'string',
                        'enum' => [
                            'address_book.full_name',
                            'address_book.first_name',
                        ],
                    ],
                ],
                'changed_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                    'description' => '可靠的名称变更时间，以 RFC3339 UTC 表示并保留精度；未知时省略，不用 occurred_at 补齐。',
                ],
            ],
        ],
        'ContactUpdateReference' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'id',
                'address_book',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '对应渠道及账号范围内的联系人不透明资源 ID，可关联联系人列表中同 ID 的资源；不保证可直接用于会话或详情查询。WhatsApp 详情可能返回映射后的不同 PN 资源 ID，不能据此自动替换事件资源键或合并不同 PN/LID 记录。',
                ],
                'conversation_id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '已可靠关联的会话 ID，未知时省略。WhatsApp 的详情查询使用此处已确认的 LID；不能从 contact.id 推算。',
                ],
                'address_book' => [
                    '$ref' => '#/components/schemas/ContactAddressBook',
                ],
            ],
        ],
        'ContactUpdatedData' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'contact',
                'event',
            ],
            'properties' => [
                'account' => [
                    '$ref' => '#/components/schemas/ConversationStateAccount',
                ],
                'contact' => [
                    '$ref' => '#/components/schemas/ContactUpdateReference',
                ],
                'event' => [
                    '$ref' => '#/components/schemas/ContactUpdateChange',
                ],
            ],
            'allOf' => [
                [
                    'if' => [
                        'type' => 'object',
                        'additionalProperties' => true,
                        'properties' => [
                            'contact' => [
                                'type' => 'object',
                                'additionalProperties' => true,
                                'properties' => [
                                    'address_book' => [
                                        'type' => 'object',
                                        'additionalProperties' => true,
                                        'required' => [
                                            'full_name',
                                        ],
                                        'properties' => [
                                            'full_name' => [
                                                'type' => 'string',
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'then' => [
                        'type' => 'object',
                        'additionalProperties' => true,
                        'properties' => [
                            'event' => [
                                'type' => 'object',
                                'additionalProperties' => true,
                                'properties' => [
                                    'changed_fields' => [
                                        'type' => 'array',
                                        'contains' => [
                                            'const' => 'address_book.full_name',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'else' => [
                        'type' => 'object',
                        'additionalProperties' => true,
                        'properties' => [
                            'event' => [
                                'type' => 'object',
                                'additionalProperties' => true,
                                'properties' => [
                                    'changed_fields' => [
                                        'type' => 'array',
                                        'not' => [
                                            'contains' => [
                                                'const' => 'address_book.full_name',
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'if' => [
                        'type' => 'object',
                        'additionalProperties' => true,
                        'properties' => [
                            'contact' => [
                                'type' => 'object',
                                'additionalProperties' => true,
                                'properties' => [
                                    'address_book' => [
                                        'type' => 'object',
                                        'additionalProperties' => true,
                                        'required' => [
                                            'first_name',
                                        ],
                                        'properties' => [
                                            'first_name' => [
                                                'type' => 'string',
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'then' => [
                        'type' => 'object',
                        'additionalProperties' => true,
                        'properties' => [
                            'event' => [
                                'type' => 'object',
                                'additionalProperties' => true,
                                'properties' => [
                                    'changed_fields' => [
                                        'type' => 'array',
                                        'contains' => [
                                            'const' => 'address_book.first_name',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'else' => [
                        'type' => 'object',
                        'additionalProperties' => true,
                        'properties' => [
                            'event' => [
                                'type' => 'object',
                                'additionalProperties' => true,
                                'properties' => [
                                    'changed_fields' => [
                                        'type' => 'array',
                                        'not' => [
                                            'contains' => [
                                                'const' => 'address_book.first_name',
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'ContactUpdatedWebhookEvent' => [
            'type' => 'object',
            'additionalProperties' => true,
            'required' => [
                'id',
                'type',
                'provider',
                'account_id',
                'occurred_at',
                'data',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '事件幂等键；同值更新也可能来自不同事件，不保证跨来源仅通知一次。',
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'contact.updated',
                    ],
                ],
                'provider' => [
                    '$ref' => '#/components/schemas/ProviderName',
                ],
                'account_id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                ],
                'occurred_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                    'description' => '事件发生时间，未知时可为接收时间；不保证为可靠名称变更时间，不能代替 changed_at 排序。',
                ],
                'data' => [
                    '$ref' => '#/components/schemas/ContactUpdatedData',
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
                    'type' => 'object',
                    'additionalProperties' => true,
                    'description' => '渠道扩展字段；WhatsApp 群会话可包含公告群分类，会话列表不保证提供该分类。',
                    'properties' => [
                        'is_announcement_group' => [
                            'type' => 'boolean',
                            'description' => '仅 WhatsApp 群会话提供。true 表示已确认是社群公告群，false 表示本次资料已确认不符合公告群条件；缺失表示未知，不返回 null。分类不表示当前账号具备发送权限。',
                            'example' => false,
                        ],
                    ],
                ],
            ],
        ],
        'ConversationDisappearingMessagesChange' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'kind',
                'change_type',
            ],
            'properties' => [
                'kind' => [
                    'type' => 'string',
                    'enum' => [
                        'conversation_updated',
                    ],
                ],
                'change_type' => [
                    'type' => 'string',
                    'enum' => [
                        'disappearing_messages',
                    ],
                ],
                'changed_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                    'description' => '已知的可靠设置变更时间，以 RFC3339 UTC 表示并保留精度；未知时省略，不用 occurred_at 补齐。',
                ],
            ],
        ],
        'ConversationDisappearingMessagesState' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'enabled',
                'duration_seconds',
            ],
            'description' => '本次完整限时消息设置快照；整体替换旧设置，缺失对象不表示关闭，不改变会话其他字段。',
            'properties' => [
                'enabled' => [
                    'type' => 'boolean',
                    'description' => 'true 表示开启，false 表示关闭；不能由缺失值推测关闭。',
                ],
                'duration_seconds' => [
                    'type' => 'integer',
                    'minimum' => 0,
                    'maximum' => 9007199254740991,
                    'description' => '开启时为正秒数，关闭时明确为 0；不表示每条消息的剩余时间。',
                ],
            ],
            'allOf' => [
                [
                    'if' => [
                        'type' => 'object',
                        'additionalProperties' => true,
                        'required' => [
                            'enabled',
                        ],
                        'properties' => [
                            'enabled' => [
                                'const' => false,
                            ],
                        ],
                    ],
                    'then' => [
                        'type' => 'object',
                        'additionalProperties' => true,
                        'properties' => [
                            'duration_seconds' => [
                                'const' => 0,
                            ],
                        ],
                    ],
                    'else' => [
                        'type' => 'object',
                        'additionalProperties' => true,
                        'properties' => [
                            'duration_seconds' => [
                                'minimum' => 1,
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'ConversationDisappearingMessagesUpdatedWebhookEvent' => [
            'type' => 'object',
            'additionalProperties' => true,
            'required' => [
                'id',
                'type',
                'provider',
                'account_id',
                'occurred_at',
                'data',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '事件幂等键；不同事件可能提供同值设置快照，不保证跨来源只通知一次。',
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'conversation.updated',
                    ],
                ],
                'provider' => [
                    '$ref' => '#/components/schemas/ProviderName',
                ],
                'account_id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                ],
                'occurred_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                    'description' => '事件发生时间，未知时可为接收时间；不保证是可靠设置变更时间，不能代替 changed_at 判断新旧。',
                ],
                'data' => [
                    'type' => 'object',
                    'additionalProperties' => false,
                    'required' => [
                        'conversation',
                        'disappearing_messages',
                        'event',
                    ],
                    'properties' => [
                        'account' => [
                            '$ref' => '#/components/schemas/ConversationStateAccount',
                        ],
                        'conversation' => [
                            '$ref' => '#/components/schemas/ConversationStateReference',
                        ],
                        'disappearing_messages' => [
                            '$ref' => '#/components/schemas/ConversationDisappearingMessagesState',
                        ],
                        'actor' => [
                            '$ref' => '#/components/schemas/ConversationStateActor',
                            'description' => '执行本次设置变更的人，未知时省略；不生成消息作者或方向。',
                        ],
                        'event' => [
                            '$ref' => '#/components/schemas/ConversationDisappearingMessagesChange',
                        ],
                    ],
                ],
            ],
        ],
        'ConversationHistoryAccepted' => [
            'type' => 'object',
            'required' => [
                'status',
                'conversation_id',
                'limit',
            ],
            'properties' => [
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'accepted',
                    ],
                    'description' => '仅确认请求已受理，不表示收到历史或完成补拉。',
                ],
                'conversation_id' => [
                    'type' => 'string',
                    'description' => '本次请求的标准会话 ID。',
                ],
                'limit' => [
                    'type' => 'integer',
                    'minimum' => 1,
                    'maximum' => 50,
                    'description' => '本次实际请求的数量上限。',
                ],
            ],
        ],
        'ConversationHistoryBefore' => [
            'type' => 'object',
            'required' => [
                'message_id',
                'sent_at',
                'direction',
            ],
            'description' => '同一会话中同一条原生内容消息的位置；所有字段必须来自该消息，不接受 null。type=call 的合成通话记录即使三个字段完整也不能作为锚点；请求不包含 type 字段。',
            'properties' => [
                'message_id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'not' => [
                        'pattern' => '^call_record_[0-9a-f]{64}$',
                    ],
                    'description' => '原生内容消息的 id；不接受合成通话记录 ID，去除首尾空白后仍为该记录格式时同样无效。不能使用顶层事件 id 或 HTTP request_id 代替。',
                ],
                'sent_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                    'description' => '该消息的 RFC3339 发送时间，Unix 秒值必须大于 0；不能使用事件 occurred_at 或当前时间代替。',
                ],
                'direction' => [
                    'type' => 'string',
                    'enum' => [
                        'inbound',
                        'outbound',
                    ],
                    'description' => '该消息相对于当前账号的收发方向；inbound 为接收，outbound 为发送。',
                ],
            ],
        ],
        'ConversationHistoryMessage' => [
            'type' => 'object',
            'additionalProperties' => true,
            'description' => '标准历史消息，沿用现有正文、附件和可选归因字段；仅具有原生消息 ID 且 id、sent_at、direction 完整的内容消息可用于继续补拉，合成通话记录不可用。',
            'properties' => [
                'id' => [
                    'type' => 'string',
                ],
                'type' => [
                    'type' => 'string',
                ],
                'text' => [
                    'type' => 'string',
                ],
                'sent_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                ],
                'direction' => [
                    'type' => 'string',
                    'enum' => [
                        'inbound',
                        'outbound',
                    ],
                ],
                'referral' => [
                    '$ref' => '#/components/schemas/MessageReferral',
                ],
            ],
        ],
        'ConversationHistoryRequest' => [
            'type' => 'object',
            'required' => [
                'conversation_id',
                'before',
            ],
            'properties' => [
                'conversation_id' => [
                    'type' => 'string',
                    'pattern' => '^[0-9]+@lid$',
                    'description' => 'WhatsApp 标准私聊 LID；必须属于 before 指向的会话，不接受手机号或其他会话类型。',
                ],
                'before' => [
                    '$ref' => '#/components/schemas/ConversationHistoryBefore',
                ],
                'limit' => [
                    'type' => 'integer',
                    'minimum' => 1,
                    'maximum' => 50,
                    'default' => 50,
                    'description' => '请求数量，不保证实际返回相同数量；仅省略时默认 50，显式 null、0、非整数或超过 50 均返回 invalid_request。',
                ],
            ],
        ],
        'ConversationHistorySource' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'source',
            ],
            'properties' => [
                'source' => [
                    'type' => 'string',
                    'enum' => [
                        'on_demand',
                    ],
                    'description' => '本次批次来自按需补拉；不标识具体请求或补拉完成状态。',
                ],
            ],
        ],
        'ConversationHistoryWebhookEvent' => [
            'type' => 'object',
            'additionalProperties' => true,
            'description' => '同一会话的一批历史可通过多个 conversation.history 事件提供；按 provider、account_id、data.conversation.id 和消息 id 合并全部事件，不以事件个数或单个事件内的消息数量判断完整历史已恢复。每条消息保持完整，不截短字段；按需事件均保留 data.history.source=on_demand，不产生 account.history.synced。',
            'required' => [
                'id',
                'type',
                'provider',
                'account_id',
                'occurred_at',
                'data',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'description' => '事件去重标识，不是补拉请求 ID。',
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'conversation.history',
                    ],
                ],
                'provider' => [
                    '$ref' => '#/components/schemas/ProviderName',
                ],
                'account_id' => [
                    'type' => 'string',
                ],
                'occurred_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                    'description' => '事件时间，不能替代每条消息的 sent_at。',
                ],
                'data' => [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'required' => [
                        'conversation',
                        'messages',
                    ],
                    'properties' => [
                        'conversation' => [
                            'type' => 'object',
                            'required' => [
                                'id',
                                'type',
                            ],
                            'properties' => [
                                'id' => [
                                    'type' => 'string',
                                ],
                                'type' => [
                                    '$ref' => '#/components/schemas/ConversationType',
                                ],
                            ],
                        ],
                        'messages' => [
                            'type' => 'array',
                            'description' => '当前事件提供的可用历史消息，可为空数组；同一会话可能还有其他历史事件。空数组或数量不足不代表全部历史已完成。',
                            'items' => [
                                '$ref' => '#/components/schemas/ConversationHistoryMessage',
                            ],
                        ],
                        'history' => [
                            '$ref' => '#/components/schemas/ConversationHistorySource',
                            'description' => '仅按需补拉批次提供；自动历史同步继续沿用原有结构。',
                        ],
                    ],
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
                    'description' => '成员的渠道侧稳定标识，请按不透明字符串保存和使用。',
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
                    'enum' => [
                        'member',
                        'admin',
                        'superadmin',
                    ],
                    'description' => '标准化成员角色。群主或创建者为 `superadmin`，管理员为 `admin`，普通成员以及暂时无法识别权限的成员为 `member`。',
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
                            'description' => '按账号所属渠道校验，字段类型始终为字符串。 Telegram 必填：当前账号在该会话收到的单个消息 ID，例如 message.received 的 data.message.id，且 data.message.direction=inbound。 去除首尾空白后必须只含 ASCII 十进制数字，数值范围为 1–2147483647； 截止该消息（含自身及此前消息）标记已读。不能使用逗号列表、正负号、小数、指数、内部空白或非 ASCII 数字，不能省略或使用 0 表示整个会话。 WhatsApp 可选：一个消息 ID，或属于同一发送者的多个消息 ID（英文逗号分隔）； 与 up_to_message_sender_id 成对提供非空值。省略两者时标记整个会话已读；两者去除首尾空白后均为空时同样标记整个会话。',
                        ],
                        'up_to_message_sender_id' => [
                            'type' => 'string',
                            'description' => 'WhatsApp 消息级已读的渠道侧发送者标识，与非空 up_to_message_id 成对提供；群聊应传 Webhook 事件中的 data.sender.id。多个消息 ID 必须属于同一发送者。Telegram 不支持此参数，提供非空值时返回 invalid_request。',
                        ],
                    ],
                ],
            ],
        ],
        'ConversationStateAccount' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'provider_account_ref',
            ],
            'properties' => [
                'provider_account_ref' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '已确认的渠道账号标识，可用于关联账号；未提供时不推测。',
                ],
            ],
        ],
        'ConversationStateActor' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'id',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '对应渠道及账号范围内的不透明操作者 ID。',
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'user',
                    ],
                ],
                'name' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '已知的非空显示名称，可省略；不用于事件身份或排序。',
                ],
            ],
        ],
        'ConversationStateReference' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'id',
                'type',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '对应渠道及账号范围内的不透明会话 ID。',
                ],
                'type' => [
                    '$ref' => '#/components/schemas/ConversationType',
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
            'description' => '标准会话类型；WhatsApp 社群公告群继续使用 group。',
        ],
        'CreateCallData' => [
            'type' => 'object',
            'required' => [
                'call_id',
                'direction',
                'media_type',
                'state',
                'join_url',
                'expires_at',
            ],
            'properties' => [
                'call_id' => [
                    'type' => 'string',
                ],
                'direction' => [
                    'type' => 'string',
                    'enum' => [
                        'outbound',
                    ],
                ],
                'media_type' => [
                    'type' => 'string',
                    'enum' => [
                        'voice',
                        'video',
                    ],
                ],
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'preparing',
                    ],
                ],
                'join_url' => [
                    'type' => 'string',
                    'format' => 'uri',
                    'description' => '原样传递的短期一次性 HTTPS 通话链接，禁止记录完整链接。',
                ],
                'expires_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                    'description' => 'RFC3339 格式的准备失效时间；从创建通话起默认 2 分钟，可由服务端调整，请以此字段判断截止时间，不要自行写死时长。',
                ],
            ],
        ],
        'CreateCallRequest' => [
            'type' => 'object',
            'required' => [
                'account_id',
                'to',
                'media_type',
            ],
            'properties' => [
                'account_id' => [
                    'type' => 'string',
                    'pattern' => '^acc_[A-Za-z0-9][A-Za-z0-9_-]*$',
                    'description' => '当前工作空间内账号的公开 ID。',
                ],
                'to' => [
                    'allOf' => [
                        [
                            '$ref' => '#/components/schemas/Recipient',
                        ],
                    ],
                    'description' => '与发送消息共用目标结构，id 使用 conversation_id。首期仅支持 WhatsApp user 的数字 @lid 或 @s.whatsapp.net 单聊 JID（最长 128 字符），不接受手机号字符串；group、channel 暂不支持。',
                ],
                'media_type' => [
                    'type' => 'string',
                    'enum' => [
                        'voice',
                        'video',
                    ],
                ],
            ],
        ],
        'EndedCallData' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'call_id',
                'state',
                'direction',
                'media_type',
            ],
            'properties' => [
                'call_id' => [
                    'type' => 'string',
                    'maxLength' => 128,
                ],
                'state' => [
                    'type' => 'string',
                    'enum' => [
                        'ended',
                        'failed',
                    ],
                ],
                'direction' => [
                    'type' => 'string',
                    'enum' => [
                        'inbound',
                        'outbound',
                    ],
                ],
                'media_type' => [
                    'type' => 'string',
                    'enum' => [
                        'voice',
                        'video',
                    ],
                ],
            ],
        ],
        'Error' => [
            'type' => 'object',
            'required' => [
                'code',
                'numeric_code',
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
                'numeric_code' => [
                    'type' => 'string',
                    'pattern' => '^[1-9][0-9]{4}$',
                    'description' => 'Device API 分配的五位数字字符串错误码；Provider 细分原因可以在不改变 HTTP 和 code 的前提下覆盖默认值。whatsapp 发送时的账号受限使用 20102，与该渠道账号受限回调的数字码一致；whatsapp-protocol 同步账号受限仍使用 30020。仅 whatsapp 群消息发送明确需要管理员权限时使用 34012，保持 HTTP 502 和 code=provider_unavailable。仅 whatsapp 添加联系人明确未将目标号码识别为有效联系人时使用 35009，保持 HTTP 500 和 code=create_contact_failed，不确认号码未注册或永久不可用。',
                    'examples' => [
                        '10000',
                    ],
                ],
                'message' => [
                    'type' => 'string',
                    'description' => '面向开发者的错误说明，不建议作为客户端分支依据。 numeric_code=30010 时，有原始原因则为 Provider operation failed: <原始错误原因>，没有则为 Provider operation failed。 numeric_code=30021 时保留原始连接错误，原因缺失时为 Account is not connected to the messaging platform。 numeric_code=34012 时为 Group administrator privileges are required to send messages to this group，表示当前账号的群消息发送被明确拒绝为需要管理员权限，不反推群类型、具体群设置或账号角色。 numeric_code=35009 时保留完整原始原因，不增加前缀；原因缺失时为 Target phone number was not recognized as an active WhatsApp contact。 numeric_code=36007 时提供具体贴纸素材校验原因，原因缺失时为 Invalid sticker media。 贴纸素材准备失败及实际发送失败保留既有错误分类和专属提示，并提供可用的具体失败原因；原因缺失时沿用默认提示。 这些细分原因保留所在接口既有的 HTTP 状态和 code；调用方应按 numeric_code 判断，不依赖可变化的文案。',
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
                'permissions' => [
                    '$ref' => '#/components/schemas/GroupPermissions',
                ],
                'extra' => [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'description' => '渠道扩展字段；WhatsApp 群资料可包含公告群分类，是否返回取决于本次查询可用资料。',
                    'properties' => [
                        'is_announcement_group' => [
                            'type' => 'boolean',
                            'description' => '仅 WhatsApp 群提供。true 表示已确认是社群公告群，false 表示本次资料已确认不符合公告群条件；缺失表示未知，不返回 null。此属性独立于 permissions.admins_only，不表示当前账号具备发送权限。',
                            'example' => false,
                        ],
                    ],
                ],
            ],
        ],
        'GroupAnnouncementChange' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'kind',
                'admins_only',
            ],
            'properties' => [
                'kind' => [
                    'type' => 'string',
                    'enum' => [
                        'announcement_changed',
                    ],
                ],
                'admins_only' => [
                    'type' => 'boolean',
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
        'GroupInviteLinkChange' => [
            'type' => 'object',
            'additionalProperties' => false,
            'description' => '邀请链接缓存失效信号；不携带链接或邀请码，应调用现有群邀请链接查询获取当前值。',
            'required' => [
                'kind',
            ],
            'properties' => [
                'kind' => [
                    'type' => 'string',
                    'enum' => [
                        'invite_link_changed',
                    ],
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
        'GroupPermissions' => [
            'type' => 'object',
            'additionalProperties' => false,
            'description' => '群整体发言权限快照，仅来源明确提供时返回。缺失表示未知；false 表示普通成员可发言，不表示当前账号一定可发送。',
            'properties' => [
                'admins_only' => [
                    'type' => 'boolean',
                    'description' => 'true 表示仅管理员发言；false 是明确状态，不能视为缺省。',
                ],
            ],
        ],
        'GroupSettingsEvent' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'kind',
            ],
            'properties' => [
                'kind' => [
                    'type' => 'string',
                    'enum' => [
                        'group_updated',
                    ],
                ],
                'changed_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                    'description' => '可靠业务时间，UTC RFC3339 并保留精度；未知省略，不以 occurred_at 或到达顺序代替。',
                ],
            ],
        ],
        'GroupSettingsUpdatedWebhookEvent' => [
            'type' => 'object',
            'additionalProperties' => true,
            'required' => [
                'id',
                'type',
                'provider',
                'account_id',
                'occurred_at',
                'data',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'pattern' => '\\S',
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'group.updated',
                    ],
                ],
                'provider' => [
                    '$ref' => '#/components/schemas/ProviderName',
                ],
                'account_id' => [
                    'type' => 'string',
                    'pattern' => '\\S',
                ],
                'occurred_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                ],
                'data' => [
                    'type' => 'object',
                    'additionalProperties' => false,
                    'required' => [
                        'conversation',
                        'changes',
                        'event',
                    ],
                    'properties' => [
                        'account' => [
                            '$ref' => '#/components/schemas/ConversationStateAccount',
                        ],
                        'conversation' => [
                            '$ref' => '#/components/schemas/ConversationStateReference',
                        ],
                        'actor' => [
                            '$ref' => '#/components/schemas/ConversationStateActor',
                        ],
                        'changes' => [
                            'type' => 'array',
                            'minItems' => 1,
                            'items' => [
                                '$ref' => '#/components/schemas/GroupUpdatedChange',
                            ],
                            'contains' => [
                                'oneOf' => [
                                    [
                                        '$ref' => '#/components/schemas/GroupAnnouncementChange',
                                    ],
                                    [
                                        '$ref' => '#/components/schemas/GroupInviteLinkChange',
                                    ],
                                ],
                            ],
                        ],
                        'event' => [
                            '$ref' => '#/components/schemas/GroupSettingsEvent',
                        ],
                    ],
                ],
            ],
        ],
        'GroupUpdatedChange' => [
            'oneOf' => [
                [
                    '$ref' => '#/components/schemas/GroupAnnouncementChange',
                ],
                [
                    '$ref' => '#/components/schemas/GroupInviteLinkChange',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'required' => [
                        'kind',
                    ],
                    'properties' => [
                        'kind' => [
                            'type' => 'string',
                            'not' => [
                                'enum' => [
                                    'announcement_changed',
                                    'invite_link_changed',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'LinkPreviewMessagePayload' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'type',
                'text',
                'link_preview',
            ],
            'description' => '链接预览发送结构；不能与媒体、名片或其他消息载荷字段混用。渠道支持范围和附加限制见发送接口说明。',
            'properties' => [
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'link_preview',
                    ],
                ],
                'text' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '消息正文；WhatsApp 要求其中包含 link_preview.url 的原文。',
                ],
                'link_preview' => [
                    '$ref' => '#/components/schemas/SendMessageLinkPreview',
                ],
            ],
        ],
        'MediaMessagePayload' => [
            'type' => 'object',
            'required' => [
                'type',
            ],
            'anyOf' => [
                [
                    'required' => [
                        'url',
                    ],
                    'properties' => [
                        'url' => [],
                    ],
                ],
                [
                    'required' => [
                        'file_url',
                    ],
                    'properties' => [
                        'file_url' => [],
                    ],
                ],
                [
                    'required' => [
                        'file_key',
                    ],
                    'properties' => [
                        'file_key' => [],
                    ],
                ],
            ],
            'properties' => [
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'image',
                        'video',
                        'audio',
                        'document',
                        'file',
                    ],
                ],
                'url' => [
                    'type' => 'string',
                    'format' => 'uri',
                    'pattern' => '^[Hh][Tt][Tt][Pp][Ss]?://',
                ],
                'file_url' => [
                    'type' => 'string',
                    'format' => 'uri',
                    'pattern' => '^[Hh][Tt][Tt][Pp][Ss]?://',
                ],
                'file_key' => [
                    'type' => 'string',
                    'minLength' => 1,
                ],
                'caption' => [
                    'type' => 'string',
                ],
            ],
        ],
        'Mention' => [
            'type' => 'object',
            'description' => '@ 目标。`type` 缺省时按 `member` 处理，以兼容旧请求； `type=member` 必须传 `id`，`type=all` 不传 `id` 且仅适用于群聊。',
            'properties' => [
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'member',
                        'all',
                    ],
                    'default' => 'member',
                ],
                'id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'description' => '`type=member` 时必填的 Provider 成员标识。',
                ],
            ],
            'anyOf' => [
                [
                    'required' => [
                        'id',
                    ],
                    'properties' => [
                        'type' => [
                            'enum' => [
                                'member',
                            ],
                        ],
                    ],
                ],
                [
                    'required' => [
                        'type',
                    ],
                    'properties' => [
                        'type' => [
                            'const' => 'all',
                        ],
                    ],
                    'not' => [
                        'required' => [
                            'id',
                        ],
                    ],
                ],
            ],
        ],
        'MessageCommerce' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageWithOptionalReferral',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'required' => [
                        'type',
                    ],
                    'properties' => [
                        'type' => [
                            'type' => 'string',
                            'enum' => [
                                'product',
                                'order',
                            ],
                        ],
                        'product' => [
                            '$ref' => '#/components/schemas/MessageProduct',
                        ],
                        'order' => [
                            '$ref' => '#/components/schemas/MessageOrder',
                        ],
                    ],
                    'oneOf' => [
                        [
                            'required' => [
                                'product',
                            ],
                            'properties' => [
                                'type' => [
                                    'const' => 'product',
                                ],
                                'product' => [
                                    '$ref' => '#/components/schemas/MessageProduct',
                                ],
                                'order' => false,
                            ],
                        ],
                        [
                            'required' => [
                                'order',
                            ],
                            'properties' => [
                                'type' => [
                                    'const' => 'order',
                                ],
                                'product' => false,
                                'order' => [
                                    '$ref' => '#/components/schemas/MessageOrder',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageCommerceHTTPURL' => [
            'type' => 'string',
            'format' => 'uri',
            'pattern' => '^[Hh][Tt][Tt][Pp][Ss]?://(?:[^/?#@\\s]*@)?(?:\\[[^/?#\\s]+\\]|[^/?#:@\\s]+)(?::[0-9]*)?(?:[/?#]|$)',
            'description' => '带主机名的绝对 HTTP(S) URI，保留查询参数；格式有效不保证资源可访问或永久有效。',
        ],
        'MessageCommerceHistoryWebhookEvent' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageCommerceWebhookEvent',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'properties' => [
                        'type' => [
                            'enum' => [
                                'conversation.history',
                            ],
                        ],
                        'data' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'required' => [
                                'messages',
                            ],
                            'properties' => [
                                'messages' => [
                                    'type' => 'array',
                                    'contains' => [
                                        '$ref' => '#/components/schemas/MessageCommerce',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageCommerceMoney' => [
            'type' => 'object',
            'additionalProperties' => false,
            'minProperties' => 1,
            'description' => '金额与币种按各自是否提供分别输出；缺失不补零或默认币种，两者均未知时省略整个对象。',
            'properties' => [
                'amount' => [
                    'type' => 'string',
                    'pattern' => '^[0-9]+(?:\\.[0-9]+)?$',
                    'not' => [
                        'pattern' => '\\s',
                    ],
                    'description' => '币种主单位的非负精确十进制字符串；保留零值，不使用指数、正负号或空白，不限制为固定小数位。',
                ],
                'currency' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '原始币种标识，按非空不透明字符串保存；不默认 USD，也不强制三字符编码。',
                ],
            ],
        ],
        'MessageCommerceReceivedWebhookEvent' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageCommerceWebhookEvent',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'properties' => [
                        'type' => [
                            'enum' => [
                                'message.received',
                            ],
                        ],
                        'data' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'required' => [
                                'message',
                            ],
                            'properties' => [
                                'message' => [
                                    '$ref' => '#/components/schemas/MessageCommerce',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageCommerceUpdatedWebhookEvent' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageCommerceWebhookEvent',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'properties' => [
                        'type' => [
                            'enum' => [
                                'message.updated',
                            ],
                        ],
                        'data' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'required' => [
                                'message',
                            ],
                            'properties' => [
                                'message' => [
                                    'allOf' => [
                                        [
                                            '$ref' => '#/components/schemas/MessageCommerce',
                                        ],
                                        [
                                            'type' => 'object',
                                            'additionalProperties' => true,
                                            'required' => [
                                                'id',
                                            ],
                                            'properties' => [
                                                'id' => [
                                                    'type' => 'string',
                                                    'minLength' => 1,
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageCommerceWebhookEvent' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageReferralWebhookEvent',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'properties' => [
                        'data' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'properties' => [
                                'message' => [
                                    '$ref' => '#/components/schemas/MessageWithOptionalCommerce',
                                ],
                                'messages' => [
                                    'type' => 'array',
                                    'items' => [
                                        '$ref' => '#/components/schemas/MessageWithOptionalCommerce',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageContactCards' => [
            'type' => 'object',
            'additionalProperties' => true,
            'description' => '多名片始终为一个 type=contact 消息和完整有序 contacts；单张旧消息可继续省略 type 并保留 text。编辑出现 contacts 时整体替换，不支持空数组清空。多名片不提供 reply_token。',
            'required' => [
                'contacts',
            ],
            'oneOf' => [
                [
                    'required' => [
                        'text',
                    ],
                    'properties' => [
                        'text' => [
                            'type' => 'string',
                            'pattern' => '\\S',
                        ],
                        'contacts' => [
                            'maxItems' => 1,
                        ],
                    ],
                ],
                [
                    'required' => [
                        'id',
                        'type',
                    ],
                    'properties' => [
                        'id' => [
                            'type' => 'string',
                            'pattern' => '\\S',
                        ],
                        'text' => false,
                        'reply_token' => false,
                    ],
                ],
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'contact',
                    ],
                ],
                'contacts' => [
                    'type' => 'array',
                    'minItems' => 1,
                    'items' => [
                        '$ref' => '#/components/schemas/ReceivedContactCard',
                    ],
                ],
            ],
        ],
        'MessageContactCardsHistoryWebhookEvent' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageReferralWebhookEvent',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'properties' => [
                        'type' => [
                            'enum' => [
                                'conversation.history',
                            ],
                        ],
                        'data' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'required' => [
                                'messages',
                            ],
                            'properties' => [
                                'messages' => [
                                    'type' => 'array',
                                    'items' => [
                                        '$ref' => '#/components/schemas/MessageWithOptionalContactCards',
                                    ],
                                    'contains' => [
                                        '$ref' => '#/components/schemas/MessageContactCards',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageContactCardsReceivedWebhookEvent' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageReferralWebhookEvent',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'properties' => [
                        'type' => [
                            'enum' => [
                                'message.received',
                            ],
                        ],
                        'data' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'required' => [
                                'message',
                            ],
                            'properties' => [
                                'message' => [
                                    '$ref' => '#/components/schemas/MessageContactCards',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageContactCardsUpdatedWebhookEvent' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageReferralWebhookEvent',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'properties' => [
                        'type' => [
                            'enum' => [
                                'message.updated',
                            ],
                        ],
                        'data' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'required' => [
                                'message',
                            ],
                            'properties' => [
                                'message' => [
                                    'allOf' => [
                                        [
                                            '$ref' => '#/components/schemas/MessageContactCards',
                                        ],
                                        [
                                            'type' => 'object',
                                            'required' => [
                                                'id',
                                            ],
                                            'properties' => [
                                                'id' => [
                                                    'type' => 'string',
                                                    'pattern' => '\\S',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
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
        'MessageInteractive' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'kind',
            ],
            'description' => '接收的按钮或模板卡片；至少包含一个有效组件，kind 本身不构成卡片。省略的字段不清空已有值；buttons 若提供则按本次有序数组整体替换。',
            'anyOf' => [
                [
                    'required' => [
                        'header',
                    ],
                ],
                [
                    'required' => [
                        'body',
                    ],
                ],
                [
                    'required' => [
                        'footer',
                    ],
                ],
                [
                    'required' => [
                        'buttons',
                    ],
                ],
            ],
            'properties' => [
                'kind' => [
                    'type' => 'string',
                    'enum' => [
                        'buttons',
                        'template',
                    ],
                ],
                'header' => [
                    '$ref' => '#/components/schemas/MessageInteractiveHeader',
                ],
                'body' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                ],
                'footer' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                ],
                'buttons' => [
                    'type' => 'array',
                    'minItems' => 1,
                    'items' => [
                        '$ref' => '#/components/schemas/MessageInteractiveButton',
                    ],
                ],
            ],
        ],
        'MessageInteractiveAttachment' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'type',
            ],
            'description' => '复用消息附件字段；URL 可缺失，已知媒体类型仍可保留。size 为字节，duration_ms 为毫秒；仅输出已知有效字段。',
            'minProperties' => 1,
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'image',
                        'video',
                        'document',
                    ],
                ],
                'url' => [
                    '$ref' => '#/components/schemas/MessageCommerceHTTPURL',
                ],
                'thumbnail_url' => [
                    '$ref' => '#/components/schemas/MessageCommerceHTTPURL',
                ],
                'mimetype' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                ],
                'size' => [
                    'type' => 'integer',
                    'minimum' => 0,
                    'maximum' => 9007199254740991,
                ],
                'duration_ms' => [
                    'type' => 'integer',
                    'minimum' => 0,
                    'maximum' => 9007199254740991,
                ],
                'metadata' => [
                    '$ref' => '#/components/schemas/MessageInteractiveAttachmentMetadata',
                ],
                'title' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                ],
                'description' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                ],
                'expired' => [
                    'type' => 'boolean',
                    'description' => 'WhatsApp 自动历史同步与按需补拉使用相同的历史保留与媒体获取规则：默认每批每会话最多保留最近 100 条消息，并尝试获取已保留的最近 100 条消息内的受支持交互头部媒体，文本消息也计数。历史保留数量和媒体获取范围可由服务配置独立调整；不设历史条数上限时只处理实际收到的批次，不主动补齐全部历史；不设额外媒体窗口时，对本批已保留消息中的所有受支持交互头部媒体尝试获取。不保证收到 100 条消息或全部媒体可恢复。获取成功且提供有效 URL 时为 false；获取失败或超出所配置的媒体窗口时为 true。未尝试且状态未知时可省略。媒体恢复后应同时合并本次 url 和 expired=false，覆盖旧 true；缺失字段不清空旧状态，该状态不保证 URL 永久可下载。',
                ],
            ],
        ],
        'MessageInteractiveAttachmentMetadata' => [
            'type' => 'object',
            'additionalProperties' => false,
            'minProperties' => 1,
            'properties' => [
                'width' => [
                    'type' => 'integer',
                    'minimum' => 0,
                    'maximum' => 9007199254740991,
                ],
                'height' => [
                    'type' => 'integer',
                    'minimum' => 0,
                    'maximum' => 9007199254740991,
                ],
                'file_length' => [
                    'type' => 'integer',
                    'minimum' => 0,
                    'maximum' => 9007199254740991,
                ],
                'size' => [
                    'type' => 'integer',
                    'minimum' => 0,
                    'maximum' => 9007199254740991,
                ],
                'is_big_file' => [
                    'type' => 'boolean',
                ],
            ],
        ],
        'MessageInteractiveButton' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'type',
            ],
            'description' => '按钮保留原顺序；各类型只能出现适用字段，位置不能单独构成有效按钮。',
            'oneOf' => [
                [
                    'properties' => [
                        'type' => [
                            'const' => 'reply',
                        ],
                        'url' => false,
                        'phone_number' => false,
                    ],
                    'anyOf' => [
                        [
                            'required' => [
                                'id',
                            ],
                        ],
                        [
                            'required' => [
                                'title',
                            ],
                        ],
                    ],
                ],
                [
                    'properties' => [
                        'type' => [
                            'const' => 'url',
                        ],
                        'id' => false,
                        'phone_number' => false,
                    ],
                    'anyOf' => [
                        [
                            'required' => [
                                'title',
                            ],
                        ],
                        [
                            'required' => [
                                'url',
                            ],
                        ],
                    ],
                ],
                [
                    'properties' => [
                        'type' => [
                            'const' => 'phone',
                        ],
                        'id' => false,
                        'url' => false,
                    ],
                    'anyOf' => [
                        [
                            'required' => [
                                'title',
                            ],
                        ],
                        [
                            'required' => [
                                'phone_number',
                            ],
                        ],
                    ],
                ],
            ],
            'properties' => [
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'reply',
                        'url',
                        'phone',
                    ],
                ],
                'id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '可选回复按钮标识；不得用显示文字或位置代替。',
                ],
                'title' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                ],
                'url' => [
                    '$ref' => '#/components/schemas/MessageCommerceHTTPURL',
                ],
                'phone_number' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                ],
                'index' => [
                    'type' => 'integer',
                    'minimum' => 0,
                    'maximum' => 9007199254740991,
                    'description' => '已确认并归一化的 0 基位置；0 必须保留。WhatsApp 当前不提供，不可依赖。',
                ],
            ],
        ],
        'MessageInteractiveHeader' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'type',
            ],
            'oneOf' => [
                [
                    'required' => [
                        'type',
                        'text',
                    ],
                    'properties' => [
                        'type' => [
                            'const' => 'text',
                        ],
                        'attachment' => false,
                    ],
                ],
                [
                    'required' => [
                        'type',
                        'attachment',
                    ],
                    'properties' => [
                        'type' => [
                            'const' => 'image',
                        ],
                        'text' => false,
                        'attachment' => [
                            'properties' => [
                                'type' => [
                                    'const' => 'image',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'required' => [
                        'type',
                        'attachment',
                    ],
                    'properties' => [
                        'type' => [
                            'const' => 'video',
                        ],
                        'text' => false,
                        'attachment' => [
                            'properties' => [
                                'type' => [
                                    'const' => 'video',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'required' => [
                        'type',
                        'attachment',
                    ],
                    'properties' => [
                        'type' => [
                            'const' => 'document',
                        ],
                        'text' => false,
                        'attachment' => [
                            'properties' => [
                                'type' => [
                                    'const' => 'document',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'properties' => [
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'text',
                        'image',
                        'video',
                        'document',
                    ],
                ],
                'text' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                ],
                'attachment' => [
                    '$ref' => '#/components/schemas/MessageInteractiveAttachment',
                ],
            ],
        ],
        'MessageInteractiveHistoryWebhookEvent' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageInteractiveWebhookEvent',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'properties' => [
                        'type' => [
                            'enum' => [
                                'conversation.history',
                            ],
                        ],
                        'data' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'required' => [
                                'messages',
                            ],
                            'properties' => [
                                'messages' => [
                                    'type' => 'array',
                                    'contains' => [
                                        '$ref' => '#/components/schemas/MessageInteractiveMessage',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageInteractiveMessage' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageWithOptionalReferral',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'required' => [
                        'type',
                    ],
                    'properties' => [
                        'type' => [
                            'type' => 'string',
                            'enum' => [
                                'interactive',
                                'interactive_response',
                            ],
                        ],
                        'interactive' => [
                            '$ref' => '#/components/schemas/MessageInteractive',
                        ],
                        'interactive_response' => [
                            '$ref' => '#/components/schemas/MessageInteractiveResponse',
                        ],
                        'product' => false,
                        'order' => false,
                    ],
                    'oneOf' => [
                        [
                            'required' => [
                                'interactive',
                            ],
                            'properties' => [
                                'type' => [
                                    'const' => 'interactive',
                                ],
                                'interactive' => [
                                    '$ref' => '#/components/schemas/MessageInteractive',
                                ],
                                'interactive_response' => false,
                            ],
                        ],
                        [
                            'required' => [
                                'interactive_response',
                            ],
                            'properties' => [
                                'type' => [
                                    'const' => 'interactive_response',
                                ],
                                'interactive_response' => [
                                    '$ref' => '#/components/schemas/MessageInteractiveResponse',
                                ],
                                'interactive' => false,
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageInteractiveReceivedWebhookEvent' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageInteractiveWebhookEvent',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'properties' => [
                        'type' => [
                            'enum' => [
                                'message.received',
                            ],
                        ],
                        'data' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'required' => [
                                'message',
                            ],
                            'properties' => [
                                'message' => [
                                    '$ref' => '#/components/schemas/MessageInteractiveMessage',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageInteractiveResponse' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'kind',
            ],
            'description' => '独立的选择响应消息；至少提供标识、已确认位置或显示文字之一。不要求必有原卡片引用。',
            'anyOf' => [
                [
                    'required' => [
                        'selected_id',
                    ],
                ],
                [
                    'required' => [
                        'selected_index',
                    ],
                ],
                [
                    'required' => [
                        'title',
                    ],
                ],
            ],
            'properties' => [
                'kind' => [
                    'type' => 'string',
                    'enum' => [
                        'button',
                        'template_button',
                    ],
                ],
                'selected_id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '已知选项标识；未提供时不能由显示文字生成。',
                ],
                'selected_index' => [
                    'type' => 'integer',
                    'minimum' => 0,
                    'maximum' => 9007199254740991,
                    'description' => '已确认并归一化的 0 基位置；0 必须保留。WhatsApp 当前不提供，不可依赖。',
                ],
                'title' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                ],
            ],
        ],
        'MessageInteractiveUpdatedWebhookEvent' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageInteractiveWebhookEvent',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'properties' => [
                        'type' => [
                            'enum' => [
                                'message.updated',
                            ],
                        ],
                        'data' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'required' => [
                                'message',
                            ],
                            'properties' => [
                                'message' => [
                                    'allOf' => [
                                        [
                                            '$ref' => '#/components/schemas/MessageInteractiveMessage',
                                        ],
                                        [
                                            'type' => 'object',
                                            'additionalProperties' => true,
                                            'required' => [
                                                'id',
                                            ],
                                            'properties' => [
                                                'id' => [
                                                    'type' => 'string',
                                                    'minLength' => 1,
                                                    'pattern' => '\\S',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageInteractiveWebhookEvent' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageReferralWebhookEvent',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'properties' => [
                        'data' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'properties' => [
                                'message' => [
                                    '$ref' => '#/components/schemas/MessageWithOptionalInteractive',
                                ],
                                'messages' => [
                                    'type' => 'array',
                                    'items' => [
                                        '$ref' => '#/components/schemas/MessageWithOptionalInteractive',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageLinkPreview' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'url',
            ],
            'description' => '当前消息的链接预览；目标链接必需。title/description 仅在明确提供时出现，空字符串表示清空，缺省表示不改，null 和全空白字符串非法；其他可选字段缺省不表示清空。普通正文 URL 不自动成为本对象。',
            'properties' => [
                'url' => [
                    '$ref' => '#/components/schemas/MessageLinkPreviewHTTPURL',
                ],
                'title' => [
                    'type' => 'string',
                    'anyOf' => [
                        [
                            'const' => '',
                        ],
                        [
                            'pattern' => '\\S',
                        ],
                    ],
                ],
                'description' => [
                    'type' => 'string',
                    'anyOf' => [
                        [
                            'const' => '',
                        ],
                        [
                            'pattern' => '\\S',
                        ],
                    ],
                ],
                'image_url' => [
                    'allOf' => [
                        [
                            '$ref' => '#/components/schemas/MessageLinkPreviewHTTPURL',
                        ],
                    ],
                    'description' => '可选预览图片地址，不保证永久可用；WhatsApp 当前不提供接收侧图片地址，不应依赖该字段。',
                ],
            ],
        ],
        'MessageLinkPreviewHTTPURL' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageCommerceHTTPURL',
                ],
            ],
            'not' => [
                'pattern' => '\\s',
            ],
            'pattern' => '^[Hh][Tt][Tt][Pp][Ss]?://(?:[^/?#@\\s]*@)?(?:\\[[0-9A-Fa-f:.]+\\]|[^/?#:@\\s\\[\\]]+)(?::[0-9]*)?(?:[/?#]|$)',
            'description' => '带主机名且不含空白的绝对 HTTP(S) URI，方括号地址仅接受 IPv6 字面量；保留原文，不保证资源可访问。',
        ],
        'MessageLinkPreviewHistoryWebhookEvent' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageLinkPreviewWebhookEvent',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'properties' => [
                        'type' => [
                            'enum' => [
                                'conversation.history',
                            ],
                        ],
                        'data' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'required' => [
                                'messages',
                            ],
                            'properties' => [
                                'messages' => [
                                    'type' => 'array',
                                    'contains' => [
                                        '$ref' => '#/components/schemas/MessageLinkPreviewMessage',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageLinkPreviewMessage' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageWithOptionalReferral',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'required' => [
                        'type',
                        'link_preview',
                    ],
                    'properties' => [
                        'type' => [
                            'type' => 'string',
                            'enum' => [
                                'link_preview',
                            ],
                        ],
                        'text' => [
                            'type' => 'string',
                        ],
                        'link_preview' => [
                            '$ref' => '#/components/schemas/MessageLinkPreview',
                        ],
                        'product' => false,
                        'order' => false,
                        'interactive' => false,
                        'interactive_response' => false,
                    ],
                ],
            ],
        ],
        'MessageLinkPreviewReceivedWebhookEvent' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageLinkPreviewWebhookEvent',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'properties' => [
                        'type' => [
                            'enum' => [
                                'message.received',
                            ],
                        ],
                        'data' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'required' => [
                                'message',
                            ],
                            'properties' => [
                                'message' => [
                                    '$ref' => '#/components/schemas/MessageLinkPreviewMessage',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageLinkPreviewTextUpdate' => [
            'type' => 'object',
            'additionalProperties' => true,
            'required' => [
                'id',
                'type',
            ],
            'description' => '编辑后明确成为普通文本；业务方清除旧 link_preview 后合并实际提供的字段，缺省正文不捏造为空字符串。',
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'text',
                    ],
                ],
                'text' => [
                    'type' => 'string',
                ],
                'link_preview' => false,
                'product' => false,
                'order' => false,
                'interactive' => false,
                'interactive_response' => false,
            ],
        ],
        'MessageLinkPreviewUpdatedWebhookEvent' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageLinkPreviewWebhookEvent',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'properties' => [
                        'type' => [
                            'enum' => [
                                'message.updated',
                            ],
                        ],
                        'data' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'required' => [
                                'message',
                            ],
                            'properties' => [
                                'message' => [
                                    'allOf' => [
                                        [
                                            'oneOf' => [
                                                [
                                                    '$ref' => '#/components/schemas/MessageLinkPreviewMessage',
                                                ],
                                                [
                                                    '$ref' => '#/components/schemas/MessageLinkPreviewTextUpdate',
                                                ],
                                            ],
                                        ],
                                        [
                                            'type' => 'object',
                                            'additionalProperties' => true,
                                            'required' => [
                                                'id',
                                            ],
                                            'properties' => [
                                                'id' => [
                                                    'type' => 'string',
                                                    'minLength' => 1,
                                                    'pattern' => '\\S',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageLinkPreviewWebhookEvent' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageReferralWebhookEvent',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'properties' => [
                        'data' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'properties' => [
                                'message' => [
                                    '$ref' => '#/components/schemas/MessageWithOptionalLinkPreview',
                                ],
                                'messages' => [
                                    'type' => 'array',
                                    'items' => [
                                        '$ref' => '#/components/schemas/MessageWithOptionalLinkPreview',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageLiveLocation' => [
            'type' => 'object',
            'additionalProperties' => true,
            'description' => '仅识别实时位置类型，调用方可提示在 WhatsApp 中查看；不提供坐标、追踪、共享时长、终止状态或回复句柄，不开放此类型发送。',
            'required' => [
                'id',
                'type',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'pattern' => '\\S',
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'live_location',
                    ],
                ],
                'text' => false,
                'latitude' => false,
                'longitude' => false,
                'location' => false,
                'duration_seconds' => false,
                'ended_at' => false,
                'reply_token' => false,
            ],
        ],
        'MessageLiveLocationHistoryWebhookEvent' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageReferralWebhookEvent',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'properties' => [
                        'type' => [
                            'enum' => [
                                'conversation.history',
                            ],
                        ],
                        'data' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'required' => [
                                'messages',
                            ],
                            'properties' => [
                                'messages' => [
                                    'type' => 'array',
                                    'items' => [
                                        '$ref' => '#/components/schemas/MessageWithOptionalLiveLocation',
                                    ],
                                    'contains' => [
                                        '$ref' => '#/components/schemas/MessageLiveLocation',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageLiveLocationReceivedWebhookEvent' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageReferralWebhookEvent',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'properties' => [
                        'type' => [
                            'enum' => [
                                'message.received',
                            ],
                        ],
                        'data' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'required' => [
                                'message',
                            ],
                            'properties' => [
                                'message' => [
                                    '$ref' => '#/components/schemas/MessageLiveLocation',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageLiveLocationUpdatedWebhookEvent' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageReferralWebhookEvent',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'properties' => [
                        'type' => [
                            'enum' => [
                                'message.updated',
                            ],
                        ],
                        'data' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'required' => [
                                'message',
                            ],
                            'properties' => [
                                'message' => [
                                    'allOf' => [
                                        [
                                            '$ref' => '#/components/schemas/MessageLiveLocation',
                                        ],
                                        [
                                            'type' => 'object',
                                            'required' => [
                                                'id',
                                            ],
                                            'properties' => [
                                                'id' => [
                                                    'type' => 'string',
                                                    'pattern' => '\\S',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageOrder' => [
            'type' => 'object',
            'additionalProperties' => false,
            'minProperties' => 1,
            'description' => '当前消息中的订单汇总；至少包含一个已知有效字段，不包含商品明细，也不表示支付结果或完整订单生命周期。',
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '可选订单标识，与消息 ID 和顶层事件 ID 含义不同，不能用于替代消息关联。',
                ],
                'title' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                ],
                'item_count' => [
                    'type' => 'integer',
                    'minimum' => 0,
                    'description' => '已提供的商品数量；零值保留，缺失不补零，也不根据数量构造明细。',
                ],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'inquiry',
                        'accepted',
                        'declined',
                    ],
                    'description' => 'inquiry 为询单，accepted 为已接受，declined 为已拒绝；未知时省略，accepted 不表示付款成功。',
                ],
                'thumbnail_url' => [
                    '$ref' => '#/components/schemas/MessageCommerceHTTPURL',
                ],
                'total' => [
                    '$ref' => '#/components/schemas/MessageCommerceMoney',
                ],
            ],
        ],
        'MessagePayload' => [
            'allOf' => [
                [
                    'if' => [
                        'properties' => [
                            'type' => [
                                'not' => [
                                    'const' => 'link_preview',
                                ],
                            ],
                        ],
                    ],
                    'then' => [
                        'type' => 'object',
                        'additionalProperties' => true,
                        'properties' => [
                            'link_preview' => false,
                        ],
                    ],
                ],
                [
                    'if' => [
                        'properties' => [
                            'type' => [
                                'not' => [
                                    'const' => 'poll',
                                ],
                            ],
                        ],
                    ],
                    'then' => [
                        'type' => 'object',
                        'additionalProperties' => true,
                        'properties' => [
                            'poll' => false,
                        ],
                    ],
                ],
            ],
            'oneOf' => [
                [
                    '$ref' => '#/components/schemas/TextMessagePayload',
                ],
                [
                    '$ref' => '#/components/schemas/MediaMessagePayload',
                ],
                [
                    '$ref' => '#/components/schemas/ContactMessagePayload',
                ],
                [
                    '$ref' => '#/components/schemas/LinkPreviewMessagePayload',
                ],
                [
                    '$ref' => '#/components/schemas/PollMessagePayload',
                ],
                [
                    '$ref' => '#/components/schemas/StickerMessagePayload',
                ],
            ],
            'discriminator' => [
                'propertyName' => 'type',
            ],
        ],
        'MessagePinChange' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'kind',
                'change_type',
            ],
            'properties' => [
                'kind' => [
                    'type' => 'string',
                    'enum' => [
                        'message_updated',
                    ],
                ],
                'change_type' => [
                    'type' => 'string',
                    'enum' => [
                        'message_pin',
                    ],
                ],
                'changed_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                    'description' => '已知的可靠操作时间，以 RFC3339 UTC 表示并保留精度；未知时省略，occurred_at 不保证可替代此时间。',
                ],
            ],
        ],
        'MessagePinMessage' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'id',
                'pin',
            ],
            'description' => '仅更新目标消息的置顶状态；不提供或改写原消息类型、方向、正文和发送时间。',
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '被操作的原消息 ID，在 provider、账号和会话范围内不透明；不是本次事件 ID。',
                ],
                'pin' => [
                    '$ref' => '#/components/schemas/MessagePinState',
                ],
            ],
        ],
        'MessagePinParticipant' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'id',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '相应渠道和账号范围内的不透明用户 ID，不要求特定渠道格式。',
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'user',
                    ],
                ],
                'name' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '已知的非空显示名称，可省略；不用于参与者身份或事件去重。',
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
        'MessagePinState' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'pinned',
            ],
            'description' => '本次置顶状态快照，每次整体替换旧 pin 对象；缺失的有效期也清除旧值，不影响消息其他字段。',
            'properties' => [
                'pinned' => [
                    'type' => 'boolean',
                    'description' => 'true 为置顶，false 为取消；字段必需，不能将缺失当成取消。',
                ],
                'duration_seconds' => [
                    'type' => 'integer',
                    'minimum' => 0,
                    'maximum' => 9007199254740991,
                    'description' => '仅置顶时可有，以秒为单位；未知时省略，0 不代表永久置顶。',
                ],
                'expires_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                    'description' => '可靠 changed_at 加正 duration_seconds 得到的到期时间；未知时省略，不能从回调接收时间计算。',
                ],
            ],
            'allOf' => [
                [
                    'if' => [
                        'type' => 'object',
                        'additionalProperties' => true,
                        'required' => [
                            'pinned',
                        ],
                        'properties' => [
                            'pinned' => [
                                'const' => false,
                            ],
                        ],
                    ],
                    'then' => [
                        'type' => 'object',
                        'additionalProperties' => true,
                        'properties' => [
                            'duration_seconds' => false,
                            'expires_at' => false,
                        ],
                    ],
                ],
                [
                    'if' => [
                        'type' => 'object',
                        'additionalProperties' => true,
                        'required' => [
                            'expires_at',
                        ],
                        'properties' => [
                            'expires_at' => [
                                'type' => 'string',
                                'format' => 'date-time',
                            ],
                        ],
                    ],
                    'then' => [
                        'type' => 'object',
                        'additionalProperties' => true,
                        'required' => [
                            'duration_seconds',
                        ],
                        'properties' => [
                            'duration_seconds' => [
                                'minimum' => 1,
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessagePinUpdatedWebhookEvent' => [
            'type' => 'object',
            'additionalProperties' => true,
            'required' => [
                'id',
                'type',
                'provider',
                'account_id',
                'occurred_at',
                'data',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'description' => '事件幂等键，同次操作重放保持一致；置顶、取消和再次置顶为独立操作。',
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'message.updated',
                    ],
                ],
                'provider' => [
                    '$ref' => '#/components/schemas/ProviderName',
                ],
                'account_id' => [
                    'type' => 'string',
                    'minLength' => 1,
                ],
                'occurred_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                    'description' => '事件发生时间，未知时可为接收时间；不保证是可靠操作时间，不用于补 changed_at 或计算有效期。',
                ],
                'data' => [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'required' => [
                        'message',
                        'event',
                    ],
                    'properties' => [
                        'message' => [
                            '$ref' => '#/components/schemas/MessagePinMessage',
                        ],
                        'actor' => [
                            '$ref' => '#/components/schemas/MessagePinParticipant',
                            'description' => '执行本次置顶或取消的人，未知时省略；不得用来推测原消息作者。',
                        ],
                        'sender' => [
                            '$ref' => '#/components/schemas/MessagePinParticipant',
                            'description' => '可靠的原消息作者，未知时省略；不从 actor 或操作方向兜底。',
                        ],
                        'conversation' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'required' => [
                                'id',
                                'type',
                            ],
                            'properties' => [
                                'id' => [
                                    'type' => 'string',
                                    'minLength' => 1,
                                    'pattern' => '\\S',
                                ],
                                'type' => [
                                    'type' => 'string',
                                    'enum' => [
                                        'user',
                                        'group',
                                        'channel',
                                    ],
                                ],
                            ],
                        ],
                        'event' => [
                            '$ref' => '#/components/schemas/MessagePinChange',
                        ],
                    ],
                ],
            ],
            'allOf' => [
                [
                    'if' => [
                        'type' => 'object',
                        'additionalProperties' => true,
                        'properties' => [
                            'data' => [
                                'type' => 'object',
                                'additionalProperties' => true,
                                'properties' => [
                                    'message' => [
                                        'type' => 'object',
                                        'additionalProperties' => true,
                                        'properties' => [
                                            'pin' => [
                                                'type' => 'object',
                                                'additionalProperties' => true,
                                                'required' => [
                                                    'expires_at',
                                                ],
                                                'properties' => [
                                                    'expires_at' => [
                                                        'type' => 'string',
                                                        'format' => 'date-time',
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'then' => [
                        'type' => 'object',
                        'additionalProperties' => true,
                        'properties' => [
                            'data' => [
                                'type' => 'object',
                                'additionalProperties' => true,
                                'properties' => [
                                    'event' => [
                                        'type' => 'object',
                                        'additionalProperties' => true,
                                        'required' => [
                                            'changed_at',
                                        ],
                                        'properties' => [
                                            'changed_at' => [
                                                'type' => 'string',
                                                'format' => 'date-time',
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessagePoll' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'question',
                'options',
                'max_selections',
            ],
            'description' => '原投票的静态内容，不是累计结果。保持选项顺序和原始标题；max_selections 是每人最大选择数而非参与人数。接收历史可能存在重复选项 ID，不能据此声称可以区分同名选项。',
            'properties' => [
                'question' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                ],
                'options' => [
                    'type' => 'array',
                    'minItems' => 2,
                    'items' => [
                        '$ref' => '#/components/schemas/MessagePollOption',
                    ],
                ],
                'max_selections' => [
                    'type' => 'integer',
                    'minimum' => 1,
                    'description' => '最大选择数，不超过 options 数量；单选为 1，全部可选时等于选项数量。',
                ],
            ],
        ],
        'MessagePollHistoryWebhookEvent' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessagePollWebhookEvent',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'properties' => [
                        'type' => [
                            'enum' => [
                                'conversation.history',
                            ],
                        ],
                        'data' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'required' => [
                                'messages',
                            ],
                            'properties' => [
                                'messages' => [
                                    'type' => 'array',
                                    'contains' => [
                                        '$ref' => '#/components/schemas/MessagePollMessage',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessagePollMessage' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'id',
                'type',
                'poll',
            ],
            'description' => '投票创建消息；id 标识原投票，创建、自同步及静态历史不提供 reply_token，也不生成正文或媒体附件。',
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'poll',
                    ],
                ],
                'poll' => [
                    '$ref' => '#/components/schemas/MessagePoll',
                ],
                'direction' => [
                    'type' => 'string',
                    'enum' => [
                        'inbound',
                        'outbound',
                    ],
                ],
                'sent_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                ],
                'sender' => [
                    '$ref' => '#/components/schemas/ConversationStateActor',
                    'description' => '历史静态消息中已确认的原作者；实时作者在 data.sender。',
                ],
                'mentions' => [
                    'type' => 'array',
                    'items' => [
                        '$ref' => '#/components/schemas/Mention',
                    ],
                ],
                'reply_to_message_id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                ],
                'referral' => [
                    '$ref' => '#/components/schemas/MessageReferral',
                ],
            ],
        ],
        'MessagePollOption' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'id',
                'title',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '在本投票内稳定的不透明选项 ID；使用回调值，不按标题自行计算。',
                ],
                'title' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                ],
            ],
        ],
        'MessagePollReceivedWebhookEvent' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessagePollWebhookEvent',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'properties' => [
                        'type' => [
                            'enum' => [
                                'message.received',
                            ],
                        ],
                        'data' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'required' => [
                                'message',
                            ],
                            'properties' => [
                                'message' => [
                                    '$ref' => '#/components/schemas/MessagePollMessage',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessagePollVote' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'status',
                'voter_id',
            ],
            'description' => '单个具名投票人的本次完整选择。decoded 的数组整体替换此人已有选择，空数组表示撤票；unavailable 保留已有结果并标记待确认，不能当作撤票。',
            'properties' => [
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'decoded',
                        'unavailable',
                    ],
                ],
                'voter_id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '投票人的不透明 ID，与 data.actor.id 一致；不是原投票作者。',
                ],
                'selected_option_ids' => [
                    'type' => 'array',
                    'uniqueItems' => true,
                    'items' => [
                        'type' => 'string',
                        'minLength' => 1,
                        'pattern' => '\\S',
                    ],
                    'description' => '仅 decoded 提供且必须出现；允许空数组。每个值来自原投票选项 ID，不表示本次新增票数。',
                ],
                'voted_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                    'description' => '已知的可靠操作时间，保留毫秒精度；未知时省略，不用回调到达时间代替。未知时间或同时间冲突应保留待核对。',
                ],
                'reason' => [
                    'type' => 'string',
                    'enum' => [
                        'decryption_failed',
                        'missing_poll_context',
                        'unknown',
                    ],
                    'description' => '仅 unavailable 可提供；只描述本次选择不可用，不承诺额外恢复接口。WhatsApp 当前无法细分时提供 unknown。',
                ],
            ],
            'allOf' => [
                [
                    'if' => [
                        'type' => 'object',
                        'additionalProperties' => true,
                        'required' => [
                            'status',
                        ],
                        'properties' => [
                            'status' => [
                                'const' => 'decoded',
                            ],
                        ],
                    ],
                    'then' => [
                        'type' => 'object',
                        'additionalProperties' => true,
                        'required' => [
                            'selected_option_ids',
                        ],
                        'properties' => [
                            'selected_option_ids' => [
                                'type' => 'array',
                            ],
                            'reason' => false,
                        ],
                    ],
                    'else' => [
                        'type' => 'object',
                        'additionalProperties' => true,
                        'properties' => [
                            'selected_option_ids' => false,
                        ],
                    ],
                ],
            ],
        ],
        'MessagePollVoteChange' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'kind',
                'change_type',
            ],
            'properties' => [
                'kind' => [
                    'type' => 'string',
                    'enum' => [
                        'message_updated',
                    ],
                ],
                'change_type' => [
                    'type' => 'string',
                    'enum' => [
                        'poll_vote',
                    ],
                ],
            ],
        ],
        'MessagePollVoteMessage' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'id',
                'type',
                'poll_vote',
            ],
            'description' => 'id 是原投票消息 ID，仅更新此投票人的选择；不带操作消息的正文、作者、方向、发送时间或引用凭据。',
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'poll',
                    ],
                ],
                'poll_vote' => [
                    '$ref' => '#/components/schemas/MessagePollVote',
                ],
            ],
        ],
        'MessagePollVoteUpdatedWebhookEvent' => [
            'type' => 'object',
            'additionalProperties' => true,
            'required' => [
                'id',
                'type',
                'provider',
                'account_id',
                'occurred_at',
                'data',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '本次标准事件的幂等键，不是原投票 ID 或选项 ID；不暴露渠道的操作消息 ID。',
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'message.updated',
                    ],
                ],
                'provider' => [
                    '$ref' => '#/components/schemas/ProviderName',
                ],
                'account_id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                ],
                'occurred_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                    'description' => '未知原生时间时可能是接收时间；判断投票新旧使用可靠 voted_at。',
                ],
                'data' => [
                    'type' => 'object',
                    'additionalProperties' => false,
                    'required' => [
                        'message',
                        'actor',
                        'event',
                    ],
                    'properties' => [
                        'account' => [
                            '$ref' => '#/components/schemas/ConversationStateAccount',
                        ],
                        'conversation' => [
                            '$ref' => '#/components/schemas/ConversationStateReference',
                        ],
                        'message' => [
                            '$ref' => '#/components/schemas/MessagePollVoteMessage',
                        ],
                        'actor' => [
                            '$ref' => '#/components/schemas/ConversationStateActor',
                            'description' => '本次投票人，id 必须与 poll_vote.voter_id 一致；不能据此填充原消息作者。',
                        ],
                        'event' => [
                            '$ref' => '#/components/schemas/MessagePollVoteChange',
                        ],
                    ],
                ],
            ],
        ],
        'MessagePollWebhookEvent' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageReferralWebhookEvent',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'properties' => [
                        'data' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'properties' => [
                                'message' => [
                                    '$ref' => '#/components/schemas/MessageWithOptionalPoll',
                                ],
                                'messages' => [
                                    'type' => 'array',
                                    'items' => [
                                        '$ref' => '#/components/schemas/MessageWithOptionalPoll',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageProduct' => [
            'type' => 'object',
            'additionalProperties' => false,
            'minProperties' => 1,
            'description' => '当前消息中的商品卡片，至少包含一个已知有效字段；缺图片或价格不影响其他商品信息。',
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '可选商品标识，与消息 ID 和顶层事件 ID 含义不同，不能用于替代消息关联。',
                ],
                'title' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                ],
                'description' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                ],
                'url' => [
                    '$ref' => '#/components/schemas/MessageCommerceHTTPURL',
                ],
                'image_url' => [
                    '$ref' => '#/components/schemas/MessageCommerceHTTPURL',
                ],
                'price' => [
                    '$ref' => '#/components/schemas/MessageCommerceMoney',
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
        'MessageReferral' => [
            'type' => 'object',
            'additionalProperties' => false,
            'minProperties' => 1,
            'description' => '当前消息的可选来源信息；仅输出类型正确的已知字段，字符串必须非空，显式 false 保留，无可用字段时省略整个对象。所有字段均可省略，缺失不表示否定或清空。',
            'properties' => [
                'source' => [
                    'type' => 'string',
                    'enum' => [
                        'ad',
                    ],
                    'description' => '仅确认广告来源时提供 ad，来源未知时省略。',
                ],
                'source_id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '来源标识；作为不透明字符串保存，不转换成数字。',
                ],
                'source_url' => [
                    'type' => 'string',
                    'format' => 'uri',
                    'pattern' => '^[Hh][Tt][Tt][Pp][Ss]?://(?:[^/?#@\\s]*@)?(?:\\[[^/?#\\s]+\\]|[^/?#:@\\s]+)(?::[0-9]*)?(?:[/?#]|$)',
                    'description' => '来源 URL，不承诺为广告主落地页；必须为带主机名的绝对 HTTP(S) URL，保留完整查询参数。',
                ],
                'title' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                ],
                'body' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                ],
                'media_type' => [
                    'type' => 'string',
                    'enum' => [
                        'image',
                        'video',
                    ],
                    'description' => '来源素材的已知媒体类型，未知时省略。',
                ],
                'thumbnail_url' => [
                    'type' => 'string',
                    'format' => 'uri',
                    'pattern' => '^[Hh][Tt][Tt][Pp][Ss]?://(?:[^/?#@\\s]*@)?(?:\\[[^/?#\\s]+\\]|[^/?#:@\\s]+)(?::[0-9]*)?(?:[/?#]|$)',
                    'description' => '来源素材缩略图的绝对 HTTP(S) URL；缺失不影响其他归因字段。',
                ],
                'media_url' => [
                    'type' => 'string',
                    'format' => 'uri',
                    'pattern' => '^[Hh][Tt][Tt][Pp][Ss]?://(?:[^/?#@\\s]*@)?(?:\\[[^/?#\\s]+\\]|[^/?#:@\\s]+)(?::[0-9]*)?(?:[/?#]|$)',
                    'description' => '来源素材的绝对 HTTP(S) URL，不等同于当前消息附件地址。',
                ],
                'provider_extensions' => [
                    '$ref' => '#/components/schemas/MessageReferralProviderExtensions',
                ],
            ],
        ],
        'MessageReferralHistoryWebhookEvent' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageReferralWebhookEvent',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'properties' => [
                        'type' => [
                            'enum' => [
                                'conversation.history',
                            ],
                        ],
                        'data' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'required' => [
                                'messages',
                            ],
                            'properties' => [
                                'messages' => [
                                    'contains' => [
                                        'type' => 'object',
                                        'additionalProperties' => true,
                                        'required' => [
                                            'referral',
                                        ],
                                        'properties' => [
                                            'referral' => [
                                                '$ref' => '#/components/schemas/MessageReferral',
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageReferralProviderExtensions' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'whatsapp',
            ],
            'description' => '可选的渠道扩展；仅 provider=whatsapp 时允许出现，无可用字段时省略。',
            'properties' => [
                'whatsapp' => [
                    '$ref' => '#/components/schemas/WhatsAppMessageReferralExtension',
                ],
            ],
        ],
        'MessageReferralReceivedWebhookEvent' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageReferralWebhookEvent',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'properties' => [
                        'type' => [
                            'enum' => [
                                'message.received',
                            ],
                        ],
                        'data' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'required' => [
                                'message',
                            ],
                            'properties' => [
                                'message' => [
                                    'type' => 'object',
                                    'additionalProperties' => true,
                                    'required' => [
                                        'referral',
                                    ],
                                    'properties' => [
                                        'referral' => [
                                            '$ref' => '#/components/schemas/MessageReferral',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageReferralUpdatedWebhookEvent' => [
            'allOf' => [
                [
                    '$ref' => '#/components/schemas/MessageReferralWebhookEvent',
                ],
                [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'properties' => [
                        'type' => [
                            'enum' => [
                                'message.updated',
                            ],
                        ],
                        'data' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'required' => [
                                'message',
                            ],
                            'properties' => [
                                'message' => [
                                    'type' => 'object',
                                    'additionalProperties' => true,
                                    'required' => [
                                        'id',
                                        'referral',
                                    ],
                                    'properties' => [
                                        'id' => [
                                            'type' => 'string',
                                            'minLength' => 1,
                                            'description' => '被编辑消息的 ID，与该消息原记录保持一致。',
                                        ],
                                        'referral' => [
                                            '$ref' => '#/components/schemas/MessageReferral',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageReferralWebhookEvent' => [
            'type' => 'object',
            'additionalProperties' => true,
            'required' => [
                'id',
                'type',
                'provider',
                'account_id',
                'occurred_at',
                'data',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'message.received',
                        'message.updated',
                        'conversation.history',
                    ],
                ],
                'provider' => [
                    '$ref' => '#/components/schemas/ProviderName',
                ],
                'account_id' => [
                    'type' => 'string',
                ],
                'occurred_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                ],
                'data' => [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'properties' => [
                        'message' => [
                            '$ref' => '#/components/schemas/MessageWithOptionalReferral',
                        ],
                        'messages' => [
                            'type' => 'array',
                            'items' => [
                                '$ref' => '#/components/schemas/MessageWithOptionalReferral',
                            ],
                        ],
                    ],
                ],
            ],
            'allOf' => [
                [
                    'if' => [
                        'properties' => [
                            'provider' => [
                                'not' => [
                                    'const' => 'whatsapp',
                                ],
                            ],
                        ],
                    ],
                    'then' => [
                        'properties' => [
                            'data' => [
                                'properties' => [
                                    'message' => [
                                        'properties' => [
                                            'referral' => [
                                                'properties' => [
                                                    'provider_extensions' => false,
                                                ],
                                            ],
                                        ],
                                    ],
                                    'messages' => [
                                        'items' => [
                                            'properties' => [
                                                'referral' => [
                                                    'properties' => [
                                                        'provider_extensions' => false,
                                                    ],
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
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
        'MessageWithOptionalCommerce' => [
            'oneOf' => [
                [
                    '$ref' => '#/components/schemas/MessageCommerce',
                ],
                [
                    'allOf' => [
                        [
                            '$ref' => '#/components/schemas/MessageWithOptionalReferral',
                        ],
                        [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'properties' => [
                                'type' => [
                                    'not' => [
                                        'enum' => [
                                            'product',
                                            'order',
                                        ],
                                    ],
                                ],
                                'product' => false,
                                'order' => false,
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageWithOptionalContactCards' => [
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => [
                'contacts' => [
                    'type' => 'array',
                    'minItems' => 1,
                    'items' => [
                        '$ref' => '#/components/schemas/ReceivedContactCard',
                    ],
                ],
            ],
            'allOf' => [
                [
                    'if' => [
                        'required' => [
                            'contacts',
                        ],
                        'properties' => [
                            'contacts' => [],
                        ],
                    ],
                    'then' => [
                        '$ref' => '#/components/schemas/MessageContactCards',
                    ],
                ],
            ],
        ],
        'MessageWithOptionalInteractive' => [
            'oneOf' => [
                [
                    '$ref' => '#/components/schemas/MessageInteractiveMessage',
                ],
                [
                    'allOf' => [
                        [
                            '$ref' => '#/components/schemas/MessageWithOptionalCommerce',
                        ],
                        [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'properties' => [
                                'type' => [
                                    'not' => [
                                        'enum' => [
                                            'interactive',
                                            'interactive_response',
                                        ],
                                    ],
                                ],
                                'interactive' => false,
                                'interactive_response' => false,
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageWithOptionalLinkPreview' => [
            'oneOf' => [
                [
                    '$ref' => '#/components/schemas/MessageLinkPreviewMessage',
                ],
                [
                    'allOf' => [
                        [
                            '$ref' => '#/components/schemas/MessageWithOptionalInteractive',
                        ],
                        [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'properties' => [
                                'type' => [
                                    'not' => [
                                        'enum' => [
                                            'link_preview',
                                        ],
                                    ],
                                ],
                                'link_preview' => false,
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageWithOptionalLiveLocation' => [
            'type' => 'object',
            'additionalProperties' => true,
            'allOf' => [
                [
                    'if' => [
                        'required' => [
                            'type',
                        ],
                        'properties' => [
                            'type' => [
                                'const' => 'live_location',
                            ],
                        ],
                    ],
                    'then' => [
                        '$ref' => '#/components/schemas/MessageLiveLocation',
                    ],
                ],
            ],
        ],
        'MessageWithOptionalPoll' => [
            'oneOf' => [
                [
                    '$ref' => '#/components/schemas/MessagePollMessage',
                ],
                [
                    'allOf' => [
                        [
                            '$ref' => '#/components/schemas/MessageWithOptionalLinkPreview',
                        ],
                        [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'properties' => [
                                'type' => [
                                    'not' => [
                                        'enum' => [
                                            'poll',
                                        ],
                                    ],
                                ],
                                'poll' => false,
                                'poll_vote' => false,
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'MessageWithOptionalReferral' => [
            'type' => 'object',
            'additionalProperties' => true,
            'description' => '广告归因以可选字段补充原消息，不改变消息正文、附件及已有类型。',
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'description' => '可选消息 ID；未提供时不能用顶层事件 ID、来源标识或点击标识替代。',
                ],
                'referral' => [
                    '$ref' => '#/components/schemas/MessageReferral',
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
        'PasskeyResponseRequest' => [
            'type' => 'object',
            'required' => [
                'webauthn_response',
            ],
            'properties' => [
                'webauthn_response' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'description' => '浏览器生成的 WebAuthn 凭证响应序列化后的完整 JSON 字符串。',
                ],
            ],
        ],
        'PollMessagePayload' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'type',
                'poll',
            ],
            'description' => '创建投票；不能附带 text、媒体、名片、链接预览或其他消息载荷。渠道限制见发送接口说明。',
            'properties' => [
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'poll',
                    ],
                ],
                'poll' => [
                    '$ref' => '#/components/schemas/SendMessagePoll',
                ],
            ],
        ],
        'Post' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'id',
            ],
            'properties' => [
                'id' => [
                    '$ref' => '#/components/schemas/PostResourceID',
                ],
                'text' => [
                    'type' => 'string',
                    'description' => '可靠取得时保留原文，包括空字符串；未知时省略。',
                ],
                'author' => [
                    '$ref' => '#/components/schemas/PostAuthor',
                ],
                'created_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                    'description' => '可靠取得的创建时间，RFC3339 UTC；未知时省略。',
                ],
            ],
        ],
        'PostAuthor' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'id',
            ],
            'properties' => [
                'id' => [
                    '$ref' => '#/components/schemas/PostResourceID',
                ],
                'display_name' => [
                    'type' => 'string',
                    'description' => '可靠取得时保留原文，包括空字符串；未知时省略。',
                ],
                'avatar_url' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'description' => '可靠取得的非空头像地址；未知时省略。',
                ],
            ],
        ],
        'PostComment' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'id',
                'post_id',
            ],
            'properties' => [
                'id' => [
                    '$ref' => '#/components/schemas/PostResourceID',
                ],
                'post_id' => [
                    '$ref' => '#/components/schemas/PostResourceID',
                ],
                'text' => [
                    'type' => 'string',
                    'description' => '可靠取得时保留原文，包括空字符串；未知时省略。',
                ],
                'author' => [
                    '$ref' => '#/components/schemas/PostAuthor',
                ],
                'created_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                    'description' => '可靠取得的评论创建时间，RFC3339 UTC；未知时省略，不用观察时间代替。',
                ],
                'parent_comment_id' => [
                    '$ref' => '#/components/schemas/PostResourceID',
                    'description' => '仅在确认父子关系后提供；缺失本身不能证明该评论是可回复的一级评论。',
                ],
            ],
        ],
        'PostCommentCreatedWebhookEvent' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'id',
                'type',
                'provider',
                'account_id',
                'occurred_at',
                'data',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'pattern' => '^[0-9a-f]{64}$',
                    'description' => '稳定事件 ID；重复通知、重试和正文补全不会改变，接收方据此去重。',
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'post.comment.created',
                    ],
                ],
                'provider' => [
                    'type' => 'string',
                    'enum' => [
                        'tiktok',
                    ],
                ],
                'account_id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'description' => '平台账号 ID。',
                ],
                'occurred_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                    'description' => '可信发生时间，缺失时为观察时间；不等价于评论创建时间，重试保持原值。',
                ],
                'data' => [
                    'type' => 'object',
                    'additionalProperties' => false,
                    'required' => [
                        'post',
                        'comment',
                    ],
                    'properties' => [
                        'post' => [
                            '$ref' => '#/components/schemas/Post',
                        ],
                        'comment' => [
                            '$ref' => '#/components/schemas/PostComment',
                            'description' => 'post_id 必须与 data.post.id 完全一致。',
                        ],
                        'account' => [
                            'type' => 'object',
                            'additionalProperties' => false,
                            'required' => [
                                'provider_account_ref',
                            ],
                            'properties' => [
                                'provider_account_ref' => [
                                    'type' => 'string',
                                    'minLength' => 1,
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'PostCommentListRequest' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'post_id',
            ],
            'properties' => [
                'post_id' => [
                    '$ref' => '#/components/schemas/PostResourceID',
                ],
                'cursor' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'description' => '原样传回上一页的 next_cursor；首次请求省略。',
                ],
                'limit' => [
                    'type' => 'integer',
                    'minimum' => 1,
                    'maximum' => 50,
                    'default' => 20,
                ],
            ],
        ],
        'PostCommentListResult' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'items',
                'has_more',
            ],
            'properties' => [
                'items' => [
                    'type' => 'array',
                    'items' => [
                        '$ref' => '#/components/schemas/PostComment',
                    ],
                ],
                'has_more' => [
                    'type' => 'boolean',
                ],
                'next_cursor' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'description' => '不透明游标，仅 has_more=true 时提供，调用方原样传回。',
                ],
            ],
            'oneOf' => [
                [
                    'properties' => [
                        'has_more' => [
                            'const' => true,
                        ],
                    ],
                    'required' => [
                        'next_cursor',
                    ],
                ],
                [
                    'properties' => [
                        'has_more' => [
                            'const' => false,
                        ],
                    ],
                    'not' => [
                        'required' => [
                            'next_cursor',
                        ],
                    ],
                ],
            ],
        ],
        'PostCommentReplyRequest' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'post_id',
                'text',
            ],
            'properties' => [
                'post_id' => [
                    '$ref' => '#/components/schemas/PostResourceID',
                ],
                'comment_id' => [
                    '$ref' => '#/components/schemas/PostResourceID',
                    'description' => '省略时发布一级评论；提供时表示回复目标帖子下的一级评论，不预先确认其所属帖子或层级。显式空串、纯空白、null 或非字符串均不合法。',
                ],
                'text' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '非空白正文，保留原文，不自动删除首尾空格。',
                ],
            ],
        ],
        'PostCommentReplyResult' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'status',
            ],
            'properties' => [
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'accepted',
                    ],
                ],
                'comment' => [
                    '$ref' => '#/components/schemas/PostComment',
                    'description' => '仅可靠取得本次新评论回执时提供，不保证每次都有。发布一级评论时不含 parent_comment_id；回复时 parent_comment_id 与请求 comment_id 一致。',
                ],
            ],
        ],
        'PostInfoRequest' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'post_id',
            ],
            'properties' => [
                'post_id' => [
                    '$ref' => '#/components/schemas/PostResourceID',
                ],
            ],
        ],
        'PostListResult' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'items',
                'has_more',
            ],
            'properties' => [
                'items' => [
                    'type' => 'array',
                    'items' => [
                        '$ref' => '#/components/schemas/Post',
                    ],
                ],
                'has_more' => [
                    'type' => 'boolean',
                ],
                'next_cursor' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'description' => '不透明游标，仅 has_more=true 时提供，调用方原样传回。',
                ],
            ],
            'oneOf' => [
                [
                    'properties' => [
                        'has_more' => [
                            'const' => true,
                        ],
                    ],
                    'required' => [
                        'next_cursor',
                    ],
                ],
                [
                    'properties' => [
                        'has_more' => [
                            'const' => false,
                        ],
                    ],
                    'not' => [
                        'required' => [
                            'next_cursor',
                        ],
                    ],
                ],
            ],
        ],
        'PostResourceID' => [
            'type' => 'string',
            'minLength' => 1,
            'pattern' => '\\S',
            'description' => '第三方字符串标识；按原值传递，不转换为数字。',
        ],
        'ProviderAuthSession' => [
            'type' => 'object',
            'required' => [
                'account_id',
                'provider',
                'auth_mode',
                'status',
                'authorize_url',
                'expires_at',
                'switchable',
                'available_auth_modes',
            ],
            'properties' => [
                'account_id' => [
                    'type' => 'string',
                ],
                'provider' => [
                    '$ref' => '#/components/schemas/ProviderName',
                ],
                'auth_mode' => [
                    'type' => 'string',
                    'examples' => [
                        'qrcode',
                    ],
                ],
                'status' => [
                    'type' => 'string',
                    'examples' => [
                        'pending_auth',
                        'passkey_required',
                        'authorized',
                    ],
                ],
                'auth_payload' => [
                    'description' => '当前授权步骤所需的渠道载荷，结构会随授权状态变化。',
                    'allOf' => [
                        [
                            '$ref' => '#/components/schemas/FreeFormObject',
                        ],
                    ],
                ],
                'authorize_url' => [
                    'type' => 'string',
                    'format' => 'uri',
                    'description' => '短期有效的 Provider 授权页面地址，其中包含不透明授权凭证。调用方应将其 作为敏感信息处理，不得写入公开日志或分享给无关用户。',
                ],
                'expires_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                ],
                'switchable' => [
                    'type' => 'boolean',
                    'description' => '当前授权会话是否允许切换授权模式。',
                ],
                'available_auth_modes' => [
                    'type' => 'array',
                    'description' => '当前会话允许使用的授权模式。',
                    'items' => [
                        'type' => 'string',
                    ],
                ],
            ],
        ],
        'ProviderInputName' => [
            'type' => 'string',
            'enum' => [
                'telegram',
                'whatsapp',
                'line',
                'twitter',
                'zalo',
                'tiktok',
                'whatsapp-protocol',
                'x',
                'x_client',
                'twitter_client',
            ],
            'description' => 'provider 输入名称。兼容 `x`、`x_client`、`twitter_client`，这些输入会归一化为 `twitter` 并以 `twitter` 输出；Webhook URL path 不适用该别名规则。',
        ],
        'ProviderName' => [
            'type' => 'string',
            'enum' => [
                'telegram',
                'whatsapp',
                'line',
                'twitter',
                'zalo',
                'tiktok',
                'whatsapp-protocol',
            ],
            'description' => '响应输出的 canonical provider 名称。`whatsapp-protocol` 仅支持 session，本期支持 text 和 image，以及联系人详情；不支持 reply、mentions、联系人列表及写动作、会话或群组能力。',
        ],
        'ProviderProfile' => [
            'type' => 'object',
            'description' => '账号在渠道侧的资料。下列为标准字段，其他字段因渠道而异。',
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'description' => '渠道侧账号标识。WhatsApp 返回 LID 格式；该字段在账号资料同步完成前可能缺失。',
                ],
                'device_id' => [
                    '$ref' => '#/components/schemas/WhatsAppDeviceID',
                    'description' => '仅 WhatsApp 账号详情在可确认当前授权会话时提供的登录设备编号；未知时省略。重新授权后可能变化，不作为永久设备标识，也不用于比较历史消息来源。',
                ],
                'phone' => [
                    'type' => 'string',
                    'description' => '账号手机号，已归一化（去除空格、连字符、加号）。',
                ],
                'username' => [
                    'type' => 'string',
                ],
                'display_name' => [
                    'type' => 'string',
                    'description' => '账号展示名称；WhatsApp 按 BusinessName 优先、PushName 回退的规则生成。',
                ],
                'push_name' => [
                    'type' => 'string',
                    'description' => 'WhatsApp 当前账号设置的 PushName；其他渠道不定义该字段语义。',
                ],
                'business_name' => [
                    'type' => 'string',
                    'description' => 'WhatsApp BusinessName；渠道未返回时该字段缺失。',
                ],
                'first_name' => [
                    'type' => 'string',
                ],
                'last_name' => [
                    'type' => 'string',
                ],
                'avatar_url' => [
                    'type' => 'string',
                    'description' => '账号头像 URL。',
                ],
                'bio' => [
                    'type' => 'string',
                ],
                'platform' => [
                    'type' => 'string',
                    'description' => '目前仅 WhatsApp 定义并返回该字段，表示配对时的登录平台标识，按不透明字符串透传。取值集合不封闭，客户端必须兼容未知值；其他渠道不定义该字段语义。该字段与 device_platform 不同。',
                    'example' => 'smba',
                ],
            ],
            'additionalProperties' => true,
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
        'QRAuthCheckData' => [
            'type' => 'object',
            'description' => '二维码授权检查的标准结果。字段可能因渠道和当前步骤扩展；调用方应优先读取 `status`、`auth_status` 和 `auth_payload`。TikTok 扫码后可能返回 `awaiting_code`，自动处理验证码时返回 `pending`。`account_id`、`expires_at` 等字段不是所有 Provider 都稳定返回，因此不作为必填字段。',
            'properties' => [
                'provider' => [
                    '$ref' => '#/components/schemas/ProviderName',
                ],
                'action' => [
                    'type' => 'string',
                    'const' => 'check_qr_auth',
                ],
                'status' => [
                    'type' => 'string',
                    'description' => '当前授权流程状态，例如 `awaiting_qr_scan`、`awaiting_code`、`pending`、`passkey_required` 或 `authorized`。',
                ],
                'auth_status' => [
                    'type' => 'string',
                    'description' => '与当前授权步骤对应的标准状态，通常与 `status` 一致。',
                ],
                'auth_payload' => [
                    '$ref' => '#/components/schemas/QRAuthCheckPayload',
                ],
            ],
            'additionalProperties' => true,
        ],
        'QRAuthCheckPayload' => [
            'type' => 'object',
            'description' => '当前步骤所需的标准载荷。普通二维码使用 `qr_code`；验证码步骤使用 `type=code`；Passkey 使用 `type=passkey` 和 `public_key`。互斥步骤的载荷 不会同时出现。',
            'properties' => [
                'type' => [
                    'type' => 'string',
                    'description' => '当前载荷类型；验证码步骤为 `code`，Passkey 步骤为 `passkey`。',
                ],
                'qr_code' => [
                    'type' => 'string',
                    'description' => '普通二维码内容或可直接展示的二维码 data URL。',
                ],
                'public_key' => [
                    '$ref' => '#/components/schemas/FreeFormObject',
                ],
            ],
            'additionalProperties' => true,
        ],
        'ReceivedContactCard' => [
            'type' => 'object',
            'additionalProperties' => false,
            'description' => '接收名片保留完整 vCard 原文和原始顺序；与发送用结构化 ContactCard 分开，不解析重写电话等字段。',
            'required' => [
                'vcard',
            ],
            'properties' => [
                'name' => [
                    'type' => 'string',
                    'pattern' => '\\S',
                    'description' => '来源提供的显示名；未知或空白省略，不代表通讯录清空。',
                ],
                'vcard' => [
                    'type' => 'string',
                    'pattern' => '\\S',
                    'description' => '完整原文，保留换行、Unicode 和扩展字段；载体非空不等于内容适合直接展示。',
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
                    'minLength' => 1,
                    'description' => '渠道侧接收方标识。',
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
                    'minLength' => 1,
                    'description' => '来自可引用消息事件 `data.message.reply_token` 或发送响应 `data.reply_token` 的不透明句柄，按原账号及会话原样使用；不能用消息 ID 替代。',
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
                'auth_required' => [
                    'type' => 'boolean',
                    'description' => '可选的授权提示。本次 Provider 明确返回二维码、Passkey 等授权证据， 或当前 Session 已持久化此前由 Provider/Webhook 明确确认的授权进行态时 才为 `true`；不能仅根据 `runtime_status=disconnected` 或 `client_connect=false` 推断。运行态接口不返回二维码、`code`、 `qrcode`、`auth_payload` 或 `provider_data`；调用方应改用 `/v1/accounts/{account_id}/auth/qr/start` 和 `/v1/accounts/{account_id}/auth/qr/check` 获取标准授权状态与载荷。',
                ],
                'auth_status' => [
                    'type' => 'string',
                    'description' => '可选的标准授权状态快照，仅在本次运行态操作取得 Provider 明确授权证据， 或复用当前 Session 中已确认的授权进行态时返回，例如 `pending`、 `awaiting_qr_scan` 或 `passkey_required`。该字段用于指引调用方进入授权流程， 不替代授权接口返回的完整状态与载荷。',
                    'examples' => [
                        'pending',
                        'awaiting_qr_scan',
                        'passkey_required',
                    ],
                ],
            ],
        ],
        'RuntimeStatus' => [
            'type' => 'string',
            'description' => '平台标准账号运行态。Provider 原始值不会直接对外返回：`ready`、`online`、 `connected`、`active`、`started` 统一为 `running`；`offline`、`inactive`、 `stop` 统一为 `stopped`；`failed` 统一为 `error`。',
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
        'SendMessageLinkPreview' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'url',
            ],
            'description' => '公共请求只要求目标链接；可选标题和摘要允许空字符串，但不允许 null。WhatsApp 额外要求非空 title/image_url，title 最多 255 个 Unicode 字符、description 最多 1024 个 Unicode 字符；限制由本项目的渠道发送策略执行。',
            'properties' => [
                'url' => [
                    '$ref' => '#/components/schemas/MessageLinkPreviewHTTPURL',
                ],
                'title' => [
                    'type' => 'string',
                ],
                'description' => [
                    'type' => 'string',
                ],
                'image_url' => [
                    '$ref' => '#/components/schemas/MessageLinkPreviewHTTPURL',
                ],
            ],
        ],
        'SendMessagePoll' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'question',
                'options',
                'max_selections',
            ],
            'description' => '题目和选项标题保留原文；max_selections 必须是 1 到选项数量之间的整数，不表示投票人数。1.0、1e0 等整数数值与 1 等价，非整数非法。公共结构不限制题目长度、最大选项数量或标题重复；具体渠道可有额外限制。',
            'properties' => [
                'question' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                ],
                'options' => [
                    'type' => 'array',
                    'minItems' => 2,
                    'items' => [
                        '$ref' => '#/components/schemas/SendMessagePollOption',
                    ],
                ],
                'max_selections' => [
                    'type' => 'integer',
                    'minimum' => 1,
                    'description' => '每位投票者最多可选的选项数量；不得大于 options 数量，该跨字段约束由接口验证。',
                ],
            ],
        ],
        'SendMessagePollOption' => [
            'type' => 'object',
            'additionalProperties' => false,
            'required' => [
                'title',
            ],
            'properties' => [
                'title' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '选项原始标题，发送时不 trim、不改大小写或 Unicode 形式。',
                ],
            ],
        ],
        'SendMessageProviderData' => [
            'type' => 'object',
            'description' => '发送消息时使用的渠道扩展参数。字段仅在对应渠道和消息类型支持时生效。',
            'properties' => [
                'seconds' => [
                    'type' => 'integer',
                    'minimum' => 0,
                    'description' => '音频或视频时长，单位为秒。仅适用于使用 WhatsApp 账号发送的 `audio` 或 `video` 消息；发送 `video` 时取值范围为 0 到 4294967295（uint32）。',
                ],
                'waveform' => [
                    'type' => 'string',
                    'description' => '音频波形数据。仅适用于使用 WhatsApp 账号发送的 `audio` 消息。 非空值必须使用标准 Base64 编码，且解码后必须是可解析的 JSON 波形数据；空字符串按未提供处理，其他格式错误返回 HTTP 400 `provider_invalid_request`。',
                ],
            ],
            'additionalProperties' => true,
        ],
        'SendMessageRequest' => [
            'type' => 'object',
            'required' => [
                'account_id',
                'to',
                'message',
            ],
            'allOf' => [
                [
                    'if' => [
                        'type' => 'object',
                        'additionalProperties' => true,
                        'properties' => [
                            'message' => [
                                'type' => 'object',
                                'additionalProperties' => true,
                                'properties' => [
                                    'type' => [
                                        'not' => [
                                            'const' => 'sticker',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                    'then' => [
                        'type' => 'object',
                        'additionalProperties' => true,
                        'properties' => [
                            'provider_data' => [
                                '$ref' => '#/components/schemas/SendMessageProviderData',
                            ],
                        ],
                    ],
                ],
            ],
            'properties' => [
                'account_id' => [
                    'type' => 'string',
                    'minLength' => 1,
                ],
                'to' => [
                    '$ref' => '#/components/schemas/Recipient',
                ],
                'message' => [
                    '$ref' => '#/components/schemas/MessagePayload',
                ],
                'provider_data' => [
                    'type' => 'object',
                    'additionalProperties' => true,
                ],
                'reply_to' => [
                    '$ref' => '#/components/schemas/ReplyTo',
                ],
                'mentions' => [
                    'type' => 'array',
                    'description' => '群消息的 @ 目标列表。`type=member` 使用对应 Provider 的成员 `id`； `type=all` 表示 @所有人，仅在 Provider 支持时生效，否则返回 `unsupported_message_type`。',
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
                'reply_token' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'description' => 'WhatsApp 发送成功且可引用上下文完整时返回；包括新发送投票，普通文字可据此引用它。未提供时省略，accepted 状态不因此改变。',
                ],
            ],
        ],
        'SessionImportRequest' => [
            'type' => 'object',
            'description' => 'provider 会话导入参数。`whatsapp-protocol` 的协议凭证使用同名嵌套对象； 其他 provider 的既有自由字段通过 additionalProperties 保持兼容。',
            'properties' => [
                'session_url' => [
                    'type' => 'string',
                    'format' => 'uri',
                ],
                'whatsapp-protocol' => [
                    '$ref' => '#/components/schemas/WhatsAppProtocolSessionImportParams',
                ],
            ],
            'additionalProperties' => true,
        ],
        'StandardEventType' => [
            'type' => 'string',
            'enum' => [
                '*',
                'contact.updated',
                'post.comment.created',
                'message.received',
                'message.updated',
                'message.deleted',
                'message.read',
                'message.reaction',
                'message.delivered',
                'call.incoming',
                'call.answered',
                'call.ended',
                'conversation.updated',
                'conversation.deleted',
                'conversation.cleared',
                'conversation.history',
                'group.updated',
                'group.join_request',
                'account.status.updated',
                'account.profile.updated',
                'account.started',
                'account.history.synced',
                'account.auth.required',
                'account.auth.succeeded',
                'account.auth.failed',
            ],
        ],
        'StartCodeAuthData' => [
            'type' => 'object',
            'required' => [
                'provider',
                'action',
            ],
            'description' => '授权动作的结果，字段随渠道和当前授权步骤变化。 WhatsApp 配对码位于 `verify_code`；Telegram 可通过 `auth_payload.type=code` 提示等待用户提交验证码。`account_id`、`auth_fields` 和 `expires_at` 不是此动作的统一返回字段，不能按授权状态查询的响应结构读取本接口。',
            'properties' => [
                'provider' => [
                    '$ref' => '#/components/schemas/ProviderName',
                ],
                'action' => [
                    'type' => 'string',
                    'enum' => [
                        'start_auth',
                    ],
                ],
                'status' => [
                    'type' => 'string',
                    'description' => '当前授权流程状态；awaiting_code 表示等待用户操作，authorized 才表示授权完成。',
                ],
                'auth_status' => [
                    'type' => 'string',
                    'description' => '当前授权步骤的标准状态，通常与 status 一致。',
                ],
                'verify_code' => [
                    'type' => 'string',
                    'description' => '仅 WhatsApp 手机号配对返回；直接位于 data 下，不在 auth_payload 内。 展示给用户在手机 WhatsApp 中输入，不回传 /auth/code。 响应不保证提供过期时间，配对码失效时需重新发起配对。',
                ],
                'auth_payload' => [
                    'type' => 'object',
                    'description' => '渠道特定的授权提示；Telegram 可返回 type=code，不包含用户收到的验证码。',
                    'properties' => [
                        'type' => [
                            'type' => 'string',
                            'description' => '当前授权提示的类型；Telegram 验证码步骤为 code。',
                        ],
                    ],
                    'additionalProperties' => true,
                ],
            ],
            'additionalProperties' => true,
        ],
        'StickerMessagePayload' => [
            'type' => 'object',
            'additionalProperties' => false,
            'description' => '公共结构要求恰好一种非空来源；WhatsApp 当前支持 WebP 的 url/file_url，静态、动画及素材兼容性由渠道判定。API 检查基本容器完整性，下载与暂存硬资源上限为 10 MiB（10485760 字节），不解码或转码；file_key 结构合法但返回 501 unsupported_by_provider。额外字段即使为空也不允许。',
            'required' => [
                'type',
            ],
            'oneOf' => [
                [
                    'required' => [
                        'url',
                    ],
                    'properties' => [
                        'url' => [],
                    ],
                ],
                [
                    'required' => [
                        'file_url',
                    ],
                    'properties' => [
                        'file_url' => [],
                    ],
                ],
                [
                    'required' => [
                        'file_key',
                    ],
                    'properties' => [
                        'file_key' => [],
                    ],
                ],
            ],
            'properties' => [
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'sticker',
                    ],
                ],
                'url' => [
                    'type' => 'string',
                    'format' => 'uri',
                    'pattern' => '^[Hh][Tt][Tt][Pp][Ss]?://',
                ],
                'file_url' => [
                    'type' => 'string',
                    'format' => 'uri',
                    'pattern' => '^[Hh][Tt][Tt][Pp][Ss]?://',
                ],
                'file_key' => [
                    'type' => 'string',
                    'pattern' => '\\S',
                ],
            ],
        ],
        'TextMessagePayload' => [
            'type' => 'object',
            'required' => [
                'type',
                'text',
            ],
            'properties' => [
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'text',
                    ],
                ],
                'text' => [
                    'type' => 'string',
                    'minLength' => 1,
                ],
                'caption' => [
                    'type' => 'string',
                ],
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
                'account_id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'description' => '账号独立端点的公开账号 ID；工作空间端点省略此字段，不返回 null。',
                ],
                'url' => [
                    'type' => 'string',
                    'format' => 'uri',
                    'description' => '必须是绝对 HTTP(S) URL。',
                ],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'active',
                        'inactive',
                    ],
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
            'description' => 'url 与 status 必填；其他配置按完整更新语义处理。 account_id 为可选公开账号 ID：创建时省略表示工作空间端点，更新时省略保留已有绑定。 同一账号最多一个 active 独立端点，inactive 可配置多个且不占用 active 名额；创建 active 或将 inactive 改为 active 时，存在其他 active 端点返回 409 account_webhook_already_exists（40008）。原 active 端点保持 active 的更新允许执行。 更新时提供 account_id 只校验一致，不能修改端点归属；不接受 null、空白或重复的 account_id。 字段名必须精确使用 account_id；大小写变体返回 400 invalid_request。',
            'required' => [
                'url',
                'status',
            ],
            'properties' => [
                'account_id' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '可选的公开账号 ID，例如 `acc_example`；创建用于绑定，更新只用于校验原绑定。',
                ],
                'url' => [
                    'type' => 'string',
                    'format' => 'uri',
                    'description' => '必须是绝对 HTTP(S) URL。',
                ],
                'status' => [
                    'type' => 'string',
                    'enum' => [
                        'active',
                        'inactive',
                    ],
                ],
                'subscribed_events' => [
                    'type' => 'array',
                    'items' => [
                        '$ref' => '#/components/schemas/StandardEventType',
                    ],
                    'description' => '为空、省略或包含 `*` 表示接收当前工作区有权接收的全部事件，包括 contact.updated；is_beta=true 的内测工作区还包含 call.incoming、call.answered、call.ended，无需额外逐项订阅。非内测工作区可以使用通配订阅，但不会收到通话事件；明确订阅通话事件仍返回 403 beta_feature_not_enabled（41002）。非通配的具体事件列表仅接收列出的事件。每次投递、重试及死信重放均重新核验内测资格，查询异常不放行。呼入暂未开放；message.* 通话记录不受内测门禁影响。',
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
        'WhatsAppAccountAuthFailedWebhookEvent' => [
            'type' => 'object',
            'required' => [
                'id',
                'type',
                'provider',
                'account_id',
                'occurred_at',
                'data',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'description' => '用于幂等处理的事件 ID。',
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'account.auth.failed',
                    ],
                ],
                'provider' => [
                    'type' => 'string',
                    'enum' => [
                        'whatsapp',
                    ],
                ],
                'account_id' => [
                    'type' => 'string',
                    'description' => 'device-api 签发的账号 public_id。',
                ],
                'occurred_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                ],
                'data' => [
                    'type' => 'object',
                    'required' => [
                        'auth_status',
                        'runtime_status',
                        'event',
                    ],
                    'properties' => [
                        'auth_status' => [
                            'type' => 'string',
                            'enum' => [
                                'failed',
                            ],
                        ],
                        'runtime_status' => [
                            'type' => 'string',
                            'enum' => [
                                'disconnected',
                            ],
                        ],
                        'last_error' => [
                            'type' => 'string',
                            'description' => '历史失败原因字段，保持原有取值与省略规则；新增集成优先使用 error。',
                        ],
                        'error' => [
                            'description' => '可选的结构化失败原因；旧事件或其他失败场景可以省略，缺失不表示成功。',
                            'allOf' => [
                                [
                                    '$ref' => '#/components/schemas/AccountWebhookError',
                                ],
                            ],
                        ],
                        'event' => [
                            'type' => 'object',
                            'required' => [
                                'kind',
                                'auth_status',
                                'runtime_status',
                            ],
                            'properties' => [
                                'kind' => [
                                    'type' => 'string',
                                    'enum' => [
                                        'account_auth_status',
                                    ],
                                ],
                                'auth_status' => [
                                    'type' => 'string',
                                    'enum' => [
                                        'failed',
                                    ],
                                ],
                                'runtime_status' => [
                                    'type' => 'string',
                                    'enum' => [
                                        'disconnected',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'WhatsAppContactCreateOptions' => [
            'type' => 'object',
            'additionalProperties' => false,
            'properties' => [
                'first_name' => [
                    'type' => 'string',
                ],
                'full_name' => [
                    'type' => 'string',
                ],
                'sync_to_device_contacts' => [
                    'type' => 'boolean',
                    'default' => false,
                    'description' => '是否同步至当前 WhatsApp 账号关联设备的系统通讯录。',
                ],
            ],
        ],
        'WhatsAppDeviceID' => [
            'type' => 'integer',
            'minimum' => 0,
            'maximum' => 65535,
            'description' => '已确认的 WhatsApp 设备编号；0 是有效值，未知时整个字段省略，不返回 null 或空串。',
        ],
        'WhatsAppMessageDeviceSender' => [
            'type' => 'object',
            'additionalProperties' => true,
            'properties' => [
                'id' => [
                    'type' => 'string',
                    'description' => '既有账号级发送者标识，不包含设备后缀，取值规则不因 device_id 改变。',
                ],
                'device_id' => [
                    '$ref' => '#/components/schemas/WhatsAppDeviceID',
                    'description' => '该实时消息的发送设备编号，未知时省略。',
                ],
            ],
        ],
        'WhatsAppMessageDeviceWebhookEvent' => [
            'type' => 'object',
            'additionalProperties' => true,
            'required' => [
                'id',
                'type',
                'provider',
                'account_id',
                'occurred_at',
                'data',
            ],
            'properties' => [
                'id' => [
                    'type' => 'string',
                ],
                'type' => [
                    'type' => 'string',
                    'enum' => [
                        'message.received',
                        'message.updated',
                    ],
                ],
                'provider' => [
                    'type' => 'string',
                    'enum' => [
                        'whatsapp',
                    ],
                ],
                'account_id' => [
                    'type' => 'string',
                ],
                'occurred_at' => [
                    'type' => 'string',
                    'format' => 'date-time',
                ],
                'data' => [
                    'type' => 'object',
                    'additionalProperties' => true,
                    'properties' => [
                        'sender' => [
                            '$ref' => '#/components/schemas/WhatsAppMessageDeviceSender',
                        ],
                        'account' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'properties' => [
                                'provider_account_ref' => [
                                    'type' => 'string',
                                ],
                            ],
                        ],
                        'message' => [
                            'type' => 'object',
                            'additionalProperties' => true,
                            'properties' => [
                                'id' => [
                                    'type' => 'string',
                                ],
                                'direction' => [
                                    'type' => 'string',
                                    'enum' => [
                                        'inbound',
                                        'outbound',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
        'WhatsAppMessageReferralExtension' => [
            'type' => 'object',
            'additionalProperties' => false,
            'minProperties' => 1,
            'description' => '可选的 WhatsApp 广告上下文；各字段独立提供，无有效字段时省略整个扩展。显式 false 与字段缺失含义不同。',
            'properties' => [
                'ctwa_clid' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => 'WhatsApp 提供的广告点击标识；作为不透明字符串保存，未提供时省略该字段。',
                ],
                'greeting_message_body' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '广告上下文提供的欢迎语正文，原样保存；不代表一条具有独立消息身份的发送记录。',
                ],
                'automated_greeting_message_shown' => [
                    'type' => 'boolean',
                    'description' => '上游明确提供的欢迎语展示标记；保留 false，缺失时不推断展示状态。',
                ],
                'automated_greeting_message_cta_type' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '上游提供的欢迎语交互入口类型；按不透明字符串保存，不限定枚举。',
                ],
                'source_app' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'pattern' => '\\S',
                    'description' => '上游提供的来源应用标识；仅在有原值时提供，不从其他来源信息推断。',
                ],
                'click_to_whatsapp_call' => [
                    'type' => 'boolean',
                    'description' => '上游提供的广告通话入口标记；保留 false，该标记不证明已发生通话。',
                ],
                'contains_auto_reply' => [
                    'type' => 'boolean',
                    'description' => '上游提供的自动回复标记；保留 false，不用于推断或覆盖欢迎语展示状态。',
                ],
                'contains_ctwa_flows_auto_reply' => [
                    'type' => 'boolean',
                    'description' => '上游提供的 CTWA Flows 自动回复标记；保留 false，不代表提供 Flows 内容或执行能力。',
                ],
            ],
        ],
        'WhatsAppProtocolSessionImportParams' => [
            'type' => 'object',
            'description' => 'WhatsApp Protocol 的会话导入凭证，仅可提交至账号会话导入接口。 响应不回显协议密钥或其他敏感凭证。手机号用于身份一致性校验；协议公钥、协议私钥 仅供上游启动使用。`edge_routing` 由平台固定注入，业务方不得提交。',
            'required' => [
                'phone',
                'static_pub_key',
                'static_pri_key',
                'identity_pub_key',
                'identity_pri_key',
            ],
            'properties' => [
                'phone' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'description' => '允许带空格、连字符、括号或加号的格式化输入；服务端会归一化为正数字符串。',
                    'examples' => [
                        '<normalized-phone>',
                    ],
                ],
                'platform' => [
                    'type' => 'integer',
                    'format' => 'int32',
                ],
                'app_version' => [
                    'type' => 'string',
                    'examples' => [
                        '<app-version>',
                    ],
                ],
                'server_address' => [
                    'type' => 'string',
                    'examples' => [
                        '<provider-server-address>',
                    ],
                ],
                'fallback_server_addresses' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'string',
                    ],
                ],
                'country' => [
                    'type' => 'string',
                    'examples' => [
                        '<country-code>',
                    ],
                ],
                'device' => [
                    'type' => 'integer',
                    'format' => 'uint32',
                ],
                'static_pub_key' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'description' => '协议公钥。',
                    'writeOnly' => true,
                    'examples' => [
                        '<base64-public-key>',
                    ],
                ],
                'static_pri_key' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'description' => '协议私钥。',
                    'writeOnly' => true,
                    'examples' => [
                        '<base64-private-key>',
                    ],
                ],
                'identity_pub_key' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'description' => '身份公钥。',
                    'writeOnly' => true,
                    'examples' => [
                        '<base64-public-key>',
                    ],
                ],
                'identity_pri_key' => [
                    'type' => 'string',
                    'minLength' => 1,
                    'description' => '身份私钥。',
                    'writeOnly' => true,
                    'examples' => [
                        '<base64-private-key>',
                    ],
                ],
                'hash' => [
                    'type' => 'string',
                    'description' => '兼容旧调用方保留；当前值会被忽略且不保存，建议调用方省略。',
                    'writeOnly' => true,
                    'deprecated' => true,
                ],
                'peer_kem_public' => [
                    'type' => 'string',
                    'description' => '对端 KEM 公钥。',
                    'writeOnly' => true,
                    'examples' => [
                        '<base64-kem-public-key>',
                    ],
                ],
                'auth_hex_data' => [
                    'type' => 'string',
                    'description' => '当前认证十六进制数据。',
                    'writeOnly' => true,
                    'examples' => [
                        '<hex-auth-data>',
                    ],
                ],
                'authhexdata' => [
                    'type' => 'string',
                    'description' => '兼容旧字段：认证十六进制数据。',
                    'writeOnly' => true,
                    'deprecated' => true,
                    'examples' => [
                        '<hex-auth-data>',
                    ],
                ],
                'pq_handshake_mode' => [
                    'type' => 'string',
                    'examples' => [
                        '<handshake-mode>',
                    ],
                ],
                'use_xxkem_handshake' => [
                    'type' => 'boolean',
                ],
            ],
            'additionalProperties' => false,
        ],
        'Workspace' => [
            'type' => 'object',
            'required' => [
                'name',
                'status',
                'is_beta',
                'account_quota',
                'account_quota_used',
                'account_quota_unlimited',
            ],
            'properties' => [
                'is_beta' => [
                    'type' => 'boolean',
                    'readOnly' => true,
                    'default' => false,
                    'description' => '工作区是否已开通内测，默认关闭；仅服务端可管理，客户不能通过 PATCH 或 metadata 修改。',
                ],
                'name' => [
                    'type' => 'string',
                ],
                'status' => [
                    '$ref' => '#/components/schemas/WorkspaceStatus',
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
                    'readOnly' => true,
                    'description' => '当前生效的只读账号总容量，包含免费额度和有效期内的付费额度，不扣除已用数量；已到期的付费额度不计入。',
                ],
                'account_quota_used' => [
                    'type' => 'integer',
                    'format' => 'uint64',
                    'readOnly' => true,
                    'description' => '当前已占用的只读账号额度，账号创建后即占用，删除后释放；待授权、停止或断线的账号仍计入。付费额度到期后，已用额度可能超过 account_quota，按实际已用值返回。',
                ],
                'account_quota_unlimited' => [
                    'type' => 'boolean',
                    'readOnly' => true,
                    'description' => '兼容保留的只读字段，当前配额模式固定返回 false；账号容量以 account_quota 为准。',
                ],
            ],
        ],
        'WorkspaceStatus' => [
            'type' => 'string',
            'enum' => [
                'active',
                'inactive',
            ],
            'description' => 'Workspace 状态。设置为 inactive 后，当前 Workspace 的 API Key 将不再通过鉴权。',
        ],
        'WorkspaceUpdateRequest' => [
            'type' => 'object',
            'required' => [
                'name',
                'status',
            ],
            'not' => [
                'required' => [
                    'is_beta',
                ],
            ],
            'properties' => [
                'name' => [
                    'type' => 'string',
                    'minLength' => 1,
                ],
                'status' => [
                    '$ref' => '#/components/schemas/WorkspaceStatus',
                ],
                'metadata' => [
                    'type' => 'object',
                    'description' => '省略时保留现有 metadata；传入空对象时只清空客户可写字段。 `account_quota`、`account_quota_unlimited` 与 `is_beta` 是服务端保留键，提交任一保留键返回 `400 invalid_request`；顶层提交 `is_beta` 同样拒绝。',
                    'propertyNames' => [
                        'not' => [
                            'enum' => [
                                'account_quota',
                                'account_quota_unlimited',
                                'is_beta',
                            ],
                        ],
                    ],
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
