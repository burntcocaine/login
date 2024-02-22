<?php 
include "header.php";
include "../conexion.php";

mysqli_Select_db($conexion, "productosbd");
$productoactualizar = $_GET["id"];
$seleccionar = "SELECT * FROM sedes WHERE id='$productoactualizar'";
$registros = mysqli_Query($conexion, $seleccionar);
$registro = mysqli_fetch_row($registros);
?>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">

            <div class="card">
                <div class="card-header display-6">
                    Actualización de una sede
                </div>                
            </div>

            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header"> 
                            Ingresar datos:
                        </div>
                        <form class="p-4" method="POST" action="actualiza3.php?idmodifica=<?php echo $productoactualizar;?>&nombreimagen==<?php echo $registro[4];?>" enctype="multipart/form-data">
                        
                        <div class="mb-3">
                          <label for="" class="form-label">Identificador</label>
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
                          <label for="" class="form-label">Pais</label>
                          <input type="text"
                            class="form-control" name="tipo" id="tipo"  required value="<?php echo $registro[3];?>" aria-describedby="helpId" placeholder="Introduce la talla">
                          <small id="helpId" class="form-text text-muted">Pais</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Ciudad</label>
                          <input type="text" class="form-control" name="precio" id="precio" required value="<?php echo $registro[4];?>" aria-describedby="helpId" placeholder="Introduce el precio">
                          <small id="helpId" class="form-text text-muted">Ciudad</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Provincia</label>
                          <input type="text" class="form-control" name="precio" id="precio" required value="<?php echo $registro[5];?>" aria-describedby="helpId" placeholder="Introduce el precio">
                          <small id="helpId" class="form-text text-muted">Provincia</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Telefono</label>
                          <input type="text" class="form-control" name="precio" id="precio" required value="<?php echo $registro[5];?>" aria-describedby="helpId" placeholder="Introduce el precio">
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
include "footer.php"
?>
