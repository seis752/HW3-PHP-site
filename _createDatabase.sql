-- MySQL Script generated by MySQL Workbench
-- 02/22/15 13:43:53
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema seismcdo8429
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `seismcdo8429` ;

-- -----------------------------------------------------
-- Schema seismcdo8429
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `seismcdo8429` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `seismcdo8429` ;

-- -----------------------------------------------------
-- Table `user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(60) NOT NULL,
  `password` VARCHAR(60) NOT NULL,
  `display_name` VARCHAR(60) NOT NULL,
  `created_when` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `message`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `message` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `message` VARCHAR(4000) NOT NULL,
  `created_when` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `relationship`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `relationship` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_1_id` INT NOT NULL,
  `user_2_id` INT NOT NULL,
  `created_when` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
