<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Laboratorio;
use App\Models\Componente;
use App\Models\Marca;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class EquipoController extends Controller
{

    public function index()
    {
        // Muestra la vista principal para administrar equipos
        return view("admin.equipo.index");
    }

    public function search(Request $request)
    {
        // Realiza una búsqueda de equipos según el término proporcionado
        $busqueda = $request->get('busqueda', '');

        $listado = Equipo::join('laboratorio', 'equipo.FKLaboratorio', '=', 'laboratorio.id')
            ->join('componente', 'equipo.FKComponente', '=', 'componente.id')
            ->join('marca', 'equipo.Marca', '=', 'marca.id')
            ->where('equipo.DireccionIP', 'LIKE', '%' . $busqueda . '%')
            ->select('equipo.id', 'equipo.Serie', 'equipo.FKLaboratorio', 'equipo.FKComponente')
            ->get();

        // Retorna la vista con el listado de equipos encontrados
        return view("admin.equipo.list", [
            "listado" => $listado
        ]);
    }

    public function create()
    {
        // Muestra el formulario para crear un nuevo equipo
        $laboratorio_modelo = Laboratorio::select('id', 'nombre')->get();
        $componente_modelo = Componente::select('id', 'Descripcion as descripcion')->get();
        $marca_modelo = Marca::select('id', 'nombremarca')->get();
        $datos_equipo = Equipo::select('id', 'DireccionIP', 'Marca', 'Serie')->get();

        return view("admin.equipo.create", [
            'laboratorio_modelo' => $laboratorio_modelo,
            'componente_modelo' => $componente_modelo,
            'marca_modelo' => $marca_modelo,
            'datos_equipo' => $datos_equipo,
        ]);
    }

    public function store(Request $request)
    {
        // Valida y almacena un nuevo equipo en la base de datos
        $validator = Validator::make($request->all(), [
            'DireccionIP' => 'required|string',
            'Marca' => 'required|exists:marca,id',
            'Serie' => 'required|string|max:50',
            'FKLaboratorio' => 'required|exists:laboratorio,id',
            'FKComponente' => 'required|exists:tipocomponente,id' // Asumiendo que FKComponente se refiere a tipocomponente
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

        try {
            // Crea una nueva instancia de Equipo y la guarda en la base de datos
            $equipo = new Equipo();
            $equipo->DireccionIP = $request->get('DireccionIP');
            $equipo->Marca = $request->get('Marca');
            $equipo->Serie = $request->get('Serie');
            $equipo->FKLaboratorio = $request->get('FKLaboratorio');
            $equipo->FKComponente = $request->get('FKComponente'); // Asumiendo que FKComponente se refiere a tipocomponente
            $equipo->save();

            // Retorna una respuesta JSON con un mensaje de éxito
            $data = [
                'message' => 'Registrado correctamente'
            ];

            return response()->json($data, 201);
        } catch (\Throwable $error) {
            // Maneja los errores y registra un mensaje en el registro de errores
            Log::error($error->getMessage());

            $data = [
                'message' => 'Error al registrar el equipo. Contactarse con el área de soporte'
            ];

            return response()->json($data, 500);
        }
    }

    public function edit(string $id)
    {
        // Muestra el formulario para editar un equipo existente
        try {
            $equipo = Equipo::find($id);
            $marca_modelo = Marca::orderBy('nombremarca', 'ASC')->select('id', 'nombremarca')->get();

            return view('admin.equipo.edit', [
                "item" => $equipo,
                "marca_modelo" => $marca_modelo,
            ]);
        } catch (\Throwable $error) {
            // Maneja los errores y registra un mensaje en el registro de errores
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al cargar el equipo. Contactarse con el área de soporte'
            ];
            return response()->json($data, 500);
        }
    }

    // La función 'show' está comentada, lo cual indica que aún no está implementada.

    public function update(Request $request, string $id)
    {
        // Valida y actualiza un equipo existente en la base de datos
        $validator = Validator::make($request->all(), [
            'nombremodelo' => 'required|string',
            'marca_id' => 'required|int' // Asumiendo que se refiere a la ID de la marca
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
            // Busca el equipo por su ID para actualizarlo
            $equipo = Equipo::find($id);
            if (!$equipo) {
                return response()->json(['message' => 'Equipo no encontrado'], 404);
            }

            // Actualiza los campos del equipo con los nuevos datos
            $equipo->nombremodelo = $request->get('nombremodelo');
            $equipo->marca_id = $request->get('marca_id');
            $equipo->save();

            // Retorna una respuesta JSON con un mensaje de éxito
            $data = ['message' => 'Actualizado correctamente'];
            return response()->json($data, 200);
        } catch (\Throwable $error) {
            // Maneja los errores y registra un mensaje en el registro de errores
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al actualizar el equipo'
            ];
            return response()->json($data, 500);
        }
    }

    public function destroy(string $id)
    {
        // Elimina un equipo de la base de datos
        try {
            $equipo = Equipo::find($id);
            $equipo->delete();

            // Retorna una respuesta JSON con un mensaje de éxito
            $data = ['message' => 'Eliminado correctamente'];
            return response()->json($data, 200);
        } catch (\Throwable $error) {
            // Maneja los errores y registra un mensaje en el registro de errores
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al eliminar el equipo'
            ];
            return response()->json($data, 500);
        }
    }
}
