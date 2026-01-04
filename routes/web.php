<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Models\DepartmentProfile;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/galleries', [GalleryController::class, 'index'])->name('galleries');

Route::get('/news', [ArticleController::class, 'news'])->name('articles.news');
Route::get('/show/{slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/articles', [ArticleController::class, 'article'])->name('articles.article');
Route::get('/article/category/{slug}', [ArticleController::class, 'category'])->name('articles.category');

Route::get('/show', function () {
    return view('show');
});

Route::controller(ProfileController::class)->group(function () {
    Route::get('/background', 'background')->name('profile.background');
    Route::get('/vision-mision', 'visionMission')->name('profile.vision-mision');
    Route::get('/leadership', 'leadership')->name('profile.leadership');
    Route::get('/contact', 'contact')->name('profile.contact');
});

Route::get('/teachers', function () {
    return view('teachers');
})->name('teachers');

Route::get('/subjects', function () {
    return view('subjects');
})->name('subjects');
