-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2019 at 03:51 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jezykomistrz`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategorie_slowa`
--

CREATE TABLE `kategorie_slowa` (
  `id_kategorii` int(11) NOT NULL,
  `kategoria` mediumtext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `kategorie_slowa`
--

INSERT INTO `kategorie_slowa` (`id_kategorii`, `kategoria`) VALUES
(1, 'informatyka'),
(2, 'medycyna'),
(3, 'archeologia');

-- --------------------------------------------------------

--
-- Table structure for table `konta`
--

CREATE TABLE `konta` (
  `id` int(11) NOT NULL,
  `login` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `haslo` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `email` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `id_uprawnien` int(11) NOT NULL,
  `id_statusu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `konta`
--

INSERT INTO `konta` (`id`, `login`, `haslo`, `email`, `id_uprawnien`, `id_statusu`) VALUES
(2, 'admin', '$argon2id$v=19$m=1024,t=2,p=2$Sy94ajRSbUhSdC9RWS9TTQ$9uemCbzimeGYLtuwc5vBH2208kr28DIbGi38gpjTYic', 'admin@example.com', 3, 1),
(3, 'user', '$argon2id$v=19$m=1024,t=2,p=2$OHhLV2k4M1hnejR6d0FFaQ$RtNHrHgW46bjH7rlVeCyIPwIx5N9/uHhf8A8q8Q+wuk', 'user@example.com', 1, 1),
(4, 'teacher', '$argon2id$v=19$m=1024,t=2,p=2$aGFWY1RhaFgyaEpkdGMzOA$F66bOQTyGQRkeVMmItmNDLUn239hA7cWasCZH+qt0YA', 'teacher@example.com', 2, 1),
(5, 'root', '$argon2id$v=19$m=1024,t=2,p=2$ejFJeFNaU09RS2FhS29vSg$ki1UXOfix6SNyTwlDd4K1pESsCXXIBbuvRhjk+CXPJM', 'root@example.com', 4, 1),
(6, 'blocked', '$argon2id$v=19$m=1024,t=2,p=2$Sjg4TVZPUW81WnhPVk5xMQ$S4X1Gl8d4MMploxorMG38keBSX7BfsMcrpfAUZRuit4', 'blocked@example.com', 1, 3),
(7, 'inactive', '$argon2id$v=19$m=1024,t=2,p=2$Z3pvcy5tOFpQLlZEbVR0QQ$konTlNvnq6Tb9Op4sSoXWT55iRnHb3x+vOsQASu0W7E', 'inactive@example.com', 1, 2),
(8, 'removed', '$argon2id$v=19$m=1024,t=2,p=2$ak50OFdhNGhaU0gzOVhLbg$G82fCmW61h7sDNYr/8Y+2IWDP3SoQ5BE4Nk7p7EzF7M', 'removed@example.com', 1, 4),
(9, 'login1', '$argon2id$v=19$m=1024,t=2,p=2$bU52ZWw4c0tpV3UuZDFiOA$TmbRZc1vuhONnvPqwOWz2E5J50r9D1A6YpPcNhF080M', 'login1@example.com', 1, 1),
(10, 'login2', '$argon2id$v=19$m=1024,t=2,p=2$bU52ZWw4c0tpV3UuZDFiOA$TmbRZc1vuhONnvPqwOWz2E5J50r9D1A6YpPcNhF080M', 'login2@example.com', 1, 1),
(11, 'login3', '$argon2id$v=19$m=1024,t=2,p=2$bU52ZWw4c0tpV3UuZDFiOA$TmbRZc1vuhONnvPqwOWz2E5J50r9D1A6YpPcNhF080M', 'login3@example.com', 1, 1),
(13, 'login4', '$argon2id$v=19$m=1024,t=2,p=2$czNjV0N3SjMzUUhPakxTSw$MIXxgyjeU94OxkyifonpJlf/D0wBeBFFdTKiKLmyTyI', 'login4@example.com', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slowa_de`
--

CREATE TABLE `slowa_de` (
  `slowo` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `id_slowa` int(11) NOT NULL,
  `id_kategorii` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `slowa_de`
--

INSERT INTO `slowa_de` (`slowo`, `id_slowa`, `id_kategorii`) VALUES
('Informatik', 1, 1),
('Medizin', 2, 2),
('Archäologie', 3, 3),
('Computer', 4, 1),
('Tastatur', 5, 1),
('Spritze', 6, 2),
('Spitzhacke', 7, 3),
('Verband', 8, 2),
('Stein', 9, 3),
('Repository', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slowa_eng`
--

CREATE TABLE `slowa_eng` (
  `slowo` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `id_slowa` int(11) NOT NULL,
  `id_kategorii` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `slowa_eng`
--

INSERT INTO `slowa_eng` (`slowo`, `id_slowa`, `id_kategorii`) VALUES
('Informatics', 1, 1),
('medicine', 2, 2),
('archeology', 3, 3),
('computer', 4, 1),
('keyboard', 5, 1),
('syringe', 6, 2),
('pickaxe', 7, 3),
('bandage', 8, 2),
('stone', 9, 3),
('repository\r\n', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slowa_es`
--

CREATE TABLE `slowa_es` (
  `slowo` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `id_slowa` int(11) NOT NULL,
  `id_kategorii` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `slowa_es`
--

INSERT INTO `slowa_es` (`slowo`, `id_slowa`, `id_kategorii`) VALUES
('informática', 1, 1),
('medicina', 2, 2),
('arqueología', 3, 3),
('computadora', 4, 1),
('teclado', 5, 1),
('jeringuilla', 6, 2),
('pico', 7, 3),
('vendaje', 8, 2),
('Roca', 9, 3),
('repositorio', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `slowa_pl`
--

CREATE TABLE `slowa_pl` (
  `id_slowa` int(11) NOT NULL,
  `slowo` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `id_kategorii` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `slowa_pl`
--

INSERT INTO `slowa_pl` (`id_slowa`, `slowo`, `id_kategorii`) VALUES
(1, 'informatyka', 1),
(2, 'medycyna', 2),
(3, 'archeologia', 3),
(4, 'komputer', 1),
(5, 'klawiatura', 1),
(6, 'strzykawka', 2),
(7, 'kilof', 3),
(8, 'bandaż', 2),
(9, 'kamień', 3),
(10, 'repozytorium', 1);

-- --------------------------------------------------------

--
-- Table structure for table `statusy`
--

CREATE TABLE `statusy` (
  `id_statusu` int(11) NOT NULL,
  `status` mediumtext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `statusy`
--

INSERT INTO `statusy` (`id_statusu`, `status`) VALUES
(1, 'aktywny'),
(2, 'nieaktywny'),
(3, 'zablokowany'),
(4, 'usuniety');

-- --------------------------------------------------------

--
-- Table structure for table `uprawnienia`
--

CREATE TABLE `uprawnienia` (
  `id_uprawnien` int(11) NOT NULL,
  `nazwa_uprawnien` mediumtext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Dumping data for table `uprawnienia`
--

INSERT INTO `uprawnienia` (`id_uprawnien`, `nazwa_uprawnien`) VALUES
(1, 'user'),
(2, 'teacher'),
(3, 'admin\r\n'),
(4, 'root');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategorie_slowa`
--
ALTER TABLE `kategorie_slowa`
  ADD PRIMARY KEY (`id_kategorii`);

--
-- Indexes for table `konta`
--
ALTER TABLE `konta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_uprawnien` (`id_uprawnien`),
  ADD KEY `id_statusu` (`id_statusu`);

--
-- Indexes for table `slowa_de`
--
ALTER TABLE `slowa_de`
  ADD KEY `id_slowa` (`id_slowa`),
  ADD KEY `id_kategorii` (`id_kategorii`);

--
-- Indexes for table `slowa_eng`
--
ALTER TABLE `slowa_eng`
  ADD KEY `id_slowa` (`id_slowa`),
  ADD KEY `id_kategorii` (`id_kategorii`);

--
-- Indexes for table `slowa_es`
--
ALTER TABLE `slowa_es`
  ADD KEY `id_slowa` (`id_slowa`),
  ADD KEY `id_kategorii` (`id_kategorii`);

--
-- Indexes for table `slowa_pl`
--
ALTER TABLE `slowa_pl`
  ADD PRIMARY KEY (`id_slowa`),
  ADD KEY `id_kategorii` (`id_kategorii`);

--
-- Indexes for table `statusy`
--
ALTER TABLE `statusy`
  ADD PRIMARY KEY (`id_statusu`);

--
-- Indexes for table `uprawnienia`
--
ALTER TABLE `uprawnienia`
  ADD PRIMARY KEY (`id_uprawnien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorie_slowa`
--
ALTER TABLE `kategorie_slowa`
  MODIFY `id_kategorii` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `konta`
--
ALTER TABLE `konta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `slowa_pl`
--
ALTER TABLE `slowa_pl`
  MODIFY `id_slowa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `statusy`
--
ALTER TABLE `statusy`
  MODIFY `id_statusu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `uprawnienia`
--
ALTER TABLE `uprawnienia`
  MODIFY `id_uprawnien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `konta`
--
ALTER TABLE `konta`
  ADD CONSTRAINT `konta_ibfk_1` FOREIGN KEY (`id_uprawnien`) REFERENCES `uprawnienia` (`id_uprawnien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `konta_ibfk_2` FOREIGN KEY (`id_statusu`) REFERENCES `statusy` (`id_statusu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slowa_de`
--
ALTER TABLE `slowa_de`
  ADD CONSTRAINT `slowa_de_ibfk_1` FOREIGN KEY (`id_kategorii`) REFERENCES `kategorie_slowa` (`id_kategorii`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `slowa_de_ibfk_2` FOREIGN KEY (`id_slowa`) REFERENCES `slowa_pl` (`id_slowa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slowa_eng`
--
ALTER TABLE `slowa_eng`
  ADD CONSTRAINT `slowa_eng_ibfk_1` FOREIGN KEY (`id_kategorii`) REFERENCES `kategorie_slowa` (`id_kategorii`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `slowa_eng_ibfk_2` FOREIGN KEY (`id_slowa`) REFERENCES `slowa_pl` (`id_slowa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slowa_es`
--
ALTER TABLE `slowa_es`
  ADD CONSTRAINT `slowa_es_ibfk_1` FOREIGN KEY (`id_kategorii`) REFERENCES `kategorie_slowa` (`id_kategorii`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `slowa_es_ibfk_2` FOREIGN KEY (`id_slowa`) REFERENCES `slowa_pl` (`id_slowa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slowa_pl`
--
ALTER TABLE `slowa_pl`
  ADD CONSTRAINT `slowa_pl_ibfk_1` FOREIGN KEY (`id_kategorii`) REFERENCES `kategorie_slowa` (`id_kategorii`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
