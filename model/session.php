<?php  
session_start();
if (isset($_SESSION['warning'])) {
    $_SESSION['warning'] = null;
}
header('location:../registrar.php');
?>