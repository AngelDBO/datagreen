<?php

require_once '../models/ModelGasto.php';
$objGasto = new Gasto();

switch ($_REQUEST['opcion']) {
    case 'listarGastos':
        $data = $objGasto->listarGastos();
        if ($data) {
            foreach ($data as $value) {
                $list[] = [
                    "tercero" => $value['empresa'],
                    "monto" => $value['monto'],
                    "medio" => $value['nombre'],
                    "categoria" => $value['categoria'],
                    "nota" => $value['descripcion'],
                    "fecha" => $value['fechaRegistro'],
                    "OP" => "<td>
                                <button type='button' class='btn btn-sm text-white btn-printer' data-toggle='modal' data-target='#s' onclick=imprimirGasto({$value['id']})><i class='fas fa-print'></i></button>
                                <button type='button' class='btn btn-sm text-white btn-edit' data-toggle='modal' data-target='#EditarGasto' onclick=editarGasto({$value['id']})><i class='fas fa-edit'></i></button>
                             </td>"
                ];
            }
        }

        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($list),
            "iTotalDisplayRecords" => count($list),
            "aaData" => $list);
        echo json_encode($results);
        break;

    case 'listarTerceros':
        $data = $objGasto->listarTerceros();
        echo json_encode($data);
        break;

    case 'listarMediosPagos':
        $data = $objGasto->listarMedioPagos();
        echo json_encode($data);
        break;

    case 'listarCategorias':
        $data = $objGasto->listarCategorias();
        echo json_encode($data);
        break;

    case 'registrarGasto':
        $usuarioID = $_POST['IDusuario'];
        $tercero = $_POST['terceroGasto'];
        $monto = $_POST['monto'];
        $medioPago = $_POST['medioGasto'];
        $categoria = $_POST['categoriaGasto'];
        $descripcion = $_POST['descripcionGasto'];

        $datos = [
            'usuarioID' => $usuarioID,
            'tercero' => $tercero,
            'monto' => $monto,
            'medioPago' => $medioPago,
            'categoria' => $categoria,
            'descripcion' => $descripcion
        ];
        echo $objGasto->registrarGasto($datos);
        break;

    case 'editarGasto':
        $data = $objGasto->editarGasto($_POST['id']);
        echo json_encode($data);
        break;

    case 'actualizarGasto':
        $IDregistro = $_POST['registroIDU'];
        $tercero = $_POST['terceroGastoU'];
        $monto = $_POST['montoU'];
        $medio = $_POST['medioGastoU'];
        $categoria = $_POST['categoriaGastoU'];
        $descripcion = $_POST['descripcionGastoU'];

        $datos = [
            'registroID' => $IDregistro,
            'tercero' => $tercero,
            'monto' => $monto,
            'medio' => $medio,
            'categoria' => $categoria,
            'descripcion' => $descripcion
        ];
        echo $objGasto->actualizarGasto($datos);
        break;

    default:
        break;
}