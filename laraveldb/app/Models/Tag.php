<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Tag extends Model
{
    use HasFactory;

    /**
     * * Many-to-many relationship would create an intermediate table
     *  or intermediary table which in our case post_tag tbl
     *
     * PIVOT table
     * is the table that we connect two different tables to output a data
     * without repeating it
     *
     * name should be understandable that it connects two tables
     * separated by _
     */

    protected $fillable = [
        'name', 'slug'
    ];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(
            Post::class
        );
    }

    /**
     * MorphMany is the type that enables Many-to-Many
     *
     * Param 1 - name of the related model
     * Param 2 - name of the polymorphic relationship
     *
     * @return MorphMany
     */
    public function taggables(): MorphMany
    {
        return $this->morphToMany(
            Taggable::class,
            'taggable'
        );
    }
}
