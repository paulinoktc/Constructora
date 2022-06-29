-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-12-2014 a las 21:22:34
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `jps`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `idadmin` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(20) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`idadmin`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  UNIQUE KEY `alias` (`nick`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`idadmin`, `nick`, `nombre`, `password`) VALUES
(1, 'underground', 'Carlos Arrieta', 'hard'),
(5, 'chevo', 'Edgar Eusebio Mtz.', '6aed1a5ec8805e0715010ecd32304bbd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bolsatrabajo`
--

CREATE TABLE IF NOT EXISTS `bolsatrabajo` (
  `idbolsatrabajo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(14) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `curriculum` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `comentario` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idbolsatrabajo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE IF NOT EXISTS `imagen` (
  `idimagen` int(11) NOT NULL AUTO_INCREMENT,
  `proyecto_idproyecto` int(11) NOT NULL,
  `archivo` varchar(30) NOT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `presentacion` tinyint(4) NOT NULL,
  PRIMARY KEY (`idimagen`),
  KEY `fk_imagen_obra1_idx` (`proyecto_idproyecto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`idimagen`, `proyecto_idproyecto`, `archivo`, `titulo`, `presentacion`) VALUES
(1, 1, 'banrural 2_01.jpg', 'vista principal', 1),
(2, 1, 'banrural 2_02.jpg', 'vista n2 ', 1),
(3, 1, 'banrural 2_03.jpg', 'vista n3', 0),
(30, 2, 'banrural 6_01.jpg', 'banrural 6', 0),
(33, 4, 'melo No5_01.jpg', 'melo 01', 0),
(34, 4, 'melo No5_02.jpg', 'melo 02', 0),
(36, 5, 'patoni_01.jpg', 'patoni 01', 1),
(37, 5, 'patoni_02.jpg', 'patoni 02', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE IF NOT EXISTS `mensaje` (
  `idmensaje` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `email` varchar(25) NOT NULL,
  `mensaje` varchar(300) NOT NULL,
  `fecha` date NOT NULL,
  `verificado` tinyint(4) NOT NULL,
  PRIMARY KEY (`idmensaje`,`verificado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`idmensaje`, `nombre`, `telefono`, `email`, `mensaje`, `fecha`, `verificado`) VALUES
(3, 'Edgar Eusebio', '7891007855', 'chevito@hotmail.com', 'Buenas tardes, mi esposo Rodri y yo estamos pensando en conseguir un credito.', '2014-10-01', 1),
(5, 'test name', '7891009855', 'car_19.91@hotmail.com', 'test message', '2014-11-03', 1),
(6, 'underground01', '7891119855', 'car_19.91@hotmail.com', '01 tes de mensaje desde jps', '2014-11-03', 1),
(7, 'Eusebio Putichelli', '7891021185', 'chevo@xmail.com', 'Necesito una vivienda urgente, mi esposo se esta desesperando y se quiere divorciar.', '2014-11-10', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE IF NOT EXISTS `noticia` (
  `idnoticia` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`idnoticia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`idnoticia`, `titulo`, `fecha`, `descripcion`) VALUES
(1, 'Entrega de la casa Ruiz Cortínez.', '2014-10-02', 'EL día de hoy el Mvz, entregó una vivienda a la familia Martinez de la colonia Ruiz Cortinez.'),
(2, 'Inician Nuevas Construcciones', '2014-10-09', 'Se ha iniciado la construcción de nuevas obras en la colonia Banrural.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE IF NOT EXISTS `proyecto` (
  `idproyecto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `ubicacion` varchar(45) DEFAULT NULL,
  `costo` varchar(20) DEFAULT NULL,
  `dimensiones` int(20) DEFAULT NULL,
  `fechaTermino` date DEFAULT NULL,
  PRIMARY KEY (`idproyecto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`idproyecto`, `nombre`, `ubicacion`, `costo`, `dimensiones`, `fechaTermino`) VALUES
(1, 'Banrural 2', 'Colonia Banrural', '4444', 1200, '2014-10-12'),
(2, 'Banrural 6', 'Colonia Banrural', '40000', 800, '2014-07-11'),
(4, 'Melo No 5', 'Col. Las casitas', '60000', 1000, '2014-10-02'),
(5, 'Patoni', 'Col. Altamirano', '75000', 1500, '2014-10-16');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `fk_imagen_obra1` FOREIGN KEY (`proyecto_idproyecto`) REFERENCES `proyecto` (`idproyecto`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
