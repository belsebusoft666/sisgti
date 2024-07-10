<div class="modal-header">
    <!-- Título del modal -->
    <h4 class="modal-title">Registrar usuario</h4>
</div>
<!-- Formulario para registrar un nuevo usuario -->
<form action="" id="formulario-crear" autocomplete="off">
    <div class="modal-body">
        <!-- Campo de entrada para el código -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="codigo">Código</label>
            <div class="col-sm-8">
                <input type="text" name="codigo" id="codigo" class="form-control" />
            </div>
        </div>
        <!-- Campo de entrada para el símbolo -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="simbolo">Simbolo</label>
            <div class="col-sm-8">
                <input type="text" name="simbolo" id="simbolo" class="form-control" />
            </div>
        </div>
        <!-- Campo de entrada para el nombre -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="nombre">Nombre</label>
            <div class="col-sm-8">
                <input type="text" name="nombre" id="nombre" class="form-control" />
            </div>
        </div>
        <!-- Campo de entrada para la descripción -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="descripcion">Descripcion</label>
            <div class="col-sm-8">
                <input type="text" name="descripcion" id="descripcion" class="form-control" />
            </div>
        </div>
        <!-- Botones para cerrar el modal y enviar el formulario -->
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar</button>
            <button id="btn-submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Registrar</button>
        </div>
</form>
<!-- Script para manejar el envío del formulario -->
<script>
    document.getElementById("formulario-crear").addEventListener('submit', function(evento) {
        evento.preventDefault(); // Evita el envío del formulario por defecto
        guardar(); // Llama a la función guardar()
    });
</script>
