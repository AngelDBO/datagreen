<?php

header('Content-Type: application/json');

require '../models/ModelGraficas.php';
$objGrafica = new Grafica();

switch ($_REQUEST['opcion']) {

    case 'pagosRealizados':
        $data = $objGrafica->pagosRealizados();
        echo json_encode($data);
        break;

    case 'ingresosRealizados':
        $data = $objGrafica->graficaIngresos();
        echo json_encode($data);
        break;

    case 'egresosRealizados':
        $data = $objGrafica->graficaEgresos();
        echo json_encode($data);
        break;

    case 'totalTerceros':
        $data = $objGrafica->totalTerceros();
        echo json_encode($data);
        break;
    
    case 'totalPagos':
        $data = $objGrafica->totalPagos();
        echo json_encode($data);
        break;

    case 'totalIngresos':
        $data = $objGrafica->totalIngresos();
        echo json_encode($data);
        break;

    case 'totalEgresos':
        $data = $objGrafica->totalEgresos();
        echo json_encode($data);
        break;
}
