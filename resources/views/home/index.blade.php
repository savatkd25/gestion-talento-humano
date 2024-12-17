@extends('layouts.app')

@section('title', 'Página Principal')

@section('content')
<!-- Banner Encabezado -->
<div class="jumbotron text-center py-5 mb-4" style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); color: white;">
    <h1 class="display-4">Sistema de Gestión de Talento Humano</h1>
    <p class="lead">Optimice la gestión de empleados, departamentos y cargos de su organización con eficiencia y profesionalismo.</p>
</div>

<!-- Sección de Botones -->
<div class="container text-center mt-5">
    <h2 class="mb-4 text-dark fw-bold">Seleccione una opción para comenzar</h2>

    <div class="row mt-4">
        <!-- Gestión de Empleados -->
        <div class="col-md-4 mb-4">
            <a href="{{ route('empleados.index') }}" class="btn btn-primary btn-lg w-100 shadow-lg py-3">
                <i class="fas fa-users fa-2x"></i>
                <div class="mt-2">Gestión de Empleados</div>
            </a>
        </div>

        <!-- Gestión de Departamentos -->
        <div class="col-md-4 mb-4">
            <a href="{{ route('departamentos.index') }}" class="btn btn-secondary btn-lg w-100 shadow-lg py-3">
                <i class="fas fa-building fa-2x"></i>
                <div class="mt-2">Gestión de Departamentos</div>
            </a>
        </div>

        <!-- Gestión de Cargos -->
        <div class="col-md-4 mb-4">
            <a href="{{ route('cargos.index') }}" class="btn btn-success btn-lg w-100 shadow-lg py-3">
                <i class="fas fa-briefcase fa-2x"></i>
                <div class="mt-2">Gestión de Cargos</div>
            </a>
        </div>
    </div>
</div>

<!-- Sección de Información -->
<div class="container mt-5 mb-5">
    <div class="card shadow-lg border-0">
        <div class="card-body p-5">
            <h3 class="card-title fw-bold mb-3 text-center">¿Qué es el Sistema de Gestión de Talento Humano?</h3>
            <p class="card-text text-center">
                Este sistema tiene como objetivo facilitar la administración y seguimiento de los recursos humanos dentro de una organización. 
                Proporciona herramientas para gestionar empleados, departamentos y cargos, permitiendo una mejor organización y eficiencia.
            </p>
        </div>
    </div>
</div>

<!-- Créditos del Equipo -->
<!-- Créditos del Equipo -->
<div class="container text-center mb-5">
    <h5 class="fw-bold text-secondary mb-3">Integrantes del Proyecto</h5>
    <div class="d-flex justify-content-center flex-wrap gap-2">
        <span class="badge bg-primary text-light p-3 shadow-sm rounded-pill">
            <i class="fas fa-user me-2"></i> Mike Bello
        </span>
        <span class="badge bg-success text-light p-3 shadow-sm rounded-pill">
            <i class="fas fa-user me-2"></i> Kevin Pacheco
        </span>
        <span class="badge bg-danger text-light p-3 shadow-sm rounded-pill">
            <i class="fas fa-user me-2"></i> Edwin Salvatierra
        </span>
        <span class="badge bg-warning text-dark p-3 shadow-sm rounded-pill">
            <i class="fas fa-user me-2"></i> Ivania Zambrano
        </span>
        <span class="badge bg-info text-dark p-3 shadow-sm rounded-pill">
            <i class="fas fa-user me-2"></i> Josselyne Basurto
        </span>
        <span class="badge bg-secondary text-light p-3 shadow-sm rounded-pill">
            <i class="fas fa-user me-2"></i> Natasha Chavez
        </span>
    </div>
</div>

@endsection

