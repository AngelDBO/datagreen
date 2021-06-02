listarEgresos();
cargarTerceros();
cargarMedioPago();

function listarEgresos() {
    var table = $('#tablaEgresos').dataTable({
        "bProcessing": true,
        "serverSide": false,
        "responsive": true,
        "bFilter": true,
        "ajax": "./../controllers/EgresoController.php?opcion=listarEgresos",
        "bPaginate": true,
        "sInfo": true,
        "dom": 'lBfrtip',
        "buttons": [
            'excel', 'pdf'
        ],
        language: {
            'url': "../public/vendor/datatable/es_es.json"
        },
        "aoColumns": [
            {mData: 'tercero'},
            {mData: 'monto'},
            {mData: 'nombre'},
            {mData: 'descripcion'},
            {mData: 'acciones'},
            {mData: 'fechaRegistro'},
        ]
    });
}

function cargarTerceros() {
    $.ajax({
        type: 'get',
        url: './../controllers/EgresoController.php?opcion=listarTercero',
        success: function (response) {
            data = $.parseJSON(response);
            if (data.length > 0) {
                select = "<option value='' disabled selected>Seleccione</option>";
                $.each(data, function (key, value) {
                    select = select + "<option value=" + value['id'] + ">" + value['empresa'] + "</option>";
                });
                $('#terceroEgreso').html(select);
                $('#terceroEgresoEdit').html(select);

            }
        }
    });
}

function cargarMedioPago() {
    $.ajax({
        type: 'get',
        url: './../controllers/EgresoController.php?opcion=listarMedioPago',
        success: function (response) {
            data = $.parseJSON(response);
            if (data.length > 0) {
                select = "<option value='' disabled selected>Seleccione</option>";
                $.each(data, function (key, value) {
                    select = select + "<option value=" + value['id'] + ">" + value['nombre'] + "</option>";
                });
                $('#medioPagoEgreso').html(select);
                $('#medioPagoEgresoEdit').html(select);
            }
        }
    });
}

function registrarEngreso() {
    $.ajax({
        type: 'POST',
        data: $('#frmIngreso').serialize(),
        url: './../controllers/EgresoController.php?opcion=registroEgreso',
        success: function (data) {
            $('#tablaEgresos').DataTable().ajax.reload(null, false);//Refrescar datatable luego de guardar
            $('#registroEgreso').modal('hide');  //Ocultar modal registrar 
        }
    });
    return false;
}

function editarEgreso(id) {
    $.ajax({
        type: 'POST',
        data: 'id=' + id,
        url: './../controllers/EgresoController.php?opcion=editarEgreso',
        success: function (response) {
            var data = JSON.parse(response);
            console.log(data);
            $('#egresoUpdateID').val(data.id);
            $('#terceroEgresoEdit').val(data.empresa_id);
            $('#montoU').val(data.monto);
            $('#medioPagoEgresoEdit').val(data.medioPago_id);
            $('#descripcionIngresoU').val(data.descripcion);
        }
    });
    return false;
}

function actualizarEngreso() {
    $.ajax({
        type: 'POST',
        url: './../controllers/EgresoController.php?opcion=actualizarEgreso',
        data: $('#frmActualizarIngreso').serialize(),
        success: function (response) {
            if (response == 1) {
                Swal.fire(
                        'Exito!',
                        'Egreso actualizado correctamente!',
                        'success'
                        );
                $('#tablaEgresos').DataTable().ajax.reload(null, false);//Refrescar datatable luego de editar
                $('#editarEgreso').modal('hide');  //Ocultar modal editar
                $('#erroresEgresoEditar').html('');
            } else {
                $('#erroresEgresoEditar').html(response);
            }
        }
    });
    return false;
}