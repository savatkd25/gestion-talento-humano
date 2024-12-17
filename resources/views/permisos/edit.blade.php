@extends('layouts.app')

@section('title', 'Editar Permiso')

@section('content')
<div class="container mt-5">
    <h1>Editar Permiso</h1>
    <form action="{{ route('permisos.update', $permiso) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" value="{{ $permiso->nombre }}" id="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control">{{ $permiso->descripcion }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
