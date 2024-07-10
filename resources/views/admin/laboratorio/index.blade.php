@extends('layouts.admin')

@section('titulo')
    Laboratorio | Laravel
@endsection


@section('contenido')

{{-- Navbar superior --}}
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #09467F">
    <!-- Contenido del navbar -->
    <a class="navbar-brand" href="#">
        <img src="../img/sisgti.png" width="30" height="30" class="d-inline-block align-top">
    </a>
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="http://localhost/sisgti/public/admin" class="nav-link" style="border-radius: 8px;" onmouseover="this.style.backgroundColor='#096C80'" onmouseout="this.style.backgroundColor='#09467F'">SISGTI</a>
        </li>
    </ul>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    {{-- Campos --}}
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('laboratorio.index') }}" class="nav-link" style="border-radius: 8px;" onmouseover="this.style.backgroundColor='#096C80'" onmouseout="this.style.backgroundColor='#09467F'">Laboratorio</a>
        </li>
    </ul>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('sistema.index') }}" class="nav-link" style="border-radius: 8px;" onmouseover="this.style.backgroundColor='#096C80'" onmouseout="this.style.backgroundColor='#09467F'">Sistema</a>
        </li>
    </ul>



    <!-- Din campos -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-radius: 8px;" onmouseover="this.style.backgroundColor='#096C80'" onmouseout="this.style.backgroundColor='#09467F'">
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <!-- Opción de Cerrar Sesión -->
                <a class="dropdown-item" onclick="document.getElementById('formulario-logout').submit()" href="#" role="button">
                    Cerrar Sesión
                </a>
                <!-- Formulario de cierre de sesión -->
                <form id="formulario-logout" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>
                <!-- Opción de Cambiar Contraseña -->
                <a id="changePasswordLink" class="dropdown-item" href="#" role="button" onclick="showChangePasswordModal()">
                    Cambiar Contraseña
                </a>
            </div>
        </li>
    </ul>

</nav>

<!-- Modal Cambiar Contraseña -->
<div class="modal fade" id="modal-cambiar-contrasena" tabindex="-1" role="dialog" aria-labelledby="modalCambiarContrasenaTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCambiarContrasenaTitle">
                    Cambiar Contraseña
                </h5>
            </div>
            <div class="modal-body">
                <!-- Aquí van los campos del formulario -->
                <form id="form-cambiar-contrasena">
                    <div class="form-group">
                        <label for="contrasena-actual">
                            Contraseña Actual
                        </label>
                        <div class="input-group">
                            <input type="password" class="form-control toggle-password" id="contrasena-actual" name="contrasena_actual" required>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-eye-slash toggle-icon"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nueva-contrasena">
                            Nueva Contraseña
                        </label>
                        <div class="input-group">
                            <input type="password" class="form-control toggle-password" id="nueva-contrasena" name="nueva_contrasena" required>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-eye-slash toggle-icon"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirmar-contrasena">
                            Confirmar Contraseña
                        </label>
                        <div class="input-group">
                            <input type="password" class="form-control toggle-password" id="confirmar-contrasena" name="confirmar_contrasena" required>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-eye-slash toggle-icon"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Botón para enviar el formulario -->
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times"></i>
                        Cerrar
                    </button>
                    <button id="btn-nueva-contrasena" type="button" class="btn btn-primary float-right">
                        <i class="fas fa-folder"></i>
                        Cambiar Contraseña
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Script para manejar la visibilidad de las contraseñas -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        $('.toggle-icon').click(function(){
            var $input = $(this).closest('.input-group').find('.toggle-password');
            var tipo = $input.attr('type');
            if(tipo == 'password'){
                $input.attr('type', 'text');
                $(this).removeClass('fa-eye-slash').addClass('fa-eye');
            } else {
                $input.attr('type', 'password');
                $(this).removeClass('fa-eye').addClass('fa-eye-slash');
            }
        });
    });
</script>

