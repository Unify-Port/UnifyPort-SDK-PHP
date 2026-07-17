<?php

declare(strict_types=1);

namespace UnifyPort\Sdk;

use UnifyPort\Sdk\Generated\OperationCatalog;
use UnifyPort\Sdk\Generated\UnifyPortDeviceClientMethods;
use UnifyPort\Sdk\Http\Runtime;

final class UnifyPortDeviceClient
{
    use UnifyPortDeviceClientMethods;

    private readonly Runtime $runtime;

    public function __construct(ClientConfig $config)
    {
        $this->runtime = new Runtime($config);
    }

    /**
     * @param array{
     *   params?: array{
     *     path?: array<string, scalar>,
     *     query?: array<string, scalar|list<scalar>|null>,
     *     header?: array<string, string>
     *   },
     *   body?: mixed
     * }|OperationRequest $request
     * @return ApiResult<mixed>
     */
    private function executeOperation(
        string $operationId,
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution,
    ): ApiResult {
        $input = is_array($request) ? OperationRequest::fromArray($request) : $request;

        return $this->runtime->execute(OperationCatalog::get($operationId), $input, $execution);
    }
}
