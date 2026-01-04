<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\DepartmentProfile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $profile = DepartmentProfile::first();

        $news = Article::with('category')
            ->whereHas('category', function ($query) {
                $query->where('slug', 'berita');
            })
            ->where('is_published', true)
            ->latest()
            ->take(3)
            ->get();

        // 2. Ambil Berita Terbaru (Limit 5)
        $articles = Article::with('category')
            ->whereHas('category', function ($query) {
                $query->where('slug', '!=', 'berita');
            })
            ->where('is_published', true)->latest()->take(6)->get();

        return view('welcome', compact('profile', 'news', 'articles'));
    }
}
