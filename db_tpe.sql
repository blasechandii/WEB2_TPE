-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2023 a las 05:51:09
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_tpe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periferico`
--

CREATE TABLE `periferico` (
  `id` int(11) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `precio` int(11) NOT NULL,
  `color` varchar(45) NOT NULL,
  `id_periferico` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `periferico`
--

INSERT INTO `periferico` (`id`, `marca`, `precio`, `color`, `id_periferico`) VALUES
(4, 'HyperX', 1233, 'rojo', 'teclado'),
(5, 'Logitech', 75000, 'blanco', 'mouse');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_periferico`
--

CREATE TABLE `tipo_periferico` (
  `id` int(11) NOT NULL,
  `id_periferico` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_periferico`
--

INSERT INTO `tipo_periferico` (`id`, `id_periferico`) VALUES
(1, 'mouse'),
(2, 'teclado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `periferico`
--
ALTER TABLE `periferico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_periferico` (`id_periferico`);

--
-- Indices de la tabla `tipo_periferico`
--
ALTER TABLE `tipo_periferico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_periferico` (`id_periferico`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `periferico`
--
ALTER TABLE `periferico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_periferico`
--
ALTER TABLE `tipo_periferico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `periferico`
--
ALTER TABLE `periferico`
  ADD CONSTRAINT `periferico_ibfk_1` FOREIGN KEY (`id_periferico`) REFERENCES `tipo_periferico` (`id_periferico`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
