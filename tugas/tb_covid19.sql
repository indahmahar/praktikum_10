-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Bulan Mei 2020 pada 17.03
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_covid19`
--

CREATE TABLE `tb_covid19` (
  `id_country` int(11) NOT NULL,
  `country` varchar(255) NOT NULL,
  `total_cases` int(11) DEFAULT NULL,
  `new_cases` int(11) DEFAULT NULL,
  `total_deaths` int(11) DEFAULT NULL,
  `new_deaths` int(11) DEFAULT NULL,
  `total_recovered` int(11) DEFAULT NULL,
  `active_cases` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_covid19`
--

INSERT INTO `tb_covid19` (`id_country`, `country`, `total_cases`, `new_cases`, `total_deaths`, `new_deaths`, `total_recovered`, `active_cases`) VALUES
(1, 'World', 3127951, 68005, 216987, 5538, 950878, 1960086),
(2, 'USA', 1029878, 19522, 58640, 1843, 140138, 831100),
(3, 'Spain', 232128, 2706, 23822, 301, 123903, 84403),
(4, 'Italy', 201505, 2091, 27359, 382, 68941, 105205),
(5, 'France', 165911, 2638, 23660, 367, 46886, 95365),
(6, 'UK', 161145, 3996, 21678, 586, NULL, 139123),
(7, 'Germany', 159431, 673, 6215, 89, 117400, 35816),
(8, 'Turkey', 114653, 2392, 2992, 92, 38809, 72852),
(9, 'Russia', 93558, 6411, 867, 73, 8456, 84235),
(10, 'Iran', 92584, 1112, 5877, 71, 72439, 14268),
(11, 'China', 82836, 6, 4633, 0, 77555, 648);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
