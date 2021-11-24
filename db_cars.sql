-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2021 a las 02:03:10
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_cars`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autos`
--

CREATE TABLE `autos` (
  `id_auto` int(11) NOT NULL,
  `modelo` varchar(45) NOT NULL,
  `origen` varchar(45) NOT NULL,
  `anio` int(11) NOT NULL,
  `id_marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `autos`
--

INSERT INTO `autos` (`id_auto`, `modelo`, `origen`, `anio`, `id_marca`) VALUES
(2, 'Chevy', 'Argentina', 1969, 1),
(3, 'R107', 'Alemania', 1971, 5),
(4, '300zx', 'Japón', 1969, 6),
(5, '505', 'Francia', 1979, 7),
(6, '2CV', 'Francia', 1948, 2),
(7, '12', 'Francia', 1969, 8),
(8, 'Celica', 'Japón', 1970, 9),
(9, 'Tipo 1', 'Alemania', 1938, 10),
(10, 'Uno', 'Italia', 1983, 3),
(11, 'Impala', 'Estados Unidos', 1970, 1),
(12, 'Montero', 'Japón', 1982, 12),
(13, '600', 'Italia', 1955, 3),
(14, 'E3', 'Alemania', 1968, 15),
(15, 'Falcon', 'Argentina', 1962, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `contenido` varchar(200) NOT NULL,
  `puntaje` int(11) NOT NULL,
  `user` varchar(45) NOT NULL,
  `id_auto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `origen` varchar(45) NOT NULL,
  `fundacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `marca`, `origen`, `fundacion`) VALUES
(1, 'Chevrolet', 'Estados Unidos', 1911),
(2, 'Citroën', 'Francia', 1919),
(3, 'Fiat', 'Italia', 1899),
(4, 'Ford', 'Estados Unidos', 1903),
(5, 'Mercedes-Benz', 'Alemania', 1926),
(6, 'Nissan', 'Japón', 1933),
(7, 'Peugeot', 'Francia', 1810),
(8, 'Renault', 'Francia', 1898),
(9, 'Toyota', 'Japón', 1933),
(10, 'Volkswagen', 'Alemania', 1937),
(12, 'Mitsubishi', 'Japón', 1970),
(15, 'BMW', 'Alemania', 1916);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user`, `password`, `rol`) VALUES
('NICO', '$2y$10$AMjoj54peeqivrBmmvLOp.Z3ydbrQQ6dksyhiW1Z8cuHsRy0M8Mca', 'admin'),
('VALEN', '$2y$10$2sHCp3XYsfhY/HF7CDLye.BBSiIY5wQ.k48iBQU1r82fAgQbqXzvm', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`id_auto`),
  ADD KEY `id_marca` (`id_marca`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `user` (`user`),
  ADD KEY `id_auto` (`id_auto`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autos`
--
ALTER TABLE `autos`
  MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autos`
--
ALTER TABLE `autos`
  ADD CONSTRAINT `autos_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id_marca`);

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`user`) ON DELETE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_auto`) REFERENCES `autos` (`id_auto`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
