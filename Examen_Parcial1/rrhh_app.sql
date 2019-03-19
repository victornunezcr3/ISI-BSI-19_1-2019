-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-03-2019 a las 23:03:34
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
-- Base de datos: `rrhh_app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accion_personal`
--

CREATE TABLE `accion_personal` (
  `id_acc_per` int(6) UNSIGNED NOT NULL,
  `fecha_creac` date NOT NULL,
  `hora_creac` time NOT NULL,
  `gestor_rh` int(6) NOT NULL,
  `consecutivo` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` tinyint(3) NOT NULL,
  `fecha_nac` date NOT NULL,
  `fecha_final` date DEFAULT NULL,
  `observacion` text COLLATE utf8_spanish_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `accion_personal`
--

INSERT INTO `accion_personal` (`id_acc_per`, `fecha_creac`, `hora_creac`, `gestor_rh`, `consecutivo`, `tipo`, `fecha_nac`, `fecha_final`, `observacion`) VALUES
(1, '2019-03-08', '03:09:13', 2, '2019-1', 1, '2000-10-10', NULL, 'Sin comentarios'),
(2, '2019-03-09', '04:14:26', 1, '2019-2', 1, '1998-01-01', NULL, 'Nada que comentar'),
(3, '2019-03-09', '16:27:00', 0, '2019-3', 1, '1998-12-09', '0000-00-00', 'Sin comentarios'),
(4, '2019-03-09', '16:27:00', 2, '2019-3', 1, '1998-12-09', '0000-00-00', 'Sin comentarios'),
(5, '2019-03-09', '12:40:00', 2, '2019-4', 1, '1996-09-05', '0000-00-00', 'sc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id_departamento` int(6) UNSIGNED NOT NULL,
  `nombre_dep` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_departamento`, `nombre_dep`, `descripcion`) VALUES
(1, 'Operaciones1', 'Operaciones varias'),
(2, 'Contabilidad', 'Contabilidad'),
(3, 'Administrativo', 'Gestion administrativa'),
(4, 'Materiales', 'Insumos, Inventario de materiales y suministros'),
(5, 'Logistica', 'Transporte de mercancias'),
(6, 'Recursos humanos', 'Administracion de personal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleado` int(6) UNSIGNED NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `identificacion` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `nacionalidad` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Costarricense',
  `provincia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `canton` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `distrito` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(8) NOT NULL,
  `celular` int(8) NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `grado_academico` tinyint(3) NOT NULL,
  `fecha_nac` date NOT NULL,
  `departamento` int(6) UNSIGNED NOT NULL,
  `puesto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `banco` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `cuenta_banca` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nombre`, `apellido1`, `apellido2`, `identificacion`, `nacionalidad`, `provincia`, `canton`, `distrito`, `direccion`, `telefono`, `celular`, `correo`, `grado_academico`, `fecha_nac`, `departamento`, `puesto`, `banco`, `cuenta_banca`, `estado`) VALUES
(2, 'juan', 'bobo', 'vainas', '123456789', 'Costarricense', 'limon', 'limon', 'limon centro', 'Del parque, 200 mtrs sur', 71002222, 81238123, 'jbobo@dominio.net', 2, '0000-00-00', 1, 'peon', 'BNCR', '12345-1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(6) UNSIGNED NOT NULL,
  `usr_nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `usr_apellido1` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usr_apellido2` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usrname` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `psword` char(40) COLLATE utf8_spanish_ci NOT NULL,
  `usr_rol` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usr_nombre`, `usr_apellido1`, `usr_apellido2`, `usrname`, `psword`, `usr_rol`) VALUES
(1, 'victor', 'nunez', 'lopez', 'victorml', 'Manolo842703', 2),
(2, 'manolo', 'nunez', 'mantilla', 'manolo', 'manolo842703', 1),
(3, 'Juan', 'Bobo', 'cruz', 'juanb', 'juanbobo3', 1),
(4, 'pancracio', 'salas', 'sanabria', 'spancracio', 'pancra123', 1),
(5, 'Fernando', 'LaPlancheta', 'Salas', 'fsalas', 'usuario123', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accion_personal`
--
ALTER TABLE `accion_personal`
  ADD PRIMARY KEY (`id_acc_per`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD KEY `FK_departamento` (`departamento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usrname` (`usrname`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accion_personal`
--
ALTER TABLE `accion_personal`
  MODIFY `id_acc_per` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_departamento` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleado` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `FK_departamento` FOREIGN KEY (`departamento`) REFERENCES `departamentos` (`id_departamento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
