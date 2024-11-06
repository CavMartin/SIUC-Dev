<nav class="navbar navbar-expand-lg fixed-top bg-light border">
    <div class="container-fluid">
        
        {{-- Logo del gobierno de Santa Fe, con enlace a la página oficial que se abre en una nueva pestaña --}}
        <a class="navbar-brand mx-3" href="https://www.santafe.gov.ar/" target="_blank">
            <img src="https://www.santafe.gob.ar/assets/standard/images/gob-santafe.png" 
                 alt="logo Santa Fe Provincia">
        </a>

        {{-- Título centrado usando Flexbox --}}
        @if (!empty($title)) {{-- Parametro opcional $title --}} {{-- Ejemplo de uso #1 al final --}}
            <div class="w-100 d-flex justify-content-center">
                <h1 class="text-center text-bold">{{ $title }}</h1>
            </div>
        @endif

        {{-- Botón para mostrar el contenido colapsado en pantallas pequeñas --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Contenedor colapsable que incluye el menú y el título --}}
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            {{-- Menú de navegación con enlaces dinámicos --}}
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if (!empty($links)){{-- Parametro opcional $links --}} {{-- Ejemplo de uso #2 al final --}}
                    @foreach ($links as $link)
                        <li class="nav-item">
                            <a class="nav-link fs-4" href="{{ $link['url'] }}">{{ $link['title'] }}</a>
                        </li>
                    @endforeach
                @endif
            </ul>

            {{-- Ícono de usuario con un menú desplegable --}}
            <ul class="list-inline mx-3">
                <li class="list-inline-item dropdown">
                    <a class="dropdown-toggle" href="#" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-circle fs-1"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#">Perfil</a></li>
                        <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>

        </div> {{-- Fin del collapse --}}
    </div> {{-- Fin del container-fluid --}}
</nav>

{{-- Ejemplo de uso #1: Este parametro se utiliza si se desea escribir un título en el header con formato <h1> y las clases text-bold y text-center de bootstrap para dejarlo en negrita y centrarlo

<x-header title="Aquí va el título" />

Donde <x-header es el nombre del componente y title el parametro a pasar.
    
--}}

{{-- Ejemplo de uso #2: Este parametro se utiliza para agregar LINKS de navegación al header

Ejemplo simple:

<x-header :links="[
    ['title' => 'Texto a mostrar', 'url' => route('nombre-de-la-vista')]
]" />

Donde <x-header es el nombre del componente y :links los parametros a pasar. Para este caso se pueden pasar multiples parametros como si fuera un arreglo, separando cada valor con una coma

Ejemplo multiple:

<x-header :links="[
    ['title' => 'Texto a mostrar 1', 'url' => route('nombre-de-la-vista')],
    ['title' => 'Texto a mostrar 2', 'url' => route('nombre-de-la-vista2')],
    ['title' => 'Texto a mostrar 3', 'url' => route('nombre-de-la-vista3')]
]" />
    
--}}