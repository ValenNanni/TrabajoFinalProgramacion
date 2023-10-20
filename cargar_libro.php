<?php
require_once 'clases/ControlSesion.php';
require_once 'clases/RepoLibro.php';

if (isset($_POST['nombre_libro']) && isset($_POST['anio_publicacion']) && isset($_POST['copias_disponibles']) && isset($_POST['autor']) && isset($_POST['genero'])) {
    $repoLibro = new RepoLibro();
    $libro = new Libro(
        $_POST['nombre_libro'],
        $_POST['anio_publicacion'],
        $_POST['copias_disponibles'],
        $_POST['autor']
        $_POST['genero'],
        
    );
    
    $idLibroInsertado = $repoLibro->insertarLibro($libro);
    
    if ($idLibroInsertado !== false) {
        $redirigir = 'panel_bibliotecario.php?mensaje=Libro insertado con éxito (ID: ' . $idLibroInsertado . ')';
    } else {
        $redirigir = 'cargar_nuevo_libro.php?mensaje=No se pudo insertar el libro';
    }
} else {
    $redirigir = 'cargar_nuevo_libro.php?mensaje=Por favor, completa todos los campos del libro';
}

header('Location: ' . $redirigir);

?>