<?php
require "bd.php"; // Incluye el archivo que define las funciones

// Verificar si se recibió una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el ID del registro a eliminar desde los datos JSON
    $data = json_decode(file_get_contents("php://input"));
    $idEliminar = $data->idEliminar;

    // Llama a la función eliminarRegistro para procesar la eliminación
    $resultado = eliminarRegistro($idEliminar);

    if ($resultado === true) {
        // La eliminación fue exitosa, envía una respuesta de éxito
        echo "Registro eliminado con éxito";
    } else {
        // La eliminación falló, envía una respuesta de error
        echo "Error al eliminar el registro: " . $resultado;
    }
} else {
    // Solicitud no válida
    echo "Solicitud no válida";
}
