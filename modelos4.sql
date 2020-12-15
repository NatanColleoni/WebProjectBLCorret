-- --------------------------------------------------------
-- Servidor:                     mysql01-farm2.uni5.net
-- Versão do servidor:           10.2.32-MariaDB-log - MariaDB Server
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela dev41.analytics
CREATE TABLE IF NOT EXISTS `analytics` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) DEFAULT NULL,
  `codigo` text DEFAULT NULL,
  `codigo_2` text DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Copiando dados para a tabela dev41.analytics: ~3 rows (aproximadamente)
DELETE FROM `analytics`;
/*!40000 ALTER TABLE `analytics` DISABLE KEYS */;
INSERT INTO `analytics` (`id`, `titulo`, `codigo`, `codigo_2`, `data_cadastro`, `data_alteracao`, `excluido`) VALUES
	(1, 'Analytics', NULL, NULL, NULL, '2020-07-13 17:54:59', 0),
	(2, 'Pixel Facebook', NULL, NULL, NULL, '2020-07-02 08:28:29', 0),
	(3, 'Tag Manegement', NULL, NULL, NULL, '2020-07-02 08:28:27', 0);
/*!40000 ALTER TABLE `analytics` ENABLE KEYS */;

-- Copiando estrutura para tabela dev41.banner
CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `page_fk` int(11) unsigned DEFAULT 1,
  `tipo_fk` int(11) unsigned DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `nome_foto` varchar(255) DEFAULT NULL,
  `nome_video` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT '',
  `target` varchar(255) DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK_banner_metatagss` (`page_fk`),
  KEY `FK_banner_banner_tipo` (`tipo_fk`),
  CONSTRAINT `FK_banner_banner_tipo` FOREIGN KEY (`tipo_fk`) REFERENCES `banner_tipo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_banner_metatags` FOREIGN KEY (`page_fk`) REFERENCES `metatags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dev41.banner: ~12 rows (aproximadamente)
DELETE FROM `banner`;
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
INSERT INTO `banner` (`id`, `page_fk`, `tipo_fk`, `titulo`, `nome_foto`, `nome_video`, `url`, `target`, `texto`, `ordem`, `data_cadastro`, `data_alteracao`, `excluido`) VALUES
	(1, 1, 2, 'Banner', '15858459287165_banner-mobile.jpg', NULL, NULL, '_parent', NULL, NULL, '2020-01-01 07:40:01', '2020-01-01 07:40:01', 0),
	(2, 1, 2, 'Banner', '15858459373131_banner-mobile.jpg', NULL, NULL, '_parent', NULL, NULL, '2020-01-01 07:40:02', '2020-01-01 07:40:02', 0),
	(3, 1, 1, 'Banner', '15858457101565_banner.jpg', NULL, NULL, '_parent', NULL, NULL, '2020-01-01 07:40:03', '2020-01-01 07:40:03', 0),
	(4, 1, 1, 'Banner', '15858457219746_banner.jpg', NULL, NULL, '_parent', NULL, NULL, '2020-01-01 07:40:04', '2020-01-01 07:40:04', 0),
	(5, 3, 3, 'Banner', '15859206152061_banner-home-produto.jpg', NULL, NULL, '_parent', NULL, NULL, '2020-01-01 07:40:05', '2020-01-01 07:40:05', 0),
	(6, 3, 2, 'Banner', '15859206308285_banner-mobile.jpg', NULL, NULL, '_parent', NULL, NULL, '2020-01-01 07:40:06', '2020-01-01 07:40:06', 0),
	(7, 2, 4, 'Banner', '15859219858357_banner-inst.jpg', NULL, NULL, '_parent', NULL, NULL, '2020-01-01 07:40:07', '2020-01-01 07:40:07', 0),
	(8, 2, 2, 'Banner', '15859221148434_banner-inst-mob.png', NULL, NULL, '_parent', NULL, NULL, '2020-01-01 07:40:08', '2020-01-01 07:40:08', 0),
	(9, 4, 5, 'Banner', '15859443556648_banner-franquia.jpg', NULL, NULL, '_parent', NULL, NULL, '2020-01-01 07:40:09', '2020-04-03 17:05:56', 0),
	(10, 4, 2, 'Banner', '15859444725863_banner-franquia-mob.jpg', NULL, NULL, '_parent', NULL, NULL, '2020-01-01 07:40:10', '2020-04-03 17:07:53', 0),
	(11, 6, 6, 'Banner', '15861774140043_banner-contato.jpg', NULL, NULL, '_parent', NULL, NULL, '2020-01-01 07:40:11', '2020-04-06 09:50:14', 0),
	(12, 6, 2, 'Banner', '15861775799906_banner-contato-mob.jpg', NULL, NULL, '_parent', NULL, NULL, '2020-01-01 07:40:12', '2020-04-06 09:53:00', 0);
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;

