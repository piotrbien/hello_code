<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Services\Flasher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use Inertia\Response;
use Redirect;

class ArticleController extends Controller
{
    /**
     * @param \App\Services\Flasher $flasher
     */
    public function __construct(
        private readonly Flasher $flasher,
    ) {
        //
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $articles = Article::latest()->paginate(25)->onEachSide(1);

        return Inertia::render('Article/Index', [
            'articles' => $articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        Gate::authorize('create', Article::class);

        return Inertia::render('Article/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request): RedirectResponse
    {
        Gate::authorize('create', Article::class);

        /** @var \App\Models\User $user */
        $user = $request->user();

        /** @var \App\Models\Article $article */
        $article = $user->articles()->create($request->validated());

        $this->flasher->success("Article [{$article->title}] created successfully!");

        return Redirect::route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article): Response
    {
        return Inertia::render('Article/Show', [
            'article' => $article->load(['author', 'comments.author']),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article): Response
    {
        Gate::authorize('update', $article);

        return Inertia::render('Article/Edit', [
            'article' => $article,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        Gate::authorize('update', $article);

        $article->update($request->validated());

        $this->flasher->success("User [{$article->title}] updated successfully!");

        return Redirect::route('articles.index');
    }
}
