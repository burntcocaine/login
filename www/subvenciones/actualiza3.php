<?php include "../conexion.php";?>
<?php
    
    $idm = $_POST["identificador"];
    //$nombreantiguo = $_GET["nombreimagen"];

    mysqli_select_db($conexion, "productosbd");
    $identificador = $_POST["identificador"];
    $cantidad = $_POST["cantidad"];
    $organismo = $_POST["organismo"];
    $fecha_sub = $_POST["fecha_sub"];
    
    //var_dump ($_FILES['imagen']);
    /*
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
    }*/
    $insertar = "UPDATE subvenciones SET id=$identificador, cantidad=$cantidad, organismo='$organismo', fecha_sub='$fecha_sub' WHERE id='$idm'";

    /*if($_FILES['imagen']['name'] != ""){
    }
    else{
        $insertar = "UPDATE cliente SET idcliente=$identificador, nombre='$nombre', ape_paterno = '$ape_paterno', edad = $edad, direccion = '$direccion', dni = '$dni' , telefono = $telefono WHERE idcliente='$idm'";
    }*/

    //echo $insertar
    mysqli_query($conexion, $insertar);
    header("Location:actualiza_ok.php");?>
