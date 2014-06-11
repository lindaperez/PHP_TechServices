-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-06-2014 a las 09:49:11
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

--
-- Volcado de datos para la tabla `tbdetContratoRif`
--

INSERT INTO `tbdetContratoRif` (`id`, `pk_iNRO_CONTRATO`, `fk_iRIF`) VALUES
(1, 9834, 1),
(2, 1448, 1);

--
-- Volcado de datos para la tabla `tbdetDetalleUsuario`
--

INSERT INTO `tbdetDetalleUsuario` (`id`, `iID_DETALLE`, `vDETALLE`) VALUES
(1, 1, 1);

--
-- Volcado de datos para la tabla `tbdetEmpresa`
--

INSERT INTO `tbdetEmpresa` (`id`, `pk_iRIF`, `vDIRECCION_FISCAL`, `vNOMBRE`, `vRAZON_SOCIAL`) VALUES
(1, 'V189157681', 'MAKRO', 'sdasd', 'asdas'),
(2, 'V200337741', 'direc fiscal', 'Valerios Empresa', 'Al razon knxcvdssdf');

--
-- Volcado de datos para la tabla `tbdetUsuarioAcceso`
--

INSERT INTO `tbdetUsuarioAcceso` (`id`, `fk_iCI`, `fk_iID_ROL`, `fk_iID_ESTATUS`) VALUES
(1, 1, 4, 2);

--
-- Volcado de datos para la tabla `tbdetUsuarioContrato`
--

INSERT INTO `tbdetUsuarioContrato` (`id`, `fk_iCI`, `fk_iNRO_CONTRATO`) VALUES
(3, 1, 1),
(4, 1, 2);

--
-- Volcado de datos para la tabla `tbdetUsuarioDatos`
--

INSERT INTO `tbdetUsuarioDatos` (`id`, `pk_iCI`, `vTIPO_CI`, `vNOMBRE`, `vAPELLIDO`, `vCORREO_EMAIL`, `vTELF_LOCAL`, `vTELF_MOVIL`, `vCARGO`, `vDEPARTAMENTO`, `vSUCURSAL`, `vCLAVE`, `dFECHA_REGISTRO`) VALUES
(1, 18915768, 'V-', 'Linda', 'Perez', 'rosmery.p.p@gmail.com', '04129511668', '02122817569', 'Empleado Administrador', 'Departamento Empleado', 'Sucursal Empleado', 'TygtKmJ4JLAF+jrkE1G5ht9u9PH09QO7hqkWiaLttp61S1AS311OqtirizZUOtdfOmr6JMIkRcdHHaZiolHxsw==', '2014-05-02 00:00:00');

--
-- Volcado de datos para la tabla `tbgenDetalle`
--

INSERT INTO `tbgenDetalle` (`id`, `fk_iID_ESP_SOL`, `vDESCRIPCION`) VALUES
(1, 2, '>= 16 CAMARAS'),
(2, 2, '6<= CAMARAS<=16'),
(3, 2, '< 6 CAMARAS'),
(4, 5, '>= 16 CAMARAS'),
(5, 5, '6<= CAMARAS<=16'),
(6, 5, '< 6 CAMARAS');

--
-- Volcado de datos para la tabla `tbgenEspecSolicitud`
--

INSERT INTO `tbgenEspecSolicitud` (`id`, `vNOMBRE_ESP_SOL`, `fk_iID_ESP_SOL`) VALUES
(1, 'Nueva Localidad', 1),
(2, 'Camaras adicionales', 1),
(3, 'Sistema de Monitoreo', 1),
(4, 'Conexion a Internet', 1),
(5, 'Cambio de modelo de camaras', 2),
(6, 'Reubicaciones', 2),
(7, 'Notas de Credito', 4),
(8, 'Motivo B', 5);
(9, 'Motivo A', 5),
(10, 'Cierre de Localidad', 6),
(11, 'Costo del Servicio', 6),
(12, 'Servicio', 6),


--
-- Volcado de datos para la tabla `tbgenEstatusRegistroUsu`
--

INSERT INTO `tbgenEstatusRegistroUsu` (`id`, `vDESCRIPCION`) VALUES
(1, 'Solicitud de Registro'),
(2, 'Solicitud Confirmada'),
(3, 'Solicitud Anulada');

--
-- Volcado de datos para la tabla `tbgenFuncion`
--

INSERT INTO `tbgenFuncion` (`id`, `vDESCRIPCION`) VALUES
(1, 'MODULO 1'),
(2, 'MODULO 2');

--
-- Volcado de datos para la tabla `tbgenRol`
--

INSERT INTO `tbgenRol` (`id`, `vDESCRIPCION`, `fk_iTIPO_ROL`) VALUES
(3, 'Administrador', 1),
(4, 'Empleado', 1),
(5, 'Cliente', 2);

--
-- Volcado de datos para la tabla `tbgenSolicitudServicio`
--

INSERT INTO `tbgenSolicitudServicio` (`id`, `fk_iID_USUA_DATOS`, `fk_iID_DETALLE_USUARIO`, `dFECHA_CREACION`, `fk_iID_ESP_SOL`) VALUES
(1, NULL, NULL, '2009-01-01 00:00:00', NULL),
(2, NULL, NULL, '2009-01-01 00:00:00', NULL),


--
-- Volcado de datos para la tabla `tbgenTipoRol`
--

INSERT INTO `tbgenTipoRol` (`id`, `vDESCRIPCION`) VALUES
(1, 'Externo'),
(2, 'Interno');

--
-- Volcado de datos para la tabla `tbgenTipoSolicitud`
--

INSERT INTO `tbgenTipoSolicitud` (`id`, `vNOMBRE_TIPO_SOL`) VALUES
(1, 'Equipos Adicionales'),
(2, 'Actualizacion y Mantenimiento'),
(3, 'Problemas y mantenimiento'),
(4, 'Problemas en Facturacion'),
(5, 'Reunion'),
(6, 'Retiro Postal');

--
-- Volcado de datos para la tabla `tblogEstatusUsuario`
--

INSERT INTO `tblogEstatusUsuario` (`id`, `fk_iCI`, `fk_iID_ESTATUS`, `dFECHA_CAMBIO`) VALUES
(2, 1, 2, '2014-05-02 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
