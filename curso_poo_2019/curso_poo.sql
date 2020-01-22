-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 09, 2019 at 08:20 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `curso_poo`
--
CREATE DATABASE IF NOT EXISTS `curso_poo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `curso_poo`;

-- --------------------------------------------------------

--
-- Table structure for table `modulo`
--

CREATE TABLE IF NOT EXISTS `modulo` (
  `cod_mod` int(11) NOT NULL AUTO_INCREMENT,
  `nom_mod` varchar(50) NOT NULL,
  `des_mod` varchar(100) DEFAULT NULL,
  `url_mod` varchar(100) NOT NULL,
  `est_mod` char(1) NOT NULL,
  `fky_modulo` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_mod`),
  UNIQUE KEY `url_mod` (`url_mod`),
  KEY `fky_modulo` (`fky_modulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `modulo`
--

INSERT INTO `modulo` (`cod_mod`, `nom_mod`, `des_mod`, `url_mod`, `est_mod`, `fky_modulo`) VALUES
(3, 'Usuario', NULL, 'frontend/vista/usuario', 'A', NULL),
(5, 'Opcion', NULL, 'frontend/vista/opcion', 'A', NULL),
(6, 'Seguridad', NULL, 'frontend/vista/permiso', 'I', NULL),
(7, 'Modulo', NULL, 'frontend/vista/modulo', 'A', NULL),
(14, 'prueba', NULL, 'prueba', 'I', 3),
(16, 'Reportes', NULL, 'frontend/vista/reporte', 'A', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `opcion`
--

CREATE TABLE IF NOT EXISTS `opcion` (
  `cod_opc` int(11) NOT NULL AUTO_INCREMENT,
  `nom_opc` varchar(50) NOT NULL,
  `des_opc` varchar(100) NOT NULL,
  `url_opc` varchar(100) NOT NULL,
  `fky_modulo` int(11) NOT NULL,
  `est_opc` char(1) NOT NULL,
  PRIMARY KEY (`cod_opc`),
  UNIQUE KEY `url_opc` (`url_opc`),
  KEY `fky_modulo` (`fky_modulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `opcion`
--

INSERT INTO `opcion` (`cod_opc`, `nom_opc`, `des_opc`, `url_opc`, `fky_modulo`, `est_opc`) VALUES
(1, 'Guardar Usuario', 'Formulario guardar', 'guardar_usuario.php', 3, 'A'),
(2, 'Listar usuario', 'Formulario listar ', 'listar_usuario.php', 3, 'A'),
(3, 'Filtrar  usuario', 'Formulario listar usuario', 'form_filtrar_usuario.php', 3, 'A'),
(4, 'Gestionar Usuario', 'Formulario listar usuario', 'filtrar_usuario.php', 3, 'A'),
(5, 'Editar  usuario', '', 'editar_usuario.php', 3, 'A'),
(6, 'Guardar modulo', '', 'guardar_modulo.php', 7, 'A'),
(7, 'Listar modulo', '', 'listar_modulo.php', 7, 'A'),
(8, 'Formulario listar modulo', '', 'filtrar_modulo.php', 7, 'A'),
(9, 'Formulario Listar Modulo', '', 'filtrar_modulo_reporte.php', 7, 'A'),
(10, 'Editar modulo', '', 'editar_modulo.php', 7, 'A'),
(11, 'Guardar opcion', '', 'guardar_opcion.php', 5, 'A'),
(12, 'Listar opcion', '', 'listar_opcion.php', 5, 'A'),
(13, 'Formulario Filtrar opcion', '  ', 'filtrar_opcion.php ', 5, 'A'),
(15, 'Asignar Permiso', '', 'asignar_permiso.php', 6, 'A'),
(16, 'Editar OpciÃ³n', '', 'editar_opcion.php', 5, 'I'),
(17, 'Gestionar Opcion', '', 'filtrar_opcion_reporte.php', 5, 'A'),
(18, 'Reporte de permiso', '', 'reporte_permiso.php', 16, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `permiso`
--

CREATE TABLE IF NOT EXISTS `permiso` (
  `cod_per` int(11) NOT NULL AUTO_INCREMENT,
  `fky_opcion` int(11) NOT NULL,
  `fky_usuario` int(11) NOT NULL,
  PRIMARY KEY (`cod_per`),
  KEY `fky_opcion` (`fky_opcion`),
  KEY `fky_usuario` (`fky_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `permiso`
--

INSERT INTO `permiso` (`cod_per`, `fky_opcion`, `fky_usuario`) VALUES
(39, 15, 1),
(40, 1, 1),
(41, 2, 1),
(42, 3, 1),
(43, 4, 1),
(44, 5, 1),
(45, 16, 1),
(50, 13, 1),
(51, 17, 1),
(52, 11, 1),
(53, 12, 1),
(54, 10, 1),
(55, 9, 1),
(56, 8, 1),
(57, 6, 1),
(58, 7, 1),
(59, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `cod_usu` int(11) NOT NULL AUTO_INCREMENT,
  `nom_usu` varchar(30) NOT NULL,
  `ape_usu` varchar(30) NOT NULL,
  `ema_usu` varchar(80) NOT NULL,
  `cla_usu` varchar(32) NOT NULL,
  `est_usu` char(1) NOT NULL,
  PRIMARY KEY (`cod_usu`),
  UNIQUE KEY `ema_usu` (`ema_usu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`cod_usu`, `nom_usu`, `ape_usu`, `ema_usu`, `cla_usu`, `est_usu`) VALUES
(1, 'juan', 'moncada', 'jmoncada@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'A'),
(2, 'alejandro', 'moncada', 'amoncada@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'A'),
(3, ' RICARDO JOSE', 'MONCADA TORRES', 'ricardomoncada@gmail.com', '', 'A'),
(4, 'mariana', 'torres', 'mtorres@gmail.com', '1', 'A');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `modulo`
--
ALTER TABLE `modulo`
  ADD CONSTRAINT `modulo_ibfk_1` FOREIGN KEY (`fky_modulo`) REFERENCES `modulo` (`cod_mod`) ON UPDATE CASCADE;

--
-- Constraints for table `opcion`
--
ALTER TABLE `opcion`
  ADD CONSTRAINT `opcion_ibfk_1` FOREIGN KEY (`fky_modulo`) REFERENCES `modulo` (`cod_mod`) ON UPDATE CASCADE;

--
-- Constraints for table `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `permiso_ibfk_1` FOREIGN KEY (`fky_opcion`) REFERENCES `opcion` (`cod_opc`) ON UPDATE CASCADE,
  ADD CONSTRAINT `permiso_ibfk_2` FOREIGN KEY (`fky_usuario`) REFERENCES `usuario` (`cod_usu`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
