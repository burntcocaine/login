<html>
<!--Ejemplo extraido de:
   https://parzibyte.me/blog/2020/09/28/crear-tabla-relaciones-mysql/
-->
    <head>
        <title>TiendaFoundation</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <?php
                echo "<img src=./img/tienda.png height=100><br>";
                $conn = mysqli_connect('localhost', 'admin', 'bdfoundation', "Tienda_AntonioG");

                $query = 'select productos.nombre as A, material.nombre as B, precio.euros as C
                from productos, material, precio
                where productos.id=precio.id_estudiante 
                and material.id=precio.id_materia;';

                $result = mysqli_query($conn, $query);
                
                echo '<div class="tabla">';
                echo '<table class="table table-striped">';
                echo '<thead><tr><th></th><th>Producto</th><th>Material</th><th>Precio</th></thead>';
                while($value = $result->fetch_array(MYSQLI_ASSOC)){
                    echo '<tr>';
                    echo '<td><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span></a></td>';
                    foreach($value as $element){
                        echo '<td>' . $element . '</td>';
                    }
                    
                    echo '</tr>';
                }
                             
                echo '</table>';
                echo '</div>';
            
                $result->close();
                mysqli_close($conn);
            ?>
        </div>
    </body>
    
</html>
