-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-01-2019 a las 19:19:40
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

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
CREATE DATABASE IF NOT EXISTS `ryth` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ryth`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
CREATE TABLE IF NOT EXISTS `departamentos` (
  `idDepartamentos` int(11) NOT NULL,
  `dNombre` varchar(45) NOT NULL,
  `didEstaciones` int(11) NOT NULL,
  PRIMARY KEY (`idDepartamentos`),
  KEY `fk_Departamentos_Estaciones1_idx` (`didEstaciones`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `departamentos`
--

TRUNCATE TABLE `departamentos`;
--
-- Volcado de datos para la tabla `departamentos`
--

INSERT DELAYED IGNORE INTO `departamentos` (`idDepartamentos`, `dNombre`, `didEstaciones`) VALUES
(1, 'Informatica', 1),
(2, 'Servicios Generales', 1),
(3, 'Contraloria', 1),
(4, 'Administracion', 1),
(5, 'Almacen', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesc`
--

DROP TABLE IF EXISTS `detallesc`;
CREATE TABLE IF NOT EXISTS `detallesc` (
  `dscsolicitudCompra` int(11) NOT NULL,
  `dscCantidad` int(11) NOT NULL,
  `dscDescripcion` varchar(200) NOT NULL,
  `dscNombre` varchar(25) NOT NULL,
  KEY `fk_detalleSC_solicitudCompra1_idx` (`dscsolicitudCompra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `detallesc`
--

TRUNCATE TABLE `detallesc`;
--
-- Volcado de datos para la tabla `detallesc`
--

INSERT DELAYED IGNORE INTO `detallesc` (`dscsolicitudCompra`, `dscCantidad`, `dscDescripcion`, `dscNombre`) VALUES
(100, 2, 'compu nueva', 'Laptop'),
(100, 5, 'Nuevas sillas negras', 'Sillas'),
(100, 2, 'tdiuyfighj', 'Muebles'),
(100, 1, 'nueva', 'Compu'),
(100, 8, 'Nuevas blancas ahora', 'Sillas'),
(100, 10, 'dfgyhui', 'Sillas'),
(101, 8, 'oifboity', 'silla'),
(106, 8, 'Nuevas sillas negras', 'Sillas'),
(110, 5, 'Nuevas sillas negras', 'Sillas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallevs`
--

DROP TABLE IF EXISTS `detallevs`;
CREATE TABLE IF NOT EXISTS `detallevs` (
  `dvsvaleSalida` int(11) NOT NULL,
  `dscidsolicitudCompra` int(11) NOT NULL,
  `NoPartida` varchar(45) NOT NULL,
  `dvsCantidad` int(11) NOT NULL,
  `dvsUnidadMedida` varchar(15) NOT NULL,
  `dvsDescripcion` varchar(80) NOT NULL,
  `dvsCantidadEntregada` int(11) NOT NULL,
  KEY `fk_detalleVS_valeSalida1_idx` (`dvsvaleSalida`),
  KEY `fk_detalleVS_solicitudCompra1` (`dscidsolicitudCompra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `detallevs`
--

TRUNCATE TABLE `detallevs`;
--
-- Volcado de datos para la tabla `detallevs`
--

INSERT DELAYED IGNORE INTO `detallevs` (`dvsvaleSalida`, `dscidsolicitudCompra`, `NoPartida`, `dvsCantidad`, `dvsUnidadMedida`, `dvsDescripcion`, `dvsCantidadEntregada`) VALUES
(8, 1, '1234', 5, 'pocos', 'Nuevas sillas negras', 9),
(8, 1, '12345', 8, 'pocos', 'Nuevas sillas negras', 9),
(8, 1, '4567', 10, 'rfgh', '567uiok', 8),
(8, 1, '1', 10, 'pocos', 'nueva', 9),
(9, 1, '123457', 2, 'pocos', 'tdiuyfighj', 8),
(9, 1, '100', 9, 'muchos', 'ñiydvb', 3),
(11, 1, '12345', 5, 'pocos', 'Nuevas sillas negras', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estaciones`
--

DROP TABLE IF EXISTS `estaciones`;
CREATE TABLE IF NOT EXISTS `estaciones` (
  `idEstaciones` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Lugar` varchar(45) NOT NULL,
  PRIMARY KEY (`idEstaciones`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `estaciones`
--

TRUNCATE TABLE `estaciones`;
--
-- Volcado de datos para la tabla `estaciones`
--

INSERT DELAYED IGNORE INTO `estaciones` (`idEstaciones`, `Nombre`, `Lugar`) VALUES
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
  `scidsolicitudCompra` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_mobiliarioyequipo_Usuario1_idx` (`idUsuario`),
  KEY `fk_MobiliarioyEquipo_solicitudCompra1_idx` (`scidsolicitudCompra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `mobiliarioyequipo`
--

TRUNCATE TABLE `mobiliarioyequipo`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partes`
--

DROP TABLE IF EXISTS `partes`;
CREATE TABLE IF NOT EXISTS `partes` (
  `idPartes` int(11) NOT NULL,
  `pSerie` varchar(20) NOT NULL,
  `Tiene` enum('Si','No') NOT NULL,
  `Estado` enum('Bueno','Malo') DEFAULT NULL,
  `Observaciones` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idPartes`),
  KEY `fk_PartesCarro_vehiculos_idx` (`pSerie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `partes`
--

TRUNCATE TABLE `partes`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudcompra`
--

DROP TABLE IF EXISTS `solicitudcompra`;
CREATE TABLE IF NOT EXISTS `solicitudcompra` (
  `idsolicitudCompra` int(11) NOT NULL,
  `scAreaSolicita` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `scUsuario` int(11) NOT NULL,
  PRIMARY KEY (`idsolicitudCompra`),
  KEY `fk_solicitudCompra_Usuario1_idx` (`scUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `solicitudcompra`
--

TRUNCATE TABLE `solicitudcompra`;
--
-- Volcado de datos para la tabla `solicitudcompra`
--

INSERT DELAYED IGNORE INTO `solicitudcompra` (`idsolicitudCompra`, `scAreaSolicita`, `fecha`, `scUsuario`) VALUES
(1, 'informatica', '2019-01-15', 1),
(100, 'informatica', '2019-01-15', 1),
(101, 'Director Informatica', '2019-01-15', 1),
(102, 'Director Informatica', '2019-01-15', 1),
(103, 'Director Informatica', '2019-01-15', 1),
(104, 'Director Informatica', '2019-01-15', 1),
(105, 'Director Informatica', '2019-01-15', 1),
(106, 'Director Informatica', '2019-01-15', 1),
(107, 'Director Informatica', '2019-01-15', 1),
(108, 'Informatica', '2019-01-15', 1),
(109, 'Informatica', '2019-01-16', 1),
(110, 'Informatica', '2019-01-16', 1),
(111, 'Informatica', '2019-01-16', 1),
(112, 'Informatica', '2019-01-16', 1),
(113, 'Informatica', '2019-01-16', 1),
(114, 'Informatica', '2019-01-16', 1),
(115, 'Informatica', '2019-01-16', 1),
(116, 'Informatica', '2019-01-16', 1),
(117, 'Informatica', '2019-01-17', 1),
(118, 'Informatica', '2019-01-17', 1),
(119, 'Informatica', '2019-01-17', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `solicitudreparaciomov`
--

TRUNCATE TABLE `solicitudreparaciomov`;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `solicitudreparacionv`
--

TRUNCATE TABLE `solicitudreparacionv`;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `sotsbi`
--

TRUNCATE TABLE `sotsbi`;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `sotsbi_has_mobiliarioyequipo`
--

TRUNCATE TABLE `sotsbi_has_mobiliarioyequipo`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sotsbi_has_vehiculos`
--

DROP TABLE IF EXISTS `sotsbi_has_vehiculos`;
CREATE TABLE IF NOT EXISTS `sotsbi_has_vehiculos` (
  `SOTSBI_idSOTSBI` int(11) NOT NULL,
  `vSerie` varchar(20) NOT NULL,
  `Estado` varchar(15) NOT NULL,
  `MotivoBaja` varchar(15) NOT NULL,
  `Observaciones` varchar(100) NOT NULL,
  KEY `fk_SOTSBI_has_Vehiculos_Vehiculos1_idx` (`vSerie`),
  KEY `fk_SOTSBI_has_Vehiculos_SOTSBI1_idx` (`SOTSBI_idSOTSBI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `sotsbi_has_vehiculos`
--

TRUNCATE TABLE `sotsbi_has_vehiculos`;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `traspaso`
--

TRUNCATE TABLE `traspaso`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traspasovehiculos`
--

DROP TABLE IF EXISTS `traspasovehiculos`;
CREATE TABLE IF NOT EXISTS `traspasovehiculos` (
  `idTraspasoVehiculos` varchar(45) NOT NULL,
  `UsuarioProcedencia` int(11) NOT NULL,
  `UsuarioDestino` int(11) NOT NULL,
  `tvSerie` varchar(20) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`idTraspasoVehiculos`),
  KEY `fk_TraspasoVehiculos_Usuario1_idx` (`UsuarioProcedencia`),
  KEY `fk_TraspasoVehiculos_Usuario2_idx` (`UsuarioDestino`),
  KEY `fk_TraspasoVehiculos_Vehiculos1_idx` (`tvSerie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `traspasovehiculos`
--

TRUNCATE TABLE `traspasovehiculos`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL,
  `uidDepartamentos` int(11) NOT NULL,
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
  KEY `fk_Usuario_Departamentos1_idx` (`uidDepartamentos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `usuario`
--

TRUNCATE TABLE `usuario`;
--
-- Volcado de datos para la tabla `usuario`
--

INSERT DELAYED IGNORE INTO `usuario` (`idUsuario`, `uidDepartamentos`, `Nombre`, `Puesto`, `Calle`, `No`, `Col`, `Localidad`, `Telefono`, `Ext`, `Fax`, `E-mail`) VALUES
(1, 1, 'Dante', 'Director Informatica', 'S/C', 'S/N', 'S/C', 'S/L', 'S/N', 'NULL', 'NULL', 'NULL'),
(2, 2, 'Javier', 'Director Servicios Generlaes', 'S/C', 'S/N', 'S/C', 'S/L', 'S/N', 'NULL', 'NULL', 'NULL'),
(3, 3, 'Juan', 'Director Contraloria', 'S/C', 'S/N', 'S/C', 'S/L', 'S/N', 'NULL', 'NULL', 'NULL'),
(4, 4, 'Maria', 'Director Administracion', 'S/C', 'S/N', 'S/C', 'S/L', 'S/N', 'NULL', 'NULL', 'NULL'),
(5, 5, 'Luz', 'Director Almacen', 'S/C', 'S/N', 'S/N', 'S/L', 'S/N', 'NULL', 'NULL', 'NULL');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `usuariosistema`
--

TRUNCATE TABLE `usuariosistema`;
--
-- Volcado de datos para la tabla `usuariosistema`
--

INSERT DELAYED IGNORE INTO `usuariosistema` (`idUsuariosSistema`, `User`, `Password`, `idUsuario`) VALUES
(1, 'dante', '1234', 1),
(2, 'javier', '1234', 2),
(3, 'juan', '1234', 3),
(4, 'maria', '1234', 4),
(5, 'luz', '1234', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valesalida`
--

DROP TABLE IF EXISTS `valesalida`;
CREATE TABLE IF NOT EXISTS `valesalida` (
  `idvaleSalida` int(11) NOT NULL,
  `fecha` varchar(45) NOT NULL,
  `direccionSolicitante` varchar(45) NOT NULL,
  `solicita` varchar(45) NOT NULL,
  `autoriza` varchar(45) NOT NULL,
  `recibe` varchar(45) NOT NULL,
  `solicitaC` varchar(45) NOT NULL,
  `autorizaC` varchar(45) NOT NULL,
  `recibeC` varchar(45) NOT NULL,
  PRIMARY KEY (`idvaleSalida`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `valesalida`
--

TRUNCATE TABLE `valesalida`;
--
-- Volcado de datos para la tabla `valesalida`
--

INSERT DELAYED IGNORE INTO `valesalida` (`idvaleSalida`, `fecha`, `direccionSolicitante`, `solicita`, `autoriza`, `recibe`, `solicitaC`, `autorizaC`, `recibeC`) VALUES
(2, '2019-01-16', 'Informatica', 'dante', 'ING. ARMANDO PICHARDO IBARRA', 'maria', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Administracion'),
(3, '2019-01-16', 'Informatica', 'dante', 'ING. ARMANDO PICHARDO IBARRA', 'maria', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Administracion'),
(4, '2019-01-16', 'Informatica', 'dante', 'ING. ARMANDO PICHARDO IBARRA', 'maria', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Administracion'),
(5, '2019-01-16', 'Informatica', 'dante', 'ING. ARMANDO PICHARDO IBARRA', 'maria', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Administracion'),
(6, '2019-01-16', 'Informatica', 'dante', 'ING. ARMANDO PICHARDO IBARRA', 'maria', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Administracion'),
(7, '2019-01-16', 'Informatica', 'dante', 'ING. ARMANDO PICHARDO IBARRA', 'maria', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Administracion'),
(8, '2019-01-17', 'Informatica', 'dante', 'ING. ARMANDO PICHARDO IBARRA', 'maria', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Administracion'),
(9, '2019-01-17', 'Informatica', 'dante', 'ING. ARMANDO PICHARDO IBARRA', 'maria', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Administracion'),
(10, '2019-01-17', 'Informatica', 'dante', 'ING. ARMANDO PICHARDO IBARRA', 'maria', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Administracion'),
(11, '2019-01-17', 'Informatica', 'dante', 'ING. ARMANDO PICHARDO IBARRA', 'maria', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Administracion'),
(12, '2019-01-17', 'Informatica', 'dante', 'ING. ARMANDO PICHARDO IBARRA', 'maria', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Administracion');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncar tablas antes de insertar `vehiculos`
--

TRUNCATE TABLE `vehiculos`;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD CONSTRAINT `fk_Departamentos_Estaciones1` FOREIGN KEY (`didEstaciones`) REFERENCES `estaciones` (`idEstaciones`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detallesc`
--
ALTER TABLE `detallesc`
  ADD CONSTRAINT `fk_detalleSC_solicitudCompra1` FOREIGN KEY (`dscsolicitudCompra`) REFERENCES `solicitudcompra` (`idsolicitudCompra`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detallevs`
--
ALTER TABLE `detallevs`
  ADD CONSTRAINT `fk_detalleVS_solicitudCompra1` FOREIGN KEY (`dscidsolicitudCompra`) REFERENCES `solicitudcompra` (`idsolicitudCompra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalleVS_valeSalida1` FOREIGN KEY (`dvsvaleSalida`) REFERENCES `valesalida` (`idvaleSalida`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mobiliarioyequipo`
--
ALTER TABLE `mobiliarioyequipo`
  ADD CONSTRAINT `fk_MobiliarioyEquipo_solicitudCompra1` FOREIGN KEY (`scidsolicitudCompra`) REFERENCES `solicitudcompra` (`idsolicitudCompra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mobiliarioyequipo_Usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitudcompra`
--
ALTER TABLE `solicitudcompra`
  ADD CONSTRAINT `fk_solicitudCompra_Usuario1` FOREIGN KEY (`scUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sotsbi`
--
ALTER TABLE `sotsbi`
  ADD CONSTRAINT `fk_SOTSBI_Usuario1` FOREIGN KEY (`Solicitante`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SOTSBI_Usuario2` FOREIGN KEY (`Responsable`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Departamentos1` FOREIGN KEY (`uidDepartamentos`) REFERENCES `departamentos` (`idDepartamentos`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
