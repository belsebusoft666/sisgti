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

-- Volcando datos para la tabla sisgti.docente: ~0 rows (aproximadamente)
DELETE FROM `docente`;
INSERT INTO `docente` (`id`, `nombre`, `apellido`, `dni`, `celular`, `imagen`, `programa_id`, `created_at`, `updated_at`) VALUES
	(1, 'Alex Fernando', 'Huilca Huaman', '74859654', '987654321', 'public/docentes/WY7zoYqYdBOTpnQ0j0GqAtwsc1xoKqQ2DYE34YKj.png', 9, '2023-11-17 14:24:54', '2023-11-17 14:24:54'),
	(2, 'Jose Luis', 'Pimeltel Zegarra', '85745215', '985632541', 'public/docentes/9nJegiSd61nDzzeGUJZK6PBBCbvSkf8RQCFw20iP.png', 3, '2023-11-17 14:26:04', '2023-11-17 14:26:04');

-- Volcando datos para la tabla sisgti.estudiante: ~5 rows (aproximadamente)
DELETE FROM `estudiante`;
INSERT INTO `estudiante` (`id`, `nombre`, `apellido`, `dni`, `celular`, `imagen`, `programa_id`, `created_at`, `updated_at`) VALUES
	(17, 'Julio', 'Gastañaga', '75859656', '956868486', 'public/estudiantes/944JySBSLfaNbbOFKUVZ8eq6a3DffddtcTODhgv5.png', 2, '2023-07-21 13:32:23', '2023-11-17 14:28:25'),
	(19, 'Katty', 'Torres', '45456456', '654564565', 'public/estudiantes/xKWn5Yz671Fbtc5eQnpPB4iX1QFujXrWV33OEJVG.png', 10, '2023-07-21 15:10:02', '2023-11-17 14:27:57'),
	(20, 'Yudi', 'Jara', '78459623', '987654321', 'public/estudiantes/4RoUTnfek8jOHb2HffTzs6N4tig7DVWbYw4LObe3.png', 4, '2023-07-21 15:17:17', '2023-11-17 14:28:15'),
	(21, 'Juan', 'Perez', '78596859', '965868596', 'public/estudiantes/MSBZfVscJTd6RvjvCM5Uo0qz6DCPtJkWeIP8Kqj8.png', 4, '2023-07-21 18:26:49', '2023-11-17 14:28:43'),
	(22, 'Luis', 'Santana', '85967420', '956064583', 'public/estudiantes/3Rmu1l9jGx5EfSwh8lBz8NWgEraeoZxI71GS0ciC.png', 2, '2023-10-23 17:15:06', '2023-11-17 14:28:32'),
	(23, 'Ruth Maricarmen', 'Zambrano Mejia', '76022380', '956869574', 'public/estudiantes/ttEt9TV95kvB0d9thFLsJBaozlgfwAaDZCEyTrXC.png', 4, '2023-11-17 14:36:35', '2023-11-17 14:36:35'),
	(24, 'Jade', 'Jara', '78585969', '963852741', 'public/estudiantes/jGR25nfL31tgdmJyoS16BWZvMr4WMzATHNIbKoYF.png', 10, '2023-11-17 14:39:43', '2023-11-17 14:40:10');

-- Volcando datos para la tabla sisgti.failed_jobs: ~0 rows (aproximadamente)
DELETE FROM `failed_jobs`;

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

-- Volcando datos para la tabla sisgti.password_reset_tokens: ~0 rows (aproximadamente)
DELETE FROM `password_reset_tokens`;

-- Volcando datos para la tabla sisgti.personal_access_tokens: ~0 rows (aproximadamente)
DELETE FROM `personal_access_tokens`;

