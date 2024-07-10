@extends('layouts.admin')

@section('titulo')
    Componentes | Laravel
@endsection

@section('contenido')
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #09467F">
    <!-- Contenido del navbar -->
    <a class="navbar-brand" href="#">
        <img src="../sisgti.png" width="30" height="30" class="d-inline-block align-top">
    </a>
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="http://localhost/sisgti/public/admin" class="nav-link" style="border-radius: 8px;" onmouseover="this.style.backgroundColor='#096C80'" onmouseout="this.style.backgroundColor='#09467F'">SISGTI</a>
        </li>
    </ul> 
    &nbsp;&nbsp;&nbsp;&nbsp;
    {{-- campos --}}
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('laboratorio.index') }}" class="nav-link" style="border-radius: 8px;" onmouseover="this.style.backgroundColor='#096C80'" onmouseout="this.style.backgroundColor='#09467F'">Laboratorio</a>
        </li>
    </ul>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('sistema.index') }}" class="nav-link" style="border-radius: 8px;" onmouseover="this.style.backgroundColor='#096C80'" onmouseout="this.style.backgroundColor='#09467F'">Sistema</a>
        </li>
    </ul>

    <!-- din campos -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 8px;" onmouseover="this.style.backgroundColor='#096C80'" onmouseout="this.style.backgroundColor='#09467F'">
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
                <!-- Botón de cerrar sesión -->
                <a class="dropdown-item" onclick="document.getElementById('formulario-logout').submit()" href="#" role="button" >
                    Cerrar sesión
                </a>
                <!-- Formulario de cierre de sesión -->
                <form id="formulario-logout" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>
            </div>
        </li>
    </ul>   
</nav>

{{-- Navbar inferior --}}
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #82C0D9">
    {{-- campos --}}
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('modelo.index') }}" class="nav-link" style="border-radius: 8px;" onmouseover="this.style.backgroundColor='#5CCEED'" onmouseout="this.style.backgroundColor='#82C0D9'">Marca y Modelo</a>
        </li>
    </ul>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('unidad.index') }}" class="nav-link" style="border-radius: 8px;" onmouseover="this.style.backgroundColor='#5CCEED'" onmouseout="this.style.backgroundColor='#82C0D9'">Unidades</a>
        </li>
    </ul>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('componente.index') }}" class="nav-link" style="border-radius: 8px;" onmouseover="this.style.backgroundColor='#5CCEED'" onmouseout="this.style.backgroundColor='#82C0D9'">Componentes</a>
        </li>
    </ul>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('equipo.index') }}" class="nav-link" style="border-radius: 8px;" onmouseover="this.style.backgroundColor='#5CCEED'" onmouseout="this.style.backgroundColor='#82C0D9'">Equipos</a>
        </li>
    </ul>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('usuario.index') }}" class="nav-link" style="border-radius: 8px;" onmouseover="this.style.backgroundColor='#5CCEED'" onmouseout="this.style.backgroundColor='#82C0D9'">Usuarios</a>
        </li>
    </ul> 
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('persona.index') }}" class="nav-link" style="border-radius: 8px;" onmouseover="this.style.backgroundColor='#5CCEED'" onmouseout="this.style.backgroundColor='#82C0D9'">Personas</a>
        </li>
    </ul> 
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 8px;" onmouseover="this.style.backgroundColor='#5CCEED'" onmouseout="this.style.backgroundColor='#82C0D9'">
                Más...
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('caracteristica.index') }}">Características</a>
                <a class="dropdown-item" href="{{ route('tipoequipo.index') }}">Tipo de Equipo</a>
                <a class="dropdown-item" href="{{ route('tipocomponente.index') }}">Tipo Componente</a>                
            </div>
        </li>
    </ul>
</nav>

