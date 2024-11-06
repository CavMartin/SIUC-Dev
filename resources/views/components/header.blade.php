<nav class="navbar navbar-expand-lg fixed-top bg-light border">
    <div class="container-fluid">

        {{-- Logo del gobierno de Santa Fe, con enlace a la página oficial que se abre en una nueva pestaña --}}
        <a class="navbar-brand mx-3" href="https://www.santafe.gov.ar/" target="_blank">
            <img src="https://www.santafe.gob.ar/assets/standard/images/gob-santafe.png"
                 alt="logo Santa Fe Provincia">
        </a>

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
                @if (!empty($links)) {{-- Parametro opcional $links --}}
                    @foreach ($links as $link)
                        <li class="nav-item">
                            <a 
                                class="nav-link fs-5 mx-2" 
                                href="{{ $link['url'] ?? '#' }}" 
                                @isset($link['onclick']) {{-- Parametro opcional onclick si se lo quiere utilizar para asignarle una función JS --}}
                                    onclick="{{ $link['onclick'] }}" 
                                @endisset
                                @isset($link['id']) {{-- Parametro opcional id por si es necesario para seleccionarlos con JS --}}
                                    id="{{ $link['id'] }}" 
                                @endisset
                            >
                                {{ $link['title'] }}
                            </a>
                        </li>
                    @endforeach
                @endif
            </ul>

            {{-- Título centrado absoluto --}}
            @if (!empty($title))
                <div class="position-absolute top-50 start-50 translate-middle text-center">
                    <h1 class="text-bold mb-0">{{ $title }}</h1>
                </div>
            @endif

            {{-- Ícono de usuario con un menú desplegable --}}
            <ul class="list-inline mx-4">
                <li class="list-inline-item dropdown">
                    <a class="dropdown-toggle" href="#" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-circle fs-1"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ route("mi-perfil") }}">Perfil</a></li>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); logout();">Cerrar sesión</a>
                    </ul>
                </li>
            </ul>

        </div> {{-- Fin del collapse --}}
    </div> {{-- Fin del container-fluid --}}
</nav>

<script>
    function logout() {
        if (confirm('¿Estás seguro de que deseas cerrar sesión?')) {
            window.location.href = "{{ route('logout') }}";
        }
    }
</script>

{{-- 
Ejemplo de uso #1: Este parámetro se utiliza para agregar LINKS de navegación al header

Ejemplo simple:

<x-header :links="[
    ['title' => 'Texto a mostrar', 'url' => route('nombre-de-la-vista')]
]" />

Donde:
- <x-header es el nombre del componente.
- :links es el parámetro que recibe un **array** de enlaces.

**Parámetros disponibles para cada enlace:**
- **title** (obligatorio): El texto que se mostrará en el enlace.
- **url** (opcional): La ruta hacia la que redirige el enlace.
- **id** (opcional): Identificador único del enlace para manipularlo con JavaScript o CSS.
- **onclick** (opcional): Código JavaScript a ejecutar al hacer clic en el enlace. 

Ejemplo múltiple:

<x-header :links="[
    ['title' => 'Texto 1', 'url' => route('vista1')],
    ['title' => 'Texto 2', 'url' => route('vista2')],
    ['title' => 'Volver', 'id' => 'volverLink', 'onclick' => 'showMainCards()']
]" />

En este caso:
- **id** es útil si necesitas manipular un enlace específico desde JavaScript (por ejemplo, mostrar u ocultar el enlace).
- **onclick** permite agregar un manejador de evento en línea para ejecutar funciones al hacer clic (por ejemplo, cambiar la vista).

Se pueden agregar múltiples enlaces separándolos por comas, formando un array de arrays.
--}}

{{-- Ejemplo de uso #2: Este parametro se utiliza si se desea escribir un título en el header con formato <h1> y las clases text-bold y text-center de bootstrap para dejarlo en negrita y centrarlo

<x-header title="Aquí va el título" />

Donde <x-header es el nombre del componente y title el parametro a pasar.
    
--}}

