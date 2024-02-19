<?php
require_once '../models/ModelCategoriaArticulo.php';
require_once '../config/helpers/validate.php';

$Categoria = new CategoriaArticulo();

if ($_POST['accion'] == "registrar") {
    $nombre_categoria = rip_tags($_POST['nombre_categoria']);
    $descripcion_categoria = rip_tags($_POST['descripcion_categoria']);
    $estado_categoria = rip_tags($_POST['estado_categoria']);
    $categoria_id = rip_tags($_POST['categoria_id']);

    $datos = [
        "nombre" => $nombre_categoria,
        "descripcion" => $descripcion_categoria,
        "estado" => $estado_categoria,
        "categoria_id" => $categoria_id
    ];

    if ($categoria_id == "") {
        if ($Categoria->registrarCategoriaArticulo($datos)) {
            echo json_encode(["result" => true, "message" => "Datos regristrados"]);
        } else {
            echo json_encode(["result" => false, "message" => "Error al registrar"]);
        }
    } else {
        if ($Categoria->actualizarCategoriaArticulo($datos)) {
            echo json_encode(["result" => true, "message" => "Datos actualizados"]);
        } else {
            echo json_encode(["result" => false, "message" => "Error al actualizar"]);
        }
    }
}
