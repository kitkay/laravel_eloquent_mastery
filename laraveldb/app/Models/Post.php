<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static cursorPaginate(int $int)
 * @method static simplePaginate(int $int)
 * @method static firstOrCreate()
 * @method static firstOrNew(string[] $array, array $array1)
 * @method static find(int $int)
 * @method static updateOrCreate(int[] $array, array $array1)
 * @method static upsert(array $array, array $array1)
 * @method static truncate()
 * @method static latest()
 * @method static where(string $string, string $string1, \Illuminate\Support\Carbon $subMonth)
 * @method static create(array $data)
 */
class Post extends Model
{
    use HasFactory, SoftDeletes, Prunable;
    protected $fillable = [];

    protected $guarded = []; //means allow all attr for mass assignment

    protected $table = 'posts';

    public function prunable(): Builder
    {
        //Simply we remove soft deleted data with a month ago
        //It will automatically clean it up on the database.
        //For this to work we need to setup scheduler.
        //Scheduler BTW runs on background.
        return static::where(
            'deleted_at',
            '<=',
            now()->subMonth()
        );
    }

    /**
     * Changing the primary key - like making a custom primary key
     * here we use slug as custom primary key
     * when using ID to find certain row it will return null since we use slug as primary key
     */
//    protected $primaryKey = 'id';

    /**
     * Changing auto increment key
     *
     * telling eloquent not to increment a primary key - when new record is inserted to db
     * disabling auto increment need to set manually a primary key value to each record
     *  otherwise, it will cause error.
     * recommended not to touch it
     */
    public $incrementing = false;

    /**
     * changing data type of primary key
     * telling primary key as string instead of default int.
     */
    protected $keyType = 'string';

    /**
     * Disabling created_at and updated_at cols
     * tells eloquent to not touch created_at and updated_at when new row is created
     */
//    public $timestamps = false;

    /**
     * Custom format models timestamp
     * it would use to specify format to be used on our models timestamp
     * default: Y-m-d H:i:s
     * custom
     */
//    protected $dateFormat = 'U';

    /**
     * Customize names of timestamps
     */
//    const CREATED_AT = 'date_created_at';
//    const UPDATED_AT = 'date_update_at';

    /**
     * Set default attr. values
     * should be an associative arrays
     *
     * recommended that default values are made on our database since
     *  the integrity level is passed directed and is manage by our database.
     *
     * setting default attributes would send default value to DB whenever user didn't add
     *      data for it.
     */
    protected $attributes = [
        "user_id" => 1,
//        "is_published" => false,
        "content" => "Please add content"
    ];

    /**
     * Changing the DB interacting with a particular model.
     * useful when working with multiple database.
     *
     * here we defined sqlite to be used as database connection only for this model
     * and not to other model.
     */
//    protected $connection = 'sqlite';
}
