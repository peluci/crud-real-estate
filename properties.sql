-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10/07/2023 às 16:52
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `imobiliaria_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `imoveis`
--

CREATE TABLE `imoveis` (
  `id` int(5) NOT NULL,
  `logradouro` varchar(30) NOT NULL,
  `numero` int(5) NOT NULL,
  `complemento` varchar(30) DEFAULT NULL,
  `cidade` varchar(30) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `quartos` int(5) NOT NULL,
  `banheiros` int(5) NOT NULL,
  `aluguel` int(5) NOT NULL,
  `iptu` int(5) DEFAULT NULL,
  `agua` int(5) DEFAULT NULL,
  `luz` int(5) DEFAULT NULL,
  `situacao` varchar(30) NOT NULL,
  `imagem` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `imoveis`
--

INSERT INTO `imoveis` (`id`, `logradouro`, `numero`, `complemento`, `cidade`, `estado`, `cep`, `quartos`, `banheiros`, `aluguel`, `iptu`, `agua`, `luz`, `situacao`, `imagem`) VALUES
(1, 'Rua das Flores', 123, 'Apt 101', 'São Paulo', 'SP', '01234-567', 3, 2, 2000, 500, 0, 0, 'Alugado', 'house-1'),
(2, 'Avenida Principal', 456, '', 'Belo Horizonte', 'MG', '12345-678', 2, 1, 1500, 300, 0, 0, 'A Venda', 'House-2'),
(3, 'Rua das Palmeiras', 789, 'Casa 2', 'Rio de Janeiro', 'RJ', '98765-432', 4, 3, 3000, 800, 0, 0, 'Ocupado', 'House-3'),
(4, 'Rua do Comércio', 1010, 'Sala 501', 'Porto Alegre', 'RS', '54321-098', 0, 1, 800, 200, 0, 0, 'Vazio', 'House-4');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `nome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `senha`, `nome`) VALUES
('usuario', '1234', 'Seu Barriga');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `imoveis`
--
ALTER TABLE `imoveis`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
