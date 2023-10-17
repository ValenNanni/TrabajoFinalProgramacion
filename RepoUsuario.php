<?php

require_once 'Usuario.php';
require_once '.env.php';

class RepoUsuario
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
                $credenciales['base_de_datos'],
            );
        }
        if (self::$conexion->connect_error) {
            $error = 'Error de conexión: ' . self::$conexion->connect_error;
            self::$conexion = null;
            die($error);
        }
        self::$conexion->set_charset('utf8mb4');
    }

    public function login($usuario_empleado, $clave_empleado)
    {
        $q = "SELECT id_persona, clave_empleado, nombre_persona, apellido_persona FROM personas WHERE usuario_empleado = ?;";
        $query = self::$conexion->prepare($q);
        $query->bind_param("s", $usuario_empleado);

        if ($query->execute()) {
            $query->bind_result($id, $clave_encriptada, $nombre_persona, $apellido_persona);
            if ($query->fetch()) {
                if (password_verify($clave_empleado, $clave_encriptada)) {
                    return new Usuario($usuario_empleado, $nombre_persona, $apellido_persona, $id_persona);
                }
            }

        }
        return false;
    }

    public function save(Usuario $usuario_empleado, $clave_empleado)
    {
        $q = "INSERT INTO personas (usuario_empleado, clave_empleado, nombre_persona, apellido_persona) ";
        $q.= "VALUES (?, ? , ? , ?)";
        $query = self::$conexion->prepare($q);

        $usuario_empleado = $usuario->usuario_empleado;
        $clave_empleado = password_hash($clave_empleado, PASSWORD_DEFAULT);
        $nombre_persona = $usuario->nombre_persona;
        $apellido_persona = $usuario->apellido_persona;

        $query->bind_param("ssss", $usuario_empleado, $clave_empleado, $nombre_persona, $apellido_persona);

        if ($query->execute())  {
            return self::$conexion->insert_id;
        } else {
            return false;
        }
    }


    public function eliminar(Usuario $usuario)
    {
        $q = "DELETE FROM personas WHERE id_persona = ?";
        $query = self::$conexion->prepare($q);

        $id_persona = $usuario->getId();

        $query->bind_param("d", $id_persona);

        return $query->execute();

    }

}