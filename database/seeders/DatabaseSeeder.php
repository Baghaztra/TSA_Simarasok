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
            'password' => bcrypt('123123123'),
            'alias' => 'A',
            'roles' => 'admin',
            'status' => 'active',
        ]);
        User::factory(5)->create();

        Category::factory(5)->create();
        DestinasiPariwisata::factory(10)->create();
        Homestay::factory(20)->create();   
        UMKM::factory(20)->create();
        Produk::factory(15)->create();
        
        // gambar untuk tiap destinasi
        for ($i=1; $i <= 10; $i++) { 
            Asset::factory()->create([
                'nama' => ['dummy1.jpg', 'dummy2.jpg', 'dummy3.jpg'][rand(0, 2)],
                'tipe' => 'gambar',
                'jenis' => 'destinasi',
                'jenis_id' => $i,
            ]);
        }
        // gambar untuk tiap homestay
        for ($i=1; $i <= 20; $i++) { 
            Asset::factory()->create([
                'nama' => ['dummy1.jpg', 'dummy2.jpg', 'dummy3.jpg'][rand(0, 2)],
                'tipe' => 'gambar',
                'jenis' => 'homestay',
                'jenis_id' => $i,
            ]);
        }
        // gambar untuk tiap produk
        for ($i=1; $i <= 15; $i++) { 
            Asset::factory()->create([
                'nama' => ['dummy1.jpg', 'dummy2.jpg', 'dummy3.jpg'][rand(0, 2)],
                'tipe' => 'gambar',
                'jenis' => 'produk',
                'jenis_id' => $i,
            ]);
        }

        // Gambar lain kalau mau v:
        Asset::factory(20)->create();

        // Bookingan
        Booking::factory(20)->create();
    }
}
