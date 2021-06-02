<?php

require_once '../config/database/conexion.php';

class CategoriaArchivo {

    private $conexion;

    public function __construct() {
        $this->conexion = conexion::conectar();
    }

    public function listarCategoriasArchivo($idUsuario) {
        $sql = 'SELECT * FROM categoria_archivo WHERE usuario_id = :IDUSUARIO';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":IDUSUARIO", $idUsuario, PDO::PARAM_INT);
        if ($base->execute()) {
            return $base->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function registrarCategoriaArchivo($datos) {
        $sql = 'INSERT INTO categoria_archivo (nombre, descripcion, usuario_id) VALUES
                (:nombre, :descripcion, :usuario_id)';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $base->bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
        $base->bindParam(":usuario_id", $datos['codigoUsuario'], PDO::PARAM_INT);
        if ($base->execute()) {
            return true;
        }
    }

}
