@extends('layouts.app')

@section('title', 'Asignar Permisos al Rol')

@section('content')
<div class="container mt-4">
    <!-- Encabezado -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">
            <i class="fas fa-key"></i> Asignar Permisos al Rol: <span class="text-secondary">{{ $role->nombre }}</span>
        </h2>
        <a href="{{ route('roles.index') }}" class="btn btn-outline-dark shadow-sm">
            <i class="fas fa-arrow-left"></i> Regresar
        </a>
    </div>

    <!-- Formulario de Asignación de Permisos -->
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('roles.asignarPermisos', $role->id) }}" method="POST">
                @csrf

                <!-- Selección de Permisos -->
                <div class="mb-4">
                    <label for="permisos" class="form-label">
                        <i class="fas fa-shield-alt"></i> Seleccione los Permisos
                    </label>
                    <select name="permisos[]" id="permisos" class="form-select" multiple size="10">
                        @foreach($permisos as $permiso)
                            <option value="{{ $permiso->id }}" 
                                {{ $role->permisos->contains($permiso->id) ? 'selected' : '' }}>
                                {{ $permiso->nombre }}
                            </option>
                        @endforeach
                    </select>
                    <small class="form-text text-muted">Mantenga presionada la tecla <strong>Ctrl</strong> (Windows) o <strong>Cmd</strong> (Mac) para seleccionar múltiples permisos.</small>
                </div>

                <!-- Botones de Acción -->
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success me-2 shadow-sm">
                        <i class="fas fa-save"></i> Guardar
                    </button>
                    <a href="{{ route('roles.index') }}" class="btn btn-secondary shadow-sm">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

