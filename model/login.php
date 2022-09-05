<?php
include "database.php";
session_start();
$name = !empty($_POST['name'])? $_POST['name'] : "" ;
$pass = !empty($_POST['password'])? $_POST['password']:"";
      // $sql = "SELECT * FROM login";
    function login($name,$pass){
        $sql = "SELECT * FROM login WHERE name = '$name' and password = '$pass'";
        $conect = new Conexion();
        $result = $conect->Conectar();
        $execute = $result ->prepare($sql);
        $execute -> execute();
        $data = $execute->fetchAll();
        
        if(count($data)==1){
            $_SESSION['permiso']="es true";
            header('location:../admin.php');

        }else{
            $_SESSION['permiso']="es false";
            header('location:../login.php');
        }
    };

login($name,$pass);


