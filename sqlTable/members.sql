-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Paź 2018, 19:57
-- Wersja serwera: 10.1.36-MariaDB
-- Wersja PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `phpslimapiapp`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `skype` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `members`
--

INSERT INTO `members` (`id`, `first_name`, `last_name`, `nickname`, `phone`, `skype`, `email`, `country`) VALUES
(1, 'zygmunt', '', '', '', '', '', ''),
(3, 'zyga', 'weufhiw', 'zyga', '324123432', 'efwfwe', 'weofihew@gmail.com', 'woiefhiowe'),
(4, 'zwerwr', 'weufhiw', 'zyga', '324123432', 'efwfwe', 'weofihew@gmail.com', 'woiefhiowe');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
