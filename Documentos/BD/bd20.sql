SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbdetUsuarioDatos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbdetUsuarioDatos` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbdetUsuarioDatos` (
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
CREATE UNIQUE INDEX `pk_iCI_UNIQUE` ON `mydb`.`tbdetUsuarioDatos` (`pk_iCI` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbgenTipoRol`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbgenTipoRol` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbgenTipoRol` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `vDESCRIPCION` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbgenRol`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbgenRol` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbgenRol` (
  `id` INT NOT NULL AUTO_INCREMENT ,
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

-- -----------------------------------------------------
-- Table `mydb`.`tbgenEstatusRegistroUsu`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbgenEstatusRegistroUsu` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbgenEstatusRegistroUsu` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `vDESCRIPCION` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbdetUsuarioAcceso`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbdetUsuarioAcceso` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbdetUsuarioAcceso` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `fk_iCI` INT NOT NULL ,
  `fk_iID_ROL` INT NOT NULL ,
  `fk_iID_ESTATUS` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `ID_ROL`
    FOREIGN KEY (`fk_iID_ROL` )
    REFERENCES `mydb`.`tbgenRol` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `CI_UA`
    FOREIGN KEY (`fk_iCI` )
    REFERENCES `mydb`.`tbdetUsuarioDatos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ID_ESTATUS_UA`
    FOREIGN KEY (`fk_iID_ESTATUS` )
    REFERENCES `mydb`.`tbgenEstatusRegistroUsu` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `ID_ROL_idx_UA` ON `mydb`.`tbdetUsuarioAcceso` (`fk_iID_ROL` ASC) ;

SHOW WARNINGS;
CREATE INDEX `ID_ESTATUS_idx_UA` ON `mydb`.`tbdetUsuarioAcceso` (`fk_iID_ESTATUS` ASC) ;

SHOW WARNINGS;
CREATE UNIQUE INDEX `fk_iCI_UNIQUE` ON `mydb`.`tbdetUsuarioAcceso` (`fk_iCI` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbdetEmpresa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbdetEmpresa` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbdetEmpresa` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `pk_iRIF` VARCHAR(15) NOT NULL ,
  `vDIRECCION_FISCAL` VARCHAR(45) NOT NULL ,
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
  `id` INT NOT NULL AUTO_INCREMENT ,
  `pk_iNRO_CONTRATO` INT NOT NULL ,
  `fk_iRIF` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `RIF`
    FOREIGN KEY (`fk_iRIF` )
    REFERENCES `mydb`.`tbdetEmpresa` (`id` )
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
  `id` INT NOT NULL AUTO_INCREMENT ,
  `vDESCRIPCION` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbdetRolFuncion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbdetRolFuncion` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbdetRolFuncion` (
  `id` INT NOT NULL AUTO_INCREMENT ,
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
CREATE INDEX `ID_ROL_idx_RF` ON `mydb`.`tbdetRolFuncion` (`fk_iID_ROL` ASC) ;

SHOW WARNINGS;
CREATE INDEX `ID_FUNCION_idx` ON `mydb`.`tbdetRolFuncion` (`fk_iID_FUNCION` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbgenParametros`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbgenParametros` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbgenParametros` (
  `id` INT NOT NULL AUTO_INCREMENT ,
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
  `id` INT NOT NULL AUTO_INCREMENT ,
  `fk_iCI` INT NOT NULL ,
  `fk_iNRO_CONTRATO` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_iCI_usuarioContrato`
    FOREIGN KEY (`fk_iCI` )
    REFERENCES `mydb`.`tbdetUsuarioDatos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_iNRO_CONTRATOUsuarioContrato`
    FOREIGN KEY (`fk_iNRO_CONTRATO` )
    REFERENCES `mydb`.`tbdetContratoRif` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `NRO_CONTRATO_idx` ON `mydb`.`tbdetUsuarioContrato` (`fk_iNRO_CONTRATO` ASC) ;

SHOW WARNINGS;
CREATE INDEX `CI_idx` ON `mydb`.`tbdetUsuarioContrato` (`fk_iCI` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tblogEstatusUsuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tblogEstatusUsuario` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tblogEstatusUsuario` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `fk_iCI` INT NOT NULL ,
  `fk_iID_ESTATUS` INT NOT NULL ,
  `dFECHA_CAMBIO` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_iID_ESTATUS`
    FOREIGN KEY (`fk_iID_ESTATUS` )
    REFERENCES `mydb`.`tbgenEstatusRegistroUsu` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_iCI_EU`
    FOREIGN KEY (`fk_iCI` )
    REFERENCES `mydb`.`tbdetUsuarioDatos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_iID_ESTATUS_idx` ON `mydb`.`tblogEstatusUsuario` (`fk_iID_ESTATUS` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_iCI_idx_EU` ON `mydb`.`tblogEstatusUsuario` (`fk_iCI` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tblogConexion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tblogConexion` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tblogConexion` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `fk_iCI` INT NOT NULL ,
  `dFECHA_ACCESO` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_iCI_conexion`
    FOREIGN KEY (`fk_iCI` )
    REFERENCES `mydb`.`tbdetUsuarioDatos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_iCI_idx` ON `mydb`.`tblogConexion` (`fk_iCI` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbgenSolicitudServicio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbgenSolicitudServicio` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbgenSolicitudServicio` (
  `id` INT NOT NULL ,
  `dFECHA_CREACION` DATETIME NOT NULL ,
  `fk_iID_USU_DATOS` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_tbgenSolicitudServicio_1`
    FOREIGN KEY (`fk_iID_USU_DATOS` )
    REFERENCES `mydb`.`tbdetUsuarioDatos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_tbgenSolicitudServicio_1` ON `mydb`.`tbgenSolicitudServicio` (`fk_iID_USU_DATOS` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbgenTipoSolicitud`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbgenTipoSolicitud` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbgenTipoSolicitud` (
  `id` INT NOT NULL ,
  `vNOMBRE_TIPO_SOL` VARCHAR(80) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbgenEspecSolicitud`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbgenEspecSolicitud` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbgenEspecSolicitud` (
  `id` INT NOT NULL ,
  `vNOMBRE_ESP_SOL` VARCHAR(80) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbgenSolServ_TipoSol`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbgenSolServ_TipoSol` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbgenSolServ_TipoSol` (
  `id` INT NOT NULL ,
  `fk_iID_SOLICITUD` INT NOT NULL ,
  `fk_iID_TIPO_SOLICITUD` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_tbdetSolicitudServTipo_1`
    FOREIGN KEY (`fk_iID_SOLICITUD` )
    REFERENCES `mydb`.`tbgenSolicitudServicio` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbdetSolicitudServTipo_2`
    FOREIGN KEY (`fk_iID_TIPO_SOLICITUD` )
    REFERENCES `mydb`.`tbgenTipoSolicitud` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_tbdetSolicitudServTipo_1` ON `mydb`.`tbgenSolServ_TipoSol` (`fk_iID_SOLICITUD` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_tbdetSolicitudServTipo_2` ON `mydb`.`tbgenSolServ_TipoSol` (`fk_iID_TIPO_SOLICITUD` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbgenTipoSol_EspSol`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbgenTipoSol_EspSol` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbgenTipoSol_EspSol` (
  `id` INT NOT NULL ,
  `fk_iID_TIPO_SOL` INT NOT NULL ,
  `fk_iID_ESP_SOL` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_tbdetEspecSolTipo_1`
    FOREIGN KEY (`fk_iID_TIPO_SOL` )
    REFERENCES `mydb`.`tbgenTipoSolicitud` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbdetEspecSolTipo_2`
    FOREIGN KEY (`fk_iID_ESP_SOL` )
    REFERENCES `mydb`.`tbgenEspecSolicitud` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_tbdetEspecSolTipo_1` ON `mydb`.`tbgenTipoSol_EspSol` (`fk_iID_TIPO_SOL` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_tbdetEspecSolTipo_2` ON `mydb`.`tbgenTipoSol_EspSol` (`fk_iID_ESP_SOL` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbgenCalidadServResp`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbgenCalidadServResp` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbgenCalidadServResp` (
  `id` INT NOT NULL ,
  `vRESPUESTA` VARCHAR(80) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbgenCalidadServPreg`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbgenCalidadServPreg` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbgenCalidadServPreg` (
  `id` INT NOT NULL ,
  `vPREGUNTA` VARCHAR(85) NOT NULL ,
  `fk_iID_SOL_SERV` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbgenSolServ_CalServPreg`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbgenSolServ_CalServPreg` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbgenSolServ_CalServPreg` (
  `id` INT NOT NULL ,
  `fk_iID_CAL_SOl_PREG` INT NOT NULL ,
  `fk_iID_SOL` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_tbdetCalidadServ_1`
    FOREIGN KEY (`fk_iID_CAL_SOl_PREG` )
    REFERENCES `mydb`.`tbgenCalidadServPreg` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbdetCalidadServ_2`
    FOREIGN KEY (`fk_iID_SOL` )
    REFERENCES `mydb`.`tbgenSolicitudServicio` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_tbdetCalidadServ_1` ON `mydb`.`tbgenSolServ_CalServPreg` (`fk_iID_CAL_SOl_PREG` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_tbdetCalidadServ_2` ON `mydb`.`tbgenSolServ_CalServPreg` (`fk_iID_SOL` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbgenCalSerPreg_CalSerResp`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbgenCalSerPreg_CalSerResp` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbgenCalSerPreg_CalSerResp` (
  `id` INT NOT NULL ,
  `fk_iID_CAL_SER_PREG` INT NOT NULL ,
  `fk_iID_CAL_SER_RESP` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_tbdetCalSerRel_1`
    FOREIGN KEY (`fk_iID_CAL_SER_PREG` )
    REFERENCES `mydb`.`tbgenCalidadServPreg` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbdetCalSerRel_2`
    FOREIGN KEY (`fk_iID_CAL_SER_RESP` )
    REFERENCES `mydb`.`tbgenCalidadServResp` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_tbdetCalSerRel_1` ON `mydb`.`tbgenCalSerPreg_CalSerResp` (`fk_iID_CAL_SER_PREG` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_tbdetCalSerRel_2` ON `mydb`.`tbgenCalSerPreg_CalSerResp` (`fk_iID_CAL_SER_RESP` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbgenDetalle`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbgenDetalle` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbgenDetalle` (
  `id` INT NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbgenEspSol_Det`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbgenEspSol_Det` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbgenEspSol_Det` (
  `id` INT NOT NULL ,
  `fk_iID_ESP_SOL` INT NOT NULL ,
  `fk_iID_DETA` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_tbdetDetalle_Rel_1`
    FOREIGN KEY (`fk_iID_ESP_SOL` )
    REFERENCES `mydb`.`tbgenEspecSolicitud` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbdetDetalle_Rel_2`
    FOREIGN KEY (`fk_iID_DETA` )
    REFERENCES `mydb`.`tbgenDetalle` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_tbdetDetalle_Rel_1` ON `mydb`.`tbgenEspSol_Det` (`fk_iID_ESP_SOL` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_tbdetDetalle_Rel_2` ON `mydb`.`tbgenEspSol_Det` (`fk_iID_DETA` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbdetSol_CamposUsu`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbdetSol_CamposUsu` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbdetSol_CamposUsu` (
  `id` INT NOT NULL ,
  `fk_iID_SOL_TIPO` INT NOT NULL ,
  `fk_iID_TIPO_ESP` INT NOT NULL ,
  `fk_iID_ESP_DET` INT NOT NULL ,
  `vCAMPO_RESP` VARCHAR(80) NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_tbgenSol_Campos_1`
    FOREIGN KEY (`fk_iID_SOL_TIPO` )
    REFERENCES `mydb`.`tbgenSolServ_TipoSol` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbgenSol_Campos_2`
    FOREIGN KEY (`fk_iID_TIPO_ESP` )
    REFERENCES `mydb`.`tbgenTipoSol_EspSol` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbgenSol_Campos_3`
    FOREIGN KEY (`fk_iID_ESP_DET` )
    REFERENCES `mydb`.`tbgenEspSol_Det` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_tbgenSol_Campos_1` ON `mydb`.`tbdetSol_CamposUsu` (`fk_iID_SOL_TIPO` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_tbgenSol_Campos_2` ON `mydb`.`tbdetSol_CamposUsu` (`fk_iID_TIPO_ESP` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_tbgenSol_Campos_3` ON `mydb`.`tbdetSol_CamposUsu` (`fk_iID_ESP_DET` ASC) ;

SHOW WARNINGS;

-- -----------------------------------------------------
-- Table `mydb`.`tbdetCalidad_Campos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`tbdetCalidad_Campos` ;

SHOW WARNINGS;
CREATE  TABLE IF NOT EXISTS `mydb`.`tbdetCalidad_Campos` (
  `id` INT NOT NULL ,
  `fk_iID_SolServ_CalServPreg` INT NOT NULL ,
  `fk_iID_CalServPreg_CalSerResp` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_tbdetCalidadResp_1`
    FOREIGN KEY (`fk_iID_CalServPreg_CalSerResp` )
    REFERENCES `mydb`.`tbgenCalSerPreg_CalSerResp` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbdetCalidadResp_2`
    FOREIGN KEY (`fk_iID_SolServ_CalServPreg` )
    REFERENCES `mydb`.`tbgenSolServ_CalServPreg` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SHOW WARNINGS;
CREATE INDEX `fk_tbdetCalidadResp_1` ON `mydb`.`tbdetCalidad_Campos` (`fk_iID_CalServPreg_CalSerResp` ASC) ;

SHOW WARNINGS;
CREATE INDEX `fk_tbdetCalidadResp_2` ON `mydb`.`tbdetCalidad_Campos` (`fk_iID_SolServ_CalServPreg` ASC) ;

SHOW WARNINGS;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
