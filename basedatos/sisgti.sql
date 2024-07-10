-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para sisgti
CREATE DATABASE IF NOT EXISTS `sisgti` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sisgti`;

-- Volcando estructura para tabla sisgti.curso
CREATE TABLE IF NOT EXISTS `curso` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipocurso_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `curso_tipocurso_id_foreign` (`tipocurso_id`),
  CONSTRAINT `curso_tipocurso_id_foreign` FOREIGN KEY (`tipocurso_id`) REFERENCES `tipocurso` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sisgti.curso: ~12 rows (aproximadamente)
DELETE FROM `curso`;
INSERT INTO `curso` (`id`, `nombre`, `imagen`, `tipocurso_id`, `created_at`, `updated_at`) VALUES
	(1, 'PHP intermedio', 'public/cursos/f0hR4KqvO0J1MQrkWgrLPezIuy5Jd1weSJRXn8iq.jpg', 2, '2023-06-21 00:45:35', '2023-06-21 00:45:35'),
	(2, 'PHP basico', 'public/cursos/jT5zOvRCch9JNa1NtQ2eywr7ZAS8FSH5zwAKYWpg.jpg', 2, '2023-06-21 01:02:18', '2023-06-21 01:02:18'),
	(4, 'MongoDB', NULL, 3, NULL, NULL),
	(5, 'Mysql', NULL, 3, NULL, NULL),
	(6, 'Redes Inalambricas', NULL, 6, NULL, NULL),
	(7, 'Ingenieria del Software', NULL, 9, NULL, NULL),
	(8, 'Corel Draw', NULL, 5, NULL, NULL),
	(9, 'HTML 5 Y CSS3', NULL, 4, NULL, NULL),
	(10, 'BootStrat', 'public/cursos/yy05g3gmo4lPdvNNMRDwSMKkvBSg2Lu3oCRTMpW6.jpg', 4, '2023-07-13 01:41:57', '2023-07-13 01:41:57'),
	(12, 'Adobe Photoshop', 'public/cursos/IoUK5t7kVT1RykqsVgTxvZ8Yx2ihUYsC4A8YLVY0.jpg', 12, '2023-07-13 01:49:15', '2023-07-13 01:49:15'),
	(13, 'WEQQEW', 'public/cursos/nZ8WGQyFNYM4M3LW1b3YgDamFrG9eIV0Bhxe3yd2.jpg', 9, '2023-07-18 16:06:15', '2023-07-18 16:06:15'),
	(14, 'POR', 'public/cursos/0JM3MLG1sJ5OepAVpbMPmRCQjfftIvCl9pyEMP1c.jpg', 14, '2023-07-18 16:06:50', '2023-07-18 16:06:50');

-- Volcando estructura para tabla sisgti.docente
CREATE TABLE IF NOT EXISTS `docente` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `programa_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK1_programa_id` (`programa_id`),
  CONSTRAINT `FK1_programa_id` FOREIGN KEY (`programa_id`) REFERENCES `programa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sisgti.docente: ~3 rows (aproximadamente)
DELETE FROM `docente`;
INSERT INTO `docente` (`id`, `nombre`, `apellido`, `dni`, `celular`, `imagen`, `programa_id`, `created_at`, `updated_at`) VALUES
	(1, 'Alex Fernando', 'Huilca Huaman', '74859654', '987654321', 'public/docentes/WY7zoYqYdBOTpnQ0j0GqAtwsc1xoKqQ2DYE34YKj.png', 9, '2023-11-17 14:24:54', '2023-11-17 14:24:54'),
	(2, 'Jose Luis', 'Pimeltel Zegarra', '85745215', '985632541', 'public/docentes/iYCYsWR6US6in1eHF177JbVeNWdjZ05rfeglMdGN.png', 4, '2023-11-17 14:26:04', '2023-11-20 16:37:31'),
	(3, 'Christian', 'Jiraldo Ascensio', '78956325', '968532547', 'public/docentes/KBbfb7lrrbbTcnIZ6Aru8sLmmbK80I7CDmyFMLMi.png', 10, '2023-11-17 15:42:43', '2023-11-17 15:42:43');

-- Volcando estructura para tabla sisgti.estudiante
CREATE TABLE IF NOT EXISTS `estudiante` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_dni` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `programa_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `estudiante_programa_id_foreign` (`programa_id`),
  CONSTRAINT `estudiante_programa_id_foreign` FOREIGN KEY (`programa_id`) REFERENCES `programa` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sisgti.estudiante: ~14 rows (aproximadamente)
