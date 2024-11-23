<?php

$base = "eTeca";
$conn = mysqli_connect("localhost", "root", "", $base);

if ($conn) {
    echo "Hola People!";
} else {
    echo "Falló la conexión";
}
//Ta
?>