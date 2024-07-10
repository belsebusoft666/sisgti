<div class="modal-header">
    <h4 class="modal-title">Registrar Laboratorio</h4>
</div>
<form action="" id="formulario-crear" autocomplete="off">
    <div class="modal-body">
        <!-- Campo Nombre LAB -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="nombre">Nombre LAB</label>
            <div class="col-sm-8">
                <input type="text" name="nombre" id="nombre" class="form-control" />
            </div>
        </div>
        <!-- Campo Descripción -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="descripcion">Descripción</label>
            <div class="col-sm-8">
                <input type="text" name="descripcion" id="descripcion" class="form-control" />
            </div>
        </div>
        <!-- Selector de Responsable -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="persona_id">Responsable</label>
            <div class="col-sm-8">
                <select name="persona_id" id="persona_id" class="form-control">
                    <option value="">[--SELECCIONE--]</option>
                    @foreach ($persona_laboratorio as $persona)
                        <option value="{{ $persona->id }}">{{ $persona->nombres }}, {{ $persona->apellidopaterno }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- Campo Usuario Creador (readonly) -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="usuariocreador">U. Creador</label>
            <div class="col-sm-8">
                <input type="text" name="usuariocreador" id="usuariocreador" class="form-control" value="{{ $usuario_actual->name }}" readonly />
            </div>
        </div>
        <!-- Campo Usuario Modificador (readonly) -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="usuariomodificador">U. Modificador</label>
            <div class="col-sm-8">
                <input type="text" name="usuariomodificador" id="usuariomodificador" class="form-control" value="{{ $usuario_actual->name }}" readonly />
            </div>
        </div>
    </div>
    <!-- Footer del formulario modal -->
    <div class="modal-footer justify-content-between">
        <!-- Botón de Cerrar -->
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar</button>
        <!-- Botón de Registrar (submit) -->
        <button id="btn-submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Registrar</button>
    </div>
</form>
<!-- Script para manejar el evento de submit del formulario -->
<script>
    document.getElementById("formulario-crear").addEventListener('submit', function(evento) {
        evento.preventDefault(); // Prevenir el comportamiento por defecto del formulario
        guardar(); // Llamar a la función guardar() para procesar los datos
    });
</script>
