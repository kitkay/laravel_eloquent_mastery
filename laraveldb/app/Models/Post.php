<?php

namespace App\Models;

use App\Models\Scopes\PublishWithinThirtyDaysScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
    use HasFactory, SoftDeletes, Prunable, PostScopes;

    /**
     * Relationships refer to the connections between different entities in a database
     *
     * it is used to organized and manage data effectively, easier to access data
     *
     * cons - can be complex to set up for many tables and can lead to slower data operations
     * unless manage correctly
     */

    protected $fillable = [
        'user_id', 'title', 'slug', 'excerpt', 'content', 'min_to_read', 'is_published'
    ];

    protected $guarded = []; //means allow all attr for mass assignment

    protected $table = 'posts';

    // branch 64
//    protected static function booted(): void
//    {
    //Anything that run in this model would definitely add this constraint
    // If we do not access this constraint the just use Model::withoutGlobalScopes()->get();
//        static::addGlobalScope(new PublishWithinThirtyDaysScope());
//    }

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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Many-to-many relationship would create an intermediate tabl
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(
            Tag::class
        );
    }

    /**
     * attach() is used to insert data into the pivot table
     * where it will associate the post with tags with the given ids
     * e.g $post->tags()->attach(array $Ids)
     *
     * detach() is used to remove data from
     * many-to-many relationship
     *
     * e.g $post->tags()->detach(array $Ids) - remove all id indicated
     * e.g $post->tags()->detach() - remove all
     * e.g $post->tags()->detach(1) - remove single id or specific id.
     *
     * updateExistingPivot() - allows you to update a single
     * record on the intermediate table
     * it has 2 params
     *      $paramOne - id of the table being used in our case Tag()
     *      $paramTwo - array passing key value
     *     e.g. ['id_col_in_intermediate_tbl' => (int)id to use fr tag tbl]
     *
     * now, creating a single tag to several posts
     *  we do create $postIds = [idsOfPost];
     *  $tag = Tag::find(idOfTagToinsertToPost)
     *  $tag->posts()->attach($postIds);
     *
     * Eager loading - loading all necessary data in advance.
     * better use when collecting data from other model for related use.
     * Model::with('tblName')->get();
     *
     * HasOneThrough() - allows you to define a direct association between
     * two models through a third intermediate model.
     * - useful when use to access intermediate model to retrieve
     *   the data of the second model.
     *   if two models is indirectly connected by an intermediate model
     *      that connects them.
     *  e.g a user has a company number but in order to get it you need to
     *  use user then access company to get its number.
     *
     *    user has no direct access to phonenumber but company has
     *    so: user(id) <- company(user_id), company(id) -> phone#(company_id)
     */
}
