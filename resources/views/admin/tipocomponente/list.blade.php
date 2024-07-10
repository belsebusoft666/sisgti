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
                    <th>Tipo de equipo</th>
                    <th>Usuario creador</th>
                    <th>Usuario modificador</th>
                    <th style="max-width: 200px">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listado as $item)
                    <tr>
                        <td>{{ $item->Nombre }}</td>
                        <td>{{ $item->Descripcion }}</td>
                        <td>{{ $item->idtipoequipo }}</td>
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

<!-- Script para inicializar DataTables -->
<script>
    $(document).ready(function() {
        $('#example2').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
            },
            responsive: true,
            columnDefs: [{
                targets: 5,
                orderable: false,
                searchable: false
            }]
        });
    });
</script>
