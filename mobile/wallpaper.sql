-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2020 at 01:27 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wallpaperme`
--

-- --------------------------------------------------------

--
-- Table structure for table `wallpaper`
--

CREATE TABLE `wallpaper` (
  `id_wallpaper` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `downloads` varchar(255) NOT NULL,
  `unique_downloads` int(11) NOT NULL DEFAULT 0,
  `mobile` text NOT NULL,
  `desktop` text NOT NULL,
  `tags` varchar(20) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallpaper`
--

INSERT INTO `wallpaper` (`id_wallpaper`, `id_user`, `title`, `downloads`, `unique_downloads`, `mobile`, `desktop`, `tags`, `verified`) VALUES
(1, 9, 'Dog 1', '22222', 330, '', 'doggo1.jpg', 'dog', 0),
(2, 9, 'Dog 2', '131322', 1000, '', 'doggo2.jpg', 'dog', 0),
(3, 9, 'Dog 3', '40', 10, '', 'doggo3.jpg', 'dog', 0),
(4, 9, 'Bird 1', '666', 300, '', 'eagle.jpg', 'bird', 0),
(5, 9, 'Bird 2', '10', 2, '', 'og_bird.jpg', 'bird', 0),
(7, 9, 'Baza', '500', 400, '', '5e24d45b152797.69812149.png', 'baza', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wallpaper`
--
ALTER TABLE `wallpaper`
  ADD PRIMARY KEY (`id_wallpaper`),
  ADD KEY `FK_id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wallpaper`
--
ALTER TABLE `wallpaper`
  MODIFY `id_wallpaper` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wallpaper`
--
ALTER TABLE `wallpaper`
  ADD CONSTRAINT `FK_id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
