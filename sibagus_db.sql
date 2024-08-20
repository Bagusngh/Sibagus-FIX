-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2024 at 03:25 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibagus_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggaran`
--

CREATE TABLE `anggaran` (
  `id` int(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `nominal` decimal(10,0) NOT NULL,
  `keterangan` text NOT NULL,
  `jenis` enum('Uang Masuk','Uang Keluar') NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `anggaran`
--

INSERT INTO `anggaran` (`id`, `karyawan_id`, `nominal`, `keterangan`, `jenis`, `tanggal`, `jam`) VALUES
(3, 4, 5000000, 'Saldo Awal', 'Uang Masuk', '2024-02-12', '18:14:33'),
(4, 4, 1500000, 'Pembelian Meja Baru', 'Uang Keluar', '2024-02-12', '18:15:42'),
(5, 4, 200000, 'Pembayaran Jasa Pasang AC', 'Uang Keluar', '2024-02-12', '18:26:43'),
(7, 4, 385000, 'Uang Sisa Pembelian Meja', 'Uang Masuk', '2024-02-13', '01:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `record` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `merk`, `tipe`, `qty`, `satuan`, `record`) VALUES
('1', 'Kursi Kantor', 'Doodook', 'Kursi kantor air spring', 0, 'Pcs', '0000-00-00 00:00:00'),
('2', 'Kursi Sofa', 'Soph', 'Kursi sofa panjang', 0, 'Pcs', '0000-00-00 00:00:00'),
('3', 'Meja Kerja', 'Gawee', 'Meja kerja kayu dan kabinet', 0, 'Pcs', '0000-00-00 00:00:00'),
('4', 'Kipas Angin', 'Semwing', 'Kipas angin dinding', 0, 'Pcs', '0000-00-00 00:00:00'),
('5', 'Karpet', 'Ambal', 'Karpet permadani', 0, 'Lembar', '0000-00-00 00:00:00'),
('6', 'Monitor Komputer', 'Nitro', 'Ultrawide 24 inch', 0, 'Pcs', '0000-00-00 00:00:00'),
('7', 'Komputer Personal', 'Ternal', 'Core i7 Gen 12, SSD 256 GB, Ram 8 GB', 0, 'Pcs', '0000-00-00 00:00:00'),
('8', 'pulpen', 'kenko', '', 0, 'pcs', '0000-00-00 00:00:00'),
('8787iuiuiui', 'tip-ex', 'kenko', '', 0, 'pcs', '0000-00-00 00:00:00'),
('bkt67868767868', 'kertas', 'sidu', '', 0, 'pcs', '0000-00-00 00:00:00'),
('BR002', 'Coba', 'Test', '', 0, 'Pcs', '0000-00-00 00:00:00'),
('BRG-070324001', 'Keyboard', 'Logitech', 'Keyboard Logitech 001 Warna Hitam', 10, 'Unit', '2024-03-07 04:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pemohon` varchar(255) NOT NULL,
  `karyawan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id`, `kode_barang`, `tanggal`, `nama_pemohon`, `karyawan_id`) VALUES
(26, '6', '2024-02-22', 'DEDE RAHMAN, S.Tr.', 4),
(27, '3', '2024-02-22', 'DEDE RAHMAN, S.Tr.', 4),
(28, '2', '2024-02-22', 'Dr. AHMAD SUHAIMI, S.Sos,S.H.,M.H,M.M', 4),
(36, 'BRG-070324001', '2024-08-15', 'Dr. AHMAD SUHAIMI, S.Sos,S.H.,M.H,M.M', 4);

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar_detail`
--

CREATE TABLE `barang_keluar_detail` (
  `id` int(11) NOT NULL,
  `barang_keluar_id` int(11) NOT NULL,
  `barang_id` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `status_kode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_keluar_detail`
--

INSERT INTO `barang_keluar_detail` (`id`, `barang_keluar_id`, `barang_id`, `jumlah`, `satuan`, `status_kode`) VALUES
(30, 26, '6', 2, NULL, 'Sudah'),
(31, 27, '3', 2, NULL, 'Sudah'),
(32, 28, '2', 2, NULL, 'Sudah'),
(40, 36, 'BRG-070324001', 8, NULL, 'Sudah');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_bukti` varchar(50) NOT NULL,
  `sumber_dana` varchar(255) DEFAULT NULL,
  `pemasok_id` int(11) DEFAULT NULL,
  `karyawan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `tanggal`, `no_bukti`, `sumber_dana`, `pemasok_id`, `karyawan_id`) VALUES
(10, '2024-01-19', 'BKT009', NULL, NULL, 2),
(11, '2024-01-19', '0708989089080980', NULL, NULL, 1),
(15, '2024-02-12', 'QWE-ASD-001', NULL, NULL, 2),
(16, '2024-03-07', 'BKT-0703001', NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk_detail`
--

