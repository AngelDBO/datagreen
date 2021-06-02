<?php

require_once '../config/database/conexion.php';

class Ingreso {

    private $conexion;

    public function __construct() {
        $this->conexion = conexion::conectar();
    }

    public function listarTerceros() {
        $sql = 'SELECT id, empresa FROM empresa';
        $base = $this->conexion->query($sql);
        $base->execute();
        return $base->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarMedioPago() {
        $sql = 'SELECT id, nombre FROM mediopago';
        $base = $this->conexion->query($sql);
        $base->execute();
        return $base->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarIngresos(): array {
        $sql = 'SELECT ig.id, em.empresa, ig.monto, mp.nombre, ig.descripcion, ig.fechaRegistro
                FROM ingreso ig
                INNER JOIN empresa em ON ig.empresa_id = em.id
                INNER JOIN mediopago mp ON ig.medioPago_id = mp.id';
        $base = $this->conexion->query($sql);
        $base->execute();
        return $base->fetchAll(PDO::FETCH_ASSOC);
    }

    public function registrarIngreso($datos) {
        $sql = 'INSERT INTO ingreso (monto, descripcion, empresa_id, usuariol_id, medioPago_id) VALUES
                (:monto, :descripcion, :empresa_id, :usuariol_id, :medioPago_id)';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":monto", $datos['monto'], PDO::PARAM_INT);
        $base->bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
        $base->bindParam(":empresa_id", $datos['terceroID'], PDO::PARAM_INT);
        $base->bindParam(":usuariol_id", $datos['usuarioID'], PDO::PARAM_INT);
        $base->bindParam(":medioPago_id", $datos['medioPago'], PDO::PARAM_INT);
        if ($base->execute()) {
            return true;
        }
    }

    

}
