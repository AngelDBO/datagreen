<?php

require_once '../config/database/conexion.php';

class Tercero {

    public $conexion;

    public function __construct() {
        $this->conexion = conexion::conectar();
    }

    public function save($datos) {
        $sql = 'INSERT INTO empresa (identificacion, numero, empresa, representante, tipoNegocio, correo, web, facElectronico,
        direccion, telefono1, telefono2, celular1, celular2, membresia, departamento, municipio, usuario_id) 
        VALUES (:identificacion, :numero, :empresa, :representante, :tipoNegocio, :correo, :web, :facElectronico,
        :direccion, :telefono1, :telefono2, :celular1, :celular2, :membresia, :departamento, :municipio, :usuario_id)';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":identificacion", $datos['identificacion'], PDO::PARAM_STR);
        $base->bindParam(":numero", $datos['numero'], PDO::PARAM_INT);
        $base->bindParam(":empresa", $datos['empresa'], PDO::PARAM_STR);
        $base->bindParam(":representante", $datos['representante'], PDO::PARAM_STR);
        $base->bindParam(":tipoNegocio", $datos['tipoNegocio'], PDO::PARAM_STR);
        $base->bindParam(":correo", $datos['correo'], PDO::PARAM_STR);
        $base->bindParam(":web", $datos['web'], PDO::PARAM_STR);
        $base->bindParam(":facElectronico", $datos['facturaEletronico'], PDO::PARAM_STR);
        $base->bindParam(":direccion", $datos['direccion'], PDO::PARAM_STR);
        $base->bindParam(":telefono1", $datos['telefono1'], PDO::PARAM_STR);
        $base->bindParam(":telefono2", $datos['telefono2'], PDO::PARAM_STR);
        $base->bindParam(":celular1", $datos['celular1'], PDO::PARAM_STR);
        $base->bindParam(":celular2", $datos['celular2'], PDO::PARAM_STR);
        $base->bindParam(":membresia", $datos['cuenta'], PDO::PARAM_STR);
        $base->bindParam(":departamento", $datos['departamento'], PDO::PARAM_STR);
        $base->bindParam(":municipio", $datos['municipio'], PDO::PARAM_STR);
        $base->bindParam(":usuario_id", $datos['usuario'], PDO::PARAM_INT);

        try {
            return $base->execute();
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    public function GetAll() {
        $sql = "SELECT id, empresa, representante, facElectronico, telefono1, celular1, estado, membresia, fechaRegistro FROM empresa";
        $base = $this->conexion->query($sql);
        $base->execute();
        return $base->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DetalleTercero(int $id) {
        $sql = "SELECT * FROM empresa WHERE id = :id";
        $base = $this->conexion->prepare($sql);
        $base->bindParam(':id', $id, PDO::PARAM_INT);
        $base->execute();
        return $base->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarDepartamentos() {
        $sql = 'SELECT * from departamentos';
        $base = $this->conexion->query($sql);
        if ($base->execute()) {
            return $base->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function listarMunicipios($id) {
        $sql = 'SELECT * FROM municipios WHERE departamento_id = :ID';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":ID", $id, PDO::PARAM_INT);
        if ($base->execute()) {
            return $base->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function actualizar($datos) {

        $sql = "UPDATE empresa SET identificacion = :identificacion, numero = :numero, empresa = :empresa, 
                representante = :representante, tipoNegocio = :tipoNegocio, correo = :correo, web = :web, 
                facElectronico = :facElectronico, direccion = :direccion, telefono1 = :telefono1, telefono2 = :telefono2, 
                celular1 = :celular1, celular2 = :celular2, membresia = :membresia, departamento = :departamento,
                municipio = :municipio WHERE id = :ID";
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":ID", $datos['id'], PDO::PARAM_INT);
        $base->bindParam(":identificacion", $datos['identificacion'], PDO::PARAM_STR);
        $base->bindParam(":numero", $datos['numero'], PDO::PARAM_INT);
        $base->bindParam(":empresa", $datos['empresa'], PDO::PARAM_STR);
        $base->bindParam(":representante", $datos['representante'], PDO::PARAM_STR);
        $base->bindParam(":tipoNegocio", $datos['tipoNegocio'], PDO::PARAM_STR);
        $base->bindParam(":correo", $datos['correo'], PDO::PARAM_STR);
        $base->bindParam(":web", $datos['web'], PDO::PARAM_STR);
        $base->bindParam(":facElectronico", $datos['facturaEletronico'], PDO::PARAM_STR);
        $base->bindParam(":direccion", $datos['direccion'], PDO::PARAM_STR);
        $base->bindParam(":telefono1", $datos['telefono1'], PDO::PARAM_STR);
        $base->bindParam(":telefono2", $datos['telefono2'], PDO::PARAM_STR);
        $base->bindParam(":celular1", $datos['celular1'], PDO::PARAM_STR);
        $base->bindParam(":celular2", $datos['celular2'], PDO::PARAM_STR);
        $base->bindParam(":membresia", $datos['cuenta'], PDO::PARAM_STR);
        $base->bindParam(":departamento", $datos['departamento'], PDO::PARAM_STR);
        $base->bindParam(":municipio", $datos['municipio'], PDO::PARAM_STR);

        if ($base->execute()) {
            return "1";
        }
    }

    public function actualizarEstado($datos) {
        $sql = 'UPDATE empresa SET estado = :estado WHERE id = :ID';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":ID", $datos['id']);
        $base->bindParam(":estado", $datos['estado']);
        if ($base->execute()) {
            return "Estado actualizado con exito";
        } else {
            return "Error al actualizar";
        }
    }

    public function tablaTerceros() {
        $sql = 'SELECT  empresa, web, representante, correo, facElectronico, estado FROM empresa';
        $base = $this->conexion->query($sql);
        $base->execute();
        return $base->fetchAll(PDO::FETCH_ASSOC);
    }

}
