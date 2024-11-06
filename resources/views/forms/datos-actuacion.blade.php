<div class="form-row row">
    <div class="form-group col-md-6 col-sm-12 mb-5 mt-2">
        <label for="tipoActuacion" class="form-label fs-5">Tipo de actuación</label>
        <select class="form-select"  name="tipoActuacion" id="tipoActuacion" required>
            <option  selected="true" hidden disabled="disabled" class="select-disabled">Seleccione un tipo de actuación</option>
            <option value="Denuncia">Denuncia</option>
            <option value="Acta de procedimiento">Acta de procedimiento</option>
        </select>
    </div>
    <div class="form-group col-md-6 col-sm-12 mb-5 mt-2">
        <label for="numeroActuacion" class="form-label fs-5">Número de actuación</label>
        <input type="text" class="form-control" name="numeroActuacion" id="numeroActuacion" placeholder="Ejemplo: 157489-2024" required>
    </div>
</div>
<div class="form-row row">
    <div class="form-group col-md-3 col-sm-12 mb-5 mt-2">
        <label for="fechaActuacion" class="form-label fs-5">Fecha de actuación</label>
        <input type="date" class="form-control" name="fechaActuacion" id="fechaActuacion" required>
    </div>
    <div class="form-group col-md-3 col-sm-12 mb-5 mt-2">
        <label for="horaActuacion" class="form-label fs-5">Hora de actuación</label>
        <input type="time" class="form-control" name="horaActuacion" id="horaActuacion" required>
    </div>
    <div class="form-group col-md-3 col-sm-12 mb-5 mt-2">
        <label for="nSumario" class="form-label fs-5">N° de sumario</label>
        <input type="text" class="form-control" name="nSumario" id="nSumario" placeholder="Ejemplo: 857469-2024" required>
        <div class="invalid-feedback">
            Este campo es requerido.
        </div>
    </div>
    <div class="form-group col-md-3 col-sm-12 mb-5 mt-2">
        <label for="archivoPDF" class="form-label fs-5">PDF adjunto</label>
        <input type="file" class="form-control" id="archivoPDF">
    </div>
</div>
<div class="form-row row">
    <div class="form-group col-md-4 col-sm-12 mb-5 mt-2">
        <label for="instruyeActuacion" class="form-label fs-5">Instruye la actuación</label>
        <select class="form-select"  name="instruyeActuacion" id="instruyeActuacion" required>
            <option  selected="true" hidden disabled="disabled" class="select-disabled">Seleccione un tipo de actuación</option>
            <option value="Procedimiento policial">Procedimiento policial</option>
            <option value="Toma de denuncia">Toma de denuncia</option>
        </select>
    </div>
    <div class="form-group col-md-4 col-sm-12 mb-5 mt-2">
        <label for="unidadFiscal" class="form-label fs-5">Unidad fiscal</label>
        <select class="form-select"  name="unidadFiscal" id="unidadFiscal" required>
            <option  selected="true" hidden disabled="disabled" class="select-disabled">Seleccione la unidad fiscal</option>
            <option value="Fiscalía regional 1">Fiscalía regional 1</option>
            <option value="Fiscalía regional 2">Fiscalía regional 2</option>
            <option value="Fiscalía regional 3">Fiscalía regional 3</option>
            <option value="Fiscalía regional 4">Fiscalía regional 4</option>
            <option value="Fiscalía regional 5">Fiscalía regional 5</option>
        </select>
    </div>
</div>
<div class="form-row row">
    <div class="form-group col-md-4 col-sm-12 mb-5 mt-2">
        <label for="fuerzaInterviniente" class="form-label fs-5">Fuerza de seguridad interviniente</label>
        <select class="form-select"  name="fuerzaInterviniente" id="fuerzaInterviniente" required>
            <option  selected="true" hidden disabled="disabled" class="select-disabled">Seleccione la fuerza interviniente</option>
            <option value="AUOP">AUOP</option>
            <option value="PAT">PAT</option>
            <option value="Comando radioelectrico">Comando radioelectrico</option>
        </select>
    </div>
    <div class="form-group col-md-4 col-sm-12 mb-5 mt-2">
        <label for="unidadRegional" class="form-label fs-5">Unidad regional</label>
        <select class="form-select"  name="unidadRegional" id="unidadRegional" required>
            <option  selected="true" hidden disabled="disabled" class="select-disabled">Seleccione la unidad regional</option>
            <option value="Unidad regional I">Unidad regional I</option>
            <option value="Unidad regional II">Unidad regional II</option>
            <option value="Unidad regional III">Unidad regional III</option>
            <option value="Unidad regional IV">Unidad regional IV</option>
            <option value="Unidad regional V">Unidad regional V</option>
        </select>
    </div>
</div>
<div class="form-group col-md-12 col-sm-12 mb-5 mt-2">
    <label for="relatoDelHecho" class="form-label fs-5">Relato del hecho</label>
    <textarea class="form-control" name="relatoDelHecho" id="relatoDelHecho" rows="10" required=""></textarea>
</div>
