<?php

namespace App\Http\Controllers;

use App\Models\Caracteristica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CaracteristicaController extends Controller
{

    public function index()
    {
        // Muestra la vista principal para administrar características
        return view('admin.caracteristica.index');
    }

    public function search(Request $request)
    {
        // Realiza una búsqueda de características según el término proporcionado
        $busqueda = $request->get('busqueda', '');
        $listado = Caracteristica::where('TipoComponente', 'LIKE', '%' . $busqueda . '%')
                    ->select('id', 'TipoComponente', 'Nombre', 'Descripcion')
                    ->get();

        // Retorna la vista con el listado de características encontradas
        return view("admin.caracteristica.list", [
            "listado" => $listado
        ]);
    }

    public function create()
    {
        // Muestra el formulario para crear una nueva característica
        $caracteristica_medida = Caracteristica::orderBy('codigo', 'ASC')->select('id', 'codigo', 'simbolo', 'nombre', 'descripcion')->get();

        return view("admin.caracteristica.create", [
            'caracteristica_medida' => $caracteristica_medida,
        ]);
    }

    public function store(Request $request)
    {
        // Valida y almacena una nueva característica en la base de datos
        $validator = Validator::make($request->all(), [
            'codigo' => 'required|string|max:10',
            'simbolo' => 'required|string|max:5',
            'nombre' => 'required|string|max:250',
            'descripcion' => 'required|string|max:2000',
        ]);

        // Si la validación falla, retorna los errores
        if ($validator->fails()) {
            $errors = $validator->errors();

            $data = [
                'message' => 'Error en la validación de los datos',
                'errors' => $errors
            ];

            return response()->json($data, 422);
        }

        // Crea una nueva instancia de Caracteristica y la guarda en la base de datos
        $caracteristica = new Caracteristica();
        $caracteristica->codigo = $request->get('codigo');
        $caracteristica->simbolo = $request->get('simbolo');
        $caracteristica->nombre = $request->get('nombre');
        $caracteristica->descripcion = $request->get('descripcion');
        $caracteristica->save();

        // Redirige a la vista principal de características con un mensaje de éxito
        return redirect()->route('caracteristica.index')->with('success', 'caracteristica creada exitosamente.');
    }

    public function edit(string $id)
    {
        try {
            // Busca la característica por su ID para editarla
            $caracteristica = Caracteristica::find($id);
            if (!$caracteristica) {
                return response()->json(['message' => 'caracteristica no encontrada'], 404);
            }

            // Retorna la vista de edición con los datos de la característica encontrada
            return view('admin.caracteristica.edit', [
                "item" => $caracteristica,
            ]);
        } catch (\Throwable $error) {
            // Maneja los errores y registra un mensaje en el registro de errores
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al cargar la caracteristica. Contactarse con el área de soporte'
            ];
            return response()->json($data, 500);
        }
    }

    public function update(Request $request, string $id)
    {
        // Valida y actualiza una característica existente en la base de datos
        $validator = Validator::make($request->all(), [
            'codigo' => 'required|string|max:50',
            'simbolo' => 'required|string|max:5',
            'nombre' => 'required|string|max:250',
            'descripcion' => 'required|string|max:2000',
        ]);

        // Si la validación falla, retorna los errores
        if ($validator->fails()) {
            $errors = $validator->errors();
            $data = [
                'errors' => $errors,
                'message' => 'Error al validar los datos'
            ];

            return response()->json($data, 422);
        }

        try {
            // Busca la característica por su ID para actualizarla
            $caracteristica = Caracteristica::find($id);
            if (!$caracteristica) {
                return response()->json(['message' => 'caracteristica no encontrada'], 404);
            }

            // Actualiza los campos de la característica con los nuevos datos
            $caracteristica->codigo = $request->get('codigo');
            $caracteristica->simbolo = $request->get('simbolo');
            $caracteristica->nombre = $request->get('nombre');
            $caracteristica->descripcion = $request->get('descripcion');
            $caracteristica->save();

            // Redirige a la vista principal de características con un mensaje de éxito
            return redirect()->route('caracteristica.index')->with('success', 'caracteristica actualizada exitosamente.');
        } catch (\Throwable $error) {
            // Maneja los errores y registra un mensaje en el registro de errores
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al actualizar la caracteristica'
            ];
            return response()->json($data, 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            // Busca la característica por su ID y la elimina de la base de datos
            $caracteristica = Caracteristica::find($id);
            $caracteristica->delete();

            $data = ['message' => 'Eliminado correctamente'];

            return response()->json($data, 200);
        } catch (\Throwable $error) {
            // Maneja los errores y registra un mensaje en el registro de errores
            Log::error($error->getMessage());

            $data = ['message' => 'Error al eliminar usuario'];

            return response()->json($data, 500);
        }
    }
}
