-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 04-Nov-2020 às 20:03
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `trabalho_pratico`
--
CREATE DATABASE IF NOT EXISTS `trabalho_pratico` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `trabalho_pratico`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `campeonatos`
--

CREATE TABLE IF NOT EXISTS `campeonatos` (
  `id_campeonato` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cod_time` int(11) NOT NULL,
  PRIMARY KEY (`id_campeonato`),
  KEY `cod_time` (`cod_time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogadores`
--

CREATE TABLE IF NOT EXISTS `jogadores` (
  `id_jogador` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `idade` int(11) NOT NULL,
  `posicao` varchar(100) NOT NULL,
  `cod_time` int(11) NOT NULL,
  PRIMARY KEY (`id_jogador`),
  KEY `cod_time` (`cod_time`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `jogadores`
--

INSERT INTO `jogadores` (`id_jogador`, `nome`, `idade`, `posicao`, `cod_time`) VALUES
(10, 'Fallen', 45, 'Awper', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `times`
--

CREATE TABLE IF NOT EXISTS `times` (
  `id_time` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id_time`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `times`
--

INSERT INTO `times` (`id_time`, `nome`) VALUES
(2, 'MIBR'),
(3, 'Astralis');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `campeonatos`
--
ALTER TABLE `campeonatos`
  ADD CONSTRAINT `campeonatos_ibfk_1` FOREIGN KEY (`cod_time`) REFERENCES `times` (`id_time`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `jogadores`
--
ALTER TABLE `jogadores`
  ADD CONSTRAINT `jogadores_ibfk_1` FOREIGN KEY (`cod_time`) REFERENCES `times` (`id_time`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
