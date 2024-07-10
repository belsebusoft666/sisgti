<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retorna la vista del índice de usuarios
        return view("admin.usuario.index");
    }

    /**
     * Search for users based on criteria.
     */
    public function search(Request $request)
    {
        // Recoge el parámetro de búsqueda
        $busqueda = $request->get('busqueda', '');

        // Realiza la búsqueda utilizando Eloquent ORM, incluyendo la relación con la tabla 'persona'
        $listado = User::join('persona', 'users.persona_id', '=', 'persona.id')
            ->where('users.name', 'LIKE', '%' . $busqueda . '%')
            ->select('users.id', 'users.activo', 'users.name', 'users.email', 'users.descripcion', 'users.persona_id', 'persona.nombres', 'persona.apellidopaterno')
            ->get();

        // Retorna la vista con el listado de resultados
        return view("admin.usuario.list", [
            "listado" => $listado
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtiene todas las personas ordenadas por nombres para usar en el formulario de creación de usuario
        $persona_user = Persona::orderBy('nombres', 'ASC')->select('id', 'nombres', 'apellidopaterno')->get();

        // Obtiene todos los datos de usuarios para mostrar en el formulario de creación
        $datos_user = User::select('id', 'name', 'email', 'descripcion')->get();

        // Retorna la vista de creación de usuario con los datos necesarios
        return view("admin.usuario.create", [
            'persona_user' => $persona_user,
            'datos_user' => $datos_user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida los datos recibidos en la solicitud
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|min:8|confirmed',
            'descripcion' => 'required|string',
            'persona_id' => 'required|int'
        ]);

        if ($validator->fails()) {
            // En caso de fallo en la validación, retorna errores JSON
            $errors = $validator->errors();

            $data = [
                'message' => 'Error en la validacion de los datos',
                'errors' => $errors
            ];

            return response()->json($data, 422);
        }

        try {
            // Crea una nueva instancia de User y guarda en la base de datos
            $usuario = new User();
            $usuario->name = $request->get('name');
            $usuario->email = $request->get('email');
            $usuario->descripcion = $request->get('descripcion');
            $usuario->persona_id = $request->get('persona_id');
            $usuario->password = Hash::make($request->get('password'));

            // Obtener el valor del estado del usuario del formulario
            $activo = $request->has('activo') ? 1 : 0;
            $usuario->activo = $activo;

            $usuario->save();

            // Retorna un mensaje de éxito
            $data = [
                'message' => 'Registrado correctamente'
            ];
            return response()->json($data, 201);
        } catch (\Throwable $error) {
            // Captura cualquier error inesperado y loguea el mensaje
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al registrar el usuario. Contactarse con el area de soporte'
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
            // Busca el usuario por su ID y también obtiene todas las personas para usar en el formulario de edición
            $usuario = User::find($id);
            $persona_user = Persona::orderBy('nombres', 'ASC')->select('id', 'nombres', 'apellidopaterno')->get();

            // Retorna la vista de edición de usuario con los datos necesarios
            return view('admin.usuario.edit', [
                "item" => $usuario,
                "persona_user" => $persona_user,
            ]);
        } catch (\Throwable $error) {
            // Captura cualquier error inesperado y loguea el mensaje
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al registrar el usuario. Contactarse con el area de soporte'
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
            'name' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|string|confirmed',
            'descripcion' => 'required|string',
            'persona_id' => 'required|int'
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
            // Busca el usuario por su ID y actualiza los campos con los nuevos valores
            $usuario = User::find($id);
            $usuario->name = $request->get('name');
            $usuario->email = $request->get('email');
            $usuario->password = $request->get('password');
            $usuario->descripcion = $request->get('descripcion');
            $usuario->persona_id = $request->get('persona_id');

            // Actualiza el estado del usuario si se marca desde el formulario
            if ($request->has('activo')) {
                $usuario->activo = $request->input('activo') ? 1 : 0;
            }
            
            $usuario->save();

            // Retorna un mensaje de éxito
            $data = ['message' => 'Actualizado correctamente'];
            return response()->json($data, 200);
        } catch (\Throwable $error) {
            // Captura cualquier error inesperado y loguea el mensaje
            Log::error($error->getMessage());
            $data = [
                'message' => 'Error al actualizar el usuario'
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
            // Busca el usuario por su ID y elimina de la base de datos
            $usuario = User::find($id);
            $usuario->delete();

            // Retorna un mensaje de éxito después de eliminar el usuario
            $data = ['message' => 'Eliminado correctamente'];
            return response()->json($data, 200);
        } catch (\Throwable $error) {
            // Captura cualquier error inesperado y loguea el mensaje
            Log::error($error->getMessage());
            $data = ['message' => 'Error al eliminar usuario'];
            return response()->json($data, 500);
        }
    }

    /**
     * Show the form for changing password.
     */
    public function mostrarFormularioCambioContrasena()
    {
        return view('auth.cambiar-contrasena'); // Retorna la vista para cambiar contraseña
    }

    /**
     * Update the password for the authenticated user.
     */
    public function cambiarContrasena(Request $request)
    {
        // Valida los datos recibidos en la solicitud
        $request->validate([
            'contrasena_actual' => 'required',
            'nueva_contrasena' => 'required|min:8',
        ]);

        // Obtiene el usuario actual autenticado
        $user = $request->user();

        // Verifica que la contraseña actual coincida con la almacenada en la base de datos
        if (!Hash::check($request->contrasena_actual, $user->password)) {
            throw ValidationException::withMessages([
                'contrasena_actual' => ['La contraseña proporcionada no coincide con nuestros registros.'],
            ]);
        }

        // Actualiza la contraseña del usuario con la nueva contraseña hasheada
        $user->update([
            'password' => Hash::make($request->nueva_contrasena)
        ]);

        // Redirige a la ruta para cambiar contraseña con un mensaje de éxito
        return redirect()->route('password.change')->with('status', '¡Contraseña cambiada exitosamente!');
    }
}