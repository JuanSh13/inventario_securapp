document.getElementById('deleteLink').addEventListener('click', function(e) {
    e.preventDefault(); // Evitar que el enlace realice su acción por defecto

    // Abrir el modal de confirmación
    const centroId = this.getAttribute('data-id');
    const confirmDeleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
    confirmDeleteModal.show();

    // Guardar el ID del centro para usarlo después
    const confirmBtn = document.getElementById('confirmDeleteBtn');
    confirmBtn.onclick = function() {
        // Realizar la solicitud AJAX para eliminar el centro
        const formData = new FormData();
        formData.append('id', centroId);

        fetch('centros_trabajo/borrar_centro.php', {
            method: 'GET', // Usar GET para enviar los datos
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // Cerrar el modal de confirmación
            confirmDeleteModal.hide();

            // Mostrar el modal con el mensaje de resultado
            const responseModal = new bootstrap.Modal(document.getElementById('responseModal'));
            const responseMessageContent = document.getElementById('responseMessageContent');

            // Determinar el tipo de mensaje (success, error, warning)
            if (data.status === 'success') {
                responseMessageContent.innerHTML = `<div class="alert alert-success">${data.message}</div>`;
            } else if (data.status === 'error') {
                responseMessageContent.innerHTML = `<div class="alert alert-danger">${data.message}</div>`;
            } else if (data.status === 'warning') {
                responseMessageContent.innerHTML = `<div class="alert alert-warning">${data.message}</div>`;
            }

            // Mostrar el modal con el mensaje de éxito/error/advertencia
            responseModal.show();
        })
        .catch(error => {
            // Manejo de errores en la solicitud AJAX
            const responseModal = new bootstrap.Modal(document.getElementById('responseModal'));
            const responseMessageContent = document.getElementById('responseMessageContent');
            responseMessageContent.innerHTML = `<div class="alert alert-danger">⚠️ Error al intentar eliminar: ${error.message}</div>`;
            responseModal.show();
        });
    };
});
