<?php

require_once 'clases/ControlSesion.php';

if (empty($_POST['usuario_empleado']) || empty($_POST['clave_empleado'])) {
    $redirigir = 'index.php?mensaje=Error, falta un campo obligatorio';
} 

else {
    $cs = new ControlSesion();
    $respuesta = $cs->login($_POST['usuario_empleado'], $_POST['clave_empleado']);
    if ($respuesta[0] === true) {
        $redirigir = 'panel_bibliotecario.php' ;
    } else {
        $redirigir = 'index.php?mensaje=' . $respuesta[1];
    }
}

header('Location: ' . $redirigir);

