<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Category;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostCategoryRequest;
use App\Http\Requests\UpdatePostCategoryRequest;
use App\Models\Category\PostCategory;
use App\Services\Category\PostCategoryService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Throwable;

class PostCategoryController extends Controller
{
    private PostCategoryService $postCategoryService;

    public function __construct(PostCategoryService $postCategoryService)
    {
        $this->postCategoryService = $postCategoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @throws ApiException
     */
    public function index(): JsonResponse
    {
        try {
            return response()->json(
                [
                    'result' => true,
                    'message' => 'success',
                    'data' => $this->postCategoryService->getPostCategories(),
                ],
                ResponseAlias::HTTP_OK
            );
        } catch (Throwable $e) {
            throw new ApiException(
                (string) $e->getCode() ?: (string) ResponseAlias::HTTP_UNPROCESSABLE_ENTITY,
                $e->getMessage()
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @throws ApiException
     */
    public function store(StorePostCategoryRequest $request): JsonResponse
    {
        try {
            return response()->json(
                [
                    'result' => true,
                    'message' => 'store success',
                    'data' => $this->postCategoryService->createPostCategory($request->all()),
                ],
                ResponseAlias::HTTP_CREATED
            );
        } catch (Throwable $e) {
            throw new ApiException(
                (string) $e->getCode() ?: (string) ResponseAlias::HTTP_UNPROCESSABLE_ENTITY,
                $e->getMessage()
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @throws ApiException
     */
    public function show(PostCategory $postCategory): JsonResponse
    {
        try {
            return response()->json(
                [
                    'result' => true,
                    'message' => 'success',
                    'data' => $this->postCategoryService->getPostCategory($postCategory),
                ],
                ResponseAlias::HTTP_OK
            );
        } catch (Throwable $e) {
            throw new ApiException(
                (string) $e->getCode() ?: (string) ResponseAlias::HTTP_UNPROCESSABLE_ENTITY,
                $e->getMessage()
            );
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostCategory $postCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @throws ApiException
     */
    public function update(UpdatePostCategoryRequest $request, PostCategory $postCategory): JsonResponse
    {
        try {
            return response()->json(
                [
                    'result' => true,
                    'message' => 'update success',
                    'data' => $this->postCategoryService->updatePostCategory($postCategory, $request->all()),
                ],
                ResponseAlias::HTTP_OK
            );
        } catch (Throwable $e) {
            throw new ApiException(
                (string) $e->getCode() ?: (string) ResponseAlias::HTTP_UNPROCESSABLE_ENTITY,
                $e->getMessage()
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @throws ApiException
     */
    public function destroy(PostCategory $postCategory): JsonResponse
    {
        try {
            return response()->json(
                [
                    'result' => true,
                    'message' => 'destroy success',
                    'data' => $this->postCategoryService->destroyPostCategory($postCategory),
                ],
                ResponseAlias::HTTP_OK
            );
        } catch (Throwable $e) {
            throw new ApiException(
                (string) $e->getCode() ?: (string) ResponseAlias::HTTP_UNPROCESSABLE_ENTITY,
                $e->getMessage()
            );
        }
    }
}
