@extends('layouts.app')

@section('title', 'Formulario de carga')

@section('content')

<x-header :links="[
    ['title' => 'Página de inicio', 'url' => route('dashboard')]
]" />

    <!-- Contenido principal -->
    <div class="row">
        <div class="titulo-principal col-12 col-lg-6 col-md-6 mt-5">
            <h1 class="fw-semibold">Proyecto Síntesis</h1>
        </div>
    </div>

        <form action="{{ route('datos-actuacion.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Accordion -->
        <div class="row">
            <div class="col-12">
                <div class="accordion" id="accordionForm">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-semibold fs-4" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Datos de la actuación
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show"
                            data-bs-parent="#accordionForm">
                            <div class="accordion-body">
                                <div class="row content">
                                    @include('forms.datos-actuacion')
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold fs-4" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Delito/s
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionForm">
                            <div class="accordion-body">
                                <div class="row content" id="delitosContainer">
                                    @include('forms.delito', ['index' => 0]) <!-- Instancia inicial -->
                                </div>
                                <div class="d-flex justify-content-end mt-2">
                                    <button id="addDelito" class="btn btn-base fs-4 col-md-6">Agregar nuevo delito</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold fs-4" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Personas
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionForm">
                            <div class="accordion-body">
                                <div class="row content" id="personasContainer">
                                    @include('forms.persona', ['index' => 0]) <!-- Instancia inicial -->
                                </div>
                                <div class="d-flex justify-content-end mt-2">
                                    <button id="addPersona" class="btn btn-base fs-4 mt-2 col-md-6">Agregar nueva persona</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold fs-4" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Vehículos
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionForm">
                            <div class="accordion-body">
                                <div class="row content" id="vehiculosContainer">
                                </div>
                                <div class="d-flex justify-content-end mt-2">
                                    <button id="addVehiculo" class="btn btn-base fs-4 mt-2 col-md-6">Agregar nuevo vehículo</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold fs-4" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Armas
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionForm">
                            <div class="accordion-body">
                                <div class="row content" id="armasContainer">
                                </div>
                                <div class="d-flex justify-content-end mt-2">
                                    <button id="addArma" class="btn btn-base fs-4 mt-2 col-md-6">Agregar nueva arma</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold fs-4" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Elementos
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionForm">
                            <div class="accordion-body">
                                <div class="row content" id="elementosContainer">
                                </div>
                                <div class="d-flex justify-content-end mt-2">
                                    <button id="addElemento" class="btn btn-base fs-4 mt-2 col-md-6">Agregar nuevo elemento</button>
                                </div>
                            </div>
                        </div>
                    </div>

                <button type="submit" class="btn btn-base col-12 mt-3 fs-3 p-2">Guardar formulario</button>
            </form>

            </div>



        </div>

<script src="{{ asset('js/formEntityHandler.js') }}"></script>


@endsection
