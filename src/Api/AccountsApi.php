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
 * @phpstan-import-type CreateAccountOperationRequest from ApiTypes
 * @phpstan-import-type CreateAccountOperationResponse from ApiTypes
 * @phpstan-import-type DeleteAccountOperationRequest from ApiTypes
 * @phpstan-import-type DeleteAccountOperationResponse from ApiTypes
 * @phpstan-import-type GetAccountOperationRequest from ApiTypes
 * @phpstan-import-type GetAccountOperationResponse from ApiTypes
 * @phpstan-import-type ListAccountsOperationRequest from ApiTypes
 * @phpstan-import-type ListAccountsOperationResponse from ApiTypes
 * @phpstan-import-type UpdateAccountOperationRequest from ApiTypes
 * @phpstan-import-type UpdateAccountOperationResponse from ApiTypes
 */
final readonly class AccountsApi
{
    public function __construct(private UnifyPortDeviceClient $client)
    {
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
        return $this->client->createAccount($request, $execution);
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
        return $this->client->deleteAccount($request, $execution);
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
        return $this->client->getAccount($request, $execution);
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
        return $this->client->listAccounts($request, $execution);
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
        return $this->client->updateAccount($request, $execution);
    }
}
