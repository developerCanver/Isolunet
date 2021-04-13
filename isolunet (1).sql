-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-04-2021 a las 04:17:02
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
(2, 1),
(11, 1);

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
('CXUe5oJZLDFhc5dWY4YjU5QBKOHRmYuFqHUYHdt7', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibDNkVnVIMmdBd1JHeEIxbGlzWmhPV0pub3JJZnJvZ2FPVFdTeEZBWiI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2VzdHJhdGVnaWFzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1OiJhbGVydCI7YTowOnt9fQ==', 1618279603);

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
-- Estructura de tabla para la tabla `tbl_apo_competencia`
--

CREATE TABLE `tbl_apo_competencia` (
  `id_competencia` int(10) UNSIGNED NOT NULL,
  `fecha_competencia` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo_com` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_com` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reporta_a` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mision_cargo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `directas` int(11) NOT NULL,
  `indirectas` int(11) NOT NULL,
  `nivel1` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `especialidad1` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edu_area1` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idioma1` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sistema1` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel2` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `especialidad2` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edu_area2` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idioma2` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sistema2` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp_area1` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiempo1` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp_area2` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiempo2` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp_area3` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiempo3` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `compartida1` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dec_area1` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autonoma1` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compartida2` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dec_area2` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autonoma2` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compartida3` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dec_area3` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autonoma3` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compartida4` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dec_area4` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autonoma4` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tecnica` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `especial` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `int_area1` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `int_objetivo1` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `int_area2` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `int_objetivo2` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `int_area3` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `int_objetivo3` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext_area1` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext_objetivo1` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext_area2` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext_objetivo2` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext_area3` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ext_objetivo3` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actividades` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_empresa` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_apo_competencia`
--

INSERT INTO `tbl_apo_competencia` (`id_competencia`, `fecha_competencia`, `cargo_com`, `area_com`, `genero`, `reporta_a`, `mision_cargo`, `directas`, `indirectas`, `nivel1`, `especialidad1`, `edu_area1`, `idioma1`, `sistema1`, `nivel2`, `especialidad2`, `edu_area2`, `idioma2`, `sistema2`, `exp_area1`, `tiempo1`, `exp_area2`, `tiempo2`, `exp_area3`, `tiempo3`, `descripcion`, `compartida1`, `dec_area1`, `autonoma1`, `compartida2`, `dec_area2`, `autonoma2`, `compartida3`, `dec_area3`, `autonoma3`, `compartida4`, `dec_area4`, `autonoma4`, `tecnica`, `especial`, `int_area1`, `int_objetivo1`, `int_area2`, `int_objetivo2`, `int_area3`, `int_objetivo3`, `ext_area1`, `ext_objetivo1`, `ext_area2`, `ext_objetivo2`, `ext_area3`, `ext_objetivo3`, `actividades`, `bool_estado`, `fk_empresa`) VALUES
(1, '2020-02-21', 'Auxiliar Admministrativo', 'Administrativa', 'Mujer', 'Auxiliar Admministrativo', 'Misión del Cargo:2', 1232, 2312, 'Nivel:2', 'Especialidad:2', 'Gerencial', 'Avanzado', 'Bajo', 'Nivel:3', 'Nivel:3 Especialidad:3', 'Administrativa', 'Avanzado', 'Bajo', 'Gerencial', '3 a 5 Años', 'Gerencial', '< 3 Años', 'Administrativa', '> 10 Años', 'Descripción:2', 'Compartidas:2', 'Administrativa', 'Autonomas:2', 'Compartidas:3', 'Gerencial', 'Compartidas:3', 'Compartidas:4', 'Gerencial', 'Compartidas:24', '', 'Gerencial', 'Compartidas:5', 'Técnica2', 'Especiales:2', 'Administrativa', 'Objetivos:2', 'Administrativa', 'Objetivos:3', 'Gerencial', 'Objetivos:4', 'Administrativa', 'Objetivos:2', 'Gerencial', 'Objetivos:3', 'Administrativa', 'Objetivos:4', 'Actividades Transversales:2', 1, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_apo_comunicaciones`
--

CREATE TABLE `tbl_apo_comunicaciones` (
  `id_comunicaciones` int(10) UNSIGNED NOT NULL,
  `parte` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sgc` tinyint(1) NOT NULL,
  `sga` tinyint(1) NOT NULL,
  `sgscs` tinyint(1) NOT NULL,
  `sgsst` tinyint(1) NOT NULL,
  `asunto` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mecanismo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detalle` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `frecuencia` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interesada` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apoyo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registros` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_empresa` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_apo_comunicaciones`
--

INSERT INTO `tbl_apo_comunicaciones` (`id_comunicaciones`, `parte`, `sgc`, `sga`, `sgscs`, `sgsst`, `asunto`, `mecanismo`, `detalle`, `frecuencia`, `interesada`, `apoyo`, `registros`, `bool_estado`, `fk_empresa`) VALUES
(27, 'Parte Interesada:', 1, 1, 1, 1, 'Asunto', 'Mecanismos y Medios:', 'Detalle de la Información recolectada (necesidades y expectativas):', 'Frecuencia', 'Interlocutor de la Parte de Interesada:', 'Interlocutor / Apoyo:', 'Registros Relacionados:', 1, 13),
(28, 'Clientes', 1, 1, 1, 1, 'Medición de satisfacción de clientes', 'Encuestas de evaluación de la satisfacción', 'Se identifican las opiniones de los clientes con relación al servicio prestado por CLIP', 'Mensual y Anual', 'Gerencia Comercial de las Empresas Clientes', 'Director Administrativo y Comercial', 'Informes de Satisfacción de clientes', 1, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_apo_com_rendiciones`
--

CREATE TABLE `tbl_apo_com_rendiciones` (
  `id_rendiciones` int(10) UNSIGNED NOT NULL,
  `Quien` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mecanismo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frecuencia` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_quien` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registro` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sistema` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_apo_com_rendiciones`
--

INSERT INTO `tbl_apo_com_rendiciones` (`id_rendiciones`, `Quien`, `mecanismo`, `frecuencia`, `a_quien`, `registro`, `sistema`, `bool_estado`, `fk_empresa`) VALUES
(27, 'Líder Gerente', 'Reunión de Junta directiva Clip', 'Mensual', 'Junta Directiva', 'Presentaciones', 'Ambiental Calidad BASC Salud y Seguridad en el trabajo I', 1, 13),
(28, 'Auxiliar Admministrativo', 'Comité de Sistemas de Gestión Clip', 'Mensual', 'Equipo directivo', 'Presentaciones', 'Ambiental', 1, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_apo_informacion`
--

CREATE TABLE `tbl_apo_informacion` (
  `id_informacion` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_informacion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proceso` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tit_documento` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tit_registro` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `version` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsable` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lugar_archivo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `digital` tinyint(1) NOT NULL,
  `tie_retencion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dis_final` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organiza` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_info` date NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  `contralado` tinyint(1) NOT NULL,
  `sis_gestion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_copia` int(11) NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `conservasion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_empresa` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_apo_informacion`
--

INSERT INTO `tbl_apo_informacion` (`id_informacion`, `codigo`, `tipo_informacion`, `proceso`, `tit_documento`, `tit_registro`, `version`, `descripcion`, `responsable`, `lugar_archivo`, `digital`, `tie_retencion`, `dis_final`, `organiza`, `archivo`, `fecha_info`, `vigente`, `contralado`, `sis_gestion`, `no_copia`, `bool_estado`, `conservasion`, `fk_empresa`) VALUES
(28, 'fxg', '', '', '', '', '', '', '', '', 0, '', '', '', '', '0000-00-00', 0, 0, '', 0, 1, '', 13),
(29, 'asd', '', '', '', '', '', '', '', '', 0, '', '', '', '', '0000-00-00', 0, 0, '', 0, 1, '', 13),
(30, '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '2021-03-24', 0, 0, '', 0, 1, '', 0),
(39, 'IGER-001', 'Documentos', 'Mantenimiento', 'Instructivo desplazamiento del doble Troque y Control de Mcias Recogidas', 'tit_registro', '3', 'descripcion', 'Auxiliar Gerente Pollo', 'Oficina:Sistema de Gestión de Calidad,G.General,Bodega planta,', 0, 'tie_retencion', 'dis_final', 'organiza', '1617060012excel.png', '2021-03-19', 1, 1, 'SAP', 0, 1, '', 13),
(41, 'codigo', 'Documentos_externos', 'proceso', 'NORMA NTC ISO-9001 V 2015', 'tit_registro', 'version', 'NORMA TÉCNICA', 'Auxiliar Gerente Pollo', 'OFICINA S.G.C./ S.G.A', 0, 'tie_retencion', 'dis_final', 'organiza', '1617064129Doc1.docx', '2010-10-10', 1, 1, 'sis_gestion', 1, 1, '', 13),
(42, 'Código:', 'Registros', 'Mantenimiento', 'tit_documento', 'cger  Titulo del Registro:', '22', 'Descripción:', 'Auxiliar Admministrativo', 'cger', 1, 'cger', 'cger', 'cger', 'Archivo no cargado', '2010-10-10', 0, 0, 'CRM', 0, 1, 'cger', 13),
(43, 'Código:2', 'Registros', 'Gestión comercial', 'tit_documento', 'Titulo del Registro:2', '22', '22\r\nDescripción:', 'Auxiliar Admministrativo', 'lugar de Archivo final:2', 1, 'Tiempo de Retención:2', 'Disposicion Final:2', 'Como se Organiza:2', '1617067909create.blade.php', '2010-10-10', 0, 0, 'ORACLE', 0, 1, 'conservasión:', 13),
(44, 'CGER-001', 'Documentos', 'Mantenimiento', 'tit_documento', 'tit_registro', '10', 'descripcion', 'Auxiliar Admministrativo', 'lugar_archivo', 0, 'tie_retencion', 'dis_final', 'organiza', '1617069584Doc1.docx', '2010-10-10', 1, 1, 'ORACLE', 0, 1, 'conservasion', 13),
(45, 'codigo', 'Documentos_externos', 'proceso', 'NORMA NTC ISO-9001 V 2008', 'tit_registro', 'version', 'NORMA TÉCNICA', 'Auxiliar Gerente Pollo', 'OFICINA S.G.C./ S.G.A', 0, 'tie_retencion', 'dis_final', 'organiza', '1617069717word.jpg', '2010-10-10', 2, 2, 'sis_gestion', 0, 1, 'conservasion', 13),
(46, 'RGER-001', 'Registros', 'Gestión Logística', 'tit_documento', 'SEGUIMIENTO  OBJETIVOS DE CALIDAD', '2', 'SE REGISTRAN LOS RESULTADOS DE LAS METAS A LOS OBJETIVOS DE CALIDAD', 'Auxiliar Gerente Pollo', 'AUDITOR SG, GERENCIA GENERAL. DIGITAL', 2, '1 AÑO', 'ARCHIVO UNTIMA REVISION GERENCIAL DEL AÑO', 'SE LLEVA ACUMULADO DURANTE EL AÑO', '1617069897Doc1.docx', '2010-10-10', 0, 0, 'ORACLE', 0, 1, 'PERMANENTE', 13),
(47, 'CGER-001', 'Documentos', 'Gestión comercial', 'Caracterización Gestión Gerencial', 'tit_registro', '10', 'descripcion', 'Auxiliar Admministrativo', 'Oficinas: Sistema de Gestión de Calidad; Gerencia', 0, 'tie_retencion', 'dis_final', 'organiza', '1617071812Doc1.docx', '2021-03-18', 1, 1, 'CRM', 0, 1, 'conservasion', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_apo_recursos`
--

CREATE TABLE `tbl_apo_recursos` (
  `id_recurso` int(10) UNSIGNED NOT NULL,
  `url` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_empresa` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_apo_recursos`
--

INSERT INTO `tbl_apo_recursos` (`id_recurso`, `url`, `class`, `fk_empresa`) VALUES
(12, '1617113923diamond-1475978_1280.png', 'RecursosController', 13),
(13, '1617114076pexels-kristina-polianskaia-4241706.jpg', 'RecursosController', 13),
(14, '1617114077pexels-zack-jarosz-1687719.jpg', 'RecursosController', 13),
(15, '1617114078pexels-pixabay-266621.jpg', 'RecursosController', 13),
(16, '1617114079pexels-vova-krasilnikov-2740658.jpg', 'RecursosController', 13),
(17, '1617114187pexels-pixabay-266621.jpg', 'RecursosController', 13),
(18, '1617114188Proyecto de Grado Ataques IDS 8.12.20(2).pdf', 'RecursosController', 13),
(19, '1617114189pexels-kristina-polianskaia-4241706.jpg', 'RecursosController', 13),
(20, '1617114190pexels-vova-krasilnikov-2740658.jpg', 'RecursosController', 13),
(21, '1617114191pexels-zack-jarosz-1687719.jpg', 'RecursosController', 13),
(22, '1617114192pexels-arif-khan-4595725.jpg', 'RecursosController', 13),
(23, '1617114193pexels-danielle-de-angelis-2849742.jpg', 'RecursosController', 13),
(24, '1617114194pexels-gabriel-peter-722905.jpg', 'RecursosController', 13),
(25, '1617114195DatatableExport.xlsx', 'RecursosController', 13),
(26, '1617114196Vista perfil derecho de capsula.pdf', 'RecursosController', 13),
(27, '1617114198PROYECTO DE GRADO II_BOLAÑOS KAREN_RUIZ CARLOS.docx', 'RecursosController', 13),
(28, '161711419920. PJ0106A1-LAP -1.jpg', 'RecursosController', 13),
(31, '1617114203diamond-1475978_1280.png', 'RecursosController', 13),
(32, '1617115050diamond-1475978_1280.png', 'TomaConsecuenciaController', 13),
(33, '1617115051Proyecto de Grado Ataques IDS 8.12.20(2).pdf', 'TomaConsecuenciaController', 13),
(34, '1617115052pexels-pixabay-266621.jpg', 'TomaConsecuenciaController', 13),
(35, '1617115053pexels-zack-jarosz-1687719.jpg', 'TomaConsecuenciaController', 13),
(36, '1617115054pexels-kristina-polianskaia-4241706.jpg', 'TomaConsecuenciaController', 13),
(37, '1617115056pexels-vova-krasilnikov-2740658.jpg', 'TomaConsecuenciaController', 13),
(38, '1617115056pexels-danielle-de-angelis-2849742.jpg', 'TomaConsecuenciaController', 13),
(39, '1617115058pexels-gabriel-peter-722905.jpg', 'TomaConsecuenciaController', 13),
(40, '1617115058pexels-arif-khan-4595725.jpg', 'TomaConsecuenciaController', 13),
(41, '1617115060Vista perfil derecho de capsula.pdf', 'TomaConsecuenciaController', 13),
(42, '1617115061DatatableExport.xlsx', 'TomaConsecuenciaController', 13),
(43, '1617115062PROYECTO DE GRADO II_BOLAÑOS KAREN_RUIZ CARLOS.docx', 'TomaConsecuenciaController', 13),
(44, '161711506520. PJ0106A1-LAP -1.jpg', 'TomaConsecuenciaController', 13);

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
(9, 'Administracion canver', 1, 10, '2021-03-13 00:07:04', '2021-03-13 00:07:04'),
(10, 'Administracion', 1, 11, '2021-03-23 17:17:17', '2021-03-23 17:17:17'),
(11, 'contador', 1, 11, '2021-03-23 17:17:28', '2021-03-23 17:17:28'),
(12, 'Administrativa', 1, 13, '2021-03-25 02:31:20', '2021-03-25 02:31:20'),
(13, 'Gerencial', 1, 13, '2021-03-25 02:32:00', '2021-03-25 02:32:00');

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
(7, 'Gerente', 1, 9, '2021-03-20 03:50:42', '2021-03-20 03:50:42'),
(8, 'Auxiliar contable', 1, 10, '2021-03-23 17:17:58', '2021-03-23 17:17:58'),
(9, 'Auxiliar administrativo', 1, 10, '2021-03-23 17:18:30', '2021-03-23 17:18:30'),
(10, 'Auxiliar Admministrativo', 1, 12, '2021-03-25 02:32:31', '2021-03-25 02:32:31'),
(11, 'Auxiliar Gerente Pollo', 1, 13, '2021-03-25 02:33:08', '2021-03-25 02:33:08'),
(12, 'Líder Gerente', 1, 13, '2021-03-25 15:54:57', '2021-03-25 15:54:57');

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
  `pestal` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proceso` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_factor` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_empresa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_contexto_dofa`
--

INSERT INTO `tbl_contexto_dofa` (`id_dofa`, `debilidades`, `fortalezas`, `amenazas`, `oportunidades`, `pestal`, `proceso`, `tipo_factor`, `fk_empresa`, `created_at`, `updated_at`) VALUES
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '', '', '', 2, '2020-09-18 23:29:48', '2020-09-18 23:29:48'),
(7, NULL, NULL, 'amenazas2', 'Opurtunidades2', '', '', '', 13, '2021-04-12 22:12:01', '2021-04-12 22:12:01'),
(8, 'Debilidades:1', 'Fortalezas:1', NULL, NULL, '', 'gestión financiera', 'interno', 13, '2021-04-12 23:24:03', '2021-04-12 23:54:36'),
(9, NULL, NULL, 'sa1', 'so1', 'Sociales', '', 'externo', 13, '2021-04-12 23:37:20', '2021-04-13 00:01:18');

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
(10, 'IMPREVISTOS', 515000, 530000, 15000, 3, 1, 10, '2021-03-20 01:45:57', '2021-03-20 01:45:57'),
(11, 'BONIFICACIONES', 225000, 0, -225000, -100, 1, 11, '2021-03-23 13:31:36', '2021-03-23 13:31:36'),
(12, 'PUBILICIDAD', 23456, 0, -23456, -100, 1, 11, '2021-03-23 13:32:27', '2021-03-23 13:32:27'),
(13, 'PUBILICIDAD', 23456, 0, -23456, -100, 1, 11, '2021-03-23 13:32:28', '2021-03-23 13:32:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contexto_estrategia`
--

CREATE TABLE `tbl_contexto_estrategia` (
  `id_estrategia` int(10) UNSIGNED NOT NULL,
  `pestal_est` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estretegia` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `que_hacer` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `como_hacer` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `porque_hacer` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quien` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proceso` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_empresa` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_contexto_estrategia`
--

INSERT INTO `tbl_contexto_estrategia` (`id_estrategia`, `pestal_est`, `estretegia`, `que_hacer`, `como_hacer`, `porque_hacer`, `quien`, `proceso`, `bool_estado`, `fk_empresa`) VALUES
(1, '', 'scrum', 'seguir las lineamientos', 'con metologia paso a paso', 'Por qué lo voy a hacer', 'Carlos Ruiz', 'Contador', 0, 13),
(2, 'Ambientales', 'scrum2', 'seguir las lineamientos2', 'con metologia paso a paso2', 'Por qué lo voy a hacer:2', 'Carlos Ruiz2', 'Contador2', 1, 13);

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
(29, 'INGRESOS VARIOS', 4662500, 5256666, 594166, 13, 1, 10, '2021-03-20 01:28:13', '2021-03-20 01:38:03'),
(30, 'MATRICULAS BACHILLERATO', 7589000, 0, -7589000, -100, 1, 11, '2021-03-23 13:27:54', '2021-03-23 13:27:54');

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
(2, 'Lorem ipsum dolor sit amet, consectetur  elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'Lorem ipsum dolor sit amet, consectetur  elit, sed do eiusmod tempor incididunt ut  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 2, '2020-09-18 23:34:55', '2020-09-18 23:36:51'),
(4, 'DESCRIPCIÓN DEL RIESGO U OPORTUNIDAD', 'CLASIFICACIÓN', 13, '2021-04-12 21:53:43', '2021-04-12 21:53:43');

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

--
-- Volcado de datos para la tabla `tbl_correcciones_anomalias`
--

INSERT INTO `tbl_correcciones_anomalias` (`id_correccion_anomalia`, `fk_anomalia`, `str_correccion_anomalia`, `str_quien`, `fecha`, `bool_estado_correcion`, `created_at`, `updated_at`) VALUES
(1, 1, 'Correccion', 'canver', '2021-04-10', 1, '2021-04-10 17:19:08', '2021-04-10 17:19:08'),
(2, 1, 'Correccion', 'canver', '2021-04-10', 1, '2021-04-10 17:19:08', '2021-04-10 17:19:08'),
(3, 1, 'Correccion', 'canver', '2021-04-10', 1, '2021-04-10 17:19:08', '2021-04-10 17:19:08');

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
(19, '2021-03-19', 1, 1, 21, '2021-03-20 15:48:16', '2021-03-23 13:17:33');

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
(13, 'CaféOccidente', '123456111', 'canver', 'calle12', '3216549874', 'output-onlinepngtools (2).png', 1, 6, '2021-03-20 14:49:51', '2021-03-31 20:20:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_eva_revision`
--

CREATE TABLE `tbl_eva_revision` (
  `id_revision` int(10) UNSIGNED NOT NULL,
  `fecha_revision` date NOT NULL,
  `periodo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entrada_salida` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_empresa` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_eva_revision`
--

INSERT INTO `tbl_eva_revision` (`id_revision`, `fecha_revision`, `periodo`, `entrada_salida`, `bool_estado`, `fk_empresa`) VALUES
(4, '2021-04-08', 'Septiembre 2020 - Agosto 2021', '<p><strong>3.Entradas de la Revisi&oacute;n por la Direcci&oacute;n:</strong></p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Direccionamiento estrat&eacute;gico y revisi&oacute;n de la pol&iacute;tica Integral.</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Estado de las acciones de las revisiones por la direcci&oacute;n previas (cumplimiento de acuerdos documentados en revisiones anteriores).</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>Acciones propuestas de la Revisi&oacute;n Previa (A&ntilde;o Anterior)</strong></p>\r\n			</td>\r\n			<td>\r\n			<p><strong>Estado de las Acciones (Gesti&oacute;n a la Fecha de Corte del Informe)</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Cambios en cuestiones externas e internas pertinentes al Sistema de Gesti&oacute;n de Calidad, Ambiental, Seguridad y Salud en el Trabajo, Sistema de Gesti&oacute;n de la Inocuidad de los Alimentos (incluye cambios en la organizaci&oacute;n y su contexto) y Sistema de Gesti&oacute;n en Control y Seguridad.</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Cambios en las necesidades y expectativas de las partes interesadas; requisitos legales, reglamentarios y otros requisitos, gesti&oacute;n de riesgos y oportunidades.</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Informaci&oacute;n sobre desempe&ntilde;o y eficacia de los Sistemas de Gesti&oacute;n:&nbsp;</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Sistema de Gesti&oacute;n de Calidad, tendencias de satisfacci&oacute;n cliente, objetivos de calidad, desempe&ntilde;o de los procesos y conformidad de los productos, no conformidades y acciones correctivas de calidad, resultados seguimiento y medici&oacute;n de calidad, resultados de auditor&iacute;as de calidad y desempe&ntilde;o de proveedores externos.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Sistema de Gesti&oacute;n Ambiental, cumplimiento de objetivos, no conformidades y acciones correctivas, resultados de seguimiento y medici&oacute;n, requisitos legales aplicables, riesgos y oportunidades y resultados de auditor&iacute;a interna.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Sistema de Gesti&oacute;n de Seguridad y Salud en el Trabajo, cumplimiento de pol&iacute;tica y objetivos de la SST, incidentes, no conformidades, acciones correctivas, mejora continua, resultados del seguimiento y la medici&oacute;n, resultados de la evaluaci&oacute;n del cumplimiento con los requisitos legales y otros requisitos, resultados de la auditor&iacute;a, consulta y participaci&oacute;n de los trabajadores, riesgos y oportunidades.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Sistema de Gesti&oacute;n de la Inocuidad Alimentaria, los resultados de las actividades de actualizaci&oacute;n, los resultados del seguimiento y medici&oacute;n, el an&aacute;lisis de los resultados de las actividades de verificaci&oacute;n relacionadas con los PPR y el plan de control de peligros, las no conformidades y acciones correctivas, los resultados de las auditor&iacute;as internas y externas, las inspecciones, el desempe&ntilde;o de los proveedores externos, revisi&oacute;n de los riesgos y oportunidades y de la eficacia de las acciones tomadas para abordarlos, toda situaci&oacute;n de emergencia, incidente o retirada/recuperaci&oacute;n que hayan ocurridos y cumplimiento de objetivos.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Informaci&oacute;n sobre el desempe&ntilde;o del Sistema de Gesti&oacute;n en Control y Seguridad Basc incluidas las tendencias relativas a indicadores de los procesos, no conformidades y acciones correctivas, resultados de seguimiento y medici&oacute;n, cumplimiento de los requisitos legales y reglamentarios y resultados de las auditor&iacute;as.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Asignaci&oacute;n y adecuaci&oacute;n de recursos (Calidad, Ambiental, Seguridad y Salud en el Trabajo, Inocuidad, Control y Seguridad &ldquo;BASC&rdquo;)</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Comunicaciones pertinentes con las partes interesadas (incluye quejas ambientales)</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Eficacia de las acciones tomadas para abordar riesgos y oportunidades</strong></p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Oportunidades / Acciones de mejora continua (Calidad, Ambiental, Seguridad y Salud en el Trabajo, Inocuidad, Control y Seguridad &ldquo;BASC&rdquo;))</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<p><strong>4. Las salidas de la revisi&oacute;n por la direcci&oacute;n deben incluir las decisiones relacionadas con:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>La conveniencia, adecuaci&oacute;n y conclusiones de la eficacia contin&uacute;a de los sistemas de gesti&oacute;n en el logro de sus resultados previstos.&nbsp;</strong></p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Cualquier necesidad de cambio en los sistemas de gesti&oacute;n</strong></p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Los recursos necesarios.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Las oportunidades de mejorar la integraci&oacute;n de los sistemas de gesti&oacute;n con otros procesos de negocio.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Cualquier implicaci&oacute;n para la direcci&oacute;n estrat&eacute;gica de la organizaci&oacute;n.&nbsp;</strong></p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Las decisiones y acciones relacionadas con las oportunidades de mejora continua.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Las acciones necesarias cuando no se hayan logrado los objetivos.</strong></p>\r\n	</li>\r\n</ol>', 1, 13),
(5, '2021-04-09', 'Septiembre 2020 - Agosto 2021', '<p><strong>3.Entradas de la Revisi&oacute;n por la Direcci&oacute;n:</strong></p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Direccionamiento estrat&eacute;gico y revisi&oacute;n de la pol&iacute;tica Integral.</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Estado de las acciones de las revisiones por la direcci&oacute;n previas (cumplimiento de acuerdos documentados en revisiones anteriores).</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>Acciones propuestas de la Revisi&oacute;n Previa (A&ntilde;o Anterior)</strong></p>\r\n			</td>\r\n			<td>\r\n			<p><strong>Estado de las Acciones (Gesti&oacute;n a la Fecha de Corte del Informe)</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Cambios en cuestiones externas e internas pertinentes al Sistema de Gesti&oacute;n de Calidad, Ambiental, Seguridad y Salud en el Trabajo, Sistema de Gesti&oacute;n de la Inocuidad de los Alimentos (incluye cambios en la organizaci&oacute;n y su contexto) y Sistema de Gesti&oacute;n en Control y Seguridad.</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Cambios en las necesidades y expectativas de las partes interesadas; requisitos legales, reglamentarios y otros requisitos, gesti&oacute;n de riesgos y oportunidades.</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Informaci&oacute;n sobre desempe&ntilde;o y eficacia de los Sistemas de Gesti&oacute;n:&nbsp;</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Sistema de Gesti&oacute;n de Calidad, tendencias de satisfacci&oacute;n cliente, objetivos de calidad, desempe&ntilde;o de los procesos y conformidad de los productos, no conformidades y acciones correctivas de calidad, resultados seguimiento y medici&oacute;n de calidad, resultados de auditor&iacute;as de calidad y desempe&ntilde;o de proveedores externos.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Sistema de Gesti&oacute;n Ambiental, cumplimiento de objetivos, no conformidades y acciones correctivas, resultados de seguimiento y medici&oacute;n, requisitos legales aplicables, riesgos y oportunidades y resultados de auditor&iacute;a interna.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Sistema de Gesti&oacute;n de Seguridad y Salud en el Trabajo, cumplimiento de pol&iacute;tica y objetivos de la SST, incidentes, no conformidades, acciones correctivas, mejora continua, resultados del seguimiento y la medici&oacute;n, resultados de la evaluaci&oacute;n del cumplimiento con los requisitos legales y otros requisitos, resultados de la auditor&iacute;a, consulta y participaci&oacute;n de los trabajadores, riesgos y oportunidades.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Sistema de Gesti&oacute;n de la Inocuidad Alimentaria, los resultados de las actividades de actualizaci&oacute;n, los resultados del seguimiento y medici&oacute;n, el an&aacute;lisis de los resultados de las actividades de verificaci&oacute;n relacionadas con los PPR y el plan de control de peligros, las no conformidades y acciones correctivas, los resultados de las auditor&iacute;as internas y externas, las inspecciones, el desempe&ntilde;o de los proveedores externos, revisi&oacute;n de los riesgos y oportunidades y de la eficacia de las acciones tomadas para abordarlos, toda situaci&oacute;n de emergencia, incidente o retirada/recuperaci&oacute;n que hayan ocurridos y cumplimiento de objetivos.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Informaci&oacute;n sobre el desempe&ntilde;o del Sistema de Gesti&oacute;n en Control y Seguridad Basc incluidas las tendencias relativas a indicadores de los procesos, no conformidades y acciones correctivas, resultados de seguimiento y medici&oacute;n, cumplimiento de los requisitos legales y reglamentarios y resultados de las auditor&iacute;as.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Asignaci&oacute;n y adecuaci&oacute;n de recursos (Calidad, Ambiental, Seguridad y Salud en el Trabajo, Inocuidad, Control y Seguridad &ldquo;BASC&rdquo;)</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Comunicaciones pertinentes con las partes interesadas (incluye quejas ambientales)</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Eficacia de las acciones tomadas para abordar riesgos y oportunidades</strong></p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Oportunidades / Acciones de mejora continua (Calidad, Ambiental, Seguridad y Salud en el Trabajo, Inocuidad, Control y Seguridad &ldquo;BASC&rdquo;))</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<p><strong>4. Las salidas de la revisi&oacute;n por la direcci&oacute;n deben incluir las decisiones relacionadas con:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>La conveniencia, adecuaci&oacute;n y conclusiones de la eficacia contin&uacute;a de los sistemas de gesti&oacute;n en el logro de sus resultados previstos.&nbsp;</strong></p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Cualquier necesidad de cambio en los sistemas de gesti&oacute;n</strong></p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Los recursos necesarios.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Las oportunidades de mejorar la integraci&oacute;n de los sistemas de gesti&oacute;n con otros procesos de negocio.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Cualquier implicaci&oacute;n para la direcci&oacute;n estrat&eacute;gica de la organizaci&oacute;n.&nbsp;</strong></p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Las decisiones y acciones relacionadas con las oportunidades de mejora continua.</strong></p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Las acciones necesarias cuando no se hayan logrado los objetivos.</strong></p>\r\n	</li>\r\n</ol>', 1, 13),
(6, '2021-04-15', 'Septiembre 2020 - Agosto 2021', '', 1, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_eva_revision_users`
--

CREATE TABLE `tbl_eva_revision_users` (
  `id_revision_user` int(10) UNSIGNED NOT NULL,
  `represeta` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_revision` int(10) UNSIGNED NOT NULL,
  `fk_user` int(10) UNSIGNED NOT NULL,
  `fk_cargor` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_eva_revision_users`
--

INSERT INTO `tbl_eva_revision_users` (`id_revision_user`, `represeta`, `bool_estado`, `fk_revision`, `fk_user`, `fk_cargor`) VALUES
(1, 'Vicepresidencia Administrativa', 1, 4, 6, 10),
(2, 'Vicepresidencia Control', 1, 4, 6, 12),
(10, 'Vicepresidencia Administrativa1', 1, 5, 6, 11),
(11, 'Vicepresidencia Administrativa2', 1, 5, 6, 10),
(12, 'Vicepresidencia Administrativa3', 1, 5, 6, 10),
(13, 'Vicepresidencia Administrativa10', 1, 5, 6, 12),
(14, 'Vicepresidencia Administrativa', 1, 6, 6, 10);

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
(26, 'DSas', 0, 1, 21, '2021-03-20 15:22:31', '2021-03-20 15:41:14'),
(27, 'Cosecha y Transporte de caña', 1, 1, 22, '2021-04-06 17:24:26', '2021-04-06 17:24:26'),
(28, 'ACIDO SULFURICO Y CLORHIDRICO', 1, 1, 22, '2021-04-06 17:24:40', '2021-04-06 17:24:40'),
(29, 'Alistamiento de mazas, para molinos', 1, 1, 22, '2021-04-06 17:24:51', '2021-04-06 17:24:51'),
(30, 'AplicaciónAgroquimicos', 1, 1, 22, '2021-04-06 17:25:01', '2021-04-06 17:25:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_lid_responsabilidades`
--

CREATE TABLE `tbl_lid_responsabilidades` (
  `id_responsabilidades` int(11) NOT NULL,
  `nom_responsabilidades` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuentas_rinde` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `autoridad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `a_quien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cada_cuanto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_roles_res` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_lid_responsabilidades`
--

INSERT INTO `tbl_lid_responsabilidades` (`id_responsabilidades`, `nom_responsabilidades`, `cuentas_rinde`, `autoridad`, `a_quien`, `cada_cuanto`, `bool_estado`, `fk_roles_res`) VALUES
(1, 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 0, 50),
(2, 'asd', '', '', '', '', 0, 50),
(3, 'dfgdfg', '', '', '', '', 0, 50),
(4, 'af', 'asdf', 'dsa', 'sa', '', 0, 50),
(5, 'asd', 'asd', 'asd', 'dsa', 'das', 0, 50),
(6, 'ñkl', 'klñ', 'ñk', 'klñ', 'klñ', 0, 50),
(7, ',', 'asdasd', 'asd', 'asd', 'asd', 0, 50),
(8, 'Definir y aprobar la política SIG ( Calidad/ Ambiental).', 'Revision por la direccion anual', 'Establecer las directrices para la implementación, mantenimiento, revisión y mejora del Sistema Integrado de Gestión SIG.', 'Funcionarios de la empresa', 'Una vez al año', 1, 50),
(9, 'Definir y asignar los recursos financieros, técnicos y el personal necesario para el diseño, implementación, revisión evaluación y mejora de los sistemas de gestion.', 'Reuniones periodicas de revision', '', '', '', 1, 50),
(10, 'Programar la revision por la direccion, al igual que las reuniones periodicas para seguimiento a los procesos', '', '', '', '', 1, 50),
(11, 'Aprobar las responsabilidades asignadas, documentadas y comunicadas  a todos los niveles de la organización', 'Revision por la direccion anual', '', '', '', 1, 50),
(12, 'Aprobar el plan de Trabajo Anual', 'Reunion anual de planificacion del SIG', '', '', '', 1, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_lid_roles_cargos`
--

CREATE TABLE `tbl_lid_roles_cargos` (
  `id_roles_cargo` int(11) UNSIGNED NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_roles_res` int(11) NOT NULL,
  `fk_cargo` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_lid_roles_cargos`
--

INSERT INTO `tbl_lid_roles_cargos` (`id_roles_cargo`, `bool_estado`, `fk_roles_res`, `fk_cargo`) VALUES
(6, 1, 49, 8),
(7, 0, 49, 9),
(8, 1, 49, 8),
(9, 1, 48, 8),
(10, 0, 48, 9),
(11, 0, 50, 11),
(12, 0, 50, 11),
(13, 0, 50, 12),
(14, 1, 50, 10),
(15, 1, 50, 11),
(16, 0, 50, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_lid_roles_responsabilidades`
--

CREATE TABLE `tbl_lid_roles_responsabilidades` (
  `id_rol_res` int(11) NOT NULL,
  `nom_rol_res` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_empresa` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_lid_roles_responsabilidades`
--

INSERT INTO `tbl_lid_roles_responsabilidades` (`id_rol_res`, `nom_rol_res`, `bool_estado`, `fk_empresa`) VALUES
(48, 'ALTA DIRECCION_', 1, 11),
(49, 'RESPONSABLE DE LOS SISTEMAS DE GESTION..', 1, 11),
(50, 'ALTA DIRECCION', 1, 13);

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

--
-- Volcado de datos para la tabla `tbl_mejora_anomalia`
--

INSERT INTO `tbl_mejora_anomalia` (`id_anomalia`, `fk_empresa`, `str_sistema_de_gestion`, `str_proceso`, `str_origen_anomalia`, `str_reportado_por`, `fecha`, `str_anomalia`, `file_archivo`, `file_archivo_correcciones`, `bool_estado_anomalia`, `created_at`, `updated_at`) VALUES
(1, 13, '10', '45', '2', 'canver', '2021-04-10', 'fgsdsdf sdf', NULL, NULL, 1, '2021-04-10 17:19:08', '2021-04-10 17:19:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mejo_acta`
--

CREATE TABLE `tbl_mejo_acta` (
  `id_acta` int(10) UNSIGNED NOT NULL,
  `acta` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gestion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proceso` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_acta` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_acta` date NOT NULL,
  `lugar` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora_acta` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_proxima` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registrado` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones_acta` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `accion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsable` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_inicio_acc` date NOT NULL,
  `fecha_final_acc` date NOT NULL,
  `compromiso` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ejecutable` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_inicio_eje` date NOT NULL,
  `fecha_final_eje` date NOT NULL,
  `archivo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones_ejecuccion` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terminada` tinyint(1) NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_empresa` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_mejo_acta`
--

INSERT INTO `tbl_mejo_acta` (`id_acta`, `acta`, `gestion`, `proceso`, `tipo_acta`, `fecha_acta`, `lugar`, `hora_acta`, `fecha_proxima`, `registrado`, `observaciones_acta`, `accion`, `responsable`, `fecha_inicio_acc`, `fecha_final_acc`, `compromiso`, `ejecutable`, `fecha_inicio_eje`, `fecha_final_eje`, `archivo`, `observaciones_ejecuccion`, `terminada`, `bool_estado`, `fk_empresa`) VALUES
(1, 'Nombre de Acta:', 'CRM', 'gestión Gerencial', 'Privada', '2021-03-31', 'lugar:', '1:00', '2021-04-10', 'Mario botina', 'Observaciones:', 'Acción:', 'canver', '2021-03-09', '2021-04-30', 'Ejecucción de Compromisos', 'Acción Ejecutable:', '2021-04-11', '2021-04-11', '', 'Observaciones Ejecucción:', 0, 1, 13),
(2, 'Nombre de Acta:', 'ORACLE', 'gestión financiera', 'Publica', '2021-04-06', 'lugar:', '1:00', '2021-04-08', 'Mario botina', 'Observaciones:', 'Acción:', 'canver', '2021-04-17', '2021-04-16', 'Ejecucción de Compromisos', 'Acción Ejecutable:', '2021-04-10', '2021-04-10', '', 'Observaciones:', 0, 1, 13),
(5, 'acta', 'CRM', 'gestión Gerencial', 'Privada', '2021-04-11', 'lugar:', '1:00', '2021-04-17', 'Carlos Ruiz', 'Observaciones', 'Acción:', '6', '2021-04-01', '2021-04-01', 'Ejecucción de Compromisos', 'Acción Ejecutable:', '2021-04-11', '2021-04-11', '1618122215Matriz ciclo de Vida del Producto.xlsx', 'Observaciones Ejecucción:', 1, 1, 13),
(6, 'Nombre de Acta:', 'CRM', 'gestión Gerencial', 'Privada', '2021-04-08', 'lugar:', '1:00', '2021-04-08', 'Mario botina', 'asd', 'Acción:', '6', '2021-04-16', '2021-04-10', 'Ejecucción de Compromisos', 'Acción Ejecutable:', '2021-04-11', '2021-04-11', '', 'Observaciones Ejecucción:', 1, 1, 13),
(8, 'acta', 'CRM', 'gestión financiera', 'Privada', '2021-04-09', 'lugar:', '1:00', '2021-03-30', 'Carlos Ruiz', 'asd', 'Acción:', 'canver', '2021-04-15', '2021-04-22', '', '', '2021-01-01', '2021-01-01', '', '', 0, 1, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mejo_acta_asistente`
--

CREATE TABLE `tbl_mejo_acta_asistente` (
  `id_asistente` int(10) UNSIGNED NOT NULL,
  `asistente` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_acta` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_mejo_acta_asistente`
--

INSERT INTO `tbl_mejo_acta_asistente` (`id_asistente`, `asistente`, `cargo`, `bool_estado`, `fk_acta`) VALUES
(15, 'canver', 'Auxiliar Admministrativo', 1, 5),
(16, 'canver', 'Auxiliar Admministrativo', 1, 6),
(39, 'canver', 'Auxiliar Gerente Pollo', 1, 2),
(40, 'canver', 'Auxiliar Admministrativo', 1, 2),
(41, 'canver', 'Auxiliar Gerente Pollo', 1, 2),
(42, 'canver', 'Auxiliar Gerente Pollo', 1, 2),
(43, 'canver', 'Auxiliar Gerente Pollo', 1, 2),
(45, 'canver', 'Auxiliar Gerente Pollo', 1, 8),
(46, 'canver', 'Auxiliar Admministrativo', 1, 8),
(47, 'canver', 'Auxiliar Admministrativo', 1, 8),
(51, 'canver', 'Auxiliar Gerente Pollo', 1, 1),
(52, 'canver', 'Auxiliar Gerente Pollo', 1, 1),
(53, 'canver', 'Auxiliar Gerente Pollo', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mejo_acta_temas`
--

CREATE TABLE `tbl_mejo_acta_temas` (
  `id_tema` int(10) UNSIGNED NOT NULL,
  `tema` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comentario` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_acta` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_mejo_acta_temas`
--

INSERT INTO `tbl_mejo_acta_temas` (`id_tema`, `tema`, `comentario`, `bool_estado`, `fk_acta`) VALUES
(10, 'Tema Tratado:', 'Comentarios Relevantes :', 1, 5),
(11, 'Tema Tratado:', 'Comentarios Relevantes :', 1, 6),
(31, 'Tema Tratado:', 'Comentarios Relevantes :', 1, 2),
(32, 'Tema Tratado:2', 'Comentarios Relevantes :2', 1, 2),
(33, 'Tema Tratado:3', 'Comentarios Relevantes :3', 1, 2),
(34, 'Tema Tratado:4', 'Comentarios Relevantes :4', 1, 2),
(35, 'Tema Tratado:5', 'Comentarios Relevantes :5', 1, 2),
(37, 'Tema Tratado:', 'Comentarios Relevantes :', 1, 8),
(38, 'Tema Tratado:3', 'Comentarios Relevantes :3', 1, 8),
(42, 'Tema Tratado:', 'Comentarios Relevantes :', 1, 1),
(43, 'Tema Tratado:', 'Comentarios Relevantes :', 1, 1),
(44, 'Tema Tratado:', 'Comentarios Relevantes', 1, 1);

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
-- Estructura de tabla para la tabla `tbl_plane_auditoria`
--

CREATE TABLE `tbl_plane_auditoria` (
  `id_auditoria` int(10) UNSIGNED NOT NULL,
  `direcion` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `representante` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alcance` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `criterios` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_auditoria` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `multisitio` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nocturno` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditor_1` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cooreo_aud_1` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditor_2` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cooreo_aud_2` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditor_3` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cooreo_aud_3` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditor_4` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cooreo_aud_4` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditor_5` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cooreo_aud_5` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditor_6` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cooreo_aud_6` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `modalidad` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_emision` date NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_cargo` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_plane_auditoria`
--

INSERT INTO `tbl_plane_auditoria` (`id_auditoria`, `direcion`, `representante`, `correo`, `alcance`, `criterios`, `tipo_auditoria`, `multisitio`, `nocturno`, `descripcion`, `auditor_1`, `cooreo_aud_1`, `auditor_2`, `cooreo_aud_2`, `auditor_3`, `cooreo_aud_3`, `auditor_4`, `cooreo_aud_4`, `auditor_5`, `cooreo_aud_5`, `auditor_6`, `cooreo_aud_6`, `observaciones`, `modalidad`, `fecha_emision`, `bool_estado`, `fk_cargo`) VALUES
(1, 'asd', 'das', 'bv', 'bv', 'bv', 'cb', '1', '1', 'vc', 'bvc', 'bvc', '', '', '', '', '', '', '', '', '', '', 'bvc', 'bvcb', '2021-04-07', 1, 10),
(3, 'Dirección del sitio:_', 'das_', 'Correo:_', 'Alcance:_', 'Criterios de Auditoría:_', 'Tipo de auditoría:_', 'Si', 'Si', 'Descripción de Auditoría:_', 'Auditor Líder 9001, 14001 y Basc', 'Correo:', '', '', '', '', '', '', '', '', '', '', 'Observaciones:_', 'Modalidad de auditoría:_', '2021-04-21', 1, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_plane_auditoria_chequeo`
--

CREATE TABLE `tbl_plane_auditoria_chequeo` (
  `id_chequeo` int(10) UNSIGNED NOT NULL,
  `fecha_chequeo` date NOT NULL,
  `equi_auditor` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aspectos` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cumple` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `obervaciones_chequeo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_proceso` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_plane_auditoria_chequeo`
--

INSERT INTO `tbl_plane_auditoria_chequeo` (`id_chequeo`, `fecha_chequeo`, `equi_auditor`, `aspectos`, `cumple`, `obervaciones_chequeo`, `bool_estado`, `fk_proceso`) VALUES
(3, '2021-04-08', 'Alex, Cristian, Duarte2', 'Aspectos a tener en cuenta durante la auditoría interna:2', 'No', 'Observaciones:2', 0, 48),
(4, '2021-04-06', 'Maria', 'Aspectos a tener en cuenta durante la auditoría interna:', 'Si', 'Observaciones:', 1, 48),
(5, '2021-04-07', 'Fernando Camilo', '5.1 En el proceso de Elaboración  como  se demuestra Liderazgo y Compromiso hacia los sistemas de gestión SGC,SGA,SGSST?', 'Si', 'El Jefe de elaboración de muestra compromiso hacia los sistemas de gestión, mencionando de que manera el proceso de Elaboración aporta a la estrategia de la organización.', 1, 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_plane_auditoria_che_sis_gestion`
--

CREATE TABLE `tbl_plane_auditoria_che_sis_gestion` (
  `id_che_sisgestion` int(10) UNSIGNED NOT NULL,
  `seleccion_chequeo` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_audchequeo` int(10) UNSIGNED NOT NULL,
  `fk_sisgestion` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_plane_auditoria_che_sis_gestion`
--

INSERT INTO `tbl_plane_auditoria_che_sis_gestion` (`id_che_sisgestion`, `seleccion_chequeo`, `bool_estado`, `fk_audchequeo`, `fk_sisgestion`) VALUES
(4, 'No', 1, 4, 10),
(5, 'No', 1, 4, 11),
(6, 'Si', 1, 4, 12),
(10, 'Si', 1, 3, 10),
(11, 'Si', 1, 3, 11),
(12, 'Si', 1, 3, 12),
(13, 'Si', 1, 5, 10),
(14, 'No', 1, 5, 13),
(15, 'Si', 1, 5, 11),
(16, 'No', 1, 5, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_plane_auditoria_foropur`
--

CREATE TABLE `tbl_plane_auditoria_foropur` (
  `id_foropur` int(10) UNSIGNED NOT NULL,
  `fecha_foropur` date NOT NULL,
  `lider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `equipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_informe` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_foropur` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_proceso` int(10) UNSIGNED NOT NULL,
  `fk_usuario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_plane_auditoria_foropur`
--

INSERT INTO `tbl_plane_auditoria_foropur` (`id_foropur`, `fecha_foropur`, `lider`, `equipo`, `tipo_informe`, `descripcion_foropur`, `bool_estado`, `fk_proceso`, `fk_usuario`) VALUES
(3, '2021-04-07', 'Auditor Líder:2', 'Equipo Auditor:2', 'OPORTUNIDADES', 'Descripción:2', 1, 45, 6),
(4, '2021-04-07', 'Natalia Bedoya', 'Gissel Tigreros, Alejandra Mendez, Jonathan Realpe', 'OPORTUNIDADES', 'Conoce la política integral, tiene apropiada la  política.', 1, 45, 6),
(5, '2021-04-07', 'Auditor Líder:', 'Gissel Tigreros, Alejandra Mendez, Jonathan Realpe', 'OPORTUNIDADES', 'Descripción:', 1, 46, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_plane_auditoria_foropur_gestion`
--

CREATE TABLE `tbl_plane_auditoria_foropur_gestion` (
  `id_foropur_gestion` int(10) UNSIGNED NOT NULL,
  `seleccion_foropur` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_foropur` int(10) UNSIGNED NOT NULL,
  `fk_sisgestion` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_plane_auditoria_foropur_gestion`
--

INSERT INTO `tbl_plane_auditoria_foropur_gestion` (`id_foropur_gestion`, `seleccion_foropur`, `bool_estado`, `fk_foropur`, `fk_sisgestion`) VALUES
(5, 'No', 1, 3, 10),
(6, 'No', 1, 3, 13),
(7, 'No', 1, 3, 11),
(8, 'No', 1, 3, 12),
(9, 'Si', 1, 4, 10),
(10, 'No', 1, 4, 13),
(11, 'No', 1, 4, 11),
(12, 'No', 1, 4, 12),
(13, 'Si', 1, 5, 10),
(14, 'Si', 1, 5, 13),
(15, 'Si', 1, 5, 11),
(16, 'Si', 1, 5, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_plane_auditoria_hallazgos`
--

CREATE TABLE `tbl_plane_auditoria_hallazgos` (
  `id_hallazgos` int(10) UNSIGNED NOT NULL,
  `ubicacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripciones` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `evidencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requisito` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_detectadas` int(10) NOT NULL,
  `num_cerredas` int(10) NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `reviso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aprobo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_empresa` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_plane_auditoria_hallazgos`
--

INSERT INTO `tbl_plane_auditoria_hallazgos` (`id_hallazgos`, `ubicacion`, `descripciones`, `evidencia`, `requisito`, `num_detectadas`, `num_cerredas`, `bool_estado`, `reviso`, `aprobo`, `fk_empresa`) VALUES
(1, 'Zona de envase', 'En recorrido de zona de envase se encontro que los precintos de seguridad no estaban salvaguardados de manera correcta incumpliendo los controles de seguridad implementado.', 'El punto de almacenamiento de los precintos de seguridad se encontro con el candado abierto.', '\"ESTÁNDAR INTERNACIONAL DE SEGURIDAD BASC 5.0.1 2.6 Sello de seguridad\"', 3, 1, 1, '6', '6', 13),
(2, 'Zona de envase2', 'En recorrido de zona de envase se encontro que los precintos de seguridad no estaban salvaguardados de manera correcta incumpliendo los controles de seguridad implementado.', 'El punto de almacenamiento de los precintos de seguridad se encontro con el candado abierto.', '\"ESTÁNDAR INTERNACIONAL DE SEGURIDAD BASC 5.0.1 2.6 Sello de seguridad\"', 1, 1, 1, 'canver', 'canver', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_plane_auditoria_hallazgos_gestion`
--

CREATE TABLE `tbl_plane_auditoria_hallazgos_gestion` (
  `id_hallazgos_gestion` int(10) UNSIGNED NOT NULL,
  `seleccion_hallazgos` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_hallazgos` int(10) UNSIGNED NOT NULL,
  `fk_sisgestion` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_plane_auditoria_hallazgos_gestion`
--

INSERT INTO `tbl_plane_auditoria_hallazgos_gestion` (`id_hallazgos_gestion`, `seleccion_hallazgos`, `bool_estado`, `fk_hallazgos`, `fk_sisgestion`) VALUES
(1, 'Si', 1, 1, 10),
(2, 'No', 1, 1, 13),
(3, 'Si', 1, 1, 11),
(4, 'No', 1, 1, 12),
(9, 'Si', 1, 2, 10),
(10, 'Si', 1, 2, 13),
(11, 'Si', 1, 2, 11),
(12, 'Si', 1, 2, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_plane_auditoria_multiples`
--

CREATE TABLE `tbl_plane_auditoria_multiples` (
  `id_multiple` int(10) UNSIGNED NOT NULL,
  `fecha_multiple` date NOT NULL,
  `hora_inicio` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora_fin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requisitos` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `equipo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_personas` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_auditoria` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_plane_auditoria_multiples`
--

INSERT INTO `tbl_plane_auditoria_multiples` (`id_multiple`, `fecha_multiple`, `hora_inicio`, `hora_fin`, `requisitos`, `equipo`, `info_personas`, `bool_estado`, `fk_auditoria`) VALUES
(3, '2021-04-14', 'Hora de inicio:', 'Hora de finalización:', 'Requisitos para Auditar:', 'Equipo Auditor:', 'Info de personas que serán entrevistadas:', 1, 3),
(4, '2021-04-07', 'Hora de inicio:2', 'Hora de finalización:2', 'Requisitos para Auditar:2', 'Equipo Auditor:2', 'Info de personas que serán entrevistadas:2', 1, 3),
(5, '2021-04-08', 'Hora de inicio:3', 'Hora de finalización:3', 'Requisitos para Auditar:3', 'Equipo Auditor:3', 'Info de personas que serán entrevistadas:3', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_plane_diseño`
--

CREATE TABLE `tbl_plane_diseño` (
  `id_diseno` int(10) UNSIGNED NOT NULL,
  `general` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitarios` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_aspectos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aspectos_ambiental` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `impacto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsabilidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `situacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_impacto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `legal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `control` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periodicidad` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intensidad` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanencia` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `afectacion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_sinificancia` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sinificancia` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_empresa` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_plane_diseño`
--

INSERT INTO `tbl_plane_diseño` (`id_diseno`, `general`, `unitarios`, `cate_aspectos`, `aspectos_ambiental`, `impacto`, `responsabilidad`, `situacion`, `tipo_impacto`, `legal`, `control`, `periodicidad`, `intensidad`, `permanencia`, `afectacion`, `num_sinificancia`, `sinificancia`, `programa`, `bool_estado`, `fk_empresa`) VALUES
(1, '2OFICINAS ADMINISTRATIVAS ( Proceso Gerencial, Comercial, Gestion Humana)', '2Se dan actividades típicas de oficina como atención al público y elaboración de documentos y reportes', '2Generación de residuos', '2Sólidos aprovechables (papel, cartón, plástico de baja densidad)', '2Disminución del volumen en los rellenos sanitario por aprovechamiento para reciclable', '2Personal administrativo', '2Normal', '2Benefico', 'Si', 'Si', 'Afectación significativa', 'Afectación significativa', 'Afectación significativa', '40', '100', 'Ninguna', '2Programa de Residuos Aprovechables y no aprovechables', 0, 13),
(2, 'OFICINAS ADMINISTRATIVAS ( Proceso Gerencial, Comercial, Gestion Humana)', 'Se dan actividades típicas de oficina como atención al público y elaboración de documentos y reportes', 'Generación de residuos', 'Sólidos no aprovechables (papel sucio, monocarbon, residuos de comida)', 'Contaminación del suelo.                               Aumento de volumen de residuos en el relleno sanitario', 'Personal administrativo', 'Normal', 'Adverso', 'No', 'No', 'Afectación Leve', 'Afectación Leve', 'Afectación Leve', '', '8', 'Media', 'Programa de Residuos Aprovechables y no aprovechables', 1, 13),
(3, '2021-04-08', 'Septiembre 2020- Agosto 2020', '', '', 'Presidente ANM', '', '', '', '', '', '', '', '', '', '', '', '', 1, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_plane_liberacion`
--

CREATE TABLE `tbl_plane_liberacion` (
  `id_liberacion` int(10) UNSIGNED NOT NULL,
  `lote` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_realizacion` date NOT NULL,
  `verificacion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `libero` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exigido` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `obtenido` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indicacion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `equipo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `evidencia` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_empresa` int(10) UNSIGNED NOT NULL,
  `fk_producto` int(10) UNSIGNED NOT NULL,
  `fk_cliente` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_plane_planeaciocontrol`
--

CREATE TABLE `tbl_plane_planeaciocontrol` (
  `id_pla_control` int(11) UNSIGNED NOT NULL,
  `tecnica` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `des_producto` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `composicion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `vida` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `envase` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `etiquetado` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `metodo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `requisito` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `uso` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `fisico` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `biologico` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `quimico` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `presentacion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_producto` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_plane_planeaciocontrol`
--

INSERT INTO `tbl_plane_planeaciocontrol` (`id_pla_control`, `tecnica`, `des_producto`, `composicion`, `vida`, `condicion`, `envase`, `etiquetado`, `metodo`, `requisito`, `uso`, `fisico`, `biologico`, `quimico`, `presentacion`, `bool_estado`, `fk_producto`) VALUES
(7, 'NTC 2085:2020', 'Producto natural extraído de la caña de azúcar de presentación sólida y cristalizada, constituido esencialmente por sacarosa, obtenido mediante procedimientos industriales apropiados y que no ha sido sometido a proceso de refinación.', 'El azúcar es sacarosa, un carbohidrato de origen natural compuesto por carbono, oxígeno e hidrógeno . El azúcar blanco especial es un alimento puro con más del 99,6% de sacarosa.', 'En condiciones adecuadas de almacenamiento el azúcar presenta un comportamiento estable por períodos de dos años, en este tiempo el producto no debe presentar ningún tipo de alteración.', 'Almacenar en un lugar cerrado, fresco y seco que asegure su calidad e inocuidad. Evitar su contacto con otros productos que puedan afectar sus propiedades organolépticas.', 'Debe ser de un material grado alimenticio, que no altere las características del producto y deben asegurar su conservación durante su transporte y almacenamiento.', 'Se rige con la resolución 5109 de 2005.', 'Se despacha en vehículos que cumplan los requisitos para despacho de acuerdo a las cantidades a entregar, algunos vehículos son por cuenta de los clientes cuando se vende en términos FOB y por cuenta del ingenio en ventas términos CIF.\r\nLa distribución se hace a los clientes de cadena, autoservicios, industrias, minoristas y mayoristas.\r\n\r\nEl vehículo transportador debe estar carpado y previamente inspeccionado, limpio y seco, exento de olores fuertes que se puedan adherir al producto, libre de residuos contaminantes y de elementos que puedan alterar su presentación.', 'Norma Técnica Colombiana -NTC 2085- Azúcar Blanco Especial								\r\nRegistro Sanitario No. RSIAV16M12792								\r\nResolución 2674/2013. BPM: El azúcar blanco especial debe ser procesado bajo las buenas prácticas de Manufactura según lo establecido por la legislación nacional vigente.								\r\nEl azúcar blanco especial no debe exceder los limites máximo permitido de plaguicidas establecidos en la legislación nacional vigente o en su defecto en el Codex Alimentarius								\r\nResolución 5109/2005: Rotulado de alimentos y además de lo establecido en la legislación nacional vigente, el rótulo o etiqueta debe cumplir con los requisito establecidos en la NTC 512- 1, en lo referente al rotulado general de alimentos y NTC 512-2, en lo referente al rotulado nutricional de alimentos. En las entregas a granel, los requisitos sobre el rótulo deben estar indicado en las planillas de remisión. Resolución 16379/2003 Control Metrológico del contenido de producto en preempacados								\r\nDecreto 60/2002 - Aplicación del Sistema de Análisis de Peligros y Puntos de Control Crítico - Haccp en las fábricas de alimentos y se reglamenta el proceso de certificación.  								\r\nResolución 333/2011 Reglamento técnico sobre los requisitos de rotulado o etiquetado nutricional que deben cumplir los alimentos envasados								\r\nResolución 4506/2013 Niveles máximos de contaminantes en los alimentos destinados al consumo humano.								\r\nResolución 2674/2013 Reglamentación de los alimentos que se fabriquen, envasen o importen para comercialización en Colombia.								\r\nResolución 4143 - Requisitos sanitarios que deben cumplir lo materiales, objetos, envases y equipamientos plásticos y elastómeros y sus aditivos, destinados a entrar en contacto con alimentos y bebidas para consumo humano en el territorio nacional. 								\r\nResolución 683/2012 - Reglamento Técnico sobre los requisitos sanitarios que deben cumplir los materiales, objetos, envases y equipamientos destinados a entrar en contacto con alimentos y bebidas para consumo humano.								\r\nDeclaración No-GMO: El producto no está fabricado ni contiene ingredientes o materiales que hayan sido genéticamente modificados.								\r\nDeclaración de radiactividad / irradiación: los ingredientes o materias primas y  productos terminados no son tratados por irradiación.', 'Es un producto para consumo directo doméstico o para uso industrial como materia prima. El producto se dirige al público en general, por tanto puede ser consumido por población de alto riesgo, excepto por personas que por indicación médica deban restringir o evitar el consumo de este producto debido a su componente alérgeno (Pacientes con asma) y población con diabetes.', 'Lesiones traumáticas (Laceración y perforación de tejidos de la boca, lengua, garganta, estomago e intestino) por presencia de Partículas Ferrosas, No Ferrosas e Inoxidables en tamaño de partícula mayor a 4,5 mm en Sacos 25 kg y 50 kg y en sacos de 1000kg un tamaño de partícula mayor a 2,5 mm se tienen controles de Rejillas magnéticas y detectores de metales', 'Contaminación microbiológica. Nuestro proceso cuenta con el cumplimiento de BPM y un programa de limpieza y Sanitización el cual establece un conjunto de lineamientos de cada área del proceso para garantizar la calidad microbiológica, fisicoquímica y sanitaria del producto terminado, mediante la eliminación o disminución a un mínimo aceptable de los riesgos de inocuidad identificados en el personal, equipos, planta física y ambiente que integran el proceso productivo.', 'Alergias, enfermedades de piel o enfermedades respiratorias por presencia de Alérgenos (Sulfitos) en concentración mayor o igual a 10 ppm en producto terminado. Nuestro proceso esta monitoreado permanentemente para garantizar que nuestros azúcares no contengan niveles superiores a la norma. Metales pesados con valores superiores a la norma', 'SACO POLIPROPILENO CON BOLSA INTERNA DE POLIETILENO. CAPACIDAD 50 KILOGRAMOS			SACO POLIPROPILENO CON BOLSA INTERNA DE POLIETILENO. CAPACIDAD 25 KILOGRAMOS			SACO POLIPROPILENO CON BOLSA INTERNA DE POLIETILENO POR 1 TONELADA', 1, 8),
(12, 'NTC 2085:2020', 'Descripción del producto:', 'Composición:', '', '', '', '', '', '', '', '', '', '', '11. Presentaciones disponibles', 1, 7),
(13, 'NTC 2085:2020', 'Descripción del producto:', 'Composición:', 'Vida útil prevista y condiciones de almacenamiento\r\nVida útil estima', 'Condiciones de manejo/almacenamiento:', '5. Envase y embalaje\r\nEnvase y embalaje:', '6.Uso y 7.Método(s)\r\nEtiquetado e instrucciones para manipulación preparación y uso:', 'Método(s) de distribución y entrega:', 'Requisitos legales y reglamentarios:', '9. Uso previsto\r\nManipulación Esperada:', '. Riesgo de inocuidad alimentaria\r\nRiesgo Físico:', 'Riesgo Biológico:', 'Riesgo Biológico:\r\nRiesgo Químico:', '11. Presentaciones disponibles', 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_plane_planeacion_tipo_car`
--

CREATE TABLE `tbl_plane_planeacion_tipo_car` (
  `id_tipo` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unidad` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maximo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metodo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_cataa` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_pla_control` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_plane_planeacion_tipo_car`
--

INSERT INTO `tbl_plane_planeacion_tipo_car` (`id_tipo`, `nombre`, `unidad`, `minimo`, `maximo`, `metodo`, `tipo_cataa`, `fk_pla_control`) VALUES
(13, 'Humedad', 'Fracción en masa; en %', '', '0,06', 'NTC 572', 'quimica', 7),
(14, 'Cenizas conductimétricas', 'Fracción en masa; en %', '', '0,1', 'ICUMSA GS2/3-23 o ICUMSA GS2/3/9-25 o ICUMSA GS2-51; AOAC 952.13 o AOAC 986.15 y para evitar pérdidas de analito, la digestión por microondas (AOAC 999.10), aunque la digestión por Kjeldahl es muy utilizada en alimentos;', 'quimica', 7),
(54, 'Química:', 'Unidad:', 'Mínimo:', 'Máximo:', '', 'quimica', 13),
(55, 'fisica', 'fisica_uniidad', 'fisica_minimo', 'fisica_maximo', 'fisica_metodo', 'fisica', 13),
(56, 'Biológia_', 'Biológia_Unidad:', 'Biológia_Mínimo', 'Biológia_Máximo:', 'Biológia_Método de Ensayo:', 'biologia', 13),
(57, 'Sensoriales_', 'Sensoriales_Especificaciones Y/O Tolerancias:', '', '', 'Sensoriales_Método de Ensayo:', 'sensorial', 13),
(58, 'Sensorial2', 'Sensoriales_Especificaciones Y/O Tolerancias:', '', '', 'Sensoriales_Unidad:', 'sensorial', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_plane_planificacion`
--

CREATE TABLE `tbl_plane_planificacion` (
  `id_planeacion` int(10) UNSIGNED NOT NULL,
  `proceso` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `variable` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unidad` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `li` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lc` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ls` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `control` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operacion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frecuencia` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metodo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `registro` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instrumento` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seguimiento` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_empresa` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_plane_planificacion`
--

INSERT INTO `tbl_plane_planificacion` (`id_planeacion`, `proceso`, `material`, `variable`, `unidad`, `li`, `lc`, `ls`, `control`, `operacion`, `frecuencia`, `metodo`, `registro`, `instrumento`, `seguimiento`, `bool_estado`, `fk_empresa`) VALUES
(4, 'gestión Gerencial', 'Jugo Mezclado', 'Insolubles', '%', '85', '', '', 'Grafico de seguimiento', 'Brequero', '1 / turno', 'Método 7', 'Brequero', 'Balanza AR2140 Horno Binder', 'GRAFICO DE CONTROL   (F-CAL-V-06)', 1, 13),
(5, 'Mantenimiento', 'Jugo Mezclado', 'Pureza', '%', '85', '', '', 'Grafico de seguimiento', 'Brequero', 'Diaria c/hora', '', 'Brequero', 'Formula (pol / brix)', 'GRAFICO DE CONTROL   (F-CAL-V-06)', 1, 13),
(6, 'Gestión Logística', '', 'Variable', 'Unidad', '', '', '', 'Control', 'Responsable', 'Frecuencia de Medición', '', '', '', 'Registro de Seguimiento', 1, 13),
(7, 'Mantenimiento', 'Material', 'Variable', 'Unidad', '85', '1.1', '0.080', 'Control', 'Responsable', 'Frecuencia de Medición', 'Control', 'Registro', 'Instrumento de Medición', 'Registro de Seguimiento', 1, 13),
(8, 'Producción y Suministro', '', 'SDF', 'Unidad', '85', '', '', 'SDF', 'SFD', 'SDF', '', '', '', 'SDF', 0, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_plane_producto_servicio`
--

CREATE TABLE `tbl_plane_producto_servicio` (
  `id_pro_servicio` int(10) UNSIGNED NOT NULL,
  `calidad_n1` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calidad_n2` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ambiental_n1` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ambiental_n2` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sst_n1` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sst_n2` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inocuidad_n1` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inocuidad_n2` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `basic_n1` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `basic_n2` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `compra` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transporte` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recibo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `almacenamiento` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uso` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `final` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_insumo` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_plane_producto_servicio`
--

INSERT INTO `tbl_plane_producto_servicio` (`id_pro_servicio`, `calidad_n1`, `calidad_n2`, `ambiental_n1`, `ambiental_n2`, `sst_n1`, `sst_n2`, `inocuidad_n1`, `inocuidad_n2`, `basic_n1`, `basic_n2`, `compra`, `transporte`, `recibo`, `almacenamiento`, `uso`, `final`, `bool_estado`, `fk_insumo`) VALUES
(1, 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 1, 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_plane_trazabilidad`
--

CREATE TABLE `tbl_plane_trazabilidad` (
  `id_trazabilidad` int(10) UNSIGNED NOT NULL,
  `fecha_trazabilidad` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terminado` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cliente_destino` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orden_compra` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orden_produccion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_produccion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unidades` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materias` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utilizados` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utilizados_lotes` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provedor_materias` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destino_producto` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_entrega` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad_entrega` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entrega` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones_trazabilidad` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_empresa` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_plane_trazabilidad`
--

INSERT INTO `tbl_plane_trazabilidad` (`id_trazabilidad`, `fecha_trazabilidad`, `terminado`, `cliente_destino`, `orden_compra`, `orden_produccion`, `fecha_produccion`, `unidades`, `materias`, `utilizados`, `utilizados_lotes`, `provedor_materias`, `cantidad`, `destino_producto`, `fecha_entrega`, `cantidad_entrega`, `entrega`, `observaciones_trazabilidad`, `bool_estado`, `fk_empresa`) VALUES
(1, '2021-04-02', 'Identificación producto/servicio terminado:', 'Cliente destino:', 'Orden de compra/servicio', 'Orden de producción/servicio', '2021-04-10', 'Unidades o servicios producidos:', '', 'Materias Primas o Insumos Utilizados:', 'Identificación de Materias primas o Insumos utilizados (lote / Serie / N°)', 'Proveedor de Materias primas o Insumos utilizados:', '150', 'Destino del producto:', '2021-04-10', '150', 'Empresa o Persona que entrega el producto/servicio:', '$consulta->observaciones_trazabilidad', 1, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pla_cambio`
--

CREATE TABLE `tbl_pla_cambio` (
  `id_cambio` int(11) UNSIGNED NOT NULL,
  `fecha_cambio` date NOT NULL,
  `cambio_interno` tinyint(1) NOT NULL,
  `cambio_externo` tinyint(1) NOT NULL,
  `otro_interno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otro_externo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actividad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsable` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiempo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recursos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seguimiento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validad` tinyint(1) NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_proceso` int(10) UNSIGNED NOT NULL,
  `fk_usuario` int(11) NOT NULL,
  `fk_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_pla_cambio`
--

INSERT INTO `tbl_pla_cambio` (`id_cambio`, `fecha_cambio`, `cambio_interno`, `cambio_externo`, `otro_interno`, `otro_externo`, `actividad`, `responsable`, `tiempo`, `recursos`, `seguimiento`, `validad`, `bool_estado`, `fk_proceso`, `fk_usuario`, `fk_cargo`) VALUES
(1, '2021-03-25', 1, 1, 'sdf', 'sdf', 'sdf', 'sdf', 'sdf', 'sdf', 'sdf', 2, 0, 50, 6, 10),
(2, '2021-03-25', 1, 1, '', '', 'Actividad:', 'Responsable y dependencia:', 'Tiempo a emplear:', 'Recursos necesarios:', 'Seguimiento:', 1, 1, 50, 6, 10),
(3, '2021-02-16', 1, 1, '', '', 'Actividad:2', 'Responsable y dependencia:2', 'Tiempo a emplear:2', 'Recursos necesarios:2', 'Seguimiento:2', 2, 1, 50, 6, 11),
(5, '2021-03-25', 2, 2, '', '', 'Actividad:', 'Responsable y dependencia:', 'Tiempo a emplear:', 'Recursos necesarios:', 'Seguimiento:', 2, 1, 50, 6, 10),
(6, '2021-03-25', 1, 1, '', '', 'Actividad:', 'Responsable y dependencia:', 'Tiempo a emplear:', 'Recursos necesarios:', 'Seguimiento:', 1, 1, 50, 6, 10),
(7, '2021-03-03', 1, 1, '', '', 'Actividad:', 'Responsable y dependencia:', 'Tiempo a emplear:', 'Recursos necesarios:', 'Seguimiento:', 1, 1, 50, 6, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pla_gestion_cambio`
--

CREATE TABLE `tbl_pla_gestion_cambio` (
  `id_riesgo` int(11) NOT NULL,
  `fk_gestion` int(10) UNSIGNED NOT NULL,
  `fk_cambio` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_pla_gestion_cambio`
--

INSERT INTO `tbl_pla_gestion_cambio` (`id_riesgo`, `fk_gestion`, `fk_cambio`) VALUES
(6, 10, 7),
(7, 12, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pla_matriz_riesgo`
--

CREATE TABLE `tbl_pla_matriz_riesgo` (
  `id_riesgo` int(11) NOT NULL,
  `nom_causa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_proceso` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_pla_matriz_riesgo`
--

INSERT INTO `tbl_pla_matriz_riesgo` (`id_riesgo`, `nom_causa`, `bool_estado`, `fk_proceso`) VALUES
(1, 'Los cambios en normas ISO 9001 e ISO 14001 a versión 2020', 1, 50),
(2, 'Respuesta de quejas y reclamos', 1, 50),
(3, 'asdf', 1, 1),
(4, 'Hallazgos mayores o menores  en auditorias por casos repetitivos', 1, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pla_politica_objetivo`
--

CREATE TABLE `tbl_pla_politica_objetivo` (
  `id_politica_objetivo` int(10) UNSIGNED NOT NULL,
  `integrada` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_objetivos` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indicador` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unidad` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frecuencia` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `directrices` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mejor` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actividad` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recurso` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_finilizacion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `evaluacion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_politica` int(10) UNSIGNED NOT NULL,
  `fk_proceso` int(10) UNSIGNED NOT NULL,
  `fk_cargo` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_pla_politica_objetivo`
--

INSERT INTO `tbl_pla_politica_objetivo` (`id_politica_objetivo`, `integrada`, `nom_objetivos`, `indicador`, `unidad`, `frecuencia`, `directrices`, `mejor`, `meta`, `actividad`, `recurso`, `fecha_finilizacion`, `evaluacion`, `bool_estado`, `fk_politica`, `fk_proceso`, `fk_cargo`) VALUES
(27, 'Lograr el presupuesto del año vigente', 'Cumplimiento de presupuesto del margen de utilidad', '%', '80', 'mensual', 'Asegurar la generación de valor, comunicación efectiva y la mejora continua.', 'arriba', '75', 'Incrementar la atracción de inversionistas nacionales y del exterior', 'presupuesto', '2021-03-01', 'Verificación de cumplimiento indicador Margen Utilidad', 1, 5, 50, 10),
(28, 'Política Integrada:', 'Objetivos', 'Meta Indicador:', 'Unidad:', 'Frecuencia:', 'Directrices Política Integrada:', 'Mejor hacia:', '', 'Actividades Objetivos:', 'Recurso', '2021-03-25', 'Evaluación Resultados:', 1, 5, 50, 10),
(29, 'Política Integrada:', 'Objetivos:', 'Indicador:', 'Unidad:', 'Frecuencia:', 'Directrices Política Integrada:', 'Mejor hacia:', 'Meta Indicador:', 'Actividades Objetivos:', 'Recursos:', '2021-03-25', 'Evaluación Resultados:', 0, 5, 50, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pla_riesgo_oportuno`
--

CREATE TABLE `tbl_pla_riesgo_oportuno` (
  `id_riesgo_opurtuno` int(11) NOT NULL,
  `nom_posivito` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_riesgo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_negativo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `control` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `probabilidad` tinyint(1) NOT NULL,
  `impacto` tinyint(1) NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `ree_probabilidad` int(1) NOT NULL,
  `ree_impacto` int(1) NOT NULL,
  `nom_accion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_responsable` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_indicador` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fk_riesgo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_pla_riesgo_oportuno`
--

INSERT INTO `tbl_pla_riesgo_oportuno` (`id_riesgo_opurtuno`, `nom_posivito`, `nom_riesgo`, `nom_negativo`, `control`, `probabilidad`, `impacto`, `bool_estado`, `ree_probabilidad`, `ree_impacto`, `nom_accion`, `nom_responsable`, `nom_indicador`, `fk_riesgo`) VALUES
(1, 'Efectos positivos:', 'Riesgo negativo:', 'Efectos negativos:', 'Control', 3, 2, 1, 2, 3, 'Acciones', 'Responsable', 'Indicador', 1),
(2, 'Efectos positivos:', 'Riesgo negativo:', 'Efectos negativos:', 'Controles:', 2, 2, 1, 2, 2, 'Acciones:', 'Responsable:', 'Indicador:', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pla_rie_opor_reevaluacion`
--

CREATE TABLE `tbl_pla_rie_opor_reevaluacion` (
  `id_rie_opu_reevaluacion` int(11) NOT NULL,
  `ree_probabilidad` tinyint(1) NOT NULL,
  `ree_impacto` tinyint(1) NOT NULL,
  `nom_accion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_responsable` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_indicador` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bool_estado` tinyint(1) NOT NULL DEFAULT 1,
  `fk_riesgo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_pla_rie_opor_reevaluacion`
--

INSERT INTO `tbl_pla_rie_opor_reevaluacion` (`id_rie_opu_reevaluacion`, `ree_probabilidad`, `ree_impacto`, `nom_accion`, `nom_responsable`, `nom_indicador`, `bool_estado`, `fk_riesgo`) VALUES
(1, 0, 0, 'asd', 'asd', 'asd', 1, 2),
(2, 0, 0, '', '', '', 1, 1),
(3, 0, 0, '', '', '', 1, 1);

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
(4, '<p>POL&Iacute;TICA INTEGRIDA SISTEMAS DE GESTI&Oacute;N</p>', 12, '2021-03-19 16:56:06', '2021-03-19 16:56:06'),
(5, '<p>POL&Iacute;TICA INTEGRIDA SISTEMAS DE GESTI&Oacute;N</p>', 13, '2021-03-25 20:16:42', '2021-04-09 00:06:31');

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
(44, 'Procesos Misionales', 'Proceso 1', 'P', 3, 'Proceso 1 de..', 10, '2021-03-20 13:57:13', '2021-03-20 13:57:13', 1),
(45, 'Procesos Gerenciales', 'gestión Gerencial', 'GG', 6, 'gestión Gerencial ..', 13, '2021-03-24 14:46:32', '2021-03-24 14:46:32', 1),
(46, 'Procesos Gerenciales', 'gestión financiera', 'GF', 6, 'gestión financiera..', 13, '2021-03-24 14:46:58', '2021-03-24 14:46:58', 1),
(47, 'Procesos Gerenciales', 'Gestión comercial', 'GC', 6, 'Gestión comercial..', 13, '2021-03-24 14:47:24', '2021-03-24 14:47:24', 1),
(48, 'Procesos Misionales', 'Producción y Suministro', 'PS', 6, 'Producción y Suministro..', 13, '2021-03-24 14:48:10', '2021-03-24 14:48:10', 1),
(49, 'Procesos de Apoyo', 'Mantenimiento', 'M', 6, 'Mantenimiento', 13, '2021-03-24 14:48:48', '2021-03-24 14:48:48', 1),
(50, 'Procesos de Apoyo', 'Gestión Logística', 'GL', 6, 'Gestión Logística..', 13, '2021-03-24 14:49:12', '2021-03-24 14:49:12', 1);

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
(44, 3),
(45, 6),
(46, 6),
(47, 6),
(48, 6),
(49, 6),
(50, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_producto`
--

CREATE TABLE `tbl_producto` (
  `id_producto` int(11) UNSIGNED NOT NULL,
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
(5, 2, 'Producto 3', 'Radicación SIC.png', 0, '2020-09-27 21:32:05', '2020-09-27 21:39:29'),
(6, 13, 'Nescafé', 'cafe-nescafe-clasico_f.jpg', 1, '2021-03-31 20:23:45', '2021-03-31 20:23:45'),
(7, 13, 'Sello rojo', 'images (1).jpg', 1, '2021-03-31 20:24:04', '2021-03-31 20:24:04'),
(8, 13, 'Café Royal', 'Café Royal.jpg', 1, '2021-03-31 20:24:53', '2021-03-31 20:24:53');

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
(10, 3.00, 1, 21, '2021-03-20 15:47:59', '2021-03-23 13:17:33');

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
(21, 'Mundo .com', 'Pasto', '23132154', '3218618007', 1, 11, '2021-03-20 15:19:58', '2021-03-20 15:19:58'),
(22, 'Pasto Pro', 'Pasto', '108111111', '3218618007', 1, 13, '2021-04-06 17:24:13', '2021-04-06 17:24:13');

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
(9, 'Sistema de Gestion Comercio', 'SGC', 'Sistema de Gestion Comercio', 10, '2021-03-13 01:17:24', '2021-03-13 01:17:24', 1),
(10, 'CRM', 'CRM', 'CRM-.', 13, '2021-03-25 01:48:25', '2021-03-25 01:48:25', 1),
(11, 'ORACLE', 'O', '.', 13, '2021-03-25 01:49:21', '2021-03-25 01:49:21', 1),
(12, 'SAP', 'SAP', 'a', 13, '2021-03-25 01:49:59', '2021-03-25 01:49:59', 1),
(13, 'Gestión  Financiera', 'GF', 'Gestión  Financiera...', 13, '2021-04-07 18:35:16', '2021-04-07 18:35:16', 1);

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
(27, 9),
(45, 10),
(47, 11),
(49, 12),
(45, 13);

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
(3, 'canver', 'canver@gmail.com', NULL, '$2y$10$MgWhYNwz7NygKI6RRg0AquSHogptflv16iTa5BggWy3cBGa3K2qA2', 12, '8TLVUNpd1rzQwW2bbKkg6Zz2i6wt2fsMkHEaNxsF2O3A3zg8Oly2oGP7uSLl', '2021-03-12 23:24:15', '2021-03-18 20:39:31'),
(6, 'canver', 'canver-19@hotmail.com', NULL, '$2y$10$zYUW81h10HoH0UDhJP9Q/O7DnxOpOVeGKwg.bg3cOUajNlAIr/DF6', 13, 'qRZqZsDOLCyzIBOsryBmiRjn3kbNyqFl4923Cy73sJGurzPneh1bjHEySa03', '2021-03-20 14:41:11', '2021-03-20 14:49:51'),
(11, 'Mario', 'mario@gmail.com', NULL, '$2y$10$H/SM8TITRpUGLtwcfxI/z.JwiEFPmVOuiuLriii.i8qBtQvjGtHZm', 12, NULL, '2021-03-24 14:30:55', '2021-03-24 14:30:55');

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
-- Indices de la tabla `tbl_apo_competencia`
--
ALTER TABLE `tbl_apo_competencia`
  ADD PRIMARY KEY (`id_competencia`),
  ADD KEY `fk_empresa` (`fk_empresa`);

--
-- Indices de la tabla `tbl_apo_comunicaciones`
--
ALTER TABLE `tbl_apo_comunicaciones`
  ADD PRIMARY KEY (`id_comunicaciones`),
  ADD KEY `tbl_apo_comunicaciones_ibfk_1` (`fk_empresa`);

--
-- Indices de la tabla `tbl_apo_com_rendiciones`
--
ALTER TABLE `tbl_apo_com_rendiciones`
  ADD PRIMARY KEY (`id_rendiciones`);

--
-- Indices de la tabla `tbl_apo_informacion`
--
ALTER TABLE `tbl_apo_informacion`
  ADD PRIMARY KEY (`id_informacion`),
  ADD KEY `tbl_apo_informacion_fk_empresa_foreign` (`fk_empresa`);

--
-- Indices de la tabla `tbl_apo_recursos`
--
ALTER TABLE `tbl_apo_recursos`
  ADD PRIMARY KEY (`id_recurso`),
  ADD KEY `tbl_apo_recursosreevaluacion_fk_empresa_foreign` (`fk_empresa`);

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
-- Indices de la tabla `tbl_contexto_estrategia`
--
ALTER TABLE `tbl_contexto_estrategia`
  ADD PRIMARY KEY (`id_estrategia`),
  ADD KEY `fk_empresa` (`fk_empresa`);

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
-- Indices de la tabla `tbl_eva_revision`
--
ALTER TABLE `tbl_eva_revision`
  ADD PRIMARY KEY (`id_revision`),
  ADD KEY `fk_empresa` (`fk_empresa`);

--
-- Indices de la tabla `tbl_eva_revision_users`
--
ALTER TABLE `tbl_eva_revision_users`
  ADD PRIMARY KEY (`id_revision_user`),
  ADD KEY `fk_revision` (`fk_revision`),
  ADD KEY `fk_user` (`fk_user`),
  ADD KEY `fk_cargor` (`fk_cargor`);

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
-- Indices de la tabla `tbl_lid_responsabilidades`
--
ALTER TABLE `tbl_lid_responsabilidades`
  ADD PRIMARY KEY (`id_responsabilidades`),
  ADD KEY `tbl_lid_responsabilidades_fk_roles_res_foreign` (`fk_roles_res`);

--
-- Indices de la tabla `tbl_lid_roles_cargos`
--
ALTER TABLE `tbl_lid_roles_cargos`
  ADD PRIMARY KEY (`id_roles_cargo`),
  ADD KEY `tbl_lid_roles_cargos_fk_roles_res_foreign` (`fk_roles_res`),
  ADD KEY `tbl_lid_roles_cargos_fk_cargos_foreign` (`fk_cargo`);

--
-- Indices de la tabla `tbl_lid_roles_responsabilidades`
--
ALTER TABLE `tbl_lid_roles_responsabilidades`
  ADD PRIMARY KEY (`id_rol_res`),
  ADD KEY `tbl_lid_roles_responsabilidades_fk_empresa_foreign` (`fk_empresa`);

--
-- Indices de la tabla `tbl_mejora_anomalia`
--
ALTER TABLE `tbl_mejora_anomalia`
  ADD PRIMARY KEY (`id_anomalia`),
  ADD KEY `tbl_mejora_anomalia_fk_empresa_foreign` (`fk_empresa`);

--
-- Indices de la tabla `tbl_mejo_acta`
--
ALTER TABLE `tbl_mejo_acta`
  ADD PRIMARY KEY (`id_acta`),
  ADD KEY `fk_empresa` (`fk_empresa`);

--
-- Indices de la tabla `tbl_mejo_acta_asistente`
--
ALTER TABLE `tbl_mejo_acta_asistente`
  ADD PRIMARY KEY (`id_asistente`),
  ADD KEY `fk_acta` (`fk_acta`);

--
-- Indices de la tabla `tbl_mejo_acta_temas`
--
ALTER TABLE `tbl_mejo_acta_temas`
  ADD PRIMARY KEY (`id_tema`),
  ADD KEY `fk_acta` (`fk_acta`);

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
-- Indices de la tabla `tbl_plane_auditoria`
--
ALTER TABLE `tbl_plane_auditoria`
  ADD PRIMARY KEY (`id_auditoria`),
  ADD KEY `fk_cargo` (`fk_cargo`);

--
-- Indices de la tabla `tbl_plane_auditoria_chequeo`
--
ALTER TABLE `tbl_plane_auditoria_chequeo`
  ADD PRIMARY KEY (`id_chequeo`),
  ADD KEY `fk_proceso` (`fk_proceso`);

--
-- Indices de la tabla `tbl_plane_auditoria_che_sis_gestion`
--
ALTER TABLE `tbl_plane_auditoria_che_sis_gestion`
  ADD PRIMARY KEY (`id_che_sisgestion`),
  ADD KEY `fk_sisgestion` (`fk_sisgestion`),
  ADD KEY `fk_audchequeo` (`fk_audchequeo`);

--
-- Indices de la tabla `tbl_plane_auditoria_foropur`
--
ALTER TABLE `tbl_plane_auditoria_foropur`
  ADD PRIMARY KEY (`id_foropur`),
  ADD KEY `fk_usuario` (`fk_usuario`),
  ADD KEY `fk_proceso` (`fk_proceso`);

--
-- Indices de la tabla `tbl_plane_auditoria_foropur_gestion`
--
ALTER TABLE `tbl_plane_auditoria_foropur_gestion`
  ADD PRIMARY KEY (`id_foropur_gestion`),
  ADD KEY `fk_sisgestion` (`fk_sisgestion`),
  ADD KEY `fk_foropur` (`fk_foropur`);

--
-- Indices de la tabla `tbl_plane_auditoria_hallazgos`
--
ALTER TABLE `tbl_plane_auditoria_hallazgos`
  ADD PRIMARY KEY (`id_hallazgos`),
  ADD KEY `fk_empresa` (`fk_empresa`);

--
-- Indices de la tabla `tbl_plane_auditoria_hallazgos_gestion`
--
ALTER TABLE `tbl_plane_auditoria_hallazgos_gestion`
  ADD PRIMARY KEY (`id_hallazgos_gestion`),
  ADD KEY `fk_sisgestion` (`fk_sisgestion`),
  ADD KEY `fk_hallazgos` (`fk_hallazgos`);

--
-- Indices de la tabla `tbl_plane_auditoria_multiples`
--
ALTER TABLE `tbl_plane_auditoria_multiples`
  ADD PRIMARY KEY (`id_multiple`),
  ADD KEY `fk_auditoria` (`fk_auditoria`);

--
-- Indices de la tabla `tbl_plane_diseño`
--
ALTER TABLE `tbl_plane_diseño`
  ADD PRIMARY KEY (`id_diseno`),
  ADD KEY `fk_empresa` (`fk_empresa`);

--
-- Indices de la tabla `tbl_plane_liberacion`
--
ALTER TABLE `tbl_plane_liberacion`
  ADD PRIMARY KEY (`id_liberacion`),
  ADD KEY `tbl_plane_liberacion_fk_producto` (`fk_producto`),
  ADD KEY `fk_cliente` (`fk_cliente`),
  ADD KEY `tbl_plane_liberacion_fk_empresa` (`fk_empresa`);

--
-- Indices de la tabla `tbl_plane_planeaciocontrol`
--
ALTER TABLE `tbl_plane_planeaciocontrol`
  ADD PRIMARY KEY (`id_pla_control`),
  ADD KEY `fk_producto` (`fk_producto`);

--
-- Indices de la tabla `tbl_plane_planeacion_tipo_car`
--
ALTER TABLE `tbl_plane_planeacion_tipo_car`
  ADD PRIMARY KEY (`id_tipo`),
  ADD KEY `fk_pla_control` (`fk_pla_control`);

--
-- Indices de la tabla `tbl_plane_planificacion`
--
ALTER TABLE `tbl_plane_planificacion`
  ADD PRIMARY KEY (`id_planeacion`),
  ADD KEY `fk_empresa` (`fk_empresa`);

--
-- Indices de la tabla `tbl_plane_producto_servicio`
--
ALTER TABLE `tbl_plane_producto_servicio`
  ADD PRIMARY KEY (`id_pro_servicio`),
  ADD KEY `fk_insumo` (`fk_insumo`);

--
-- Indices de la tabla `tbl_plane_trazabilidad`
--
ALTER TABLE `tbl_plane_trazabilidad`
  ADD PRIMARY KEY (`id_trazabilidad`),
  ADD KEY `fk_empresa` (`fk_empresa`);

--
-- Indices de la tabla `tbl_pla_cambio`
--
ALTER TABLE `tbl_pla_cambio`
  ADD PRIMARY KEY (`id_cambio`),
  ADD KEY `fk_proceso` (`fk_proceso`);

--
-- Indices de la tabla `tbl_pla_gestion_cambio`
--
ALTER TABLE `tbl_pla_gestion_cambio`
  ADD PRIMARY KEY (`id_riesgo`),
  ADD KEY `fk_cambio` (`fk_cambio`),
  ADD KEY `tbl_pla_gestion_cambio_ibfk_2` (`fk_gestion`);

--
-- Indices de la tabla `tbl_pla_matriz_riesgo`
--
ALTER TABLE `tbl_pla_matriz_riesgo`
  ADD PRIMARY KEY (`id_riesgo`),
  ADD KEY `tbl_pla_matriz_riesgo_fk_proceso_foreign` (`fk_proceso`);

--
-- Indices de la tabla `tbl_pla_politica_objetivo`
--
ALTER TABLE `tbl_pla_politica_objetivo`
  ADD PRIMARY KEY (`id_politica_objetivo`),
  ADD KEY `tbl_pla_politica_objetivo_fk_politica_foreign` (`fk_politica`),
  ADD KEY `tbl_pla_politica_objetivo_fk_proceso_foreign` (`fk_proceso`);

--
-- Indices de la tabla `tbl_pla_riesgo_oportuno`
--
ALTER TABLE `tbl_pla_riesgo_oportuno`
  ADD PRIMARY KEY (`id_riesgo_opurtuno`),
  ADD KEY `tbl_pla_riesgo_oportuno_fk_riesgo_foreign` (`fk_riesgo`);

--
-- Indices de la tabla `tbl_pla_rie_opor_reevaluacion`
--
ALTER TABLE `tbl_pla_rie_opor_reevaluacion`
  ADD PRIMARY KEY (`id_rie_opu_reevaluacion`),
  ADD KEY `tbl_pla_rie_opor_reevaluacion_fk_riesgo_foreign` (`fk_riesgo`);

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
-- AUTO_INCREMENT de la tabla `tbl_apo_competencia`
--
ALTER TABLE `tbl_apo_competencia`
  MODIFY `id_competencia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_apo_comunicaciones`
--
ALTER TABLE `tbl_apo_comunicaciones`
  MODIFY `id_comunicaciones` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `tbl_apo_com_rendiciones`
--
ALTER TABLE `tbl_apo_com_rendiciones`
  MODIFY `id_rendiciones` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `tbl_apo_informacion`
--
ALTER TABLE `tbl_apo_informacion`
  MODIFY `id_informacion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `tbl_apo_recursos`
--
ALTER TABLE `tbl_apo_recursos`
  MODIFY `id_recurso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `tbl_areas`
--
ALTER TABLE `tbl_areas`
  MODIFY `id_area` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tbl_cal_proveedor`
--
ALTER TABLE `tbl_cal_proveedor`
  MODIFY `id_cal_proveedor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tbl_cargos`
--
ALTER TABLE `tbl_cargos`
  MODIFY `id_cargo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id_dofa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbl_contexto_egresos`
--
ALTER TABLE `tbl_contexto_egresos`
  MODIFY `id_egreso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tbl_contexto_estrategia`
--
ALTER TABLE `tbl_contexto_estrategia`
  MODIFY `id_estrategia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_contexto_ingresos`
--
ALTER TABLE `tbl_contexto_ingresos`
  MODIFY `id_ingreso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `tbl_contexto_riesgos_oportunidades`
--
ALTER TABLE `tbl_contexto_riesgos_oportunidades`
  MODIFY `id_riesgos_oportunidades` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_contexto_tendencias_colombia`
--
ALTER TABLE `tbl_contexto_tendencias_colombia`
  MODIFY `id_tendencia_colombia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_correcciones_anomalias`
--
ALTER TABLE `tbl_correcciones_anomalias`
  MODIFY `id_correccion_anomalia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT de la tabla `tbl_eva_revision`
--
ALTER TABLE `tbl_eva_revision`
  MODIFY `id_revision` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_eva_revision_users`
--
ALTER TABLE `tbl_eva_revision_users`
  MODIFY `id_revision_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tbl_indicadores`
--
ALTER TABLE `tbl_indicadores`
  MODIFY `id_indicador` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_insumos`
--
ALTER TABLE `tbl_insumos`
  MODIFY `id_insumo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `tbl_lid_responsabilidades`
--
ALTER TABLE `tbl_lid_responsabilidades`
  MODIFY `id_responsabilidades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tbl_lid_roles_cargos`
--
ALTER TABLE `tbl_lid_roles_cargos`
  MODIFY `id_roles_cargo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tbl_lid_roles_responsabilidades`
--
ALTER TABLE `tbl_lid_roles_responsabilidades`
  MODIFY `id_rol_res` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `tbl_mejora_anomalia`
--
ALTER TABLE `tbl_mejora_anomalia`
  MODIFY `id_anomalia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_mejo_acta`
--
ALTER TABLE `tbl_mejo_acta`
  MODIFY `id_acta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tbl_mejo_acta_asistente`
--
ALTER TABLE `tbl_mejo_acta_asistente`
  MODIFY `id_asistente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `tbl_mejo_acta_temas`
--
ALTER TABLE `tbl_mejo_acta_temas`
  MODIFY `id_tema` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
-- AUTO_INCREMENT de la tabla `tbl_plane_auditoria`
--
ALTER TABLE `tbl_plane_auditoria`
  MODIFY `id_auditoria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_plane_auditoria_chequeo`
--
ALTER TABLE `tbl_plane_auditoria_chequeo`
  MODIFY `id_chequeo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_plane_auditoria_che_sis_gestion`
--
ALTER TABLE `tbl_plane_auditoria_che_sis_gestion`
  MODIFY `id_che_sisgestion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tbl_plane_auditoria_foropur`
--
ALTER TABLE `tbl_plane_auditoria_foropur`
  MODIFY `id_foropur` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_plane_auditoria_foropur_gestion`
--
ALTER TABLE `tbl_plane_auditoria_foropur_gestion`
  MODIFY `id_foropur_gestion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tbl_plane_auditoria_hallazgos`
--
ALTER TABLE `tbl_plane_auditoria_hallazgos`
  MODIFY `id_hallazgos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_plane_auditoria_hallazgos_gestion`
--
ALTER TABLE `tbl_plane_auditoria_hallazgos_gestion`
  MODIFY `id_hallazgos_gestion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tbl_plane_auditoria_multiples`
--
ALTER TABLE `tbl_plane_auditoria_multiples`
  MODIFY `id_multiple` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_plane_diseño`
--
ALTER TABLE `tbl_plane_diseño`
  MODIFY `id_diseno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_plane_liberacion`
--
ALTER TABLE `tbl_plane_liberacion`
  MODIFY `id_liberacion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_plane_planeaciocontrol`
--
ALTER TABLE `tbl_plane_planeaciocontrol`
  MODIFY `id_pla_control` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tbl_plane_planeacion_tipo_car`
--
ALTER TABLE `tbl_plane_planeacion_tipo_car`
  MODIFY `id_tipo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `tbl_plane_planificacion`
--
ALTER TABLE `tbl_plane_planificacion`
  MODIFY `id_planeacion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_plane_producto_servicio`
--
ALTER TABLE `tbl_plane_producto_servicio`
  MODIFY `id_pro_servicio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_plane_trazabilidad`
--
ALTER TABLE `tbl_plane_trazabilidad`
  MODIFY `id_trazabilidad` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_pla_cambio`
--
ALTER TABLE `tbl_pla_cambio`
  MODIFY `id_cambio` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_pla_gestion_cambio`
--
ALTER TABLE `tbl_pla_gestion_cambio`
  MODIFY `id_riesgo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_pla_matriz_riesgo`
--
ALTER TABLE `tbl_pla_matriz_riesgo`
  MODIFY `id_riesgo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_pla_politica_objetivo`
--
ALTER TABLE `tbl_pla_politica_objetivo`
  MODIFY `id_politica_objetivo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `tbl_pla_riesgo_oportuno`
--
ALTER TABLE `tbl_pla_riesgo_oportuno`
  MODIFY `id_riesgo_opurtuno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_pla_rie_opor_reevaluacion`
--
ALTER TABLE `tbl_pla_rie_opor_reevaluacion`
  MODIFY `id_rie_opu_reevaluacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_politica`
--
ALTER TABLE `tbl_politica`
  MODIFY `id_politica` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_procesos`
--
ALTER TABLE `tbl_procesos`
  MODIFY `id_proceso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  MODIFY `id_producto` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_promedio_calificacion`
--
ALTER TABLE `tbl_promedio_calificacion`
  MODIFY `id_promedio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tbl_proveedor`
--
ALTER TABLE `tbl_proveedor`
  MODIFY `id_proveedor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `tbl_sistemas_gestion`
--
ALTER TABLE `tbl_sistemas_gestion`
  MODIFY `id_sisgestion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- Filtros para la tabla `tbl_apo_competencia`
--
ALTER TABLE `tbl_apo_competencia`
  ADD CONSTRAINT `tbl_apo_competencia_ibfk_1` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`);

--
-- Filtros para la tabla `tbl_apo_comunicaciones`
--
ALTER TABLE `tbl_apo_comunicaciones`
  ADD CONSTRAINT `tbl_apo_comunicaciones_ibfk_1` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_apo_recursos`
--
ALTER TABLE `tbl_apo_recursos`
  ADD CONSTRAINT `tbl_apo_recursosreevaluacion_fk_empresa_foreign` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `tbl_contexto_estrategia`
--
ALTER TABLE `tbl_contexto_estrategia`
  ADD CONSTRAINT `tbl_contexto_estrategia_ibfk_1` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `tbl_eva_revision`
--
ALTER TABLE `tbl_eva_revision`
  ADD CONSTRAINT `tbl_eva_revision_ibfk_1` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_eva_revision_users`
--
ALTER TABLE `tbl_eva_revision_users`
  ADD CONSTRAINT `tbl_eva_revision_users_ibfk_1` FOREIGN KEY (`fk_revision`) REFERENCES `tbl_eva_revision` (`id_revision`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_eva_revision_users_ibfk_2` FOREIGN KEY (`fk_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_eva_revision_users_ibfk_3` FOREIGN KEY (`fk_cargor`) REFERENCES `tbl_cargos` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `tbl_lid_responsabilidades`
--
ALTER TABLE `tbl_lid_responsabilidades`
  ADD CONSTRAINT `tbl_lid_responsabilidades_fk_roles_res_foreign` FOREIGN KEY (`fk_roles_res`) REFERENCES `tbl_lid_roles_responsabilidades` (`id_rol_res`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_lid_roles_cargos`
--
ALTER TABLE `tbl_lid_roles_cargos`
  ADD CONSTRAINT `tbl_lid_roles_cargos_fk_roles_res_foreign` FOREIGN KEY (`fk_roles_res`) REFERENCES `tbl_lid_roles_responsabilidades` (`id_rol_res`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_lid_roles_cargos_ibfk_1` FOREIGN KEY (`fk_cargo`) REFERENCES `tbl_cargos` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_lid_roles_responsabilidades`
--
ALTER TABLE `tbl_lid_roles_responsabilidades`
  ADD CONSTRAINT `tbl_lid_roles_responsabilidades_fk_empresa_foreign` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_mejora_anomalia`
--
ALTER TABLE `tbl_mejora_anomalia`
  ADD CONSTRAINT `tbl_mejora_anomalia_fk_empresa_foreign` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_mejo_acta`
--
ALTER TABLE `tbl_mejo_acta`
  ADD CONSTRAINT `tbl_mejo_acta_ibfk_1` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_mejo_acta_asistente`
--
ALTER TABLE `tbl_mejo_acta_asistente`
  ADD CONSTRAINT `tbl_mejo_acta_asistente_ibfk_1` FOREIGN KEY (`fk_acta`) REFERENCES `tbl_mejo_acta` (`id_acta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_mejo_acta_temas`
--
ALTER TABLE `tbl_mejo_acta_temas`
  ADD CONSTRAINT `tbl_mejo_acta_temas_ibfk_1` FOREIGN KEY (`fk_acta`) REFERENCES `tbl_mejo_acta` (`id_acta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_partei_master`
--
ALTER TABLE `tbl_partei_master`
  ADD CONSTRAINT `tbl_partei_master_fk_empresa_foreign` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_plane_auditoria`
--
ALTER TABLE `tbl_plane_auditoria`
  ADD CONSTRAINT `tbl_plane_auditoria_ibfk_1` FOREIGN KEY (`fk_cargo`) REFERENCES `tbl_cargos` (`id_cargo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_plane_auditoria_chequeo`
--
ALTER TABLE `tbl_plane_auditoria_chequeo`
  ADD CONSTRAINT `tbl_plane_auditoria_chequeo_ibfk_1` FOREIGN KEY (`fk_proceso`) REFERENCES `tbl_procesos` (`id_proceso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_plane_auditoria_che_sis_gestion`
--
ALTER TABLE `tbl_plane_auditoria_che_sis_gestion`
  ADD CONSTRAINT `tbl_plane_auditoria_che_sis_gestion_ibfk_1` FOREIGN KEY (`fk_sisgestion`) REFERENCES `tbl_sistemas_gestion` (`id_sisgestion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_plane_auditoria_che_sis_gestion_ibfk_2` FOREIGN KEY (`fk_audchequeo`) REFERENCES `tbl_plane_auditoria_chequeo` (`id_chequeo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_plane_auditoria_foropur`
--
ALTER TABLE `tbl_plane_auditoria_foropur`
  ADD CONSTRAINT `tbl_plane_auditoria_foropur_ibfk_1` FOREIGN KEY (`fk_usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_plane_auditoria_foropur_ibfk_2` FOREIGN KEY (`fk_proceso`) REFERENCES `tbl_procesos` (`id_proceso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_plane_auditoria_foropur_gestion`
--
ALTER TABLE `tbl_plane_auditoria_foropur_gestion`
  ADD CONSTRAINT `tbl_plane_auditoria_foropur_gestion_ibfk_1` FOREIGN KEY (`fk_sisgestion`) REFERENCES `tbl_sistemas_gestion` (`id_sisgestion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_plane_auditoria_foropur_gestion_ibfk_2` FOREIGN KEY (`fk_foropur`) REFERENCES `tbl_plane_auditoria_foropur` (`id_foropur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_plane_auditoria_hallazgos`
--
ALTER TABLE `tbl_plane_auditoria_hallazgos`
  ADD CONSTRAINT `tbl_plane_auditoria_hallazgos_ibfk_1` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_plane_auditoria_hallazgos_gestion`
--
ALTER TABLE `tbl_plane_auditoria_hallazgos_gestion`
  ADD CONSTRAINT `tbl_plane_auditoria_hallazgos_gestion_ibfk_1` FOREIGN KEY (`fk_sisgestion`) REFERENCES `tbl_sistemas_gestion` (`id_sisgestion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_plane_auditoria_hallazgos_gestion_ibfk_2` FOREIGN KEY (`fk_hallazgos`) REFERENCES `tbl_plane_auditoria_hallazgos` (`id_hallazgos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_plane_auditoria_multiples`
--
ALTER TABLE `tbl_plane_auditoria_multiples`
  ADD CONSTRAINT `tbl_plane_auditoria_multiples_ibfk_1` FOREIGN KEY (`fk_auditoria`) REFERENCES `tbl_plane_auditoria` (`id_auditoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_plane_diseño`
--
ALTER TABLE `tbl_plane_diseño`
  ADD CONSTRAINT `tbl_plane_diseño_ibfk_1` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_plane_liberacion`
--
ALTER TABLE `tbl_plane_liberacion`
  ADD CONSTRAINT `tbl_plane_liberacion_fk_empresa` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_plane_liberacion_fk_producto` FOREIGN KEY (`fk_producto`) REFERENCES `tbl_producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_plane_liberacion_ibfk_1` FOREIGN KEY (`fk_cliente`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_plane_planeaciocontrol`
--
ALTER TABLE `tbl_plane_planeaciocontrol`
  ADD CONSTRAINT `tbl_plane_planeaciocontrol_ibfk_1` FOREIGN KEY (`fk_producto`) REFERENCES `tbl_producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_plane_planeacion_tipo_car`
--
ALTER TABLE `tbl_plane_planeacion_tipo_car`
  ADD CONSTRAINT `tbl_plane_planeacion_tipo_car_ibfk_1` FOREIGN KEY (`fk_pla_control`) REFERENCES `tbl_plane_planeaciocontrol` (`id_pla_control`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_plane_planificacion`
--
ALTER TABLE `tbl_plane_planificacion`
  ADD CONSTRAINT `tbl_plane_planificacion_ibfk_1` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_plane_producto_servicio`
--
ALTER TABLE `tbl_plane_producto_servicio`
  ADD CONSTRAINT `tbl_plane_producto_servicio_ibfk_1` FOREIGN KEY (`fk_insumo`) REFERENCES `tbl_insumos` (`id_insumo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_plane_trazabilidad`
--
ALTER TABLE `tbl_plane_trazabilidad`
  ADD CONSTRAINT `tbl_plane_trazabilidad_ibfk_1` FOREIGN KEY (`fk_empresa`) REFERENCES `tbl_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_pla_cambio`
--
ALTER TABLE `tbl_pla_cambio`
  ADD CONSTRAINT `tbl_pla_cambio_ibfk_1` FOREIGN KEY (`fk_proceso`) REFERENCES `tbl_procesos` (`id_proceso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_pla_gestion_cambio`
--
ALTER TABLE `tbl_pla_gestion_cambio`
  ADD CONSTRAINT `tbl_pla_gestion_cambio_ibfk_1` FOREIGN KEY (`fk_cambio`) REFERENCES `tbl_pla_cambio` (`id_cambio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pla_gestion_cambio_ibfk_2` FOREIGN KEY (`fk_gestion`) REFERENCES `tbl_sistemas_gestion` (`id_sisgestion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_pla_matriz_riesgo`
--
ALTER TABLE `tbl_pla_matriz_riesgo`
  ADD CONSTRAINT `tbl_pla_matriz_riesgo_fk_proceso_foreign` FOREIGN KEY (`fk_proceso`) REFERENCES `tbl_procesos` (`id_proceso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_pla_politica_objetivo`
--
ALTER TABLE `tbl_pla_politica_objetivo`
  ADD CONSTRAINT `tbl_pla_politica_objetivo_fk_politica_foreign` FOREIGN KEY (`fk_politica`) REFERENCES `tbl_politica` (`id_politica`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pla_politica_objetivo_fk_proceso_foreign` FOREIGN KEY (`fk_proceso`) REFERENCES `tbl_procesos` (`id_proceso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_pla_riesgo_oportuno`
--
ALTER TABLE `tbl_pla_riesgo_oportuno`
  ADD CONSTRAINT `tbl_pla_riesgo_oportuno_fk_riesgo_foreign` FOREIGN KEY (`fk_riesgo`) REFERENCES `tbl_pla_matriz_riesgo` (`id_riesgo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_pla_rie_opor_reevaluacion`
--
ALTER TABLE `tbl_pla_rie_opor_reevaluacion`
  ADD CONSTRAINT `tbl_pla_rie_opor_reevaluacion_fk_riesgo_foreign` FOREIGN KEY (`fk_riesgo`) REFERENCES `tbl_pla_matriz_riesgo` (`id_riesgo`) ON DELETE CASCADE ON UPDATE CASCADE;

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
