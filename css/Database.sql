-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: db102
-- Czas generowania: 25 Wrz 2017, 09:09
-- Wersja serwera: 5.5.35-log
-- Wersja PHP: 5.5.23-pl0-gentoo

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `db1_cff_h2_pl`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Answers`
--

CREATE TABLE `Answers` (
  `ID` int(8) NOT NULL,
  `Date` datetime NOT NULL,
  `Name` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `Surname` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `E-mail` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `Picture` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `Comment_ID` int(8) NOT NULL,
  `Type` varchar(12) COLLATE utf8_polish_ci NOT NULL,
  `Answer` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci COMMENT='Answers to comments';

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Categories`
--

CREATE TABLE `Categories` (
  `ID` int(4) NOT NULL,
  `Name` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci COMMENT='Categories of blog posts';

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Comments`
--

CREATE TABLE `Comments` (
  `ID` int(11) NOT NULL,
  `Author` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `Date` datetime NOT NULL,
  `URL` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `Comment` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci COMMENT='Comments of blog';

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Posts`
--

CREATE TABLE `Posts` (
  `ID` int(4) NOT NULL,
  `Theme` tinyint(4) NOT NULL,
  `Category` tinyint(4) NOT NULL,
  `Title` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `Cover` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `Date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci COMMENT='Posts of blog';

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Theme`
--

CREATE TABLE `Theme` (
  `ID` int(3) NOT NULL,
  `Name` varchar(25) COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci COMMENT='Theme of category';

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Account` int(25) NOT NULL,
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Surname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `E-mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Comment` text COLLATE utf8_unicode_ci NOT NULL,
  `URL` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `Answers`
--
ALTER TABLE `Answers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Posts`
--
ALTER TABLE `Posts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Theme`
--
ALTER TABLE `Theme`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `Answers`
--
ALTER TABLE `Answers`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT dla tabeli `Categories`
--
ALTER TABLE `Categories`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT dla tabeli `Comments`
--
ALTER TABLE `Comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT dla tabeli `Posts`
--
ALTER TABLE `Posts`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT dla tabeli `Theme`
--
ALTER TABLE `Theme`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
