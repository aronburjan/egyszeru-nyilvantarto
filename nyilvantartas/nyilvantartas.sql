-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Máj 15. 21:12
-- Kiszolgáló verziója: 10.4.17-MariaDB
-- PHP verzió: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `nyilvantartas`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `fragile` varchar(255) NOT NULL,
  `addedby` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `fragile`, `addedby`) VALUES
(17, 'Teszt4', 235135, 'Nem', ''),
(18, 'sdg', 235, 'Igen', ''),
(19, 'asdgas', 253532, 'Nem', ''),
(20, 'dfshdsfh', 235223, 'Nem', ''),
(21, 'saghhdfh', 56236, 'Nem', ''),
(22, 'asdgsd', 2352352, 'Nem', ''),
(23, 'asdfh', 235235, 'Nem', ''),
(24, 'törékeny', 444444, 'Nem', ''),
(25, 'erhsdrh', 23523, 'Nem', ''),
(26, 'hdsfhsdfhd', 5236236, 'Igen', ''),
(27, 'aaaaaaaaaaaaaaa', 777777, 'Igen', ''),
(28, 'asdgsad', 23562, 'Nem', ''),
(29, 'asdgsad', 23562, 'Nem', ''),
(30, 'erhzdshr', 235523, 'Igen', ''),
(31, 'eeeeeeeeeeeeeeeeeeeee', 2147483647, 'Igen', ''),
(32, 'asdg', 253, 'Nem', ''),
(33, 'erz', 235, 'Igen', ''),
(34, 'we', 124, 'Nem', ''),
(35, 'erhsreh', 6346, 'Igen', ''),
(36, 'erhsreh', 6346, 'Igen', ''),
(37, 'rturt', 23523512, 'Igen', ''),
(38, 'rturt', 23523512, 'Igen', ''),
(39, 'rturt', 23523512, 'Igen', ''),
(40, 'asdg', 235, 'Igen', ''),
(41, 'adhdh', 235, 'Nem', ''),
(45, 'uj', 86685, 'Nem', ''),
(46, 'Mobiltelefon', 23523, 'Nem', ''),
(47, 'asd', 236, 'Igen', ''),
(48, 'asd', 236, 'Igen', ''),
(49, 'asd', 236, 'Igen', ''),
(50, 'asd', 236, 'Igen', ''),
(51, 'adfhdf', 23532, 'Igen', ''),
(52, 'adfhdf', 23532, 'Igen', ''),
(53, 'adfhdf', 23532, 'Igen', ''),
(54, 'trtrr', 235325, 'Nem', ''),
(55, 'trtrr', 235325, 'Nem', ''),
(56, 'dfhdfh', 435346, 'Igen', ''),
(57, 'dfhdfh', 435346, 'Igen', ''),
(58, 'zerz', 345, 'Nem', ''),
(59, 'zerz', 345, 'Nem', ''),
(60, 'zerz', 345, 'Nem', ''),
(61, 'ututut', 555, 'Igen', ''),
(62, 'logteszt', 5325, 'Igen', ''),
(64, 'hdfh', 36, 'Igen', ''),
(65, 'tzizt', 5745, 'Nem', ''),
(66, 'tzizt', 5745, 'Nem', ''),
(67, 'logidoteszt', 110, 'Nem', ''),
(68, 'logidoteszt2', 1124, 'Nem', ''),
(69, 'logteszt3', 35, 'Igen', ''),
(70, 'logtesztsortörés', 34, 'Igen', ''),
(71, 'logtesztsortöréskettő', 346, 'Igen', ''),
(73, 'logtesztsortöréskettő', 346, 'Igen', ''),
(74, 'logtesztsortöréskettő', 346, 'Igen', ''),
(75, 'logtesztsortöréskettő', 346, 'Igen', ''),
(88, 'reloadtestsokadik', 34634, 'Igen', ''),
(90, 'addedbytest', 58454, 'Igen', 'PeldaEgy'),
(91, 'adminhozzad', 35734, 'Igen', 'admin'),
(93, 'fgjfj', 3643, 'Igen', 'admin'),
(94, 'sdhd', 34634, 'Igen', 'admin'),
(96, 'rturt', 5475, 'Igen', 'admin'),
(97, 'felhasznalotermek', 234634, 'Nem', 'PeldaEgy');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` enum('admin','level1user','level2user') NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `password`, `name`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin Admin'),
(2, 'level1user', 'PeldaEgy', '827ccb0eea8a706c4c34a16891f84e7b', 'John Doe'),
(3, 'level2user', 'PeldaKetto', '01cfcd4f6b8770febfb40cb906715822', 'Jane Doe'),
(79, 'level2user', 'user', '827ccb0eea8a706c4c34a16891f84e7b', 'User User'),
(80, 'admin', 'asd', '202cb962ac59075b964b07152d234b70', 'Megváltoztat Teszt');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UC_users` (`username`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
