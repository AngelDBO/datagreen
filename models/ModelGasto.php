<?php

require_once '../config/database/conexion.php';

class Gasto {

    private $conexion;

    public function __construct() {
        $this->conexion = conexion::conectar();
    }

    public function listarGastos() {
        $sql = 'SELECT GT.id, EM.empresa, GT.monto, MP.nombre, CG.nombre AS "categoria", GT.descripcion, GT.fechaRegistro
                FROM gasto GT
                INNER JOIN empresa EM ON GT.id_tercero = EM.id
                INNER JOIN mediopago MP ON GT.id_mediopago = MP.id
                INNER JOIN categoria CG ON GT.id_categoria = CG.id';
        $base = $this->conexion->query($sql);
        if ($base->execute()) {
            return $base->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function listarTerceros() {
        $sql = 'SELECT id, empresa FROM empresa';
        $base = $this->conexion->query($sql);
        if ($base->execute()) {
            return $base->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function listarMedioPagos() {
        $sql = 'SELECT id, nombre FROM mediopago';
        $base = $this->conexion->query($sql);
        if ($base->execute()) {
            return $base->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function listarCategorias() {
        $sql = 'SELECT id, nombre FROM categoria';
        $base = $this->conexion->query($sql);
        if ($base->execute()) {
            return $base->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function registrarGasto(array $datos) {
        $sql = 'INSERT INTO gasto (id_tercero, monto, id_mediopago, id_categoria, descripcion, id_usuario)
                VALUES (:id_tercero, :monto, :id_mediopago, :id_categoria, :descripcion, :id_usuario)';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":id_tercero", $datos['tercero'], PDO::PARAM_INT);
        $base->bindParam(":monto", $datos['monto'], PDO::PARAM_STR);
        $base->bindParam(":id_mediopago", $datos['medioPago'], PDO::PARAM_INT);
        $base->bindParam(":id_categoria", $datos['categoria'], PDO::PARAM_INT);
        $base->bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_INT);
        $base->bindParam(":id_usuario", $datos['usuarioID'], PDO::PARAM_INT);
        if ($base->execute()) {
            return true;
        }
    }

    public function editarGasto($id) {
        $sql = 'SELECT * FROM gasto WHERE id = :ID';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":ID", $id, PDO::PARAM_INT);
        if ($base->execute()) {
            return $base->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function actualizarGasto(array $datos) {
        $sql = 'UPDATE gasto SET id_tercero = :id_tercero, monto = :monto, id_mediopago = :id_mediopago, 
                id_categoria = :id_categoria, descripcion = :descripcion WHERE id = :ID';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":id_tercero", $datos['tercero'], PDO::PARAM_STR);
        $base->bindParam(":monto", $datos['monto'], PDO::PARAM_STR);
        $base->bindParam(":id_mediopago", $datos['medio'], PDO::PARAM_INT);
        $base->bindParam(":id_categoria", $datos['categoria'], PDO::PARAM_INT);
        $base->bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
        $base->bindParam(":ID", $datos['registroID'], PDO::PARAM_INT);
        if ($base->execute()) {
            return true;
        }
    }

}
