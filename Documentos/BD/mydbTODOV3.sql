-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-11-2014 a las 13:01:47
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=198 ;

--
-- Volcado de datos para la tabla `PersonaPotencial`
--

INSERT INTO `PersonaPotencial` (`id`, `vNOMBRE_COMPLETO`, `vTELEFONO`, `vCORREO_EMAIL`, `dFECHA_REGISTRO`) VALUES
(1, 'Linda Rosmery Perez Peñaranda', '04129511', 'rosmery', '2009-01-01 00:00:00'),
(2, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(3, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(4, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(5, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(6, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(7, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(8, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(9, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(10, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(11, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(12, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(13, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(14, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(15, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(16, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(17, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(18, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(19, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(20, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(21, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(22, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(23, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(24, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(25, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(26, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(27, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(28, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(29, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(30, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(31, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(32, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(33, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(34, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(35, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(36, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(37, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(38, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(39, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(40, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(41, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(42, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(43, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(44, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(45, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(46, 'Marina Pe;aranda', '02129551', 'sdf', '2009-01-01 00:00:00'),
(47, 'Mariana P', '02129551', 'ushdkfjlshdfkas', '2009-01-01 00:00:00'),
(48, 'Mariana P', '04129511', 'ushdkfjlshdfkas', '2009-01-01 00:00:00'),
(49, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(50, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(51, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(52, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(53, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(54, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(55, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(56, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(57, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(58, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(59, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(60, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(61, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(62, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(63, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(64, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(65, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(66, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(67, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(68, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(69, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(70, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(71, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(72, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(73, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(74, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(75, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(76, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(77, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(78, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(79, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(80, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(81, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(82, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(83, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(84, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(85, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(86, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(87, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(88, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(89, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(90, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(91, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(92, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(93, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(94, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(95, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(96, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(97, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(98, 'Alberto', 'aksfj', 'sldkfj', '2009-01-01 00:00:00'),
(99, 'yo', 'skdjf', 'lksdh', '2009-01-01 00:00:00'),
(100, 'yo', 'skdjf', 'lksdh', '2009-01-01 00:00:00'),
(101, 'yo', 'skdjf', 'lksdh', '2009-01-01 00:00:00'),
(102, 'yo', 'skdjf', 'lksdh', '2009-01-01 00:00:00'),
(103, 'yo', 'skdjf', 'lksdh', '2009-01-01 00:00:00'),
(104, 'yo', 'skdjf', 'lksdh', '2009-01-01 00:00:00'),
(105, 'yo', 'skdjf', 'lksdh', '2009-01-01 00:00:00'),
(106, 'yo', 'skdjf', 'lksdh', '2009-01-01 00:00:00'),
(107, 'yo', 'skdjf', 'lksdh', '2009-01-01 00:00:00'),
(108, 'yo', 'skdjf', 'lksdh', '2009-01-01 00:00:00'),
(109, 'yo', 'skdjf', 'lksdh', '2009-01-01 00:00:00'),
(110, 'yo', 'skdjf', 'lksdh', '2009-01-01 00:00:00'),
(111, 'yo', 'skdjf', 'lksdh', '2009-01-01 00:00:00'),
(112, 'yokjkjhk', 'skdjf', 'lksdh', '2009-01-01 00:00:00'),
(113, 'yokjkjhk', 'skdjf', 'lksdh', '2009-01-01 00:00:00'),
(114, 'yokjkjhk', 'skdjf', 'lksdh', '2009-01-01 00:00:00'),
(115, 'yokjkjhk', 'skdjf', 'lksdh', '2009-01-01 00:00:00'),
(116, 'yokjkjhk', 'skdjf', 'lksdh', '2009-01-01 00:00:00'),
(117, 'yokjkjhk', 'skdjf', 'lksdh', '2009-01-01 00:00:00'),
(118, 'yokjkjhk', 'skdjf', 'lksdh', '2009-01-01 00:00:00'),
(119, 'yokjkjhk', 'skdjf', 'lksdh', '2009-01-01 00:00:00'),
(120, 'yokjkjhk', 'skdjf', 'lksdh', '2009-01-01 00:00:00'),
(121, 'yokjkjhk', 'skdjf', 'lksdh', '2009-01-01 00:00:00'),
(122, 'akdfasd', 'jkshdkfjhsd', 'kjhskdfhj', '2009-01-01 00:00:00'),
(123, 'akdfasd', 'jkshdkfjhsd', 'kjhskdfhj', '2009-01-01 00:00:00'),
(124, 'akdfasd', 'jkshdkfjhsd', 'kjhskdfhj', '2009-01-01 00:00:00'),
(125, 'akdfasd', 'jkshdkfjhsd', 'kjhskdfhj', '2009-01-01 00:00:00'),
(126, 'akdfasd', 'jkshdkfjhsd', 'kjhskdfhj', '2009-01-01 00:00:00'),
(127, 'akdfasd', 'jkshdkfjhsd', 'kjhskdfhj', '2009-01-01 00:00:00'),
(128, 'akdfasd', 'jkshdkfjhsd', 'kjhskdfhj', '2009-01-01 00:00:00'),
(129, 'akdfasd', 'jkshdkfjhsd', 'kjhskdfhj', '2009-01-01 00:00:00'),
(130, 'kajflkj', 'ljzlsfj', 'ljdfl', '2009-01-01 00:00:00'),
(131, 'kajflkj', 'ljzlsfj', 'ljdfl', '2009-01-01 00:00:00'),
(132, 'kajflkj', 'ljzlsfj', 'ljdfl', '2009-01-01 00:00:00'),
(133, 'kajflkj', 'ljzlsfj', 'ljdfl', '2009-01-01 00:00:00'),
(134, 'Linda Rosmery Perez Peñaranda', '419511668', 'rosmery.p.p@gmail.com', '2009-01-01 00:00:00'),
(135, 'Linda Rosmery Perez Peñaranda', '419511668', 'rosmery.p.p@gmail.com', '2009-01-01 00:00:00'),
(136, 'Linda Rosmery Perez Peñaranda', '419511668', 'rosmery.p.p@gmail.com', '2009-01-01 00:00:00'),
(137, 'Linda Rosmery Perez Peñaranda', '419511668', 'rosmery.p.p@gmail.com', '2009-01-01 00:00:00'),
(138, 'Linda Rosmery Perez Peñaranda', '419511668', 'rosmery.p.p@gmail.com', '2009-01-01 00:00:00'),
(139, 'Prueba LEAD', '4129511668', 'rosmery.p.p@gmail.com', '2009-01-01 00:00:00'),
(140, 'Prueba LEAD', '4129511668', 'rosmery.p.p@gmail.com', '2009-01-01 00:00:00'),
(141, 'Prueba LEAD', '4129511668', 'rosmery.p.p@gmail.com', '2009-01-01 00:00:00'),
(142, 'Prueba LEAD2', '4129511668', 'rosmery.p.p@gmail.com', '2009-01-01 00:00:00'),
(143, 'Prueba LEAD3', '4129511668', 'rosmery.p.p@gmail.com', '2009-01-01 00:00:00'),
(144, 'Prueba LEAD4', '4129511668', 'rosmery.p.p@gmail.com', '2009-01-01 00:00:00'),
(145, 'Prueba LEAD5', '4129511668', 'rosmery.p.p@gmail.com', '2009-01-01 00:00:00'),
(146, 'Prueba LEAD6', '04129511668', 'rosmery.p.p@gmail.com', '2009-01-01 00:00:00'),
(147, 'Prueba LEAD6', '04129511668', 'rosmery.p.p@gmail.com', '2009-01-01 00:00:00'),
(148, 'Prueba LEAD6', '04129511668', 'rosmery.p.p@gmail.com', '2009-01-01 00:00:00'),
(149, 'Prueba LEAD6', '04129511668', 'rosmery.p.p@gmail.com', '2009-01-01 00:00:00'),
(150, 'Prueba LEAD6', '04129511668', 'rosmery.p.p@gmail.com', '2009-01-01 00:00:00'),
(151, 'Prueba LEAD 7', '4129511668', 'rosmery.p.p@gmail.com', '2009-01-01 00:00:00'),
(152, 'Prueba LEAD 7', '4129511668', 'rosmery.p.p@gmail.com', '2009-01-01 00:00:00'),
(153, 'Prueba LEAD 7', '4129511668', 'rosmery.p.p@gmail.com', '2009-01-01 00:00:00'),
(154, 'Prueba LEAD 7', '4129511668', 'rosmery.p.p@gmail.com', '2009-01-01 00:00:00'),
(155, 'Prueba LEAD 8', '4129511668', 'rosmery.p.p@gmail.com', '2009-01-01 00:00:00'),
(156, 'Prueba LEAD 10', '4129511668', 'rosmery.p.p@gmail.com', '2009-01-01 00:00:00'),
(157, 'Prueba LEAD 11', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-02 17:05:14'),
(158, 'Prueba LEAD 12', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-02 17:08:21'),
(159, 'Prueba LEAD 12', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-02 17:08:57'),
(160, 'Prueba LEAD 13', '02129551', 'rosmery.p.p@gmail.com', '2014-11-02 17:10:46'),
(161, 'Prueba LEAD 14', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-02 17:18:20'),
(162, 'Linda Rosmery Perez Peñaranda', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-02 17:32:47'),
(163, 'Ejemplo I', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-02 18:16:00'),
(164, 'sdkfj', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-03 21:20:08'),
(165, 'Ejemplo', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-03 21:27:37'),
(166, 'Ejemplo III', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-04 06:46:52'),
(167, 'Ejemplo IV', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-04 07:01:41'),
(168, 'Prueba LEAD', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-05 20:49:15'),
(169, 'Linda Rosmery Perez Peñar', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-05 21:02:58'),
(170, 'Linda Rosmery Perez Peñar', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-05 21:03:14'),
(171, 'Linda Rosmery Perez Peñar', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-05 21:03:24'),
(172, 'Linda Rosmery Perez Peñar', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-05 21:03:33'),
(173, 'Linda Rosmery Perez Peñar', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-05 21:03:49'),
(174, 'Linda Rosmery Perez Peñar', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-05 21:04:04'),
(175, 'Linda Rosmery Perez Peñar', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-05 21:04:29'),
(176, 'Linda Rosmery Perez Peñar', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-05 21:04:39'),
(177, 'Linda Rosmery Perez Peñar', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-05 21:05:07'),
(178, 'Linda Rosmery Perez Peñar', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-05 21:05:19'),
(179, 'Linda Rosmery Perez Peñar', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-05 21:06:47'),
(180, 'Linda Rosmery Perez Peñar', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-05 21:07:05'),
(181, 'Ejemplo VI', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-05 21:07:56'),
(182, 'Prueba LEAD', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-05 22:02:43'),
(183, 'Prueba LEAD', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-05 22:04:22'),
(184, 'Prueba LEAD', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-05 22:04:39'),
(185, 'Prueba LEAD', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-05 22:04:45'),
(186, 'Prueba LEAD', '4129511667', 'rosmery.p.p@gmail.com', '2014-11-05 22:05:27'),
(187, 'Prueba LEAD', '4129511667', 'rosmery.p.p@gmail.com', '2014-11-05 22:06:30'),
(188, 'Prueba LEAD', '4129511667', 'rosmery.p.p@gmail.com', '2014-11-05 22:07:30'),
(189, 'Prueba LEAD', '4129511667', 'rosmery.p.p@gmail.com', '2014-11-05 22:10:04'),
(190, 'Prueba LEAD', '4129511667', 'rosmery.p.p@gmail.com', '2014-11-05 22:16:52'),
(191, 'Prueba', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-05 22:18:26'),
(192, 'Prueba', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-05 22:18:26'),
(193, 'Prueba', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-05 22:20:01'),
(194, 'Prueba LEAD', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-05 22:27:51'),
(195, 'Prueba LEAD', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-05 22:27:59'),
(196, 'Nombre Usuario', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-05 22:36:01'),
(197, 'Nombre de usuario', '4129511668', 'rosmery.p.p@gmail.com', '2014-11-05 22:42:47');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=198 ;

--
-- Volcado de datos para la tabla `PersonaRelForm`
--

INSERT INTO `PersonaRelForm` (`id`, `id_persona`, `id_formul`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 11, 1),
(12, 12, 1),
(13, 13, 1),
(14, 14, 1),
(15, 15, 1),
(16, 16, 1),
(17, 17, 1),
(18, 18, 1),
(19, 19, 1),
(20, 20, 1),
(21, 21, 1),
(22, 22, 1),
(23, 23, 1),
(24, 24, 1),
(25, 25, 1),
(26, 26, 1),
(27, 27, 1),
(28, 28, 1),
(29, 29, 1),
(30, 30, 1),
(31, 31, 1),
(32, 32, 1),
(33, 33, 1),
(34, 34, 1),
(35, 35, 1),
(36, 36, 1),
(37, 37, 1),
(38, 38, 1),
(39, 39, 1),
(40, 40, 1),
(41, 41, 1),
(42, 42, 1),
(43, 43, 1),
(44, 44, 1),
(45, 45, 1),
(46, 46, 1),
(47, 47, 1),
(48, 48, 1),
(49, 49, 1),
(50, 50, 1),
(51, 51, 1),
(52, 52, 1),
(53, 53, 1),
(54, 54, 1),
(55, 55, 1),
(56, 56, 1),
(57, 57, 1),
(58, 58, 1),
(59, 59, 1),
(60, 60, 1),
(61, 61, 1),
(62, 62, 1),
(63, 63, 1),
(64, 64, 1),
(65, 65, 1),
(66, 66, 1),
(67, 67, 1),
(68, 68, 1),
(69, 69, 1),
(70, 70, 1),
(71, 71, 1),
(72, 72, 1),
(73, 73, 1),
(74, 74, 1),
(75, 75, 1),
(76, 76, 1),
(77, 77, 1),
(78, 78, 1),
(79, 79, 1),
(80, 80, 1),
(81, 81, 1),
(82, 82, 1),
(83, 83, 1),
(84, 84, 1),
(85, 85, 1),
(86, 86, 1),
(87, 87, 1),
(88, 88, 1),
(89, 89, 1),
(90, 90, 1),
(91, 91, 1),
(92, 92, 1),
(93, 93, 1),
(94, 94, 1),
(95, 95, 1),
(96, 96, 1),
(97, 97, 1),
(98, 98, 1),
(99, 99, 1),
(100, 100, 1),
(101, 101, 1),
(102, 102, 1),
(103, 103, 1),
(104, 104, 1),
(105, 105, 1),
(106, 106, 1),
(107, 107, 1),
(108, 108, 1),
(109, 109, 1),
(110, 110, 1),
(111, 111, 1),
(112, 112, 1),
(113, 113, 1),
(114, 114, 1),
(115, 115, 1),
(116, 116, 1),
(117, 117, 1),
(118, 118, 1),
(119, 119, 1),
(120, 120, 1),
(121, 121, 1),
(122, 122, 1),
(123, 123, 1),
(124, 124, 1),
(125, 125, 1),
(126, 126, 1),
(127, 127, 1),
(128, 128, 1),
(129, 129, 1),
(130, 130, 1),
(131, 131, 1),
(132, 132, 1),
(133, 133, 1),
(134, 134, 1),
(135, 135, 1),
(136, 136, 1),
(137, 137, 1),
(138, 138, 1),
(139, 139, 1),
(140, 140, 1),
(141, 141, 1),
(142, 142, 1),
(143, 143, 1),
(144, 144, 1),
(145, 145, 1),
(146, 146, 1),
(147, 147, 1),
(148, 148, 1),
(149, 149, 1),
(150, 150, 1),
(151, 151, 1),
(152, 152, 1),
(153, 153, 1),
(154, 154, 1),
(155, 155, 1),
(156, 156, 1),
(157, 157, 1),
(158, 158, 1),
(159, 159, 1),
(160, 160, 1),
(161, 161, 1),
(162, 162, 1),
(163, 163, 1),
(164, 164, 1),
(165, 165, 1),
(166, 166, 1),
(167, 167, 1),
(168, 168, 1),
(169, 169, 1),
(170, 170, 1),
(171, 171, 1),
(172, 172, 1),
(173, 173, 1),
(174, 174, 1),
(175, 175, 1),
(176, 176, 1),
(177, 177, 1),
(178, 178, 1),
(179, 179, 1),
(180, 180, 1),
(181, 181, 1),
(182, 182, 1),
(183, 183, 1),
(184, 184, 1),
(185, 185, 1),
(186, 186, 1),
(187, 187, 1),
(188, 188, 1),
(189, 189, 1),
(190, 190, 1),
(191, 191, 1),
(192, 192, 1),
(193, 193, 1),
(194, 194, 1),
(195, 195, 1),
(196, 196, 1),
(197, 197, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=440 ;

--
-- Volcado de datos para la tabla `PersonaRespuesta`
--

INSERT INTO `PersonaRespuesta` (`id`, `id_RelForm`, `id_Preg`, `id_Resp`) VALUES
(1, 133, 1, 5),
(2, 133, 1, 10),
(3, 133, 2, 11),
(4, 133, 2, 14),
(5, 133, 3, 15),
(6, 134, 1, 7),
(7, 134, 1, 7),
(8, 134, 1, 7),
(9, 134, 1, 7),
(10, 134, 1, 7),
(11, 134, 2, 13),
(12, 134, 1, 7),
(13, 134, 1, 7),
(14, 134, 1, 7),
(15, 134, 1, 7),
(16, 134, 1, 7),
(17, 134, 2, 14),
(18, 134, 1, 7),
(19, 134, 2, 14),
(20, 134, 1, 7),
(21, 134, 2, 14),
(22, 134, 1, 7),
(23, 134, 2, 14),
(24, 134, 1, 7),
(25, 134, 2, 14),
(26, 134, 1, 7),
(27, 134, 2, 13),
(28, 134, 3, 14),
(29, 135, 1, 2),
(30, 135, 1, 7),
(31, 135, 2, 13),
(32, 135, 3, 14),
(33, 135, 1, 2),
(34, 135, 1, 7),
(35, 135, 2, 13),
(36, 135, 3, 14),
(37, 135, 1, 1),
(38, 135, 1, 1),
(39, 135, 2, 1),
(40, 135, 3, 1),
(41, 135, 3, 1),
(42, 135, NULL, 1),
(43, 135, 1, 1),
(44, 135, 1, 1),
(45, 135, 2, 1),
(46, 135, 3, 1),
(47, 135, 3, 1),
(48, 135, NULL, 1),
(49, 135, 1, 1),
(50, 135, 1, 1),
(51, 135, 1, 1),
(52, 135, 2, 1),
(53, 135, 3, 1),
(54, 135, 3, 1),
(55, 135, NULL, 1),
(56, 135, 1, 1),
(57, 135, 1, 1),
(58, 135, 1, 1),
(59, 135, 2, 1),
(60, 135, 3, 1),
(61, 135, 3, 1),
(62, 135, NULL, 1),
(63, 135, 1, 1),
(64, 135, 1, 1),
(65, 135, 1, 1),
(66, 135, 2, 1),
(67, 135, 3, 1),
(68, 135, 3, 1),
(69, 135, NULL, 1),
(70, 135, 1, 1),
(71, 135, 1, 1),
(72, 135, 1, 1),
(73, 135, 2, 1),
(74, 135, 3, 1),
(75, 135, 3, 1),
(76, 135, NULL, 1),
(77, 135, 1, 1),
(78, 135, 1, 1),
(79, 135, 1, 1),
(80, 135, 2, 1),
(81, 135, 3, 1),
(82, 135, 3, 1),
(83, 135, NULL, 1),
(84, 135, 1, 1),
(85, 135, 1, 1),
(86, 135, 1, 1),
(87, 135, 2, 1),
(88, 135, 3, 1),
(89, 135, 3, 1),
(90, 135, NULL, 1),
(91, 135, 1, 1),
(92, 135, 1, 1),
(93, 135, 1, 1),
(94, 135, 2, 1),
(95, 135, 3, 1),
(96, 135, 3, 1),
(97, 135, NULL, 1),
(98, 136, 1, 1),
(99, 136, 1, 1),
(100, 136, 1, 1),
(101, 136, 2, 1),
(102, 136, 2, 1),
(103, 136, 3, 1),
(104, 136, 3, 1),
(105, 136, NULL, 1),
(106, 136, 1, 1),
(107, 136, 1, 1),
(108, 136, 1, 1),
(109, 136, 2, 1),
(110, 136, 2, 1),
(111, 136, 3, 1),
(112, 136, 3, 1),
(113, 136, NULL, 1),
(114, 137, 1, 1),
(115, 137, 1, 1),
(116, 137, 1, 1),
(117, 137, 2, 1),
(118, 137, 2, 1),
(119, 137, 3, 1),
(120, 137, 3, 1),
(121, 137, NULL, 1),
(122, 137, 1, 1),
(123, 137, 1, 1),
(124, 137, 1, 1),
(125, 137, 2, 1),
(126, 137, 2, 1),
(127, 137, 3, 1),
(128, 137, 3, 1),
(129, 137, NULL, 1),
(130, 137, 1, 1),
(131, 137, 1, 1),
(132, 137, 1, 1),
(133, 137, 2, 1),
(134, 137, 2, 1),
(135, 137, 3, 1),
(136, 137, 3, 1),
(137, 137, NULL, 1),
(138, 137, 1, 1),
(139, 137, 1, 1),
(140, 137, 1, 1),
(141, 137, 2, 1),
(142, 137, 2, 1),
(143, 137, 3, 1),
(144, 137, 3, 1),
(145, 137, NULL, 1),
(146, 137, 1, 1),
(147, 137, 1, 1),
(148, 137, 1, 1),
(149, 137, 2, 1),
(150, 137, 2, 1),
(151, 137, 3, 1),
(152, 137, 3, 1),
(153, 137, NULL, 1),
(154, 138, 1, 1),
(155, 138, 1, 1),
(156, 138, 1, 1),
(157, 138, 2, 1),
(158, 138, 2, 1),
(159, 138, 3, 1),
(160, 138, 3, 1),
(161, 138, NULL, 1),
(162, 138, 1, 1),
(163, 138, 1, 1),
(164, 138, 1, 1),
(165, 138, 2, 1),
(166, 138, 2, 1),
(167, 138, 3, 1),
(168, 138, 3, 1),
(169, 138, NULL, 1),
(170, 138, 1, 1),
(171, 138, 1, 1),
(172, 138, 1, 1),
(173, 138, 2, 1),
(174, 138, 2, 1),
(175, 138, 3, 1),
(176, 138, 3, 1),
(177, 138, NULL, 1),
(178, 138, 1, 1),
(179, 138, 1, 1),
(180, 138, 1, 1),
(181, 138, 2, 1),
(182, 138, 2, 1),
(183, 138, 3, 1),
(184, 138, 3, 1),
(185, 138, NULL, 1),
(186, 138, 1, 1),
(187, 138, 1, 1),
(188, 138, 1, 1),
(189, 138, 2, 1),
(190, 138, 2, 1),
(191, 138, 3, 1),
(192, 138, 3, 1),
(193, 138, NULL, 1),
(194, 138, 1, 2),
(195, 138, 1, 3),
(196, 138, 1, 7),
(197, 138, 2, 8),
(198, 138, 2, 13),
(199, 138, 3, 14),
(200, 138, 1, 2),
(201, 138, 1, 3),
(202, 138, 1, 7),
(203, 138, 2, 8),
(204, 138, 2, 13),
(205, 138, 3, 14),
(206, 138, 1, 2),
(207, 138, 1, 3),
(208, 138, 1, 7),
(209, 138, 2, 8),
(210, 138, 2, 13),
(211, 138, 3, 14),
(212, 138, 1, 2),
(213, 138, 1, 3),
(214, 138, 1, 7),
(215, 138, 2, 8),
(216, 138, 2, 13),
(217, 138, 3, 14),
(218, 138, 1, 1),
(219, 138, 1, 1),
(220, 138, 1, 1),
(221, 138, 2, 1),
(222, 138, 2, 1),
(223, 138, 3, 1),
(224, 138, 3, 1),
(225, 138, NULL, 1),
(226, 138, 1, 1),
(227, 138, 1, 1),
(228, 138, 1, 1),
(229, 138, 2, 1),
(230, 138, 2, 1),
(231, 138, 3, 1),
(232, 138, 3, 1),
(233, 138, NULL, 1),
(234, 138, 1, 1),
(235, 138, 1, 1),
(236, 138, 1, 1),
(237, 138, 2, 2),
(238, 138, 2, 2),
(239, 138, 3, 3),
(240, 138, 3, 3),
(241, 138, 1, 2),
(242, 138, 1, 3),
(243, 138, 1, 7),
(244, 138, 2, 8),
(245, 138, 2, 13),
(246, 138, 3, 14),
(247, 138, 1, 1),
(248, 138, 1, 1),
(249, 138, 1, 1),
(250, 138, 2, 1),
(251, 138, 2, 1),
(252, 138, 3, 1),
(253, 138, 3, 1),
(254, 138, NULL, 1),
(255, 138, 1, 1),
(256, 138, 1, 1),
(257, 138, 1, 1),
(258, 138, 2, 1),
(259, 138, 2, 1),
(260, 138, 3, 1),
(261, 138, 3, 1),
(262, 138, NULL, 1),
(263, 138, 1, 1),
(264, 138, 1, 1),
(265, 138, 1, 1),
(266, 138, 2, 1),
(267, 138, 2, 1),
(268, 138, 3, 1),
(269, 138, 3, 1),
(270, 138, NULL, 1),
(271, 138, 1, 1),
(272, 138, 1, 2),
(273, 138, 1, 3),
(274, 138, 2, 7),
(275, 138, 2, 8),
(276, 138, 3, 13),
(277, 138, 3, 14),
(278, 138, 1, 1),
(279, 138, 1, 2),
(280, 138, 1, 3),
(281, 138, 2, 7),
(282, 138, 2, 8),
(283, 138, 3, 13),
(284, 138, 3, 14),
(285, 139, 1, 1),
(286, 139, 2, 7),
(287, 139, 3, 13),
(288, 139, 1, 1),
(289, 139, 2, 7),
(290, 139, 3, 13),
(291, 139, 1, 1),
(292, 139, 2, 7),
(293, 139, 3, 13),
(294, 139, 1, 1),
(295, 139, 2, 7),
(296, 139, 3, 13),
(297, 140, 1, 1),
(298, 140, 2, 7),
(299, 140, 3, 13),
(300, 141, 1, 1),
(301, 141, 2, 7),
(302, 141, 3, 13),
(303, 142, 1, 1),
(304, 142, 2, 8),
(305, 142, 3, 13),
(306, 142, 1, 1),
(307, 142, 2, 8),
(308, 142, 3, 13),
(309, 142, 1, 1),
(310, 142, 2, 8),
(311, 142, 3, 13),
(312, 143, 1, 1),
(313, 143, 2, 11),
(314, 143, 3, 13),
(315, 143, 1, 1),
(316, 143, 2, 10),
(317, 143, 2, 11),
(318, 143, 3, 13),
(319, 144, 1, 1),
(320, 144, 2, 10),
(321, 144, 3, 13),
(322, 144, 1, 1),
(323, 144, 2, 10),
(324, 144, 3, 13),
(325, 145, 1, 1),
(326, 145, 2, 7),
(327, 145, 3, 13),
(328, 154, 1, 1),
(329, 154, 2, 7),
(330, 154, 3, 13),
(331, 155, 1, 1),
(332, 155, 2, 7),
(333, 155, 3, 13),
(334, 156, 1, 1),
(335, 156, 2, 7),
(336, 156, 3, 13),
(337, 157, 1, 1),
(338, 157, 2, 7),
(339, 157, 3, 13),
(340, 159, 1, 1),
(341, 159, 2, 7),
(342, 159, 3, 13),
(343, 160, 1, 1),
(344, 160, 2, 7),
(345, 160, 3, 13),
(346, 161, 1, 1),
(347, 161, 2, 7),
(348, 161, 2, 8),
(349, 161, 2, 10),
(350, 161, 3, 13),
(351, 161, 3, 14),
(352, 161, 3, 15),
(353, 161, 3, 16),
(354, 161, 1, 1),
(355, 161, 2, 7),
(356, 161, 2, 8),
(357, 161, 2, 10),
(358, 161, 3, 13),
(359, 161, 3, 14),
(360, 161, 3, 15),
(361, 161, 3, 16),
(362, 161, 1, 1),
(363, 161, 2, 7),
(364, 161, 2, 8),
(365, 161, 2, 10),
(366, 161, 3, 13),
(367, 161, 3, 14),
(368, 161, 3, 15),
(369, 161, 3, 16),
(370, 161, 1, 1),
(371, 161, 2, 7),
(372, 161, 2, 8),
(373, 161, 2, 10),
(374, 161, 3, 13),
(375, 161, 3, 14),
(376, 161, 3, 15),
(377, 161, 3, 16),
(378, 162, 1, 1),
(379, 162, 2, 8),
(380, 162, 3, 15),
(381, 162, 1, 1),
(382, 162, 2, 8),
(383, 162, 3, 15),
(384, 162, 1, 1),
(385, 162, 2, 8),
(386, 162, 3, 15),
(387, 162, 1, 1),
(388, 162, 2, 8),
(389, 162, 3, 15),
(390, 162, 1, 1),
(391, 162, 2, 8),
(392, 162, 3, 13),
(393, 162, 3, 15),
(394, 162, 1, 1),
(395, 162, 2, 8),
(396, 162, 3, 13),
(397, 162, 3, 15),
(398, 163, 1, 1),
(399, 163, 2, 7),
(400, 163, 3, 13),
(401, 166, 1, 3),
(402, 166, 2, 10),
(403, 166, 3, 15),
(404, 166, 1, 3),
(405, 166, 2, 10),
(406, 166, 3, 15),
(407, 181, 1, 1),
(408, 181, 2, 7),
(409, 181, 3, 13),
(410, 182, 1, 1),
(411, 182, 2, 7),
(412, 182, 3, 13),
(413, 188, 1, 2),
(414, 188, 2, 8),
(415, 188, 3, 13),
(416, 188, 1, 2),
(417, 188, 2, 8),
(418, 188, 3, 13),
(419, 189, 1, 2),
(420, 189, 2, 8),
(421, 189, 3, 14),
(422, 190, 1, 1),
(423, 190, 2, 7),
(424, 190, 3, 13),
(425, 193, 1, 1),
(426, 193, 2, 7),
(427, 193, 3, 13),
(428, 193, 1, 1),
(429, 193, 2, 7),
(430, 193, 3, 13),
(431, 195, 1, 1),
(432, 195, 2, 7),
(433, 195, 3, 13),
(434, 196, 1, 1),
(435, 196, 2, 7),
(436, 196, 3, 13),
(437, 197, 1, 1),
(438, 197, 2, 7),
(439, 197, 3, 13);

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
(1, 'Sistema Interesado:'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=210 ;

--
-- Volcado de datos para la tabla `tbdetUsuarioContrato`
--

INSERT INTO `tbdetUsuarioContrato` (`id`, `fk_iCI`, `fk_iNRO_CONTRATO`) VALUES
(200, 3, 1),
(203, 2, 1),
(209, 9, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `tbdetUsuarioDatos`
--

INSERT INTO `tbdetUsuarioDatos` (`id`, `pk_iCI`, `vTIPO_CI`, `vNOMBRE`, `vAPELLIDO`, `vCORREO_EMAIL`, `vTELF_LOCAL`, `vTELF_MOVIL`, `vCARGO`, `vDEPARTAMENTO`, `vSUCURSAL`, `vCLAVE`, `dFECHA_REGISTRO`) VALUES
(2, 18915761, 'V-', 'Vannesa', 'Vuolo', 'rosmery.p.p@gmail.com', '04129511668', '02122817569', 'Cargo Empleado', 'Departamento Empleado', 'Sucursal Empleado', 'sTUy363uEhB9HI6dVDAn7HTEVwetS7plYeqAozPJu30Ebhg713YZIDFYA9IIi/Wh84Yxxa3FYZXvliHoM0VLFg==', '2014-07-15 00:00:00'),
(3, 14333222, 'V-', 'Claudia', 'Vilarino', 'rosmery.p.p@gmail.com', '04129511668', '02122817569', 'Administrador', 'Departamento Administrado', 'Sucursal Administrador', 'poIiPG56+LXasb4u5oS5MH7ld5QxQTiTvhvtNhu+E/0eE6nf8a7pNK6O4nhQLgA6TRwRck3buFSgbgenLQ1yzw==', '2014-07-15 00:00:00'),
(9, 12833727, 'V-', 'Alina', 'Magan', 'rosmery.p.p@gmail.com', '2125547895', '4125589574', 'Cargo Cliente', 'dpto cliente', 'Sucursal Cliente', '7m9J/OCMO+5mE+Et2kGpWm2PwVlbJiY3swiAqjHPN/2v+wY6fEkYwZAcX7cuACjMnHOoq7fWd9lPkIw818GUMg==', '2014-10-04 00:00:00');

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
  `vDESCRIPCION` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `iID_CASO` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_iID_USUA_DATOS` (`fk_iID_USUA_DATOS`),
  KEY `fk_iID_TIPO_SOL` (`fk_iID_ESP_SOL`),
  KEY `iID_CASO` (`iID_CASO`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=216 ;

--
-- Volcado de datos para la tabla `tbgenSolicitudServicio`
--

INSERT INTO `tbgenSolicitudServicio` (`id`, `fk_iID_USUA_DATOS`, `dFECHA_CREACION`, `fk_iID_ESP_SOL`, `vdesc_Estatus`, `dFECHA_CIERRE`, `iID_CASO`) VALUES
(209, 3, '2014-11-09 00:00:00', 4, 'Abierto', NULL, 783489000002678048),
(210, 9, '2014-11-22 00:00:00', 6, 'Abierto', NULL, 783489000002766002),
(211, 9, '2014-11-22 00:00:00', 1, 'Abierto', NULL, 783489000002756072),
(212, 9, '2014-11-22 00:00:00', 6, 'Abierto', NULL, 783489000002764006),
(213, 9, '2014-11-22 00:00:00', 3, 'Abierto', NULL, 783489000002767002),
(214, 9, '2014-11-22 00:00:00', 7, 'Abierto', NULL, 783489000002762004),
(215, 9, '2014-11-22 00:00:00', 3, 'Abierto', NULL, 783489000002758019);

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
