<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelurahanController extends Controller
{
    public function index(Request $request)
    {

        return 'kelurahan/index';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'kelurahan/create';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return 'kelurahan/store';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return 'kelurahan/show';

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return 'kelurahan/edit';
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return 'kelurahan/update';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return 'kelurahan/destroy';
    }


    public function excel(Request $request)
    {

    }
}
