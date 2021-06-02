<?php

require_once '../config/database/conexion.php';

class Agenda {

    private $conexion;

    public function __construct() {
        $this->conexion = conexion::conectar();
    }

    public function registrarAgenda($datos) {
        $sql = 'INSERT INTO agenda (actividad, periodo, color, fecha, id_usuario) 
                       VALUES (:actividad, :periodo, :color, :fecha, :id_usuario)';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":actividad", $datos['actividad'], PDO::PARAM_STR);
        $base->bindParam(":periodo", $datos['periodo'], PDO::PARAM_STR);
        $base->bindParam(":color", $datos['color'], PDO::PARAM_STR);
        $base->bindParam(":fecha", $datos['fecha'], PDO::PARAM_STR);
        $base->bindParam(":id_usuario", $datos['usuarioID'], PDO::PARAM_INT);
        if ($base->execute()) {
            return true;
        }
    }

    public function listarAgenda() {
        $sql = 'SELECT * FROM agenda WHERE estado = "Pendiente"';
        $base = $this->conexion->query($sql);
        if ($base->execute()) {
            return $base->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function finalizarAgenda($id) {
        $sql = 'UPDATE agenda SET estado = "Finalizada" WHERE id = :ID';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":ID", $id, PDO::PARAM_INT);
        if ($base->execute()) {
            return true;
        }
    }

    public function editarAgenda($id) {
        $sql = 'SELECT * FROM agenda WHERE id = :ID';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":ID", $id, PDO::PARAM_INT);
        if ($base->execute()) {
            return $base->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function actualizarAgenda($datos) {
        $sql = 'UPDATE agenda SET actividad = :actividad, periodo = :periodo, color = :color, fecha = :fecha WHERE id = :ID';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":actividad", $datos['actividad'], PDO::PARAM_STR);
        $base->bindParam(":periodo", $datos['periodo'], PDO::PARAM_STR);
        $base->bindParam(":color", $datos['color'], PDO::PARAM_STR);
        $base->bindParam(":fecha", $datos['fecha'], PDO::PARAM_STR);
        $base->bindParam(":ID", $datos['IDregistro'], PDO::PARAM_INT);
        if ($base->execute()) {
            return true;
        }
    }

}
