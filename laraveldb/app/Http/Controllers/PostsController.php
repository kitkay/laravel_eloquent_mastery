<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     *  56. updating models or updating data.
     */
    public function index()
    {

        Post::where('id', 105)->update([
          "title" => "just updated",
          "slug" => "just-updated"
        ]);

//        $post = Post::find(105);
//        $post->user_id = 9;
//        $post->title = 'Updated title for ID 105';
//        $post->slug = 'updated-title-for-id-105';
//        $post->save();
//        return $post;
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
     *
     */
    public function show(string $slug)
    {
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

    private function readData(LengthAwarePaginator $data)
    {
        return '<pre>'
            . json_encode($data, JSON_PRETTY_PRINT)
            . '</pre>';
    }
}
