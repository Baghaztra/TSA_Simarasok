<?php

namespace Database\Seeders;

use App\Models\DestinasiPariwisata;
use Illuminate\Database\Seeder;
use App\Models\Provider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ini kalau semisal datanya dibikin default
        DestinasiPariwisata::factory()->create([
            'name' => 'Goa Ngalau Nan Panjang',
            'desc' => 'blub blub blub blub blub blub blub blub',
            'harga' => 10000,
            'notelp' => '+628' . fake()->numerify('##########'),
            'lokasi' => 'https://maps.google.com/?q=',
            'status' => 'Normal',
        ]);

        Provider::factory()->create([
            'name' => 'Telkomsel',
        ]);
        Provider::factory()->create([
            'name' => 'XL Axiata',
        ]);
        Provider::factory()->create([
            'name' => 'Indosat',
        ]);
        Provider::factory()->create([
            'name' => 'Smartfren',
        ]);
    }
}
