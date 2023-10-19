

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecos Del Pasado</title>
</head>

<body>
        <?php
            if (isset($_GET['mensaje'])) {
                echo '<div id="mensaje" class="alert alert-primary text-center">
                    <p>'.$_GET['mensaje'].'</p></div>';
            }
        ?>

    <section id="nuevousuario">
            <h2>Crear un nuevo usuario</h2>
            <h2>Complete los siguientes campos:</h2>
            <div class="container">
                <form action="crear_usuario.php" method="post">
        
                    <input type="text" id="nombre_persona" name="nombre_persona" placeholder= "Nombre" required>
                    
                
                    <input type="text" id="apellido_persona" name="apellido_persona" placeholder= "Apellido" required>
                
                    
                    <input type="number" id="dni_persona" name="dni_persona" placeholder= "DNI" required>
                
                    
                    <input type="number" id="telefono_persona" name="telefono_persona" placeholder= "Teléfono" required>
                    
                
                    <input type="text" id="direccion_empleado" name="direccion_empleado" placeholder= "Dirección" required>
        
                    
                    <input type="email" id="email_empleado" name="email_empleado" placeholder= "Correo electrónico" required>
                    
                
                    <input type="date" id="fecha_contratacion" name="fecha_contratacion" placeholder= "Fecha de contratación" required>
                
                    <input type="text" id="usuario_empleado" name="usuario_empleado" placeholder= "Usuario" required>
                    
                    <input type="password" id="clave_empleado" name="clave_empleado"  placeholder= "Clave" required>
                    
                    <button type="submit">Cargar nuevo usuario</button>
                </form>
            </div>
        </section>

    </body>
</html>