<?php
session_start();
$_SESSION['warning'] = "true";
include "database.php";

$id = isset($_POST['id']) ? $_POST['id'] : "";
$titulo = isset($_POST['titulo']) ? $_POST['titulo'] : "";
$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";


$day = !empty($_POST['day']) ? $_POST['day'] : $_POST['day'] = null;
$month = !empty($_POST['month']) ? $_POST['month'] : $_POST['month'] = null;
$year = !empty($_POST['year']) ? $_POST['year'] : $_POST['year'] = null;
if ($_POST['day'] && $_POST['month'] && $_POST['year']) {

    $date = "$year-$month-$day";
    
    if($day < 33 && $month < 13  && $year > 1900 && $year < 3000) {

        $sql = "UPDATE mensaje SET titulo='$titulo',descripcion='$descripcion' ,fecha='$date' WHERE id='$id'";
        $conect = new Conexion();
        $result = $conect->Conectar();
        $execute = $result->prepare($sql);
        $execute->execute();
        $_SESSION['warning_msj'] = "true";
        header('location:../admin_msj.php');
    }else{

        $_SESSION['warning_msj'] = "false";
        header('location:../editar_msj.php?id=' . $id);
    }

    echo $date;
    var_dump($date);
} elseif ($day == null && $month == null && $year == null) {
    $sql = "UPDATE mensaje SET titulo='$titulo',descripcion='$descripcion' WHERE id='$id'";
    $conect = new Conexion();
    $result = $conect->Conectar();
    $execute = $result->prepare($sql);
    $execute->execute();
    $_SESSION['warning_msj'] = "true";
    header('location:../admin_msj.php');

    echo "registro";
} elseif ($day == null || $month == null || $year == null) {
    $_SESSION['warning_msj'] = "campo";
    header('location:../editar_msj.php?id=' . $id);
    echo "no registra vete";
}



