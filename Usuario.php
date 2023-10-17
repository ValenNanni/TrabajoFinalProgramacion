<?php

class Usuario
{
    protected $id_persona;
    public $nombre_persona;
    public $apellido_persona;
    public $dni_persona;
    public $telefono_persona;
    public $direccion_empleado;
    public $email_empleado;
    public $fecha_contratacion;
    public $usuario_empleado;
    protected $clave_empleado;

    public function __construct($id_persona=null, $nombre_persona, $apellido_persona, $dni_persona, $telefono_persona, $direccion_empleado, $fecha_contratacion, $email_empleado, $usuario_empleado, $clave_empleado)
    {
        $this->id_persona = $id_persona;
        $this->nombre_persona = $nombre_persona;
        $this->apellido_persona = $apellido_persona;
        $this->dni_persona = $dni_persona;
        $this->telefono_persona = $telefono_persona;
        $this->direccion_empleado = $direccion_empleado;
        $this->email_empleado = $email_empleado;
        $this->fecha_contratacion = $fecha_contratacion;
        $this->usuario_empleado = $usuario_empleado;
        $this->clave_empleado = $clave_empleado;
    }

    public function getNombreApellido()
    {
        return "$this->nombre_persona $this->apellido_persona";
    }
    public function setId($id)
    {
        $this->id_persona = $id_persona;
    }
    public function getId()
    {
        return $this->id_persona;
    }
    public function setDatos($nombre_persona, $apellido_persona, $usuario_empleado)
    {
        $this->nombre_persona = $nombre_persona;
        $this->apellido_persona = $apellido_persona;
        $this->usuario_empleado = $usuario_empleado;
    }
}
