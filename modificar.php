<?php
require_once 'clases/Usuario.php';
require_once 'clases/ControlSesion.php';

session_start();

if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
} else {
    header('Location: index.php');
    exit; 
}

if (
    empty($_POST['usuario_empleado'])
    || empty($_POST['nombre_persona'])
    || empty($_POST['apellido_persona'])
) {
    $mensaje = "Completar todos los campos.";
    header("Location: modificar_datos.php?mensaje=" . urlencode($mensaje));
    exit; 
}

$usuario_empleado = ($_POST['usuario_empleado']);
$nombre_persona = ($_POST['nombre_persona']);
$apellido_persona = ($_POST['apellido_persona']);

$cs = new ControlSesion();

$resultado = $cs->modificar($usuario_empleado, $nombre_persona, $apellido_persona, $usuario);

if ($resultado) {
    $redirigir = "panel_bibliotecario.php?mensaje=" . urlencode("Datos actualizados correctamente");
} else {
    $redirigir = "modificar_datos.php?mensaje=" . urlencode("Error al actualizar datos");
}

header("Location: $redirigir");
exit;
?>