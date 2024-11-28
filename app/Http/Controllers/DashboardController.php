<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Inertia\Inertia;
use Inertia\Response;
use Redirect;

class DashboardController
{
    /**
     * @return \Inertia\Response
     */
    public function index(): Response
    {
        $articlesQuery = Article::with(['author'])->withCount('likedBy');
        $indexArticles = $articlesQuery->latest()->paginate(25)->onEachSide(1);
        $featuredArticles = $articlesQuery->get()->sortByDesc('liked_by_count')->take(3);

        return Inertia::render('Dashboard', [
            'articles' => $indexArticles,
            'articles_featured' => $featuredArticles,
        ]);
    }
}
