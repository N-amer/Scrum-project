CREATE TABLE `jarvisvault`.`notes` ( `id` INT(100) NOT NULL AUTO_INCREMENT , `title` VARCHAR(255) NOT NULL , `omschrijving` VARCHAR(255) NOT NULL , `gebruikersnaam` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

INSERT INTO `notes`(`title`, `omschrijving`, `gebruikersnaam`) VALUES ('test','test','terst')