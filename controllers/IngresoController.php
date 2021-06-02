<?php

require_once '../models/ModelIngreso.php';
$objIngreso = new Ingreso();

switch ($_REQUEST['opcion']) {

    case 'listarIngresos':
        $data = $objIngreso->listarIngresos();
       
        if ($data) {
            foreach ($data as $value) {
                $list[] = [
                    "empresa" => $value['empresa'],
                    "monto" => $value['monto'],
                    "medioPago" => $value['nombre'],
                    "descripcion" => $value['descripcion'],
                    "fechaRegistro" => $value['fechaRegistro'],
                    "acciones" => "<td>
                                        <button type='button' class='btn text-white btn-sm btn-printer' ><i class='fas fa-print'></i></button>
                                        <button type='button' class='btn text-white btn-sm btn-edit' data-toggle='modal' data-target='#editarEgreso' onclick=editarIngreso({$value['id']})><i class='fas fa-edit'></i></button>
                                   </td>"
                ];
            }
        }

        $results = [
            "sEcho" => 1,
            "iTotalRecords" => count($list),
            "iTotalDisplayRecords" => count($list),
            "aaData" => $list
        ];
        
        echo json_encode($results);
        break;

    case 'listarTerceros':
        $data = $objIngreso->listarTerceros();
        echo json_encode($data);
        break;

    case 'listarMedioPago':
        $data = $objIngreso->listarMedioPago();
        echo json_encode($data);
        break;

    case 'registrarIngreso':
        $usuarioID = $_POST['IDusuario'];
        $terceroID = $_POST['terceroIngreso'];
        $monto = $_POST['monto'];
        $medioPago = $_POST['medioPagoIngreso'];
        $descripcion = $_POST['descripcionIngreso'];

        $datos = [
            'usuarioID' => $usuarioID,
            'terceroID' => $terceroID,
            'monto' => $monto,
            'medioPago' => $medioPago,
            'descripcion' => $descripcion
        ];
        if ($objIngreso->registrarIngreso($datos)) {
            $response = 1;
        }
        echo $response;

        break;

    default:
        break;
}