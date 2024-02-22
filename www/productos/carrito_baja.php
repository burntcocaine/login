<?php 
include "../conexion.php";

mysqli_Select_db($conexion, "productosbd");

$productoborrar = $_GET["id"];
$borrar="DELETE FROM carrito WHERE id_producto = '$productoborrar'";
mysqli_Query($conexion, $borrar);
header("Location: carrito.php");
?>