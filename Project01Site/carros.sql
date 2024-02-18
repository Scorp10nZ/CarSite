-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 18-Fev-2024 às 21:07
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto01`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carros`
--

DROP TABLE IF EXISTS `carros`;
CREATE TABLE IF NOT EXISTS `carros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Modelo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Ano` int NOT NULL,
  `Preco` float NOT NULL,
  `kilometragem` float NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `Marca` varchar(20) DEFAULT NULL,
  `combustivel` varchar(15) DEFAULT NULL,
  `cavalagem` int DEFAULT NULL,
  `cilindrada` int DEFAULT NULL,
  `tipo_de_caixa` varchar(50) DEFAULT NULL,
  `tracção` varchar(3) DEFAULT NULL,
  `Estado` varchar(50) DEFAULT NULL,
  `Motor` varchar(15) DEFAULT NULL,
  `id_vendedor` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `carros`
--

INSERT INTO `carros` (`id`, `Modelo`, `Ano`, `Preco`, `kilometragem`, `imagem`, `Marca`, `combustivel`, `cavalagem`, `cilindrada`, `tipo_de_caixa`, `tracção`, `Estado`, `Motor`, `id_vendedor`) VALUES
(1, 'Clio 3', 2008, 3500, 270000, 'CLIO3.jpeg', 'Renault', 'diesel', 86, 1461, 'manual', 'FWD', 'Usado', '1.5 DCI', 1),
(2, 'CLS 63 AMG', 2012, 30000, 16000, 'CLS63amg.jpg', 'Mercedez-Benz', 'gasolina', 457, 6208, 'automático', 'RWD', 'Semi-Novo', 'V8', 2),
(3, 'M5', 2009, 25000, 120000, 'M5.jpg', 'BMW', 'gasolina', 507, 4999, 'automático', 'RWD', 'Usado', 'V10', 1),
(4, 'Supra MK4', 1999, 80000, 20000, 'SUPRA.jpg', 'TOYOTA', 'gasolina', 330, 2997, 'manual', 'RWD', 'Semi-Novo', '2JZ Inline 6', 2),
(5, 'S4 Quattro', 2017, 27000, 85000, 'S4.jpg', 'AUDI', 'gasolina', 354, 2995, 'automático', 'AWD', 'Usado', 'V6', 1),
(6, 'Scirocco', 2009, 10000, 170000, 'Scirocco.jpg', 'Volkswagen', 'diesel', 170, 1968, 'manual', 'FWD', 'Usado', '2.0 TDI', 1),
(7, 'M4 420d', 2017, 22000, 170000, '420D.jpg', 'BMW', 'diesel', 190, 1995, 'manual', 'RWD', 'Usado', '2.0 B47 ', 1),
(8, 'M8', 2023, 120000, 200, 'm8.jpg', 'BMW', 'gasolina', 625, 4395, 'automático', 'RWD', 'Novo', 'S63B44B V8', 2),
(9, '911 GT3 RS', 2022, 280000, 350, '911.jpg', 'Porsche', 'gasolina', 525, 3996, 'automático', 'RWD', 'Novo', 'Boxer 6', 2),
(10, 'Golf 4', 2004, 7500, 140000, 'golf4.jpg', 'Volkswagen', 'diesel', 150, 1896, 'manual', 'FWD', 'Usado', '1.9 TDI', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
