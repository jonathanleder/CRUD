<?php
require "bd.php"; // Incluye el archivo que define las funciones

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos enviados en el cuerpo de la solicitud
    $data = json_decode(file_get_contents("php://input"));

    // Verificar que se han recibido datos válidos
    if (
        isset($data->nombre) &&
        isset($data->apellido) &&
        isset($data->mail) &&
        isset($data->usuario) &&
        isset($data->rol)
    ) {
        // Obtener los datos del objeto JSON
        $nombre = $data->nombre;
        $apellido = $data->apellido;
        $mail = $data->mail;
        $usuario = $data->usuario;
        $rol = $data->rol;

        // Llama a la función darDeAlta para procesar el alta
        $mensaje = darDeAlta($nombre, $apellido, $mail, $usuario, $rol);

        // Prepara una respuesta JSON
        $response = ["mensaje" => $mensaje, "success" => true];
        echo json_encode($response);
    } else {
        // Datos incompletos o incorrectos, prepara una respuesta JSON de error
        $response = ["mensaje" => "Datos incompletos o incorrectos.", "success" => false];
        echo json_encode($response);
    }
} else {
    // Solicitud no válida, prepara una respuesta JSON de error
    $response = ["mensaje" => "Solicitud no válida.", "success" => false];
    echo json_encode($response);
}
