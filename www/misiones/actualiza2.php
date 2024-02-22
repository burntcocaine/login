<head>
<title>Actualizar cliente</title>
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
$clienteactualizar = $_GET["id"];
$seleccionar = "SELECT * FROM cliente WHERE idcliente='$clienteactualizar'";
$registros = mysqli_Query($conexion, $seleccionar);
$registro = mysqli_fetch_row($registros);
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">

            <div class="card">
                <div class="card-header display-6">
                    Actualización de cliente
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
                          <label for="" class="form-label">Id</label>
                          <input type="number"
                            class="form-control" name="identificador" id="identificador" autofocus required value="<?php echo $registro[0];?>" aria-describedby="helpId" placeholder="Introduce el ID">
                          <small id="helpId" class="form-text text-muted">Identificador</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Nombre</label>
                          <input type="text"
                            class="form-control" name="nombre" id="nombre"  required value="<?php echo $registro[1];?>" aria-describedby="helpId" placeholder="Introduce el Nombre">
                          <small id="helpId" class="form-text text-muted">Nombre</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Apellido</label>
                          <input type="text"
                            class="form-control" name="ape_paterno" id="ape_paterno"  required value="<?php echo $registro[2];?>" aria-describedby="helpId" placeholder="Introduce el Apellido">
                          <small id="helpId" class="form-text text-muted">Apellido</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Edad</label>
                          <input type="number" class="form-control" name="edad" id="edad" required value="<?php echo $registro[3];?>" aria-describedby="helpId" placeholder="Introduce la Edad">
                          <small id="helpId" class="form-text text-muted">Edad</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Direccion</label>
                          <input type="text" class="form-control" name="direccion" id="direccion" required value="<?php echo $registro[4];?>" aria-describedby="helpId" placeholder="Introduce la Direccion">
                          <small id="helpId" class="form-text text-muted">Direccion</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Dni</label>
                          <input type="text" class="form-control" name="dni" id="dni" required value="<?php echo $registro[5];?>" aria-describedby="helpId" placeholder="Introduce el Dni">
                          <small id="helpId" class="form-text text-muted">Dni</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Telefono</label>
                          <input type="number" class="form-control" name="telefono" id="telefono" required value="<?php echo $registro[6];?>" aria-describedby="helpId" placeholder="Introduce el Telefono">
                          <small id="helpId" class="form-text text-muted">Telefono</small>
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
