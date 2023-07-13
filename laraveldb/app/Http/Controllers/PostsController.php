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
     *  59. Deleting models simple way of deleting models
     */
    public function index()
    {
        $data = [
            'user_id' => 5,
            "title" => "Replicate",
            "slug" => "replicate",
            "excerpt" => 'this is about replication',
            "content" => "replication content",
            "is_published" => true,
            "min_to_read" => 10
        ];

//        $post = Post::create($data);

        //TO avoid duplication change the columns that prevents
        //for duplication, for us its title and slug
        return Post::find(131)->replicate()->fill([
            "title" => "Replicated!!",
            "slug" => "replicated"
        ])->save();
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
