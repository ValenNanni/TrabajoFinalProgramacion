<?php
session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
} else {
    header('Location: index.php');
}

if (isset($_GET['mensaje'])) {
    echo '<div id="mensaje" class="alert alert-primary text-center">
      <p>'.$_GET['mensaje'].'</p></div>';
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Ecos Del Pasado</title>
        <link rel="stylesheet" href="estilosconfirmacion.css">
    </head>
    <section class="container">
      <div class="titulo">
            <h1>Biblioteca Ecos Del Pasado</h1>
      </div>
      <div class="texto">
            <div id="mensaje" class="mensaje-alerta">
                <p>Alerta: Usted va a eliminar su usuario. Esta acción es irreversible.</p>
            </div>

            <form action="eliminarusuario.php" method="post">
                <label for="usuario">Escriba su nombre de usuario para eliminar su cuenta: </label><br>
                <input name="usuario" class="usuario" placeholder="Usuario"><br>
                <input type="submit" value="Eliminar usuario" class="button">
            </form>
      </div>
    </section>
</html>
