<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Scopes\BalanceVerifiedScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * This is a lifecycle in laravel when model is booted and is called
     *
     * @return void
     */
    protected static function booted(): void
    {
        //Here we add global scope using addGlobalScope()
        static::addGlobalScope(new BalanceVerifiedScope());
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * contact()
     *
     * @return HasOne
     */
    public function contact(): HasOne
    {
        //Refer to current instance of the model
        return $this->hasOne(Contact::class);
    }

    /**
     * one to many
     *
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    /**
     * @return HasOneThrough
     */
    public function companyPhoneNumber(): HasOneThrough
    {
        /**
         * 1st Param - Model className: relationship owner
         * 2nd Param - Model className: joining table
         * 3rd Param - foreignKey of 2nd Param that
         *              connects to 1st Param
         * 4th Param - foreignKey of 2nd Param
         *              connects to 1st Param
         * 5th Param - local key 1st Param
         * 6th Param - local key 2nd Param
         */
        return $this->hasOneThrough(
            PhoneNumber::class,
            Company::class,
            'user_id',
            'company_id',
            'id',
            'id'
        );
    }

    /**
     * Has One of Many
     * useful whenretrieving the latest or oldest of the user post
     * condition is: if a user has many post or jobs save
     *  then latest or oldest will be applicable since use has many
     *  jobs or post, that is why "has one of many"
     *
     * latestOfMany - return latest job of many user
     *
     * @return HasOne
     */
    public function latestJob(): HasOne
    {
        return $this->hasOne(Job::class)->latestOfMany();
    }

    public function oldestJob(): HasOne
    {
        return $this->hasOne(Job::class)->oldestOfMany();
    }

}
