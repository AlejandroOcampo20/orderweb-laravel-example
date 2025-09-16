-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.40 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para bd_order
CREATE DATABASE IF NOT EXISTS `bd_order` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bd_order`;

-- Volcando estructura para tabla bd_order.activity
CREATE TABLE IF NOT EXISTS `activity` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'descripción',
  `hours` int NOT NULL COMMENT 'horas de duración',
  `technician_id` bigint unsigned NOT NULL,
  `type_activity_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_technician_id_foreign` (`technician_id`),
  KEY `activity_type_activity_id_foreign` (`type_activity_id`),
  CONSTRAINT `activity_technician_id_foreign` FOREIGN KEY (`technician_id`) REFERENCES `technician` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `activity_type_activity_id_foreign` FOREIGN KEY (`type_activity_id`) REFERENCES `type_activity` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla bd_order.activity: ~5 rows (aproximadamente)
INSERT INTO `activity` (`id`, `description`, `hours`, `technician_id`, `type_activity_id`, `created_at`, `updated_at`) VALUES
	(1, 'Actividad de prueba 1', 8, 1, 1, NULL, NULL),
	(2, 'Actividad de prueba 2', 16, 1, 3, NULL, '2025-05-22 20:53:23'),
	(3, 'Suspender servicio de agua', 2, 6, 6, '2025-05-22 20:32:51', '2025-05-22 20:32:51'),
	(4, 'Yo no se que de contador', 2, 5, 6, '2025-06-03 17:53:14', '2025-06-03 17:53:14'),
	(5, 'Rompimiento', 1, 2, 2, '2025-06-03 18:27:28', '2025-06-03 18:27:39');

-- Volcando estructura para tabla bd_order.causal
CREATE TABLE IF NOT EXISTS `causal` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'descripción',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla bd_order.causal: ~5 rows (aproximadamente)
INSERT INTO `causal` (`id`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Reparación del contador', NULL, NULL),
	(2, 'Suspensión del servicio', NULL, NULL),
	(3, 'Reconexión del servicio', NULL, NULL),
	(4, 'Instalación del servicio', NULL, NULL),
	(7, 'prueba 3', '2025-05-20 22:13:11', '2025-05-27 22:47:57');

-- Volcando estructura para tabla bd_order.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla bd_order.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_order.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla bd_order.migrations: ~12 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_11_135857_create_role_table', 1),
	(2, '2014_10_12_000000_create_users_table', 1),
	(3, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(6, '2025_05_13_141644_create_causal_table', 1),
	(7, '2025_05_13_141658_create_observation_table', 1),
	(8, '2025_05_13_141709_create_type_activity_table', 1),
	(9, '2025_05_13_142319_create_technician_table', 1),
	(10, '2025_05_13_142332_create_activity_table', 1),
	(11, '2025_05_13_142343_create_order_table', 1),
	(12, '2025_05_13_142355_create_order_activity_table', 1);

-- Volcando estructura para tabla bd_order.observation
CREATE TABLE IF NOT EXISTS `observation` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'descripcion',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla bd_order.observation: ~5 rows (aproximadamente)
INSERT INTO `observation` (`id`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'Perro bravo', NULL, NULL),
	(2, 'Contador con candado', NULL, NULL),
	(3, 'Contador inaccesible', NULL, NULL),
	(4, 'Predio en construcción', NULL, NULL),
	(8, 'No existe el contador', '2025-05-22 18:33:41', '2025-05-22 18:35:00');

-- Volcando estructura para tabla bd_order.order
CREATE TABLE IF NOT EXISTS `order` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `legalization_date` date NOT NULL COMMENT 'fecha de legalización',
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'dirección',
  `city` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ciudad',
  `causal_id` bigint unsigned NOT NULL,
  `observation_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_causal_id_foreign` (`causal_id`),
  KEY `order_observation_id_foreign` (`observation_id`),
  CONSTRAINT `order_causal_id_foreign` FOREIGN KEY (`causal_id`) REFERENCES `causal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_observation_id_foreign` FOREIGN KEY (`observation_id`) REFERENCES `causal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla bd_order.order: ~2 rows (aproximadamente)
INSERT INTO `order` (`id`, `legalization_date`, `address`, `city`, `causal_id`, `observation_id`, `created_at`, `updated_at`) VALUES
	(1, '2025-05-06', 'Manzana La Villa', 'PALMIRA', 2, 2, '2025-05-22 21:39:25', '2025-05-22 21:39:25'),
	(2, '2025-05-28', 'Manzana La Villa', 'PALMIRA', 1, 1, '2025-05-22 21:52:51', '2025-05-22 21:52:51');

-- Volcando estructura para tabla bd_order.order_activity
CREATE TABLE IF NOT EXISTS `order_activity` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `activity_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_activity_order_id_activity_id_unique` (`order_id`,`activity_id`),
  KEY `order_activity_activity_id_foreign` (`activity_id`),
  CONSTRAINT `order_activity_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `order_activity_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla bd_order.order_activity: ~1 rows (aproximadamente)
