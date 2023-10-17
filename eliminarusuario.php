<?php
require_once 'clases/Usuario.php';
require_once 'clases/ControlSesion.php';

session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
} else {
    header('Location: index.php');
}

if (empty($_POST['usuario']) || $_POST['usuario'] != $usuario->usuario_empleado) {
    header("Location: panel_bibliotecario.php?mensaje=Error de eliminación del usuario");
    die();
}

$cs = new ControlSesion();

$resultado = $cs->eliminar($usuario);

if ($resultado) {
    $redirigir = "index.php?mensaje=Usuario eliminado";
    session_destroy();
} else {
    $redirigir = "panel_bibliotecario.php?mensaje=Error: No se puede realizar esta acción";
}

header("Location: $redirigir");