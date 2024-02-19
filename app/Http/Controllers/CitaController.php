<?php

namespace App\Http\Controllers;

use App\Models\cita;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; //Libreria importada
class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cita = cita::all(); // Utiliza el método all() para obtener todos los registros
        return response()->json(['cita' => $cita]);
        
    }
    public function reservarCita(Request $request)
    {
        $validatePersona = Validator::make(
            $request->all(),
            [
                'idPersona' => 'required',
                'medico' => 'required',
                'fechaHora' => 'required',
            ]
        );
        if ($validatePersona->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Existen campos vacíos ',
                'errors' => $validatePersona->errors()
            ], 401);
        }
    
            // Crear la cita
            $cita = cita::create([
                'medico' => $request->medico,
                'fechaHora' => $request->fechaHora,
                'idPersona' => $request->idPersona,
            ]);
    
            // Retornar la respuesta
            return response()->json([
                'message' => 'Cita reservada correctamente',
                 'data'=>$cita], 201);      
        
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
    public function show(cita $cita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cita $cita)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cita $cita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cita $cita)
    {
        //
    }
}
