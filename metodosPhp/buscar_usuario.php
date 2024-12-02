<?php

include("conexion.php");

$id = $_POST['id'];
$sql = "SELECT * FROM `usuarios` WHERE id='$id'";

if ( mysqli_query($conn, $sql)) {
    header("location:../edit_usuario.php");
} else {
    echo "Falló";
}

?>