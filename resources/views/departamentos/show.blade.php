@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Detalles del Departamento</h1>
    <ul class="list-group">
        <li class="list-group-item"><strong>Nombre:</strong> {{ $departamento->nombre }}</li>
        <li class="list-group-item"><strong>Descripción:</strong> {{ $departamento->descripcion }}</li>
    </ul>
    <a href="{{ route('departamentos.index') }}" class="btn btn-primary mt-3">Volver</a>
</div>
@endsection
