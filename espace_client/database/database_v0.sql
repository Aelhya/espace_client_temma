-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.6.4-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage des données de la table temma.category : ~5 rows (environ)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `label`, `icon`) VALUES
	(1, 'Factures', 'fa-file-invoice-dollar'),
	(2, 'Devis', 'fa-file-lines'),
	(3, 'Maintenance', 'fa-screwdriver-wrench'),
	(4, 'Données machines', 'fa-database'),
	(5, 'Echanges', 'fa-headset');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Listage des données de la table temma.file : ~0 rows (environ)
/*!40000 ALTER TABLE `file` DISABLE KEYS */;
/*!40000 ALTER TABLE `file` ENABLE KEYS */;

-- Listage des données de la table temma.reset_password_request : ~0 rows (environ)
/*!40000 ALTER TABLE `reset_password_request` DISABLE KEYS */;
/*!40000 ALTER TABLE `reset_password_request` ENABLE KEYS */;

-- Listage des données de la table temma.user : ~2 rows (environ)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `email`, `password`, `firstname`, `lastname`, `is_verified`, `enterprise`, `civility`, `login`, `roles`, `is_admin`) VALUES
	(2, 'admin@admin.fr', '$2y$13$xvHx3CSTtR0A14a0M.lApe49DT9CMS.0tnwERpDN9TL9kQGohMlz2', 'Admin', 'Admin', 1, 'Temma', 'Monsieur', 'adminLP', '["ROLE_ADMIN"]', 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
