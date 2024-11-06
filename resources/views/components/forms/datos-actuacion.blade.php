<form id="datosActuacionForm" method="POST" enctype="multipart/form-data">

    <!-- El campo ID se incluirá o actualizará dinámicamente -->
    <input type="text" name="id" id="id" value="{{ $datosActuacion->id ?? '' }}">

    <div class="form-row row">
        <div class="form-group col-md-6 col-sm-12 mb-5 mt-2">
            <label for="tipoActuacion" class="form-label fs-5">Tipo de actuación</label>
            <select class="form-select" name="tipoActuacion" id="tipoActuacion" required>
                <option selected="true" hidden disabled="disabled">Cargando opciones...</option>
                <!-- Opciones se cargarán con JavaScript -->
            </select>
        </div>

        <div class="form-group col-md-6 col-sm-12 mb-5 mt-2">
            <label for="numeroActuacion" class="form-label fs-5">Número de actuación</label>
            <input type="text" class="form-control" name="numeroActuacion" id="numeroActuacion"
                value="{{ old('numeroActuacion', $datosActuacion->numeroActuacion ?? '') }}"
                placeholder="Ejemplo: 157489-2024" required>
            <div class="invalid-feedback">Este campo es requerido.</div>
        </div>
    </div>

    <div class="form-row row">
        <div class="form-group col-md-3 col-sm-12 mb-5 mt-2">
            <label for="fechaActuacion" class="form-label fs-5">Fecha de actuación</label>
            <input type="date" class="form-control" name="fechaActuacion" id="fechaActuacion"
                value="{{ old('fechaActuacion', $fechaActual) }}" required>
            <div class="invalid-feedback">Este campo es requerido.</div>
        </div>

        <div class="form-group col-md-3 col-sm-12 mb-5 mt-2">
            <label for="horaActuacion" class="form-label fs-5">Hora de actuación</label>
            <input type="time" class="form-control" name="horaActuacion" id="horaActuacion"
                value="{{ old('horaActuacion', $horaActual) }}" required>
            <div class="invalid-feedback">Este campo es requerido.</div>
        </div>

        <div class="form-group col-md-3 col-sm-12 mb-5 mt-2">
            <label for="nSumario" class="form-label fs-5">N° de sumario</label>
            <input type="text" class="form-control" name="nSumario" id="nSumario"
                value="{{ old('nSumario', $datosActuacion->nSumario ?? '') }}" placeholder="Ejemplo: 857469-2024"
                required>
            <div class="invalid-feedback">Este campo es requerido.</div>
        </div>

        <div class="form-group col-md-3 col-sm-12 mb-5 mt-2">
            <label for="archivoPDF" class="form-label fs-5">PDF adjunto</label>
            <input type="file" class="form-control" id="archivoPDF">
        </div>
    </div>

    <div class="form-row row">
        <div class="form-group col-md-4 col-sm-12 mb-5 mt-2">
            <label for="unidadRegional" class="form-label fs-5">Unidad regional</label>
            <select class="form-select" name="unidadRegional" id="unidadRegional" required>
                <option selected="true" hidden disabled="disabled">Cargando opciones...</option>
                <!-- Opciones se cargarán con JavaScript -->
            </select>
            <div class="invalid-feedback">Este campo es requerido.</div>
        </div>

        <div class="form-group col-md-4 col-sm-12 mb-5 mt-2">
            <label for="dependenciaPolicial" class="form-label fs-5">Dependencia policial</label>
            <select class="form-select" name="dependenciaPolicial" id="dependenciaPolicial" required>
                <option selected="true" hidden disabled="disabled">Cargando opciones...</option>
                <!-- Opciones se cargarán con JavaScript -->
            </select>
            <div class="invalid-feedback">Este campo es requerido.</div>
        </div>

        <div class="form-group col-md-4 col-sm-12 mb-5 mt-2">
            <label for="fuerzaInterviniente" class="form-label fs-5">Fuerza de seguridad interviniente</label>
            <select class="form-select" name="fuerzaInterviniente" id="fuerzaInterviniente" required>
                <option selected="true" hidden disabled="disabled">Cargando opciones...</option>
                <!-- Opciones se cargarán con JavaScript -->
            </select>
            <div class="invalid-feedback">Este campo es requerido.</div>
        </div>
    </div>

    <div class="form-row row">
        <div class="form-group col-md-4 col-sm-12 mb-5 mt-2">
            <label for="fiscaliaRegional" class="form-label fs-5">Fiscalía regional</label>
            <select class="form-select" name="fiscaliaRegional" id="fiscaliaRegional" required>
                <option selected="true" hidden disabled="disabled">Cargando opciones...</option>
                <!-- Opciones se cargarán con JavaScript -->
            </select>
            <div class="invalid-feedback">Este campo es requerido.</div>
        </div>

        <div class="form-group col-md-4 col-sm-12 mb-5 mt-2">
            <label for="unidadFiscal" class="form-label fs-5">Unidad fiscal</label>
            <select class="form-select" name="unidadFiscal" id="unidadFiscal" required>
                <option selected="true" hidden disabled="disabled">Cargando opciones...</option>
                <!-- Opciones se cargarán con JavaScript -->
            </select>
            <div class="invalid-feedback">Este campo es requerido.</div>
        </div>
    </div>

    <div class="form-group col-md-12 col-sm-12 mb-5 mt-2">
        <label for="relatoDelHecho" class="form-label fs-5">Relato del hecho</label>
        <textarea class="form-control" name="relatoDelHecho" id="relatoDelHecho" rows="10" required>{{ old('relatoDelHecho', $datosActuacion->relatoDelHecho ?? '') }}</textarea>
        <div class="invalid-feedback">Este campo es requerido.</div>
    </div>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-base fs-5 me-md-2" onclick="guardarCambiosActuacion()">Guardar
            Datos</button><!-- Botón para enviar datos al backend-->
    </div>
