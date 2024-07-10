<div class="modal-header">
    <h4 class="modal-title">Registrar Equipo</h4>
</div>
<form action="{{ route('equipo.store') }}" method="POST" id="formulario-crear" autocomplete="off">
    @csrf
    <div class="modal-body">
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="DireccionIP">Dirección IP</label>
            <div class="col-sm-8">
                <input type="text" name="DireccionIP" id="DireccionIP" class="form-control" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="Marca">Marca</label>
            <div class="col-sm-8">
                <select name="Marca" id="Marca" class="form-control">
                    <option value="">[--SELECCIONE--]</option>
                    @foreach ($marca_modelo as $marca)
                        <option value="{{ $marca->id }}">{{ $marca->nombremarca }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="Serie">Serie</label>
            <div class="col-sm-8">
                <input type="text" name="Serie" id="Serie" class="form-control" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="FKLaboratorio">Laboratorio</label>
            <div class="col-sm-8">
                <select name="FKLaboratorio" id="FKLaboratorio" class="form-control">
                    <option value="">[--SELECCIONE--]</option>
                    @foreach ($laboratorio_modelo as $laboratorio)
                        <option value="{{ $laboratorio->id }}">{{ $laboratorio->nombre }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-4 col-form-label" for="FKComponente">Componente</label>
            <div class="col-sm-8">
                <select name="FKComponente" id="FKComponente" class="form-control">
                    <option value="">[--SELECCIONE--]</option>
                    @foreach ($componente_modelo as $componente)
                        <option value="{{ $componente->id }}">{{ $componente->descripcion }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar</button>
        <button id="btn-submit" type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Registrar</button>
    </div>
</form>

<script>
    // Event listener para el formulario de creación
    document.getElementById("formulario-crear").addEventListener('submit', function(evento) {
        evento.preventDefault(); // Previene el comportamiento por defecto del formulario
        guardar(); // Llama a la función guardar() para procesar el envío del formulario
    });
</script>
