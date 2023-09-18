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
    <?php
    require "bd.php";
    $conexion = conectar();
    $sql = "select * from usuarios";
    $resultado = mysqli_query($conexion, $sql);
    ?>
    <header class="text-center">
        <div class="p-3 mb-2 bg-info text-emphasis-light">
            <h1 class="text-center">Bienvenido al gestor de usuarios</h1>
        </div>
    </header>
    <br>
    <br>
    <section class="container">
        <h2>Dar de Alta un Nuevo Registro</h2>
        <br>
        <br>
        <form class="row g-3 needs-validation" novalidate action="altas.php" method="post" target="_blank">
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="validationCustom01" name="nombre" placeholder="Nombre" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="validationCustom02" name="apellido" placeholder="Apellido" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="col-md-4">
                <label for="validationCustom03" class="form-label">Email</label>
                <input type="email" class="form-control" id="validationCustom03" name="mail" placeholder="Email" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <br>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Enviar formulario</button>
                <button class="btn btn-primary" type="reset">Borrar</button>
            </div>
        </form>

    </section>
    <br>
    <br>
    <section class="container">
        <h2>Listado de Usuarios</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Email</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($filas = mysqli_fetch_assoc($resultado)) {

                ?>
                    <tr>
                        <td><?php echo $filas['nombre'] ?></td>
                        <td><?php echo $filas['apellido'] ?></td>
                        <td><?php echo $filas['mail'] ?></td>
                        <td>
                            <a href="modificar.php?id=<?php echo $filas['id']; ?>"> <button type="button" class="btn btn-warning">Modificar</button></a>
                            <a href="#" onclick="confirmarEliminacion(<?php echo $filas['id']; ?>);"><button type="button" class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                <?php
                }

                ?>
            </tbody>
        </table>
    </section>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>