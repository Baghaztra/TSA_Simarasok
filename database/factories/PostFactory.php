<?php

namespace Database\Factories;

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
            'gambar' => fake()->imageUrl(),
            'user_id' => User::all()->random()->id,
            'category_id' => rand(1,3),
            'content' => fake()->paragraphs(3, true),
            'tanggal_post' => now(),
        ];
    }
}
