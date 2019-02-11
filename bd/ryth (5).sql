-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 11-02-2019 a las 22:58:50
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
  `didEstaciones` int(11) NOT NULL,
  PRIMARY KEY (`idDepartamentos`),
  KEY `fk_Departamentos_Estaciones1_idx` (`didEstaciones`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`idDepartamentos`, `dNombre`, `didEstaciones`) VALUES
(1, 'Informatica', 1),
(2, 'Servicios Generales', 1),
(3, 'Contraloria', 1),
(4, 'Administracion', 1),
(5, 'Almacen', 1),
(6, 'SUBDIRECCIÓN DE CONTENIDOS', 1);

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
-- Volcado de datos para la tabla `detallesc`
--

INSERT INTO `detallesc` (`dscsolicitudCompra`, `dscCantidad`, `dscDescripcion`, `dscNombre`) VALUES
(15, 6, 'hp full HD 1 mega 4k', 'computadora'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(11, 5, 'jklk', 'poi'),
(24, 3, 'hp full HD 1 mega 4k', 'computadora'),
(27, 4, 'hp full HD 1 mega 4k', 'computadora');

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
-- Volcado de datos para la tabla `detallevs`
--

INSERT INTO `detallevs` (`dvsvaleSalida`, `dscidsolicitudCompra`, `NoPartida`, `dvsCantidad`, `dvsUnidadMedida`, `dvsDescripcion`, `dvsCantidadEntregada`) VALUES
(2, 1, '123421', 5, 'litros', 'ghjk', 5),
(2, 1, '123422', 4, 'litros', 'hp full HD 1 mega 4k', 5),
(5, 1, '123421', 4, 'litros', 'sadfas', 5),
(6, 1, '123422', 3, 'litros', 'hp full HD 1 mega 4k', 5),
(13, 1, '123421', 3, 'litros', 'sadfas', 5),
(13, 1, '123421', 4, 'litros', 'hp full HD 1 mega 4k', 5),
(15, 1, '123422', 3, 'litros', 'sadfas', 5),
(16, 1, '123421', 4, 'litros', 'hp full HD 1 mega 4k', 5),
(16, 1, '123421', 3, 'litros', 'hp full HD 1 mega 4k', 5),
(17, 1, '123422', 3, 'litros', 'sadfas', 5),
(20, 1, '123422', 3, 'litros', 'hp full HD 1 mega 4k', 5),
(20, 1, '123422', 4, 'litros', 'hp full HD 1 mega 4k', 5),
(21, 1, '123421', 4, 'litros', 'hp full HD 1 mega 4k', 5),
(23, 1, '123421', 4, 'litros', 'hp full HD 1 mega 4k', 5),
(25, 1, '123422', 5, 'litros', 'hp full HD 1 mega 4k ***2', 5),
(26, 1, '123422', 3, 'litros', 'sadfas', 5),
(31, 1, '123', 4, 'litros', 'hp full HD 1 mega 4k', 5);

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
-- Volcado de datos para la tabla `estaciones`
--

INSERT INTO `estaciones` (`idEstaciones`, `Nombre`, `Lugar`) VALUES
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
-- Volcado de datos para la tabla `mobiliarioyequipo`
--

INSERT INTO `mobiliarioyequipo` (`id`, `idUsuario`, `No.Inv.`, `Descripcion`, `Color`, `Material`, `Marca`, `Modelo`, `Serie`, `Tipo`, `Status`, `idFactura`, `FormaCompra`, `Origen`, `CostoCIVA`, `CostoSIVA`, `FechaCompra`, `Observaciones`, `IVA`, `scidsolicitudCompra`) VALUES
(1, 1, '1', 'Bonita', 'Cafe', 'Madera', 'No tiene', 'No tiene', '1357', 'Silla', 'En servicio', '123456', 'Efectivo', '', 1234, 1231, '2050-01-21', '', '1234', NULL),
(2, 1, '2', 'dfcgvhbj', 'hjcgvhb', 'cgvhb', 'fcgvbh', 'gvhb', '246', 'sedxrcftv', 'fgh', '23456', 'cfgvhb', '', 5, 5, '2050-01-21', 'fcgvb', '7', NULL),
(3, 1, '3', 'Es nueva', 'Negra', 'Madera', 'No tiene', 'No tiene', '1256', 'Mesa', 'nueva', '1234', 'Efectivo', '', 1234, 1234, '2050-01-21', 'Es nueva', '16', NULL),
(4, 1, '4', 'Bonita', 'Negra', 'Madera', 'No tiene', 'No tiene', '3478', 'Silla', 'Fanciona', '123', 'Efectivo', ' ', 1234, 1234, '2059-01-21', 'Es nueva', '14', NULL),
(5, 1, '5', 'Fria', 'Blanca', 'Madera', 'No tien', 'No tiene', '1111', 'Escritorio', 'Reparacion', '2323', 'A pagos', ' ', 1234, 1234, '2050-01-21', 'Dinosaurio', '14', NULL),
(6, 1, '12', 'asd', 'zxc', 'zxc', 'asdas', 'asdas', '123', 'asd', 'baja', '123', 'A pagos', '', 12, 12, '2050-01-21', 'asd', '12', NULL);

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
-- Volcado de datos para la tabla `solicitudcompra`
--

INSERT INTO `solicitudcompra` (`idsolicitudCompra`, `scAreaSolicita`, `fecha`, `scUsuario`) VALUES
(1, 'Informatica', '2018-01-15', 1),
(2, 'Informatica', '2018-01-15', 1),
(3, 'Director Informatica', '2019-01-15', 1),
(4, 'Director Informatica', '2019-01-15', 1),
(5, 'Director Informatica', '2019-01-15', 1),
(6, 'Director Informatica', '2019-01-15', 1),
(7, 'Director Informatica', '2019-01-15', 1),
(8, 'Director Informatica', '2019-01-15', 1),
(9, 'Director Informatica', '2019-01-15', 1),
(10, 'Director Informatica', '2019-01-15', 1),
(11, 'Director Informatica', '2019-01-15', 1),
(12, 'Director Informatica', '2019-01-15', 1),
(13, 'Director Informatica', '2019-01-15', 1),
(14, 'Administracion', '2019-01-15', 1),
(15, 'Administracion', '2019-01-15', 1),
(16, 'Administracion', '2019-01-16', 1),
(17, 'Administracion', '2019-01-16', 1),
(18, 'Administracion', '2019-01-16', 1),
(19, 'Administracion', '2019-01-16', 1),
(20, 'Administracion', '2019-01-16', 1),
(21, 'Administracion', '2019-01-16', 1),
(22, 'Administracion', '2019-01-16', 1),
(23, 'Administracion', '2019-01-16', 1),
(24, 'Administracion', '2019-01-16', 1),
(25, 'Administracion', '2019-01-21', 1),
(26, 'Informatica', '2019-01-22', 1),
(27, 'Administracion', '2019-02-11', 1);

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
  `Observaciones` varchar(150) NOT NULL,
  PRIMARY KEY (`idSOTSBI`),
  KEY `fk_SOTSBI_Usuario1_idx` (`Solicitante`),
  KEY `fk_SOTSBI_Usuario2_idx` (`Responsable`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sotsbi`
--

INSERT INTO `sotsbi` (`idSOTSBI`, `Solicitante`, `Responsable`, `Codigo`, `Revision`, `NoSolicitud`, `Fecha`, `Observaciones`) VALUES
(1, 1, 7, 'RYTV201701', '1', 1, '2017-11-14', 'El equipo no tiene reparacion alguna ya que presento falla en tarjeta madre y procesador debido a sobre calentamiento');

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
  KEY `fk_SOTSBI_has_MobiliarioyEquipo_MobiliarioyEquipo1_idx` (`MobiliarioyEquipo_id`),
  KEY `fk_SOTSBI_has_MobiliarioyEquipo_SOTSBI1_idx` (`SOTSBI_idSOTSBI`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sotsbi_has_mobiliarioyequipo`
--

INSERT INTO `sotsbi_has_mobiliarioyequipo` (`SOTSBI_idSOTSBI`, `MobiliarioyEquipo_id`, `Estado`, `MotivoBaja`) VALUES
(1, 1, 'NO FUNCIONA', 'IRREPARABLE'),
(1, 2, 'NO FUNCIONA', 'IRREPARABLE'),
(1, 2, 'NO FUNCIONA', 'IRREPARABLE');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL,
  `uidDepartamentos` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Puesto` varchar(80) NOT NULL,
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
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `uidDepartamentos`, `Nombre`, `Puesto`, `Calle`, `No`, `Col`, `Localidad`, `Telefono`, `Ext`, `Fax`, `E-mail`) VALUES
(1, 1, 'Dante', 'Director Informatica', 'S/C', 'S/N', 'S/C', 'S/L', 'S/N', 'NULL', 'NULL', 'NULL'),
(2, 2, 'Javier', 'Director Servicios Generlaes', 'S/C', 'S/N', 'S/C', 'S/L', 'S/N', 'NULL', 'NULL', 'NULL'),
(3, 3, 'Juan', 'Director Contraloria', 'S/C', 'S/N', 'S/C', 'S/L', 'S/N', 'NULL', 'NULL', 'NULL'),
(4, 4, 'Maria', 'Director Administracion', 'S/C', 'S/N', 'S/C', 'S/L', 'S/N', 'NULL', 'NULL', 'NULL'),
(5, 5, 'Luz', 'Director Almacen', 'S/C', 'S/N', 'S/N', 'S/L', 'S/N', 'NULL', 'NULL', 'NULL'),
(6, 5, 'Ing. Armando Pichardo Ibarra ', 'Encargado de la coordinacion financiera y planeacion', 'S/C', 'S/N', 'S/N', 'S/L', 'S/N', NULL, NULL, NULL),
(7, 6, 'L.C.C. Omar Alejandro Paz Carrasco', 'Subdirector de Contenidos', 'CARRETERA MEXICO PACHUCA KM. 84.5', 'S/N', 'SECTOR PRIMARIO', 'PACHUCA DE SOTO HIDALGO', '0123456789', '9999', NULL, NULL);

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
-- Volcado de datos para la tabla `valesalida`
--

INSERT INTO `valesalida` (`idvaleSalida`, `fecha`, `direccionSolicitante`, `solicita`, `autoriza`, `recibe`, `solicitaC`, `autorizaC`, `recibeC`) VALUES
(1, '2019-01-16', 'Infromatica', 'dante', 'dante', 'dante', 'Director Informatica', 'Director Informatica', 'Director Informatica'),
(2, '2019-01-16', 'Administracion', 'Dante', 'ING. ARMANDO PICHARDO IBARRA', 'Dante', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Informatica'),
(3, '2019-01-17', 'Administracion', 'Dante', 'ING. ARMANDO PICHARDO IBARRA', 'Dante', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Informatica'),
(4, '2019-01-17', 'Administracion', 'Dante', 'ING. ARMANDO PICHARDO IBARRA', 'Dante', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Informatica'),
(5, '2019-01-17', 'Informatica', 'Dante', 'ING. ARMANDO PICHARDO IBARRA', 'Dante', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Informatica'),
(6, '2019-01-21', 'Administracion', 'Dante', 'ING. ARMANDO PICHARDO IBARRA', 'Dante', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Informatica'),
(7, '2019-01-21', '', '', 'ING. ARMANDO PICHARDO IBARRA', '', '', 'ENCARGADO DE LA DIR. COORD.', ''),
(8, '2019-01-21', '', '', 'ING. ARMANDO PICHARDO IBARRA', '', '', 'ENCARGADO DE LA DIR. COORD.', ''),
(9, '2019-01-21', '', '', 'ING. ARMANDO PICHARDO IBARRA', '', '', 'ENCARGADO DE LA DIR. COORD.', ''),
(10, '2019-01-21', 'Informatica', 'Dante', 'ING. ARMANDO PICHARDO IBARRA', 'Dante', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Informatica'),
(11, '2019-01-21', '', '', 'ING. ARMANDO PICHARDO IBARRA', '', '', 'ENCARGADO DE LA DIR. COORD.', ''),
(12, '2019-01-21', '', '', 'ING. ARMANDO PICHARDO IBARRA', '', '', 'ENCARGADO DE LA DIR. COORD.', ''),
(13, '2019-01-21', 'Administracion', 'Dante', 'ING. ARMANDO PICHARDO IBARRA', 'Dante', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Informatica'),
(14, '2019-01-21', '', '', 'ING. ARMANDO PICHARDO IBARRA', '', '', 'ENCARGADO DE LA DIR. COORD.', ''),
(15, '2019-01-21', 'Administracion', 'Dante', 'ING. ARMANDO PICHARDO IBARRA', 'Dante', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Informatica'),
(16, '2019-01-21', 'Informatica', 'Dante', 'ING. ARMANDO PICHARDO IBARRA', 'Dante', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Informatica'),
(17, '2019-01-21', 'Informatica', 'Dante', 'ING. ARMANDO PICHARDO IBARRA', 'Dante', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Informatica'),
(18, '2019-01-21', 'Informatica', 'Dante', 'ING. ARMANDO PICHARDO IBARRA', 'Dante', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Informatica'),
(19, '2019-01-21', '', '', 'ING. ARMANDO PICHARDO IBARRA', '', '', 'ENCARGADO DE LA DIR. COORD.', ''),
(20, '2019-01-21', 'Informatica', 'Dante', 'ING. ARMANDO PICHARDO IBARRA', 'Dante', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Informatica'),
(21, '2019-01-21', 'Administracion', 'Dante', 'ING. ARMANDO PICHARDO IBARRA', 'Dante', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Informatica'),
(22, '2019-01-21', 'Informatica', 'Dante', 'ING. ARMANDO PICHARDO IBARRA', 'Dante', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Informatica'),
(23, '2019-01-21', 'Informatica', 'Dante', 'ING. ARMANDO PICHARDO IBARRA', 'Dante', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Informatica'),
(24, '2019-01-21', 'Informatica', 'Dante', 'ING. ARMANDO PICHARDO IBARRA', 'Dante', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Informatica'),
(25, '2019-01-21', 'Administracion', 'Dante', 'ING. ARMANDO PICHARDO IBARRA', 'Dante', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Informatica'),
(26, '2019-01-21', 'Informatica', 'Dante', 'ING. ARMANDO PICHARDO IBARRA', 'Dante', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Informatica'),
(27, '2019-01-21', '', '', 'ING. ARMANDO PICHARDO IBARRA', '', '', 'ENCARGADO DE LA DIR. COORD.', ''),
(28, '2019-02-11', 'Administracion', 'Dante', 'ING. ARMANDO PICHARDO IBARRA', 'Dante', 'ghjkl', 'ENCARGADO DE LA DIR. COORD.', 'Director Informatica'),
(29, '2019-02-11', 'Administracion', 'Dante', 'ING. ARMANDO PICHARDO IBARRA', 'Dante', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Informatica'),
(30, '2019-02-11', 'Administracion', 'Dante', 'ING. ARMANDO PICHARDO IBARRA', 'Dante', 'gvbhnjmk,', 'ENCARGADO DE LA DIR. COORD.', 'Director Informatica'),
(31, '2019-02-11', 'Informatica', 'Dante', 'ING. ARMANDO PICHARDO IBARRA', 'Dante', 'Director Informatica', 'ENCARGADO DE LA DIR. COORD.', 'Director Informatica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `variablessistema`
--

DROP TABLE IF EXISTS `variablessistema`;
CREATE TABLE IF NOT EXISTS `variablessistema` (
  `idvs` int(11) NOT NULL,
  `NumeroResguardo` int(11) NOT NULL,
  PRIMARY KEY (`idvs`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `variablessistema`
--

INSERT INTO `variablessistema` (`idvs`, `NumeroResguardo`) VALUES
(1, 3);

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
-- Filtros para la tabla `partes`
--
ALTER TABLE `partes`
  ADD CONSTRAINT `fk_PartesCarro_vehiculos` FOREIGN KEY (`pSerie`) REFERENCES `vehiculos` (`Serie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `solicitudcompra`
--
ALTER TABLE `solicitudcompra`
  ADD CONSTRAINT `fk_solicitudCompra_Usuario1` FOREIGN KEY (`scUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_SOTSBI_has_Vehiculos_Vehiculos1` FOREIGN KEY (`vSerie`) REFERENCES `vehiculos` (`Serie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `fk_TraspasoVehiculos_Vehiculos1` FOREIGN KEY (`tvSerie`) REFERENCES `vehiculos` (`Serie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Departamentos1` FOREIGN KEY (`uidDepartamentos`) REFERENCES `departamentos` (`idDepartamentos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
