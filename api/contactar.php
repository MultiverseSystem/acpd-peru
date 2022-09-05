<?php 

$data = json_decode($_POST['informacion'], true);

if ($data['nombre']==''|| $data['email']==''|| $data['asunto'] ==''|| $data['msj']=='') {
    echo json_encode("no enviado", true);
    return; 
}else {
    echo json_encode("enviado", true);
}
