<?php

include("conexion.php");

$id = $_POST['id'];

$usuario = $_POST['usuario'];
$psw = $_POST['contraseña'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$correo = $_POST['correo'];

$sql = "UPDATE INTO `usuarios`(`usuario`, `contrasena`, `nombre`, `apellido`, `dni`, `correo`) VALUES ('$usuario','$psw','$nombre','$apellido','$dni','$correo') WHERE id='$id'";

if ( mysqli_query($conn, $sql)) {
    header("location:../abmUsuarios.php");
} else {
    echo "Falló";
}

?>