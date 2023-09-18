<?php
require "bd.php"; // Asegúrate de incluir tu archivo de conexión

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conexion = conectar();

    // Ejecuta la consulta SQL para eliminar el registro
    $sql = "DELETE FROM usuarios WHERE id = $id";
    if (mysqli_query($conexion, $sql)) {
        echo "Registro eliminado con éxito.";
    } else {
        echo "Error al eliminar el registro: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
} else {
    echo "ID de registro no proporcionado.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
    <title>Bajas</title>
</head>
<body>
<a href="index.php"><button class="btn btn-primary">Volver</button></a>
    
</body>
</html>
