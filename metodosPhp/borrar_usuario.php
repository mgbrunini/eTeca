<?php

include("conexion.php");

$id = $_POST['id'];
$sql = "DELETE FROM `usuarios` WHERE id='$id'";

if ( mysqli_query($conn, $sql)) {
    header("location:../abmUsuarios.php");
} else {
    echo "Falló";
}

?>