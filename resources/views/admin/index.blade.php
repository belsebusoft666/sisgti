@extends('layouts.admin')

@section('titulo')
    Dashboard | Laravel
@endsection

<!-- Sección de navegación -->
<style>
.small-box .inner p {
    text-align: left;
    margin-left: 15px;
    font-size: 1.5rem;
}
</style>
<!-- Contenido principal -->
<div class="container mt-4 text-center">
    <!-- Imagen arriba de las cajas de información -->
    <img src="../img/logosalle1.png" alt="IESTP La Salle" class="img-fluid mb-4">
    
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-4 mx-auto">
            <!-- Caja de información para Laboratorio -->
            <div class="small-box bg-info">
                <div class="inner">
                    <p><strong>Laboratorio</strong></p>
                </div>
                <div class="icon">
                    <i class="fas fa-desktop"></i>
                </div>
                <!-- Enlace para más información sobre Laboratorio -->
                <a href="{{ route('laboratorio.index') }}" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mx-auto">
            <!-- Caja de información para Sistema -->
            <div class="small-box bg-success">
                <div class="inner">
                    <p><strong>Sistema</strong></p>
                </div>
                <div class="icon">
                    <i class="ion-ios-people"></i>
                </div>
                <!-- Enlace para más información sobre Sistema -->
                <a href="{{ route('sistema.index') }}" class="small-box-footer">Más info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>
<!-- Lista de navegación -->
<ul>
    <li class="nav">
        <!-- Botón para cerrar sesión -->
        <a class="nav-link logout-button" onclick="document.getElementById('formulario-logout').submit()" href="#" role="button">
            <i class="fas fa-sign-out-alt"></i>
        </a>
        <!-- Formulario oculto para cerrar sesión -->
        <form id="formulario-logout" method="POST" action="{{ route('logout') }}">
            @csrf
        </form>
    </li>
</ul>

<!-- Bootstrap JS y dependencias -->
