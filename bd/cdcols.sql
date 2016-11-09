-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2016 a las 18:44:34
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cdcols`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cds`
--

CREATE TABLE `cds` (
  `id` int(6) NOT NULL,
  `titel` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `interpret` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `jahr` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cds`
--

INSERT INTO `cds` (`id`, `titel`, `interpret`, `jahr`) VALUES
(1, 'Guau', 'Arbol', '2003'),
(2, 'Raro', 'Cuarteto de Nos', '2005'),
(3, 'Libertinaje', 'Bersuit', '1998'),
(4, 'Signos', 'Soda Stereo', '1986'),
(5, 'Cuentos Decapitados', 'Catupechu Machu', '2000'),
(6, 'Culpable', 'La Berisso', '2009'),
(7, 'Otro dia en el planeta', 'Intoxicados', '2005'),
(8, 'Arriba las Manos', 'Pibes Chorros', '2001');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cds`
--
ALTER TABLE `cds`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cds`
--
ALTER TABLE `cds`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
