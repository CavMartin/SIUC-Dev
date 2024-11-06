@extends('layouts.app')

@section('title', 'Editar JSON')

@section('content')

<x-header :links="[
    ['title' => 'Panel de control', 'url' => route('panel-de-control')],
    ['title' => 'Página de inicio', 'url' => route('dashboard')]
]" />

<div class="mt-5">

    @if (session('success'))
        <div class="row alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('json.update', ['filename' => $filename]) }}" method="POST">
        @csrf
        <div class="row">
            @foreach ($jsonData as $elementoPadre => $elementosHijos)
                <div class="col-12 mb-4" style="border: 1px solid #484A61;">
                    <h3 class="my-2">{{ $elementoPadre }}</h3>
                    <ul id="elemento_{{ $loop->index }}" class="list-unstyled">
                        @foreach ($elementosHijos as $key => $elementoHijo)
                            <li class="d-flex align-items-center mb-2">
                                <input 
                                    type="text" 
                                    name="jsonData[{{ $elementoPadre }}][]" 
                                    value="{{ $elementoHijo }}" 
                                    class="form-control me-2 mx-5"
                                >
                                <button type="button" class="btn btn-danger btn-sm remove-unit">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn btn-gradient btn-sm my-3 fs-5"
                            onclick="addElementoHijo({{ $loop->index }}, '{{ $elementoPadre }}')">
                        Agregar registro
                    </button>
                </div>
            @endforeach
            <button type="submit" class="btn btn-base col-12 fs-3">Guardar Cambios</button>
        </div>
    </form>
    
</div>

<script>
    function addElementoHijo(index, elementoPadre) {
        const list = document.getElementById(`elemento_${index}`);
        const newInput = document.createElement('li');
        newInput.classList.add('d-flex', 'align-items-center', 'mb-2');
        newInput.innerHTML = `
            <input type="text" name="jsonData[${elementoPadre}][]" class="form-control me-2 mx-5" placeholder="Nuevo registro">
            <button type="button" class="btn btn-danger btn-sm remove-unit">
                <i class="bi bi-x-lg"></i>
            </button>
        `;
        list.appendChild(newInput);
        attachDeleteHandlers();
    }

    function attachDeleteHandlers() {
        const removeButtons = document.querySelectorAll('.remove-unit');
        removeButtons.forEach(button => {
            button.removeEventListener('click', handleDelete);
            button.addEventListener('click', handleDelete);
        });
    }

    function handleDelete(event) {
        const li = event.target.closest('li');
        li.remove();
    }

    document.addEventListener('DOMContentLoaded', attachDeleteHandlers);
</script>

@endsection
