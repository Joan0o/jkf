-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2018 a las 07:20:41
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sala`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banda`
--

create database if not exists sala;
use sala;

CREATE TABLE `banda` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `bio` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `banda`
--

INSERT INTO `banda` (`id`, `nombre`, `bio`, `created_at`, `updated_at`) VALUES
(1, 'null', 'null', '2018-10-26 22:43:18', '0000-00-00 00:00:00'),
(2, 'Dmind', 'Tributo a iron maiden', '2018-10-26 22:43:01', '2018-10-23 07:57:41'),
(4, 'mi otra banda', 'Info', '2018-11-13 02:20:54', '2018-11-13 07:20:54'),
(5, 'Un nombre serio', 'Oh it works', '2018-11-13 02:23:15', '2018-11-13 07:23:15'),
(6, 'Banda de customer', 'dubi dubi duba dubi dubi dubaa', '2018-10-23 08:50:32', '2018-10-23 08:50:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion`
--

CREATE TABLE `cancion` (
  `id` int(11) NOT NULL,
  `nombre` text,
  `links` text,
  `banda_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cancion`
--

INSERT INTO `cancion` (`id`, `nombre`, `links`, `banda_id`, `created_at`, `updated_at`) VALUES
(1, '123', NULL, 2, '2018-10-23 08:07:26', '2018-10-23 08:07:26'),
(2, 'what now', '[\"sfs\"]', 2, '2018-10-23 08:10:11', '2018-10-23 08:10:11'),
(3, 'sdgsd', '[\"ss.com\"]', 2, '2018-10-23 08:18:16', '2018-10-23 08:18:16'),
(4, '1', '[\"1\",\"3\"]', 5, '2018-10-27 03:01:53', '2018-10-27 03:01:53'),
(5, 'una cancion', '[\"Aún no sé cómo hacer esto funcional pero hey... almenos está la opcion\",\"jeje\"]', 4, '2018-11-13 07:21:46', '2018-11-13 07:21:46'),
(6, 'pinpon', '[\"jee\"]', 4, '2018-11-13 07:23:01', '2018-11-13 07:23:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `texto` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(145) NOT NULL,
  `texto` text,
  `recursos` text,
  `tema_id` int(11) NOT NULL,
  `comentarios_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio`
--

CREATE TABLE `ejercicio` (
  `id` int(11) NOT NULL,
  `texto` text,
  `curso_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ensayo`
--

CREATE TABLE `ensayo` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `fecha_programada` varchar(15) DEFAULT NULL,
  `hora` int(11) DEFAULT NULL,
  `duracion` int(11) DEFAULT NULL,
  `estado` text,
  `pagado` decimal(10,0) DEFAULT NULL,
  `banda_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `contacto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ensayo`
--

INSERT INTO `ensayo` (`id`, `created_at`, `fecha_programada`, `hora`, `duracion`, `estado`, `pagado`, `banda_id`, `updated_at`, `contacto`) VALUES
(3, '2018-10-27 07:54:25', '2018-10-27', 7, 1, 'reservado', '0', 1, '2018-10-27 07:54:25', '123 - 213'),
(4, '2018-10-27 07:55:37', '2018-10-27', 7, 1, 'reservado', '0', 1, '2018-10-27 07:55:37', '123 - 213'),
(5, '2018-11-13 07:53:10', '2018-11-13', 7, 2, 'reservado', '0', 2, '2018-11-13 07:53:10', NULL),
(6, '2018-11-13 08:13:51', '2018-11-13', 9, 2, 'reservado', '0', 2, '2018-11-13 08:13:51', NULL),
(7, '2018-11-13 08:25:04', '2018-11-13', 11, 1, 'reservado', '0', 1, '2018-11-13 08:25:04', 'Joan - 1012378884'),
(8, '2018-11-13 09:38:20', '2018-11-13', 12, 2, 'reservado', '0', 1, '2018-11-13 09:38:20', '223 - ppe'),
(9, '2018-11-13 10:12:15', '2018-11-13', 15, 1, 'reservado', '0', 1, '2018-11-13 10:12:15', '12 - 1ewq|'),
(10, '2018-11-13 10:12:29', '2018-11-13', 16, 2, 'reservado', '0', 1, '2018-11-13 10:12:29', '12 - 1ewq|'),
(11, '2018-11-13 10:17:04', '2018-11-13', 18, 1, 'reservado', '0', 1, '2018-11-13 10:17:04', '12 - 1ewq|');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `membresia`
--

CREATE TABLE `membresia` (
  `id` int(11) NOT NULL,
  `fecha_adquirida` datetime DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `usuario_has_banda_usuario_id` int(11) NOT NULL,
  `usuario_has_banda_banda_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `pregunta` varchar(345) DEFAULT NULL,
  `detalles` text,
  `ejercicio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL,
  `respuesta` varchar(100) DEFAULT NULL,
  `esCorrecta` tinyint(4) DEFAULT NULL,
  `preguntas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE `tema` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `documento` varchar(45) DEFAULT NULL,
  `foto` varchar(140) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `email`, `password`, `celular`, `documento`, `foto`, `remember_token`, `email_verified_at`, `updated_at`, `created_at`) VALUES
(2, 'Joan Sebastián Varón forero', 'shuan779@gmail.com', '$2y$10$mUm1fwweiMWwQzDuRTb5OOkBKWWLqnxUyFEX9P1ATrdfZXW8fE45u', NULL, NULL, NULL, 'CdbLwMODcxagv5trGXKOkAWZrATekG08AsDvbKZUZ9vowaskSYb3A054sgFg', '2018-11-13 05:56:04', '2018-11-13 05:56:04', '2018-11-13 05:56:04'),
(3, 'Customer', 'customer@customer.com', '$2y$10$KSrHuIEMDCaDWDJfjxxmVeL1XTjqwn2.gf1/vjets53/oNTpUf2TW', NULL, NULL, NULL, NULL, '2018-10-23 03:47:26', '2018-10-23 08:47:26', '2018-10-23 08:47:26'),
(4, 'custom3', 'custom1@custom.com', '$2y$10$fmVyetYu3CNyhrdIL738N.vFFJW1/M2F7xIup6L54AFPNakuBTAay', NULL, NULL, NULL, NULL, '2018-11-13 06:18:27', '2018-11-13 11:18:27', '2018-11-13 11:18:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_has_banda`
--

CREATE TABLE `usuario_has_banda` (
  `usuario_id` int(11) NOT NULL,
  `banda_id` int(11) NOT NULL,
  `activo` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_has_banda`
--

INSERT INTO `usuario_has_banda` (`usuario_id`, `banda_id`, `activo`) VALUES
(2, 2, 1),
(2, 4, 1),
(2, 5, 1),
(3, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_has_curso`
--

CREATE TABLE `usuario_has_curso` (
  `usuario_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banda`
--
ALTER TABLE `banda`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cancion`
--
ALTER TABLE `cancion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cancion_banda` (`banda_id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`,`tema_id`,`comentarios_id`),
  ADD KEY `fk_curso_tema1_idx` (`tema_id`),
  ADD KEY `fk_curso_comentarios1_idx` (`comentarios_id`);

--
-- Indices de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD PRIMARY KEY (`id`,`curso_id`),
  ADD KEY `fk_ejercicio_curso1_idx` (`curso_id`);

--
-- Indices de la tabla `ensayo`
--
ALTER TABLE `ensayo`
  ADD PRIMARY KEY (`id`,`banda_id`),
  ADD KEY `fk_ensayo_banda_idx` (`banda_id`);

--
-- Indices de la tabla `membresia`
--
ALTER TABLE `membresia`
  ADD PRIMARY KEY (`id`,`usuario_has_banda_usuario_id`,`usuario_has_banda_banda_id`),
  ADD KEY `fk_membresia_usuario_has_banda1_idx` (`usuario_has_banda_usuario_id`,`usuario_has_banda_banda_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`,`ejercicio_id`),
  ADD KEY `fk_preguntas_ejercicio1_idx` (`ejercicio_id`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`,`preguntas_id`),
  ADD KEY `fk_respuestas_preguntas1_idx` (`preguntas_id`);

--
-- Indices de la tabla `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correounico` (`email`);

--
-- Indices de la tabla `usuario_has_banda`
--
ALTER TABLE `usuario_has_banda`
  ADD PRIMARY KEY (`usuario_id`,`banda_id`),
  ADD KEY `fk_usuario_has_banda_banda1_idx` (`banda_id`),
  ADD KEY `fk_usuario_has_banda_usuario1_idx` (`usuario_id`);

--
-- Indices de la tabla `usuario_has_curso`
--
ALTER TABLE `usuario_has_curso`
  ADD PRIMARY KEY (`usuario_id`,`curso_id`),
  ADD KEY `fk_usuario_has_curso_curso1_idx` (`curso_id`),
  ADD KEY `fk_usuario_has_curso_usuario1_idx` (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banda`
--
ALTER TABLE `banda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cancion`
--
ALTER TABLE `cancion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ensayo`
--
ALTER TABLE `ensayo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `membresia`
--
ALTER TABLE `membresia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tema`
--
ALTER TABLE `tema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cancion`
--
ALTER TABLE `cancion`
  ADD CONSTRAINT `cancion_banda` FOREIGN KEY (`banda_id`) REFERENCES `banda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `fk_curso_comentarios1` FOREIGN KEY (`comentarios_id`) REFERENCES `comentarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_curso_tema1` FOREIGN KEY (`tema_id`) REFERENCES `tema` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD CONSTRAINT `fk_ejercicio_curso1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ensayo`
--
ALTER TABLE `ensayo`
  ADD CONSTRAINT `fk_ensayo_banda` FOREIGN KEY (`banda_id`) REFERENCES `banda` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `membresia`
--
ALTER TABLE `membresia`
  ADD CONSTRAINT `fk_membresia_usuario_has_banda1` FOREIGN KEY (`usuario_has_banda_usuario_id`,`usuario_has_banda_banda_id`) REFERENCES `usuario_has_banda` (`usuario_id`, `banda_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `fk_preguntas_ejercicio1` FOREIGN KEY (`ejercicio_id`) REFERENCES `ejercicio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `fk_respuestas_preguntas1` FOREIGN KEY (`preguntas_id`) REFERENCES `preguntas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_has_banda`
--
ALTER TABLE `usuario_has_banda`
  ADD CONSTRAINT `fk_usuario_has_banda_banda1` FOREIGN KEY (`banda_id`) REFERENCES `banda` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_has_banda_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_has_curso`
--
ALTER TABLE `usuario_has_curso`
  ADD CONSTRAINT `fk_usuario_has_curso_curso1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_has_curso_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
