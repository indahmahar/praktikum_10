-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2021 at 09:19 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

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
-- Table structure for table `nama_negara`
--

CREATE TABLE `nama_negara` (
  `id_negara` int(4) NOT NULL,
  `nama_negara` varchar(50) NOT NULL,
  `total_cases` varchar(50) NOT NULL,
  `new_cases` varchar(50) NOT NULL,
  `total_deaths` varchar(50) NOT NULL,
  `new_deaths` varchar(50) NOT NULL,
  `total_recovered` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nama_negara`
--

INSERT INTO `nama_negara` (`id_negara`, `nama_negara`, `total_cases`, `new_cases`, `total_deaths`, `new_deaths`, `total_recovered`) VALUES
(1, 'World', '159595344', '+611096', '3317384', '+10586', '138206710'),
(2, 'USA', '33515308', '+30152', '596179', '+370', '26507427'),
(3, 'india', '22991927', '+329517', '250025', '+3879', '19021207'),
(4, 'Brazil', '15214030', '+29240', '423436', '+1018', '13759125'),
(5, 'France', '5780379', '+3292', '106684', '+292', '4917393'),
(6, 'Turkey', '5044936', '+13604', '43311', '+282', '4743871'),
(7, 'Russia', '4888727', '+8465', '113647', '+321', '4502906'),
(8, 'UK', '4437217', '+2357', '127609', '+4', '4250699'),
(9, 'Italy', '4116287', '+5080', '123031', '+198', '3619586'),
(10, 'Spain', '3581392', '+4579', '78895', '+35', '3274808'),
(11, 'Germany', '3535354', '+7814', '85481', '+110', '3175600');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nama_negara`
--
ALTER TABLE `nama_negara`
  ADD PRIMARY KEY (`id_negara`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nama_negara`
--
ALTER TABLE `nama_negara`
  MODIFY `id_negara` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
