<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    /**
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
}