DELETE FROM `estudiante`;
INSERT INTO `estudiante` (`id`, `nombre`, `apellido`, `dni`, `celular`, `imagen`, `foto_dni`, `programa_id`, `created_at`, `updated_at`) VALUES
	(17, 'Julio', 'Gastañaga', '75859656', '956868486', 'public/estudiantes/944JySBSLfaNbbOFKUVZ8eq6a3DffddtcTODhgv5.png', NULL, 2, '2023-07-21 13:32:23', '2023-11-17 14:28:25'),
	(19, 'Katty', 'Torres', '45456456', '654564565', 'public/estudiantes/xKWn5Yz671Fbtc5eQnpPB4iX1QFujXrWV33OEJVG.png', NULL, 10, '2023-07-21 15:10:02', '2023-11-17 14:27:57'),
	(20, 'Yudi', 'Jara', '78459623', '987654321', 'public/estudiantes/4RoUTnfek8jOHb2HffTzs6N4tig7DVWbYw4LObe3.png', NULL, 4, '2023-07-21 15:17:17', '2023-11-17 14:28:15'),
	(21, 'Juan', 'Perez', '78596859', '965868596', 'public/estudiantes/MSBZfVscJTd6RvjvCM5Uo0qz6DCPtJkWeIP8Kqj8.png', NULL, 4, '2023-07-21 18:26:49', '2023-11-17 14:28:43'),
	(22, 'Luis', 'Santana', '85967420', '956064583', 'public/estudiantes/3Rmu1l9jGx5EfSwh8lBz8NWgEraeoZxI71GS0ciC.png', NULL, 2, '2023-10-23 17:15:06', '2023-11-17 14:28:32'),
	(23, 'Ruth Maricarmen', 'Zambrano Mejia', '76022380', '956869574', 'public/estudiantes/ttEt9TV95kvB0d9thFLsJBaozlgfwAaDZCEyTrXC.png', NULL, 4, '2023-11-17 14:36:35', '2023-11-17 14:36:35'),
	(24, 'Jade', 'Jara', '78585969', '963852741', 'public/estudiantes/jGR25nfL31tgdmJyoS16BWZvMr4WMzATHNIbKoYF.png', NULL, 10, '2023-11-17 14:39:43', '2023-11-17 14:40:10'),
	(25, 'Diego', 'Durand', '76129660', '789456123', 'public/estudiantes/2UBFJ9QfiqgcPBn21kGDm7gCgjaOjzTDh0vMJ8kb.png', 'public/estudiantes/e89uNhVQlig1v1fJYDBiNwoPNdv4iAzpZsaeol08.pdf', 10, '2023-11-30 17:28:44', '2023-12-01 15:27:28'),
	(31, 'Kolins', 'Durand', '12345678', '123456789', 'public/estudiantes/lj5N3SGEFzdB4zZt1XoBf3hg8h4Uj04wHIgyth6U.png', 'public/estudiantes/4wR9eQiKwqIbHDoqFIC4CVdK8yDG93u0KDQ36zXM.pdf', 10, '2023-12-01 14:36:29', '2023-12-01 15:27:06'),
	(32, 'asd', 'asd', '12345678', '789456123', 'public/estudiantes/qRW7mkoNRnYqzvUwexeJJSTqQuYAIzFKU9bekfDz.png', 'public/estudiantes/31DpBHwHLbONXRsbzY3jPBl5Li6g0CEK7UCVkmYY.pdf', 10, '2023-12-01 14:40:39', '2023-12-01 14:40:39'),
	(33, 'VIKY', 'REYES', '12345678', '123456789', 'public/estudiantes/QdoCdMvXHfH7BjzfQUGKRg7XP0rfOMM5dyXwG7Sw.png', 'public/estudiantes/8hvvkOHeYdpChsZiBvtmEiVZ2PEBsv04ArYgRXy0.pdf', 10, '2023-12-01 14:43:17', '2023-12-01 14:43:17'),
	(35, 'QWE', 'QWE', '12312312', '123123123', 'public/estudiantes/i971aGBaQkGxn5moppC7di9eEHnvmiOecqWwDVOT.png', 'public/estudiantes/ULZpOgJVXFt6yIhUBlRYjOPPXu8ibyqiSdlc5Zyx.pdf', 10, '2023-12-01 14:51:25', '2023-12-12 14:18:16'),
	(36, 'lUIS H', 'QWE', '12312312', '123123123', 'public/estudiantes/qERYeIENLlHNsfQnmdnfEGf7D1kWVMY8thJUmUe4.png', 'public/estudiantes/SOLJNxarWxklmnO8AjUBSwgQkM4MeDpfzzfUMoMx.pdf', 3, '2023-12-01 14:53:12', '2023-12-01 14:53:12'),
	(37, 'QWE', 'QWE', '12312312', '123123123', 'public/estudiantes/WFhHlCIUPjxCqssjNK0Rl2pI1zIbwWwfE6vyyss8.png', 'public/estudiantes/9FUU2utKpFXTQUng5Kg9vS3v88mezoO6utqFE37A.pdf', 3, '2023-12-01 14:57:22', '2023-12-01 14:57:22');

-- Volcando estructura para tabla sisgti.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sisgti.failed_jobs: ~0 rows (aproximadamente)
DELETE FROM `failed_jobs`;

-- Volcando estructura para tabla sisgti.informatica
CREATE TABLE IF NOT EXISTS `informatica` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `laboratorio_id` int DEFAULT NULL,
  `ip` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `disco_duro` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `placa_madre` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `procesador` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `memoria_ram` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `monitor` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `teclado` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mouse` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tarjeta_video` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tarjeta_red` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `lectora` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `descripcion` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_informatica_laboratorio` (`laboratorio_id`),
  CONSTRAINT `FK_informatica_laboratorio` FOREIGN KEY (`laboratorio_id`) REFERENCES `laboratorio` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sisgti.informatica: ~71 rows (aproximadamente)
