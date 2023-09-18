<?php
require "bd.php"; // Asegúrate de incluir tu archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido=$_POST['apellido'];
    $mail=$_POST['mail'];

    $conexion = conectar();

    // Ejecuta la consulta SQL para actualizar el registro
    $sql = "UPDATE usuarios SET nombre = '$nombre' apellido = '$apellido' mail= '$mail' WHERE id = $id";
    if (mysqli_query($conexion, $sql)) {
        echo "Cambios guardados con éxito.";
    } else {
        echo "Error al guardar cambios: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
} else {
    echo "Solicitud no válida.";
}
?>
