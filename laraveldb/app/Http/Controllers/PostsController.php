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
         * Using distinct would return just exactly one row.
         *  just chain ->distinct()
         */
//        $posts = DB::table('posts')
//            ->select('excerpt', 'content');

//          USING where clause and first() to fetch single data

//        $posts = DB::table('posts')
//            ->where('id', 100)
//            ->first();

//          USING where clause with value to fetch single data

//        $posts = DB::table('posts')
//            ->where('id', 100)
//            ->value('content');

        //Using find() to get single data.
        $posts = DB::table('posts')
        ->find(100);

//        $added = $posts->addSelect('title')->get();

        dd($posts->content);
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
