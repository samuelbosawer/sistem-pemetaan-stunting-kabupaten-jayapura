<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StuntingController extends Controller
{
    public function index(Request $request)
    {

        return 'stunting/index';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'stunting/create';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'stunting/store';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'stunting/show';

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return 'stunting/edit';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return 'stunting/update';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return 'stunting/destroy';
    }


    public function excel(Request $request)
    {

    }
}
