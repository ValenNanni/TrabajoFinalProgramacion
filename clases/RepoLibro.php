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
                $credenciales['servidor'],
                $credenciales['usuario'],
                $credenciales['clave'],
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
        $q = "INSERT INTO libros (nombre_libro, anio_publicacion, copias_disponibles, autor, genero) ";
        $q .= "VALUES (?, ?, ?, ?, ?)";
        $query = self::$conexion->prepare($q);

        $nombre_libro = $libro->getNombreLibro();
        $anio_publicacion = $libro->getAnioPublicacion();
        $copias_disponibles = $libro->getCopiasDisponibles();
        $autor = $libro->getAutor();
        $genero = $libro->getGenero();
        

        $query->bind_param("siiss", $nombre_libro, $anio_publicacion, $copias_disponibles, $autor, $genero);

        if ($query->execute()) {
            return self::$conexion->insert_id;
        } else {
            return false;
        }
    }

    public function listarLibrosDisponibles($genero = null)
    {
        $query = "SELECT * FROM libros WHERE copias_disponibles > 0";
        
        if (!is_null($genero)) {
            $query .= " AND genero = ?";
        }
    
        $statement = self::$conexion->prepare($query);
    
        if (!is_null($genero)) {
            $statement->bind_param("s", $genero);
        }
    
        $statement->execute();
        $result = $statement->get_result();
        $libros = [];
    
        while ($row = $result->fetch_assoc()) {
            $libros[] = new Libro(
                $row["nombre_libro"],
                $row["anio_publicacion"],
                $row["copias_disponibles"],
                $row["autor"],
                $row["genero"],
                $row["id_libro"]
            );
        }
    
        return $libros;
    }

}