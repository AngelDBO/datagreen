listarMedios();

function registrarMedio() {
    $.ajax({
        type: 'post',
        data: $('#frmRegistrarPago').serialize(),
        url: './../controllers/MedioPagoController.php?opcion=registrarMedioPago',
        success: function (response) {
            if (response) {
                $('#tablaMedios').DataTable().ajax.reload(null, false);//Refrescar datatable luego de guardar
                $('#exampleModal').modal('hide');  //Ocultar modal registrar 
            } else {
                console.log("Error al actulizar");
            }
        }
    });
    return false;
}

function listarMedios() {
    var table = $('#tablaMedios').dataTable({
        "bProcessing": true,
        "serverSide": false,
        "responsive": true,
        "bFilter": true,
        "ajax": "./../controllers/MedioPagoController.php?opcion=listarMedioPago",
        "bPaginate": true,
        "sInfo": true,
        "sPaginationType": "full_numbers",
        "columnDefs": [
            {"className": "dt-center", "targets": "_all"}
        ],
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
            {mData: 'estado'},
            {mData: 'fechaRegistro'},
            {mData: 'editar'}
        ]
    });
}

function editarMedio(id) {
    $.ajax({
        type: 'post',
        data: 'id=' + id,
        url: './../controllers/MedioPagoController.php?opcion=editarMedio',
        success: function (response) {
            let data = JSON.parse(response);
            console.log(data);
            $('#IDregistroU').val(data.id);
            $('#nombreMedioU').val(data.nombre);
            $('#estadoMedio').val(data.estado);
        }
    });
}

function actualizarMedio() {
    $.ajax({
        type: 'post',
        data: $('#frmActualizarPago').serialize(),
        url: './../controllers/MedioPagoController.php?opcion=actualizarMedio',
        success: function (response) {
            if (response) {
                $('#tablaMedios').DataTable().ajax.reload(null, false);//Refrescar datatable luego de guardar
                $('#updateMedio').modal('hide');  //Ocultar modal registrar 
            } else {
                console.log("Error al actulizar");
            }
        }
    });

    return false;
}