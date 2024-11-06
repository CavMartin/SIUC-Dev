@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<x-header title="S.I.U.C - Página de inicio" />

<div class="container">
    <div class="row mt-5">
        <div class="col-md-4">
            <x-card 
                title="Nueva denuncia"
                icon="bi bi-clipboard-plus"
                content="Formulario de carga de nueva denuncia." 
                button-text="Nueva denuncia" 
                onclick="create()"
            />
        </div>

        <div class="col-md-4">
            <x-card 
                title="Registro de denuncias"
                icon="bi bi-clipboard-data" 
                content="Visualiza las denuncias ingresadas recientemente." 
                url="{{ route('consulta') }}" 
                button-text="Consultas" 
            />
        </div>

        <div class="col-md-4">
            <x-card 
                title="Auditoría"
                icon="bi bi-search" 
                content="Control de carga por parte del auditor." 
                url="{{ route('auditoria') }}" 
                button-text="Auditoría" 
            />
        </div>

        <div class="col-md-4">
            <x-card 
                title="Panel de control"
                icon="bi bi-gear"
                content="Control de las distintas opciones de la aplicación." 
                url="{{ route('panel-de-control') }}" 
                button-text="Panel de control" 
            />
        </div>
    </div>
</div>

<script>
    function create() {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = "{{ route('carga') }}";

        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        form.appendChild(csrfInput);

        document.body.appendChild(form);
        form.submit();
    }
</script>

<!-- Incluye los contenedores de toasts -->
@include('components.toasts.error-toast', ['message' => session('error')])
@include('components.toasts.success-toast', ['message' => session('success')])

@if(session('error'))
    <script>
        // Mostrar el toast de error con el mensaje de la sesión
        showErrorToast("{{ session('error') }}");
    </script>
@endif

@if(session('success'))
    <script>
        // Mostrar el toast de éxito con el mensaje de la sesión
        showSuccessToast("{{ session('success') }}");
    </script>
@endif

@endsection