-- Copiando estrutura para tabela dev41.banner_target
CREATE TABLE IF NOT EXISTS `banner_target` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `class` varchar(30) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Copiando dados para a tabela dev41.banner_target: ~5 rows (aproximadamente)
DELETE FROM `banner_target`;
/*!40000 ALTER TABLE `banner_target` DISABLE KEYS */;
INSERT INTO `banner_target` (`id`, `titulo`, `descricao`, `class`, `data_cadastro`, `data_alteracao`, `excluido`) VALUES
	(1, 'Abrir Link Na Mesma Janela', 'Abre o link inserido na mesma janela/aba.', '_parent', NULL, NULL, 0),
	(2, 'Abrir Link Em uma Nova Aba', 'Abre o link inserido em outra aba', '_blank', NULL, NULL, 0),
	(3, 'Video do Youtube', 'ID do Vídeo: https://www.youtube.com/watch?v=<span class=\'c-red\'>H9uc-Us9Lok</span>', 'yt', NULL, NULL, 0),
	(4, 'Video do Vimeo', 'Define que o fundo será um video', 'vm', NULL, NULL, 0),
	(5, 'Upload de Vídeo', 'Define banner como um video', 'up', NULL, NULL, 0);
/*!40000 ALTER TABLE `banner_target` ENABLE KEYS */;

-- Copiando estrutura para tabela dev41.banner_tipo
CREATE TABLE IF NOT EXISTS `banner_tipo` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `resolucao` varchar(30) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT COMMENT='Mobile < 768;\r\nTable > 767, < 992;\r\nDesktop > 991;';

-- Copiando dados para a tabela dev41.banner_tipo: ~6 rows (aproximadamente)
DELETE FROM `banner_tipo`;
/*!40000 ALTER TABLE `banner_tipo` DISABLE KEYS */;
INSERT INTO `banner_tipo` (`id`, `titulo`, `descricao`, `resolucao`, `data_cadastro`, `data_alteracao`, `excluido`) VALUES
	(1, 'Desktop', 'Home', '1920px x 875px', '2020-01-01 08:00:01', '2020-01-01 08:00:01', 0),
	(2, 'Mobile', 'Telas Menores que 992px', '991px x 530px', '2020-01-01 08:00:02', '2020-01-01 08:00:02', 0),
	(3, 'Desktop', 'Produto', '1920px x 612px', '2020-01-01 08:00:03', '2020-01-01 08:00:03', 0),
	(4, 'Desktop', 'Institucional', '1920px x 603px', '2020-01-01 08:00:04', '2020-01-01 08:00:04', 0),
	(5, 'Desktop', 'Franquia', '1920px x 435px', '2020-01-01 08:00:05', '2020-01-01 08:00:05', 0),
	(6, 'Desktop', 'Contato', '1920px x 901px', '2020-01-01 08:00:06', '2020-01-01 08:00:06', 0);
/*!40000 ALTER TABLE `banner_tipo` ENABLE KEYS */;

-- Copiando estrutura para tabela dev41.blog
CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `nome_foto` varchar(255) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Copiando dados para a tabela dev41.blog: ~0 rows (aproximadamente)
DELETE FROM `blog`;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;

-- Copiando estrutura para tabela dev41.cidade
CREATE TABLE IF NOT EXISTS `cidade` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `estado_fk` int(11) unsigned DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK_cidade_estado` (`estado_fk`),
  CONSTRAINT `FK_cidade_estado` FOREIGN KEY (`estado_fk`) REFERENCES `estado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Copiando dados para a tabela dev41.cidade: ~0 rows (aproximadamente)
