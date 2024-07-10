<div class="modal-header">
    <!-- Título del modal -->
    <h4 class="modal-title">Editar Caracteristica</h4>
</div>

<!-- Formulario para editar una característica existente -->
<form action="{{ route('caracteristica.update', $item->id) }}" id="formulario-editar" method="POST" autocomplete="off">
    @csrf <!-- Token CSRF para la protección contra ataques CSRF -->
    @method('PUT') <!-- Directiva de método PUT para las actualizaciones -->
    <div class="modal-body">
        <!-- Campo de entrada para el código -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="codigo">Código</label>
            <div class="col-sm-8">
                <input type="text" name="codigo" id="codigo" class="form-control" value="{{ $item->codigo }}" maxlength="50" />
            </div>
        </div>
        <!-- Campo de entrada para el símbolo -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="simbolo">Símbolo</label>
            <div class="col-sm-8">
                <input type="text" name="simbolo" id="simbolo" class="form-control" value="{{ $item->simbolo }}" maxlength="5" />
            </div>
        </div>
        <!-- Campo de entrada para el nombre -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="nombre">Nombre</label>
            <div class="col-sm-8">
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $item->nombre }}" maxlength="250" />
            </div>
        </div>
        <!-- Campo de entrada para la descripción -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="descripcion">Descripción</label>
            <div class="col-sm-8">
                <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ $item->descripcion }}" maxlength="2000" />
            </div>
        </div>
        <!-- Botones para cerrar el modal y enviar el formulario -->
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar</button>
            <button id="btn-submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
        </div>
    </div>
</form>

<!-- Script para manejar el envío del formulario -->
<script>
    document.getElementById("formulario-editar").addEventListener('submit', function(evento) {
        evento.preventDefault(); // Evita el envío del formulario por defecto
        this.submit(); // Envía el formulario
    });
</script>
