<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'code'
    ];

    /**
     * Has Many Through
     * useful when we wanted to retrieve data from many-to-many relationship
     *  where the intermediate table has the additional column beyond the
     *  foreign keys.
     *
     *  users create post, users is associated with country
     *  in these scenario we have 3 models [user, post, country]
     *      country is associated with many users
     *      each user is associated with many post
     *
     *      Now when we want to retrieve post associated with country
     *      without defining a relationship between both.
     *
     *  add_country_id_to_users_table: migration
     *  country: migration
     *  Country: model
     *
     *
     * @return HasManyThrough
     */
    public function posts(): HasManyThrough
    {
        /**
         * 1st Param - Name of final model we need to access
         * 2nd Param - Name of intermediate model
         *
         * 3rd Param - foreign key of 2nd Param that connects to host model
         *              ~ here it is 'Country' Model
         *
         * 4th Param - foreign key of 1st Param that connects to intermediate model
         *             and in our case is the 2nd Param
         *
         * 5th Param - local keys of Country
         *
         * 6th Param - local keys of Users
         *
         * notice 5th and 6th is in connection
         *      like User model has the foreign id for country
         *      while country doesn't even care
         *
         * with this, we could retrieve all posts associated with user model
         *  under country model
         */
        return $this->hasManyThrough(
            Post::class,
            User::class,
            'country_id',
            'user_id',
            'id',
            'id'
        );
    }
}
