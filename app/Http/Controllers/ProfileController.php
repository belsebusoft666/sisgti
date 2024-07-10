<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // Muestra el formulario de edición del perfil del usuario
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Actualiza la información del perfil del usuario
        $request->user()->fill($request->validated());

        // Si el correo electrónico ha cambiado, se restablece la verificación
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Guarda los cambios en el perfil del usuario
        $request->user()->save();

        // Redirige de vuelta a la página de edición del perfil con un mensaje de éxito
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Valida la solicitud de eliminación de cuenta del usuario
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        // Obtiene el usuario actual
        $user = $request->user();

        // Cierra la sesión del usuario
        Auth::logout();

        // Elimina la cuenta del usuario
        $user->delete();

        // Invalida la sesión y regenera el token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirige al usuario a la página principal después de eliminar la cuenta
        return Redirect::to('/');
    }
}

