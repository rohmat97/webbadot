-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2018 at 06:34 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

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
-- Table structure for table `ambang_batas`
--

CREATE TABLE `ambang_batas` (
  `id_ambang_batas` int(11) NOT NULL,
  `ketinggian_air` varchar(10) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `ketinggian_air` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `status1` varchar(30) NOT NULL,
  `status2` varchar(30) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 1, 600, 60000),
(2, 1, 50000, 600),
(3, 1, 1600, 160000);

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
(1, 'pertamax', 'admon', 'a2960f70941d29b6123e6ebe493f38d2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_riwayat`
--

CREATE TABLE `tbl_riwayat` (
  `id_riwayat` int(6) NOT NULL,
  `id_pengguna` int(6) NOT NULL,
  `id_tagihan` int(6) NOT NULL,
  `jlh_debit` int(20) NOT NULL,
  `jlh_tagihan` int(20) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_riwayat`
--

INSERT INTO `tbl_riwayat` (`id_riwayat`, `id_pengguna`, `id_tagihan`, `jlh_debit`, `jlh_tagihan`, `tanggal`) VALUES
(3, 1, 1, 600, 50000, '2018-11-20 09:42:08'),
(4, 1, 2, 50000, 600, '2018-10-14 08:18:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambang_batas`
--
ALTER TABLE `ambang_batas`
  ADD PRIMARY KEY (`id_ambang_batas`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`);

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
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_tagihan` (`id_tagihan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ambang_batas`
--
ALTER TABLE `ambang_batas`
  MODIFY `id_ambang_batas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cekdebit`
--
ALTER TABLE `tbl_cekdebit`
  MODIFY `id_tagihan` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id_pengguna` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_riwayat`
--
ALTER TABLE `tbl_riwayat`
  MODIFY `id_riwayat` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cekdebit`
--
ALTER TABLE `tbl_cekdebit`
  ADD CONSTRAINT `tbl_cekdebit_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tbl_pengguna` (`id_pengguna`);

--
-- Constraints for table `tbl_riwayat`
--
ALTER TABLE `tbl_riwayat`
  ADD CONSTRAINT `tbl_riwayat_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tbl_pengguna` (`id_pengguna`),
  ADD CONSTRAINT `tbl_riwayat_ibfk_2` FOREIGN KEY (`id_tagihan`) REFERENCES `tbl_cekdebit` (`id_tagihan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
