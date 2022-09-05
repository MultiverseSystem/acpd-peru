<?php
session_start();
$_SESSION["permiso"]="es false";
header('location:../index.php');