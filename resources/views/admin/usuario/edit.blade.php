<div class="modal-header">
    <h4 class="modal-title">Editar Usuario</h4>
</div>
<form action="" id="formulario-editar" autocomplete="on">
    @method('PUT') <!-- Método HTTP PUT para enviar el formulario -->
    <div class="modal-body">
        <!-- Campo para seleccionar una persona -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="persona_id">Persona</label>
            <div class="col-sm-8">
                <select name="persona_id" id="persona_id" class="form-control">
                    <option value="programa_id">[--SELECCIONE--]</option>
                    @foreach ($persona_user as $persona)
                        <option value="{{ $persona->id }}">{{ $persona->nombres }} , {{ $persona->apellidopaterno }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Campo para ingresar nombre de usuario, con valor predefinido -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="nombre">Nombre de usuario</label>
            <div class="col-sm-8">
                <input type="text" name="name" id="name" class="form-control" value="{{ $item->name }}" />
            </div>
        </div>

        <!-- Campo para ingresar email, con valor predefinido -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="nombre">Email</label>
            <div class="col-sm-8">
                <input type="text" name="email" id="email" class="form-control" value="{{ $item->email }}" />
            </div>
        </div>

        <!-- Campo para ingresar descripción, con valor predefinido -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="descripcion">Descripción</label>
            <div class="col-sm-8">
                <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ $item->descripcion }}" />
            </div>
        </div>

        <!-- Checkbox para seleccionar estado activo, con valor predefinido -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="activo">Estado</label>
            <div class="col-sm-8">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="activo" name="activo" value="1" {{ $item->activo == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="activo">
                        Activo
                    </label>
                </div>
            </div>
        </div>

        <!-- Campo para ingresar nueva contraseña -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="password" :value="__('Password')">Contraseña</label>
            <div class="col-sm-8">
                <input type="password" name="password" id="password" class="form-control" />
            </div>
        </div>

        <!-- Campo para confirmar nueva contraseña -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="password_confirmation" :value="__('Confirm Password')">Confirmar Contraseña</label>
            <div class="col-sm-8">
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" />
            </div>
        </div>
    </div>

    <!-- Botones para cerrar el modal y para enviar el formulario de actualización -->
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar
        </button>
        <button id="btn-submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
            Actualizar</button>
    </div>
</form>

<script>
    // Agrega un evento para manejar el envío del formulario
    document.getElementById("formulario-editar").addEventListener('submit', function(evento) {
        evento.preventDefault(); // Evita el envío estándar del formulario
        actualizar({{ $item->id }}); // Llama a la función `actualizar()` para procesar la actualización del usuario con el ID específico
    });
</script>
