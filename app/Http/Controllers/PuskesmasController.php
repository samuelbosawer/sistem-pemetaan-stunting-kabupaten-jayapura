<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PuskesmasController extends Controller
{
    public function index(Request $request)
    {

        return 'puskesmas/index';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'puskesmas/create';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'puskesmas/store';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'puskesmas/show';

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return 'puskesmas/edit';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return 'puskesmas/update';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return 'puskesmas/destroy';
    }


    public function excel(Request $request)
    {

    }
}