-- Volcando datos para la tabla sisgti.programa: ~13 rows (aproximadamente)
DELETE FROM `programa`;
INSERT INTO `programa` (`id`, `nombre`, `created_at`, `updated_at`, `deleted_at`, `cod_carrera`, `rd_resolucion`) VALUES
	(2, 'DESARROLLO DE SISTEMAS', NULL, '2023-07-21 18:26:09', NULL, 'DSI', 'Nr0020220'),
	(3, 'COMPUTACION E INFORMATICA', '2023-06-14 01:25:23', '2023-07-19 15:18:04', NULL, 'CI', 'NR020309'),
	(4, 'CONTABILIDAD', '2023-06-14 01:25:32', '2023-07-19 15:18:14', NULL, 'CO', 'NR23421'),
	(5, 'GUIA OFICIAL DE TURISMO ', '2023-06-14 01:31:42', '2023-06-14 02:36:32', '2023-06-14 02:36:32', 'GOT', 'yui'),
	(6, 'PRODUCCION AGROPECUARIA', '2023-06-14 01:32:51', '2023-06-14 02:36:29', '2023-06-14 02:36:29', 'PA', 'rty'),
	(8, 'ADMINISTRACION DE SERVICIOS DE HOTELERIA', '2023-06-14 01:43:04', '2023-06-14 02:36:23', '2023-06-14 02:36:23', 'ASH', 'NR29384'),
	(9, 'ADMINISTRACION DE SERVICIOS DE HOTELERIA Y RESTAURANTE', '2023-06-21 00:24:48', '2023-06-21 00:24:48', NULL, 'ASHR', 'NR42049'),
	(10, 'CONSTRUCCION CIVIL', '2023-07-13 01:36:17', '2023-07-19 15:34:34', NULL, 'CC', 'RD3242'),
	(11, 'INDUSTRIAS ALIMENTARIAS', '2023-07-13 01:37:07', '2023-07-19 15:34:27', NULL, 'IA', 'RD224'),
	(12, 'INDUSTRIAS ALIMENTARIAS Y BEBIDAS', '2023-07-13 01:47:45', '2023-07-19 15:34:19', NULL, 'IAB', 'RD123534'),
	(13, 'asdadasdasd', NULL, '2023-07-19 14:41:54', '2023-07-19 14:41:54', 'ase', 'qwe'),
	(14, 'sdfsdf', '2023-07-19 15:33:54', '2023-07-19 15:33:59', '2023-07-19 15:33:59', 'fsdf', 'dfsdf'),
	(15, 'Ingenieria de Sistemas', '2023-07-21 13:33:21', '2023-10-23 17:31:20', '2023-10-23 17:31:20', 'INGS', 'NRO9437');

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

-- Volcando datos para la tabla sisgti.users: ~5 rows (aproximadamente)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Juan Perez', 'jperez@gmail.com', '2023-11-16 15:03:39', '$2y$10$XueG8mUFfGpZevln0dRXv..g0mksmYT97FkdjluTVVqRb88PfeFSm', NULL, '2023-06-21 01:17:23', '2023-11-17 14:33:52', '2023-11-17 14:33:52'),
	(2, 'Ruben', 'ruben@gmail.com', '2023-06-21 01:53:39', '$2y$10$rc6T6vnXwX/.jA5/ifOAUe3sHAa.XqpAYSvzyUyObJYYkMydbRnYG', 'CCAGW5xnX6ZjMr5xV0YX0Txx2S8pqnP2A0Tia3t0jzyaOKN9Kzp3JrZz2nbt', '2023-06-21 01:37:19', '2023-11-17 14:33:56', '2023-11-17 14:33:56'),
	(4, 'Bartolome', 'bartolome@gmail.com', '2023-06-30 01:51:41', '$2y$10$O9p8YUDeGdirVkWMA9hXde9iE9b4hvBYceXpbBaI2X0TJRc2l3Pv6', NULL, '2023-06-21 01:49:50', '2023-11-17 14:33:47', '2023-11-17 14:33:47'),
	(5, 'Alex Huillca', 'alexfhuillca@gmail.com', '2023-07-12 20:26:25', '$2y$10$n3L4XQCLD9.xy3hEx3X4aOenYIyyiHYb0EnMazau9XjOpext4wICi', NULL, '2023-07-13 01:23:31', '2023-07-13 01:23:31', NULL),
	(6, 'Diego Durand', 'diedu@gmail.com', '2023-07-21 13:17:06', '12345678', NULL, '2023-11-16 14:47:32', '2023-11-17 14:33:49', '2023-11-17 14:33:49'),
	(7, 'Katty Salas', 'katty@gmail.com', '2023-11-16 14:46:58', '12345678', NULL, '2023-11-16 14:47:29', '2023-11-16 14:47:38', '2023-11-16 14:52:00'),
	(8, 'Julio Cesar Gastañaga Lines', 'julio@gmail.com', '2023-11-17 14:31:36', '$2y$10$gNCk1RWvygGNzBH8.fGm6uaC/TdGktB.iJTCciC6Hkzh9WkMlRztW', NULL, '2023-11-17 14:31:14', '2023-11-17 14:31:14', NULL),
	(9, 'Diego Durand Pacheco', 'diego@gmail.com', NULL, '$2y$10$kzLFOex8Ysy1IJ.dLZQz4OOadgCddAYDvNeRcnk3nr/e7Clux5mse', NULL, '2023-11-17 14:34:23', '2023-11-17 14:34:23', NULL),
	(10, 'Julio Moreno Linares', 'juliom@gmail.com', NULL, '$2y$10$wYpvFczuU5e/wJNqIINLxufwfFNeSuZAEDqKC1KeGGf4P5CggAp.K', NULL, '2023-11-17 14:35:09', '2023-11-17 14:35:09', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
