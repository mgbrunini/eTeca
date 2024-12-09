<?php
// Incluye la conexión a la base de datos
include("conexion.php");

// Verifica si el parámetro 'id' fue proporcionado
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitiza el ID recibido

    // Prepara la consulta SQL
    $query = $conn->prepare("SELECT * FROM libros2 WHERE id = ?");
    if (!$query) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    // Vincula los parámetros
    $query->bind_param("i", $id);

    // Ejecuta la consulta
    $query->execute();

    // Obtiene el resultado
    $resultado = $query->get_result();

    // Verifica si hay datos
    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();

        // Inicia sesión para almacenar los datos temporalmente
        session_start();
        $_SESSION['usuario_editar'] = $usuario;

        // Redirige al formulario de edición
        header("Location: ../edit_libro.php");
        exit();
    } else {
        // Si el usuario no se encuentra
        echo "Libro no encontrado.";
    }
} else {
    echo "ID de libro no proporcionado.";
}
