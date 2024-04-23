<?php

declare(strict_types=1);

namespace Database\Factories\Category;

use App\Models\Category\PostCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PostCategory>
 */
class PostCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
        ];
    }
}
