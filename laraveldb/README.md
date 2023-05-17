# Mastering Migrations

### Squashing migrations
### Result is the file generated is located to ./database/schema
````
php artisan schema:dump
````

### Pruning migration
````
php artisan migrate:reset

then

php artisan schema:dump --prune
````

### Adding columns, Renaming columns, Delete column
````
php artisan make:migration verb_col_in_tbl --table=tbl_you_want_to_renames
````

### Factories and Seeders
Seeders - real is needed.<br/>
Factories - used when generating fake data.

### Creating Factories
````
php artisan make:factory PostFactory
php artisan make:model TableName -f (-f flag would generate a factory)
````

### Creating Seeders 
````
php artisan make:seeder PostSeeder

(only works when you add the factory inside the factory seeder.)
php artisan db:seed
 
or  php artisan db:seed --class=NameOfSeeder

php artisan migrate --seed will migrate first all migrations then seed
````
### Another best practice of using Seeder
Create a json file instead then use that to populate DB <br/>
create database/json/table.json to which we are going to seed <br/>
Then, <br/>
````
$json = File::get('database/json/posts.json'); <br/>
$posts = collect(json_decode($json)); <br/>
````
Then loop using ->each()
````
$posts->each(function ($post) {
    Post::create([
    'title' => $post->title,
    'slug' => $post->slug,
    'excerpt' => $post->excerpt,
    'content' => $post->content,
    'is_published' => $post->is_published,
    'min_to_read' => $post->min_to_read
    ]);
});
````
