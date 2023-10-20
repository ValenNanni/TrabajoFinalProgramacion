<?php
require_once 'clases/Usuario.php';
require_once 'clases/ControlSesion.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecos del Pasado</title>
    <link rel="stylesheet" href="estilospanel.css">
    <link rel="shortcut icon" href="img/favicon-16x16.png" type="image/x-icon">
</head>

<body>

    <header>

        <div class="titulo">
        <h1>Biblioteca Ecos del Pasado</h1>
        </div>

        <div style="height: 350px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M-0.27,-2.63 C149.99,150.00 293.73,-0.66 500.27,1.31 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fddebb;"></path></svg></div>

    </header>


    <?php
           if (isset($_GET['mensaje'])) {
               echo '<div id="mensaje" class="alert alert-primary text-center">
                 <p>'.$_GET['mensaje'].'</p></div>';
           }
    ?>


    
           
    <p><a href="cargar_nuevo_usuario.php">Crear nuevo usuario</a></p>
    <p><a href="cargar_nuevo_libro.php">Cargar nuevo libro</a></p>
    <p><a href="listado_libros.php">Buscar libros</a></p>
    <p><a href="modificar_datos.php">Modificar datos de mi usuario</a></p>
    <p><a href="confirmareliminarusuario.php">Eliminar mi usuario</a></p>
    <p><a href="logout.php">Cerrar sesión</a></p>
        
</body>
</html>
