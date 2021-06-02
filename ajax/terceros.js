listarTerceros();
listarDepartamentos();

function registrarTercero() {

    $.ajax({
        type: 'post',
        data: $('#frmTercero').serialize(),
        url: './../controllers/TerceroController.php?opcion=registrar',
        success: function (response) {
            if (response == "1") {
                $('#tablaTerceros').DataTable().ajax.reload(null, false);//Refrescar datatable luego de guardar
                //$('#frmTercero')[0].reset(); //Vaciar campos luego de guardar
                //$('#exampleModal').modal('hide');  //Ocultar modal registrar 
            } else {
                $('#errores').html(response);
            }
        }
    });

    return false;
}


function listarTerceros() {
    var table = $('#tablaTerceros').dataTable({
        "bProcessing": true,
        "serverSide": false,
        "responsive": true,
        "bFilter": true,
        "ajax": "./../controllers/TerceroController.php?opcion=listarTerceros",
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
            { mData: 'empresa' },
            { mData: 'representante' },
            { mData: 'telefono1' },
            { mData: 'celular1' },
            { mData: 'estado' },
            { mData: 'fechaRegistro' },
            { mData: 'OP' }
        ]
    });
}

function listarDepartamentos() {
    $.ajax({
        type: 'get',
        url: './../controllers/TerceroController.php?opcion=listarDepartamentos',
        success: (response) => {
            let data = JSON.parse(response);
            if (data.length > 0) {
                select = "<option value='' disabled selected>Seleccione</option>";
                $.each(data, function (key, value) {
                    select = select + "<option value=" + value['id'] + ">" + value['nombre'] + "</option>";
                });
                $('#departamento').html(select);

            }
        }
    });
}

function listarMunicipio(id) {
    $.ajax({
        type: 'post',
        data: 'id=' + id.value,
        url: './../controllers/TerceroController.php?opcion=listarMunicipios',
        success: (response) => {
            let data = JSON.parse(response);
            if (data.length > 0) {
                select = "";
                $.each(data, function (key, value) {
                    select = select + "<option value=" + value['id'] + ">" + value['nombre'] + "</option>";
                });
                $('#municipio').html(select);

            }
        }
    });
}


function detalleTercero(id) {
    $.ajax({
        type: 'post',
        data: 'id=' + id,
        url: './../controllers/TerceroController.php?opcion=detalleTercero',
        success: function (response) {
            var data = JSON.parse(response);
            if (data.length > 0) {
                $('#Identificacion').val(data[0]['identificacion']);
                $('#Numero').val(data[0]['numero']);
                $('#Empresa').val(data[0]['empresa']);
                $('#Representante').val(data[0]['representante']);
                $('#Representante').val(data[0]['representante']);
                $('#facturaElectronico').val(data[0]['facElectronico']);
                $('#tipoNegocio').val(data[0]['tipoNegocio']);
                $('#estado').val(data[0]['estado']);
                $('#Direccion').val(data[0]['direccion']);
                $('#Telefono1').val(data[0]['telefono1']);
                $('#Telefono2').val(data[0]['telefono2']);
                $('#Celular1').val(data[0]['celular1']);
                $('#Celular2').val(data[0]['celular2']);
                $('#Correo').val(data[0]['correo']);
                $('#web').val(data[0]['web']);
                $('#Cuenta').val(data[0]['membresia']);
                $('#Departamento').val(data[0]['departamento']);
                $('#Municipio').val(data[0]['municipio']);
                $('#fechaRegistro').val(data[0]['fechaRegistro']);
                //$('#Nombre_s_U').val(data[0]['NOMBRE_SENSOR']);
                //$('#RangoU').val(data[0]['RANGO_MEDICION']);
                //$('#Parametro').val(data[0]['PARAMETRO_ID']);
                //$('#PrecisionU').val(data[0]['PRECISION_MEDICION']);
                //$('#EstadoU').val(data[0]['ESTADO_SENSOR']);
            }

        }
    });
}

function editarTercero(id) {
    $.ajax({
        type: 'post',
        data: 'id=' + id,
        url: './../controllers/TerceroController.php?opcion=editarTercero',
        success: function (response) {
            var data = JSON.parse(response);
            if (data.length > 0) {
                $('#idU').val(data[0]['id']);
                $('#identificacionU').val(data[0]['identificacion']);
                $('#numeroU').val(data[0]['numero']);
                $('#empresaU').val(data[0]['empresa']);
                $('#representanteU').val(data[0]['representante']);
                $('#tipoNegocioU').val(data[0]['tipoNegocio']);
                $('#correoU').val(data[0]['correo']);
                $('#webU').val(data[0]['web']);
                $('#facturaElectronicoU').val(data[0]['facElectronico']);
                $('#direccionU').val(data[0]['direccion']);
                $('#telefono1U').val(data[0]['telefono1']);
                $('#telefono2U').val(data[0]['telefono2']);
                $('#celular1U').val(data[0]['celular1']);
                $('#celular2U').val(data[0]['celular2']);
                $('#departamentoU').val(data[0]['departamento']);
                $('#municipioU').val(data[0]['municipio']);
                $('#municipioU').val(data[0]['municipio']);
                $('#cuentaU').val(data[0]['membresia']);
            }
        }
    });
}

function actualizarTercero() {
    $.ajax({
        type: 'post',
        data: $('#frmTerceroUpdate').serialize(),
        url: './../controllers/TerceroController.php?opcion=actualizarTercero',
        success: function (response) {
            if (response == 1) {
                $('#tablaTerceros').DataTable().ajax.reload(null, false);//Refrescar datatable luego de guardar
                $('#ModalUpdate').modal('hide');  //Ocultar modal registrar 
                $('#erroresEdit').html('');
            } else {
                $('#erroresEdit').html(response);
            }
        }
    });
    return false;
}

function editarEstado(id) {
    $.ajax({
        type: 'post',
        data: 'id=' + id,
        url: './../controllers/TerceroController.php?opcion=editarTercero',
        success: function (response) {
            var data = JSON.parse(response);
            if (data.length > 0) {
                $('#idEstado').val(data[0]['id']);
                $('#actualizarEstado').val(data[0]['estado']);
            }
        }
    });
}

function updateEstado() {
    $.ajax({
        type: 'post',
        data: $('#frmEstado').serialize(),
        url: './../controllers/TerceroController.php?opcion=updateEstado',
        success: function (response) {
            $('#tablaTerceros').DataTable().ajax.reload(null, false);//Refrescar datatable luego de guardar
            //$('#frmTerceroUpdate')[0].reset(); //Vaciar campos luego de guardar
            $('#ModalDelete').modal('hide');  //Ocultar modal registrar 
            $('#erroresEstado').html(response);
        }
    });

    return false;

}