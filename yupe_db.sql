-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2021 at 09:46 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yupe_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `notificacao`
--

CREATE TABLE `notificacao` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `assunto` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_nascimento` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpf` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endereco` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contato` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cep` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rg` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dia_vencimente` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsavel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsavel_cpf` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curso` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forma_pagamento` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsavel_rg` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contrato` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `data_nascimento`, `cpf`, `endereco`, `contato`, `numero`, `cep`, `cidade`, `rg`, `dia_vencimente`, `responsavel`, `responsavel_cpf`, `curso`, `forma_pagamento`, `responsavel_rg`, `contrato`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Carlos Monjanes', 'yupeadm@gmail.com', 'Administrador', '323232 00', 'Rua 13, Sao Joao', '+55479166-0503', 'Professor', '2123243', 'Santa Catarina -Brasil', NULL, NULL, '-', '', '', '', NULL, '', NULL, '$2y$10$dVPxoA6ChUH/pwD5MlaMDORo85dkMV647H4ph12e1.jpRrVTz9P0u', NULL, NULL, '2021-09-20 05:28:16'),
(37, 'Clementina da Victória António Miguel Raivo', NULL, '20/01/2000', '23234455', 'Rua 13, Sao Joao', '(+351) 0494343', '123', NULL, 'Santa Catarina -Brasil', '22323-00292', 'Dia 10', NULL, NULL, 'Quimica', 'Pagamento à vista', NULL, 'template/contratos/iwKmg7nOqoKWPv4Clementina da Victória António Miguel Raivo.pdf', NULL, NULL, NULL, '2021-09-18 10:44:56', '2021-09-20 05:16:47'),
(39, 'Isabel João Nguirande', 'apoio@ipmsbi.com', '2021-09-24', '23234455', 'Rua 13, Sao Joao', '+55479166-050', '1232', NULL, 'Santa Catarina -Brasil', '22323-00292', 'Dia 10', 'Angelino Fernando', '5479166-050', 'Quimica', 'Pagamento à vista', '5479166-050', 'template/contratos/1ElNQdlzy3cOUGbIsabel João Nguirande.pdf', NULL, NULL, NULL, '2021-09-18 19:41:45', '2021-09-20 05:16:05');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `conta` AFTER INSERT ON `users` FOR EACH ROW INSERT INTO conta (conta.valor_actual, conta.nome, conta.iduser) values(0,NEW.name, NEW.id)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
