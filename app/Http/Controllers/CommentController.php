<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Article;
use App\Models\Comment;
use App\Services\Flasher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Redirect;

class CommentController extends Controller
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
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request, Article $article): RedirectResponse
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        $article->comments()->create([
            'user_id' => $user->id,
            'content' => $request->validated('content'),
        ]);

        $this->flasher->success('Comment created successfully!');

        return Redirect::route('articles.show', $article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Article $article, Comment $comment): RedirectResponse
    {
        Gate::authorize('update', $comment);

        $comment->update([
            'content' => $request->validated('content'),
        ]);

        $this->flasher->success('Comment updated successfully!');

        return Redirect::route('articles.show', $article);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Article $article
     * @param \App\Models\Comment $comment
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toggleLike(Request $request, Article $article, Comment $comment): RedirectResponse
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        $comment->likedBy()->toggle($user);

        return Redirect::route('articles.show', $article);
    }
}