DELETE FROM `cidade`;
/*!40000 ALTER TABLE `cidade` DISABLE KEYS */;
/*!40000 ALTER TABLE `cidade` ENABLE KEYS */;

-- Copiando estrutura para tabela dev41.config
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado_fk` int(11) unsigned DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `fone` varchar(255) DEFAULT NULL,
  `fone_2` varchar(255) DEFAULT NULL,
  `cel` varchar(255) DEFAULT NULL,
  `mapa` text DEFAULT NULL,
  `atendimento` text DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `estado_fk` (`estado_fk`),
  CONSTRAINT `FK_config_estado` FOREIGN KEY (`estado_fk`) REFERENCES `estado` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dev41.config: ~0 rows (aproximadamente)
DELETE FROM `config`;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` (`id`, `titulo`, `email`, `endereco`, `numero`, `complemento`, `bairro`, `cep`, `cidade`, `estado_fk`, `latitude`, `longitude`, `fone`, `fone_2`, `cel`, `mapa`, `atendimento`, `keyword`, `descricao`, `data_cadastro`, `data_alteracao`, `excluido`) VALUES
	(1, 'Desenvolvimento', 'desenvolvimento9@byteabyte.com.br', 'Rua XX', 'XX', NULL, 'Zona XX', 'xxxxx-xxx', 'xxxx', 16, NULL, NULL, 'xx xxxxx-xxxx', 'xx xxxxx-xxxx', 'xx xxxxx-xxxx', '', '<p>Segunda a Sexta das 08:00h &agrave;s 18h</p>\r\n<p>S&aacute;bado das 08:00h &agrave;s 12:00h</p>', '', '', '2019-05-07 11:28:03', '2020-04-02 15:02:24', 0);
/*!40000 ALTER TABLE `config` ENABLE KEYS */;

-- Copiando estrutura para tabela dev41.contato
CREATE TABLE IF NOT EXISTS `contato` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `assunto` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `mensagem` text DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `data_leitura` datetime DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Campos de ip, data, excluido, ultimaModificação... não remova...';

-- Copiando dados para a tabela dev41.contato: ~0 rows (aproximadamente)
DELETE FROM `contato`;
/*!40000 ALTER TABLE `contato` DISABLE KEYS */;
/*!40000 ALTER TABLE `contato` ENABLE KEYS */;

-- Copiando estrutura para tabela dev41.email
CREATE TABLE IF NOT EXISTS `email` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dev41.email: ~0 rows (aproximadamente)
DELETE FROM `email`;
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
INSERT INTO `email` (`id`, `nome`, `email`, `data_cadastro`, `data_alteracao`, `excluido`) VALUES
	(1, 'Contato', 'desenvolvimento7@byteabyte.com.br', '2020-01-01 08:00:01', '2020-01-01 08:00:01', 0);
/*!40000 ALTER TABLE `email` ENABLE KEYS */;

-- Copiando estrutura para tabela dev41.email_ctg
CREATE TABLE IF NOT EXISTS `email_ctg` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dev41.email_ctg: ~0 rows (aproximadamente)
DELETE FROM `email_ctg`;
/*!40000 ALTER TABLE `email_ctg` DISABLE KEYS */;
INSERT INTO `email_ctg` (`id`, `titulo`, `data_cadastro`, `data_alteracao`, `excluido`) VALUES
	(1, 'Contato', '2020-01-01 08:00:01', '2020-01-01 08:00:01', 0);
/*!40000 ALTER TABLE `email_ctg` ENABLE KEYS */;

-- Copiando estrutura para tabela dev41.email_rf_ctg
CREATE TABLE IF NOT EXISTS `email_rf_ctg` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email_fk` int(11) unsigned DEFAULT NULL,
  `email_ctg_fk` int(11) unsigned DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `email_fk` (`email_fk`),
  KEY `email_ctg_fk` (`email_ctg_fk`),
  CONSTRAINT `FK_email_rf_ctg_email` FOREIGN KEY (`email_fk`) REFERENCES `email` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_email_rf_ctg_email_ctg` FOREIGN KEY (`email_ctg_fk`) REFERENCES `email_ctg` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Tabela ligacao de emails com categorias (setores)';

