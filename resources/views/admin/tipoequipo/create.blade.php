<div class="modal-header">
    <h4 class="modal-title">Registrar Tipo de Equipos</h4>
</div>
<form action="" id="formulario-crear" autocomplete="off">
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="Nombre">Nombre</label>
            <div class="col-sm-8">
                <input type="text" name="Nombre" id="Nombre" class="form-control" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="Descripcion">Descripción</label>
            <div class="col-sm-8">
                <input type="text" name="Descripcion" id="Descripcion" class="form-control" />
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar</button>
            <button id="btn-submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Registrar</button>
        </div>
    </div>
</form>
<script>
    // Agrega un event listener al formulario con el ID "formulario-crear"
    document.getElementById("formulario-crear").addEventListener('submit', function(evento) {
        // Previene el comportamiento por defecto de envío del formulario
        evento.preventDefault();
        // Llama a la función "guardar()" cuando se envía el formulario
        guardar();
    });
</script>

