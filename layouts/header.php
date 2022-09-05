<?php
error_reporting(0);
session_start() ?>
<!DOCTYPE html>
<html lang="es">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>acdp-peru</title>
    <meta name="description" content="Somos una gran familia en Cristo, con la sede principal en Lima e iglesias hijas en las comunidades shipibas de Shetebo y Cannan en Loreto.">
    <meta name="keywords" content="iglesia, fe, pueblo de dios, iglesia cristiana, Oración">
    <link rel="shortcut icon" href="assets/images/icon/logomin.png" type="image/x-icon">

    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/lightcase.css">
    <link rel="stylesheet" href="assets/css/my.css">

    <!-- main css for template -->
    <link rel="stylesheet" href="assets/css/style.min.css">
</head>

<body>

    <!-- ================> preloader start here <================ -->
    <div class="preloader">
        <div class="preloader-inner">
            <!-- <img style="height:100px;width:120px ;" src="assets/images/logo/1.png" alt=""> -->
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>

        </div>
    </div>


    <header class="header">
        <div class="navbar-expand-xl">
            <div class="collapse navbar-collapse" id="menubar2">
                <div class=" w-100">
                    <div class="container">
                        <div class="header__top-area">
                            <div class="header__top-left">
                                <ul>
                                    <li class="colorSpam">
                                        <i class="fas fa-phone-alt "></i>
                                        +51 944 447 904
                                    </li>

                                </ul>
                            </div>
                            <div class="header__top-center">

                            </div>
                            <div class="header__top-right">
                                <div class="header__top-socialsearch">
                                    <div class="header__top-social">
                                        <ul>
                                            <li class="colorSpam"> <a href="https://twitter.com/ICPDIOS?t=L0Uq0uG2Xky37NdFHpctiA&s=09://twitter.com/wpzoom" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter colorSpam"></i> </a>
                                            </li>
                                            <li class="colorSpam"> <a href="https://www.instagram.com/iglesiacristianapueblodedios/?hl=es" target="_blank" rel="noopener noreferrer"><i class="fab fa-instagram colorSpam"></i> </a>
                                            </li>
                                            <li> <a href="https://www.youtube.com/channel/UCnQONrNqMllwQdF681fUMYA" target="_blank" rel="noopener noreferrer"><i class="fab fa-youtube colorSpam"></i> </a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="header__top-search">
                                        <ul>
                                            <li class="colorSpam"> <a href="https://www.facebook.com/IglepueblodeDios/" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f colorSpam"></i> </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header__bottom">
            <div class="container">
                <div class="header__mainmenu navbar navbar-expand-xl navbar-light">
                    <!-- <a href="index" class="default-btn "><img src="assets/images/logo/1.png" alt="logo"></a> -->
                    <div class="header__logo">

                        <a href="index" class="d-none d-xl-block"><img src="assets/images/logo/1.png" alt="logo"></a>
                        <a href="index" class="d-xl-none"><img src="assets/images/logo/1.png" alt="logo"></a>


                    </div>
                    <div class="header__bar">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menubar" aria-controls="menubar" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon "></span>
                        </button>

                        <button class="navbar-toggler header__bar-info" type="button" data-bs-toggle="collapse" data-bs-target="#menubar2" aria-controls="menubar2" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="fas fa-info"></span>
                        </button>

                    </div>
                    <div class="header__menu navbar-expand-xl">
                        <div class="collapse navbar-collapse" id="menubar">
                            <ul>


                                <li>
                                    <a href="/">INICIO</a>
                                </li>
                                <li>
                                    <a href="nosotros">NOSOTROS</a>
                                </li>
                                <li>
                                    <a href="programas">PROGRAMAS</a>
                                </li>
                                <li>
                                    <a href="actividades">ACTIVIDADES</a>
                                </li>
                                <li>
                                    <a href="#">GALERÍA</a>
                                    <ul>
                                        <li><a href="videos">videos</a></li>
                                        <li><a href="galeria">fotografías</a></li>
                                        <li><a href="mensajes">predicas</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="contacto">CONTÁCTANOS</a>
                                </li>
                                <li>
                                    <a href="vivo"><span class="text-danger">EN VIVO <i class="fas fa-heart"></i></span></a>

                                </li>
                                <?php if (isset($_SESSION['permiso'])) : ?>

                                    <?php if ($_SESSION['permiso'] == 'es true') : ?>
                                        <li>
                                            <a href="#">Administración </a>
                                            <ul>
                                                <li><a href="admin">videos</a></li>
                                                <li><a href="admin_msj">mensajes</a></li>
                                                <li><a href="model/logout">Cerrar sesión</a></li>
                                            </ul>

                                        </li>
                                    <?php else : ?>
                                        <li>
                                            <a href="login">Iniciar sesión</a>
                                        </li>
                                    <?php endif; ?>

                                <?php else : ?>
                                    <li>
                                        <a href="login">Iniciar sesión</a>
                                    </li>
                                <?php endif; ?>


                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>