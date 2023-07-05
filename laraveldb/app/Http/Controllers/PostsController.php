<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * 52. retrieve single models
     *
     * find method used to retrieve specific row using primary key
     *
     * first() - used to return row based on condition.
     *
     * firstWhere() - used to return row based on custom attr.
     *
     * findOrFail - used to return a row but throws exception if not found.
     */
    public function index()
    {
//        $post = Post::firstWhere(
//                'slug',
//                'sint-sapiente-similique-culpa-debitis-qui'
//            )
//        ;
//        $post = Post::findOrFail(103)
            $post = Post::where('slug', 'molestias-ex-dignissimos-et-itaque-numquam-vero')
                ->firstOrFail()
        ;


        return $this->readData($post);
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
     * 52. retrieve single models
     *
     * find method used to retrieve specific row using primary key
     *
     * first() - used to return row based on condition.
     *
     * firstWhere() - used to return row based on custom attr.
     */
    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)
            ->firstOrFail()
        ;

        return $post;
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
