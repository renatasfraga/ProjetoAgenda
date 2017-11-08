-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Usuario` (
  `email` VARCHAR(100) NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(25) NOT NULL,
  `data_cont` DATE NOT NULL,
  PRIMARY KEY (`email`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`GrupoContato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`GrupoContato` (
  `nome_grupo` VARCHAR(25) NOT NULL,
  `cod_grupo` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cod_grupo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Evento` (
  `cod_evento` INT NOT NULL AUTO_INCREMENT,
  `local` VARCHAR(100) NOT NULL,
  `descricao` VARCHAR(500) NULL,
  `ini_evento` DATE NOT NULL,
  `fim_evento` DATE NOT NULL,
  `Usuario_email` VARCHAR(100) NOT NULL,
  `GrupoContato_cod_grupo` INT NOT NULL,
  PRIMARY KEY (`cod_evento`, `GrupoContato_cod_grupo`),
  INDEX `fk_Evento_Usuario_idx` (`Usuario_email` ASC),
  INDEX `fk_Evento_GrupoContato1_idx` (`GrupoContato_cod_grupo` ASC),
  CONSTRAINT `fk_Evento_Usuario`
    FOREIGN KEY (`Usuario_email`)
    REFERENCES `mydb`.`Usuario` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Evento_GrupoContato1`
    FOREIGN KEY (`GrupoContato_cod_grupo`)
    REFERENCES `mydb`.`GrupoContato` (`cod_grupo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Comentario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Comentario` (
  `cod_comentario` INT NOT NULL AUTO_INCREMENT,
  `texto` VARCHAR(500) NOT NULL,
  `Usuario_email` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`cod_comentario`, `Usuario_email`),
  INDEX `fk_Comentario_Usuario1_idx` (`Usuario_email` ASC),
  CONSTRAINT `fk_Comentario_Usuario1`
    FOREIGN KEY (`Usuario_email`)
    REFERENCES `mydb`.`Usuario` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Usuario_has_GrupoContato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Usuario_has_GrupoContato` (
  `Usuario_email` VARCHAR(100) NOT NULL,
  `GrupoContato_cod_grupo` INT NOT NULL,
  PRIMARY KEY (`Usuario_email`, `GrupoContato_cod_grupo`),
  INDEX `fk_Usuario_has_GrupoContato_GrupoContato1_idx` (`GrupoContato_cod_grupo` ASC),
  INDEX `fk_Usuario_has_GrupoContato_Usuario1_idx` (`Usuario_email` ASC),
  CONSTRAINT `fk_Usuario_has_GrupoContato_Usuario1`
    FOREIGN KEY (`Usuario_email`)
    REFERENCES `mydb`.`Usuario` (`email`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_has_GrupoContato_GrupoContato1`
    FOREIGN KEY (`GrupoContato_cod_grupo`)
    REFERENCES `mydb`.`GrupoContato` (`cod_grupo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
