<?php

declare(strict_types=1);

namespace App\Services\Category;

use App\Models\Category\PostCategory;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PostCategoryService
{
    public function getPostCategories(): LengthAwarePaginator
    {
        return PostCategory::paginate(15);
    }

    public function createPostCategory(array $request): PostCategory
    {
        $name = $request['name'];

        $postCategory = new PostCategory();
        $postCategory->name = $name;
        $postCategory->save();

        return $postCategory->refresh();
    }

    public function getPostCategory(PostCategory $postCategory): PostCategory
    {
        return $postCategory;
    }

    public function updatePostCategory(PostCategory $postCategory, array $request): PostCategory
    {
        $name = $request['name'];

        $postCategory->name = $name;
        $postCategory->save();

        return $postCategory->refresh();
    }

    public function destroyPostCategory(PostCategory $postCategory): ?bool
    {
        return $postCategory->delete();
    }
}
