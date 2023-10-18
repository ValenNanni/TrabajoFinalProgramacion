<?php

class Libro
{
    protected $id_libro;
    public $nombre_libro;
    public $anio_publicacion;
    public $copias_disponibles;
    protected $id_genero;
    protected $id_autor;

    public function __construct($id_libro=null, $nombre_libro, $anio_publicacion, $copias_disponibles, $id_genero=null, $id_autor=null)
    {
        $this->id_libro = $id_libro;
        $this->nombre_libro = $nombre_libro;
        $this->anio_publicacion = $anio_publicacion;
        $this->copias_disponibles = $copias_disponibles;
        $this->id_genero = $id_genero;
        $this->id_autor = $id_autor;
    }

    public function setId($id)
    {
        $this->id_libro = $id_libro;
    }
    public function getId()
    {
        return $this->id_libro;
    }
    public function setDatos($nombre_libro, $id_genero, $id_autor)
    {
        $this->nombre_libro = $nombre_libro;
        $this->id_genero = $id_genero;
        $this->id_autor = $id_autor;
    }

    public function getDatos()
    {
        return "$this->nombre_libro $this->id_genero $this->id_autor";
    }
}