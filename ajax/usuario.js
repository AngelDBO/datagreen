listarUsuarios();

function registrarUsuario() {
    $.ajax({
        type: 'POST',
        url: "./../controllers/UsuarioController.php?opcion=registrarUsuario",
        data: $("#frmRegistroUsuario").serialize(),
        success: function (response) {
            console.log(response);
        }
    });
    return false;
}


function listarUsuarios() {
    let table = $('#tablaUsuarios').dataTable({
        "bProcessing": true,
        "serverSide": false,
        "responsive": true,
        "bFilter": true,
        "ajax": "./../controllers/UsuarioController.php?opcion=listarUsuarios",
        "bPaginate": true,
        "sInfo": true,
        language: {
            'url': "../public/vendor/datatable/es_es.json"
        },
        "aoColumns": [
            {mData: 'nombre'},
            {mData: 'apellido'},
            {mData: 'usuario'},
            {mData: 'correo'},
            {mData: 'rol'},
            {mData: 'estado'},
            {mData: 'fechaRegistro'},
            {mData: 'acciones'}
        ]
    });
}

function editarUsuario(id) {
    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: './../controllers/UsuarioController.php?opcion=editarUsuario',
        success: function (response) {
            var data = JSON.parse(response);
            $('#IDregistro').val(data.id);
            $('#nombreU').val(data.nombre);
            $('#apellidoU').val(data.apellido);
            $('#usuarioU').val(data.usuario);
            $('#correoU').val(data.email);
            $('#rolU').val(data.rol);
            $('#estadoU').val(data.estado);
        }
    });
}

function actualizarUsuario() {
    $.ajax({
        type: 'post',
        data: $('#frmActualizarUsuario').serialize(),
        url: './../controllers/UsuarioController.php?opcion=actualizarUsuario',
        success: function (response) {
            if (response == '1') {
                $('#tablaUsuarios').DataTable().ajax.reload(null, false);//Refrescar datatable luego de guardar
                $('#modalEditar').modal('hide');  //Ocultar modal registrar 
            } else {
                $('#errorsEditar').html(response);
            }
        }
    });

    return false;
}

function editarPassword(id) {
    $('#IDregistroPassword').val(id);
}

function actualizarPassword() {
    $.ajax({
        type: 'post',
        data: $('#frmActualizarPassword').serialize(),
        url: './../controllers/UsuarioController.php?opcion=actualizarPassword',
        success: function (response) {
            if (response == '1') {
                console.log("Pass updated");
            } else {
                $('#erroresPassword').html(response);
            }

        }
    });

    return false;
}