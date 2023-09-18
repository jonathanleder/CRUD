<?php
require "bd.php"; // Asegúrate de incluir tu archivo de conexión

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conexion = conectar();

    // Recupera los datos del registro seleccionado
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = mysqli_query($conexion, $sql);
    $registro = mysqli_fetch_assoc($resultado);

    mysqli_close($conexion);
} else {
    echo "ID de registro no proporcionado.";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
    <title>CRUD</title>
</head>

<body>
    <header class="text-center">
        <div class="p-3 mb-2 bg-info text-emphasis-light">
            <h1 class="text-center">Modificar Registro</h1>
        </div>
    </header>
    <br>
    <br>
    <section class="container">
        <form class="row g-3 needs-validation" novalidate action="guardar_modificacion.php" method="post">
            <!-- Campos del formulario para editar los detalles del registro -->

            <div class="col-md-4">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $registro['nombre']; ?>" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $registro['apellido']; ?>" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $registro['mail']; ?>" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>

            <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Guardar cambios</button>
            </div>
            </div>
        </form>
        <div class="col-12 " style="margin-top: 5px;">
            <a href="index.php"><button class="btn btn-primary">Volver</button></a>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>