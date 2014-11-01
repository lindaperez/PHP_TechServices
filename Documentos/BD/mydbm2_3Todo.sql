-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-10-2014 a las 12:33:23
-- Versión del servidor: 5.5.38
-- Versión de PHP: 5.5.17-2+deb.sury.org~precise+1

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
-- Estructura de tabla para la tabla `tbdetContratoRif`
--

CREATE TABLE IF NOT EXISTS `tbdetContratoRif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pk_iNRO_CONTRATO` int(11) NOT NULL,
  `fk_iRIF` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pk_iNRO_CONTRATO_UNIQUE` (`pk_iNRO_CONTRATO`),
  KEY `RIF_idx` (`fk_iRIF`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tbdetContratoRif`
--

INSERT INTO `tbdetContratoRif` (`id`, `pk_iNRO_CONTRATO`, `fk_iRIF`) VALUES
(1, 1402, 2),
(2, 1541, 1),
(3, 21478, 3),
(4, 3251, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdetDetalleUsuario`
--

CREATE TABLE IF NOT EXISTS `tbdetDetalleUsuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vDETALLE` varchar(200) NOT NULL,
  `fk_iID_SOL_USU` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iID_SOL_USU` (`fk_iID_SOL_USU`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=140 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdetEmpresa`
--

CREATE TABLE IF NOT EXISTS `tbdetEmpresa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pk_iRIF` varchar(15) NOT NULL,
  `vDIRECCION_FISCAL` varchar(45) NOT NULL,
  `vNOMBRE` varchar(45) NOT NULL,
  `vRAZON_SOCIAL` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pk_iRIF_UNIQUE` (`pk_iRIF`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tbdetEmpresa`
--

INSERT INTO `tbdetEmpresa` (`id`, `pk_iRIF`, `vDIRECCION_FISCAL`, `vNOMBRE`, `vRAZON_SOCIAL`) VALUES
(1, 'J000224200', 'V PPAL ZONA INDUSTRIAL STA ROSALIA LOCAL PARC', 'Industria Venezolana de InveGas Gas, SCA', 'No posee'),
(2, 'J305664293', 'AV ESTE I LOCAL NRO L-C4 ZONA INDUSTRIAL CLOR', 'Empaco Avicola', 'No posee'),
(3, 'J308125954', 'Urbanización Colinas de la California. Esquin', 'Parmalat', 'Industria Láctea Venezolana C.A. (INDULAC/PAR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdetRelTipoSol_CalidadServ`
--

CREATE TABLE IF NOT EXISTS `tbdetRelTipoSol_CalidadServ` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_iTIPO_SOl` int(11) DEFAULT NULL,
  `fk_iCAL_SERV` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbdetRelTipoSol1` (`fk_iTIPO_SOl`),
  KEY `fk_tbdetRelTipoSol2` (`fk_iCAL_SERV`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdetRolFuncion`
--

CREATE TABLE IF NOT EXISTS `tbdetRolFuncion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_iID_ROL` int(11) DEFAULT NULL,
  `fk_iID_FUNCION` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ID_ROL_idx_RF` (`fk_iID_ROL`),
  KEY `ID_FUNCION_idx` (`fk_iID_FUNCION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdetUsuarioAcceso`
--

CREATE TABLE IF NOT EXISTS `tbdetUsuarioAcceso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_iCI` int(11) DEFAULT NULL,
  `fk_iID_ROL` int(11) DEFAULT NULL,
  `fk_iID_ESTATUS` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fk_iCI_UNIQUE` (`fk_iCI`),
  KEY `ID_ROL_idx_UA` (`fk_iID_ROL`),
  KEY `ID_ESTATUS_idx_UA` (`fk_iID_ESTATUS`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `tbdetUsuarioAcceso`
--

INSERT INTO `tbdetUsuarioAcceso` (`id`, `fk_iCI`, `fk_iID_ROL`, `fk_iID_ESTATUS`) VALUES
(26, 3, 3, 2),
(27, 2, 4, 2),
(28, 9, 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdetUsuarioContrato`
--

CREATE TABLE IF NOT EXISTS `tbdetUsuarioContrato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_iCI` int(11) DEFAULT NULL,
  `fk_iNRO_CONTRATO` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `NRO_CONTRATO_idx` (`fk_iNRO_CONTRATO`),
  KEY `CI_idx` (`fk_iCI`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=205 ;

--
-- Volcado de datos para la tabla `tbdetUsuarioContrato`
--

INSERT INTO `tbdetUsuarioContrato` (`id`, `fk_iCI`, `fk_iNRO_CONTRATO`) VALUES
(200, 3, 1),
(203, 2, 1),
(204, 9, 1);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `tbdetUsuarioDatos`
--

INSERT INTO `tbdetUsuarioDatos` (`id`, `pk_iCI`, `vTIPO_CI`, `vNOMBRE`, `vAPELLIDO`, `vCORREO_EMAIL`, `vTELF_LOCAL`, `vTELF_MOVIL`, `vCARGO`, `vDEPARTAMENTO`, `vSUCURSAL`, `vCLAVE`, `dFECHA_REGISTRO`) VALUES
(2, 18915761, 'V-', 'Vannesa', 'Vuolo', 'rosmery.p.p@gmail.com', '04129511668', '02122817569', 'Cargo Empleado', 'Departamento Empleado', 'Sucursal Empleado', '0GEQamuVuJ4GhnUpPaV9oMeohdqF0I/u5o4NmpliCmw6dTU2Q+wwvHloA4Wv3rfrV0z2Af/ddECxr2gGxF8mIQ==', '2014-07-15 00:00:00'),
(3, 14333222, 'V-', 'Claudia', 'Vilarino', 'rosmery.p.p@gmail.com', '04129511668', '02122817569', 'Administrador', 'Departamento Administrado', 'Sucursal Administrador', '5yscwAWN6Wagd3kcXNs2zIjaMbZKrrh+GFOhokV5DxgWGsSxuDUkaLKxg61pdndKtvEWrXYAmHD99xnPwmbDkg==', '2014-07-15 00:00:00'),
(9, 12833727, 'V-', 'Alina', 'Magan', 'rosmery.p.p@gmail.com', '2125547895', '4125589574', 'Cargo Cliente', 'dpto cliente', 'Sucursal Cliente', 'YjXZLPJwAXhvpxIY1kaq4aVgUSujR//8IzpS9JSl0jvOXjzYEJo6V2vPbAN6svuTTb1PFZXniEOrcexCKk3dWg==', '2014-10-04 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgenCalidadServPreg`
--

CREATE TABLE IF NOT EXISTS `tbgenCalidadServPreg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vPREGUNTA` varchar(85) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbgenCalidadServPreg`
--

INSERT INTO `tbgenCalidadServPreg` (`id`, `vPREGUNTA`) VALUES
(1, 'Indique su nivel de Satisfacción'),
(2, 'Trato del Tecnico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgenCalidadServResp`
--

CREATE TABLE IF NOT EXISTS `tbgenCalidadServResp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vRESPUESTA` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tbgenCalidadServResp`
--

INSERT INTO `tbgenCalidadServResp` (`id`, `vRESPUESTA`) VALUES
(1, 'Muy Malo'),
(2, 'Malo'),
(3, 'Medio'),
(4, 'Bueno'),
(5, 'Muy Bueno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgenCalSerPreg_CalSerResp`
--

CREATE TABLE IF NOT EXISTS `tbgenCalSerPreg_CalSerResp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_iID_CAL_SER_PREG` int(11) DEFAULT NULL,
  `fk_iID_CAL_SER_RESP` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iID_CAL_SER_PREG` (`fk_iID_CAL_SER_PREG`),
  KEY `fk_iID_CAL_SER_RESP` (`fk_iID_CAL_SER_RESP`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `tbgenCalSerPreg_CalSerResp`
--

INSERT INTO `tbgenCalSerPreg_CalSerResp` (`id`, `fk_iID_CAL_SER_PREG`, `fk_iID_CAL_SER_RESP`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 2, 1),
(7, 2, 2),
(8, 2, 3),
(9, 2, 3),
(10, 2, 4),
(11, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgenDetalle`
--

CREATE TABLE IF NOT EXISTS `tbgenDetalle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_iID_ESP_SOL` int(11) DEFAULT NULL,
  `vDESCRIPCION` varchar(80) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iID_ESP_SOL` (`fk_iID_ESP_SOL`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `tbgenDetalle`
--

INSERT INTO `tbgenDetalle` (`id`, `fk_iID_ESP_SOL`, `vDESCRIPCION`) VALUES
(7, 2, '< 6 CAMARAS'),
(8, 2, '6<= CAMARAS<=16'),
(9, 2, '>= 16 CAMARAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgenEspecSolicitud`
--

CREATE TABLE IF NOT EXISTS `tbgenEspecSolicitud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vNOMBRE_ESP_SOL` varchar(80) NOT NULL,
  `fk_iID_ESP_SOL` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iID_ESP_SOLD` (`fk_iID_ESP_SOL`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `tbgenEspecSolicitud`
--

INSERT INTO `tbgenEspecSolicitud` (`id`, `vNOMBRE_ESP_SOL`, `fk_iID_ESP_SOL`) VALUES
(1, 'Nueva Localidad', 1),
(2, 'Camaras Adicionales', 1),
(3, 'Ajuste Canon de Mensualidad', 2),
(4, 'Cobro Incorrecto', 2),
(5, 'Extravio', 2),
(6, 'Cierre de Localidad o Mudanza', 3),
(7, 'Costo de Servicio', 3),
(8, 'Calidad del Servicio', 3),
(9, 'Alternativa de Compra', 3),
(10, 'Tipo Tecnologia', 3),
(11, 'Reducir Costos', 4),
(12, 'Cambio de Infraestructura', 4),
(13, 'Ajuste Perfil de Seguridad', 5),
(14, 'Modificacion Infraestructrua', 5),
(15, 'Error en el Diseño Inicial', 5),
(16, 'Otras', 6);

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
-- Estructura de tabla para la tabla `tbgenEstatusSolicitud`
--

CREATE TABLE IF NOT EXISTS `tbgenEstatusSolicitud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vDESCRIPCION` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tbgenEstatusSolicitud`
--

INSERT INTO `tbgenEstatusSolicitud` (`id`, `vDESCRIPCION`) VALUES
(1, 'Abierto'),
(2, 'Detenido'),
(3, 'Culminado'),
(4, 'Anulado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgenFuncion`
--

CREATE TABLE IF NOT EXISTS `tbgenFuncion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vDESCRIPCION` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tbgenFuncion`
--

INSERT INTO `tbgenFuncion` (`id`, `vDESCRIPCION`) VALUES
(1, 'MODULO 1'),
(2, 'MODULO 2');

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
  `fk_iTIPO_ROL` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iTIPO_ROL_idx` (`fk_iTIPO_ROL`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tbgenRol`
--

INSERT INTO `tbgenRol` (`id`, `vDESCRIPCION`, `fk_iTIPO_ROL`) VALUES
(3, 'Administrador', 1),
(4, 'Empleado', 1),
(5, 'Cliente', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgenSolicitudServicio`
--

CREATE TABLE IF NOT EXISTS `tbgenSolicitudServicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_iID_USUA_DATOS` int(11) DEFAULT NULL,
  `dFECHA_CREACION` datetime NOT NULL,
  `fk_iID_ESP_SOL` int(11) DEFAULT NULL,
  `fk_iID_ESTATUS` int(11) DEFAULT NULL,
  `dFECHA_CIERRE` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iID_USUA_DATOS` (`fk_iID_USUA_DATOS`),
  KEY `fk_iID_TIPO_SOL` (`fk_iID_ESP_SOL`),
  KEY `fk_iID_ESTATUS` (`fk_iID_ESTATUS`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=128 ;

--
-- Volcado de datos para la tabla `tbgenSolicitudServicio`
--

INSERT INTO `tbgenSolicitudServicio` (`id`, `fk_iID_USUA_DATOS`, `dFECHA_CREACION`, `fk_iID_ESP_SOL`, `fk_iID_ESTATUS`, `dFECHA_CIERRE`) VALUES
(127, 9, '2014-10-12 00:00:00', 11, 3, '2014-10-12 12:27:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbgenSolServ_CalServ`
--

CREATE TABLE IF NOT EXISTS `tbgenSolServ_CalServ` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_iID_SOL` int(11) DEFAULT NULL,
  `iCAL_SOl_PREG` int(11) NOT NULL,
  `iRESPUESTA` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iID_SOL_SERV` (`fk_iID_SOL`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `tbgenSolServ_CalServ`
--

INSERT INTO `tbgenSolServ_CalServ` (`id`, `fk_iID_SOL`, `iCAL_SOl_PREG`, `iRESPUESTA`) VALUES
(17, 127, 1, 4),
(18, 127, 2, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tbgenTipoSolicitud`
--

INSERT INTO `tbgenTipoSolicitud` (`id`, `vNOMBRE_TIPO_SOL`) VALUES
(1, 'Equipos Adicionales'),
(2, 'Problemas de Facturación'),
(3, 'Retiro Total'),
(4, 'Retiro Parcial'),
(5, 'Reubicaciones'),
(6, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblogConexion`
--

CREATE TABLE IF NOT EXISTS `tblogConexion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_iCI` int(11) DEFAULT NULL,
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
  `fk_iCI` int(11) DEFAULT NULL,
  `fk_iID_ESTATUS` int(11) DEFAULT NULL,
  `dFECHA_CAMBIO` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iID_ESTATUS_idx` (`fk_iID_ESTATUS`),
  KEY `fk_iCI_idx_EU` (`fk_iCI`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbdetContratoRif`
--
ALTER TABLE `tbdetContratoRif`
  ADD CONSTRAINT `RIF` FOREIGN KEY (`fk_iRIF`) REFERENCES `tbdetEmpresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbdetDetalleUsuario`
--
ALTER TABLE `tbdetDetalleUsuario`
  ADD CONSTRAINT `fk_iID_SOL_DET` FOREIGN KEY (`fk_iID_SOL_USU`) REFERENCES `tbgenSolicitudServicio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbdetRelTipoSol_CalidadServ`
--
ALTER TABLE `tbdetRelTipoSol_CalidadServ`
  ADD CONSTRAINT `fk_iCAL_SERV` FOREIGN KEY (`fk_iCAL_SERV`) REFERENCES `tbgenCalidadServPreg` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_iTIPO_SOL` FOREIGN KEY (`fk_iTIPO_SOl`) REFERENCES `tbgenTipoSolicitud` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbdetRolFuncion`
--
ALTER TABLE `tbdetRolFuncion`
  ADD CONSTRAINT `fk_iID_FUNCIONRolFuncion` FOREIGN KEY (`fk_iID_FUNCION`) REFERENCES `tbgenFuncion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_iID_ROLRolFuncion` FOREIGN KEY (`fk_iID_ROL`) REFERENCES `tbgenRol` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Filtros para la tabla `tbgenDetalle`
--
ALTER TABLE `tbgenDetalle`
  ADD CONSTRAINT `fk_iID_ESPSOLDET` FOREIGN KEY (`fk_iID_ESP_SOL`) REFERENCES `tbgenEspecSolicitud` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbgenEspecSolicitud`
--
ALTER TABLE `tbgenEspecSolicitud`
  ADD CONSTRAINT `fk_iID_ESP_SOL` FOREIGN KEY (`fk_iID_ESP_SOL`) REFERENCES `tbgenTipoSolicitud` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbgenRol`
--
ALTER TABLE `tbgenRol`
  ADD CONSTRAINT `fk_iTIPO_ROL` FOREIGN KEY (`fk_iTIPO_ROL`) REFERENCES `tbgenTipoRol` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbgenSolicitudServicio`
--
ALTER TABLE `tbgenSolicitudServicio`
  ADD CONSTRAINT `fk_iID_USUA` FOREIGN KEY (`fk_iID_USUA_DATOS`) REFERENCES `tbdetUsuarioDatos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbgenEstatusSolicitud` FOREIGN KEY (`fk_iID_ESTATUS`) REFERENCES `tbgenEstatusSolicitud` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbgenSolicitudServicio_1` FOREIGN KEY (`fk_iID_ESP_SOL`) REFERENCES `tbgenEspecSolicitud` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbgenSolServ_CalServ`
--
ALTER TABLE `tbgenSolServ_CalServ`
  ADD CONSTRAINT `fk_iID_SOL` FOREIGN KEY (`fk_iID_SOL`) REFERENCES `tbgenSolicitudServicio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