DELETE FROM `informatica`;
INSERT INTO `informatica` (`id`, `laboratorio_id`, `ip`, `disco_duro`, `placa_madre`, `procesador`, `memoria_ram`, `monitor`, `teclado`, `mouse`, `tarjeta_video`, `tarjeta_red`, `lectora`, `descripcion`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, '10.0.0.42', 'Capacidad 500GB  SATA-II\r\nSEAGATE\r\nST500DM002\r\nZ3T63PYM', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE21802VKA', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz \r\nKINGSTONG\r\nDDR3\r\nKYL17-H92MTC-5WC76', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C00232SL0', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYB2AC1U10466', 'USB\r\nGENIUS\r\nGM-070005\r\nYB2AC1U10461', 'Capacidad 1024MB\r\nATI  Radeon\r\nATI Radeon HD 5450\r\nNWY039694', 'Realtek RTL8168/8111 PCI-E Gigabit Ethernet\r\n*        \r\n*        \r\n*', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(2, 1, '10.0.0.43', 'Capacidad 500GB  SATA-II\r\nSEAGATE\r\nST500DM002\r\nZ3T68JRB', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE21802VKA', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\nA5LKR-M9EMVT-TWVTB', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nET39C00259SL0', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYB2AC1U10468', 'USB\r\nGENIUS\r\nGM-070005\r\nYB2*80325805807', 'Capacidad 1024MB\r\nATI  Radeon\r\nATI Radeon HD 5450\r\nNWY039698', 'Giga bit PCI Desktop Adapter 10/100/1000 Mbps\r\nD-LINK\r\nDGE-528T\r\nF3521DC000046', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(3, 1, '10.0.0.44', 'Capacidad 500GB  SATA-II\r\nSEAGATE\r\nST3500DM002\r\nZ3T68JQZ', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE21802VKA', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\nH1L9P-690M48-VW6MF', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C00236SL0', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYB2AC1U10470', 'USB\r\nGENIUS\r\nGM-070005\r\nYB2AC1U10462', 'Capacidad 1024MB\r\nATI  Radeon\r\nATI Radeon HD 5450\r\n9Y002921', 'Realtek RTL8168/8111 PCI-E Gigabit Ethernet\r\n*\r\n*\r\n*', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(4, 1, '10.0.0.45', 'Capacidad 400GB  SATA-II\r\nSEAGATE\r\nST3400832AS\r\n4NF28YZE', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE21802VKQ', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\n0MLA8-X9JM96', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C00279SL0', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYB29C1U20108', 'USB\r\nGENIUS\r\nGM-070005\r\nYB29C1U20105', 'Capacidad 1024MB\r\nATI  Radeon\r\nATI Radeon HD 5450\r\nWY039709', 'Realtek RTL8168/8111 PCI-E Gigabit Ethernet\r\n*\r\n*\r\n*', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(5, 1, '10.0.0.46', 'Capacidad 500GB  SATA-II\r\nSEAGATE\r\nST500DM002\r\nZ3T65YFQ', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE21802VHT', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\nR8LCQ-C96M3W-WW7T6', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C00188SL0', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYB29C1U20105', 'USB\r\nGENIUS\r\nGM-070005\r\n*', 'Capacidad 1024MB\r\nATI  Radeon\r\nATI Radeon HD 5450\r\nNWY039691', 'Realtek RTL8168/8111 PCI-E Gigabit Ethernet\r\n*\r\n*\r\n*', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(6, 1, '10.0.0.47', 'Capacidad 500GB  SATA-II\r\nSEAGATE\r\nST500DM002\r\nZ3T64DFL', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE2VD2VKN', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\nRLLY7-A9AMK1-RWV8F', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C00203SL0', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYB2AC1U10464', 'USB\r\nGENIUS\r\nGM-070005\r\nYB2AC1U10468', 'Capacidad 1024MB\r\nATI  Radeon\r\nATI Radeon HD 5450\r\nN9Y002933', 'Realtek RTL8168/8111 PCI-E Gigabit Ethernet\r\n*\r\n*\r\n*', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(7, 1, '10.0.0.48', 'Capacidad 500GB  SATA-II\r\nSEAGATE\r\nST500DM002\r\nZ3T65HX7', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE21802VBL', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\nBLL1T-D9DMAP-NWRXF', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C00262SL0', 'USB\r\nGENIUS\r\nGK-070006/U\r\n*', 'USB\r\nGENIUS\r\nGM-110020\r\nX78753206670', 'Capacidad 1024MB\r\nATI  Radeon\r\nATI Radeon HD 5450\r\nNWY039697', 'Realtek RTL8168/8111 PCI-E Gigabit Ethernet\r\n*\r\n*\r\n*', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(8, 1, '10.0.0.49', 'Capacidad 500GB  SATA-II\r\nSEAGATE\r\nST500DM002\r\nZ3T6668F', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE21802VJF', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\n6FL7D-N97MLK-QWCAB', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C00273SL0', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYB2AC1U10467', 'USB\r\nGENIUS\r\nGM-070005\r\nYB2AC1U10143', 'Capacidad 1024MB\r\nATI  Radeon\r\nATI Radeon HD 5450\r\nNWY039696', 'Giga bit PCI Desktop Adapter 10/100/1000 Mbps\r\nD-LINK\r\nDGE-528T\r\nF3521DC000041', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(9, 1, '10.0.0.49', 'Capacidad 500GB  SATA-II\r\nSEAGATE\r\nST500DM002\r\nZ3T65KBX', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE21802VBF', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\nATJAE-Q9MMHH-5V9Y7', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C00284SL0', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYB2AC1U10463', 'USB\r\nGENIUS\r\nGM-070005\r\nYB2AC1U20109', 'Capacidad 1024MB\r\nATI  Radeon\r\nATI Radeon HD 5450\r\nNWY039704', 'Realtek RTL8168/8111 PCI-E Gigabit Ethernet\r\n*\r\n*\r\n*', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(10, 1, '10.0.0.50', 'Capacidad 400GB  SATA-II\r\nSEAGATE\r\nST3400832AS\r\n4NF2KMMS', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE21802W0N', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\n34LMR-591MKK-HWCB6', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C00209SL0', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYB2AC1U110461', 'USB\r\nGENIUS\r\nGM-070005\r\nYB2AC1U10466', 'Capacidad 1024MB\r\nATI  Radeon\r\nATI Radeon HD 5450\r\nN9Y002934', 'Realtek RTL8168/8111 PCI-E Gigabit Ethernet\r\n*\r\n*\r\n*', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(11, 1, '10.0.0.51', 'Capacidad 400GB  SATA-II\r\nSEAGATE\r\nST340083AS\r\n4NF2KR7W', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE21802WAJ', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\n2HLMK-29YMGE-CW4BB', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C00210SL0', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYV29C1U20102', 'USB\r\nGENIUS\r\nGM-070005\r\nYB2AC1U10141', 'Capacidad 1024MB\r\nATI  Radeon\r\nATI Radeon HD 5450\r\nNWY039695', 'Realtek RTL8168/8111 PCI-E Gigabit Ethernet\r\n*\r\n*\r\n*', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(12, 1, '10.0.0.52', 'Capacidad 500GB  SATA-II\r\nSEAGATE\r\nST500DM002\r\nZ3T65HPH', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE21802VKX', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\n2HLMK-29YMGE-CW4BB', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C00210SL0', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYV29C1U20102', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYV29C1U20102', 'GENIUS\r\nATI  Radeon\r\nATI Radeon HD 5450\r\nNWY039695', 'GK-070006/U\r\n*\r\n*\r\n*', 'YV29C1U20102\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(13, 1, '10.0.0.53', 'Capacidad 400GB  SATA-II\r\nSEAGATE\r\nST3400832AS\r\n4NF2CCAE', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE21802VXE', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\n9JL2D-L91M0L-7W4M6', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C00179S0', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYB2AC1U10147', 'USB\r\nGENIUS\r\nGM-070005\r\nYB2AC1U10104', 'Capacidad 1024MB\r\nATI  Radeon\r\nATI Radeon HD 5450\r\nN9Y002935', 'Realtek RTL8168/8111 PCI-E Gigabit Ethernet\r\n*\r\n*\r\n*', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(14, 1, '10.0.0.54', 'Capacidad 400GB  SATA-II\r\nSEAGATE\r\nST3400832AS\r\nANF2TJ2X', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE21802VJ1', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\nCYL33-N9KMV5-TWB16', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C00260SL0', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYB2AC1U20103', 'USB\r\nGENIUS\r\nGM-070005\r\nYB2AC1U10107', 'Capacidad 1024MB\r\nATI  Radeon\r\nATI Radeon HD 5450\r\nNWY039693', 'Realtek RTL8168/8111 PCI-E Gigabit Ethernet\r\n*\r\n*\r\n*', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(15, 1, '10.0.0.55', 'Capacidad 400GB  SATA-II\r\nSEAGATE\r\nST3400832AS\r\n4NF2QEAZ', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE21802VGQ', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\nW0LUK-B90M51-YW3F2', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETKCC05623019', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYB2AC1U10148', 'USB\r\nGENIUS\r\nGM-070005\r\n*', 'Capacidad 1024MB\r\nATI  Radeon\r\nATI Radeon HD 5450\r\nNWY039692', 'Giga bit PCI Desktop Adapter 10/100/1000 Mbps\r\nD-LINK\r\nDGE-528T\r\nF3521DC000050', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(16, 1, '10.0.0.56', 'Capacidad 500GB  SATA-II\r\nSEAGATE\r\nST500DM002\r\nZ3T67401', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE21802VZU', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\n*\r\n*\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\n0FLV0-E93MLA-TWY8F', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C00280SL0', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYB2AC1U10143', 'USB\r\nGENIUS\r\nGM-070005\r\nYB2AC1U20104', 'USB\r\nATI  Radeon\r\nATI Radeon HD 5450\r\nN9Y002932', 'Realtek RTL8168/8111 PCI-E Gigabit Ethernet\r\n*\r\n*\r\n*', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(17, 1, '10.0.0.57', 'Capacidad 500GB  SATA-II\r\nSEAGATE\r\nST500DM002\r\nZ3T65HP4', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE21802VRM', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\n0HLHY-U98M43-PW0FF', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C002065L0', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYB2AC1U10462', 'USB\r\nGENIUS\r\nGM-070005\r\nYB2AC1U10149', 'Capacidad 1024MB\r\nATI  Radeon	\r\nATI Radeon HD 5450\r\nNWY039708', 'Realtek RTL8168/8111 PCI-E Gigabit Ethernet\r\n*\r\n*\r\n*', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(18, 1, '10.0.0.58', 'Capacidad 400GB  SATA-II\r\nSEAGATE\r\nST3400832AS\r\nZ3T65HP4', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE21802WD6', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\nQ2LU5-W9DMMT-9W6FB', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C00195SL0', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYB2AC1U10149', 'USB\r\nGENIUS\r\nGM-070005\r\nX70377508968', 'Capacidad 1024MB\r\nATI  Radeon\r\nATI Radeon HD 5450\r\nNWY039706', 'Giga bit PCI Desktop Adapter 10/100/1000 Mbps\r\nD-LINK\r\nDGE-528T\r\nF3521DC000049', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(19, 1, '10.0.0.59', 'Capacidad 500GB  SATA-II\r\nSEAGATE\r\nST3400832AS\r\nANF02DBX', 'INTEL Desktop Board\r\nINTEL	\r\nDP67DE\r\nBTDE21802VL2', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\nEKL66-Q9PMPR-YWLTB', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C00253SL0', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYB2AC1U10469', 'USB\r\nGENIUS\r\nGM-070005\r\nYB2AC1U10144', 'GENIUS\r\nATI Radeon\r\nATI Radeon HD 5450\r\nN9Y002924', 'GK-070006/U\r\n*\r\n*\r\n*', 'YB2AC1U10469\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(20, 1, '10.0.0.60', 'Capacidad 400GB  SATA-II\r\nSEAGATE\r\nST3400832AS\r\n4NFPP9L', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE21802VMX', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\nR2J8Q-697M6V-MV965', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C00255SL0', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYB2AC1U20109', 'USB\r\nGENIUS\r\nGM-070005\r\n*', 'USB\r\nATI Radeon\r\nATI Radeon HD 5450\r\nN9Y002163', 'GENIUS\r\nD-LINK\r\nDGE-528T\r\nF3521DC000060', 'GM-070005\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(21, 1, '10.0.0.61', 'Capacidad 500GB  SATA-II\r\nSEAGATE\r\nST500DM002\r\nZ3T65LXV', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE21802W2X', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\n9ELN0-P99MDH-3W6LF', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C00263SL0', 'USB\r\nHALION\r\n*\r\n*', 'USB\r\nGENIUS\r\nGM-070005\r\nYB2AC1U10145', 'Capacidad 1024MB\r\nATI  Radeon\r\nATI Radeon HD 5450\r\nNWY0397710', 'Giga bit PCI Desktop Adapter 10/100/1000 Mbps\r\nD-LINK\r\nDGE-528T\r\nF3521DC000047', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(22, 1, '10.0.0.62', 'Capacidad 500GB  SATA-II\r\nSEAGATE\r\nST500DM002\r\nZ3T673YB', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE21802VMC', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\n*\r\n*\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\nFFJXT-495MA1-NV9MQ', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C00254SL0', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYB2AC1U20110', 'USB\r\nLOGITECH\r\nM-U0026\r\n810-002182', 'Capacidad 1024MB\r\nATI  Radeon\r\nATI Radeon HD 5450\r\nNWY039705', 'Realtek RTL8168/8111 PCI-E Gigabit Ethernet\r\n*\r\n*\r\n*', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(23, 1, '10.0.0.63', 'Capacidad 500GB  SATA-II\r\nSEAGATE\r\nST500DM002\r\nZ3T665W0', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE21802W1N', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\nT9LWM-H92P3U-UW1UB', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C00205SL0', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYB29C1U20104', 'USB\r\nOPTICAL WHEEL\r\n*\r\n*', 'Capacidad 1024MB\r\nATI  Radeon\r\nATI Radeon HD 5450\r\nN9Y002923', 'Realtek RTL8168/8111 PCI-E Gigabit Ethernet\r\n*\r\n*\r\n*', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(24, 1, '10.0.0.64', 'Capacidad 400GB  SATA-II\r\nSEAGATE\r\nST3400832AS\r\n4NF14FLH', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE21802VHV', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\nF0J8F-39EPC8-1V9MM', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ39C00237SL0', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYB29C1U10142', 'USB\r\nGENIUS\r\nGM-070005\r\n*', 'Capacidad 1024MB\r\nATI  Radeon\r\nATI Radeon HD 5450\r\nNWY039700', 'Realtek RTL8168/8111 PCI-E Gigabit Ethernet\r\n*\r\n*\r\n*', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(25, 1, '10.0.0.65', 'Capacidad 500GB  SATA-II\r\nSEAGATE\r\nST500DM002\r\nZ3T6744W', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE21802W2V', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\n5TLBT-897MV2-FWQFB', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C00196SL0', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYB2AC1U10150', 'USB\r\nGENIUS\r\nGM-070005\r\n*', 'Capacidad 1024MB\r\nATI  Radeon\r\nATI Radeon HD 5450\r\nNWY039707', 'Realtek RTL8168/8111 PCI-E Gigabit Ethernet\r\n*\r\n*\r\n*', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(26, 1, '10.0.0.66', 'Capacidad 500GB  SATA-II\r\nSEAGATE\r\nST500DM002\r\n23T68J1Q', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE21802VYC', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\n7HLUT-19EM8C-HWER6', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C00248SL0', 'USB\r\nGENIUS\r\nGK-070006/U\r\n*', 'USB\r\nGENIUS\r\nGM-070005\r\n*', 'Capacidad 1024MB\r\nATI  Radeon\r\nATI Radeon HD 5450\r\nNWY039699', 'Realtek RTL8168/8111 PCI-E Gigabit Ethernet\r\n*\r\n*\r\n*', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(27, 1, '10.0.0.67', 'Capacidad 500GB  SATA-II\r\nSEAGATE\r\nST500DM002\r\n23T64EKK', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE21802W3J', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\nJTL1X-79UMFH-0W10M', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C00282SL0', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYB2AC1U10141', 'USB\r\nGENIUS\r\nGM-070005\r\nYB2AC1U10142', 'Capacidad 1024MB\r\nATI  Radeon\r\nATI Radeon HD 5450\r\nNWY039701', 'Realtek RTL8168/8111 PCI-E Gigabit Ethernet\r\n*\r\n*\r\n*', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(28, 1, '10.0.0.68', 'Capacidad 500GB  SATA-II\r\nSEAGATE\r\nST500MD002\r\nZ3T6664T', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE2170106Z', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\n2KL55-99NPN0-JWX1B', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C00218SL0', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYB2AC1U10144', 'USB\r\nGENIUS\r\nGM-070005\r\nYB2AC1U13477', 'Capacidad 1024MB\r\nATI  Radeon\r\nATI Radeon HD 5450\r\nN9Y002922', 'Realtek RTL8168/8111 PCI-E Gigabit Ethernet\r\n*\r\n*\r\n*', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(29, 1, '10.0.0.69', 'Capacidad 500GB SATA-II\r\nSEAGATE\r\nST500DM002\r\nZ3T673X6', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE21802VZZ', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\n9WJHU-K9TME7-FV90C', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C00213SL0', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYB29C1U10145', 'USB\r\nGENIUS\r\nGM-070005\r\n*', 'Capacidad 1024MB\r\nATI  Radeon\r\nATI Radeon HD 5450\r\nNWY039702', 'Realtek RTL8168/8111 PCI-E Gigabit Ethernet\r\n*\r\n*\r\n*', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(30, 1, '10.0.0.202(SERVER)', 'SATA SSD SU650\r\nADATA\r\nASU650SS\r\n2L372L1GN4WH', 'INTEL Desktop Board\r\nINTEL\r\nDP67DE\r\nBTDE2170104U', 'Intel(R) Core(TM) i5-3320 CPU 4000 MHz\r\nINTEL\r\nCore(TM) i5-3320\r\n*', 'Capacidad 4GB DDR3-1333 MHz\r\nKINGSTONG\r\nKVR1333D3N9/4G\r\nEBLR7-29CMBF-RW85F', 'LCD 18.5"\r\nBENQ\r\nGL 950-BA\r\nETJ9C00251SL0', 'USB\r\nGENIUS\r\nGK-070006/U\r\nYB29C1U20101', 'USB\r\nGENIUS\r\nGM-070005\r\nYB29C120108', 'Capacidad 1024MB\r\nATI  Radeon\r\nATI Radeon HD 5450\r\nNWY039703', 'Realtek RTL8168/8111 PCI-E Gigabit Ethernet\r\n*\r\n*\r\n*', '*\r\n*\r\n*\r\n*', NULL, NULL, NULL, NULL),
	(31, 3, '10.0.0.111', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LGK6', 'DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-615-027Y-A01\r\n', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\n*\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63T-1F5U-A00-B0-120\r\n', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-24SE-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BC-065N', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-06GB-A03', NULL, NULL, NULL, NULL),
	(32, 3, '10.0.0.112', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003 \r\nZ9A1D072', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-5CL-01PM-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\n*\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63T-1EKU-A00-B0-120', 'USB	\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-22W7-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BC-0700', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59H-06UA-A03', NULL, NULL, NULL, NULL),
	(33, 3, '10.0.0.113', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LG4W', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-5CL-02JQ-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63T-1DEU-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-26OV-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BH-0DF3', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59H-06UF-A03', NULL, NULL, NULL, NULL),
	(34, 3, '10.0.0.114', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LF2E', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-615-026B-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63U-0CJU-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-28VC-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BC-0DW7', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59H-06UF-A03', NULL, NULL, NULL, NULL),
	(35, 3, '10.0.0.115', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LH01', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-615-02VD-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63U-09RU-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-26X5-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BC-06F9', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-06C9-A03', NULL, NULL, NULL, NULL),
	(36, 3, '10.0.0.116', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LG3T', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-5CL-0256-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRO\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63U-2H9U-A00-B0-120', 'USB\r\nDELL       \r\nKB212-B       \r\nCN-0C639N-71616-5C1-22YO-A00', 'USB\r\nDELL\r\nMS111-T       \r\nCN-0KW2YH-71616-5BC-09X0', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59H-06UO-A03', NULL, NULL, NULL, NULL),
	(37, 3, '10.0.0.117', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LDEG', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-615-04FP-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24" \r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63U-08UU-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-270J-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BH-0GLT', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-071F-A03', NULL, NULL, NULL, NULL),
	(38, 3, '10.0.0.118', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LGDJ', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-615-022R-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-09GKC3-74261-59S-1WCU-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-26Q3-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BC-0B0Y', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-06GJ-A03', NULL, NULL, NULL, NULL),
	(39, 3, '10.0.0.119', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LF1L', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-615-04N3-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63U-1AMU-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-24SO-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BH-0MPD', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-072F-A03', NULL, NULL, NULL, NULL),
	(40, 3, '10.0.0.120', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LE37', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-615-04EV-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63U-18JU-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-23EJ-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BC-0E6W', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-06DP-A03', NULL, NULL, NULL, NULL),
	(41, 3, '10.0.0.121', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nW4Y6SDG5', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-615-03H7-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63T-1EWU-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-26SK-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BC-0E70', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-073I-A03', NULL, NULL, NULL, NULL),
	(42, 3, '10.0.0.122', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LKNB', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-614-04YZ-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63T-1F6U-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-22ON-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BC-07NH', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-070Q-A03', NULL, NULL, NULL, NULL),
	(43, 3, '10.0.0.123', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nZ9A1DPFE', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-5CL-01SZ-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63T-1E1U-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-25ZH-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BC-023K', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-07E1-A03', NULL, NULL, NULL, NULL),
	(44, 3, '10.0.0.124', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LJYC', 'DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-615-03P5-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63T-1N9U-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-26Z9-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BC-02BQ', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-06BF-A03', NULL, NULL, NULL, NULL),
	(45, 3, '10.0.0.125', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nY4YBJ4S7', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-615-02FE-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63T-1ECU-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-25W1-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BC-09KO', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-06HA-A03', NULL, NULL, NULL, NULL),
	(46, 3, '10.0.0.126', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LEL1', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-614-04GY-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63U-0AAU-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-25ZH-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BC-024K', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-06DZ-A03', NULL, NULL, NULL, NULL),
	(47, 3, '10.0.0.127', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nZ9A1DA2C', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-5CL-01TM-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63P-0T2U-A00-B0-120', 'USB\r\nDELL\r\nKB212-B	\r\nCN-0C639N-71616-5C1-28TR-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BC-28TR', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-07DY-A03', NULL, NULL, NULL, NULL),
	(48, 3, '10.0.0.128', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LKVH', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-5CL-01V4-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63U-19KU-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-23VG-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BH-0K0Y', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59H-06UL-A03', NULL, NULL, NULL, NULL),
	(49, 3, '10.0.0.129', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nWAY6SE6B', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-615-02NR-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63U-1CJU-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-2311-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BH-0MPZ', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-072T-A03', NULL, NULL, NULL, NULL),
	(50, 3, '10.0.0.130', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LJK7', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-615-04EX-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PDKC3-74261-59S-1WTU-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-261U-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BC-02I7', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-0719-A03', NULL, NULL, NULL, NULL),
	(51, 3, '10.0.0.111', 'Capacidad 1TB SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LE89', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-615-0238-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63P-0TLU-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-26XA-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BC-02HY', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-0732-A03', NULL, NULL, NULL, NULL),
	(52, 3, '10.0.0.112', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LF8D', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-5CL-014V-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63U-15JU-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-25WL-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BC-0EJC', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-07QI-A03', NULL, NULL, NULL, NULL),
	(53, 3, '10.0.0.113', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nZ9A1DPT5', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-5CL-0107-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63T-1EMU-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-22U8-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BC-0B2W', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-07E3-A03', NULL, NULL, NULL, NULL),
	(54, 3, '10.0.0.114', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nZ9A1DPT9', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-5CL-01BU-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63T-1EJU-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-22U6-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BC-00DZ', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-07E6-A03', NULL, NULL, NULL, NULL),
	(55, 3, '10.0.0.115', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LFCP', 'DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-615-02CJ-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63U-1A6U-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-24W8-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BH-0BUU', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-06CS-A03', NULL, NULL, NULL, NULL),
	(56, 3, '10.0.0.116', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nZ9A1DPKK', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-615-03CF-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-09DKC3-74261-59S-1T2U-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-26U9-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BI-09HZ', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-071U-A03', NULL, NULL, NULL, NULL),
	(57, 3, '10.0.0.117', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LDFJ', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-615-04K5-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63T-1N5U-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-2324-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BH-0E40', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-06AZ-A03', NULL, NULL, NULL, NULL),
	(58, 3, '10.0.0.118', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LKE0', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-615-0283-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63U-1A3U-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-26QU-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BC-0EW0', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-06D2-A03', NULL, NULL, NULL, NULL),
	(59, 3, '10.0.0.119', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LF0B', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-615-02PF-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63U-180U-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-280Z-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BC-02MR', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-06BB-A03', NULL, NULL, NULL, NULL),
	(60, 3, '10.0.0.120', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LH79', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-5CL-00TD-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-09DKC3-74261-59S-0GYU-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-24ZC-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BC-0F6F', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-07QH-A03', NULL, NULL, NULL, NULL),
	(61, 3, '10.0.0.121', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nW4Y6SDKT', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-615-01WT-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63T-1DHU-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-290I-A00', 'USB\r\nDELL\r\nMS111-T\r\n*', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-073H-A03', NULL, NULL, NULL, NULL),
	(62, 3, '10.0.0.122', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LEXG', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-615-03T7-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-09DKC3-74261-59S-1V7U-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-270E-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BH-0O3Y', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-06AW-A03', NULL, NULL, NULL, NULL),
	(63, 3, '10.0.0.123', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LG7B', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-615-01XY-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63P-0T6U-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-26OM-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BH-0MLR', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-06C7-A03', NULL, NULL, NULL, NULL),
	(64, 3, '10.0.0.124', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LJFT', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-5CL-0204-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63U-18AU-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-231J-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BC-0DA3', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-07DR-A03', NULL, NULL, NULL, NULL),
	(65, 3, '10.0.0.125', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LK3C', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-615-028D-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63U-17EU-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-28VI-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BH-0K2S', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-06CB-A03', NULL, NULL, NULL, NULL),
	(66, 3, '10.0.0.126', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LHP7', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-615-03T8-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63U-1D0U-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-26P2-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BC-06Z5', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-073B-A03', NULL, NULL, NULL, NULL),
	(67, 3, '10.0.0.127', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nW4Y6T5CG', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-615-038B-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63U-18CU-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-22V0-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BC-0AZT', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-07DT-A03', NULL, NULL, NULL, NULL),
	(68, 3, '10.0.0.128', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nZ9A1DA2H', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-615-028D-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63U-16YU-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-26TL-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BH-0DE4', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-06CJ-A03', NULL, NULL, NULL, NULL),
	(69, 3, '10.0.0.129', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9AOLK3C', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX \r\n00V62HCN-00V62H-72200-615-006R-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63T-1FEU-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-22SH-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BH-DEXM', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-07DR-A03', NULL, NULL, NULL, NULL),
	(70, 3, '10.0.0.130', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nS9A0LGAA', ' DELL Desktop Board\r\nDELL\r\nOPTIPLEX 9020\r\n00V62HCN-00V62H-72200-615-044I-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nMITRON\r\nDDR3\r\nMT8KTF51264AZ-1G6E1', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63P-0T9U-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-26ST-A00', 'USB\r\nDELL\r\nMS111-T\r\nCN-0KW2YH-71616-5BC-01KZ', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59I-070G-A03', NULL, NULL, NULL, NULL),
	(71, 3, '10.0.0.206(Server)', 'Capacidad 1TB  SATA-II\r\nSEAGATE\r\nST1000DM003\r\nZ9A1DMJ3', ' DELL Desktop Board\r\nDELL\r\nOptiplex 9020\r\n00V62HCN-00V62H-72200-615-04DV-A01', 'Intel Core i7-4790 8MB CACHÉ 3.6 GHZ\r\nINTEL\r\nCORE i7\r\n*', 'Capacidad 4GB DDR3-1RX8\r\nKINGSTON\r\nKVR16N11\r\nC3S4R036843', 'LED 24"\r\nDELL\r\nE2416HB\r\nCN-0PJJCT-74261-63T-1ENU-A00-B0-120', 'USB\r\nDELL\r\nKB212-B\r\nCN-0C639N-71616-5C1-26QM-A00', 'USB\r\nDELL\r\nMS111T\r\nCN-0KW2YH-71616-5BC-0E8D', 'INTEL HD GRAPHICS 4600 2GB (Integrado)\r\nINTEL\r\n*\r\n*', 'LAN ETHERNET 10/100/1000(Integrado)\r\nFOXCOM\r\n*\r\n*', 'DVD-Super Multi 8x (DVD-+/-RW)\r\nDATA STORAGE\r\nGTA0N\r\nMY-0V3171-48325-59H-061T-A03', NULL, NULL, NULL, NULL);

-- Volcando estructura para tabla sisgti.laboratorio
CREATE TABLE IF NOT EXISTS `laboratorio` (
  `id` int NOT NULL AUTO_INCREMENT,
  `num_laboratorio` int DEFAULT NULL,
  `pabellon` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sisgti.laboratorio: ~4 rows (aproximadamente)
DELETE FROM `laboratorio`;
INSERT INTO `laboratorio` (`id`, `num_laboratorio`, `pabellon`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 'A', '2023-12-04 17:26:44', '2023-12-22 15:38:19', '2023-12-05 15:28:49'),
	(2, 2, 'B', '2023-12-04 17:28:32', '2023-12-22 15:38:25', '2023-12-05 15:28:47'),
	(3, 3, 'C', '2023-12-04 17:28:40', '2023-12-22 15:38:29', '2023-12-05 15:28:48');

-- Volcando estructura para tabla sisgti.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sisgti.migrations: ~8 rows (aproximadamente)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_05_30_203319_crear_tabla_tipocurso', 1),
	(6, '2023_05_30_214608_eliminar_columna_igv_tabla_tipocurso', 1),
	(7, '2023_06_06_191517_crear_tabla_curso', 2),
	(9, '2023_06_20_182255_agregar_columna_deleted_at_users', 3);

-- Volcando estructura para tabla sisgti.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sisgti.password_reset_tokens: ~0 rows (aproximadamente)
DELETE FROM `password_reset_tokens`;

-- Volcando estructura para tabla sisgti.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sisgti.personal_access_tokens: ~0 rows (aproximadamente)
DELETE FROM `personal_access_tokens`;

-- Volcando estructura para tabla sisgti.programa
CREATE TABLE IF NOT EXISTS `programa` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_carrera` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rd_resolucion` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sisgti.programa: ~14 rows (aproximadamente)
DELETE FROM `programa`;
INSERT INTO `programa` (`id`, `nombre`, `cod_carrera`, `rd_resolucion`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 'DESARROLLO DE SISTEMAS', 'DSI', 'Nr0020220', NULL, '2023-07-21 18:26:09', NULL),
	(3, 'COMPUTACION E INFORMATICA', 'CI', 'NR020309', '2023-06-14 01:25:23', '2023-07-19 15:18:04', NULL),
	(4, 'CONTABILIDAD', 'CO', 'NR23421', '2023-06-14 01:25:32', '2023-07-19 15:18:14', NULL),
	(5, 'GUIA OFICIAL DE TURISMO ', 'GOT', 'yui', '2023-06-14 01:31:42', '2023-06-14 02:36:32', '2023-06-14 02:36:32'),
	(6, 'PRODUCCION AGROPECUARIA', 'PA', 'rty', '2023-06-14 01:32:51', '2023-06-14 02:36:29', '2023-06-14 02:36:29'),
	(8, 'ADMINISTRACION DE SERVICIOS DE HOTELERIA', 'ASH', 'NR29384', '2023-06-14 01:43:04', '2023-06-14 02:36:23', '2023-06-14 02:36:23'),
	(9, 'ADMINISTRACION DE SERVICIOS DE HOTELERIA Y RESTAURANTE', 'ASHR', 'NR42049', '2023-06-21 00:24:48', '2023-06-21 00:24:48', NULL),
	(10, 'CONSTRUCCION CIVIL', 'CC', 'RD3242', '2023-07-13 01:36:17', '2023-07-19 15:34:34', NULL),
	(11, 'INDUSTRIAS ALIMENTARIAS', 'IA', 'RD224', '2023-07-13 01:37:07', '2023-07-19 15:34:27', NULL),
	(12, 'INDUSTRIAS ALIMENTARIAS Y BEBIDAS', 'IAB', 'RD123534', '2023-07-13 01:47:45', '2023-07-19 15:34:19', NULL),
	(13, 'asdadasdasd', 'ase', 'qwe', NULL, '2023-07-19 14:41:54', '2023-07-19 14:41:54'),
	(14, 'sdfsdf', 'fsdf', 'dfsdf', '2023-07-19 15:33:54', '2023-07-19 15:33:59', '2023-07-19 15:33:59'),
	(15, 'Ingenieria de Sistemas', 'INGS', 'NRO9437', '2023-07-21 13:33:21', '2023-10-23 17:31:20', '2023-10-23 17:31:20'),
	(16, 'FGHYUJ', 'GFH', '152856', '2023-12-01 15:28:17', '2023-12-01 15:28:27', '2023-12-01 15:28:27');

-- Volcando estructura para tabla sisgti.tipocurso
CREATE TABLE IF NOT EXISTS `tipocurso` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `cod_carrera` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sisgti.tipocurso: ~13 rows (aproximadamente)
DELETE FROM `tipocurso`;
INSERT INTO `tipocurso` (`id`, `nombre`, `created_at`, `updated_at`, `deleted_at`, `cod_carrera`) VALUES
	(2, 'COMPUTACION E INFORMATICA', '2023-07-18 13:09:43', '2023-07-18 15:14:20', '2023-07-18 15:14:20', 'CI'),
	(3, 'CUIA OFICIAL DE TURISMO', '2023-06-14 01:25:23', '2023-07-18 15:55:53', '2023-07-18 15:55:53', 'GOT'),
	(4, 'INDUSTRIAS ALIMENTARIAS', '2023-06-14 01:25:32', '2023-06-14 01:25:32', '2023-07-18 13:09:24', 'IA'),
	(5, 'INDUSTRIAS ALIMENTARIAS Y BEBIDAS', '2023-06-14 01:31:42', '2023-06-14 02:36:32', '2023-06-14 02:36:32', 'IAB'),
	(6, 'DESARROLLO DE SISTEMA', '2023-06-14 01:32:51', '2023-06-14 02:36:29', '2023-06-14 02:36:29', 'DSI'),
	(8, 'CONTABILIDAD', '2023-06-14 01:43:04', '2023-06-14 02:36:23', '2023-06-14 02:36:23', 'CO'),
	(9, 'ADMINISTRACION DE SERVICIOS DE HOSTELERIA', '2023-06-21 00:24:48', '2023-06-21 00:24:48', '2023-07-18 13:09:21', 'ASH'),
	(10, 'ADMINISTRACION DE SERVICIOS DE HOSTELERIA Y RESTAURANTE', '2023-07-13 01:36:17', '2023-07-18 14:54:05', '2023-07-18 14:54:05', 'ASHR'),
	(11, 'CONSTRUCCION CIVIL', '2023-07-13 01:37:07', '2023-07-18 15:12:49', '2023-07-18 15:12:49', 'CC'),
	(12, 'PRODUCCION AGROPECUARIA', '2023-07-13 01:47:45', '2023-07-13 01:47:45', '2023-07-18 13:09:25', 'PA'),
	(14, 'GUIA PÓ0PÑ\'Ñ0', '2023-07-18 15:56:15', '2023-07-18 15:56:15', '2023-07-18 13:09:23', 'CFCF'),
	(15, 'Desarrollo de sistemas de la informacion', '2023-07-19 13:56:01', '2023-07-19 14:33:12', '2023-07-19 14:33:12', 'DSI'),
	(16, 'sdfdsffgdfg', '2023-07-19 14:33:26', '2023-07-19 14:33:42', '2023-07-19 14:33:42', 'sdf');

-- Volcando estructura para tabla sisgti.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla sisgti.users: ~10 rows (aproximadamente)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Juan Perez', 'jperez@gmail.com', '2023-11-16 15:03:39', '$2y$10$XueG8mUFfGpZevln0dRXv..g0mksmYT97FkdjluTVVqRb88PfeFSm', NULL, '2023-06-21 01:17:23', '2023-11-17 14:33:52', '2023-11-17 14:33:52'),
	(2, 'Ruben', 'ruben@gmail.com', '2023-06-21 01:53:39', '$2y$10$rc6T6vnXwX/.jA5/ifOAUe3sHAa.XqpAYSvzyUyObJYYkMydbRnYG', 'CCAGW5xnX6ZjMr5xV0YX0Txx2S8pqnP2A0Tia3t0jzyaOKN9Kzp3JrZz2nbt', '2023-06-21 01:37:19', '2023-11-17 14:33:56', '2023-11-17 14:33:56'),
	(4, 'Bartolome', 'bartolome@gmail.com', '2023-06-30 01:51:41', '$2y$10$O9p8YUDeGdirVkWMA9hXde9iE9b4hvBYceXpbBaI2X0TJRc2l3Pv6', NULL, '2023-06-21 01:49:50', '2023-11-17 14:33:47', '2023-11-17 14:33:47'),
	(5, 'Alex Huillca', 'alexfhuillca@gmail.com', '2023-07-12 20:26:25', '$2y$10$n3L4XQCLD9.xy3hEx3X4aOenYIyyiHYb0EnMazau9XjOpext4wICi', NULL, '2023-07-13 01:23:31', '2023-07-13 01:23:31', NULL),
	(6, 'Diego Durand', 'diedu@gmail.com', '2023-07-21 13:17:06', '12345678', NULL, '2023-11-16 14:47:32', '2023-11-17 14:33:49', '2023-11-17 14:33:49'),
	(7, 'Katty Salas', 'katty@gmail.com', '2023-11-16 14:46:58', '12345678', NULL, '2023-11-16 14:47:29', '2023-11-16 14:47:38', '2023-11-16 14:52:00'),
	(8, 'Julio Cesar Gastañaga Lines', 'julio@gmail.com', '2023-11-17 14:31:36', '$2y$10$gNCk1RWvygGNzBH8.fGm6uaC/TdGktB.iJTCciC6Hkzh9WkMlRztW', NULL, '2023-11-17 14:31:14', '2023-11-17 14:31:14', NULL),
	(9, 'Diego Durand Pacheco', 'diego@gmail.com', '2023-12-05 17:50:27', '$2y$10$kzLFOex8Ysy1IJ.dLZQz4OOadgCddAYDvNeRcnk3nr/e7Clux5mse', NULL, '2023-11-17 14:34:23', '2023-11-17 14:34:23', NULL),
	(10, 'Julio Moreno Linares', 'juliom@gmail.com', '2023-12-05 17:50:28', '$2y$10$wYpvFczuU5e/wJNqIINLxufwfFNeSuZAEDqKC1KeGGf4P5CggAp.K', NULL, '2023-11-17 14:35:09', '2023-11-17 14:35:09', NULL),
	(11, 'Ruh', 'ruth@gmail.com', '2023-12-05 17:44:41', '$2y$10$X9HM0vAPqvcz6dSeP4ExPO/Im.eT6heFM/IUK4X0pL6sFESjWnyWO', NULL, '2023-12-05 17:44:01', '2023-12-05 17:44:01', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
