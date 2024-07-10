<div class="modal-header">
    <h4 class="modal-title">Registrar Modelo</h4>
</div>
<form action="" id="formulario-crear" autocomplete="off">
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="marca_id">Marca</label>
            <div class="col-sm-8">
                <select name="marca_id" id="marca_id" class="form-control">
                    <option value="">[--SELECCIONE--]</option>
                    @foreach ($marca_modelo as $marca)
                        <option value="{{ $marca->id }}">{{ $marca->nombremarca }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="nombremodelo">Modelo</label>
            <div class="col-sm-8">
                <input type="text" name="nombremodelo" id="nombremodelo" class="form-control" />
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar</button>
        <button id="btn-open-marca-modal" type="button" class="btn btn-primary"><i class="fas fa-plus"></i> Crear Marca</button>
        <button id="btn-submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Registrar</button>
    </div>
</form>

<!-- Modal de selección de marca -->
<div class="modal" id="modal-marca" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear Marca</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Contenido del modal de selección de marca -->
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label" for="nombre">Nombre</label>
                    <div class="col-sm-8">
                        <input type="text" name="nombre" id="nombre" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button id="btn-registrar-marca" type="button" class="btn btn-primary">Registrar</button>
                <!-- Puedes agregar botones adicionales si lo necesitas -->
            </div>
        </div>
    </div>
</div>

<script>

    
    document.getElementById("formulario-crear").addEventListener('submit', function(evento) {
        evento.preventDefault();
        guardar();
    });

    // Abre el modal de selección de marca al hacer clic en el botón correspondiente
    document.getElementById("btn-open-marca-modal").addEventListener('click', function() {
        $('#modal-marca').modal('show');
    });

    // Cierra el modal de selección de marca al hacer clic en el botón de cerrar o fuera del modal
    $('#modal-marca').on('hidden.bs.modal', function (e) {
        // Puedes agregar acciones adicionales al cerrar el modal aquí si es necesario
    });

    $(document).ready(function() {
    $('#btn-registrar-marca').on('click', function() {
        // Envía el formulario del modal de marca
        $('#formulario-marca').submit();
    });
    });

    
</script>
