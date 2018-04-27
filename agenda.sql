-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2018 a las 20:19:54
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(225) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `hora_inicio` time(6) NOT NULL,
  `fecha_fin` date NOT NULL,
  `hora_fin` time(6) NOT NULL,
  `allDay` tinyint(1) NOT NULL,
  `completo` tinyint(1) NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `fecha_inicio`, `hora_inicio`, `fecha_fin`, `hora_fin`, `allDay`, `completo`, `user_id`) VALUES
(16, 'uyiyu', '2018-04-17', '07:00:00.000000', '2018-04-21', '07:00:00.000000', 0, 0, 'lermittovar@gmail.com'),
(17, 'zxc', '2018-04-26', '07:00:00.000000', '2018-04-27', '07:00:00.000000', 0, 0, 'lermittovar@gmail.com'),
(18, '777', '2018-04-03', '07:00:00.000000', '2018-04-05', '07:00:00.000000', 0, 0, 'lermittovar@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`user`, `password`, `name`, `birthday`, `id`) VALUES
('lermittovar@gmail.com', '$2y$10$Q7PS3hhl2oHO6JBWIe1/g.Swaz..98.WWM2.rA30/GbEkUanh9v.y', 'Lermit Tovar', '2000-03-12', 15),
('lermitpisano@gmail.com', '$2y$10$JAmh4d5h1CScrUv3uWzKM.uOYLa5gR7tJ9kBjjL.DaKIQj4g7rI5a', 'Lermit Pisano', '1999-12-03', 16),
('lertadmin@gmail.com', '$2y$10$kWc0KtRVAL5Twf85FPsf1eVGMx0zWPyTz73MR8vRiT1CrGMKYkNvO', 'Lert admin', '2015-05-24', 17);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
