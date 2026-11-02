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
 * @phpstan-import-type CancelAccountAuthOperationRequest from ApiTypes
 * @phpstan-import-type CancelAccountAuthOperationResponse from ApiTypes
 * @phpstan-import-type CheckAccountQrAuthOperationRequest from ApiTypes
 * @phpstan-import-type CheckAccountQrAuthOperationResponse from ApiTypes
 * @phpstan-import-type ConfirmAccountPasskeyOperationRequest from ApiTypes
 * @phpstan-import-type ConfirmAccountPasskeyOperationResponse from ApiTypes
 * @phpstan-import-type CreateAccountAuthSessionOperationRequest from ApiTypes
 * @phpstan-import-type CreateAccountAuthSessionOperationResponse from ApiTypes
 * @phpstan-import-type GetAccountAuthStateOperationRequest from ApiTypes
 * @phpstan-import-type GetAccountAuthStateOperationResponse from ApiTypes
 * @phpstan-import-type ImportAccountAuthSessionOperationRequest from ApiTypes
 * @phpstan-import-type ImportAccountAuthSessionOperationResponse from ApiTypes
 * @phpstan-import-type StartAccountAuthOperationRequest from ApiTypes
 * @phpstan-import-type StartAccountAuthOperationResponse from ApiTypes
 * @phpstan-import-type StartAccountQrAuthOperationRequest from ApiTypes
 * @phpstan-import-type StartAccountQrAuthOperationResponse from ApiTypes
 * @phpstan-import-type SubmitAccountAuthCodeOperationRequest from ApiTypes
 * @phpstan-import-type SubmitAccountAuthCodeOperationResponse from ApiTypes
 * @phpstan-import-type SubmitAccountAuthPasswordOperationRequest from ApiTypes
 * @phpstan-import-type SubmitAccountAuthPasswordOperationResponse from ApiTypes
 * @phpstan-import-type SubmitAccountPasskeyResponseOperationRequest from ApiTypes
 * @phpstan-import-type SubmitAccountPasskeyResponseOperationResponse from ApiTypes
 */
final readonly class AccountAuthApi
{
    public function __construct(private UnifyPortDeviceClient $client)
    {
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
        return $this->client->cancelAccountAuth($request, $execution);
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
        return $this->client->checkAccountQrAuth($request, $execution);
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
        return $this->client->confirmAccountPasskey($request, $execution);
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
        return $this->client->createAccountAuthSession($request, $execution);
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
        return $this->client->getAccountAuthState($request, $execution);
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
        return $this->client->importAccountAuthSession($request, $execution);
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
        return $this->client->startAccountAuth($request, $execution);
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
        return $this->client->startAccountQrAuth($request, $execution);
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
        return $this->client->submitAccountAuthCode($request, $execution);
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
        return $this->client->submitAccountAuthPassword($request, $execution);
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
        return $this->client->submitAccountPasskeyResponse($request, $execution);
    }
}
