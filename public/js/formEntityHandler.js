document.addEventListener('DOMContentLoaded', function () {
    const addDelitoButton = document.getElementById('addDelito');
    const addPersonaButton = document.getElementById('addPersona');
    const addVehiculoButton = document.getElementById('addVehiculo');
    const addArmaButton = document.getElementById('addArma');
    const addElementoButton = document.getElementById('addElemento');

    const delitosContainer = document.getElementById('delitosContainer');
    const personasContainer = document.getElementById('personasContainer');
    const vehiculosContainer = document.getElementById('vehiculosContainer');
    const armasContainer = document.getElementById('armasContainer');
    const elementosContainer = document.getElementById('elementosContainer');

    function loadForm(route, index, container, button) {
        button.disabled = true;

        fetch(route.replace(':index', index))
            .then(response => response.text())
            .then(html => {
                container.insertAdjacentHTML('beforeend', html);
                attachDeleteHandlers(container);
                button.disabled = false;
            })
            .catch(error => {
                console.error(`Error al cargar el formulario: ${error}`);
                button.disabled = false;
            });
    }

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

    function handleDelete(event) {
        const button = event.target;
        const container = button.closest('.container-entity').parentNode;
        const entity = button.dataset.entity;
        const allowLastDeletion = entity === 'vehiculo' || entity === 'arma' || entity === 'elemento';

        if (allowLastDeletion || container.children.length > 1) {
            const element = button.closest('.container-entity');
            element.remove();
            reindexForms(container, entity);
        } else {
            alert(`Debe haber al menos una instancia de ${entity}.`);
        }
    }

    function attachDeleteHandlers(container) {
        container.querySelectorAll('.remove-instance').forEach(button => {
            button.removeEventListener('click', handleDelete);
            button.addEventListener('click', handleDelete);
        });
    }

    addDelitoButton.addEventListener('click', function () {
        const index = delitosContainer.children.length;
        loadForm(`/formulario-delito/${index}`, index, delitosContainer, addDelitoButton);
    });

    addPersonaButton.addEventListener('click', function () {
        const index = personasContainer.children.length;
        loadForm(`/formulario-persona/${index}`, index, personasContainer, addPersonaButton);
    });

    addVehiculoButton.addEventListener('click', function () {
        const index = vehiculosContainer.children.length;
        loadForm(`/formulario-vehiculo/${index}`, index, vehiculosContainer, addVehiculoButton);
    });

    addArmaButton.addEventListener('click', function () {
        const index = armasContainer.children.length;
        loadForm(`/formulario-arma/${index}`, index, armasContainer, addArmaButton);
    });

    addElementoButton.addEventListener('click', function () {
        const index = elementosContainer.children.length;
        loadForm(`/formulario-elemento/${index}`, index, elementosContainer, addElementoButton);
    });

    attachDeleteHandlers(delitosContainer);
    attachDeleteHandlers(personasContainer);
    attachDeleteHandlers(vehiculosContainer);
    attachDeleteHandlers(armasContainer);
    attachDeleteHandlers(elementosContainer);
});
