<?php
session_start();
include "database.php";
$_SESSION['warning']= "true";
$filter1 = "https://www.youtube.com/watch?v=";
$filter2 = "https://www.youtube.com/embed/";
$filter3 = "https://www.facebook.com/IglepueblodeDios/videos/"; 
$filter4 = "https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2FIglepueblodeDios%2Fvideos%2F";
$plus = "&show_text=false&t=0";

$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : "";
$links = isset($_POST['links']) ? $_POST['links'] : "";
$titulo = isset($_POST['titulo']) ? $_POST['titulo'] : "";
$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
$modify = isset($_POST['links']) ? $_POST['links'] : "";
$opcion = isset($_POST['opcion']) ? $_POST['opcion'] : "";

function registrar($m,$l,$t,$d,$c,$o){
    if($o == 1){
        $sql = "INSERT INTO content VALUES (null,'$m','$l','$t','$d','$c',CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP())";
    }else{
        $sql = "INSERT INTO content VALUES (null,'$m','$l','$t','$d','$c',CURRENT_TIMESTAMP(),null)";
    }
    $conect = new Conexion();
    $result = $conect->Conectar();
    $execute = $result ->prepare($sql);
    $execute -> execute();
}

if($categoria == "youtube"){
    if(strncmp($filter1, $links, 32) === 0){
        $catch = substr($links,32,20);
        $mod = "$filter2$catch";
        registrar($mod,$links,$titulo,$descripcion,$categoria,$opcion);
        header("location:../registrar.php");
        
    }else{
        $_SESSION['warning']=$categoria;
        header("location:../registrar.php");
    }
}elseif($categoria == "facebook"){
    if(strncmp($filter3, $links, 49) === 0){
        $catch = substr($links,49,40);
        $mod = "$filter4$catch$plus";
        registrar($mod,$links,$titulo,$descripcion,$categoria,$opcion);
      
        header("location:../registrar.php");
    }else{
        $_SESSION['warning']= $categoria ;
        header("location:../registrar.php");
    }

}else{
    echo "no estas usando las redes correctas";
}



   
