-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2019 a las 05:52:47
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `admintable`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(6) UNSIGNED NOT NULL,
  `nombre_cliente` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_cliente` tinyint(3) NOT NULL,
  `identificacion` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_exacta` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `contacto` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(9) NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre_cliente`, `tipo_cliente`, `identificacion`, `direccion_exacta`, `contacto`, `telefono`, `correo`) VALUES
(1, 'colono', 1, '123456789', 'rio frio', 'juan bobo', 858585859, 'alguno@dominio.net'),
(4, 'Colombos', 2, '123123458', 'la victoria', 'fernando la plancheta', 919191918, 'otro@dominio.org'),
(5, 'El sarapiqueno', 3, '131131456', 'Rio frio', 'Juancho pistolas', 123412342, 'otromas@doninio.net');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacion`
--

CREATE TABLE `facturacion` (
  `id_factura` int(6) UNSIGNED NOT NULL,
  `fecha_factura` datetime NOT NULL,
  `moneda` char(3) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_cambio` decimal(10,0) NOT NULL,
  `cliente` int(6) UNSIGNED NOT NULL,
  `producto1` int(6) UNSIGNED NOT NULL,
  `producto2` int(6) UNSIGNED NOT NULL,
  `producto3` int(6) UNSIGNED NOT NULL,
  `sub_total` decimal(10,0) NOT NULL,
  `descuento` decimal(10,0) NOT NULL,
  `iva` decimal(10,0) NOT NULL,
  `total_factura` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(6) UNSIGNED NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_producto` tinyint(3) NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `costo_unitario` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `tipo_producto`, `descripcion`, `costo_unitario`) VALUES
(1, 'Clavos 2\"', 1, 'Clavos para madera', '1500'),
(2, 'Pintura roja galon', 1, 'Pintura aceite para exteriori', '15201');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` mediumint(6) UNSIGNED NOT NULL,
  `fname` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `lname` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `psword` char(40) COLLATE utf8_spanish_ci NOT NULL,
  `registration_date` datetime NOT NULL,
  `user_level` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `psword`, `registration_date`, `user_level`) VALUES
(3, 'victor', 'nunez', 'victornunezcr@outlook.com', '46817736e615a039ca9a664fb8c6d83cf4ed4a4a', '2019-03-05 14:37:10', 1),
(4, 'Manolo', 'Nunez', 'victor.nunez1@uamcr.net', '46817736e615a039ca9a664fb8c6d83cf4ed4a4a', '2019-03-05 14:42:20', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `identificacion` (`identificacion`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `FK_producto1` (`producto1`),
  ADD KEY `FK_producto2` (`producto2`),
  ADD KEY `FK_producto3` (`producto3`),
  ADD KEY `FK_cliente` (`cliente`) USING BTREE;

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `facturacion`
--
ALTER TABLE `facturacion`
  MODIFY `id_factura` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `facturacion`
--
ALTER TABLE `facturacion`
  ADD CONSTRAINT `FK_producto1` FOREIGN KEY (`producto1`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `FK_producto2` FOREIGN KEY (`producto2`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `FK_producto3` FOREIGN KEY (`producto3`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `facturacion_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
