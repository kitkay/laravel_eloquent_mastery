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
         * 40. Ordering
         *
         *  orderBy - allows to sort your query results by a specific column in ascending or desc order
         *          default ASC
         *
         *  latest and oldest methods - allows us to sort query results by the created_at in DESC and ASC order
         */

        $posts = DB::table('posts')
            // orderBy
//            ->orderBy('title')
//            ->orderBy('min_to_read')
//            ->get()

            //latest or oldest - methods
            // Also latest() === orderBy('col', ascending)
            // Also oldest() === orderBy('col', descending)
//            ->latest('title')
            ->oldest('title')
            ->get()
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
