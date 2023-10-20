<?php

require_once '.env.php';
require_once 'Usuario.php';


class RepoUsuario
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
        $q = "SELECT id_persona, clave_empleado, nombre_persona, apellido_persona, dni_persona, telefono_persona, direccion_empleado, email_empleado, fecha_contratacion FROM personas WHERE usuario_empleado = ?;";
        $query = self::$conexion->prepare($q);
        $query->bind_param("s", $usuario_empleado);

        if ($query->execute()) {
            $query->bind_result($id_persona, $clave_encriptada, $nombre_persona, $apellido_persona, $dni_persona, $telefono_persona, $direccion_empleado, $email_empleado, $fecha_contratacion);
            if ($query->fetch()) {
                if (password_verify($clave_empleado, $clave_encriptada)) {
                    return new Usuario($nombre_persona, $apellido_persona, $dni_persona, $telefono_persona, $direccion_empleado, $email_empleado, $fecha_contratacion, $usuario_empleado, $clave_empleado, $id_persona);
                }
            }

        }
        return false;
    }


    public function save($nombre_persona, $apellido_persona, $dni_persona, $telefono_persona, $direccion_empleado, $email_empleado, $fecha_contratacion, $usuario_empleado, $clave_empleado)
    {
        $q = "INSERT INTO personas (nombre_persona, apellido_persona, dni_persona, telefono_persona, direccion_empleado, email_empleado, fecha_contratacion, usuario_empleado, clave_empleado) ";
        $q.= "VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $query = self::$conexion->prepare($q);

        $clave_encriptada = password_hash($clave_empleado, PASSWORD_DEFAULT);

        $query->bind_param("ssissssss", $nombre_persona, $apellido_persona, $dni_persona, $telefono_persona, $direccion_empleado, $email_empleado, $fecha_contratacion, $usuario_empleado, $clave_encriptada);

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
public function modificar(string $usuario_empleado, string $nombre_persona, string $apellido_persona, Usuario $usuario) {
    $q = "UPDATE personas SET usuario_empleado = ?, nombre_persona = ?, apellido_persona = ? ";
    $q.= " WHERE id_persona = ?;";

    $query = self::$conexion->prepare($q);

    $id = $usuario->getId();

    $query->bind_param("sssd", $usuario_empleado, $nombre_persona, $apellido_persona, $id_persona);

    return $query->execute();
}
}
