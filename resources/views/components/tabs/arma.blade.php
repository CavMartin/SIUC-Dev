<div class="form-row row border mx-2 mb-2 p-3 container-entity" id="arma_{{ $index }}">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-semibold">Arma #<span class="arma-index">{{ $index + 1 }}</span></h3>
        <div>
            <!-- Botón para Editar -->
            <button 
                class="btn btn-base btn-sm me-2"
                onclick="abrirModalEdicionArma({{ $arma->id_arma }})">
                Editar
            </button>
            <!-- Botón para Eliminar -->
            <button 
                class="btn btn-base btn-sm"
                style="background-color: crimson"
                onclick="eliminarArma({{ $arma->id_arma }})">
                Eliminar
            </button>
        </div>
    </div>

    <!-- Campo oculto para el ID de arma (PK) -->
    <input type="text" name="id_arma" value="{{ $arma->id_arma }}" id="id_arma_{{ $index }}">

    <!-- Campo oculto para el ID de datos_actuacion_id (FK) -->
    <input type="text" name="datos_actuacion_id" value="{{ $arma->datos_actuacion_id }}" id="datos_actuacion_id_{{ $index }}">

    <div class="row">
        <div class="col-md-4">
            <label class="form-label fs-5">En calidad de</label>
            <p class="form-control-plaintext">{{ $arma->calidad ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">Tipo de Arma</label>
            <p class="form-control-plaintext">{{ $arma->tipoArma ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">Marca</label>
            <p class="form-control-plaintext">{{ $arma->marca ?? 'No disponible' }}</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4">
            <label class="form-label fs-5">Modelo</label>
            <p class="form-control-plaintext">{{ $arma->modelo ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">Calibre</label>
            <p class="form-control-plaintext">{{ $arma->calibre ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">Número</label>
            <p class="form-control-plaintext">{{ $arma->numero ?? 'No disponible' }}</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4">
            <label class="form-label fs-5">Estado</label>
            <p class="form-control-plaintext">{{ $arma->estado ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">Color</label>
            <p class="form-control-plaintext">{{ $arma->color ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">¿Apta para el disparo?</label>
            <p class="form-control-plaintext">{{ $arma->aptaDisparo == 'Si' ? 'Sí' : 'No' }}</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <label class="form-label fs-5">Remarque</label>
            <p class="form-control-plaintext">{{ $arma->remarque ?? 'No disponible' }}</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <label class="form-label fs-5">Observaciones</label>
            <p class="form-control-plaintext">{{ $arma->observaciones ?? 'No disponible' }}</p>
        </div>
    </div>
</div>

<script>
    // Función para abrir el modal de edición de arma
    function abrirModalEdicionArma(armaId) {
        const url = `{{ url('arma/get') }}/${armaId}`;
        
        fetch(url)
            .then(response => {
                if (!response.ok) throw new Error("No se pudo obtener los datos del arma");
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    document.getElementById('id_arma').value = data.arma.id_arma;
                    document.getElementById('datos_actuacion_id').value = data.arma.datos_actuacion_id;
                    document.getElementById('calidad').value = data.arma.calidad;
                    document.getElementById('tipoArma').value = data.arma.tipoArma;
                    document.getElementById('marca').value = data.arma.marca;
                    document.getElementById('modelo').value = data.arma.modelo;
                    document.getElementById('calibre').value = data.arma.calibre;
                    document.getElementById('numero').value = data.arma.numero;
                    document.getElementById('estado').value = data.arma.estado;
                    document.getElementById('color').value = data.arma.color;
                    document.getElementById('aptaDisparo').value = data.arma.aptaDisparo;
                    document.getElementById('remarque').value = data.arma.remarque;
                    document.getElementById('observaciones').value = data.arma.observaciones;

                    const armaModal = new bootstrap.Modal(document.getElementById('armaModal'));
                    armaModal.show();
                } else {
                    showErrorToast(data.message || 'No se pudieron cargar los datos del arma.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showErrorToast(error.message || 'Error al cargar los datos del arma.');
            });
    }

    // Función para eliminar un arma
    function eliminarArma(armaId) {
        if (confirm('¿Está seguro de que desea eliminar esta arma?')) {
            const url = `{{ url('arma/delete') }}/${armaId}`;
            
            fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                if (!response.ok) throw new Error("No se pudo eliminar el arma");
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    showSuccessToast(data.message);
                    document.getElementById(`arma_${armaId}`).remove();
                } else {
                    showErrorToast(data.message || 'No se pudo eliminar el arma.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showErrorToast(error.message || 'Error en la solicitud de eliminación.');
            });
        }
    }
</script>