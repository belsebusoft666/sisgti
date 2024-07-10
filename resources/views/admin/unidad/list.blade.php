<div class="card">
    <div class="card-header">
        <h3 class="card-title">Resultado de búsqueda</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Simbolo</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th style="max-width: 200px">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listado as $item)
                    <tr>
                        <td>{{ $item->codigo }}</td>
                        <td>{{ $item->simbolo }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->descripcion }}</td>                     
                        <td class="text-center">
                            <button onclick="modalEditar({{ $item->id }})" class="btn btn-warning">Editar</button>
                            <button onclick="confirmarEliminar({{ $item->id }})" class="btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<script>
    $(document).ready(function() {
        $('#example2').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json', // Carga del archivo de idioma para DataTables en español
            },
            responsive: true, // Permite que la tabla sea responsive
            columnDefs: [{
                targets: 4, // Define la columna de opciones (Editar y Eliminar) como no ordenable ni buscable
                orderable: false,
                searchable: false
            }]
        });
    });
</script>
