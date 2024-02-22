<?php include "../conexion.php";?>
<?php
    mysqli_select_db($conexion, "productosbd");
    $identificador = $_POST["identificador"];
    $nombre = $_POST["nombre"];
    $pais = $_POST['pais'];
    $ciudad = $_POST['ciudad'];
    $provincia = $_POST['provincia'];
    $telefono = $_POST['telefono'];
   
   
    $insertar = "INSERT sedes (id, nombre, pais, ciudad, provincia, telefono) VALUES ($identificador, '$nombre', '$pais', '$ciudad', '$provincia', '$telefono')";
    //echo $insertar;

   mysqli_query($conexion, $insertar);
   header("Location:alta_ok.php");?>