-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-04-2017 a las 20:18:20
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prwebss`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_p` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `precio` double NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_p`, `nombre`, `precio`, `descripcion`) VALUES
(1, 'PinkBox', 3000, 'NikeSb pinkbox'),
(3, 'toshiba', 753, 'leading inovation'),
(5, 'Gorras', 799.99, 'Gorra Nike');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_usr` int(8) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `contra` varchar(45) DEFAULT NULL,
  `ap_mat` varchar(45) DEFAULT NULL,
  `ap_pat` varchar(45) DEFAULT NULL,
  `edad` int(8) DEFAULT NULL,
  `tipo` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_usr`, `usuario`, `nombre`, `contra`, `ap_mat`, `ap_pat`, `edad`, `tipo`) VALUES
(1, 'netosaurio11', 'Ernesto', 'hola123', 'Valdiviezo', 'Mejia', 21, 1),
(2, 'lalocura007', 'Eduardo', 'bruno123', 'Valdiviezo', 'Mejia', 15, 1),
(6, 'papito28', 'Ernesto', 'juju', 'Valdiviezo', 'Mejia', 21, 2),
(7, 'WooSwag', 'Josue', 'josue123', 'Rivera', 'QuiÃ±ones', 21, 2),
(8, 'rodrigoprebe27', 'Rodrigo', 'rodrigo123', 'Maldonado', 'Vivas', 21, 2),
(9, 'ungooy', 'Angel', 'angel123', 'Ãlvarez', 'VÃ¡squez', 20, 2),
(10, 'capndunk', 'juan', 'bean123', 'Reyes', 'Lopez', 22, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_p`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_usr`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_usr` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
