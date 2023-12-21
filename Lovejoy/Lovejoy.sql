-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 20, 2023 at 07:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Lovejoy`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `activation_code` varchar(50) DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `usertype` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`, `contact_number`, `activation_code`, `status`, `usertype`) VALUES
(1, 'test', '$2y$10$SfhYIDtn.iOuCW7zfoFLuuZHX6lja4lF4XA4JqNmpiH/.P3zB8JCa', 'test@test.com', '012334578', '', 0, 0),
(3, 'test2', '$2y$10$JiRn07EsRRlwpmRcEPKDBuURykRYVbDXC.ZEviA9PcQEQY2GI5sAS', 'test2@test.com', '0123456789', '65810bb8bbad4', 0, 0),
(4, 'test3', '$2y$10$.4xob7fKT2P18V5dV.8Ao.fSkUIe6iFVvE/ifvXjQvPDxR02odLoy', 'test3@test.com', '0123456789', '65810c4e718ea', 0, 0),
(5, 'lyqsql', '14e1b600b1fd579f47433b88e8d85291', '879797@qq.com', '1234567', '1234', 1, 1),
(6, 'kkkkk', '14e1b600b1fd579f47433b88e8d85291', '12233@qq.com', '1234567', '1234', 0, 1),
(7, 'test1', '418d89a45edadb8ce4da17e07f72536c', 'test1@test.com', '0123456789', '1234', 1, 1),
(8, 'test4', 'e041148b5e3b8cbdbe1efc51151a407a', 'test4@test.com', '0123456789', '0000', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(10) NOT NULL COMMENT 'id',
  `uid` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `contact_type` varchar(255) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `state` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `uid`, `image`, `content`, `contact_type`, `addtime`, `state`) VALUES
(3, 7, '', '123123123123123123123', 'email', '2023-12-19 07:24:51', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