CREATE TABLE `barang_masuk_detail` (
  `id` int(11) NOT NULL,
  `barang_masuk_id` int(11) NOT NULL,
  `barang_id` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status_kode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_masuk_detail`
--

INSERT INTO `barang_masuk_detail` (`id`, `barang_masuk_id`, `barang_id`, `jumlah`, `status_kode`) VALUES
(1, 1, '2', 3, 'Sudah'),
(2, 1, '4', 6, 'Sudah'),
(3, 2, '1', 7, 'Sudah'),
(4, 2, '3', 7, 'Sudah'),
(5, 3, '5', 10, 'Belum'),
(6, 4, '1', 2, 'Belum'),
(7, 4, '3', 2, 'Belum'),
(8, 4, '6', 3, 'Belum'),
(9, 4, '7', 3, 'Belum'),
(10, 5, '5', 1, 'Belum'),
(11, 5, '2', 6, 'Belum'),
(12, 5, '4', 3, 'Belum'),
(13, 6, '6', 6, 'Belum'),
(14, 6, '7', 6, 'Belum'),
(15, 7, '6', 1, 'Belum'),
(16, 7, '7', 1, 'Belum'),
(17, 8, '1', 1, 'Belum'),
(18, 8, '3', 1, 'Belum'),
(21, 10, 'BR002', 10, 'Sudah'),
(22, 11, 'bkt67868767868', 50, 'Belum'),
(23, 11, '1', 5, 'Belum'),
(26, 10, 'bkt67868767868', 5, 'Sudah'),
(28, 15, '7', 2, 'Sudah'),
(29, 15, '1', 2, 'Sudah'),
(30, 15, '3', 2, 'Sudah'),
(31, 11, '8', 10, 'Belum'),
(37, 16, 'BRG-070324001', 5, 'Belum');

-- --------------------------------------------------------

--
-- Table structure for table `inventaris_ruang`
--

CREATE TABLE `inventaris_ruang` (
  `id` int(11) NOT NULL,
  `kode_id` int(11) NOT NULL,
  `ruang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventaris_ruang`
--

INSERT INTO `inventaris_ruang` (`id`, `kode_id`, `ruang_id`) VALUES
(15, 72, 4),
(16, 73, 4),
(17, 74, 4),
(18, 75, 4),
(19, 76, 4),
(20, 77, 4),
(22, 84, 1),
(23, 85, 1),
(24, 86, 1),
(25, 87, 1),
(26, 88, 1),
(27, 89, 1),
(28, 90, 1),
(29, 91, 1),
(30, 92, 1),
(31, 83, 1),
(32, 40, 3);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL,
  `nomor_hp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama_karyawan`, `nomor_hp`, `alamat`, `email`, `password`, `level`) VALUES
(1, 'Adul', '08100000', 'Sungai Kacang Polong', 'adul@email.com', '997593f7b7af4fc758127e1dc41e3446', 'user'),
(2, 'Beta', '08200000', 'Pantai Hambawang', 'beta@email.com', '987bcab01b929eb2c07877b224215c92', 'user'),
(3, 'Cita', '08300000', 'Pasar Papan', 'cita@email.com', 'ebea7d75ce0ae38a0440221a067eb2bc', 'user'),
(4, 'Bagus', '085156354184', 'BJB', 'bagus@email.com', '17b38fc02fd7e92f3edeb6318e3066d8', 'admin'),
(6, 'Chandra', '082671231', 'Banjarbaru', 'pln.jaya@gmail.com', 'ad845a24a47deecbfa8396e90db75c6a', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `kode`
--

CREATE TABLE `kode` (
  `id` int(11) NOT NULL,
  `barang_masuk_detail_id` int(11) NOT NULL,
  `barang_keluar_detail_id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `kondisi_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kode`
--

INSERT INTO `kode` (`id`, `barang_masuk_detail_id`, `barang_keluar_detail_id`, `kode`, `kondisi_barang`) VALUES
(1, 1, 0, '2022/12/0002/0001', 'Baru'),
(2, 1, 0, '2022/12/0002/0002', 'Baru'),
(3, 1, 0, '2022/12/0002/0003', 'Baru'),
(4, 1, 0, '2022/12/0004/0001', 'Baru'),
(5, 1, 0, '2022/12/0004/0002', 'Baru'),
(6, 1, 0, '2022/12/0004/0003', 'Baru'),
(7, 1, 0, '2022/12/0004/0004', 'Baru'),
(8, 1, 0, '2022/12/0004/0005', 'Baru'),
(9, 1, 0, '2022/12/0004/0006', 'Baru'),
(10, 2, 0, '2022/12/0001/0001', 'Baru'),
(11, 2, 0, '2022/12/0001/0002', 'Baru'),
(12, 2, 0, '2022/12/0001/0003', 'Baru'),
(13, 2, 0, '2022/12/0001/0004', 'Baru'),
(14, 2, 0, '2022/12/0001/0005', 'Baru'),
(15, 2, 0, '2022/12/0001/0006', 'Baru'),
(16, 2, 0, '2022/12/0001/0007', 'Baru'),
(17, 2, 0, '2022/12/0003/0001', 'Baru'),
(18, 2, 0, '2022/12/0003/0002', 'Baru'),
(19, 2, 0, '2022/12/0003/0003', 'Baru'),
(20, 2, 0, '2022/12/0003/0004', 'Baru'),
(21, 2, 0, '2022/12/0003/0005', 'Baru'),
(22, 2, 0, '2022/12/0003/0006', 'Baru'),
(23, 2, 0, '2022/12/0003/0007', 'Baru'),
(33, 21, 0, '2024/01/BR002/0001', 'Baru'),
(34, 21, 0, '2024/01/BR002/0002', 'Baru'),
(35, 21, 0, '2024/01/BR002/0003', 'Baru'),
(36, 21, 0, '2024/01/BR002/0004', 'Baru'),
(37, 21, 0, '2024/01/BR002/0005', 'Baru'),
(38, 21, 0, '2024/01/BR002/0006', 'Baru'),
(39, 21, 0, '2024/01/BR002/0007', 'Baru'),
(40, 21, 0, '2024/01/BR002/0008', 'Baru'),
(41, 21, 0, '2024/01/BR002/0009', 'Baru'),
(42, 21, 0, '2024/01/BR002/0010', 'Baru'),
(48, 25, 0, '2024/01/0008/0001', 'Baru'),
(49, 25, 0, '2024/01/0008/0002', 'Baru'),
(50, 25, 0, '2024/01/0008/0003', 'Baru'),
(51, 25, 0, '2024/01/0008/0004', 'Baru'),
(52, 25, 0, '2024/01/0008/0005', 'Baru'),
(53, 25, 0, '2024/01/0008/0006', 'Baru'),
(54, 25, 0, '2024/01/0008/0007', 'Baru'),
(55, 25, 0, '2024/01/0008/0008', 'Baru'),
(56, 25, 0, '2024/01/0008/0009', 'Baru'),
(57, 25, 0, '2024/01/0008/0010', 'Baru'),
(58, 25, 0, '2024/01/0008/0011', 'Baru'),
(59, 25, 0, '2024/01/0008/0012', 'Baru'),
(60, 25, 0, '2024/01/0008/0013', 'Baru'),
(61, 25, 0, '2024/01/0008/0014', 'Baru'),
(62, 25, 0, '2024/01/0008/0015', 'Baru'),
(63, 25, 0, '2024/01/0008/0016', 'Baru'),
(64, 25, 0, '2024/01/0008/0017', 'Baru'),
(65, 25, 0, '2024/01/0008/0018', 'Baru'),
(66, 28, 0, '2024/02/0007/0001', 'Baru'),
(67, 28, 0, '2024/02/0007/0002', 'Baru'),
(68, 29, 0, '2024/02/0001/0001', 'Baru'),
(69, 29, 0, '2024/02/0001/0002', 'Baru'),
(70, 30, 0, '2024/02/0003/0001', 'Baru'),
(71, 30, 0, '2024/02/0003/0002', 'Baru'),
(72, 0, 30, '2024/02/0006/0001', 'Baru'),
(73, 0, 30, '2024/02/0006/0002', 'Baru'),
(74, 0, 31, '2024/02/0003/0003', 'Baru'),
(75, 0, 31, '2024/02/0003/0004', 'Baru'),
(76, 0, 32, '2024/02/0002/0001', 'Baru'),
(77, 0, 32, '2024/02/0002/0002', 'Baru'),
(83, 0, 37, '2024/03/BRG-070324001/0001', 'Baru'),
(84, 0, 37, '2024/03/BRG-070324001/0002', 'Baru'),
(85, 0, 37, '2024/03/BRG-070324001/0003', 'Baru'),
(86, 0, 37, '2024/03/BRG-070324001/0004', 'Baru'),
(87, 0, 37, '2024/03/BRG-070324001/0005', 'Baru'),
(88, 0, 37, '2024/03/BRG-070324001/0006', 'Baru'),
(89, 0, 37, '2024/03/BRG-070324001/0007', 'Baru'),
(90, 0, 37, '2024/03/BRG-070324001/0008', 'Baru'),
(91, 0, 37, '2024/03/BRG-070324001/0009', 'Baru'),
(92, 0, 37, '2024/03/BRG-070324001/0010', 'Baru'),
(93, 0, 40, '2024/08/BRG-070324001/0001', 'Baru'),
(94, 0, 40, '2024/08/BRG-070324001/0002', 'Baru'),
(95, 0, 40, '2024/08/BRG-070324001/0003', 'Baru'),
(96, 0, 40, '2024/08/BRG-070324001/0004', 'Baru'),
(97, 0, 40, '2024/08/BRG-070324001/0005', 'Baru'),
(98, 0, 40, '2024/08/BRG-070324001/0006', 'Baru'),
(99, 0, 40, '2024/08/BRG-070324001/0007', 'Baru'),
(100, 0, 40, '2024/08/BRG-070324001/0008', 'Baru');

-- --------------------------------------------------------

--
-- Table structure for table `pemasok`
--

CREATE TABLE `pemasok` (
  `id` int(11) NOT NULL,
  `nama_pemasok` varchar(255) NOT NULL,
  `nama_kontak` varchar(255) NOT NULL,
  `nomor_hp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemasok`
--

INSERT INTO `pemasok` (`id`, `nama_pemasok`, `nama_kontak`, `nomor_hp`, `alamat`) VALUES
(1, 'CV Alading', 'Mas Dindin', '08000000', 'Banjarbaru'),
(2, 'CV Benalu', 'Mbak Pia', '08000001', 'Martapura');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id` int(11) NOT NULL,
  `nama_ruang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id`, `nama_ruang`) VALUES
(1, 'Front Office'),
(2, 'Marketing'),
(3, 'Finance'),
(4, 'TU');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggaran`
--
ALTER TABLE `anggaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `barang_keluar_detail`
--
ALTER TABLE `barang_keluar_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_masuk_detail`
--
ALTER TABLE `barang_masuk_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `inventaris_ruang`
--
ALTER TABLE `inventaris_ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kode`
--
ALTER TABLE `kode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggaran`
--
ALTER TABLE `anggaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `barang_keluar_detail`
--
ALTER TABLE `barang_keluar_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `barang_masuk_detail`
--
ALTER TABLE `barang_masuk_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `inventaris_ruang`
--
ALTER TABLE `inventaris_ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kode`
--
ALTER TABLE `kode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD CONSTRAINT `barang_keluar_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_keluar_detail`
--
ALTER TABLE `barang_keluar_detail`
  ADD CONSTRAINT `barang_keluar_detail_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_masuk_detail`
--
ALTER TABLE `barang_masuk_detail`
  ADD CONSTRAINT `barang_masuk_detail_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
