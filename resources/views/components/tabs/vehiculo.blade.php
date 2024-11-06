<div class="form-row row border mx-2 mb-2 p-3 container-entity" id="vehiculo_{{ $index }}">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-semibold">Vehículo #<span class="vehiculo-index">{{ $index + 1 }}</span></h3>
        <div>
            <!-- Botón para Editar -->
            <button 
                class="btn btn-base btn-sm me-2"
                onclick="abrirModalEdicionVehiculo({{ $vehiculo->id_vehiculo }})">
                Editar
            </button>
            <!-- Botón para Eliminar -->
            <button 
                class="btn btn-base btn-sm"
                style="background-color: crimson"
                onclick="eliminarVehiculo({{ $vehiculo->id_vehiculo }})">
                Eliminar
            </button>
        </div>
    </div>

    <!-- Campo oculto para el ID de vehículo (PK) -->
    <input type="text" name="id_vehiculo" value="{{ $vehiculo->id_vehiculo }}" id="id_vehiculo_{{ $index }}">

    <!-- Campo oculto para el ID de datos_actuacion_id (FK) -->
    <input type="text" name="datos_actuacion_id" value="{{ $vehiculo->datos_actuacion_id }}" id="datos_actuacion_id_{{ $index }}">

    <div class="row">
        <div class="col-md-6">
            <label class="form-label fs-5">En calidad de</label>
            <p class="form-control-plaintext">{{ $vehiculo->calidad ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5">Dominio</label>
            <p class="form-control-plaintext">{{ $vehiculo->dominio ?? 'No disponible' }}</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <label class="form-label fs-5">Tipo de Vehículo</label>
            <p class="form-control-plaintext">{{ $vehiculo->tipoVehiculo ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5">Modelo</label>
            <p class="form-control-plaintext">{{ $vehiculo->modelo ?? 'No disponible' }}</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <label class="form-label fs-5">Marca del Vehículo</label>
            <p class="form-control-plaintext">{{ $vehiculo->marca ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-6">
            <label class="form-label fs-5">Motor N°</label>
            <p class="form-control-plaintext">{{ $vehiculo->motor ?? 'No disponible' }}</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4">
            <label class="form-label fs-5">Color</label>
            <p class="form-control-plaintext">{{ $vehiculo->color ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">Año Modelo</label>
            <p class="form-control-plaintext">{{ $vehiculo->añoModelo ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">Chasis N°</label>
            <p class="form-control-plaintext">{{ $vehiculo->chasis ?? 'No disponible' }}</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <label class="form-label fs-5">Estado</label>
            <p class="form-control-plaintext">{{ $vehiculo->estado ?? 'No disponible' }}</p>
        </div>
    </div>

    <div class="row mt-3">
        <label class="form-label fs-5">Vehículo Recuperado</label>
        <div class="col-md-4">
            <p class="form-control-plaintext">{{ $vehiculo->recuperado == 'Personal Policial' ? 'Recuperado por Personal Policial' : ($vehiculo->recuperado == 'Propietario' ? 'Recuperado por el Propietario' : 'No disponible') }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">¿En allanamiento?</label>
            <p class="form-control-plaintext">{{ $vehiculo->allanamiento ? 'Sí' : 'No' }}</p>
        </div>
    </div>

    <div class="row mt-3">
        <label class="form-label fs-5">¿Pertenece a Cadena de Producción Primaria?</label>
        <div class="col-md-6">
            <p class="form-control-plaintext">{{ $vehiculo->produccion == 'SI' ? 'Sí' : 'No' }}</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <label class="form-label fs-5">Observaciones</label>
            <p class="form-control-plaintext">{{ $vehiculo->observaciones ?? 'No disponible' }}</p>
        </div>
    </div>
</div>

<script>
    // Función para abrir el modal de edición de vehículo
    function abrirModalEdicionVehiculo(vehiculoId) {
        const url = `{{ url('vehiculo/get') }}/${vehiculoId}`;
        
        fetch(url)
            .then(response => {
                if (!response.ok) throw new Error("No se pudo obtener los datos del vehículo");
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    document.getElementById('id_vehiculo').value = data.vehiculo.id_vehiculo;
                    document.getElementById('datos_actuacion_id').value = data.vehiculo.datos_actuacion_id;
                    document.getElementById('calidad').value = data.vehiculo.calidad;
                    document.getElementById('dominio').value = data.vehiculo.dominio;
                    document.getElementById('tipoVehiculo').value = data.vehiculo.tipoVehiculo;
                    document.getElementById('modelo').value = data.vehiculo.modelo;
                    document.getElementById('marca').value = data.vehiculo.marca;
                    document.getElementById('motor').value = data.vehiculo.motor;
                    document.getElementById('color').value = data.vehiculo.color;
                    document.getElementById('añoModelo').value = data.vehiculo.añoModelo;
                    document.getElementById('chasis').value = data.vehiculo.chasis;
                    document.getElementById('estado').value = data.vehiculo.estado;
                    document.getElementById('recuperado_policial').checked = data.vehiculo.recuperado === 'Personal Policial';
                    document.getElementById('recuperado_propietario').checked = data.vehiculo.recuperado === 'Propietario';
                    document.getElementById('allanamiento').checked = data.vehiculo.allanamiento === '1';
                    document.getElementById('produccion_si').checked = data.vehiculo.produccion === 'SI';
                    document.getElementById('produccion_no').checked = data.vehiculo.produccion === 'NO';
                    document.getElementById('observaciones').value = data.vehiculo.observaciones;

                    const vehiculoModal = new bootstrap.Modal(document.getElementById('vehiculoModal'));
                    vehiculoModal.show();
                } else {
                    showErrorToast(data.message || 'No se pudieron cargar los datos del vehículo.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showErrorToast(error.message || 'Error al cargar los datos del vehículo.');
            });
    }

    // Función para eliminar un vehículo
    function eliminarVehiculo(vehiculoId) {
        if (confirm('¿Está seguro de que desea eliminar este vehículo?')) {
            const url = `{{ url('vehiculo/delete') }}/${vehiculoId}`;
            
            fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                if (!response.ok) throw new Error("No se pudo eliminar el vehículo");
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    showSuccessToast(data.message);
                    document.getElementById(`vehiculo_${vehiculoId}`).remove();
                } else {
                    showErrorToast(data.message || 'No se pudo eliminar el vehículo.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showErrorToast(error.message || 'Error en la solicitud de eliminación.');
            });
        }
    }
</script>