<?php

namespace App\Http\Controllers;

use App\Models\Unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UnidadController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna la vista del índice de unidades
        return view('admin.unidad.index');
    }

    /**
     * Search for units based on criteria.
     */
    public function search(Request $request)
    {
        // Recoge el parámetro de búsqueda
        $busqueda = $request->get('busqueda', '');

        // Realiza la búsqueda utilizando Eloquent ORM
        $listado = Unidad::where('codigo', 'LIKE', '%' . $busqueda . '%')->select('id', 'codigo', 'simbolo', 'nombre', 'descripcion')->get();

        // Retorna la vista con el listado de resultados
        return view("admin.unidad.list", [
            "listado" => $listado
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtiene todas las unidades ordenadas por código
        $unidad_medida = Unidad::orderBy('codigo', 'ASC')->select('id', 'codigo', 'simbolo', 'nombre', 'descripcion')->get();

        // Retorna la vista de creación de unidad con los datos necesarios
        return view("admin.Unidad.create", [
            'unidad_medida' => $unidad_medida,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida los datos recibidos en la solicitud
        $validator = Validator::make($request->all(), [
            'codigo' => 'required|string|max:10',
            'simbolo' => 'required|string|max:5',
            'nombre' => 'required|string|max:250',
            'descripcion' => 'required|string|max:2000',
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

        // Crea una nueva instancia de Unidad y guarda en la base de datos
        $unidad = new Unidad();
        $unidad->codigo = $request->get('codigo');
        $unidad->simbolo = $request->get('simbolo');
        $unidad->nombre = $request->get('nombre');
        $unidad->descripcion = $request->get('descripcion');
        $unidad->save();

        // Redirige a la página de índice de unidades con un mensaje de éxito
        return redirect()->route('unidad.index')->with('success', 'Unidad creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Método no implementado, debería mostrar detalles de una unidad específica
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            // Busca la unidad por su ID
            $unidad = Unidad::find($id);
            if (!$unidad) {
                // Retorna un mensaje de error si no se encuentra la unidad
                return response()->json(['message' => 'Unidad no encontrada'], 404);
            }

            // Retorna la vista de edición de la unidad con los datos necesarios
            return view('admin.Unidad.edit', [
                "item" => $unidad,
            ]);
        } catch (\Throwable $error) {
            // Captura cualquier error inesperado y loguea el mensaje
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al cargar la unidad. Contactarse con el área de soporte'
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
            'codigo' => 'required|string|max:50',
            'simbolo' => 'required|string|max:5',
            'nombre' => 'required|string|max:250',
            'descripcion' => 'required|string|max:2000',
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
            // Busca la unidad por su ID
            $unidad = Unidad::find($id);
            if (!$unidad) {
                // Retorna un mensaje de error si no se encuentra la unidad
                return response()->json(['message' => 'Unidad no encontrada'], 404);
            }

            // Actualiza los campos de la unidad con los nuevos valores
            $unidad->codigo = $request->get('codigo');
            $unidad->simbolo = $request->get('simbolo');
            $unidad->nombre = $request->get('nombre');
            $unidad->descripcion = $request->get('descripcion');
            $unidad->save();

            // Redirige a la página de índice de unidades con un mensaje de éxito
            return redirect()->route('unidad.index')->with('success', 'Unidad actualizada exitosamente.');
        } catch (\Throwable $error) {
            // Captura cualquier error inesperado y loguea el mensaje
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al actualizar la unidad'
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
            // Busca la unidad por su ID
            $unidad = Unidad::find($id);
            if (!$unidad) {
                // Retorna un mensaje de error si no se encuentra la unidad
                return response()->json(['message' => 'Unidad no encontrada'], 404);
            }

            // Elimina la unidad de la base de datos
            $unidad->delete();

            // Retorna un mensaje de éxito después de eliminar la unidad
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

