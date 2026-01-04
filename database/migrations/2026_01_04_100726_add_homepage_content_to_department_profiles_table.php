<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('department_profiles', function (Blueprint $table) {
            // 1. Banner Slider (Array Gambar)
            $table->json('hero_slides')->nullable();

            // 2. Moto (Array: Gambar, Judul, Deskripsi)
            $table->json('motos')->nullable();

            // 3. Penjelasan Website
            $table->string('welcome_title')->nullable();
            $table->text('welcome_description')->nullable();

            // 4. Tentang Kompetensi
            $table->text('about_description')->nullable();
            $table->string('about_image')->nullable(); // Foto Kajur/Kaprodi

            // 5. Video
            $table->string('video_url')->nullable(); // Link YouTube
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('department_profiles', function (Blueprint $table) {
            $table->dropColumn(['hero_slides', 'motos', 'welcome_title', 'welcome_description', 'about_description', 'about_image', 'video_url']);
        });
    }
};
