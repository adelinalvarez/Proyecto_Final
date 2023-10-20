-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2023 a las 04:33:08
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_hilda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Asunto` varchar(50) NOT NULL,
  `Mensaje` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`Id`, `Nombre`, `Correo`, `Asunto`, `Mensaje`) VALUES
(1, 'prueba', 'preuba@gmail.com', 'sdgd', 'fdhghfg'),
(2, 'Nahomi2555', 'prueba2@gmail.com', 'ythfufy', 'uyutyiyu'),
(3, 'Nahomi2555454656', 'prueba2@gmail.com', 'ythfufy', 'uyutyiyu'),
(4, 'Nahomi2', 'hola@gmail.com', 'ythfufy', 'uyutyiyu'),
(5, 'Nahomi211111111111111', 'prueba2@gmail.com', 'ythfufy', 'uyutyiyu'),
(6, 'Nahomi21111111dfsdsgdrrgd', 'hola@gmail.com', 'fbfcngh', 'uyutyiyu'),
(7, 'Nahomipruebatext', 'prueba2@gmail.com', 'ythfufy', 'adfgsdg'),
(8, '1Nahomi2ds', 'prueba2@gmail.com', 'ythfufy', 'cxzczxc'),
(9, 'holapruebatext', 'prueba2@gmail.com', 'fbfcngh', 'fdsgfhthtd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `Id` int(11) NOT NULL,
  `IdCliente` varchar(50) NOT NULL,
  `Fecha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordendetalle`
--

CREATE TABLE `ordendetalle` (
  `Id` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` int(11) NOT NULL,
  `IdOrden` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `IdCliente` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Celular` varchar(50) NOT NULL,
  `Pago` varchar(50) NOT NULL,
  `Especificaciones` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  `Categoria` varchar(50) NOT NULL,
  `Precio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Id`, `Nombre`, `Descripcion`, `Categoria`, `Precio`) VALUES
(2, 'Nahomi2', 'dfjsdgsd', 'fgfgdfgdf', '3424325.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Celular` varchar(50) NOT NULL,
  `Cantidad` int(100) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Evento` varchar(50) NOT NULL,
  `Area` varchar(50) NOT NULL,
  `Descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`Id`, `Nombre`, `Correo`, `Celular`, `Cantidad`, `Fecha`, `Hora`, `Evento`, `Area`, `Descripcion`) VALUES
(1, 'Nahomi2', 'holaerw@gmail.com', '632746238743', 1, '2023-10-21', '02:00:00', '', 'Reservar normal', 'jdsjfgsdhfgds'),
(2, 'Nahomi2444', 'hola@gmail.com', '632746238743', 1, '2023-10-28', '02:00:00', 'Reservar normal', '', 'jhxfjksdgkfdsmbfmn'),
(3, 'Nahomi2444', 'hola@gmail.com', '632746238743', 1, '2023-10-23', '03:00:00', 'Boda', 'Terraza', 'dnvlk,sdjvjkdb');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `Id` int(50) NOT NULL,
  `Nombres` varchar(50) DEFAULT NULL,
  `Correo` varchar(50) NOT NULL,
  `Contraseña` varchar(50) NOT NULL,
  `Cargo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`Id`, `Nombres`, `Correo`, `Contraseña`, `Cargo`) VALUES
(1, 'ahgsah', 'hola@gmail.com', '242435', 'Chef'),
(2, 'ahgsahwe', 'holaerw@gmail.com', '4534645', 'Hola'),
(3, 'ahgsahwesdfsd', 'holasfgdfg@gmail.com', '5654645', 'Hola'),
(6, 'ahgsahwe', 'prueba2@gmail.com', '123', 'Chef');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `ordendetalle`
--
ALTER TABLE `ordendetalle`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_ordendetalle_orden` (`IdOrden`),
  ADD KEY `fk_ordendetalle_productos` (`IdProducto`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id` (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ordendetalle`
--
ALTER TABLE `ordendetalle`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ordendetalle`
--
ALTER TABLE `ordendetalle`
  ADD CONSTRAINT `fk_ordendetalle_orden` FOREIGN KEY (`IdOrden`) REFERENCES `orden` (`Id`),
  ADD CONSTRAINT `fk_ordendetalle_productos` FOREIGN KEY (`IdProducto`) REFERENCES `productos` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
