<?php

include("conexion.php");

$id = $_POST['id'];
$sql = "DELETE FROM `libros2` WHERE id='$id'";

if ( mysqli_query($conn, $sql)) {
    header("location:../carga_libros.php");
} else {
    echo "Falló";
}

?>