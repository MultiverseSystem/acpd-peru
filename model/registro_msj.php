<?php

include "database.php";

$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : "";
$links = isset($_POST['links']) ? $_POST['links'] : "";
$titulo = isset($_POST['titulo']) ? $_POST['titulo'] : "";
$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";


function registrar_msj($m,$l){
  
    $sql = "INSERT INTO mensaje VALUES (null,null,'$m','$l',CURRENT_TIMESTAMP())";
    $conect = new Conexion();
    $result = $conect->Conectar();
    $execute = $result ->prepare($sql);
    $execute -> execute();
}

registrar_msj($titulo,$descripcion);
header('location:../admin_msj.php');
 



   
