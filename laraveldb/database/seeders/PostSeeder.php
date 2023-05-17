<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Make a collection of data to insert
        $posts = collect([
            [
                'title' => 'Post One',
                'slug' => 'post-one',
                'excerpt' => 'Excerpt of post one',
                'content' => 'Content of post one',
                'is_published' => true,
                'min_to_read' => 2
            ],
            [
                'title' => 'Post Two',
                'slug' => 'post-two',
                'excerpt' => 'Excerpt of post two',
                'content' => 'Content of post two',
                'is_published' => true,
                'min_to_read' => 2
            ],
        ]);

        /**
         * We could use foreach loop but since its a collection
         * we could use ->each() looping all over posts
         */
        $posts->each(function ($post) {
            //Downside of insert, it won't add timestamp for created_at updated_at
//            Post::insert($post);
            //Instead use
            Post::create([
                'title' => $post['title'],
                'slug' => $post['slug'],
                'excerpt' => $post['excerpt'],
                'content' => $post['content'],
                'is_published' => $post['is_published'],
                'min_to_read' => $post['min_to_read']
            ]);
        });
    }
}
