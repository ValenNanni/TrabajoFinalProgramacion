<?php
require_once 'Libro.php';
require_once '.env.php';

class RepoLibro
{
    private static $conexion = null;

    public function __construct()
    {
        $credenciales = credenciales();
        if (is_null(self::$conexion)) {
            self::$conexion = new mysqli(
                $credenciales['usuario'],
                $credenciales['clave'],
                $credenciales['servidor'],
                $credenciales['base_de_datos']
            );
        }
        if (self::$conexion->connect_error) {
            $error = 'Error de conexión: ' . self::$conexion->connect_error;
            self::$conexion = null;
            die($error);
        }
        self::$conexion->set_charset('utf8mb4');
    }

    public function insertarLibro(Libro $libro)
    {
        $q = "INSERT INTO libros (nombre_libro, anio_publicacion, copias_disponibles, id_genero, id_autor) ";
        $q .= "VALUES (?, ?, ?, ?, ?)";
        $query = self::$conexion->prepare($q);

        $nombre_libro = $libro->getNombreLibro();
        $anio_publicacion = $libro->getAnioPublicacion();
        $copias_disponibles = $libro->getCopiasDisponibles();
        $id_genero = $libro->getIdGenero();
        $id_autor = $libro->getIdAutor();

        $query->bind_param("siiss", $nombre_libro, $anio_publicacion, $copias_disponibles, $id_genero, $id_autor);

        if ($query->execute()) {
            return self::$conexion->insert_id;
        } else {
            return false;
        }
    }

}