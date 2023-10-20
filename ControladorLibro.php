<?php
require_once 'RepoLibro.php';
require_once 'Libro.php';

class ControladorLibro
{
    private $rl;

    public function __construct()
    {
        $this->rl = new RepoLibro();
    }

    public function listar($filtro = null)
    {
        return $this->rl->listarLibrosDisponibles($filtro);
    }

}

?>