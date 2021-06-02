listarTerceros();

$(function () {
    var start = moment().subtract(29, 'days');
    var end = moment();
    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#fechaC').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
            'Hoy': [moment(), moment()],
            'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Ultimos 7 Dias': [moment().subtract(6, 'days'), moment()],
            'Ultimos 30 Dias': [moment().subtract(29, 'days'), moment()],
            'Este mes': [moment().startOf('month'), moment().endOf('month')],
            'El mes pasado': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);
    cb(start, end);
});

function listarTerceros() {
    $.ajax({
        type: 'get',
        url: './../controllers/DetalleController.php?opcion=listarTerceros',
        contentType: "application/json",
        success: function (response) {
            data = $.parseJSON(response);
            select = "<option value='' disabled selected>Seleccione</option>";
            $.each(data, function (key, value) {
                select = select + "<option value=" + value['id'] + ">" + value['empresa'] + "</option>";
            });
            $('#listadoTercero').html(select);
        }
    });
}

function getDT() {
    $.ajax({
        type: 'post',
        data: $('#frmDetalle').serialize(),
        url: './../controllers/DetalleController.php?opcion=consultaTercero',
        success: (data) => {
            let result = JSON.parse(data);
            let Pago = crearArr(arr('Pago', result.data));
            let Ingreso = crearArr(arr('Ingreso', result.data));
            let Egreso = crearArr(arr('Egreso', result.data));
            let Gasto = crearArr(arr('Gasto', result.data));
            let Meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Noviembre', 'Diciembre'];
            table.clear();
            table.rows.add(result.data).draw();
            grafica(Pago, Ingreso, Egreso, Gasto, Meses);
            barGraph.update();
        }
    });
}

var table;
table = $('#tablaDetalle').DataTable({
    responsive: 'true',
    dom: 'lBfrtip',
    buttons: ['excel', 'pdf'],
    columns: [
        {"data": "tipo"},
        {"data": "fechaRegistro"},
        {"data": "monto"},
        {"data": "nombre"},
        {"data": "descripcion"},
        {"data": "usuario"}
    ],
    language: {
        "lengthMenu": "Mostrar _MENU_ registros por pagina",
        "zeroRecords": "No encontrado - lo siento",
        "info": "Mostrando pagina _PAGE_ de _PAGES_",
        "search": "Buscar:",
        "infoEmpty": "No hay datos disponibles",
        "infoFiltered": "(filtered from _MAX_ total records)",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        }
    }
}
);

function arr(valor, arr) {
    let count = 0;
    $.each(arr, function (key, value) {
        if (value['tipo'] === valor)
            count++;
    });
    return count;
}

function crearArr(numero) {
    let arrayOfDigits = Array.from(String(numero), Number);
    return arrayOfDigits;
}

function grafica(Pago, Ingreso, Egreso, Gasto, Meses) {

    var color = ['rgba(255,99,132,0.4)', 'rgba(54, 162, 235, 0.4)', 'rgba(255, 206, 86, 0.4)', 'rgba(75, 192, 192, 0.4)', 'rgba(153, 102, 255, 0.4)', 'rgba(255, 159, 64, 0.4)'];
    var bordercolor = ['rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'];

    var chartdata = {
        labels: Meses,
        datasets: [
            {
                label: 'Pagos',
                backgroundColor: color,
                borderColor: color,
                borderWidth: 2,
                hoverBackgroundColor: color,
                hoverBorderColor: bordercolor,
                data: Pago
            },
            {
                label: 'Ingresos',
                backgroundColor: color,
                borderColor: color,
                borderWidth: 2,
                hoverBackgroundColor: color,
                hoverBorderColor: bordercolor,
                data: Ingreso
            },
            {
                label: 'Egresos',
                backgroundColor: color,
                borderColor: color,
                borderWidth: 2,
                hoverBackgroundColor: color,
                hoverBorderColor: bordercolor,
                data: Egreso
            },
            {
                label: 'Gastos',
                backgroundColor: color,
                borderColor: color,
                borderWidth: 2,
                hoverBackgroundColor: color,
                hoverBorderColor: bordercolor,
                data: Gasto
            }
        ]
    };

    var graphTarget = $("#graficaDetalle");

    var barGraph = new Chart(graphTarget, {
        type: 'bar',
        data: chartdata,
        options: {
            responsive: true,
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
            }
        }
    });

}



