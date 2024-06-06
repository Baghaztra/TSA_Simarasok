<?php

namespace Database\Factories;

use App\Models\DestinasiPariwisata;
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
        return [
            'nama' => 'dummy.jpg',
            'tipe' => 'gambar',
            // 'jenis' => ['destinasi', 'produk'][rand(0, 1)],
            'jenis' => 'destinasi',
            'jenis_id' => DestinasiPariwisata::all()->random()->id,
        ];
    }
}
