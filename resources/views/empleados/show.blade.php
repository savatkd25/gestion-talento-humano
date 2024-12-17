@extends('layouts.app')

@section('title', 'Detalles del Empleado')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Tarjeta con detalles del empleado -->
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-dark text-white text-center">
                    <h2 class="mb-0">Detalles del Empleado</h2>
                </div>
                <div class="card-body text-center">
                    <!-- Foto del empleado -->
                    @if ($empleado->foto)
                        <img src="{{ asset('storage/' . $empleado->foto) }}" alt="Foto del Empleado" 
                             class="rounded-circle img-thumbnail mb-3" 
                             style="width: 150px; height: 150px; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/150" alt="Sin Foto" 
                             class="rounded-circle img-thumbnail mb-3">
                    @endif

                    <!-- Datos del empleado -->
                    <h3 class="card-title mb-3">{{ $empleado->nombre }}</h3>
                    <ul class="list-group list-group-flush text-start">
                        <li class="list-group-item"><strong>Cédula:</strong> {{ $empleado->cedula }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $empleado->email }}</li>
                        <li class="list-group-item"><strong>Teléfono:</strong> {{ $empleado->telefono }}</li>
                        <li class="list-group-item"><strong>Departamento:</strong> {{ $empleado->departamento->nombre ?? 'N/A' }}</li>
                        <li class="list-group-item"><strong>Cargo:</strong> {{ $empleado->cargo->nombre ?? 'N/A' }}</li>
                        <li class="list-group-item"><strong>Salario Base:</strong> ${{ number_format($empleado->salario_base, 2) }}</li>
                        <li class="list-group-item"><strong>Fecha de Contratación:</strong> {{ $empleado->fecha_contratacion }}</li>
                    </ul>
                </div>

                <!-- Botón para regresar -->
                <div class="card-footer text-center">
                    <a href="{{ route('empleados.index') }}" class="btn btn-outline-primary">
                        <i class="fas fa-arrow-left"></i> Volver a la Lista
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

