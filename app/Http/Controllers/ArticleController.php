<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function news()
    {
        $articles = Article::with(['category', 'user'])
            ->where('is_published', true)
            ->whereHas('category', function (Builder $query) {
                $query->where('slug', 'berita');
            })
            ->latest()
            ->paginate(6);

        return view('articles.news', compact('articles'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('articles.show', compact('article'));
    }

    public function article(Request $request)
    {
        $search = $request->input('search');

        $baseQuery = Article::with(['category', 'user'])
            ->where('is_published', true)
            ->whereHas('category', function (Builder $query) {
                $query->where('slug', '!=', 'berita');
            });

        $featured = null;

        if ($search) {
            $baseQuery->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%');
            });
        } else {
            $featured = (clone $baseQuery)->latest()->first();

            if ($featured) {
                $baseQuery->where('slug', '!=', $featured->slug);
            }
        }

        $articles = $baseQuery->latest()->paginate(6);

        if ($search) {
            $articles->appends(['search' => $search]);
        }

        // $featured = Article::with(['category', 'user'])
        //     ->where('is_published', true)
        //     ->whereHas('category', function (Builder $query) {
        //         $query->where('slug', '!=', 'berita');
        //     })
        //     ->latest()
        //     ->first();

        // $articles = Article::with(['category', 'user'])
        //     ->where('is_published', true)
        //     ->whereHas('category', function (Builder $query) {
        //         $query->where('slug', '!=', 'berita');
        //     })
        //     ->when($featured, function ($query) use ($featured) {
        //         return $query->where('slug', '!=', $featured->slug);
        //     })
        //     ->latest()
        //     ->paginate(6);

        $categories = Category::withCount('articles')->get();

        return view('articles.articles', compact('featured', 'articles', 'categories', 'search'));
    }
}
