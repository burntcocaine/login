<?php 
include "../conexion.php";

mysqli_Select_db($conexion, "productosbd");

$proveedorborrar = $_GET["id_proveedor"];
$borrar="DELETE FROM proveedores WHERE id_proveedor = '$proveedorborrar'";
mysqli_Query($conexion, $borrar);
header("Location: baja_ok.php");
?>