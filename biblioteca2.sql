
USE `biblioteca2` ;

SELECT *
FROM personas;


INSERT INTO personas (nombre_persona, apellido_persona, dni_persona, telefono_persona, direccion_empleado, email_empleado, fecha_contratacion, usuario_empleado, clave_empleado)
VALUES ("Juan", "Marquez", 32005566, 3416556644, "Salta 1234", "juanmarquez@gmail.com", "2022-10-20 00:00:00", "juanmarquez", 1234),
		("Camila", "Pajaro Cauzzi", 32005566, 3416556644, "Salta 1234", "camicauzzi@gmail.com", "2022-10-20 00:00:00", "camicauzzi", 1234),
        ("Valentina", "Nanni", 32005566, 3416556644, "Salta 1234", "valennanni@gmail.com", "2022-10-20 00:00:00", "valennanni", 1234);

SELECT *
FROM libros;

INSERT INTO libros (nombre_libro, anio_publicacion, copias_disponibles, autor, genero)
VALUES ("Harry Potter y las Reliquias de la Muerte", 2007, 5, "J.K. Rowling", "Fantasía"),
		("El hombre en busca del sentido", 1980, 4, "Victor Frankl", "Autoayuda"),
        ("Plan Quinquenal", 1974, 3, "Philip Kerr", "Misterio"),
        ("Un cadáver en la biblioteca", 1999, 7, "Ágatha Christie", "Crimen");
