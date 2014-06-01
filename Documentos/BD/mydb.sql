-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-06-2014 a las 12:47:08
-- Versión del servidor: 5.5.35
-- Versión de PHP: 5.5.11-2+deb.sury.org~precise+2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdetCalidad_Campos`
--

CREATE TABLE IF NOT EXISTS `tbdetCalidad_Campos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_iID_SolServ_CalServPreg` int(11) NOT NULL,
  `fk_iID_CalServPreg_CalSerResp` int(11) NOT NULL,
  `vRESPUESTA` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iID_CalServPreg_CalSerResp` (`fk_iID_CalServPreg_CalSerResp`),
  KEY `fk_iID_SolServ_CalServPreg` (`fk_iID_SolServ_CalServPreg`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdetContratoRif`
--

CREATE TABLE IF NOT EXISTS `tbdetContratoRif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pk_iNRO_CONTRATO` int(11) NOT NULL,
  `fk_iRIF` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pk_iNRO_CONTRATO_UNIQUE` (`pk_iNRO_CONTRATO`),
  KEY `RIF_idx` (`fk_iRIF`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tbdetContratoRif`
--

INSERT INTO `tbdetContratoRif` (`id`, `pk_iNRO_CONTRATO`, `fk_iRIF`) VALUES
(1, 9834, 1),
(2, 1448, 1),
(3, 2148, 2),
(4, 325742, 3),
(5, 27, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdetEmpresa`
--

CREATE TABLE IF NOT EXISTS `tbdetEmpresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pk_iRIF` varchar(15) NOT NULL,
  `vDIRECCION_FISCAL` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pk_iRIF_UNIQUE` (`pk_iRIF`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbdetEmpresa`
--

INSERT INTO `tbdetEmpresa` (`id`, `pk_iRIF`, `vDIRECCION_FISCAL`) VALUES
(1, 'J003192350', 'MAKRO'),
(2, 'J000928630', 'Procter And Gamble'),
(3, 'J000063729', 'Empresas Polar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdetRolFuncion`
--

CREATE TABLE IF NOT EXISTS `tbdetRolFuncion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_iID_ROL` int(11) NOT NULL,
  `fk_iID_FUNCION` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ID_ROL_idx_RF` (`fk_iID_ROL`),
  KEY `ID_FUNCION_idx` (`fk_iID_FUNCION`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tbdetRolFuncion`
--

INSERT INTO `tbdetRolFuncion` (`id`, `fk_iID_ROL`, `fk_iID_FUNCION`) VALUES
(1, 5, 1),
(2, 4, 2),
(3, 4, 1),
(4, 4, 3),
(5, 4, 4),
(6, 6, 5),
(7, 6, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdetSol_CamposUsu`
--

CREATE TABLE IF NOT EXISTS `tbdetSol_CamposUsu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_iID_SOL_TIPO` int(11) NOT NULL,
  `fk_iID_TIPO_ESP` int(11) NOT NULL,
  `fk_iID_ESP_DET` int(11) NOT NULL,
  `vCAMPO_RESP` varchar(80) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iID_SOL_TIPO` (`fk_iID_SOL_TIPO`),
  KEY `fk_iID_TIPO_ESP` (`fk_iID_TIPO_ESP`),
  KEY `fk_iID_ESP_DET` (`fk_iID_ESP_DET`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdetUsuarioAcceso`
--

CREATE TABLE IF NOT EXISTS `tbdetUsuarioAcceso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_iCI` int(11) NOT NULL,
  `fk_iID_ROL` int(11) NOT NULL,
  `fk_iID_ESTATUS` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fk_iCI_UNIQUE` (`fk_iCI`),
  KEY `ID_ROL_idx_UA` (`fk_iID_ROL`),
  KEY `ID_ESTATUS_idx_UA` (`fk_iID_ESTATUS`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `tbdetUsuarioAcceso`
--

INSERT INTO `tbdetUsuarioAcceso` (`id`, `fk_iCI`, `fk_iID_ROL`, `fk_iID_ESTATUS`) VALUES
(1, 1, 4, 2),
(33, 33, 5, 2),
(34, 34, 4, 2),
(35, 35, 5, 3),
(36, 36, 5, 2),
(37, 37, 5, 2),
(38, 38, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdetUsuarioContrato`
--

CREATE TABLE IF NOT EXISTS `tbdetUsuarioContrato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_iCI` int(11) NOT NULL,
  `fk_iNRO_CONTRATO` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `NRO_CONTRATO_idx` (`fk_iNRO_CONTRATO`),
  KEY `CI_idx` (`fk_iCI`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=110 ;

--
-- Volcado de datos para la tabla `tbdetUsuarioContrato`
--

INSERT INTO `tbdetUsuarioContrato` (`id`, `fk_iCI`, `fk_iNRO_CONTRATO`) VALUES
(80, 34, 3),
(83, 35, 1),
(85, 33, 2),
(87, 36, 1),
(90, 37, 1),
(106, 38, 4),
(107, 1, 1),
(108, 1, 2),
(109, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdetUsuarioDatos`
--

CREATE TABLE IF NOT EXISTS `tbdetUsuarioDatos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pk_iCI` int(11) NOT NULL,
  `vTIPO_CI` varchar(45) NOT NULL,
  `vNOMBRE` varchar(25) NOT NULL,
  `vAPELLIDO` varchar(25) NOT NULL,
  `vCORREO_EMAIL` varchar(40) NOT NULL,
  `vTELF_LOCAL` varchar(15) NOT NULL,
  `vTELF_MOVIL` varchar(15) NOT NULL,
  `vCARGO` varchar(25) NOT NULL,
  `vDEPARTAMENTO` varchar(25) NOT NULL,
  `vSUCURSAL` varchar(25) NOT NULL,
  `vCLAVE` varchar(120) NOT NULL,
  `dFECHA_REGISTRO` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pk_iCI_UNIQUE` (`pk_iCI`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `tbdetUsuarioDatos`
--

INSERT INTO `tbdetUsuarioDatos` (`id`, `pk_iCI`, `vTIPO_CI`, `vNOMBRE`, `vAPELLIDO`, `vCORREO_EMAIL`, `vTELF_LOCAL`, `vTELF_MOVIL`, `vCARGO`, `vDEPARTAMENTO`, `vSUCURSAL`, `vCLAVE`, `dFECHA_REGISTRO`) VALUES
(1, 18915768, 'V-', 'Helena de Troya', 'De Esparta Pérez', 'rosmery.p.p4@gmail.com', '04129511668', '02122817569', 'Empleado Administrador', 'Departamento Empleado', 'Sucursal Empleado', 'TygtKmJ4JLAF+jrkE1G5ht9u9PH09QO7hqkWiaLttp61S1AS311OqtirizZUOtdfOmr6JMIkRcdHHaZiolHxsw==', '2014-05-02 00:00:00'),
(33, 18915777, 'V-', 'LIONEL', 'MINOL', 'rosmery.p.p@gmail.com', '02129511668', '04122817569', 'Developer', 'Techtroll', 'Techtroll', '0vbdSPS/Uyz5Kp/kRG26WOn5qpiL103Ac0XcqxsMYMPWWWlo5ZACCTGQmHkAt4aULMjuEFrPkPZ0Lu1d2aWiwA==', '2014-05-12 00:00:00'),
(34, 18915788, 'V-', 'Vannesa', 'Hernandez Sanabria', 'rosmery.p.p3@gmail.com', '2129755981', '4129511668', 'Techtroll', 'Techtroll', 'Techtroll', 'c2VmXwqDm+kFZdbHPOuzxltG/SPmNf9eTuFsbOIiIH9Chw/yubD8YrZk5w6AVi8IA6Tzh3VXbq9kYEDVefAVIw==', '2014-05-12 00:00:00'),
(35, 12875432, 'V-', 'SUGENI', 'MORA', 'edgar.tovar@techtrol.com', '02122423062++', '04166209900', 'VP', 'GERENCIA', 'CARACAS', 'C/xB9Jp1SR0dtr6zBCtNpZgFXT0bsL0FFJoi3SX3LUnpsSmV4vilMnOz3n7Vv8zuzNxRW/Wp2hrtMMmxpGOSEQ==', '2014-05-14 00:00:00'),
(36, 6512850, 'V-', 'EDGAR', 'TOVAR', 'edgar.tovar@techtrol.com.ve', '2129755981', '4129511668', 'VP', 'GERENCIA', 'CARACAS', 'kPjR2Lx9fRkwhh9KoFrVNQtNRL7HV0I6RphasWs7hoR63GG+h47eVXkHjCAbWd1x+Kw6jeZn1ZiDXzqBs922CA==', '2014-05-14 00:00:00'),
(37, 80398924, 'V-', 'RENZO', 'darigo', 'edgar.tovar@techtrol.com.ve', '04129511668', '4129511668', 'Developer', 'Departamento Empleado', 'Caracas', 'KfkqbOj0pGqeFO3DZ76Luf1KmcWtc7eYTEGsUtNNuo6mK2ZqqDo5uIEMZe+aquBLOA0ks6mNACEgfjBpB+38+g==', '2014-05-14 00:00:00'),
(38, 18915744, 'V-', 'Linda', 'Perez', 'rosmery.p.p@gmail.com', '4129511668', '4129511668', 'skdjf', 'kjh', 'kjh', '9RJg4/YfJ9EjQ4WxY+Mxxmie57OCEPDsdFgK2P9oOS16rEXOz6CQQFEh5RA6HYeVR/wp9dHY0/IjmpoN9esMjg==', '2014-05-28 14:26:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgenCalidadServPreg`
--

CREATE TABLE IF NOT EXISTS `tbgenCalidadServPreg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vPREGUNTA` varchar(85) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgenCalidadServResp`
--

CREATE TABLE IF NOT EXISTS `tbgenCalidadServResp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vRESPUESTA` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgenCalSerPreg_CalSerResp`
--

CREATE TABLE IF NOT EXISTS `tbgenCalSerPreg_CalSerResp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_iID_CAL_SER_PREG` int(11) NOT NULL,
  `fk_iID_CAL_SER_RESP` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iID_CAL_SER_PREG` (`fk_iID_CAL_SER_PREG`),
  KEY `fk_iID_CAL_SER_RESP` (`fk_iID_CAL_SER_RESP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgenDetalle`
--

CREATE TABLE IF NOT EXISTS `tbgenDetalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vNOMBRE` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgenEspecSolicitud`
--

CREATE TABLE IF NOT EXISTS `tbgenEspecSolicitud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vNOMBRE_ESP_SOL` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgenEspSol_Det`
--

CREATE TABLE IF NOT EXISTS `tbgenEspSol_Det` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_iID_ESP_SOL` int(11) NOT NULL,
  `fk_iID_DETA` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iID_ESP_SOL` (`fk_iID_ESP_SOL`),
  KEY `fk_iID_DETA` (`fk_iID_DETA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgenEstatusRegistroUsu`
--

CREATE TABLE IF NOT EXISTS `tbgenEstatusRegistroUsu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vDESCRIPCION` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbgenEstatusRegistroUsu`
--

INSERT INTO `tbgenEstatusRegistroUsu` (`id`, `vDESCRIPCION`) VALUES
(1, 'Solicitud de Registro'),
(2, 'Solicitud Confirmada'),
(3, 'Solicitud Anulada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgenFuncion`
--

CREATE TABLE IF NOT EXISTS `tbgenFuncion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vDESCRIPCION` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tbgenFuncion`
--

INSERT INTO `tbgenFuncion` (`id`, `vDESCRIPCION`) VALUES
(1, 'Solicitud de Registro'),
(2, 'Listado de Solicitudes'),
(3, 'Contratos'),
(4, 'Empresas'),
(5, 'Solicitud de Servicio'),
(6, 'Solicitud de Facturación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgenParametros`
--

CREATE TABLE IF NOT EXISTS `tbgenParametros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vDESCRIPCION` varchar(45) DEFAULT NULL,
  `iMAX_ACCESO` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgenRol`
--

CREATE TABLE IF NOT EXISTS `tbgenRol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vDESCRIPCION` varchar(45) NOT NULL,
  `fk_iTIPO_ROL` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iTIPO_ROL_idx` (`fk_iTIPO_ROL`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tbgenRol`
--

INSERT INTO `tbgenRol` (`id`, `vDESCRIPCION`, `fk_iTIPO_ROL`) VALUES
(3, 'Administrador', 1),
(4, 'Empleado', 1),
(5, 'Cliente', 2),
(6, 'Cliente Tipo 2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgenSolicitudServicio`
--

CREATE TABLE IF NOT EXISTS `tbgenSolicitudServicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dFECHA_CREACION` datetime NOT NULL,
  `fk_iID_USUA_DATOS` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iID_USUA_DATOS` (`fk_iID_USUA_DATOS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgenSolServ_CalServPreg`
--

CREATE TABLE IF NOT EXISTS `tbgenSolServ_CalServPreg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_iID_CAL_SOl_PREG` int(11) NOT NULL,
  `fk_iID_SOL` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iID_CAL_SOL_PREG` (`fk_iID_CAL_SOl_PREG`),
  KEY `fk_iID_SOL` (`fk_iID_SOL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgenSolServ_TipoSol`
--

CREATE TABLE IF NOT EXISTS `tbgenSolServ_TipoSol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_iID_SOLICITUD` int(11) NOT NULL,
  `fk_iID_TIPO_SOLICITUD` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iID_SOLICITUD` (`fk_iID_SOLICITUD`),
  KEY `fk_iID_TIPO_SOLICITUD` (`fk_iID_TIPO_SOLICITUD`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgenTipoRol`
--

CREATE TABLE IF NOT EXISTS `tbgenTipoRol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vDESCRIPCION` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbgenTipoRol`
--

INSERT INTO `tbgenTipoRol` (`id`, `vDESCRIPCION`) VALUES
(1, 'Externo'),
(2, 'Interno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgenTipoSolicitud`
--

CREATE TABLE IF NOT EXISTS `tbgenTipoSolicitud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vNOMBRE_TIPO_SOL` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgenTipoSol_EspSol`
--

CREATE TABLE IF NOT EXISTS `tbgenTipoSol_EspSol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_iID_TIPO_SOL` int(11) NOT NULL,
  `fk_iID_ESP_SOL` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iID_TIPO_SOL` (`fk_iID_TIPO_SOL`),
  KEY `fk_iID_ESP_SOL` (`fk_iID_ESP_SOL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblogConexion`
--

CREATE TABLE IF NOT EXISTS `tblogConexion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_iCI` int(11) NOT NULL,
  `dFECHA_ACCESO` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iCI_idx` (`fk_iCI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblogEstatusUsuario`
--

CREATE TABLE IF NOT EXISTS `tblogEstatusUsuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_iCI` int(11) NOT NULL,
  `fk_iID_ESTATUS` int(11) NOT NULL,
  `dFECHA_CAMBIO` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iID_ESTATUS_idx` (`fk_iID_ESTATUS`),
  KEY `fk_iCI_idx_EU` (`fk_iCI`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `tblogEstatusUsuario`
--

INSERT INTO `tblogEstatusUsuario` (`id`, `fk_iCI`, `fk_iID_ESTATUS`, `dFECHA_CAMBIO`) VALUES
(2, 1, 2, '2014-05-02 00:00:00'),
(8, 33, 2, '2014-05-12 20:35:30'),
(9, 34, 2, '2014-05-12 20:38:48'),
(10, 35, 3, '2014-05-14 09:11:15'),
(11, 36, 2, '2014-05-14 10:20:43'),
(12, 37, 2, '2014-05-14 16:45:08');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbdetCalidad_Campos`
--
ALTER TABLE `tbdetCalidad_Campos`
  ADD CONSTRAINT `fk_tbdetCalidadResp_1` FOREIGN KEY (`fk_iID_CalServPreg_CalSerResp`) REFERENCES `tbgenCalSerPreg_CalSerResp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbdetCalidadResp_2` FOREIGN KEY (`fk_iID_SolServ_CalServPreg`) REFERENCES `tbgenSolServ_CalServPreg` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbdetContratoRif`
--
ALTER TABLE `tbdetContratoRif`
  ADD CONSTRAINT `RIF` FOREIGN KEY (`fk_iRIF`) REFERENCES `tbdetEmpresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbdetRolFuncion`
--
ALTER TABLE `tbdetRolFuncion`
  ADD CONSTRAINT `fk_iID_FUNCIONRolFuncion` FOREIGN KEY (`fk_iID_FUNCION`) REFERENCES `tbgenFuncion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_iID_ROLRolFuncion` FOREIGN KEY (`fk_iID_ROL`) REFERENCES `tbgenRol` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbdetSol_CamposUsu`
--
ALTER TABLE `tbdetSol_CamposUsu`
  ADD CONSTRAINT `fk_tbgenSol_Campos_1` FOREIGN KEY (`fk_iID_SOL_TIPO`) REFERENCES `tbgenSolServ_TipoSol` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbgenSol_Campos_2` FOREIGN KEY (`fk_iID_TIPO_ESP`) REFERENCES `tbgenTipoSol_EspSol` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbgenSol_Campos_3` FOREIGN KEY (`fk_iID_ESP_DET`) REFERENCES `tbgenEspSol_Det` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbdetUsuarioAcceso`
--
ALTER TABLE `tbdetUsuarioAcceso`
  ADD CONSTRAINT `CI_UA` FOREIGN KEY (`fk_iCI`) REFERENCES `tbdetUsuarioDatos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ID_ESTATUS_UA` FOREIGN KEY (`fk_iID_ESTATUS`) REFERENCES `tbgenEstatusRegistroUsu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ID_ROL` FOREIGN KEY (`fk_iID_ROL`) REFERENCES `tbgenRol` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbdetUsuarioContrato`
--
ALTER TABLE `tbdetUsuarioContrato`
  ADD CONSTRAINT `fk_iCI_usuarioContrato` FOREIGN KEY (`fk_iCI`) REFERENCES `tbdetUsuarioDatos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_iNRO_CONTRATOUsuarioContrato` FOREIGN KEY (`fk_iNRO_CONTRATO`) REFERENCES `tbdetContratoRif` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbgenCalSerPreg_CalSerResp`
--
ALTER TABLE `tbgenCalSerPreg_CalSerResp`
  ADD CONSTRAINT `fk_tbdetCalSerRel_1` FOREIGN KEY (`fk_iID_CAL_SER_PREG`) REFERENCES `tbgenCalidadServPreg` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbdetCalSerRel_2` FOREIGN KEY (`fk_iID_CAL_SER_RESP`) REFERENCES `tbgenCalidadServResp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbgenEspSol_Det`
--
ALTER TABLE `tbgenEspSol_Det`
  ADD CONSTRAINT `fk_tbdetDetalle_Rel_1` FOREIGN KEY (`fk_iID_ESP_SOL`) REFERENCES `tbgenEspecSolicitud` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbdetDetalle_Rel_2` FOREIGN KEY (`fk_iID_DETA`) REFERENCES `tbgenDetalle` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbgenRol`
--
ALTER TABLE `tbgenRol`
  ADD CONSTRAINT `fk_iTIPO_ROL` FOREIGN KEY (`fk_iTIPO_ROL`) REFERENCES `tbgenTipoRol` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbgenSolicitudServicio`
--
ALTER TABLE `tbgenSolicitudServicio`
  ADD CONSTRAINT `fk_tbgenSolicitudServicio_4` FOREIGN KEY (`fk_iID_USUA_DATOS`) REFERENCES `tbdetUsuarioDatos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbgenSolServ_CalServPreg`
--
ALTER TABLE `tbgenSolServ_CalServPreg`
  ADD CONSTRAINT `fk_tbgenCalidadServ_1` FOREIGN KEY (`fk_iID_CAL_SOl_PREG`) REFERENCES `tbgenCalidadServPreg` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbgenCalidadServ_2` FOREIGN KEY (`fk_iID_SOL`) REFERENCES `tbgenSolicitudServicio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbgenSolServ_TipoSol`
--
ALTER TABLE `tbgenSolServ_TipoSol`
  ADD CONSTRAINT `fk_tbgenSolicitudServTipo_1` FOREIGN KEY (`fk_iID_SOLICITUD`) REFERENCES `tbgenSolicitudServicio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbgenSolicitudServTipo_2` FOREIGN KEY (`fk_iID_TIPO_SOLICITUD`) REFERENCES `tbgenTipoSolicitud` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbgenTipoSol_EspSol`
--
ALTER TABLE `tbgenTipoSol_EspSol`
  ADD CONSTRAINT `fk_tbdetEspecSolTipo_1` FOREIGN KEY (`fk_iID_TIPO_SOL`) REFERENCES `tbgenTipoSolicitud` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbdetEspecSolTipo_2` FOREIGN KEY (`fk_iID_ESP_SOL`) REFERENCES `tbgenEspecSolicitud` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblogConexion`
--
ALTER TABLE `tblogConexion`
  ADD CONSTRAINT `fk_iCI_conexion` FOREIGN KEY (`fk_iCI`) REFERENCES `tbdetUsuarioDatos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblogEstatusUsuario`
--
ALTER TABLE `tblogEstatusUsuario`
  ADD CONSTRAINT `fk_iCI_EU` FOREIGN KEY (`fk_iCI`) REFERENCES `tbdetUsuarioDatos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_iID_ESTATUS` FOREIGN KEY (`fk_iID_ESTATUS`) REFERENCES `tbgenEstatusRegistroUsu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
