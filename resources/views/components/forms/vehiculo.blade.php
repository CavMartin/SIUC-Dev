<!-- Modal para Cargar/Editar Vehículo -->
<div class="modal fade" id="vehiculoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="vehiculoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #484A61;">
                <h3 class="modal-title text-light" id="vehiculoModalLabel">Formulario - Cargar Vehículo</h3>
            </div>
            <div class="modal-body">
                <!-- Formulario de Vehículo -->
                <form id="vehiculoForm" method="POST" enctype="multipart/form-data">
                    <!-- Campo oculto para ID autoincremental (solo para edición) -->
                    <input type="hidden" name="id_vehiculo" id="id_vehiculo">
                    
                    <!-- Campo oculto para ID de datos_actuacion_id -->
                    <input type="hidden" name="datos_actuacion_id" id="datos_actuacion_id">

                    <div class="row">
                        <div class="col-md-6">
                            <label for="calidad" class="form-label fs-5">En calidad de:</label>
                            <select class="form-select" name="calidad" id="calidad">
                                <option selected disabled>--- Seleccionar ---</option>
                                <option value="Personal policial">Personal policial</option>
                                <option value="Propietario">Propietario</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="dominio" class="form-label fs-5">Dominio</label>
                            <input type="text" class="form-control" name="dominio" id="dominio" placeholder="Ejemplo: ABC123">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="tipoVehiculo" class="form-label fs-5">Tipo de Vehículo</label>
                            <select class="form-select" name="tipoVehiculo" id="tipoVehiculo">
                                <option selected disabled>--- Seleccionar ---</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="modelo" class="form-label fs-5">Modelo</label>
                            <select class="form-select" name="modelo" id="modelo">
                                <option selected disabled>--- Seleccionar ---</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="marca" class="form-label fs-5">Marca del Vehículo</label>
                            <input type="text" class="form-control" name="marca" id="marca">
                        </div>
                        <div class="col-md-6">
                            <label for="motor" class="form-label fs-5">Motor N°</label>
                            <input type="text" class="form-control" name="motor" id="motor">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="color" class="form-label fs-5">Color</label>
                            <select class="form-select" name="color" id="color">
                                <option selected disabled>--- Seleccionar ---</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="añoModelo" class="form-label fs-5">Año Modelo</label>
                            <input type="number" class="form-control" name="añoModelo" id="añoModelo" min="1900" max="2099">
                        </div>
                        <div class="col-md-4">
                            <label for="chasis" class="form-label fs-5">Chasis N°</label>
                            <input type="text" class="form-control" name="chasis" id="chasis">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="estado" class="form-label fs-5">Estado</label>
                            <input type="text" class="form-control" name="estado" id="estado">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <label class="form-label fs-5">Vehículo Recuperado:</label>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="recuperado" value="Personal Policial" id="recuperado_policial">
                                <label class="form-check-label" for="recuperado_policial">Recuperado por Personal Policial</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="recuperado" value="Propietario" id="recuperado_propietario">
                                <label class="form-check-label" for="recuperado_propietario">Recuperado por el Propietario</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="allanamiento" id="allanamiento">
                                <label class="form-check-label" for="allanamiento">¿En allanamiento?</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <label class="form-label fs-5">¿Pertenece a Cadena de Producción Primaria?</label>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="produccion" value="SI" id="produccion_si">
                                <label class="form-check-label" for="produccion_si">SI</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="produccion" value="NO" id="produccion_no">
                                <label class="form-check-label" for="produccion_no">NO</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="observaciones" class="form-label fs-5">Observaciones</label>
                            <textarea class="form-control" name="observaciones" id="observaciones" rows="3"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary fs-4" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-base fs-4" id="guardarVehiculoButton">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function guardarDatosVehiculo() {
        const formId = 'vehiculoForm';
        const camposRequeridos = [
            { id: 'calidad', label: 'En calidad de' },
            { id: 'dominio', label: 'Dominio' },
            { id: 'tipoVehiculo', label: 'Tipo de Vehículo' },
            { id: 'modelo', label: 'Modelo' },
            { id: 'marca', label: 'Marca del Vehículo' },
            { id: 'color', label: 'Color' },
            { id: 'añoModelo', label: 'Año Modelo' }
        ];

        if (!validarFormulario(formId, camposRequeridos)) return;

        const form = document.getElementById(formId);
        const formData = new FormData(form);

        // Asegurarse de que el campo `datos_actuacion_id` tenga el valor de `id` de la entidad principal
        const entidadId = document.getElementById('id')?.value;
        if (entidadId) {
            formData.set('datos_actuacion_id', entidadId);
        }

        // Convertir checkbox y radios específicos a valores apropiados
        formData.set('allanamiento', document.getElementById('allanamiento').checked ? '1' : '0');

        fetch("{{ route('vehiculo.save') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) throw new Error("Error en la solicitud al servidor");
            return response.json();
        })
        .then(data => {
            if (data.success) {
                cerrarModalExito('vehiculoModal', data.message);
                limpiarFormulario(formId);
            } else {
                showErrorToast(data.message || 'Hubo un problema al guardar los datos.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showErrorToast(error.message || 'Error al procesar la solicitud.');
        });
    }

    // Asociar la función de guardar al botón 'Guardar'
    document.getElementById('guardarVehiculoButton').addEventListener('click', guardarDatosVehiculo);
</script>