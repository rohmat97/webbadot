-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2018 at 08:45 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pdap`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cekdebit`
--

CREATE TABLE `tbl_cekdebit` (
  `id_tagihan` int(6) NOT NULL,
  `id_pengguna` int(6) NOT NULL,
  `jlh_debit` int(20) NOT NULL,
  `jlh_tagihan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cekdebit`
--

INSERT INTO `tbl_cekdebit` (`id_tagihan`, `id_pengguna`, `jlh_debit`, `jlh_tagihan`) VALUES
(111801, 2, 200, 200000),
(111802, 2, 100, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id_pengguna` int(6) NOT NULL,
  `jns_pengguna` text,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_pengguna`, `jns_pengguna`, `username`, `password`) VALUES
(1, 'Admin', 'Ranti', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'user', 'rivan', '12345'),
(3, 'user', 'ryad', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_riwayat`
--

CREATE TABLE `tbl_riwayat` (
  `id_pengguna` int(6) NOT NULL,
  `id_tagihan` int(6) NOT NULL,
  `jlh_debit` int(20) NOT NULL,
  `jlh_tagihan` int(20) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_riwayat`
--

INSERT INTO `tbl_riwayat` (`id_pengguna`, `id_tagihan`, `jlh_debit`, `jlh_tagihan`, `tanggal`) VALUES
(2, 111801, 110, 55000, '2018-01-05 08:16:30'),
(3, 111802, 122, 61000, '2018-01-08 14:30:18'),
(2, 111801, 320, 160000, '2018-02-13 08:30:08'),
(2, 111801, 280, 140000, '2018-03-09 14:21:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cekdebit`
--
ALTER TABLE `tbl_cekdebit`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tbl_riwayat`
--
ALTER TABLE `tbl_riwayat`
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_tagihan` (`id_tagihan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cekdebit`
--
ALTER TABLE `tbl_cekdebit`
  MODIFY `id_tagihan` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111803;

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id_pengguna` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_riwayat`
--
ALTER TABLE `tbl_riwayat`
  ADD CONSTRAINT `tbl_riwayat_ibfk_2` FOREIGN KEY (`id_tagihan`) REFERENCES `tbl_cekdebit` (`id_tagihan`),
  ADD CONSTRAINT `tbl_riwayat_ibfk_3` FOREIGN KEY (`id_pengguna`) REFERENCES `tbl_pengguna` (`id_pengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
