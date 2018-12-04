-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2018 a las 08:07:56
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
  `estado` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `banda`
--

INSERT INTO `banda` (`id`, `nombre`, `bio`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'null', 'null', 1, '2018-10-26 22:43:18', '0000-00-00 00:00:00'),
(2, 'Dmind', 'Tributo a iron maiden', -1, '2018-11-23 05:41:00', '2018-10-23 07:57:41'),
(4, 'Mi otra banda', 'Mi otra descripcion', -1, '2018-11-23 05:41:00', '2018-10-23 08:26:31'),
(5, 'jiji', 'Oh it works', -1, '2018-11-23 05:41:00', '2018-10-27 03:01:24'),
(6, 'Banda de customer', 'dubi dubi duba dubi dubi dubaa', -1, '2018-11-23 05:41:00', '2018-10-23 08:50:32'),
(7, 'hmp', '123', -1, '2018-11-23 05:36:56', '2018-11-23 10:36:56'),
(8, 'Dmind', 'una banda', 1, '2018-11-23 10:41:20', '2018-11-23 10:41:20'),
(9, 'Mine', 'famous', 1, '2018-11-23 10:49:05', '2018-11-23 10:49:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion`
--

CREATE TABLE `cancion` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `links` text,
  `banda_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cancion`
--

INSERT INTO `cancion` (`id`, `nombre`, `links`, `banda_id`, `created_at`, `updated_at`) VALUES
(19, '', 'qweqwe', 7, '2018-11-23 10:42:50', '2018-11-23 10:42:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `texto` text,
  `curso_id` int(11) NOT NULL
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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `nombre`, `descripcion`, `texto`, `updated_at`, `created_at`) VALUES
(1, 'Un curso', 'una descripcion', NULL, '2018-11-19 13:02:04', '2018-11-19 13:02:04'),
(2, 'Un curso', 'una descripcion', NULL, '2018-11-19 13:05:21', '2018-11-19 13:05:21'),
(3, 'Un curso', 'una descripcion', NULL, '2018-11-19 13:06:50', '2018-11-19 13:06:50'),
(4, 'Un curso', 'una descripcion', NULL, '2018-11-19 13:06:54', '2018-11-19 13:06:54'),
(5, 'asdasd', 'qweqweº', NULL, '2018-11-19 13:15:09', '2018-11-19 13:15:09'),
(6, 'asdasd', 'qweqweº', NULL, '2018-11-19 13:15:16', '2018-11-19 13:15:16'),
(7, 'asdasd', 'qweqweº', NULL, '2018-11-19 13:15:18', '2018-11-19 13:15:18'),
(8, 'asdasd', 'qweqweº', NULL, '2018-11-19 13:15:19', '2018-11-19 13:15:19'),
(9, 'asdasd', 'qweqweº', NULL, '2018-11-19 13:15:19', '2018-11-19 13:15:19'),
(10, 'asdasd', 'qweqweº', NULL, '2018-11-19 13:15:19', '2018-11-19 13:15:19'),
(11, 'qweqe', 'addsb', NULL, '2018-11-19 13:17:55', '2018-11-19 13:17:55'),
(12, 'qweqe', 'addsb', NULL, '2018-11-19 13:18:29', '2018-11-19 13:18:29');

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
  `contacto` varchar(200) DEFAULT NULL,
  `detalles_admin` text,
  `detalles_usuario` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ensayo`
--

INSERT INTO `ensayo` (`id`, `created_at`, `fecha_programada`, `hora`, `duracion`, `estado`, `pagado`, `banda_id`, `updated_at`, `contacto`, `detalles_admin`, `detalles_usuario`) VALUES
(8, '2018-11-19 10:40:38', '2018-11-19', 7, 1, 'reservado', '0', 1, '2018-11-19 10:40:38', '342 - admin@admin.com', '', ''),
(9, '2018-11-23 06:10:00', '2018-11-23', 7, 1, 'reservado', '0', 2, '2018-11-23 06:10:00', NULL, NULL, NULL),
(10, '2018-11-23 06:14:37', '2018-11-23', 8, 1, 'reservado', '0', 2, '2018-11-23 06:14:37', NULL, NULL, NULL),
(11, '2018-11-23 06:22:11', '2018-11-23', 9, 1, 'reservado', '0', 2, '2018-11-23 06:22:11', NULL, NULL, NULL),
(12, '2018-11-23 06:23:47', '2018-11-23', 10, 1, 'reservado', '0', 2, '2018-11-23 06:23:47', NULL, NULL, NULL),
(13, '2018-11-23 06:28:54', '2018-11-23', 11, 1, 'reservado', '0', 2, '2018-11-23 06:28:54', NULL, NULL, NULL),
(14, '2018-11-23 07:06:27', '2018-11-23', 12, 1, 'reservado', '0', 2, '2018-11-23 07:06:27', NULL, NULL, NULL),
(15, '2018-11-23 07:07:34', '2018-11-23', 13, 1, 'reservado', '0', 2, '2018-11-23 07:07:34', NULL, NULL, NULL),
(16, '2018-11-23 08:44:51', '2018-11-23', 14, 1, 'reservado', '0', 2, '2018-11-23 08:44:51', NULL, NULL, NULL),
(17, '2018-11-23 11:38:50', '2018-11-23', 15, 1, 'reservado', '0', 9, '2018-11-23 11:38:50', NULL, NULL, NULL);

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
  `nombre` varchar(45) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema_curso`
--

CREATE TABLE `tema_curso` (
  `id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `tema_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rol` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `email`, `password`, `celular`, `documento`, `foto`, `remember_token`, `email_verified_at`, `updated_at`, `created_at`, `rol`) VALUES
(2, 'Joan Sebastián Varón forero', 'shuan779@gmail.com', '$2y$10$nC1jZGlAWUFCMYVZDaLbkeF4lvKVlwUktozUKnwnlD9kr.wX3PNUS', '3178230128392', NULL, NULL, 'RXYffDZlpaGn7VmbT4TPCy8hSBLJKUgHy6RUi1hIDN2IrwEL06vo0iOfct4U', '2018-11-23 05:48:43', '2018-11-23 05:48:43', '2018-11-23 05:48:43', ''),
(3, 'Customer', 'customer@customer.com', '$2y$10$KSrHuIEMDCaDWDJfjxxmVeL1XTjqwn2.gf1/vjets53/oNTpUf2TW', NULL, NULL, NULL, NULL, '2018-10-23 03:47:26', '2018-10-23 08:47:26', '2018-10-23 08:47:26', ''),
(4, 'custom', 'custom@custom.com', '$2y$10$/CeSnLYfPqanykt4EPg9yuLeW9tPeD8hhNKOtib9.zf2iOx9JmqZC', NULL, NULL, NULL, 'uTjrcShiNvqCyGjb7OxhkU6l4ISbkLAqZqDt12MYppz0pXOqHKzafVqIZMKh', '2018-11-23 05:37:14', '2018-11-23 05:37:14', '2018-11-23 05:37:14', NULL),
(5, 'admin', 'jkfsala@gmail.com', '$2y$10$7VBbqZHYLE8aKQLe4gEisehBa.uDAkU1u.rOUzJbAqM4CDnmBw5tW', '342', NULL, NULL, NULL, '2018-11-23 02:11:08', '2018-11-23 02:11:08', '2018-11-23 02:11:08', 'admin'),
(6, 'a', 'a@a.a', '$2y$10$dQgdw5oPEpBfPmgKhZjeFO3z7dEW6DYbpW6ALA0bFKiisTbreRHD2', NULL, NULL, NULL, 'hmEXld4VSD9eDQbw1KcN7ECOo31aZ8g40mxbiBIJyzYiLGuaRXq1gvklra4c', '2018-11-23 05:44:04', '2018-11-23 05:44:04', '2018-11-23 05:44:04', NULL),
(7, 'b', 'b@b.b', '123123', '123', '123', '123', NULL, NULL, '2018-11-23 05:46:07', '2018-11-23 05:46:07', NULL),
(8, 'c', 'c@c.c', '123123', '123', '123', '123', NULL, NULL, '2018-11-23 05:46:32', '2018-11-23 05:46:32', NULL),
(9, 'd', 'd@d.d', '123123', '123', '123', '123', NULL, NULL, '2018-11-23 05:46:47', '2018-11-23 05:46:47', NULL),
(10, 'e', 'e@e.e', '123123', '123', '123', '123', NULL, NULL, '2018-11-23 05:47:10', '2018-11-23 05:47:10', NULL);

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
(2, 9, 1);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `comentario_curso` (`curso_id`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`) USING BTREE;

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
  ADD KEY `ensayo_bando` (`banda_id`);

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
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `tema_curso`
--
ALTER TABLE `tema_curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso_id_fk` (`curso_id`),
  ADD KEY `tema_id_fk` (`tema_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `cancion`
--
ALTER TABLE `cancion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ensayo`
--
ALTER TABLE `ensayo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- AUTO_INCREMENT de la tabla `tema_curso`
--
ALTER TABLE `tema_curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cancion`
--
ALTER TABLE `cancion`
  ADD CONSTRAINT `cancion_banda` FOREIGN KEY (`banda_id`) REFERENCES `banda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentario_curso` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`);

--
-- Filtros para la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD CONSTRAINT `fk_ejercicio_curso1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`);

--
-- Filtros para la tabla `ensayo`
--
ALTER TABLE `ensayo`
  ADD CONSTRAINT `ensayo_bando` FOREIGN KEY (`banda_id`) REFERENCES `banda` (`id`);

--
-- Filtros para la tabla `membresia`
--
ALTER TABLE `membresia`
  ADD CONSTRAINT `fk_membresia_usuario_has_banda1` FOREIGN KEY (`usuario_has_banda_usuario_id`,`usuario_has_banda_banda_id`) REFERENCES `usuario_has_banda` (`usuario_id`, `banda_id`);

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `fk_preguntas_ejercicio1` FOREIGN KEY (`ejercicio_id`) REFERENCES `ejercicio` (`id`);

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `fk_respuestas_preguntas1` FOREIGN KEY (`preguntas_id`) REFERENCES `preguntas` (`id`);

--
-- Filtros para la tabla `tema_curso`
--
ALTER TABLE `tema_curso`
  ADD CONSTRAINT `curso_id_fk` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tema_id_fk` FOREIGN KEY (`tema_id`) REFERENCES `tema` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_has_banda`
--
ALTER TABLE `usuario_has_banda`
  ADD CONSTRAINT `fk_usuario_has_banda_banda1` FOREIGN KEY (`banda_id`) REFERENCES `banda` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_has_banda_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_has_curso`
--
ALTER TABLE `usuario_has_curso`
  ADD CONSTRAINT `fk_usuario_has_curso_curso1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`),
  ADD CONSTRAINT `fk_usuario_has_curso_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
