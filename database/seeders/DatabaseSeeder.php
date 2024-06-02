<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();

        Category::factory()->create([
            'name' => 'Bencana',
            'jenis' => 'Berita',
        ]);
        Category::factory()->create([
            'name' => 'Info',
            'jenis' => 'Berita',
        ]);
        Category::factory()->create([
            'name' => 'Update',
            'jenis' => 'Berita',
        ]);
        Category::factory()->create([
            'name' => 'Makanan',
            'jenis' => 'UMKM',
        ]);
        Category::factory()->create([
            'name' => 'Cinderamata',
            'jenis' => 'UMKM',
        ]);

        Post::factory(10)->create();
        
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('123123123'),
            'alias' => 'A',
            'roles' => 'admin',
            'status' => 'active',
        ]);
    }
}
