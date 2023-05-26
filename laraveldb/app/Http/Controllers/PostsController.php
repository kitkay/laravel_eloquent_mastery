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
         * Database Transactions.
         *
         * Pessimistic Locking - for consistency, ensure only one user could update column at a time
         *                     - users could access same data without conflicting each other.
         *     lockForUpdate() - cannot be overwritten as long as transaction is not yet done.
         *     sharedLock() - locking rows in a table, users could still read the row but cannot modify
         *                    until the lock is released. Preferred use to allow users to read still.
         *
         * Chunking Data  - retrieves data in smaller more manageable "CHUNKS" rather than getting all data
         *                  and chunking it afterwards.
         *                  More efficient on larger datasets.
         */
//        $var = DB::transaction(function () {        //Start of Pessimistic Locking
            //Get balance to user1 (increment)
//            DB::table('users')
//                ->where('id', 1)
//                ->sharedLock()
//                ->decrement('balance', 20);

            //Add balance to user2 (increment)
//            DB::table('users')
//                ->where('id', 2)
//                ->increment('balance', 20);
//        }); //End of Pessimistic Locking

        //This means we are retrieve 150 rows of data at a time
        $posts = DB::table('posts')
            ->orderBy('id')
            ->chunk(150, function ($posts) {
                foreach ($posts as $post) {
                    dump($post->title);
                }
            })
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
