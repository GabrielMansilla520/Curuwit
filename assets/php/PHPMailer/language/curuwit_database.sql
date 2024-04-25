-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2023 a las 11:21:37
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
-- Base de datos: `curuwit_database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `contenido` text DEFAULT NULL,
  `fecha_publicacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `respuesta_a` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `usuario_id`, `contenido`, `fecha_publicacion`, `respuesta_a`, `imagen`) VALUES
(12, 7, 'Hola MUNDO', '2023-11-16 20:30:38', NULL, NULL),
(13, 7, 'Hola ', '2023-11-16 20:31:44', 12, NULL),
(14, 8, 'Holis.', '2023-11-16 20:35:24', NULL, NULL),
(15, NULL, 'The Marvels', '2023-11-16 20:49:08', NULL, NULL),
(16, NULL, 'xd', '2023-11-16 20:50:23', NULL, '6556808f43620_f290bce4cedeaf5b76e33e6c116b378f.jpg'),
(17, NULL, 'lalalala', '2023-11-16 20:56:44', NULL, '6556820c962d4_f290bce4cedeaf5b76e33e6c116b378f.jpg'),
(18, NULL, 'wswswsws', '2023-11-16 20:59:07', NULL, '6556829bb6d70_f290bce4cedeaf5b76e33e6c116b378f.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `nombre_usuario` varchar(50) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `recordar_contraseña` tinyint(1) DEFAULT NULL,
  `foto_perfil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `nombre_usuario`, `correo`, `contrasena`, `fecha_nacimiento`, `recordar_contraseña`, `foto_perfil`) VALUES
(7, 'Daniel', 'Colugnatti', 'ELDANO23', 'danielcolugnatti67@gmail.com', '$2y$10$qFJv6M5vaRFnhM0UcTSzkuTYvcmCxBKI/OXH51T2TcEBTIYK9AUGG', '2003-07-25', 1, 'carpeta_de_subida/perfil_65567b95f07ce0.78954427.png'),
(8, 'Gabriel Ignacio', 'Mansilla González', 'Gabriel Jones', 'mmarti.mansilla74@gmail.com', '$2y$10$Dn22n4KqjCP6ZUWy1H98FeXn64Xro0mdcrwg8K9LiIwhJTbXQ2YEq', '2003-12-14', 1, 'carpeta_de_subida/perfil_65567cfedd7c81.63001962.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `respuesta_a` (`respuesta_a`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `publicaciones_ibfk_2` FOREIGN KEY (`respuesta_a`) REFERENCES `publicaciones` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
