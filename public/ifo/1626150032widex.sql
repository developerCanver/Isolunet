-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2021 a las 21:08:34
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `widex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atraso_justificacions`
--

CREATE TABLE `atraso_justificacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `atraso_justificacions`
--

INSERT INTO `atraso_justificacions` (`id`, `nombre`, `estado`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Enviado a Dinamarca', 1, 33, '2021-04-16 19:45:03', '2021-04-16 19:45:03'),
(2, 'En espera de información', 1, 33, '2021-04-16 19:45:10', '2021-04-16 19:45:10'),
(3, 'En espera de Audiometria', 1, 33, '2021-04-16 19:45:17', '2021-04-16 19:45:17'),
(4, 'Fallo en Control de Calidad', 1, 33, '2021-04-16 19:45:23', '2021-04-16 19:45:23'),
(5, 'Cartera', 1, 33, '2021-04-16 19:45:28', '2021-04-28 14:18:33'),
(6, 'Retraso de producción', 1, 33, '2021-04-16 19:45:34', '2021-04-16 19:45:34'),
(7, 'Cartera prueba', 1, 1, '2021-04-20 19:34:20', '2021-04-20 19:34:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audifono_modelos`
--

CREATE TABLE `audifono_modelos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `audifono_modelos`
--

INSERT INTO `audifono_modelos` (`id`, `codigo`, `nombre`, `estado`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1', 'BRAVO2', 1, 33, '2021-04-16 14:21:13', '2021-05-04 16:10:31'),
(2, '2', 'BRAVISSIMO', 1, 33, '2021-04-16 14:21:20', '2021-04-16 14:21:20'),
(3, '3', 'SENSO VITA', 1, 33, '2021-04-16 14:21:27', '2021-04-16 14:21:27'),
(4, '4', 'SENSO DIVA', 1, 33, '2021-04-16 14:21:36', '2021-04-16 14:21:36'),
(5, '5', 'FLASH', 1, 33, '2021-04-16 14:21:43', '2021-04-16 14:21:43'),
(6, '6', 'AIKIA', 1, 33, '2021-04-16 14:21:50', '2021-04-16 14:21:50'),
(7, '7', 'INTEO', 1, 33, '2021-04-16 14:21:57', '2021-04-16 14:21:57'),
(8, '8', 'PASSION', 1, 33, '2021-04-16 14:22:03', '2021-04-16 14:22:03'),
(9, '9', 'MOLDES', 1, 33, '2021-04-16 14:22:10', '2021-04-16 14:22:10'),
(10, '10', 'SISTEMA FM', 1, 33, '2021-04-16 14:22:18', '2021-04-16 14:22:18'),
(11, '11', 'ACCESORIOS', 1, 33, '2021-04-16 14:22:26', '2021-04-16 14:22:26'),
(21, '10001', 'modelo audifono', 1, 1, '2021-05-04 15:32:01', '2021-05-04 15:57:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audifono_referencias`
--

