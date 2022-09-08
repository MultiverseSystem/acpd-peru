<?php

class UcuarioController
{
    static public function ctrInicioSesion($data)
    {
        $tabla = 'usuario';
        $item = 'email';
        $valor = json_decode($data);
   
        $respuesta = ModeloUsuario::mdlInicioSesion($tabla, $item, $valor);
       
        if (!$respuesta) {
            return $respuesta;
        } else if ($respuesta && $respuesta["email"] == $valor->correo && $valor->pass == $respuesta["password"]) {
        // } else if ($respuesta && $respuesta["email"] == $valor->correo && password_verify($valor->pass, $respuesta["password"])) {

            session_start();
            $_SESSION = [
                'iniciarSesion' => "ok",
                'usuario' => $respuesta["email"],
            ];
            return "ok";
        }else{
            return "contraseña incorrecta";
        }
    }

    static public function ctrCrearUsuario($correo, $pass)
    {

        $tabla = 'usuario';
        $contraseña = password_hash($pass, PASSWORD_BCRYPT);

        $respuesta = ModeloUsuario::mdlIngresarUsuario($tabla, $correo, $contraseña);
        return $respuesta;
    }

    static public function ctrCerrarSesion(){
        session_start();

        session_destroy();
        return "ok";
    }
}
