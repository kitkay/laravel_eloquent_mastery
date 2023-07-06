<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     *  54. retrieve all models
     *
     *  all() - disadvantage is performance and memory consumption
     *          not advice if we have large amount of data.
     *          also slower query.
     *
     *  to solve all() issue, we then use paginate()
     */
    public function index()
    {
//        'user_id' => $post['user_id'],
//        'content' => $post['content'],
//        'title' => $post['title'],
//        'slug' => $post['slug'],
//        'excerpt' => $post['excerpt'],
//        'is_published' => $post['is_published'],
//        'min_to_read' => $post['min_to_read']

        //Using all()
//        return Post::all()->count();

        //using paginate()
//        return Post::paginate(5)->count();

        //alternative, simplePaginate() or cursorPaginate
        return Post::cursorPaginate(5)->toArray();

        //Using DB::table
//        return DB::table('posts')->get()->count();

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

    private function readData(object $data): string {
        return '<pre>' . json_encode($data, JSON_PRETTY_PRINT) . '</pre>';
    }
}
