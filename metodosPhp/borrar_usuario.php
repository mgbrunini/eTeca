<?php

include("conexion.php");

$dni = $_POST['dni'];


// $sql = "INSERT INTO usuarios VALUES('$usuario','$psw','$nombre','$apellido','$dni','$correo')";
$sql = "DELETE FROM `usuarios` WHERE dni='$dni'";

if ( mysqli_query($conn, $sql)) {
    header("location:../abmUsuarios.php");
} else {
    echo "Falló";
}

?>