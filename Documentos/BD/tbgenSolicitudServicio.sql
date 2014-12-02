-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-11-2014 a las 20:44:02
-- Versión del servidor: 5.5.40
-- Versión de PHP: 5.5.19-1+deb.sury.org~precise+1

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
-- Estructura de tabla para la tabla `tbgenSolicitudServicio`
--

CREATE TABLE IF NOT EXISTS `tbgenSolicitudServicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_iID_USUA_DATOS` int(11) DEFAULT NULL,
  `dFECHA_CREACION` datetime NOT NULL,
  `fk_iID_ESP_SOL` int(11) DEFAULT NULL,
  `vdesc_Estatus` varchar(200) NOT NULL,
  `dFECHA_CIERRE` datetime DEFAULT NULL,
  `iID_CASO` bigint(20) NOT NULL,
  `fk_iID_Contrato` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iID_USUA_DATOS` (`fk_iID_USUA_DATOS`),
  KEY `fk_iID_TIPO_SOL` (`fk_iID_ESP_SOL`),
  KEY `iID_CASO` (`iID_CASO`),
  KEY `fk_iID_Contrato` (`fk_iID_Contrato`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=225 ;

--
-- Volcado de datos para la tabla `tbgenSolicitudServicio`
--

INSERT INTO `tbgenSolicitudServicio` (`id`, `fk_iID_USUA_DATOS`, `dFECHA_CREACION`, `fk_iID_ESP_SOL`, `vdesc_Estatus`, `dFECHA_CIERRE`, `iID_CASO`, `fk_iID_Contrato`) VALUES
(210, 3, '2014-11-10 00:00:00', 7, 'Asignado', '2014-11-21 17:06:29', 783489000002696002, 200),
(212, 11, '2014-11-20 00:00:00', 1, 'Por Levantamiento', '2014-11-22 16:37:32', 783489000002752002, 215),
(213, 12, '2014-11-20 00:00:00', 3, 'Culminado', '2014-11-20 20:36:08', 783489000002755002, 216),
(214, 9, '2014-11-21 00:00:00', 1, 'Abierto', '2014-11-22 10:49:51', 783489000002767002, 206),
(215, 9, '2014-11-21 00:00:00', 3, 'Abierto', '2014-11-30 15:39:35', 783489000002761004, 206),
(224, 3, '2014-11-30 00:00:00', 6, 'Abierto', '2014-11-30 20:34:17', 783489000002801002, 200);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbgenSolicitudServicio`
--
ALTER TABLE `tbgenSolicitudServicio`
  ADD CONSTRAINT `FK_7881EAE71268C3A2` FOREIGN KEY (`fk_iID_USUA_DATOS`) REFERENCES `tbdetUsuarioDatos` (`id`),
  ADD CONSTRAINT `FK_7881EAE7151A144E` FOREIGN KEY (`fk_iID_ESP_SOL`) REFERENCES `tbgenEspecSolicitud` (`id`),
  ADD CONSTRAINT `tbgenSolicitudServicio_ibfk_4` FOREIGN KEY (`fk_iID_Contrato`) REFERENCES `tbdetUsuarioContrato` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
