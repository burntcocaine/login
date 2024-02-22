<?php include "../conexion.php";?>
<?php
    mysqli_select_db($conexion, "productosbd");
    $identificador = $_POST["identificador"];
    $nombre_donante = $_POST["nombre_donante"];
    $cantidad = $_POST["cantidad"];
    $fecha = $_POST["fecha"];
    $telefono = $_POST["telefono"];
    $numero_donaciones = $_POST["numero_donaciones"];
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
    $insertar = "INSERT donaciones (id_donacion, nombre_donante, cantidad, fecha, telefono, numero_donaciones) VALUES ($identificador, '$nombre_donante', $cantidad, $fecha, $telefono, $numero_donaciones)";
    echo $insertar;
    /*mysqli_query($conexion, $insertar);
    header("Location:alta_ok.php");?>*/