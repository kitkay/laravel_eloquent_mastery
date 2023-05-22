<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**
         * Insert data to our database.
         *  it is a key => value pair
         *
         * Upsert() to perform insert or update operations on large datasets
         *
         * 2 params, first is the array to update or insert and 2nd is the column to check?
         */
        $posts = DB::table('posts')
            ->upsert(
                [
                    //                'user_id' => 1,
                    'title' => 'X',
                    'slug' => 'x2321',
                    'excerpt' => 'excerptx',
                    'content' => 'Contentx',
                    'is_published' => true,
                    'min_to_read' => 10
                ],
                [
                    'title',
                    'slug'
                ]
            );

        dd($posts);
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
