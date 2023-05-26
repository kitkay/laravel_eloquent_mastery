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
         * 38. Streaming Results Lazily
         *
         * lazy() - used to retrieve a large number of records without
         *          overwhelming the server's memory
         *
         * lazyById() - used to retrieve single record by its ID
         *            - useful when we want to retrieve specific row without loading record into memory at once.
         *
         * these are used to avoid memory consumption at once on our server
         */

        //This means we are retrieve 150 rows of data at a time
        $posts = DB::table('posts')
//            ->orderBy('id')
//            ->lazy(100)
//            ->each(function ($post) { //Passing each() is the same as foreach but instead inside the query
//                dump($post->title);
//            })
            ->where('id', 100)
            ->lazyById()
            ->first()
        ;

        dump($posts);
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
