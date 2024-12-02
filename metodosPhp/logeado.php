<?php
// Inicia una sesión
session_start();
$_SESSION['nombre'] = "x";

include("conexión.php");
$usuario = $_POST['usuario'];
$psw = $_POST['psw'];

setcookie("USU", $usuario);

$sql = "SELECT * FROM alumnos WHERE usuario='$usuario' AND correo='$psw'";
$consulta = mysqli_query($conn, $sql);

$existe = mysqli_num_rows($consulta);

// Convierte el recurso de consulta en una representación legible
$consulta_resultado = $consulta ? 'Consulta válida' : 'Consulta fallida: ' . mysqli_error($conn);

// Enviar información a la consola del navegador
echo "<script>console.log('El resultado de \$consulta es: " . addslashes($consulta_resultado) . "');</script>";
echo "<script>console.log('El resultado de \$existe es: " . addslashes($existe) . "');</script>";
echo "<script>console.log('El resultado de \$usuario es: " . addslashes($usuario) . "');</script>";
echo "<script>console.log('El resultado de \$passw es: " . addslashes($psw) . "');</script>";

if ($existe == 1) {
    header("location:../dashboard.php");
} else {
    // header("location:../login.php");
}
?>