-- Copiando dados para a tabela dev41.email_rf_ctg: ~0 rows (aproximadamente)
DELETE FROM `email_rf_ctg`;
/*!40000 ALTER TABLE `email_rf_ctg` DISABLE KEYS */;
INSERT INTO `email_rf_ctg` (`id`, `email_fk`, `email_ctg_fk`, `data_cadastro`, `data_alteracao`, `excluido`) VALUES
	(1, 1, 1, '2020-01-01 08:00:01', '2020-01-01 08:00:01', 0);
/*!40000 ALTER TABLE `email_rf_ctg` ENABLE KEYS */;

-- Copiando estrutura para tabela dev41.estado
CREATE TABLE IF NOT EXISTS `estado` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(20) NOT NULL DEFAULT '',
  `pais_fk` int(11) DEFAULT NULL,
  `uf` varchar(2) NOT NULL DEFAULT '',
  `ordem` int(11) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dev41.estado: ~27 rows (aproximadamente)
DELETE FROM `estado`;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` (`id`, `titulo`, `pais_fk`, `uf`, `ordem`, `data_cadastro`, `data_alteracao`, `excluido`) VALUES
	(1, 'Acre', 1, 'AC', 3, NULL, NULL, 0),
	(2, 'Alagoas', 1, 'AL', 2, NULL, NULL, 0),
	(3, 'Amapá', 1, 'AP', 3, NULL, NULL, 0),
	(4, 'Amazonas', 1, 'AM', 3, NULL, NULL, 0),
	(5, 'Bahia', 1, 'BA', 2, NULL, NULL, 0),
	(6, 'Ceará', 1, 'CE', 2, NULL, NULL, 0),
	(7, 'Distrito Federal', 1, 'DF', 1, NULL, NULL, 0),
	(8, 'Espírito Santo', 1, 'ES', 5, NULL, NULL, 0),
	(9, 'Goiás', 1, 'GO', 1, NULL, NULL, 0),
	(10, 'Maranhão', 1, 'MA', 2, NULL, NULL, 0),
	(11, 'Mato Grosso', 1, 'MT', 1, NULL, NULL, 0),
	(12, 'Mato Grosso do Sul', 1, 'MS', 1, NULL, NULL, 0),
	(13, 'Minas Gerais', 1, 'MG', 5, NULL, NULL, 0),
	(14, 'Pará', 1, 'PA', 3, NULL, NULL, 0),
	(15, 'Paraíba', 1, 'PB', 2, NULL, NULL, 0),
	(16, 'Paraná', 1, 'PR', 4, NULL, NULL, 0),
	(17, 'Pernambuco', 1, 'PE', 2, NULL, NULL, 0),
	(18, 'Piauí', 1, 'PI', 2, NULL, NULL, 0),
	(19, 'Rio de Janeiro', 1, 'RJ', 5, NULL, NULL, 0),
	(20, 'Rio Grande do Norte', 1, 'RN', 2, NULL, NULL, 0),
	(21, 'Rio Grande do Sul', 1, 'RS', 4, NULL, NULL, 0),
	(22, 'Rondônia', 1, 'RO', 3, NULL, NULL, 0),
	(23, 'Roraima', 1, 'RR', 3, NULL, NULL, 0),
	(24, 'Santa Catarina', 1, 'SC', 4, NULL, NULL, 0),
	(25, 'São Paulo', 1, 'SP', 5, NULL, NULL, 0),
	(26, 'Sergipe', 1, 'SE', 2, NULL, NULL, 0),
	(27, 'Tocantins', 1, 'TO', 3, NULL, NULL, 0);
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;

-- Copiando estrutura para tabela dev41.exit_popup
CREATE TABLE IF NOT EXISTS `exit_popup` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rf_nm` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `url` text DEFAULT NULL,
  `nome_foto` varchar(255) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `mostrar` tinyint(1) NOT NULL DEFAULT 0,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Copiando dados para a tabela dev41.exit_popup: ~0 rows (aproximadamente)
