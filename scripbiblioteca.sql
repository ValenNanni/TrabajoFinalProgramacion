-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema biblioteca2
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema biblioteca2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `biblioteca2` DEFAULT CHARACTER SET utf8mb3 ;
-- -----------------------------------------------------
-- Schema biblioteca
-- -----------------------------------------------------
USE `biblioteca2` ;

-- -----------------------------------------------------
-- Table `biblioteca2`.`autores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca2`.`autores` (
  `id_autor` INT NOT NULL,
  `nombre_autor` VARCHAR(45) NOT NULL,
  `apellido_autor` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_autor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `biblioteca2`.`generos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca2`.`generos` (
  `id_genero` INT NOT NULL,
  `nombre_genero` VARCHAR(45) NULL DEFAULT NULL,
  `descripcion_genero` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id_genero`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `biblioteca2`.`personas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca2`.`personas` (
  `id_persona` INT NOT NULL,
  `tipo_persona` ENUM('Usuario', 'Empleado') NOT NULL,
  `nombre_persona` VARCHAR(45) NOT NULL,
  `apellido_persona` VARCHAR(45) NOT NULL,
  `dni_persona` VARCHAR(45) NOT NULL,
  `telefono_persona` VARCHAR(45) NOT NULL,
  `direccion_empleado` VARCHAR(45) NULL DEFAULT NULL,
  `email_empleado` VARCHAR(45) NULL DEFAULT NULL,
  `fecha_contratacion` DATETIME NULL DEFAULT NULL,
  `usuario_empleado` VARCHAR(45) NULL DEFAULT NULL,
  `clave_empleado` VARCHAR(250) NULL DEFAULT NULL,
  PRIMARY KEY (`id_persona`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `biblioteca2`.`libros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca2`.`libros` (
  `id_libro` INT NOT NULL,
  `nombre_libro` VARCHAR(45) NOT NULL,
  `anio_publicacion` VARCHAR(45) NOT NULL,
  `copias_disponibles` VARCHAR(45) NOT NULL,
  `id_genero` INT NOT NULL,
  `id_autor` INT NOT NULL,
  `personas_id_persona` INT NOT NULL,
  `generos_id_genero` INT NOT NULL,
  `autores_id_autor` INT NOT NULL,
  PRIMARY KEY (`id_libro`, `id_genero`, `id_autor`, `personas_id_persona`, `generos_id_genero`, `autores_id_autor`),
  INDEX `fk_libros_generos1_idx` (`id_genero` ASC) VISIBLE,
  INDEX `fk_libros_autores1_idx` (`id_autor` ASC) VISIBLE,
  INDEX `fk_libros_personas1_idx` (`personas_id_persona` ASC) VISIBLE,
  INDEX `fk_libros_generos2_idx` (`generos_id_genero` ASC) VISIBLE,
  INDEX `fk_libros_autores2_idx` (`autores_id_autor` ASC) VISIBLE,
  CONSTRAINT `fk_libros_autores1`
    FOREIGN KEY (`id_autor`)
    REFERENCES `mydb`.`autores` (`id_autor`),
  CONSTRAINT `fk_libros_generos1`
    FOREIGN KEY (`id_genero`)
    REFERENCES `mydb`.`generos` (`id_genero`),
  CONSTRAINT `fk_libros_personas1`
    FOREIGN KEY (`personas_id_persona`)
    REFERENCES `biblioteca2`.`personas` (`id_persona`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_libros_generos2`
    FOREIGN KEY (`generos_id_genero`)
    REFERENCES `biblioteca2`.`generos` (`id_genero`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_libros_autores2`
    FOREIGN KEY (`autores_id_autor`)
    REFERENCES `biblioteca2`.`autores` (`id_autor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
