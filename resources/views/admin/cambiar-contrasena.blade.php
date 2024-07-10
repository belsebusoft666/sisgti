<!DOCTYPE html>
<html>
<head>
    <title>Cambiar Contraseña</title>
    <!-- Se enlaza la hoja de estilos de AdminLTE para el diseño -->
    <link rel="stylesheet" href="{{ asset('path/to/admin-lte/css/adminlte.min.css') }}">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">Cambiar Contraseña</div>
            <div class="card-body">
                <!-- Se muestra un mensaje de éxito si existe una sesión flash 'status' -->
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <!-- Formulario para cambiar la contraseña -->
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <div class="form-group">
                        <label for="contrasena_actual">Contraseña Actual</label>
                        <input type="password" name="contrasena_actual" class="form-control" required>
                        <!-- Mensaje de error si la contraseña actual no cumple las reglas de validación -->
                        @error('contrasena_actual')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nueva_contrasena">Nueva Contraseña</label>
                        <input type="password" name="nueva_contrasena" class="form-control" required>
                        <!-- Mensaje de error si la nueva contraseña no cumple las reglas de validación -->
                        @error('nueva_contrasena')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Botón para enviar el formulario de cambio de contraseña -->
                    <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Se carga el script de AdminLTE para funcionalidades adicionales -->
    <script src="{{ asset('path/to/admin-lte/js/adminlte.min.js') }}"></script>
</body>
</html>
