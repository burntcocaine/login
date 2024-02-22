<html>
<!--Ejemplo extraido de:
   https://parzibyte.me/blog/2020/09/28/crear-tabla-relaciones-mysql/
-->
    <head>
        <title>Colegio-AntonioR</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <?php
                echo "<h1>¡Misiones!</h1>";

                $conn = mysqli_connect('localhost', 'admin', 'bdfoundation', "misiones_AntonioR");

      
                #filtrado tablas, por claves primarias
                $query = 'select nombre_mision.nombre as A, nombre_empleado.nombre as B, fecha_mision.puntaje as C
                from nombre_mision, nombre_empleado, fecha_mision 
                where nombre_mision.id=fecha_mision.id_estudiante 
                and nombre_empleado.id=fecha_mision.id_materia;';
               
                $result = mysqli_query($conn, $query);

                echo '<table class="table table-striped">';
                echo '<thead><tr><th></th><th>nombre_mision</th><th>nombre_empleado</th><th>fecha_mision</th></tr></thead>';
                while($value = $result->fetch_array(MYSQLI_ASSOC)){
                    echo '<tr>';
                    echo '<td><a href="#"><span class="glyphicon glyphicon-search"></span></a></td>';
                    foreach($value as $element){
                        echo '<td>' . $element . '</td>';
                    }

                    echo '</tr>';
                }
                echo '</table>';

                $result->close();
                mysqli_close($conn);
            ?>
        </div>
    </body>
</html>
