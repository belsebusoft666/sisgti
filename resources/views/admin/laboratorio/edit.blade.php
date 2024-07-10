<div class="modal-header">
    <h4 class="modal-title">Editar Laboratorio</h4>
</div>
<form action="" id="formulario-editar" autocomplete="on">
    @method('PUT') <!-- Método HTTP para indicar que se usará PUT en el envío del formulario -->
    <div class="modal-body">
        <!-- Campo Nombre LAB -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="nombre">Nombre LAB</label>
            <div class="col-sm-8">
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $item->nombre }}" />
            </div>
        </div>
        <!-- Campo Descripción -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="descripcion">Descripción</label>
            <div class="col-sm-8">
                <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ $item->descripcion }}" />
            </div>
        </div>
        <!-- Selector de Responsable -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="persona_id">Responsable</label>
            <div class="col-sm-8">
                <select name="persona_id" id="persona_id" class="form-control">
                    <option value="">[--SELECCIONE--]</option>
                    @foreach ($persona_user as $persona)
                        <!-- Opción del selector con opción seleccionada si corresponde -->
                        <option value="{{ $persona->id }}" {{ $item->persona_id == $persona->id ? 'selected' : '' }}>{{ $persona->nombres }} , {{ $persona->apellidopaterno }}</option>
                    @endforeach
                </select>
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
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar
        </button>
        <!-- Botón de Actualizar (submit) -->
        <button id="btn-submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
            Actualizar</button>
    </div>
</form>
<!-- Script para manejar el evento de submit del formulario -->
<script>
    document.getElementById("formulario-editar").addEventListener('submit', function(evento) {
        evento.preventDefault(); // Prevenir el comportamiento por defecto del formulario
        actualizar({{ $item->id }}); // Llamar a la función actualizar() con el ID del laboratorio
    });
</script>
