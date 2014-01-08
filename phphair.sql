-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 04-Jan-2014 às 17:02
-- Versão do servidor: 5.5.32
-- versão do PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `phphair`
--
CREATE DATABASE IF NOT EXISTS `phphair` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `phphair`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_dados`
--

CREATE TABLE IF NOT EXISTS `cad_dados` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TITULO` varchar(55) NOT NULL,
  `VALOR` varchar(55) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `cad_dados`
--

INSERT INTO `cad_dados` (`ID`, `TITULO`, `VALOR`) VALUES
(1, 'TITULO', 'hairPhp');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_estoque`
--

CREATE TABLE IF NOT EXISTS `cad_estoque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cad_produtos_id` int(11) NOT NULL,
  `quantidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cad_estoque_cad_produtos_idx` (`cad_produtos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_pages`
--

CREATE TABLE IF NOT EXISTS `cad_pages` (
  `LINK` varchar(250) NOT NULL,
  `TITULO` varchar(250) NOT NULL,
  `CONTEUDO` longtext NOT NULL,
  UNIQUE KEY `LINK` (`LINK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_produtos`
--

CREATE TABLE IF NOT EXISTS `cad_produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) DEFAULT NULL,
  `descricao` text,
  `valor` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_servicos`
--

CREATE TABLE IF NOT EXISTS `cad_servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) DEFAULT NULL,
  `descricao` text,
  `valor` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rel_entrada_saida`
--

CREATE TABLE IF NOT EXISTS `rel_entrada_saida` (
  `id` int(11) NOT NULL,
  `servico` int(11) DEFAULT NULL,
  `produto` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `funcionario` int(11) NOT NULL,
  `cliente` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_rel_entrada_saida_cad_servicos1_idx` (`servico`),
  KEY `fk_rel_entrada_saida_cad_produtos1_idx` (`produto`),
  KEY `fk_rel_entrada_saida_web_usuario1_idx` (`funcionario`),
  KEY `fk_rel_entrada_saida_web_usuario2_idx` (`cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `web_usuario`
--

CREATE TABLE IF NOT EXISTS `web_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `datanascimento` date DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `numero` varchar(7) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(20) DEFAULT NULL,
  `telefone` varchar(10) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `rg` varchar(27) DEFAULT NULL,
  `cpf` varchar(27) DEFAULT NULL,
  `user` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `nivel` varchar(10) DEFAULT NULL,
  `sexo` varchar(45) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `web_usuario`
--

INSERT INTO `web_usuario` (`id`, `nome`, `datanascimento`, `endereco`, `numero`, `bairro`, `cidade`, `telefone`, `celular`, `rg`, `cpf`, `user`, `pass`, `nivel`, `sexo`, `ativo`) VALUES
(2, 'Ernandes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'teste', 'teste', 'admin', NULL, 1);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cad_estoque`
--
ALTER TABLE `cad_estoque`
  ADD CONSTRAINT `fk_cad_estoque_cad_produtos` FOREIGN KEY (`cad_produtos_id`) REFERENCES `cad_produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `rel_entrada_saida`
--
ALTER TABLE `rel_entrada_saida`
  ADD CONSTRAINT `fk_rel_entrada_saida_cad_produtos1` FOREIGN KEY (`produto`) REFERENCES `cad_produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rel_entrada_saida_cad_servicos1` FOREIGN KEY (`servico`) REFERENCES `cad_servicos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rel_entrada_saida_web_usuario1` FOREIGN KEY (`funcionario`) REFERENCES `web_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rel_entrada_saida_web_usuario2` FOREIGN KEY (`cliente`) REFERENCES `web_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
