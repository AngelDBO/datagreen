listarEgresos();

function listarServicios(){
    cargarTerceros();
    cargarMedioPago();
    cargarCategoria();
}

function obtenerNombreTercero() {
    const select = document.getElementById("terceroEgreso");
    const nombreTercero = select.options[select.selectedIndex].text;
    document.getElementById("nombreTercero").value = nombreTercero;
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
        success: (response) => {
            const data = JSON.parse(response);
            if (data.length > 0) {
                let select = `<option value='' disabled selected>Seleccione</option>`;
                data.forEach(element => {
                    select = select + `<option value="${element.id}">${element.empresa}</option>`;
                });
                document.getElementById('terceroEgreso').innerHTML = select;
                document.getElementById('terceroEgresoEdit').innerHTML = select;
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
    const formdata = new FormData(document.getElementById('frmEgreso'));
    $.ajax({
        url: './../controllers/EgresoController.php?opcion=registroEgreso',
        type: 'post',
        datatype: 'html',
        data: formdata,
        cache: false,
        contentType: false,
        processData: false,
        success: (response) => {
            if (response == 1) {
                $('#tablaEgresos').DataTable().ajax.reload(null, false);
                $('#frmEgreso')[0].reset();
                $('#registroEgreso').modal('hide');   
            }else if(response !== 1){
                $('#erroresEgreso').html(response);
            }
        }
    });
    return false;
}

function editarEgreso(id) {
    listarServicios();
    setTimeout(() => {
        $.ajax({
            type: 'POST',
            data: 'id=' + id,
            url: './../controllers/EgresoController.php?opcion=editarEgreso',
            success: function (response) {
                var data = JSON.parse(response);
                $('#egresoUpdateID').val(data.id);
                $('#terceroEgresoEdit').val(data.empresa_id);
                $('#categoria_egresoEdit').val(data.categoria_id);
                $('#montoU').val(data.monto);
                $('#medioPagoEgresoEdit').val(data.medioPago_id);
                $('#descripcionIngresoU').val(data.descripcion);
            }
        });
    },100);
    return false;
}

function actualizarEgreso() {
    $.ajax({
        type: 'post',
        url: './../controllers/EgresoController.php?opcion=actualizarEgreso',
        data: $('#frmActualizarIngreso').serialize(),
        success: (response) => {
            Swal.fire(response);
            $('#tablaEgresos').DataTable().ajax.reload(null, false);
            $('#editarEgreso').modal('hide');
            //$('#erroresEgresoEditar').html(response);
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
        
function cargarAnexo(id) {
    $.ajax({
        type: 'post',
        url: './../controllers/EgresoController.php?opcion=cargarAnexo',
        data: 'id=' + id,
        success: response =>{
            var data = JSON.parse(response);
            $('#AnexoEgreso').empty().append('<img src="' + data.anexo + '" width="auto">');
            document.getElementById('IDAnexoRemover').value = data.id;
            document.getElementById('IDAnexoActualizar').value = data.id;
        }
    });
}

function reset() {
    document.getElementById('agregarAnexoEgreso').value = '';
}

function file() {
    const fileName = document.getElementById('agregarAnexoEgreso').files[0].name;
    const extension = fileName.split('.').pop();
    const arrExtensiones = ['pdf', 'jpg', 'png'];
    if (arrExtensiones.includes(extension)) {
        document.getElementById("tempFile").innerHTML =
            `<div class="alert alert-success alert-dismissible pb-2 pt-2" role="alert">
                <strong> ${fileName} </strong>
                <button class="close" type="button" data-dismiss="alert" onclick="reset()" id="btn-close">
                    <span aria-hidden="true"><i class="uil uil-trash-alt" style="font-size: 20px"></i></span>
                </button>
            </div>`;
    } else {
        Swal.fire({
            showCancelButton: false,
            allowOutsideClick: false,
            icon: 'warning',
            text: "Archivo no permitido!"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('btn-close').click();
            }
        });
    }
}

function fileUpdate() {
    const fileName = document.getElementById('updateAnexo').files[0].name;
    const extension = fileName.split('.').pop();
    const arrExtensiones = ['pdf', 'jpg', 'png', 'jpeg'];
    if (arrExtensiones.includes(extension)) {
        document.getElementById("anexoTempUpdate").innerHTML =
            `<div class="alert alert-success alert-dismissible pb-2 pt-2" role="alert">
                <strong> ${fileName} </strong>
                <button class="close" type="button" data-dismiss="alert" onclick="reset()" id="btn-closeUpdate">
                    <span aria-hidden="true"><i class="uil uil-trash-alt" style="font-size: 20px"></i></span>
                </button>
            </div>`;
    } else {
        Swal.fire({
            showCancelButton: false,
            allowOutsideClick: false,
            icon: 'warning',
            text: "Archivo no permitido!"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('updateAnexo').value = '';
            }
        });
    }
}

function eliminarAnexo() {
    const idAnexo = $("#IDAnexoRemover").val();
    Swal.fire({
        title: 'Desea remover este anexo?',
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
                data: 'idAnexo='+ idAnexo,
                url: './../controllers/EgresoController.php?opcion=eliminarAnexo',
                success: (response) =>{
                    console.log(response);
                    /*if(response == 1) {
                        $('#tablaEgresos').DataTable().ajax.reload(null, false);
                        Swal.fire(
                            'Borrado!',
                            'Anexo eliminado con éxito!.',
                            'success'
                        )
                    }*/
                }
            });
        }
    });
}

function modificarAnexo(){
    const idAnexo = $("#IDAnexoActualizar").val();
    document.getElementById("codigoAnexo").value = idAnexo;
    console.log($("#codigoAnexo").val());
}

function actualizarAnexo() {
    const formdata = new FormData(document.getElementById('frmActualizarAnexo'));
    $.ajax({
        url: './../controllers/EgresoController.php?opcion=cambiarAnexo',
        type: 'post',
        datatype: 'html',
        data: formdata,
        cache: false,
        contentType: false,
        processData: false,
        success: (response) => {
            Swal.fire({
                text: response,
                icon: 'info',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#tablaEgresos').DataTable().ajax.reload(null, false);
                    $('#exampleModal').modal('hide');
                    $('#modalAnexoEgreso').modal('hide');
                    document.getElementById('updateAnexo').value = '';
                    document.getElementById('anexoTempUpdate').innerHTML = '';
                }
            })
        }
    });
    return false;
}