<?php
session_start();
$_SESSION['warning_date'] = "true";
$_SESSION['warning'] = "true";
include "database.php";

$id = $_POST['id'];
$links = $_POST['links'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$categoria = $_POST['categoria'];
$opcion = $_POST['opcion'];

$day = !empty($_POST['day']) ? $_POST['day'] : $_POST['day'] = null;
$month = !empty($_POST['month']) ? $_POST['month'] : $_POST['month'] = null;
$year = !empty($_POST['year']) ? $_POST['year'] : $_POST['year'] = null;

$filter1 = "https://www.youtube.com/watch?v=";
$filter2 = "https://www.youtube.com/embed/";

$filter3 = "https://www.facebook.com/IglepueblodeDios/videos/";
$filter4 = "https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2FIglepueblodeDios%2Fvideos%2F";
$plus = "&show_text=false&t=0";


if ($_POST['day'] && $_POST['month'] && $_POST['year']) {

  $date = "$year-$month-$day";

  if ($day < 33 && $month < 13  && $year > 1900 && $year < 3000) {

    if ($categoria == "youtube") {
      if (strncmp($filter1, $links, 32) === 0) {
        $catch = substr($links, 32, 20);
        $mod = "$filter2$catch";
        if ($opcion == 1) {
          $sql = "UPDATE content SET modify = '$mod', links='$links',titulo='$titulo',descripcion='$descripcion',categoria='$categoria',publicacion = '$date',opcion=CURRENT_TIMESTAMP() WHERE id='$id'";
        } else {
          $sql = "UPDATE content SET modify = '$mod', links='$links',titulo='$titulo',descripcion='$descripcion',categoria='$categoria',publicacion = '$date' WHERE id='$id'";
        }
        $conect = new Conexion();
        $result = $conect->Conectar();
        $execute = $result->prepare($sql);
        $execute->execute();
        $data = $execute->fetch(PDO::FETCH_OBJ);
        header('location:../editar.php?id=' . $id);
      } else {
        $_SESSION['warning'] = "youtube";
        header('location:../editar.php?id=' . $id);
      }
    } elseif ($categoria == "facebook") {
      if (strncmp($filter3, $links, 49) === 0) {
        $catch = substr($links, 49, 40);
        $mod = "$filter4$catch$plus";
        if ($opcion == 1) {
          $sql = "UPDATE content SET modify = '$mod', links='$links',titulo='$titulo',descripcion='$descripcion',categoria='$categoria',publicacion = '$date',opcion=CURRENT_TIMESTAMP() WHERE id='$id'";
        } else {
          $sql = "UPDATE content SET modify = '$mod', links='$links',titulo='$titulo',descripcion='$descripcion',categoria='$categoria',publicacion = '$date' WHERE id='$id'";
        }
        $conect = new Conexion();
        $result = $conect->Conectar();
        $execute = $result->prepare($sql);
        $execute->execute();
        $data = $execute->fetch(PDO::FETCH_OBJ);

        header('location:../editar.php?id=' . $id);
      } else {
        $_SESSION['warning'] = "facebook";
        header('location:../editar.php?id=' . $id);
      }
    }
  }else{
    $_SESSION['warning_date'] = "false";
    header('location:../editar.php?id=' . $id);
  }
} elseif ($day == null && $month == null && $year == null) {
  if ($categoria == "youtube") {
    if (strncmp($filter1, $links, 32) === 0) {
      $catch = substr($links, 32, 20);
      $mod = "$filter2$catch";
      if ($opcion == 1) {
        $sql = "UPDATE content SET modify = '$mod', links='$links',titulo='$titulo',descripcion='$descripcion',categoria='$categoria',opcion=CURRENT_TIMESTAMP() WHERE id='$id'";
      } else {
        $sql = "UPDATE content SET modify = '$mod', links='$links',titulo='$titulo',descripcion='$descripcion',categoria='$categoria' WHERE id='$id'";
      }
      $conect = new Conexion();
      $result = $conect->Conectar();
      $execute = $result->prepare($sql);
      $execute->execute();
      $data = $execute->fetch(PDO::FETCH_OBJ);
      header('location:../editar.php?id=' . $id);
    } else {
      $_SESSION['warning'] = "youtube";
      header('location:../editar.php?id=' . $id);
    }
  }elseif ($categoria == "facebook") {
    if (strncmp($filter3, $links, 49) === 0) {
      $catch = substr($links, 49, 40);
      $mod = "$filter4$catch$plus";
      if ($opcion == 1) {
        $sql = "UPDATE content SET modify = '$mod', links='$links',titulo='$titulo',descripcion='$descripcion',categoria='$categoria',opcion=CURRENT_TIMESTAMP() WHERE id='$id'";
      } else {
        $sql = "UPDATE content SET modify = '$mod', links='$links',titulo='$titulo',descripcion='$descripcion',categoria='$categoria' WHERE id='$id'";
      }
      $conect = new Conexion();
      $result = $conect->Conectar();
      $execute = $result->prepare($sql);
      $execute->execute();
      $data = $execute->fetch(PDO::FETCH_OBJ);

      header('location:../editar.php?id=' . $id);
    } else {
      $_SESSION['warning'] = "facebook";
      header('location:../editar.php?id=' . $id);
    }
  }
} elseif ($day == null || $month == null || $year == null) {
  $_SESSION['warning_date'] = "campo";
  header('location:../editar.php?id=' . $id);

}
