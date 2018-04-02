-- --------------------------------------------------------
-- Servidor:                     localhost
-- Versão do servidor:           10.1.26-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------


-- Copiando estrutura do banco de dados para bravi_test
CREATE DATABASE IF NOT EXISTS `bravi_test` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bravi_test`;

-- Copiando estrutura para tabela bravi_test.peoples
CREATE TABLE IF NOT EXISTS `peoples` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bravi_test.peoples: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `peoples` DISABLE KEYS */;
INSERT INTO `peoples` (`id`, `name`) VALUES
	(1, 'Pedro');
/*!40000 ALTER TABLE `peoples` ENABLE KEYS */;

-- Copiando estrutura para tabela bravi_test.contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) DEFAULT '0',
  `value` varchar(50) DEFAULT '0',
  `id_people` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_people` (`id_people`),
  CONSTRAINT `id_people` FOREIGN KEY (`id_people`) REFERENCES `peoples` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela bravi_test.contacts: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` (`id`, `type`, `value`, `id_people`) VALUES
	(19, 'PHONE', '81-99941867', 1),
	(20, 'EMAIL', 'pedroteste@gmail.com', 1);
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;


