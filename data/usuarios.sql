SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Groups`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Groups` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(16) NOT NULL ,
  `password` VARCHAR(16) NULL ,
  `first_name` VARCHAR(60) NULL ,
  `last_name` VARCHAR(60) NULL ,
  `is_active` TINYINT(1) NULL ,
  `email` VARCHAR(60) NULL ,
  `Groups_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_Users_Groups` (`Groups_id` ASC) ,
  CONSTRAINT `fk_Users_Groups`
    FOREIGN KEY (`Groups_id` )
    REFERENCES `mydb`.`Groups` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Applications`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Applications` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `code` VARCHAR(45) NULL ,
  `descripcion` TEXT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`AplicationsForGroups`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`AplicationsForGroups` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `Applications_id` INT NOT NULL ,
  `Groups_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_AplicationsForGroups_Applications1` (`Applications_id` ASC) ,
  INDEX `fk_AplicationsForGroups_Groups1` (`Groups_id` ASC) ,
  CONSTRAINT `fk_AplicationsForGroups_Applications1`
    FOREIGN KEY (`Applications_id` )
    REFERENCES `mydb`.`Applications` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_AplicationsForGroups_Groups1`
    FOREIGN KEY (`Groups_id` )
    REFERENCES `mydb`.`Groups` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`LogEntrys`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`LogEntrys` (
  `id` INT NOT NULL ,
  `date_time` DATETIME NULL ,
  `flags` INT NULL ,
  `params` VARCHAR(250) NULL ,
  `Users_id` INT NOT NULL ,
  `Applications_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_LogEntrys_Users1` (`Users_id` ASC) ,
  INDEX `fk_LogEntrys_Applications1` (`Applications_id` ASC) ,
  CONSTRAINT `fk_LogEntrys_Users1`
    FOREIGN KEY (`Users_id` )
    REFERENCES `mydb`.`Users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_LogEntrys_Applications1`
    FOREIGN KEY (`Applications_id` )
    REFERENCES `mydb`.`Applications` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
