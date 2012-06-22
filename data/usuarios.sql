-- -----------------------------------------------------
-- Table `Groups`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Groups` (
	`id` INT NOT NULL AUTO_INCREMENT ,
	`name` VARCHAR(45) NULL ,
	PRIMARY KEY (`id`) 
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Users`
-- ----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Users` (
	`username` VARCHAR(16) NOT NULL,
	`password` VARCHAR(16) NULL,
	`first_name` VARCHAR(60) NULL,
	`last_name` VARCHAR(60) NULL,
	`is_active` TINYINT(1) NULL,
	`email` VARCHAR(60) NULL,
	`Groups_id` INT NOT NULL,
	
	PRIMARY KEY (`username`),
	INDEX `fk_Users_Groups`(`Groups_id` ASC),
	CONSTRAINT `fk_Users_Groups` FOREIGN KEY (`Groups_id`)
    REFERENCES `Groups`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Applications`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `Applications` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(45) NULL,
	`code` VARCHAR(45) NULL,
	`descripcion` TEXT NULL,
	PRIMARY KEY (`id`) 
) ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `AplicationsForGroups`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `AplicationsForGroups` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`Applications_id` INT NOT NULL,
	`Groups_id` INT NOT NULL,
  
	PRIMARY KEY (`id`),
	INDEX `fk_AplicationsForGroups_Applications`(`Applications_id` ASC),
	INDEX `fk_AplicationsForGroups_Groups`(`Groups_id` ASC),
	  
	CONSTRAINT `fk_AplicationsForGroups_Applications` FOREIGN KEY (`Applications_id`)
    REFERENCES `Applications`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    
	CONSTRAINT `fk_AplicationsForGroups_Groups` FOREIGN KEY (`Groups_id`) 
	REFERENCES `Groups`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
)ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LogEntrys`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `LogEntrys` (
	`id` INT NOT NULL,
	`date_time` DATETIME NULL,
	`flags` INT NULL,
	`params` VARCHAR(250) NULL,
	`Users_id` INT NOT NULL,
	`Applications_id` INT NOT NULL,
	
	PRIMARY KEY (`id`),
	INDEX `fk_LogEntrys_Applications` (`Applications_id` ASC),
	CONSTRAINT `fk_LogEntrys_Applications` FOREIGN KEY (`Applications_id`)
    REFERENCES `Applications` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;
