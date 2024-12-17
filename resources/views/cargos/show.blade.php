@extends('layouts.app')

@section('title', 'Detalles del Cargo')

@section('content')
<div class="container mt-4">
    <!-- Botón Regresar -->
    <div class="mb-3">
        <a href="{{ route('cargos.index') }}" class="btn btn-outline-dark">
            <i class="fas fa-arrow-left"></i> Volver a la Lista de Cargos
        </a>
    </div>

    <!-- Tarjeta de Detalles -->
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h2><i class="fas fa-briefcase"></i> Detalles del Cargo</h2>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4 text-end fw-bold">Nombre:</div>
                <div class="col-md-8">{{ $cargo->nombre }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 text-end fw-bold">Descripción:</div>
                <div class="col-md-8">{{ $cargo->descripcion }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-4 text-end fw-bold">Salario Mínimo:</div>
                <div class="col-md-8">${{ number_format($cargo->salario_minimo, 2) }}</div>
            </div>
        </div>
        <div class="card-footer text-center">
            <a href="{{ route('cargos.index') }}" class="btn btn-success">
                <i class="fas fa-list"></i> Ver Todos los Cargos
            </a>
            <a href="{{ route('cargos.edit', $cargo) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Editar Cargo
            </a>
        </div>
    </div>
</div>
@endsection
