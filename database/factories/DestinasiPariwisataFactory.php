<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DestinasiPariwisata>
 */
class DestinasiPariwisataFactory extends Factory
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
            'harga' => rand(10, 500)*1000,
            'notelp' => '+62' . fake()->numerify('###########'),
            'lokasi' => 'https://maps.google.com/?q=' . fake()->latitude . ',' . fake()->longitude,
        ];
    }
}
