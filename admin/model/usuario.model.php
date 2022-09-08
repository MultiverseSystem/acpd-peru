<?php
require_once "conexion.php";

class ModeloUsuario
{
    static public function mdlInicioSesion($tabla, $item, $valor)
    {
        // return $valor->correo;
        try {
            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $tabla.$item = :$item");
            $stmt->bindParam(":" . $item, $valor->correo, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\Throwable $th) {
            $th->getMessage();
        }
    }

    static public function mdlIngresarUsuario($tabla, $data)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(`email`,`password`) VALUES(:email,:pass)");
            $stmt->bindParam(":email", $data->correo, PDO::PARAM_STR);
            $stmt->bindParam(":pass", $data->pass, PDO::PARAM_STR);
            $stmt->execute();
            return "ok";
        } catch (\Throwable $th) {
            $th->getMessage();
        }
    }
}
