-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-04-2024 a las 18:03:00
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
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`nombre`, `usuario_id`) VALUES
('Defensores del BOBI', 1);

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
('Defensores del BOBI', 1, 1),
('Defensores del BOBI', 11, 0),
('Defensores del BOBI', 19, 0),
('Defensores del BOBI', 25, 0),
('Defensores del BOBI', 18, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE `jugador` (
  `id` int(11) NOT NULL,
  `posicion` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `puntos` int(11) NOT NULL,
  `puntos_totales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`id`, `posicion`, `nombre`, `apellido`, `puntos`, `puntos_totales`) VALUES
(1, 'def', 'Fermin', 'Robledo', 0, 0),
(4, 'del', 'Lautaro', 'Gonzalez', 0, 0),
(5, 'def', 'Emilio', 'Parras', 0, 0),
(6, 'def', 'Santiago', 'Iturralde', 0, 0),
(7, 'def', 'Lucas', 'Hernandez', 0, 0),
(8, 'def', 'Lautaro', 'Lario', 0, 0),
(9, 'def', 'Matías', 'Fleitas', 0, 0),
(10, 'del', 'Valentín', 'Hermina', 0, 0),
(11, 'del', 'Mateo', 'Mangano', 0, 0),
(12, 'med', 'Tomas', 'Genco', 0, 0),
(13, 'med', 'Nicolás', 'Miccio', 0, 0),
(14, 'med', 'Leonel', 'Casamayou', 0, 0),
(15, 'med', 'Mateo', 'Tordelli', 0, 0),
(16, 'arq', 'Nacho', 'Amado', 0, 0),
(17, 'def', 'Nicolas', 'Leone', 0, 0),
(18, 'del', 'Martin', 'Melo', 0, 0),
(19, 'def', 'Tomas', 'Armendáriz', 0, 0),
(20, 'arq', 'Ramiro', 'Alvarez', 0, 0),
(21, 'med', 'Luca', 'Gorosito', 0, 0),
(22, 'del', 'Bautista', 'Fauret', 0, 0),
(23, 'med', 'Mateo', 'Vitale', 0, 0),
(24, 'med', 'Bautista', 'Perez', 0, 0),
(25, 'med', 'Gianluca', 'Amici', 0, 0),
(26, 'del', 'Enzo', 'Amici', 0, 0),
(27, 'def', 'Giuliano', 'Amici', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntaje`
--

CREATE TABLE `puntaje` (
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
  `puntos_totales` int(11) NOT NULL,
  `puntos_ult` int(11) NOT NULL,
  `ranking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `nombre`, `apellido`, `password`, `hizoCambio`, `puntos_totales`, `puntos_ult`, `ranking`) VALUES
(1, 'FerRobledo', 'Fermin', 'Robledo', '$2y$10$b.isbHDmBdLZCeZ9k/9EzO9eqMpmRJ7gQY4OiWVceu.fdfIb6cKgS', 1, 0, 0, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
