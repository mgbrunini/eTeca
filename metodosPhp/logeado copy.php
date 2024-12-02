<?php
//Inicia una sesion
session_start();
$_SESSION['nombre']="x";

include("conexión.php");
$usuario = $_POST['usuario'];
$psw = $_POST['psw'];

setcookie("USU", $usuario);

$sql = "SELECT * from alumnos WHERE usuario='$usuario' and correo='$psw'";
$consulta = mysqli_query($conn, $sql);

$existe = mysqli_num_rows($consulta);

echo "<script>console.log(El resultado de $consulta es ".$consulta.")</script>";
echo "<script>console.log(El resultado de $existe es ".$existe.")</script>";

if ($existe == 1) {
    header("location:../dashboard.php");
} else {
    header("location:../login.php");
}
?>