<!-- Content Wrapper. Contains page content -->
<div class="content">
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col-md-6 -->
                <div class="col-lg-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="m-0">Búsqueda de Componentes</h5>
                        </div>
                        <div class="card-body">
                            <!-- Formulario de búsqueda de componentes -->
                            <form class="form-inline" id="formulario-busqueda">
                                <label class="my-1 mr-2" for="busqueda">Nombre</label>
                                <input type="text" class="form-control my-1 mr-sm-2" id="busqueda" name="busqueda">
                                <button type="submit" class="btn btn-primary my-1">Buscar</button>
                                <button onclick="modalCrear()" type="button" class="btn btn-success my-1 mx-1">Nuevo</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <div class="row">
                <div class="col-12" id="listado">
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('modales')
    <!-- Modal para agregar componente -->
    <div class="modal fade" id="modal-agregar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-agregar-contenido">
            </div>
        </div>
    </div>

    <!-- Modal para editar componente -->
    <div class="modal fade" id="modal-editar" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-editar-contenido">
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        // Evento al enviar el formulario de búsqueda
        document.getElementById("formulario-busqueda").addEventListener("submit", function(evento) {
            evento.preventDefault();
            search();
        });

        // Evento al cargar completamente la página
        document.addEventListener("DOMContentLoaded", function() {
            search();
        });

        // Realiza la búsqueda de componentes mediante AJAX
        function search() {
            const busqueda = document.getElementById("busqueda").value;
            const ruta = route('componente.search');

            axios.get(ruta, {
                    params: {
                        "busqueda": busqueda
                    }
                }).then(function(response) {
                    // Actualiza el contenido de la lista de componentes
                    const tabla_html = response.data;
                    $("#listado").html(tabla_html);
                })
                .catch(function(error) {
                    // Maneja los errores en caso de problemas con la petición AJAX
                });
        }

        // Abre el modal para crear un nuevo componente
        function modalCrear() {
            const ruta = route("componente.create");

            axios.get(ruta)
                .then(function(respuesta) {
                    // Carga el contenido del modal de creación
                    $('#modal-agregar-contenido').html(respuesta.data);
                    $('#modal-agregar').modal('show');
                }).catch(function() {
                    // Maneja los errores en caso de problemas con la petición AJAX
                });
        }

        // Guarda un nuevo componente mediante AJAX
        function guardar() {
            const ruta = route('componente.store');
            const form = document.getElementById('formulario-crear');
            const data = new FormData(form);

            axios.post(ruta, data)
                .then(function(respuesta) {
                    // Muestra mensaje de éxito y actualiza la lista de componentes
                    const mensaje = respuesta.data.message;
                    toastr.success(mensaje);
                    $('#modal-agregar').modal('hide');
                    search();
                })
                .catch(function(error) {
                    // Maneja los errores en caso de problemas con la petición AJAX
                    if (error.response) {
                        toastr.error(error.response.data.message, "Error del sistema");
                        if (error.response.status === 422) {
                            // Muestra los errores de validación en el formulario
                            mostrarErrores('formulario-crear', error.response.data.errors);
                        }
                    } else {
                        toastr.error(error);
                    }
                });
        }

        // Abre el modal para editar un componente
        function modalEditar(id) {
            const ruta = route('componente.edit', [id]);

            axios.get(ruta)
                .then(function(respuesta) {
                    // Carga el contenido del modal de edición
                    $("#modal-editar-contenido").html(respuesta.data);
                    $("#modal-editar").modal('show');
                })
                .catch(function(error) {
                    // Maneja los errores en caso de problemas con la petición AJAX
                    if (error.response) {
                        toastr.error(error.response.data.message, "Error del sistema");
                    } else {
                        toastr.error(error);
                    }
                });
        }

        // Actualiza un componente mediante AJAX
        function actualizar(id) {
            const ruta = route('componente.update', [id]);
            const form = document.getElementById("formulario-editar");
            const data = new FormData(form);

            axios.post(ruta, data)
                .then(function(respuesta) {
                    // Muestra mensaje de éxito y actualiza la lista de componentes
                    toastr.success(respuesta.data.message);
                    $('#modal-editar').modal('hide');
                    search();
                })
                .catch(function(error) {
                    // Maneja los errores en caso de problemas con la petición AJAX
                    if (error.response) {
                        toastr.error(error.response.data.message, 'Error en el sistema');
                        if (error.response.status === 422) {
                            // Muestra los errores de validación en el formulario
                            mostrarErrores('formulario-editar', error.response.data.errors);
                        }
                    } else {
                        toastr.error(error);
                    }
                });
        }

        // Confirma la eliminación de un componente
        function confirmarEliminar(id) {
            Swal.fire({
                title: '¿Está seguro?',
                text: "Este cambio no se puede deshacer!",
                icon: 'error',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '<i class="far fa-trash-alt"></i> Si, eliminar!',
                cancelButtonText: '<i class="far fa-window-close"></i> Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Realiza la eliminación del componente mediante AJAX
                    const ruta = route('componente.destroy', [id]);
                    const data = new FormData();
                    data.append('_method', 'DELETE');

                    axios.post(ruta, data)
                        .then(function(respuesta) {
                            // Muestra mensaje de éxito y actualiza la lista de componentes
                            toastr.success(respuesta.data.message);
                            search();
                        })
                        .catch(function(error) {
                            // Maneja los errores en caso de problemas con la petición AJAX
                            if (error.response) {
                                toastr.error(error.response.data.message, "Error del sistema");
                            } else {
                                toastr.error(error);
                            }
                        });
                }
            });
        }
    </script>
@endsection
