-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 12 mrt 2016 om 14:51
-- Serverversie: 10.1.9-MariaDB
-- PHP-versie: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twitter`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `time` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `time`, `description`) VALUES
(1, 'Libeert', '2015 - 2015', 'I had to work in the marketing & webdesign department'),
(2, 'Netcrew', '2014-2014', 'Stage'),
(3, 'Alligence', '2014 - 2014', 'Vakantiejob');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `tweets`
--

CREATE TABLE `tweets` (
  `id` int(11) NOT NULL,
  `text` varchar(160) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `tweets`
--

INSERT INTO `tweets` (`id`, `text`, `userID`) VALUES
(1, 'Hallo dit is een test', 1),
(2, 'Hallo dit is een test 2', 0),
(3, 'Test\r\n', 1),
(4, 'Test', 1),
(5, 'Lorem ipsum, het werkt!', 1),
(6, '&lt;script&gt; alert(&quot;hacked&quot;) &lt;/script&gt;\r\n', 1),
(7, 'Hello\r\n', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Yaron Dassonneville', 'yarondassonneville@outlook.com', '$2y$12$cyZjUu33dI7HcTKwWFxhj.vE3OWovSCxGJEdp69u9CLr5QTjXPmfG'),
(2, 'Admin', 'admin@yaron.be', '$2y$12$niicD7wdvkOvMCbxWQUBrey37iiZICxuCSwtkXwTU9uhBsGuUOalm'),
(3, 'PassTest', 'pass@word.be', '$2y$12$jB6Nuswkc9K/eYy5RtrhSOyTEcW5BBlayrm2WVL0qviUzsgJtu1he'),
(4, 'Yaron Dassonneville', 'yaron@yarondassonneville.be', '$2y$12$AsEmtGAsuGxK7ChxppyhUunjsKrNQTs7IC4rEYOTkY3mhgWvc7kYO'),
(5, 'Josh', 'hello@yaron.be', '$2y$12$FJFZIWlCtET5dc6Ia2aYTechIi5o183P/4Bp5vCZdBvXhGawvchmm');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT voor een tabel `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
