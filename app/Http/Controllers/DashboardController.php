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
        $articles = Article::with('author')->latest()->paginate(25)->onEachSide(1);

        return Inertia::render('Dashboard', [
            'articles' => $articles,
        ]);
    }
}
