@extends('layouts.app')

@section('title', 'Asignar Roles al Empleado')

@section('content')
<div class="container mt-5">
    <!-- Encabezado -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">
            <i class="fas fa-user-shield"></i> Asignar Roles al Empleado: <span class="text-dark">{{ $empleado->nombre }}</span>
        </h2>
        <a href="{{ route('empleados.index') }}" class="btn btn-outline-dark shadow-sm">
            <i class="fas fa-arrow-left"></i> Regresar a Empleados
        </a>
    </div>

    <!-- Tarjeta del Formulario -->
    <div class="card shadow-lg">
        <div class="card-body">
            <form action="{{ route('empleados.asignarRoles', $empleado) }}" method="POST">
                @csrf
                <!-- Lista de Roles -->
                <div class="mb-4">
                    <h5 class="mb-3"><i class="fas fa-list-check"></i> Seleccione los Roles</h5>
                    <div class="row">
                        @foreach($roles as $rol)
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input type="checkbox" 
                                           name="roles[]" 
                                           value="{{ $rol->id }}" 
                                           id="rol_{{ $rol->id }}"
                                           class="form-check-input"
                                           {{ $empleado->roles->contains($rol->id) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="rol_{{ $rol->id }}">
                                        <i class="fas fa-key"></i> {{ $rol->nombre }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Botones de Acción -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success me-2 shadow-sm">
                        <i class="fas fa-save"></i> Guardar Roles
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

