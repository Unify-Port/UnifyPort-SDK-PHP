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
 * @phpstan-import-type GetWorkspaceOperationRequest from ApiTypes
 * @phpstan-import-type GetWorkspaceOperationResponse from ApiTypes
 * @phpstan-import-type UpdateWorkspaceOperationRequest from ApiTypes
 * @phpstan-import-type UpdateWorkspaceOperationResponse from ApiTypes
 */
final readonly class WorkspaceApi
{
    public function __construct(private UnifyPortDeviceClient $client)
    {
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
        return $this->client->getWorkspace($request, $execution);
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
        return $this->client->updateWorkspace($request, $execution);
    }
}
