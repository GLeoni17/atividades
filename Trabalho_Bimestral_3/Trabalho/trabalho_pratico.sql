-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 13-Dez-2020 às 01:55
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
  PRIMARY KEY (`id_campeonato`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `campeonatos`
--

INSERT INTO `campeonatos` (`id_campeonato`, `nome`) VALUES
(1, 'teste3'),
(2, 'teste2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `times`
--

CREATE TABLE IF NOT EXISTS `times` (
  `id_time` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id_time`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `times`
--

INSERT INTO `times` (`id_time`, `nome`) VALUES
(0, 'Sem Time'),
(5, 'G2'),
(7, 'G2'),
(8, 'MIBR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `times_campeonato`
--

CREATE TABLE IF NOT EXISTS `times_campeonato` (
  `id_times_campeonato` int(11) NOT NULL AUTO_INCREMENT,
  `nome_time` varchar(100) NOT NULL,
  `cod_campeonato` int(11) NOT NULL,
  PRIMARY KEY (`id_times_campeonato`),
  KEY `cod_campeonato` (`cod_campeonato`),
  KEY `cod_time` (`nome_time`),
  KEY `nome_time` (`nome_time`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `times_campeonato`
--

INSERT INTO `times_campeonato` (`id_times_campeonato`, `nome_time`, `cod_campeonato`) VALUES
(1, 'G5', 1),
(2, 'G2', 2),
(3, 'G5', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `senha` char(32) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `posicao` varchar(100) NOT NULL,
  `permissao` int(11) NOT NULL,
  `idade` int(11) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `permissao_requerida` int(11) NOT NULL,
  `cod_time` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `cod_time` (`cod_time`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `email`, `senha`, `nome`, `posicao`, `permissao`, `idade`, `nickname`, `permissao_requerida`, `cod_time`) VALUES
(1, 'email@adm', 'e10adc3949ba59abbe56e057f20f883e', 'Gabriel', 'Nenhuma', 4, 0, '', 0, 0),
(3, 'a@a.com', '202cb962ac59075b964b07152d234b70', 'Leoni', 'Suporte', 0, 0, '', 0, 0),
(4, 't@a.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Treinador_teste1', 'Treinador', 2, 0, '', 0, 0),
(5, 'c@a.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Org_teste1', '', 3, 0, '', 0, 0),
(12, 'g@a', '202cb962ac59075b964b07152d234b70', 'Gabriel', '', 1, 15, 'Leoni', 1, 0),
(14, 'g3@a', '202cb962ac59075b964b07152d234b70', 'Gabriel4', '', 1, 16, 'Leoni2', 2, 7);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `times_campeonato`
--
ALTER TABLE `times_campeonato`
  ADD CONSTRAINT `times_campeonato_ibfk_1` FOREIGN KEY (`cod_campeonato`) REFERENCES `campeonatos` (`id_campeonato`) ON UPDATE CASCADE;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cod_time`) REFERENCES `times` (`id_time`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
