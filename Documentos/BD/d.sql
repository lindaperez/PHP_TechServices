-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 26-11-2014 a las 21:57:23
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

--
-- Volcado de datos para la tabla `tbgenSolicitudServicio`
--
	
INSERT INTO `tbgenSolicitudServicio` (`id`, `fk_iID_USUA_DATOS`, `dFECHA_CREACION`, `fk_iID_ESP_SOL`, `vdesc_Estatus`, `dFECHA_CIERRE`, `iID_CASO`, `fk_iID_Contrato`) VALUES
(209, 3, '2014-11-09 00:00:00', 17, 'Culminado', '2014-11-19 10:10:13', 783489000002680090, 200),
(210, 3, '2014-11-10 00:00:00', 7, 'Abierto', NULL, 783489000002696002, 200),
(211, 9, '2014-11-17 00:00:00', 1, 'Detenido', NULL, 783489000002739002, 206),
(212, 11, '2014-11-20 00:00:00', 1, 'Por Levantamiento', NULL, 783489000002752002, 215),
(213, 12, '2014-11-20 00:00:00', 3, 'Culminado', '2014-11-20 20:36:08', 783489000002755002, 216),
(214, 9, '2014-11-21 00:00:00', 1, 'Abierto', NULL, 783489000002757002, 206),
(215, 9, '2014-11-21 00:00:00', 3, 'Abierto', NULL, 783489000002761004, 206),
(216, 9, '2014-11-21 00:00:00', 7, 'Abierto', NULL, 783489000002764002, 206);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
