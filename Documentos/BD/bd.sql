SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `mydb` ;
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
SHOW WARNINGS;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`tbdetUsuarioDatos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbdetUsuarioDatos` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbdetUsuarioDatos` (
  `id` INT NOT NULL ,
  `pk_iCI` INT NOT NULL ,
  `vNOMBRE` VARCHAR(25) NOT NULL ,
  `vAPELLIDO` VARCHAR(25) NOT NULL ,
  `vCORREO_EMAIL` VARCHAR(40) NOT NULL ,
  `vTELF_LOCAL` VARCHAR(15) NOT NULL ,
  `vTELF_MOVIL` VARCHAR(15) NOT NULL ,
  `vCARGO` VARCHAR(25) NOT NULL ,
  `vDEPARTAMENTO` VARCHAR(25) NOT NULL ,
  `vSUCURSAL` VARCHAR(25) NOT NULL ,
  `dFECHA_REGISTRO` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `pk_iCI_UNIQUE` ON `mydb`.`tbdetUsuarioDatos` (`pk_iCI` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbgenTipoRol`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbgenTipoRol` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbgenTipoRol` (
  `id` INT NOT NULL ,
  `vDESCRIPCION` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `pk_TIPO_ROL_UNIQUE` ON `mydb`.`tbgenTipoRol` (`id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbgenRol`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbgenRol` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbgenRol` (
  `id` INT NOT NULL ,
  `vDESCRIPCION` VARCHAR(45) NOT NULL ,
  `fk_iTIPO_ROL` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_iTIPO_ROL`
    FOREIGN KEY (`fk_iTIPO_ROL` )
    REFERENCES `mydb`.`tbgenTipoRol` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_iTIPO_ROL_idx` ON `mydb`.`tbgenRol` (`fk_iTIPO_ROL` ASC) ;

SHOW WARNINGS;
CREATE UNIQUE INDEX `pk_iID_ROL_UNIQUE` ON `mydb`.`tbgenRol` (`id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbgenEstatusRegistroUsu`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbgenEstatusRegistroUsu` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbgenEstatusRegistroUsu` (
  `id` INT NOT NULL ,
  `pk_iID_ESTATUS` INT NOT NULL ,
  `vDESCRIPCION` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `pk_iID_ESTATUS_UNIQUE` ON `mydb`.`tbgenEstatusRegistroUsu` (`pk_iID_ESTATUS` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbdetUsuarioAcceso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbdetUsuarioAcceso` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbdetUsuarioAcceso` (
  `id` INT NOT NULL ,
  `vCLAVE` VARCHAR(7) NULL ,
  `fk_iCI` INT NOT NULL ,
  `fk_iID_ROL` INT NOT NULL ,
  `fk_iID_ESTATUS` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `ID_ROL`
    FOREIGN KEY (`fk_iID_ROL` )
    REFERENCES `mydb`.`tbgenRol` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `CI`
    FOREIGN KEY (`fk_iCI` )
    REFERENCES `mydb`.`tbdetUsuarioDatos` (`pk_iCI` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ID_ESTATUS`
    FOREIGN KEY (`fk_iID_ESTATUS` )
    REFERENCES `mydb`.`tbgenEstatusRegistroUsu` (`pk_iID_ESTATUS` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `ID_ROL_idx` ON `mydb`.`tbdetUsuarioAcceso` (`fk_iID_ROL` ASC) ;

SHOW WARNINGS;
CREATE INDEX `ID_ESTATUS_idx` ON `mydb`.`tbdetUsuarioAcceso` (`fk_iID_ESTATUS` ASC) ;

SHOW WARNINGS;
CREATE UNIQUE INDEX `fk_iCI_UNIQUE` ON `mydb`.`tbdetUsuarioAcceso` (`fk_iCI` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbdetEmpresa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbdetEmpresa` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbdetEmpresa` (
  `id` INT NOT NULL ,
  `pk_iRIF` INT NOT NULL ,
  `vDIRECCION FISCAL` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `pk_iRIF_UNIQUE` ON `mydb`.`tbdetEmpresa` (`pk_iRIF` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbdetContratoRif`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbdetContratoRif` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbdetContratoRif` (
  `id` INT NOT NULL ,
  `pk_iNRO_CONTRATO` INT NOT NULL ,
  `fk_iRIF` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `RIF`
    FOREIGN KEY (`fk_iRIF` )
    REFERENCES `mydb`.`tbdetEmpresa` (`pk_iRIF` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `RIF_idx` ON `mydb`.`tbdetContratoRif` (`fk_iRIF` ASC) ;

SHOW WARNINGS;
CREATE UNIQUE INDEX `pk_iNRO_CONTRATO_UNIQUE` ON `mydb`.`tbdetContratoRif` (`pk_iNRO_CONTRATO` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbgenFuncion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbgenFuncion` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbgenFuncion` (
  `id` INT NOT NULL ,
  `vDESCRIPCION` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `pk_iID_FUNCION_UNIQUE` ON `mydb`.`tbgenFuncion` (`id` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbdetRolFuncion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbdetRolFuncion` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbdetRolFuncion` (
  `id` INT NOT NULL ,
  `fk_iID_ROL` INT NOT NULL ,
  `fk_iID_FUNCION` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_iID_ROLRolFuncion`
    FOREIGN KEY (`fk_iID_ROL` )
    REFERENCES `mydb`.`tbgenRol` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_iID_FUNCIONRolFuncion`
    FOREIGN KEY (`fk_iID_FUNCION` )
    REFERENCES `mydb`.`tbgenFuncion` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `ID_ROL_idx` ON `mydb`.`tbdetRolFuncion` (`fk_iID_ROL` ASC) ;

SHOW WARNINGS;
CREATE INDEX `ID_FUNCION_idx` ON `mydb`.`tbdetRolFuncion` (`fk_iID_FUNCION` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbgenParametros`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbgenParametros` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbgenParametros` (
  `id` INT NOT NULL ,
  `vDESCRIPCION` VARCHAR(45) NULL ,
  `iMAX_ACCESO` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbdetUsuarioContrato`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbdetUsuarioContrato` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbdetUsuarioContrato` (
  `id` INT NOT NULL ,
  `fk_iCI` INT NOT NULL ,
  `fk_iNRO_CONTRATO` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_iCI_usuarioContrato`
    FOREIGN KEY (`fk_iCI` )
    REFERENCES `mydb`.`tbdetUsuarioDatos` (`pk_iCI` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_iNRO_CONTRATOUsuarioContrato`
    FOREIGN KEY (`fk_iNRO_CONTRATO` )
    REFERENCES `mydb`.`tbdetContratoRif` (`pk_iNRO_CONTRATO` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `NRO_CONTRATO_idx` ON `mydb`.`tbdetUsuarioContrato` (`fk_iNRO_CONTRATO` ASC) ;

SHOW WARNINGS;
CREATE INDEX `CI_idx` ON `mydb`.`tbdetUsuarioContrato` (`fk_iCI` ASC) ;

SHOW WARNINGS;
CREATE UNIQUE INDEX `fk_iCI_UNIQUE` ON `mydb`.`tbdetUsuarioContrato` (`fk_iCI` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tblogEstatusUsuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tblogEstatusUsuario` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tblogEstatusUsuario` (
  `id` INT NOT NULL ,
  `fk_iCI` INT NOT NULL ,
  `fk_iID_ESTATUS` INT NOT NULL ,
  `dFECHA_CAMBIO` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_iID_ESTATUS`
    FOREIGN KEY (`fk_iID_ESTATUS` )
    REFERENCES `mydb`.`tbgenEstatusRegistroUsu` (`pk_iID_ESTATUS` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_iCI`
    FOREIGN KEY (`fk_iCI` )
    REFERENCES `mydb`.`tbdetUsuarioDatos` (`pk_iCI` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_iID_ESTATUS_idx` ON `mydb`.`tblogEstatusUsuario` (`fk_iID_ESTATUS` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_iCI_idx` ON `mydb`.`tblogEstatusUsuario` (`fk_iCI` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tblogConexion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tblogConexion` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tblogConexion` (
  `id` INT NOT NULL ,
  `fk_iCI` INT NOT NULL ,
  `dFECHA_ACCESO` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_iCI_conexion`
    FOREIGN KEY (`fk_iCI` )
    REFERENCES `mydb`.`tbdetUsuarioDatos` (`pk_iCI` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_iCI_idx` ON `mydb`.`tblogConexion` (`fk_iCI` ASC) ;

SHOW WARNINGS;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
