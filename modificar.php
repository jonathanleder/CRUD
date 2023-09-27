<?php
require "bd.php"; // Asegúrate de incluir tu archivo de conexión

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conexion = conectar();

    // Recupera los datos del registro seleccionado
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = mysqli_query($conexion, $sql);
    $registro = mysqli_fetch_assoc($resultado);
    $sqlRoles = "select * from roles";
    $resultadoRoles = mysqli_query($conexion, $sqlRoles);

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
        <form class="needs-validation" novalidate action="guardar_modificacion.php" method="post">
            <!-- Campos del formulario para editar los detalles del registro -->
            <div class="row g-3">
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
                    <label for="mail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="mail" name="mail" value="<?php echo $registro['mail']; ?>" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="row g-2">
                <div class="col-md-6">
                    <label for="nombre" class="form-label">Usuario</label>
                    <input type="text" class="form-control" id="nombre" name="usuario" value="<?php echo $registro['usuario']; ?>" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-box">
                    <label for="rol" class="form-label">Rol</label>
                        <select class="form-control" name="rol" required>
                            <option value="" selected> <?php echo $registro['rol']; ?> </option>
                            <?php
                            while ($filasRoles = mysqli_fetch_assoc($resultadoRoles)) {
                            ?>
                                <option value="<?php echo $filasRoles['rol'] ?>"><?php echo $filasRoles['rol'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>

            <input type="hidden" name="id" value="<?php echo $registro['id']; ?>">
            <div class="col-12" style="margin-top: 5px;">
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