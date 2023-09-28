<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>CRUD</title>
</head>

<body>
    <?php
    require "bd.php"; // Incluye el archivo que define las funciones

    $conexion = conectar();
    $sql = "select * from usuarios";
    $resultado = mysqli_query($conexion, $sql);
    $sqlRoles = "select * from roles";
    $resultadoRoles = mysqli_query($conexion, $sqlRoles);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Verificar si se ha enviado el formulario de alta
        if (isset($_POST['alta'])) {
            // Obtener los datos del formulario
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $mail = $_POST['mail'];
            $usuario = $_POST['usuario'];
            $rol = $_POST['rol'];

            // Realizar la solicitud AJAX para dar de alta al usuario
            echo "<script>
                darDeAlta('$nombre', '$apellido', '$mail', '$usuario', '$rol');
            </script>";
        }

        // Verificar si se ha enviado el formulario de eliminación
        if (isset($_POST['eliminar'])) {
            // Obtener el ID del registro a eliminar
            $idEliminar = $_POST['idEliminar'];

            // Llama a la función confirmarEliminar para mostrar el cuadro de diálogo de confirmación
            echo "<script>
                    confirmarEliminar($idEliminar);
                  </script>";
        }
    }
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
        <form class="needs-validation" novalidate id="altaForm">
            <div class="row g-3">
                <div class="col-md-4">
                    <label for="validationCustom0" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="validationCustom01" name="nombre" placeholder="Nombre" required>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="validationCustom02" name="apellido" placeholder="Apellido" required>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom03" class="form-label">Email</label>
                    <input type="email" class="form-control" id="validationCustom03" name="mail" placeholder="Email" required>
                </div>
            </div>
            <div class="row g-2" style="margin-top: 5px;">
                <div class="col-md-6">
                    <label for="validationCustom01" class="form-label">Usuario(nickname)</label>
                    <input type="text" class="form-control" id="validationCustom0" name="usuario" placeholder="Nickname" required>
                </div>

                <div class="col-md-6">
                    <div class="input-box">
                        <label class="form-label">Rol</label>
                        <select class="form-control" name="rol" required>
                            <option value="1" selected>Seleccionar</option>
                            <?php
                            while ($filasRoles = mysqli_fetch_assoc($resultadoRoles)) {
                            ?>
                                <option value="<?php echo $filasRoles['rol'] ?>"><?php echo $filasRoles['rol'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <div class="col-12">
                <button class="btn btn-primary" type="submit" name="alta">Enviar formulario</button>
                <button class="btn btn-primary" type="reset">Borrar</button>
            </div>
        </form>
        <div id="resultado"></div>
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
                    <th scope="col">Usuario</th>
                    <th scope="col">Rol</th>
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
                        <td><?php echo $filas['usuario'] ?></td>
                        <td><?php echo $filas['rol'] ?></td>
                        <td>
                            <a href="modificar.php?id=<?php echo $filas['id']; ?>"> <button type="button" class="btn btn-warning">Modificar</button></a>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="idEliminar" value="<?php echo $filas['id']; ?>">
                                <button type="button" class="btn btn-danger eliminar-btn" data-id="<?php echo $filas['id']; ?>">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/scripts.js"></script>
</body>

</html>