</form>

<script>
    function validarFormulario() {
        let esValido = true;
        const form = document.getElementById('datosActuacionForm');
    
        // Limpiar estilos de campos previos
        form.querySelectorAll('.is-invalid').forEach(field => field.classList.remove('is-invalid'));
    
        // Campos requeridos y sus etiquetas para mensajes específicos
        const camposRequeridos = [
            { id: 'tipoActuacion', label: 'Tipo de actuación' },
            { id: 'numeroActuacion', label: 'Número de actuación' },
            { id: 'fechaActuacion', label: 'Fecha de actuación' },
            { id: 'horaActuacion', label: 'Hora de actuación' },
            { id: 'nSumario', label: 'N° de sumario' },
            { id: 'unidadRegional', label: 'Unidad regional' },
            { id: 'dependenciaPolicial', label: 'Dependencia policial' },
            { id: 'fuerzaInterviniente', label: 'Fuerza de seguridad interviniente' },
            { id: 'fiscaliaRegional', label: 'Fiscalía regional' },
            { id: 'unidadFiscal', label: 'Unidad fiscal' },
            { id: 'relatoDelHecho', label: 'Relato del hecho' }
        ];
    
        // Validar cada campo y mostrar toast específico si está vacío
        camposRequeridos.forEach(field => {
            const campo = document.getElementById(field.id);
            if (campo) {
                if (campo.tagName === 'SELECT' && campo.selectedIndex <= 0) {
                    // Validación específica para campos <select>
                    campo.classList.add('is-invalid');
                    esValido = false;
                    showErrorToast(`Por favor seleccione una opción para el campo: ${field.label}`);
                } else if (campo.tagName !== 'SELECT' && !campo.value.trim()) {
                    // Validación para campos de texto
                    campo.classList.add('is-invalid');
                    esValido = false;
                    showErrorToast(`Por favor complete el campo: ${field.label}`);
                }
            }
        });
    
        return esValido;
    }
    
    function guardarCambiosActuacion() {
        if (!validarFormulario()) {
            return; // No enviar si la validación falla
        }
    
        const formActionUrl = "{{ route('datos-actuacion.save') }}";
        const form = new FormData(document.getElementById('datosActuacionForm'));
    
        // Incluye el ID en el formulario si existe
        const idField = document.getElementById('id');
        if (idField) form.append('id', idField.value);
    
        fetch(formActionUrl, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: form
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("Error en la solicitud al servidor");
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Crear formulario oculto para reenviar el ID al backend por POST
                const redirectForm = document.createElement('form');
                redirectForm.method = 'POST';
                redirectForm.action = "{{ route('carga') }}";
            
                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                redirectForm.appendChild(csrfInput);
            
                const idInput = document.createElement('input');
                idInput.type = 'hidden';
                idInput.name = 'id';
                idInput.value = data.id;
                redirectForm.appendChild(idInput);
            
                document.body.appendChild(redirectForm);
                redirectForm.submit();
            } else {
                showErrorToast(data.error || 'Hubo un problema al guardar los datos.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showErrorToast(error.message || 'Error al procesar la solicitud.');
        });
    }
</script>







