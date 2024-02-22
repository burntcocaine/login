<?php include "../conexion.php";?>
<?php
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
    $insertar = "INSERT miembros (id_,miembro, DNI, Nombre, Apellidos, Fecha_nac, Direccion, Ciudad, Pais, N_cuenta, Fecha_cobr ) VALUES ($identificador, '$DNI', '$Nombre', '$Apellidos', '$Fecha_nac' ,'$Direccion', '$Ciudad', '$Pais', '$N_cuenta', '$Fecha_cobr')";
    echo $insertar;
    //mysqli_query($conexion, $insertar);
    //header("Location:alta_ok.php");?>