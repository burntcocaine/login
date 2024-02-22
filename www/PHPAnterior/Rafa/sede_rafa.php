<html>
<!--Ejemplo extraido de:
   https://parzibyte.me/blog/2020/09/28/crear-tabla-relaciones-mysql/
-->
    <head>
        <title>Foundation</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <?php
                echo "<h1>¡Sedes de La Fundación!</h1>";

                $conn = mysqli_connect('localhost', 'admin', 'bdfoundation', "sedes_RafaC");

                $query = 'select voluntarios.nombre as Nombre_Voluntario, sedes.nombre as Nombre_Sede, asignaciones.proyecto_id as Numero_Proyecto
                from sedes, voluntarios, asignaciones 
                where voluntarios.id=asignaciones.voluntario_id
                and sedes.id=asignaciones.sede_id
                ;';
                $result = mysqli_query($conn, $query);

                echo '<table class="table table-striped">';
                echo '<thead><tr><th></th><th>Voluntarios</th><th>Sedes</th><th>Numero Proyecto</th></tr></thead>';
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
