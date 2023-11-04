-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2023 a las 17:06:08
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hilda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IdCliente` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IdCliente`, `nombre`, `correo`, `celular`, `direccion`) VALUES
(1, 'hola', 'hola1@gmail.com', '829-508-2104', 'Bani'),
(2, 'hola', 'hola1222@gmail.com', '829-508-2104', ''),
(8, 'hola232', 'nahomi232@gmail.com', '829-000-1111', '30 de Mayo'),
(9, 'nahomi', 'nahomi.nunez@isfodosu.edu.do', '', ''),
(11, '', '', '', ''),
(15, 'Veamos condicion', 'veamoscondicion@gmail.com', '', ''),
(16, 'Adelin', 'adelin80000@gmail.com', '', ''),
(17, 'Hey probando nuevos campos', 'bdsbd@gmail.com', '823-456-7890', 'Bani'),
(20, 'holaHECTOR MONGOLO', 'WDJWAGS@gmail.com', '829-508-2104', ''),
(21, 'jkdbljfhfgmd', 'sfhdss@gmail.com', '', ''),
(22, 'uhfiusf', 'WDJWAGS@gmail.com	', '', ''),
(23, 'shdgashdflasjkdbasvhja', 'dvashdl.sjahcWGDHASDQWT@gmail.com', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `IdContacto` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `asunto` varchar(50) NOT NULL,
  `mensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`IdContacto`, `IdCliente`, `asunto`, `mensaje`) VALUES
(13, 11, '11dffrg2', 'dfdffgdf'),
(16, 15, 'hola', 'dfkusdhfkjsm'),
(17, 17, 'urgencia32335', 'adelin'),
(19, 21, 'sdgshg', ' cxhcouhsd'),
(20, 21, 'sdgshg', ' cxhcouhsd'),
(21, 22, 'dgiusf', ' zhvshaf'),
(22, 22, 'ahdgfsd', ' sdygyufsgf'),
(23, 21, 'ahdgfsd', ' sdygyufsgf'),
(24, 21, 'ahdgfsd', ' sdygyufsgf'),
(25, 21, 'ahdgfsd', ' sdygyufsgf'),
(26, 23, 'sdgasy', ' shsagfha');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `Id` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `DireccionEnvio` varchar(50) NOT NULL,
  `Fecha` date NOT NULL
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
  `IdOrden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `IdProducto` int(11) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`IdProducto`, `imagen`, `nombre`, `descripcion`, `categoria`, `precio`) VALUES
(13, '1698716772_f3c088d32bd4a56d.jpeg', 'hsvhdhhdafdy', 'HECTOR NO SABE', 'agsahga', 123),
(14, '1698717231_5ed4d84f05286665.png', '3tr63r3gyfr34h', 'neh34uhefbeh', 'enfefueunj', 5424),
(17, '1698973983_92f81da447a52d95.jpeg', 'S8SDTWE7WYUDWYD7WY', ' cbzhczb', 'Tapas', 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `IdReservas` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `cantidadPersonas` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(50) NOT NULL,
  `evento` varchar(50) NOT NULL,
  `area` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`IdReservas`, `IdCliente`, `cantidadPersonas`, `fecha`, `hora`, `evento`, `area`, `descripcion`) VALUES
(6, 17, 89, '0000-00-00', '05:00 PM', 'Boda', 'Terraza', ' sdxgfdhd'),
(7, 17, 743, '2023-10-31', '09:00 PM', 'Reunion', 'Terraza', 'refd'),
(8, 20, 3, '2023-10-30', '06:00 PM', '0', 'Terraza', ' gshgdahs'),
(9, 9, 2, '2023-10-31', '03:00 PM', '0', 'Terraza', ' tdyttsesy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `nombre`, `correo`, `contraseña`) VALUES
(1, 'Nahomi Nuñez', 'nahomi@gmail.com', '123'),
(9, 'parece que ya lo habia puesto', 'hey@gmail.com', '122435');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`IdContacto`),
  ADD KEY `contactos` (`IdCliente`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `orden` (`IdCliente`);

--
-- Indices de la tabla `ordendetalle`
--
ALTER TABLE `ordendetalle`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `productos` (`IdProducto`),
  ADD KEY `IdOrden` (`IdOrden`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IdProducto`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`IdReservas`),
  ADD KEY `IdCliente` (`IdCliente`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `IdContacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `IdReservas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD CONSTRAINT `contactos` FOREIGN KEY (`IdCliente`) REFERENCES `clientes` (`IdCliente`);

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `orden` FOREIGN KEY (`IdCliente`) REFERENCES `clientes` (`IdCliente`);

--
-- Filtros para la tabla `ordendetalle`
--
ALTER TABLE `ordendetalle`
  ADD CONSTRAINT `ordendetalle_ibfk_1` FOREIGN KEY (`IdOrden`) REFERENCES `orden` (`Id`),
  ADD CONSTRAINT `productos` FOREIGN KEY (`IdProducto`) REFERENCES `productos` (`IdProducto`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`IdCliente`) REFERENCES `clientes` (`IdCliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
