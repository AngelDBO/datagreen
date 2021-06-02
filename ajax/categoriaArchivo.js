listarCategoriaArchivo();

function listarCategoriaArchivo() {
    var table = $('#tablaCategoriaArchivo').dataTable({
        "bProcessing": true,
        "serverSide": false,
        "responsive": true,
        "bFilter": true,
        "ajax": "./../controllers/CategoriaArchivoController.php?opcion=listarCategoriaArchivo",
        "bPaginate": true,
        "sInfo": true,
        language: {
            'url': "../public/vendor/datatable/es_es.json"
        },
        "aoColumns": [
            {mData: 'nombre'},
            {mData: 'descripcion'},
            {mData: 'estado'},
            {mData: 'OP'},
            {mData: 'fechaRegistro'}
        ]
    });
}

function registrarCategoriaArchivo() {
    $.ajax({
        type: 'post',
        data: $('#frmCategoria').serialize(),
        url: './../controllers/CategoriaArchivoController.php?opcion=registrarCategoriaArchivo',
        success: (response) => {
            console.log(response);
            $('#tablaCategoriaArchivo').DataTable().ajax.reload(null, false);
            $('#frmCategoria')[0].reset();
        }
    });
    return false;
}