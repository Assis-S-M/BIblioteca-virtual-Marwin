-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 20-Dez-2022 às 16:55
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--
DROP DATABASE IF EXISTS `biblioteca`;
CREATE DATABASE IF NOT EXISTS `biblioteca` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `biblioteca`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

DROP TABLE IF EXISTS `livros`;
CREATE TABLE IF NOT EXISTS `livros` (
  `nome do livro` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome do autor` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `editora` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data de devolucao` date DEFAULT NULL,
  `situacao atual` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `aluno possuinte` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`nome do livro`, `nome do autor`, `editora`, `data de devolucao`, `situacao atual`, `aluno possuinte`, `id`) VALUES
('Livro final', 'Autor final', 'Editora final', '2022-12-08', 'devolvido', 'Aluno modificado', 1),
('Teste final', 'Autor final', 'Editora final', '2022-07-19', 'pendente', 'Aluno final', 2),
('Teste final', 'Autor final', 'Editora final', '2022-07-19', 'pendente', 'Aluno final', 3),
('Teste final', 'Autor final', 'Editora final', '2022-07-22', 'devolvido', 'Aluno final', 4),
('Teste final', 'Autor final', 'Editora final', '2022-07-22', 'devolvido', 'Aluno final', 5),
('gfiaufbvsvgs', 'ssssss', 'sssssss', '2022-12-06', 'devolvido', 'dfddddd', 6),
('eeeee', 'eeee', 'eeee', '2022-12-09', 'pendente', 'eeeee', 7),
('eeeeeee', 'eee', 'eeeee', '2022-12-09', 'pendente', 'eeeee', 8),
('eeeeeee', 'eeeeee', 'eeee', '2022-12-01', 'pendente', 'eeee', 9),
('uuuuuuuuuuuuuuuuuuuuuuuuuuuuu', 'uuuuuuuuuuuuuuuuuuuuuuuuuu', 'uuuuuuuuuuuuuuuuuuuuuu', '2022-12-08', 'pendente', 'uuuuuuuuuuuu', 10),
('teste de pesquisa', 'eeee', 'eeee', '2023-01-04', 'devolvido', 'eeee', 11),
('aaaaaaa', 'aaaaaaaa', 'aaaaaaa', '2022-12-01', 'pendente', 'teste pesquisa aluno', 12);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
