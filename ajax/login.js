function inciarSesion() {
    $.ajax({
        type: 'POST',
        data: $('#frmIniciar').serialize(),
        url: "controllers/UsuarioController.php?opcion=iniciarSesion",
        success: function (response) {
            if (response == '1') {
                location.href = "views/inicio";
            } else if (response == '0') {
                Swal.fire({
                    icon: 'error',
                    allowOutsideClick: false,
                    title: 'Error',
                    text: 'Usuario no encontrado o inactivo'
                });
                
            }
        }
    });

    return false;
}