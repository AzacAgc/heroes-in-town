-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-08-2017 a las 20:42:58
-- Versión del servidor: 5.6.17
-- Versión de PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `heroes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denuncia`
--

CREATE TABLE IF NOT EXISTS `denuncia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipoDenuncia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenidoDenuncia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaHora` datetime NOT NULL,
  `ubicacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IdUsuario` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `denuncia_idusuario_foreign` (`IdUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `denuncia`
--

INSERT INTO `denuncia` (`id`, `foto`, `tipoDenuncia`, `contenidoDenuncia`, `fechaHora`, `ubicacion`, `IdUsuario`, `created_at`, `updated_at`) VALUES
(1, 'heroes_denuncia_1501043984.jpg', 'casa', 'Descripción uno', '2017-07-05 23:39:00', '19.34753115537596, -98.17275524139404', 1, '2017-07-26 09:39:44', '2017-07-26 09:39:44'),
(2, 'heroes_denuncia_1501044030.jpg', 'casa', 'Descripción uno', '2017-07-04 20:30:00', '19.34753115537595, -98.17275524139404', 1, '2017-07-26 09:40:31', '2017-07-26 09:40:31'),
(3, 'heroes_denuncia_1501090212.jpg', 'casa', 'Intento 2', '2017-07-02 17:29:00', '19.347915826661406, -98.17217588424683', 1, '2017-07-26 22:30:12', '2017-07-26 22:30:12'),
(4, 'heroes_denuncia_1501095096.jpg', 'social', 'Hubo un asalto', '2017-07-19 01:50:00', '19.34688328589811, -98.17193984985352', 1, '2017-07-26 23:51:36', '2017-07-26 23:51:36'),
(5, 'heroes_denuncia_1501100016.jpg', 'asalto', 'Otra descripción', '2017-07-03 04:25:00', '19.34672131812673, -98.17095279693604', 1, '2017-07-27 01:13:36', '2017-07-27 01:13:36'),
(6, 'heroes_denuncia_1501100111.jpg', 'carro', 'Robaron mi auto', '2017-02-13 15:14:00', '19.34621516780505, -98.1706953048706', 1, '2017-07-27 01:15:11', '2017-07-27 01:15:11'),
(7, 'heroes_denuncia_1501100231.jpg', 'homicidio', 'Un muerto', '2017-07-10 15:40:00', '19.34676181008464, -98.17028760910034', 1, '2017-07-27 01:17:11', '2017-07-27 01:17:11'),
(8, 'heroes_denuncia_1501100487.jpg', 'otro', 'Un carro sospechoso', '2017-07-17 03:20:00', '19.347247712795912, -98.16895723342896', 1, '2017-07-27 01:21:27', '2017-07-27 01:21:27'),
(9, 'heroes_denuncia_1501638044.jpg', 'asalto', 'Me asaltaron dos personas en mascaradas.', '2017-06-06 22:40:00', '19.320028447570493, -98.24117839336395', 5, '2017-08-02 06:40:44', '2017-08-02 06:40:44'),
(10, 'heroes_denuncia_1502155741.jpg', 'otro', 'Misteriosamente se creo un lago artificial, para unos patos... pero no hay patos en el área.', '2016-03-23 13:00:00', '19.233048163679516, -98.23824405670166', 2, '2017-08-08 06:29:01', '2017-08-08 06:29:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE IF NOT EXISTS `mensaje` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `emisor` int(11) NOT NULL,
  `IdUsuario` int(10) unsigned NOT NULL,
  `contenidoMensaje` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaHora` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mensaje_idusuario_foreign` (`IdUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=57 ;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(50, '2014_10_12_000000_create_users_table', 1),
(51, '2014_10_12_100000_create_password_resets_table', 1),
(52, '2017_07_19_031104_denuncia', 1),
(53, '2017_07_19_031255_notificacion', 1),
(54, '2017_07_19_031400_mensaje', 1),
(55, '2017_07_19_031441_presculpable', 1),
(56, '2017_07_19_031516_numemergencia', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

CREATE TABLE IF NOT EXISTS `notificacion` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fechaHora` datetime NOT NULL,
  `contenidoNotificacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IdUsuario` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notificacion_idusuario_foreign` (`IdUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numemergencia`
--

CREATE TABLE IF NOT EXISTS `numemergencia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombreDependencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('seven@gmail.com', '$2y$10$cwdrMfxTNjuDllQO.dbPXubXMEb6oOUHCz9T/wFQ.OfWye9gtv.Aq', '2017-07-30 04:23:29'),
('cesar.garcia.acoltzi@gmail.com', '$2y$10$SYmvAh9i50Y0GYW2yd7Rdut1bxsKEm0iBhNCb6YhkqCMRso73ZLPe', '2017-08-02 04:10:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presculpable`
--

CREATE TABLE IF NOT EXISTS `presculpable` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombreAlias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domicilio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descFisica` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fotoPc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `denuncias_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `presculpable_denuncias_id_foreign` (`denuncias_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `presculpable`
--

INSERT INTO `presculpable` (`id`, `nombreAlias`, `domicilio`, `descFisica`, `fotoPc`, `denuncias_id`, `created_at`, `updated_at`) VALUES
(1, 'Alias', NULL, 'Description', NULL, 2, '2017-07-26 09:40:31', '2017-07-26 09:40:31'),
(2, 'Nombre', 'Calle', NULL, NULL, 3, '2017-07-26 22:30:12', '2017-07-26 22:30:12'),
(3, NULL, NULL, 'Una descripción', 'heroes_denuncia_presculp_1501095096.jpg', 4, '2017-07-26 23:51:36', '2017-07-26 23:51:36'),
(4, 'asd', 'adsf adsf', 'dfs', NULL, 5, '2017-07-27 01:13:36', '2017-07-27 01:13:36'),
(5, 'Ladron', 'Desconocido', NULL, 'heroes_denuncia_presculp_1501100111.jpg', 6, '2017-07-27 01:15:11', '2017-07-27 01:15:11'),
(6, 'Desconocido', 'También', 'No lo vi', NULL, 7, '2017-07-27 01:17:11', '2017-07-27 01:17:11'),
(7, 'Ni idea', 'Yo menos', 'Sigue buscando', 'heroes_denuncia_presculp_1501100487.jpg', 8, '2017-07-27 01:21:27', '2017-07-27 01:21:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Azac', 'azac@gmail.com', '$2y$10$aILlgzZAuA4DJtVg1dbNQODtm3W5XqsmmDDvcUiEDz7oYjGzoTG2a', NULL, 'c8JC3gg2MV69ZZwQV4csOt7EJ9q44EEYKUYeJpMQ35n69KRNDxAKNvo2OEa4', '2017-07-26 09:39:00', '2017-07-26 09:39:00'),
(2, 'Lucas', 'lucas@gmail.com', '$2y$10$ZDZUwCyQr7DYyp6SJ12Ve.nmijXQvcwrNPkn7wi8li.fnCxUqeKhu', NULL, 'TcKobZ0LUrZmjaaMIq5jkNk5J8AOYbJgC7S7BtM7xtXRqIIlrrDRkAXgzCUs', '2017-07-29 06:18:49', '2017-07-29 06:18:49'),
(3, 'Cesar', 'cesar@gmail.com', '$2y$10$k/WdoHBSEzQYxpLMPM5ZFuoKsxUuN3qWmEKxQOWYeVnadc8f9621y', NULL, 'JEDbo0DA7PfyZiq2k7VC5yAsAuZ8ITYQ7Nj8VKIMcaSAADsmLlOnbRZ99oBY', '2017-07-29 21:13:00', '2017-07-29 21:13:00'),
(4, 'Seven', 'seven@gmail.com', '$2y$10$p88Zj6ZwKQMUr6dLcfZwa.caD1XCqrcddKNdqvV2.MO5Dd0Xg7YeC', NULL, 'FHhDXCPhBrMOzJbqie7sZQBvaOyHv7sAVamZfg6pRMhUjJ6VBLTyiD23KXbt', '2017-07-29 21:17:05', '2017-07-29 21:17:05'),
(5, 'Galicia', 'lucas.galicia.5@gmail.com', '$2y$10$B4fiCNXCh64Vzz1zjYdxcuXhg0lZ0yvvlYvxovtZYGFdhSAOn9Yiq', NULL, 'HvFAb7B4y2InMo7WJyUEAOlxejhS8y63hDIiBadLLcRN4vpejwhNd6cBOUNp', '2017-07-30 04:34:36', '2017-08-02 05:35:25'),
(6, 'Ana', 'ana@gmail.com', '$2y$10$Ttztr1c9NDgSCo6U42bPn.7khm0YGm8nSeocdCzXKw6mZ9wpL7Wi6', NULL, 'btOeJhVAIR4B29GhJ4IiK8uZSGPnd8zXSwd2kpHQAubgnNt0vR4IjNVUH0O4', '2017-07-30 04:38:32', '2017-07-30 04:38:32'),
(7, 'Lucy', 'lucy@gmail.com', '$2y$10$1.TU.XaspT.7e6gvJLB1jufbRoRmbMQI.44wfljmQN0IWk76JV.oK', NULL, 'f30AeVVPcn8FBJjCw6NzmMnvxz9VJBBkzbq3jpsWHqOOgrv2NFxCvPbMjTMo', '2017-07-30 04:43:02', '2017-07-30 04:43:02'),
(8, 'Agc', 'cesar.garcia.acoltzi@gmail.com', '$2y$10$ECbN3YuoGhZ69AW1n9ySBeS4Su2piqhd9eAeJ6nSKPx8hNol0dSKa', NULL, 'HvNs7aqoQ7VVr2lr9FWGtUpPDBS01LsJIAi8cXVOxUz0iVKMeyTVDhIxdH5z', '2017-08-01 08:25:48', '2017-08-01 08:25:48'),
(9, 'Belén', 'belen@gmail.com', '$2y$10$Y7QxI5WqenCTKc.ymGPU9OuLLbwCYixhBSoBNoWGYETZA/FwIYlgq', NULL, 'y14ILH3NCI9SyxR9hcmO0RUkDK9DuoTY0oNrjodhcDrbUkOz7HYQcEyKDptm', '2017-08-01 21:34:50', '2017-08-01 21:34:50'),
(10, 'Azac Agc Acoltzi', 'fenix-azul_242@hotmail.com', NULL, 'https://graph.facebook.com/v2.9/1614191105258317/picture?type=normal', 'ONKtu4f2wdOFtGXlBysqlcExPcliWMznmvQpgPPB11odUvJ2ecbGf9oP3neb', '2017-08-02 07:03:41', '2017-08-02 07:03:41'),
(11, 'ABC', 'abc@gmail.com', '$2y$10$Wpt8rFch44y9wEzs6O.wcOPtpKHxnfhh44u1GEOtvVt.K3Bt.VZ1O', NULL, 'xKfeFfXlAsVemWdEChz0bNpiWYAJzEkS61WnPK7AtZSc5O0Ebyf1qLEHYBK7', '2017-08-03 19:41:33', '2017-08-03 19:41:33');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `denuncia`
--
ALTER TABLE `denuncia`
  ADD CONSTRAINT `denuncia_idusuario_foreign` FOREIGN KEY (`IdUsuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `mensaje_idusuario_foreign` FOREIGN KEY (`IdUsuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `notificacion_idusuario_foreign` FOREIGN KEY (`IdUsuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `presculpable`
--
ALTER TABLE `presculpable`
  ADD CONSTRAINT `presculpable_denuncias_id_foreign` FOREIGN KEY (`denuncias_id`) REFERENCES `denuncia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
