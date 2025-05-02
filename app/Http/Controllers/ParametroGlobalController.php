<?php

namespace App\Http\Controllers;

use App\Models\ParametroGlobal;
use Illuminate\Http\Request;

class ParametroGlobalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function listado()
    {
        return view('parametro_global.listado');
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
    public function show(ParametroGlobal $parametroGlobal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ParametroGlobal $parametroGlobal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ParametroGlobal $parametroGlobal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ParametroGlobal $parametroGlobal)
    {
        //
    }
}
