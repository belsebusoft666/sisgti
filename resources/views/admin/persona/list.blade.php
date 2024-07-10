<div class="card">
    <!-- Encabezado de la tarjeta -->
    <div class="card-header">
        <h3 class="card-title">Resultado de búsqueda</h3>
    </div>
    <!-- Cuerpo de la tarjeta -->
    <div class="card-body">
        <!-- Tabla de resultados -->
        <table id="example2" class="table table-bordered table-hover">
            <!-- Encabezado de la tabla -->
            <thead>
                <tr>
                    <th>Nombres</th>
                    <th>A. Paterno</th>
                    <th>A. Materno</th>
                    <th>N. Documento</th>
                    <th>Tipo Documento</th>
                    <th style="max-width: 200px">Opciones</th>
                </tr>
            </thead>
            <!-- Cuerpo de la tabla -->
            <tbody>
                <!-- Recorre cada item en la variable $listado -->
                @foreach ($listado as $item)
                    <tr>
                        <td>{{ $item->nombres }}</td>
                        <td>{{ $item->apellidopaterno }}</td>
                        <td>{{ $item->apellidomaterno }}</td>
                        <td>{{ $item->numerodocumento }}</td>
                        <td>
                            <!-- Determina el tipo de documento -->
                            @if ($item->tipodocumento == 1)
                                Pasaporte
                            @elseif ($item->tipodocumento == 2)
                                Documento nacional de identidad 
                            @elseif ($item->tipodocumento == 3)
                                Carnet de Estudiante
                            @else
                                Otro Tipo de Documento
                            @endif
                        </td>
                        <!-- Opciones para editar y eliminar -->
                        <td class="text-center">
                            <button onclick="modalEditar({{ $item->id }})" class="btn btn-warning">Editar</button>
                            <button onclick="confirmarEliminar({{ $item->id }})" class="btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->

<!-- Script para inicializar DataTables -->
<script>
    $('#example2').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
        },
        responsive: true,
        columnDefs: [{
            targets: 2, // Tercer columna (Índice 2)
            orderable: false, // Desactivar ordenamiento
            searchable: false // Desactivar búsqueda
        }]
    });
</script>
