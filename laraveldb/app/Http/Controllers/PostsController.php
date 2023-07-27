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
     *  63. Global Scopes
     *      powerful feature or eloquent that allows us
     *      to add constraints to all queries that runs against
     *      a particular model.
     *
     *  64. Local scopes are a powerful feature in eloquent that enables us to define
     *      a set of reusable queries on our models
     *
     *      Also local scopes provide a way to encapsulate a query into a method on a model
     *      and enable us to write more concise and expressive codes. It could help us modify code
     *      easily overtime in a query logic in one simple location. It could also be used
     *      to create complex queries.
     *
     *  65. Dynamic Scopes
     *      allow us to specify the conditions that we want to filter by.
     *      this also allow us to filter without hassle of adding or modifying code we wrote.
     *
     *  66. Trait to store scopes
     *      sharing class functionalities and avoid code duplication
     *      use for maintainability. Cannot be instantiated on their own.
     */
    public function index()
    {
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
