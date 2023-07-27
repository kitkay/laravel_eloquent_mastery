<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

trait PostScopes
{
    /**
     * Local scopes only has on param which is Builder
     *
     * Also, we could access this scope directly by just removing its prefix
     * e.g. scopePublished, then access using published() directly.
     *
     * @param Builder $builder
     *
     * @return Builder
     */
    public function scopePublished(Builder $builder): Builder
    {
        return $builder->where('is_published', false);
    }

    public function scopeWithUserData(Builder $builder)
    {
        return $builder->join(
            'users',
            'posts.user_id',
            '=',
            'users.id'
        )->select(
            'posts.*', 'users.name', 'users.email'
        );
    }

    /**
     * Dynamic scopes
     * Advantage is that we could filter result in an easy and efficient way.
     */
    public function scopePublishedByUser(
        Builder $builder,
        int $userId
    ): Builder {
        return $builder->where('user_id', $userId)
            ->whereNotNull('created_at');
    }
}
