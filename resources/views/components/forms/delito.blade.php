<!-- Modal para Cargar/Editar Delito -->
<div class="modal fade" id="delitoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="delitoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #484A61;">
                <h3 class="modal-title text-light" id="delitoModalLabel">Formulario - Cargar Delito</h3>
            </div>
            <div class="modal-body">
                <!-- Formulario de Delito -->
                <form id="delitoForm" method="POST" enctype="multipart/form-data">
                    <!-- Campo oculto para ID autoincremental (solo para edición) -->
                    <input type="hidden" name="id_delito" id="id_delito">
                    
                    <!-- Campo oculto para ID de datos_actuacion_id -->
                    <input type="hidden" name="datos_actuacion_id" id="datos_actuacion_id">

                    <div class="row">
                        <div class="col-md-6">
                            <label for="fechaHecho" class="form-label fs-5">Fecha del Hecho</label>
                            <input type="date" class="form-control" name="fechaHecho" id="fechaHecho" required>
                            <div class="invalid-feedback">Este campo es requerido.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="horaHecho" class="form-label fs-5">Hora del Hecho</label>
                            <input type="time" class="form-control" name="horaHecho" id="horaHecho" required>
                            <div class="invalid-feedback">Este campo es requerido.</div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="delitoGeneral" class="form-label fs-5">Delito General</label>
                            <select class="form-select" name="delitoGeneral" id="delitoGeneral" required>
                                <option selected disabled>--- Seleccionar ---</option>
                                <option value="delito1">Delito 1</option>
                                <option value="delito2">Delito 2</option>
                            </select>
                            <div class="invalid-feedback">Este campo es requerido.</div>
                        </div>
                        <div class="col-md-3 d-flex align-items-center">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="checkbox" name="agravado" id="agravado">
                                <label class="form-check-label" for="agravado">Agravado o Calificado</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="tentativa" id="tentativa">
                                <label class="form-check-label" for="tentativa">Tentativa</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="tematica" class="form-label fs-5">Temática</label>
                            <select class="form-select" name="tematica" id="tematica" required>
                                <option selected disabled>--- Seleccionar ---</option>
                                <option value="tematica1">Temática 1</option>
                                <option value="tematica2">Temática 2</option>
                            </select>
                            <div class="invalid-feedback">Este campo es requerido.</div>
                        </div>
                        <div class="col-md-4">
                            <label for="tipologia" class="form-label fs-5">Tipología</label>
                            <select class="form-select" name="tipologia" id="tipologia" required>
                                <option selected disabled>--- Seleccionar ---</option>
                                <option value="tipologia1">Tipología 1</option>
                                <option value="tipologia2">Tipología 2</option>
                            </select>
                            <div class="invalid-feedback">Este campo es requerido.</div>
                        </div>
                        <div class="col-md-4">
                            <label for="modalidad" class="form-label fs-5">Modalidad</label>
                            <select class="form-select" name="modalidad" id="modalidad" required>
                                <option selected disabled>--- Seleccionar ---</option>
                                <option value="modalidad1">Modalidad 1</option>
                                <option value="modalidad2">Modalidad 2</option>
                            </select>
                            <div class="invalid-feedback">Este campo es requerido.</div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="entidadAtacada" class="form-label fs-5">Entidad Atacada (Objetivo)</label>
                            <select class="form-select" name="entidadAtacada" id="entidadAtacada" required>
                                <option selected disabled>--- Seleccionar ---</option>
                                <option value="entidad1">Entidad 1</option>
                                <option value="entidad2">Entidad 2</option>
                            </select>
                            <div class="invalid-feedback">Este campo es requerido.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="nombreEntidad" class="form-label fs-5">Nombre de la Entidad</label>
                            <input type="text" class="form-control" name="nombreEntidad" id="nombreEntidad">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="tipoLugar" class="form-label fs-5">Tipo de Lugar</label>
                            <select class="form-select" name="tipoLugar" id="tipoLugar" required>
                                <option selected disabled>--- Seleccionar ---</option>
                                <option value="lugar1">Lugar 1</option>
                                <option value="lugar2">Lugar 2</option>
                            </select>
                            <div class="invalid-feedback">Este campo es requerido.</div>
                        </div>
                        <div class="col-md-4">
                            <label for="departamento" class="form-label fs-5">Departamento</label>
                            <input type="text" class="form-control" name="departamento" id="departamento" required>
                            <div class="invalid-feedback">Este campo es requerido.</div>
                        </div>
                        <div class="col-md-4">
                            <label for="localidad" class="form-label fs-5">Localidad</label>
                            <input type="text" class="form-control" name="localidad" id="localidad" required>
                            <div class="invalid-feedback">Este campo es requerido.</div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="barrio" class="form-label fs-5">Barrio</label>
                            <input type="text" class="form-control" name="barrio" id="barrio">
                        </div>
                        <div class="col-md-4">
                            <label for="calle" class="form-label fs-5">Calle</label>
                            <input type="text" class="form-control" name="calle" id="calle">
                        </div>
                        <div class="col-md-4">
                            <label for="interseccion" class="form-label fs-5">Intersección</label>
                            <input type="text" class="form-control" name="interseccion" id="interseccion">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary fs-4" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-base fs-4" id="guardarDelitoButton">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function guardarDatosDelito() {
        const formId = 'delitoForm';
        const camposRequeridos = [
            { id: 'fechaHecho', label: 'Fecha del Hecho' },
            { id: 'horaHecho', label: 'Hora del Hecho' },
            { id: 'delitoGeneral', label: 'Delito General' },
            { id: 'tematica', label: 'Temática' },
            { id: 'tipologia', label: 'Tipología' },
            { id: 'modalidad', label: 'Modalidad' },
            { id: 'entidadAtacada', label: 'Entidad Atacada' },
            { id: 'tipoLugar', label: 'Tipo de Lugar' },
            { id: 'departamento', label: 'Departamento' },
            { id: 'localidad', label: 'Localidad' }
        ];

        if (!validarFormulario(formId, camposRequeridos)) return;

        const form = document.getElementById(formId);
        const formData = new FormData(form);

        // Asegurarse de que el campo `datos_actuacion_id` tenga el valor de `id`
        const entidadId = document.getElementById('id')?.value;
        if (entidadId) {
            formData.set('datos_actuacion_id', entidadId);
        }

        // Convertir checkboxes a valores binarios antes de enviar
        formData.set('agravado', document.getElementById('agravado').checked ? '1' : '0');
        formData.set('tentativa', document.getElementById('tentativa').checked ? '1' : '0');

        fetch("{{ route('delito.save') }}", {
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
                cerrarModalExito('delitoModal', data.message);
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
    document.getElementById('guardarDelitoButton').addEventListener('click', guardarDatosDelito);
</script>
