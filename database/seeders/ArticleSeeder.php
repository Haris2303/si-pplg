<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $category = Category::where('slug', 'pemrograman-web')->first();

        if (!$user || !$category) {
            $this->command->error('❌ ERROR: Pastikan sudah ada minimal 1 User dan 1 Category di database!');
            return;
        }

        $this->command->info('🚀 Sedang membuat 10 artikel dummy...');

        Article::factory(10)->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
        ]);

        $this->command->info('✅ Mantap! 10 Artikel berhasil dibuat.');
    }
}
