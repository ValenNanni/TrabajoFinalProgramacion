<?php
require_once 'clases/ControlSesion.php';

if (isset($_POST['usuario']) && isset($_POST['clave'])) {
    $cs = new ControlSesion();
    $result = $cs->create($_POST['usuario'], $_POST['nombre'],
                          $_POST['apellido'], $_POST['clave']);
    if( $result[0] === true ) {
        $redirigir = 'panel_bibliotecario.php?mensaje='.$result[1];
    } else {
        $redirigir = 'crear_usuario.php?mensaje='.$result[1];
    }
} else {
    $redirigir = 'crear_usuario.php?mensaje=Elegir usuario y clave';
}
header('Location: ' . $redirigir);