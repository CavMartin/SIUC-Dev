<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Aplicación Laravel')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="https://www.santafe.gob.ar/assets/standard/images/favicon.ico" type="image/x-icon">
    <script src="https://www.santafe.gob.ar/assets/v3/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://www.santafe.gob.ar/assets/v3/css/custom.css" type="text/css" />
    <link rel="stylesheet" href="https://www.santafe.gov.ar/assets/v3/fonts/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="https://www.santafe.gob.ar/assets/standard/css/fonts.css" type="text/css" />
    <style>
        /* Scrollbar para Firefox */
            html {
            scrollbar-width: thin; /* Grosor del scrollbar */
            scrollbar-color: #484A61 #f1f1f1; /* Thumb y track */
        }
        /* Estilos generales del scrollbar */
        ::-webkit-scrollbar {
            width: 10px; /* Ancho del scrollbar */
            height: 10px; /* Altura del scrollbar para scroll horizontal */
        }
        /* Color del track (fondo del scrollbar) */
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        /* Color y estilo del thumb (la parte que se desplaza) */
        ::-webkit-scrollbar-thumb {
            background-color: #484A61;
            border-radius: 10px;
            border: 2px solid #f1f1f1;
        }
        /* Cambios al hacer hover en el thumb */
        ::-webkit-scrollbar-thumb:hover {
            background-color: #3A6DA0;
        }
    </style>
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
