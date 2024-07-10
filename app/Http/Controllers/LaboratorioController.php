<?php

namespace App\Http\Controllers;

use App\Models\Laboratorio;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class LaboratorioController extends Controller
{
    public function index()
    {
        // Muestra la vista principal para administrar laboratorios
        return view("admin.laboratorio.index");
    }

    public function search(Request $request)
    {
        // Realiza una búsqueda de laboratorios según el término proporcionado
        $busqueda = $request->get('busqueda', '');

        $listado = Laboratorio::join('persona', 'laboratorio.persona_id', '=', 'persona.id')
            ->where('laboratorio.nombre', 'LIKE', '%' . $busqueda . '%')
            ->select('laboratorio.id', 'laboratorio.descripcion', 'laboratorio.nombre', 'laboratorio.usuariocreador', 'laboratorio.usuariomodificador', 'laboratorio.persona_id','persona.nombres')
            ->get();

        // Retorna la vista con el listado de laboratorios encontrados
        return view("admin.laboratorio.list", [
            "listado" => $listado
        ]);
    }

    public function create()
    {
        // Muestra el formulario para crear un nuevo laboratorio
        $persona_laboratorio = Persona::orderBy('nombres', 'ASC')->select('id', 'nombres', 'apellidopaterno')->get();
        $datos_laboratorio = Laboratorio::select('id', 'nombre', 'descripcion')->get();

        // Obtener el usuario actualmente autenticado
        $usuario_actual = auth()->user();

        return view("admin.laboratorio.create", [
            'persona_laboratorio' => $persona_laboratorio,
            'datos_laboratorio' => $datos_laboratorio,
            'usuario_actual' => $usuario_actual,
        ]);
    }

    public function store(Request $request)
    {
        // Valida y almacena un nuevo laboratorio en la base de datos
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'persona_id' => 'required|exists:persona,id',
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

        // Obtener el usuario actualmente autenticado
        $usuario_actual = auth()->user();

        // Crear una nueva instancia de Laboratorio y guardarla en la base de datos
        $laboratorio = new Laboratorio();
        $laboratorio->id = $request-> get('id');
        $laboratorio->nombre = $request->get('nombre');
        $laboratorio->descripcion = $request->get('descripcion');
        $laboratorio->persona_id = $request->get('persona_id');
        $laboratorio->usuariocreador = $usuario_actual->name;
        $laboratorio->usuariomodificador = $usuario_actual->name; 
        $laboratorio->save();
        
        // Redirige a la vista de índice de laboratorios con un mensaje de éxito
        return redirect()->route('laboratorio.index')->with('success', 'Laboratorio creado exitosamente.');
    }

    public function edit(string $id)
    {
        // Muestra el formulario para editar un laboratorio existente
        try {
            $laboratorio = Laboratorio::find($id);
            if (!$laboratorio) {
                return response()->json(['message' => 'Laboratorio no encontrado'], 404);
            }

            $persona_user = Persona::orderBy('nombres', 'ASC')->select('id', 'nombres', 'apellidopaterno')->get();
            $usuario_actual = auth()->user();
            
            return view('admin.laboratorio.edit', [
                "item" => $laboratorio,
                "persona_user" => $persona_user,
                'usuario_actual' => $usuario_actual,               
            ]);
        } catch (\Throwable $error) {
            // Maneja los errores y registra un mensaje en el registro de errores
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al cargar el laboratorio. Contactarse con el área de soporte'
            ];
            return response()->json($data, 500);
        }
    }

    public function update(Request $request, string $id)
    {
        // Valida y actualiza un laboratorio existente en la base de datos
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'persona_id' => 'required|exists:persona,id',
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
            // Busca el laboratorio por su ID para actualizarlo
            $laboratorio = Laboratorio::find($id);
            if (!$laboratorio) {
                return response()->json(['message' => 'Laboratorio no encontrado'], 404);
            }

            // Obtener el usuario actualmente autenticado
            $usuario_actual = auth()->user();

            // Actualiza los campos del laboratorio con los nuevos datos
            $laboratorio->nombre = $request->get('nombre');
            $laboratorio->descripcion = $request->get('descripcion');
            $laboratorio->persona_id = $request->get('persona_id');
            $laboratorio->usuariomodificador = $usuario_actual->name;
            $laboratorio->save();

            // Retorna una respuesta JSON con un mensaje de éxito
            $data = ['message' => 'Actualizado correctamente'];
            return response()->json($data, 200);
        } catch (\Throwable $error) {
            // Maneja los errores y registra un mensaje en el registro de errores
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al actualizar el laboratorio'
            ];
            return response()->json($data, 500);
        }
    }

    public function destroy(string $id)
    {
        // Elimina un laboratorio de la base de datos
        try {
            $laboratorio = Laboratorio::find($id);
            if (!$laboratorio) {
                return response()->json(['message' => 'Laboratorio no encontrado'], 404);
            }

            $laboratorio->delete();

            // Retorna una respuesta JSON con un mensaje de éxito
            $data = ['message' => 'Eliminado correctamente'];
            return response()->json($data, 200);
        } catch (\Throwable $error) {
            // Maneja los errores y registra un mensaje en el registro de errores
            Log::error($error->getMessage());
            
            $data = ['message' => 'Error al eliminar laboratorio'];

            return response()->json($data, 500);
        }
    }
}

