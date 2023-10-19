<?php
require_once 'clases/ControlSesion.php';

if (isset($_POST['usuario_empleado']) && isset($_POST['clave_empleado'])) {
    $cs = new ControlSesion();
    $result = $cs->create($_POST['nombre_persona'], $_POST['apellido_persona'], $_POST['dni_persona'], $_POST['telefono_persona'],  
    $_POST['direccion_empleado'], $_POST['email_empleado'], $_POST['fecha_contratacion'], $_POST['usuario_empleado'], $_POST['clave_empleado']);
    if( $result[0] === true ) {
        $redirigir = 'panel_bibliotecario.php?mensaje='.$result[1];
    } else {
        $redirigir = 'cargar_nuevo_usuario.php?mensaje='.$result[1];
    }
} else {
    $redirigir = 'cargar_nuevo_usuario.php?mensaje=Hay que elegir usuario y clave';
}
header('Location: ' . $redirigir);
