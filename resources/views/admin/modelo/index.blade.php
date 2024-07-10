@extends('layouts.admin')

@section('titulo')
    modelos | Laravel
@endsection

@section('contenido')
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #09467F">
    <!-- Navbar superior -->
    <a class="navbar-brand" href="#">
        <img src="../sisgti.png" width="30" height="30" class="d-inline-block align-top">
    </a>
    <ul class="navbar-nav">
        <!-- Opciones de navegación -->
        <li class="nav-item d-none d-sm-inline-block">
            <a href="http://localhost/sisgti/public/admin" class="nav-link" style="border-radius: 8px;" onmouseover="this.style.backgroundColor='#096C80'" onmouseout="this.style.backgroundColor='#09467F'">SISGTI</a>
        </li>
    </ul> 
    &nbsp;&nbsp;&nbsp;&nbsp;
    {{-- Campos de navegación --}}
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

    <!-- Dinámica de campos -->
    <ul class="navbar-nav ml-auto">
        <!-- Dropdown de usuario -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 8px;" onmouseover="this.style.backgroundColor='#096C80'" onmouseout="this.style.backgroundColor='#09467F'">
                {{ Auth::user()->name }}
            </a>
            <!-- Menú desplegable de usuario -->
            <div class="dropdown-menu" aria-labelledby="navbarDropdown" >
                <!-- Opción para cerrar sesión -->
                <a class="dropdown-item" onclick="document.getElementById('formulario-logout').submit()" href="#" role="button" >
                    Cerrar sesión
                </a>
                <!-- Formulario para cerrar sesión -->
                <form id="formulario-logout" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>
            </div>
        </li>
    </ul>   
</nav>

{{-- Navbar inferior --}}
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #82C0D9">
    {{-- Campos de navegación inferior --}}
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
        <!-- Dropdown "Más..." -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 8px;" onmouseover="this.style.backgroundColor='#5CCEED'" onmouseout="this.style.backgroundColor='#82C0D9'">
                Más...
            </a>
            <!-- Opciones del dropdown "Más..." -->
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('caracteristica.index') }}">Características</a>
                <a class="dropdown-item" href="{{ route('tipoequipo.index') }}">Tipo de Equipo</a>
                <a class="dropdown-item" href="{{ route('tipocomponente.index') }}">Tipo Componente</a>                
            </div>
        </li>
    </ul>
</nav>

<!-- Contenido principal -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Formulario de búsqueda -->
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">Búsqueda de modelos</h5>
                    </div>
                    <div class="card-body">
                        <form class="form-inline" id="formulario-busqueda">
                            <!-- Campo de búsqueda -->
                            <label class="my-1 mr-2" for="busqueda">Nombre</label>
                            <input type="text" class="form-control my-1 mr-sm-2" id="busqueda" name="busqueda">
                            <!-- Botones de búsqueda y creación -->
                            <button type="submit" class="btn btn-primary my-1">Buscar</button>
                            <button onclick="modalCrear()" type="button" class="btn btn-success my-1 mx-1">Nuevo</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Listado de resultados -->
        <div class="row">
            <div class="col-12" id="listado">
                <!-- Aquí se carga dinámicamente el listado de modelos -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
</div><!-- /.content -->

<!-- Modales -->
@section('modales')
    <!-- Modal para agregar modelo -->
    <div class="modal fade" id="modal-agregar" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-agregar-contenido">
                <!-- Contenido del modal se carga dinámicamente -->
            </div>
        </div>
    </div>

    <!-- Modal para agregar marca -->
    <div class="modal fade" id="modal-agregarmarca" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-agregar-contenido">
                <!-- Contenido del modal se carga dinámicamente -->
            </div>
        </div>
    </div>

    <!-- Modal para editar modelo -->
    <div class="modal fade" id="modal-editar" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-editar-contenido">
                <!-- Contenido del modal se carga dinámicamente -->
            </div>
        </div>
    </div>
@endsection

