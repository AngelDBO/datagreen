$('#tablaEgresos').DataTable({
    "bFilter": false,
    "bInfo": false,
    paging: false
});
$('#tablaIngresos').DataTable({
    "bFilter": false,
    "bInfo": false,
    paging: false
});

$('#tablaresultados').DataTable({
    "bFilter": false,
    "bInfo": false,
    "paging": false,
    "scrollX": true
});

$(function () {

    var start = moment().subtract(29, 'days');
    var end = moment();
    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#FechaConsulta').daterangepicker({
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
