<?php
class Conexion{
    public static function Conectar(){
        if (!defined('servidor')) define('servidor','localhost');
        if (!defined('nombre_bd')) define('nombre_bd','loginyt');
        if (!defined('user')) define('user','root');
        if (!defined('password')) define('password','');
     
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        try{
            $conexion = new PDO("mysql:host=".servidor.";dbname=".nombre_bd,user,password,$opciones);
            return $conexion;
        }catch(Exception $e){
            die("El error de conexion es :".$e->getMessage());
        }
    }
}

