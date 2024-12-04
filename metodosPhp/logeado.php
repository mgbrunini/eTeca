<?php
// Inicia una sesión
session_start();
$_SESSION['nombre'] = "x";

include("conexion.php");

$usuario = $_POST['usuario'];
$psw = $_POST['psw'];

setcookie("USU", $usuario);

// Escapar valores para evitar inyección SQL
$usuario = mysqli_real_escape_string($conn, $usuario);
$psw = mysqli_real_escape_string($conn, $psw);

// Consulta SQL
$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena='$psw'";
$consulta = mysqli_query($conn, $sql);

// Verificar si la consulta es válida
if (!$consulta) {
    // Muestra el error de SQL en caso de fallo
    die("Error en la consulta: " . mysqli_error($conn));
}

$existe = mysqli_num_rows($consulta);

// Enviar información a la consola del navegador
echo "<script>console.log('Consulta: " . addslashes($sql) . "');</script>";
echo "<script>console.log('El resultado de \$existe es: " . addslashes($existe) . "');</script>";
echo "<script>console.log('El resultado de \$usuario es: " . addslashes($usuario) . "');</script>";
echo "<script>console.log('El resultado de \$psw es: " . addslashes($psw) . "');</script>";

// Redirigir según el resultado
if ($existe == 1) {
    header("Location: ../dashboard.php");
    exit();
} else {
    echo "<script>alert('Usuario o contraseña incorrectos');</script>";
    header("Location: ../login.php");
    exit();
}
?>
