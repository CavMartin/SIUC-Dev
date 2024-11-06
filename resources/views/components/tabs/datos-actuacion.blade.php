<div class="row">
    <div class="col-md-6 col-sm-12 mb-5 mt-2">
        <label class="form-label fs-5">Tipo de actuación</label>
        <div class="form-control-plaintext">{{ $datosActuacion->tipoActuacion }}</div>
    </div>    
    <div class="col-md-6 col-sm-12 mb-5 mt-2">
        <label class="form-label fs-5">Número de actuación</label>
        <div class="form-control-plaintext">{{ $datosActuacion->numeroActuacion }}</div>
    </div>
</div>

<div class="row">
    <div class="col-md-3 col-sm-12 mb-5 mt-2">
        <label class="form-label fs-5">Fecha de actuación</label>
        <div class="form-control-plaintext">{{ $datosActuacion->fechaActuacion }}</div>
    </div>
    <div class="col-md-3 col-sm-12 mb-5 mt-2">
        <label class="form-label fs-5">Hora de actuación</label>
        <div class="form-control-plaintext">{{ $datosActuacion->horaActuacion }}</div>
    </div>
    <div class="col-md-3 col-sm-12 mb-5 mt-2">
        <label class="form-label fs-5">N° de sumario</label>
        <div class="form-control-plaintext">{{ $datosActuacion->nSumario }}</div>
    </div>
    <div class="col-md-3 col-sm-12 mb-5 mt-2">
        <label class="form-label fs-5">PDF adjunto</label>
        <div class="form-control-plaintext">
            <a href="{{ asset('path/to/pdf/' . $datosActuacion->archivoPDF) }}" target="_blank">Ver PDF</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 col-sm-12 mb-5 mt-2">
        <label class="form-label fs-5">Fuerza de seguridad interviniente</label>
        <div class="form-control-plaintext">{{ $datosActuacion->fuerzaInterviniente }}</div>
    </div>
    <div class="col-md-4 col-sm-12 mb-5 mt-2">
        <label class="form-label fs-5">Unidad regional</label>
        <div class="form-control-plaintext">{{ $datosActuacion->unidadRegional }}</div>
    </div>
    <div class="col-md-4 col-sm-12 mb-5 mt-2">
        <label class="form-label fs-5">Dependencia policial</label>
        <div class="form-control-plaintext">{{ $datosActuacion->dependenciaPolicial }}</div>
    </div>
</div>

<div class="row">
    <div class="col-md-4 col-sm-12 mb-5 mt-2">
        <label class="form-label fs-5">Fiscalía regional</label>
        <div class="form-control-plaintext">{{ $datosActuacion->fiscaliaRegional }}</div>
    </div>
    <div class="col-md-4 col-sm-12 mb-5 mt-2">
        <label class="form-label fs-5">Unidad fiscal</label>
        <div class="form-control-plaintext">{{ $datosActuacion->unidadFiscal }}</div>
    </div>
</div>

<div class="col-md-12 col-sm-12 mb-5 mt-2">
    <label class="form-label fs-5">Relato del hecho</label>
    <div class="form-control-plaintext">{{ $datosActuacion->relatoDelHecho }}</div>
</div>