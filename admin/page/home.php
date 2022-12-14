<?php

session_start();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACPD-ADMIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <meta name="robots" content="noindex">

</head>

<body>

    <?php
    if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
        include "layouts/header.php";
        include "view/inicio.php";
    } else {
        if (isset($_GET["ruta"]) == "register") {
            include "view/auth/" . $_GET["ruta"] . ".php";
        } else {
            include "view/auth/login.php";
        }
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="page/js/app.js"></script>
    <script src="page/js/usuario.js"></script>
</body>

</html>