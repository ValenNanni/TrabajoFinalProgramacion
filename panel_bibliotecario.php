<?php
require_once 'clases/Usuario.php';

// Retomamos la sesión previamente iniciada, y recuperamos el objeto Usuario
// que contiene los datos del usuario autenticado:
session_start();
if (isset($_SESSION['usuario'])) {
    $usuario = unserialize($_SESSION['usuario']);
    $nomApe = $usuario->getNombreApellido();
} else {
    // Si no hay usuario autenticado, redirigimos al login.
    header('Location: index.php');
}
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

    <section id="nuevolibro">
        <h2>Completar los siguientes campos</h2>
        <div class="container">
            <form id="cargarLibroForm" action="cargar_libro.php" method="post">
                <input type="text" id="nombre_libro" name="nombre_libro" placeholder= "Título" required>
                
                <input type="number" id="anio_publicacion" name="anio_publicacion" placeholder= "Año de publicación" required>
                
                <input type="text" id="copias_disponibles" name="copias_disponibles" placeholder= "Copias disponibles" required>
                
                <input type="text" id="autor" name="autor" placeholder= "Autor" required>
                
                <input type="text" id="genero" name="genero" placeholder= "Género" required>
                
            <button type="submit">Cargar Libro</button>
            </form>
        </div>
    </section>  

    <section id="nuevousuario">
        <h2>Complete los siguientes campos</h2>
        <div class="container">
            <form id="cargarUsuarioForm" action="cargar_usuario.php" method="post">
    
                <input type="text" id="nombre_empleado" name="nombre_empleado" placeholder= "Nombre" required>
                
               
                <input type="text" id="apellido_empleado" name="apellido_empleado" placeholder= "Apellido" required>
              
                
                <input type="number" id="dni" name="dni" placeholder= "DNI" required>
               
                
                <input type="number" id="telefono" name="telefono" placeholder= "Teléfono" required>
                
               
                <input type="text" id="direccion" name="direccion" placeholder= "Dirección" required>
       
                
                <input type="email" id="email" name="email" placeholder= "Correo electrónico" required>
                
               
                <input type="date" id="fecha-contratacion" name="fecha-contratacion" placeholder= "Fecha de contratación" required>
               
                <input type="text" id="usuario" name="usuario" placeholder= "Usuario" required>
                
                <input type="password" id="clave" name="clave"  placeholder= "Clave" required>
                
                <button type="submit">Cargar nuevo usuario</button>
            </form>
        </div>
    </section>

    <p><a href="datos_modificar.php">Modificar datos de mi usuario</a></p>
    <p><a href="confirmar_delete.php">Eliminar mi usuario</a></p>
    <p><a href="logout.php">Cerrar sesión</a></p>
        
</body>
</html>