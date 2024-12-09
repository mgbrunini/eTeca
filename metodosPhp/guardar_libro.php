<?php

include("conexion.php");

// Capturar datos del formulario
$nomLibro = $_POST['nombre_libro'];
$resena = $_POST['resena'];
$genero = $_POST['genero'];
$autor = $_POST['autor'];
$cantidad_paginas = $_POST['cantidad_paginas'];

// Ruta donde se guardarán las imágenes
$carpeta = "../assets/";

// Verificar que la carpeta exista o crearla
if (!is_dir($carpeta)) {
    mkdir($carpeta, 0777, true);
}

// Verificar si se envió correctamente un archivo de imagen
if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {
    $nombreArchivo = basename($_FILES['img']['name']);
    $rutaArchivo = $carpeta . $nombreArchivo;

    // Mover el archivo subido a la carpeta de destino
    if (move_uploaded_file($_FILES['img']['tmp_name'], $rutaArchivo)) {
        $imgRutaGuardada = "assets/" . $nombreArchivo; // Ruta relativa para guardar en la base de datos
    } else {
        echo "Error al subir la imagen.";
        exit; // Salir del script si ocurre un error al guardar la imagen
    }
} else {
    echo "No se envió una imagen o hubo un error.";
    exit; // Salir del script si no se subió ninguna imagen
}

// Insertar datos en la base de datos
$sql = "INSERT INTO `libros2` (`nomlibro`, `reseña`, `genero`, `autor`, `cantpag`, `img`) 
        VALUES ('$nomLibro', '$resena', '$genero', '$autor', '$cantidad_paginas', '$imgRutaGuardada')";

if (mysqli_query($conn, $sql)) {
    header("location:../carga_libros.php");
} else {
    echo "Error al guardar en la base de datos: " . mysqli_error($conn);
}

?>
