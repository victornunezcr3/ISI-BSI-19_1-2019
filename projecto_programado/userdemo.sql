-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-03-2019 a las 06:32:12
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
-- Base de datos: `userdemo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
('20160924162137');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `date_created` datetime NOT NULL,
  `pwd_reset_token` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pwd_reset_token_creation_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `email`, `full_name`, `password`, `status`, `date_created`, `pwd_reset_token`, `pwd_reset_token_creation_date`) VALUES
(1, 'admin@example.com', 'Admin', '$2y$10$3GpCLBqcLuCNFnqTPfPgheOEJVZDdgs2hLatScgaG4d6L6D.bE.AK', 1, '2019-03-25 00:14:52', NULL, NULL),
(2, 'usuario1@dominio.org', 'Victor Nunez', '$2y$10$FNaoPT5Z.F/ChLDOznv66.FBf4lNSs6Fx32DjKm9mzUvtIU27f4li', 1, '2019-03-25 01:05:46', NULL, NULL),
(3, 'usuario2@otrodominio.com', 'Manolo Nunez', '$2y$10$sD..jnCF14THmofY50eOvegpHRsrkjg76j03mPLgJL4/Dg15ucsDO', 1, '2019-03-25 01:06:33', NULL, NULL),
(4, 'juanbobo@dom.net', 'Juan Bobo', '$2y$10$Jk2D5xdV1GEpJixpod6B0.m1HyotPw78Qp7PH5TKTt5NO40rt9O66', 1, '2019-03-25 01:07:16', NULL, NULL),
(5, 'gatofelix@dom2.com', 'Gato Felix', '$2y$10$eYaoq5vuZOp5OIkGe73GXe5ALMr0DJMQyOnGkEkarIRykgRVuyj8.', 1, '2019-03-25 01:08:08', NULL, NULL),
(6, 'juancaca@dom3.com', 'Juan Caca', '$2y$10$GCT3/JnxcQqZ8o6nU5Yrb.xi9JsiRLmzCtM2v71H/3sVEjceYMniy', 1, '2019-03-25 01:09:04', NULL, NULL),
(7, 'armabronca@dom5.com', 'Armando Broncas', '$2y$10$p1gM13Rj79B5F5QEGpdaj.wME7LVlcFSochzaJl4PEkqWgAuIezrG', 1, '2019-03-25 01:10:16', NULL, NULL),
(8, 'brucelee@dom6.com', 'Bruce Lee', '$2y$10$6bwdWLYcbNH6PeedFM8v5.LJOqShncFjyX2F3GArzC235Oib0FRK.', 1, '2019-03-25 01:11:24', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_idx` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
