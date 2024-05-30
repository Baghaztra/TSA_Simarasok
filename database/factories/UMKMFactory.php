<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UMKM;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UMKM>
 */
class UMKMFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Lorem Ipsum',
            'category_id' => rand(1,3),
        ];
    }
}
