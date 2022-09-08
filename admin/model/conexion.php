<?php

require_once(__DIR__.'/../config.php');

class Conexion{
    static public function conectar(){
        $servidor=SERVER;
        $usuario=USER;
        $password=PASSWORD;
        $dbname=DATABASE_NAME;

        try {
            $link = new PDO("mysql:host=$servidor;dbname=$dbname",$usuario,$password);
            $link->exec("set names utf8");
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $link;
        } catch (\Throwable $th) {
            echo "La conexión ha fallado: " . $th->getMessage();
        }

    }
}