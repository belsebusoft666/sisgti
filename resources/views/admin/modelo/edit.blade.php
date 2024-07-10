<!-- Modal header con el título "Editar Usuario" -->
<div class="modal-header">
    <h4 class="modal-title">Editar Usuario</h4>
</div>

<!-- Formulario para editar información del usuario -->
<form action="" id="formulario-editar" autocomplete="on">
    @method('PUT') <!-- Método HTTP PUT para la actualización -->
    <div class="modal-body">
        <!-- Campo para seleccionar la marca -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="marca_id">Marca</label>
            <div class="col-sm-8">
                <!-- Select con opciones de marca -->
                <select name="marca_id" id="marca_id" class="form-control">
                    <option value="marca_id">[--SELECCIONE--]</option>
                    <!-- Opciones cargadas dinámicamente desde $marca_modelo -->
                    @foreach ($marca_modelo as $marca)
                        <option value="{{ $marca->id }}">{{ $marca->nombremarca }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- Campo para editar el nombre del modelo -->
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="nombremodelo">Modelo</label>
            <div class="col-sm-8">
                <!-- Input para ingresar el nombre del modelo -->
                <input type="text" name="nombremodelo" id="nombremodelo" class="form-control" value="{{ $item->nombremodelo }}" />
            </div>
        </div>
    </div>
    <!-- Footer del modal con botones de acción -->
    <div class="modal-footer justify-content-between">
        <!-- Botón para cerrar el modal sin guardar cambios -->
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar
        </button>
        <!-- Botón para enviar el formulario y actualizar los datos -->
        <button id="btn-submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
            Actualizar</button>
    </div>
</form>
