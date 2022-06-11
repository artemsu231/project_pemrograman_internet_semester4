-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2022 at 10:39 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_kategori` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `harga_beli` varchar(255) NOT NULL,
  `harga_jual` varchar(255) NOT NULL,
  `satuan_barang` varchar(255) NOT NULL,
  `stok` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL,
  `tgl_update` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `id_barang`, `id_kategori`, `nama_barang`, `merk`, `harga_beli`, `harga_jual`, `satuan_barang`, `stok`, `tgl_input`, `tgl_update`) VALUES
(1, 'BR001', '1', 'Pensil Warna', 'Fabel Castel', '1500', '3000', '	\r\nPCS', '50', '10 June 2022, 16:47', '11 June 2022, 14:23'),
(2, 'BR002', '1', 'Buku', 'SIDU', '2000', '3000', 'PCS', '50', '6 Juli 2022, 16:31', ''),
(3, 'BR003', '1', 'Buku Tulis Vision', 'Vision', '1500', '2500', 'PCS', '30', '10 June 2022, 16:45', '11 June 2022, 14:55'),
(4, 'BR004', '1', 'Penghapus', 'Joyko', '250', '500', 'PCS', '50', '10 June 2022, 16:47', '11 June 2022, 08:55'),
(5, 'BR005', '2', 'Sabun Detol', 'Detol', '2500', '3000', 'PCS', '50', '10 June 2022, 16:47', '11 June 2022, 09:14'),
(12, 'BR006', '2', 'Sabun Mandi', 'Detol', '1750', '2200', 'PCS', '80', '11 June 2022, 09:00', ''),
(13, 'BR007', '2', 'Sabun Cuci Piring', 'Wings', '5000', '6500', 'PCS', '100', '11 June 2022, 15:00', ''),
(14, 'BR008', '2', 'Sabun Cuci Baju', 'Klin', '4000', '5000', 'PCS', '20', '11 June 2022, 15:01', ''),
(15, 'BR009', '3', 'Roti', 'Sari Roti', '1000', '1500', 'PCS', '100', '11 June 2022, 15:18', ''),
(16, 'BR010', '3', 'Taro', 'Taro', '750', '1000', 'PCS', '20', '11 June 2022, 15:19', ''),
(17, 'BR011', '3', 'Lays', 'Lays', '750', '1000', 'PCS', '20', '11 June 2022, 15:21', '');

-- --------------------------------------------------------

--
-- Table structure for table `identitas_toko`
--

CREATE TABLE `identitas_toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `alamat_toko` text NOT NULL,
  `telp` varchar(20) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `identitas_toko`
--

INSERT INTO `identitas_toko` (`id_toko`, `nama_toko`, `alamat_toko`, `telp`, `nama_pemilik`) VALUES
(1, 'Toko Online', 'Jl.Cendana, No.123', '085735795509', 'Pemilik Toko');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `tgl_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `tgl_input`) VALUES
(1, 'ATK', '7 May 2022, 10:23'),
(2, 'Sabun', '7 May 2022, 17:10'),
(3, 'Snack', '11 June 2022, 14:23');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `user`, `pass`) VALUES
(1, 'admin', '$2y$10$6TxnJeUjcYSINnX/Db8Lu.GTvvigQZ8aFRaYPXf9GVCdGs.CZiiNG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identitas_toko`
--
ALTER TABLE `identitas_toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `identitas_toko`
--
ALTER TABLE `identitas_toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
