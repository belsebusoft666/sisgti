<div class="card">
    <div class="card-header">
        <h3 class="card-title">Resultado de búsqueda</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th style="max-width: 200px">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listado as $item)
                    <tr>
                        <td>{{ $item->Nombre }}</td>
                        <td>{{ $item->Descripcion }}</td>
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
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json', // Cargar archivo de idioma español para DataTables
            },
            "responsive": true, // Hacer la tabla responsive
            "columnDefs": [{ // Definir columnas específicas
                targets: 2, // Objetivo de la tercera columna (opciones)
                orderable: false, // No permitir ordenar por esta columna
                searchable: false // No permitir búsqueda por esta columna
            }]
        });
    });
</script>
