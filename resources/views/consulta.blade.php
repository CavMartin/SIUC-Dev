@extends('layouts.app')

@section('title', 'Consulta de Formularios')

@section('content')

<x-header :links="[
    ['title' => 'Página de inicio', 'url' => route('dashboard')],
    ['title' => 'Nuevo formulario', 'url' => route('carga')]
]" />

<div class="container mt-5">
    <h3>Formularios Cargados</h3>
    <div class="table-responsive wrapper-tabla">
        <table class="table table-sm">
            <thead class="tabla-encabezado text-start">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tipo de Actuación</th>
                    <th scope="col">Número</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Unidad Fiscal</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-start">
                @forelse ($datos as $index => $dato)
                    <tr>
                        <td>{{ $loop->iteration + ($datos->currentPage() - 1) * $datos->perPage() }}</td>
                        <td>{{ $dato->tipoActuacion }}</td>
                        <td>{{ $dato->numeroActuacion }}</td>
                        <td>{{ $dato->fechaActuacion }}</td>
                        <td>{{ $dato->horaActuacion }}</td>
                        <td>{{ $dato->unidadFiscal }}</td>
                        <td>
                            <button class="btn btn-base btn-sm" onclick="enviarIdParaCarga({{ $dato->id }})">
                                Editar
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No hay registros disponibles.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $datos->links('pagination::bootstrap-4') }}
    </div>
</div>

<script>
    function enviarIdParaCarga(id) {
        // Crear el formulario oculto
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = "{{ route('carga') }}";

        // Añadir el token CSRF
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        form.appendChild(csrfInput);

        // Añadir el ID
        const idInput = document.createElement('input');
        idInput.type = 'hidden';
        idInput.name = 'id';
        idInput.value = id;
        form.appendChild(idInput);

        // Añadir el formulario al cuerpo y enviarlo
        document.body.appendChild(form);
        form.submit();
    }
</script>

@endsection
