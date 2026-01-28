window.confirmDelete = function (id) {
    Swal.fire({
        title: '<i class="bi bi-exclamation-triangle text-warning"></i> ¿Estás seguro?',
        html: 'Esta acción no se puede deshacer',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc3545',
        cancelButtonColor: '#6c757d',
        confirmButtonText: '<i class="bi bi-trash"></i> Sí, eliminar',
        cancelButtonText: '<i class="bi bi-x-circle"></i> Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById(`delete-form-${id}`).submit();
        }
    });
}
