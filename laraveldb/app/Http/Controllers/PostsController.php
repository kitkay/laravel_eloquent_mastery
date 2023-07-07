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
     *  57. Attribute Changes isDirty, isClean, wasChanged
     *
     * very helpful when working on models and want to track changes to attributes
     *
     * isDirty checks if data from DB has been changed from our end, but still
     *  needs to save() in order to persist on our DB.
     *
     * isClean() - opposite of isDirty()
     *
     * wasChanged - returns bool, if row is changed or not
     *  useful when prompting users before leaving the page.
     */
    public function index()
    {
        $post = Post::find(105);

        $post->title = "Let's see if isDirty() works";

        //passing an array is possible but would return true when one on the array is modified.
//        return $post->isDirty('title');

        //using if isDirty is a shorthand
//        if ($post->getOriginal('title') !== $post->title){
//        if ($post->isDirty('title')){
//            echo "Title has been changed";
//        } else {
//            echo "Title has NOT been changed";
//        }
//        return $post->isClean();

        if($post->wasChanged('title')) {
            echo "Title has been changed";
        } else {
            echo "Title has NOT been changed";
        }
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
