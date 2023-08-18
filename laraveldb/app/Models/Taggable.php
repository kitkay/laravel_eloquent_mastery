<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * This is intended to create
 * Many-to-Many polymorphic relationships
 *  between Tag, Post and Video Model
 */
class Taggable extends Model
{
    use HasFactory;
}
