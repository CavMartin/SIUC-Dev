<div class="form-row row border mx-2 mb-2 p-2 container-entity" id="persona_{{ $index }}">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="fw-semibold">Persona #<span class="persona-index">{{ $index + 1 }}</span></h3>
        <button type="button" class="btn btn-danger btn-sm remove-instance" data-entity="persona" data-index="{{ $index }}">
            Eliminar
        </button>
    </div>

    <div class="form-group col-md-6 col-sm-12 mb-5 mt-2">
        <label for="tipoActuacion_{{ $index }}" class="form-label fs-5">Tipo de actuación</label>
        <select class="form-select" name="personas[{{ $index }}][tipoActuacion]" id="tipoActuacion_{{ $index }}" required>
            <option selected hidden disabled>Seleccione un tipo de actuación</option>
            <option value="Denuncia">Denuncia</option>
            <option value="Acta de procedimiento">Acta de procedimiento</option>
        </select>
    </div>

    <div class="form-group col-md-6 col-sm-12 mb-5 mt-2">
        <label for="numeroActuacion_{{ $index }}" class="form-label fs-5">Número de actuación</label>
        <input type="text" class="form-control" name="personas[{{ $index }}][numeroActuacion]" id="numeroActuacion_{{ $index }}" placeholder="Ejemplo: 157489-2024" required>
    </div>
</div>
