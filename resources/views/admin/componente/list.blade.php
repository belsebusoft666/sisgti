<div class="card">
    <div class="card-header">
        <h3 class="card-title">Resultado de búsqueda</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Descripcion</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Serie</th>
                    <th>Tipo Componente</th>
                    <th>U. Creador</th>
                    <th>U. Modificador</th>
                    <th style="max-width: 200px">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listado as $item)
                    <tr>
                        <td>{{ $item->Descripcion }}</td>
                        <td>{{ $item->marca ? $item->marca->nombremarca : 'N/A' }}</td>
                        <td>{{ $item->Modelo }}</td>
                        <td>{{ $item->Serie }}</td> 
                        <td>{{ $item->tipoComponente ? $item->tipoComponente->Nombre : 'N/A' }}</td>
                        <td>{{ $item->UsuarioCreador }}</td>
                        <td>{{ $item->UsuarioModificador }}</td>                   
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
    // Configuración de DataTables para la tabla #example2
    $('#example2').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json', // Configura el idioma de DataTables a español
        },
        "responsive": true, // Habilita la funcionalidad de respuesta para tablas
        "columnDefs": [{ // Configura las columnas específicas
            targets: 2, // Se aplica a la columna con índice 2 (Modelo)
            orderable: false, // No permite que la columna sea ordenable
            searchable: false // No permite que la columna sea buscable
        }]
    });
</script>
