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
            return [false, "Credenciales incorrectas"];
        } else {
            session_start();
            $_SESSION['usuario'] = serialize($usuario);
            return [true, "Usuario cargado correctamente"];
        }
    }

    function create($nombre_persona, $apellido_persona, $dni_persona, $telefono_persona, $direccion_empleado, $email_empleado, $fecha_contratacion, $usuario_empleado, $clave_empleado, $id_persona = null)
    {
        $repo = new RepoUsuario();
        $usuario = new Usuario($nombre_persona, $apellido_persona, $dni_persona, $telefono_persona, $direccion_empleado, $email_empleado, $fecha_contratacion, $usuario_empleado, $clave_empleado);
        
        $nombre_persona = $usuario->getNombre();
        $apellido_persona = $usuario->getApellido();
        $dni_persona = $usuario->getDni();
        $telefono_persona = $usuario->getTelefono();
        $direccion_empleado = $usuario->getDireccion();
        $email_empleado = $usuario->getEmail();
        $fecha_contratacion = $usuario->getFechaContratacion();
        $usuario_empleado = $usuario->getUsuario();
        
        $id_persona = $repo->save($nombre_persona, $apellido_persona, $dni_persona, $telefono_persona, $direccion_empleado, $email_empleado, $fecha_contratacion, $usuario_empleado, $clave_empleado);
        
        if ($id_persona === false) {
            return [false, "No se pudo crear el usuario"];
        } else {
            $usuario->setId($id_persona);
            session_start();
            $_SESSION['usuario'] = serialize($usuario);
            return [true, "Usuario creado exitosamente"];
        }
    }


    function eliminar(Usuario $usuario)
    {
        $repo = new RepoUsuario();
        return $repo->eliminar($usuario);
    }
    public function modificar(string $usuario_empleado, string $nombre_persona, string $apellido_persona, Usuario $usuario)
    {
        if (isset($_SESSION['usuario'])) {
    
            $usuario = unserialize($_SESSION['usuario']);
        }
        $repo = new RepoUsuario();

        if ($repo->modificar($usuario_empleado, $nombre_persona, $apellido_persona, $usuario))
        {
            $usuario->setDatos($usuario_empleado, $nombre_persona, $apellido_persona);
            $_SESSION['usuario'] = serialize($usuario);

            return true;
        } else {
            return false;
        }
    }
}
