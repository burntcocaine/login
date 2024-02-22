<?php include "conexion.php";?>
<?php
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
    }
    $insertar = "INSERT productos (id_producto, nombre, talla, tipo, precio, fotografia) VALUES ($identificador, '$nombre', '$talla', '$tipo', $precio, '$nombreArchivo')";
    //echo $insertar;
    mysqli_query($conexion, $insertar);
    header("Location:alta_ok.php");?>