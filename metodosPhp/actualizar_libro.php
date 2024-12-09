<?php
// actualizar_libro.php
include("conexion.php"); // Conexión a la base de datos

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $nomlibro = htmlspecialchars(strip_tags(trim($_POST['nomlibro'])));
    $reseña = htmlspecialchars(strip_tags(trim($_POST['reseña'])));
    $genero = htmlspecialchars(strip_tags(trim($_POST['genero'])));
    $autor = htmlspecialchars(strip_tags(trim($_POST['autor'])));
    $cantpag = intval($_POST['cantpag']);

    // Validar que los datos no estén vacíos
    if (empty($nomlibro) || empty($reseña) || empty($genero) || empty($autor) || $cantpag <= 0) {
        die("Por favor, completa todos los campos.");
    }

    // Verificar que el ID exista
    $id_exists = $conn->prepare("SELECT id FROM libros WHERE id = ?");
    $id_exists->bind_param("i", $id);
    $id_exists->execute();
    $id_exists->store_result();

    if ($id_exists->num_rows === 0) {
        die("El libro con ID $id no existe.");
    }
    $id_exists->close();

    // Actualizar en la base de datos
    $query = $conn->prepare("UPDATE libros SET nomlibro = ?, `reseña` = ?, genero = ?, autor = ?, cantpag = ? WHERE id = ?");
    if (!$query) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $query->bind_param("ssssii", $nomlibro, $reseña, $genero, $autor, $cantpag, $id);

    // Ejecutar la consulta
    if ($query->execute()) {
        // echo "Libro actualizado con éxito.";
        header("location:../carga_libros.php");
    } else {
        echo "Error al actualizar el libro: " . $conn->error;
    }

    // Cerrar la conexión
    $query->close();
    $conn->close();
} else {
    die("Acceso no autorizado.");
}
?>
