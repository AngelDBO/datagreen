listarTerceros();
listarMedioPago();
listarIngresos();

function listarIngresos() {
    var table = $('#Tableingresos').dataTable({
        "bProcessing": true,
        "serverSide": false,
        "responsive": true,
        "bFilter": true,
        "ajax": "./../controllers/IngresoController.php?opcion=listarIngresos",
        "bPaginate": true,
        "sInfo": true,
        "dom": 'lBfrtip',
        "buttons": [
            'excel', 'print'
        ],
        language: {
            'url': "../public/vendor/datatable/es_es.json"
        },
        "aoColumns": [
            {mData: 'empresa'},
            {mData: 'monto'},
            {mData: 'medioPago'},
            {mData: 'descripcion'},
            {mData: 'fechaRegistro'},
            {mData: 'acciones'}
        ]
    });
}

function listarTerceros() {
    $.ajax({
        type: 'GET',
        url: './../controllers/IngresoController.php?opcion=listarTerceros',
        success: function (response) {
            data = $.parseJSON(response);
            if (data.length > 0) {
                select = "<option value='' disabled selected>Seleccione</option>";
                $.each(data, function (key, value) {
                    select = select + "<option value=" + value['id'] + ">" + value['empresa'] + "</option>";
                });
                $('#terceroIngreso').html(select);
                //$('#terceroEgresoEdit').html(select);
            }
        }
    });
}

function listarMedioPago() {
    $.ajax({
        type: 'GET',
        url: './../controllers/IngresoController.php?opcion=listarMedioPago',
        success: function (response) {
            data = $.parseJSON(response);
            if (data.length > 0) {
                select = "<option value='' disabled selected>Seleccione</option>";
                $.each(data, function (key, value) {
                    select = select + "<option value=" + value['id'] + ">" + value['nombre'] + "</option>";
                });
                $('#medioPagoIngreso').html(select);
                //$('#terceroEgresoEdit').html(select);
            }
        }
    });
}

function registrarIngreso() {
    $.ajax({
        type: 'POST',
        url: './../controllers/IngresoController.php?opcion=registrarIngreso',
        data: $('#frmIngreso').serialize(),
        success: function (response) {
            if (response == 1) {
                $('#Tableingresos').DataTable().ajax.reload(null, false);//Refrescar datatable luego de guardar
                $('#registroIngreso').modal('hide');  //Ocultar modal registrar 
            }
        }
    });
    return false;
}