-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 07 mrt 2016 om 09:34
-- Serverversie: 10.1.9-MariaDB
-- PHP-versie: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imd`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `post` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `posts`
--

INSERT INTO `posts` (`id`, `title`, `post`) VALUES
(1, 'Ik ben Yaron', 'Hallo!\n\nIk ben Yaron, welkom op mijn blog.\n\nWebsite: www.yarondassonneville.be'),
(2, 'XSS ', '<script>\r\nalert(''test'');\r\n</script>\r\n'),
(3, 'Lorem', 'Ipsum slqjfnlkjsncflk jsq lkfjslkjchfsqlkhdfqns v:,;qd lfjbsqlkfnqs,fbqs;,dnf,s b <h1>test</h1>\r\n\r\n'),
(4, 'Lorem Ipsum', 'Lorem Ipsum this is you Lorem Ipsum this is you Lorem Ipsum this is you Lorem Ipsum this is you Lorem Ipsum this is you Lorem Ipsum this is you Lorem Ipsum this is you Lorem Ipsum this is you Lorem Ipsum this is you Lorem Ipsum this is you Lorem Ipsum this is you Lorem Ipsum this is you'),
(5, 'Test', 'Hallo!\n<script>You are hacked</script>\n<h1>Hallo</h1>\n<?php $echo test ?>');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(6, 'yaron@yarondassonneville.be', '$2y$12$I77HRfnadb1PuILXwS6gZ.pjjgmo.MzH.748xrl7SLXSloYwCgwiK'),
(8, 'yaron@test.be', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08'),
(9, 'hello@yarondassonneville.be', '$2y$12$sGoQR0bWyW/ARWQzdWO1zOv2uywF2BNkDeZa73YbGFjIZRWjLTmJu'),
(10, 'test@ik.be', '$2y$12$X9Xt5MollEU4cglhQ1qNIO4qQ5/rk/n3Mv2T/WEDYtjZ7yYy7.M7i'),
(11, 'test@ik.be', '$2y$12$ATE.MBD1W8E55OI8XGpQL.0aXvy2YBWF7ccKdc6sbNOMHr/InkaKm');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT voor een tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
