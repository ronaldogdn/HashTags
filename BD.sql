-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Mar-2020 às 20:41
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistemahashtags`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem_tags`
--

CREATE TABLE `mensagem_tags` (
  `id` int(11) NOT NULL,
  `fk_mensagem` int(11) DEFAULT NULL,
  `fk_tag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `mensagem_tags`
--



-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmensagem`
--

CREATE TABLE `tbmensagem` (
  `id` int(11) NOT NULL,
  `mensagem` varchar(280) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `tbtags` (
  `id` int(11) NOT NULL,
  `tags` varchar(20) NOT NULL,
  `contador` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `mensagem_tags`
--
ALTER TABLE `mensagem_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_mensagem` (`fk_mensagem`),
  ADD KEY `fk_id_tag` (`fk_tag`);

--
-- Índices para tabela `tbmensagem`
--
ALTER TABLE `tbmensagem`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tbtags`
--
ALTER TABLE `tbtags`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `mensagem_tags`
--
ALTER TABLE `mensagem_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbmensagem`
--
ALTER TABLE `tbmensagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbtags`
--
ALTER TABLE `tbtags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `mensagem_tags`
--
ALTER TABLE `mensagem_tags`
  ADD CONSTRAINT `fk_id_mensagem` FOREIGN KEY (`fk_mensagem`) REFERENCES `tbmensagem` (`id`),
  ADD CONSTRAINT `fk_id_tag` FOREIGN KEY (`fk_tag`) REFERENCES `tbtags` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
