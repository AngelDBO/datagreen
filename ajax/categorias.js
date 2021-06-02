listarCategorias();

function listarCategorias() {
    let table = $('#tablaCategoria').dataTable({
        "bProcessing": true,
        "serverSide": false,
        "responsive": true,
        "bFilter": true,
        "ajax": "./../controllers/CategoriaController.php?opcion=listarCategorias",
        "bPaginate": true,
        "sInfo": true,
        "language": {
            "url": "../public/vendor/datatable/es_es.json"
        },
        "aoColumns": [
            {mData: 'nombre'},
            {mData: 'fecha'},
            {mData: 'OP'}
        ]
    });
}

function registrarCategoria() {
    $.ajax({
        type: 'post',
        data: $('#frmCategoria').serialize(),
        url: './../controllers/CategoriaController.php?opcion=registrarCategoria',
        success: function (response) {
            console.log(response);
            $('#tablaCategoria').DataTable().ajax.reload(null, false);//Refrescar datatable luego de guardar
        }
    });

    return false;
}

function editarCategoria(id) {
    $.ajax({
        type: 'post',
        data: 'id=' + id,
        url: './../controllers/CategoriaController.php?opcion=editarCategoria',
        success: (response) => {
            let data = JSON.parse(response);
            $('#IDregistroU').val(data.id);
            $('#nombreCategoriaU').val(data.nombre);
        }
    });
}

function actualizarCategoria() {
    $.ajax({
        type: 'post',
        data: $('#frmActualizarCategoria').serialize(),
        url: './../controllers/CategoriaController.php?opcion=actualizarCategoria',
        success: (response) => {
            if (response === '1') {
                $('#tablaCategoria').DataTable().ajax.reload(null, false);//Refrescar datatable luego de guardar
                $('#updateCategoria').modal('hide');
            }
        }
    });
    return false;
}