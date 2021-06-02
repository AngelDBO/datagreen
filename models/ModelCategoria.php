<?php

require_once '../config/database/conexion.php';

class Categoria {

    private $conexion;

    public function __construct() {
        $this->conexion = conexion::conectar();
    }

    public function listarCategorias() {
        $sql = 'SELECT * FROM categoria';
        $base = $this->conexion->query($sql);
        if ($base->execute()) {
            return $base->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
    public function registrarCategoria($datos){
        $sql = 'INSERT INTO categoria (nombre, id_usuario) VALUES (:nombre, :id_usuario)';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $base->bindParam(":id_usuario", $datos['usuarioID'], PDO::PARAM_INT);
        if($base->execute()){
            return true;
        }
    }
    
    public function editarCategoria($id){
        $sql = 'SELECT * FROM categoria WHERE id = :ID';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":ID", $id, PDO::PARAM_INT);
        if($base->execute()){
            return $base->fetch(PDO::FETCH_ASSOC);
        }
    }
    
    public function actualizarCategoria($datos){
        $sql = 'UPDATE categoria SET nombre = :nombre WHERE id = :ID';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $base->bindParam(":ID", $datos['registroID'], PDO::PARAM_INT);
        if($base->execute()){
            return true;
        }
    }

}
