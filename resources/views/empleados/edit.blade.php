@extends('layouts.app')

@section('title', 'Editar Empleado')

@section('content')
<div class="container mt-5">
    <!-- Encabezado -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">
            <i class="fas fa-user-edit"></i> Editar Información del Empleado
        </h2>
        <a href="{{ route('empleados.index') }}" class="btn btn-outline-dark shadow-sm">
            <i class="fas fa-arrow-left"></i> Regresar a la Lista
        </a>
    </div>

    <!-- Tarjeta con el Formulario -->
    <div class="card shadow-lg">
        <div class="card-body">
            <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Sección del Nombre -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nombre" class="form-label"><i class="fas fa-user"></i> Nombre</label>
                        <input type="text" name="nombre" value="{{ $empleado->nombre }}" id="nombre" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="cedula" class="form-label"><i class="fas fa-id-card"></i> Cédula</label>
                        <input type="text" name="cedula" value="{{ $empleado->cedula }}" id="cedula" class="form-control" required>
                    </div>
                </div>

                <!-- Sección del Correo Electrónico y Teléfono -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="email" class="form-label"><i class="fas fa-envelope"></i> Correo Electrónico</label>
                        <input type="email" name="email" value="{{ $empleado->email }}" id="email" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label for="telefono" class="form-label"><i class="fas fa-phone"></i> Teléfono</label>
                        <input type="text" name="telefono" value="{{ $empleado->telefono }}" id="telefono" class="form-control" required>
                    </div>
                </div>

                <!-- Botones de Acción -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success me-2 shadow-sm">
                        <i class="fas fa-save"></i> Actualizar
                    </button>
                    <a href="{{ route('empleados.index') }}" class="btn btn-secondary shadow-sm">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

