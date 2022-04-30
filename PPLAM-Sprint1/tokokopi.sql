-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 09:37 AM
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
(2, 'tubruk kopi enak', 'kopi tubruk enak', 15000, 15, '6268df42a6996-coffe.jpg'),
(6, 'kopi mantab', 'kopi', 15000, 5, '6268e7ec1631f-background-aplikasi2.jpg');

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
(1, 'admin1', 'tama@example.com', '088888888888', 'admintama', '$2y$10$k2bWEuQ2UQ28xyME8mWaqOUYBsOxxM41NWgEx/icLweBL8LcLirEK', '', 'pemilik', 'Telah diverifikasi'),
(2, 'admin1', 'indra@example.com', '088888888888', 'adminindra', '$2y$10$k2bWEuQ2UQ28xyME8mWaqOUYBsOxxM41NWgEx/icLweBL8LcLirEK', '', 'pemilik', 'Telah diverifikasi'),
(3, 'admin1', 'robi@example.com', '088888888888', 'adminrobi', '$2y$10$k2bWEuQ2UQ28xyME8mWaqOUYBsOxxM41NWgEx/icLweBL8LcLirEK', '', 'pemilik', 'Telah diverifikasi');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
