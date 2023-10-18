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
USE `biblioteca2` ;

-- -----------------------------------------------------
-- Table `biblioteca2`.`autores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca2`.`autores` (
  `id_autor` INT NOT NULL AUTO_INCREMENT,
  `nombre_autor` VARCHAR(45) NOT NULL,
  `apellido_autor` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_autor`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `biblioteca2`.`generos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca2`.`generos` (
  `id_genero` INT NOT NULL AUTO_INCREMENT,
  `nombre_genero` VARCHAR(45) NOT NULL,
  `descripcion_genero` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_genero`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `biblioteca2`.`personas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca2`.`personas` (
  `id_persona` INT NOT NULL AUTO_INCREMENT,
  `nombre_persona` VARCHAR(45) NOT NULL,
  `apellido_persona` VARCHAR(45) NOT NULL,
  `dni_persona` VARCHAR(45) NOT NULL,
  `telefono_persona` VARCHAR(45) NOT NULL,
  `direccion_empleado` VARCHAR(45) NOT NULL,
  `email_empleado` VARCHAR(45) NOT NULL,
  `fecha_contratacion` DATETIME NOT NULL,
  `usuario_empleado` VARCHAR(45) NOT NULL,
  `clave_empleado` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`id_persona`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `biblioteca2`.`libros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca2`.`libros` (
  `id_libro` INT NOT NULL AUTO_INCREMENT,
  `nombre_libro` VARCHAR(45) NOT NULL,
  `anio_publicacion` VARCHAR(45) NOT NULL,
  `copias_disponibles` VARCHAR(45) NOT NULL,
  `id_persona` INT NOT NULL ,
  `id_genero` INT NOT NULL ,
  `id_autor` INT NOT NULL ,
  PRIMARY KEY (`id_libro`, `id_persona`, `id_genero`, `id_autor`),
  INDEX `fk_libros_personas1_idx` (`id_persona` ASC) ,
  INDEX `fk_libros_generos2_idx` (`id_genero` ASC) ,
  INDEX `fk_libros_autores2_idx` (`id_autor` ASC) ,
  CONSTRAINT `fk_libros_autores2`
    FOREIGN KEY (`id_autor`)
    REFERENCES `biblioteca2`.`autores` (`id_autor`),
  CONSTRAINT `fk_libros_generos2`
    FOREIGN KEY (`id_genero`)
    REFERENCES `biblioteca2`.`generos` (`id_genero`),
  CONSTRAINT `fk_libros_personas1`
    FOREIGN KEY (`id_persona`)
    REFERENCES `biblioteca2`.`personas` (`id_persona`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;





