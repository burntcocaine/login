<?php include "../conexion.php";?>
<?php
    
    $idm = $_POST["identificador"];
    //$nombreantiguo = $_GET["nombreimagen"];

    mysqli_select_db($conexion, "productosbd");
    $identificador = $_POST["identificador"];
    $DNI = $_POST["DNI"];
    $Nombre = $_POST["Nombre"];
    $Apellidos = $_POST["Apellidos"];
    $Fecha_nac = $_POST["Fecha_nac"];
    $Direccion = $_POST["Direccion"];
    $Ciudad = $_POST["Ciudad"];
    $Pais = $_POST["Pais"];
    $N_cuenta = $_POST["N_cuenta"];
    $Fecha_cobr = $_POST["Fecha_cobr"];
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
    $insertar = "UPDATE miembros SET id_miembro=$identificador, DNI='$DNI', Nombre = '$Nombre', Apellidos = '$Apellidos', Fecha_nac = '$Fecha_nac', Direccion = '$Direccion' , Ciudad = '$Ciudad', Pais = '$Pais', N_cuenta = '$N_cuenta', Fecha_cobr = '$Fecha_cobr' WHERE id_miembro='$idm'";

    /*if($_FILES['imagen']['name'] != ""){
    }
    else{
        $insertar = "UPDATE cliente SET idcliente=$identificador, nombre='$nombre', ape_paterno = '$ape_paterno', edad = $edad, direccion = '$direccion', dni = '$dni' , telefono = $telefono WHERE idcliente='$idm'";
    }*/

    //echo $insertar
    mysqli_query($conexion, $insertar);
    header("Location:actualiza_ok.php");?>
