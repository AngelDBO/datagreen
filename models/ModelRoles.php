<?php

require_once '../config/database/conexion.php';

class Rol {

    private $conexion;

    public function __construct() {
        $this->conexion = conexion::conectar();
    }

    public function registrarRol($datos) {
        $sql = 'INSERT INTO rol (nombre, descripcion, estado) VALUES (:nombre, :descripcion, :estado)';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $base->bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
        $base->bindParam(":estado", $datos['estado'], PDO::PARAM_STR);
        if ($base->execute()) {
            return true;
        }
    }

    public function listarRoles() {
        $sql = 'SELECT * FROM rol';
        $base = $this->conexion->query($sql);
        if ($base->execute()) {
            return $base->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    
    public function listarPermisos($id){
        $sql = 'SELECT RL.nombre, PR.nombreModulo, PR.permiso0, PR.permiso1, PR.permiso2,PR.permiso3, PR.permiso4
                FROM permiso PR INNER JOIN rol RL ON PR.id_rol = RL.id WHERE RL.id = :rolID';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":rolID", $id, PDO::PARAM_INT);
        if($base->execute()){
            return $base->fetchAll(PDO::FETCH_ASSOC);
        }
    }

}
