<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Componente;
use App\Models\TipoComponente;
use App\Models\Marca;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ComponenteController extends Controller
{
    public function index()
    {
        // Muestra la vista principal para administrar componentes
        return view("admin.componente.index");
    }

    public function search(Request $request)
    {
        // Realiza una búsqueda de componentes según el término proporcionado
        $busqueda = $request->get('busqueda', '');

        $listado = Componente::join('tipocomponente', 'componente.FkTipoComponente', '=', 'tipocomponente.id')
            ->where('componente.Descripcion', 'LIKE', '%' . $busqueda . '%')
            ->select('componente.id', 'componente.Marca', 'componente.Modelo', 'componente.Serie', 'componente.FkTipoComponente', 'componente.UsuarioCreador', 'componente.UsuarioModificador')
            ->get();

        // Retorna la vista con el listado de componentes encontrados
        return view("admin.componente.list", [
            "listado" => $listado
        ]);
    }

    public function create()
    {
        // Muestra el formulario para crear un nuevo componente
        $tipocomponente_modelo = TipoComponente::orderBy('Nombre', 'ASC')->select('id', 'Nombre')->get();
        $marca_modelo = Marca::orderBy('nombremarca', 'ASC')->select('id', 'nombremarca')->get();
        $datos_componente = Componente::select('id', 'Descripcion', 'Modelo', 'Serie')->get();
        $usuario_actual = auth()->user();

        return view("admin.componente.create", [
            'tipocomponente_modelo' => $tipocomponente_modelo,
            'marca_modelo' => $marca_modelo,
            'datos_componente' => $datos_componente,
            'usuario_actual' => $usuario_actual,
        ]);
    }

    public function store(Request $request)
    {
        // Valida y almacena un nuevo componente en la base de datos
        $validator = Validator::make($request->all(), [
            'Descripcion' => 'required|string|max:2000',
            'Marca' => 'required|exists:marca,id',
            'Modelo' => 'required|string|max:250',
            'Serie' => 'required|string|max:50',
            'FkTipoComponente' => 'required|exists:tipocomponente,id',
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

        // Obtiene el usuario actual autenticado
        $usuario_actual = auth()->user();

        // Crea una nueva instancia de Componente y la guarda en la base de datos
        $componente = new Componente();

        $componente->Descripcion = $request->get('Descripcion');
        $componente->Marca = $request->get('Marca');
        $componente->Modelo = $request->get('Modelo');
        $componente->Serie = $request->get('Serie');
        $componente->FkTipoComponente = $request->get('FkTipoComponente');
        $componente->UsuarioCreador = $usuario_actual->name;
        $componente->UsuarioModificador = $usuario_actual->name;
        $componente->save();

        // Redirige a la vista principal de componentes con un mensaje de éxito
        return redirect()->route('componente.index')->with('success', 'Componente creado exitosamente.');
    }

    public function edit(string $id)
    {
        try {
            // Busca el componente por su ID para editarlo
            $componente = Componente::find($id);
            if (!$componente) {
                return response()->json(['message' => 'componente no encontrado'], 404);
            }

            // Obtiene modelos de TipoComponente y Marca para el formulario de edición
            $tipocomponente_modelo = TipoComponente::orderBy('Nombre', 'ASC')->select('id', 'Nombre')->get();
            $marca_modelo = Marca::orderBy('nombremarca', 'ASC')->select('id', 'nombremarca')->get();
            $usuario_actual = auth()->user();

            // Retorna la vista de edición con los datos del componente encontrado
            return view('admin.componente.edit', [
                "item" => $componente,
                'tipocomponente_modelo' => $tipocomponente_modelo,
                'marca_modelo' => $marca_modelo,
                'usuario_actual' => $usuario_actual,
            ]);
        } catch (\Throwable $error) {
            // Maneja los errores y registra un mensaje en el registro de errores
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al cargar el componente. Contactarse con el área de soporte'
            ];
            return response()->json($data, 500);
        }
    }

    public function update(Request $request, string $id)
    {
        // Valida y actualiza un componente existente en la base de datos
        $validator = Validator::make($request->all(), [
            'Descripcion' => 'required|string|max:2000',
            'Marca' => 'required|exists:marca,id',
            'Modelo' => 'required|string|max:250',
            'Serie' => 'required|string|max:50',
            'FkTipoComponente' => 'required|exists:tipocomponente,id',
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
            // Busca el componente por su ID para actualizarlo
            $componente = Componente::find($id);
            if (!$componente) {
                return response()->json(['message' => 'componente no encontrado'], 404);
            }

            // Obtiene el usuario actual autenticado
            $usuario_actual = auth()->user();

            // Actualiza los campos del componente con los nuevos datos
            $componente->Descripcion = $request->get('Descripcion');
            $componente->FkMarca = $request->get('Marca');  // Suponiendo que la columna de llave foránea se llama 'FkMarca'
            $componente->Modelo = $request->get('Modelo');
            $componente->Serie = $request->get('Serie');
            $componente->FkTipoComponente = $request->get('FkTipoComponente');
            $componente->UsuarioModificador = $usuario_actual->name;

            $componente->save();

            // Retorna una respuesta JSON con un mensaje de éxito
            return response()->json(['message' => 'componente actualizada exitosamente'], 200);
        } catch (\Throwable $error) {
            // Maneja los errores y registra un mensaje en el registro de errores
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al actualizar la componente'
            ];
            return response()->json($data, 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            // Busca el componente por su ID y lo elimina de la base de datos
            $componente = Componente::find($id);
            $componente->delete();

            // Retorna una respuesta JSON con un mensaje de éxito
            $data = ['message' => 'Eliminado correctamente'];
            return response()->json($data, 200);
        } catch (\Throwable $error) {
            // Maneja los errores y registra un mensaje en el registro de errores
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al eliminar el componente'
            ];
            return response()->json($data, 500);
        }
    }
}