<script>
    const valoresRegistro = {
        tipoActuacion: "{{ $datosActuacion->tipoActuacion ?? '' }}",
        unidadRegional: "{{ $datosActuacion->unidadRegional ?? '' }}",
        dependenciaPolicial: "{{ $datosActuacion->dependenciaPolicial ?? '' }}",
        fuerzaInterviniente: "{{ $datosActuacion->fuerzaInterviniente ?? '' }}",
        fiscaliaRegional: "{{ $datosActuacion->fiscaliaRegional ?? '' }}",
        unidadFiscal: "{{ $datosActuacion->unidadFiscal ?? '' }}"
    };
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tipoActuacionSelect = document.getElementById('tipoActuacion');
        const unidadRegionalSelect = document.getElementById('unidadRegional');
        const dependenciaPolicialSelect = document.getElementById('dependenciaPolicial');
        const fuerzaIntervinienteSelect = document.getElementById('fuerzaInterviniente');
        const fiscaliaSelect = document.getElementById('fiscaliaRegional');
        const unidadFiscalSelect = document.getElementById('unidadFiscal');

        // Cargar el JSON de tipo de actuación
        fetch('/json/tipoActuacion.json')
            .then(response => response.json())
            .then(data => {
                tipoActuacionSelect.innerHTML =
                    '<option selected hidden disabled>Seleccione un tipo de actuación</option>';
                data["Tipo actuación"].forEach(actuacion => {
                    const option = document.createElement('option');
                    option.value = actuacion;
                    option.textContent = actuacion;
                    if (actuacion === valoresRegistro.tipoActuacion) option.selected = true;
                    tipoActuacionSelect.appendChild(option);
                });
            });

        // Cargar el JSON de fiscalías y llenar los selects correspondientes
        fetch('/json/fiscaliasRegionales.json')
            .then(response => response.json())
            .then(data => {
                fiscaliaSelect.innerHTML =
                    '<option selected hidden disabled>Seleccione una fiscalía</option>';
                Object.keys(data).forEach(fiscalia => {
                    const option = document.createElement('option');
                    option.value = fiscalia;
                    option.textContent = fiscalia;
                    if (fiscalia === valoresRegistro.fiscaliaRegional) option.selected = true;
                    fiscaliaSelect.appendChild(option);
                });

                fiscaliaSelect.addEventListener('change', function() {
                    cargarUnidadesFiscales(data);
                });

                // Cargar unidades fiscales si ya hay un valor en fiscaliaRegional
                if (valoresRegistro.fiscaliaRegional) cargarUnidadesFiscales(data);
            });

        function cargarUnidadesFiscales(data) {
            const unidades = data[fiscaliaSelect.value] || [];
            unidadFiscalSelect.innerHTML =
                '<option selected hidden disabled>Seleccione una unidad fiscal</option>';
            unidades.forEach(unidad => {
                const option = document.createElement('option');
                option.value = unidad;
                option.textContent = unidad;
                if (unidad === valoresRegistro.unidadFiscal) option.selected = true;
                unidadFiscalSelect.appendChild(option);
            });
        }

        // Cargar el JSON de unidades regionales
        fetch('/json/unidadesRegionales.json')
            .then(response => response.json())
            .then(data => {
                unidadRegionalSelect.innerHTML =
                    '<option selected hidden disabled>Seleccione una unidad regional</option>';
                Object.keys(data).forEach(unidad => {
                    const option = document.createElement('option');
                    option.value = unidad;
                    option.textContent = unidad;
                    if (unidad === valoresRegistro.unidadRegional) option.selected = true;
                    unidadRegionalSelect.appendChild(option);
                });

                unidadRegionalSelect.addEventListener('change', function() {
                    cargarComisarias(data);
                });

                // Cargar comisarías si ya hay un valor en unidadRegional
                if (valoresRegistro.unidadRegional) cargarComisarias(data);
            });

        function cargarComisarias(data) {
            const comisarias = data[unidadRegionalSelect.value] || [];
            dependenciaPolicialSelect.innerHTML =
                '<option selected hidden disabled>Seleccione una comisaría</option>';
            comisarias.forEach(comisaria => {
                const option = document.createElement('option');
                option.value = comisaria;
                option.textContent = comisaria;
                if (comisaria === valoresRegistro.dependenciaPolicial) option.selected = true;
                dependenciaPolicialSelect.appendChild(option);
            });
        }

        // Cargar el JSON de fuerza de seguridad interviniente
        fetch('/json/fuerzaInterviniente.json')
            .then(response => response.json())
            .then(data => {
                fuerzaIntervinienteSelect.innerHTML =
                    '<option selected hidden disabled>Seleccione una fuerza de seguridad interviniente</option>';
                data["Fuerza interviniente"].forEach(actuacion => {
                    const option = document.createElement('option');
                    option.value = actuacion;
                    option.textContent = actuacion;
                    if (actuacion === valoresRegistro.fuerzaInterviniente) option.selected = true;
                    fuerzaIntervinienteSelect.appendChild(option);
                });
            });
    });
</script>