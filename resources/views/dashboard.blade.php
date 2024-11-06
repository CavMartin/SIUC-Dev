@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<x-header title="S.I.U.C - Pagína de inicio" />

<div class="container">
    <div class="row mt-5">
        <div class="col-md-4">
            <x-card 
                title="Nueva denuncia"
                icon="bi bi-clipboard-plus"
                content="Formulario de carga de nueva denuncia." 
                url="{{ route('carga') }}" 
                button-text="Nueva denuncia" 
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
    </div>
</div>

@endsection
