<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Persona;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;



class RegisteredPersonaController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.registerpersona');
    }

    public function store(Request $request)
    {
        // Validar los datos recibidos del formulario
        $validator = Validator::make($request->all(), [
            'nombres' => 'required|string',
            'apellidopaterno' => 'required|string',
            'apellidomaterno' => 'required|string',
            'numerodocumento' => 'required|string',
            'tipodocumento' => 'required|integer',
        ]);

        // Si la validación falla, retornar un JSON con los errores
        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json([
                'message' => 'Error en la validación de los datos',
                'errors' => $errors
            ], 422);
        }

        try {
            // Crear una nueva instancia de Persona con los datos del formulario
            $persona = new Persona();
            $persona->nombres = $request->get('nombres');
            $persona->apellidopaterno = $request->get('apellidopaterno');
            $persona->apellidomaterno = $request->get('apellidomaterno');
            $persona->numerodocumento = $request->get('numerodocumento');
            $persona->tipodocumento = $request->get('tipodocumento');

            // Guardar la persona en la base de datos
            $persona->save();

            // Retornar una respuesta JSON indicando que se ha registrado correctamente
            return response()->json([
                'message' => 'Persona registrada correctamente',
                'persona' => $persona
            ], 201);
        } catch (\Throwable $error) {
            // En caso de error, registrar el error en el log y retornar una respuesta de error
            Log::error($error->getMessage());
            return response()->json([
                'message' => 'Error al registrar la persona. Contactarse con el área de soporte'
            ], 500);
        }
    }
}
