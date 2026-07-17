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
 * @phpstan-import-type BlockContactOperationRequest from ApiTypes
 * @phpstan-import-type BlockContactOperationResponse from ApiTypes
 * @phpstan-import-type GetContactOperationRequest from ApiTypes
 * @phpstan-import-type GetContactOperationResponse from ApiTypes
 * @phpstan-import-type ListContactBlocklistOperationRequest from ApiTypes
 * @phpstan-import-type ListContactBlocklistOperationResponse from ApiTypes
 * @phpstan-import-type ListContactsOperationRequest from ApiTypes
 * @phpstan-import-type ListContactsOperationResponse from ApiTypes
 * @phpstan-import-type SetContactNoteOperationRequest from ApiTypes
 * @phpstan-import-type SetContactNoteOperationResponse from ApiTypes
 * @phpstan-import-type UnblockContactOperationRequest from ApiTypes
 * @phpstan-import-type UnblockContactOperationResponse from ApiTypes
 */
final readonly class ContactsApi
{
    public function __construct(private UnifyPortDeviceClient $client)
    {
    }

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
        return $this->client->blockContact($request, $execution);
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
        return $this->client->getContact($request, $execution);
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
        return $this->client->listContactBlocklist($request, $execution);
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
        return $this->client->listContacts($request, $execution);
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
        return $this->client->setContactNote($request, $execution);
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
        return $this->client->unblockContact($request, $execution);
    }
}
