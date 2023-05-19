<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //From hard coded json here, we will use the json we created.
        $json = File::get('database/json/posts.json');
        $posts = collect(json_decode($json));

        /**
         * We could use foreach loop but since its a collection
         * we could use ->each() looping all over posts
         */
        $posts->each(function ($post) {
            // Downside of insert, it won't add timestamp for created_at updated_at
            // Post::insert($post);
            // Instead use
            Post::create([
                'title' => $post->title,
                'user_id' => $post->user_id,
                'slug' => $post->slug,
                'excerpt' => $post->excerpt,
                'content' => $post->content,
                'is_published' => $post->is_published,
                'min_to_read' => $post->min_to_read
            ]);
        });
    }
}
