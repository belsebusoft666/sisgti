<div class="modal-header">
    <h4 class="modal-title">Registrar usuario</h4>
</div>
<form action="" id="formulario-crear" autocomplete="off">
    <div class="modal-body">
        <!-- Campo para seleccionar una persona -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="persona_id">Persona</label>
            <div class="col-sm-8">
                <select name="persona_id" id="persona_id" class="form-control">
                    <option value="">[--SELECCIONE--]</option>
                    @foreach ($persona_user as $persona)
                        <option value="{{ $persona->id }}">{{ $persona->nombres }} , {{ $persona->apellidopaterno }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Campo para ingresar nombre de usuario -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="name">Nombre de usuario</label>
            <div class="col-sm-8">
                <input type="text" name="name" id="name" class="form-control" />
            </div>
        </div>

        <!-- Campo para ingresar email -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="email">Email</label>
            <div class="col-sm-8">
                <input type="email" name="email" id="email" class="form-control" />
            </div>
        </div>

        <!-- Campo para ingresar descripción -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="descripcion">Descripción</label>
            <div class="col-sm-8">
                <input type="text" name="descripcion" id="descripcion" class="form-control" />
            </div>
        </div>

        <!-- Campo para ingresar contraseña -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="password">Contraseña</label>
            <div class="col-sm-8">
                <input type="password" name="password" id="password" class="form-control" />
            </div>
        </div>

        <!-- Campo para confirmar contraseña -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="password_confirmation">Confirmar contraseña</label>
            <div class="col-sm-8">
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" />
            </div>
        </div>

        <!-- Checkbox para seleccionar estado activo -->
        <div class="form-group">
            <label class="col-sm-4 col-form-label" for="activo">Estado</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="activo" name="activo" value="activo">
                <label class="form-check-label" for="activo">Activo</label>
            </div>
        </div>
    </div>

    <!-- Botones para cerrar el modal y para enviar el formulario -->
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar</button>
        <button id="btn-submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Registrar</button>
    </div>
</form>

<script>
    // Agrega un evento para manejar el envío del formulario
    document.getElementById("formulario-crear").addEventListener('submit', function(evento) {
        evento.preventDefault(); // Evita el envío estándar del formulario
        guardar(); // Llama a la función `guardar()` para procesar el registro del usuario
    });
</script>

