<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Asset;
use App\Models\User;
use App\Models\Category;
use App\Models\DestinasiPariwisata;
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
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('123123123'),
            'alias' => 'A',
            'roles' => 'admin',
            'status' => 'active',
        ]);
        User::factory(5)->create();

        Category::factory(5)->create();
        DestinasiPariwisata::factory(10)->create();
        Asset::factory(20)->create();
    }
}
