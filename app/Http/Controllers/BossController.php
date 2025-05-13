<?php

namespace App\Http\Controllers;

use App\Models\Boss;
use App\Http\Requests\StoreBossRequest;
use App\Http\Requests\UpdateBossRequest;

class BossController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreBossRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Boss $boss)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Boss $boss)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBossRequest $request, Boss $boss)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Boss $boss)
    {
        //
    }
}
