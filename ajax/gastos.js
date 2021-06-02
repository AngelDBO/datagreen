listarGastos();
listarTerceros();
listarMediosPagos();
listarCategorias();

function listarGastos() {
    let table = $('#TableGastos').dataTable({
        "bProcessing": true,
        "serverSide": false,
        "responsive": true,
        "bFilter": true,
        "ajax": "./../controllers/GastoController.php?opcion=listarGastos",
        "bPaginate": true,
        language: {
            'url': "../public/vendor/datatable/es_es.json"
        },
        "aoColumns": [
            {mData: 'tercero'},
            {mData: 'monto'},
            {mData: 'medio'},
            {mData: 'categoria'},
            {mData: 'nota'},
            {mData: 'OP'},
            {mData: 'fecha'}
        ]
    });
}

function listarTerceros() {
    $.ajax({
        type: 'get',
        url: './../controllers/GastoController.php?opcion=listarTerceros',
        success: (response) => {
            let data = $.parseJSON(response);
            if (data.length > 0) {
                select = "<option value='' disabled selected>Seleccione</option>";
                $.each(data, function (key, value) {
                    select = select + "<option value=" + value['id'] + ">" + value['empresa'] + "</option>";
                });
                $('#terceroGasto').html(select);
                $('#terceroGastoU').html(select);
            }
        }
    });
}

function listarMediosPagos() {
    $.ajax({
        type: 'get',
        url: './../controllers/GastoController.php?opcion=listarMediosPagos',
        success: (response) => {
            let data = $.parseJSON(response);
            if (data.length > 0) {
                select = "<option value='' disabled selected>Seleccione</option>";
                $.each(data, function (key, value) {
                    select = select + "<option value=" + value['id'] + ">" + value['nombre'] + "</option>";
                });
                $('#medioGasto').html(select);
                $('#medioGastoU').html(select);
            }
        }
    });
}

function listarCategorias() {
    $.ajax({
        type: 'get',
        url: './../controllers/GastoController.php?opcion=listarCategorias',
        success: (response) => {
            let data = $.parseJSON(response);
            if (data.length > 0) {
                select = "<option value='' disabled selected>Seleccione</option>";
                $.each(data, function (key, value) {
                    select = select + "<option value=" + value['id'] + ">" + value['nombre'] + "</option>";
                });
                $('#categoriaGasto').html(select);
                $('#categoriaGastoU').html(select);
            }
        }
    });
}

function registrarGasto() {
    $.ajax({
        type: 'post',
        data: $('#frmGasto').serialize(),
        url: './../controllers/GastoController.php?opcion=registrarGasto',
        success: (response) => {
            console.log(response);
            $('#TableGastos').DataTable().ajax.reload(null, false);//Refrescar datatable luego de guardar
            $('#registroGasto').modal('hide');  //Ocultar modal registrar 
        }
    });
    return false;
}

function editarGasto(id) {
    $.ajax({
        type: 'post',
        data: 'id=' + id,
        url: './../controllers/GastoController.php?opcion=editarGasto',
        success: (response) => {
            let data = JSON.parse(response);
            console.log(data.id_tercero);
            $('#registroIDU').val(data.id);
            $('#terceroGastoU').val(data.id_tercero);
            $('#montoU').val(data.monto);
            $('#medioGastoU').val(data.id_mediopago);
            $('#categoriaGastoU').val(data.id_categoria);
            $('#descripcionGastoU').val(data.descripcion);
        }
    });
}

function actualizarGasto() {
    $.ajax({
        type: 'post',
        data: $('#frmActualizarGasto').serialize(),
        url: './../controllers/GastoController.php?opcion=actualizarGasto',
        success: (response) => {
            console.log(response)
            $('#TableGastos').DataTable().ajax.reload(null, false);//Refrescar datatable luego de guardar
            $('#EditarGasto').modal('hide');  //Ocultar modal registrar 
        }
    });
    return false;
}