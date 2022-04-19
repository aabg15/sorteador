-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-04-2022 a las 08:15:36
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca_mvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fondo`
--

CREATE TABLE `fondo` (
  `id` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `destino` varchar(300) NOT NULL,
  `estado` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `fondo`
--

INSERT INTO `fondo` (`id`, `img`, `destino`, `estado`) VALUES
(2, 'loticaja4_Mesa de trabajo 1.png', 'Assets/images/fondos/loticaja4_Mesa de trabajo 1.png', '0'),
(4, 'WhatsApp Image 2022-01-24 at 9.15.47 AM.jpeg', 'Assets/images/fondos/WhatsApp Image 2022-01-24 at 9.15.47 AM.jpeg', '0'),
(5, 'fondo.png', 'Assets/images/fondos/fondo.png', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ganadores`
--

CREATE TABLE `ganadores` (
  `id` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `sorteo` int(11) NOT NULL,
  `premio` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE `jugador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `dni` varchar(50) DEFAULT NULL,
  `oportunidades` int(11) DEFAULT NULL,
  `sucursal` varchar(50) DEFAULT NULL,
  `idsorteo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`id`, `nombre`, `dni`, `oportunidades`, `sucursal`, `idsorteo`) VALUES
(57, 'Angel bonilla gonzaelz', '75832364', 1, 'San jose\r\n', 1),
(58, 'pepito dos palos', '59858671', 1, 'Sullana\r\n', 1),
(59, 'Aldair xavineta', '75822364', 5, 'Chiclayo\r\n', 1),
(60, 'JESUS LOPEZ', '45832364', 4, 'Pisco\r\n', 1),
(61, 'LUIGUI picaso', '78302364', 1, 'Lambayeque\r\n', 1),
(62, 'BALDERA CARDOZO', '69832366', 2, 'Barranca\r\n', 1),
(63, 'edmundo reyes', '35832364', 3, 'Las lomas\r\n', 1),
(64, 'Any bonilla chaname', '35226054', 4, 'Los pinos\r\n', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sorteo`
--

CREATE TABLE `sorteo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `premio` varchar(50) NOT NULL,
  `reglas` text NOT NULL,
  `cantidad_intento` int(11) DEFAULT NULL,
  `imagen_premio` varchar(50) NOT NULL,
  `estado` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sorteo`
--

INSERT INTO `sorteo` (`id`, `nombre`, `fecha`, `premio`, `reglas`, `cantidad_intento`, `imagen_premio`, `estado`) VALUES
(1, 'Sorteo DE HOY', '2022-04-19', 'Carro0km', '<p><strong>1. Sorteo legal.</strong></p><p><strong>2. Valido para clientes antiguos.</strong></p><p>&nbsp;</p>', 2, 'carro.jpg', 'SS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `clave`, `rol`, `estado`) VALUES
(1, 'admin', 'angel bonilla', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '1', 1),
(8, 'yo', 'Nuevo', 'a3b5543998381d38ee72e2793488d1714c3f8d90f4bda632a411cb32f793bf0a', '1', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fondo`
--
ALTER TABLE `fondo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ganadores`
--
ALTER TABLE `ganadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sorteo`
--
ALTER TABLE `sorteo`
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
-- AUTO_INCREMENT de la tabla `fondo`
--
ALTER TABLE `fondo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ganadores`
--
ALTER TABLE `ganadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jugador`
--
ALTER TABLE `jugador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `sorteo`
--
ALTER TABLE `sorteo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
