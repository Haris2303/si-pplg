<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsCategory = Category::where('slug', 'berita')->first();

        if (!$newsCategory) {
            $this->command->error('❌ ERROR: Kategori dengan slug "berita" tidak ditemukan!');
            $this->command->warn('💡 Solusi: Buat dulu kategori bernama "Berita" di Admin Panel Filament.');
            return;
        }

        $author = User::first();

        if (!$author) {
            $this->command->error('❌ ERROR: Belum ada data User!');
            $this->command->warn('💡 Solusi: Buat minimal satu user dulu.');
            return; // Stop proses
        }

        $count = 50;
        $this->command->info("🚀 Memulai proses pembuatan $count Berita dummy...");

        Article::factory()->count($count)->create([
            'category_id' => $newsCategory->id, // Semua masuk kategori berita
            'user_id' => $author->id, // Semua ditulis oleh user pertama tadi
        ]);

        $this->command->info("✅ SUKSES: $count Berita berhasil ditambahkan ke database!");
    }
}
