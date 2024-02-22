<?php 
include "../conexion.php";

mysqli_Select_db($conexion, "productosbd");

$productoborrar = $_GET["id"];
$borrar="DELETE FROM donaciones WHERE id_donacion = '$productoborrar'";
mysqli_Query($conexion, $borrar);
header("Location: baja_ok.php");
?>