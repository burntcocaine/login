<?php
include "../conexion.php";

if(isset($_GET["id"]) && isset($_GET["nombre"]) && isset($_GET["descripcion"]) && isset($_GET["precio"]) && isset($_GET["fotografia"])) {
    $id_producto = $_GET["id"];
    $nombre = $_GET["nombre"];
    $descripcion = $_GET["descripcion"];
    $precio = $_GET["precio"];
    $fotografia = $_GET["fotografia"];

    $insertar = "INSERT INTO carrito (id_producto, nombre, descripcion, precio, fotografia) VALUES ('$id_producto', '$nombre', '$descripcion', '$precio', '$fotografia')";
    mysqli_query($conexion, $insertar);
    
    header("Location: carrito_ok.php");
} else {
    echo "No se recibieron todos los datos necesarios.";
}
?>
