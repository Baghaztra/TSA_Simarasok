<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Homestay>
 */
class HomestayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'desc' => fake()->paragraphs(3, true),
            'notelp' => fake()->phoneNumber(),
            'harga' => rand(10, 100)*10000,
        ];
    }
}