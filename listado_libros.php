<?php
    require_once 'clases/RepoLibro.php';

    $repoLibro = new RepoLibro();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $filtro_genero = $_POST["filtro_genero"];
    } else {
        $filtro_genero = null;
    }

    $libros = $repoLibro->listarLibrosDisponibles($filtro_genero);

    if (!empty($libros)) {
        echo '<table border="1">';
        echo '<tr><th>Título</th><th>Año de Publicación</th><th>Autor</th><th>Género</th></tr>';
        
        foreach ($libros as $libro) {
            echo '<tr>';
            echo '<td>' . $libro->getNombreLibro() . '</td>';
            echo '<td>' . $libro->getAnioPublicacion() . '</td>';
            echo '<td>' . $libro->getAutor() . '</td>';
            echo '<td>' . $libro->getGenero() . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo "No se encontraron libros disponibles.";
    }
    ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado de Libros Disponibles</title>
</head>
<body>
    <h1>Listado de Libros Disponibles</h1>

    <form method="POST">
        <label for="filtro_genero">Filtrar por Género:</label>
        <select name="filtro_genero" id="filtro_genero">
            <option value="Romance">Romance</option>
            <option value="Misterio">Misterio</option>
            <option value="Fantasía">Fantasía</option>
            <option value="Autoayuda">Autoayuda</option>
            <option value="Crimen">Crimen</option>
            <option value="Histórico">Histórico</option>
        </select>
        <button type="submit">Filtrar</button>
    </form>

    
</body>
</html>
