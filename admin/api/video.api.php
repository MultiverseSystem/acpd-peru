<?php
// echo json_encode($_SERVER['REQUEST_METHOD']) ;
// return
require_once '../controllers/VideoController.php';
require_once '../model/videos.model.php';

class ApiVideo
{
    public $id;
    public $dataVideo;
    public $page;
    public $carpeta;
    public function setVideos()
    {
        $respuesta = VideoController::ctrIngresarVideo($this->dataVideo);
        echo json_encode($respuesta);
    }

    //mostrar lista de videos
    public function getVideos()
    {
        $item = null;
        $valor = null;
        $carpeta = isset($this->carpeta) ? $this->carpeta : '';
        $videos = VideoController::ctrGetVideos($item, $valor, $this->page, $carpeta);
        echo json_encode($videos);
    }

    //Editar Video

    public function editarVideo()
    {

        $video = VideoController::ctrEditarVideo(json_decode($this->dataVideo, true), number_format($this->id));
        echo json_encode($video, true);
    }

    //Eliminar Video
    public function destroyVideo()
    {
        $video = VideoController::ctrDeleteVideo($this->dataVideo);
        echo json_encode($video);
    }

    //mostrar video en vivo

    public function getVideoEnVivo()
    {
        $video = VideoController::ctrVideoEnVivo();
        echo json_encode($video);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = new ApiVideo();
    $data->dataVideo = $_POST['data'];
    $data->setVideos();
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    if (isset($_GET['envivo'])) {
        $data = new ApiVideo();
        $data->getVideoEnVivo();
    } else {
        $data = new ApiVideo();
        $data->page = $_GET['page'];
        $data->carpeta = $_GET['carpeta'];
        $data->getVideos();
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = new ApiVideo();
    $data->dataVideo = file_get_contents('php://input');
    $data->destroyVideo();
} else if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = new ApiVideo();
    $data->dataVideo = file_get_contents('php://input');
    $data->id = $_SERVER['QUERY_STRING'];
    $data->editarVideo();
}
