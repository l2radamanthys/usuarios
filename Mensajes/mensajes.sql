-- -----------------------------------------------------
-- Table `Mensajes`
-- -----------------------------------------------------
CREATE  TABLE `Messages` (
    `id_message` INT(11) NOT NULL AUTO_INCREMENT,
    `fk_Users_username_from` VARCHAR(16) NOT NULL,
    `fk_Users_username_to` VARCHAR(16) NOT NULL,
    `asunto_message` VARCHAR(45) NULL,
    `status_message` INT(1) NULL,
    `content_message` TEXT NULL,
    PRIMARY KEY(`id_message`)
    INDEX `fk_DatosPersonales_Users` (`fk_Users_username_from` ASC),
    INDEX `fk_DatosPersonales_Users` (`fk_Users_username_to` ASC),
    CONSTRAINT `fk_DatosPersonales_Users_from` FOREIGN KEY (`fk_Users_username_from`)
    REFERENCES `Users`(`username`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    CONSTRAINT `fk_DatosPersonales_Users_to` FOREIGN KEY (`fk_Users_username_to`)
    REFERENCES `Users`(`username`) ON DELETE NO ACTION ON UPDATE NO ACTION
)ENGINE = InnoDB;
