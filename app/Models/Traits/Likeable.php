<?php

namespace App\Models\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait Likeable
{
    /**
     * @inheritDoc
     */
    public function likedBy(): MorphToMany
    {
        return $this->morphToMany(User::class, 'likeable', 'user_liked_resources');
    }
}
