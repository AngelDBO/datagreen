<?php

require_once '../config/database/conexion.php';

class MedioPago {

    private $conexion;

    public function __construct() {
        $this->conexion = conexion::conectar();
    }

    public function registrarMedioPago($datos) {
        $sql = 'INSERT INTO mediopago (nombre, usuario_id) VALUES (:nombre, :usuario_id)';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":nombre", $datos['nombreMedio'], PDO::PARAM_STR);
        $base->bindParam(":usuario_id", $datos['usuarioID'], PDO::PARAM_INT);
        if ($base->execute()) {
            return true;
        }
    }

    public function listarMediosPagos() {
        $sql = 'SELECT * FROM mediopago';
        $base = $this->conexion->query($sql);
        if ($base->execute()) {
            return $base->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function editarMedioago($id) {
        $sql = 'SELECT id, nombre, estado FROM mediopago WHERE id = :ID';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":ID", $id, PDO::PARAM_INT);
        if ($base->execute()) {
            return $base->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function actualizarMedio($datos) {
        $sql = 'UPDATE mediopago SET nombre = :nombre, estado = :estado WHERE id = :ID';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $base->bindParam(":estado", $datos['estado'], PDO::PARAM_STR);
        $base->bindParam(":ID", $datos['IDregistro'], PDO::PARAM_INT);
        
        if($base->execute()){
            return true;
        }
    }

}
