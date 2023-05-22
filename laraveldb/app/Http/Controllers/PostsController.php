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
         * We add inserOrIgnore() allows us to insert data into a
         * database table only if the data doesn't already exist
         * in the table.
         * This is to ensure that there are no duplicates will happen
         */
        $posts = DB::table('posts')
            ->insertOrIgnore([
                [
                    //                'user_id' => 1,
                    'title' => 'Inserted through the DB facade2.',
                    'slug' => 'inserted-through-the-db-facade2',
                    'excerpt' => 'excerpt2',
                    'content' => 'Content2',
                    'is_published' => true,
                    'min_to_read' => 2
                ],
                [
                    //                'user_id' => 1,
                    'title' => 'Inserted through the DB facade7.',
                    'slug' => 'inserted-through-the-db-facade7',
                    'excerpt' => 'excerpt6',
                    'content' => 'Content6',
                    'is_published' => true  ,
                    'min_to_read' => 5
                ],
            ])
        ;

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
