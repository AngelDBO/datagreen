<?php

require_once '../config/database/conexion.php';

class Detalle {

    public $conexion;

    public function __construct() {
        $this->conexion = conexion::conectar();
    }

    public function listarTerceros() {
        $sql = 'SELECT id, empresa FROM empresa';
        $base = $this->conexion->query($sql);
        $base->execute();
        return $base->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPagos($datos) {
        $sql = 'SELECT pg.id, "Pago" AS tipo, pg.fechaRegistro, monto, mp1.nombre, pg.descripcion, us.usuario
                FROM pago pg
                INNER JOIN empresa em ON pg.empresa_id = em.id
                INNER JOIN mediopago mp1 ON pg.medioPago_id = mp1.id
                INNER JOIN usuario us ON pg.usuario_id = us.id ';
        if (array_key_exists('fechaDos', $datos)) {
            $sql .= 'WHERE em.id = :ID AND pg.fechaRegistro BETWEEN :fechaUno AND :fechaDos';
            $base = $this->conexion->prepare($sql);
            $base->bindParam(":ID", $datos['terceroID'], PDO::PARAM_INT);
            $base->bindParam(":fechaUno", $datos['fechaUno'], PDO::PARAM_STR);
            $base->bindParam(":fechaDos", $datos['fechaDos'], PDO::PARAM_STR);
            if ($base->execute()) {
                return $base->fetchAll(PDO::FETCH_ASSOC);
            }
        } else {
            $sql .= 'WHERE em.id = :ID AND DATE(pg.fechaRegistro) = :fecha';
            $base = $this->conexion->prepare($sql);
            $base->bindParam(":ID", $datos['terceroID'], PDO::PARAM_INT);
            $base->bindParam(":fecha", $datos['fechaUno'], PDO::PARAM_STR);
            if ($base->execute()) {
                return $base->fetchAll(PDO::FETCH_ASSOC);
            }
        }
    }

    public function obtenerEgresos($datos) {
        $sql = 'SELECT eg.id, "Egreso" AS tipo, eg.fechaRegistro, monto, mp1.nombre, eg.descripcion, us.usuario
                FROM egreso eg
                INNER JOIN empresa em ON eg.empresa_id = em.id
                INNER JOIN mediopago mp1 ON eg.medioPago_id = mp1.id
                INNER JOIN usuario us ON eg.usuario_id = us.id ';
        if (array_key_exists('fechaDos', $datos)) {
            $sql .= 'WHERE em.id = :ID AND eg.fechaRegistro BETWEEN :fechaUno AND :fechaDos';
            $base = $this->conexion->prepare($sql);
            $base->bindParam(":ID", $datos['terceroID'], PDO::PARAM_INT);
            $base->bindParam(":fechaUno", $datos['fechaUno'], PDO::PARAM_STR);
            $base->bindParam(":fechaDos", $datos['fechaDos'], PDO::PARAM_STR);
            if ($base->execute()) {
                return $base->fetchAll(PDO::FETCH_ASSOC);
            }
        } else {
            $sql .= 'WHERE em.id = :ID AND DATE(eg.fechaRegistro) = :fecha';
            $base = $this->conexion->prepare($sql);
            $base->bindParam(":ID", $datos['terceroID'], PDO::PARAM_INT);
            $base->bindParam(":fecha", $datos['fechaUno'], PDO::PARAM_STR);
            if ($base->execute()) {
                return $base->fetchAll(PDO::FETCH_ASSOC);
            }
        }
    }

    public function obtenerIngresos($datos) {
        $sql = 'SELECT ig.id, "Ingreso" AS tipo, ig.fechaRegistro, monto, ig.descripcion, mp.nombre, ig.descripcion, us.usuario
                FROM ingreso ig
                INNER JOIN empresa em ON ig.empresa_id = em.id
                INNER JOIN mediopago mp ON ig.medioPago_id = mp.id
                INNER JOIN usuario us ON ig.usuariol_id = us.id ';
        if (array_key_exists('fechaDos', $datos)) {
            $sql .= 'WHERE em.id = :ID AND ig.fechaRegistro BETWEEN :fechaUno AND :fechaDos';
            $base = $this->conexion->prepare($sql);
            $base->bindParam(":ID", $datos['terceroID'], PDO::PARAM_INT);
            $base->bindParam(":fechaUno", $datos['fechaUno'], PDO::PARAM_STR);
            $base->bindParam(":fechaDos", $datos['fechaDos'], PDO::PARAM_STR);
            if ($base->execute()) {
                return $base->fetchAll(PDO::FETCH_ASSOC);
            }
        } else {
            $sql .= 'WHERE em.id = :ID AND DATE(ig.fechaRegistro) = :fecha';
            $base = $this->conexion->prepare($sql);
            $base->bindParam(":ID", $datos['terceroID'], PDO::PARAM_INT);
            $base->bindParam(":fecha", $datos['fechaUno'], PDO::PARAM_STR);
            if ($base->execute()) {
                return $base->fetchAll(PDO::FETCH_ASSOC);
            }
        }
    }

    public function obtenerGastos($datos) {
        $sql = 'SELECT GT.id, "Gasto" AS tipo, GT.fechaRegistro, monto, MP.nombre, GT.descripcion, US.usuario
                FROM gasto GT
                INNER JOIN mediopago MP ON GT.id_mediopago = MP.id
                INNER JOIN usuario US ON GT.id_usuario = US.id
                INNER JOIN empresa EM ON GT.id_tercero = EM.id ';
        if (array_key_exists('fechaDos', $datos)) {
            $sql .= 'WHERE EM.id = :ID AND GT.fechaRegistro BETWEEN :fechaUno AND :fechaDos';
            $base = $this->conexion->prepare($sql);
            $base->bindParam(":ID", $datos['terceroID'], PDO::PARAM_INT);
            $base->bindParam(":fechaUno", $datos['fechaUno'], PDO::PARAM_STR);
            $base->bindParam(":fechaDos", $datos['fechaDos'], PDO::PARAM_STR);
            if ($base->execute()) {
                return $base->fetchAll(PDO::FETCH_ASSOC);
            }
        } else {
            $sql .= 'WHERE EM.id = :ID AND DATE(GT.fechaRegistro) = :fecha';
            $base = $this->conexion->prepare($sql);
            $base->bindParam(":ID", $datos['terceroID'], PDO::PARAM_INT);
            $base->bindParam(":fecha", $datos['fechaUno'], PDO::PARAM_STR);
            if ($base->execute()) {
                return $base->fetchAll(PDO::FETCH_ASSOC);
            }
        }
    }

}
