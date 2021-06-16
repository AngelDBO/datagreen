<?php

require_once '../config/database/conexion.php';

class Pago {

    public $conexion;

    public function __construct() {
        $this->conexion = conexion::conectar();
    }

    public function cargarTercero() {
        $sql = 'SELECT id, empresa FROM empresa WHERE estado = "Activo"';
        $base = $this->conexion->query($sql);
        $base->execute();
        return $base->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cargarMedioPago() {
        $sql = 'SELECT id, nombre FROM mediopago';
        $base = $this->conexion->query($sql);
        $base->execute();
        return $base->fetchAll(PDO::FETCH_ASSOC);
    }

    public function registrarPago($datos) {
        $sql = 'INSERT INTO pago(mesPago, monto, comprobante, empresa_id, usuario_id, '
                . 'fechaPago, medioPago_id, descripcion) '
                . 'VALUES (:mesPago, :monto, :comprobante, :empresa_id, :usuario_id, :fechaPago, :medioPago_id,'
                . ':descripcion)';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":mesPago", $datos['mesPago']);
        $base->bindParam(":monto", $datos['monto']);
        $base->bindParam(":comprobante", $datos['comprobante']);
        $base->bindParam(":empresa_id", $datos['tercero']);
        $base->bindParam(":usuario_id", $datos['idUsuario']);
        $base->bindParam(":fechaPago", $datos['fechaPago']);
        $base->bindParam(":medioPago_id", $datos['medioPago']);
        $base->bindParam(":descripcion", $datos['descripcion']);
        if ($base->execute()) {
            return "Pago guardado con exito";
        } else {
            return "Error al guardar pago";
        }
    }

    public function listarPagos() {
        $sql = 'SELECT pg.id, em.empresa, pg.mesPago, pg.monto, DATE_FORMAT(pg.fechaPago, "%d-%m-%Y") AS "fechaPago", mp.nombre, pg.comprobante, pg.fechaRegistro
                FROM pago pg INNER JOIN empresa em ON pg.empresa_id = em.id INNER JOIN mediopago mp ON pg.medioPago_id = mp.id';
        $base = $this->conexion->query($sql);
        $base->execute();
        return $base->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editarPago($id) {
        $sql = 'SELECT * FROM pago WHERE id = :id';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":id", $id, PDO::PARAM_INT);
        if ($base->execute()) {
            return $base->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function actualizarPago($datos) {
        $sql = 'UPDATE pago SET mesPago = :mesPago, monto= :monto, comprobante = :comprobante, empresa_id = :empresa_id, 
                                usuario_id = :usuario_id, fechaPago = :fechaPago, medioPago_id = :medioPago_id, descripcion = :descripcion 
                                WHERE id = :ID';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":mesPago", $datos['mesPago']);
        $base->bindParam(":monto", $datos['monto']);
        $base->bindParam(":comprobante", $datos['comprobante']);
        $base->bindParam(":empresa_id", $datos['tercero']);
        $base->bindParam(":usuario_id", $datos['idUsuario']);
        $base->bindParam(":fechaPago", $datos['fechaPago']);
        $base->bindParam(":medioPago_id", $datos['medioPago']);
        $base->bindParam(":descripcion", $datos['descripcion']);
        $base->bindParam(":ID", $datos['idRegistro']);
        if ($base->execute()) {
            return "Pago actualizado con exito";
        } else {
            return "Error al guardar pago";
        }
    }

    public function obtenerImagen($id) {
        $sql = 'SELECT monto, comprobante FROM pago WHERE id = :ID';
        $base = $this->conexion->prepare($sql);
        $base->bindParam("ID", $id, PDO::PARAM_INT);
        if ($base->execute()) {
            return $base->fetch(PDO::FETCH_ASSOC);
        }
    }

    

}
