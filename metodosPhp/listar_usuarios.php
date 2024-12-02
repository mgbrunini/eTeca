<?php
// Incluye la conexión a la base de datos
include("conexion.php");

// Prepara la consulta SQL
$sql = "SELECT id, usuario, contrasena, nombre, apellido, dni, correo FROM usuarios";
$consulta = mysqli_query($conn, $sql);

// Verifica si la consulta se ejecutó correctamente
if (!$consulta) {
    echo json_encode([
        "error" => "Error al realizar la consulta: " . mysqli_error($conn)
    ]);
    exit;
}

// Crea un array para almacenar los resultados
$usuarios = [];

// Recorre los resultados y agrégalos al array
while ($fila = mysqli_fetch_assoc($consulta)) {
    $usuarios[] = $fila;
}

// Devuelve los resultados como JSON
header('Content-Type: application/json');
echo json_encode($usuarios);

// Cierra la conexión a la base de datos
mysqli_close($conn);
?>
