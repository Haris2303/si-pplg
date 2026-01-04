<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(rand(6, 12));

        $content = collect(fake()->paragraphs(rand(3, 8)))
            ->map(fn($p) => "<p>" . $p . "</p>")
            ->implode('');

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'thumbnail' => 'https://picsum.photos/seed/' . rand(1, 99999) . '/800/450',
            'content' => $content,
            'is_published' => true,
            'created_at' => fake()->dateTimeBetween('-1 months', 'now'),
            'updated_at' => now()
        ];
    }
}
