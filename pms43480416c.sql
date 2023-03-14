-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-01-2022 a las 18:11:12
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
-- Base de datos: `pms43480416c`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(4) NOT NULL,
  `datosPersonales` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `datosPersonales`) VALUES
(1, 'xisco'),
(2, 'alex');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hotel`
--

CREATE TABLE `hotel` (
  `idHotel` int(4) NOT NULL,
  `descripcion` char(50) DEFAULT NULL,
  `url` char(20) DEFAULT NULL,
  `nombre` char(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hotel`
--

INSERT INTO `hotel` (`idHotel`, `descripcion`, `url`, `nombre`) VALUES
(1, 'descripcion hotel 1', 'hotel1@gmail.com', 'hotel1'),
(2, 'descripcion hotel 2', 'hotel2@gmail.com', 'hotel2'),
(3, 'descripcion hotel 3', 'hotel3@gmail.com', 'hotel3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `cantidadPersonas` int(3) DEFAULT NULL,
  `FechaEntada` date DEFAULT NULL,
  `FechaSalida` date DEFAULT NULL,
  `idReserva` int(4) NOT NULL,
  `idCliente` int(4) DEFAULT NULL,
  `idHotel` int(4) DEFAULT NULL,
  `codigo` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`cantidadPersonas`, `FechaEntada`, `FechaSalida`, `idReserva`, `idCliente`, `idHotel`, `codigo`) VALUES
(4, '2022-01-26', '2022-01-27', 17, 1, 3, 'SUI'),
(4, '2022-01-26', '2022-01-27', 18, 1, 3, 'DBL'),
(3, '2022-01-30', '2022-01-31', 20, 1, 2, 'DBL'),
(3, '2022-01-30', '2022-01-31', 21, 1, 2, 'DBL'),
(7, '2022-01-30', '2022-01-31', 22, 1, 3, 'IND'),
(6, '2022-01-30', '2022-01-31', 23, 1, 2, 'IND'),
(4, '2022-01-27', '2022-01-28', 29, 1, 1, 'SUI'),
(2, '2022-01-27', '2022-01-28', 30, 1, 1, 'DBL'),
(4, '2022-01-27', '2022-01-28', 31, 1, 1, 'SUI'),
(2, '2022-01-27', '2022-01-28', 32, 1, 1, 'DVM'),
(1, '2022-01-27', '2022-01-28', 33, 2, 1, 'DVM'),
(2, '2022-01-27', '2022-01-28', 34, 1, 1, 'DVM'),
(4, '2022-01-27', '2022-01-28', 35, 1, 1, 'SUI'),
(4, '2022-01-27', '2022-01-28', 36, 1, 1, 'SUI'),
(4, '2022-01-27', '2022-01-28', 37, 1, 1, 'SUI'),
(2, '2022-01-28', '2022-01-31', 38, 1, 2, 'JSUI'),
(2, '2022-01-17', '2022-01-22', 39, 2, 1, 'DVM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_hotel_habitacion`
--

CREATE TABLE `r_hotel_habitacion` (
  `idHotel` int(4) NOT NULL,
  `codigo` varchar(5) NOT NULL,
  `precio` int(4) DEFAULT NULL,
  `cantidad` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `r_hotel_habitacion`
--

INSERT INTO `r_hotel_habitacion` (`idHotel`, `codigo`, `precio`, `cantidad`) VALUES
(1, 'DBL', 50, 5),
(1, 'DVM', 100, 5),
(1, 'IND', 40, 5),
(1, 'JSUI', 90, 5),
(1, 'SUI', 100, 5),
(2, 'DBL', 70, 5),
(2, 'DVM', 150, 5),
(2, 'IND', 60, 5),
(2, 'JSUI', 130, 5),
(2, 'SUI', 150, 5),
(3, 'DBL', 60, 5),
(3, 'DVM', 80, 5),
(3, 'IND', 30, 5),
(3, 'JSUI', 70, 5),
(3, 'SUI', 80, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipohabitacion`
--

CREATE TABLE `tipohabitacion` (
  `codigo` varchar(5) NOT NULL,
  `ocupacion` int(4) DEFAULT NULL,
  `descripcion` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipohabitacion`
--

INSERT INTO `tipohabitacion` (`codigo`, `ocupacion`, `descripcion`) VALUES
('DBL', 2, 'Doble'),
('DVM', 2, 'Doble Vista Mar'),
('IND', 1, 'Individual'),
('JSUI', 3, 'Junior Suite'),
('SUI', 4, 'Suite');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`idHotel`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idReserva`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idHotel` (`idHotel`),
  ADD KEY `codigo` (`codigo`);

--
-- Indices de la tabla `r_hotel_habitacion`
--
ALTER TABLE `r_hotel_habitacion`
  ADD PRIMARY KEY (`idHotel`,`codigo`),
  ADD KEY `codigo` (`codigo`);

--
-- Indices de la tabla `tipohabitacion`
--
ALTER TABLE `tipohabitacion`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `hotel`
--
ALTER TABLE `hotel`
  MODIFY `idHotel` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idReserva` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`idHotel`) REFERENCES `hotel` (`idHotel`),
  ADD CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`codigo`) REFERENCES `tipohabitacion` (`codigo`);

--
-- Filtros para la tabla `r_hotel_habitacion`
--
ALTER TABLE `r_hotel_habitacion`
  ADD CONSTRAINT `r_hotel_habitacion_ibfk_1` FOREIGN KEY (`idHotel`) REFERENCES `hotel` (`idHotel`),
  ADD CONSTRAINT `r_hotel_habitacion_ibfk_2` FOREIGN KEY (`codigo`) REFERENCES `tipohabitacion` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
