<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'address', 'number', 'city', 'zip_code'
    ];

    /**
     * user()
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        //This simple means it belongs to 1 user.
        return $this->belongsTo(
            User::class
        );
    }
}
