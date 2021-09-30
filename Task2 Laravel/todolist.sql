-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2021 at 02:46 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `id` int(11) NOT NULL,
  `title` char(100) NOT NULL,
  `description` char(200) NOT NULL,
  `d_from` char(100) NOT NULL,
  `d_to` char(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `title`, `description`, `d_from`, `d_to`, `user_id`, `updated_at`, `created_at`) VALUES
(4, 'huqetojigo@mailinator.com', 'nigof@mailinator.com', '2021-10-08T01:52', '2021-10-08T01:55', 6, '2021-09-29 21:03:28', '2021-09-29 19:46:11'),
(5, 'huqetojigo@mailinator.com', 'nigof@mailinator.com', '10:42', '14:19', 7, '2021-09-29 19:50:51', '2021-09-29 19:50:51'),
(6, 'bykivopezy@mailinator.com', 'Autem aut quo praese', '2021-09-30T21:47', '2022-06-04T05:09', 7, '2021-09-29 21:19:08', '2021-09-29 21:19:08'),
(7, 'piwof@mailinator.com', 'Nisi fugiat molestia', '2003-11-07T17:36', '1981-01-03T17:37', 7, '2021-09-29 21:19:19', '2021-09-29 21:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` char(100) NOT NULL,
  `email` char(200) NOT NULL,
  `password` char(200) NOT NULL,
  `image` char(100) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `image`, `updated_at`, `created_at`) VALUES
(6, 'ali', 'ali@ali.com', '$2y$10$Hd06eYMgMXu9nblfkWmYLOobaHZmHwdBnInIRb2DFXDyGeWyOQucW', NULL, '2021-09-29 20:00:43', '2021-09-29 18:18:24'),
(7, 'Abdo Hassan', 'abdo@abdo.com', '$2y$10$a9F4uAyO6JmQLb6YlLq2zuFZiRIanVgduRiS9TEi8NDJkvphT3Ttq', NULL, '2021-09-29 20:17:47', '2021-09-29 20:17:47'),
(8, 'abdelrhman Hassan', 'ali@ali.com', '$2y$10$6cjSHR57eHEyTaFTtFULxu4r5Ggm9XZH.jUYOy/M..VpF7q46lLh2', NULL, '2021-09-29 21:45:42', '2021-09-29 21:45:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lists`
--
ALTER TABLE `lists`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
