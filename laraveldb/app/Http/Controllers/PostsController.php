<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     *  58. UpdateOrCreate and Upserting Models
     *
     *  updateOrCreate() - best use is when creating API
     *                     if we wanted to update a post
     *                     or create if it still doesn't exist.
     *
     * upsert()
     */
    public function index()
    {
//        $post = Post::updateOrCreate(
//            [
//                'id' => 1
//            ],
//            [
//                'user_id' => 5,
//                'title' => 'Five 8 branch for one',
//                'slug' => 'five-8-branch-for-one',
//                'excerpt' => '58 branch',
//                'content' => 'This is an updated content from 58',
//                'is_published' => false,
//                'min_to_read' => 5,
//            ]
//        );

        //Upsert
        $post = Post::upsert(
            [
                'id' => 125,
                'user_id' => 5,
                'title' => 'Upserting Data',
                'slug' => 'upserting-data',
                'excerpt' => 'upsert data',
                'content' => 'Upserting!!',
                'is_published' => true,
                'min_to_read' => 5,
            ],
            [
                //Params here means we find by ID without
                //setting ID to a value just to find.
                'id'
            ]
        );
        return $post;
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

    private function readData(LengthAwarePaginator $data)
    {
        return '<pre>'
            . json_encode($data, JSON_PRETTY_PRINT)
            . '</pre>';
    }
}
