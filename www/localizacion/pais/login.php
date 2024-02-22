<?php
    include_once('conexion.php');

    session_start();

    $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
    $contra = mysqli_real_escape_string($conexion, $_POST['contra']);

    $sql = "SELECT COUNT(*) FROM usuario WHERE usuario='$usuario' AND contra='$contra' AND estado=1";
    $res = mysqli_query($conexion, $sql);
    $row = mysqli_fetch_array($res);

    if ($row[0] > 0) {
        $consultaUsuario = "SELECT NombreCompleto, dni FROM usuario WHERE usuario='$usuario'";
        $resUsuario = mysqli_query($conexion, $consultaUsuario);
        $rowUsuario = mysqli_fetch_array($resUsuario);

        $_SESSION['usuario'] = $usuario;
        $_SESSION['NombreCompleto'] = $rowUsuario[0];
        $_SESSION['dni'] = $rowUsuario[1];

        if ($usuario === 'admin') {
            header('Location: principal.php');
        } else {
            header('Location: menu.php');
        }
    } else {
        header('Location: index.php');
    }
?>


