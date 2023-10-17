<?php
session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
} else {
    header('Location: index.php');
}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Ecos Del Pasado</title>
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