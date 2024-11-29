<?php

include("conexion.php");
$usuario = $_POST['usuario'];
$psw = $_POST['contraseña'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$correo = $_POST['correo'];

// $sql = "INSERT INTO usuarios VALUES('$usuario','$psw','$nombre','$apellido','$dni','$correo')";
$sql = "INSERT INTO `usuarios`(`usuario`, `contrasena`, `nombre`, `apellido`, `dni`, `correo`) VALUES ('$usuario','$psw','$nombre','$apellido','$dni','$correo')";

if ( mysqli_query($conn, $sql)) {
    header("location:../abmUsuarios.php");
} else {
    echo "Falló";
}

?>