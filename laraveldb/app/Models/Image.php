<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'url', 'imageable_id', 'imageable_type'
    ];

    /**
     * One to One polymorphic
     * morphTo() - looking to morph
     *
     * Param 1 - The model that allows morphing
     * Param 2 - name of the method from Param 1 that allows to morph
     *
     * @return MorphTo
     */
    public function imageable(): MorphTo
    {
        return $this->morphTo();
    }
}
