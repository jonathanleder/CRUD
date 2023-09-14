<?php
    function conectar(){
        $con = mysql_connect("localhost","root","","usuarios");
        mysqli_query("SET NAME 'utf8'");
    }
?>