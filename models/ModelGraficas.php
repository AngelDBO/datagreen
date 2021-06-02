<?php

require_once '../config/database/conexion.php';

class Grafica {

    public $conexion;

    public function __construct() {
        $this->conexion = conexion::conectar();
    }

    public function pagosRealizados() {
        $localtion = "SET lc_time_names = 'es_ES'";
        $this->conexion->query($localtion);
        $sql = 'SELECT MONTHNAME(fechaRegistro) AS Mes, COUNT(*) AS Total FROM pago GROUP BY Mes ORDER BY fechaRegistro ASC';
        $base = $this->conexion->prepare($sql);
        $base->execute();
        return $base->fetchAll(PDO::FETCH_ASSOC);
    }

    public function graficaIngresos() {
        $localtion = "SET lc_time_names = 'es_ES'";
        $this->conexion->query($localtion);
        $sql = 'SELECT MONTHNAME(fechaRegistro) AS Mes, COUNT(*) AS Total FROM ingreso GROUP BY Mes ORDER BY fechaRegistro ASC;';
        $base = $this->conexion->prepare($sql);
        $base->execute();
        return $base->fetchAll(PDO::FETCH_ASSOC);
    }

    public function graficaEgresos() {
        $localtion = "SET lc_time_names = 'es_ES'";
        $this->conexion->query($localtion);
        $sql = 'SELECT MONTHNAME(fechaRegistro) AS Mes, COUNT(*) AS Total FROM egreso GROUP BY Mes ORDER BY fechaRegistro ASC;';
        $base = $this->conexion->prepare($sql);
        $base->execute();
        return $base->fetchAll(PDO::FETCH_ASSOC);
    }

    public function totalTerceros() {
        $sql = 'SELECT COUNT(*) AS Total FROM empresa';
        $base = $this->conexion->prepare($sql);
        $base->execute();
        return $base->fetch(PDO::FETCH_ASSOC);
    }
    
    public function totalPagos() {
        $sql = 'SELECT SUM(monto) AS Total FROM pago';
        $base = $this->conexion->prepare($sql);
        $base->execute();
        return $base->fetch(PDO::FETCH_ASSOC);
    }

    public function totalIngresos() {
        $sql = 'SELECT SUM(monto) AS Total FROM ingreso';
        $base = $this->conexion->prepare($sql);
        $base->execute();
        return $base->fetch(PDO::FETCH_ASSOC);
    }

    public function totalEgresos() {
        $sql = 'SELECT SUM(monto) AS Total FROM egreso';
        $base = $this->conexion->prepare($sql);
        $base->execute();
        return $base->fetch(PDO::FETCH_ASSOC);
    }

}
