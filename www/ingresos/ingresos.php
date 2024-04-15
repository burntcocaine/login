<?php  
	/* Desarrollado por: PROGRAMANDO BROTHERS 	
	Suscribete a : https://www.youtube.com/ProgramandoBrothers y comparte los v�deos.
	Recuerda: "EL CONOCIMIENTO SE COMPARTE, POR M�S POCO QUE SEA".
	*/
    session_start();
    $usuario = $_SESSION['usuario'];
    if(!isset($usuario)){
        header("Location: index.php");
        exit;
    }

    include "../conexion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    
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
            <a class="navbar-brand" href="http://www.foundation.asix/menu.php">
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
                <a href="cerrarSesion.php" role="button">
                    <i class="icon-share-alt"></i>
                </a>
            </li>
        </ul>


</header>
<body>

<div class="container my-5">
    <div class="row">
        <div class="col text-center">

            <div class="card">
                <div class="card-header display-6">
                    Administracion de ingresos
                </div>

                <div class="p-4">
                <div class="table-responsive">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Subvenciones</th>
                                <th scope="col">Donaciones</th>
                                <th scope="col">Miembros</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td scope="row"><a href="http://www.foundation.asix/subvenciones/subvenciones.php"><i class="bi bi-bank2 px-3" style="font-size: 12rem; color:green;"></i></a></td>
                                <td scope="row"><a href="http://www.foundation.asix/donaciones/donaciones.php"><i class="bi bi-cash-stack px-3" style="font-size: 12rem; color:orange;"></i></a></td>
                                <td scope="row"><a href="http://www.foundation.asix/miembros/miembros.php"><i class="bi bi-person-badge px-3" style="font-size: 12rem; color:yellow;"></a></i></td>
                                </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
    </div>
</div>
<div class="container my-5">
    <div class="row">

    
        <div class="col text-center">

            <div class="card">
                <div class="card-header display-6">
                    Listado de ingresos
                </div>                
            </div>

            <div class="card">
                <div class="card-header display-8">
                    Descargar en pdf <a href="localhost/ingresos_pdf.php" title="Descargar Listado" target="_blank">
	                  <img alt="descergar pdf" src="../imagenes/descargarpdf.png" width="40" height="40" />
                                                                                                            </a>
                </div>                
            </div>


            <div class="row mt-3 justify-content-md-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header"> 
                            Ingresos:
                        </div>
                                                  
                        <?php
                          $consulta = "SELECT * FROM (
                            SELECT s.Id, s.organismo, s.cantidad, s.fecha_sub AS fecha FROM subvenciones s
                            UNION ALL
                            SELECT d.id_donacion, d.nombre_donante, d.cantidad, d.fecha FROM donaciones d 
                            UNION ALL
                            SELECT m.id_miembro, m.NombreCompleto, m.Cantidad, m.Fecha_cobr FROM miembros m
                        ) AS combined_data
                        ORDER BY fecha DESC;";
                          /*consulta_miembros = "SELECT * FROM miembros";
                          $consulta_donaciones = "SELECT * FROM donaciones";
                          
                          $registros_subvenciones = mysqli_query($conexion, $consulta_subvenciones);
                          $registros_miembros = mysqli_query($conexion, $consulta_miembros);*/
                          $registros = mysqli_query($conexion, $consulta);
                        ?>

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Fecha ingreso</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($registro1 = mysqli_fetch_row($registros)) {
                ?>
                <tr class="align-middle"
                <?php if ($registro1[0] >= 1000001 && $registro1[0] <= 2000000) {
                        echo 'style="background-color: #D578FB; font-weight: bold;"';
                      } elseif ($registro1[0] >= 2000001 && $registro1[0] <= 3000000) {
                        echo 'style="background-color: #20FCF2; font-weight: bold;"';
                      } else {
                        echo 'style="background-color: #ECFC20; font-weight: bold;"';
                      }
                      
                ?>>
                    <td scope="row"><?php echo $registro1[0]; ?></td>
                    <td><?php echo $registro1[1]; ?></td>
                    <td><?php echo $registro1[2]; ?></td>
                    <td><?php echo $registro1[3]; ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>
<div>
  <h3>Leyenda</h3>
  <div style="background-color: #D578FB; width: 50%; margin-left: auto; margin-right: auto;">Subvenciones</div>
  <div style="background-color: #20FCF2; width: 50%; margin-left: auto; margin-right: auto;">Donaciones</div>
  <div style="background-color: #ECFC20; width: 50%; margin-left: auto; margin-right: auto;">Miembros</div>
          </div>

          

                    
              </div>
      </div>
      <a href="http://www.foundation.asix/menu.php"> <i class="bi-arrow-return-left px-3" style="font-size: 4rem; color:black;"></i> </a>
</div>
<br>
<?php 
include "../footer.php"
?>
</body>
</html>



