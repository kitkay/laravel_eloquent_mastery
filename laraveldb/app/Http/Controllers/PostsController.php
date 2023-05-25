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
         * Increment or decrement allows us to decrease or increase column value
         *  by a given amount.
         *  by default amount in increase or decrease is set to null
         */
//        $posts = DB::table('posts')
//             ->where('id', 134)
//             ->increment('min_to_read', 7);
//             ->decrement('min_to_read', 7);

        /**
         * also we could increment of crease multiple values in laravel
         */
//        $posts = DB::table('posts')
//            ->where('id', '>', 111)
//            ->incrementEach(
//                [ 'min_to_read' => 3]
//            );

        /**
         * updateOrInsert() is used to update an existing record or insert
         * a new record if it does not exist.
         *
         * update row if ID exists and insert if no ID like that has been found
         */
        $posts = DB::table('posts')
            ->updateOrInsert([
                'excerpt' => 'Laravel',
                'content' => 'Laravel'
            ], ['id' => 134]);

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
