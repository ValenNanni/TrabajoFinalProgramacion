<?php

require_once 'clases/RepoUsuario.php';
require_once 'clases/Usuario.php';

class ControlSesion
{
    public function login($usuario_empleado, $clave_empleado)
    {
        $repo = new RepoUsuario();
        $usuario = $repo->login($usuario_empleado, $clave_empleado);

        if ($usuario === false) {
            return [ false, "Credenciales incorrectas" ];
        } else {
            session_start();
            $_SESSION['usuario'] = serialize($usuario);
            return [true, "Usuario cargado correctamente"];
        }
    }

    function create($usuario_empleado, $nombre_persona, $apellido_persona, $clave_empleado)
    {
        $repo = new RepoUsuario();
        $usuario = new Usuario($usuario_empleado, $nombre_persona, $apellido_persona);
        $id = $repo->save($usuario, $clave);
        if ($id === false) {
            return [ false, "No se pudo crear el usuario" ];
        } else {
            $usuario->setId($id);
            session_start();
            $_SESSION['usuario'] = serialize($usuario);
            return [ true, "Usuario creado exitosamente" ];
        }
    }

    function eliminar(Usuario $usuario)
    {
        $repo = new RepoUsuario();
        return $repo->eliminar($usuario);
    }

    function modificar(string $usuario_empleado, string $nombre_persona, string $apellido_persona, string $dni_persona, 
    string $telefono_persona, string $direccion_empleado, string $email_empleado, Usuario $usuario)
    {
        $repo = new RepoUsuario();

        if ($repo->actualizar($usuario_empleado, $nombre_persona, $apellido_persona, $dni_persona, $telefono_persona, $direccion_empleado, $email_empleado, $usuario))
        {
            $usuario->setDatos($usuario_empleado, $nombre_persona, $apellido_persona, $dni_persona, $telefono_persona, $direccion_empleado, $email_empleado);
            $_SESSION['usuario'] = serialize($usuario);

            return true;
        } else {
            return false;
        }
    }

}