INSERT INTO `order_activity` (`id`, `order_id`, `activity_id`, `created_at`, `updated_at`) VALUES
	(2, 2, 2, NULL, NULL);

-- Volcando estructura para tabla bd_order.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla bd_order.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_order.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla bd_order.personal_access_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_order.role
CREATE TABLE IF NOT EXISTS `role` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'ADMINISTRADOR',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla bd_order.role: ~2 rows (aproximadamente)
INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'ADMINISTRADOR', NULL, NULL),
	(2, 'SUPERVISOR', NULL, NULL);

-- Volcando estructura para tabla bd_order.technician
CREATE TABLE IF NOT EXISTS `technician` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `document` bigint unsigned NOT NULL COMMENT 'cédula',
  `name` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'nombre',
  `speciality` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'especialidad',
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'teléfono',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `technician_document_unique` (`document`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla bd_order.technician: ~6 rows (aproximadamente)
INSERT INTO `technician` (`id`, `document`, `name`, `speciality`, `phone`, `created_at`, `updated_at`) VALUES
	(1, 77049448, 'Leone VonRueden', 'Instalación de redes', '+1.986.585.6747', '2025-05-20 21:30:59', '2025-05-20 21:30:59'),
	(2, 29779104, 'Heber McDermott II', 'Instalación de redes', '475-259-6730', '2025-05-20 21:30:59', '2025-05-20 21:30:59'),
	(3, 66227322, 'Sasha Turner V', 'Construcción', '608-936-6838', '2025-05-20 21:30:59', '2025-05-20 21:30:59'),
	(5, 73193718, 'Miss Clementina Hegmann PhD', 'Construcción', '(480) 207-0476', '2025-05-20 21:30:59', '2025-05-22 18:54:12'),
	(6, 8955768, 'Estella Bradtke', NULL, '1-636-489-4303', '2025-05-20 21:30:59', '2025-05-20 21:30:59'),
	(7, 121545454, 'Pepito Perez', 'Redes y Internet', '45454515151', '2025-05-22 18:55:43', '2025-05-22 18:55:43'),
	(8, 12312312312, 'Dago Arnulfo Lopez', NULL, '123131213232', '2025-06-03 18:08:21', '2025-06-03 18:47:09');

-- Volcando estructura para tabla bd_order.type_activity
CREATE TABLE IF NOT EXISTS `type_activity` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'descripción',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla bd_order.type_activity: ~4 rows (aproximadamente)
INSERT INTO `type_activity` (`id`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'REPARACION', NULL, '2025-05-22 18:35:13'),
	(2, 'CONSTRUCCION', NULL, NULL),
	(3, 'INSTALACION', NULL, NULL),
	(6, 'SUSPENSION', '2025-05-22 18:35:25', '2025-05-22 18:35:31');

-- Volcando estructura para tabla bd_order.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'nombre',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'correo',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'contraseña',
  `role_id` bigint unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla bd_order.users: ~4 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Ms. Estell Stracke III', 'emanuel.gerhold@example.com', '$2y$12$l2.q37ySKwfe91tOiSqeL.uCXSyyWYnH5cMVm/IwgasrVcqC9wvvK', 1, 'V1g1xux9mBdaMxiJeh8XF3tRQXgMzFOORhQR4o3xHGywzWSYqdBBVw82vnBf', '2025-05-20 21:30:59', '2025-05-20 21:30:59'),
	(2, 'Shania Wunsch', 'ellie14@example.org', '$2y$12$l2.q37ySKwfe91tOiSqeL.uCXSyyWYnH5cMVm/IwgasrVcqC9wvvK', 2, 'cCtx9pfRgzYcPgetHcNetYx21PLmMGbs16s5FxBqjGogq5xkkYwgF8w83ASz', '2025-05-20 21:30:59', '2025-05-20 21:30:59'),
	(3, 'Reyna Macejkovic', 'murphy.cole@example.com', '$2y$12$l2.q37ySKwfe91tOiSqeL.uCXSyyWYnH5cMVm/IwgasrVcqC9wvvK', 2, 'quNn0OMyJc', '2025-05-20 21:30:59', '2025-05-20 21:30:59'),
	(4, 'Ms. Christina Fisher PhD', 'dejah.nicolas@example.net', '$2y$12$l2.q37ySKwfe91tOiSqeL.uCXSyyWYnH5cMVm/IwgasrVcqC9wvvK', 2, 'YcDfR4pDtR', '2025-05-20 21:30:59', '2025-05-20 21:30:59'),
	(5, 'juan diego', 'juan@email.com', '$2y$12$dXv9PW2XoF.c4eZTGSFnreaYL/Ev4uKq52hJoKXuyrGFvBiBq8AOC', 2, NULL, '2025-06-05 18:54:16', '2025-06-05 18:54:16');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
