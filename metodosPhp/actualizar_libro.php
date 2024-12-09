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
    $id_exists = $conn->prepare("SELECT id FROM libros2 WHERE id = ?");
    $id_exists->bind_param("i", $id);
    $id_exists->execute();
    $id_exists->store_result();

    if ($id_exists->num_rows === 0) {
        die("El libro con ID $id no existe.");
    }
    $id_exists->close();

    // Ruta donde se guardarán las imágenes
    $carpeta = "../assets/";

    // Verificar que la carpeta exista o crearla
    if (!is_dir($carpeta)) {
        mkdir($carpeta, 0777, true);
    }

    // Manejo de la imagen (opcional)
    $imagen = null;
    if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $imagen_tmp = $_FILES['img']['tmp_name'];
        $imagen_nombre = basename($_FILES['img']['name']);
        $imagen_ext = strtolower(pathinfo($imagen_nombre, PATHINFO_EXTENSION));

        // Validar el tipo de archivo
        $extensiones_permitidas = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imagen_ext, $extensiones_permitidas)) {
            die("Formato de imagen no válido. Solo se permiten JPG, JPEG, PNG y GIF.");
        }

        // Generar un nombre único para la imagen
        $imagen_nueva = uniqid("libro_") . '.' . $imagen_ext;

        // Ruta donde se guardará la imagen
        $ruta_imagen = $carpeta . $imagen_nueva;

        // Mover la imagen al directorio final
        if (!move_uploaded_file($imagen_tmp, $ruta_imagen)) {
            die("Error al subir la imagen.");
        }

        $imagen = "assets/" . $imagen_nueva; // Ruta relativa para guardar en la base de datos
    }

    // Preparar la consulta de actualización
    if ($imagen) {
        $query = $conn->prepare("UPDATE libros2 SET nomlibro = ?, `reseña` = ?, genero = ?, autor = ?, cantpag = ?, img = ? WHERE id = ?");
        $query->bind_param("ssssisi", $nomlibro, $reseña, $genero, $autor, $cantpag, $imagen, $id);
    } else {
        $query = $conn->prepare("UPDATE libros2 SET nomlibro = ?, `reseña` = ?, genero = ?, autor = ?, cantpag = ? WHERE id = ?");
        $query->bind_param("ssssii", $nomlibro, $reseña, $genero, $autor, $cantpag, $id);
    }

    // Ejecutar la consulta
    if ($query->execute()) {
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