<script>
    // Función para mostrar el modal de cambiar contraseña
    function showChangePasswordModal() {
        $('#modal-cambiar-contrasena').modal('show');
    }

    // Manejar el evento de click en el botón para cambiar contraseña
    $('#btn-nueva-contrasena').click(function() {
        // Recuperar valores de las contraseñas del formulario del modal
        var contrasenaActual = $('#contrasena-actual').val();
        var nuevaContrasena = $('#nueva-contrasena').val();
        var confirmarContrasena = $('#confirmar-contrasena').val();

        // Verificar que las nuevas contraseñas coincidan
        if (nuevaContrasena !== confirmarContrasena) {
            alert('Las nuevas contraseñas no coinciden');
            return;
        }

        // Enviar una solicitud AJAX al servidor para actualizar la contraseña
        $.ajax({
            url: '/actualizar-contrasena',
            method: 'POST',
            data: {
                contrasena_actual: contrasenaActual,
                nueva_contrasena: nuevaContrasena,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                alert('Contraseña actualizada correctamente');
                $('#modal-cambiar-contrasena').modal('hide');
            },
            error: function(xhr, status, error) {
                alert('Error al actualizar la contraseña: ' + xhr.responseText);
            }
        });
    });
</script>

{{-- Navbar inferior --}}
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #82C0D9">
    {{-- Campos --}}
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link" style="border-radius: 8px;" onmouseover="this.style.backgroundColor='#5CCEED'" onmouseout="this.style.backgroundColor='#82C0D9'">Inventario</a>
        </li>
    </ul>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link" style="border-radius: 8px;" onmouseover="this.style.backgroundColor='#5CCEED'" onmouseout="this.style.backgroundColor='#82C0D9'">Reportes</a>
        </li>
    </ul>
</nav>

<!-- Contenido principal -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Columna -->
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">Búsqueda de laboratorio</h5>
                    </div>
                    <div class="card-body">
                        <form class="form-inline" id="formulario-busqueda">
                            <label class="my-1 mr-2" for="busqueda">Nombre</label>
                            <input type="text" class="form-control my-1 mr-sm-2" id="busqueda" name="busqueda">
                            <button type="submit" class="btn btn-primary my-1">Buscar</button>
                            <button onclick="modalCrear()" type="button" class="btn btn-success my-1 mx-1">Nuevo</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
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
@endsection

@section('modales')
    {{-- Modal para Nuevo --}}
    <div class="modal fade" id="modal-agregar" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal-agregar-contenido">
            </div>
        </div>
    </div>
    {{-- Modal para editar --}}
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

        // Evento de carga completa de la página
        document.addEventListener("DOMContentLoaded", function() {
            search();
        });

        // Realizar la petición AJAX y recibir el resultado
        function search() {
            const busqueda = document.getElementById("busqueda").value;
            const ruta = route('laboratorio.search');

            axios.get(ruta, {
                    params: {
                        "busqueda": busqueda
                    }
                }).then(function(response) {
                    // Cuando la petición indica que todo está OK: 100, 200, 300
                    const tabla_html = response.data;
                    $("#listado").html(tabla_html);
                })
                .catch(function(error) {
                    // Cuando ha ocurrido un error: 400 o 500
                })

        }

        function modalCrear() {
            const ruta = route("laboratorio.create");

            axios.get(ruta)
                .then(function(respuesta) {
                    $('#modal-agregar-contenido').html(respuesta.data);
                    $('#modal-agregar').modal('show');
                }).catch(function() {

                })

        }

        function guardar() {
            const ruta = route('laboratorio.store');
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
                    // 2 tipos
                    // TIPO 1: 400,500
                    if (error.response) {
                        toastr.error(error.response.data.message, "Error del sistema");
                        if (error.response.status === 422) {
                            // Entidad improcesable: cuando hay error en la validación de los datos
                            // Función que genere los mensajes de error
                            mostrarErrores('formulario-crear', error.response.data.errors);
                        }
                    } else {
                        toastr.error(error);
                    }
                    // TIPO 2: cuando se comete un error dentro del METODO THEN
                });
        }

        function modalEditar(id) {
            // echo(id);
            const ruta = route('laboratorio.edit', [id]);

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
            const ruta = route('laboratorio.update', [id]);
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
                    const ruta = route('laboratorio.destroy', [id]);
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
