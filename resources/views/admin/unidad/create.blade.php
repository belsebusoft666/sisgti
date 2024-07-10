<div class="modal-header">
    <h4 class="modal-title">Registrar usuario</h4>
</div>
<form action="" id="formulario-crear" autocomplete="off">
    <div class="modal-body">
        <!-- Campo para ingresar el código -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="codigo">Código</label>
            <div class="col-sm-8">
                <input type="text" name="codigo" id="codigo" class="form-control" />
            </div>
        </div>

        <!-- Campo para ingresar el símbolo -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="simbolo">Símbolo</label>
            <div class="col-sm-8">
                <input type="text" name="simbolo" id="simbolo" class="form-control" />
            </div>
        </div>

        <!-- Campo para ingresar el nombre -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="nombre">Nombre</label>
            <div class="col-sm-8">
                <input type="text" name="nombre" id="nombre" class="form-control" />
            </div>
        </div>

        <!-- Campo para ingresar la descripción -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="descripcion">Descripción</label>
            <div class="col-sm-8">
                <input type="text" name="descripcion" id="descripcion" class="form-control" />
            </div>
        </div>

        <!-- Footer del modal con botones de acción -->
        <div class="modal-footer justify-content-between">
            <!-- Botón para cerrar el modal -->
            <button type="button" class="btn btn-default" data-dismiss="modal">
                <i class="fas fa-window-close"></i> Cerrar
            </button>
            
            <!-- Botón para enviar el formulario -->
            <button id="btn-submit" type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Registrar
            </button>
        </div>
    </div>
</form>

<script>
    // Agrega un evento para manejar el envío del formulario
    document.getElementById("formulario-crear").addEventListener('submit', function(evento) {
        evento.preventDefault(); // Previene el comportamiento predeterminado del formulario
        guardar(); // Llama a la función `guardar()` para procesar el envío del formulario
    });
</script>
