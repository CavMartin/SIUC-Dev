@extends('layouts.app')

@section('title', 'Formulario de carga')

@section('content')

<x-header :links="[
    ['title' => 'Página de inicio', 'url' => route('dashboard')]
]" />

<style>
    /* Estilo general de las pestañas */
    .custom-tabs .nav-link {
        color: #484A61;
        border-radius: 5px 5px 0 0;
        padding: 10px 15px;
    }

    .custom-tabs .nav-link:hover {
        border-color: #484A61; 
    }

    /* Estilo para la pestaña activa */
    .custom-tabs .nav-link.active {
        background-color: #484A61; /* Fondo de pestaña activa */
        color: #f8f9fa; /* Color de texto activo */
        font-weight: bold; /* Texto en negrita para la pestaña activa */
    }

    /* Estilo de iconos */
    .custom-tabs .nav-link i {
        color: #484A61; /* Color de los iconos por defecto */
    }

    /* Iconos en pestaña activa */
    .custom-tabs .nav-link.active i {
        color: #f8f9fa; /* Color del icono cuando la pestaña está activa */
    }
</style>

<!-- Contenido principal -->
<div class="row">
    <div class="titulo-principal col-12 col-lg-6 col-md-6 mt-5">
        <h1 class="fw-semibold">S.I.U.C</h1>
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/forms-utils.js') }}"></script>

@csrf
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1 fs-3">Formulario de Actuación</h4>
            </div><!-- end card header -->
            
            <div class="card-body border">
                <!-- Tab Navigation -->
                <ul class="nav nav-tabs custom-tabs" id="myTab" role="tablist">
                    <li class="nav-item fs-5" role="presentation">
                        <button class="nav-link active" id="datos-actuacion-tab" data-bs-toggle="tab" data-bs-target="#datos-actuacion" type="button" role="tab" aria-controls="datos-actuacion" aria-selected="true">
                            <i class="bi bi-file-earmark-text me-1"></i> Datos de la Actuación
                        </button>
                    </li>
                    <li class="nav-item fs-5" role="presentation">
                        <button class="nav-link" id="delitos-tab" data-bs-toggle="tab" data-bs-target="#delitos" type="button" role="tab" aria-controls="delitos" aria-selected="false">
                            <i class="bi bi-shield-lock me-1"></i> Delito/s
                        </button>
                    </li>
                    <li class="nav-item fs-5" role="presentation">
                        <button class="nav-link" id="personas-tab" data-bs-toggle="tab" data-bs-target="#personas" type="button" role="tab" aria-controls="personas" aria-selected="false">
                            <i class="bi bi-person me-1"></i> Persona/s
                        </button>
                    </li>
                    <li class="nav-item fs-5" role="presentation">
                        <button class="nav-link" id="vehiculos-tab" data-bs-toggle="tab" data-bs-target="#vehiculos" type="button" role="tab" aria-controls="vehiculos" aria-selected="false">
                            <i class="bi bi-truck me-1"></i> Vehículo/s
                        </button>
                    </li>
                    <li class="nav-item fs-5" role="presentation">
                        <button class="nav-link" id="armas-tab" data-bs-toggle="tab" data-bs-target="#armas" type="button" role="tab" aria-controls="armas" aria-selected="false">
                            <i class="bi bi-gear me-1"></i> Arma/s
                        </button>
                    </li>
                    <li class="nav-item fs-5" role="presentation">
                        <button class="nav-link" id="elementos-tab" data-bs-toggle="tab" data-bs-target="#elementos" type="button" role="tab" aria-controls="elementos" aria-selected="false">
                            <i class="bi bi-box-seam me-1"></i> Elemento/s
                        </button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="datos-actuacion" role="tabpanel" aria-labelledby="datos-actuacion-tab">
                        <div class="row content mt-3">
                            @include('components.forms.datos-actuacion')
                        </div>
                    </div>
                    <div class="tab-pane fade" id="delitos" role="tabpanel" aria-labelledby="delitos-tab">
                        <div class="d-flex justify-content-end mt-3">
                            <!-- Botón para abrir el modal y cargar el formulario de delito -->
                            <button 
                                class="btn btn-base fs-4 mt-2 col-md-12" 
                                data-bs-toggle="modal" 
                                data-bs-target="#delitoModal">
                                Agregar nuevo delito
                            </button>
                        </div>
                        <div class="row content mt-3" id="delitosContainer">
                            @foreach ($delitos as $index => $delito)
                                @include('components.tabs.delito', ['delito' => $delito])
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="personas" role="tabpanel" aria-labelledby="personas-tab">
                        <div class="d-flex justify-content-end mt-3">
                            <button 
                                class="btn btn-base fs-4 mt-2 col-md-12" 
                                data-bs-toggle="modal" 
                                data-bs-target="#personaModal">
                                Agregar nueva persona
                            </button>
                        </div>
                        <div class="row content mt-3" id="personasContainer">
                            @foreach ($personas as $index => $persona)
                                @include('components.tabs.persona', ['persona' => $persona])
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="vehiculos" role="tabpanel" aria-labelledby="vehiculos-tab">
                        <div class="d-flex justify-content-end mt-3">
                            <button 
                                class="btn btn-base fs-4 mt-2 col-md-12" 
                                data-bs-toggle="modal" 
                                data-bs-target="#vehiculoModal">
                                Agregar nuevo vehículo
                            </button>
                        </div>
                        <div class="row content mt-3" id="vehiculosContainer">
                            @foreach ($vehiculos as $index => $vehiculo)
                                @include('components.tabs.vehiculo', ['vehiculo' => $vehiculo])
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="armas" role="tabpanel" aria-labelledby="armas-tab">
                        <div class="d-flex justify-content-end mt-3">
                            <button 
                                class="btn btn-base fs-4 mt-2 col-md-12" 
                                data-bs-toggle="modal" 
                                data-bs-target="#armaModal">
                                Agregar nueva arma
                            </button>
                        </div>
                        <div class="row content mt-3" id="armasContainer">
                            @foreach ($armas as $index => $arma)
                                @include('components.tabs.arma', ['arma' => $arma])
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="tab-pane fade" id="elementos" role="tabpanel" aria-labelledby="elementos-tab">
                        <div class="d-flex justify-content-end mt-3">
                            <button 
                                class="btn btn-base fs-4 mt-2 col-md-12" 
                                data-bs-toggle="modal" 
                                data-bs-target="#elementoModal">
                                Agregar nuevo elemento
                            </button>
                        </div>
                        <div class="row content mt-3" id="elementosContainer">
                            @foreach ($elementos as $index => $elemento)
                                @include('components.tabs.elemento', ['elemento' => $elemento])
                            @endforeach
                        </div>
                    </div>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!--end col-->
</div>

<!-- Incluir ventanas modales -->
@include('components.forms.delito')
@include('components.forms.persona')
@include('components.forms.vehiculo')
@include('components.forms.arma')
@include('components.forms.elemento')


<!-- Incluye los componentes de toast pero ocultos por defecto -->
@include('components.toasts.success-toast', ['message' => '']) <!-- Toast de éxito vacío por defecto -->
@include('components.toasts.error-toast', ['message' => ''])   <!-- Toast de error vacío por defecto -->
@if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showSuccessToast("{{ session('success') }}");
        });
    </script>
@endif

@endsection
