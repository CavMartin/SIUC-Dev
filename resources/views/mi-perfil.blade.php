@extends('layouts.app')

@section('title', 'Formulario de carga')

@section('content')

<x-header :links="[
    ['title' => 'Página de inicio', 'url' => route('dashboard')]
]" />




<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: rgb(240, 240, 240)">
                <div class="row g-0 align-items-center p-3">
                    <!-- Imagen del usuario -->
                    <div class="col-md-4 text-center">
                        <img src="data:image/jpeg;base64,{{ $attributes['jpegPhoto'] }}" 
                             alt="Foto de {{ $attributes['cn'] }}" 
                             class="img-thumbnail rounded-circle"
                             style="width: 200px; height: 200px; object-fit: cover;">
                    </div>

                    <!-- Detalles del usuario -->
                    <div class="col-md-8">
                        <h3 class="card-title">Bienvenido, {{ $attributes['givenName'] ?? $user }}</h3>

                        <div class="card-body">
                            <h5 class="mt-4">Detalles del usuario:</h5>
                            <ul class="list-group">
                                <li class="list-group-item"><strong>UID:</strong> {{ $attributes['uid'] ?? 'N/A' }}</li>
                                <li class="list-group-item"><strong>Correo:</strong> {{ $attributes['mail'] ?? 'N/A' }}</li>
                                <li class="list-group-item"><strong>Número de Teléfono:</strong> {{ $attributes['telephoneNumber'] ?? 'N/A' }}</li>
                                <li class="list-group-item"><strong>Nombre Completo:</strong> {{ $attributes['cn'] ?? 'N/A' }}</li>
                                <li class="list-group-item"><strong>Apellido:</strong> {{ $attributes['sn'] ?? 'N/A' }}</li>
                                <li class="list-group-item"><strong>CUIL:</strong> {{ $attributes['cuil'] ?? 'N/A' }}</li>
                                <li class="list-group-item"><strong>ID Persona:</strong> {{ $attributes['idPersona'] ?? 'N/A' }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<div class="container">
    <div class="row mt-5">
        <div class="col-12 mb-4">
            <h3>Parametros CAS - Testing</h3>
            @if(isset($attributes) && !empty($attributes))
                <div class="alert alert-info">
                    <h5>Detalles del usuario:</h5>
                    <ul>
                        @foreach($attributes as $key => $value)
                            <li><strong>{{ $key }}:</strong> {{ $value }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection
