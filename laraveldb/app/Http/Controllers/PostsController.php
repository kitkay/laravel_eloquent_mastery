<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     *  53. insert creating models
     *
     * model instance refers to an instance of a model class which is
     * a representation of a database table.
     *
     * it is recommended that we use model instance
     * in Laravel as proper practice
     */
    public function index()
    {
        $posts = [
            [
                'user_id' => 5,
                'content' => 'User ID 5 content',
                'title' => 'User ID 5',
                'slug' => 'user-id-5',
                'excerpt' => 'excerpt 5',
                'is_published' => true,
                'min_to_read' => 5,
            ],
            [
                'user_id' => 3,
                'content' => 'User ID 3 content',
                'title' => 'User ID 3',
                'slug' => 'user-id-3',
                'excerpt' => 'excerpt 3',
                'is_published' => true,
                'min_to_read' => 5,
            ],
            [
                'user_id' => 9,
                'content' => 'User ID 9 content',
                'title' => 'User ID 9',
                'slug' => 'user-id-9',
                'excerpt' => 'excerpt 9',
                'is_published' => true,
                'min_to_read' => 9,
            ],
            [
                'user_id' => 10,
                'content' => 'User ID 10 content',
                'title' => 'User ID 10',
                'slug' => 'user-id-10',
                'excerpt' => 'excerpt 10',
                'is_published' => true,
                'min_to_read' => 5,
            ],

        ];

        foreach ($posts AS $post) {
            $postDb = new Post;
            $postDb->user_id = $post['user_id'];
            $postDb->content = $post['content'];
            $postDb->title = $post['title'];
            $postDb->slug = $post['slug'];
            $postDb->excerpt = $post['excerpt'];
            $postDb->is_published = $post['is_published'];
            $postDb->min_to_read = $post['min_to_read'];

            //inserting data
            $postDb->save();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     *
     */
    public function show(string $slug)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function readData(object $data): string {
        return '<pre>' . json_encode($data, JSON_PRETTY_PRINT) . '</pre>';
    }
}
