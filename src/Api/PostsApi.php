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
 * @phpstan-import-type GetPostOperationRequest from ApiTypes
 * @phpstan-import-type GetPostOperationResponse from ApiTypes
 * @phpstan-import-type ListPostCommentsOperationRequest from ApiTypes
 * @phpstan-import-type ListPostCommentsOperationResponse from ApiTypes
 * @phpstan-import-type ListPostsOperationRequest from ApiTypes
 * @phpstan-import-type ListPostsOperationResponse from ApiTypes
 * @phpstan-import-type ReplyPostCommentOperationRequest from ApiTypes
 * @phpstan-import-type ReplyPostCommentOperationResponse from ApiTypes
 */
final readonly class PostsApi
{
    public function __construct(private UnifyPortDeviceClient $client)
    {
    }

    /**
     * 获取帖子详情
     *
     * @param GetPostOperationRequest|OperationRequest $request
     * @return ApiResult<GetPostOperationResponse>
     */
    public function getPost(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->getPost($request, $execution);
    }

    /**
     * 列出帖子的一级评论
     *
     * @param ListPostCommentsOperationRequest|OperationRequest $request
     * @return ApiResult<ListPostCommentsOperationResponse>
     */
    public function listPostComments(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->listPostComments($request, $execution);
    }

    /**
     * 列出本账号帖子
     *
     * @param ListPostsOperationRequest|OperationRequest $request
     * @return ApiResult<ListPostsOperationResponse>
     */
    public function listPosts(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->listPosts($request, $execution);
    }

    /**
     * 发布一级评论或回复一级评论
     *
     * @param ReplyPostCommentOperationRequest|OperationRequest $request
     * @return ApiResult<ReplyPostCommentOperationResponse>
     */
    public function replyPostComment(
        array|OperationRequest $request,
        ?RequestExecutionOptions $execution = null,
    ): ApiResult {
        return $this->client->replyPostComment($request, $execution);
    }
}
