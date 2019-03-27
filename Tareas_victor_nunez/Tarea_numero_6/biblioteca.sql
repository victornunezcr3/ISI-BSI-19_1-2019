-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-03-2019 a las 20:28:00
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
-- Base de datos: `biblioteca`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminar_libro` (IN `id` INT(6))  MODIFIES SQL DATA
    DETERMINISTIC
DELETE FROM libro
WHERE id=id_libro$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_increase_perc_pric` (IN `edito` VARCHAR(50))  MODIFIES SQL DATA
UPDATE libro
SET precio=round(precio*1.10,2)
WHERE edito=editorial$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_increase_price_var` (IN `edito` VARCHAR(50), IN `incre` INT(2))  MODIFIES SQL DATA
UPDATE libro
SET precio=round(precio + precio*(incre/100),2)
WHERE edito=editorial$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_data_lib` (IN `titu` VARCHAR(50), IN `auto` VARCHAR(40), IN `edito` VARCHAR(30), IN `price` FLOAT(5,2))  MODIFIES SQL DATA
INSERT INTO libro(titulo,autor,editorial,precio) VALUES(titu,auto,edito,price)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_libro` (IN `var` VARCHAR(50))  SELECT *
FROM libro
WHERE id_libro>0$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_uddate_libro` (IN `id` INT(6), IN `tit` VARCHAR(50), IN `aut` VARCHAR(40), IN `edita` VARCHAR(30), IN `pre` FLOAT(5,2))  MODIFIES SQL DATA
UPDATE libro
SET titulo=tit,
    autor=aut,
    editorial=edita,
    precio=pre
WHERE id_libro=id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id_libro` int(11) NOT NULL,
  `titulo` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `autor` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `editorial` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` double(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id_libro`, `titulo`, `autor`, `editorial`, `precio`) VALUES
(1, 'Harry Potter', 'JK Rolling', 'Nose', 57.52),
(2, 'Lor of the Ring', 'JR Tolkien', 'No se', 131.99),
(3, 'Condorito', 'Juan Bainas', 'Prentice hall', 428.18),
(4, 'PHP for Dummis', 'Desconocido', 'Prentice hall', 456.78);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id_libro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
