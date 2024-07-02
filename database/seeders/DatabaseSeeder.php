<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Asset;
use App\Models\Booking;
use App\Models\User;
use App\Models\Category;
use App\Models\DestinasiPariwisata;
use App\Models\Homestay;
use App\Models\Post;
use App\Models\Produk;
use App\Models\UMKM;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('1'),
            'alias' => 'A',
            'roles' => 'admin',
            'status' => 'active',
        ]);
        // User::factory(5)->create();

        Category::factory(5)->create();
        DestinasiPariwisata::factory(10)->create();
        Homestay::factory(20)->create();
        Post::factory(30)->create();

        // UMKM::factory(20)->create();

        // produk untuk tiap umkm
        /* for ($i=1; $i < 20; $i++) {
            Produk::factory()->create([
                'name' => fake()->words(2, true),
                'desc' => fake()->paragraphs(3, true),
                'harga' => rand(5, 50)*1000,
                'umkm_id' => $i,
            ]);
        } */
        // produk lain
        Produk::factory(30)->create();

        // gambar untuk tiap destinasi
        for ($i=1; $i <= 10; $i++) {
            Asset::factory()->create([
                'nama' => ['D1','D2','D3','D4','D5'][rand(0, 4)] . '.jpg',
                'tipe' => 'gambar',
                'jenis' => 'destinasi',
                'jenis_id' => $i,
            ]);
        }
        // gambar untuk tiap homestay
        for ($i=1; $i <= 20; $i++) {
            Asset::factory()->create([
                'nama' => ['H1','H2','H3','H4','H5'][rand(0, 4)] . '.jpg',
                'tipe' => 'gambar',
                'jenis' => 'homestay',
                'jenis_id' => $i,
            ]);
        }

        // gambar untuk tiap produk (20+15)
        for ($i=1; $i <= 35; $i++) {
            Asset::factory()->create([
                'nama' => ['K1','K2','K3','K4'][rand(0, 3)] . '.jpg',
                'tipe' => 'gambar',
                'jenis' => 'produk',
                'jenis_id' => $i,
            ]);
        }

        // gambar untuk tiap Post
        for ($i=1; $i <= 30; $i++) {
            Asset::factory()->create([
                'nama' => ['P1','P2','P3','P4'][rand(0, 3)] . '.jpg',
                'tipe' => 'gambar',
                'jenis' => 'post',
                'jenis_id' => $i,
            ]);
        }

        // Gambar lain kalau mau v:
        Asset::factory(50)->create();

        // Bookingan
        // Booking::factory(20)->create();
    }
}
