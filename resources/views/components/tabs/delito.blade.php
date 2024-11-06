<div class="form-row row mx-2 mb-2 p-3 container-entity" id="delito_{{ $index }}">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-semibold">Delito #<span class="delito-index">{{ $index + 1 }}</span></h3>
        <div>
            <!-- Botón para Editar -->
            <button 
                class="btn btn-base btn-sm me-2"
                onclick="abrirModalEdicionDelito({{ $delito->id_delito }})">
                Editar
            </button>
            <!-- Botón para Eliminar -->
            <button 
                class="btn btn-base btn-sm"
                style="background-color: crimson"
                onclick="eliminarDelito({{ $delito->id_delito }})">
                Eliminar
            </button>
        </div>
    </div>

    <!-- Campo oculto para el ID de delito (PK) -->
    <input type="text" name="id_delito" value="{{ $delito->id_delito }}" id="id_delito_{{ $index }}">
    
    <!-- Campo oculto para el ID de datos_actuacion_id (FK) -->
    <input type="text" name="datos_actuacion_id" value="{{ $delito->datos_actuacion_id }}" id="datos_actuacion_id_{{ $index }}">
    
    <div class="row">
        <div class="col-md-6">
            <label class="form-label fs-5">Fecha del Hecho</label>
            <p class="form-control-plaintext">{{ $delito->fechaHecho ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5">Hora del Hecho</label>
            <p class="form-control-plaintext">{{ $delito->horaHecho ?? 'No disponible' }}</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <label class="form-label fs-5">Delito General</label>
            <p class="form-control-plaintext">{{ $delito->delitoGeneral ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-3">
            <label class="form-label fs-5">Agravado o Calificado</label>
            <p class="form-control-plaintext">{{ $delito->agravado ? 'Sí' : 'No' }}</p>
        </div>
        <div class="col-md-3">
            <label class="form-label fs-5">Tentativa</label>
            <p class="form-control-plaintext">{{ $delito->tentativa ? 'Sí' : 'No' }}</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4">
            <label class="form-label fs-5">Temática</label>
            <p class="form-control-plaintext">{{ $delito->tematica ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">Tipología</label>
            <p class="form-control-plaintext">{{ $delito->tipologia ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">Modalidad</label>
            <p class="form-control-plaintext">{{ $delito->modalidad ?? 'No disponible' }}</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <label class="form-label fs-5">Entidad Atacada (Objetivo)</label>
            <p class="form-control-plaintext">{{ $delito->entidadAtacada ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5">Nombre de la Entidad</label>
            <p class="form-control-plaintext">{{ $delito->nombreEntidad ?? 'No disponible' }}</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4">
            <label class="form-label fs-5">Tipo de Lugar</label>
            <p class="form-control-plaintext">{{ $delito->tipoLugar ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">Departamento</label>
            <p class="form-control-plaintext">{{ $delito->departamento ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">Localidad</label>
            <p class="form-control-plaintext">{{ $delito->localidad ?? 'No disponible' }}</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4">
            <label class="form-label fs-5">Barrio</label>
            <p class="form-control-plaintext">{{ $delito->barrio ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">Calle</label>
            <p class="form-control-plaintext">{{ $delito->calle ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">Intersección</label>
            <p class="form-control-plaintext">{{ $delito->interseccion ?? 'No disponible' }}</p>
        </div>
    </div>
</div>

<script>
    // Función para abrir el modal de edición de delito
    function abrirModalEdicionDelito(delitoId) {
        // Construir la URL para obtener los datos del delito con el ID proporcionado
        const url = `{{ url('delito/get') }}/${delitoId}`;

        // Realizar la solicitud para obtener los datos del delito
        fetch(url)
            .then(response => {
                if (!response.ok) throw new Error("No se pudo obtener los datos del delito");
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // Rellenar el formulario en el modal de edición con los datos del delito
                    document.getElementById('id_delito').value = data.delito.id_delito;
                    document.getElementById('datos_actuacion_id').value = data.delito.datos_actuacion_id;
                    document.getElementById('fechaHecho').value = data.delito.fechaHecho;
                    document.getElementById('horaHecho').value = data.delito.horaHecho;
                    document.getElementById('delitoGeneral').value = data.delito.delitoGeneral;
                    document.getElementById('tematica').value = data.delito.tematica;
                    document.getElementById('tipologia').value = data.delito.tipologia;
                    document.getElementById('modalidad').value = data.delito.modalidad;
                    document.getElementById('entidadAtacada').value = data.delito.entidadAtacada;
                    document.getElementById('nombreEntidad').value = data.delito.nombreEntidad;
                    document.getElementById('tipoLugar').value = data.delito.tipoLugar;
                    document.getElementById('departamento').value = data.delito.departamento;
                    document.getElementById('localidad').value = data.delito.localidad;
                    document.getElementById('barrio').value = data.delito.barrio;
                    document.getElementById('calle').value = data.delito.calle;
                    document.getElementById('interseccion').value = data.delito.interseccion;

                    // Checkbox: convertir el valor booleano en estado de marcado
                    document.getElementById('agravado').checked = data.delito.agravado === '1';
                    document.getElementById('tentativa').checked = data.delito.tentativa === '1';

                    // Mostrar el modal de edición (delitoModal)
                    const delitoModal = new bootstrap.Modal(document.getElementById('delitoModal'));
                    delitoModal.show();
                } else {
                    showErrorToast(data.message || 'No se pudieron cargar los datos del delito.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showErrorToast(error.message || 'Error al cargar los datos del delito.');
            });
        }

    // Función para eliminar un delito
    function eliminarDelito(delitoId) {
        if (confirm('¿Está seguro de que desea eliminar este delito?')) {
            const url = `{{ url('delito/delete') }}/${delitoId}`;

            fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                if (!response.ok) throw new Error("No se pudo eliminar el delito");
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    showSuccessToast(data.message);
                    document.getElementById(`delito_${delitoId}`).remove(); // Eliminar del DOM
                } else {
                    showErrorToast(data.message || 'No se pudo eliminar el delito.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showErrorToast(error.message || 'Error en la solicitud de eliminación.');
            });
        }
    }
</script>