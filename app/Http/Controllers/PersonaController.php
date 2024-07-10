<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Muestra la vista principal para administrar personas
        return view("admin.persona.index");
    }

    /**
     * Search for persons based on the search term.
     */
    public function search(Request $request)
    {
        // Obtener el parámetro de búsqueda
        $busqueda = $request->get('busqueda', '');

        // Realizar la búsqueda en la base de datos
        $listado = Persona::where('nombres', 'LIKE', '%' . $busqueda . '%')
            ->select('id', 'nombres', 'apellidopaterno', 'apellidomaterno', 'numerodocumento', 'tipodocumento')
            ->get();

        // Retornar la vista con los resultados de la búsqueda
        return view("admin.persona.list", [
            "listado" => $listado
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Muestra el formulario para crear una nueva persona
        return view("admin.persona.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'nombres' => 'required|string|min:3|max:50',
            'apellidopaterno' => 'required|string|min:3|max:50',
            'apellidomaterno' => 'required|string|min:3|max:50',
            'numerodocumento' => 'required|string|min:3|max:50',
            'tipodocumento' => 'required|integer',
        ]);

        // Si la validación falla, retornar los errores
        if ($validator->fails()) {
            $errors = $validator->errors();

            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $errors
            ];

            return response()->json($data, 422);
        }

        try {
            // Crear una nueva instancia de Persona y guardarla en la base de datos
            $persona = new Persona();
            $persona->nombres = $request->get('nombres');
            $persona->apellidopaterno = $request->get('apellidopaterno');
            $persona->apellidomaterno = $request->get('apellidomaterno');
            $persona->numerodocumento = $request->get('numerodocumento');
            $persona->tipodocumento = $request->get('tipodocumento');
            $persona->save();

            $data = [
                'message' => 'Registrado correctamente'
            ];
            return response()->json($data, 201);
        } catch (\Throwable $error) {
            // Manejar errores y registrar un mensaje en el registro de errores
            Log::error($error->getMessage());

            $data = [
                'message' => 'Error al registrar Persona. Contactarse con el área de soporte'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            // Buscar la persona por su ID para mostrar el formulario de edición
            $persona = Persona::find($id);
            return view('admin.persona.edit', ["item" => $persona]);
        } catch (\Throwable $error) {
            // Manejar errores y registrar un mensaje en el registro de errores
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al cargar la persona. Contactarse con el área de soporte'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'nombres' => 'required|string|min:3|max:50',
            'apellidopaterno' => 'required|string|min:3|max:50',
            'apellidomaterno' => 'required|string|min:3|max:50',
            'numerodocumento' => 'required|string|min:3|max:50',
            'tipodocumento' => 'required|integer',
        ]);

        // Si la validación falla, retornar los errores
        if ($validator->fails()) {
            $errors = $validator->errors();
            $data = [
                'errors' => $errors,
                'message' => 'Error al validar los datos'
            ];

            return response()->json($data, 422);
        }

        try {
            // Buscar la persona por su ID y actualizar sus datos
            $persona = Persona::find($id);
            $persona->nombres = $request->get('nombres');
            $persona->apellidopaterno = $request->get('apellidopaterno');
            $persona->apellidomaterno = $request->get('apellidomaterno');
            $persona->numerodocumento = $request->get('numerodocumento');
            $persona->tipodocumento = $request->get('tipodocumento');
            $persona->save();

            $data = ['message' => 'Actualizado correctamente'];
            return response()->json($data, 200);
        } catch (\Throwable $error) {
            // Manejar errores y registrar un mensaje en el registro de errores
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al actualizar la persona'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Buscar la persona por su ID y eliminarla de la base de datos
            $persona = Persona::find($id);
            $persona->delete();

            $data = ['message' => 'Eliminado correctamente'];
            return response()->json($data, 200);
        } catch (\Throwable $error) {
            // Manejar errores y registrar un mensaje en el registro de errores
            Log::error($error->getMessage());

            $data = ['message' => 'Error al eliminar la persona'];
            return response()->json($data, 500);
        }
    }
}

