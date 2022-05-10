-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2022 at 03:51 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sport-score-board`
--

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

DROP TABLE IF EXISTS `board`;
CREATE TABLE `board` (
  `id` int(11) NOT NULL,
  `home_team` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `away_team` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home_score` int(11) NOT NULL,
  `away_score` int(11) NOT NULL,
  `finished` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `total_score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`id`, `home_team`, `away_team`, `home_score`, `away_score`, `finished`, `created_at`, `updated_at`, `total_score`) VALUES
(1, 'Mexico', 'Canada', 0, 5, 0, '2022-05-08 16:20:11', '2022-05-08 16:20:11', 5),
(2, 'Spain', 'Brazil', 10, 2, 0, '2022-05-08 16:20:30', '2022-05-08 16:20:30', 12),
(3, 'Mexico', 'France', 3, 0, 1, '2022-05-10 09:44:59', '2022-05-10 09:44:59', 3),
(6, 'Germany', 'France', 2, 2, 0, '2022-05-10 10:44:55', '2022-05-10 10:44:55', 4),
(7, 'Uruguay', 'Italy', 6, 6, 0, '2022-05-10 10:46:19', '2022-05-10 10:46:19', 12),
(8, 'Argentina', 'Austraila', 3, 1, 0, '2022-05-10 13:49:54', '2022-05-10 13:49:54', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
