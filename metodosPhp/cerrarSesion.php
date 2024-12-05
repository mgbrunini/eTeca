<?php
error_reporting(0);
session_start();
session_destroy();
setcookie("USU","");
header("Location: ../index.php");
?>