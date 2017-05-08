-- MySQL Script generated by MySQL Workbench
-- vie 14 abr 2017 13:16:59 COT
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema appramadausersusersuserusersusers
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema appramada
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `appramada` DEFAULT CHARACTER SET latin1 ;
USE `appramada` ;

-- -----------------------------------------------------
-- Table `appramada`.`migrations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `appramada`.`migrations` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` VARCHAR(255) COLLATE 'utf8mb4_unicode_ci' NOT NULL,
  `batch` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `appramada`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `appramada`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `role` VARCHAR(50) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `remember_token` VARCHAR(60) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email` (`email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1;

-- -----------------------------------------------------
-- Table `appramada`.`types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS appramada.types (
  id INT(10) NOT NULL AUTO_INCREMENT,
  name VARCHAR(45) NOT NULL UNIQUE,
  description VARCHAR(200) DEFAULT NULL,
  PRIMARY KEY (id))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `appramada`.`pollutants`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS appramada.pollutants (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(45) NOT NULL UNIQUE,
  iframe VARCHAR(1000) NOT NULL,
  description VARCHAR(200) DEFAULT NULL,
  type_id INT NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (type_id) REFERENCES appramada.types(id)
    )
ENGINE = InnoDB;


INSERT INTO types (name) VALUES ("Farmacológicos");
INSERT INTO types (name) VALUES ("Orgánicos");
INSERT INTO types (name) VALUES ("Metales Pesados");

INSERT INTO pollutants (name, iframe, type_id) VALUES ('Acetaminofen','<iframe width="500" height="300" scrolling="no" frameborder="no" src="https://fusiontables.google.com/embedviz?q=select+col2+from+1plsthco6Sv7BSk1BicPmZ3V6qtZvHQ_NbYSlCS9l&amp;viz=MAP&amp;h=false&amp;lat=4.723178215048786&amp;lng=-74.16729712945556&amp;t=1&amp;z=13&amp;l=col2&amp;y=2&amp;tmplt=2&amp;hml=KML"></iframe>', 1);
INSERT INTO pollutants (name, iframe, type_id) VALUES ('Ciprofloxacion','<iframe width="500" height="300" scrolling="no" frameborder="no" src="https://fusiontables.google.com/embedviz?q=select+col2+from+1plsthco6Sv7BSk1BicPmZ3V6qtZvHQ_NbYSlCS9l&amp;viz=MAP&amp;h=false&amp;lat=4.68949098430204&amp;lng=-74.22396684152221&amp;t=1&amp;z=13&amp;l=col2&amp;y=6&amp;tmplt=6&amp;hml=KML"></iframe>', 1);
INSERT INTO pollutants (name, iframe, type_id) VALUES ('Losartan','<iframe width="500" height="300" scrolling="no" frameborder="no" src="https://fusiontables.google.com/embedviz?q=select+col2+from+1plsthco6Sv7BSk1BicPmZ3V6qtZvHQ_NbYSlCS9l&amp;viz=MAP&amp;h=false&amp;lat=4.723178215048786&amp;lng=-74.16729712945556&amp;t=1&amp;z=13&amp;l=col2&amp;y=2&amp;tmplt=2&amp;hml=KML"></iframe>', 2);

SELECT  pollutants.name, pollutants.iframe, types.name FROM types JOIN pollutants ON pollutants.type_id = types.id;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