DELETE FROM `exit_popup`;
/*!40000 ALTER TABLE `exit_popup` DISABLE KEYS */;
INSERT INTO `exit_popup` (`id`, `rf_nm`, `titulo`, `descricao`, `url`, `nome_foto`, `ordem`, `mostrar`, `data_cadastro`, `data_alteracao`, `excluido`) VALUES
	(1, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2019-12-13 08:23:12', '2020-02-22 11:48:36', 0);
/*!40000 ALTER TABLE `exit_popup` ENABLE KEYS */;

-- Copiando estrutura para tabela dev41.franquia
CREATE TABLE IF NOT EXISTS `franquia` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cidade_fk` int(11) unsigned DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK_franquia_cidade` (`cidade_fk`),
  CONSTRAINT `FK_franquia_cidade` FOREIGN KEY (`cidade_fk`) REFERENCES `cidade` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Copiando dados para a tabela dev41.franquia: ~0 rows (aproximadamente)
DELETE FROM `franquia`;
/*!40000 ALTER TABLE `franquia` DISABLE KEYS */;
/*!40000 ALTER TABLE `franquia` ENABLE KEYS */;

-- Copiando estrutura para tabela dev41.metatags
CREATE TABLE IF NOT EXISTS `metatags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rf_nm` varchar(100) DEFAULT NULL,
  `class` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `banner` varchar(30) DEFAULT '1/2 - 1/2 - 1',
  `mostrar` tinyint(1) DEFAULT 1,
  `ordem` int(6) NOT NULL DEFAULT 0,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT COMMENT='- Exluido:\r\n0 - Registro comum;\r\n1 - Registro excluido/oculto;\r\n2 - Registro oculto de uma listagem, mas, existente (maior utilidade para categorias/grupos, exemplo aplicado em alguns botões de voltar);\r\n\r\nDemais informações no arquivo READ ME do projeto.';

-- Copiando dados para a tabela dev41.metatags: ~6 rows (aproximadamente)
DELETE FROM `metatags`;
/*!40000 ALTER TABLE `metatags` DISABLE KEYS */;
INSERT INTO `metatags` (`id`, `rf_nm`, `class`, `link`, `titulo`, `descricao`, `keyword`, `banner`, `mostrar`, `ordem`, `data_cadastro`, `data_alteracao`, `excluido`) VALUES
	(1, 'Home', 'pg-home', NULL, 'Home', 'Pide, é um delicioso salgado "Turco" leve, macio e saboroso. Você vai se apaixonar!', 'rei da pide, pide, turco, quibe, gourmet, kafta, coalhada', '1/2 - 1/2 - 1', 1, 1, '2020-01-01 08:00:01', '2020-01-01 08:00:01', 0),
	(2, 'Quem somos', 'pg-institucional', 'institucional/institucional.html', 'Quem Somos', 'Pide, é um delicioso salgado "Turco" leve, macio e saboroso. Você vai se apaixonar!', 'rei da pide, pide, turco, quibe, gourmet, kafta, coalhada', '4/2 - 1/2 - 0', 1, 2, '2020-01-01 08:00:02', '2020-01-01 08:00:02', 0),
	(3, 'Produtos', 'pg-produto', 'produto/produto.html', 'Produtos', 'Pide, é um delicioso salgado "Turco" leve, macio e saboroso. Você vai se apaixonar!', 'rei da pide, pide, turco, quibe, gourmet, kafta, coalhada', '3/2 - 1/2 - 0', 1, 3, '2020-01-01 08:00:03', '2020-01-01 08:00:03', 0),
	(4, 'Franquias', 'pg-franquia', 'franquia/franquia.html', 'Franquias', 'Pide, é um delicioso salgado "Turco" leve, macio e saboroso. Você vai se apaixonar!', 'rei da pide, pide, turco, quibe, gourmet, kafta, coalhada', '5/2 - 1/2 - 0', 1, 4, '2020-01-01 08:00:04', '2020-01-01 08:00:04', 0),
	(5, 'Blog', 'pg-blog', 'blog/blog.html', 'Blog', 'Pide, é um delicioso salgado "Turco" leve, macio e saboroso. Você vai se apaixonar!', 'rei da pide, pide, turco, quibe, gourmet, kafta, coalhada', '0 - 1/2 - 0', 1, 5, '2020-01-01 08:00:05', '2020-01-01 08:00:05', 0),
	(6, 'Contato', 'pg-contato', 'contato/contato.html', 'Contato', 'Pide, é um delicioso salgado "Turco" leve, macio e saboroso. Você vai se apaixonar!', 'rei da pide, pide, turco, quibe, gourmet, kafta, coalhada', '6/2 - 1/2 - 0', 1, 6, '2020-01-01 08:00:06', '2020-01-01 08:00:06', 0);
/*!40000 ALTER TABLE `metatags` ENABLE KEYS */;

-- Copiando estrutura para tabela dev41.midia_social
CREATE TABLE IF NOT EXISTS `midia_social` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `url` text DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='Midias Sociais';

-- Copiando dados para a tabela dev41.midia_social: ~6 rows (aproximadamente)
DELETE FROM `midia_social`;
/*!40000 ALTER TABLE `midia_social` DISABLE KEYS */;
INSERT INTO `midia_social` (`id`, `titulo`, `url`, `class`, `ordem`, `data_cadastro`, `data_alteracao`, `excluido`) VALUES
	(1, 'Facebook', 'https://www.facebook.com/reidapide/', 'facebook', 1, '2019-02-11 14:00:41', '2019-12-06 08:53:26', 0),
	(2, 'Twitter', 'https://www.twitter.com', 'twitter', 2, '2019-02-11 14:01:23', '2020-01-09 16:44:45', 1),
	(3, 'Youtube', 'https://www.youtube.com', 'youtube', 3, '2019-02-11 14:01:36', '2019-04-05 09:16:09', 1),
	(4, 'Instagram', 'https://www.instagram.com/rei_da_pide/', 'instagram', 4, '2019-02-11 14:06:54', '2019-12-06 08:53:11', 0),
	(5, 'SnapWidget Instagram', NULL, 'snapwidget_instagram', NULL, '2019-02-11 14:28:31', '2019-02-11 14:28:31', 1),
	(6, 'WhatsApp', NULL, 'whatsapp', NULL, '2019-02-11 14:28:33', '2019-02-11 14:28:33', 1);
/*!40000 ALTER TABLE `midia_social` ENABLE KEYS */;

-- Copiando estrutura para tabela dev41.newsletter
CREATE TABLE IF NOT EXISTS `newsletter` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dev41.newsletter: ~0 rows (aproximadamente)
DELETE FROM `newsletter`;
/*!40000 ALTER TABLE `newsletter` DISABLE KEYS */;
/*!40000 ALTER TABLE `newsletter` ENABLE KEYS */;

-- Copiando estrutura para tabela dev41.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `nome_foto` varchar(255) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Copiando dados para a tabela dev41.produto: ~0 rows (aproximadamente)
DELETE FROM `produto`;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;

-- Copiando estrutura para tabela dev41.produto_topico
CREATE TABLE IF NOT EXISTS `produto_topico` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `produto_fk` int(11) unsigned DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `nome_foto` varchar(255) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `FK_produto_topico_produto` (`produto_fk`),
  CONSTRAINT `FK_produto_topico_produto` FOREIGN KEY (`produto_fk`) REFERENCES `produto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Copiando dados para a tabela dev41.produto_topico: ~0 rows (aproximadamente)
DELETE FROM `produto_topico`;
/*!40000 ALTER TABLE `produto_topico` DISABLE KEYS */;
/*!40000 ALTER TABLE `produto_topico` ENABLE KEYS */;

-- Copiando estrutura para tabela dev41.texto
CREATE TABLE IF NOT EXISTS `texto` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `page_fk` int(11) unsigned DEFAULT NULL,
  `rf_nm` varchar(100) DEFAULT NULL,
  `class` varchar(30) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `subtitulo` text DEFAULT NULL,
  `descricao` longtext DEFAULT NULL,
  `nome_foto` varchar(255) DEFAULT NULL,
  `nome_video` varchar(255) DEFAULT NULL,
  `ctrl` varchar(30) DEFAULT '1-1-1-1-1-1-1-1' COMMENT '0-titulo; 1-subtitulo; 2-descricao; 3-foto; 4-pode excluir; 5-voltar; 6-video; 7-topico',
  `ordem` int(11) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `pageFK` (`page_fk`),
  CONSTRAINT `FK_texto_metatags` FOREIGN KEY (`page_fk`) REFERENCES `metatags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dev41.texto: ~7 rows (aproximadamente)
DELETE FROM `texto`;
/*!40000 ALTER TABLE `texto` DISABLE KEYS */;
INSERT INTO `texto` (`id`, `page_fk`, `rf_nm`, `class`, `titulo`, `subtitulo`, `descricao`, `nome_foto`, `nome_video`, `ctrl`, `ordem`, `data_cadastro`, `data_alteracao`, `excluido`) VALUES
	(1, 2, 'Nossa história', 'institucional', 'O sabor está na', 'nossa história', '<p>Nossa hist&oacute;ria &eacute; envolvida de muito sabor, alegria e temperos. Nossa primeira franquia foi inaugurada em 2018 na cidade de Pai&ccedil;andu. Hoje contamos com outra loja localizada na cidade de Mandagua&ccedil;u. O nosso toque especial no preparo dos pr&aacute;ticos t&iacute;picos turcos &eacute; o segredo do nosso sucesso.</p>', '15859192888953_sobre.png', NULL, '1-1-1-0-0-0-1-1', NULL, '2020-01-01 07:40:00', '2020-01-01 07:40:00', 0),
	(2, 2, 'Vídeo', 'institucional', 'Saiba mais sobre a nossa empresa', NULL, '<p>A nossa hist&oacute;ria contada por quem viveu de pertinho cada momento. Assista o nosso v&iacute;deo institucional.</p>', '15859325606545_banner-inst-video.jpg', 'eVTXPUF4Oz4', '1-0-1-0-0-0-1-0', NULL, '2020-01-01 07:40:01', '2020-01-01 07:40:01', 0),
	(3, 3, 'Produtos', 'produto', 'Conheça', 'nossos produtos', '<p>Ficou com &aacute;gua na boca? Ent&atilde;o conhe&ccedil;a a nossa linha completa de produtos e surpreenda-se com o melhor da culin&aacute;ria turca.</p>', '15864321384816_produto.jpg', NULL, '1-1-1-0-0-0-0-0', NULL, '2020-01-01 07:40:02', '2020-04-09 08:35:38', 0),
	(4, 4, 'Franquias', 'franquia', 'Encontre a franquia mais perto de você', NULL, NULL, NULL, NULL, '1-0-0-0-0-0-0-0', NULL, '2020-01-01 07:40:03', '2020-01-01 07:40:03', 0),
	(5, 5, 'Blog', 'blog', 'Dicas do Chef', NULL, NULL, NULL, NULL, '1-0-0-0-0-0-0-0', NULL, '2020-01-01 07:40:04', '2020-01-01 07:40:04', 0),
	(6, 6, 'Contato', 'contato', 'Dúvidas?', 'Entre em contato', '<p>Quer conhecer os nossos restaurantes ou montar uma parceria? Tire suas d&uacute;vidas com a nossa equipe.</p>', '1586894339266_onde.png', NULL, '1-1-1-0-0-0-0-0', NULL, '2020-01-01 07:40:05', '2020-04-14 16:58:59', 0),
	(7, NULL, 'Whatsapp Título', 'whatsapp', 'Fale conosco', NULL, NULL, NULL, NULL, '1-0-0-0-0-0-0-0', NULL, '2020-01-01 07:40:06', '2020-01-01 07:40:06', 0);
/*!40000 ALTER TABLE `texto` ENABLE KEYS */;

-- Copiando estrutura para tabela dev41.texto_img
CREATE TABLE IF NOT EXISTS `texto_img` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `texto_fk` int(11) unsigned DEFAULT NULL,
  `nome_foto` varchar(250) DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `textoFK` (`texto_fk`),
  CONSTRAINT `FK_texto_img_texto` FOREIGN KEY (`texto_fk`) REFERENCES `texto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dev41.texto_img: ~0 rows (aproximadamente)
DELETE FROM `texto_img`;
/*!40000 ALTER TABLE `texto_img` DISABLE KEYS */;
/*!40000 ALTER TABLE `texto_img` ENABLE KEYS */;

-- Copiando estrutura para tabela dev41.texto_topico
CREATE TABLE IF NOT EXISTS `texto_topico` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `texto_fk` int(11) unsigned DEFAULT NULL,
  `rf_nm` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `subtitulo` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `nome_foto` varchar(255) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `texto_fk` (`texto_fk`),
  CONSTRAINT `FK_texto_topico_texto` FOREIGN KEY (`texto_fk`) REFERENCES `texto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Copiando dados para a tabela dev41.texto_topico: ~3 rows (aproximadamente)
DELETE FROM `texto_topico`;
/*!40000 ALTER TABLE `texto_topico` DISABLE KEYS */;
INSERT INTO `texto_topico` (`id`, `texto_fk`, `rf_nm`, `titulo`, `subtitulo`, `descricao`, `nome_foto`, `ordem`, `data_cadastro`, `data_alteracao`, `excluido`) VALUES
	(1, 1, 'missao', 'Missão', NULL, '<p>Proporcionar bons momentos atrav&eacute;s da culin&aacute;ria turca.</p>', '158593323119_missao.png', 1, '2019-12-18 16:22:59', '2020-04-03 14:00:31', 0),
	(2, 1, 'visao', 'Visão', NULL, '<p>Ser a maior franquia nacional de comidas tipicamente turcas.</p>', '15859332454031_visao.png', 2, '2019-12-18 16:23:00', '2020-04-03 14:14:12', 0),
	(3, 1, 'valor', 'Valores', NULL, '<ul>\r\n<li>Satisfa&ccedil;&atilde;o do cliente</li>\r\n<li>Responsabilidade social</li>\r\n<li>Valorizar nossos clientes, colaboradores e parceiros</li>\r\n<li>Paix&atilde;o pela culin&aacute;ria e cultura turca</li>\r\n<li>Compromisso com a &eacute;tica</li>\r\n</ul>', '15859332598046_valores.png', 3, '2019-12-18 16:23:01', '2020-04-03 14:13:10', 0);
/*!40000 ALTER TABLE `texto_topico` ENABLE KEYS */;

-- Copiando estrutura para tabela dev41.texto_video
CREATE TABLE IF NOT EXISTS `texto_video` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `texto_fk` int(11) unsigned DEFAULT NULL,
  `titulo` varchar(250) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `texto_fk` (`texto_fk`),
  CONSTRAINT `FK_texto_video_texto` FOREIGN KEY (`texto_fk`) REFERENCES `texto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Copiando dados para a tabela dev41.texto_video: ~0 rows (aproximadamente)
DELETE FROM `texto_video`;
/*!40000 ALTER TABLE `texto_video` DISABLE KEYS */;
/*!40000 ALTER TABLE `texto_video` ENABLE KEYS */;

-- Copiando estrutura para tabela dev41.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `senha_provisoria` varchar(32) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `master` int(2) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `Index 4` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Usuario cadastrado;';

-- Copiando dados para a tabela dev41.usuario: ~1 rows (aproximadamente)
DELETE FROM `usuario`;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `nome`, `email`, `login`, `senha`, `senha_provisoria`, `status`, `master`, `data_cadastro`, `data_alteracao`, `excluido`) VALUES
	(1, 'Byte (a) Byte - Soluções Tecnológicas', 'desenvolvimento6@byteabyte.com.br', 'byte', '0d5b3bf1e58e1d0dc52a584adfc410ec', 'a510a3a95d2ac97c430a16f63c47f052', 0, NULL, '2019-01-22 15:38:00', '2019-01-22 15:38:00', 0);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

-- Copiando estrutura para tabela dev41.whatsapp
CREATE TABLE IF NOT EXISTS `whatsapp` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `responsavel` varchar(255) DEFAULT NULL,
  `fone` varchar(255) DEFAULT NULL,
  `ordem` int(11) DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `excluido` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela dev41.whatsapp: ~0 rows (aproximadamente)
DELETE FROM `whatsapp`;
/*!40000 ALTER TABLE `whatsapp` DISABLE KEYS */;
/*!40000 ALTER TABLE `whatsapp` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
