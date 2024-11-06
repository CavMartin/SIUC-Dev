<div class="form-row row border mx-2 mb-2 p-3 container-entity" id="persona_{{ $index }}">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="fw-semibold">Persona #<span class="persona-index">{{ $index + 1 }}</span></h3>
        <div>
            <!-- Botón para Editar -->
            <button 
                class="btn btn-base btn-sm me-2"
                onclick="abrirModalEdicionPersona({{ $persona->id_persona }})">
                Editar
            </button>
            <!-- Botón para Eliminar -->
            <button 
                class="btn btn-base btn-sm"
                style="background-color: crimson"
                onclick="eliminarPersona({{ $persona->id_persona }})">
                Eliminar
            </button>
        </div>
    </div>

    <!-- Campo oculto para el ID de persona (PK) -->
    <input type="text" name="id_persona" value="{{ $persona->id_persona }}" id="id_persona_{{ $index }}">
    
    <!-- Campo oculto para el ID de datos_actuacion_id (FK) -->
    <input type="text" name="datos_actuacion_id" value="{{ $persona->datos_actuacion_id }}" id="datos_actuacion_id_{{ $index }}">

    <div class="row">
        <div class="col-md-6">
            <label class="form-label fs-5">En calidad de</label>
            <p class="form-control-plaintext">{{ $persona->calidad ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-2 d-flex align-items-center">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" {{ $persona->nn ? 'checked' : '' }} disabled>
                <label class="form-check-label">NN</label>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <label class="form-label fs-5">Tipo de Documento</label>
            <p class="form-control-plaintext">{{ $persona->tipoDocumento ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">Número</label>
            <p class="form-control-plaintext">{{ $persona->numero ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-2">
            <label class="form-label fs-5">Género</label>
            <p class="form-control-plaintext">{{ $persona->genero ?? 'No disponible' }}</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-3">
            <label class="form-label fs-5">Nombres</label>
            <p class="form-control-plaintext">{{ $persona->nombres ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-3">
            <label class="form-label fs-5">Apellido</label>
            <p class="form-control-plaintext">{{ $persona->apellido ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-3">
            <label class="form-label fs-5">Apellido Materno</label>
            <p class="form-control-plaintext">{{ $persona->apellidoMaterno ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-3">
            <label class="form-label fs-5">Alias</label>
            <p class="form-control-plaintext">{{ $persona->alias ?? 'No disponible' }}</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-3">
            <label class="form-label fs-5">Fecha Nacimiento</label>
            <p class="form-control-plaintext">{{ $persona->fechaNacimiento ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-2">
            <label class="form-label fs-5">Edad</label>
            <p class="form-control-plaintext">{{ $persona->edad ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">Estado Civil</label>
            <p class="form-control-plaintext">{{ $persona->estadoCivil ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-3">
            <label class="form-label fs-5">Ocupación</label>
            <p class="form-control-plaintext">{{ $persona->ocupacion ?? 'No disponible' }}</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4">
            <label class="form-label fs-5">País</label>
            <p class="form-control-plaintext">{{ $persona->pais ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">Provincia</label>
            <p class="form-control-plaintext">{{ $persona->provincia ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">Departamento</label>
            <p class="form-control-plaintext">{{ $persona->departamento ?? 'No disponible' }}</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-4">
            <label class="form-label fs-5">Estado de Salud</label>
            <p class="form-control-plaintext">{{ $persona->estadoSalud ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">Lesionado con</label>
            <p class="form-control-plaintext">{{ $persona->lesionadoCon ?? 'No disponible' }}</p>
        </div>
        <div class="col-md-4">
            <label class="form-label fs-5">Lesionado en ocasión de</label>
            <p class="form-control-plaintext">{{ $persona->lesionadoOcasión ?? 'No disponible' }}</p>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <label class="form-label fs-5">Características Fisionómicas</label>
            <p class="form-control-plaintext">{{ $persona->caracteristicas ?? 'No disponible' }}</p>
        </div>
    </div>
</div>

<script>
    // Función para abrir el modal de edición de persona
    function abrirModalEdicionPersona(personaId) {
        const url = `{{ url('persona/get') }}/${personaId}`;
        
        fetch(url)
            .then(response => {
                if (!response.ok) throw new Error("No se pudo obtener los datos de la persona");
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    document.getElementById('id_persona').value = data.persona.id_persona;
                    document.getElementById('datos_actuacion_id').value = data.persona.datos_actuacion_id;
                    document.getElementById('calidad').value = data.persona.calidad;
                    document.getElementById('nn').checked = data.persona.nn;
                    document.getElementById('tipoDocumento').value = data.persona.tipoDocumento;
                    document.getElementById('numero').value = data.persona.numero;
                    document.getElementById('genero').value = data.persona.genero;
                    document.getElementById('nombres').value = data.persona.nombres;
                    document.getElementById('apellido').value = data.persona.apellido;
                    document.getElementById('apellidoMaterno').value = data.persona.apellidoMaterno;
                    document.getElementById('alias').value = data.persona.alias;
                    document.getElementById('fechaNacimiento').value = data.persona.fechaNacimiento;
                    document.getElementById('edad').value = data.persona.edad;
                    document.getElementById('estadoCivil').value = data.persona.estadoCivil;
                    document.getElementById('ocupacion').value = data.persona.ocupacion;
                    document.getElementById('pais').value = data.persona.pais;
                    document.getElementById('provincia').value = data.persona.provincia;
                    document.getElementById('departamento').value = data.persona.departamento;
                    document.getElementById('estadoSalud').value = data.persona.estadoSalud;
                    document.getElementById('lesionadoCon').value = data.persona.lesionadoCon;
                    document.getElementById('lesionadoOcasión').value = data.persona.lesionadoOcasión;
                    document.getElementById('caracteristicas').value = data.persona.caracteristicas;

                    const personaModal = new bootstrap.Modal(document.getElementById('personaModal'));
                    personaModal.show();
                } else {
                    showErrorToast(data.message || 'No se pudieron cargar los datos de la persona.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showErrorToast(error.message || 'Error al cargar los datos de la persona.');
            });
    }

    // Función para eliminar una persona
    function eliminarPersona(personaId) {
        if (confirm('¿Está seguro de que desea eliminar esta persona?')) {
            const url = `{{ url('persona/delete') }}/${personaId}`;
            
            fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => {
                if (!response.ok) throw new Error("No se pudo eliminar la persona");
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    showSuccessToast(data.message);
                    document.getElementById(`persona_${personaId}`).remove();
                } else {
                    showErrorToast(data.message || 'No se pudo eliminar la persona.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showErrorToast(error.message || 'Error en la solicitud de eliminación.');
            });
        }
    }
</script>