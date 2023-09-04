-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bdTareas
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `bdTareas` ;

-- -----------------------------------------------------
-- Schema bdTareas
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bdTareas` DEFAULT CHARACTER SET utf8 ;
USE `bdTareas` ;

-- -----------------------------------------------------
-- Table `bdTareas`.`cargos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdTareas`.`cargos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cargo` VARCHAR(50) NULL,
  `descripcion` VARCHAR(200) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdTareas`.`departamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdTareas`.`departamentos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `departamento` VARCHAR(40) NULL,
  `descripcion` VARCHAR(100) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdTareas`.`empleados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdTareas`.`empleados` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombres` VARCHAR(50) NULL,
  `apellidos` VARCHAR(50) NULL,
  `email` VARCHAR(80) NULL,
  `clave` VARCHAR(50) NULL,
  `avatar` VARCHAR(50) NULL,
  `cargos_id` INT NOT NULL,
  `empleados_id` INT  NULL,
  `departamentos_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_empleados_cargos1_idx` (`cargos_id` ASC) ,
  INDEX `fk_empleados_empleados1_idx` (`empleados_id` ASC) ,
  INDEX `fk_empleados_departamentos1_idx` (`departamentos_id` ASC) ,
  CONSTRAINT `fk_empleados_cargos1`
    FOREIGN KEY (`cargos_id`)
    REFERENCES `bdTareas`.`cargos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empleados_empleados1`
    FOREIGN KEY (`empleados_id`)
    REFERENCES `bdTareas`.`empleados` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empleados_departamentos1`
    FOREIGN KEY (`departamentos_id`)
    REFERENCES `bdTareas`.`departamentos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdTareas`.`estados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdTareas`.`estados` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(20) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
COMMENT = '						';


-- -----------------------------------------------------
-- Table `bdTareas`.`tareas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdTareas`.`tareas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `fecha_vence` DATETIME NULL,
  `empleados_id` INT  NULL,
  `estados_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tareas_empleados1_idx` (`empleados_id` ASC) ,
  INDEX `fk_tareas_estados1_idx` (`estados_id` ASC) ,
  CONSTRAINT `fk_tareas_empleados1`
    FOREIGN KEY (`empleados_id`)
    REFERENCES `bdTareas`.`empleados` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tareas_estados1`
    FOREIGN KEY (`estados_id`)
    REFERENCES `bdTareas`.`estados` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdTareas`.`tareas_progreso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bdTareas`.`tareas_progreso` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(200) NULL,
  `es_completa` BIT NULL,
  `fecha` DATETIME NULL,
  `comentario` VARCHAR(200) NULL,
  `tareas_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tareas_progreso_tareas1_idx` (`tareas_id` ASC) ,
  CONSTRAINT `fk_tareas_progreso_tareas1`
    FOREIGN KEY (`tareas_id`)
    REFERENCES `bdTareas`.`tareas` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `bdTareas`.`departamentos`
-- -----------------------------------------------------
START TRANSACTION;
USE `bdTareas`;
INSERT INTO `bdTareas`.`departamentos` (`id`, `departamento`, `descripcion`) VALUES (1, 'Mantenimiento', 'Mantenimiento de Equipos');
INSERT INTO `bdTareas`.`departamentos` (`id`, `departamento`, `descripcion`) VALUES (2, 'Desarrollo', 'Desarrollo de Software');

COMMIT;


-- -----------------------------------------------------
-- Data for table `bdTareas`.`estados`
-- -----------------------------------------------------
START TRANSACTION;
USE `bdTareas`;
INSERT INTO `bdTareas`.`estados` (`id`, `estado`) VALUES (1, 'Pendiente');
INSERT INTO `bdTareas`.`estados` (`id`, `estado`) VALUES (2, 'En ejecución');
INSERT INTO `bdTareas`.`estados` (`id`, `estado`) VALUES (3, 'Suspendida');
INSERT INTO `bdTareas`.`estados` (`id`, `estado`) VALUES (4, 'Terminada');

COMMIT;

