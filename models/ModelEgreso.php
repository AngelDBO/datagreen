<?php

require_once '../config/database/conexion.php';

class Egreso {

    private $conexion;

    public function __construct() {
        $this->conexion = conexion::conectar();
    }

    public function listarEgresos() {
        $sql = 'SELECT eg.id, em.empresa, ct.nombre AS categoria, eg.monto, mp.nombre, eg.descripcion, eg.fechaRegistro, eg.anexo
                FROM egreso eg
                INNER JOIN empresa em ON eg.empresa_id = em.id 
                INNER JOIN mediopago mp ON eg.medioPago_id = mp.id
                INNER JOIN  categoria ct ON eg.categoria_id = ct.id';
        $base = $this->conexion->prepare($sql);
        $base->execute();
        return $base->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cargarTercero() {
        $sql = 'SELECT id, empresa FROM empresa WHERE estado = "Activo"';
        $base = $this->conexion->query($sql);
        $base->execute();
        return $base->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cargarMedioPago() {
        $sql = 'SELECT id, nombre FROM mediopago WHERE estado = "Activo"';
        $base = $this->conexion->query($sql);
        $base->execute();
        return $base->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cargarCategoria(){
        $sql = 'SELECT id, nombre FROM categoria';
        $base = $this->conexion->query($sql);
        $base->execute();
        return $base->fetchAll(PDO::FETCH_ASSOC);
    }

    public function registrarEgreso($datos) {
        $sql = 'INSERT INTO egreso (monto, descripcion, empresa_id, usuario_id, categoria_id, medioPago_id, anexo)
        VALUES(:monto, :descripcion, :empresa_id, :usuario_id, :categoria_id, :medioPago_id, :anexo);';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":monto", $datos['monto'], PDO::PARAM_INT);
        $base->bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
        $base->bindParam(":empresa_id", $datos['terceroiId'], PDO::PARAM_INT);
        $base->bindParam(":usuario_id", $datos['usuarioId'], PDO::PARAM_INT);
        $base->bindParam(":medioPago_id", $datos['medioPagoId'], PDO::PARAM_INT);
        $base->bindParam(":categoria_id", $datos['categoriaId'], PDO::PARAM_INT);
        $base->bindParam(":anexo", $datos['anexo'], PDO::PARAM_STR);
        if ($base->execute()) {
            return true;
        }
    }
    
    public function editarPago($id) {
        $sql = 'SELECT * FROM egreso WHERE id = :ID';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":ID", $id, PDO::PARAM_INT);
        $base->execute();
        return $base->fetch(PDO::FETCH_ASSOC);
    }
    
    public function actualizarEgreso($datos){
        $sql = 'UPDATE egreso SET monto = :monto, descripcion = :descripcion, empresa_id = :empresa_id,
                medioPago_id = :medioPago_id WHERE id = :ID';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":monto", $datos['monto'], PDO::PARAM_INT);
        $base->bindParam(":descripcion", $datos['descripcion'], PDO::PARAM_STR);
        $base->bindParam(":empresa_id", $datos['terceroID'], PDO::PARAM_INT);
        $base->bindParam(":medioPago_id", $datos['medioPagoID'], PDO::PARAM_INT);
        $base->bindParam(":ID", $datos['registroID'], PDO::PARAM_INT);
        if($base->execute()){
            return true;
        }
    }

    public function cargarAnexo($id){
        $sql = 'SELECT eg.id, eg.anexo, em.empresa from egreso eg INNER JOIN empresa em on eg.empresa_id = em.id 
        WHERE eg.id = :ID';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":ID", $id, PDO::PARAM_INT);
        if ($base->execute()) {
            return $base->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function eliminarAnexo($datos){
        $sql = 'UPDATE egreso SET anexo = :anexo WHERE id = :ID';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":ID", $datos['id'], PDO::PARAM_INT);
        $base->bindParam(":anexo", $datos['anexo'], PDO::PARAM_STR);
        if($base->execute()){
            return true;
        }
    }

    public function actualizarAnexo($datos){
        $sql = 'UPDATE egreso SET anexo = :anexo WHERE id = :ID';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":anexo", $datos['anexo'], PDO::PARAM_STR);
        $base->bindParam(":ID", $datos['idRegistro'], PDO::PARAM_INT);
        if($base->execute()){
            return true;
        }
    }

    public function eliminarEgreso($id){
        $sql = "DELETE FROM egreso WHERE id = :ID";
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":ID", $id, PDO::PARAM_INT);
        if($base->execute()){
            return true;
        }
    }

}
