document.addEventListener('DOMContentLoaded', function () {
    // Botones de agregar
    const addDelitoButton = document.getElementById('addDelito');
    const addPersonaButton = document.getElementById('addPersona');
    const addVehiculoButton = document.getElementById('addVehiculo');
    const addArmaButton = document.getElementById('addArma');
    const addElementoButton = document.getElementById('addElemento');

    // Contenedores para cada formulario
    const delitosContainer = document.getElementById('delitosContainer');
    const personasContainer = document.getElementById('personasContainer');
    const vehiculosContainer = document.getElementById('vehiculosContainer');
    const armasContainer = document.getElementById('armasContainer');
    const elementosContainer = document.getElementById('elementosContainer');

    // Función genérica para cargar formularios dinámicamente
    function loadForm(route, index, container, button) {
        button.disabled = true;  // Deshabilitar el botón temporalmente

        fetch(route.replace(':index', index))
            .then(response => response.text())
            .then(html => {
                container.insertAdjacentHTML('beforeend', html);
                attachDeleteHandlers(container); // Adjuntar manejadores de eliminación
                button.disabled = false;  // Volver a habilitar el botón
            })
            .catch(error => {
                console.error(`Error al cargar el formulario: ${error}`);
                button.disabled = false;  // Asegurar habilitación del botón tras error
            });
    }

    // Función para reindexar formularios después de eliminar uno
    function reindexForms(container, entity) {
        const forms = container.querySelectorAll('.container-entity');
        forms.forEach((form, index) => {
            form.querySelector(`.${entity}-index`).textContent = index + 1;

            form.querySelectorAll('input, select').forEach(element => {
                const nameAttr = element.getAttribute('name');
                const idAttr = element.getAttribute('id');
                if (nameAttr) {
                    element.setAttribute('name', nameAttr.replace(/\[\d+\]/, `[${index}]`));
                }
                if (idAttr) {
                    element.setAttribute('id', idAttr.replace(/_\d+/, `_${index}`));
                }
            });
        });
    }

    // Manejador de eliminación
    function handleDelete(event) {
        const button = event.target;
        const container = button.closest('.container-entity').parentNode;
        const entity = button.dataset.entity;
        const allowLastDeletion = entity === 'vehiculo' || entity === 'arma' || entity === 'elemento';

        if (allowLastDeletion || container.children.length > 1) {
            const element = button.closest('.container-entity');
            element.remove();
            reindexForms(container, entity); // Reindexar formularios restantes
        } else {
            alert(`Debe haber al menos una instancia de ${entity}.`);
        }
    }

    // Adjuntar manejadores de eliminación
    function attachDeleteHandlers(container) {
        container.querySelectorAll('.remove-instance').forEach(button => {
            button.removeEventListener('click', handleDelete); // Evitar duplicados
            button.addEventListener('click', handleDelete);
        });
    }

    // Eventos para agregar instancias
    addDelitoButton.addEventListener('click', function () {
        const index = delitosContainer.children.length;
        loadForm(`{{ route('formulario-delito', ':index') }}`, index, delitosContainer, addDelitoButton);
    });

    addPersonaButton.addEventListener('click', function () {
        const index = personasContainer.children.length;
        loadForm(`{{ route('formulario-persona', ':index') }}`, index, personasContainer, addPersonaButton);
    });

    addVehiculoButton.addEventListener('click', function () {
        const index = vehiculosContainer.children.length;
        loadForm(`{{ route('formulario-vehiculo', ':index') }}`, index, vehiculosContainer, addVehiculoButton);
    });

    addArmaButton.addEventListener('click', function () {
        const index = armasContainer.children.length;
        loadForm(`{{ route('formulario-arma', ':index') }}`, index, armasContainer, addArmaButton);
    });

    addElementoButton.addEventListener('click', function () {
        const index = elementosContainer.children.length;
        loadForm(`{{ route('formulario-elemento', ':index') }}`, index, elementosContainer, addElementoButton);
    });

    // Adjuntar manejadores de eliminación iniciales
    attachDeleteHandlers(delitosContainer);
    attachDeleteHandlers(personasContainer);
    attachDeleteHandlers(vehiculosContainer);
    attachDeleteHandlers(armasContainer);
    attachDeleteHandlers(elementosContainer);
});
