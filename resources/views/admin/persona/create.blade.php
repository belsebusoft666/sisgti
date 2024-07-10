<div class="modal-header">
    <!-- Título del modal -->
    <h4 class="modal-title">Registrar Persona</h4>
</div>
<form action="" id="formulario-crear" autocomplete="off">
    <div class="modal-body">
        <!-- Grupo de formulario para el campo "Nombres" -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="nombres">Nombres</label>
            <div class="col-sm-8">
                <input type="text" name="nombres" id="nombres" class="form-control" />
            </div>
        </div>
        <!-- Grupo de formulario para el campo "Apellido Paterno" -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="apellidopaterno">A. Paterno</label>
            <div class="col-sm-8">
                <input type="text" name="apellidopaterno" id="apellidopaterno" class="form-control" />
            </div>
        </div>
        <!-- Grupo de formulario para el campo "Apellido Materno" -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="apellidomaterno">A. Materno</label>
            <div class="col-sm-8">
                <input type="text" name="apellidomaterno" id="apellidomaterno" class="form-control" />
            </div>
        </div>
        <!-- Grupo de formulario para el campo "Número de Documento" -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="numerodocumento">N. Documento</label>
            <div class="col-sm-8">
                <input type="text" name="numerodocumento" id="numerodocumento" class="form-control" />
            </div>
        </div>
        <!-- Grupo de formulario para el campo "Tipo de Documento" -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="tipodocumento">Tipo Documento</label>
            <div class="col-sm-8">
                <select name="tipodocumento" id="tipodocumento" class="form-control">
                    <option value="1">Pasaporte</option>
                    <option value="2">Documento Nacional de Identidad</option>
                    <option value="3">Carnet de Estudiante</option>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <!-- Botón para cerrar el modal -->
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar</button>
        <!-- Botón para enviar el formulario -->
        <button id="btn-submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Registrar</button>
    </div>
</form>

<script>
    // Agrega un evento 'submit' al formulario con el id "formulario-crear"
    document.getElementById("formulario-crear").addEventListener('submit', function(evento) {
        // Previene el comportamiento por defecto del formulario (que sería recargar la página)
        evento.preventDefault();
        // Llama a la función guardar() cuando el formulario es enviado
        guardar();
    });
</script>
