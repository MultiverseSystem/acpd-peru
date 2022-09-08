<?php 
require_once "controllers/HomeController.php";
require_once "controllers/VideoController.php";
require_once "model/videos.model.php";

require_once 'controllers/UsuarioController.php';
require_once 'model/usuario.model.php';

$admin = new ControllerHome();
$admin -> ctrHome();