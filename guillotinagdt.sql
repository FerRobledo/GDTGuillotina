-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-07-2024 a las 22:50:09
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `guillotinagdt`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `nombre` varchar(45) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `puntos` int(11) NOT NULL,
  `puntos_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`nombre`, `usuario_id`, `puntos`, `puntos_total`) VALUES
('Defensores del BOBI', 1, 0, 29),
('fsafsa', 2, 0, 38);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_jugador`
--

CREATE TABLE `equipo_jugador` (
  `nombre_equipo` varchar(45) NOT NULL,
  `jugador_id` int(11) NOT NULL,
  `es_capitan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipo_jugador`
--

INSERT INTO `equipo_jugador` (`nombre_equipo`, `jugador_id`, `es_capitan`) VALUES
('Defensores del BOBI', 10, 0),
('Defensores del BOBI', 11, 0),
('Defensores del BOBI', 14, 0),
('Defensores del BOBI', 1, 1),
('Defensores del BOBI', 5, 0),
('fsafsa', 1, 1),
('fsafsa', 10, 0),
('fsafsa', 23, 0),
('fsafsa', 14, 0),
('fsafsa', 19, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE `jugador` (
  `id` int(11) NOT NULL,
  `posicion` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `puntos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`id`, `posicion`, `nombre`, `apellido`, `estado`, `puntos`) VALUES
(1, 'def', 'Fermin', 'Robledo', 'lista', 0),
(4, 'del', 'Lautaro', 'Gonzalez', 'lista', 0),
(5, 'def', 'Emilio', 'Parras', 'duda', 0),
(6, 'def', 'Santiago', 'Iturralde', 'noJuega', 0),
(7, 'def', 'Lucas', 'Hernandez', 'lista', 0),
(8, 'def', 'Lautaro', 'Lario', 'lista', 0),
(9, 'def', 'Matías', 'Fleitas', 'duda', 0),
(10, 'del', 'Valentín', 'Hermina', 'lista', 0),
(11, 'del', 'Mateo', 'Mangano', 'jugoCopa', 0),
(12, 'med', 'Tomas', 'Genco', 'lista', 0),
(13, 'med', 'Nicolás', 'Miccio', 'lista', 0),
(14, 'med', 'Leonel', 'Casamayou', 'lista', 0),
(15, 'med', 'Mateo', 'Tordelli', 'lista', 0),
(16, 'arq', 'Nacho', 'Amado', 'lista', 0),
(17, 'def', 'Nicolas', 'Leone', 'lista', 0),
(18, 'del', 'Martin', 'Melo', 'lista', 0),
(19, 'def', 'Tomas', 'Armendáriz', 'lista', 0),
(20, 'arq', 'Ramiro', 'Alvarez', 'lista', 0),
(21, 'med', 'Luca', 'Gorosito', 'lista', 0),
(22, 'del', 'Bautista', 'Fauret', 'noJuega', 0),
(23, 'med', 'Mateo', 'Vitale', 'lista', 0),
(24, 'med', 'Bautista', 'Perez', 'lista', 0),
(25, 'med', 'Gianluca', 'Amici', 'lista', 0),
(26, 'del', 'Enzo', 'Amici', 'lista', 0),
(27, 'def', 'Giuliano', 'Amici', 'lista', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntaje`
--

CREATE TABLE `puntaje` (
  `id` int(11) NOT NULL,
  `torneo` varchar(45) NOT NULL,
  `fecha` int(11) NOT NULL,
  `id_jugador` int(11) NOT NULL,
  `valoracion` double NOT NULL,
  `figura` tinyint(1) NOT NULL,
  `valla_invicta` tinyint(1) NOT NULL,
  `gol_recibido` int(11) DEFAULT NULL,
  `gol_oro` int(11) DEFAULT NULL,
  `tarjeta_amarilla` tinyint(1) NOT NULL,
  `tarjeta_roja` tinyint(1) NOT NULL,
  `gol` int(11) DEFAULT NULL,
  `penal_errado` int(11) DEFAULT NULL,
  `penal_atajado` int(11) DEFAULT NULL,
  `gol_penal` int(11) DEFAULT NULL,
  `gol_contra` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `puntaje`
--

INSERT INTO `puntaje` (`id`, `torneo`, `fecha`, `id_jugador`, `valoracion`, `figura`, `valla_invicta`, `gol_recibido`, `gol_oro`, `tarjeta_amarilla`, `tarjeta_roja`, `gol`, `penal_errado`, `penal_atajado`, `gol_penal`, `gol_contra`) VALUES
(9, 'Apertura 2024', 1, 14, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 'Apertura 2024', 1, 14, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 'Apertura 2024', 1, 19, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 'Apertura 2024', 1, 22, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 'Apertura 2024', 2, 20, 8, 0, 0, 2, 0, 1, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `password` varchar(200) NOT NULL,
  `hizoCambio` tinyint(1) NOT NULL,
  `ranking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `nombre`, `apellido`, `password`, `hizoCambio`, `ranking`) VALUES
(1, 'FerRobledo', 'Fermin', 'Robledo', '$2y$10$b.isbHDmBdLZCeZ9k/9EzO9eqMpmRJ7gQY4OiWVceu.fdfIb6cKgS', 1, 0),
(2, 'prueba254', 'prueba25/4', 'sda', '$2y$10$PW0CIHTfhh4t7kbxA2nhS.aTnzpJtkr2J84Olavw64q5miIf3ZoAS', 0, 0),
(3, 'fdsa', 'fas', 'fsad', '$2y$10$mpv3Epzjhc9jgIjN71Tk2O900Hp8JjU6smY49gRC8Ri92.JFULXBq', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `puntaje`
--
ALTER TABLE `puntaje`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `jugador`
--
ALTER TABLE `jugador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `puntaje`
--
ALTER TABLE `puntaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
