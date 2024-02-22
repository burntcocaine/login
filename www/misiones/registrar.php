<?php include "../conexion.php";?>
<?php
    mysqli_select_db($conexion, "productosbd");
    
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_fin = $_POST["fecha_fin"];
    $sede_id = $_POST["sede_id"];
    /*var_dump ($_FILES['imagen']);
    $directorioSubida = "../imagenes/";
    $max_file_size="5120000";
    $extensionesValidas=array("jpg","png","gif");
    if(isset($_FILES['imagen'])){
        $errores=0;
        $nombreArchivo = $_FILES['imagen']['name'];
        $filesize = $_FILES['imagen']['size'];
        $directorioTemp = $_FILES['imagen']['tmp_name'];
        $tipoArchivo = $_FILES['imagen']['type'];
        $arrayArchivo = pathinfo ($nombreArchivo);
        $extension = $arrayArchivo['extension'];

       
        if(!in_array($extension, $extensionesValidas)) {
            echo "Extensión no válida";
            $errores=1;
        }
        if($filesize > $max_file_size){
            echo "La imagen debe de tener un tamaño inferior";
            $errores= 1;
        }

        if ($errores == 0 ){

            $nombreCompleto = $directorioSubida.$nombreArchivo;
            //echo "Miguel: " . $nombreCompleto;
            move_uploaded_file($directorioTemp, $nombreCompleto);
        }
    }*/
    $insertar = "INSERT misiones (nombre, descripcion, fecha_inicio, fecha_fin, sede_id) VALUES ('$nombre', '$descripcion', '$fecha_inicio', '$fecha_fin' , $sede_id )";
    //echo $insertar;
    mysqli_query($conexion, $insertar);
   // header("Location:alta_ok.php");?>