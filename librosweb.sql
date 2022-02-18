-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-02-2022 a las 17:20:23
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `librosweb`
--
Create database librosweb;
use librosweb;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `codigo` int(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `imagen` varchar(1000) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `fecha_alta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `codigo`, `nombre`, `imagen`, `descripcion`, `fecha_alta`) VALUES
(33, 1234, 'Libro de Mysql', '1645131154_comandos-utiles-de-mysql-server.jpg', 'Aprender los fundamentos de Mysql', '2022-02-17'),
(36, 12345678, 'Libro de html', '1645130925_maquetacion-email-html.png', 'Aprender los fundamentos de html', '2022-02-17'),
(37, 3, 'Libro de PHP', '1645130985_php-2.png', 'Aprender los fundamentos de PHP', '2022-02-17'),
(38, 3545, 'Libro de Linux', '1645131249_Pinguino-Linux-fondo-negro.jpg', 'Aprender los fundamentos de Linux', '2022-02-17'),
(39, 867, 'Libro de JavaScript', '1645131330_0_aH8YUI7nqAZ6b-V_.png', 'Aprender los fundamentos de JavaScript', '2022-02-17'),
(40, 9675, 'Libro de C#', '1645131393_csharp.jpg', 'Aprender los fundamentos de C#', '2022-02-17'),
(41, 93, 'Libro de Codeigniter', '1645131466_error_bug_codeigniter_stored_procedure_solucion.jpg', 'Aprender los fundamentos de Codeigniter 4', '2022-02-17'),
(42, 967, 'Libro de SQLserver', '1645132343_sql-server-min.jpg', 'Aprender los fundamentos de SQLserver', '2022-02-17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
