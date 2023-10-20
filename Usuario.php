<?php

class Usuario
{
    protected $id_persona;
    public $nombre_persona;
    public $apellido_persona;
    protected $dni_persona;
    protected $telefono_persona;
    protected $direccion_empleado;
    protected $email_empleado;
    protected $fecha_contratacion;
    public $usuario_empleado;
    protected $clave_empleado;

    public function __construct($nombre_persona, $apellido_persona, $dni_persona, $telefono_persona, $direccion_empleado, $email_empleado, $fecha_contratacion, $usuario_empleado, $clave_empleado, $id_persona=null)
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

   
    public function setId($id)
    {
        $this->id_persona = $id_persona;
    }
    public function getId()
    {
        return $this->id_persona;
    }

    public function getNombre()
    {
        return $this->nombre_persona;
    }

    public function getApellido()
    {
        return $this->apellido_persona;
    }

    public function getDni()
    {
        return $this->dni_persona;
    }

    public function getTelefono()
    {
        return $this->telefono_persona;
    }

    public function getDireccion()
    {
        return $this->direccion_empleado;
    }

    public function getEmail()
    {
        return $this->email_empleado;
    }

    public function getFechaContratacion()
    {
        return $this->fecha_contratacion;
    }

    public function getUsuario()
    {
        return $this->usuario_empleado;
    }


    public function getNombreApellido()
    {
        return "$this->nombre_persona $this->apellido_persona";
    }

    public function setDatos($nombre_persona, $apellido_persona, $usuario_empleado)
    {
        $this->nombre_persona = $nombre_persona;
        $this->apellido_persona = $apellido_persona;
        $this->usuario_empleado = $usuario_empleado;
    }
}
