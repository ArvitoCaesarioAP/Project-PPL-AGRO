-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2022 at 11:37 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
-- Table structure for table `absensi_karyawan`
--

CREATE TABLE `absensi_karyawan` (
  `absensi_karyawan_id` int(11) NOT NULL,
  `shift_karyawan_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_absen` date NOT NULL,
  `jam_absen` time NOT NULL,
  `keterangan_absen` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi_karyawan`
--

INSERT INTO `absensi_karyawan` (`absensi_karyawan_id`, `shift_karyawan_id`, `id_user`, `tanggal_absen`, `jam_absen`, `keterangan_absen`) VALUES
(8, 22, 8, '2022-06-11', '16:35:17', 'Masuk');

-- --------------------------------------------------------

--
-- Table structure for table `bonus`
--

CREATE TABLE `bonus` (
  `bonus_id` int(11) NOT NULL,
  `bonus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bonus`
--

INSERT INTO `bonus` (`bonus_id`, `bonus`) VALUES
(1, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `gaji_pokok`
--

CREATE TABLE `gaji_pokok` (
  `gaji_pokok_id` int(11) NOT NULL,
  `gaji_pokok` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gaji_pokok`
--

INSERT INTO `gaji_pokok` (`gaji_pokok_id`, `gaji_pokok`) VALUES
(1, 1800000);

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
(8, 'Kopi coklat', 'kopi coklat deskripsi', 11000, 100, '62a4619800b9e-coffe.jpg'),
(9, 'kopi hitam', 'kopi hitam deskripsi', 7000, 100, '62a461abe99d0-background-aplikasi2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shift_jam`
--

CREATE TABLE `shift_jam` (
  `shift_jam_id` int(11) NOT NULL,
  `shift` varchar(11) NOT NULL,
  `start` time NOT NULL,
  `finish` time NOT NULL,
  `keterangan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shift_jam`
--

INSERT INTO `shift_jam` (`shift_jam_id`, `shift`, `start`, `finish`, `keterangan`) VALUES
(1, 'Shift 1', '08:00:00', '14:00:00', 'masuk'),
(2, 'Shift 2', '15:00:00', '23:00:00', 'masuk');

-- --------------------------------------------------------

--
-- Table structure for table `shift_karyawan`
--

CREATE TABLE `shift_karyawan` (
  `shift_karyawan_id` int(11) NOT NULL,
  `tanggal_absen` date NOT NULL,
  `shift` varchar(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shift_karyawan`
--

INSERT INTO `shift_karyawan` (`shift_karyawan_id`, `tanggal_absen`, `shift`, `id_user`) VALUES
(22, '2022-06-11', 'Shift 2', 8);

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
(3, 'adminindra', 'indra@example.com', '089876543212', '', '$2y$10$gMRirKKfczH4dR5n8eGV6u1TJx2fxKfR7ipm3OEHiGVVGe5fO.ZN6', '', 'pemilik', 'Telah diverifikasi'),
(8, 'karyawan1', 'karyawan1@example.com', '089999999999', '', '$2y$10$V0nel8awcGYjyuL/yOIB4Ozo60z0ZyAXXnEERyd2Doa5xbPZgjOZ2', '', 'karyawan', 'Telah diverifikasi'),
(9, 'karyawan2', 'karyawan2@example.com', '088888888888', '', '$2y$10$Ph6xK2rn4903Fjg4ZGDAPOvzvldZqIAgK06aD/5TdFhTapue4FiDy', '', 'karyawan', 'Belum verifikasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi_karyawan`
--
ALTER TABLE `absensi_karyawan`
  ADD PRIMARY KEY (`absensi_karyawan_id`);

--
-- Indexes for table `bonus`
--
ALTER TABLE `bonus`
  ADD PRIMARY KEY (`bonus_id`);

--
-- Indexes for table `gaji_pokok`
--
ALTER TABLE `gaji_pokok`
  ADD PRIMARY KEY (`gaji_pokok_id`);

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
-- Indexes for table `shift_jam`
--
ALTER TABLE `shift_jam`
  ADD PRIMARY KEY (`shift_jam_id`);

--
-- Indexes for table `shift_karyawan`
--
ALTER TABLE `shift_karyawan`
  ADD PRIMARY KEY (`shift_karyawan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi_karyawan`
--
ALTER TABLE `absensi_karyawan`
  MODIFY `absensi_karyawan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bonus`
--
ALTER TABLE `bonus`
  MODIFY `bonus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gaji_pokok`
--
ALTER TABLE `gaji_pokok`
  MODIFY `gaji_pokok_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laporan_keuangan`
--
ALTER TABLE `laporan_keuangan`
  MODIFY `id_laporan_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shift_jam`
--
ALTER TABLE `shift_jam`
  MODIFY `shift_jam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shift_karyawan`
--
ALTER TABLE `shift_karyawan`
  MODIFY `shift_karyawan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
