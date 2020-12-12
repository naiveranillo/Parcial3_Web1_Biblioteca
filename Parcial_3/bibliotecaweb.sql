-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 23, 2020 at 10:07 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bibliotecaweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `cod_categoria` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`cod_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`cod_categoria`, `nombre`) VALUES
('01', 'Informatica'),
('02', 'Ciencias Matematicas');

-- --------------------------------------------------------

--
-- Table structure for table `ejemplar`
--

CREATE TABLE IF NOT EXISTS `ejemplar` (
  `id` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `cod_isbn` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `cod_ejemplar` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `estado` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `ejemplar`
--

INSERT INTO `ejemplar` (`id`, `cod_isbn`, `cod_ejemplar`, `estado`) VALUES
('11101', '111', '01', 'prestado'),
('11102', '111', '02', 'prestado'),
('11103', '111', '03', 'prestado'),
('11104', '111', '04', 'disponible'),
('11105', '111', '05', 'disponible'),
('11106', '111', '06', 'prestado'),
('11107', '111', '07', 'prestado'),
('11108', '111', '08', 'disponible'),
('11109', '111', '09', 'disponible'),
('11110', '111', '10', 'disponible'),
('22201', '222', '01', 'prestado'),
('22202', '222', '02', 'prestado'),
('22203', '222', '03', 'disponible'),
('22204', '222', '04', 'disponible'),
('22205', '222', '05', 'disponible');

-- --------------------------------------------------------

--
-- Table structure for table `libro`
--

CREATE TABLE IF NOT EXISTS `libro` (
  `codigo_isbn` varchar(100) NOT NULL,
  `nombre_L` varchar(50) NOT NULL,
  `cod_categoria_L` varchar(30) NOT NULL,
  `cantidad` varchar(30) NOT NULL,
  PRIMARY KEY (`codigo_isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `libro`
--

INSERT INTO `libro` (`codigo_isbn`, `nombre_L`, `cod_categoria_L`, `cantidad`) VALUES
('111', 'Programacion 1', '01', '5'),
('222', 'Calculo 1', '02', '3');

-- --------------------------------------------------------

--
-- Table structure for table `prestamo`
--

CREATE TABLE IF NOT EXISTS `prestamo` (
  `id_prestamo` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `cod_isbn_P` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `cod_ejemp_P` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `cedula_P` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`id_prestamo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prestamo`
--

INSERT INTO `prestamo` (`id_prestamo`, `cod_isbn_P`, `cod_ejemp_P`, `cedula_P`) VALUES
('11101123', '111', '01', '123'),
('11102123', '111', '02', '123'),
('11103333', '111', '03', '333'),
('11106444', '111', '06', '444'),
('11107444', '111', '07', '444'),
('22201333', '222', '01', '333'),
('22202333', '222', '02', '333');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nombre` varchar(50) NOT NULL,
  `cedula_U` int(11) NOT NULL,
  `fecha_nac` varchar(10) NOT NULL,
  `sexo` varchar(30) NOT NULL,
  `tipo_usu` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `cant_libros` int(11) NOT NULL,
  PRIMARY KEY (`cedula_U`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`nombre`, `cedula_U`, `fecha_nac`, `sexo`, `tipo_usu`, `estado`, `cant_libros`) VALUES
('Sofia', 111, '2020-06-24', 'Femenino', 'Profesor', 'inactivo', 0),
('Andres', 123, '2020-06-18', 'Masculino', 'Profesor', 'activo', 2),
('Yarelis', 333, '2020-06-05', 'Femenino', 'Estudiante', 'activo', 2),
('Naiver', 444, '2020-06-12', 'Masculino', 'Estudiante', 'activo', 2),
('bibliotecario', 12345678, '00/00/0000', 'masculino', 'Administrador', 'admin', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
