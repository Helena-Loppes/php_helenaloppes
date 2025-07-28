-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/07/2025 às 22:03
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `eduardo_reinert`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `id` int(11) NOT NULL COMMENT 'Esse campo irá guardar o identificador daa tarefas',
  `nome` varchar(20) NOT NULL COMMENT 'Esse campo irá guardar o nome das tarefas',
  `descricao` text NOT NULL COMMENT 'Esse campo irá guardar a descricao das tarefas',
  `prazo` date NOT NULL COMMENT 'Esse campo irá guardar o prazo das tarefas',
  `prioridade` int(11) NOT NULL COMMENT 'Esse campo irá guardar a classificacao de prioridade da tarefa',
  `concluida` tinyint(1) NOT NULL COMMENT 'Esse campo irá guardar se a tarefa estao ou nao concluida'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tarefas`
--

INSERT INTO `tarefas` (`id`, `nome`, `descricao`, `prazo`, `prioridade`, `concluida`) VALUES
(1, 'Estudar PHP', 'continuar maus estudos de PHP e MySQL', '0000-00-00', 1, 0),
(2, 'Estudar HTML', 'continuar os estudos', '0000-00-00', 0, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Esse campo irá guardar o identificador daa tarefas', AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
