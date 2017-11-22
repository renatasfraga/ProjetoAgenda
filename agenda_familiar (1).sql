-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Nov-2017 às 01:39
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agenda_familiar`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `COD_EVENTO` int(11) NOT NULL,
  `USUARIO_EMAIL` varchar(100) NOT NULL,
  `LOCAL_EVENTO` varchar(100) NOT NULL,
  `DT_INI` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `DT_FIM` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `NOME` varchar(100) NOT NULL,
  `DESCRICAO` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`COD_EVENTO`, `USUARIO_EMAIL`, `LOCAL_EVENTO`, `DT_INI`, `DT_FIM`, `NOME`, `DESCRICAO`) VALUES
(1, 'renatasfraga@gmail.com', 'renatas', '2010-02-02 02:00:00', '2010-02-02 02:00:00', 'renatas', 'reass');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `EMAIL` varchar(100) NOT NULL,
  `NOME` varchar(100) NOT NULL,
  `SENHA` varchar(30) NOT NULL,
  `DATA_CONT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`EMAIL`, `NOME`, `SENHA`, `DATA_CONT`) VALUES
('renatasfraga@gmail.com', 'renata fraga', '34856015', '2017-11-22 00:16:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`COD_EVENTO`),
  ADD KEY `USUARIO_EMAIL` (`USUARIO_EMAIL`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`EMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evento`
--
ALTER TABLE `evento`
  MODIFY `COD_EVENTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`USUARIO_EMAIL`) REFERENCES `usuario` (`EMAIL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
