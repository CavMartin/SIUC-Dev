@extends('layouts.app')

@section('title', 'Panel de control')

@section('content')

{{-- Header con links y título --}}
<x-header 
    :links="[
        ['title' => 'Página de inicio', 'url' => route('dashboard')],
        ['title' => 'Volver', 'id' => 'volverLink', 'onclick' => 'showMainCards()']
    ]"
    title="S.I.U.C - Panel de control" 
/>

<div class="container">
    {{-- Tarjetas principales --}}
    <div class="row mt-5 justify-content-center" id="main-cards">
        <div class="col-md-4">
            <x-card 
                title="Gestionar listas"
                icon="bi bi-list-ul"
                content="Gestionar listas desplegables."
                button-text="Ver opciones"
                onclick="toggleView('listas-cards')"
                id="gestionar-listas"
            />
        </div>

        <div class="col-md-4">
            <x-card 
                title="Gestionar usuarios"
                icon="bi bi-person-circle"
                content="Gestionar usuarios y roles del sistema."
                button-text="Ver usuarios"
                onclick="toggleView('usuarios-cards')"
                id="gestionar-usuarios"
            />
        </div>
    </div>

    {{-- Grupo de tarjetas de 'Gestionar listas' --}}
    <div class="row mt-5" id="listas-cards" style="display: none;">
        <div class="col-md-4">
            <x-card 
                title="Tipo de actuación"
                icon="bi bi-filetype-json"
                content="Modificar las opciones para el atributo tipo de actuación."
                url="{{ route('json.read', ['filename' => 'tipoActuacion']) }}"
                button-text="Modificar opciones"
            />
        </div>

        <div class="col-md-4">
            <x-card 
                title="Fiscalías regionales"
                icon="bi bi-filetype-json"
                content="Modificar las opciones para el atributo fiscalías regionales."
                url="{{ route('json.read', ['filename' => 'fiscaliasRegionales']) }}"
                button-text="Modificar opciones"
            />
        </div>

        <div class="col-md-4">
            <x-card 
                title="Unidades regionales"
                icon="bi bi-filetype-json"
                content="Modificar las opciones para el atributo unidades regionales."
                url="{{ route('json.read', ['filename' => 'unidadesRegionales']) }}"
                button-text="Modificar opciones"
            />
        </div>
    </div>

    {{-- Grupo de tarjetas de 'Gestionar usuarios' --}}
    <div class="row mt-5" id="usuarios-cards" style="display: none;">
        <div class="col-md-4">
            <x-card 
                title="Administrar roles"
                icon="bi bi-gear"
                content="Modificar los roles de los usuarios."
                button-text="Gestionar roles"
            />
        </div>

        <div class="col-md-4">
            <x-card 
                title="Administrar permisos"
                icon="bi bi-shield-lock"
                content="Administrar los permisos asignados a los roles."
                button-text="Gestionar permisos"
            />
        </div>
    </div>
</div>

{{-- Script para gestionar la visibilidad de las tarjetas --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const volverLink = document.getElementById('volverLink');

        if (volverLink) {
            volverLink.style.display = 'none'; // Inicialmente oculto

            // Función para mostrar las tarjetas principales
            window.showMainCards = function () {
                document.getElementById('main-cards').style.display = 'flex'; // Muestra tarjetas principales
                document.getElementById('listas-cards').style.display = 'none'; // Oculta listas
                document.getElementById('usuarios-cards').style.display = 'none'; // Oculta usuarios
                volverLink.style.display = 'none'; // Oculta el enlace 'Volver'
            };

            // Función para mostrar el grupo de tarjetas correspondiente
            window.toggleView = function (viewId) {
                document.getElementById('main-cards').style.display = 'none'; // Oculta tarjetas principales
                document.getElementById(viewId).style.display = 'flex'; // Muestra tarjetas secundarias
                volverLink.style.display = 'block'; // Muestra el enlace 'Volver'
            };
        }
    });
</script>

@endsection
