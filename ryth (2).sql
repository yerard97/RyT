-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 14-01-2019 a las 15:27:02
-- Versión del servidor: 5.7.23
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ryth`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
CREATE TABLE IF NOT EXISTS `departamentos` (
  `idDepartamentos` int(11) NOT NULL,
  `dNombre` varchar(45) NOT NULL,
  `idEstaciones` int(11) NOT NULL,
  PRIMARY KEY (`idDepartamentos`),
  KEY `fk_Departamentos_Estaciones1_idx` (`idEstaciones`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`idDepartamentos`, `dNombre`, `idEstaciones`) VALUES
(1, 'Informatica', 1),
(2, 'Servicios Generales', 1),
(3, 'Contraloria', 1),
(4, 'Administracion', 1),
(5, 'Almacen', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estaciones`
--

DROP TABLE IF EXISTS `estaciones`;
CREATE TABLE IF NOT EXISTS `estaciones` (
  `idEstaciones` int(11) NOT NULL,
  `eNombre` varchar(45) NOT NULL,
  `Lugar` varchar(45) NOT NULL,
  PRIMARY KEY (`idEstaciones`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estaciones`
--

INSERT INTO `estaciones` (`idEstaciones`, `eNombre`, `Lugar`) VALUES
(1, 'Radio y Television de Hidalgo', 'Pachuca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mobiliarioyequipo`
--

DROP TABLE IF EXISTS `mobiliarioyequipo`;
CREATE TABLE IF NOT EXISTS `mobiliarioyequipo` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `No.Inv.` varchar(15) NOT NULL,
  `Descripcion` varchar(60) NOT NULL,
  `Color` varchar(15) NOT NULL,
  `Material` varchar(15) NOT NULL,
  `Marca` varchar(15) NOT NULL,
  `Modelo` varchar(15) NOT NULL,
  `Serie` varchar(20) NOT NULL,
  `Tipo` varchar(15) NOT NULL,
  `Status` varchar(15) NOT NULL,
  `idFactura` varchar(12) NOT NULL,
  `FormaCompra` varchar(25) NOT NULL,
  `Origen` varchar(35) NOT NULL,
  `CostoCIVA` double NOT NULL,
  `CostoSIVA` double NOT NULL,
  `FechaCompra` date NOT NULL,
  `Observaciones` varchar(60) NOT NULL,
  `IVA` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_mobiliarioyequipo_Usuario1_idx` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partes`
--

DROP TABLE IF EXISTS `partes`;
CREATE TABLE IF NOT EXISTS `partes` (
  `idPartes` int(11) NOT NULL,
  `vehiculos_Serie` varchar(20) NOT NULL,
  `Tiene` enum('Si','No') NOT NULL,
  `Estado` enum('Bueno','Malo') DEFAULT NULL,
  `Observaciones` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPartes`),
  KEY `fk_PartesCarro_vehiculos_idx` (`vehiculos_Serie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudreparaciomov`
--

DROP TABLE IF EXISTS `solicitudreparaciomov`;
CREATE TABLE IF NOT EXISTS `solicitudreparaciomov` (
  `idtable1` int(11) NOT NULL,
  `Responsable` int(11) NOT NULL,
  `Solicitante` int(11) NOT NULL,
  `MobiliarioyEquipo_id` int(11) NOT NULL,
  `FechaIngreso` date NOT NULL,
  `FechaSalida` date DEFAULT NULL,
  PRIMARY KEY (`idtable1`),
  KEY `fk_SolicitudReparaciob_Usuario1_idx` (`Responsable`),
  KEY `fk_SolicitudReparaciob_Usuario2_idx` (`Solicitante`),
  KEY `fk_SolicitudReparaciob_MobiliarioyEquipo1_idx` (`MobiliarioyEquipo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudreparacionv`
--

DROP TABLE IF EXISTS `solicitudreparacionv`;
CREATE TABLE IF NOT EXISTS `solicitudreparacionv` (
  `idSolicitudReparacionV` int(11) NOT NULL,
  `Solicitante` int(11) NOT NULL,
  `Vehiculos_Serie` varchar(20) NOT NULL,
  `FechaIngreso` date NOT NULL,
  `FechaSalida` date DEFAULT NULL,
  `Taller` varchar(60) NOT NULL,
  `TelefonoTaller` varchar(15) NOT NULL,
  PRIMARY KEY (`idSolicitudReparacionV`),
  KEY `fk_SolicitudReparacionV_Usuario1_idx` (`Solicitante`),
  KEY `fk_SolicitudReparacionV_Vehiculos1_idx` (`Vehiculos_Serie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sotsbi`
--

DROP TABLE IF EXISTS `sotsbi`;
CREATE TABLE IF NOT EXISTS `sotsbi` (
  `idSOTSBI` int(11) NOT NULL,
  `Solicitante` int(11) NOT NULL,
  `Responsable` int(11) NOT NULL,
  `Codigo` varchar(10) NOT NULL,
  `Revision` varchar(5) NOT NULL,
  `NoSolicitud` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`idSOTSBI`),
  KEY `fk_SOTSBI_Usuario1_idx` (`Solicitante`),
  KEY `fk_SOTSBI_Usuario2_idx` (`Responsable`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sotsbi_has_mobiliarioyequipo`
--

DROP TABLE IF EXISTS `sotsbi_has_mobiliarioyequipo`;
CREATE TABLE IF NOT EXISTS `sotsbi_has_mobiliarioyequipo` (
  `SOTSBI_idSOTSBI` int(11) NOT NULL,
  `MobiliarioyEquipo_id` int(11) NOT NULL,
  `Estado` varchar(15) NOT NULL,
  `MotivoBaja` varchar(15) NOT NULL,
  `Observaciones` varchar(100) NOT NULL,
  KEY `fk_SOTSBI_has_MobiliarioyEquipo_MobiliarioyEquipo1_idx` (`MobiliarioyEquipo_id`),
  KEY `fk_SOTSBI_has_MobiliarioyEquipo_SOTSBI1_idx` (`SOTSBI_idSOTSBI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sotsbi_has_vehiculos`
--

DROP TABLE IF EXISTS `sotsbi_has_vehiculos`;
CREATE TABLE IF NOT EXISTS `sotsbi_has_vehiculos` (
  `SOTSBI_idSOTSBI` int(11) NOT NULL,
  `Vehiculos_Serie` varchar(20) NOT NULL,
  `Estado` varchar(15) NOT NULL,
  `MotivoBaja` varchar(15) NOT NULL,
  `Observaciones` varchar(100) NOT NULL,
  KEY `fk_SOTSBI_has_Vehiculos_Vehiculos1_idx` (`Vehiculos_Serie`),
  KEY `fk_SOTSBI_has_Vehiculos_SOTSBI1_idx` (`SOTSBI_idSOTSBI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traspaso`
--

DROP TABLE IF EXISTS `traspaso`;
CREATE TABLE IF NOT EXISTS `traspaso` (
  `idTraspaso` int(11) NOT NULL,
  `UsuarioPrecedencia` int(11) NOT NULL,
  `UsuarioDestino` int(11) NOT NULL,
  `MobiliarioyEquipo_id` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`idTraspaso`),
  KEY `fk_Traspaso_Usuario1_idx` (`UsuarioPrecedencia`),
  KEY `fk_Traspaso_Usuario2_idx` (`UsuarioDestino`),
  KEY `fk_Traspaso_MobiliarioyEquipo1_idx` (`MobiliarioyEquipo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traspasovehiculos`
--

DROP TABLE IF EXISTS `traspasovehiculos`;
CREATE TABLE IF NOT EXISTS `traspasovehiculos` (
  `idTraspasoVehiculos` varchar(45) NOT NULL,
  `UsuarioProcedencia` int(11) NOT NULL,
  `UsuarioDestino` int(11) NOT NULL,
  `Vehiculos_Serie` varchar(20) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`idTraspasoVehiculos`),
  KEY `fk_TraspasoVehiculos_Usuario1_idx` (`UsuarioProcedencia`),
  KEY `fk_TraspasoVehiculos_Usuario2_idx` (`UsuarioDestino`),
  KEY `fk_TraspasoVehiculos_Vehiculos1_idx` (`Vehiculos_Serie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL,
  `idDepartamentos` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Puesto` varchar(30) NOT NULL,
  `Calle` varchar(50) NOT NULL,
  `No` varchar(5) NOT NULL,
  `Col` varchar(25) NOT NULL,
  `Localidad` varchar(40) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Ext` varchar(8) DEFAULT NULL,
  `Fax` varchar(20) DEFAULT NULL,
  `E-mail` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `fk_Usuario_Departamentos1_idx` (`idDepartamentos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `idDepartamentos`, `Nombre`, `Puesto`, `Calle`, `No`, `Col`, `Localidad`, `Telefono`, `Ext`, `Fax`, `E-mail`) VALUES
(1, 1, 'Dante', 'Director Informatica', 'S/C', 'S/N', 'S/C', 'S/L', 'S/N', NULL, NULL, NULL),
(2, 2, 'Javier', 'Director Servicios Generlaes', 'S/C', 'S/N', 'S/C', 'S/L', 'S/N', NULL, NULL, NULL),
(3, 3, 'Juan', 'Director Contraloria', 'S/C', 'S/N', 'S/C', 'S/L', 'S/N', NULL, NULL, NULL),
(4, 4, 'Maria', 'Director Administracion', 'S/C', 'S/N', 'S/C', 'S/L', 'S/N', NULL, NULL, NULL),
(5, 5, 'Luz', 'Director Almacen', 'S/C', 'S/N', 'S/N', 'S/L', 'S/N', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosistema`
--

DROP TABLE IF EXISTS `usuariosistema`;
CREATE TABLE IF NOT EXISTS `usuariosistema` (
  `idUsuariosSistema` int(11) NOT NULL,
  `User` varchar(15) NOT NULL,
  `Password` varchar(15) DEFAULT NULL,
  `idUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idUsuariosSistema`),
  KEY `fk_UsuariosSistema_Usuario1_idx` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuariosistema`
--

INSERT INTO `usuariosistema` (`idUsuariosSistema`, `User`, `Password`, `idUsuario`) VALUES
(1, 'dante', '1234', 1),
(2, 'javier', '1234', 2),
(3, 'juan', '1234', 3),
(4, 'maria', '1234', 4),
(5, 'luz', '1234', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

DROP TABLE IF EXISTS `vehiculos`;
CREATE TABLE IF NOT EXISTS `vehiculos` (
  `Serie` varchar(20) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `Marca` varchar(10) NOT NULL,
  `Tipo` varchar(20) NOT NULL,
  `Modelo` varchar(4) NOT NULL,
  `Placas` varchar(15) NOT NULL,
  `No.Inv.` varchar(8) NOT NULL,
  `Motor` varchar(13) NOT NULL,
  `Color` varchar(15) NOT NULL,
  PRIMARY KEY (`Serie`),
  KEY `fk_vehiculos_Usuario1_idx` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD CONSTRAINT `fk_Departamentos_Estaciones1` FOREIGN KEY (`idEstaciones`) REFERENCES `estaciones` (`idEstaciones`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mobiliarioyequipo`
--
ALTER TABLE `mobiliarioyequipo`
  ADD CONSTRAINT `fk_mobiliarioyequipo_Usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `partes`
--
ALTER TABLE `partes`
  ADD CONSTRAINT `fk_PartesCarro_vehiculos` FOREIGN KEY (`vehiculos_Serie`) REFERENCES `vehiculos` (`Serie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitudreparaciomov`
--
ALTER TABLE `solicitudreparaciomov`
  ADD CONSTRAINT `fk_SolicitudReparaciob_MobiliarioyEquipo1` FOREIGN KEY (`MobiliarioyEquipo_id`) REFERENCES `mobiliarioyequipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SolicitudReparaciob_Usuario1` FOREIGN KEY (`Responsable`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SolicitudReparaciob_Usuario2` FOREIGN KEY (`Solicitante`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitudreparacionv`
--
ALTER TABLE `solicitudreparacionv`
  ADD CONSTRAINT `fk_SolicitudReparacionV_Usuario1` FOREIGN KEY (`Solicitante`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SolicitudReparacionV_Vehiculos1` FOREIGN KEY (`Vehiculos_Serie`) REFERENCES `vehiculos` (`Serie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sotsbi`
--
ALTER TABLE `sotsbi`
  ADD CONSTRAINT `fk_SOTSBI_Usuario1` FOREIGN KEY (`Solicitante`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SOTSBI_Usuario2` FOREIGN KEY (`Responsable`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sotsbi_has_mobiliarioyequipo`
--
ALTER TABLE `sotsbi_has_mobiliarioyequipo`
  ADD CONSTRAINT `fk_SOTSBI_has_MobiliarioyEquipo_MobiliarioyEquipo1` FOREIGN KEY (`MobiliarioyEquipo_id`) REFERENCES `mobiliarioyequipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SOTSBI_has_MobiliarioyEquipo_SOTSBI1` FOREIGN KEY (`SOTSBI_idSOTSBI`) REFERENCES `sotsbi` (`idSOTSBI`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sotsbi_has_vehiculos`
--
ALTER TABLE `sotsbi_has_vehiculos`
  ADD CONSTRAINT `fk_SOTSBI_has_Vehiculos_SOTSBI1` FOREIGN KEY (`SOTSBI_idSOTSBI`) REFERENCES `sotsbi` (`idSOTSBI`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SOTSBI_has_Vehiculos_Vehiculos1` FOREIGN KEY (`Vehiculos_Serie`) REFERENCES `vehiculos` (`Serie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `traspaso`
--
ALTER TABLE `traspaso`
  ADD CONSTRAINT `fk_Traspaso_MobiliarioyEquipo1` FOREIGN KEY (`MobiliarioyEquipo_id`) REFERENCES `mobiliarioyequipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Traspaso_Usuario1` FOREIGN KEY (`UsuarioPrecedencia`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Traspaso_Usuario2` FOREIGN KEY (`UsuarioDestino`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `traspasovehiculos`
--
ALTER TABLE `traspasovehiculos`
  ADD CONSTRAINT `fk_TraspasoVehiculos_Usuario1` FOREIGN KEY (`UsuarioProcedencia`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TraspasoVehiculos_Usuario2` FOREIGN KEY (`UsuarioDestino`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TraspasoVehiculos_Vehiculos1` FOREIGN KEY (`Vehiculos_Serie`) REFERENCES `vehiculos` (`Serie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Departamentos1` FOREIGN KEY (`idDepartamentos`) REFERENCES `departamentos` (`idDepartamentos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuariosistema`
--
ALTER TABLE `usuariosistema`
  ADD CONSTRAINT `fk_UsuariosSistema_Usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `fk_vehiculos_Usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
