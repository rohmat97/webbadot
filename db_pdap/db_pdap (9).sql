-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2018 at 04:48 PM
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
(1, 1, 600, 60000),
(2, 1, 50000, 600),
(3, 3, 200, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id_pengguna` int(6) NOT NULL,
  `jns_pengguna` text,
  `username` varchar(20) NOT NULL,
  `no_rumah` varchar(6) NOT NULL,
  `no_hp` text NOT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_pengguna`, `jns_pengguna`, `username`, `no_rumah`, `no_hp`, `password`) VALUES
(1, 'pertamax', 'admon', '0', '0', 'a2960f70941d29b6123e6ebe493f38d2'),
(2, 'Pengguna', 'Ranti', 'B14', '0892356', '202cb962ac59075b964b07152d234b70'),
(3, 'Pengguna', 'Rivan', 'B65', '987468', '202cb962ac59075b964b07152d234b70'),
(4, 'Pengguna', 'Ryad', 'C43', '864839', '202cb962ac59075b964b07152d234b70');

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
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_riwayat`
--

INSERT INTO `tbl_riwayat` (`id_riwayat`, `id_pengguna`, `id_tagihan`, `jlh_debit`, `jlh_tagihan`, `tanggal`) VALUES
(1, 2, 1, 110, 55000, '2018-10-07 06:00:00'),
(2, 2, 1, 400, 200000, '2018-10-08 00:00:00'),
(4, 2, 1, 200, 100000, '2018-11-04 00:00:00'),
(5, 3, 2, 400, 200000, '2018-10-09 00:00:00'),
(6, 4, 3, 300, 150000, '2018-12-10 00:00:00');

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
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_tagihan` (`id_tagihan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cekdebit`
--
ALTER TABLE `tbl_cekdebit`
  MODIFY `id_tagihan` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id_pengguna` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_riwayat`
--
ALTER TABLE `tbl_riwayat`
  MODIFY `id_riwayat` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
