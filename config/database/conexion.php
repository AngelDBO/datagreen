<?php

class conexion {

    static function conectar() {
        try {
            require ('config.php');
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_CASE => PDO::CASE_NATURAL,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
            ];
            $base = new PDO(CADENA, USER, PASSWORD, $options);
            return $base;
        } catch (PDOException $e) {
            die('Error en la conexion: ' . $e->getMessage());
        }
    }

}

?>