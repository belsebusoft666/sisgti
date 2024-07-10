@extends('layouts.admin')

@section('titulo')
    Tipo de Equipos | Laravel
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
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"></h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- /.col-md-6 -->
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h5 class="m-0"></h5>
                            </div>
                            <div class="card-body">
                                <form class="form-inline" id="formulario-busqueda">
                                    <label class="my-1 mr-2" for="busqueda">Nombre</label>
                                    <input type="text" class="form-control my-1 mr-sm-2" id="busqueda" name="busqueda">
                                    <button type="submit" class="btn btn-primary my-1">Buscar</button>
                                    <button onclick="modalCrear()" type="button"
                                        class="btn btn-success my-1 mx-1">Nuevo</button>
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
    <div class="modal fade" id="modal-agregar" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-agregar-contenido">
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-editar" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-editar-contenido">
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        document.getElementById("formulario-busqueda").addEventListener("submit", function(evento) {
            evento.preventDefault();
            search();
        });

        // evento de carga completa de la pagina
        document.addEventListener("DOMContentLoaded", function() {
            search();
        });

        // realizar la peticion ajax y recibir el resultado
        function search() {
            const busqueda = document.getElementById("busqueda").value;
            const ruta = route('tipoequipo.search');

            axios.get(ruta, {
                    params: {
                        "busqueda": busqueda
                    }
                }).then(function(response) {
                    // cuando la peticion indicado que todo esta OK: 100, 200, 300
                    const tabla_html = response.data;
                    $("#listado").html(tabla_html);
                })
                .catch(function(error) {
                    // cuando ha ocurrido un error: 400 o 500
                })

        }

        function modalCrear() {
            const ruta = route("tipoequipo.create");

            axios.get(ruta)
                .then(function(respuesta) {
                    $('#modal-agregar-contenido').html(respuesta.data);
                    $('#modal-agregar').modal('show');
                }).catch(function() {

                })

        }

        function guardar() {
            const ruta = route('tipoequipo.store');
            const form = document.getElementById('formulario-crear');
            const data = new FormData(form);

            axios.post(ruta, data)
                .then(function(respuesta) {
                    // 100,200,300
                    const mensaje = respuesta.data.message;
                    toastr.success(mensaje);
                    $('#modal-agregar').modal('hide');
                    search();
                })
                .catch(function(error) {
                    
                    if (error.response) {
                        toastr.error(error.response.data.message, "Error del sistema");
                        if (error.response.status === 422) {
                            
                            mostrarErrores('formulario-crear', error.response.data.errors);
                        }
                    } else {
                        toastr.error(error);
                    }
                    
                });
        }

        function modalEditar(id) {
            
            const ruta = route('tipoequipo.edit', [id]);

            axios.get(ruta)
                .then(function(respuesta) {
                    $("#modal-editar-contenido").html(respuesta.data);
                    $("#modal-editar").modal('show');
                })
                .catch(function(error) {
                    if (error.response) {
                        toastr.error(error.response.data.message, "Error del sistema");
                    } else {
                        toastr.error(error);
                    }
                });


        }

        function actualizar(id) {
            const ruta = route('tipoequipo.update', [id]);
            const form = document.getElementById("formulario-editar");
            const data = new FormData(form);

            axios.post(ruta, data)
                .then(function(respuesta) {
                    toastr.success(respuesta.data.message);
                    $('#modal-editar').modal('hide');
                    search();
                })
                .catch(function(error) {
                    if (error.response) {
                        toastr.error(error.response.data.message, 'Error en el sistema');
                        if (error.response.status === 422) {
                            mostrarErrores('formulario-editar', error.response.data.errors);
                        }
                    } else {
                        toastr.error(error);
                    }

                });

        }

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
                    const ruta = route('tipoequipo.destroy', [id]);
                    const data = new FormData();
                    data.append('_method', 'DELETE');

                    axios.post(ruta, data)
                        .then(function(respuesta) {
                            toastr.success(respuesta.data.message);
                            search();
                        })
                        .catch(function(error) {
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
