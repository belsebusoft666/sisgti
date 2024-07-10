<div class="modal-header">
    <h4 class="modal-title">Editar Usuario</h4>
</div>

<!-- Formulario para editar un usuario -->
<form action="" id="formulario-editar" autocomplete="on">
    @method('PUT')
    <div class="modal-body">
        <!-- Campo para la descripción del usuario -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="Descripcion">Descripción</label>
            <div class="col-sm-8">
                <input type="text" name="Descripcion" id="Descripcion" class="form-control" value="{{ old('Descripcion', $item->Descripcion) }}" />
            </div>
        </div>
        <!-- Campo para seleccionar la marca del usuario -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="Marca">Marca</label>
            <div class="col-sm-8">
                <select name="Marca" id="Marca" class="form-control">
                    <option value="">[--SELECCIONE--]</option>
                    @foreach ($marca_modelo as $marca)
                        <option value="{{ $marca->id }}" {{ $marca->id == old('Marca', $item->Marca) ? 'selected' : '' }}>{{ $marca->nombremarca }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- Campo para el modelo del usuario -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="Modelo">Modelo</label>
            <div class="col-sm-8">
                <input type="text" name="Modelo" id="Modelo" class="form-control" value="{{ old('Modelo', $item->Modelo) }}" />
            </div>
        </div>
        <!-- Campo para el número de serie del usuario -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="Serie">Serie</label>
            <div class="col-sm-8">
                <input type="text" name="Serie" id="Serie" class="form-control" value="{{ old('Serie', $item->Serie) }}" />
            </div>
        </div>
        <!-- Campo para seleccionar el tipo de componente del usuario -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="FkTipoComponente">Tipo de Componente</label>
            <div class="col-sm-8">
                <select name="FkTipoComponente" id="FkTipoComponente" class="form-control">
                    <option value="">[--SELECCIONE--]</option>
                    @foreach ($tipocomponente_modelo as $tipocomponente)
                        <option value="{{ $tipocomponente->id }}" {{ $tipocomponente->id == old('FkTipoComponente', $item->FkTipoComponente) ? 'selected' : '' }}>{{ $tipocomponente->Nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- Campo para mostrar el usuario modificador (solo lectura) -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="usuariomodificador">U. Modificador</label>
            <div class="col-sm-8">
                <input type="text" name="usuariomodificador" id="usuariomodificador" class="form-control" value="{{ $usuario_actual->name }}" readonly />
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <!-- Botón para cerrar el modal -->
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar</button>
        <!-- Botón para actualizar el usuario -->
        <button id="btn-submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Actualizar</button>
    </div>
</form>

<script>
    // Añadir un listener al formulario para prevenir el envío predeterminado y llamar a la función 'actualizar'
    document.getElementById("formulario-editar").addEventListener('submit', function(evento) {
        evento.preventDefault();
        actualizar({{ $item->id }});
    });
</script>
