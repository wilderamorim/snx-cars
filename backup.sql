-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.37-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando estrutura para tabela smart-nx_snx-cars.cars
CREATE TABLE IF NOT EXISTS `cars` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) unsigned NOT NULL,
  `model_id` int(11) unsigned NOT NULL,
  `year` char(4) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `city` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `content` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `brand_id` (`brand_id`),
  KEY `model_id` (`model_id`),
  CONSTRAINT `cars_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cars_ibfk_2` FOREIGN KEY (`model_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela smart-nx_snx-cars.cars: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` (`id`, `brand_id`, `model_id`, `year`, `price`, `city`, `description`, `content`, `created_at`, `updated_at`) VALUES
	(1, 2, 5, '2020', 1000.00, 'São Paulo', 'asd', 'das', '2020-11-05 20:59:31', '2020-11-05 22:05:39'),
	(4, 2, 5, '2020', 50.50, 'Juiz de Fora', 'asd', 'asd', '2020-11-05 22:32:55', '2020-11-06 18:07:19'),
	(5, 1, 5, '2020', 5998.72, 'Caldas Novas', '789', '123', '2020-11-06 17:31:39', '2020-11-06 17:31:39'),
	(6, 3, 6, '2020', 98765.43, 'Curitiba', 'some desc', 'full desc', '2020-11-06 20:23:36', '2020-11-06 20:23:57');
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;

-- Copiando estrutura para tabela smart-nx_snx-cars.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text,
  `type` char(255) NOT NULL DEFAULT 'brand',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela smart-nx_snx-cars.categories: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `title`, `slug`, `description`, `type`, `created_at`, `updated_at`) VALUES
	(1, 'Audi', 'audi', NULL, 'brand', '2020-11-05 19:32:47', NULL),
	(2, 'BMW', 'bmw', NULL, 'brand', '2020-11-05 19:33:02', NULL),
	(3, 'Chevrolet', 'chevrolet', NULL, 'brand', '2020-11-05 19:33:20', NULL),
	(4, 'Modelo 1', 'modelo-1', NULL, 'model', '2020-11-05 19:34:23', NULL),
	(5, 'Modelo 2', 'modelo-2', NULL, 'model', '2020-11-05 19:34:23', NULL),
	(6, 'Modelo 3', 'modelo-3', NULL, 'model', '2020-11-05 19:34:23', NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Copiando estrutura para tabela smart-nx_snx-cars.phinxlog
CREATE TABLE IF NOT EXISTS `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela smart-nx_snx-cars.phinxlog: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `phinxlog` DISABLE KEYS */;
INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`, `breakpoint`) VALUES
	(20201105212559, 'Categories', '2020-11-05 20:30:56', '2020-11-05 20:30:56', 0),
	(20201105212600, 'Cars', '2020-11-05 20:30:56', '2020-11-05 20:30:56', 0);
/*!40000 ALTER TABLE `phinxlog` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
