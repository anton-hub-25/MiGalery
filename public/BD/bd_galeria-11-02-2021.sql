-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-02-2021 a las 21:07:08
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_galeria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `categoria`, `descripcion`) VALUES
(2, 'Belleza/Moda', 'S/N.'),
(3, 'Animales', 'S/N.'),
(4, 'Arquitectura/Edificios', 'S/N.'),
(5, 'Ciencia/Tecnologia', 'S/N.'),
(6, 'Comidas/bebidas', 'S/N.'),
(7, 'Deportes', 'S/N.'),
(8, 'Educacion', 'S/N.'),
(9, 'Emociones', 'S/N.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id` int(11) NOT NULL,
  `idUsuario` bigint(20) UNSIGNED DEFAULT NULL,
  `idCategoria` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id`, `idUsuario`, `idCategoria`, `titulo`, `precio`, `descripcion`, `nombre`) VALUES
(20, 1, 5, 'Odit praesentium', '200.00', 'Reiciendis quaerat eaque veniam aut reprehenderit ...', 'aDmEIdACqGbdcb2a6b875edc22b436a6a0afcb6481.jpg'),
(21, 1, 8, 'Odit praesentium', '150.00', 'Reiciendis quaerat eaque veniam aut reprehenderit ...', 'rQIrbAV9P7suzuki-bandir-650-s-739-a.jpg'),
(22, 1, 2, 'Odit praesentium', '150.00', 'Reiciendis quaerat eaque veniam aut reprehenderit ...', 'UgWDNayLHIsuzuki-bandir-650-s-739-a.jpg'),
(23, 1, 7, 'Odit praesentium', '150.00', 'Reiciendis quaerat eaque veniam aut reprehenderit ...', 'Gjznf8X9pelogo antiguo.png'),
(24, 1, 7, 'Odit praesentium', '250.00', 'Reiciendis quaerat eaque veniam aut reprehenderit ...', 'wU75QmpZZHbenches.jpg'),
(25, 1, 5, 'Odit praesentium', '150.00', 'Reiciendis quaerat eaque veniam aut reprehenderit ...', 'P0UcJ1jjuQrails.jpg'),
(26, 1, 5, 'Odit praesentium', '250.00', 'Imagenes de otornoReiciendis quaerat eaque veniam aut reprehenderit ...', 'Bx3Dt2l0sFsky.jpg'),
(27, 1, 8, 'Odit praesentium', '250.00', 'Reiciendis quaerat eaque veniam aut reprehenderit ...', 'WpA2i3jOUVtunnel.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('rickymorty963@gmail.com', '$2y$10$itab/aNu/qCMw7jgM4VgKOebgIiIftWP7rxgUK4PBS6vHBbbn99ba', '2021-02-09 19:11:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `tag` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tag`
--

INSERT INTO `tag` (`id`, `tag`, `descripcion`) VALUES
(3, 'Espontaneo', 'S/N.'),
(4, 'Plantilla', 'S/N.'),
(5, 'Bonitas', 'S/N.'),
(6, 'descargar', 'S/N.'),
(7, 'mejores', 'S/N.'),
(8, 'anime', 'S/N.'),
(9, 'desamor', 'S/N.'),
(10, 'fondo', 'S/N.'),
(11, 'flores', 'S/N.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag_imagen`
--

CREATE TABLE `tag_imagen` (
  `id` int(11) NOT NULL,
  `idTag` int(11) NOT NULL,
  `idImagen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tag_imagen`
--

INSERT INTO `tag_imagen` (`id`, `idTag`, `idImagen`) VALUES
(109, 7, 27),
(110, 9, 27),
(111, 11, 27),
(112, 4, 27),
(113, 3, 26),
(114, 3, 25),
(115, 3, 24),
(116, 9, 24),
(117, 3, 23),
(118, 5, 23),
(119, 10, 23),
(120, 6, 23),
(121, 3, 22),
(122, 10, 21),
(123, 10, 20),
(124, 4, 20),
(125, 6, 20),
(126, 7, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema_imagen`
--

CREATE TABLE `tema_imagen` (
  `id` int(11) NOT NULL,
  `idTema` int(11) NOT NULL,
  `idImagen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Edgar', 'rickymorty963@gmail.com', NULL, '$2y$10$pY49asHY.WalScs.gAGhAeN87zMnybLyiy32ftfLvm7IV9YNLqtBW', NULL, '2021-01-12 07:32:53', '2021-01-12 07:32:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_imagen_usuario` (`idUsuario`),
  ADD KEY `FK_imagenCategoria` (`idCategoria`);

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
-- Indices de la tabla `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tag_imagen`
--
ALTER TABLE `tag_imagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_tag_imagen` (`idTag`),
  ADD KEY `f_tag_imagen1` (`idImagen`);

--
-- Indices de la tabla `tema_imagen`
--
ALTER TABLE `tema_imagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_tema_imagen` (`idTema`),
  ADD KEY `f_tema_imagen2` (`idImagen`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tag_imagen`
--
ALTER TABLE `tag_imagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT de la tabla `tema_imagen`
--
ALTER TABLE `tema_imagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `FK_imagenCategoria` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `f_imagen_usuario` FOREIGN KEY (`idUsuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `tag_imagen`
--
ALTER TABLE `tag_imagen`
  ADD CONSTRAINT `f_tag_imagen` FOREIGN KEY (`idTag`) REFERENCES `tag` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `f_tag_imagen1` FOREIGN KEY (`idImagen`) REFERENCES `imagen` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
