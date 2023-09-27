<?php
require "bd.php"; // Asegúrate de incluir tu archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $mail = $_POST['mail'];
    $usuario = $_POST['usuario'];
    $rol = $_POST['rol'];

    $conexion = conectar();


    if (empty($nombre) || empty($apellido) || empty($mail) || empty($usuario) || empty($rol)) {
        echo "Por favor, complete todos los campos del formulario.";
    } else {

        // Ejecuta la consulta SQL para actualizar el registro
        $sql = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', mail = '$mail', usuario = '$usuario', rol = '$rol' WHERE id = $id";
        if (mysqli_query($conexion, $sql)) {
            echo "Cambios guardados con éxito.";
        } else {
            echo "Error al guardar cambios: " . mysqli_error($conexion);
        }

        mysqli_close($conexion);
    }
} else {
    echo "Solicitud no válida.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Modificacion Estado</title>
</head>

<body>
    <a href="index.php"><button class="btn btn-primary">Volver</button></a>

</body>

</html>