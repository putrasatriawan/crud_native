-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 29, 2024 at 11:02 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_ajax`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_mhs`
--

CREATE TABLE `tb_mhs` (
  `id` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `konsentrasi` varchar(255) NOT NULL,
  `kurikulum` varchar(255) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mhs`
--

INSERT INTO `tb_mhs` (`id`, `nim`, `name`, `konsentrasi`, `kurikulum`, `is_deleted`) VALUES
(1, 9, '9', '9', '9', 1),
(2, 1, '1', '1', '1', 1),
(3, 1, '1', '1', '1', 1),
(4, 1, '1', '1', '1', 0),
(5, 1, '1', '1', '1', 0),
(6, 1, '1', '1', '1', 0),
(7, 1, '1', '1', '1', 0),
(8, 1, '1', '1', '1', 0),
(9, 1, '1', '1', '1', 0),
(10, 1, '1', '1', '1', 0),
(11, 1, '1', '1', '1', 0),
(12, 1, '1', '1', '1', 0),
(13, 1, '1', '1', '1', 0),
(14, 1, '1', '1', '1', 0),
(15, 1, '1', '1', '1', 0),
(16, 1, '1', '1', '1', 0),
(17, 1, '1', '1', '1', 0),
(18, 1, '12', '1', '1', 0),
(19, 12, '12', '', '', 0),
(20, 12, '12', '', '', 0),
(21, 12, '12', '', '', 0),
(22, 1, '2', '3', '4', 0),
(23, 9, '9', '9', '9', 0),
(24, 12, '12', '12', '12', 0),
(25, 12, '12', '12', '12', 0),
(26, 12, '12', '12', '12', 0),
(27, 12, '12', '12', '12', 0),
(28, 1, '2', '3', '4', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_mhs`
--
ALTER TABLE `tb_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