CREATE TABLE `audifono_referencias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `referencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `audifono_modelo_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `audifono_referencias`
--

INSERT INTO `audifono_referencias` (`id`, `referencia`, `estado`, `audifono_modelo_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'B1X', 1, 1, 1, '2021-04-21 16:34:59', '2021-04-21 16:34:59'),
(2, 'B1XT', 1, 1, 1, '2021-04-21 16:35:13', '2021-04-21 16:35:13'),
(3, 'BV-CIC', 1, 2, 1, '2021-04-21 16:35:26', '2021-04-21 18:11:04'),
(4, 'BV-X', 1, 2, 1, '2021-04-21 16:35:36', '2021-04-21 18:10:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audiologos`
--

CREATE TABLE `audiologos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `documento` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `institucion_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `audiologos`
--

INSERT INTO `audiologos` (`id`, `documento`, `nombre`, `apellido`, `celular`, `ciudad`, `direccion`, `email`, `telefono`, `fecha_nacimiento`, `institucion_id`, `user_id`, `estado`, `created_at`, `updated_at`) VALUES
(1, '18522291', 'Gustavo Adolfo', 'Zuluaga Cañaveral', '3503494781', 'Cali', 'Cra 42 #25-134', 'thekurai@gmail.com', '2856525', '1984-03-10', 1, 1, 1, '2021-04-23 18:50:58', '2021-04-23 18:50:58'),
(2, '1113654987', 'Juanita', 'Cardona', '3003216549', 'Medellin', 'cra 42 #25-135', 'thekurai@gmail.com', '3216549', '1998-08-24', 5, 1, 1, '2021-04-23 18:50:58', '2021-04-27 21:17:44'),
(3, '18655988', 'Adriana Virginia', 'Serna Rubiano', '3108051450', 'Medellin', 'cra 42 #25-134', 'fonoavs@hotmail.com', '8051450', '1981-03-15', 2, 1, 1, '2021-04-24 19:14:28', '2021-04-27 21:16:45'),
(6, '3216549879', 'andres', 'palacio', '3103216549', 'cali', 'cra 42 #25-134', 'thekurai@gmail.com', NULL, NULL, 2, 1, 1, '2021-04-27 22:08:53', '2021-04-27 22:08:53'),
(7, '32165897', 'catalina', 'zuluaga', '3003216549', 'Pereira', 'cra 42 #25-134', 'thekurai@gmail.com', '2659878', '1985-06-15', 2, 1, 1, '2021-04-28 14:42:06', '2021-04-28 14:42:06'),
(8, '65489787', 'juan', 'perez', '3103216549', 'Cali', 'cra 42 #25-135', 'cygcolombia@gmail.com', NULL, '1999-02-12', 1, 1, 0, '2021-05-04 13:41:27', '2021-05-04 13:41:46'),
(9, '1321654', 'Audiologo_Carlos', 'Ruiz', '1084551311', 'Pasto', 'Pasto, Nariño', 'canverlanix@gmail.com', '3218618007', NULL, 1, 1, 1, '2021-05-11 15:17:59', '2021-05-11 15:17:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audiometrias`
--

CREATE TABLE `audiometrias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `decibel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frecuencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `audiometrias`
--

INSERT INTO `audiometrias` (`id`, `decibel`, `frecuencia`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '10', '30', 1, '2021-05-11 22:12:51', '2021-05-11 22:12:51'),
(2, '20', '50', 1, '2021-05-11 22:15:55', '2021-05-11 22:15:55'),
(3, '12', '15', 1, '2021-05-12 12:56:45', '2021-05-12 12:56:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calidad_categorias`
--

CREATE TABLE `calidad_categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `calidad_categorias`
--

INSERT INTO `calidad_categorias` (`id`, `nombre`, `estado`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'REVISION FISICA DE AUDIFONO ITE y CIC', 1, 33, '2021-04-16 19:48:01', '2021-04-20 22:45:43'),
(2, 'REVISION FISICA DEL MOLDE', 1, 33, '2021-04-16 19:48:05', '2021-04-20 22:46:03'),
(3, 'REVISION EN EL FONIX FP 40.', 1, 33, '2021-04-16 19:48:11', '2021-04-21 14:05:57'),
(4, 'TEST DE LOS SISTEMAS OPERACIONALES DEL AUDIFONO', 1, 1, '2021-04-20 22:46:31', '2021-04-20 22:46:31'),
(9, 'REVISION EN EL PROGRAMA DE SERVICIO', 1, 1, '2021-04-20 22:49:38', '2021-04-20 22:49:38'),
(10, 'REVISION FISICA DEL MOLDE PRUEBA', 1, 1, '2021-04-20 22:55:52', '2021-04-20 22:55:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calidad_preguntas`
--

CREATE TABLE `calidad_preguntas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `detalle` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `calidad_categoria_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `calidad_preguntas`
--

INSERT INTO `calidad_preguntas` (`id`, `detalle`, `estado`, `calidad_categoria_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'La parte externa del audifono no sobresalga excesivamente del CAE.', 1, 2, 1, '2021-04-20 22:35:49', '2021-04-21 14:10:07'),
(2, 'El largo del canal y direccion de la punta', 1, 1, 1, '2021-04-20 23:01:13', '2021-04-21 14:10:23'),
(3, 'Manguera (pegado y direccionalidad)', 1, 10, 1, '2021-04-20 23:01:51', '2021-04-21 14:10:45'),
(4, 'El audifono debe ser programado nuevamente por cambios efectuados', 1, 9, 1, '2021-04-20 23:03:17', '2021-04-21 14:01:25'),
(5, 'Número de Codo', 1, 3, 1, '2021-04-20 23:04:23', '2021-04-21 14:01:01'),
(6, 'Diametro, ubicacion y funcionalidad de la ventilación', 1, 2, 1, '2021-04-21 13:20:32', '2021-04-21 13:50:46'),
(7, 'Control de volumen', 1, 2, 1, '2021-04-21 14:03:20', '2021-04-21 14:03:20'),
(12, 'Control de volumen', 0, 2, 1, '2021-04-21 15:35:34', '2021-04-21 15:58:41'),
(13, 'Control de volumen', 0, 2, 1, '2021-04-21 15:56:17', '2021-04-21 15:58:37'),
(14, 'Control de volumen2', 0, 2, 1, '2021-04-21 15:58:30', '2021-04-21 15:58:34'),
(15, 'asdadsad', 0, 2, 1, '2021-05-04 13:38:10', '2021-05-04 13:38:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `colors`
--

INSERT INTO `colors` (`id`, `nombre`, `estado`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Blanco', 1, 33, '2021-04-16 19:10:01', '2021-04-16 19:36:45'),
(2, 'Negro', 1, 33, '2021-04-16 19:10:05', '2021-04-16 19:10:05'),
(3, 'Azul', 1, 33, '2021-04-16 19:10:08', '2021-04-16 19:10:08'),
(4, 'Beige', 1, 33, '2021-04-16 19:10:11', '2021-04-16 19:10:11'),
(5, 'lila', 1, 33, '2021-04-16 19:31:42', '2021-04-16 19:31:42'),
(6, 'Negro', 1, 33, '2021-04-16 19:37:42', '2021-04-16 19:37:42'),
(7, 'Azul', 1, 33, '2021-04-16 19:37:49', '2021-04-16 19:37:49'),
(8, 'Naranja', 1, 33, '2021-04-16 19:38:43', '2021-04-20 19:24:49'),
(9, 'Blanco', 0, 1, '2021-04-20 18:30:36', '2021-04-20 18:30:39'),
(10, 'Azules', 1, 1, '2021-04-20 19:24:44', '2021-04-20 19:24:44'),
(11, 'as', 1, 1, '2021-05-15 00:25:47', '2021-05-15 00:25:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config_correos`
--

CREATE TABLE `config_correos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombrehost` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `puerto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `encriptacion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuariosmtp` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrasena` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correoelectronico` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_accesorios`
--

CREATE TABLE `detalle_accesorios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `solicitud_accesorios_id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnosticos`
--

CREATE TABLE `diagnosticos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `diagnosticos`
--

INSERT INTO `diagnosticos` (`id`, `codigo`, `nombre`, `estado`, `user_id`, `created_at`, `updated_at`) VALUES
(48, '1', 'ALTO CONSUMO DE PILA', 1, 33, '2021-04-16 13:22:04', '2021-04-16 13:22:04'),
(49, '2', 'ANTENA FM DANADA', 1, 33, '2021-04-16 13:22:13', '2021-04-16 13:22:13'),
(50, '3', 'BLOQUE DE MICRÓFONO DAÑADO', 1, 33, '2021-04-16 13:35:29', '2021-04-16 14:19:08'),
(51, '4', 'BOBINA EN CORTO', 1, 33, '2021-04-16 13:37:58', '2021-04-16 14:16:45'),
(52, '5', 'BOBINA NO AMPLIFICA.', 1, 33, '2021-04-16 14:11:45', '2021-04-20 16:53:58'),
(58, '6', 'BOBINA EN CORTO', 1, 1, '2021-04-20 18:53:18', '2021-04-20 18:53:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias_festivos`
--

CREATE TABLE `dias_festivos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diaFestivo` date DEFAULT NULL,
  `diaCelebracion` date DEFAULT NULL,
  `celebracion` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `dias_festivos`
--

INSERT INTO `dias_festivos` (`id`, `diaFestivo`, `diaCelebracion`, `celebracion`, `created_at`, `updated_at`) VALUES
(1, '2021-01-01', '2021-01-01', 'Año Nuevo', '2021-04-28 13:57:56', '2021-04-28 13:57:56'),
(2, '2021-01-06', '2021-01-11', 'Día de los Reyes Magos', '2021-04-28 13:57:56', '2021-04-28 13:57:56'),
(3, '2021-03-19', '2021-03-22', 'Día de San José', '2021-04-28 13:57:56', '2021-04-28 13:57:56'),
(4, '2021-04-01', '2021-04-01', 'Jueves Santo', '2021-04-28 13:57:56', '2021-04-28 13:57:56'),
(5, '2021-04-02', '2021-04-02', 'Viernes Santo', '2021-04-28 13:57:56', '2021-04-28 13:57:56'),
(6, '2021-05-01', '2021-05-01', 'Día del Trabajo', '2021-04-28 13:57:56', '2021-04-28 13:57:56'),
(7, '2021-05-13', '2021-05-17', 'Ascensión del Señor', '2021-04-28 13:57:56', '2021-04-28 13:57:56'),
(8, '2021-06-03', '2021-06-07', 'Corphus Christi', '2021-04-28 13:57:56', '2021-04-28 13:57:56'),
(9, '2021-06-11', '2021-06-14', 'Sagrado Corazón de Jesús', '2021-04-28 13:57:56', '2021-04-28 13:57:56'),
(10, '2021-06-29', '2021-07-05', 'San Pedro y San Pablo', '2021-04-28 13:57:56', '2021-04-28 13:57:56'),
(11, '2021-07-20', '2021-07-20', 'Día de la Independencia', '2021-04-28 13:57:56', '2021-04-28 13:57:56'),
(12, '2021-08-07', '2021-08-07', 'Batalla de Boyacá', '2021-04-28 13:57:56', '2021-04-28 13:57:56'),
(13, '2021-08-15', '2021-08-16', 'La Asunción de la Virgen', '2021-04-28 13:57:56', '2021-04-28 13:57:56'),
(14, '2021-10-12', '2021-10-18', 'Día de la Raza', '2021-04-28 13:57:56', '2021-04-28 13:57:56'),
(15, '2021-11-01', '2021-11-01', 'Todos los Santos', '2021-04-28 13:57:56', '2021-04-28 13:57:56'),
(16, '2021-11-11', '2021-11-15', 'Independencia de Cartagena', '2021-04-28 13:57:56', '2021-04-28 13:57:56'),
(17, '2021-12-08', '2021-12-08', 'Día de la Inmaculada Concepción', '2021-04-28 13:57:56', '2021-04-28 13:57:56'),
(18, '2021-12-25', '2021-12-25', 'Día de Navidad', '2021-04-28 13:57:56', '2021-04-28 13:57:56'),
(19, '2021-01-01', '2021-01-01', 'Año Nuevo', '2021-04-30 16:38:08', '2021-04-30 16:38:08'),
(20, '2021-01-06', '2021-01-11', 'Día de los Reyes Magos', '2021-04-30 16:38:08', '2021-04-30 16:38:08'),
(21, '2021-03-19', '2021-03-22', 'Día de San José', '2021-04-30 16:38:08', '2021-04-30 16:38:08'),
(22, '2021-04-01', '2021-04-01', 'Jueves Santo', '2021-04-30 16:38:08', '2021-04-30 16:38:08'),
(23, '2021-04-02', '2021-04-02', 'Viernes Santo', '2021-04-30 16:38:08', '2021-04-30 16:38:08'),
(24, '2021-05-01', '2021-05-01', 'Día del Trabajo', '2021-04-30 16:38:08', '2021-04-30 16:38:08'),
(25, '2021-05-13', '2021-05-17', 'Ascensión del Señor', '2021-04-30 16:38:08', '2021-04-30 16:38:08'),
(26, '2021-06-03', '2021-06-07', 'Corphus Christi', '2021-04-30 16:38:08', '2021-04-30 16:38:08'),
(27, '2021-06-11', '2021-06-14', 'Sagrado Corazón de Jesús', '2021-04-30 16:38:08', '2021-04-30 16:38:08'),
(28, '2021-06-29', '2021-07-05', 'San Pedro y San Pablo', '2021-04-30 16:38:08', '2021-04-30 16:38:08'),
(29, '2021-07-20', '2021-07-20', 'Día de la Independencia', '2021-04-30 16:38:08', '2021-04-30 16:38:08'),
(30, '2021-08-07', '2021-08-07', 'Batalla de Boyacá', '2021-04-30 16:38:08', '2021-04-30 16:38:08'),
(31, '2021-08-15', '2021-08-16', 'La Asunción de la Virgen', '2021-04-30 16:38:08', '2021-04-30 16:38:08'),
(32, '2021-10-12', '2021-10-18', 'Día de la Raza', '2021-04-30 16:38:08', '2021-04-30 16:38:08'),
(33, '2021-11-01', '2021-11-01', 'Todos los Santos', '2021-04-30 16:38:08', '2021-04-30 16:38:08'),
(34, '2021-11-11', '2021-11-15', 'Independencia de Cartagena', '2021-04-30 16:38:08', '2021-04-30 16:38:08'),
(35, '2021-12-08', '2021-12-08', 'Día de la Inmaculada Concepción', '2021-04-30 16:38:08', '2021-04-30 16:38:08'),
(36, '2021-12-25', '2021-12-25', 'Día de Navidad', '2021-04-30 16:38:08', '2021-04-30 16:38:08');

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
-- Estructura de tabla para la tabla `institucions`
--

CREATE TABLE `institucions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_pago` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `institucions`
--

INSERT INTO `institucions` (`id`, `nombre`, `nit`, `ciudad`, `email`, `celular`, `telefono`, `direccion`, `tipo_pago`, `user_id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Instituto para Niños Ciegos y Sordos INCYS', '890303395', 'Cali', 'instituto@ciegosysordos.org.co', '3126839035', '5140345', 'cra 42 #25-134', 'Contado', 1, 1, '2021-04-21 22:09:59', '2021-04-27 22:15:56'),
(2, 'Caja de Compesacion Familiar Comfenalco Antioquia', '890900842', 'Medellin', 'prueba@correo.com', '32165465', '3505500', 'Calle 30A # 65B-59', 'Crédito 30 días', 1, 1, '2021-04-21 22:11:15', '2021-04-27 22:15:32'),
(3, 'Centro Audiológico y Quirurgico del Country C.A.Q.C.', '830113069', 'Bogotá', 'audiologicoyquirurgico@hotmail.com', '32132132121', '6910870', 'Carrera 16A # 82-46 Piso 5', 'Crédito 60 días', 1, 1, '2021-04-21 22:12:52', '2021-04-27 22:15:41'),
(4, 'IPS - Fundacion Universitaria Maria Cano', '800036781', 'Medellin', 'thekurai@gmail.com', '3203216549', '4091000', 'Calle 33 # 78-36', 'Crédito 30 días', 1, 1, '2021-04-21 22:13:49', '2021-04-21 22:57:24'),
(5, 'Centro Audiprotesico Ltda', '830023698', 'Bogotá', 'audioprotesico@yahoo.com', '3384664', '3103384664', 'Cra 72A # 52-20 Apto 201', 'Crédito 30 días', 1, 1, '2021-04-23 18:46:28', '2021-04-27 16:42:42'),
(9, 'institución', '321654987', 'Cali', 'juan@correo.com', '3216549876', '2569887', 'cra 42 #25-134', 'Crédito 90 días', 1, 0, '2021-05-04 13:40:40', '2021-05-04 13:40:54');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2021_03_20_194217_create_permission_tables', 1),
(6, '2021_03_25_162224_create_diagnosticos_table', 1),
(7, '2021_03_25_162225_create_audifono_modelos_table', 1),
(8, '2021_03_25_162226_create_audifono_referencias_table', 1),
(9, '2021_03_25_162227_create_tipo_envios_table', 1),
(10, '2021_03_25_162228_create_tipo_reparacions_table', 1),
(11, '2021_03_25_162229_create_tipo_entradas_table', 1),
(12, '2021_03_25_162230_create_recomendacions_table', 1),
(13, '2021_03_25_162231_create_colors_table', 1),
(14, '2021_03_25_162232_create_reparacion_checks_table', 1),
(15, '2021_03_25_162233_create_atraso_justificacions_table', 1),
(16, '2021_03_25_162234_create_calidad_categorias_table', 1),
(17, '2021_03_25_162235_create_calidad_preguntas_table', 1),
(18, '2021_04_11_204443_create_institucions_table', 1),
(19, '2021_04_12_185732_create_tipo_clientes_table', 1),
(20, '2021_04_12_185733_create_audiologos_table', 1),
(21, '2021_04_17_112349_create_pacientes_table', 2),
(22, '2021_04_21_155642_create_institucions_table', 3),
(23, '2021_04_21_162716_create_institucions_table', 4),
(24, '2021_04_21_170138_create_institucions_table', 5),
(25, '2021_04_21_170426_create_institucions_table', 6),
(26, '2021_04_22_073459_create_audiologos_table', 7),
(27, '2021_04_22_073812_create_audiologos_table', 8),
(28, '2021_04_28_075425_create_dias_festivos_table', 9),
(29, '2021_04_29_192747_create_nueva_ventas_table', 10),
(30, '2021_04_30_152959_create_nueva_ventas_table', 11),
(31, '2021_04_30_154645_create_nueva_ventas_table', 12),
(32, '2021_04_30_173435_create_nueva_ventas_table', 13),
(33, '2021_04_30_202036_create_nueva_ventas_table', 14),
(34, '2021_05_01_104153_create_nueva_ventas_table', 15),
(35, '2021_05_02_165257_create_nueva_ventas_table', 16),
(36, '2021_05_03_133718_create_solicitud_accesorios_table', 17),
(47, '2021_05_05_094133_create_solicitud_reparacions_table', 18),
(48, '2021_05_05_094134_create_solicitud_accesorios_table', 19),
(49, '2021_05_05_094135_create_productos_accesorios_table', 19),
(50, '2021_05_05_094136_create_detalle_accesorios_table', 19),
(51, '2021_05_06_175010_create_reparacion_tecnicas_table', 20),
(52, '2021_05_07_075308_create_solicitud_reparacions_table', 21),
(53, '2021_05_07_075309_create_reparacion_tecnicas_table', 21),
(54, '2021_05_07_222804_create_reparacion_facturas_table', 22),
(55, '2021_05_07_114824_create_audiometrias_table', 23),
(56, '2021_05_08_095957_create_config_correos_table', 23),
(84, '2021_05_12_134253_create_nueva_ventas_table', 24),
(85, '2021_05_13_082902_create_tecnico_ventas_table', 24),
(86, '2021_05_14_103831_create_solicitud_reparacions_table', 25),
(87, '2021_05_14_103832_create_reparacion_facturas_table', 25),
(88, '2021_05_14_160535_create_reparacion_tecnicas_table', 25),
(89, '2021_05_14_160536_create_reparacion_tec_lista_chequeos_table', 25),
(90, '2021_05_14_160537_create_reparacion_tec_diagnoticos_table', 25),
(91, '2021_05_14_160538_create_reparacion_tec_recomendacions_table', 25),
(92, '2021_05_14_160539_create_reparacion_tec_tipo_reparacions_table', 25),
(93, '2021_05_14_163916_create_venta_trabajo_tecnicos_table', 25),
(94, '2021_05_16_115252_create_venta_facturacions_table', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nueva_ventas`
--

CREATE TABLE `nueva_ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigobarras` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institucion_id` bigint(20) UNSIGNED NOT NULL,
  `audiologo_id` bigint(20) UNSIGNED NOT NULL,
  `paciente_id` bigint(20) UNSIGNED NOT NULL,
  `facturar` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urgencia` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipoventa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `colorcascaron` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colorplatina` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipoentradaoi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipoentradaod` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moldeoi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `moldeod` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipomolde` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipoaudifono` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modelooi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `modelood_id` bigint(20) UNSIGNED DEFAULT NULL,
  `material` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ventilacionoi` decimal(2,1) DEFAULT NULL,
  `ventilacionod` decimal(2,1) DEFAULT NULL,
  `codocretoi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `codocretod` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adaptadorcretoi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adaptadorcretod` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otoscopiaoi` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otoscopiaod` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shoreoi` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shoreod` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colorshoreagua` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `colorshoreruido` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cordon` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `largocablereceptoroi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `largocablereceptorod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etipsoi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etipsod` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tamanoetipoi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tamanoetipod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tecnicomolde_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tecnicoelectronica_id` bigint(20) UNSIGNED DEFAULT NULL,
  `observacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `nueva_ventas`
--

INSERT INTO `nueva_ventas` (`id`, `codigobarras`, `institucion_id`, `audiologo_id`, `paciente_id`, `facturar`, `urgencia`, `tipoventa`, `color_id`, `colorcascaron`, `colorplatina`, `tipoentradaoi`, `tipoentradaod`, `moldeoi`, `moldeod`, `tipomolde`, `tipoaudifono`, `modelooi_id`, `modelood_id`, `material`, `ventilacionoi`, `ventilacionod`, `codocretoi`, `codocretod`, `adaptadorcretoi`, `adaptadorcretod`, `otoscopiaoi`, `otoscopiaod`, `shoreoi`, `shoreod`, `colorshoreagua`, `colorshoreruido`, `cordon`, `largocablereceptoroi`, `largocablereceptorod`, `etipsoi`, `etipsod`, `tamanoetipoi`, `tamanoetipod`, `tecnicomolde_id`, `tecnicoelectronica_id`, `observacion`, `estado`, `user_id`, `created_at`, `updated_at`) VALUES
(7, '100', 2, 3, 1, 'Paciente', 'SI', 'Audífono BTE', 2, '0', '0', 'VI (Venta Intra)', 'VI (Venta Intra)', '0', '0', '0', 'CIC-M', 1, 1, '0', '0.0', '0.0', '0', '0', '0', '0', NULL, NULL, '0', '0', '0', NULL, '0', '0', '0', 'Doble Copa', 'Tulipán', 'XS', 'S', 1, 6, 'ok', 1, 1, '2021-05-17 20:10:56', '2021-05-17 20:10:56'),
(8, '101', 1, 1, 9, 'Paciente', 'SI', 'Audífono BTE', 1, '0', '0', 'VI (Venta Intra)', '0', '0', '0', '0', 'CIC', 2, NULL, '0', '0.0', '0.0', '0', '0', '0', '0', NULL, NULL, '0', '0', '0', NULL, NULL, '0', '0', 'Doble Copa', '0', 'S', '0', 6, 6, 'audífono izquierdo', 1, 1, '2021-05-17 20:11:52', '2021-05-17 20:11:52'),
(17, '102', 1, 1, 9, 'Paciente', 'SI', 'Audífono BTE', 2, '0', '0', '0', 'VR (Venta Retro)', '0', '0', '0', 'CIC', NULL, 2, '0', '0.0', '0.0', '0', '0', '0', '0', NULL, NULL, '0', '0', '0', NULL, NULL, '0', '0', '0', 'Abierto', '0', 'S', 1, 1, NULL, 1, 1, '2021-05-17 20:15:46', '2021-05-17 20:15:46'),
(19, '103', 1, 1, 1, 'Paciente', 'SI', 'Audífono BTE', 1, '0', '0', 'VI (Venta Intra)', 'VI (Venta Intra)', '0', '0', '0', 'CIC-M', 3, 2, '0', '0.0', '0.0', '0', '0', '0', '0', NULL, NULL, '0', '0', '0', NULL, NULL, '0', '0', 'Doble Copa', 'Tulipán', 'XS', 'XS', 6, 1, NULL, 1, 1, '2021-05-17 20:17:44', '2021-05-17 20:17:44'),
(22, '104', 1, 1, 9, 'Paciente', 'SI', 'Audífono BTE', 1, '0', '0', 'VI (Venta Intra)', 'VR (Venta Retro)', '0', '0', '0', 'CIC', 1, 1, '0', '0.0', '0.0', '0', '0', '0', '0', NULL, NULL, '0', '0', '0', NULL, '0', '0', '0', 'Tulipán', 'Tulipán', 'XS', 'XS', 1, 1, 'ambos', 1, 1, '2021-05-17 20:21:24', '2021-05-17 20:21:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `documento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observaciones` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `documento`, `nombres`, `apellidos`, `edad`, `telefono`, `celular`, `direccion`, `ciudad`, `email`, `observaciones`, `user_id`, `estado`, `created_at`, `updated_at`) VALUES
(1, '18522291', 'Gustavo Adolfo', 'Zuluaga Cañaveral', '37', '2856525', '3503494781', 'Cra 42 # 25 - 134 Casa 187 - Casas del Saman III', 'Palmira', 'thekurai@gmail.com', 'ok', 1, 1, '2021-04-20 15:02:22', '2021-04-20 16:11:44'),
(2, '1127946226', 'Lisett', 'Santiago', '32', '3216549879', '3216548979', 'cll 1 # 43-34', 'Palmira', 'thekurai@gmail.com', 'ok', 1, 1, '2021-04-20 15:39:14', '2021-04-20 16:14:10'),
(3, '1113954225', 'Cristian David', 'Vargas', '32', '3216547', '3216549877', 'cll 3 #65-98', 'Palmira', 'cristian-d-2@hotmail.com', 'ok', 1, 0, '2021-04-20 15:47:05', '2021-04-20 16:14:01'),
(4, '321654987', 'Pepito', 'Perez', '58', '3216547', '3216549879', 'cll 3 $ 56-32', 'Cali', 'thekurai@gmail.com', 'ok', 1, 0, '2021-04-20 16:14:35', '2021-04-27 16:44:26'),
(6, '18522292', 'asd', 'asd', '65', NULL, NULL, NULL, 'asd', NULL, NULL, 1, 0, '2021-04-20 16:36:03', '2021-04-20 16:36:10'),
(7, '12312', 'kljh', 'lkj', '28', NULL, NULL, NULL, 'lkj', NULL, NULL, 1, 0, '2021-04-20 16:40:28', '2021-04-20 16:40:32'),
(8, '3216549874', 'jujan', 'perez', '35', '3215647', '3103216545', 'cra', 'Cali', 'juan@correo.com', 'ok', 1, 0, '2021-05-04 13:43:32', '2021-05-04 13:43:49'),
(9, '1084551311', 'Paciente_Carlos', 'Ruiz', '28', '3218618007', '3216549874', 'Pasto, Nariño', 'Pasto', 'canverlanix@gmail.com', NULL, 1, 1, '2021-05-11 15:15:45', '2021-05-11 15:17:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'agregar', 'web', '2021-04-19 21:58:49', '2021-04-19 21:58:49'),
(2, 'editar', 'web', '2021-04-19 21:58:49', '2021-04-19 21:58:49'),
(3, 'borrar', 'web', '2021-04-19 21:58:49', '2021-04-19 21:58:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_accesorios`
--

CREATE TABLE `productos_accesorios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendacions`
--

CREATE TABLE `recomendacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `recomendacions`
--

INSERT INTO `recomendacions` (`id`, `codigo`, `nombre`, `estado`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1', 'MANTENIMIENTO PREVENTIVO', 1, 33, '2021-04-16 16:47:19', '2021-04-16 16:47:19'),
(2, '2', 'USAR EL DESHUMIFICADOR TODAS LAS NOCHES.', 1, 33, '2021-04-16 16:47:25', '2021-04-16 16:47:25'),
(3, '3', 'CAMBIAR LA TRAMPA DE CERA CON MAYOR FRECUENCIA', 1, 33, '2021-04-16 16:47:32', '2021-04-16 16:48:11'),
(4, '4', 'LOS GOLPES PODRIAN DAÑAR SERIAMENTE SU AUDIFONO. HEMOS ENCONTRADO EN EL PIEZAS QUEBRADAS, QUE HAN SIDO REEMPLAZADAS.', 1, 33, '2021-04-16 16:47:39', '2021-04-16 16:47:39'),
(5, '5', 'RETIRAR LA PILA CUANDO NO ESTE USANDO SU AUDIFONO.', 1, 33, '2021-04-16 16:47:47', '2021-04-16 16:47:47'),
(6, '6', 'REALIZAR NUEVO TEST DE FEEDBACK.', 1, 33, '2021-04-16 18:56:28', '2021-04-16 18:56:28'),
(7, '7', 'prueba', 1, 33, '2021-04-16 18:57:48', '2021-04-16 18:57:48'),
(8, '8', 'adasd', 0, 1, '2021-04-20 19:24:24', '2021-05-06 12:58:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparacion_checks`
--

CREATE TABLE `reparacion_checks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reparacion_checks`
--

INSERT INTO `reparacion_checks` (`id`, `codigo`, `nombre`, `estado`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1', 'PARTIDO O QUEBRADO.', 1, 33, '2021-04-16 19:41:06', '2021-04-16 19:42:49'),
(2, '2', 'QUEMADO', 1, 33, '2021-04-16 19:41:17', '2021-04-16 19:41:17'),
(3, '3', 'PLATO DESPEGADO', 1, 33, '2021-04-16 19:41:23', '2021-04-16 19:41:23'),
(4, '4', 'FISURADO', 1, 33, '2021-04-16 19:41:30', '2021-04-16 19:42:53'),
(5, '5', 'asdasd', 1, 1, '2021-04-20 19:26:44', '2021-04-20 19:26:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparacion_facturas`
--

CREATE TABLE `reparacion_facturas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fechaDespacho` date DEFAULT NULL,
  `fechaInicioGarantia` date DEFAULT NULL,
  `fechaFinGarantia` date DEFAULT NULL,
  `numeroFactura` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PrecioVenta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guia` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fechaFactura` date DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `observacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `solicitud_reparacion_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reparacion_facturas`
--

INSERT INTO `reparacion_facturas` (`id`, `fechaDespacho`, `fechaInicioGarantia`, `fechaFinGarantia`, `numeroFactura`, `PrecioVenta`, `guia`, `fechaFactura`, `estado`, `observacion`, `solicitud_reparacion_id`, `user_id`, `created_at`, `updated_at`) VALUES
(10, '2021-05-01', '2021-05-02', '2022-06-02', '100', '130000', '03', '2021-05-04', 0, 'Observación factura', 1, 1, '2021-05-17 20:47:08', '2021-05-18 17:19:22'),
(11, '2021-05-05', '2021-04-29', '2021-04-28', '123456', '150', '321', '2021-12-31', 1, 'ok', 1, 1, '2021-05-18 17:05:58', '2021-05-18 17:06:18'),
(12, '2021-05-25', '2021-12-31', '2021-12-31', '132', '653', '123', '2021-12-31', 0, 'ohhh', 1, 1, '2021-05-18 17:08:16', '2021-05-18 17:08:25'),
(13, '2020-12-31', NULL, '2021-12-31', '123', '321321', '000', '2020-12-30', 0, NULL, 1, 1, '2021-05-18 17:11:05', '2021-05-18 17:15:29'),
(14, '2021-12-31', '2021-12-31', '2021-12-31', '123', '321', '31321', '2021-12-30', 0, 'fac', 1, 1, '2021-05-18 17:12:15', '2021-05-18 17:14:13'),
(15, '2021-12-31', NULL, '2021-12-31', '321', '-14', '321', '2021-12-31', 0, NULL, 1, 1, '2021-05-18 17:16:36', '2021-05-18 17:18:32'),
(16, '2021-12-31', '2021-12-31', '2020-12-31', '321', '123456', '0000', '2021-12-31', 1, 'ok', 3, 1, '2021-05-19 15:41:35', '2021-05-19 15:41:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparacion_tecnicas`
--

CREATE TABLE `reparacion_tecnicas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fechaReparacionTec` date DEFAULT NULL,
  `tipoentradaoi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipoentradaod` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacionTec` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `solicitud_reparacion_id` bigint(20) UNSIGNED NOT NULL,
  `tipo_envio_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reparacion_tecnicas`
--

INSERT INTO `reparacion_tecnicas` (`id`, `fechaReparacionTec`, `tipoentradaoi`, `tipoentradaod`, `observacionTec`, `estado`, `solicitud_reparacion_id`, `tipo_envio_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2021-05-17', 'GA (Garantia Accesorio)', 'GA (Garantia Accesorio)', 'Observación 2', 1, 1, 3, 1, '2021-05-17 20:45:22', '2021-05-18 21:05:46'),
(12, '2021-05-19', 'DVI (Devolucion Intra)', 'DVI (Devolucion Intra)', 'ok', 1, 3, 1, 1, '2021-05-19 13:51:34', '2021-05-19 13:51:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparacion_tec_diagnoticos`
--

CREATE TABLE `reparacion_tec_diagnoticos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diagnostico_id` bigint(20) UNSIGNED NOT NULL,
  `reparacion_tecnica_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reparacion_tec_diagnoticos`
--

INSERT INTO `reparacion_tec_diagnoticos` (`id`, `diagnostico_id`, `reparacion_tecnica_id`, `created_at`, `updated_at`) VALUES
(43, 48, 1, '2021-05-19 13:27:19', '2021-05-19 13:27:19'),
(44, 49, 1, '2021-05-19 13:27:19', '2021-05-19 13:27:19'),
(45, 50, 1, '2021-05-19 13:27:19', '2021-05-19 13:27:19'),
(46, 51, 1, '2021-05-19 13:27:19', '2021-05-19 13:27:19'),
(47, 52, 1, '2021-05-19 13:27:19', '2021-05-19 13:27:19'),
(48, 58, 1, '2021-05-19 13:27:19', '2021-05-19 13:27:19'),
(49, 49, 12, '2021-05-19 13:51:34', '2021-05-19 13:51:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparacion_tec_lista_chequeos`
--

CREATE TABLE `reparacion_tec_lista_chequeos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reparacion_check_id` bigint(20) UNSIGNED NOT NULL,
  `reparacion_tecnica_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reparacion_tec_lista_chequeos`
--

INSERT INTO `reparacion_tec_lista_chequeos` (`id`, `reparacion_check_id`, `reparacion_tecnica_id`, `created_at`, `updated_at`) VALUES
(60, 3, 1, '2021-05-19 13:27:19', '2021-05-19 13:27:19'),
(61, 2, 1, '2021-05-19 13:27:19', '2021-05-19 13:27:19'),
(62, 4, 1, '2021-05-19 13:27:19', '2021-05-19 13:27:19'),
(63, 5, 1, '2021-05-19 13:27:19', '2021-05-19 13:27:19'),
(64, 2, 12, '2021-05-19 13:51:34', '2021-05-19 13:51:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparacion_tec_recomendacions`
--

CREATE TABLE `reparacion_tec_recomendacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `recomendacion_id` bigint(20) UNSIGNED NOT NULL,
  `reparacion_tecnica_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reparacion_tec_recomendacions`
--

INSERT INTO `reparacion_tec_recomendacions` (`id`, `recomendacion_id`, `reparacion_tecnica_id`, `created_at`, `updated_at`) VALUES
(33, 1, 1, '2021-05-19 13:27:19', '2021-05-19 13:27:19'),
(34, 2, 1, '2021-05-19 13:27:19', '2021-05-19 13:27:19'),
(35, 3, 1, '2021-05-19 13:27:19', '2021-05-19 13:27:19'),
(36, 4, 1, '2021-05-19 13:27:19', '2021-05-19 13:27:19'),
(37, 5, 1, '2021-05-19 13:27:19', '2021-05-19 13:27:19'),
(38, 6, 1, '2021-05-19 13:27:19', '2021-05-19 13:27:19'),
(39, 2, 12, '2021-05-19 13:51:34', '2021-05-19 13:51:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparacion_tec_tipo_reparacions`
--

CREATE TABLE `reparacion_tec_tipo_reparacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo_reparacion_id` bigint(20) UNSIGNED NOT NULL,
  `reparacion_tecnica_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reparacion_tec_tipo_reparacions`
--

INSERT INTO `reparacion_tec_tipo_reparacions` (`id`, `tipo_reparacion_id`, `reparacion_tecnica_id`, `created_at`, `updated_at`) VALUES
(30, 1, 1, '2021-05-19 13:27:19', '2021-05-19 13:27:19'),
(31, 2, 1, '2021-05-19 13:27:19', '2021-05-19 13:27:19'),
(32, 3, 1, '2021-05-19 13:27:19', '2021-05-19 13:27:19'),
(33, 40, 1, '2021-05-19 13:27:19', '2021-05-19 13:27:19'),
(34, 41, 1, '2021-05-19 13:27:19', '2021-05-19 13:27:19'),
(35, 42, 1, '2021-05-19 13:27:19', '2021-05-19 13:27:19'),
(36, 43, 1, '2021-05-19 13:27:19', '2021-05-19 13:27:19'),
(37, 44, 1, '2021-05-19 13:27:19', '2021-05-19 13:27:19'),
(38, 1, 12, '2021-05-19 13:51:34', '2021-05-19 13:51:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Técnico', 'web', '2021-04-22 16:30:59', '2021-04-22 16:30:59'),
(2, 'Coordinador', 'web', '2021-04-22 16:31:06', '2021-04-22 16:31:06'),
(3, 'Almacen', 'web', '2021-04-22 16:31:11', '2021-04-22 16:31:11'),
(4, 'Aprendiz SENA', 'web', '2021-04-22 16:31:20', '2021-04-22 16:31:20'),
(5, 'Asesor_pereira', 'web', '2021-04-22 19:32:29', '2021-04-22 19:32:29'),
(6, 'prueba', 'web', '2021-05-02 19:03:55', '2021-05-02 19:03:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 1),
(2, 2),
(2, 3),
(2, 5),
(3, 1),
(3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_accesorios`
--

CREATE TABLE `solicitud_accesorios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigobarras` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institucion_id` bigint(20) UNSIGNED NOT NULL,
  `audiologo_id` bigint(20) UNSIGNED NOT NULL,
  `paciente_id` bigint(20) UNSIGNED NOT NULL,
  `estadourgencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_reparacions`
--

CREATE TABLE `solicitud_reparacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigobarras` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechacompra` date DEFAULT NULL,
  `fechaPlazoReparacion` date DEFAULT NULL,
  `fingarantia` date DEFAULT NULL,
  `solicitudSerisOd` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `solicitudSerisOi` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `garantiaCompraEstado` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fechacompra_1` date DEFAULT NULL,
  `fingarantia_1` date DEFAULT NULL,
  `solicitudSerisOd_1` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `solicitudSerisOi_1` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `garantiaCompraEstado_1` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `solicFechaReparacionOi` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `solicTipoReparacionOi` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `solicFechaFinOi` date DEFAULT NULL,
  `solicGarantiaEstadoOi` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `solicTipoReparacionOd` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `solicFechaReparacionOd` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `solicFechaFinOd` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `solicGarantiaEstadoOd` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urgencia` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `audifono_referencia` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serieoi` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `serieod` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipoentradaoi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipoentradaod` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `estado_tecnico` tinyint(1) NOT NULL DEFAULT 1,
  `tipo_envio_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reparacion_check_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tecnicomolde_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tecnicoelectronica_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `institucion_id` bigint(20) UNSIGNED NOT NULL,
  `audiologo_id` bigint(20) UNSIGNED NOT NULL,
  `paciente_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `solicitud_reparacions`
--

INSERT INTO `solicitud_reparacions` (`id`, `codigobarras`, `fechacompra`, `fechaPlazoReparacion`, `fingarantia`, `solicitudSerisOd`, `solicitudSerisOi`, `garantiaCompraEstado`, `fechacompra_1`, `fingarantia_1`, `solicitudSerisOd_1`, `solicitudSerisOi_1`, `garantiaCompraEstado_1`, `solicFechaReparacionOi`, `solicTipoReparacionOi`, `solicFechaFinOi`, `solicGarantiaEstadoOi`, `solicTipoReparacionOd`, `solicFechaReparacionOd`, `solicFechaFinOd`, `solicGarantiaEstadoOd`, `urgencia`, `audifono_referencia`, `serieoi`, `serieod`, `tipoentradaoi`, `tipoentradaod`, `observacion`, `estado`, `estado_tecnico`, `tipo_envio_id`, `reparacion_check_id`, `tecnicomolde_id`, `tecnicoelectronica_id`, `user_id`, `institucion_id`, `audiologo_id`, `paciente_id`, `created_at`, `updated_at`) VALUES
(1, '100000', '2015-10-10', '2021-05-20', '2016-06-10', 'eliminar', '16', 'No', '2015-10-10', '2016-06-10', '17', 'Eliminar', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'BRAVO2 (B1XT)', '16', '17', 'DVI (Devolucion Intra)', 'DVI (Devolucion Intra)', 'ambos', 1, 0, 2, 1, 1, 1, 1, 2, 6, 9, '2021-05-17 20:43:41', '2021-05-17 20:45:22'),
(2, '10001', '2019-08-12', '2021-05-21', '2020-08-12', 'eliminar', '10', 'No', '2019-08-12', '2020-08-12', '11', 'Eliminar', 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'BRAVO2 (B1X)', '10', '11', 'DVR (Devolucion Retro)', 'GA (Garantia Accesorio)', NULL, 1, 1, 2, 2, 7, 7, 1, 2, 6, 1, '2021-05-18 13:01:25', '2021-05-18 13:01:25'),
(3, '100001', '2015-10-10', '2021-05-21', '2016-06-10', 'eliminar', '16', 'No', '2015-10-10', '2016-06-10', '17', 'Eliminar', 'No', '2021-05-17', 'GA (Garantia Accesorio)', '2021-04-28', 'No', 'GA (Garantia Accesorio)', '2021-05-17', '2021-04-28', 'No', '1', 'BRAVO2 (B1XT)', '16', '17', 'DVI (Devolucion Intra)', 'DVR (Devolucion Retro)', NULL, 1, 0, 3, 2, NULL, NULL, 1, 1, 9, 9, '2021-05-18 19:18:31', '2021-05-19 13:51:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnico_ventas`
--

CREATE TABLE `tecnico_ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fechaingreso` date NOT NULL,
  `fechaentrega` date NOT NULL,
  `estadotrabajo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comentarios` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nueva_venta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_clientes`
--

CREATE TABLE `tipo_clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_clientes`
--

INSERT INTO `tipo_clientes` (`id`, `nombre`, `estado`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Audiólogo', 1, 1, NULL, '2021-04-21 20:33:17'),
(2, 'Institución', 1, 1, '2021-04-21 20:32:48', '2021-04-21 20:33:20'),
(3, 'Paciente', 0, 1, '2021-04-21 20:32:53', '2021-04-21 20:36:42'),
(4, 'Paciente2', 0, 1, '2021-04-21 20:36:35', '2021-04-21 20:36:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_entradas`
--

CREATE TABLE `tipo_entradas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_entradas`
--

INSERT INTO `tipo_entradas` (`id`, `codigo`, `nombre`, `estado`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1', 'VI (Venta Intra)', 1, 33, '2021-04-16 16:43:54', '2021-04-21 13:58:18'),
(2, '2', 'VR (Venta Retro)', 1, 33, '2021-04-16 16:44:02', '2021-04-21 13:57:48'),
(3, '3', 'VR-FM (Venta BTE + Sistema FM)', 1, 33, '2021-04-16 16:44:09', '2021-04-16 16:44:09'),
(4, '4', 'VA (Venta Accesorios)', 1, 33, '2021-04-16 16:44:16', '2021-04-16 16:44:16'),
(5, '5', 'RI (Reparacion Intra)', 1, 33, '2021-04-16 16:44:26', '2021-04-16 16:44:26'),
(6, '6', 'asdasd', 0, 1, '2021-04-20 19:21:18', '2021-04-20 19:21:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_envios`
--

CREATE TABLE `tipo_envios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_envios`
--

INSERT INTO `tipo_envios` (`id`, `codigo`, `nombre`, `estado`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1', 'ABRIR VENTILACION', 1, 33, '2021-04-16 14:43:35', '2021-04-16 14:43:35'),
(2, '2', 'ALTO CONSUMO DE PILA', 1, 33, '2021-04-16 14:43:42', '2021-04-16 14:43:42'),
(3, '3', 'CAMBIO DE LADO', 1, 33, '2021-04-16 14:43:52', '2021-04-16 14:43:52'),
(4, '4', 'CAMBIO DE PACIENTE', 1, 33, '2021-04-16 14:44:05', '2021-04-16 14:44:05'),
(5, '5', 'CERA EN EL MICROFONO', 1, 33, '2021-04-16 16:40:54', '2021-04-16 16:40:54'),
(6, '6', 'asd', 0, 1, '2021-04-20 19:19:45', '2021-04-20 19:19:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_reparacions`
--

CREATE TABLE `tipo_reparacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_reparacions`
--

INSERT INTO `tipo_reparacions` (`id`, `codigo`, `nombre`, `estado`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1', 'Abrir ventilación', 1, 33, '2021-04-15 21:19:21', '2021-04-15 21:19:21'),
(2, '2', 'Activación de bobina', 1, 33, '2021-04-15 21:19:42', '2021-04-15 21:19:42'),
(3, '3', 'Ajuste de placa de cont.', 1, 33, '2021-04-15 21:19:55', '2021-04-15 21:21:07'),
(40, '4', 'AMPLIACION DE VENTILACION', 1, 33, '2021-04-16 16:24:20', '2021-04-16 16:24:20'),
(41, '5', 'ANILLO ANTIFEEDBACK', 1, 33, '2021-04-16 16:24:30', '2021-04-16 16:24:30'),
(42, '6', 'asdasd', 1, 1, '2021-04-20 19:07:45', '2021-04-20 19:07:45'),
(43, '7', 'asd', 1, 1, '2021-04-20 19:18:20', '2021-04-20 19:18:20'),
(44, '8', 'Tipo envio', 1, 1, '2021-05-06 17:22:14', '2021-05-06 17:22:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `last_login` timestamp NULL DEFAULT NULL,
  `last_update_password` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `estado`, `last_login`, `last_update_password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'administrador@admin.com', 'administrador', '$2y$10$zYUW81h10HoH0UDhJP9Q/O7DnxOpOVeGKwg.bg3cOUajNlAIr/DF6', NULL, NULL, 1, '2021-05-19 12:19:24', NULL, NULL, NULL, '2021-04-19 21:58:49', '2021-05-19 12:19:24'),
(6, 'tecnico.molde', 'tecnico.molde@correo.com', 'tecnico.molde', '$2y$10$iP05WIesvV2..7u3oP/YweblSCvY5TrZP9.3Uw96n9/2npclRReo6', NULL, NULL, 1, NULL, '2021-05-03 19:04:30', NULL, NULL, '2021-05-03 19:04:30', '2021-05-03 19:04:30'),
(7, 'tecnico.electronica', 'tecnico.electronica@correo.com', 'tecnico.electronica', '$2y$10$Q80hcNtt3V5FF6bAFlfOLep6JOmOZ0KhRI1hiDsy2Wu4vUv319M5y', NULL, NULL, 1, NULL, '2021-05-03 19:04:57', NULL, NULL, '2021-05-03 19:04:57', '2021-05-03 19:04:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_facturacions`
--

CREATE TABLE `venta_facturacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fechadespacho` date NOT NULL,
  `fechainiciogarantia` date NOT NULL,
  `fechafingarantia` date NOT NULL,
  `numeroFactura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precioventa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guiaremision` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechafacturar` date NOT NULL,
  `serieoideizquierdo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serieoidoderecho` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nueva_venta_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `venta_facturacions`
--

INSERT INTO `venta_facturacions` (`id`, `fechadespacho`, `fechainiciogarantia`, `fechafingarantia`, `numeroFactura`, `precioventa`, `guiaremision`, `fechafacturar`, `serieoideizquierdo`, `serieoidoderecho`, `observacion`, `nueva_venta_id`, `created_at`, `updated_at`) VALUES
(1, '2019-08-12', '2019-08-12', '2020-08-12', '12345', '106000', '123', '2021-05-10', '10', '11', '', 7, NULL, NULL),
(2, '2019-08-12', '2019-08-12', '2020-10-01', '12345', '106000', '124', '2021-05-10', '12', '', '', 8, NULL, NULL),
(3, '2021-01-20', '2021-01-20', '2022-01-20', '12345', '106000', '123', '2021-05-10', '', '13', '', 17, NULL, NULL),
(4, '2019-08-12', '2019-08-12', '2020-08-12', '12345', '106000', '123', '2021-05-10', '14', '15', '', 19, NULL, NULL),
(5, '2015-10-10', '2015-10-10', '2016-06-10', '1000', '106000', '123', '2021-05-10', '16', '17', '', 22, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_trabajo_tecnicos`
--

CREATE TABLE `venta_trabajo_tecnicos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fechaAtencionTecnico` date DEFAULT NULL,
  `observacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `nueva_venta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atraso_justificacions`
--
ALTER TABLE `atraso_justificacions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `atraso_justificacions_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `audifono_modelos`
--
ALTER TABLE `audifono_modelos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `audifono_modelos_codigo_unique` (`codigo`),
  ADD KEY `audifono_modelos_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `audifono_referencias`
--
ALTER TABLE `audifono_referencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audifono_referencias_audifono_modelo_id_foreign` (`audifono_modelo_id`),
  ADD KEY `audifono_referencias_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `audiologos`
--
ALTER TABLE `audiologos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `audiologos_documento_unique` (`documento`),
  ADD KEY `audiologos_institucion_id_foreign` (`institucion_id`),
  ADD KEY `audiologos_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `audiometrias`
--
ALTER TABLE `audiometrias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audiometrias_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `calidad_categorias`
--
ALTER TABLE `calidad_categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calidad_categorias_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `calidad_preguntas`
--
ALTER TABLE `calidad_preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `calidad_preguntas_calidad_categoria_id_foreign` (`calidad_categoria_id`),
  ADD KEY `calidad_preguntas_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `colors_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `config_correos`
--
ALTER TABLE `config_correos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_accesorios`
--
ALTER TABLE `detalle_accesorios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalle_accesorios_solicitud_accesorios_id_foreign` (`solicitud_accesorios_id`),
  ADD KEY `detalle_accesorios_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `diagnosticos_codigo_unique` (`codigo`),
  ADD KEY `diagnosticos_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `dias_festivos`
--
ALTER TABLE `dias_festivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `institucions`
--
ALTER TABLE `institucions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `institucions_nombre_unique` (`nombre`),
  ADD UNIQUE KEY `institucions_nit_unique` (`nit`),
  ADD KEY `institucions_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `nueva_ventas`
--
ALTER TABLE `nueva_ventas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nueva_ventas_codigobarras_unique` (`codigobarras`),
  ADD KEY `nueva_ventas_institucion_id_foreign` (`institucion_id`),
  ADD KEY `nueva_ventas_audiologo_id_foreign` (`audiologo_id`),
  ADD KEY `nueva_ventas_paciente_id_foreign` (`paciente_id`),
  ADD KEY `nueva_ventas_color_id_foreign` (`color_id`),
  ADD KEY `nueva_ventas_modelooi_id_foreign` (`modelooi_id`),
  ADD KEY `nueva_ventas_modelood_id_foreign` (`modelood_id`),
  ADD KEY `nueva_ventas_tecnicomolde_id_foreign` (`tecnicomolde_id`),
  ADD KEY `nueva_ventas_tecnicoelectronica_id_foreign` (`tecnicoelectronica_id`),
  ADD KEY `nueva_ventas_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pacientes_documento_unique` (`documento`),
  ADD KEY `pacientes_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `productos_accesorios`
--
ALTER TABLE `productos_accesorios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `productos_accesorios_codigo_unique` (`codigo`),
  ADD KEY `productos_accesorios_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `recomendacions`
--
ALTER TABLE `recomendacions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `recomendacions_codigo_unique` (`codigo`),
  ADD KEY `recomendacions_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `reparacion_checks`
--
ALTER TABLE `reparacion_checks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reparacion_checks_codigo_unique` (`codigo`),
  ADD KEY `reparacion_checks_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `reparacion_facturas`
--
ALTER TABLE `reparacion_facturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reparacion_facturas_solicitud_reparacion_id_foreign` (`solicitud_reparacion_id`),
  ADD KEY `reparacion_facturas_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `reparacion_tecnicas`
--
ALTER TABLE `reparacion_tecnicas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reparacion_tecnicas_solicitud_reparacion_id_foreign` (`solicitud_reparacion_id`),
  ADD KEY `reparacion_tecnicas_tipo_envio_id_foreign` (`tipo_envio_id`),
  ADD KEY `reparacion_tecnicas_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `reparacion_tec_diagnoticos`
--
ALTER TABLE `reparacion_tec_diagnoticos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reparacion_tec_diagnoticos_diagnostico_id_foreign` (`diagnostico_id`),
  ADD KEY `reparacion_tec_diagnoticos_reparacion_tecnica_id_foreign` (`reparacion_tecnica_id`);

--
-- Indices de la tabla `reparacion_tec_lista_chequeos`
--
ALTER TABLE `reparacion_tec_lista_chequeos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reparacion_tec_lista_chequeos_reparacion_check_id_foreign` (`reparacion_check_id`),
  ADD KEY `reparacion_tec_lista_chequeos_reparacion_tecnica_id_foreign` (`reparacion_tecnica_id`);

--
-- Indices de la tabla `reparacion_tec_recomendacions`
--
ALTER TABLE `reparacion_tec_recomendacions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reparacion_tec_recomendacions_recomendacion_id_foreign` (`recomendacion_id`),
  ADD KEY `reparacion_tec_recomendacions_reparacion_tecnica_id_foreign` (`reparacion_tecnica_id`);

--
-- Indices de la tabla `reparacion_tec_tipo_reparacions`
--
ALTER TABLE `reparacion_tec_tipo_reparacions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reparacion_tec_tipo_reparacions_tipo_reparacion_id_foreign` (`tipo_reparacion_id`),
  ADD KEY `reparacion_tec_tipo_reparacions_reparacion_tecnica_id_foreign` (`reparacion_tecnica_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `solicitud_accesorios`
--
ALTER TABLE `solicitud_accesorios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `solicitud_accesorios_codigobarras_unique` (`codigobarras`),
  ADD KEY `solicitud_accesorios_institucion_id_foreign` (`institucion_id`),
  ADD KEY `solicitud_accesorios_audiologo_id_foreign` (`audiologo_id`),
  ADD KEY `solicitud_accesorios_paciente_id_foreign` (`paciente_id`),
  ADD KEY `solicitud_accesorios_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `solicitud_reparacions`
--
ALTER TABLE `solicitud_reparacions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `solicitud_reparacions_codigobarras_unique` (`codigobarras`),
  ADD KEY `solicitud_reparacions_tipo_envio_id_foreign` (`tipo_envio_id`),
  ADD KEY `solicitud_reparacions_reparacion_check_id_foreign` (`reparacion_check_id`),
  ADD KEY `solicitud_reparacions_tecnicomolde_id_foreign` (`tecnicomolde_id`),
  ADD KEY `solicitud_reparacions_tecnicoelectronica_id_foreign` (`tecnicoelectronica_id`),
  ADD KEY `solicitud_reparacions_user_id_foreign` (`user_id`),
  ADD KEY `solicitud_reparacions_institucion_id_foreign` (`institucion_id`),
  ADD KEY `solicitud_reparacions_audiologo_id_foreign` (`audiologo_id`),
  ADD KEY `solicitud_reparacions_paciente_id_foreign` (`paciente_id`);

--
-- Indices de la tabla `tecnico_ventas`
--
ALTER TABLE `tecnico_ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tecnico_ventas_nueva_venta_id_foreign` (`nueva_venta_id`),
  ADD KEY `tecnico_ventas_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `tipo_clientes`
--
ALTER TABLE `tipo_clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_clientes_nombre_unique` (`nombre`),
  ADD KEY `tipo_clientes_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `tipo_entradas`
--
ALTER TABLE `tipo_entradas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_entradas_codigo_unique` (`codigo`),
  ADD KEY `tipo_entradas_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `tipo_envios`
--
ALTER TABLE `tipo_envios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_envios_codigo_unique` (`codigo`),
  ADD KEY `tipo_envios_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `tipo_reparacions`
--
ALTER TABLE `tipo_reparacions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo_reparacions_codigo_unique` (`codigo`),
  ADD KEY `tipo_reparacions_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indices de la tabla `venta_facturacions`
--
ALTER TABLE `venta_facturacions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venta_facturacions_nueva_venta_id_foreign` (`nueva_venta_id`);

--
-- Indices de la tabla `venta_trabajo_tecnicos`
--
ALTER TABLE `venta_trabajo_tecnicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venta_trabajo_tecnicos_nueva_venta_id_foreign` (`nueva_venta_id`),
  ADD KEY `venta_trabajo_tecnicos_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `atraso_justificacions`
--
ALTER TABLE `atraso_justificacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `audifono_modelos`
--
ALTER TABLE `audifono_modelos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `audifono_referencias`
--
ALTER TABLE `audifono_referencias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `audiologos`
--
ALTER TABLE `audiologos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `audiometrias`
--
ALTER TABLE `audiometrias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `calidad_categorias`
--
ALTER TABLE `calidad_categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `calidad_preguntas`
--
ALTER TABLE `calidad_preguntas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `config_correos`
--
ALTER TABLE `config_correos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_accesorios`
--
ALTER TABLE `detalle_accesorios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `dias_festivos`
--
ALTER TABLE `dias_festivos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `institucions`
--
ALTER TABLE `institucions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de la tabla `nueva_ventas`
--
ALTER TABLE `nueva_ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos_accesorios`
--
ALTER TABLE `productos_accesorios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recomendacions`
--
ALTER TABLE `recomendacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `reparacion_checks`
--
ALTER TABLE `reparacion_checks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reparacion_facturas`
--
ALTER TABLE `reparacion_facturas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `reparacion_tecnicas`
--
ALTER TABLE `reparacion_tecnicas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `reparacion_tec_diagnoticos`
--
ALTER TABLE `reparacion_tec_diagnoticos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `reparacion_tec_lista_chequeos`
--
ALTER TABLE `reparacion_tec_lista_chequeos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `reparacion_tec_recomendacions`
--
ALTER TABLE `reparacion_tec_recomendacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `reparacion_tec_tipo_reparacions`
--
ALTER TABLE `reparacion_tec_tipo_reparacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `solicitud_accesorios`
--
ALTER TABLE `solicitud_accesorios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitud_reparacions`
--
ALTER TABLE `solicitud_reparacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tecnico_ventas`
--
ALTER TABLE `tecnico_ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_clientes`
--
ALTER TABLE `tipo_clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_entradas`
--
ALTER TABLE `tipo_entradas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_envios`
--
ALTER TABLE `tipo_envios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_reparacions`
--
ALTER TABLE `tipo_reparacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `venta_facturacions`
--
ALTER TABLE `venta_facturacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `venta_trabajo_tecnicos`
--
ALTER TABLE `venta_trabajo_tecnicos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `atraso_justificacions`
--
ALTER TABLE `atraso_justificacions`
  ADD CONSTRAINT `atraso_justificacions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `audifono_modelos`
--
ALTER TABLE `audifono_modelos`
  ADD CONSTRAINT `audifono_modelos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `audifono_referencias`
--
ALTER TABLE `audifono_referencias`
  ADD CONSTRAINT `audifono_referencias_audifono_modelo_id_foreign` FOREIGN KEY (`audifono_modelo_id`) REFERENCES `audifono_modelos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `audifono_referencias_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `audiologos`
--
ALTER TABLE `audiologos`
  ADD CONSTRAINT `audiologos_institucion_id_foreign` FOREIGN KEY (`institucion_id`) REFERENCES `institucions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `audiologos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `audiometrias`
--
ALTER TABLE `audiometrias`
  ADD CONSTRAINT `audiometrias_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `calidad_categorias`
--
ALTER TABLE `calidad_categorias`
  ADD CONSTRAINT `calidad_categorias_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `calidad_preguntas`
--
ALTER TABLE `calidad_preguntas`
  ADD CONSTRAINT `calidad_preguntas_calidad_categoria_id_foreign` FOREIGN KEY (`calidad_categoria_id`) REFERENCES `calidad_categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `calidad_preguntas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `colors`
--
ALTER TABLE `colors`
  ADD CONSTRAINT `colors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_accesorios`
--
ALTER TABLE `detalle_accesorios`
  ADD CONSTRAINT `detalle_accesorios_solicitud_accesorios_id_foreign` FOREIGN KEY (`solicitud_accesorios_id`) REFERENCES `solicitud_accesorios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_accesorios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD CONSTRAINT `diagnosticos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `institucions`
--
ALTER TABLE `institucions`
  ADD CONSTRAINT `institucions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `nueva_ventas`
--
ALTER TABLE `nueva_ventas`
  ADD CONSTRAINT `nueva_ventas_audiologo_id_foreign` FOREIGN KEY (`audiologo_id`) REFERENCES `audiologos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nueva_ventas_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nueva_ventas_institucion_id_foreign` FOREIGN KEY (`institucion_id`) REFERENCES `institucions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nueva_ventas_modelood_id_foreign` FOREIGN KEY (`modelood_id`) REFERENCES `audifono_referencias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nueva_ventas_modelooi_id_foreign` FOREIGN KEY (`modelooi_id`) REFERENCES `audifono_referencias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nueva_ventas_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nueva_ventas_tecnicoelectronica_id_foreign` FOREIGN KEY (`tecnicoelectronica_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nueva_ventas_tecnicomolde_id_foreign` FOREIGN KEY (`tecnicomolde_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nueva_ventas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos_accesorios`
--
ALTER TABLE `productos_accesorios`
  ADD CONSTRAINT `productos_accesorios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recomendacions`
--
ALTER TABLE `recomendacions`
  ADD CONSTRAINT `recomendacions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reparacion_checks`
--
ALTER TABLE `reparacion_checks`
  ADD CONSTRAINT `reparacion_checks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reparacion_facturas`
--
ALTER TABLE `reparacion_facturas`
  ADD CONSTRAINT `reparacion_facturas_solicitud_reparacion_id_foreign` FOREIGN KEY (`solicitud_reparacion_id`) REFERENCES `solicitud_reparacions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reparacion_facturas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reparacion_tecnicas`
--
ALTER TABLE `reparacion_tecnicas`
  ADD CONSTRAINT `reparacion_tecnicas_solicitud_reparacion_id_foreign` FOREIGN KEY (`solicitud_reparacion_id`) REFERENCES `solicitud_reparacions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reparacion_tecnicas_tipo_envio_id_foreign` FOREIGN KEY (`tipo_envio_id`) REFERENCES `tipo_envios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reparacion_tecnicas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reparacion_tec_diagnoticos`
--
ALTER TABLE `reparacion_tec_diagnoticos`
  ADD CONSTRAINT `reparacion_tec_diagnoticos_diagnostico_id_foreign` FOREIGN KEY (`diagnostico_id`) REFERENCES `diagnosticos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reparacion_tec_diagnoticos_reparacion_tecnica_id_foreign` FOREIGN KEY (`reparacion_tecnica_id`) REFERENCES `reparacion_tecnicas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reparacion_tec_lista_chequeos`
--
ALTER TABLE `reparacion_tec_lista_chequeos`
  ADD CONSTRAINT `reparacion_tec_lista_chequeos_reparacion_check_id_foreign` FOREIGN KEY (`reparacion_check_id`) REFERENCES `reparacion_checks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reparacion_tec_lista_chequeos_reparacion_tecnica_id_foreign` FOREIGN KEY (`reparacion_tecnica_id`) REFERENCES `reparacion_tecnicas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reparacion_tec_recomendacions`
--
ALTER TABLE `reparacion_tec_recomendacions`
  ADD CONSTRAINT `reparacion_tec_recomendacions_recomendacion_id_foreign` FOREIGN KEY (`recomendacion_id`) REFERENCES `recomendacions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reparacion_tec_recomendacions_reparacion_tecnica_id_foreign` FOREIGN KEY (`reparacion_tecnica_id`) REFERENCES `reparacion_tecnicas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reparacion_tec_tipo_reparacions`
--
ALTER TABLE `reparacion_tec_tipo_reparacions`
  ADD CONSTRAINT `reparacion_tec_tipo_reparacions_reparacion_tecnica_id_foreign` FOREIGN KEY (`reparacion_tecnica_id`) REFERENCES `reparacion_tecnicas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reparacion_tec_tipo_reparacions_tipo_reparacion_id_foreign` FOREIGN KEY (`tipo_reparacion_id`) REFERENCES `tipo_reparacions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `solicitud_accesorios`
--
ALTER TABLE `solicitud_accesorios`
  ADD CONSTRAINT `solicitud_accesorios_audiologo_id_foreign` FOREIGN KEY (`audiologo_id`) REFERENCES `audiologos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_accesorios_institucion_id_foreign` FOREIGN KEY (`institucion_id`) REFERENCES `institucions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_accesorios_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_accesorios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitud_reparacions`
--
ALTER TABLE `solicitud_reparacions`
  ADD CONSTRAINT `solicitud_reparacions_audiologo_id_foreign` FOREIGN KEY (`audiologo_id`) REFERENCES `audiologos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_reparacions_institucion_id_foreign` FOREIGN KEY (`institucion_id`) REFERENCES `institucions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_reparacions_paciente_id_foreign` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_reparacions_reparacion_check_id_foreign` FOREIGN KEY (`reparacion_check_id`) REFERENCES `reparacion_checks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_reparacions_tecnicoelectronica_id_foreign` FOREIGN KEY (`tecnicoelectronica_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_reparacions_tecnicomolde_id_foreign` FOREIGN KEY (`tecnicomolde_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_reparacions_tipo_envio_id_foreign` FOREIGN KEY (`tipo_envio_id`) REFERENCES `tipo_envios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_reparacions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tecnico_ventas`
--
ALTER TABLE `tecnico_ventas`
  ADD CONSTRAINT `tecnico_ventas_nueva_venta_id_foreign` FOREIGN KEY (`nueva_venta_id`) REFERENCES `nueva_ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tecnico_ventas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipo_clientes`
--
ALTER TABLE `tipo_clientes`
  ADD CONSTRAINT `tipo_clientes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipo_entradas`
--
ALTER TABLE `tipo_entradas`
  ADD CONSTRAINT `tipo_entradas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipo_envios`
--
ALTER TABLE `tipo_envios`
  ADD CONSTRAINT `tipo_envios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tipo_reparacions`
--
ALTER TABLE `tipo_reparacions`
  ADD CONSTRAINT `tipo_reparacions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta_facturacions`
--
ALTER TABLE `venta_facturacions`
  ADD CONSTRAINT `venta_facturacions_nueva_venta_id_foreign` FOREIGN KEY (`nueva_venta_id`) REFERENCES `nueva_ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta_trabajo_tecnicos`
--
ALTER TABLE `venta_trabajo_tecnicos`
  ADD CONSTRAINT `venta_trabajo_tecnicos_nueva_venta_id_foreign` FOREIGN KEY (`nueva_venta_id`) REFERENCES `nueva_ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_trabajo_tecnicos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
