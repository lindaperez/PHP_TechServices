-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-10-2014 a las 14:34:43
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

--
-- Volcado de datos para la tabla `tbdetContratoRif`
--

INSERT INTO `tbdetContratoRif` (`id`, `pk_iNRO_CONTRATO`, `fk_iRIF`) VALUES
(1, 1402, 2),
(2, 1541, 1),
(3, 21478, 3),
(4, 3251, 3);

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

--
-- Volcado de datos para la tabla `tbdetEmpresa`
--

INSERT INTO `tbdetEmpresa` (`id`, `pk_iRIF`, `vDIRECCION_FISCAL`, `vNOMBRE`, `vRAZON_SOCIAL`) VALUES
(1, 'J000224200', 'V PPAL ZONA INDUSTRIAL STA ROSALIA LOCAL PARC', 'Industria Venezolana de InveGas Gas, SCA', 'No posee'),
(2, 'J305664293', 'AV ESTE I LOCAL NRO L-C4 ZONA INDUSTRIAL CLOR', 'Empaco Avicola', 'No posee'),
(3, 'J308125954', 'Urbanización Colinas de la California. Esquin', 'Parmalat', 'Industria Láctea Venezolana C.A. (INDULAC/PAR');

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

--
-- Volcado de datos para la tabla `tbdetUsuarioAcceso`
--

INSERT INTO `tbdetUsuarioAcceso` (`id`, `fk_iCI`, `fk_iID_ROL`, `fk_iID_ESTATUS`) VALUES
(1, 1, 4, 1),
(2, 2, 5, 2),
(3, 3, 5, 2),
(4, 4, 5, 3),
(5, 5, 5, 2),
(6, 6, 5, 2),
(7, 7, 5, 1),
(8, 8, 5, 2),
(9, 9, 5, 1),
(10, 10, 5, 1),
(11, 11, 5, 1),
(12, 12, 5, 1),
(13, 13, 5, 1),
(14, 14, 5, 2);

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
(70, 5, 1),
(153, 8, 1),
(154, 8, 2),
(155, 8, 3),
(156, 6, 1),
(160, 14, 1),
(161, 14, 2),
(162, 14, 3),
(163, 1, 3),
(164, 1, 1),
(165, 1, 2),
(166, 1, 4),
(167, 7, 1),
(168, 4, 3),
(169, 4, 1),
(170, 4, 2),
(171, 4, 4);

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
(14, 12888444, 'V-', 'Linda Rosmery', 'Pérez Peñaranda', 'rosmery.p.p@gmail.com', '2129511668', '4129511668', 'Especialista Estructuras', 'Control de Gestión de NEg', 'La castellana', 'uiXtikw1wjlg0eUfosWsMuJAdnkGVQ16NDqeiqDLJVgM3ADpNxm44ava+HBT5AS32Tr+1h04jKZWUGtmqMMw+Q==', '2014-10-11 00:00:00');

--
-- Volcado de datos para la tabla `tbgenCalidadServPreg`
--

INSERT INTO `tbgenCalidadServPreg` (`id`, `vPREGUNTA`) VALUES
(1, 'Indique su nivel de Satisfacción'),
(2, 'Trato del Tecnico');

--
-- Volcado de datos para la tabla `tbgenCalidadServResp`
--

INSERT INTO `tbgenCalidadServResp` (`id`, `vRESPUESTA`) VALUES
(1, 'Muy Malo'),
(2, 'Malo'),
(3, 'Medio'),
(4, 'Bueno'),
(5, 'Muy Bueno');

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

--
-- Volcado de datos para la tabla `tbgenDetalle`
--

INSERT INTO `tbgenDetalle` (`id`, `fk_iID_ESP_SOL`, `vDESCRIPCION`) VALUES
(7, 2, '< 6 CAMARAS'),
(8, 2, '6<= CAMARAS<=16'),
(9, 2, '>= 16 CAMARAS');

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

--
-- Volcado de datos para la tabla `tbgenEstatusRegistroUsu`
--

INSERT INTO `tbgenEstatusRegistroUsu` (`id`, `vDESCRIPCION`) VALUES
(1, 'Solicitud de Registro'),
(2, 'Solicitud Confirmada'),
(3, 'Solicitud Anulada');

--
-- Volcado de datos para la tabla `tbgenEstatusSolicitud`
--

INSERT INTO `tbgenEstatusSolicitud` (`id`, `vDESCRIPCION`) VALUES
(1, 'Culminado'),
(2, 'Detenido'),
(3, 'Abierto');

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

INSERT INTO `tbgenSolicitudServicio` (`id`, `fk_iID_USUA_DATOS`, `dFECHA_CREACION`, `fk_iID_ESP_SOL`, `fk_iID_ESTATUS`,`dFECHA_CIERRE`) VALUES
(123, 4, '2014-08-17 00:00:00', 1, 1,NULL),
(124, 4, '2014-08-18 00:00:00', 1, 3,NULL),
(125, 14, '2014-10-11 00:00:00', 3, 3,NULL),
(126, 14, '2014-10-11 00:00:00', 2, 1,NULL);

--
-- Volcado de datos para la tabla `tbgenSolServ_CalServ`
--

INSERT INTO `tbgenSolServ_CalServ` (`id`, `fk_iID_SOL`, `iCAL_SOl_PREG`, `iRESPUESTA`) VALUES
(11, 123, 1, 4),
(12, 123, 2, 2),
(13, 125, 1, 3),
(14, 125, 2, 5);

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
(2, 'Problemas de Facturación'),
(3, 'Retiro Total'),
(4, 'Retiro Parcial'),
(5, 'Reubicaciones'),
(6, 'Otros');

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
(12, 4, 3, '2014-10-11 14:09:04');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
