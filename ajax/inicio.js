window.onload = function () {
    tablaTerceros();
    listarAgenda();
    graficaPagos();
    graficaIngresos();
    graficaEgresos();
    totalTerceros();
    totalPagos();
    totalIngresos();
    totalEgresos();

    $('input[name="fecha"]').daterangepicker();
    $('input[name="fechaU"]').daterangepicker();
};
var color = [
    "rgba(255,99,132,0.4)",
    "rgba(54, 162, 235, 0.4)",
    "rgba(255, 206, 86, 0.4)",
    "rgba(75, 192, 192, 0.4)",
    "rgba(153, 102, 255, 0.4)",
    "rgba(255, 159, 64, 0.4)",
];
var bordercolor = [
    "rgba(255,99,132,1)",
    "rgba(54, 162, 235, 1)",
    "rgba(255, 206, 86, 1)",
    "rgba(75, 192, 192, 1)",
    "rgba(153, 102, 255, 1)",
    "rgba(255, 159, 64, 1)",
];

function tablaTerceros() {
    var table = $("#tablaPrincipal").dataTable({
        responsive: true,
        bFilter: true,
        ajax: "./../controllers/TerceroController.php?opcion=tablaTerceros",
        bPaginate: true,
        sInfo: true,
        language: {
            lengthMenu: "Mostrar _MENU_ registros por pagina",
            zeroRecords: "No encontrado - lo siento",
            info: "Mostrando pagina _PAGE_ de _PAGES_",
            infoEmpty: "No hay datos disponibles",
            infoFiltered: "(filtered from _MAX_ total records)",
        },
        aoColumns: [
            { mData: "empresa" },
            { mData: "web" },
            { mData: "representante" },
            { mData: "correo" },
            { mData: "estado" },
        ],
    });
}

function graficaPagos() {
    $.post(
        "./../controllers/GraficaController.php?opcion=pagosRealizados",
        function (data) {
            var name = [];
            var marks = [];

            for (var i in data) {
                name.push(data[i].Mes);
                marks.push(data[i].Total);
            }

            var chartdata = {
                labels: name,
                datasets: [
                    {
                        label: "Pagos",
                        backgroundColor: color,
                        borderColor: color,
                        borderWidth: 2,
                        hoverBackgroundColor: color,
                        hoverBorderColor: bordercolor,
                        data: marks,
                    },
                ],
            };

            var graphTarget = $("#miGrafico");

            var barGraph = new Chart(graphTarget, {
                type: "bar",
                data: chartdata,
                options: {
                    responsive: true,
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    beginAtZero: true,
                                },
                            },
                        ],
                    },
                },
            });
        }
    );
}

function graficaIngresos() {
    $.post(
        "./../controllers/GraficaController.php?opcion=ingresosRealizados",
        function (data) {
            var name = [];
            var marks = [];

            for (var i in data) {
                name.push(data[i].Mes);
                marks.push(data[i].Total);
            }

            var chartdata = {
                labels: name,
                datasets: [
                    {
                        label: "Ingresos",
                        backgroundColor: color,
                        borderColor: color,
                        borderWidth: 2,
                        hoverBackgroundColor: color,
                        hoverBorderColor: bordercolor,
                        data: marks,
                    },
                ],
            };

            var graphTarget = $("#graficoIngreso");

            var barGraph = new Chart(graphTarget, {
                type: "bar",
                data: chartdata,
                options: {
                    responsive: true,
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    beginAtZero: true,
                                },
                            },
                        ],
                    },
                },
            });
        }
    );
}

function graficaEgresos() {
    $.post(
        "./../controllers/GraficaController.php?opcion=egresosRealizados",
        function (data) {
            var name = [];
            var marks = [];

            for (var i in data) {
                name.push(data[i].Mes);
                marks.push(data[i].Total);
            }

            var chartdata = {
                labels: name,
                datasets: [
                    {
                        label: "Egresos",
                        backgroundColor: color,
                        borderColor: color,
                        borderWidth: 2,
                        hoverBackgroundColor: color,
                        hoverBorderColor: bordercolor,
                        data: marks,
                    },
                ],
            };

            var graphTarget = $("#graficoEgreso");

            var barGraph = new Chart(graphTarget, {
                type: "bar",
                data: chartdata,
                options: {
                    responsive: true,
                    scales: {
                        yAxes: [
                            {
                                ticks: {
                                    beginAtZero: true,
                                },
                            },
                        ],
                    },
                },
            });
        }
    );
}

