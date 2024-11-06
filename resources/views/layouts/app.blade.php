<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Aplicación Laravel')</title>
    <link rel="shortcut icon" href="https://www.santafe.gob.ar/assets/standard/images/favicon.ico" type="image/x-icon">
    <script src="https://www.santafe.gob.ar/assets/v3/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://www.santafe.gob.ar/assets/v3/css/custom.css" type="text/css" />
    <link rel="stylesheet" href="https://www.santafe.gov.ar/assets/v3/fonts/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="https://www.santafe.gob.ar/assets/standard/css/fonts.css" type="text/css" />
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Header -->
    <x-header />

    <!-- Content -->
    <main class="container mt-5 flex-grow-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <x-footer />

</body>
</html>
