-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-08-2020 a las 09:31:25
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bibliotecaweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `cod_categoria` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(200) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`cod_categoria`, `nombre`) VALUES
('01', 'Informatica'),
('02', 'Ciencias Matematicas'),
('03', 'Anime');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplar`
--

CREATE TABLE `ejemplar` (
  `id` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `cod_isbn` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `cod_ejemplar` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `estado` varchar(200) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `ejemplar`
--

INSERT INTO `ejemplar` (`id`, `cod_isbn`, `cod_ejemplar`, `estado`) VALUES
('11101', '111', '01', 'disponible'),
('11102', '111', '02', 'disponible'),
('11103', '111', '03', 'disponible'),
('11104', '111', '04', 'disponible'),
('11105', '111', '05', 'disponible'),
('11106', '111', '06', 'disponible'),
('11107', '111', '07', 'disponible'),
('22201', '222', '01', 'prestado'),
('22202', '222', '02', 'disponible'),
('22203', '222', '03', 'disponible'),
('22204', '222', '04', 'disponible'),
('22205', '222', '05', 'prestado'),
('33301', '333', '01', 'prestado'),
('33302', '333', '02', 'disponible'),
('33303', '333', '03', 'disponible'),
('33304', '333', '04', 'disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `codigo_isbn` varchar(100) NOT NULL,
  `nombre_L` varchar(50) NOT NULL,
  `cod_categoria_L` varchar(30) NOT NULL,
  `cantidad` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`codigo_isbn`, `nombre_L`, `cod_categoria_L`, `cantidad`) VALUES
('111', 'Programacion 1', '01', '7'),
('222', 'Calculo 1', '02', '3'),
('333', 'Dragon Ball Z', '03', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `id_prestamo` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `cod_isbn_P` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `cod_ejemp_P` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `cedula_P` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`id_prestamo`, `cod_isbn_P`, `cod_ejemp_P`, `cedula_P`) VALUES
('22201444', '222', '01', '444'),
('22205333', '222', '05', '333'),
('33301444', '333', '01', '444');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(50) NOT NULL,
  `cedula_U` int(11) NOT NULL,
  `fecha_nac` varchar(10) NOT NULL,
  `sexo` varchar(30) NOT NULL,
  `tipo_usu` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `cant_libros` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `cedula_U`, `fecha_nac`, `sexo`, `tipo_usu`, `estado`, `cant_libros`) VALUES
('Sofia', 111, '2020-06-24', 'Femenino', 'Profesor', 'inactivo', 0),
('Andres', 123, '2020-06-18', 'Masculino', 'Profesor', 'activo', 0),
('Yarelis', 333, '2020-06-05', 'Femenino', 'Estudiante', 'activo', 0),
('Naiver', 444, '2020-06-12', 'Masculino', 'Estudiante', 'activo', 2),
('Carlos', 555, '2000-07-15', 'Masculino', 'Estudiante', 'inactivo', 0),
('Katherine', 888, '2000-09-21', 'Femenino', 'Estudiante', 'activo', 0),
('bibliotecario', 12345678, '00/00/0000', 'masculino', 'Administrador', 'notiene:V', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`cod_categoria`);

--
-- Indices de la tabla `ejemplar`
--
ALTER TABLE `ejemplar`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`codigo_isbn`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`id_prestamo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cedula_U`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
