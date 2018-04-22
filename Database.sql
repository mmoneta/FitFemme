-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas generowania: 22 Kwi 2018, 20:58
-- Wersja serwera: 5.5.57-38.9-log
-- Wersja PHP: 5.5.35-ogc0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `db1_cff_h2_pl`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Answers`
--

CREATE TABLE IF NOT EXISTS `Answers` (
`ID` int(8) NOT NULL,
  `Date` datetime NOT NULL,
  `Name` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `Surname` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `E-mail` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `Picture` varchar(255) COLLATE utf8_polish_ci DEFAULT NULL,
  `Comment_ID` int(8) NOT NULL,
  `Type` varchar(12) COLLATE utf8_polish_ci NOT NULL,
  `Answer` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci COMMENT='Answers to comments' AUTO_INCREMENT=66 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Categories`
--

CREATE TABLE IF NOT EXISTS `Categories` (
`ID` int(4) NOT NULL,
  `Name` varchar(255) COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci COMMENT='Categories of blog posts' AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Comments`
--

CREATE TABLE IF NOT EXISTS `Comments` (
`ID` int(11) NOT NULL,
  `Author` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `Date` datetime NOT NULL,
  `URL` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `Comment` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci COMMENT='Comments of blog' AUTO_INCREMENT=19251 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Posts`
--

CREATE TABLE IF NOT EXISTS `Posts` (
`ID` int(4) NOT NULL,
  `Theme` tinyint(4) NOT NULL,
  `Category` tinyint(4) NOT NULL,
  `Title` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `Cover` varchar(128) COLLATE utf8_polish_ci NOT NULL,
  `Style` varchar(128) COLLATE utf8_polish_ci DEFAULT NULL,
  `Date` date NOT NULL,
  `Active` tinyint(1) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci COMMENT='Posts of blog' AUTO_INCREMENT=106 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Theme`
--

CREATE TABLE IF NOT EXISTS `Theme` (
`ID` int(3) NOT NULL,
  `Name` varchar(25) COLLATE utf8_polish_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci COMMENT='Theme of category' AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`ID` int(11) NOT NULL,
  `Account` int(25) NOT NULL,
  `Name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Surname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `E-mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Comment` text COLLATE utf8_unicode_ci NOT NULL,
  `URL` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=86 ;

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
MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT dla tabeli `Categories`
--
ALTER TABLE `Categories`
MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT dla tabeli `Comments`
--
ALTER TABLE `Comments`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19251;
--
-- AUTO_INCREMENT dla tabeli `Posts`
--
ALTER TABLE `Posts`
MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT dla tabeli `Theme`
--
ALTER TABLE `Theme`
MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=86;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
