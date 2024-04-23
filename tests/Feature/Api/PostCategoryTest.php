<?php

declare(strict_types=1);

namespace Api;

use App\Models\Category\PostCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Tests\TestCase;

class PostCategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_post_categories()
    {
        $postCategories = PostCategory::factory()->count(5)->create();

        $this->json(
            'GET',
            'api/post-categories',
            [],
            ['Accept' => 'application/json']
        )
            ->assertStatus(ResponseAlias::HTTP_OK)
            ->assertJsonStructure([
                'data' => [
                    'data' => [
                        '*' => [
                            'id',
                            'name',
                            'created_at',
                            'updated_at',
                            'deleted_at',
                        ],
                    ],
                ],
            ]);
    }

    public function test_create_post_category()
    {
        $postCategoryData = [
            'name' => 'Test Category',
        ];

        $this->json(
            'POST',
            'api/post-categories',
            $postCategoryData,
            ['Accept' => 'application/json'])
            ->assertStatus(ResponseAlias::HTTP_CREATED)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at',
                    'deleted_at',
                ],
            ]);
    }

    public function test_get_post_category()
    {
        $postCategory = PostCategory::factory()->create();

        $this->json(
            'GET',
            "api/post-categories/{$postCategory->id}",
            [],
            ['Accept' => 'application/json']
        )
            ->assertStatus(ResponseAlias::HTTP_OK)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at',
                    'deleted_at',
                ],
            ]);
    }

    public function test_update_post_category()
    {
        $postCategory = PostCategory::factory()->create();

        $updatedData = [
            'name' => 'Updated Test Category',
        ];

        $response = $this->json(
            'PUT',
            "api/post-categories/{$postCategory->id}",
            $updatedData,
            ['Accept' => 'application/json']
        )
            ->assertStatus(ResponseAlias::HTTP_OK)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at',
                    'deleted_at',
                ],
            ]);
    }

    public function test_destroy_post_category()
    {
        $postCategory = PostCategory::factory()->create();

        $this->json(
            'DELETE',
            "api/post-categories/{$postCategory->id}",
            [],
            ['Accept' => 'application/json']
        )
            ->assertStatus(ResponseAlias::HTTP_OK);
    }
}
