<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/galleries', function () {
    return view('galleries');
})->name('galleries');

Route::get('/news', function () {
    return view('news');
})->name('news');

Route::get('/articles', function () {
    return view('articles');
})->name('articles');

Route::get('/show', function () {
    return view('show');
});

Route::get('/background', function () {
    return view('background');
})->name('background');

Route::get('/vision-mision', function () {
    return view('vision-mision');
})->name('vision-mision');

Route::get('/leadership', function () {
    return view('leadership');
})->name('leadership');

Route::get('/teachers', function () {
    return view('teachers');
})->name('teachers');

Route::get('/subjects', function () {
    return view('subjects');
})->name('subjects');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
