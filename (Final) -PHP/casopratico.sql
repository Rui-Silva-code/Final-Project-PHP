-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 25-Abr-2024 às 14:33
-- Versão do servidor: 5.7.24
-- versão do PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `casopratico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  `data_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `consultas`
--

INSERT INTO `consultas` (`id`, `user_id`, `data`, `horario`, `data_hora`) VALUES
(6, 3, '2457-10-12', '10:10:00', '2024-04-25 12:52:54'),
(7, 3, '1000-10-12', '10:10:00', '2024-04-24 14:20:36'),
(8, 3, '2024-04-25', '16:00:00', '2024-04-24 14:09:34'),
(9, 12, '2024-07-22', '20:58:00', '2024-04-25 14:31:00'),
(10, 12, '2024-04-24', '22:26:00', '2024-04-24 19:07:18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos`
--

CREATE TABLE `projetos` (
  `id_projeto` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data_criacao` date NOT NULL,
  `tecnologia_associada` varchar(100) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `projetos`
--

INSERT INTO `projetos` (`id_projeto`, `user_id`, `data_criacao`, `tecnologia_associada`, `imagem`, `status`) VALUES
(1, 1, '2024-03-11', 'HTML', 'imagens/ahaha 2.jpg', 'em_progresso'),
(2, 1, '2024-03-11', 'HTML', 'imagens/ahaha 2.jpg', 'em_progresso'),
(3, 1, '2024-03-11', 'HTML', 'imagens/ahaha 2.jpg', 'em_progresso'),
(4, 1, '2024-03-06', 'dadsa', 'imagens/dsdasd.jpg', 'marcado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `user_id` int(11) NOT NULL,
  `nome` varchar(222) NOT NULL,
  `apelido` varchar(222) NOT NULL,
  `user_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `imagem` varchar(2222) DEFAULT NULL,
  `password` varchar(222) NOT NULL,
  `user_type` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`user_id`, `nome`, `apelido`, `user_name`, `email`, `imagem`, `password`, `user_type`) VALUES
(1, 'Rui', 'Silva', 'RuiSilva', 'ruisilva1234@hotmail.com', NULL, '$2y$10$Cgk8pG6kwmmmVEiCiRCwneQvnH.LIxpIMze9q/pOCMfTwDrcNXROC', 'administrador'),
(12, 'Raquel', 'Margarida', 'Raquel', 'raquelmargarida@hotmail.com', NULL, '$2y$10$8tM6rfE4.u33ukJYa/SOCumoMia73uD7drGUyBHPL7njD/ylp.0lC', 'utilizador');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id_projeto`);

--
-- Índices para tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id_projeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
