<?php

include("conexion.php");
$nomLibro = $_POST['nombre_libro'];
$resena = $_POST['resena'];
$genero = $_POST['genero'];
$autor = $_POST['autor'];
$cantidad_paginas = $_POST['cantidad_paginas'];

$sql = "INSERT INTO `libros`(`nomlibro`, `reseña`, `genero`, `autor`, `cantpag`) VALUES ('$nomLibro','$resena','$genero','$autor','$cantidad_paginas')";

if ( mysqli_query($conn, $sql)) {
    header("location:../carga_libros.php");
} else {
    echo "Falló";
}

?>