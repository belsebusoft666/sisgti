<?php

namespace App\Http\Controllers;

use App\Models\Tipocomponente;
use App\Models\Tipoequipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TipocomponenteController extends Controller
{

    public function index()
    {
        // Muestra la vista del listado de tipocomponentes
        return view('admin.tipocomponente.index');
    }

    /**
     * Search for tipocomponentes based on criteria.
     */
    public function search(Request $request)
    {
        // Recibe el parámetro de búsqueda
        $busqueda = $request->get('busqueda', '');

        // Realiza la búsqueda utilizando Eloquent ORM
        $listado = Tipocomponente::join('tipoequipo', 'tipocomponente.idtipoequipo', '=', 'tipoequipo.id')
            ->where('tipocomponente.Nombre', 'LIKE', '%' . $busqueda . '%')
            ->select('tipocomponente.id', 'tipocomponente.Nombre', 'tipocomponente.Descripcion', 'tipocomponente.idtipoequipo', 'tipocomponente.UsuarioCreador', 'tipocomponente.UsuarioModificador')
            ->get();

        // Retorna la vista con el listado de resultados
        return view("admin.tipocomponente.list", [
            "listado" => $listado
        ]);
    }

    public function create()
    {
        // Prepara datos necesarios para la creación de tipocomponente
        $tipocomponente = Tipocomponente::orderBy('Nombre', 'ASC')
            ->select('id', 'Nombre', 'Descripcion', 'idtipoequipo', 'UsuarioCreador', 'UsuarioModificador')
            ->get();
        
        $tipoequipo = Tipoequipo::select('id', 'Nombre')->get();
        
        // Obtiene el usuario actual autenticado
        $usuario_actual = auth()->user();

        // Retorna la vista de creación de tipocomponente con los datos necesarios
        return view("admin.tipocomponente.create", [
            'tipocomponente' => $tipocomponente,
            'usuario_actual' => $usuario_actual,
            'tipoequipo'=> $tipoequipo,
        ]);
    }

    public function store(Request $request)
    {
        // Valida los datos recibidos en la solicitud
        $validator = Validator::make($request->all(), [
            'Nombre' => 'required|string|max:250',
            'Descripcion' => 'required|string|max:2000',
            'idtipoequipo' => 'required|exists:tipoequipo,id',
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

        // Obtiene el usuario actual autenticado
        $usuario_actual = auth()->user();

        // Crea una nueva instancia de Tipocomponente y guarda en la base de datos
        $tipocomponente = new Tipocomponente();
        $tipocomponente->Nombre = $request->get('Nombre');
        $tipocomponente->Descripcion = $request->get('Descripcion');
        $tipocomponente->idtipoequipo = $request->get('idtipoequipo');
        $tipocomponente->UsuarioCreador = $usuario_actual->name;
        $tipocomponente->UsuarioModificador = $usuario_actual->name;
        $tipocomponente->save();

        // Redirige a la página de índice de tipocomponentes con un mensaje de éxito
        return redirect()->route('tipocomponente.index')->with('success', 'Tipocomponente creada exitosamente.');
    }

    public function show(string $id)
    {
        // Método no implementado, debería mostrar detalles de un tipocomponente específico
    }

    public function edit(string $id)
    {
        try {
            // Busca el tipocomponente por su ID
            $tipocomponente = Tipocomponente::find($id);
            if (!$tipocomponente) {
                // Retorna un mensaje de error si no se encuentra el tipocomponente
                return response()->json(['message' => 'tipocomponente no encontrada'], 404);
            }

            // Obtiene todos los tipos de equipo disponibles
            $tipoequipo = Tipoequipo::select('id', 'Nombre')->get();
            
            // Obtiene el usuario actual autenticado
            $usuario_actual = auth()->user();

            // Retorna la vista de edición del tipocomponente con los datos necesarios
            return view('admin.tipocomponente.edit', [
                "item" => $tipocomponente,
                'usuario_actual' => $usuario_actual,
                'tipoequipo'=> $tipoequipo,
            ]);
        } catch (\Throwable $error) {
            // Captura cualquier error inesperado y loguea el mensaje
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al cargar la tipocomponente. Contactarse con el área de soporte'
            ];
            return response()->json($data, 500);
        }
    }

    public function update(Request $request, string $id)
    {
        // Valida los datos recibidos en la solicitud
        $validator = Validator::make($request->all(), [
            'Nombre' => 'required|string|max:250',
            'Descripcion' => 'required|string|max:2000',
            'idtipoequipo' => 'required|exists:tipoequipo,id',
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
            // Busca el tipocomponente por su ID
            $tipocomponente = Tipocomponente::find($id);
            if (!$tipocomponente) {
                // Retorna un mensaje de error si no se encuentra el tipocomponente
                return response()->json(['message' => 'tipocomponente no encontrada'], 404);
            }

            // Obtiene el usuario actual autenticado
            $usuario_actual = auth()->user();

            // Actualiza los campos del tipocomponente con los nuevos valores
            $tipocomponente->Nombre = $request->get('Nombre');
            $tipocomponente->Descripcion = $request->get('Descripcion');
            $tipocomponente->idtipoequipo = $request->get('idtipoequipo');
            $tipocomponente->UsuarioModificador = $usuario_actual->name;
            $tipocomponente->save();

            // Redirige a la página de índice de tipocomponentes con un mensaje de éxito
            return redirect()->route('tipocomponente.index')->with('success', 'Tipocomponente actualizada exitosamente.');
        } catch (\Throwable $error) {
            // Captura cualquier error inesperado y loguea el mensaje
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al actualizar la tipocomponente'
            ];
            return response()->json($data, 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            // Busca la tipocomponente por su ID
            $tipocomponente = Tipocomponente::find($id);
            if (!$tipocomponente) {
                // Retorna un mensaje de error si no se encuentra la tipocomponente
                return response()->json(['message' => 'tipocomponente no encontrada'], 404);
            }

            // Elimina la tipocomponente de la base de datos
            $tipocomponente->delete();

            // Retorna un mensaje de éxito después de eliminar la tipocomponente
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

