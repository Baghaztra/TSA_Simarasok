<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => fake()->sentence(),
            'slug' => Post::make_slug(fake()->sentence()),
            // 'gambar' => fake()->imageUrl(),
            'content' => fake()->paragraphs(5, true),
            'user_id' => User::all()->random()->id,
            'category_id' => rand(1,3),
            'status' => ['publish', 'draft'][rand(0, 1)],
        ];
    }
}
