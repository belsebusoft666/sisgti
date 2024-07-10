<div class="card">
    <div class="card-header">
        <h3 class="card-title">Resultado de búsqueda</h3>
    </div>
    <!-- Encabezado de la tarjeta -->

    <div class="card-body">
        <!-- Cuerpo de la tarjeta que contiene la tabla -->
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <!-- Cabecera de la tabla -->
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Responsable</th>
                    <th>U. Creador</th>
                    <th>U. Modificador</th>
                    <th style="max-width: 200px">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Cuerpo de la tabla generado dinámicamente -->
                @foreach ($listado as $item)
                    <tr>
                        <!-- Datos de cada fila -->
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->descripcion }}</td>
                        <td>{{ $item->nombres }}</td>
                        <td>{{ $item->usuariocreador }}</td>
                        <td>{{ $item->usuariomodificador }}</td>
                        <td class="text-center">
                            <!-- Botones de acción para cada fila -->
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
    <!-- Cuerpo de la tarjeta -->

</div>
<!-- Tarjeta principal -->

<!-- Script para inicializar DataTables -->
<script>
    $('#example2').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
        },
        "responsive": true,
        "columnDefs": [{
            targets: 2, // Columna Responsable
            orderable: false, // No permitir ordenar por esta columna
            searchable: false // No permitir buscar en esta columna
        }]
    });
</script>
