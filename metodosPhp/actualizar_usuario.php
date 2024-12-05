<?php
// actualizar_usuario.php
include("conexion.php"); // Conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $telefono = trim($_POST['telefono']);

    // Validar que los datos no estén vacíos
    if (empty($nombre) || empty($email) || empty($telefono)) {
        echo "Por favor, completa todos los campos.";
        exit();
    }

    // Actualizar en la base de datos
    $query = $conexion->prepare("UPDATE usuarios SET nombre = ?, email = ?, telefono = ? WHERE id = ?");
    $query->bind_param("sssi", $nombre, $email, $telefono, $id);

    if ($query->execute()) {
        echo "Usuario actualizado con éxito.";
    } else {
        echo "Error al actualizar el usuario.";
    }
} else {
    echo "Acceso no autorizado.";
}
?>