function registrarActividad() {
    $.ajax({
        type: "POST",
        data: $("#frmActividad").serialize(),
        url: "./../controllers/AgendaController.php?opcion=registrarAgenda",
        success: function (data) {
            if (data == "1") {
                $("#Tableagenda").DataTable().ajax.reload(null, false); //Refrescar datatable luego de guardar
                $("#modalActividad").modal("hide"); //Ocultar modal registrar
                $("#frmActividad")[0].reset();
                Swal.fire("Exito!", "Actividad guardada con éxito!", "success");
            }
        },
    });
    return false;
}

function listarAgenda() {
    var table = $("#Tableagenda").dataTable({
        bProcessing: true,
        serverSide: false,
        responsive: true,
        bFilter: false,
        ajax: "./../controllers/AgendaController.php?opcion=listarAgenda",
        bPaginate: true,
        sInfo: false,
        sPaginationType: "full_numbers",
        iDisplayLength: 10,
        language: {
            lengthMenu: "Mostrar _MENU_ registros por pagina",
            zeroRecords: "No encontrado - lo siento",
            info: "Mostrando pagina _PAGE_ de _PAGES_",
            infoEmpty: "No hay datos disponibles",
            infoFiltered: "(filtered from _MAX_ total records)",
        },
        aoColumns: [
            { mData: "caja" },
            { mData: "actividad" },
            { mData: "periodo" },
            { mData: "fecha" },
            { mData: "estado" },
            { mData: "editar" },
        ],
    });
}

function finalizarAgenda(id) {
    Swal.fire({
        title: "¿Ha terminado esta tarea?",
        text: "El estado sera finalizada!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#28a745",
        allowOutsideClick: false,
        cancelButtonColor: "#6d6969",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, deseo continuar!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                data: "id=" + id,
                url: "./../controllers/AgendaController.php?opcion=finalizarAgenda",
                success: function (data) {
                    $("#Tableagenda").DataTable().ajax.reload(null, false); //Refrescar datatable luego de guardar
                    Swal.fire("Exito!", "Actividad finalizada con éxito!", "success");
                },
            });
        }
    });
}

function convertDate(date) {
    var d = date;
    d = d.split(" ")[0];
    return d;
}

function editarAgenda(id) {
    $.ajax({
        type: "POST",
        data: "id=" + id,
        url: "./../controllers/AgendaController.php?opcion=editarAgenda",
        success: function (response) {
            var data = JSON.parse(response);
            $("#IDregistro").val(data.id);
            $("#IDusuario").val(data.id_usuario);
            $("#fechaU").val(data.fecha);
            $("#actividadU").val(data.actividad);
            $("#periodoU").val(data.periodo);
            $("#colorU").val(data.color);
        },
    });
}

function actualizarActividad() {
    $.ajax({
        type: "POST",
        data: $("#frmEditarAgenda").serialize(),
        url: "./../controllers/AgendaController.php?opcion=actualizarAgenda",
        success: function (data) {
            $("#Tableagenda").DataTable().ajax.reload(null, false); //Refrescar datatable luego de guardar
            $("#modalEditar").modal("hide"); //Ocultar modal registrar
            Swal.fire("Exito!", "Actividad actualizada con éxito!", "success");
        },
    });
    return false;
}

async function totalTerceros() {
    await fetch("./../controllers/GraficaController.php?opcion=totalTerceros")
        .then((response) => response.json())
        .then((json) =>  $("#numTerceros").html("Total: " + json.Total));
}

async function totalPagos() {
    await fetch("./../controllers/GraficaController.php?opcion=totalPagos")
        .then((response) => response.json())
        .then((json) => $("#numPagos").html(accounting.formatMoney(json.Total)));
}

async function totalIngresos() {
    await fetch("./../controllers/GraficaController.php?opcion=totalIngresos")
        .then((response) => response.json())
        .then((json) => $("#numIngresos").html(accounting.formatMoney(json.Total)));
}

async function totalEgresos() {
    await fetch("./../controllers/GraficaController.php?opcion=totalEgresos")
        .then((response) => response.json())
        .then((json) => $("#numEgresos").html(accounting.formatMoney(json.Total)));
}
