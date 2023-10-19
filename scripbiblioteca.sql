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
CREATE SCHEMA IF NOT EXISTS `biblioteca2` DEFAULT CHARACTER SET utf8 ;
USE `biblioteca2` ;

-- -----------------------------------------------------
-- Table `biblioteca2`.`libros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca2`.`libros` (
  `id_libro` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_libro` VARCHAR(45) NOT NULL,
  `anio_publicacion` VARCHAR(45) NOT NULL,
  `copias_disponibles` VARCHAR(45) NOT NULL,
  `genero` VARCHAR(45) NOT NULL,
  `autor` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_libro`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `biblioteca2`.`personas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca2`.`personas` (
  `id_persona` INT(11) NOT NULL AUTO_INCREMENT,
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
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
