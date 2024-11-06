<div class="form-row row border mx-2 mb-2 p-3 container-entity" id="elemento_{{ $index }}">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-semibold">Elemento #<span class="elemento-index">{{ $index + 1 }}</span></h3>
        <div>
            <!-- Botón para Editar -->
            <button 
                class="btn btn-base btn-sm me-2"
                onclick="abrirModalEdicionElemento({{ $elemento->id_elemento }})">
                Editar
            </button>
            <!-- Botón para Eliminar -->
            <button 
                class="btn btn-base btn-sm"
                style="background-color: crimson"
                onclick="eliminarElemento({{ $elemento->id_elemento }})">
                Eliminar
            </button>
        </div>
    </div>

    <!-- Campo oculto para el ID de elemento (PK) -->
    <input type="text" name="id_elemento" value="{{ $elemento->id_elemento }}" id="id_elemento_{{ $index }}">

    <!-- Campo oculto para el ID de datos_actuacion_id (FK) -->
    <input type="text" name="datos_actuacion_id" value="{{ $elemento->datos_actuacion_id }}" id="datos_actuacion_id_{{ $index }}">

    <div class="row">
        <div class="col-md-4">
            <label class="form-label fs-5">En calidad de</label>
            <p class="form-control-plaintext">{{ $elemento->calidad ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">Elemento</label>
            <p class="form-control-plaintext">{{ $elemento->elemento ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">Cantidad/Unidad</label>
            <p class="form-control-plaintext">{{ $elemento->cantidad ?? 'No disponible' }}</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4">
            <label class="form-label fs-5">Marca</label>
            <p class="form-control-plaintext">{{ $elemento->marca ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">Modelo</label>
            <p class="form-control-plaintext">{{ $elemento->modelo ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">Color</label>
            <p class="form-control-plaintext">{{ $elemento->color ?? 'No disponible' }}</p>
        </div>
    </div>

    <h4 class="mt-4">Telefonía Celular</h4>
    <div class="row mt-3">
        <div class="col-md-4">
            <label class="form-label fs-5">Empresa</label>
            <p class="form-control-plaintext">{{ $elemento->empresa ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">Código de Área</label>
            <p class="form-control-plaintext">{{ $elemento->codigoArea ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">Nro de Teléfono</label>
            <p class="form-control-plaintext">{{ $elemento->telefono ?? 'No disponible' }}</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <label class="form-label fs-5">¿Pertenece a Cadena de Producción Primaria?</label>
            <p class="form-control-plaintext">{{ $elemento->produccionPrimaria == 'Si' ? 'Sí' : 'No' }}</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <label class="form-label fs-5">Descripción</label>
            <p class="form-control-plaintext">{{ $elemento->descripcion ?? 'No disponible' }}</p>
        </div>
    </div>
</div>

<script>
    // Función para abrir el modal de edición de elemento
    function abrirModalEdicionElemento(elementoId) {
        const url = `{{ url('elemento/get') }}/${elementoId}`;
        
        fetch(url)
            .then(response => {
                if (!response.ok) throw new Error("No se pudo obtener los datos del elemento");
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    document.getElementById('id_elemento').value = data.elemento.id_elemento;
                    document.getElementById('datos_actuacion_id').value = data.elemento.datos_actuacion_id;
                    document.getElementById('calidad').value = data.elemento.calidad;
                    document.getElementById('elemento').value = data.elemento.elemento;
                    document.getElementById('cantidad').value = data.elemento.cantidad;
                    document.getElementById('marca').value = data.elemento.marca;
                    document.getElementById('modelo').value = data.elemento.modelo;
                    document.getElementById('color').value = data.elemento.color;
                    document.getElementById('empresa').value = data.elemento.empresa;
                    document.getElementById('codigoArea').value = data.elemento.codigoArea;
                    document.getElementById('telefono').value = data.elemento.telefono;
                    document.getElementById('produccionSi').checked = data.elemento.produccionPrimaria === 'Si';
                    document.getElementById('produccionNo').checked = data.elemento.produccionPrimaria === 'No';
                    document.getElementById('descripcion').value = data.elemento.descripcion;

                    const elementoModal = new bootstrap.Modal(document.getElementById('elementoModal'));
                    elementoModal.show();
                } else {
                    showErrorToast(data.message || 'No se pudieron cargar los datos del elemento.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showErrorToast(error.message || 'Error al cargar los datos del elemento.');
            });
    }

    // Función para eliminar un elemento
    function eliminarElemento(elementoId) {
        if (confirm('¿Está seguro de que desea eliminar este elemento?')) {
            const url = `{{ url('elemento/delete') }}/${elementoId}`;
            
            fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                if (!response.ok) throw new Error("No se pudo eliminar el elemento");
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    showSuccessToast(data.message);
                    document.getElementById(`elemento_${elementoId}`).remove();
                } else {
                    showErrorToast(data.message || 'No se pudo eliminar el elemento.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showErrorToast(error.message || 'Error en la solicitud de eliminación.');
            });
        }
    }
</script>