<?php  
	/* Desarrollado por: PROGRAMANDO BROTHERS 	
	Suscribete a : https://www.youtube.com/ProgramandoBrothers y comparte los v�deos.
	Recuerda: "EL CONOCIMIENTO SE COMPARTE, POR M�S POCO QUE SEA".
	*/
    session_start();
    $usuario = $_SESSION['usuario'];
    if(!isset($usuario)){
        header("Location: /index.php");
        exit;
    }
    
   include "../conexion.php";
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <title>Administracion BD Productos</title>
    <meta http-equiv="Content-Type" content="text/html; charset=uft-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- bootstrap -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- libraries -->
    <link href="css/lib/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
    <link href="css/lib/font-awesome.css" type="text/css" rel="stylesheet" />
    <link href="css/lib/uniform.default.css" type="text/css" rel="stylesheet" />
    <link href="css/lib/select2.css" type="text/css" rel="stylesheet" />
    <link href="css/lib/bootstrap.datepicker.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="css/compiled/layout.css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/elements.css" />
    <link rel="stylesheet" type="text/css" href="css/compiled/icons.css" />

    <!-- this page specific styles -->
    <link rel="stylesheet" href="css/compiled/index.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/compiled/form-showcase.css" type="text/css" media="screen" />

    <!-- open sans font -->
    <link href='http://fonts.googleapis.com/css?family=OpenSans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

    <!-- lato font -->
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css' />

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

  <link rel ="icon" type="image/x-icon" href="favicon.ico">


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
    <!-- navbar -->
<header class="navbar navbar-inverse" role="banner">
        <div class="navbar-header">            
            <a class="navbar-brand" href="admdb.php">
            <img src="/imagenes/logosolo.png" class="logo" alt="logo" width="65" height="65" />Foundation Administracion
            </a>
        </div>
        <ul class="nav navbar-nav pull-right hidden-xs">                       
            <li class="notification-dropdown hidden-xs hidden-sm">
                <a href="#" class="trigger">
                    <i class="icon-user"></i>
                </a>
                <div class="pop-dialog">                    
                </div>
            </li>
            <li class="dropdown open">
                <a href="#" class="dropdown-toggle hidden-xs hidden-sm" data-toggle="dropdown">
                    Bienvenido<?php echo ": ".$_SESSION['NombreCompleto']."<br>"."con DNI: ".$_SESSION['dni'] ?>
                </a>                
            </li>             
            <li class="settings hidden-xs hidden-sm">
                <a href="../cerrarSesion.php" role="button">
                    <i class="icon-share-alt"></i>
                </a>
            </li>
        </ul>


</header>


<div class="container my-5">
    <div class="row">
        <div class="col text-center">

            <div class="card">
                <div class="card-header display-6">
                    Listado de clientes
                </div>                
            </div>

            <div class="card">
                <div class="card-header display-8">
                    Descargar en pdf <a href="http://foundation.asix/clientes/clientes_pdf.php" title="Descargar Listado" target="_blank">
	                  <img alt="descergar pdf" src="../imagenes/descargarpdf.png" width="40" height="40" />
</a>
                </div>                
            </div>

            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header"> 
                            Productos:
                        </div>
                        <?php
                          mysqli_select_db($conexion,"productosbd");
                          $consultar= "SELECT * FROM cliente";

                          $registros= mysqli_query($conexion, $consultar);

                        ?>
                        <div class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">DNI</th>
                                <th scope="col">Teléfono</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php

                                while($registro=mysqli_fetch_row($registros)){

                              ?>


                              <tr class="align-middle">
                                <td scope="row"><?php echo $registro[0]; ?></td>
                                <td><?php echo $registro[1]; ?></td>
                                <td><?php echo $registro[2]; ?></td>
                                <td><?php echo $registro[3]; ?></td>
                                <td><?php echo $registro[4]; ?></td>
                                <td><?php echo $registro[5]; ?></td>
                                <td><?php echo $registro[6]; ?></td>
                              </tr>
                              
                            
                              <?php
                                }
                              ?>

                            </tbody>
                            
                          </table>
                        </div>
                        

                    </div>
                </div>

            <a href="http://www.foundation.asix/clientes/clientes.php"> <i class="bi-arrow-return-left px-3" style="font-size: 4rem; color:black;"></i> </a>
        </div>  
    </div>
</div>




<?php 
include "../footer.php"
?>
