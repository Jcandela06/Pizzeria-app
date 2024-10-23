<?php

namespace App\Http\Controllers;

use App\Models\Pizza_Size;
use Illuminate\Http\Request;

class Pizza_SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pizza_sizes = Pizza_Size::with('pizza')->get();
        return view('pizza_size.index', ['pizza_size' => $pizza_sizes]);
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
