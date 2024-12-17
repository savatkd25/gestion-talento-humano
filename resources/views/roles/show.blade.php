@extends('layouts.app')

@section('title', 'Detalles del Rol')

@section('content')
<div class="container mt-5">
    <h1>Detalles del Rol</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nombre:</strong> {{ $rol->nombre }}</li>
        <li class="list-group-item"><strong>Descripción:</strong> {{ $rol->descripcion }}</li>
    </ul>
    <a href="{{ route('roles.index') }}" class="btn btn-primary mt-3">Volver</a>
</div>
@endsection
