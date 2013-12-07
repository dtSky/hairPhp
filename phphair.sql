-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.27
-- Versão do PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `phphair`
--

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
-- Estrutura da tabela `cad_pages`
--

CREATE TABLE IF NOT EXISTS `cad_pages` (
  `LINK` varchar(250) NOT NULL,
  `TITULO` varchar(250) NOT NULL,
  `CONTEUDO` longtext NOT NULL,
  UNIQUE KEY `LINK` (`LINK`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cad_pages`
--

INSERT INTO `cad_pages` (`LINK`, `TITULO`, `CONTEUDO`) VALUES
('sobre', 'A hair', '<p>Maecenas urna purus, volutpat vitae tortor a, sodales laoreet elit. Proin augue neque, hendrerit adipiscing pellentesque quis, mollis at lacus. Etiam consequat nulla eget mi semper, quis fringilla nisi varius. Morbi pulvinar ullamcorper nulla in iaculis. Pellentesque ultrices ante vel sapien dictum, non semper ante aliquet. Fusce non orci arcu. Pellentesque suscipit turpis purus, sodales placerat elit malesuada sodales. Sed ut magna fermentum eros fringilla fermentum. Nullam tellus purus, tincidunt eget orci quis, auctor tincidunt magna. Phasellus diam ligula, porta a eleifend quis, commodo tempor turpis. Vivamus fermentum ut libero in euismod.\n</p>\n<p>Ut rhoncus, erat at commodo mollis, orci sem molestie massa, eu elementum libero mauris posuere quam. Cras eget urna pretium, ornare arcu consectetur, suscipit arcu. Etiam vehicula odio ac aliquet fermentum. Vivamus dignissim nisl nulla, vitae placerat velit aliquam id. Ut hendrerit lobortis quam in scelerisque. Ut risus nisl, pharetra malesuada turpis vel, ullamcorper adipiscing orci. Fusce ut est adipiscing, fermentum nisl ut, dictum arcu. Phasellus in erat id nunc pulvinar cursus vitae eu nulla. In eget euismod ligula.\n</p>\n<p>Vestibulum et augue nibh. Morbi non molestie neque. Mauris quis erat nulla. Etiam a ipsum at libero condimentum volutpat vel eu sem. Vestibulum felis mi, vestibulum sed augue sit amet, molestie sodales lorem. Pellentesque blandit turpis sit amet ornare aliquam. Aliquam sit amet est a neque vestibulum scelerisque. Vestibulum a ipsum vitae leo tempus molestie. Mauris facilisis laoreet enim, sit amet mollis dolor venenatis porta. Duis accumsan urna dolor, a pretium urna convallis nec. Quisque et ligula in massa luctus gravida. Donec tincidunt augue id tellus mollis sagittis. Aliquam elit nunc, fermentum vel pharetra ut, interdum nec nulla.\n</p>\n<p>In lacinia sit amet est nec convallis. Ut fermentum lobortis lacus, at viverra nunc imperdiet eget. Curabitur vehicula bibendum lacus, et interdum nibh auctor vitae. Integer pellentesque tempus felis posuere vulputate. Duis euismod viverra dui vitae elementum. Donec vitae tortor at sapien molestie fermentum sed eget enim. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In id diam at turpis vulputate rhoncus. Phasellus viverra ligula consectetur nunc luctus, id tempus nisl dapibus. Nunc vel ullamcorper augue. Nulla facilisi. Phasellus lobortis purus quis enim aliquet pellentesque. Morbi vestibulum placerat ligula, eget aliquam nisi iaculis eu. Donec eget pellentesque sapien, quis faucibus leo.\n</p>');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
