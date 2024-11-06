<div class="row mt-5">
    <div class="col-12 d-flex justify-content-center">
        <div class="card" style="border-style: solid; border-color: #484A61;" 
             id="{{ $id ?? '' }}">
            <div class="card-body text-center" style="background-color: rgb(240, 240, 240)">
                <h5 class="text-center mb-4 fs-4">{{ $title }}</h5>
                <i class="{{ $icon }} display-1 mb-3" style="color: #484A61;"></i>
                <p class="card-text">{{ $content }}</p>
                <div class="d-grid gap-1">
                    <a href="{{ $url ?? '#' }}" 
                       class="btn btn-base fw-semibold mt-3 fs-5"
                       @if(isset($onclick))
                           onclick="{{ $onclick }}"
                       @endif>
                        {{ $buttonText }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Ejemplo de uso

<x-card 
    title="Aquí va el título"
    icon="bi bi-clipboard-data"
    content="Aquí va el contenido del texto"
    url="{{ route('nombre-de-la-ruta') }}"
    button-text="Texto del botón"
    id="mi-card"
    onclick="alert('Haz clic en la tarjeta')"
/>

Explicación de los parámetros:
- title: Título que se muestra en la tarjeta.
- icon: Icono de Bootstrap que se mostrará.
- content: Texto del contenido principal de la tarjeta.
- url: Ruta hacia donde redirige el botón (opcional, por defecto '#').
- button-text: Texto del botón.
- id: ID HTML de la tarjeta (opcional).
- onclick: Función o acción a ejecutar al hacer clic (opcional).

--}} 
