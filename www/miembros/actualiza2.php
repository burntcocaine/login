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
$seleccionar = "SELECT * FROM miembros WHERE id_miembro='$clienteactualizar'";
$registros = mysqli_Query($conexion, $seleccionar);
$registro = mysqli_fetch_row($registros);
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">

            <div class="card">
                <div class="card-header display-6">
                    Actualización de miembro
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
                          <label for="" class="form-label">DNI</label>
                          <input type="text"
                            class="form-control" name="DNI" id="DNI"  required value="<?php echo $registro[1];?>" aria-describedby="helpId" placeholder="Introduce el Nombre">
                          <small id="helpId" class="form-text text-muted">DNI</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Nombre</label>
                          <input type="text"
                            class="form-control" name="Nombre" id="Nombre"  required value="<?php echo $registro[2];?>" aria-describedby="helpId" placeholder="Introduce el Apellido">
                          <small id="helpId" class="form-text text-muted">Nombre</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Apellidos</label>
                          <input type="text" class="form-control" name="Apellidos" id="Apellidos" required value="<?php echo $registro[3];?>" aria-describedby="helpId" placeholder="Introduce la Edad">
                          <small id="helpId" class="form-text text-muted">Apellidos</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Fecha de nacimiento</label>
                          <input type="text" class="form-control" name="Fecha_nac" id="Fecha_nac" required value="<?php echo $registro[4];?>" aria-describedby="helpId" placeholder="Introduce la Direccion">
                          <small id="helpId" class="form-text text-muted">Fecha_nac</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Direccion</label>
                          <input type="text" class="form-control" name="Direccion" id="Direccion" required value="<?php echo $registro[5];?>" aria-describedby="helpId" placeholder="Introduce el Dni">
                          <small id="helpId" class="form-text text-muted">Direccion</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Ciudad</label>
                          <input type="text" class="form-control" name="Ciudad" id="Ciudad" required value="<?php echo $registro[6];?>" aria-describedby="helpId" placeholder="Introduce el Telefono">
                          <small id="helpId" class="form-text text-muted">Ciudad</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Pais</label>
                          <input type="text" class="form-control" name="Pais" id="Pais" required value="<?php echo $registro[7];?>" aria-describedby="helpId" placeholder="Introduce el Telefono">
                          <small id="helpId" class="form-text text-muted">Pais</small>
                        </div>
                        
                        <div class="mb-3">
                          <label for="" class="form-label">Numero de cuenta</label>
                          <input type="text" class="form-control" name="N_cuenta" id="N_cuenta" required value="<?php echo $registro[8];?>" aria-describedby="helpId" placeholder="Introduce el Telefono">
                          <small id="helpId" class="form-text text-muted">N_cuenta</small>
                        </div>
                        <div class="mb-3">
                          <label for="" class="form-label">Fecha de cobro</label>
                          <input type="text" class="form-control" name="Fecha_cobr" id="Fecha_cobr" required value="<?php echo $registro[9];?>" aria-describedby="helpId" placeholder="Introduce el Telefono">
                          <small id="helpId" class="form-text text-muted">Fecha_cobr</small>
                        </div>

                        <div class="d-grid">
                            <input type="submit" class="btn btn-primary" value="Actualizar">
                        </div>

                        

                        </form>

                    </div>
                </div>

            <a href="http://www.foundation.asix/miembros/actualiza.php"> <i class="bi-arrow-return-left px-3" style="font-size: 4rem; color:black;"></i> </a>
        </div>  
    </div>
</div>




<?php 
include "../footer.php"
?>
