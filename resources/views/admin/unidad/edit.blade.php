<div class="modal-header">
    <h4 class="modal-title">Editar Unidad</h4>
</div>
<form action="{{ route('unidad.update', $item->id) }}" id="formulario-editar" method="POST" autocomplete="off">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <!-- Campo para editar el código de la unidad -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="codigo">Código</label>
            <div class="col-sm-8">
                <input type="text" name="codigo" id="codigo" class="form-control" value="{{ $item->codigo }}" maxlength="50" />
            </div>
        </div>

        <!-- Campo para editar el símbolo de la unidad -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="simbolo">Símbolo</label>
            <div class="col-sm-8">
                <input type="text" name="simbolo" id="simbolo" class="form-control" value="{{ $item->simbolo }}" maxlength="5" />
            </div>
        </div>

        <!-- Campo para editar el nombre de la unidad -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="nombre">Nombre</label>
            <div class="col-sm-8">
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $item->nombre }}" maxlength="250" />
            </div>
        </div>

        <!-- Campo para editar la descripción de la unidad -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="descripcion">Descripción</label>
            <div class="col-sm-8">
                <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ $item->descripcion }}" maxlength="2000" />
            </div>
        </div>

        <!-- Footer del modal con botones de acción -->
        <div class="modal-footer justify-content-between">
            <!-- Botón para cerrar el modal -->
            <button type="button" class="btn btn-default" data-dismiss="modal">
                <i class="fas fa-window-close"></i> Cerrar
            </button>
            
            <!-- Botón para enviar el formulario de actualización -->
            <button id="btn-submit" type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Actualizar
            </button>
        </div>
    </div>
</form>

<script>
    // Agrega un evento para manejar el envío del formulario
    document.getElementById("formulario-editar").addEventListener('submit', function(evento) {
        evento.preventDefault(); // Previene el comportamiento predeterminado del formulario
        this.submit(); // Envía el formulario de manera programática
    });
</script>
