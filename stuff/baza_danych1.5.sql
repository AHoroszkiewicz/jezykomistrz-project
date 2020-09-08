-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Wrz 2020, 03:00
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `jezykomistrz`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie_slowa`
--

CREATE TABLE `kategorie_slowa` (
  `id_kategorii` int(11) NOT NULL,
  `kategoria` mediumtext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kategorie_slowa`
--

INSERT INTO `kategorie_slowa` (`id_kategorii`, `kategoria`) VALUES
(1, 'informatyka'),
(2, 'medycyna'),
(3, 'archeologia');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konta`
--

CREATE TABLE `konta` (
  `id` int(11) NOT NULL,
  `login` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `haslo` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `email` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `id_uprawnien` int(11) NOT NULL,
  `id_statusu` int(11) NOT NULL,
  `quiz_pl_inf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `konta`
--

INSERT INTO `konta` (`id`, `login`, `haslo`, `email`, `id_uprawnien`, `id_statusu`, `quiz_pl_inf`) VALUES
(1, 'root', '$argon2id$v=19$m=1024,t=2,p=2$ejFJeFNaU09RS2FhS29vSg$ki1UXOfix6SNyTwlDd4K1pESsCXXIBbuvRhjk+CXPJM', 'root@example.com', 4, 1, 0),
(2, 'admin', '$argon2id$v=19$m=1024,t=2,p=2$Sy94ajRSbUhSdC9RWS9TTQ$9uemCbzimeGYLtuwc5vBH2208kr28DIbGi38gpjTYic', 'admin@example.com', 3, 1, 0),
(3, 'user', '$argon2id$v=19$m=1024,t=2,p=2$OHhLV2k4M1hnejR6d0FFaQ$RtNHrHgW46bjH7rlVeCyIPwIx5N9/uHhf8A8q8Q+wuk', 'user@example.com', 1, 1, 1),
(4, 'teacher', '$argon2id$v=19$m=1024,t=2,p=2$aGFWY1RhaFgyaEpkdGMzOA$F66bOQTyGQRkeVMmItmNDLUn239hA7cWasCZH+qt0YA', 'teacher@example.com', 2, 1, 0),
(5, 'blocked', '$argon2id$v=19$m=1024,t=2,p=2$Sjg4TVZPUW81WnhPVk5xMQ$S4X1Gl8d4MMploxorMG38keBSX7BfsMcrpfAUZRuit4', 'blocked@example.com', 1, 3, 0),
(6, 'inactive', '$argon2id$v=19$m=1024,t=2,p=2$Z3pvcy5tOFpQLlZEbVR0QQ$konTlNvnq6Tb9Op4sSoXWT55iRnHb3x+vOsQASu0W7E', 'inactive@example.com', 1, 2, 0),
(7, 'removed', '$argon2id$v=19$m=1024,t=2,p=2$ak50OFdhNGhaU0gzOVhLbg$G82fCmW61h7sDNYr/8Y+2IWDP3SoQ5BE4Nk7p7EzF7M', 'removed@example.com', 1, 4, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pytanka_eng`
--

CREATE TABLE `pytanka_eng` (
  `id_pytania` int(11) NOT NULL,
  `pytanie` text COLLATE utf8_polish_ci NOT NULL,
  `dobraodp` text COLLATE utf8_polish_ci NOT NULL,
  `zlaodp` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `pytanka_eng`
--

INSERT INTO `pytanka_eng` (`id_pytania`, `pytanie`, `dobraodp`, `zlaodp`) VALUES
(1, 'What is the extension type of the excel 2007 files?', 'xlsx', 'xls'),
(2, 'Which one is volatile memory in a computer system', 'RAM', 'ROM'),
(3, 'Which system was created and developed by apple?', 'IOS', 'Android'),
(4, 'Which of the following is not an operating system?', 'C', 'Mac'),
(5, '1024 bit is equal to', '128 Byte', '32 Byte'),
(6, '.gif is an extension of ', 'Image file', 'Video file'),
(7, 'Which on is the latest release Windows Operating System?', 'Windows 10', 'Windows XP'),
(8, 'Linux is an example of', 'operating system', 'Software'),
(9, 'Which one is an Input device', 'Mouse', 'Monitor'),
(10, 'Mark Zuckerberg is the owner of', 'Facebook', 'LinkedIn'),
(11, 'In which year the Microsoft was founded', '1975', '1980'),
(12, 'Binary system uses power of ', '2', '4'),
(13, 'hyperlink means', 'text connected to page', 'coloured text'),
(14, 'GUI means', 'Graphical user interface', 'Guided user interface'),
(15, 'repeaters work in _____ layer', 'physical', 'network'),
(16, 'FAT stands for', 'File allocation table', 'Folder access table'),
(17, 'Where are cookies stored', 'on the client', 'In HTML'),
(18, 'Errors in computer programmes are called', 'Bugs', 'Mistakes'),
(19, 'IoT stands for', 'Internet of Things', 'International organisations of Teleservices'),
(20, 'When a computer suddenly stops working, it means it\'s', 'Hanged', 'Crashed'),
(21, 'magnetic disc is an example of ', 'Offline storage', 'Offset storage'),
(22, 'virus is a computer___', 'program', 'file'),
(23, 'SQL stands for', 'Structured Query Language', 'Standard Quality Language '),
(24, 'The place where accessories are connected in computer is known as', 'Port', 'Bus'),
(25, 'a computer on Internet is uniquely indentified by', 'IP address', 'Memory address');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `slowa_de`
--

CREATE TABLE `slowa_de` (
  `slowo` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `id_slowa` int(11) NOT NULL,
  `id_kategorii` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `slowa_de`
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
-- Struktura tabeli dla tabeli `slowa_eng`
--

CREATE TABLE `slowa_eng` (
  `slowo` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `id_slowa` int(11) NOT NULL,
  `id_kategorii` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `slowa_eng`
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
-- Struktura tabeli dla tabeli `slowa_es`
--

CREATE TABLE `slowa_es` (
  `slowo` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `id_slowa` int(11) NOT NULL,
  `id_kategorii` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `slowa_es`
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
-- Struktura tabeli dla tabeli `slowa_pl`
--

CREATE TABLE `slowa_pl` (
  `id_slowa` int(11) NOT NULL,
  `slowo` mediumtext COLLATE utf8_polish_ci NOT NULL,
  `id_kategorii` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `slowa_pl`
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
-- Struktura tabeli dla tabeli `statusy`
--

CREATE TABLE `statusy` (
  `id_statusu` int(11) NOT NULL,
  `status` mediumtext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `statusy`
--

INSERT INTO `statusy` (`id_statusu`, `status`) VALUES
(1, 'aktywny'),
(2, 'nieaktywny'),
(3, 'zablokowany'),
(4, 'usuniety');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uprawnienia`
--

CREATE TABLE `uprawnienia` (
  `id_uprawnien` int(11) NOT NULL,
  `nazwa_uprawnien` mediumtext COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uprawnienia`
--

INSERT INTO `uprawnienia` (`id_uprawnien`, `nazwa_uprawnien`) VALUES
(1, 'user'),
(2, 'teacher'),
(3, 'admin\r\n'),
(4, 'root');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kategorie_slowa`
--
ALTER TABLE `kategorie_slowa`
  ADD PRIMARY KEY (`id_kategorii`);

--
-- Indeksy dla tabeli `konta`
--
ALTER TABLE `konta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_uprawnien` (`id_uprawnien`),
  ADD KEY `id_statusu` (`id_statusu`);

--
-- Indeksy dla tabeli `pytanka_eng`
--
ALTER TABLE `pytanka_eng`
  ADD PRIMARY KEY (`id_pytania`);

--
-- Indeksy dla tabeli `slowa_de`
--
ALTER TABLE `slowa_de`
  ADD KEY `id_slowa` (`id_slowa`),
  ADD KEY `id_kategorii` (`id_kategorii`);

--
-- Indeksy dla tabeli `slowa_eng`
--
ALTER TABLE `slowa_eng`
  ADD KEY `id_slowa` (`id_slowa`),
  ADD KEY `id_kategorii` (`id_kategorii`);

--
-- Indeksy dla tabeli `slowa_es`
--
ALTER TABLE `slowa_es`
  ADD KEY `id_slowa` (`id_slowa`),
  ADD KEY `id_kategorii` (`id_kategorii`);

--
-- Indeksy dla tabeli `slowa_pl`
--
ALTER TABLE `slowa_pl`
  ADD PRIMARY KEY (`id_slowa`),
  ADD KEY `id_kategorii` (`id_kategorii`);

--
-- Indeksy dla tabeli `statusy`
--
ALTER TABLE `statusy`
  ADD PRIMARY KEY (`id_statusu`);

--
-- Indeksy dla tabeli `uprawnienia`
--
ALTER TABLE `uprawnienia`
  ADD PRIMARY KEY (`id_uprawnien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kategorie_slowa`
--
ALTER TABLE `kategorie_slowa`
  MODIFY `id_kategorii` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `konta`
--
ALTER TABLE `konta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `pytanka_eng`
--
ALTER TABLE `pytanka_eng`
  MODIFY `id_pytania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT dla tabeli `slowa_pl`
--
ALTER TABLE `slowa_pl`
  MODIFY `id_slowa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `statusy`
--
ALTER TABLE `statusy`
  MODIFY `id_statusu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `uprawnienia`
--
ALTER TABLE `uprawnienia`
  MODIFY `id_uprawnien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `konta`
--
ALTER TABLE `konta`
  ADD CONSTRAINT `konta_ibfk_1` FOREIGN KEY (`id_uprawnien`) REFERENCES `uprawnienia` (`id_uprawnien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `konta_ibfk_2` FOREIGN KEY (`id_statusu`) REFERENCES `statusy` (`id_statusu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `slowa_de`
--
ALTER TABLE `slowa_de`
  ADD CONSTRAINT `slowa_de_ibfk_1` FOREIGN KEY (`id_kategorii`) REFERENCES `kategorie_slowa` (`id_kategorii`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `slowa_de_ibfk_2` FOREIGN KEY (`id_slowa`) REFERENCES `slowa_pl` (`id_slowa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `slowa_eng`
--
ALTER TABLE `slowa_eng`
  ADD CONSTRAINT `slowa_eng_ibfk_1` FOREIGN KEY (`id_kategorii`) REFERENCES `kategorie_slowa` (`id_kategorii`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `slowa_eng_ibfk_2` FOREIGN KEY (`id_slowa`) REFERENCES `slowa_pl` (`id_slowa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `slowa_es`
--
ALTER TABLE `slowa_es`
  ADD CONSTRAINT `slowa_es_ibfk_1` FOREIGN KEY (`id_kategorii`) REFERENCES `kategorie_slowa` (`id_kategorii`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `slowa_es_ibfk_2` FOREIGN KEY (`id_slowa`) REFERENCES `slowa_pl` (`id_slowa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `slowa_pl`
--
ALTER TABLE `slowa_pl`
  ADD CONSTRAINT `slowa_pl_ibfk_1` FOREIGN KEY (`id_kategorii`) REFERENCES `kategorie_slowa` (`id_kategorii`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
