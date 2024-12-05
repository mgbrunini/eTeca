<?php

include("conexion.php");

$id = $_POST['id']; // Asegúrate de que este valor se envíe correctamente desde el formulario

$usuario = $_POST['usuario'];
$psw = $_POST['contraseña'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$correo = $_POST['correo'];

// Estructura correcta para una consulta de actualización
$sql = "UPDATE usuarios SET usuario='$usuario', contrasena='$psw', nombre='$nombre', apellido='$apellido', dni='$dni', correo='$correo' WHERE id='$id'";

// Ejecutar la consulta
if (mysqli_query($conn, $sql)) {
    header("Location: ../abmUsuarios.php"); // Redirige si la actualización es exitosa
} else {
    echo "Error en la actualización: " . mysqli_error($conn); // Mostrar el error de SQL
}

?>
