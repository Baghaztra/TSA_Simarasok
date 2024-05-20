<?php

namespace Database\Factories;

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
        $categ = ['B','I','U'];
        return [
            'judul' => fake()->sentence(),
            'gambar' => fake()->imageUrl(),
            'category_id' => $categ[array_rand($categ)],
            'content' => fake()->paragraphs(3, true),
            'tanggal_post' => now(),
        ];
    }
}
