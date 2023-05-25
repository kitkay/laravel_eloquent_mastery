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
         * Aggregates
         * MAX, AVE, MIN, MAX, COUNT, SUM
         *
         * count - allows to count number of rows in a given table or a result set.
         * sum - allows to calculate to total
         * avg - allows to calculate the average of a specific column in a given table or a result set.
         *  max -allow to find max value in a specific column in given table or result set.
         *  min -allow to find min value in a specific column in given table or result set.
         */
        $posts = DB::table('posts')
            ->where('is_published', true)
//            ->count()
//            ->sum('min_to_read')
//            ->avg('min_to_read')
//            ->max('min_to_read')
            ->min('min_to_read')
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
