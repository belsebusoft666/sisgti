<?php

namespace App\Http\Controllers;

use App\Models\Tipoequipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TipoequipoController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Muestra la vista del listado de tipos de equipo
        return view('admin.tipoequipo.index');
    }

    /**
     * Search for tipos de equipo based on criteria.
     */
    public function search(Request $request)
    {
        // Recoge el parámetro de búsqueda
        $busqueda = $request->get('busqueda', '');

        // Realiza la búsqueda utilizando Eloquent ORM
        $listado = Tipoequipo::where('Nombre', 'LIKE', '%' . $busqueda . '%')->select('id', 'Nombre', 'Descripcion')->get();

        // Retorna la vista con el listado de resultados
        return view("admin.tipoequipo.list", [
            "listado" => $listado
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtiene todos los tipos de equipo ordenados alfabéticamente
        $tipoequipo_medida = Tipoequipo::orderBy('Nombre', 'ASC')->select('id', 'Nombre', 'Descripcion')->get();

        // Retorna la vista de creación de tipo de equipo con los datos necesarios
        return view("admin.tipoequipo.create", [
            'tipoequipo_medida' => $tipoequipo_medida,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida los datos recibidos en la solicitud
        $validator = Validator::make($request->all(), [
            'Nombre' => 'required|string|max:250',
            'Descripcion' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            // En caso de fallo en la validación, retorna errores JSON
            $errors = $validator->errors();

            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $errors
            ];

            return response()->json($data, 422);
        }

        // Crea una nueva instancia de Tipoequipo y guarda en la base de datos
        $tipoequipo = new Tipoequipo();
        $tipoequipo->nombre = $request->get('Nombre');
        $tipoequipo->descripcion = $request->get('Descripcion');
        $tipoequipo->save();

        // Redirige a la página de índice de tipos de equipo con un mensaje de éxito
        return redirect()->route('tipoequipo.index')->with('success', 'Tipoequipo creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Método no implementado, debería mostrar detalles de un tipo de equipo específico
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            // Busca el tipo de equipo por su ID
            $tipoequipo = Tipoequipo::find($id);
            if (!$tipoequipo) {
                // Retorna un mensaje de error si no se encuentra el tipo de equipo
                return response()->json(['message' => 'tipoequipo no encontrada'], 404);
            }

            // Retorna la vista de edición del tipo de equipo con los datos necesarios
            return view('admin.tipoequipo.edit', [
                "item" => $tipoequipo,
            ]);
        } catch (\Throwable $error) {
            // Captura cualquier error inesperado y loguea el mensaje
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al cargar la tipoequipo. Contactarse con el área de soporte'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Valida los datos recibidos en la solicitud
        $validator = Validator::make($request->all(), [
            'Nombre' => 'required|string|max:250',
            'Descripcion' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            // En caso de fallo en la validación, retorna errores JSON
            $errors = $validator->errors();
            $data = [
                'errors' => $errors,
                'message' => 'Error al validar los datos'
            ];

            return response()->json($data, 422);
        }

        try {
            // Busca el tipo de equipo por su ID
            $tipoequipo = Tipoequipo::find($id);
            if (!$tipoequipo) {
                // Retorna un mensaje de error si no se encuentra el tipo de equipo
                return response()->json(['message' => 'tipoequipo no encontrada'], 404);
            }

            // Actualiza los campos del tipo de equipo con los nuevos valores
            $tipoequipo->nombre = $request->get('Nombre');
            $tipoequipo->descripcion = $request->get('Descripcion');
            $tipoequipo->save();

            // Redirige a la página de índice de tipos de equipo con un mensaje de éxito
            return redirect()->route('tipoequipo.index')->with('success', 'Tipoequipo actualizada exitosamente.');
        } catch (\Throwable $error) {
            // Captura cualquier error inesperado y loguea el mensaje
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al actualizar la tipoequipo'
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
            // Busca el tipo de equipo por su ID
            $tipoequipo = Tipoequipo::find($id);
            if (!$tipoequipo) {
                // Retorna un mensaje de error si no se encuentra el tipo de equipo
                return response()->json(['message' => 'tipoequipo no encontrada'], 404);
            }

            // Elimina el tipo de equipo de la base de datos
            $tipoequipo->delete();

            // Retorna un mensaje de éxito después de eliminar el tipo de equipo
            $data = ['message' => 'Eliminado correctamente'];

            return response()->json($data, 200);
        } catch (\Throwable $error) {
            // Captura cualquier error inesperado y loguea el mensaje
            Log::error($error->getMessage());
            
            $data = ['message' => 'Error al eliminar usuario'];

            return response()->json($data, 500);
        }
    }
}

