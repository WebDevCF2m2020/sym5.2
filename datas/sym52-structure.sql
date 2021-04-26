-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema sym52
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema sym52
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sym52` DEFAULT CHARACTER SET utf8 ;
USE `sym52` ;

-- -----------------------------------------------------
-- Table `sym52`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sym52`.`user` (
  `iduser` INT UNSIGNED NULL AUTO_INCREMENT,
  `userlogin` VARCHAR(60) CHARACTER SET 'utf8mb4' NOT NULL,
  `userpwd` VARCHAR(256) CHARACTER SET 'utf8mb4' NOT NULL,
  `usermail` VARCHAR(160) NOT NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE INDEX `userlogin_UNIQUE` (`userlogin` ASC),
  UNIQUE INDEX `usermail_UNIQUE` (`usermail` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sym52`.`role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sym52`.`role` (
  `idrole` INT UNSIGNED NULL AUTO_INCREMENT,
  `rolename` VARCHAR(100) NOT NULL,
  `roleslug` VARCHAR(45) NOT NULL,
  `rolevalue` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idrole`),
  UNIQUE INDEX `rolename_UNIQUE` (`rolename` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sym52`.`user_has_role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sym52`.`user_has_role` (
  `user_iduser` INT UNSIGNED NULL,
  `role_idrole` INT UNSIGNED NULL,
  PRIMARY KEY (`user_iduser`, `role_idrole`),
  INDEX `fk_user_has_role_role1_idx` (`role_idrole` ASC),
  INDEX `fk_user_has_role_user_idx` (`user_iduser` ASC),
  CONSTRAINT `fk_user_has_role_user`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `sym52`.`user` (`iduser`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_role_role1`
    FOREIGN KEY (`role_idrole`)
    REFERENCES `sym52`.`role` (`idrole`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sym52`.`message`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sym52`.`message` (
  `idmessage` INT UNSIGNED NULL AUTO_INCREMENT,
  `messagetitle` VARCHAR(150) NOT NULL,
  `messageslug` VARCHAR(150) NOT NULL,
  `messagetext` TEXT NOT NULL,
  `messagedate` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `user_iduser` INT UNSIGNED NULL,
  PRIMARY KEY (`idmessage`),
  UNIQUE INDEX `messageslug_UNIQUE` (`messageslug` ASC),
  INDEX `fk_message_user1_idx` (`user_iduser` ASC),
  CONSTRAINT `fk_message_user1`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `sym52`.`user` (`iduser`)
    ON DELETE SET NULL
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sym52`.`section`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sym52`.`section` (
  `idsection` INT UNSIGNED NULL AUTO_INCREMENT,
  `sectiontitle` VARCHAR(100) NOT NULL,
  `sectionslug` VARCHAR(100) NOT NULL,
  `sectiondesc` VARCHAR(500) NULL,
  PRIMARY KEY (`idsection`),
  UNIQUE INDEX `sectionslug_UNIQUE` (`sectionslug` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sym52`.`message_has_section`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sym52`.`message_has_section` (
  `message_idmessage` INT UNSIGNED NULL,
  `section_idsection` INT UNSIGNED NULL,
  PRIMARY KEY (`message_idmessage`, `section_idsection`),
  INDEX `fk_message_has_section_section1_idx` (`section_idsection` ASC),
  INDEX `fk_message_has_section_message1_idx` (`message_idmessage` ASC),
  CONSTRAINT `fk_message_has_section_message1`
    FOREIGN KEY (`message_idmessage`)
    REFERENCES `sym52`.`message` (`idmessage`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_message_has_section_section1`
    FOREIGN KEY (`section_idsection`)
    REFERENCES `sym52`.`section` (`idsection`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
