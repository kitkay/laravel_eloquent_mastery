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
     *  55. firstOrCreate and firstOrNew
     *
     *  - both used to create new data but could be slower
     *  - due to checking if row already existed.
     *
     * firstOrCreate - attempts to retrieve data from database before creating
     * firstOrNew - checks if the record exists or creates a new one if it doesn't
     *              we need to manually save data here.
     *
     * -both slower for complex queries.
     */
    public function index()
    {
//        return Post::firstOrCreate(
//            [
//                'title' => 'New title for firstOrCreate',
//            ],
//            [
//                'user_id' => 5,
//                'title' => 'New title for firstOrCreate',
//                'slug' => 'new-title-for-first-or-create',
//                'excerpt' => 'new excerpt',
//                'content' => 'excerpt content',
//                'is_published' => true,
//                'min_to_read' => 3
//            ]
//        );

        return Post::firstOrNew(
            [
                'title' => 'New title for firstOrCreate',
            ],
            [
                'user_id' => 9,
                'title' => 'New title for firstOrCreate News 9',
                'slug' => 'new-title-for-first-or-create-news-9',
                'excerpt' => 'new excerpt',
                'content' => 'excerpt content',
                'is_published' => true,
                'min_to_read' => 3
            ]
        );

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

    private function readData(LengthAwarePaginator $data) {
        return '<pre>'
            . json_encode($data, JSON_PRETTY_PRINT)
            . '</pre>';
    }
}
