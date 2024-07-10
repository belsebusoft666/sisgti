<div class="modal-header">
    <h4 class="modal-title">Editar Usuario</h4>
</div>
<form action="" id="formulario-editar" autocomplete="on">
    @method('PUT') <!-- Utiliza el método PUT para la actualización -->
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="Serie">Serie</label>
            <div class="col-sm-8">
                <input type="text" name="Serie" id="Serie" class="form-control" value="{{ $item->Serie }}" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="marca_id">Marca</label>
            <div class="col-sm-8">
                <select name="marca_id" id="marca_id" class="form-control">
                    <option value="marca_id">[--SELECCIONE--]</option>
                    @foreach ($marca_modelo as $marca)
                        <option value="{{ $marca->id }}">{{ $marca->nombremarca }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- Repetición de campos de marca_id -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="marca_id">Marca</label>
            <div class="col-sm-8">
                <select name="marca_id" id="marca_id" class="form-control">
                    <option value="marca_id">[--SELECCIONE--]</option>
                    @foreach ($marca_modelo as $marca)
                        <option value="{{ $marca->id }}">{{ $marca->nombremarca }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar
        </button>
        <button id="btn-submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
            Actualizar</button>
    </div>
</form>

<script>
    // Event listener para el formulario de edición
    document.getElementById("formulario-editar").addEventListener('submit', function(evento) {
        evento.preventDefault(); // Previene el comportamiento por defecto del formulario
        actualizar({{ $item->id }}); // Llama a la función actualizar() pasando el ID del item
    });
</script>
