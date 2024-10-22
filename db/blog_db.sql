-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2024 at 06:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `username`, `password`) VALUES
(1, 'khoaphd.23it@vku.udn.vn', 'Khoa Pham', '$2y$10$t3J.vGA7pUzpxtw8IOlNmussLitCKxQ0oJ9u6vUleoX.VmX/itkye'),
(2, 'hoanglt.23it@vku.udn.vn', 'Hoang Le', '$2y$10$DdqXTeiVtJJ.LJyCCpMeD.zAXiSY6XWKQG14g37zZInWm3T8AWbtO');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES
(2, 'Roland@gmail.com', 'Loland', '$2y$10$rLfiM0m4aCHUsszZm3M.tu7.euVNiSBRitJalnaLxIVFXQ.jgMpHi'),
(3, 'Prts@gmail.com', 'Priest', '$2y$10$ps5/cV5gtrEhm71VwoDnHORlMFIZvwgM9ljaha54akL.Y06q7lFWy'),
(4, 'NCH@gmail.com', 'Chi Huy', '$2y$10$jHHhVrs1j5tbM1Sh.Mi5nee2hPaulz6dXvKrtxQuOaMLwKl2T3Wzi'),
(6, 'LTH@gmail.com', 'Trong Hoang', '$2y$10$doORHPJxJ9mP7McDZjwV1.h75RnNPtrH0nkYoJvVGGXvVVQOxKBNG'),
(7, 'HGB@gmail.com', 'Gia Bao', '$2y$10$GXfRDsvZMshXH7QWU2PjmOZnw3Iel0LugiWshKcmMUMNrAxBu8w26'),
(8, 'Lara@gmail.com', 'Lara', '$2y$10$X8m2SkgoOC1aHiW7MUldiOUuZklGG7p2q7VFlrj57FjhnDIgsuYWS'),
(9, 'PND@gmail.com', 'Ngoc Duc', '$2y$10$Qbz5d4nznTx28UpaLIoNwexW0GKATZ1O6v6bW5H4IjdAArJlFT0uC'),
(10, 'Nero@gmail.com', 'Nero', '$2y$10$GR9AETVlOiWYBdah7HD8NO8tC.N4N5G2Q.FE/x6t9MUfIRJuNQvTe'),
(11, 'ElonMusk@gmail.com', 'Elon Musk', '$2y$10$liwT/x2lxZ8GIlbhuBDk9.OBHAjEThcRmAByGviEwc5CS9MQeyyGi'),
(12, 'SogiSogi@gmail.com', 'Sogi', '$2y$10$H8csiEkueA4vvjrmXIM1/.AVVECNh.0z4NEc89yPFhcyZBw93xfzy'),
(13, 'jacar_ozela26@gmail.com', 'Jacar Ozela', '$2y$10$2aAfmMQLOToQ0n5HlMeW4uOC43vYNweXK0HMwWzXaYCYNA7n0ul/.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
