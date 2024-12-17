@extends('layouts.app')

@section('title', 'Editar Rol')

@section('content')
<div class="container mt-5">
    <h1>Editar Rol</h1>
    <form action="{{ route('roles.update', $rol->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" value="{{ $rol->nombre }}" id="nombre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control">{{ $rol->descripcion }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
