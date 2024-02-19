<?php

namespace App\Http\Controllers;

use App\Models\tipoPersona;
use Illuminate\Http\Request;

class TipoPersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiposp = tipoPersona::all(); // Utiliza el método all() para obtener todos los registros
        return response()->json(['tiposp' => $tiposp]);
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
    public function show(tipoPersona $tipoPersona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tipoPersona $tipoPersona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tipoPersona $tipoPersona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tipoPersona $tipoPersona)
    {
        //
    }
}
