<div class="card">
    <!-- Encabezado de la tarjeta -->
    <div class="card-header">
        <h3 class="card-title">Resultado de búsqueda</h3>
    </div>
    <!-- Cuerpo de la tarjeta -->
    <div class="card-body">
        <!-- Tabla de datos -->
        <table id="example2" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <!-- Encabezados de columna -->
                    <th>DireccionIP</th>
                    <th>Marca</th>
                    <th>Serie</th>
                    <th>Laboratorio</th>
                    <th>Componente</th>
                    <th style="max-width: 200px">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listado as $item)
                <!-- Filas de datos iteradas desde la variable $listado -->
                <tr>
                    <td>{{ $item->DireccionIP }}</td>
                    <td>{{ $item->Marca }}</td>
                    <td>{{ $item->Serie }}</td>
                    <td>{{ $item->FKLaboratorio }}</td>
                    <td>{{ $item->FKComponente }}</td>
                    <td class="text-center">
                        <!-- Botones de opciones para editar y eliminar -->
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
    <!-- Fin del cuerpo de la tarjeta -->
</div>
<!-- Fin de la tarjeta -->

<!-- Script para inicializar DataTables con configuraciones -->
<script>
    $('#example2').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json', // URL para traducción al español
        },
        "responsive": true, // Activar responsividad de la tabla
        "columnDefs": [{ // Definición de columnas especiales
            targets: 2, // Aplicar a la columna índice 2 (Serie)
            orderable: false, // No permitir ordenar por esta columna
            searchable: false // No permitir búsqueda en esta columna
        }]
    });
</script>
