<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecos del Pasado</title>
    <link rel="shortcut icon" href="img/favicon-16x16.png" type="image/x-icon">
    <link rel="stylesheet" href="estilosindex.css">
</head>


<body>
    <header>

        <section class="textos-header">
        <h1>Biblioteca Ecos del Pasado</h1>
        </section>

        <div class= "wave" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path></svg></div>

    </header>
    
        <?php
            if (isset($_GET['mensaje'])) {
                echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>'.$_GET['mensaje'].'</p></div>';
            }
        ?>

    <section id="login">
        <h2>Iniciar Sesión del Bibliotecario</h2>
        <form action="login.php" method="post">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario_empleado" name="usuario_empleado" required>
            <br>
            <label for="contrasena">Contraseña:</label>
            <input type="password" id="clave_empleado" name="clave_empleado" required>
            <br>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2023 Biblioteca Ecos del Pasado - Todos los derechos reservados</p>
    </footer>
</body>
</html>
