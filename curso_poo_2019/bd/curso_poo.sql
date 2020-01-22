-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 29, 2019 at 04:26 PM
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
  UNIQUE KEY `url_mod` (`url_mod`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `modulo`
--

INSERT INTO `modulo` (`cod_mod`, `nom_mod`, `des_mod`, `url_mod`, `est_mod`, `fky_modulo`) VALUES
(1, 'Usuario', 'Usuario', 'frontend/vista/usuario/', 'A', 0),
(2, 'Modulo', 'Modulo', 'frontend/vista/modulo/', 'A', NULL),
(3, 'Opcion', 'Opciòn', 'frontend/vista/opcion/', 'A', NULL),
(4, 'Permiso', 'permiso', 'frontend/vista/permiso/', 'A', NULL),
(12, 'doce', '', 'doce/', 'A', 0),
(13, '', '', '', 'X', 0),
(14, 'modulo29', 'modulo29', '29/', 'A', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `opcion`
--

INSERT INTO `opcion` (`cod_opc`, `nom_opc`, `des_opc`, `url_opc`, `fky_modulo`, `est_opc`) VALUES
(1, 'Guardar Usuario', 'Guardar Usuario', 'guardar_usuario.html', 1, 'A'),
(2, 'Listar Usuario', 'Listar Usuario', 'listarusuario.php', 1, 'A');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `permiso`
--

INSERT INTO `permiso` (`cod_per`, `fky_opcion`, `fky_usuario`) VALUES
(1, 1, 1),
(2, 2, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`cod_usu`, `nom_usu`, `ape_usu`, `ema_usu`, `cla_usu`, `est_usu`) VALUES
(1, 'juan', 'moncada', '1@gmail.com', '1', 'A'),
(2, 'alejandro', 'moncada', '2@gmail.com', '2', 'A'),
(3, 'ricardo', 'moncada', '3@gmail.com', '3', 'A'),
(4, 'leidi', 'perez', 'leidiperez@gmail.com', 'e4da3b7fbbce2345d7772b0674a318d5', 'A'),
(6, '  ultimo', ' ultimo', 'u@gmail.com', '', 'I'),
(8, 'manuel ', 'gonzalez', 'mgonzalez@gmail.com', '', 'A');

--
-- Constraints for dumped tables
--

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
