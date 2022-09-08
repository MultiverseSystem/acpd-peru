<?php

class VideoController
{

    //ingresar videos
    static public function ctrIngresarVideo($data)
    {
        $tabla = "videos";
        $info = json_decode($data, true);
        $respuesta = VideoModel::mdlIngresarVideo($tabla, $info);
        return $respuesta;
    }

    //mostrar videos 
    static public function ctrGetVideos($item, $valor, $page,$carpeta)
    {
        $tabla = "videos";
        $respuesta = VideoModel::mdlGetVideo($tabla, $item, $valor, $page,$carpeta);
        return $respuesta;
    }

    //editar video
    static public function ctrEditarVideo($data, $id)
    {
        $tabla = "videos";
        $respuesta = VideoModel::mdlEditarVideo($tabla, $data, $id);
        return $respuesta;
    }

    //eliminar video
    static public function ctrDeleteVideo($id)
    {
        $tabla = "videos";
        $data = json_decode($id, true);
        $respuesta = VideoModel::mdlDestroy($tabla, $data);
        return $respuesta;
    }

    //mostrar video en vivo

    static public function ctrVideoEnVivo(){
        $tabla="videos";
        $respuesta = VideoModel::mdlVideoEnVivo($tabla);
        return $respuesta;
    }

}
