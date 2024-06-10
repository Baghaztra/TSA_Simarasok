<?php

namespace Database\Factories;

use App\Models\UMKM;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produk>
 */
class ProdukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(2, true),
            'desc' => fake()->paragraphs(3, true),
            'harga' => rand(5, 50)*1000,
            'umkm_id' => UMKM::all()->random()->id,
        ];
    }
}
