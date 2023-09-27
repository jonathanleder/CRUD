<?php
function conectar()
{
    $con = mysqli_connect("localhost", "root", "");
    if (!$con) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    // Establecer el conjunto de caracteres
    mysqli_query($con, "SET NAMES 'utf8'");

    // Seleccionar la base de datos
    mysqli_select_db($con, "registro");


    return $con; // Devuelve la conexión para su uso posterior
}

function darDeAlta($nombre, $apellido, $mail, $usuario, $rol)
{
    // Validar que los campos no estén vacíos
    // Todos los campos están completos, proceder con la inserción en la base de datos
    $conexion = conectar();

    // Escapar valores para prevenir SQL injection
    $nombre = mysqli_real_escape_string($conexion, $nombre);
    $apellido = mysqli_real_escape_string($conexion, $apellido);
    $mail = mysqli_real_escape_string($conexion, $mail);
    $usuario = mysqli_real_escape_string($conexion, $usuario);
    $rol = mysqli_real_escape_string($conexion, $rol);

    // Ejecutar la consulta SQL para insertar el nuevo registro
    $sql = "INSERT INTO usuarios (nombre, apellido, mail, usuario, rol) VALUES ('$nombre', '$apellido', '$mail', '$usuario', '$rol')";
    if (mysqli_query($conexion, $sql)) {
        mysqli_close($conexion);
        return "Registro dado de alta con éxito.";
    } else {
        mysqli_close($conexion);
        return "Error al dar de alta el registro: " . mysqli_error($conexion);
    }
}


function eliminarRegistro($idEliminar)
{
    $conexion = conectar();

    // Ejecutar la consulta SQL para eliminar el registro con el ID proporcionado
    $sql = "DELETE FROM usuarios WHERE id = $idEliminar";

    if (mysqli_query($conexion, $sql)) {
        mysqli_close($conexion); // Cierra la conexión si la eliminación es exitosa
        return true;
    } else {
        mysqli_close($conexion); // Cierra la conexión en caso de error también
        return false;
    }
}



function confirmarEliminar($idEliminar)
{
    echo "<script>
            Swal.fire({
                title: '¿Estás seguro?',
                text: 'No podrás revertir esta acción.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Llama a la función eliminarRegistro si se confirma la eliminación
                    eliminarRegistro($idEliminar);
                }
            });
        </script>";
}
