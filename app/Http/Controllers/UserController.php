<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {

        return 'user/index';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'user/create';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'user/store';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'user/show';

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return 'user/edit';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return 'user/update';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return 'user/destroy';
    }


    public function excel(Request $request)
    {

    }
}
