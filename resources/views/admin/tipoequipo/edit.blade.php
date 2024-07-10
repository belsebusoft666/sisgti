<div class="modal-header">
    <h4 class="modal-title">Editar Tipo Equipo</h4>
</div>
<form action="{{ route('tipoequipo.update', $item->id) }}" id="formulario-editar" method="POST" autocomplete="off">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="Nombre">Nombre</label>
            <div class="col-sm-8">
                <input type="text" name="Nombre" id="Nombre" class="form-control" value="{{ $item->nombre }}" maxlength="250" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="Descripcion">Descripción</label>
            <div class="col-sm-8">
                <input type="text" name="Descripcion" id="Descripcion" class="form-control" value="{{ $item->descripcion }}" maxlength="2000" />
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar</button>
            <button id="btn-submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
        </div>
    </div>
</form>
<script>
    // Agrega un event listener al formulario con el ID "formulario-editar"
    document.getElementById("formulario-editar").addEventListener('submit', function(evento) {
        // Previene el comportamiento por defecto de envío del formulario
        evento.preventDefault();
        // Envía el formulario
        this.submit();
    });
</script>
