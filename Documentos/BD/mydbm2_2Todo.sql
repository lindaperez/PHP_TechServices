-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-10-2014 a las 11:29:05
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

--
-- Volcado de datos para la tabla `tbdetDetalleUsuario`
--

INSERT INTO `tbdetDetalleUsuario` (`id`, `vDETALLE`, `fk_iID_SOL_USU`) VALUES
(133, '02120206209', 123),
(134, 'rosmery.p.p@gmail.com', 123),
(135, 'Valentina Setaro', 123),
(136, '02120206209', 124),
(137, 'rosmery.p.p@gmail.com', 124),
(138, 'Ana Magan', 124),
(139, '6<= CAMARAS<=16', 126);

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

--
-- Volcado de datos para la tabla `tbdetRelTipoSol_CalidadServ`
--

INSERT INTO `tbdetRelTipoSol_CalidadServ` (`id`, `fk_iTIPO_SOl`, `fk_iCAL_SERV`) VALUES
(1, 1, 1),
(2, 2, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 1, 2),
(8, 2, 2),
(9, 3, 2),
(11, 4, 2),
(12, 5, 2),
(13, 6, 2),
(14, 3, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `tbdetUsuarioAcceso`
--

INSERT INTO `tbdetUsuarioAcceso` (`id`, `fk_iCI`, `fk_iID_ROL`, `fk_iID_ESTATUS`) VALUES
(1, 1, 4, 2),
(2, 2, 5, 2),
(3, 3, 5, 2),
(4, 4, 5, 3),
(5, 5, 5, 3),
(6, 6, 5, 2),
(7, 7, 5, 3),
(8, 8, 5, 2),
(9, 9, 5, 1),
(10, 10, 5, 1),
(11, 11, 5, 1),
(12, 12, 5, 1),
(13, 13, 5, 1),
(14, 14, 5, 2),
(15, 15, 3, 2),
(16, 16, 3, 2),
(17, 17, 3, 2),
(18, 19, 5, 3),
(19, 20, 5, 1),
(20, 21, 5, 3),
(21, 22, 5, 3),
(22, 23, 5, 3),
(23, 24, 5, 1),
(24, 25, 5, 1),
(25, 26, 5, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=197 ;

--
-- Volcado de datos para la tabla `tbdetUsuarioContrato`
--

INSERT INTO `tbdetUsuarioContrato` (`id`, `fk_iCI`, `fk_iNRO_CONTRATO`) VALUES
(53, 2, 2),
(54, 2, 1),
(55, 3, 1),
(56, 3, 2),
(63, 9, 1),
(64, 10, 2),
(65, 11, 2),
(66, 12, 2),
(67, 13, 2),
(153, 8, 1),
(154, 8, 2),
(155, 8, 3),
(156, 6, 1),
(160, 14, 1),
(161, 14, 2),
(162, 14, 3),
(168, 4, 3),
(169, 4, 1),
(170, 4, 2),
(171, 4, 4),
(172, 1, 3),
(173, 1, 1),
(174, 1, 2),
(175, 1, 4),
(176, 15, 1),
(177, 16, 1),
(178, 17, 1),
(179, 7, 1),
(183, 19, 1),
(184, 21, 1),
(186, 20, 1),
(191, 25, 1),
(192, 24, 1),
(193, 23, 1),
(194, 5, 1),
(195, 22, 1),
(196, 26, 1);

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
(1, 18915764, 'V-', 'Ana', 'Lopez', 'rosmery.p.p@gmail.com', '04129511668', '02122817569', 'Empleado Administrador', 'Departamento Empleado', 'Sucursal Empleado', '+ruuJv4HjyqIIXxeFsqkqUDLIV5V/g3Lc/0umFXH6NDm28zHwuq+yxcYT+IfoLuWN+tP9Jo3+ZJQMcDrd5Gr/A==', '2014-05-02 00:00:00'),
(2, 18915761, 'V-', 'Linda', 'Lobo', 'rosmery.p.p@gmail.com', '04129511668', '02122817569', 'Cargo', 'Departamento Cliente', 'Sucursal Cliente', 'EB2Qh7uKZAwaczf+Tglh9kLr8x9B5C10AUDXndCoeE/0leFYa0wCpt2mNZaRW/PrdPn6wy4hBin6n8rT0IU6xA==', '2014-07-15 00:00:00'),
(3, 18915762, 'V-', 'Claudia', 'Vilarino', 'rosmery.p.p@gmail.com', '04129511668', '02122817569', 'Cargo Cliente', 'Departamento Cliente', 'Sucursal Cliente', 'SfXbP4htmkQcEVUFRM1PU/RydTumj2SEIKiR7sA+FWHDxBvIk5yPlGqyjzGmhnhh5RrsdkudJES5XiQL8hLaSw==', '2014-07-15 00:00:00'),
(4, 18915763, 'V-', 'Cristina Angelica', 'Avila Mariño', 'rosmery.p.p@gmail.com', '02125548796', '04122817569', 'Administrador', 'Administrador', 'Administrador', 'lWp7WnlwgH9PA43YyGwvs5mQ2mhDQFojiySoxYHD26Knze+yF+Odpa00WWBhU9xbDug/Hzo43ebUgWioUPDlZw==', '2014-08-17 00:00:00'),
(5, 12833721, 'V-', 'Marina', 'Penaranda', 'rosmery.p.p@gmail.com', '2125547895', '4125589574', 'cargo Cliente', 'dpto cliente', 'Sucursal Cliente', 'ErGjRICl2D1zu8juI3zK20F1is2U+sETjeg0aDUie6Lhn51pxEKJNIaRNWfjmshgpWSjmrQFxwZbo2wbp8H74A==', '2014-10-04 00:00:00'),
(6, 12833722, 'V-', 'Marina', 'Penaranda', 'rosmery.p.p@gmail.com', '2125547895', '4125589574', 'cargo Cliente', 'dpto cliente', 'Sucursal Cliente', 'nW50us5noE9NdP1bjbZN+sE7cNK40UyJUo2EEdq6OUX14aUJBmI6LWhxrOl0bJ1i911GuqDwOICER8FuNZBp+w==', '2014-10-04 00:00:00'),
(7, 12833723, 'V-', 'Marina', 'Penaranda', 'rosmery.p.p@gmail.com', '2125547895', '4125589574', 'cargo Cliente', 'dpto cliente', 'Sucursal Cliente', 'KNgJzv9WeUDlaW7wLeaKGMLiXRZwHQEnNCAjH4v5MWSosAZlrWCJ8VWJo+hVmVN2oKq+rTgDQRwSIaLUKAq37Q==', '2014-10-04 00:00:00'),
(8, 12833724, 'V-', 'Marina', 'Penaranda', 'rosmery.p.p@gmail.com', '2125547895', '4125589574', 'cargo Cliente', 'dpto cliente', 'Sucursal Cliente', 'T5McrfeWo2Rx1OOWg3cRKxGlcs3wh1GMEDYmSaMYYL17QIKhU+Ec1SOu7hL2jylubSu6wpWZXETbVSAFRkw2Mg==', '2014-10-04 00:00:00'),
(9, 12833727, 'V-', 'Marina', 'Penaranda', 'rosmery.p.p@gmail.com', '2125547895', '4125589574', 'cargo Cliente', 'dpto cliente', 'Sucursal Cliente', 'RA1vNkSB9xcP4hsZWM+lLT7z/10kt3aMF3Jv8bnPyjiZt0ZvRcwcjJxh2J+/Eog8bfYDM6RR2OJxiVIjN0cPXQ==', '2014-10-04 09:25:15'),
(10, 5432599, 'V-', 'Alberto', 'perez', 'rosmery.p.p@gmail.com', '4121478596', '0000000000', 'cargo cliente alberto', 'Departamento Cliente albe', 'Sucursal Empleado', '7DJCrgC32ugxgXnHq0FkcLe1Bd23XPrgxlDQYrNt/0FeaYRjLbEGd4Y/wk70Uu3oevgRrj4XEwmGCZ4uV65wZQ==', '2014-10-04 09:34:19'),
(11, 5432598, 'V-', 'Alberto', 'perez', 'rosmery.p.p@gmail.com', '4121478596', '0000000000', 'cargo cliente alberto', 'Departamento Cliente albe', 'Sucursal Empleado', 'YunbX6uk8ALo/lJ8l+H99qn+dd05SBQFSKDD4l4qV/6n4gqEUNgW2deVALREDgOkpMnWTCI5YSKeila9gL49hA==', '2014-10-04 09:34:53'),
(12, 5432597, 'V-', 'Alberto', 'perez', 'rosmery.p.p@gmail.com', '4121478596', '0000000000', 'cargo cliente alberto', 'Departamento Cliente albe', 'Sucursal Empleado', 'PBJb3Xiw1pR4iTwvOXzWyIo/bmQlRyU9NNjX8iwE+up4neeSndipRZBblXv1onDG07BLpKgQCGu6psPDoCr9Pw==', '2014-10-04 09:34:57'),
(13, 5432596, 'V-', 'Alberto', 'perez', 'rosmery.p.p@gmail.com', '4121478596', '0000000000', 'cargo cliente alberto', 'Departamento Cliente albe', 'Sucursal Empleado', 'W5fwqsK8w4fUixPp+gvJ5pvYBDD3F8e1I5e1h7Y9cha5VOwtJLeXEUq3UN2rNW4XPoCl2VeaTpKMXPdvRpEYtA==', '2014-10-04 09:35:01'),
(14, 12888444, 'V-', 'Linda Rosmery', 'Pérez Peñaranda', 'rosmery.p.p@gmail.com', '2129511668', '4129511668', 'Especialista Estructuras', 'Control de Gestión de NEg', 'La castellana', 'uiXtikw1wjlg0eUfosWsMuJAdnkGVQ16NDqeiqDLJVgM3ADpNxm44ava+HBT5AS32Tr+1h04jKZWUGtmqMMw+Q==', '2014-10-11 00:00:00'),
(15, 14555444, 'V-', 'Admin', 'Admin', 'rosmery.p.p@gmail.com', '2129511668', '4129511668', 'Admin', 'Admin', 'Admin', 'zrZC+3LW+yTOPWm72J16AlUuDFv9Ey0T37K1jHJ4fWWmPOLSTzeYsyBSZgk5Zmvs5Ss8iMr+mQdgQPgp59wbKg==', '2014-10-11 21:38:57'),
(16, 14555445, 'V-', 'Admin', 'Admin', 'rosmery.p.p@gmail.com', '2129511668', '4129511668', 'Admin', 'Admin', 'Admin', 'rXEJCYvNkkEeDURBM7cVKuAUxnl5v3dWbSI4v4tYOgdAo5uDwKwCbwPd2EJiQ6pnCOkY74Ru3tq7z4FKoJPHTA==', '2014-10-11 21:41:00'),
(17, 14555446, 'V-', 'Admin', 'Admin', 'rosmery.p.p@gmail.com', '2129511668', '4129511668', 'Admin', 'Admin', 'Admin', 'YyKnFdovOHK6IV7jJT1i3xqicmyEBGBuPxhuzU7LJYSrn0i3O5EURWoNlC4mVS/xuCst/6elzJqt4D1Q1HBiYQ==', '2014-10-11 21:44:41'),
(19, 12833723, 'V-', 'sucu', 'sucu', 'rosmery.p.p@gmail.com', '2129511668', '02122817569', 'sucu', 'sucu', 'sucu', 'YUCdMEJUwwuosrp8a0Awe2D2zYVKKrOs3UrjyR0IGRYJT29i59xLlfQ1WhsSn8oyUDWurszyFwf+ah+bwuNO9w==', '2014-10-12 00:00:00'),
(20, 12833723, 'V-', 'sucu', 'sucu', 'rosmery.p.p@gmail.com', '2129511668', '02122817569', 'sucu', 'sucu', 'sucu', 'nuH22HrdFMPRaiTUsJhVtUGSE10qpepBm9+O+VwbBKeJu0i7+TpMHazLcQoX+q0qGXpVwaZDuYGcn1h2wPxiaQ==', '2014-10-12 00:00:00'),
(21, 12833723, 'V-', 'sucu', 'sucu', 'rosmery.p.p@gmail.com', '2129511668', '02122817569', 'sucu', 'sucu', 'sucu', 'SWr1FpH8Y6g8Odf3IFE25ar0w7ch5MqL1nqWkdb/3Ly5bWJ76lEXZr5S2nWjctSq6FfgJR5pWvXQ40ts9O1VMA==', '2014-10-12 00:00:00'),
(22, 12833723, 'V-', 'sucu', 'sucu', 'rosmery.p.p@gmail.com', '2129511668', '02122817569', 'sucu', 'sucu', 'sucu', '+3S4zQaW2JEMkYeuIimCrOt/8VAWW06vCdg2AUwBw4uT48tm3JQpugz9z0wFLzUPKPeQVDIm23/MO9TvU1c6Fw==', '2014-10-12 00:00:00'),
(23, 12833723, 'V-', 'sucu', 'sucu', 'rosmery.p.p@gmail.com', '2129511668', '02122817569', 'sucu', 'sucu', 'sucu', '3hWmL9p6EwWp9+vJyJd1qmzOlLNc5YwRsEcGnlOy4w67PRdlFuIcU0Fjf4kuMaCiolhPsrfSRdP8xi/A4DIZiA==', '2014-10-12 00:00:00'),
(24, 12833723, 'V-', 'sucu', 'sucu', 'rosmery.p.p@gmail.com', '2129511668', '02122817569', 'sucu', 'sucu', 'sucu', 'svNvz3C89BXYmwPQiKFhv1hHabBtu/tVJ9QRwCkSj5d+zRsS6jN3wxtYjWObAVyyhj3lS56cbnX5OpJ75fYo/w==', '2014-10-12 00:00:00'),
(25, 12833723, 'V-', 'sucu', 'sucu', 'rosmery.p.p@gmail.com', '2129511668', '02122817569', 'sucu', 'sucu', 'sucu', 'hDBGPHflh/ejj5dMbNI9jtpZPH+G/LzFh4F3Qlgj66hMeYeyvLf9bc32lEKdWOMoD4LyOU3HyQdQzdCRPQcm7Q==', '2014-10-12 00:00:00'),
(26, 12833723, 'V-', 'sucu', 'sucu', 'rosmery.p.p@gmail.com', '2129511668', '02122817569', 'sucu', 'sucu', 'sucu', 'M7Lv/vchfCjFMtJoGupgwpxSNX9thS4tnegglunyGViv/vsKlw1H0mVL1ihjmLnL4LHnCFY4evKJb6vuakuI2g==', '2014-10-12 10:37:44');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=127 ;

--
-- Volcado de datos para la tabla `tbgenSolicitudServicio`
--

INSERT INTO `tbgenSolicitudServicio` (`id`, `fk_iID_USUA_DATOS`, `dFECHA_CREACION`, `fk_iID_ESP_SOL`, `fk_iID_ESTATUS`, `dFECHA_CIERRE`) VALUES
(123, 4, '2014-08-17 00:00:00', 1, 2, NULL),
(124, 4, '2014-08-18 00:00:00', 1, 3, '2014-10-12 11:12:42'),
(125, 14, '2014-10-11 00:00:00', 3, 1, NULL),
(126, 14, '2014-10-11 00:00:00', 2, 1, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `tbgenSolServ_CalServ`
--

INSERT INTO `tbgenSolServ_CalServ` (`id`, `fk_iID_SOL`, `iCAL_SOl_PREG`, `iRESPUESTA`) VALUES
(11, 123, 1, 4),
(12, 123, 2, 4),
(13, 125, 1, 4),
(14, 125, 2, 3),
(15, 124, 2, 3),
(16, 124, 1, 3);

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
-- Volcado de datos para la tabla `tblogEstatusUsuario`
--

INSERT INTO `tblogEstatusUsuario` (`id`, `fk_iCI`, `fk_iID_ESTATUS`, `dFECHA_CAMBIO`) VALUES
(2, 1, 2, '2014-05-02 00:00:00'),
(3, 2, 2, '2014-07-26 10:49:05'),
(4, 3, 2, '2014-07-26 11:40:27'),
(5, 4, 2, '2014-08-17 11:22:48'),
(6, 5, 2, '2014-10-04 10:01:31'),
(7, 8, 2, '2014-10-11 10:46:44'),
(8, 6, 2, '2014-10-11 10:47:14'),
(9, 7, 2, '2014-10-11 10:47:50'),
(10, 1, 1, '2014-10-11 13:54:58'),
(11, 7, 1, '2014-10-11 13:55:14'),
(12, 4, 3, '2014-10-11 14:09:04'),
(13, 1, 2, '2014-10-11 17:27:44'),
(14, 7, 3, '2014-10-12 08:48:48'),
(15, 19, 3, '2014-10-12 09:46:45'),
(16, 21, 3, '2014-10-12 09:47:15'),
(17, 20, 3, '2014-10-12 09:48:18'),
(18, 20, 1, '2014-10-12 09:48:33'),
(19, 25, 1, '2014-10-12 10:34:38'),
(20, 24, 1, '2014-10-12 10:34:55'),
(21, 23, 3, '2014-10-12 10:35:11'),
(22, 5, 3, '2014-10-12 10:35:38'),
(23, 22, 3, '2014-10-12 10:36:20');

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
