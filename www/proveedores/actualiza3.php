<?php include "../conexion.php";?>
<?php
    
    $idm = $_POST["identificador"];
    //$nombreantiguo = $_GET["nombreimagen"];

    mysqli_select_db($conexion, "productosbd");
    $identificador = $_POST["identificador"];
    $nif = $_POST["nif"];
    $nombre = $_POST["nombre"];
    $codigo_postal = $_POST["codigo_postal"];
    $telefono = $_POST["telefono"];
    $id_empleado = $_POST["id_empleado"];
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
    $insertar = "UPDATE proveedores SET id_proveedor=$identificador , nif='$nif', nombre='$nombre', codigo_postal = '$codigo_postal',  telefono = $telefono, id_empleado = '$id_empleado' WHERE id_proveedor='$idm'";

    /*if($_FILES['imagen']['name'] != ""){
    }
    else{
        $insertar = "UPDATE cliente SET idcliente=$identificador, nombre='$nombre', ape_paterno = '$ape_paterno', edad = $edad, direccion = '$direccion', dni = '$dni' , telefono = $telefono WHERE idcliente='$idm'";
    }*/

    echo $insertar
    //mysqli_query($conexion, $insertar);
    //header("Location:actualiza_ok.php");?>
