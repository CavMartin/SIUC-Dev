<!-- Modal para Cargar/Editar Elemento -->
<div class="modal fade" id="elementoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="elementoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #484A61;">
                <h3 class="modal-title text-light" id="elementoModalLabel">Formulario - Cargar Elemento</h3>
            </div>
            <div class="modal-body">
                <!-- Formulario de Elemento -->
                <form id="elementoForm" method="POST" enctype="multipart/form-data">
                    <!-- Campo oculto para ID autoincremental (solo para edición) -->
                    <input type="hidden" name="id_elemento" id="id_elemento">
                    
                    <!-- Campo oculto para ID de datos_actuacion_id -->
                    <input type="hidden" name="datos_actuacion_id" id="datos_actuacion_id">

                    <div class="row">
                        <div class="col-md-4">
                            <label for="calidad" class="form-label fs-5">En calidad de:</label>
                            <select class="form-select" name="calidad" id="calidad">
                                <option selected disabled>--- Seleccionar ---</option>
                                <option value="Propietario">Propietario</option>
                                <option value="En investigación">En investigación</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="elemento" class="form-label fs-5">Elemento:</label>
                            <input type="text" class="form-control" name="elemento" id="elemento">
                        </div>

                        <div class="col-md-4">
                            <label for="cantidad" class="form-label fs-5">Cantidad/Unidad:</label>
                            <input type="number" class="form-control" name="cantidad" id="cantidad">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="marca" class="form-label fs-5">Marca:</label>
                            <input type="text" class="form-control" name="marca" id="marca">
                        </div>

                        <div class="col-md-4">
                            <label for="modelo" class="form-label fs-5">Modelo:</label>
                            <input type="text" class="form-control" name="modelo" id="modelo">
                        </div>

                        <div class="col-md-4">
                            <label for="color" class="form-label fs-5">Color:</label>
                            <select class="form-select" name="color" id="color">
                                <option selected disabled>--- Seleccionar ---</option>
                            </select>
                        </div>
                    </div>

                    <h4 class="mt-4">Telefonía Celular</h4>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="empresa" class="form-label fs-5">Empresa:</label>
                            <input type="text" class="form-control" name="empresa" id="empresa">
                        </div>

                        <div class="col-md-4">
                            <label for="codigoArea" class="form-label fs-5">Código de Área:</label>
                            <input type="text" class="form-control" name="codigoArea" id="codigoArea">
                        </div>

                        <div class="col-md-4">
                            <label for="telefono" class="form-label fs-5">Nro de Teléfono:</label>
                            <input type="text" class="form-control" name="telefono" id="telefono">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="form-label fs-5">¿Pertenece a Cadena de Producción Primaria?</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="produccionPrimaria" id="produccionSi" value="Si">
                                <label class="form-check-label" for="produccionSi">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="produccionPrimaria" id="produccionNo" value="No" checked>
                                <label class="form-check-label" for="produccionNo">No</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="descripcion" class="form-label fs-5">Descripción:</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary fs-4" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-base fs-4" id="guardarElementoButton">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function guardarDatosElemento() {
        const formId = 'elementoForm';
        const camposRequeridos = [
            { id: 'calidad', label: 'En calidad de' },
            { id: 'elemento', label: 'Elemento' },
            { id: 'cantidad', label: 'Cantidad/Unidad' },
            { id: 'marca', label: 'Marca' },
            { id: 'modelo', label: 'Modelo' },
            { id: 'color', label: 'Color' }
        ];

        if (!validarFormulario(formId, camposRequeridos)) return;

        const form = document.getElementById(formId);
        const formData = new FormData(form);

        // Asegurarse de que el campo `datos_actuacion_id` tenga el valor de `id` de la entidad principal
        const entidadId = document.getElementById('id')?.value;
        if (entidadId) {
            formData.set('datos_actuacion_id', entidadId);
        }

        fetch("{{ route('elemento.save') }}", {
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
                cerrarModalExito('elementoModal', data.message);
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
    document.getElementById('guardarElementoButton').addEventListener('click', guardarDatosElemento);
</script>
