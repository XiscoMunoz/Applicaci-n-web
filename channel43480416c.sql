-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-01-2022 a las 18:10:46
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `channel43480416c`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuentos`
--

CREATE TABLE `descuentos` (
  `hotel` varchar(25) DEFAULT NULL,
  `tipoHab` varchar(4) DEFAULT NULL,
  `personas` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fechaEntrada` date DEFAULT NULL,
  `fechaSalida` date DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `descuentos`
--

INSERT INTO `descuentos` (`hotel`, `tipoHab`, `personas`, `precio`, `cantidad`, `fechaEntrada`, `fechaSalida`, `id`) VALUES
('Hotel Pepito', 'IND', 4, 250, 3, '2021-12-22', '2021-12-23', 4),
('hotel alex', 'SJU', 3, 100, 8, '2022-01-28', '2022-02-02', 6),
('', '', 0, 0, 0, '0000-00-00', '0000-00-00', 7),
('Hotel ejemplo', 'IND', 1, 250, 3, '2022-01-27', '2022-01-28', 8),
('Hotel ejemplo', 'IND', 1, 250, 3, '2022-01-27', '2022-01-28', 9),
('Hotel ejemplo', 'IND', 1, 250, 3, '2022-01-30', '2022-01-31', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre` char(25) NOT NULL,
  `password` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `password`) VALUES
('Xisco', 'prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventaschannel`
--

CREATE TABLE `ventaschannel` (
  `idVenta` int(11) NOT NULL,
  `hotel` varchar(25) DEFAULT NULL,
  `tipoHab` varchar(4) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `personas` int(11) DEFAULT NULL,
  `fechaEntradA` date DEFAULT NULL,
  `fechaSalida` date DEFAULT NULL,
  `idChannel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventaschannel`
--

INSERT INTO `ventaschannel` (`idVenta`, `hotel`, `tipoHab`, `precio`, `cantidad`, `personas`, `fechaEntradA`, `fechaSalida`, `idChannel`) VALUES
(22, 'Hotel', 'IND', 250, 1, 1, '2022-01-30', '2022-01-31', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventasota`
--

CREATE TABLE `ventasota` (
  `idVenta` int(11) NOT NULL,
  `hotel` varchar(25) DEFAULT NULL,
  `tipoHab` varchar(4) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `personas` int(11) DEFAULT NULL,
  `fechaEntradA` date DEFAULT NULL,
  `fechaSalida` date DEFAULT NULL,
  `idOta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventasota`
--

INSERT INTO `ventasota` (`idVenta`, `hotel`, `tipoHab`, `precio`, `cantidad`, `personas`, `fechaEntradA`, `fechaSalida`, `idOta`) VALUES
(23, 'Hotel1', 'DVM', 100, 3, 2, '2022-01-17', '2022-01-22', 23);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventaschannel`
--
ALTER TABLE `ventaschannel`
  ADD PRIMARY KEY (`idVenta`);

--
-- Indices de la tabla `ventasota`
--
ALTER TABLE `ventasota`
  ADD PRIMARY KEY (`idVenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `descuentos`
--
ALTER TABLE `descuentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
