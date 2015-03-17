-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-03-2015 a las 12:59:03
-- Versión del servidor: 5.5.41
-- Versión de PHP: 5.5.22-1+deb.sury.org~precise+1

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
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE IF NOT EXISTS `formulario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`id`, `titulo`, `descripcion`) VALUES
(1, 'Clientes Potenciales', 'Clientes Potenciales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formularioRelacion`
--

CREATE TABLE IF NOT EXISTS `formularioRelacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_iID_idForm` int(11) DEFAULT NULL,
  `fk_iID_idPreg` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_formularioRelacion` (`fk_iID_idForm`),
  KEY `FK_formularioRelacion_1` (`fk_iID_idPreg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `formularioRelacion`
--

INSERT INTO `formularioRelacion` (`id`, `fk_iID_idForm`, `fk_iID_idPreg`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PersonaPotencial`
--

CREATE TABLE IF NOT EXISTS `PersonaPotencial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vNOMBRE_COMPLETO` varchar(45) NOT NULL,
  `vTELEFONO` varchar(45) NOT NULL,
  `vCORREO_EMAIL` varchar(45) NOT NULL,
  `dFECHA_REGISTRO` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=394 ;

--
-- Volcado de datos para la tabla `PersonaPotencial`
--

INSERT INTO `PersonaPotencial` (`id`, `vNOMBRE_COMPLETO`, `vTELEFONO`, `vCORREO_EMAIL`, `dFECHA_REGISTRO`) VALUES
(393, 'Ejemplo Linda', '41295116686', 'rosmery.p.p@gmail.com', '2015-03-14 16:24:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PersonaRelForm`
--

CREATE TABLE IF NOT EXISTS `PersonaRelForm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) DEFAULT NULL,
  `id_formul` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_PersonaRelForm_1` (`id_persona`),
  KEY `fk_PersonaRelForm_2` (`id_formul`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=415 ;

--
-- Volcado de datos para la tabla `PersonaRelForm`
--

INSERT INTO `PersonaRelForm` (`id`, `id_persona`, `id_formul`) VALUES
(414, 393, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PersonaRespuesta`
--

CREATE TABLE IF NOT EXISTS `PersonaRespuesta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_RelForm` int(11) DEFAULT NULL,
  `id_Preg` int(11) DEFAULT NULL,
  `id_Resp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Fk_PersonaRespuesta_1` (`id_RelForm`),
  KEY `Fk_PersonaRespuesta_2` (`id_Preg`),
  KEY `Fk_PersonaRespuesta_3` (`id_Resp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=574 ;

--
-- Volcado de datos para la tabla `PersonaRespuesta`
--

INSERT INTO `PersonaRespuesta` (`id`, `id_RelForm`, `id_Preg`, `id_Resp`) VALUES
(571, 414, 1, 1),
(572, 414, 2, 8),
(573, 414, 3, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PregRespRel`
--

CREATE TABLE IF NOT EXISTS `PregRespRel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_preg` int(11) DEFAULT NULL,
  `id_resp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_PregRespRel_1` (`id_preg`),
  KEY `FK_PregRespRel_2` (`id_resp`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `PregRespRel`
--

INSERT INTO `PregRespRel` (`id`, `id_preg`, `id_resp`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 2, 7),
(8, 2, 8),
(9, 2, 10),
(10, 2, 11),
(11, 2, 12),
(12, 3, 13),
(13, 3, 14),
(14, 3, 15),
(15, 3, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PreguntaForm`
--

CREATE TABLE IF NOT EXISTS `PreguntaForm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vdescripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `PreguntaForm`
--

INSERT INTO `PreguntaForm` (`id`, `vdescripcion`) VALUES
(1, 'Sistema :'),
(2, 'Sector:'),
(3, 'Ubicación:');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RespuestaForm`
--

CREATE TABLE IF NOT EXISTS `RespuestaForm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vdescripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `RespuestaForm`
--

INSERT INTO `RespuestaForm` (`id`, `vdescripcion`) VALUES
(1, 'Cámaras de Video vigilancia'),
(2, 'Cerco eléctrico'),
(3, 'Alarma'),
(4, 'Incendio'),
(5, 'Control de acceso'),
(6, 'Anti-hurto Radiofrecuencia'),
(7, 'Industrial'),
(8, 'Comercio'),
(9, 'Gobierno / militar'),
(10, 'Condominio / residencial'),
(11, 'Residencial / casas'),
(12, 'Instalador'),
(13, 'Gran Caracas'),
(14, 'Oriente'),
(15, 'Centro'),
(16, 'Occidente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdetAlmacenista`
--

CREATE TABLE IF NOT EXISTS `tbdetAlmacenista` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vAlias` varchar(45) DEFAULT NULL,
  `fk_iID_USUA_DATOSALM` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbdetAlmacenista_1` (`fk_iID_USUA_DATOSALM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdetContratoRif`
--

CREATE TABLE IF NOT EXISTS `tbdetContratoRif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pk_iNRO_CONTRATO` int(11) NOT NULL,
  `vAlias` varchar(60) NOT NULL,
  `vDNS` varchar(256) NOT NULL,
  `vUbicacionFisica` varchar(256) NOT NULL,
  `fk_iRIF` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pk_iNRO_CONTRATO_UNIQUE` (`pk_iNRO_CONTRATO`),
  KEY `RIF_idx` (`fk_iRIF`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tbdetContratoRif`
--

INSERT INTO `tbdetContratoRif` (`id`, `pk_iNRO_CONTRATO`, `vAlias`, `vDNS`, `vUbicacionFisica`, `fk_iRIF`) VALUES
(1, 1402, 'ALias', 'https://www.google.co.ve/', 'Ubicacion Fisica_=54', 2),
(2, 1541, 'Alias ', 'DNS', 'Prados del Este', 1),
(3, 21478, 'Alias', 'DNS', 'Makro La Trinidad', 3),
(4, 3251, 'Alias', 'DNS', 'La trinidad', 3),
(5, 9999, 'Alias 9999', 'DNS', 'La campiña', 4),
(6, 2107, 'Alias contrato 2', 'https://www.google.co.ve/', 'lsdfhlsd 2sdfj dfjsdfkj', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdetCotizacion`
--

CREATE TABLE IF NOT EXISTS `tbdetCotizacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codCotizacion` varchar(20) NOT NULL,
  `tbdetCotizacioncol` int(11) DEFAULT NULL,
  `fk_iID_EstatusInstalacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbdetCotizacion_Cont` (`tbdetCotizacioncol`),
  KEY `fk_tbdetCotizacion_1` (`fk_iID_EstatusInstalacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tbdetEmpresa`
--

INSERT INTO `tbdetEmpresa` (`id`, `pk_iRIF`, `vDIRECCION_FISCAL`, `vNOMBRE`, `vRAZON_SOCIAL`) VALUES
(1, 'J000224200', 'V PPAL ZONA INDUSTRIAL STA ROSALIA LOCAL PARC', 'Industria Venezolana de InveGas Gas, SCA', 'No posee'),
(2, 'J305664293', 'AV ESTE I LOCAL NRO L-C4 ZONA INDUSTRIAL CLOR', 'Empaco Avicola', 'No posee'),
(3, 'J308125954', 'Urbanización Colinas de la California. Esquin', 'Parmalat', 'Industria Láctea Venezolana C.A. (INDULAC/PAR'),
(4, 'J112223334', 'Caracas', 'Prueba de Tecnologia', 'Prueba de Tecnologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdetEstatusAlmacen`
--

CREATE TABLE IF NOT EXISTS `tbdetEstatusAlmacen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vdescripcion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdetEstatusInstalacion`
--

CREATE TABLE IF NOT EXISTS `tbdetEstatusInstalacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vdescripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdetEstatusProyecto`
--

CREATE TABLE IF NOT EXISTS `tbdetEstatusProyecto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vdescripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdetLiderPMO`
--

CREATE TABLE IF NOT EXISTS `tbdetLiderPMO` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vAlias` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdetProyecto`
--

CREATE TABLE IF NOT EXISTS `tbdetProyecto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iCodProyecto` int(11) NOT NULL,
  `fk_iCodCotizacion` int(11) DEFAULT NULL,
  `icantidad` int(11) NOT NULL,
  `fk_tbdetEstatusProyecto_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbdetProyecto_Cot` (`fk_iCodCotizacion`),
  KEY `fk_tbdetProyecto_tbdetEstatusProyecto1` (`fk_tbdetEstatusProyecto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbdetrelAlmacenisProyecto`
--

CREATE TABLE IF NOT EXISTS `tbdetrelAlmacenisProyecto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dfecha` datetime NOT NULL,
  `fk_iID_tbdetProyecto_Alm` int(11) DEFAULT NULL,
  `fk_iID_tbdetAlmacenista` int(11) DEFAULT NULL,
  `fk_iID_EstatusAlmacen` int(11) NOT NULL,
  `vdescripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbdetrelAlmacenisProyecto_1` (`fk_iID_tbdetProyecto_Alm`),
  KEY `fk_tbdetrelAlmacenisProyecto_2` (`fk_iID_tbdetAlmacenista`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
-- Estructura de tabla para la tabla `tbdetTecnico`
--

CREATE TABLE IF NOT EXISTS `tbdetTecnico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vAlias` varchar(45) NOT NULL,
  `fk_iID_USUA_DATOSTECN` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbdetTecnico_1` (`fk_iID_USUA_DATOSTECN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `tbdetUsuarioAcceso`
--

INSERT INTO `tbdetUsuarioAcceso` (`id`, `fk_iCI`, `fk_iID_ROL`, `fk_iID_ESTATUS`) VALUES
(26, 3, 3, 2),
(27, 2, 4, 2),
(28, 9, 5, 2),
(29, 10, 3, 2),
(30, 11, 5, 2),
(31, 12, 5, 2),
(32, 13, 5, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=219 ;

--
-- Volcado de datos para la tabla `tbdetUsuarioContrato`
--

INSERT INTO `tbdetUsuarioContrato` (`id`, `fk_iCI`, `fk_iNRO_CONTRATO`) VALUES
(200, 3, 1),
(203, 2, 1),
(206, 9, 1),
(207, 9, 2),
(209, 10, 3),
(210, 10, 2),
(215, 11, 5),
(216, 12, 1),
(218, 13, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `tbdetUsuarioDatos`
--

INSERT INTO `tbdetUsuarioDatos` (`id`, `pk_iCI`, `vTIPO_CI`, `vNOMBRE`, `vAPELLIDO`, `vCORREO_EMAIL`, `vTELF_LOCAL`, `vTELF_MOVIL`, `vCARGO`, `vDEPARTAMENTO`, `vSUCURSAL`, `vCLAVE`, `dFECHA_REGISTRO`) VALUES
(2, 18915761, 'V-', 'Vannesa', 'Vuolo', 'rosmery.p.p@gmail.com', '04129511668', '02122817569', 'Cargo Empleado', 'Departamento Empleado', 'Sucursal Empleado', 'P/fp6f37Qk19A9Fhm7Ap4KUIMsmIrr2jYOez0pNxCJsJ0zL+3h2y/AVbiTgp8bTPs7FngG+Qlxl/WPGw2BRSsA==', '2014-07-15 00:00:00'),
(3, 14333222, 'V-', 'Claudia', 'Vilarino', 'rosmery.p.p@gmail.com', '04129511668', '02122817569', 'Administrador', 'Departamento Administrado', 'Sucursal Administrador', 'poIiPG56+LXasb4u5oS5MH7ld5QxQTiTvhvtNhu+E/0eE6nf8a7pNK6O4nhQLgA6TRwRck3buFSgbgenLQ1yzw==', '2014-07-15 00:00:00'),
(9, 12833727, 'V-', 'Alina', 'Magan', 'rosmery.p.p@gmail.com', '2125547895', '4125589574', 'Cargo Cliente', 'dpto cliente', 'Sucursal Cliente', 'a6JXRVI5tFKU0DoPDH/4CAhqX0T+RFyp6/tlcXoTTx14LKZFAZtxoDLDH/Xpnj0u+/GxkntGW1jiG8K70zI9Hw==', '2014-10-04 00:00:00'),
(10, 18915768, 'V-', 'Linda', 'Perez Lobo', 'rosmery.p.p@gmail.com', '2128759578', '4129511668', 'Administrador', 'Tecnologia', 'Sucursal Administrador', 'InJljpy6249EOgewuwOimWlMtzH+WHBAP4TmYP9zkuXJvxZWkqhibKgxhYtLxqH+vRLUXPN0qNX8DMDcZh3f6Q==', '2014-11-19 00:00:00'),
(11, 11222333, 'V-', 'Prueba uno', 'IT', 'edison.medina@techtrol.com.ve', '02122421510', '02122421510', 'Gerente', 'seguridad', 'Caracas', '1B+nRs0aO1hlI6V3RBPpAMWvp9qXO6okZR+1YbeR++8gKN0LOFbpwVUA6je1O8Z4APeBwN6tKHQQFaSoKLWS9Q==', '2014-11-20 00:00:00'),
(12, 12555666, 'V-', 'Prueba Cliente', 'apellido', 'rosmery.p.p@gmail.com', '4129511668', '4129511668', 'cargo', 'departamento', 'sucursal', 'kZYejzrFuDnjzEQ1+Eq7+m/bEBVU5P/rQN+9SpYZ2KbF8qwNXHRPIp0vYNPttc4qh4Bik2YVNPvdncCFXURSwQ==', '2014-11-20 20:34:14'),
(13, 10888999, 'V-', 'Christian', 'garcia', 'christian.garcia@techtrol.com.ve', '02122421510', '02122421510', 'Gerente', 'seguridad', 'Caracas', 'ATuYhm8IpkEvVA47KpfKRq5HdOqVMaBDd7vKF6+d+UKgAbksq3EjLobXb6VRmQQQVJuwFvUDIof8YgCP4RN6lw==', '2014-11-21 00:00:00');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `tbgenEspecSolicitud`
--

INSERT INTO `tbgenEspecSolicitud` (`id`, `vNOMBRE_ESP_SOL`, `fk_iID_ESP_SOL`) VALUES
(1, 'Al contrato', 2),
(2, 'Otra ubicación', 2),
(3, 'Parcial', 3),
(4, 'Total', 3),
(5, 'Cámaras', 4),
(6, 'Monitor, DVR, otros', 4),
(7, 'Técnica', 5),
(8, 'Administrativa', 5),
(17, 'Falla del Sistema', 1);

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
  `vDESCRIPCION` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `vdesc_Estatus` varchar(200) NOT NULL,
  `dFECHA_CIERRE` datetime DEFAULT NULL,
  `iID_CASO` varchar(254) DEFAULT NULL,
  `fk_iID_Contrato` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iID_USUA_DATOS` (`fk_iID_USUA_DATOS`),
  KEY `fk_iID_TIPO_SOL` (`fk_iID_ESP_SOL`),
  KEY `iID_CASO` (`iID_CASO`),
  KEY `fk_iID_Contrato` (`fk_iID_Contrato`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=227 ;

--
-- Volcado de datos para la tabla `tbgenSolicitudServicio`
--

INSERT INTO `tbgenSolicitudServicio` (`id`, `fk_iID_USUA_DATOS`, `dFECHA_CREACION`, `fk_iID_ESP_SOL`, `vdesc_Estatus`, `dFECHA_CIERRE`, `iID_CASO`, `fk_iID_Contrato`) VALUES
(210, 3, '2014-11-10 00:00:00', 7, 'Culminado', '2015-02-18 16:24:56', '783489000002696002', 200),
(212, 11, '2014-11-20 00:00:00', 1, 'Culminado', '2014-12-07 10:49:36', '783489000002752002', 215),
(213, 12, '2014-11-20 00:00:00', 3, 'Culminado', '2014-11-20 20:36:08', '783489000002755002', 216),
(214, 9, '2014-11-21 00:00:00', 1, 'Culminado', '2015-02-18 16:27:28', '783489000002767002', 206),
(215, 9, '2014-11-21 00:00:00', 3, 'Culminado', '2015-02-18 16:25:36', '783489000002761004', 206),
(224, 3, '2014-11-30 00:00:00', 6, 'Culminado', '2015-02-18 16:27:20', '783489000002801002', 200),
(225, 3, '2014-12-01 00:00:00', 17, 'Culminado', '2015-02-18 16:27:35', '783489000002806124', 200),
(226, 3, '2014-12-03 00:00:00', 17, 'Culminado', '2015-02-18 16:28:02', '783489000002823002', 200);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tbgenSolServ_CalServ`
--

INSERT INTO `tbgenSolServ_CalServ` (`id`, `fk_iID_SOL`, `iCAL_SOl_PREG`, `iRESPUESTA`) VALUES
(1, 224, 1, 3),
(2, 224, 2, 5),
(3, 212, 1, 4),
(4, 212, 2, 3),
(5, 213, 1, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tbgenTipoSolicitud`
--

INSERT INTO `tbgenTipoSolicitud` (`id`, `vNOMBRE_TIPO_SOL`) VALUES
(1, 'Falla del Sistema'),
(2, 'Agregar Equipos'),
(3, 'Retirar Equipos'),
(4, 'Reubicación de Equipos'),
(5, 'Solicitar Reunión');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbrelTecnicoProyecto`
--

CREATE TABLE IF NOT EXISTS `tbrelTecnicoProyecto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dfecha` datetime NOT NULL,
  `descripcionCambioEst` varchar(200) NOT NULL,
  `fk_iID_tbdetTecnico` int(11) DEFAULT NULL,
  `fk_iID_tbdetPRoyecto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tbrelTecnicoProyecto_1` (`fk_iID_tbdetTecnico`),
  KEY `fk_tbrelTecnicoProyecto_2` (`fk_iID_tbdetPRoyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `formularioRelacion`
--
ALTER TABLE `formularioRelacion`
  ADD CONSTRAINT `FK_formularioRelacion` FOREIGN KEY (`fk_iID_idForm`) REFERENCES `formulario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_formularioRelacion_1` FOREIGN KEY (`fk_iID_idPreg`) REFERENCES `PreguntaForm` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `PersonaRelForm`
--
ALTER TABLE `PersonaRelForm`
  ADD CONSTRAINT `FK_PersonaRelForm_1` FOREIGN KEY (`id_persona`) REFERENCES `PersonaPotencial` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PersonaRelForm_2` FOREIGN KEY (`id_formul`) REFERENCES `formulario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `PersonaRespuesta`
--
ALTER TABLE `PersonaRespuesta`
  ADD CONSTRAINT `fk_PersonaRespuesta_1` FOREIGN KEY (`id_RelForm`) REFERENCES `PersonaRelForm` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PersonaRespuesta_2` FOREIGN KEY (`id_Preg`) REFERENCES `PreguntaForm` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PersonaRespuesta_3` FOREIGN KEY (`id_Resp`) REFERENCES `RespuestaForm` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `PregRespRel`
--
ALTER TABLE `PregRespRel`
  ADD CONSTRAINT `FK_PregRespRel_1` FOREIGN KEY (`id_preg`) REFERENCES `PreguntaForm` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_PregRespRel_2` FOREIGN KEY (`id_resp`) REFERENCES `RespuestaForm` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbdetAlmacenista`
--
ALTER TABLE `tbdetAlmacenista`
  ADD CONSTRAINT `fk_tbdetAlmacenista_1` FOREIGN KEY (`fk_iID_USUA_DATOSALM`) REFERENCES `tbdetUsuarioDatos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbdetContratoRif`
--
ALTER TABLE `tbdetContratoRif`
  ADD CONSTRAINT `RIF` FOREIGN KEY (`fk_iRIF`) REFERENCES `tbdetEmpresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbdetCotizacion`
--
ALTER TABLE `tbdetCotizacion`
  ADD CONSTRAINT `fk_tbdetCotizacion_1` FOREIGN KEY (`fk_iID_EstatusInstalacion`) REFERENCES `tbdetEstatusInstalacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbdetCotizacion_Cont` FOREIGN KEY (`tbdetCotizacioncol`) REFERENCES `tbdetContratoRif` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbdetDetalleUsuario`
--
ALTER TABLE `tbdetDetalleUsuario`
  ADD CONSTRAINT `fk_iID_SOL_DET` FOREIGN KEY (`fk_iID_SOL_USU`) REFERENCES `tbgenSolicitudServicio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbdetProyecto`
--
ALTER TABLE `tbdetProyecto`
  ADD CONSTRAINT `fk_tbdetProyecto_Cot` FOREIGN KEY (`fk_iCodCotizacion`) REFERENCES `tbdetCotizacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbdetProyecto_tbdetEstatusProyecto1` FOREIGN KEY (`fk_tbdetEstatusProyecto_id`) REFERENCES `tbdetEstatusProyecto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbdetrelAlmacenisProyecto`
--
ALTER TABLE `tbdetrelAlmacenisProyecto`
  ADD CONSTRAINT `fk_tbdetrelAlmacenisProyecto_1` FOREIGN KEY (`fk_iID_tbdetProyecto_Alm`) REFERENCES `tbdetProyecto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbdetrelAlmacenisProyecto_2` FOREIGN KEY (`fk_iID_tbdetAlmacenista`) REFERENCES `tbdetAlmacenista` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Filtros para la tabla `tbdetTecnico`
--
ALTER TABLE `tbdetTecnico`
  ADD CONSTRAINT `fk_tbdetTecnico_1` FOREIGN KEY (`fk_iID_USUA_DATOSTECN`) REFERENCES `tbdetUsuarioDatos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `FK_7881EAE71268C3A2` FOREIGN KEY (`fk_iID_USUA_DATOS`) REFERENCES `tbdetUsuarioDatos` (`id`),
  ADD CONSTRAINT `FK_7881EAE7151A144E` FOREIGN KEY (`fk_iID_ESP_SOL`) REFERENCES `tbgenEspecSolicitud` (`id`),
  ADD CONSTRAINT `tbgenSolicitudServicio_ibfk_4` FOREIGN KEY (`fk_iID_Contrato`) REFERENCES `tbdetUsuarioContrato` (`id`);

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

--
-- Filtros para la tabla `tbrelTecnicoProyecto`
--
ALTER TABLE `tbrelTecnicoProyecto`
  ADD CONSTRAINT `fk_tbrelTecnicoProyecto_1` FOREIGN KEY (`fk_iID_tbdetTecnico`) REFERENCES `tbdetTecnico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbrelTecnicoProyecto_2` FOREIGN KEY (`fk_iID_tbdetPRoyecto`) REFERENCES `tbdetProyecto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
