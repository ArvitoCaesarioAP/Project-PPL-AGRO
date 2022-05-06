-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2022 at 05:26 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokokopi`
--

-- --------------------------------------------------------

--
-- Table structure for table `laporan_keuangan`
--

CREATE TABLE `laporan_keuangan` (
  `id_laporan_keuangan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_laporan` varchar(100) NOT NULL,
  `total` int(30) NOT NULL,
  `keterangan_laporan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_keuangan`
--

INSERT INTO `laporan_keuangan` (`id_laporan_keuangan`, `tanggal`, `nama_laporan`, `total`, `keterangan_laporan`) VALUES
(1, '2022-05-02', 'Pemasukan', 200000, 'penjualan kopi hari senin'),
(2, '2022-05-03', 'Pemasukan', 150000, 'penjualan kopi hari selasa'),
(3, '2022-05-03', 'Pengeluaran', 20000, 'masker');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `deskripsi_produk` varchar(255) NOT NULL,
  `harga_produk` int(15) NOT NULL,
  `stock_produk` int(15) NOT NULL,
  `gambar_produk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi_produk`, `harga_produk`, `stock_produk`, `gambar_produk`) VALUES
(1, 'tubruk kopi enak', 'kopi tubruk enak', 15000, 15, '6268df42a6996-coffe.jpg'),
(2, 'kopi mantab', 'kopi', 15000, 5, '6268e7ec1631f-background-aplikasi2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `no_hp_user` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat_user` varchar(255) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `verifikasi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `email_user`, `no_hp_user`, `username`, `password`, `alamat_user`, `jabatan`, `verifikasi`) VALUES
(1, 'admintama', 'tama@example.com', '081234567890', '', '$2y$10$gMRirKKfczH4dR5n8eGV6u1TJx2fxKfR7ipm3OEHiGVVGe5fO.ZN6', '', 'pemilik', 'Telah diverifikasi'),
(2, 'adminrobi', 'robi@example.com', '089988887777', '', '$2y$10$gMRirKKfczH4dR5n8eGV6u1TJx2fxKfR7ipm3OEHiGVVGe5fO.ZN6', '', 'pemilik', 'Telah diverifikasi'),
(3, 'adminindra', 'indra@example.com', '089876543212', '', '$2y$10$gMRirKKfczH4dR5n8eGV6u1TJx2fxKfR7ipm3OEHiGVVGe5fO.ZN6', '', 'pemilik', 'Telah diverifikasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  ADD PRIMARY KEY (`id_laporan_keuangan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  MODIFY `id_laporan_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
