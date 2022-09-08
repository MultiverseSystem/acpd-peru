<?php
require_once '../controllers/UsuarioController.php';
require_once '../model/usuario.model.php';


class ApiUsuario
{
    public $data;

    public function inicioSesion()
    {
        $login = UcuarioController::ctrInicioSesion($this->data);
        echo json_encode($login);
    }
    public function cerrarSesion()
    {
        $cerrar = UcuarioController::ctrCerrarSesion();
        echo json_encode($cerrar);
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = new ApiUsuario;
    $data->data = file_get_contents('php://input');
    $data->inicioSesion();
} else if ($_GET['sesion'] == "cerrar") {

    $data = new ApiUsuario;
    $data->cerrarSesion();
}
