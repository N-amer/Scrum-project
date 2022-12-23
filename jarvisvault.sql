-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 27 jun 2022 om 18:02
-- Serverversie: 10.4.22-MariaDB
-- PHP-versie: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jarvisvault`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers_accounts`
--

CREATE TABLE `gebruikers_accounts` (
  `id` int(11) NOT NULL,
  `password` varchar(55) NOT NULL,
  `username` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers_accounts`
--

INSERT INTO `gebruikers_accounts` (`id`, `password`, `username`) VALUES
(1, 'bilal', 'bilal'),
(2, 'anass', 'anass'),
(5, 'OMER', 'OMER'),
(6, 'admin', 'admin'),
(7, 'pass', 'ties@bit-academy.nl'),
(8, 'b', 'a'),
(9, 'pass', 'anass');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `notes`
--

CREATE TABLE `notes` (
  `id` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `omschrijving` varchar(255) NOT NULL,
  `gebruikersnaam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `notes`
--

INSERT INTO `notes` (`id`, `title`, `omschrijving`, `gebruikersnaam`) VALUES
(1, 'test', 'test', 'terst'),
(2, 'test2', 'test2', 'terst2'),
(3, 'Zaken ', 'Zaken', '1'),
(4, 'lol', 'lol', 'bilal'),
(5, 'Test4', 'Test4', 'Ties'),
(6, 'Test4', 'Test4', 'Ties'),
(7, 'Omerr', 'Omer vindt het leuk om PDO te doen', 'omer@hotmail.com'),
(8, 'lo', 'lolll', 'omer@hotmail.com'),
(9, 'omer', 'omer', 'omer@hotmail.com'),
(10, 'ubada', 'ubada', 'ubada'),
(11, 'ubada', 'ubada', 'ubada'),
(12, 'ahmad', 'ahmad', 'ubada'),
(13, 'biala', 'bialaa', 'omer@hotmail.com'),
(14, 'ubada', 'ubada', 'Ties'),
(15, 'ijiji', 'ijijijijadiofnsdklijf; lsd.,ms', 'Ties'),
(16, 'ubada', 'ubada', 'Ties'),
(17, 'udshfbkslnf.sd,', 'sdfjkhgsflks.d,f', 'omer@hotmail.com'),
(20, 'meer reminders', 'meer zaken', 'ties@bit-academy.nl'),
(21, 'stling', 'beter', 'ties@bit-academy.nl'),
(24, 'anass', 'HTML', 'anass'),
(25, 'lol', 'lol', 'anass'),
(36, 'lol', 'lol3\r\n', 'admin');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `passwordmanager`
--

CREATE TABLE `passwordmanager` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `gebruikersnaam` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `passwordmanager`
--

INSERT INTO `passwordmanager` (`id`, `title`, `username`, `password`, `gebruikersnaam`) VALUES
(41, 'ubada', 'ubada', 'JBKJ', '1'),
(43, 'anass', 'omer@hoamsnstmail.com', 'Omer123ss', '2'),
(44, 'ubqdq', 'omer@hotmail.cdxfdom', 'Omer123dd', '2'),
(46, 'kjfvndfjkgn', 'dsfsd', 'test', '3'),
(47, 'ties1', 'ties1', 'Ties2003', '4'),
(48, 'Tiestest', 'Tiestest', 'Tesssss22200', '2'),
(57, 'lol', 'omer@hotmail.com', 'Omer123', '6'),
(60, 'anass', 'anass', 'anass123', '9'),
(61, 'Test', 'omer@hotmail.com', 'Omer123', '6'),
(66, 'ubada', 'omer@hotmail.com', 'JBKJ', '6');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `gebruikers_accounts`
--
ALTER TABLE `gebruikers_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `passwordmanager`
--
ALTER TABLE `passwordmanager`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `gebruikers_accounts`
--
ALTER TABLE `gebruikers_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT voor een tabel `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT voor een tabel `passwordmanager`
--
ALTER TABLE `passwordmanager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
