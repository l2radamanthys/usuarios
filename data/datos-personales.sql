-- -----------------------------------------------------
-- Table `DatosPersonales`
-- -----------------------------------------------------
CREATE  TABLE `DatosPersonales` (
	`first_name` VARCHAR(45) NULL ,
	`last_name` VARCHAR(45) NULL ,
	`adress` VARCHAR(150) NULL ,
	`city` VARCHAR(45) NULL ,
	`state` VARCHAR(45) NULL ,
	`phone` VARCHAR(20) NULL ,
	`fk_Users_username` VARCHAR(16) NOT NULL ,
	INDEX `fk_DatosPersonales_Users1` (`fk_Users_username` ASC) ,
	CONSTRAINT `fk_DatosPersonales_Users` FOREIGN KEY (`fk_Users_username`)
	REFERENCES `Users`(`username`) ON DELETE NO ACTION ON UPDATE NO ACTION
)ENGINE = InnoDB;
