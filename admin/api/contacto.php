<?php



if ($_POST['nombre'] == '' || $_POST['correo'] == '' || $_POST['asunto'] == '' || $_POST['mensaje'] == '') {

    header('X-php-Response-Code: 404', 'ok', 404);
    return;
} else {

    $para  = 'info@acpd-peru.com';
    // // título
    $título = "Mensaje del Sitio Web ACPD PERU";

    $servicios = '';

    // mensaje
    $mensaje = '
            <html>
            <body>
            <h3>' . $_POST['nombre'] . '</h3>
            <b>servicios:</b> <ul>' .
        $servicios
        . '</ul>
            <p><b>Email:</b>' . $_POST['correo'] . '</p>
            <p><b>Asunto:</b>' . $_POST['asunto'] . '</p>
            <p><b>Mensaje:</b>'  . $_POST['mensaje'] . '</p>     
            </body>
            </html>
            ';

    // Para enviar un correo HTML, debe establecerse la cabecera Content-type
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

    // Cabeceras adicionales
    $cabeceras .= 'Mensaje del Sitio Web ACPD PERU';

    // Enviarlo
    mail($para, $título, $mensaje, $cabeceras);
    echo json_encode("ok", true);
}
