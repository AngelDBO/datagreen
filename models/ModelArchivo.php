<?php

require_once '../config/database/conexion.php';

class Archivo {

    private $conexion;

    public function __construct() {
        $this->conexion = conexion::conectar();
    }

    public function listarCategoriaArchivo() {
        $sql = 'SELECT id, nombre FROM categoria_archivo';
        $base = $this->conexion->query($sql);
        if ($base->execute()) {
            return $base->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function listarArchivos($codigoUsuario) {
        $sql = 'SELECT AR.id, CA.nombre as categoria, AR.nombre, AR.tipo, AR.url, AR.fechaRegistro, AR.ultima_visita
        FROM archivo AR
        INNER JOIN categoria_archivo CA ON AR.id_categoria = CA.id
        WHERE AR.id_usuario = :codigo';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":codigo", $codigoUsuario, PDO::PARAM_INT);
        if ($base->execute()) {
            return $base->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function registrarArchivo($datos) {
        $sql = 'INSERT INTO archivo (id_categoria, nombre, tipo, url, id_usuario)
        VALUES (:id_categoria, :nombre, :tipo, :url, :id_usuario)';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":id_categoria", $datos['codigoCategoria'], PDO::PARAM_INT);
        $base->bindParam(":nombre", $datos['nombre'], PDO::PARAM_STR);
        $base->bindParam(":tipo", $datos['tipo'], PDO::PARAM_STR);
        $base->bindParam(":url", $datos['url'], PDO::PARAM_STR);
        $base->bindParam(":id_usuario", $datos['idUsuario'], PDO::PARAM_INT);
        if ($base->execute()) {
            return true;
        }
    }

    public function visualizarArchivo($id) {
        $sql = 'SELECT nombre, tipo, url FROM archivo WHERE id = :ID';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":ID", $id, PDO::PARAM_INT);
        if ($base->execute()) {
            return $base->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function listarUsuarios($idUsuario) {
        $sql = 'SELECT id, usuario FROM usuario WHERE estado = "Activo" AND id <> :ID';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":ID", $idUsuario, PDO::PARAM_INT);
        if ($base->execute()) {
            return $base->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function compartir($datos) {
        $sql = 'INSERT INTO archivo_compartido (id_archivo, id_usuario, id_compartido) VALUES (:id_archivo, :id_usuario, :id_compartido)';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":id_archivo", $datos['id_archivo'], PDO::PARAM_INT);
        $base->bindParam(":id_usuario", $datos['id_usuario'], PDO::PARAM_INT);
        $base->bindParam(":id_compartido", $datos['id_compartido'], PDO::PARAM_INT);
        try {
            return $base->execute();
        } catch (PDOException $exc) {
            return $exc->getMessage();
        }
    }

    public function archivosCompartidos($idUsuario) {
        $sql = 'SELECT AR.id, AR.tipo, US.usuario, AR.nombre, AR.url, AC.fechaRegistro
                FROM archivo_compartido AC
                INNER JOIN archivo AR ON AC.id_archivo = AR.id
                INNER JOIN usuario US ON AC.id_usuario = US.id
                WHERE AC.id_compartido = :IDusuario';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":IDusuario", $idUsuario, PDO::PARAM_INT);
        if ($base->execute()) {
            return $base->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function verArchivoCompartido($id){
        $sql = 'SELECT tipo, url FROM archivo WHERE id = :ID';
        $base = $this->conexion->prepare($sql);
        $base->bindParam(":ID", $id, PDO::PARAM_INT);
        if ($base->execute()) {
            return $base->fetch(PDO::FETCH_ASSOC);
        }
    }

}
