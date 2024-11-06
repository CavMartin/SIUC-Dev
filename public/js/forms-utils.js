// Función para validar formularios
function validarFormulario(formId, camposRequeridos) {
    let esValido = true;
    const form = document.getElementById(formId);

    form.querySelectorAll('.is-invalid').forEach(field => field.classList.remove('is-invalid'));

    camposRequeridos.forEach(field => {
        const campo = document.getElementById(field.id);
        if (campo) {
            if ((campo.tagName === 'SELECT' && campo.selectedIndex <= 0) ||
                (campo.tagName !== 'SELECT' && !campo.value.trim())) {
                campo.classList.add('is-invalid');
                esValido = false;
                showErrorToast(`Por favor complete el campo: ${field.label}`);
            }
        }
    });

    return esValido;
}

// Función para limpiar formularios
function limpiarFormulario(formId) {
    const form = document.getElementById(formId);
    form.reset();

    form.querySelectorAll('.is-invalid, .is-valid').forEach(field => {
        field.classList.remove('is-invalid', 'is-valid');
    });

    form.querySelectorAll('input[type="hidden"]').forEach(hiddenField => {
        hiddenField.value = '';  // Limpiar campos ocultos como IDs
    });
}

// Función para cerrar modal después de guardar con éxito
function cerrarModalExito(modalId, mensaje) {
    const modal = bootstrap.Modal.getInstance(document.getElementById(modalId));
    modal.hide();
    showSuccessToast(mensaje);
}