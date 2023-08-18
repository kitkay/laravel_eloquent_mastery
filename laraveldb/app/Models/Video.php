<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'url', 'description'
    ];

    /**
     * On to Many Polymorphic
     *
     * Param 1 - Model related
     *
     * @return MorphMany
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(
            Comment::class,
            'commentable'
        );
    }

    /**
     * Many-to-Many polymorphic relationship
     * @return MorphToMany
     */
    public function tagsMany(): MorphToMany
    {
        return $this->morphToMany(
            Tag::class,
            'taggable'
        );
    }
}
