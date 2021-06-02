<?php

require_once '../config/database/conexion.php';

class Usuario {

    private $conexion;

    public function __construct() {
        $this->conexion = conexion::conectar();
    }

    public function registrarUsuario($datos) {
        $sql = 'INSERT INTO usuario (nombre, apellido, usuario, password, email, estado, rol)
                VALUES (:nombre, :apellido, :usuario, :password, :email, :estado, :rol)';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $base->bindParam(":apellido", $datos['apellido'], PDO::PARAM_STR);
        $base->bindParam(":usuario", $datos['usuario'], PDO::PARAM_STR);
        $base->bindParam(":password", $datos['password'], PDO::PARAM_STR);
        $base->bindParam(":email", $datos['correo'], PDO::PARAM_STR);
        $base->bindParam(":estado", $datos['estado'], PDO::PARAM_STR);
        $base->bindParam(":rol", $datos['rol'], PDO::PARAM_STR);
        if ($base->execute()) {
            return true;
        }
    }

    function iniciarSesion($datos) {
        $sql = 'SELECT * FROM usuario WHERE usuario = :usuario';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":usuario", $datos['usuario'], PDO::PARAM_STR);
        if ($base->execute()) {
            if ($base->rowCount() > 0) {
                $data = $base->fetch(PDO::FETCH_ASSOC);
                if (password_verify($datos['password'], $data['password'])) {
                    return $data;
                }
            } else {
                return false;
            }
        }
    }

    public function listarUsuarios() {
        $sql = 'SELECT  id, nombre, apellido, usuario, email, estado, fechaRegistro, rol FROM usuario';
        $base = $this->conexion->query($sql);
        if ($base->execute()) {
            return $base->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function editarUsuario($id) {
        $sql = 'SELECT id, nombre, apellido, usuario, email, estado, fechaRegistro, rol FROM usuario WHERE id = :ID';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":ID", $id, PDO::PARAM_INT);
        if ($base->execute()) {
            return $base->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function actualizarUsuario($datos) {
        $sql = 'UPDATE usuario SET nombre = :nombre, apellido = :apellido, usuario = :usuario, email = :email,
                estado = :estado, rol = :rol WHERE id = :ID';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":ID", $datos['IDregistro'], PDO::PARAM_INT);
        $base->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $base->bindParam(":apellido", $datos['apellido'], PDO::PARAM_STR);
        $base->bindParam(":usuario", $datos['usuario'], PDO::PARAM_STR);
        $base->bindParam(":email", $datos['correo'], PDO::PARAM_STR);
        $base->bindParam(":estado", $datos['estado'], PDO::PARAM_STR);
        $base->bindParam(":rol", $datos['rol'], PDO::PARAM_STR);
        if ($base->execute()) {
            return true;
        }
    }

    public function actualizarPassword($datos) {
        $sql = 'UPDATE usuario SET password = :password WHERE id = :ID';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":ID", $datos['idRegistro'], PDO::PARAM_INT);
        $base->bindParam(":password", $datos['password'], PDO::PARAM_STR);
        if ($base->execute()) {
            return true;
        }
    }

}
