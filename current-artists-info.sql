-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 13, 2026 at 05:07 AM
-- Server version: 11.8.6-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u193668947_tentacit`
--

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `artistname` varchar(255) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `dateregistered` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `background_img` varchar(255) NOT NULL,
  `secondbackground_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `artistname`, `realname`, `number`, `genre`, `mail`, `dateregistered`, `nationality`, `address`, `image`, `created_at`, `updated_at`, `background_img`, `secondbackground_img`) VALUES
(1, 'Astra Cartier', 'Neon Dusk', '099352352362', 'Future Bass, Synthwave', 'Astra@gmail.com', 'Winter 2020', 'Mirage Coast', 'Bass Shelf Basin', '1778569220_20211231022924.png', NULL, '2026-05-11 23:00:20', 'AstraBG.png', 'cover.jpg'),
(2, 'Razaec', 'Chrome Rift', '09935352235', 'Future House, Deep House', 'Raezac@gmail.com', 'Winter 2020', 'Voltage Plains', 'Subterranean Grid', '1778569263_Raez.jpg', NULL, '2026-05-12 14:53:34', 'bg1_1778597614_20211231022701.jpg', '20220215061621.jpg'),
(3, 'VIA', 'Pale Circuit', '099129481249', 'Dance, Electronic', 'VIA@gmail.com', 'Winter 2020', 'Static Meridian', 'Crystal Vein Corridor', '1778597583_via (2).jpg', NULL, '2026-05-12 14:53:03', 'bg1_1778597583_piano.jpg', 'bg2_1778597583_background_more.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
