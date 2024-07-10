<div class="card">
    <!-- Cabecera de la tarjeta -->
    <div class="card-header">
        <h3 class="card-title">Resultado de búsqueda</h3>
    </div>
    <!-- /.card-header -->

    <!-- Cuerpo de la tarjeta -->
    <div class="card-body">
        <!-- Tabla para mostrar los resultados de la búsqueda -->
        <table id="example2" class="table table-bordered table-hover">
            <!-- Encabezado de la tabla -->
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Simbolo</th>
                    <th>Nombre</th>
                    <th>descripcion</th>
                    <th style="max-width: 200px">Opciones</th>
                </tr>
            </thead>
            <!-- Cuerpo de la tabla -->
            <tbody>
                <!-- Iteración sobre el listado de unidades -->
                @foreach ($listado as $item)
                    <tr>
                        <td>{{ $item->codigo }}</td>
                        <td>{{ $item->simbolo }}</td>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->descripcion }}</td>
                        <!-- Opciones para editar y eliminar una unidad -->
                        <td class="text-center">
                            <button onclick="modalEditar({{ $item->id }})" class="btn btn-warning">Editar</button>
                            <button onclick="confirmarEliminar({{ $item->id }})"
                                class="btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <!-- Pie de tabla (actualmente vacío) -->
            <tfoot>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<!-- Script para inicializar DataTables en la tabla -->
<script>
    $('#example2').DataTable({
        // Configuración del lenguaje a español
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
        },
        "responsive": true,
        // Definición de columnas
        "columnDefs": [{
            // Configuración para la tercera columna (índice 2)
            targets: 2,
            orderable: false, // La columna no es ordenable
            searchable: false // La columna no es buscable
        }]
    });
</script>
