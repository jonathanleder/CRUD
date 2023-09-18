<?php
   function conectar(){
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
?>