-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Nov 2021 pada 13.50
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lastproject`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `displayfood`
--

CREATE TABLE `displayfood` (
  `ID` int(11) NOT NULL,
  `Foodname` varchar(50) NOT NULL,
  `Foodprice` int(50) NOT NULL,
  `Picture` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `displayfood`
--

INSERT INTO `displayfood` (`ID`, `Foodname`, `Foodprice`, `Picture`) VALUES
(1, 'Salmon Rosemary', 68000, 'food2.jpg'),
(2, 'Chicken Mozarella', 52000, 'food3.jpg'),
(3, 'Crispy Chicken', 30000, 'food4.jpg'),
(4, 'Ghidorah Set', 200000, 'food5.jpg'),
(5, 'Prime Sirloin', 87000, 'ryu.jpg'),
(6, 'Prime Tenderloin', 103000, 'food6.jpg'),
(7, 'French Fries', 15000, 'food7.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `drinkdisplay`
--

CREATE TABLE `drinkdisplay` (
  `ID` int(11) NOT NULL,
  `Drinkname` varchar(50) NOT NULL,
  `Drinkprice` int(50) NOT NULL,
  `Photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `drinkdisplay`
--

INSERT INTO `drinkdisplay` (`ID`, `Drinkname`, `Drinkprice`, `Photo`) VALUES
(1, 'Mocktail Scarlet Kiss', 20000, 'drink1.jpg'),
(2, 'Milkshake', 25000, 'drink2.jpg'),
(3, 'Classic Matcha', 20000, 'drink3.jpg'),
(4, 'Cereal Milk', 30000, 'drink4.jpg'),
(5, 'Iced Latte', 37000, 'drink5.jpg'),
(6, 'Fruit Flavoured Tea', 18000, 'drink6.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `userdata`
--

CREATE TABLE `userdata` (
  `ID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Number` int(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Province` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `userdata`
--

INSERT INTO `userdata` (`ID`, `Email`, `Username`, `Password`, `Number`, `Address`, `City`, `Province`) VALUES
(2, 'agiltopbenedjatim@gmail.com', 'Agil', '$2y$10$rVwXOzWrAEZ4WBLP1mDi0.V8AKBGMC7jbh2CB/kcJfvq/moqdIdSS', 2147483647, 'Jln. Ranakah Blok Q-12 Tidar', 'Malang ', 'Jawa Timur');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `displayfood`
--
ALTER TABLE `displayfood`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `drinkdisplay`
--
ALTER TABLE `drinkdisplay`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `displayfood`
--
ALTER TABLE `displayfood`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `drinkdisplay`
--
ALTER TABLE `drinkdisplay`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `userdata`
--
ALTER TABLE `userdata`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
