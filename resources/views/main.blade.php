
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Síntesis :: Formulario de carga</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="https://www.santafe.gob.ar/assets/standard/images/favicon.ico" type="image/x-icon">
    <!-- Boostrap -->
    <script src="https://www.santafe.gob.ar/assets/v3/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://www.santafe.gob.ar/assets/v3/css/custom.css" type="text/css" />
    <!-- Boostrap icons -->
    <link rel="stylesheet" href="https://www.santafe.gov.ar/assets/v3/fonts/bootstrap-icons/bootstrap-icons.css">
    <!-- fonts -->
    <link rel="stylesheet" href="https://www.santafe.gob.ar/assets/standard/css/fonts.css" type="text/css" />
</head>

<body class="main-custom">
    <!-- navegación -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://www.santafe.gob.ar/assets/standard/images/gob-santafe.png"
                    alt="logo Santa Fe Provincia">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse mx-4" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Enlace 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Enlace 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Enlace 3</a>
                    </li>
                </ul>
                <ul class="list-inline">
                    <li class="list-inline-item dropdown">
                        <a class="dropdown-toggle" href="#" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person"></i>
                        </a>
                        <ul class="dropdown-menu custom-dropdown" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#">Perfil</a></li>
                            <li><a class="dropdown-item" href="#">Configuración</a></li>
                            <li><a class="dropdown-item" href="#">Acerca de</a></li>
                        </ul>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="bi bi-arrow-bar-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- contenido principal -->
    <main class="container mt-5">
        <!-- Headings -->
        <div class="row">
            <div class="titulo-principal col-12 col-lg-6 col-md-6">
                <h1 class="fw-semibold">Proyecto Síntesis</h1>
            </div>
        </div>
        <!-- Breadcrumbs -->
        <div class="row">
            <div class="col-12 mt-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Formularios</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Formulario CTD</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Accordion -->
        <div class="row">
            <div class="col-12">
                <div class="accordion" id="accordionForm">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-semibold fs-4" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Datos de la actuación
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show"
                            data-bs-parent="#accordionForm">
                            <div class="accordion-body">
                                <div class="row content">
                                    <div class="col-12 col-lg-12 col-md-12">
                                        <div class="card-body">
                                            <div class="form-row row">
                                                <div class="form-group col-md-6 col-sm-12 mb-5 mt-2">
                                                    <label for="tipoActuacion" class="form-label fs-5">Tipo de actuación</label>
                                                    <select class="form-select"  name="form-select" id="tipoActuacion" required>
                                                        <option  selected="true" hidden disabled="disabled" class="select-disabled">Seleccione un tipo de actuación</option>
                                                        <option value="st">Tipo 1</option>
                                                        <option value="st">Tipo 2</option>
                                                        <option value="st">Tipo 3</option>
                                                        <option value="st">Tipo 4</option>
                                                        <option value="st">Tipo 5</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Este campo es requerido.
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 col-sm-12 mb-5 mt-2">
                                                    <label for="numeroActuacion" class="form-label fs-5">Número de actuación</label>
                                                    <input type="text" class="form-control" id="numeroActuacion" placeholder="Ejemplo: 157489-2024" required>
                                                    <div class="invalid-feedback">
                                                        Este campo es requerido.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row row">
                                                <div class="form-group col-md-3 col-sm-12 mb-5 mt-2">
                                                    <label for="fechaActuacion" class="form-label fs-5">Fecha de actuación</label>
                                                    <input type="date" class="form-control" id="fechaActuacion" required>
                                                    <div class="invalid-feedback">
                                                        Este campo es requerido.
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3 col-sm-12 mb-5 mt-2">
                                                    <label for="fechaActuacion" class="form-label fs-5">Hora de actuación</label>
                                                    <input type="time" class="form-control" id="fechaActuacion" required>
                                                    <div class="invalid-feedback">
                                                        Este campo es requerido.
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3 col-sm-12 mb-5 mt-2">
                                                    <label for="nSumario" class="form-label fs-5">N° de sumario</label>
                                                    <input type="text" class="form-control" id="nSumario" placeholder="Ejemplo: 857469-2024" required>
                                                    <div class="invalid-feedback">
                                                        Este campo es requerido.
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-3 col-sm-12 mb-5 mt-2">
                                                    <label for="archivoPDF" class="form-label fs-5">PDF adjunto</label>
                                                    <input type="file" class="form-control" id="archivoPDF" required>
                                                    <div class="invalid-feedback">
                                                        Este campo es requerido.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row">
                                                <div class="form-group col-md-4 col-sm-12 mb-5 mt-2">
                                                    <label for="instruyeActuacion" class="form-label fs-5">Instruye la actuación</label>
                                                    <select class="form-select"  name="form-select" id="instruyeActuacion" required>
                                                        <option  selected="true" hidden disabled="disabled" class="select-disabled">Seleccione un tipo de actuación</option>
                                                        <option value="st">Tipo 1</option>
                                                        <option value="st">Tipo 2</option>
                                                        <option value="st">Tipo 3</option>
                                                        <option value="st">Tipo 4</option>
                                                        <option value="st">Tipo 5</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Este campo es requerido.
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12 mb-5 mt-2">
                                                    <label for="numeroActuacion" class="form-label fs-5">Número de actuación</label>
                                                    <input type="text" class="form-control" id="numeroActuacion" placeholder="Ejemplo: 157489-2024" required>
                                                    <div class="invalid-feedback">
                                                        Este campo es requerido.
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12 mb-5 mt-2">
                                                    <label for="unidadFiscal" class="form-label fs-5">Unidad fiscal</label>
                                                    <select class="form-select"  name="form-select" id="unidadFiscal" required>
                                                        <option  selected="true" hidden disabled="disabled" class="select-disabled">Seleccione la unidad fiscal</option>
                                                        <option value="st">Fiscalía regional 1</option>
                                                        <option value="st">Fiscalía regional 2</option>
                                                        <option value="st">Fiscalía regional 3</option>
                                                        <option value="st">Fiscalía regional 4</option>
                                                        <option value="st">Fiscalía regional 5</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Este campo es requerido.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row row">
                                                <div class="form-group col-md-4 col-sm-12 mb-5 mt-2">
                                                    <label for="fuerzaInterviniente" class="form-label fs-5">Fuerza de seguridad interviniente</label>
                                                    <select class="form-select"  name="form-select" id="fuerzaInterviniente" required>
                                                        <option  selected="true" hidden disabled="disabled" class="select-disabled">Seleccione la fuerza interviniente</option>
                                                        <option value="st">Tipo 1</option>
                                                        <option value="st">Tipo 2</option>
                                                        <option value="st">Tipo 3</option>
                                                        <option value="st">Tipo 4</option>
                                                        <option value="st">Tipo 5</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Este campo es requerido.
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12 mb-5 mt-2">
                                                    <label for="numeroActuacion" class="form-label fs-5">Número </label>
                                                    <input type="text" class="form-control" id="numeroActuacion" placeholder="Ejemplo: 157489-2024" required>
                                                    <div class="invalid-feedback">
                                                        Este campo es requerido.
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4 col-sm-12 mb-5 mt-2">
                                                    <label for="unidadFiscal" class="form-label fs-5">Unidad regional</label>
                                                    <select class="form-select"  name="form-select" id="unidadFiscal" required>
                                                        <option  selected="true" hidden disabled="disabled" class="select-disabled">Seleccione la unidad regional</option>
                                                        <option value="st">Unidad regional 1</option>
                                                        <option value="st">Unidad regional 2</option>
                                                        <option value="st">Unidad regional 3</option>
                                                        <option value="st">Unidad regional 4</option>
                                                        <option value="st">Unidad regional 5</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Este campo es requerido.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12 col-sm-12 mb-5 mt-2">
                                                <label for="relatoDelHecho" class="form-label fs-5">Relato del hecho</label>
                                                <textarea id="relatoDelHecho" class="form-control" name="relatoDelHecho" rows="10" required=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold fs-4" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Delito
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionForm">
                            <div class="accordion-body">
                                <div class="row content">
                                    <div class="col-12 col-lg-12 col-md-12">
                                        <div class="card-body">
                                            <div class="form-row row">
                                                <div class="form-group col-md-6 col-sm-12 mb-5 mt-2">
                                                    <label for="tipoActuacion" class="form-label fs-5">Tipo de actuación</label>
                                                    <select class="form-select"  name="form-select" id="tipoActuacion" required>
                                                        <option  selected="true" hidden disabled="disabled" class="select-disabled">Seleccione un tipo de actuación</option>
                                                        <option value="st">Tipo 1</option>
                                                        <option value="st">Tipo 2</option>
                                                        <option value="st">Tipo 3</option>
                                                        <option value="st">Tipo 4</option>
                                                        <option value="st">Tipo 5</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Este campo es requerido.
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 col-sm-12 mb-5 mt-2">
                                                    <label for="numeroActuacion" class="form-label fs-5">Número de actuación</label>
                                                    <input type="text" class="form-control" id="numeroActuacion" placeholder="Ejemplo: 157489-2024" required>
                                                    <div class="invalid-feedback">
                                                        Este campo es requerido.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold fs-4" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Personas
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionForm">
                            <div class="accordion-body">
                                <div class="row content">
                                    <div class="col-12 col-lg-12 col-md-12">
                                        <div class="card-body">
                                            <div class="form-row row">
                                                <div class="form-group col-md-6 col-sm-12 mb-5 mt-2">
                                                    <label for="tipoActuacion" class="form-label fs-5">Tipo de actuación</label>
                                                    <select class="form-select"  name="form-select" id="tipoActuacion" required>
                                                        <option  selected="true" hidden disabled="disabled" class="select-disabled">Seleccione un tipo de actuación</option>
                                                        <option value="st">Tipo 1</option>
                                                        <option value="st">Tipo 2</option>
                                                        <option value="st">Tipo 3</option>
                                                        <option value="st">Tipo 4</option>
                                                        <option value="st">Tipo 5</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Este campo es requerido.
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 col-sm-12 mb-5 mt-2">
                                                    <label for="numeroActuacion" class="form-label fs-5">Número de actuación</label>
                                                    <input type="text" class="form-control" id="numeroActuacion" placeholder="Ejemplo: 157489-2024" required>
                                                    <div class="invalid-feedback">
                                                        Este campo es requerido.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold fs-4" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Vehículos
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionForm">
                            <div class="accordion-body">
                                <div class="row content">
                                    <div class="col-12 col-lg-12 col-md-12">
                                        <div class="card-body">
                                            <div class="form-row row">
                                                <div class="form-group col-md-6 col-sm-12 mb-5 mt-2">
                                                    <label for="tipoActuacion" class="form-label fs-5">Tipo de actuación</label>
                                                    <select class="form-select"  name="form-select" id="tipoActuacion" required>
                                                        <option  selected="true" hidden disabled="disabled" class="select-disabled">Seleccione un tipo de actuación</option>
                                                        <option value="st">Tipo 1</option>
                                                        <option value="st">Tipo 2</option>
                                                        <option value="st">Tipo 3</option>
                                                        <option value="st">Tipo 4</option>
                                                        <option value="st">Tipo 5</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Este campo es requerido.
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 col-sm-12 mb-5 mt-2">
                                                    <label for="numeroActuacion" class="form-label fs-5">Número de actuación</label>
                                                    <input type="text" class="form-control" id="numeroActuacion" placeholder="Ejemplo: 157489-2024" required>
                                                    <div class="invalid-feedback">
                                                        Este campo es requerido.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold fs-4" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Armas
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionForm">
                            <div class="accordion-body">
                                <div class="row content">
                                    <div class="col-12 col-lg-12 col-md-12">
                                        <div class="card-body">
                                            <div class="form-row row">
                                                <div class="form-group col-md-6 col-sm-12 mb-5 mt-2">
                                                    <label for="tipoActuacion" class="form-label fs-5">Tipo de actuación</label>
                                                    <select class="form-select"  name="form-select" id="tipoActuacion" required>
                                                        <option  selected="true" hidden disabled="disabled" class="select-disabled">Seleccione un tipo de actuación</option>
                                                        <option value="st">Tipo 1</option>
                                                        <option value="st">Tipo 2</option>
                                                        <option value="st">Tipo 3</option>
                                                        <option value="st">Tipo 4</option>
                                                        <option value="st">Tipo 5</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Este campo es requerido.
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 col-sm-12 mb-5 mt-2">
                                                    <label for="numeroActuacion" class="form-label fs-5">Número de actuación</label>
                                                    <input type="text" class="form-control" id="numeroActuacion" placeholder="Ejemplo: 157489-2024" required>
                                                    <div class="invalid-feedback">
                                                        Este campo es requerido.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-semibold fs-4" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                Elementos
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionForm">
                            <div class="accordion-body">
                                <div class="row content">
                                    <div class="col-12 col-lg-12 col-md-12">
                                        <div class="card-body">
                                            <div class="form-row row">
                                                <div class="form-group col-md-6 col-sm-12 mb-5 mt-2">
                                                    <label for="tipoActuacion" class="form-label fs-5">Tipo de actuación</label>
                                                    <select class="form-select"  name="form-select" id="tipoActuacion" required>
                                                        <option  selected="true" hidden disabled="disabled" class="select-disabled">Seleccione un tipo de actuación</option>
                                                        <option value="st">Tipo 1</option>
                                                        <option value="st">Tipo 2</option>
                                                        <option value="st">Tipo 3</option>
                                                        <option value="st">Tipo 4</option>
                                                        <option value="st">Tipo 5</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Este campo es requerido.
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6 col-sm-12 mb-5 mt-2">
                                                    <label for="numeroActuacion" class="form-label fs-5">Número de actuación</label>
                                                    <input type="text" class="form-control" id="numeroActuacion" placeholder="Ejemplo: 157489-2024" required>
                                                    <div class="invalid-feedback">
                                                        Este campo es requerido.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </main>

    <!-- pie de página -->
    <footer class="mt-4">
        <div class="row">
            <div class="col-12">
                <div class="footer-container container">
                    <!-- redes sociales -->
                    <div class="container-rrss">
                        <p>
                            <a href="//www.santafe.gob.ar/index.php/web/content/view/full/117678">
                                RRSS / SUSCRIPCIÓN A NOTICIAS
                            </a>
                        </p>
                        <ul class="rrss">
                            <li class="rrss-header-item">
                                <a class="rrss-header-link" href="https://twitter.com/GobSantaFe" target="_blank">
                                    <div class="container-icon">
                                        <i class="bi bi-twitter-x"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="rrss-header-item">
                                <a class="rrss-header-link" href="http://www.facebook.com/GobSantaFe" target="_blank">
                                    <div class="container-icon">
                                        <i class="bi bi-facebook"></i>
                                    </div>
                                </a>
                            </li>
                            <li class="rrss-header-item">
                                <a class="rrss-header-link" href="http://www.youtube.com/GobSantaFe" target="_blank">
                                    <div class="container-icon">
                                        <i class="bi bi-youtube"></i>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- logo -->
                    <div class="container-logo">
                        <img src="https://www.santafe.gov.ar/assets/standard/images/marca-footer.png"
                            alt="logo Santa Fe provincia">
                    </div>
                    <!-- info contacto -->
                    <div class="container-info">
                        <p>Atención telefónica: 0800-777-0801</p>
                        <p> Lunes a viernes de 8 a 18 hs</p>
                        <p>
                            <span class="cc">
                                <i class="bi bi-badge-cc"></i>
                            </span>
                            Atribución-CompartirIgual 2.5 Argentina
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>