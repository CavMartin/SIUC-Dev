<div class="row mt-5">
    <div class="col-12 d-flex justify-content-center">
        <div class="card border border-primary" style="width: 18rem;">
            <div class="card-body text-center" style="background-color: rgb(216, 216, 216)">
                <h5 class="text-center mb-4">{{ $title }}</h5>
                <i class="{{ $icon }} display-1 text-primary mb-3"></i>
                <p class="card-text">{{ $content }}</p>
                <a href="{{ $url }}" class="btn btn-base fw-semibold mt-3">{{ $buttonText }}</a>
            </div>
        </div>
    </div>
</div>

{{-- Ejemplo de uso: Este component tiene 5 parametros

<x-card 
    title="Aquí va el título"
    icon="bi bi-clipboard-data" 
    content="Aquí va el contenido del texto" 
    url="{{ route('nombre-de-la-ruta') }}" 
    button-text="Texto del botón" 
/>

Explicación ampliada de los parametros:
<x-card es el nombre del componente de blade.
title = Es donde se escribe el título de la carta.
icon = Es el valor del icono de Bootstrap.
content = Es donde va el texto del contenido.
url = Ruta hacia donde redirige el botón.
button-text = Texto a mostrar del botón.

--}}