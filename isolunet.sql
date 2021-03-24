-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-03-2021 a las 16:52:16
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
-- Base de datos: `isolunet`
--

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_14_184755_entrust_setup_tables', 1),
(4, '2019_03_17_150938_tbl_empresa_migracion', 1),
(5, '2019_03_17_182117_tbl_datos_corporativos_migracion', 1),
(6, '2019_04_02_003442_tbl_areas_migracion', 1),
(7, '2019_04_02_003529_tbl_cargos_migracion', 1),
(8, '2019_05_28_123538_tbl_procesos_migracion', 1),
(9, '2019_05_28_123940_tbl_procesos_user_migracion', 1),
(10, '2019_06_08_093621_tbl_sistema_gestion_migracion', 1),
(11, '2019_06_08_093713_tbl_sistema_gestion_procesos_migracion', 1),
(12, '2019_07_23_110122_tbl_tendencia_en_colombia_migracion', 1),
(13, '2019_07_23_123603_tbl_analisis_pestal_migracion', 1),
(14, '2019_07_23_142803_tbl_dofa_migracion', 1),
(15, '2019_07_24_123705_tbl_riesgos_oportunidades_migracion', 1),
(16, '2019_12_12_154219_tbl_partei_calificaciones', 1),
(17, '2020_03_29_144250_tbl_partei_master', 1),
(18, '2020_05_09_102937_tbl_indicadores', 1),
(19, '2020_06_07_172952_tbl_origen_anomalias_migration', 1),
(20, '2020_06_22_144434_tbl_mejora_anomalia_migration', 1),
(21, '2020_09_11_131717_tbl_documentos', 2);

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
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(3, 'Habilitar Menu parametrizacion', 'Habilitar Menu parametrizacion', NULL, '2019-05-27 18:33:51', '2019-05-27 18:33:51'),
(4, 'Habilitar Menu Contexto Organizacional', 'Habilitar Menu Contexto Organizacional', NULL, '2019-05-27 18:34:06', '2019-05-27 18:34:06'),
(5, 'Habilitar Menu Liderazgo', 'Habilitar Menu Liderazgo', NULL, '2019-05-27 18:34:16', '2019-05-27 18:34:16'),
(6, 'Habilitar Menu Planificacion', 'Habilitar Menu Planificacion', NULL, '2019-05-27 18:34:26', '2019-05-27 18:34:26'),
(7, 'Habilitar Menu Apoyo', 'Habilitar Menu Apoyo', NULL, '2019-05-27 18:34:34', '2019-05-27 18:34:34'),
(8, 'Habilitar Menu Operacion', 'Habilitar Menu Operacion', NULL, '2019-05-27 18:34:44', '2019-05-27 18:34:44'),
(9, 'Habilitar Menu Evaluacion Desempeño', 'Habilitar Menu Evaluacion Desempeño', NULL, '2019-05-27 18:34:51', '2019-05-27 18:34:51'),
(10, 'Habilitar Menu Mejora', 'Habilitar Menu Mejora', NULL, '2019-05-27 18:34:59', '2019-05-27 18:34:59'),
(11, 'Habilitar submenu parametrizacion-Empresas', 'Habilitar submenu parametrizacion-Empresas', NULL, '2019-05-27 18:44:14', '2019-05-27 18:44:14'),
(12, 'Habilitar submenu parametrizacion-Datos Corporativos', 'Habilitar submenu parametrizacion-Datos Corporativos', NULL, '2019-05-27 18:44:28', '2019-05-27 18:44:28'),
(13, 'Habilitar submenu parametrizacion-Areas', 'Habilitar submenu parametrizacion-Areas', NULL, '2019-05-27 18:44:36', '2019-05-27 18:44:36'),
(14, 'Habilitar submenu parametrizacion-Cargos', 'Habilitar submenu parametrizacion-Cargos', NULL, '2019-05-27 18:44:45', '2019-05-27 18:44:45'),
(15, 'Habilitar submenu parametrizacion-Usuarios', 'Habilitar submenu parametrizacion-Usuarios', NULL, '2019-05-27 18:44:54', '2019-05-27 18:44:54'),
(16, 'Habilitar submenu parametrizacion-Procesos', 'Habilitar submenu parametrizacion-Procesos', NULL, '2019-05-27 18:45:03', '2019-05-27 18:45:03'),
(17, 'Habilitar submenu parametrizacion-Documentos', 'Habilitar submenu parametrizacion-Documentos', NULL, '2019-05-27 18:45:11', '2019-05-27 18:45:11'),
(18, 'Habilitar submenu parametrizacion-Sitema de Gestion', 'Habilitar submenu parametrizacion-Sitema de Gestion', NULL, '2019-05-27 18:45:19', '2019-05-27 18:45:19'),
(19, 'Habilitar submenu parametrizacion-cambio de empresa', 'Habilitar submenu parametrizacion-cambio de empresa', NULL, '2020-09-17 02:20:19', '2020-09-17 02:20:19'),
(20, 'Habilitar submenu parametrizacion-origen de anomalia', 'Habilitar submenu parametrizacion-origen de anomalia', NULL, '2020-09-17 02:20:43', '2020-09-17 02:20:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadministrador', 'Super administrador', 'Super admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4FEOQ5WfkfMfphbP6lDiiA3N5qpTihUlyhbolDWX', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidTR3MUhmdzAzWm43NDdpbWNtbDhsemxoT2RCcmNGSmtCeDBkMnRFcSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MztzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0OToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3Bhcm1fcHJlc3VwdWVzdG8/ZW1wcmVzYT0xMSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NToiYWxlcnQiO2E6MDp7fX0=', 1616255389),
('vfkFOthw1cdE2zJVV3CMClwssTV184ZWZyQaTfeT', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.192 Safari/537.36 OPR/74.0.3911.218', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYXVVM2tZYVB6RjRQdmJRNEZrSHk5bFJCcUF3VUVtQkpVbmJtVDk4aiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3Bhcm1fZW1wcmVzYSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ5OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcGFybV9wcmVzdXB1ZXN0bz9lbXByZXNhPTEzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Njt9', 1616255375);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_acciones_correctivas`
--

CREATE TABLE `tbl_acciones_correctivas` (
  `id_acciones_correctivas` int(10) UNSIGNED NOT NULL,
  `fk_anomalia` int(10) UNSIGNED NOT NULL,
  `str_causa_raiz` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `str_que` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `str_quien` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `file_archivo_causa_raiz` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bool_estado_causa_raiz` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_areas`
--

CREATE TABLE `tbl_areas` (
  `id_area` int(10) UNSIGNED NOT NULL,
  `nom_area` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_empresa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_areas`
--

INSERT INTO `tbl_areas` (`id_area`, `nom_area`, `bool_estado`, `fk_empresa`, `created_at`, `updated_at`) VALUES
(5, 'Administrativa_G', 1, 2, '2020-09-14 20:24:41', '2020-09-14 20:29:49'),
(6, 'Gerencial_G', 1, 2, '2020-09-14 20:24:48', '2020-09-14 20:29:56'),
(7, 'Salud en el trabajo', 1, 2, '2020-09-26 22:25:27', '2020-09-26 22:25:38'),
(8, 'asdadasdasd', 0, 2, '2020-09-26 22:51:37', '2020-09-26 22:51:46'),
(9, 'Administracion canver', 1, 10, '2021-03-13 00:07:04', '2021-03-13 00:07:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cal_proveedor`
--

CREATE TABLE `tbl_cal_proveedor` (
  `id_cal_proveedor` int(10) UNSIGNED NOT NULL,
  `fec_evaluar` date NOT NULL,
  `cum_entrega` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cum_pedidos` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cum_precios` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cum_servicios` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cum_productos` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` float(2,1) NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_insumo` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_cal_proveedor`
--

INSERT INTO `tbl_cal_proveedor` (`id_cal_proveedor`, `fec_evaluar`, `cum_entrega`, `cum_pedidos`, `cum_precios`, `cum_servicios`, `cum_productos`, `total`, `bool_estado`, `fk_insumo`, `created_at`, `updated_at`) VALUES
(14, '2021-03-16', 'No', '21% a 40%', 'Si', 'Si', '1% a 20%', 2.8, 0, 16, '2021-03-17 03:45:39', '2021-03-20 02:20:47'),
(15, '2021-03-16', 'No', '41% a 60%', 'No', 'Si', '21% a 40%', 2.4, 1, 7, '2021-03-17 03:46:30', '2021-03-17 03:47:13'),
(16, '2021-03-19', 'Si', '100%', 'No', 'No', '1% a 20%', 2.6, 1, 8, '2021-03-19 16:38:12', '2021-03-20 02:28:27'),
(17, '2021-03-19', 'No', '100%', 'No', 'No', '1% a 20%', 1.8, 1, 17, '2021-03-20 02:26:47', '2021-03-20 02:27:14'),
(18, '2021-03-20', 'Si', '1% a 20%', 'Si', 'Si', '100%', 4.2, 1, 21, '2021-03-20 13:41:49', '2021-03-20 13:42:25'),
(19, '2021-03-20', 'Si', '100%', 'No', 'No', '100%', 3.4, 1, 22, '2021-03-20 15:04:58', '2021-03-20 15:04:58'),
(20, '2021-03-20', 'Si', '100%', 'No', 'No', '100%', 3.4, 1, 23, '2021-03-20 15:43:19', '2021-03-20 15:43:19'),
(21, '2021-03-19', 'Si', '41% a 60%', 'No', 'No', '100%', 3.0, 1, 24, '2021-03-20 15:43:37', '2021-03-20 15:43:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cargos`
--

CREATE TABLE `tbl_cargos` (
  `id_cargo` int(10) UNSIGNED NOT NULL,
  `nom_cargo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_area` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_cargos`
--

INSERT INTO `tbl_cargos` (`id_cargo`, `nom_cargo`, `bool_estado`, `fk_area`, `created_at`, `updated_at`) VALUES
(1, 'Gerente', 0, 6, '2020-09-14 22:35:08', '2020-09-14 22:35:24'),
(2, 'Administrador', 1, 5, '2020-09-14 22:36:10', '2020-09-14 22:36:10'),
(3, 'Gerente', 1, 6, '2020-09-14 22:36:39', '2020-09-14 22:36:39'),
(4, 'Auxiliar Administrativo', 1, 6, '2020-09-17 16:29:59', '2020-09-17 16:30:11'),
(5, 'Medico laboral', 1, 7, '2020-09-26 22:25:58', '2020-09-26 22:25:58'),
(6, 'Auxiliar administrativo', 1, 9, '2021-03-13 00:11:46', '2021-03-13 00:11:46'),
(7, 'Gerente', 1, 9, '2021-03-20 03:50:42', '2021-03-20 03:50:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_causa_raiz_anomalia`
--

CREATE TABLE `tbl_causa_raiz_anomalia` (
  `id_causa_raiz_anomalia` int(10) UNSIGNED NOT NULL,
  `fk_anomalia` int(10) UNSIGNED NOT NULL,
  `str_causa_raiz` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `str_6m` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `str_porque1` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `str_porque2` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `str_porque3` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `str_porque4` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `str_porque5` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado_causa_raiz` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contexto_analisis_pestal`
--

CREATE TABLE `tbl_contexto_analisis_pestal` (
  `id_analisis_pestal` int(10) UNSIGNED NOT NULL,
  `politicos` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `economicos` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sociales` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tecnologicos` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ambientales` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `legales` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fk_empresa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_contexto_analisis_pestal`
--

INSERT INTO `tbl_contexto_analisis_pestal` (`id_analisis_pestal`, `politicos`, `economicos`, `sociales`, `tecnologicos`, `ambientales`, `legales`, `fk_empresa`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 2, '2020-09-18 23:25:47', '2020-09-18 23:25:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contexto_dofa`
--

CREATE TABLE `tbl_contexto_dofa` (
  `id_dofa` int(10) UNSIGNED NOT NULL,
  `debilidades` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fortalezas` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amenazas` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oportunidades` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fk_empresa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_contexto_dofa`
--

INSERT INTO `tbl_contexto_dofa` (`id_dofa`, `debilidades`, `fortalezas`, `amenazas`, `oportunidades`, `fk_empresa`, `created_at`, `updated_at`) VALUES
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 2, '2020-09-18 23:29:48', '2020-09-18 23:29:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contexto_egresos`
--

CREATE TABLE `tbl_contexto_egresos` (
  `id_egreso` int(10) UNSIGNED NOT NULL,
  `nom_egreso` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proyectado_egreso` int(11) NOT NULL,
  `real_egreso` int(11) NOT NULL,
  `total_diferencia_egreso` int(11) NOT NULL,
  `diferencia_egreso` int(11) NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_empresa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_contexto_egresos`
--

INSERT INTO `tbl_contexto_egresos` (`id_egreso`, `nom_egreso`, `proyectado_egreso`, `real_egreso`, `total_diferencia_egreso`, `diferencia_egreso`, `bool_estado`, `fk_empresa`, `created_at`, `updated_at`) VALUES
(1, 'casd', 123, 123, 0, 0, 0, 10, '2021-03-19 21:30:41', '2021-03-20 00:41:58'),
(2, 'ITEM', 123123, 123123, 0, 0, 0, 10, '2021-03-19 21:40:52', '2021-03-20 00:42:03'),
(3, 'ITEM', 123123, 123123, 0, 0, 0, 10, '2021-03-19 21:42:21', '2021-03-20 00:42:07'),
(4, 'sdfasd', 123, 1234, 1111, 9, 0, 10, '2021-03-20 00:38:56', '2021-03-20 01:44:42'),
(5, 'zsdzd', 23, 123, 100, 4, 0, 10, '2021-03-20 00:41:12', '2021-03-20 01:44:45'),
(6, 'BONIFICACIONES', 225000, 225000, 0, 0, 1, 10, '2021-03-20 01:44:37', '2021-03-20 01:44:37'),
(7, 'PUBILICIDAD', 845363, 845636, 273, 0, 1, 10, '2021-03-20 01:45:02', '2021-03-20 01:45:02'),
(8, 'COORDINACION DE CALIDAD', 350000, 380000, 30000, 9, 1, 10, '2021-03-20 01:45:22', '2021-03-20 01:45:22'),
(9, 'COORDINADOR DE GESTION HUMANA', 833000, 833000, 0, 0, 1, 10, '2021-03-20 01:45:37', '2021-03-20 01:45:37'),
(10, 'IMPREVISTOS', 515000, 530000, 15000, 3, 1, 10, '2021-03-20 01:45:57', '2021-03-20 01:45:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contexto_ingresos`
--

CREATE TABLE `tbl_contexto_ingresos` (
  `id_ingreso` int(10) UNSIGNED NOT NULL,
  `nom_ingreso` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proyectado_ingreso` int(11) NOT NULL,
  `real_ingreso` int(11) NOT NULL,
  `total_diferencia_ingreso` int(11) NOT NULL,
  `diferencia_ingreso` int(11) NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_empresa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_contexto_ingresos`
--

INSERT INTO `tbl_contexto_ingresos` (`id_ingreso`, `nom_ingreso`, `proyectado_ingreso`, `real_ingreso`, `total_diferencia_ingreso`, `diferencia_ingreso`, `bool_estado`, `fk_empresa`, `created_at`, `updated_at`) VALUES
(2, 'aaaaa', 7589000, 7589000, 0, 0, 0, 10, '2021-03-19 20:50:53', '2021-03-19 21:51:33'),
(3, 'oljklj', 7589000, 7589000, 0, 0, 0, 10, '2021-03-19 20:50:59', '2021-03-19 21:52:28'),
(4, 'MATRICULAS BACHILLERATO', 7589000, 7589000, 0, 0, 0, 10, '2021-03-19 20:55:02', '2021-03-19 23:22:26'),
(5, 'MATRICULAS BACHILLERATO', 7589000, 7589000, 0, 0, 0, 10, '2021-03-19 20:55:45', '2021-03-19 23:24:31'),
(6, 'CARLOS', 2020, 2021, 1, 0, 0, 10, '2021-03-19 20:57:49', '2021-03-19 23:28:33'),
(7, 'CARLOS', 122, 123, 1, 0, 0, 10, '2021-03-19 20:58:42', '2021-03-19 23:32:28'),
(8, 'CARLOS', 2020, 2021, 1, 0, 0, 10, '2021-03-19 21:02:19', '2021-03-19 23:33:32'),
(9, 'aaaaa', 2345, 1234, -1111, 0, 0, 10, '2021-03-19 21:02:47', '2021-03-19 21:08:45'),
(10, 'ITEM', 123123, 12312312, 12189189, 99, 0, 10, '2021-03-19 21:05:01', '2021-03-19 22:49:33'),
(11, 'ITEM', 123123, 12312312, 12189189, 99, 0, 10, '2021-03-19 21:05:07', '2021-03-19 23:23:55'),
(12, 'ITEM', 123123, 12312312, 12189189, 99, 0, 10, '2021-03-19 21:06:57', '2021-03-19 22:49:02'),
(13, 'MATRICULAS BACHILLERATO', 7589000, 1000, -7588000, -1, 0, 12, '2021-03-19 22:44:29', '2021-03-19 23:14:45'),
(14, 'MATRICULAS BACHILLERATO', 7589000, 7589000, 0, 0, 0, 12, '2021-03-19 22:45:32', '2021-03-19 23:15:07'),
(15, 'MATRICULAS BACHILLERATO', 234, 234, 0, 0, 0, 12, '2021-03-19 22:52:16', '2021-03-19 23:17:56'),
(16, 'dfg', 4566, 4564, -2, 0, 0, 12, '2021-03-19 22:53:46', '2021-03-20 00:20:32'),
(17, 'dfgh', 45, 45, 0, 0, 0, 12, '2021-03-19 22:56:44', '2021-03-20 00:20:37'),
(18, 'carlos', 123456, 123456, 0, 0, 0, 12, '2021-03-19 22:57:27', '2021-03-20 00:22:23'),
(19, 'sfgsdfg', 45, 456, 411, 9, 0, 12, '2021-03-19 22:59:43', '2021-03-20 00:22:26'),
(20, 'asdf', 1234, 1234, 0, 0, 0, 12, '2021-03-19 23:09:27', '2021-03-20 00:22:31'),
(21, 'fgh', 2345, 2345, 0, 0, 0, 12, '2021-03-19 23:10:04', '2021-03-20 00:22:34'),
(22, 'dfgh', 456, 456, 0, 0, 0, 12, '2021-03-19 23:11:03', '2021-03-19 23:19:59'),
(23, 'asd', 34, 234, 200, 6, 0, 10, '2021-03-19 23:34:02', '2021-03-20 01:25:08'),
(24, 'SDFHSFGH', 456, 456, 0, 0, 1, 11, '2021-03-19 23:51:01', '2021-03-19 23:51:01'),
(25, 'MATRICULAS BACHILLERATO', 7589000, 7589000, 0, 0, 1, 10, '2021-03-20 01:25:42', '2021-03-20 01:25:42'),
(26, 'MENSUALIDADES BACHILLERATO', 17553360, 17553360, 0, 0, 1, 10, '2021-03-20 01:25:57', '2021-03-20 01:25:57'),
(27, 'MATRICULAS PROGRAMAS TECNICOS', 20880333, 22314166, 1433833, 7, 1, 10, '2021-03-20 01:26:47', '2021-03-20 01:37:37'),
(28, 'MATRICULAS CURSOS PERSONALIZADOS', 803333, 645000, -158333, -20, 1, 10, '2021-03-20 01:27:11', '2021-03-20 01:37:53'),
(29, 'INGRESOS VARIOS', 4662500, 5256666, 594166, 13, 1, 10, '2021-03-20 01:28:13', '2021-03-20 01:38:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contexto_riesgos_oportunidades`
--

CREATE TABLE `tbl_contexto_riesgos_oportunidades` (
  `id_riesgos_oportunidades` int(10) UNSIGNED NOT NULL,
  `riesgo_oportunidad` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clasificacion` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fk_empresa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_contexto_riesgos_oportunidades`
--

INSERT INTO `tbl_contexto_riesgos_oportunidades` (`id_riesgos_oportunidades`, `riesgo_oportunidad`, `clasificacion`, `fk_empresa`, `created_at`, `updated_at`) VALUES
(2, 'Lorem ipsum dolor sit amet, consectetur  elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Lorem ipsum dolor sit amet, consectetur  elit, sed do eiusmod tempor incididunt ut  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 2, '2020-09-18 23:34:55', '2020-09-18 23:36:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contexto_tendencias_colombia`
--

CREATE TABLE `tbl_contexto_tendencias_colombia` (
  `id_tendencia_colombia` int(10) UNSIGNED NOT NULL,
  `tendencia_colombia` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fk_empresa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_contexto_tendencias_colombia`
--

INSERT INTO `tbl_contexto_tendencias_colombia` (`id_tendencia_colombia`, `tendencia_colombia`, `fk_empresa`, `created_at`, `updated_at`) VALUES
(1, '<p>Con la informaci&oacute;n Misi&oacute;n, Visi&oacute;n, Principios, Valores, Estrategias, Pol&iacute;tica de Calidad, Objetivos y basada en la metodolog&iacute;a del<strong> Balanced score card </strong>de Kaplan y Norton se realizaron preguntas que permiten consolidar la informaci&oacute;n y focalizarla <em>para definir su futuro estrat&eacute;gico.</em></p>', 2, '2020-09-18 23:13:00', '2020-09-18 23:13:00'),
(2, '<p>Administraci&oacute;n de Tendencias en Colombia</p>', 10, '2021-03-17 20:09:03', '2021-03-17 20:09:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_correcciones_anomalias`
--

CREATE TABLE `tbl_correcciones_anomalias` (
  `id_correccion_anomalia` int(10) UNSIGNED NOT NULL,
  `fk_anomalia` int(10) UNSIGNED NOT NULL,
  `str_correccion_anomalia` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `str_quien` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `bool_estado_correcion` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_criticidad`
--

CREATE TABLE `tbl_criticidad` (
  `id_criticidad` int(10) UNSIGNED NOT NULL,
  `antiguedad` int(10) NOT NULL,
  `calidad` int(10) NOT NULL,
  `ubicacion` int(10) NOT NULL,
  `postventa` int(10) NOT NULL,
  `cal_total` int(20) NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_insumo` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_criticidad`
--

INSERT INTO `tbl_criticidad` (`id_criticidad`, `antiguedad`, `calidad`, `ubicacion`, `postventa`, `cal_total`, `bool_estado`, `fk_insumo`, `created_at`, `updated_at`) VALUES
(7, 10, 10, 10, 10, 10, 1, 7, '2021-03-16 00:32:44', '2021-03-16 00:32:44'),
(9, 5, 5, 5, 5, 5, 1, 7, '2021-03-17 02:29:53', '2021-03-17 02:58:32'),
(10, 5, 5, 5, 5, 5, 1, 16, '2021-03-17 02:30:23', '2021-03-17 02:30:23'),
(11, 10, 10, 10, 10, 10, 1, 20, '2021-03-19 16:37:17', '2021-03-19 16:37:17'),
(12, 10, 10, 10, 10, 10, 1, 21, '2021-03-20 13:40:10', '2021-03-20 13:40:10'),
(13, 10, 10, 10, 10, 10, 1, 22, '2021-03-20 15:03:30', '2021-03-20 15:03:30'),
(14, 10, 10, 10, 10, 10, 1, 23, '2021-03-20 15:42:16', '2021-03-20 15:42:16'),
(15, 10, 10, 10, 10, 5, 1, 25, '2021-03-20 15:42:33', '2021-03-20 15:42:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cri_calificacion`
--

CREATE TABLE `tbl_cri_calificacion` (
  `id_cri_calificacion` int(10) UNSIGNED NOT NULL,
  `fecha_calificacion` date NOT NULL,
  `pro_reevaluacion` int(5) NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_cal_proveedor` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_cri_calificacion`
--

INSERT INTO `tbl_cri_calificacion` (`id_cri_calificacion`, `fecha_calificacion`, `pro_reevaluacion`, `bool_estado`, `fk_cal_proveedor`, `created_at`, `updated_at`) VALUES
(6, '2021-03-09', 1, 1, 15, '2021-03-17 04:52:51', '2021-03-17 04:52:51'),
(7, '2021-03-10', 5, 0, 15, '2021-03-17 05:11:25', '2021-03-17 19:39:51'),
(8, '2021-03-11', 1, 1, 15, '2021-03-17 05:13:24', '2021-03-17 05:13:24'),
(9, '2021-03-03', 1, 0, 14, '2021-03-17 05:15:09', '2021-03-17 19:38:33'),
(10, '2021-03-03', 5, 0, 15, '2021-03-17 05:15:27', '2021-03-17 19:09:17'),
(13, '2021-03-18', 5, 1, 15, '2021-03-19 16:42:29', '2021-03-19 16:42:29'),
(14, '2021-03-19', 5, 1, 15, '2021-03-19 16:48:39', '2021-03-19 16:48:39'),
(15, '2021-03-20', 5, 1, 18, '2021-03-20 13:47:16', '2021-03-20 13:47:16'),
(16, '2021-03-20', 1, 1, 18, '2021-03-20 13:47:57', '2021-03-20 13:47:57'),
(17, '2021-03-26', 1, 1, 18, '2021-03-20 13:48:15', '2021-03-20 13:48:15'),
(18, '2021-03-20', 5, 1, 21, '2021-03-20 15:47:59', '2021-03-20 15:47:59'),
(19, '2021-03-19', 5, 1, 21, '2021-03-20 15:48:16', '2021-03-20 15:48:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_datos_corporativos`
--

CREATE TABLE `tbl_datos_corporativos` (
  `id_datos_corporativos` int(10) UNSIGNED NOT NULL,
  `str_mision` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `str_vision` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `str_principios` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `str_estrategias` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `str_politica` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `str_Objetivos` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fk_empresa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_datos_corporativos`
--

INSERT INTO `tbl_datos_corporativos` (`id_datos_corporativos`, `str_mision`, `str_vision`, `str_principios`, `str_estrategias`, `str_politica`, `str_Objetivos`, `fk_empresa`, `created_at`, `updated_at`) VALUES
(1, 'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate', 'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate', 'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate', 'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate', 'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate', 'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate', 3, '2020-09-14 20:18:43', '2020-09-14 20:18:43'),
(2, 'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate', 'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderasasit qui in ea voluptate Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboasriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate', 'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum asdasdiure reprehenderit qui in ea voluptate Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate', 'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate', 'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate', 'Ut  minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate', 2, '2020-09-14 20:23:04', '2020-09-26 21:55:18'),
(3, 'Misión', 'Visión', '', 'Estrategia', 'Política', 'Objetivos', 10, '2021-03-12 23:31:07', '2021-03-12 23:31:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_documentos`
--

CREATE TABLE `tbl_documentos` (
  `id_documento` int(10) UNSIGNED NOT NULL,
  `nombre_documento` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla_documento` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_empresa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_documentos`
--

INSERT INTO `tbl_documentos` (`id_documento`, `nombre_documento`, `sigla_documento`, `bool_estado`, `fk_empresa`, `created_at`, `updated_at`) VALUES
(1, 'Documento', 'Hola', 0, 2, '2020-09-11 20:27:56', '2020-09-14 19:38:23'),
(2, 'asdaaaf', 'ASD', 0, 2, '2020-09-11 21:22:07', '2020-09-18 16:45:09'),
(5, 'prueba', 'documento', 0, 2, '2020-09-11 21:30:49', '2020-09-18 16:45:14'),
(8, 'Documento 2', 'D-2', 0, 2, '2020-09-14 17:09:14', '2020-09-26 22:42:12'),
(9, 'Documento Cristian', 'DC', 1, 3, '2020-09-14 17:10:40', '2020-09-14 17:10:40'),
(10, 'Documento Gustavo', 'DG', 0, 2, '2020-09-14 17:20:11', '2020-09-14 19:39:17'),
(12, 'Lunes', 'L', 0, 2, '2020-09-14 19:14:36', '2020-09-14 19:39:21'),
(14, 'Documento viernes', 'DVIE', 0, 2, '2020-09-18 16:43:50', '2020-09-19 22:56:48'),
(15, 'Documento iso', 'DI', 1, 2, '2020-09-26 22:42:10', '2020-09-26 22:42:20'),
(16, 'Nombre de Documento', 'No', 0, 10, '2021-03-13 01:16:06', '2021-03-13 01:16:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empresa`
--

CREATE TABLE `tbl_empresa` (
  `id_empresa` int(10) UNSIGNED NOT NULL,
  `razon_social` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `representante` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_logoem.png',
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_usuario` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_empresa`
--

INSERT INTO `tbl_empresa` (`id_empresa`, `razon_social`, `nit`, `representante`, `direccion`, `celular`, `image`, `bool_estado`, `fk_usuario`, `created_at`, `updated_at`) VALUES
(2, 'Gustavo SAS', '900665987', 'Juan López', 'cll 1 35-42', '3216526598', 'logo_cyg.png', 1, 2, '2020-09-10 17:43:12', '2020-09-14 19:47:21'),
(3, 'Cristian S.A.S.', '321564987', 'Cristian Vargas', 'cll 1 cra 5', '3206587489', 'logo_cyg.png', 1, 1, '2020-09-14 17:10:23', '2020-09-26 21:43:54'),
(10, 'CANVER SAS', '1084551223', 'juan', 'calle 10', '3216549874', 'output-onlinepngtools (4).png', 0, 3, '2021-03-12 23:26:47', '2021-03-20 14:50:05'),
(11, 'Pasto Ciudad Digital', '10213214', 'Carlos Ruiz', 'calle 12-12|', '3216549871', 'logo CD.png', 1, 3, '2021-03-18 12:28:22', '2021-03-18 12:28:22'),
(12, 'Café Occidente TDA', '110215121', 'Carlos Ruiz', 'calle12', '3216549874', 'output-onlinepngtools (8).png', 0, 3, '2021-03-18 20:39:31', '2021-03-20 14:49:59'),
(13, 'Pollo al Día ltda', '123456111', 'canver', 'calle12', '3216549874', 'output-onlinepngtools (2).png', 1, 6, '2021-03-20 14:49:51', '2021-03-20 14:49:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_indicadores`
--

CREATE TABLE `tbl_indicadores` (
  `id_indicador` int(10) UNSIGNED NOT NULL,
  `nombre` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frequencia` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `freq_inicio` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mejor_hacia` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo_eje_y` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `decimales` int(11) DEFAULT NULL,
  `fk_sgc` int(10) UNSIGNED NOT NULL,
  `fk_proceso` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_insumos`
--

CREATE TABLE `tbl_insumos` (
  `id_insumo` int(10) UNSIGNED NOT NULL,
  `nom_insumo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `cal_proveedor_status` tinyint(1) NOT NULL DEFAULT 1,
  `fk_proveedor` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_insumos`
--

INSERT INTO `tbl_insumos` (`id_insumo`, `nom_insumo`, `bool_estado`, `cal_proveedor_status`, `fk_proveedor`, `created_at`, `updated_at`) VALUES
(7, 'cal', 0, 0, 9, '2021-03-15 18:29:05', '2021-03-20 15:18:46'),
(8, 'Computadores', 1, 0, 9, '2021-03-15 19:05:07', '2021-03-19 16:38:12'),
(9, 'Pcs', 0, 1, 11, '2021-03-15 19:06:01', '2021-03-15 19:20:00'),
(10, 'insumo14', 0, 1, 12, '2021-03-17 00:28:14', '2021-03-17 01:52:59'),
(13, 'insumo1.1', 1, 1, 12, '2021-03-17 01:27:51', '2021-03-17 01:27:51'),
(14, 'insumo1.1', 1, 1, 12, '2021-03-17 01:27:52', '2021-03-17 01:27:52'),
(15, 'insumo1.2', 1, 1, 12, '2021-03-17 01:28:21', '2021-03-17 01:28:21'),
(16, 'papel pasto', 0, 0, 16, '2021-03-17 01:43:54', '2021-03-20 15:19:02'),
(17, 'SOLUCIÓN BIOQUÍMICA', 0, 0, 17, '2021-03-17 03:16:58', '2021-03-20 15:18:34'),
(18, 'Sistema Modular', 1, 1, 17, '2021-03-17 03:17:20', '2021-03-17 03:17:20'),
(19, 'Equipo Rayos X', 1, 1, 17, '2021-03-17 03:17:59', '2021-03-17 03:17:59'),
(20, 'Cuadernos', 1, 1, 17, '2021-03-19 16:35:17', '2021-03-19 16:35:17'),
(21, 'cartulina', 0, 0, 18, '2021-03-20 13:37:00', '2021-03-20 15:18:38'),
(22, 'Pollos fresco', 1, 0, 19, '2021-03-20 15:02:05', '2021-03-20 15:04:58'),
(23, 'Teclados', 1, 0, 20, '2021-03-20 15:19:17', '2021-03-20 15:43:19'),
(24, 'Mouse2', 1, 0, 21, '2021-03-20 15:20:10', '2021-03-20 15:43:37'),
(25, 'Pantallas', 1, 1, 21, '2021-03-20 15:20:37', '2021-03-20 15:20:37'),
(26, 'DSas', 0, 1, 21, '2021-03-20 15:22:31', '2021-03-20 15:41:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mejora_anomalia`
--

CREATE TABLE `tbl_mejora_anomalia` (
  `id_anomalia` int(10) UNSIGNED NOT NULL,
  `fk_empresa` int(10) UNSIGNED NOT NULL,
  `str_sistema_de_gestion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `str_proceso` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `str_origen_anomalia` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `str_reportado_por` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `str_anomalia` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_archivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_archivo_correcciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bool_estado_anomalia` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_origen_anomalia`
--

CREATE TABLE `tbl_origen_anomalia` (
  `id_origen_anomalia` int(10) UNSIGNED NOT NULL,
  `nombre` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_origen_anomalia`
--

INSERT INTO `tbl_origen_anomalia` (`id_origen_anomalia`, `nombre`, `bool_estado`, `created_at`, `updated_at`) VALUES
(1, 'Origen de anomalía', 0, '2020-09-18 21:09:48', '2020-09-18 21:34:45'),
(2, 'Anomalia 1', 1, '2020-09-18 21:34:55', '2020-09-18 21:34:55'),
(3, 'Anomalía 2', 1, '2020-09-18 21:35:12', '2020-09-18 21:35:12'),
(4, 'Anomalía 3', 1, '2020-09-18 21:35:20', '2020-09-18 21:35:20'),
(5, 'Anomalía 4', 1, '2020-09-18 21:35:26', '2020-09-18 21:35:26'),
(6, 'Anomalía 12', 1, '2020-09-18 21:35:33', '2020-09-26 22:53:48'),
(7, 'asdasd', 0, '2020-09-26 22:53:36', '2020-09-26 22:53:41'),
(8, 'Anónima 13', 1, '2021-03-13 01:20:53', '2021-03-13 01:20:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_partei_calificaciones`
--

CREATE TABLE `tbl_partei_calificaciones` (
  `id_calificaciones` int(10) UNSIGNED NOT NULL,
  `calcualitativa5` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion5` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calcualitativa4` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion4` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calcualitativa3` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion3` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calcualitativa2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `calcualitativa1` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion1` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipopa` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_partei_calificaciones`
--

INSERT INTO `tbl_partei_calificaciones` (`id_calificaciones`, `calcualitativa5`, `descripcion5`, `calcualitativa4`, `descripcion4`, `calcualitativa3`, `descripcion3`, `calcualitativa2`, `descripcion2`, `calcualitativa1`, `descripcion1`, `tipopa`, `created_at`, `updated_at`) VALUES
(1, '10', 'calificación 10', '9', 'calificación 9', '8', 'calificación 8', '7', 'calificación 7', '6', 'calificación 6', 'Impacto', NULL, '2020-09-19 01:21:14'),
(2, '10', 'Infuencia 10', '9', 'Infuencia 9', '8', 'Infuencia 8', '7', 'Infuencia 7', '6', 'Infuencia 6', 'Influencia', NULL, '2020-09-19 01:21:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_partei_master`
--

CREATE TABLE `tbl_partei_master` (
  `id_partei_master` int(10) UNSIGNED NOT NULL,
  `Partes_interesadas` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `impacto` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `influencia` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fk_empresa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_partei_master`
--

INSERT INTO `tbl_partei_master` (`id_partei_master`, `Partes_interesadas`, `impacto`, `influencia`, `fk_empresa`, `created_at`, `updated_at`) VALUES
(1, 'partes interesadas', '1', '1', 2, '2020-09-19 01:11:43', '2020-09-19 01:11:43'),
(2, 'Partes Interesadas 	Impacto 	Influencia partes interesadas', '2', '2', 2, '2020-09-19 01:11:57', '2020-09-19 01:11:57'),
(3, 'Partes Interesadas 	Impacto 	Influencia partes interesadas', '3', '3', 2, '2020-09-19 01:12:07', '2020-09-19 01:12:07'),
(5, 'Prueba', '5', '5', 2, '2020-09-19 01:39:18', '2020-09-19 01:39:18'),
(6, 'asdasd', '3', '5', 2, '2020-09-19 23:00:22', '2020-09-19 23:00:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_politica`
--

CREATE TABLE `tbl_politica` (
  `id_politica` int(10) UNSIGNED NOT NULL,
  `politica` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fk_empresa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_politica`
--

INSERT INTO `tbl_politica` (`id_politica`, `politica`, `fk_empresa`, `created_at`, `updated_at`) VALUES
(3, '<p>POL&Iacute;TICA INTEGRIDA SISTEMAS DE GESTI&Oacute;N</p>', 10, '2021-03-17 20:42:35', '2021-03-17 20:42:35'),
(4, '<p>POL&Iacute;TICA INTEGRIDA SISTEMAS DE GESTI&Oacute;N</p>', 12, '2021-03-19 16:56:06', '2021-03-19 16:56:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_procesos`
--

CREATE TABLE `tbl_procesos` (
  `id_proceso` int(10) UNSIGNED NOT NULL,
  `tipo_proceso` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_proceso` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sigla` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_usuario_responsable` int(10) UNSIGNED NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_empresa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_procesos`
--

INSERT INTO `tbl_procesos` (`id_proceso`, `tipo_proceso`, `nom_proceso`, `sigla`, `fk_usuario_responsable`, `descripcion`, `fk_empresa`, `created_at`, `updated_at`, `bool_estado`) VALUES
(1, 'Procesos Gerenciales', 'Proceso 1', 'P1', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 2, '2020-09-10 20:07:32', '2020-09-18 15:56:56', 0),
(2, 'Procesos Gerenciales', 'Proceso 2', 'p2', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 2, '2020-09-10 20:11:36', '2020-09-18 16:11:54', 0),
(3, 'Procesos Misionales', 'P Misional 1', 'pm1', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 2, '2020-09-10 20:12:34', '2020-09-10 20:12:34', 1),
(4, 'Procesos de Apoyo', 'Proceso Apoyo 1', 'PA1', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 2, '2020-09-10 20:15:42', '2020-09-18 16:20:41', 0),
(5, 'Procesos Misionales', 'Proceso Misional 2', 'PM2', 2, 'DescripciónDescripciónDescripciónDescripciónDescripciónDescripción', 2, '2020-09-10 22:25:33', '2020-09-26 22:40:41', 0),
(6, 'Procesos Gerenciales', 'Proceso Gerencial', 'PG', 2, 'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptateUt enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam', 2, '2020-09-14 23:38:18', '2020-09-26 22:32:55', 1),
(7, 'Procesos Gerenciales', 'Prueba proceso', 'PP', 2, 'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate', 2, '2020-09-14 23:42:23', '2020-09-14 23:42:23', 1),
(8, 'Procesos Gerenciales', 'Prueba 2', 'p2', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 2, '2020-09-14 23:49:55', '2020-09-14 23:49:55', 1),
(9, 'Procesos Gerenciales', 'Proceso noche', 'PN', 2, 'asd asd asd ad', 2, '2020-09-15 02:11:24', '2020-09-26 22:32:38', 0),
(10, 'Procesos Gerenciales', 'proceso noche 2', 'PN2', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 2, '2020-09-15 02:12:31', '2020-09-15 02:12:31', 1),
(11, 'Procesos Gerenciales', 'Proceso noche 4', 'PN4', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 2, '2020-09-15 02:18:50', '2020-09-18 16:12:03', 0),
(12, 'Procesos Gerenciales', 'dadasd', 'asdas', 1, 'adasd', 2, '2020-09-17 02:23:36', '2020-09-26 22:31:41', 0),
(13, 'Procesos Gerenciales', 'Proceso jueves', 'PJ', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, '2020-09-17 16:30:54', '2020-09-18 16:11:59', 0),
(15, 'Procesos Gerenciales', 'pro jueves', 'pj', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est.', 2, '2020-09-17 17:21:28', '2020-09-18 15:50:33', 0),
(16, 'Procesos Misionales', 'Pro mis jueves', 'PMJ', 2, 'proceso misional jueves tarde', 2, '2020-09-17 20:34:53', '2020-09-26 22:40:04', 0),
(17, 'Procesos Misionales', 'proce jueves 2', 'PJ2', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, '2020-09-17 20:35:55', '2020-09-18 16:19:57', 0),
(18, 'Procesos Misionales', 'proceso jueves 3', 'pjue3', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt molli.', 2, '2020-09-17 20:36:42', '2020-09-18 16:19:42', 0),
(19, 'Procesos de Apoyo', 'procso apoyo vierNES', 'PAJ', 2, 'procso apoyo jueves procso apoyo jueves procso apoyo jueves procso apoyo jueves procso apoyo jueves', 2, '2020-09-17 21:42:26', '2020-09-19 22:56:31', 0),
(20, 'Procesos de Apoyo', 'Pro apoyo VIERNES', 'PAV', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, '2020-09-17 21:46:23', '2020-09-18 15:18:20', 1),
(21, 'Procesos de Apoyo', 'proceso apoyo viernes', 'PAV', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exerc', 2, '2020-09-17 23:14:09', '2020-09-26 22:41:12', 0),
(22, 'Procesos de Apoyo', 'proceso apoyo jue', 'pajue', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, '2020-09-18 00:04:26', '2020-09-18 16:20:45', 0),
(23, 'Procesos Gerenciales', 'Nuevo proceso viernes', 'NP', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolo', 2, '2020-09-18 16:13:18', '2020-09-26 22:34:56', 1),
(24, 'Procesos Gerenciales', 'doc ger viernes', 'dgv', 2, 'asdsdf', 2, '2020-09-18 16:53:10', '2020-09-26 22:31:31', 0),
(25, 'Procesos Misionales', 'asdasd', 'asdasd', 2, 'asdasd', 2, '2020-09-26 22:40:28', '2020-09-26 22:40:28', 1),
(26, 'Procesos de Apoyo', 'proceso apoyo', 'pa', 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 2, '2020-09-26 22:41:27', '2020-09-26 22:41:27', 1),
(27, 'Procesos Gerenciales', 'Encargado Comercio Exterior', 'CE', 3, 'Encargado Comercio Exterior', 10, '2021-03-13 01:14:30', '2021-03-17 23:00:04', 0),
(28, 'Procesos Gerenciales', 'Gestión Gerencial y Mejora Continua', 'G.G.', 3, 'Gestión Gerencial  Gestión Gerencial', 10, '2021-03-17 19:54:05', '2021-03-17 23:00:43', 1),
(29, 'Procesos Gerenciales', 'Gestión Financiera', 'G.F.', 3, 'Gestión Financiera des..', 10, '2021-03-17 23:01:33', '2021-03-17 23:01:33', 1),
(30, 'Procesos Gerenciales', 'Gestión Comercial', 'G.C.', 3, 'Gestión Comercial des..', 10, '2021-03-17 23:02:11', '2021-03-17 23:02:11', 1),
(31, 'Procesos Misionales', 'Producción y Suministro de Caña', 'P. S. C.', 3, 'producción y Suministro de Caña des..', 10, '2021-03-17 23:03:38', '2021-03-17 23:03:38', 1),
(32, 'Procesos Misionales', 'Molienda', 'M', 3, 'Molienda de...', 10, '2021-03-17 23:04:05', '2021-03-17 23:04:05', 1),
(33, 'Procesos Misionales', 'Elaboración', 'Elb.', 3, 'Elaboración de..', 10, '2021-03-17 23:04:33', '2021-03-17 23:04:33', 1),
(34, 'Procesos Misionales', 'Generación de Vapor y Energía', 'G.V.E.', 3, 'Generación de Vapor y Energía  de..', 10, '2021-03-17 23:05:18', '2021-03-17 23:05:18', 1),
(35, 'Procesos de Apoyo', 'Mantenimiento e instrumentación industrial', 'M.I.I.', 3, 'Mantenimiento e instrumentación industrial de..', 10, '2021-03-17 23:06:31', '2021-03-17 23:06:31', 1),
(36, 'Procesos de Apoyo', 'Gestión Logística', 'G.L.', 3, 'Gestión Logística de..', 10, '2021-03-17 23:07:04', '2021-03-17 23:07:04', 1),
(37, 'Procesos de Apoyo', 'Gestión de Talento Humano', 'G.T.H', 3, 'Gestión de Talento Humano de...', 10, '2021-03-17 23:07:48', '2021-03-17 23:07:48', 1),
(38, 'Procesos de Apoyo', 'Mantenimiento Agrícola', 'M.A.', 3, 'Mantenimiento Agrícola des..', 10, '2021-03-17 23:08:25', '2021-03-17 23:08:25', 1),
(39, 'Procesos Gerenciales', 'Gestión Comercial 2', 'G.C.2', 3, 'Gestión Comercial de..', 10, '2021-03-17 23:34:30', '2021-03-20 03:18:38', 0),
(40, 'Procesos Gerenciales', 'Gestión Comercial 2', 'G.F2', 3, 'Gestión Comercial des--', 10, '2021-03-17 23:35:35', '2021-03-20 03:18:33', 0),
(41, 'Procesos Gerenciales', 'Proceso', 'P', 3, 'Proceso', 10, '2021-03-19 16:49:53', '2021-03-20 03:18:29', 0),
(42, 'Procesos Gerenciales', 'Nombre del Proceso', 'N P', 3, 'Nombre del Proceso', 10, '2021-03-19 16:50:39', '2021-03-20 03:18:26', 0),
(43, 'Procesos Gerenciales', 'Nombre del Proceso', 'Nombre del Proceso', 3, 'Nombre del Proceso', 10, '2021-03-20 02:36:40', '2021-03-20 03:18:21', 0),
(44, 'Procesos Misionales', 'Proceso 1', 'P', 3, 'Proceso 1 de..', 10, '2021-03-20 13:57:13', '2021-03-20 13:57:13', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_procesos_user`
--

CREATE TABLE `tbl_procesos_user` (
  `proceso_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_procesos_user`
--

INSERT INTO `tbl_procesos_user` (`proceso_id`, `user_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 1),
(12, 2),
(13, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(38, 3),
(39, 3),
(40, 3),
(41, 3),
(42, 3),
(43, 3),
(44, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_producto`
--

CREATE TABLE `tbl_producto` (
  `id_producto` int(11) NOT NULL,
  `fk_empresa` int(11) NOT NULL,
  `str_producto` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `str_imagen` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_producto`
--

INSERT INTO `tbl_producto` (`id_producto`, `fk_empresa`, `str_producto`, `str_imagen`, `bool_estado`, `created_at`, `updated_at`) VALUES
(1, 2, 'Producto 1', 'logo_cyg.png', 1, '2020-09-27 18:36:24', '2020-09-27 21:39:00'),
(2, 2, 'Producto 2', 'firma.png', 0, '2020-09-27 18:38:48', '2020-09-27 21:23:57'),
(3, 2, 'Producto 5', 'Captura de Pantalla 2020-09-27 a la(s) 11.34.34 a. m..png', 0, '2020-09-27 21:23:48', '2020-09-27 21:23:55'),
(4, 2, 'PRoducto 2', 'Captura de Pantalla 2020-09-27 a la(s) 11.34.34 a. m..png', 0, '2020-09-27 21:31:11', '2020-09-27 21:39:31'),
(5, 2, 'Producto 3', 'Radicación SIC.png', 0, '2020-09-27 21:32:05', '2020-09-27 21:39:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_promedio_calificacion`
--

CREATE TABLE `tbl_promedio_calificacion` (
  `id_promedio` int(10) UNSIGNED NOT NULL,
  `promedio` float(3,2) NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_cri_calificacion` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_promedio_calificacion`
--

INSERT INTO `tbl_promedio_calificacion` (`id_promedio`, `promedio`, `bool_estado`, `fk_cri_calificacion`, `created_at`, `updated_at`) VALUES
(7, 3.00, 1, 15, '2021-03-21 16:16:18', '2021-03-19 16:48:40'),
(8, 1.00, 1, 14, '2021-03-17 16:49:45', '2021-03-17 19:26:09'),
(9, 2.33, 1, 18, '2021-03-20 13:47:16', '2021-03-20 13:48:15'),
(10, 5.00, 1, 21, '2021-03-20 15:47:59', '2021-03-20 15:47:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_proveedor`
--

CREATE TABLE `tbl_proveedor` (
  `id_proveedor` int(10) UNSIGNED NOT NULL,
  `nom_proveedor` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit_proveedor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teléfono` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_empresa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_proveedor`
--

INSERT INTO `tbl_proveedor` (`id_proveedor`, `nom_proveedor`, `ciudad`, `nit_proveedor`, `teléfono`, `bool_estado`, `fk_empresa`, `created_at`, `updated_at`) VALUES
(9, 'Proveedor cali', 'Cali', '1000000', '3216548', 0, 10, '2021-03-15 18:29:05', '2021-03-20 15:18:46'),
(10, 'proveedor 22', '', '', '', 1, 10, '2021-03-15 19:05:07', '2021-03-15 19:05:07'),
(11, 'Proveedor 4', '', '', '', 0, 10, '2021-03-15 19:06:01', '2021-03-15 19:20:00'),
(12, 'Proveedor1', '', '', '', 0, 10, '2021-03-17 00:28:14', '2021-03-17 01:52:59'),
(16, 'Proveedor pasto', 'Pasto', '102020202020', '3218618007', 0, 10, '2021-03-17 01:40:26', '2021-03-20 15:19:02'),
(17, 'MINDRAY MEDICAL COLOMBIA S.A.S.', 'Bogota', '12000000', '3216547121', 0, 10, '2021-03-17 03:16:29', '2021-03-20 15:18:34'),
(18, 'Proveedor 100', 'Pasto', '100000123', '3218618007', 0, 10, '2021-03-20 13:36:15', '2021-03-20 15:18:38'),
(19, 'Proveedor Medellin', 'Medellin', '1234567891', '3216549874', 1, 13, '2021-03-20 15:01:04', '2021-03-20 15:01:04'),
(20, 'Sistemas Pc', 'Pasto', '1234567892', '3218618007', 1, 11, '2021-03-20 15:18:03', '2021-03-20 15:18:03'),
(21, 'Mundo .com', 'Pasto', '23132154', '3218618007', 1, 11, '2021-03-20 15:19:58', '2021-03-20 15:19:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sistemas_gestion`
--

CREATE TABLE `tbl_sistemas_gestion` (
  `id_sisgestion` int(10) UNSIGNED NOT NULL,
  `str_nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `str_sigla` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `str_descripcion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_empresa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_sistemas_gestion`
--

INSERT INTO `tbl_sistemas_gestion` (`id_sisgestion`, `str_nombre`, `str_sigla`, `str_descripcion`, `fk_empresa`, `created_at`, `updated_at`, `bool_estado`) VALUES
(2, 'asd', 'asd', 'asd', 2, '2020-09-17 00:26:47', '2020-09-26 22:56:34', 0),
(3, 'Sistema gestión viernes', 'SGV', 'Sistema gestión viernes Sistema gestión viernes Sistema gestión viernes Sistema gestión viernes Sistema gestión viernes\r\nSistema gestión viernes Sistema gestión viernes Sistema gestión viernes Sistema gestión viernes Sistema gestión viernes\r\nSistema gestión viernes Sistema gestión viernes Sistema gestión viernes Sistema gestión viernes Sistema gestión viernes\r\nSistema gestión viernes Sistema gestión viernes Sistema gestión viernes Sistema gestión viernes Sistema gestión viernes\r\nSistema gestión viernes Sistema gestión viernes Sistema gestión viernes Sistema gestión viernes Sistema gestión viernes', 2, '2020-09-18 17:23:11', '2020-09-18 17:23:11', 1),
(4, 'sistema prueba', 'SP', 'Sistema gestión viernes Sistema gestión viernes Sistema gestión viernes Sistema gestión viernes Sistema gestión viernes', 2, '2020-09-18 17:29:27', '2020-09-18 17:29:27', 1),
(6, 'sistema gestion viernes', 'sdasd', 'hola mundoasdasd', 2, '2020-09-18 19:56:33', '2020-09-26 22:53:13', 0),
(7, 'relacion proceso', 'rp', 'adas ad a sd', 2, '2020-09-18 20:06:26', '2020-09-26 22:53:01', 0),
(8, 'validar proceso', 'v', 'descripcion de proceso de gestión', 2, '2020-09-18 20:08:05', '2020-09-26 22:51:04', 0),
(9, 'Sistema de Gestion Comercio', 'SGC', 'Sistema de Gestion Comercio', 10, '2021-03-13 01:17:24', '2021-03-13 01:17:24', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sistemas_gestion_procesos`
--

CREATE TABLE `tbl_sistemas_gestion_procesos` (
  `proceso_id` int(10) UNSIGNED NOT NULL,
  `sisgestionr_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_sistemas_gestion_procesos`
--

INSERT INTO `tbl_sistemas_gestion_procesos` (`proceso_id`, `sisgestionr_id`) VALUES
(8, 2),
(20, 3),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(6, 4),
(3, 6),
(8, 6),
(5, 7),
(8, 7),
(9, 8),
(16, 8),
(20, 8),
(21, 8),
(24, 8),
(27, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_empresa` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `fk_empresa`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Crhistian David Vargas', 'cristian-d-2@hotmail.com', '2019-02-13 01:15:04', '$2y$10$wnNd76o06c77q8U0zfhq3eNJon5RdWymyTywX.rHcYSJdokeJg7d2', 3, 'zWOYkljPTPV6ObbsVErhPxDpsCJWPIETpzo01ufdYlyyXiEfzW2g7MRRXOg7', '2019-02-13 01:11:49', '2020-09-18 20:59:14'),
(2, 'Gustavo Zuluaga', 'cygcolombia@gmail.com', '2019-02-13 01:15:04', '$2y$10$WRS.twQDm06Wtn.QpgtTG.HiAGEpjnKc/mihlTCnvJv/O1Cu2cVQS', 2, 'ZrEREgENaCUKFrjYkRc1Ut9evTZYjbkNvzlKvURsSEHUETFMKX6zP5dkf827', '2020-09-10 17:18:56', '2020-09-26 16:58:39'),
(3, 'canver', 'canver@gmail.com', NULL, '$2y$10$MgWhYNwz7NygKI6RRg0AquSHogptflv16iTa5BggWy3cBGa3K2qA2', 12, 'PxKZU3k4lXB90ZBCe48ooNxlfo64PFxqVYqOWM02dgfPfVQXBbzaUhp33S9n', '2021-03-12 23:24:15', '2021-03-18 20:39:31'),
(6, 'canver', 'canver-19@hotmail.com', NULL, '$2y$10$zYUW81h10HoH0UDhJP9Q/O7DnxOpOVeGKwg.bg3cOUajNlAIr/DF6', 13, NULL, '2021-03-20 14:41:11', '2021-03-20 14:49:51');

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `tbl_acciones_correctivas`
--
ALTER TABLE `tbl_acciones_correctivas`
  ADD PRIMARY KEY (`id_acciones_correctivas`),
  ADD KEY `tbl_acciones_correctivas_fk_anomalia_foreign` (`fk_anomalia`);

--
-- Indices de la tabla `tbl_areas`
--
ALTER TABLE `tbl_areas`
  ADD PRIMARY KEY (`id_area`),
  ADD KEY `tbl_areas_fk_empresa_foreign` (`fk_empresa`);

--
-- Indices de la tabla `tbl_cal_proveedor`
--
ALTER TABLE `tbl_cal_proveedor`
  ADD PRIMARY KEY (`id_cal_proveedor`),
  ADD KEY `tbl_insumos_fk_insumo_foreign` (`fk_insumo`);

--
-- Indices de la tabla `tbl_cargos`
--
ALTER TABLE `tbl_cargos`
  ADD PRIMARY KEY (`id_cargo`),
  ADD KEY `tbl_cargos_fk_area_foreign` (`fk_area`);

--
-- Indices de la tabla `tbl_causa_raiz_anomalia`
--
ALTER TABLE `tbl_causa_raiz_anomalia`
  ADD PRIMARY KEY (`id_causa_raiz_anomalia`),
  ADD KEY `tbl_causa_raiz_anomalia_fk_anomalia_foreign` (`fk_anomalia`);

--
-- Indices de la tabla `tbl_contexto_analisis_pestal`
--
ALTER TABLE `tbl_contexto_analisis_pestal`
  ADD PRIMARY KEY (`id_analisis_pestal`),
  ADD KEY `tbl_contexto_analisis_pestal_fk_empresa_foreign` (`fk_empresa`);

--
-- Indices de la tabla `tbl_contexto_dofa`
--
ALTER TABLE `tbl_contexto_dofa`
  ADD PRIMARY KEY (`id_dofa`),
  ADD KEY `tbl_contexto_dofa_fk_empresa_foreign` (`fk_empresa`);

--
-- Indices de la tabla `tbl_contexto_egresos`
--
ALTER TABLE `tbl_contexto_egresos`
  ADD PRIMARY KEY (`id_egreso`),
  ADD KEY `tbl_contexto_egresos_fk_empresa_foreign` (`fk_empresa`);

--
-- Indices de la tabla `tbl_contexto_ingresos`
--
ALTER TABLE `tbl_contexto_ingresos`
  ADD PRIMARY KEY (`id_ingreso`),
  ADD KEY `tbl_contexto_ingresos_fk_empresa_foreign` (`fk_empresa`);

--
-- Indices de la tabla `tbl_contexto_riesgos_oportunidades`
--
ALTER TABLE `tbl_contexto_riesgos_oportunidades`
  ADD PRIMARY KEY (`id_riesgos_oportunidades`),
  ADD KEY `tbl_contexto_riesgos_oportunidades_fk_empresa_foreign` (`fk_empresa`);

--
-- Indices de la tabla `tbl_contexto_tendencias_colombia`
--
ALTER TABLE `tbl_contexto_tendencias_colombia`
  ADD PRIMARY KEY (`id_tendencia_colombia`),
  ADD KEY `tbl_contexto_tendencias_colombia_fk_empresa_foreign` (`fk_empresa`);

--
-- Indices de la tabla `tbl_correcciones_anomalias`
--
ALTER TABLE `tbl_correcciones_anomalias`
  ADD PRIMARY KEY (`id_correccion_anomalia`),
  ADD KEY `tbl_correcciones_anomalias_fk_anomalia_foreign` (`fk_anomalia`);

--
-- Indices de la tabla `tbl_criticidad`
--
ALTER TABLE `tbl_criticidad`
  ADD PRIMARY KEY (`id_criticidad`),
  ADD KEY `tbl_criticidad_fk_insumo_foreign` (`fk_insumo`);

--
-- Indices de la tabla `tbl_cri_calificacion`
--
ALTER TABLE `tbl_cri_calificacion`
  ADD PRIMARY KEY (`id_cri_calificacion`),
  ADD KEY `tbl_cri_calificacion_cal_proveedor_foreign` (`fk_cal_proveedor`);

--
-- Indices de la tabla `tbl_datos_corporativos`
--
ALTER TABLE `tbl_datos_corporativos`
  ADD PRIMARY KEY (`id_datos_corporativos`),
  ADD KEY `fk_desc_empresa_empresa1_idx` (`fk_empresa`);

--
-- Indices de la tabla `tbl_documentos`
--
ALTER TABLE `tbl_documentos`
  ADD PRIMARY KEY (`id_documento`),
  ADD KEY `tbl_documentos_fk_empresa_foreign` (`fk_empresa`);

--
-- Indices de la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  ADD PRIMARY KEY (`id_empresa`),
  ADD UNIQUE KEY `tbl_empresa_nit_unique` (`nit`),
  ADD KEY `tbl_empresa_fk_usuario_foreign` (`fk_usuario`);

--
-- Indices de la tabla `tbl_indicadores`
--
ALTER TABLE `tbl_indicadores`
  ADD PRIMARY KEY (`id_indicador`),
  ADD KEY `tbl_indicadores_fk_sgc_foreign` (`fk_sgc`),
  ADD KEY `tbl_indicadores_fk_proceso_foreign` (`fk_proceso`);

--
-- Indices de la tabla `tbl_insumos`
--
ALTER TABLE `tbl_insumos`
  ADD PRIMARY KEY (`id_insumo`),
  ADD KEY `tbl_insumos_fk_proveedor_foreign` (`fk_proveedor`);

--
-- Indices de la tabla `tbl_mejora_anomalia`
--
ALTER TABLE `tbl_mejora_anomalia`
  ADD PRIMARY KEY (`id_anomalia`),
  ADD KEY `tbl_mejora_anomalia_fk_empresa_foreign` (`fk_empresa`);

--
-- Indices de la tabla `tbl_origen_anomalia`
--
ALTER TABLE `tbl_origen_anomalia`
  ADD PRIMARY KEY (`id_origen_anomalia`);

--
-- Indices de la tabla `tbl_partei_calificaciones`
--
ALTER TABLE `tbl_partei_calificaciones`
  ADD PRIMARY KEY (`id_calificaciones`);

--
-- Indices de la tabla `tbl_partei_master`
--
ALTER TABLE `tbl_partei_master`
  ADD PRIMARY KEY (`id_partei_master`),
  ADD KEY `tbl_partei_master_fk_empresa_foreign` (`fk_empresa`);

--
-- Indices de la tabla `tbl_politica`
--
ALTER TABLE `tbl_politica`
  ADD PRIMARY KEY (`id_politica`),
  ADD KEY `tbl_politica_fk_empresa_foreign` (`fk_empresa`);

--
-- Indices de la tabla `tbl_procesos`
--
ALTER TABLE `tbl_procesos`
  ADD PRIMARY KEY (`id_proceso`),
  ADD KEY `tbl_procesos_fk_empresa_foreign` (`fk_empresa`),
  ADD KEY `tbl_procesos_fk_usuario_responsable_foreign` (`fk_usuario_responsable`);

--
-- Indices de la tabla `tbl_procesos_user`
--
ALTER TABLE `tbl_procesos_user`
  ADD KEY `tbl_procesos_user_proceso_id_foreign` (`proceso_id`),
  ADD KEY `tbl_procesos_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `tbl_promedio_calificacion`
--
ALTER TABLE `tbl_promedio_calificacion`
  ADD PRIMARY KEY (`id_promedio`),
  ADD KEY `tbl_promedio_calificacion_fk_cri_calificacion_foreign` (`fk_cri_calificacion`);

--
-- Indices de la tabla `tbl_proveedor`
--
ALTER TABLE `tbl_proveedor`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD KEY `tbl_proveedor_fk_empresa_foreign` (`fk_empresa`);

--
-- Indices de la tabla `tbl_sistemas_gestion`
--
ALTER TABLE `tbl_sistemas_gestion`
  ADD PRIMARY KEY (`id_sisgestion`),
  ADD KEY `tbl_sistemas_gestion_fk_empresa_foreign` (`fk_empresa`);

--
-- Indices de la tabla `tbl_sistemas_gestion_procesos`
--
ALTER TABLE `tbl_sistemas_gestion_procesos`
  ADD KEY `tbl_sistemas_gestion_procesos_proceso_id_foreign` (`proceso_id`),
  ADD KEY `tbl_sistemas_gestion_procesos_sisgestionr_id_foreign` (`sisgestionr_id`);

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
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_acciones_correctivas`
--
ALTER TABLE `tbl_acciones_correctivas`
  MODIFY `id_acciones_correctivas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_areas`
--
ALTER TABLE `tbl_areas`
  MODIFY `id_area` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbl_cal_proveedor`
--
ALTER TABLE `tbl_cal_proveedor`
  MODIFY `id_cal_proveedor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tbl_cargos`
--
ALTER TABLE `tbl_cargos`
  MODIFY `id_cargo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_causa_raiz_anomalia`
--
ALTER TABLE `tbl_causa_raiz_anomalia`
  MODIFY `id_causa_raiz_anomalia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_contexto_analisis_pestal`
--
ALTER TABLE `tbl_contexto_analisis_pestal`
  MODIFY `id_analisis_pestal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_contexto_dofa`
--
ALTER TABLE `tbl_contexto_dofa`
  MODIFY `id_dofa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_contexto_egresos`
--
ALTER TABLE `tbl_contexto_egresos`
  MODIFY `id_egreso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tbl_contexto_ingresos`
--
ALTER TABLE `tbl_contexto_ingresos`
  MODIFY `id_ingreso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `tbl_contexto_riesgos_oportunidades`
--
ALTER TABLE `tbl_contexto_riesgos_oportunidades`
  MODIFY `id_riesgos_oportunidades` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_contexto_tendencias_colombia`
--
ALTER TABLE `tbl_contexto_tendencias_colombia`
  MODIFY `id_tendencia_colombia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_correcciones_anomalias`
--
ALTER TABLE `tbl_correcciones_anomalias`
  MODIFY `id_correccion_anomalia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_criticidad`
--
ALTER TABLE `tbl_criticidad`
  MODIFY `id_criticidad` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tbl_cri_calificacion`
--
ALTER TABLE `tbl_cri_calificacion`
  MODIFY `id_cri_calificacion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tbl_datos_corporativos`
--
ALTER TABLE `tbl_datos_corporativos`
  MODIFY `id_datos_corporativos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_documentos`
--
ALTER TABLE `tbl_documentos`
  MODIFY `id_documento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  MODIFY `id_empresa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tbl_indicadores`
--
ALTER TABLE `tbl_indicadores`
  MODIFY `id_indicador` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_insumos`
--
ALTER TABLE `tbl_insumos`
  MODIFY `id_insumo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `tbl_mejora_anomalia`
--
ALTER TABLE `tbl_mejora_anomalia`
  MODIFY `id_anomalia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_origen_anomalia`
--
ALTER TABLE `tbl_origen_anomalia`
  MODIFY `id_origen_anomalia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_partei_calificaciones`
--
ALTER TABLE `tbl_partei_calificaciones`
  MODIFY `id_calificaciones` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_partei_master`
--
ALTER TABLE `tbl_partei_master`
  MODIFY `id_partei_master` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_politica`
--
ALTER TABLE `tbl_politica`
  MODIFY `id_politica` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_procesos`
--
ALTER TABLE `tbl_procesos`
  MODIFY `id_proceso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_promedio_calificacion`
--
ALTER TABLE `tbl_promedio_calificacion`
  MODIFY `id_promedio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tbl_proveedor`
--
ALTER TABLE `tbl_proveedor`
  MODIFY `id_proveedor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tbl_sistemas_gestion`
--
ALTER TABLE `tbl_sistemas_gestion`
  MODIFY `id_sisgestion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_acciones_correctivas`
--
ALTER TABLE `tbl_acciones_correctivas`
  ADD CONSTRAINT `tbl_acciones_correctivas_fk_anomalia_foreign` FOREIGN KEY (`fk_anomalia`) REFERENCES `tbl_mejora_anomalia` (`id_anomalia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_areas`
--
ALTER TABLE `tbl_areas`
  ADD CONSTRAINT `tbl_areas_fk_empresa_foreign` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_cal_proveedor`
--
ALTER TABLE `tbl_cal_proveedor`
  ADD CONSTRAINT `tbl_insumos_fk_insumo_foreign` FOREIGN KEY (`fk_insumo`) REFERENCES `tbl_insumos` (`id_insumo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_cargos`
--
ALTER TABLE `tbl_cargos`
  ADD CONSTRAINT `tbl_cargos_fk_area_foreign` FOREIGN KEY (`fk_area`) REFERENCES `tbl_areas` (`id_area`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_causa_raiz_anomalia`
--
ALTER TABLE `tbl_causa_raiz_anomalia`
  ADD CONSTRAINT `tbl_causa_raiz_anomalia_fk_anomalia_foreign` FOREIGN KEY (`fk_anomalia`) REFERENCES `tbl_mejora_anomalia` (`id_anomalia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_contexto_analisis_pestal`
--
ALTER TABLE `tbl_contexto_analisis_pestal`
  ADD CONSTRAINT `tbl_contexto_analisis_pestal_fk_empresa_foreign` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_contexto_dofa`
--
ALTER TABLE `tbl_contexto_dofa`
  ADD CONSTRAINT `tbl_contexto_dofa_fk_empresa_foreign` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_contexto_egresos`
--
ALTER TABLE `tbl_contexto_egresos`
  ADD CONSTRAINT `tbl_contexto_egresos_fk_empresa_foreign` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_contexto_ingresos`
--
ALTER TABLE `tbl_contexto_ingresos`
  ADD CONSTRAINT `tbl_contexto_ingresos_fk_empresa_foreign` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_contexto_riesgos_oportunidades`
--
ALTER TABLE `tbl_contexto_riesgos_oportunidades`
  ADD CONSTRAINT `tbl_contexto_riesgos_oportunidades_fk_empresa_foreign` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_contexto_tendencias_colombia`
--
ALTER TABLE `tbl_contexto_tendencias_colombia`
  ADD CONSTRAINT `tbl_contexto_tendencias_colombia_fk_empresa_foreign` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_correcciones_anomalias`
--
ALTER TABLE `tbl_correcciones_anomalias`
  ADD CONSTRAINT `tbl_correcciones_anomalias_fk_anomalia_foreign` FOREIGN KEY (`fk_anomalia`) REFERENCES `tbl_mejora_anomalia` (`id_anomalia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_criticidad`
--
ALTER TABLE `tbl_criticidad`
  ADD CONSTRAINT `tbl_criticidad_fk_insumo_foreign` FOREIGN KEY (`fk_insumo`) REFERENCES `tbl_insumos` (`id_insumo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_cri_calificacion`
--
ALTER TABLE `tbl_cri_calificacion`
  ADD CONSTRAINT `tbl_cri_calificacion_cal_proveedor_foreign` FOREIGN KEY (`fk_cal_proveedor`) REFERENCES `tbl_cal_proveedor` (`id_cal_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_datos_corporativos`
--
ALTER TABLE `tbl_datos_corporativos`
  ADD CONSTRAINT `tbl_datos_corporativos_fk_empresa_foreign` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_documentos`
--
ALTER TABLE `tbl_documentos`
  ADD CONSTRAINT `tbl_documentos_fk_empresa_foreign` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  ADD CONSTRAINT `tbl_empresa_fk_usuario_foreign` FOREIGN KEY (`fk_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_indicadores`
--
ALTER TABLE `tbl_indicadores`
  ADD CONSTRAINT `tbl_indicadores_fk_proceso_foreign` FOREIGN KEY (`fk_proceso`) REFERENCES `tbl_procesos` (`id_proceso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_indicadores_fk_sgc_foreign` FOREIGN KEY (`fk_sgc`) REFERENCES `tbl_sistemas_gestion` (`id_sisgestion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_insumos`
--
ALTER TABLE `tbl_insumos`
  ADD CONSTRAINT `tbl_insumos_fk_proveedor_foreign` FOREIGN KEY (`fk_proveedor`) REFERENCES `tbl_proveedor` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_mejora_anomalia`
--
ALTER TABLE `tbl_mejora_anomalia`
  ADD CONSTRAINT `tbl_mejora_anomalia_fk_empresa_foreign` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_partei_master`
--
ALTER TABLE `tbl_partei_master`
  ADD CONSTRAINT `tbl_partei_master_fk_empresa_foreign` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_politica`
--
ALTER TABLE `tbl_politica`
  ADD CONSTRAINT `tbl_politica_fk_empresa_foreign` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_procesos`
--
ALTER TABLE `tbl_procesos`
  ADD CONSTRAINT `tbl_procesos_fk_empresa_foreign` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_procesos_fk_usuario_responsable_foreign` FOREIGN KEY (`fk_usuario_responsable`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_procesos_user`
--
ALTER TABLE `tbl_procesos_user`
  ADD CONSTRAINT `tbl_procesos_user_proceso_id_foreign` FOREIGN KEY (`proceso_id`) REFERENCES `tbl_procesos` (`id_proceso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_procesos_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_promedio_calificacion`
--
ALTER TABLE `tbl_promedio_calificacion`
  ADD CONSTRAINT `tbl_promedio_calificacion_fk_cri_calificacion_foreign` FOREIGN KEY (`fk_cri_calificacion`) REFERENCES `tbl_cal_proveedor` (`id_cal_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_proveedor`
--
ALTER TABLE `tbl_proveedor`
  ADD CONSTRAINT `tbl_proveedor_fk_empresa_foreign` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_sistemas_gestion`
--
ALTER TABLE `tbl_sistemas_gestion`
  ADD CONSTRAINT `tbl_sistemas_gestion_fk_empresa_foreign` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_sistemas_gestion_procesos`
--
ALTER TABLE `tbl_sistemas_gestion_procesos`
  ADD CONSTRAINT `tbl_sistemas_gestion_procesos_proceso_id_foreign` FOREIGN KEY (`proceso_id`) REFERENCES `tbl_procesos` (`id_proceso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_sistemas_gestion_procesos_sisgestionr_id_foreign` FOREIGN KEY (`sisgestionr_id`) REFERENCES `tbl_sistemas_gestion` (`id_sisgestion`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
