<!-- Modal para Cargar/Editar Persona -->
<div class="modal fade" id="personaModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="personaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #484A61;">
                <h3 class="modal-title text-light" id="personaModalLabel">Formulario - Cargar Persona</h3>
            </div>
            <div class="modal-body">
                <!-- Formulario de Persona -->
                <form id="personaForm" method="POST" enctype="multipart/form-data">
                    <!-- Campo oculto para ID autoincremental (solo para edición) -->
                    <input type="hidden" name="id_persona" id="id_persona">
                    
                    <!-- Campo oculto para ID de datos_actuacion_id -->
                    <input type="hidden" name="datos_actuacion_id" id="datos_actuacion_id">

                    <div class="row">
                        <div class="col-md-6">
                            <label for="calidad" class="form-label fs-5">En calidad de:</label>
                            <select class="form-select" name="calidad" id="calidad" required>
                                <option selected disabled>--- Seleccionar ---</option>
                                <option value="Denunciado">Denunciado</option>
                                <option value="Denunciante">Denunciante</option>
                            </select>
                        </div>
                        <div class="col-md-2 d-flex align-items-center">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="nn" id="nn">
                                <label class="form-check-label" for="nn">NN</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="tipoDocumento" class="form-label fs-5">Tipo de Documento</label>
                            <select class="form-select" name="tipoDocumento" id="tipoDocumento" required>
                                <option selected disabled>--- Tipo Documento ---</option>
                                <option value="DNI">DNI</option>
                                <option value="LC">LC</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="numero" class="form-label fs-5">Número</label>
                            <input type="text" class="form-control" name="numero" id="numero" placeholder="Ingrese el número" required>
                        </div>
                        <div class="col-md-2">
                            <label for="genero" class="form-label fs-5">Género</label>
                            <select class="form-select" name="genero" id="genero" required>
                                <option selected disabled>--- Género ---</option>
                                <option value="F">F</option>
                                <option value="M">M</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="nombres" class="form-label fs-5">Nombres</label>
                            <input type="text" class="form-control" name="nombres" id="nombres">
                        </div>
                        <div class="col-md-3">
                            <label for="apellido" class="form-label fs-5">Apellido</label>
                            <input type="text" class="form-control" name="apellido" id="apellido">
                        </div>
                        <div class="col-md-3">
                            <label for="apellidoMaterno" class="form-label fs-5">Apellido Materno</label>
                            <input type="text" class="form-control" name="apellidoMaterno" id="apellidoMaterno">
                        </div>
                        <div class="col-md-3">
                            <label for="alias" class="form-label fs-5">Alias</label>
                            <input type="text" class="form-control" name="alias" id="alias">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label for="fechaNacimiento" class="form-label fs-5">Fecha Nacimiento</label>
                            <input type="date" class="form-control" name="fechaNacimiento" id="fechaNacimiento">
                        </div>
                        <div class="col-md-2">
                            <label for="edad" class="form-label fs-5">Edad</label>
                            <input type="number" class="form-control" name="edad" id="edad" min="0">
                        </div>
                        <div class="col-md-4">
                            <label for="estadoCivil" class="form-label fs-5">Estado Civil</label>
                            <select class="form-select" name="estadoCivil" id="estadoCivil">
                                <option selected disabled>--- Estado Civil ---</option>
                                <option value="SOLTERO">SOLTERO</option>
                                <option value="CASADO">CASADO</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="ocupacion" class="form-label fs-5">Ocupación</label>
                            <input type="text" class="form-control" name="ocupacion" id="ocupacion">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="pais" class="form-label fs-5">País</label>
                            <input type="text" class="form-control" name="pais" id="pais" value="ARGENTINA">
                        </div>
                        <div class="col-md-4">
                            <label for="provincia" class="form-label fs-5">Provincia</label>
                            <input type="text" class="form-control" name="provincia" id="provincia" value="SANTA FE">
                        </div>
                        <div class="col-md-4">
                            <label for="departamento" class="form-label fs-5">Departamento</label>
                            <input type="text" class="form-control" name="departamento" id="departamento" value="ROSARIO">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="estadoSalud" class="form-label fs-5">Estado de Salud</label>
                            <select class="form-select" name="estadoSalud" id="estadoSalud">
                                <option selected disabled>--- Seleccionar ---</option>
                                <option value="Opcion 1">Opcion 1</option>
                                <option value="Opcion 2">Opcion 2</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="lesionadoCon" class="form-label fs-5">Lesionado con</label>
                            <select class="form-select" name="lesionadoCon" id="lesionadoCon">
                                <option selected disabled>--- Seleccionar ---</option>
                                <option value="Opcion 1">Opcion 1</option>
                                <option value="Opcion 2">Opcion 2</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="lesionadoOcasión" class="form-label fs-5">Lesionado en ocasión de</label>
                            <select class="form-select" name="lesionadoOcasión" id="lesionadoOcasión">
                                <option selected disabled>--- Seleccionar ---</option>
                                <option value="Opcion 1">Opcion 1</option>
                                <option value="Opcion 2">Opcion 2</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="caracteristicas" class="form-label fs-5">Características Fisionómicas</label>
                            <textarea class="form-control" name="caracteristicas" id="caracteristicas" rows="4"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary fs-4" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-base fs-4" id="guardarPersonaButton">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function guardarDatosPersona() {
        const formId = 'personaForm';
        const camposRequeridos = [
            { id: 'calidad', label: 'En calidad de' },
            { id: 'tipoDocumento', label: 'Tipo de Documento' },
            { id: 'numero', label: 'Número' },
            { id: 'genero', label: 'Género' }
        ];

        if (!validarFormulario(formId, camposRequeridos)) return;

        const form = document.getElementById(formId);
        const formData = new FormData(form);

        // Asegurarse de que el campo `datos_actuacion_id` tenga el valor de `id` de la entidad principal
        const entidadId = document.getElementById('id')?.value;
        if (entidadId) {
            formData.set('datos_actuacion_id', entidadId);
        }

        // Convertir checkbox 'nn' a 0 o 1 antes de enviar
        formData.set('nn', document.getElementById('nn').checked ? '1' : '0');

        fetch("{{ route('persona.save') }}", {
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
                cerrarModalExito('personaModal', data.message);
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
    document.getElementById('guardarPersonaButton').addEventListener('click', guardarDatosPersona);
</script>
