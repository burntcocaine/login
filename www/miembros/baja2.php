<?php 
include "../conexion.php";

mysqli_Select_db($conexion, "productosbd");

$productoborrar = $_GET["id"];
$borrar="DELETE FROM miembros WHERE id_miembro = '$productoborrar'";
mysqli_Query($conexion, $borrar);
header("Location: baja_ok.php");
?>