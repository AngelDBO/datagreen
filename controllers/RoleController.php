<?php

require_once '../models/ModelRoles.php';

$objRol = new Rol();
switch ($_REQUEST['opcion']) {
    case 'registrarRol':
        $nombre = $_POST['nombreRol'];
        $descripcion = $_POST['descripcion'];
        $estado = $_POST['estado'];

        $datos = [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'estado' => $estado
        ];
        echo $objRol->registrarRol($datos);
        break;

    case 'listarRoles':
        $data = $objRol->listarRoles();
        if ($data) {
            foreach ($data as $value) {
                $list[] = [
                    "nombre" => $value['nombre'],
                    "descripcion" => $value['descripcion'],
                    "estado" => $value['estado'],
                    "acciones" => "<td>
                                    <div class='btn-group' role='group'>
                                        <button type='button' class='btn btn-sm text-white' style='background: #31ccbe'><i class='zmdi zmdi-print'></i></button>
                                        <button type='button' class='btn btn-sm text-white ml-1' data-toggle='modal' data-target='#modalPermisos'><i class='zmdi zmdi-edit'></i></button>
                                    </div>
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
}