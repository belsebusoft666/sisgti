<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Aquí es donde puedes registrar las rutas web para tu aplicación. Estas
| rutas son cargadas por el RouteServiceProvider y todas serán asignadas
| al grupo de middleware "web". ¡Haz algo grandioso!
|--------------------------------------------------------------------------
*/

// Ruta para la página de inicio
Route::get('/', function () {
    return view('welcome');
});

// Ruta para el panel de control, con middleware de autenticación y verificación
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo de rutas que requieren autenticación
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Requiere el archivo de rutas de autenticación
require __DIR__ . '/auth.php';

// Grupo de rutas que requieren autenticación y verificación
Route::middleware(['auth', 'verified'])->group(function () {
    // Ruta para la página de administración
    Route::get("/admin", [\App\Http\Controllers\AdminController::class, "index"]);

    // Rutas para usuario, con middleware de autenticación
    Route::group(['middleware' => 'auth'], function() {
        Route::get('/admin/usuario/search', [\App\Http\Controllers\UsuarioController::class, 'search'])->name('usuario.search');
        Route::resource('/admin/usuario', \App\Http\Controllers\UsuarioController::class)->except('show');
    });

    // Rutas para persona, con middleware de autenticación
    Route::group(['middleware' => 'auth'], function() {
        Route::get('/admin/persona/search', [\App\Http\Controllers\PersonaController::class, 'search'])->name('persona.search');
        Route::resource('/admin/persona', \App\Http\Controllers\PersonaController::class)->except('show');
    });

    // Ruta para unidad
    Route::get('/admin/unidad/search', [\App\Http\Controllers\UnidadController::class, 'search'])->name('unidad.search');
    Route::resource('/admin/unidad', \App\Http\Controllers\UnidadController::class)->except('show');

    // Ruta para marca
    Route::get('/admin/marca/search', [\App\Http\Controllers\MarcaController::class, 'search'])->name('marca.search');
    Route::resource('/admin/marca', \App\Http\Controllers\MarcaController::class)->except('show');

    // Ruta para modelo
    Route::get('/admin/modelo/search', [\App\Http\Controllers\ModeloController::class, 'search'])->name('modelo.search');
    Route::resource('/admin/modelo', \App\Http\Controllers\ModeloController::class)->except('show');

    // Ruta para laboratorio
    Route::get('/admin/laboratorio/search', [\App\Http\Controllers\LaboratorioController::class, 'search'])->name('laboratorio.search');
    Route::resource('/admin/laboratorio',\App\Http\Controllers\LaboratorioController::class)->except('show');

    // Ruta para sistema
    Route::get('/admin/sistema/search', [\App\Http\Controllers\SistemaController::class, 'search'])->name('sistema.search');
    Route::resource('/admin/sistema', \App\Http\Controllers\SistemaController::class)->except('show');

    // Ruta para cambiar contraseña de usuario
    Route::get('/user/change-password', 'UserController@showChangePasswordForm')->name('password.change');
    Route::post('/user/change-password', 'UserController@changePassword')->name('password.update');

    // Rutas para cambiar contraseña de usuario usando UsuarioController
    Route::get('cambiar-contrasena', [UsuarioController::class, 'mostrarFormularioCambioContrasena'])->name('password.change');
    Route::post('cambiar-contrasena', [UsuarioController::class, 'cambiarContrasena'])->name('password.update');

    // Ruta para equipo
    Route::get('/admin/equipo/search', [\App\Http\Controllers\EquipoController::class, 'search'])->name('equipo.search');
    Route::resource('/admin/equipo', \App\Http\Controllers\EquipoController::class)->except('show');

    // Ruta para componente
    Route::get('/admin/componente/search', [\App\Http\Controllers\ComponenteController::class, 'search'])->name('componente.search');
    Route::resource('/admin/componente', \App\Http\Controllers\ComponenteController::class)->except('show');

    // Ruta para tipo equipo
    Route::get('/admin/tipoequipo/search', [\App\Http\Controllers\TipoequipoController::class, 'search'])->name('tipoequipo.search');
    Route::resource('/admin/tipoequipo', \App\Http\Controllers\TipoequipoController::class)->except('show');

    // Ruta para característica
    Route::get('/admin/caracteristica/search', [\App\Http\Controllers\CaracteristicaController::class, 'search'])->name('caracteristica.search');
    Route::resource('/admin/caracteristica', \App\Http\Controllers\CaracteristicaController::class)->except('show');

    // Ruta para tipo componente
    Route::get('/admin/tipocomponente/search', [\App\Http\Controllers\TipocomponenteController::class, 'search'])->name('tipocomponente.search');
    Route::resource('/admin/tipocomponente', \App\Http\Controllers\TipocomponenteController::class)->except('show');
});
