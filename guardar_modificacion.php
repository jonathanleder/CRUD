<?php
require "bd.php"; // Asegúrate de incluir tu archivo de conexión

$conexion = conectar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = json_decode(file_get_contents("php://input"));

    if (
        isset($data->id) &&
        isset($data->nombre) &&
        isset($data->apellido) &&
        isset($data->mail) &&
        isset($data->usuario) &&
        isset($data->rol)
    ) {
        // Obtener los datos del objeto JSON
        $id = $data->id;
        $nombre = $data->nombre;
        $apellido = $data->apellido;
        $mail = $data->mail;
        $usuario = $data->usuario;
        $rol = $data->rol;

        $sql = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', mail = '$mail', usuario = '$usuario', rol = '$rol' WHERE id = $id";
        if (mysqli_query($conexion, $sql)) {
            // Prepara una respuesta JSON exitosa
            $response = array(
                "success" => true,
                "mensaje" => "Cambios guardados con éxito."
            );
        } else {
            // Prepara una respuesta JSON de error
            $response = array(
                "success" => false,
                "mensaje" => "Error al guardar cambios: " . mysqli_error($conexion)
            );
        }
    } else {
        // Ejecuta la consulta SQL para actualizar el registro
        $response = array(
            "success" => false,
            "mensaje" => "Por favor, complete todos los campos del formulario."
        );
    }
} else {
    // Si no es una solicitud POST válida, devuelve una respuesta JSON de error
    $response = array(
        "success" => false,
        "mensaje" => "Solicitud no válida."
    );
}

mysqli_close($conexion);

// Devuelve la respuesta como JSON
header("Content-Type: application/json");
echo json_encode($response);
