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
         * 48. Intro to Eloquent
         *  It is an ORM system that is included in laravel framework to write easy and intuitive
         *  way of making sql.
         *  we could create query queries with chainable syntax and in a OOP way.
         *
         *  disadvantages: maybe difficult to debug, may increase complexity
         *
         * when should we use eloquent
         *  1. when we want to work with database using OOP syntax
         *  2. smaller datasets
         *  3. It is better to use Query Builder if complex and large datasets
         */
        $posts = ''
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
