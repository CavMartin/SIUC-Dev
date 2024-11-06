<!-- Contenedor para Toasts de Error -->
<div id="errorToastContainer" class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999;"></div>

<script>
    // Función para mostrar un Toast de error individual
    function showErrorToast(mensaje) {
        const toastId = `toastError-${Date.now()}`;
        
        const toastHtml = `
            <div id="${toastId}" class="toast align-items-center text-white bg-danger border-0 mb-2" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body">
                        ${mensaje}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        `;

        document.getElementById('errorToastContainer').insertAdjacentHTML('beforeend', toastHtml);

        const toastElement = document.getElementById(toastId);
        const toast = new bootstrap.Toast(toastElement);
        toast.show();

        toastElement.addEventListener('hidden.bs.toast', () => {
            toastElement.remove();
        });
    }
</script>
