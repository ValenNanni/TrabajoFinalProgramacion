<?php

class Libro
{
    protected $id_libro;
    public $nombre_libro;
    public $anio_publicacion;
    public $copias_disponibles;
    public $autor;
    public $genero;
    

    public function __construct($nombre_libro, $anio_publicacion, $copias_disponibles, $genero, $autor, $id_libro=null)
    {
        $this->id_libro = $id_libro;
        $this->nombre_libro = $nombre_libro;
        $this->anio_publicacion = $anio_publicacion;
        $this->copias_disponibles = $copias_disponibles;
        $this->autor = $autor;
        $this->genero = $genero;
        
    }

    public function getNombreLibro() {
        return $this->nombre_libro;
    }

    public function getAnioPublicacion() {
        return $this->anio_publicacion;
    }

    public function getCopiasDisponibles() {
        return $this->copias_disponibles;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function setId($id)
    {
        $this->id_libro = $id_libro;
    }
    public function getId()
    {
        return $this->id_libro;
    }
    public function setDatos($nombre_libro, $genero, $autor)
    {
        $this->nombre_libro = $nombre_libro;
        $this->genero = $genero;
        $this->autor = $autor;
    }

    public function getDatos()
    {
        return "$this->nombre_libro $this->genero $this->autor";
    }
}