<?php

session_start();
require_once '../models/ModelCategoriaArchivo.php';
$objCategoriaArchivo = new CategoriaArchivo();
$id_usuario = $_SESSION['session_datapagos']['id'];

switch ($_REQUEST['opcion']) {
    case 'listarCategoriaArchivo':
        $data = $objCategoriaArchivo->listarCategoriasArchivo($id_usuario);
        if ($data) {
            foreach ($data as $value) {
                $list[] = [
                    "nombre" => $value['nombre'],
                    "descripcion" => $value['descripcion'],
                    "estado" => ($value['estado'] == 'Activo' ? "<h4><span class='badge badge-pill badge-activo'>Activo</span></h4>" : "<h4><span class='badge badge-inactivo badge-pill'>Inactivo</span></h4>"),
                    "fechaRegistro" => $value['fechaRegistro'],
                    "OP" => "<td>
                                <button type='button' class='btn btn-sm text-white btn-printer' onclick=imprimirGasto({$value['id']})><i class='fas fa-print'></i></button>
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

    case 'registrarCategoriaArchivo':
        $nombre = $_POST['nombreCategoria'];
        $descripcion = $_POST['descripcion'];
        $codigoUsuario = $_SESSION['session_datapagos']['id'];

        $datos = [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'codigoUsuario' => $codigoUsuario
        ];
        echo $objCategoriaArchivo->registrarCategoriaArchivo($datos);
        break;
}
