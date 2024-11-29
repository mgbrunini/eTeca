<?php
//Inicia una sesion
session_start();
$_SESSION['nombre']="x";

include("conexión.php");
$usuario = $_POST['usuario'];
$psw = $_POST['psw'];
$sql = "SELECT * from alumnos WHERE usuario='$usuario' and correo='$psw'";
$consulta = mysqli_query($conn, $sql);
$existe = mysqli_num_rows($consulta);

if ($existe == 1) {
    header("location:prueba.php");
} else {
    header("location:login.php");
}

// CLASE 4 / 12:55