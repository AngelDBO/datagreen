listarEgresos();

function listarServicios(){
    cargarTerceros();
    cargarMedioPago();
    cargarCategoria();
}

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
            {mData: 'categoria'},
            {mData: 'acciones'},
            {mData: 'fechaRegistro'},
            {mData: 'descripcion'}
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

function cargarCategoria(){
    $.ajax({
        type: 'get',
        url: './../controllers/EgresoController.php?opcion=listarCategoria',
        success: function (response) {
            data = $.parseJSON(response);
            if (data.length > 0) {
                select = "<option value='' disabled selected>Seleccione</option>";
                $.each(data, function (key, value) {
                    select = select + "<option value=" + value['id'] + ">" + value['nombre'] + "</option>";
                });
                $('#categoria_egreso').html(select);
                $('#categoria_egresoEdit').html(select);
            }
        }
    });
}

function registrarEgreso() {
    $.ajax({
        type: 'POST',
        data: $('#frmIngreso').serialize(),
        url: './../controllers/EgresoController.php?opcion=registroEgreso',
        success: function (data) {
            console.log(data);
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
    
function eliminarEgreso(id){
    Swal.fire({
        title: 'Desea eliminar este documento?',
        text: "Esta accion será reversible!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#434190',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        allowOutsideClick: false,
        confirmButtonText: 'Si, deseo hacerlo!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'post',
                data: 'id='+ id,
                url: './../controllers/EgresoController.php?opcion=eliminarEgreso',
                success: (response) =>{
                    if(response == 1) {
                        $('#tablaEgresos').DataTable().ajax.reload(null, false);
                        Swal.fire(
                            'Borrado!',
                            'Documento eliminado con éxito!.',
                            'success'
                        )
                    }
                }
            });
        }
    });
}