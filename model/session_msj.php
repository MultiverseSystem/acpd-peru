<?php  
session_start();
if (isset($_SESSION['warning_msj'])) {
    $_SESSION['warning_msj'] = null;
}
header('location:../registro_msj.php');
?>