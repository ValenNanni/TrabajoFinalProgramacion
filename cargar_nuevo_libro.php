<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecos Del Pasado</title>
</head>
<body>
        <?php
            if (isset($_GET['mensaje'])) {
                echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>'.$_GET['mensaje'].'</p></div>';
            }
        ?>

    <section id="nuevolibro">
            <h2>Completar los siguientes campos</h2>
            <div class="container">
                <form action="cargar_libro.php" method="post">
                    <input type="text" id="nombre_libro" name="nombre_libro" placeholder= "Título" required>
                    
                    <input type="number" id="anio_publicacion" name="anio_publicacion" placeholder= "Año de publicación" required>
                    
                    <input type="text" id="copias_disponibles" name="copias_disponibles" placeholder= "Copias disponibles" required>
                    
                    <input type="text" id="autor" name="autor" placeholder= "Autor" required>

                    <select name="genero" placeholder= "Género" required>
                        <option value="Romance">Romance</option>
                        <option value="Misterio">Misterio</option>
                        <option value="Fantasía">Fantasía</option>
                        <option value="Autoayuda">Autoayuda</option>
                        <option value="Crimen">Crimen</option>
                        <option value="Histórico">Histórico</option>
                    </select>
                    
                    
                <button type="submit">Cargar Libro</button>
                </form>
            </div>
        </section>  
    </body>
</html>