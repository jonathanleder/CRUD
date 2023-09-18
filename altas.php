<?php
require "bd.php"; // Asegúrate de incluir tu archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido= $_POST['apellido'];
    $mail = $_POST['mail'];
    $conexion = conectar();

    // Ejecuta la consulta SQL para insertar el nuevo registro
    $sql = "INSERT INTO usuarios (nombre, apellido,mail) VALUES ('$nombre', '$apellido','$mail')";
    if (mysqli_query($conexion, $sql)) {
        echo "Registro dado de alta con éxito.";
    } else {
        echo "Error al dar de alta el registro: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
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
    <title>Altas</title>
</head>
<body>
<a href="index.php"><button class="btn btn-primary">Volver</button></a>
    
</body>
</html>
