listarPagos();


function registrarRol() {
    $.ajax({
        type: 'post',
        data: $('#frmRol').serialize(),
        url: './../controllers/RoleController.php?opcion=registrarRol',
        success: function (response) {
            alert(response);
        }
    });
    return false;
}

function listarPagos() {
    var table = $('#tablaRoles').dataTable({
        "bProcessing": true,
        "serverSide": false,
        "responsive": true,
        "bFilter": true,
        "ajax": "./../controllers/RoleController.php?opcion=listarRoles",
        "bPaginate": true,
        "sInfo": true,
        "sPaginationType": "full_numbers",
        "iDisplayLength": 10,
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No encontrado - lo siento",
            "info": "Mostrando pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay datos disponibles",
            "infoFiltered": "(filtered from _MAX_ total records)"
        },
        "aoColumns": [
            {mData: 'nombre'},
            {mData: 'descripcion'},
            {mData: 'estado'},
            {mData: 'acciones'}
        ]
    });
}

function obtenerPermisos(id){
    console.log(id);
}