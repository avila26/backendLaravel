<?php

namespace App\Http\Controllers;

use App\Models\persona;
use App\Models\tipoPersona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; //Libreria importada

class PersonaController extends Controller
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
    public function store(Request $request)
    {
        $validatePersona = Validator::make(
            $request->all(),
            [
                'nombre' => 'required',
                'apellido' => 'required',
                'cedula' => 'required',
                'correo' => 'required|email|unique:personas,correo', // Validación de correo único en la tabla personas
                'telefono' => 'required|unique:personas,telefono', // Validación de teléfono único en la tabla personas
                'idTipoPersona' => 'required',
            ],
            [
                'correo.unique' => 'El correo electrónico ya está registrado.',
                'telefono.unique' => 'El número de teléfono ya está registrado.'
            ]
        );
    
        if ($validatePersona->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Existen campos vacíos o datos duplicados',
                'errors' => $validatePersona->errors()
            ], 401);
        }
    
        try {
            $persona = persona::create([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'cedula' => $request->cedula,
                'correo' => $request->correo,
                'telefono' => $request->telefono,
                'especialidad' => $request->especialidad,
                'idTipoPersona' => $request->idTipoPersona,
            ]);
    
            return response()->json([
                'persona' => $persona,
                'message' => 'Tipo de persona creado correctamente',
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Error al crear el tipo de persona: ',
            ], 500);
        }
    }
    
    public function buscarPorCTipo($tipo)
    {
        try {
            // Obtener todas las personas que tienen la especialidad especificada
            $personas = Persona::where('especialidad', $tipo)->get();
    
            // Retornar las personas en formato JSON
            return response()->json(['busqueda' => $personas], 200);
        } catch (\Throwable $th) {
            // Manejar el caso en que no se encuentren personas para la especialidad especificada
            return response()->json(['message' => 'No se encontraron personas para la especialidad especificada'], 404);
        }
    }
    
    
    /**
     * Display the specified resource.
     */
    public function show(persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, persona $persona)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(persona $persona)
    {
        //
    }
}
