<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modelo;
use App\Models\Marca;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Muestra la vista principal para administrar modelos
        return view("admin.modelo.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function search(Request $request)
    {
        // Realiza una búsqueda de modelos según el término proporcionado y/o la marca seleccionada
        $busqueda = $request->get('busqueda', '');
        $marca_id = $request->get('marca_id', '');
    
        $query = Modelo::join('marca', 'modelo.marca_id', '=', 'marca.id')
            ->select('modelo.id', 'modelo.nombremodelo', 'modelo.marca_id', 'marca.nombremarca AS nombremarca');
    
        if ($busqueda) {
            $query->where('modelo.nombremodelo', 'LIKE', '%' . $busqueda . '%');
        }
    
        if ($marca_id) {
            $query->where('marca.id', $marca_id);
        }
    
        $listado = $query->get();
        $marca_modelo = Marca::orderBy('nombremarca', 'ASC')->select('id', 'nombremarca')->get();
    
        // Retorna la vista con el listado de modelos encontrados y las marcas disponibles
        return view("admin.modelo.list", [
            "listado" => $listado,
            'marca_modelo' => $marca_modelo,
            'busqueda' => $busqueda,
            'marca_id' => $marca_id
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Muestra el formulario para crear un nuevo modelo
        $marca_modelo = Marca::orderBy('nombremarca', 'ASC')->select('id', 'nombremarca')->get();
        $datos_modelo = Modelo::select('id', 'nombremodelo')->get();

        return view("admin.modelo.create", [
            'marca_modelo' => $marca_modelo,
            'datos_modelo' => $datos_modelo,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createmarca()
    {
        // Muestra el formulario para crear una nueva marca (si es necesario implementarlo)
        return view("admin.modelo.createmarca");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storemarca(Request $request)
    {
        // Valida y guarda una nueva marca en la base de datos
        $validator = Validator::make($request->all(), [
            'nombremarca' => 'required|string|min:3|max:50',
        ]);

        // Si la validación falla, retorna los errores
        if ($validator->fails()) {
            $errors = $validator->errors();

            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $errors
            ];

            return response()->json($data, 422);
        }

        try {
            // Crea una nueva instancia de Marca y la guarda en la base de datos
            $marca = new Marca();
            $marca->nombremarca = $request->get('nombremarca');
            $marca->save();

            $data = [
                'message' => 'Registrado correctamente'
            ];
            return response()->json($data, 201);
        } catch (\Throwable $error) {
            // Maneja los errores y registra un mensaje en el registro de errores
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al registrar la marca. Contactarse con el área de soporte'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida y guarda un nuevo modelo en la base de datos
        $validator = Validator::make($request->all(), [
            'nombremodelo' => 'required|string|min:3|max:50',
            'marca_id' => 'required|int'
        ]);

        // Si la validación falla, retorna los errores
        if ($validator->fails()) {
            $errors = $validator->errors();

            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $errors
            ];

            return response()->json($data, 422);
        }

        try {
            // Crea una nueva instancia de Modelo y la guarda en la base de datos
            $modelo = new Modelo();
            $modelo->nombremodelo = $request->get('nombremodelo');
            $modelo->marca_id = $request->get('marca_id');
            $modelo->save();

            $data = [
                'message' => 'Registrado correctamente'
            ];
            return response()->json($data, 201);
        } catch (\Throwable $error) {
            // Maneja los errores y registra un mensaje en el registro de errores
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al registrar el modelo. Contactarse con el área de soporte'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Muestra detalles específicos de un modelo (si es necesario implementarlo)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Muestra el formulario para editar un modelo existente
        try {
            $modelo = Modelo::find($id);
            $marca_modelo = Marca::orderBy('nombremarca', 'ASC')->select('id', 'nombremarca')->get();

            return view('admin.modelo.edit', [
                "item" => $modelo,
                "marca_modelo" => $marca_modelo,
            ]);
        } catch (\Throwable $error) {
            // Maneja los errores y registra un mensaje en el registro de errores
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al cargar el modelo. Contactarse con el área de soporte'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Valida y actualiza un modelo existente en la base de datos
        $validator = Validator::make($request->all(), [
            'nombremodelo' => 'required|string',
            'marca_id' => 'required|int'
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
            // Busca el modelo por su ID para actualizarlo
            $modelo = Modelo::find($id);
            $modelo->nombremodelo = $request->get('nombremodelo');
            $modelo->marca_id = $request->get('marca_id');
            $modelo->save();

            $data = ['message' => 'Actualizado correctamente'];
            return response()->json($data, 200);
        } catch (\Throwable $error) {
            // Maneja los errores y registra un mensaje en el registro de errores
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al actualizar el modelo'
            ];
            return response()->json($data, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Elimina un modelo de la base de datos
        try {
            $modelo = Modelo::find($id);
            $modelo->delete();

            $data = ['message' => 'Eliminado correctamente'];
            return response()->json($data, 200);
        } catch (\Throwable $error) {
            // Maneja los errores y registra un mensaje en el registro de errores
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al eliminar el modelo'
            ];
            return response()->json($data, 500);
        }
    }
}

