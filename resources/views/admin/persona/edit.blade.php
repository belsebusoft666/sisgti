<div class="modal-header">
    <!-- Título del modal -->
    <h4 class="modal-title">Editar Persona</h4>
</div>
<form action="" id="formulario-editar" autocomplete="on">
    <!-- Método PUT para la actualización de datos -->
    @method('PUT')
    <div class="modal-body">
        <!-- Grupo de formulario para el campo "Nombres" -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="nombres">Nombre</label>
            <div class="col-sm-8">
                <!-- Campo de texto pre-llenado con el valor del atributo "nombres" del objeto "item" -->
                <input type="text" name="nombres" id="nombres" class="form-control" value="{{ $item->nombres }}" />
            </div>
        </div>
        <!-- Grupo de formulario para el campo "Apellido Paterno" -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="apellidopaterno">A. Paterno</label>
            <div class="col-sm-8">
                <!-- Campo de texto pre-llenado con el valor del atributo "apellidopaterno" del objeto "item" -->
                <input type="text" name="apellidopaterno" id="apellidopaterno" class="form-control" value="{{ $item->apellidopaterno }}" />
            </div>
        </div>
        <!-- Grupo de formulario para el campo "Apellido Materno" -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="apellidomaterno">A. Materno</label>
            <div class="col-sm-8">
                <!-- Campo de texto pre-llenado con el valor del atributo "apellidomaterno" del objeto "item" -->
                <input type="text" name="apellidomaterno" id="apellidomaterno" class="form-control" value="{{ $item->apellidomaterno }}" />
            </div>
        </div>
        <!-- Grupo de formulario para el campo "Número de Documento" -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="numerodocumento">N. Documento</label>
            <div class="col-sm-8">
                <!-- Campo de texto pre-llenado con el valor del atributo "numerodocumento" del objeto "item" -->
                <input type="text" name="numerodocumento" id="numerodocumento" class="form-control" value="{{ $item->numerodocumento }}" />
            </div>
        </div>
        <!-- Grupo de formulario para el campo "Tipo de Documento" -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="tipodocumento">Tipo de Documento</label>
            <div class="col-sm-8">
                <!-- Selección pre-llenada con el valor del atributo "tipodocumento" del objeto "item" -->
                <select name="tipodocumento" id="tipodocumento" class="form-control">
                    <option value="1" {{ $item->tipodocumento == 1 ? 'selected' : '' }}>Pasaporte</option>
                    <option value="2" {{ $item->tipodocumento == 2 ? 'selected' : '' }}>Documento Nacional de Identidad</option>
                    <option value="3" {{ $item->tipodocumento == 3 ? 'selected' : '' }}>Carnet de Estudiante</option>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <!-- Botón para cerrar el modal -->
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar</button>
        <!-- Botón para enviar el formulario -->
        <button id="btn-submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
    </div>
</form>
<script>
    // Agrega un evento 'submit' al formulario con el id "formulario-editar"
    document.getElementById("formulario-editar").addEventListener('submit', function(evento) {
        // Previene el comportamiento por defecto del formulario (que sería recargar la página)
        evento.preventDefault();
        // Llama a la función actualizar() pasando el id del objeto "item" cuando el formulario es enviado
        actualizar({{ $item->id }});
    });
</script>
