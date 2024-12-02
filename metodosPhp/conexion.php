<?php

$base = "eteca";
$conn = mysqli_connect("localhost", "root", "", $base);

if ($conn) {
    // echo "Se conecta a la DB";
    // echo "<br>";
} else {
    echo "Falló la conexión";
}
?>