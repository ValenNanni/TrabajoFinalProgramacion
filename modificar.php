<?php

require_once 'clases/ControlSesion.php';
require_once 'clases/Usuario.php';
session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = unserialize ($_SESSION['usuario']);
} else {
    header('Location: index.php');
}

if (
    empty($_POST['usuario_empleado'])
    || empty($_POST['nombre_persona'])
    || empty($_POST['apellido_persona'])
) {
    $mensaje = "Completar todos los campos.";
    header("Location:modificar_datos.php?mensaje=$mensaje");
    die();
}

$usuario_empleado = $_POST['usuario_empleado'];
$nombre_persona = $_POST['nombre_persona'];
$apellido_persona = $_POST['apellido_persona'];

echo "Valores de las variables:";
echo "usuario_empleado: " . $usuario_empleado . "<br>";
echo "nombre_persona: " . $nombre_persona . "<br>";
echo "apellido_persona: " . $apellido_persona . "<br>";

$cs = new ControlSesion();

$resultado = $cs->modificar($usuario_empleado, $nombre_persona, $apellido_persona, $usuario);

if ($resultado) {
    $redirigir = "panel_bibliotecario.php?mensaje=Datos actualizados correctamente";
} else {
    $redirigir = "modificar_datos.php?mensaje=Error al actualizar datos";
}
header("Location: $redirigir");

?>