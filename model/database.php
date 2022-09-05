<?php
class Conexion{
    public static function Conectar(){
        if (!defined('servidor')) define('servidor','localhost');
        if (!defined('nombre_bd')) define('nombre_bd','multive2_acdp');
        if (!defined('user')) define('user','multive2_root');
        if (!defined('password')) define('password','X]iY7en4S1+m9Z');
     
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        try{
            $conexion = new PDO("mysql:host=".servidor.";dbname=".nombre_bd,user,password,$opciones);
            return $conexion;
        }catch(Exception $e){
            die("El error de conexion es :".$e->getMessage());
        }
    }
}

