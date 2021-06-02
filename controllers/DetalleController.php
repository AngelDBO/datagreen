<?php
require_once '../models/ModelDetalleTercero.php';
$objDetalle = new Detalle();

switch ($_REQUEST['opcion']) {
    case 'listarTerceros':
        $data = $objDetalle->listarTerceros();
        echo json_encode($data);
        break;

    case 'consultaTercero':
        $terceroID = filter_input(INPUT_POST, 'terceroID', FILTER_VALIDATE_INT);
        $data = filter_input(INPUT_POST, 'fecha', FILTER_SANITIZE_STRING);
        $fechas = explode('-', $data);
        $fecha1 = date('Y/m/d', strtotime($fechas[0]));
        $fecha2 = date('Y/m/d', strtotime($fechas[1]));

        if ($fecha1 == $fecha2) {
            $datos = [
                'terceroID' => $terceroID,
                'fechaUno' => $fecha1
            ];
            $arrPagos = $objDetalle->obtenerPagos($datos);
            $arrIngresos = $objDetalle->obtenerIngresos($datos);
            $arrEgresos = $objDetalle->obtenerEgresos($datos);
            $arrGastos = $objDetalle->obtenerGastos($datos);
            $arrData['data'] = array_merge($arrPagos, $arrIngresos, $arrEgresos, $arrGastos);
            echo json_encode($arrData);
        } else if ($fecha1 !== $fecha2) {
            $datos = [
                'terceroID' => $terceroID,
                'fechaUno' => $fecha1,
                'fechaDos' => $fecha2
            ];
            $arrPagos = $objDetalle->obtenerPagos($datos);
            $arrIngresos = $objDetalle->obtenerIngresos($datos);
            $arrEgresos = $objDetalle->obtenerEgresos($datos);
            $arrGastos = $objDetalle->obtenerGastos($datos);
            $arrData['data'] = array_merge($arrPagos, $arrIngresos, $arrEgresos, $arrGastos);
            echo json_encode($arrData);
        }
        break;
}




    