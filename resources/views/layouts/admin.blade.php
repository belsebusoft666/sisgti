<!DOCTYPE html>
    <html lang="en" xmlns:mso="urn:schemas-microsoft-com:office:office"
        xmlns:msdt="uuid:C2F41010-65B3-11d1-A29F-00AA00C14882">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('titulo')</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
            
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
        <!-- SweetAlert2 -->
        <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
        <!-- Toastr -->
        <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
        {{-- <link rel="stylesheet" href="{{ asset('dist/css/styles.css') }}"> --}}
        <style>
            .logout-button {
                position: fixed;
                bottom: 20px;
                right: 20px;
                z-index: 999;
                background-color: #a1a1a1; /* Color de fondo del cuadro */
                padding: 10px; /* Espacio entre el contenido y los bordes */
                border-radius: 5px; /* Curva de los bordes */
                border: 1px solid #a1a1a1; /* Borde del cuadro */
                color: #fff; /* Color del texto */
                cursor: pointer; /* Cambia el cursor al pasar el mouse */
            }
            .logout-button i {
                color: #fffcfc; /* Color inicial del icono */
                }

            .logout-button:hover i {
                color: #a1a1a1; /* Color del icono al pasar el mouse */
                }
            
        </style>
        @routes
    </head>
    <body class="hold-transition layout-fixed layout-navbar-fixed">
        <div >
 
            


            @yield('contenido')
        </div>
        <!-- ./wrapper -->
        @yield('modales')
        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- DataTables  & Plugins -->
        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <!-- SweetAlert2 -->
        <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <!-- Toastr -->
        <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('js/funciones.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        {{-- <script>
            document.addEventListener('DOMContentLoaded', function() {
                var logoutButton = document.querySelector('.logout-button');
        
                logoutButton.addEventListener('mouseover', function() {
                    this.style.backgroundColor = '#333'; /* Cambia el color al pasar el mouse */
                });
        
                logoutButton.addEventListener('mouseout', function() {
                    this.style.backgroundColor = '#a1a1a1'; /* Restaura el color al salir el mouse */
                });
            });
        </script> --}}
        @yield('javascript')
    </body>
    </html