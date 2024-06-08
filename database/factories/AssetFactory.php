<?php

namespace Database\Factories;

use App\Models\DestinasiPariwisata;
use App\Models\Homestay;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asset>
 */
class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $homestayIds = Homestay::pluck('id')->toArray(); // Ambil semua ID homestay dalam bentuk array

        return [
            'name' => fake()->name(),
            'email' => fake()->email(),
            'notelp' => '+62' . fake()->numerify('###########'),
            'checkin' => fake()->date(),
            'checkout' => fake()->date(),
            'homestay_id' => fake()->randomElement($homestayIds), // Pilih random ID dari array
        ];
    }

}
