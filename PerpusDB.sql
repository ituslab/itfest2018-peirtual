-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 16, 2018 at 03:13 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PerpusDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Books`
--

CREATE TABLE `Books` (
  `Id` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Judul` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Penulis` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Penerbit` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Halaman` int(4) NOT NULL,
  `Kategori` int(6) UNSIGNED ZEROFILL NOT NULL,
  `Deskripsi` text COLLATE utf8mb4_unicode_ci,
  `Diupload` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`Id`, `Judul`, `Penulis`, `Penerbit`, `Halaman`, `Kategori`, `Deskripsi`, `Diupload`, `Cover`, `Buku`) VALUES
('0c33a028', 'Belajar Photoshop CS5', 'Haidi', 'Unkown', 98, 000006, 'Belajar Photoshop', 'okz3j5b6w4', '/uploads/books/0c33a028/[cover]-[2018-11-16]-195402-107.jpg', '/uploads/books/0c33a028/[Belajar Photoshop CS5]-[2018-11-16]-195402-75.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `Id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `Deskripsi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`Id`, `Deskripsi`) VALUES
(000001, 'Novel'),
(000002, 'Pelajaran'),
(000003, 'Tutorial'),
(000004, 'Ensiklopedia'),
(000005, 'Agama'),
(000006, 'Teknologi'),
(000007, 'Sejarah'),
(000008, 'Sastra'),
(000009, 'Sains'),
(000010, 'Majalah'),
(000011, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `Id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `Username` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Anonymous',
  `Avatar` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Aktivasi` enum('True','False') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'False',
  `Token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`Id`, `Username`, `Email`, `Password`, `Nama`, `Avatar`, `Deskripsi`, `Aktivasi`, `Token`) VALUES
(000008, 'okz3j5b6w4', 'sutan.gnst@gmail.com', '$2y$10$pZ3vuUDuI5gptvLvVpCyq.axKovwICeYtZegrtBcVSSjxdmMi.LLC', 'Sutan Gading', 'https://www.gravatar.com/avatar/3bb1c64628145c13d9097a4bc86f6dc20050b4d5?d=monsterid', 'Halo Mas', 'True', '4d4a21050f507e033a130522513370938ed90d7f0d27c5078091691fc992394d'),
(000009, 'il1z95v575', 'irvanrefnaldy@gmail.com', '$2y$10$nsmtzZo7BFEv0ROLaTFfD.HYDLHuVQBumkIUKqDPAlWufVJbdt0CW', 'Irvan Refnaldy', 'https://www.gravatar.com/avatar/fd045e28245ce2fa2b66eeadef232d11d2cbd39f?d=monsterid', '', 'False', '04a9fa4cf5e04669ce173c5255a4a1b1b482f6c1ecd60ff2b15fb2cf9757c8f9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Diupload` (`Diupload`),
  ADD KEY `Kategori` (`Kategori`);

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `Id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `Id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Books`
--
ALTER TABLE `Books`
  ADD CONSTRAINT `Books_ibfk_1` FOREIGN KEY (`Diupload`) REFERENCES `Users` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Books_ibfk_2` FOREIGN KEY (`Kategori`) REFERENCES `Categories` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
