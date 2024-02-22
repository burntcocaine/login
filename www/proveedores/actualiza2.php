<head>
<title>Actualizar un proveedor</title>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS v5.2.1 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

<link rel ="icon" type="image/x-icon" href="favicon.ico">


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</head>

<?php 

include "../conexion.php";

mysqli_Select_db($conexion, "productosbd");
$proveedoractualizar = $_GET["id_proveedor"];
$seleccionar = "SELECT * FROM proveedores WHERE id_proveedor='$proveedoractualizar'";
$registros = mysqli_Query($conexion, $seleccionar);
$registro = mysqli_fetch_row($registros);
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">

            <div class="card">
                <div class="card-header display-6">
                    Actualización de un proveedor
                </div>                
            </div>

            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> 
                            Ingresar datos:
                        </div>
                        <form class="p-4" method="POST" action="actualiza3.php" enctype="multipart/form-data">
                        
                        <div class="mb-3">
                          <label for="" class="form-label">id_proveedor</label>
                          <input type="number"
                            class="form-control" name="identificador" id="identificador" autofocus required value="<?php echo $registro[0];?>" aria-describedby="helpId" placeholder="Introduce el ID Proveedor">
                          <small id="helpId" class="form-text text-muted">id_proveedor</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">nif</label>
                          <input type="text"
                            class="form-control" name="nombre" id="nombre"  required value="<?php echo $registro[1];?>" aria-describedby="helpId" placeholder="Introduce el Nif">
                          <small id="helpId" class="form-text text-muted">nif</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">nombre</label>
                          <input type="text"
                            class="form-control" name="ape_paterno" id="ape_paterno"  required value="<?php echo $registro[2];?>" aria-describedby="helpId" placeholder="Introduce el Nombre">
                          <small id="helpId" class="form-text text-muted">nombre</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">codigo_postal</label>
                          <input type="number" class="form-control" name="edad" id="edad" required value="<?php echo $registro[3];?>" aria-describedby="helpId" placeholder="Introduce el Codigo Postal">
                          <small id="helpId" class="form-text text-muted">codigo_postal</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">telefono</label>
                          <input type="text" class="form-control" name="direccion" id="direccion" required value="<?php echo $registro[4];?>" aria-describedby="helpId" placeholder="Introduce el telefono">
                          <small id="helpId" class="form-text text-muted">telefono</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">id_empleado</label>
                          <input type="number" class="form-control" name="dni" id="dni" required value="<?php echo $registro[5];?>" aria-describedby="helpId" placeholder="Introduce el Id_Empleado">
                          <small id="helpId" class="form-text text-muted">id_empleado</small>
                        </div>

                        <div class="d-grid">
                            <input type="submit" class="btn btn-primary" value="Actualizar">
                        </div>

                        

                        </form>

                    </div>
                </div>

            <a href="actualiza.php"> <i class="bi-arrow-return-left px-3" style="font-size: 4rem; color:black;"></i> </a>
        </div>  
    </div>
</div>




<?php 
include "../footer.php"
?>
