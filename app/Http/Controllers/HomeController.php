<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Inertia\Inertia;
use Inertia\Response;
use Redirect;

class HomeController
{
    /**
     * @return \Inertia\Response
     */
    public function index(): Response
    {
        $articles = Article::with('author', 'likedBy')
            ->where('is_public', true)
            ->latest()
            ->paginate(25)
            ->onEachSide(1);

        return Inertia::render('Welcome', [
            'articles' => $articles,
        ]);
    }
}
