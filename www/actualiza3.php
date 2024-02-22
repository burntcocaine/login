<?php include "conexion.php";?>
<?php
    
    $idm = $_GET["idmodifica"];
    $nombreantiguo = $_GET["nombreimagen"];

    mysqli_select_db($conexion, "FOUNDATION");
    $identificador = $_POST["identificador"];
    $nombre = $_POST["nombre"];
    $talla = $_POST["talla"];
    $tipo = $_POST["tipo"];
    $precio = $_POST["precio"];
    //var_dump ($_FILES['imagen']);
    
    $directorioSubida = "imagenes/";
    $max_file_size="5120000";
    $extensionesValidas=array("jpg","png","gif");
    
    if($_FILES['imagen']['name'] != ""){
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
    }

    if($_FILES['imagen']['name'] != ""){
        $insertar = "UPDATE productos SET id_producto=$identificador, nombre='$nombre', talla = '$talla', tipo = '$tipo', precio = $precio, fotografia = '$nombreArchivo' WHERE id_producto='$idm'";
    }
    else{
        $insertar = "UPDATE productos SET id_producto=$identificador, nombre='$nombre', talla = '$talla', tipo = '$tipo', precio = $precio, fotografia = '$nombreantiguo' WHERE id_producto='$idm'";   
    }

    
    mysqli_query($conexion, $insertar);
    header("Location:actualiza_ok.php");?>
