-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.8-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para crud
CREATE DATABASE IF NOT EXISTS `crud` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `crud`;

-- Copiando estrutura para tabela crud.tb_cliente
CREATE TABLE IF NOT EXISTS `tb_cliente` (
  `cli_id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_nome` varchar(100) NOT NULL,
  `cli_dtnascimento` date DEFAULT NULL,
  `cli_cpf` varchar(20) NOT NULL,
  `cli_telefone` varchar(15) NOT NULL,
  PRIMARY KEY (`cli_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela crud.tb_endereco
CREATE TABLE IF NOT EXISTS `tb_endereco` (
  `end_id` int(11) NOT NULL AUTO_INCREMENT,
  `end_bairro` varchar(60) NOT NULL,
  `end_estado` varchar(20) NOT NULL,
  `end_cep` varchar(10) NOT NULL,
  `end_pontreferencia` varchar(100) NOT NULL,
  `end_cidade` varchar(60) NOT NULL,
  `end_numero` varchar(10) NOT NULL,
  `end_cli_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`end_id`),
  KEY `end_cli_id` (`end_cli_id`),
  CONSTRAINT `tb_endereco_ibfk_1` FOREIGN KEY (`end_cli_id`) REFERENCES `tb_cliente` (`cli_id`)
  ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela crud.tb_usuario
CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_senha` varchar(32) NOT NULL,
  `usu_nome` varchar(100) NOT NULL,
  `usu_email` varchar(100) NOT NULL,
  `usu_telefone` varchar(30) NOT NULL,
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
