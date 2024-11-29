<?php
session_start();
if (isset($_SESSION['nombre'])) {
    echo "Página solo accesible si pasé por el login";
    echo "<br>";
    echo "<a href='cerrarSesion.php'>Cerrar Sesion</a>";
} else {
    echo "Usted no está autorizado";
}
?>