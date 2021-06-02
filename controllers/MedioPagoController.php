<?php

require_once '../models/ModelMedioPago.php';
$objMedioPago = new MedioPago();
switch ($_REQUEST['opcion']) {
    case 'registrarMedioPago':
        $usuarioID = $_POST['IDusuario'];
        $nombreMedioPago = $_POST['nombreMedio'];

        $datos = [
            'usuarioID' => $usuarioID,
            'nombreMedio' => strtoupper(trim($nombreMedioPago))
        ];
        echo $objMedioPago->registrarMedioPago($datos);
        break;

    case 'listarMedioPago':
        $data = $objMedioPago->listarMediosPagos();
        if ($data) {
            foreach ($data as $value) {
                $list[] = [
                    "nombre" => $value['nombre'],
                    "estado" => ($value['estado'] == 'Activo' ? "<h4><span class='badge badge-pill badge-activo'>Activo</span></h4>" : "<h4><span class='badge badge-inactivo badge-pill'>Inactivo</span></h4>"),
                    "fechaRegistro" => $value['fechaRegistro'],
                    "editar" => "<button class='btn btn-sm text-white btn-edit' onclick='editarMedio({$value['id']})' data-toggle='modal' data-target='#updateMedio'><i class='fas fa-edit'></i></button"
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

    case 'editarMedio':
        $data = $objMedioPago->editarMedioago($_POST['id']);
        echo json_encode($data);
        break;

    case 'actualizarMedio':
        $IDRegistro = $_POST['IDregistroU'];
        $nombre = $_POST['nombreMedioU'];
        $estado = $_POST['estadoMedio'];

        $datos = [
            'IDregistro' => $IDRegistro,
            'nombre' => strtoupper(trim($nombre)),
            'estado' => $estado
        ];
        echo $objMedioPago->actualizarMedio($datos);
        break;

    default:
        break;
}