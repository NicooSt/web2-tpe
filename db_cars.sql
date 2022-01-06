-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-01-2022 a las 17:27:57
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
(13, 'Corsa', 'Argentina', 1990, 1),
(14, 'E3', 'Alemania', 1968, 15),
(18, 'Cruze', 'Argentina', 2021, 1),
(21, 'Chevy', 'Argentina', 1969, 1),
(22, '600', 'Italia', 1955, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `contenido` varchar(200) NOT NULL,
  `fecha` varchar(45) NOT NULL,
  `puntaje` int(11) NOT NULL,
  `user` varchar(45) NOT NULL,
  `id_auto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `contenido`, `fecha`, `puntaje`, `user`, `id_auto`) VALUES
(63, 'Que piola estan las imagenes', '08/12/2021 21:14', 4, 'NICO', 3),
(65, 'Ya esta hecha la paginacion', '12/12/2021 15:49', 5, 'NICO', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id_imagen` int(11) NOT NULL,
  `ruta` varchar(45) NOT NULL,
  `id_auto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id_imagen`, `ruta`, `id_auto`) VALUES
(47, 'img/cars/61b40996ac113.jpg', 3),
(48, 'img/cars/61b40996ac1b7.jpg', 3);

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
('CACHO', '$2y$10$l8JQC11ialHQKdogBZb5o.T2C.p55MTpVmlSUXbUPNvRHLvbSkyN2', 'user'),
('JAVIER', '$2y$10$ruvbdz8a35x0h.mNHbkKJ.p2JWEK9sQTTKcwvUeFg2GE3gTbMPZiG', 'user'),
('NICO', '$2y$10$G1k9qLBpCThKUp3444TDmuXaZvXQiS/1WKJGtbCHTeEviD9ohNTiq', 'admin'),
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
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id_imagen`),
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
  MODIFY `id_auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`id_auto`) REFERENCES `autos` (`id_auto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
