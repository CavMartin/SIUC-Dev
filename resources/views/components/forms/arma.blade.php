<!-- Modal para Cargar/Editar Arma -->
<div class="modal fade" id="armaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="armaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #484A61;">
                <h3 class="modal-title text-light" id="armaModalLabel">Formulario - Cargar Arma</h3>
            </div>
            <div class="modal-body">
                <!-- Formulario de Arma -->
                <form id="armaForm" method="POST" enctype="multipart/form-data">
                    <!-- Campo oculto para ID autoincremental (solo para edición) -->
                    <input type="hidden" name="id_arma" id="id_arma">
                    
                    <!-- Campo oculto para ID de datos_actuacion_id -->
                    <input type="hidden" name="datos_actuacion_id" id="datos_actuacion_id">

                    <div class="row">
                        <div class="col-md-4">
                            <label for="calidad" class="form-label fs-5">En calidad de:</label>
                            <select class="form-select" name="calidad" id="calidad">
                                <option selected disabled>--- Seleccionar ---</option>
                                <option value="Personal policial">Personal policial</option>
                                <option value="Propietario">Propietario</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="tipoArma" class="form-label fs-5">Tipo de Arma:</label>
                            <select class="form-select" name="tipoArma" id="tipoArma">
                                <option selected disabled>--- Seleccionar ---</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="marca" class="form-label fs-5">Marca:</label>
                            <select class="form-select" name="marca" id="marca">
                                <option selected disabled>--- Seleccionar ---</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="modelo" class="form-label fs-5">Modelo:</label>
                            <input type="text" class="form-control" name="modelo" id="modelo">
                        </div>

                        <div class="col-md-4">
                            <label for="calibre" class="form-label fs-5">Calibre:</label>
                            <input type="text" class="form-control" name="calibre" id="calibre">
                        </div>

                        <div class="col-md-4">
                            <label for="numero" class="form-label fs-5">Número:</label>
                            <input type="text" class="form-control" name="numero" id="numero">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="estado" class="form-label fs-5">Estado:</label>
                            <select class="form-select" name="estado" id="estado">
                                <option selected disabled>--- Seleccionar ---</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="color" class="form-label fs-5">Color:</label>
                            <select class="form-select" name="color" id="color">
                                <option selected disabled>--- Seleccionar ---</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="aptaDisparo" class="form-label fs-5">¿Apta para el disparo?</label>
                            <select class="form-select" name="aptaDisparo" id="aptaDisparo">
                                <option selected disabled>--- Seleccionar ---</option>
                                <option value="Si">Sí</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="remarque" class="form-label fs-5">Remarque:</label>
                            <input type="text" class="form-control" name="remarque" id="remarque">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="observaciones" class="form-label fs-5">Observaciones:</label>
                            <textarea class="form-control" name="observaciones" id="observaciones" rows="3"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary fs-4" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-base fs-4" id="guardarArmaButton">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function guardarDatosArma() {
        const formId = 'armaForm';
        const camposRequeridos = [
            { id: 'calidad', label: 'En calidad de' },
            { id: 'tipoArma', label: 'Tipo de Arma' },
            { id: 'marca', label: 'Marca' },
            { id: 'modelo', label: 'Modelo' },
            { id: 'calibre', label: 'Calibre' },
            { id: 'numero', label: 'Número' },
            { id: 'estado', label: 'Estado' },
            { id: 'color', label: 'Color' },
            { id: 'aptaDisparo', label: '¿Apta para el disparo?' }
        ];

        if (!validarFormulario(formId, camposRequeridos)) return;

        const form = document.getElementById(formId);
        const formData = new FormData(form);

        // Asegurarse de que el campo `datos_actuacion_id` tenga el valor de `id` de la entidad principal
        const entidadId = document.getElementById('id')?.value;
        if (entidadId) {
            formData.set('datos_actuacion_id', entidadId);
        }

        fetch("{{ route('arma.save') }}", {
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
                cerrarModalExito('armaModal', data.message);
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
    document.getElementById('guardarArmaButton').addEventListener('click', guardarDatosArma);
</script>