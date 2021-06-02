listarPagos();
cargarTercero();
cargarMedioPago();

$("#tercero").change(function () {
    $('#nombreTercero').val($("#tercero option:selected").text());
});
$("#terceroU").change(function () {
    $('#nombreTerceroU').val($("#terceroU option:selected").text());
});

$("input[type='file']").on("change", function () {
    if (this.files[0].size > 2097152) {
        Swal.fire({
            showCancelButton: false,
            allowOutsideClick: false,
            icon: 'warning',
            text: "El archivo supera el tamaño permitido!"
        });
        $(this).val('');
    } else {
        validar($('#comprobante').val());
    }
});

function listarPagos() {
    var table = $('#tablaPagos').dataTable({
        "bProcessing": true,
        "serverSide": false,
        "responsive": true,
        "bFilter": true,
        "ajax": "./../controllers/PagoController.php?opcion=listarPagos",
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
            {mData: 'mesPago'},
            {mData: 'monto'},
            {mData: 'fechaPago'},
            {mData: 'nombre'},
            {mData: 'fechaRegistro'},
            {mData: 'OP'}
        ]
    });
}

function validar(archivo) {
    var aux = archivo.split('.');
    if (aux[aux.length - 1] === 'jpg' || aux[aux.length - 1] === 'png' || aux[aux.length - 1] === 'pdf') {
        return true;
    } else {
        Swal.fire({
            showCancelButton: false,
            allowOutsideClick: false,
            icon: 'warning',
            text: "Archivo no permitido!"
        });
        $('#comprobante').val('');
        return false;
    }
}



function cargarTercero() {
    $.ajax({
        url: './../controllers/PagoController.php?opcion=cargarTercero',
        type: 'get',
        success: function (response) {
            data = $.parseJSON(response);
            if (data.length > 0) {
                select = "<option value='' disabled selected>Seleccione</option>";
                $.each(data, function (key, value) {
                    select = select + "<option value=" + value[0] + ">" + value[1] + "</option>";
                });
                $('#tercero').html(select);
                $('#terceroU').html(select);
            }
        }
    });
}

function cargarMedioPago() {
    $.ajax({
        url: './../controllers/PagoController.php?opcion=cargarMedioPago',
        type: 'get',
        success: function (response) {
            data = $.parseJSON(response);
            if (data.length > 0) {
                select = "<option value='' disabled selected>Seleccione</option>";
                $.each(data, function (key, value) {
                    select = select + "<option value=" + value[0] + ">" + value[1] + "</option>";
                });
                $('#medioPago').html(select);
                $('#medioPagoU').html(select);
            }
        }
    });
}

function registrarPago() {
//console.log($('#nombreTercero').val());
    let formdata = new FormData(document.getElementById('frmPago'));
    $.ajax({
        url: './../controllers/PagoController.php?opcion=registrarPago',
        type: 'post',
        datatype: 'html',
        data: formdata,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
            $("#loaderDiv").html('<img src="../public/images/load.gif" alt="Wait" />');
        },
        complete: function () {
            $("#loaderDiv").hide();
        },
        success: function (response) {
            $('#tablaPagos').DataTable().ajax.reload(null, false);//Refrescar datatable luego de guardar
            
            Swal.fire({
                showCancelButton: false,
                allowOutsideClick: false,
                icon: 'success',
                text: response
            });
            $('#frmPago')[0].reset();
            $('#modalRegistrar').modal('hide');
        }
    });
    return false;
}

function convertDate(date) {
    var d = date;
    d = d.split(' ')[0];
    return d;
}

function editarPago(id) {
    $.ajax({
        type: 'post',
        url: './../controllers/PagoController.php?opcion=editarPago',
        data: 'id=' + id,
        success: function (response) {
            var data = JSON.parse(response);
            console.log(data);
            $('#TerceroUpdate').val(data.id);
            $('#nombreTerceroUpdate').val(data.id);
            $('#terceroU').val(data.empresa_id);
            $('#nombreTerceroU').val($("#terceroU option:selected").text());
            $('#mesU').val(data.mesPago);
            $('#montoU').val(data.monto);
            $('#medioPagoU').val(data.medioPago_id);
            $('#fechaPagoU').val(convertDate(data.fechaPago));
            $('#comprobanteU').val(data.comprobante);
            $('#descripcionU').val(data.descripcion);
        }
    });
    return false;
}
function ActualizarPago() {
    let formdata = new FormData(document.getElementById('frmPagoUpdate'));
    $.ajax({
        url: './../controllers/PagoController.php?opcion=actualizarPago',
        type: 'post',
        datatype: 'html',
        data: formdata,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            $('#tablaPagos').DataTable().ajax.reload(null, false);//Refrescar datatable luego de guardar
            $('#frmPagoUpdate')[0].reset();
            $('#frmPagoUpdate').modal('hide');
            console.log(response);
        }
    });
    return false;
}

function cargarArchivo(id) {
    $.ajax({
        type: 'post',
        url: './../controllers/PagoController.php?opcion=obtenerArchivo',
        data: 'id=' + id,
        success: function (response) {
            var data = JSON.parse(response);
            $('#imagenData').empty().append('<img src="' + data.comprobante + '" width="auto">');
        }
    });
}