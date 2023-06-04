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
         * 45. Pagination - technique that allows to divide a large set of data into smaller chunks of pages
         *  by default its 15 items perpage
         *
         *  if we modify paginate() -> paginate(perPage, [arrayOfColumns*], customPageName)
         *  customPageName = if we wanted to use different page name on our url
         */
        $posts = DB::table('posts')
            ->paginate(5, ['*'], 'p')
        ;
//        dd($posts->links());
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
