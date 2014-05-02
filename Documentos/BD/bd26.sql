SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `mydb2` ;
CREATE SCHEMA IF NOT EXISTS `mydb2` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
SHOW WARNINGS;
USE `mydb2` ;

-- -----------------------------------------------------
-- Table `mydb2`.`tbdetUsuarioDatos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb2`.`tbdetUsuarioDatos` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb2`.`tbdetUsuarioDatos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `pk_iCI` INT NOT NULL ,
  `vTIPO_CI` VARCHAR(45) NOT NULL ,
  `vNOMBRE` VARCHAR(25) NOT NULL ,
  `vAPELLIDO` VARCHAR(25) NOT NULL ,
  `vCORREO_EMAIL` VARCHAR(40) NOT NULL ,
  `vTELF_LOCAL` VARCHAR(15) NOT NULL ,
  `vTELF_MOVIL` VARCHAR(15) NOT NULL ,
  `vCARGO` VARCHAR(25) NOT NULL ,
  `vDEPARTAMENTO` VARCHAR(25) NOT NULL ,
  `vSUCURSAL` VARCHAR(25) NOT NULL ,
  `vCLAVE` VARCHAR(120) NOT NULL ,
  `dFECHA_REGISTRO` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `pk_iCI_UNIQUE` ON `mydb2`.`tbdetUsuarioDatos` (`pk_iCI` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb2`.`tbgenTipoRol`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb2`.`tbgenTipoRol` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb2`.`tbgenTipoRol` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `vDESCRIPCION` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb2`.`tbgenRol`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb2`.`tbgenRol` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb2`.`tbgenRol` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `vDESCRIPCION` VARCHAR(45) NOT NULL ,
  `fk_iTIPO_ROL` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_iTIPO_ROL`
    FOREIGN KEY (`fk_iTIPO_ROL` )
    REFERENCES `mydb2`.`tbgenTipoRol` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_iTIPO_ROL_idx` ON `mydb2`.`tbgenRol` (`fk_iTIPO_ROL` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb2`.`tbgenEstatusRegistroUsu`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb2`.`tbgenEstatusRegistroUsu` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb2`.`tbgenEstatusRegistroUsu` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `vDESCRIPCION` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb2`.`tbdetUsuarioAcceso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb2`.`tbdetUsuarioAcceso` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb2`.`tbdetUsuarioAcceso` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `fk_iCI` INT NOT NULL ,
  `fk_iID_ROL` INT NOT NULL ,
  `fk_iID_ESTATUS` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `ID_ROL`
    FOREIGN KEY (`fk_iID_ROL` )
    REFERENCES `mydb2`.`tbgenRol` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `CI_UA`
    FOREIGN KEY (`fk_iCI` )
    REFERENCES `mydb2`.`tbdetUsuarioDatos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ID_ESTATUS_UA`
    FOREIGN KEY (`fk_iID_ESTATUS` )
    REFERENCES `mydb2`.`tbgenEstatusRegistroUsu` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `ID_ROL_idx_UA` ON `mydb2`.`tbdetUsuarioAcceso` (`fk_iID_ROL` ASC) ;

SHOW WARNINGS;
CREATE INDEX `ID_ESTATUS_idx_UA` ON `mydb2`.`tbdetUsuarioAcceso` (`fk_iID_ESTATUS` ASC) ;

SHOW WARNINGS;
CREATE UNIQUE INDEX `fk_iCI_UNIQUE` ON `mydb2`.`tbdetUsuarioAcceso` (`fk_iCI` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb2`.`tbdetEmpresa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb2`.`tbdetEmpresa` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb2`.`tbdetEmpresa` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `pk_iRIF` VARCHAR(15) NOT NULL ,
  `vDIRECCION_FISCAL` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE UNIQUE INDEX `pk_iRIF_UNIQUE` ON `mydb2`.`tbdetEmpresa` (`pk_iRIF` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb2`.`tbdetContratoRif`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb2`.`tbdetContratoRif` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb2`.`tbdetContratoRif` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `pk_iNRO_CONTRATO` INT NOT NULL ,
  `fk_iRIF` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `RIF`
    FOREIGN KEY (`fk_iRIF` )
    REFERENCES `mydb2`.`tbdetEmpresa` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `RIF_idx` ON `mydb2`.`tbdetContratoRif` (`fk_iRIF` ASC) ;

SHOW WARNINGS;
CREATE UNIQUE INDEX `pk_iNRO_CONTRATO_UNIQUE` ON `mydb2`.`tbdetContratoRif` (`pk_iNRO_CONTRATO` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb2`.`tbgenFuncion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb2`.`tbgenFuncion` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb2`.`tbgenFuncion` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `vDESCRIPCION` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb2`.`tbdetRolFuncion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb2`.`tbdetRolFuncion` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb2`.`tbdetRolFuncion` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `fk_iID_ROL` INT NOT NULL ,
  `fk_iID_FUNCION` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_iID_ROLRolFuncion`
    FOREIGN KEY (`fk_iID_ROL` )
    REFERENCES `mydb2`.`tbgenRol` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_iID_FUNCIONRolFuncion`
    FOREIGN KEY (`fk_iID_FUNCION` )
    REFERENCES `mydb2`.`tbgenFuncion` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `ID_ROL_idx_RF` ON `mydb2`.`tbdetRolFuncion` (`fk_iID_ROL` ASC) ;

SHOW WARNINGS;
CREATE INDEX `ID_FUNCION_idx` ON `mydb2`.`tbdetRolFuncion` (`fk_iID_FUNCION` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb2`.`tbgenParametros`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb2`.`tbgenParametros` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb2`.`tbgenParametros` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `vDESCRIPCION` VARCHAR(45) NULL ,
  `iMAX_ACCESO` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb2`.`tbdetUsuarioContrato`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb2`.`tbdetUsuarioContrato` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb2`.`tbdetUsuarioContrato` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `fk_iCI` INT NOT NULL ,
  `fk_iNRO_CONTRATO` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_iCI_usuarioContrato`
    FOREIGN KEY (`fk_iCI` )
    REFERENCES `mydb2`.`tbdetUsuarioDatos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_iNRO_CONTRATOUsuarioContrato`
    FOREIGN KEY (`fk_iNRO_CONTRATO` )
    REFERENCES `mydb2`.`tbdetContratoRif` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `NRO_CONTRATO_idx` ON `mydb2`.`tbdetUsuarioContrato` (`fk_iNRO_CONTRATO` ASC) ;

SHOW WARNINGS;
CREATE INDEX `CI_idx` ON `mydb2`.`tbdetUsuarioContrato` (`fk_iCI` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb2`.`tblogEstatusUsuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb2`.`tblogEstatusUsuario` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb2`.`tblogEstatusUsuario` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `fk_iCI` INT NOT NULL ,
  `fk_iID_ESTATUS` INT NOT NULL ,
  `dFECHA_CAMBIO` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_iID_ESTATUS`
    FOREIGN KEY (`fk_iID_ESTATUS` )
    REFERENCES `mydb2`.`tbgenEstatusRegistroUsu` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_iCI_EU`
    FOREIGN KEY (`fk_iCI` )
    REFERENCES `mydb2`.`tbdetUsuarioDatos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_iID_ESTATUS_idx` ON `mydb2`.`tblogEstatusUsuario` (`fk_iID_ESTATUS` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_iCI_idx_EU` ON `mydb2`.`tblogEstatusUsuario` (`fk_iCI` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb2`.`tblogConexion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb2`.`tblogConexion` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb2`.`tblogConexion` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `fk_iCI` INT NOT NULL ,
  `dFECHA_ACCESO` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_iCI_conexion`
    FOREIGN KEY (`fk_iCI` )
    REFERENCES `mydb2`.`tbdetUsuarioDatos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_iCI_idx` ON `mydb2`.`tblogConexion` (`fk_iCI` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb2`.`tbgenSolicitudServicio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb2`.`tbgenSolicitudServicio` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb2`.`tbgenSolicitudServicio` (
  `id` INT NOT NULL ,
  `dFECHA_CREACION` DATETIME NOT NULL ,
  `fk_iID_USUA_DATOS` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_tbgenSolicitudServicio_4`
    FOREIGN KEY (`fk_iID_USUA_DATOS` )
    REFERENCES `mydb2`.`tbdetUsuarioDatos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_iID_USUA_DATOS` ON `mydb2`.`tbgenSolicitudServicio` (`fk_iID_USUA_DATOS` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb2`.`tbgenTipoSolicitud`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb2`.`tbgenTipoSolicitud` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb2`.`tbgenTipoSolicitud` (
  `id` INT NOT NULL ,
  `vNOMBRE_TIPO_SOL` VARCHAR(80) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb2`.`tbgenEspecSolicitud`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb2`.`tbgenEspecSolicitud` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb2`.`tbgenEspecSolicitud` (
  `id` INT NOT NULL ,
  `vNOMBRE_ESP_SOL` VARCHAR(80) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb2`.`tbgenSolServ_TipoSol`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb2`.`tbgenSolServ_TipoSol` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb2`.`tbgenSolServ_TipoSol` (
  `id` INT NOT NULL ,
  `fk_iID_SOLICITUD` INT NOT NULL ,
  `fk_iID_TIPO_SOLICITUD` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_tbgenSolicitudServTipo_1`
    FOREIGN KEY (`fk_iID_SOLICITUD` )
    REFERENCES `mydb2`.`tbgenSolicitudServicio` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbgenSolicitudServTipo_2`
    FOREIGN KEY (`fk_iID_TIPO_SOLICITUD` )
    REFERENCES `mydb2`.`tbgenTipoSolicitud` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_iID_SOLICITUD` ON `mydb2`.`tbgenSolServ_TipoSol` (`fk_iID_SOLICITUD` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_iID_TIPO_SOLICITUD` ON `mydb2`.`tbgenSolServ_TipoSol` (`fk_iID_TIPO_SOLICITUD` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb2`.`tbgenTipoSol_EspSol`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb2`.`tbgenTipoSol_EspSol` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb2`.`tbgenTipoSol_EspSol` (
  `id` INT NOT NULL ,
  `fk_iID_TIPO_SOL` INT NOT NULL ,
  `fk_iID_ESP_SOL` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_tbdetEspecSolTipo_1`
    FOREIGN KEY (`fk_iID_TIPO_SOL` )
    REFERENCES `mydb2`.`tbgenTipoSolicitud` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbdetEspecSolTipo_2`
    FOREIGN KEY (`fk_iID_ESP_SOL` )
    REFERENCES `mydb2`.`tbgenEspecSolicitud` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_iID_TIPO_SOL` ON `mydb2`.`tbgenTipoSol_EspSol` (`fk_iID_TIPO_SOL` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_iID_ESP_SOL` ON `mydb2`.`tbgenTipoSol_EspSol` (`fk_iID_ESP_SOL` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb2`.`tbgenCalidadServResp`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb2`.`tbgenCalidadServResp` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb2`.`tbgenCalidadServResp` (
  `id` INT NOT NULL ,
  `vRESPUESTA` VARCHAR(80) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb2`.`tbgenCalidadServPreg`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb2`.`tbgenCalidadServPreg` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb2`.`tbgenCalidadServPreg` (
  `id` INT NOT NULL ,
  `vPREGUNTA` VARCHAR(85) NOT NULL ,
  `fk_iID_SOL_SERV` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb2`.`tbgenSolServ_CalServPreg`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb2`.`tbgenSolServ_CalServPreg` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb2`.`tbgenSolServ_CalServPreg` (
  `id` INT NOT NULL ,
  `fk_iID_CAL_SOl_PREG` INT NOT NULL ,
  `fk_iID_SOL` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_tbgenCalidadServ_1`
    FOREIGN KEY (`fk_iID_CAL_SOl_PREG` )
    REFERENCES `mydb2`.`tbgenCalidadServPreg` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbgenCalidadServ_2`
    FOREIGN KEY (`fk_iID_SOL` )
    REFERENCES `mydb2`.`tbgenSolicitudServicio` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_iID_CAL_SOL_PREG` ON `mydb2`.`tbgenSolServ_CalServPreg` (`fk_iID_CAL_SOl_PREG` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_iID_SOL` ON `mydb2`.`tbgenSolServ_CalServPreg` (`fk_iID_SOL` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb2`.`tbgenCalSerPreg_CalSerResp`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb2`.`tbgenCalSerPreg_CalSerResp` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb2`.`tbgenCalSerPreg_CalSerResp` (
  `id` INT NOT NULL ,
  `fk_iID_CAL_SER_PREG` INT NOT NULL ,
  `fk_iID_CAL_SER_RESP` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_tbdetCalSerRel_1`
    FOREIGN KEY (`fk_iID_CAL_SER_PREG` )
    REFERENCES `mydb2`.`tbgenCalidadServPreg` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbdetCalSerRel_2`
    FOREIGN KEY (`fk_iID_CAL_SER_RESP` )
    REFERENCES `mydb2`.`tbgenCalidadServResp` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_iID_CAL_SER_PREG` ON `mydb2`.`tbgenCalSerPreg_CalSerResp` (`fk_iID_CAL_SER_PREG` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_iID_CAL_SER_RESP` ON `mydb2`.`tbgenCalSerPreg_CalSerResp` (`fk_iID_CAL_SER_RESP` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb2`.`tbgenDetalle`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb2`.`tbgenDetalle` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb2`.`tbgenDetalle` (
  `id` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb2`.`tbgenEspSol_Det`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb2`.`tbgenEspSol_Det` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb2`.`tbgenEspSol_Det` (
  `id` INT NOT NULL ,
  `fk_iID_ESP_SOL` INT NOT NULL ,
  `fk_iID_DETA` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_tbdetDetalle_Rel_1`
    FOREIGN KEY (`fk_iID_ESP_SOL` )
    REFERENCES `mydb2`.`tbgenEspecSolicitud` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbdetDetalle_Rel_2`
    FOREIGN KEY (`fk_iID_DETA` )
    REFERENCES `mydb2`.`tbgenDetalle` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_iID_ESP_SOL` ON `mydb2`.`tbgenEspSol_Det` (`fk_iID_ESP_SOL` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_iID_DETA` ON `mydb2`.`tbgenEspSol_Det` (`fk_iID_DETA` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb2`.`tbdetSol_CamposUsu`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb2`.`tbdetSol_CamposUsu` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb2`.`tbdetSol_CamposUsu` (
  `id` INT NOT NULL ,
  `fk_iID_SOL_TIPO` INT NOT NULL ,
  `fk_iID_TIPO_ESP` INT NOT NULL ,
  `fk_iID_ESP_DET` INT NOT NULL ,
  `vCAMPO_RESP` VARCHAR(80) NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_tbgenSol_Campos_1`
    FOREIGN KEY (`fk_iID_SOL_TIPO` )
    REFERENCES `mydb2`.`tbgenSolServ_TipoSol` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbgenSol_Campos_2`
    FOREIGN KEY (`fk_iID_TIPO_ESP` )
    REFERENCES `mydb2`.`tbgenTipoSol_EspSol` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbgenSol_Campos_3`
    FOREIGN KEY (`fk_iID_ESP_DET` )
    REFERENCES `mydb2`.`tbgenEspSol_Det` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_iID_SOL_TIPO` ON `mydb2`.`tbdetSol_CamposUsu` (`fk_iID_SOL_TIPO` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_iID_TIPO_ESP` ON `mydb2`.`tbdetSol_CamposUsu` (`fk_iID_TIPO_ESP` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_iID_ESP_DET` ON `mydb2`.`tbdetSol_CamposUsu` (`fk_iID_ESP_DET` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb2`.`tbdetCalidad_Campos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb2`.`tbdetCalidad_Campos` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb2`.`tbdetCalidad_Campos` (
  `id` INT NOT NULL ,
  `fk_iID_SolServ_CalServPreg` INT NOT NULL ,
  `fk_iID_CalServPreg_CalSerResp` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_tbdetCalidadResp_1`
    FOREIGN KEY (`fk_iID_CalServPreg_CalSerResp` )
    REFERENCES `mydb2`.`tbgenCalSerPreg_CalSerResp` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbdetCalidadResp_2`
    FOREIGN KEY (`fk_iID_SolServ_CalServPreg` )
    REFERENCES `mydb2`.`tbgenSolServ_CalServPreg` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_iID_CalServPreg_CalSerResp` ON `mydb2`.`tbdetCalidad_Campos` (`fk_iID_CalServPreg_CalSerResp` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_iID_SolServ_CalServPreg` ON `mydb2`.`tbdetCalidad_Campos` (`fk_iID_SolServ_CalServPreg` ASC) ;

SHOW WARNINGS;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
