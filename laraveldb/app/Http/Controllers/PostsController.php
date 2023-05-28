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
         * 39. Raw Methods
         *
         * using selectRaw
         *
         * when using havingRaw, groupBy is needed and then add get()
         * also, don't forget select() and not selectRaw()
         * using select(), 1st param: columnName, 2nd param: DB::raw()
         *
         * groupByRaw -
         */

        $posts = DB::table('posts')
            // Using selectRaw()
//            ->selectRaw('COUNT(*) as post_count')
//            ->first()

            // Using whereRaw()
//            ->whereRaw('created_at > NOW() - INTERVAL 5 DAY')
//            ->get()

            // Select + groupBy + harvinRaw ->get()
//            ->select('user_id', DB::raw('SUM(min_to_read) as total_time'))
//            ->groupBy('user_id')
//            ->havingRaw('SUM(min_to_read) > 5')
//            ->get()

            // Using groupByRaw()
            ->select('user_id', DB::raw('AVG(min_to_read) as avg_mintoread'))
            ->groupByRaw('user_id')
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
