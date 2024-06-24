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
        $jenis = ['destinasi', 'homestay'][rand(0, 1)];
        $gambar = ['dummy1.jpg', 'dummy2.jpg', 'dummy3.jpg', 'dummy4.jpg', 'dummy5.jpg', 'dummy6.jpg', 'dummy7.jpg'][rand(0, 6)];
        $jenis_id = $jenis=='destinasi'?(DestinasiPariwisata::all()->random()->id):(Homestay::all()->random()->id);

        return [
            'nama' => $gambar,
            'tipe' => 'gambar',
            'jenis' => $jenis,
            'jenis_id' => $jenis_id,
        ];
    }
}
