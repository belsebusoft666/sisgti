<div class="modal-header">
    <h4 class="modal-title">Editar Tipocomponente</h4>
</div>
<form action="{{ route('tipocomponente.update', $item->id) }}" id="formulario-editar" method="POST" autocomplete="off">
    @csrf
    @method('PUT')
    <div class="modal-body">
        <!-- Campo de entrada para el nombre -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="Nombre">Nombre</label>
            <div class="col-sm-8">
                <input type="text" name="Nombre" id="Nombre" class="form-control" value="{{ $item->Nombre }}" />
            </div>
        </div>
        <!-- Campo de entrada para la descripción -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="Descripcion">Descripción</label>
            <div class="col-sm-8">
                <input type="text" name="Descripcion" id="Descripcion" class="form-control" value="{{ $item->Descripcion }}" />
            </div>
        </div>
        <!-- Selección del tipo de equipo -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="idtipoequipo">Tipo Equipo</label>
            <div class="col-sm-8">
                <select name="idtipoequipo" id="idtipoequipo" class="form-control">
                    <option value="">[--SELECCIONE--]</option>
                    @foreach ($tipoequipo as $equipo)
                        <option value="{{ $equipo->id }}" {{ $equipo->id == $item->idtipoequipo ? 'selected' : '' }}>{{ $equipo->Nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- Campo de entrada para el usuario modificador (solo lectura) -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="usuariomodificador">U. Modificador</label>
            <div class="col-sm-8">
                <input type="text" name="usuariomodificador" id="usuariomodificador" class="form-control" value="{{ $usuario_actual->name }}" readonly />
            </div>
        </div>
    </div>
    <!-- Pie de página del modal con botones para cerrar y actualizar -->
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar</button>
        <button id="btn-submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
    </div>
</form>
<script>
    document.getElementById("formulario-editar").addEventListener('submit', function(evento) {
        evento.preventDefault();
        this.submit();
    });
</script>
