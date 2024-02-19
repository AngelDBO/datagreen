<?php

require_once '../config/database/conexion.php';

class CategoriaArticulo {

    private $conexion;

    public function __construct() {
        $this->conexion = conexion::conectar();
    }

    public function listarCategorias() {
        $sql = 'SELECT * FROM categoria_articulo';
        $base = $this->conexion->query($sql);
        if ($base->execute()) {
            return $base->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
    public function registrarCategoriaArticulo($datos){
        $sql = 'INSERT INTO categoria_articulo (nombre, descripcion, estado) VALUES (:nombre, :descripcion, :estado)';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $base->bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
        $base->bindParam(":estado", $datos['estado'], PDO::PARAM_STR);
        if($base->execute()){
            return true;
        }else{
            return false;
        }
    }
    
    public function editarCategoria($id){
        // $sql = 'SELECT * FROM categoria WHERE id = :ID';
        // $base = $this->conexion->prepare($sql);
        // $base->bindParam(":ID", $id, PDO::PARAM_INT);
        // if($base->execute()){
        //     return $base->fetch(PDO::FETCH_ASSOC);
        // }
    }

    public function actualizarCategoriaArticulo($datos){
        // $sql = 'UPDATE categoria SET nombre = :nombre WHERE id = :ID';
        // $base = $this->conexion->prepare($sql);
        // $base->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        // $base->bindParam(":ID", $datos['registroID'], PDO::PARAM_INT);
        // if($base->execute()){
        //     return true;
        // }
    }

}
