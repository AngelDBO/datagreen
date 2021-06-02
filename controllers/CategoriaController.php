<?php

require_once '../models/ModelCategoria.php';
$objCategoria = new Categoria();

switch ($_REQUEST['opcion']) {
    case 'listarCategorias':
        $data = $objCategoria->listarCategorias();
        if ($data) {
            foreach ($data as $value) {
                $list[] = [
                    "nombre" => $value['nombre'],
                    "fecha" => $value['fechaRegistro'],
                    "OP" => "<td>
                                <button type='button' class='btn text-white btn-edit btn-sm' data-toggle='modal' data-target='#updateCategoria' onclick=editarCategoria({$value['id']})><i class='fas fa-edit'></i></button>
                                <button type='button' class='btn text-white btn-delete btn-sm' data-toggle='modal' data-target='#s' onclick=eliminarCategoria({$value['id']})><i class='fas fa-trash-alt'></i></button>
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

    case 'registrarCategoria':
        $nombre = $_POST['nombreCategoria'];
        $usuarioID = $_POST['IDusuario'];
        $datos = [
            'nombre' => $nombre,
            'usuarioID' => $usuarioID
        ];
        echo $objCategoria->registrarCategoria($datos);
        break;

    case 'editarCategoria':
        $data = $objCategoria->editarCategoria($_POST['id']);
        echo json_encode($data);
        break;

    case 'actualizarCategoria':
        $registroID = $_POST['IDregistroU'];
        $nombre = $_POST['nombreCategoriaU'];
        $datos = [
            'registroID' => $registroID,
            'nombre' => $nombre
        ];
        echo $objCategoria->actualizarCategoria($datos);
        break;
}
