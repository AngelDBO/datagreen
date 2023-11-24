init();
listarArchivos();
listarCategoria();

function init() {
    $("#alerta").hide();
}

function reset() {
    document.getElementById("files").value = "";
}

function file() {
    const fileName = document.getElementById("files").files[0].name;
    const extension = fileName.split(".").pop();
    const arrExtensiones = [
        "pdf",
        "jpg",
        "png",
        "docx",
        "txt",
        "pptx",
        "xlsx",
        "xls",
    ];
    if (arrExtensiones.includes(extension)) {
        document.getElementById(
            "tempFile"
        ).innerHTML = `<div class="alert alert-primary alert-dismissible pb-2 pt-2" role="alert">
                    <strong> ${fileName} </strong>
                    <button class="close" type="button" data-dismiss="alert" onclick="reset()" id="btn-close">
                        <span aria-hidden="true"><i class="zmdi zmdi-delete"></i></span>
                    </button>
                </div>`;
    } else {
        Swal.fire({
            showCancelButton: false,
            allowOutsideClick: false,
            icon: "warning",
            text: "Archivo no permitido!",
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById("btn-close").click();
            }
        });
    }
}

function listarCategoria() {
    $.ajax({
        type: "get",
        url: "./../controllers/ArchivoController.php?opcion=listarCategoriaArchivo",
        success: (response) => {
            let data = JSON.parse(response);
            let select = `<option value='' selected disabled>Seleccione</option>`;
            data.forEach((element) => {
                select =
                    select + `<option value='${element.id}'>${element.nombre}</option>`;
            });
            document.getElementById("categoriaArchivo").innerHTML = select;
        },
    });
}

function subirArchivo() {
    let formdata = new FormData(document.getElementById("frmUpload"));
    $.ajax({
        url: "./../controllers/ArchivoController.php?opcion=registrarArchivo",
        type: "post",
        data: formdata,
        cache: false,
        contentType: false,
        processData: false,
        success: (response) => {
            if (response === "1") {
                $("#tableArchivos").DataTable().ajax.reload(null, false); //Refrescar datatable luego de guardar
                $("#frmUpload")[0].reset();
            }
        },
    });
    return false;
}

function listarArchivos() {
    let table = $("#tableArchivos").dataTable({
        bProcessing: true,
        serverSide: false,
        responsive: true,
        bFilter: true,
        ajax: "./../controllers/ArchivoController.php?opcion=listarArchivos",
        bPaginate: true,
        sInfo: true,
        iDisplayLength: 10,
        aoColumns: [
            { mData: "nombre" },
            { mData: "categoria" },
            { mData: "url" },
            { mData: "fechaRegistro" },
            { mData: "OP" },
        ],
    });
}
function cargarArchivo(id) {
    $.ajax({
        type: "post",
        url: "./../controllers/ArchivoController.php?opcion=visualizarArchivo",
        data: "id=" + id,
        success: (response) => {
            document.getElementById("cargarArchivo").innerHTML = response;
            document.oncontextmenu = function () {
                return false;
            };
        },
    });
}

function listarUsuarios() {
    $.get(
        "./../controllers/ArchivoController.php?opcion=listarUsuarios",
        (response) => {
            let data = JSON.parse(response);
            let select = `<option value='' selected disabled>Seleccione</option>`;
            data.forEach((element) => {
                select =
                    select + `<option value='${element.id}'>${element.usuario}</option>`;
            });
            document.getElementById("usuarioCompartir").innerHTML = select;
        }
    );
}

function compartirArchivo(id) {
    listarUsuarios();
    document.getElementById("codigoArchivoCompartido").value = id;
}

function compartir() {
    $.ajax({
        type: "post",
        data: $("#frmCompartir").serialize(),
        url: "./../controllers/ArchivoController.php?opcion=compartir",
        success: (response) => {
            console.log(response);
        },
    });
    return false;
}

function obtenerArchivosCompartidos() {
    $.ajax({
        type: "get",
        url: "./../controllers/ArchivoController.php?opcion=archivosCompatidos",
        success: (data) => {
            let result = JSON.parse(data);
            table.clear();
            table.rows.add(result).draw();
        },
    });
}

let table = $("#tablaShared").DataTable({
    responsive: true,
    bInfo: false,
    language: {
        url: "../public/vendor/datatable/es_es.json",
    },
    columns: [
        { data: "propietario" },
        { data: "nombre" },
        { data: "acciones" },
        { data: "fechaCompartido" },
    ],
});

function verArchivoCompartido(id) {
    $.ajax({
        type: "post",
        url: "./../controllers/ArchivoController.php?opcion=verArchivoCompartido",
        data: "id=" + id,
        success: (response) => {
            console.log(response);
            document.getElementById("cargarArchivoCompartido").innerHTML = response;
        },
    });
}

function openFolder(obj){
    var name_folder = $(obj).text();
    $("#folder_name").html(name_folder);
    $("#secction_folder").hide();
    $("#secction_folder_open").show();
}

function backTop(){
    $("#folder_name").html("");
    $("#secction_folder").show();
    $("#secction_folder_open").hide();
}
document.addEventListener("DOMContentLoaded", (event) => {

});