<!-- Scripts -->
@section('javascript')
    <script>
        // Evento al enviar formulario de búsqueda
        document.getElementById("formulario-busqueda").addEventListener("submit", function(evento) {
            evento.preventDefault();
            search();
        });

        // Cargar resultados al cargar la página
        document.addEventListener("DOMContentLoaded", function() {
            search();
        });

        // Función para realizar búsqueda de modelos
        function search() {
            const busqueda = document.getElementById("busqueda").value;
            const ruta = route('modelo.search');

            axios.get(ruta, {
                    params: {
                        "busqueda": busqueda
                    }
                }).then(function(response) {
                    // Actualizar el listado de modelos
                    const tabla_html = response.data;
                    $("#listado").html(tabla_html);
                })
                .catch(function(error) {
                    // Manejar errores de petición
                    console.error('Error en la búsqueda', error);
                })
        }

        // Abrir modal para crear nuevo modelo
        function modalCrear() {
            const ruta = route("modelo.create");

            axios.get(ruta)
                .then(function(respuesta) {
                    $('#modal-agregar-contenido').html(respuesta.data);
                    $('#modal-agregar').modal('show');
                })
                .catch(function(error) {
                    console.error('Error al cargar el modal de creación', error);
                })
        }

        // Guardar nuevo modelo
        function guardar() {
            const ruta = route('modelo.store');
            const form = document.getElementById('formulario-crear');
            const data = new FormData(form);

            axios.post(ruta, data)
                .then(function(respuesta) {
                    // Notificar éxito y actualizar listado
                    toastr.success(respuesta.data.message);
                    $('#modal-agregar').modal('hide');
                    search();
                })
                .catch(function(error) {
                    // Manejar errores de validación y otros errores
                    console.error('Error al guardar el modelo', error);
                    if (error.response) {
                        toastr.error(error.response.data.message, "Error del sistema");
                        if (error.response.status === 422) {
                            mostrarErrores('formulario-crear', error.response.data.errors);
                        }
                    } else {
                        toastr.error('Error al procesar la solicitud');
                    }
                });
        }

        // Abrir modal para editar modelo
        function modalEditar(id) {
            const ruta = route('modelo.edit', [id]);

            axios.get(ruta)
                .then(function(respuesta) {
                    $("#modal-editar-contenido").html(respuesta.data);
                    $("#modal-editar").modal('show');
                })
                .catch(function(error) {
                    console.error('Error al cargar el modal de edición', error);
                    if (error.response) {
                        toastr.error(error.response.data.message, "Error del sistema");
                    } else {
                        toastr.error('Error al procesar la solicitud');
                    }
                });
        }

        // Actualizar modelo
        function actualizar(id) {
            const ruta = route('modelo.update', [id]);
            const form = document.getElementById("formulario-editar");
            const data = new FormData(form);

            axios.post(ruta, data)
                .then(function(respuesta) {
                    // Notificar éxito y actualizar listado
                    toastr.success(respuesta.data.message);
                    $('#modal-editar').modal('hide');
                    search();
                })
                .catch(function(error) {
                    // Manejar errores de validación y otros errores
                    console.error('Error al actualizar el modelo', error);
                    if (error.response) {
                        toastr.error(error.response.data.message, 'Error en el sistema');
                        if (error.response.status === 422) {
                            mostrarErrores('formulario-editar', error.response.data.errors);
                        }
                    } else {
                        toastr.error('Error al procesar la solicitud');
                    }
                });
        }

        // Confirmar eliminación de modelo
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
                    // Proceder con la eliminación
                    const ruta = route('modelo.destroy', [id]);
                    const data = new FormData();
                    data.append('_method', 'DELETE');

                    axios.post(ruta, data)
                        .then(function(respuesta) {
                            toastr.success(respuesta.data.message);
                            search();
                        })
                        .catch(function(error) {
                            console.error('Error al eliminar el modelo', error);
                            if (error.response) {
                                toastr.error(error.response.data.message, "Error del sistema");
                            } else {
                                toastr.error('Error al procesar la solicitud');
                            }
                        });
                }
            });
        }
    </script>
@endsection
