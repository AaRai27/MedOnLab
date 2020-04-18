-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2020 at 05:14 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medonlab`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `id_pasien` varchar(128) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `id_pasien`, `fullname`, `username`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'MC-1', 'Muhammad Afif Raihan', 'Mafifraihan', 'raihangeorgia@gmail.com', 'default.jpg', '$2y$10$FNlbXGlsFaFv4uF5IRYum.bKQirbRRrKzEzJ0mfneScGaE87NWKOu', 1, 1, 1587013176),
(2, 'MC-2', 'Rayhan Rahmanda', 'Ray', 'rayrahmanda@gmail.com', 'default.jpg', '$2y$10$ntpq3gnJmiURF57.NkWxIOBGJ.AmlX1WVmAH07EFtIb3LmdvVwlLa', 2, 1, 1587013215),
(3, 'MC-3', 'Muhammad Farell Ambiar', 'Alle', 'farell@gmail.com', 'default.jpg', '$2y$10$qJ5QgUj4P6uu.u/PcRhJe./StM3MxnYVXFC6o4o/zBgHL8jTJui3K', 2, 1, 1587013237),
(4, 'MC-4', 'Mochammad Daffa Haris', 'Daffa Haris', 'daffaharis@gmail.com', 'default.jpg', '$2y$10$gLRcpKESIeBff/j0rBwSBudni10UHZZFizPplVjyLkH9CDmur7Tfy', 2, 1, 1587013287),
(9, 'MC-9', 'member baru', 'member baru', 'memberr@gmail.com', 'BELL.jpg', '$2y$10$HltPqxzO9Ie7eBBjuL11Z.2v7OSyVWVC7o7GegiWLZyq.P185tX.u', 2, 1, 1587182816),
(12, 'MC-10', 'Member Buat Dihapus', 'member hapus', 'memberhapus@gmail.com', 'default.jpg', '$2y$10$czw1roMU2SDh33yBpRwI7OWjOSorggAFwniJVFwIXKKaz9QOKAopS', 2, 1, 1587217986),
(13, 'MC-13', 'finishing', 'finishing', 'finishing@gmail.com', 'default.jpg', '$2y$10$YimB59gPs9PHhekRM4bLY.oILodYN.aBE8tFrIkM.4NP4E/.2m4q2', 2, 1, 1587219812);

-- --------------------------------------------------------

--
-- Table structure for table `akun_role`
--

CREATE TABLE `akun_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_role`
--

INSERT INTO `akun_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `medcek`
--

CREATE TABLE `medcek` (
  `id` int(11) NOT NULL,
  `id_pasien` varchar(128) NOT NULL,
  `nama_pasien` varchar(128) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `layanan` varchar(32) NOT NULL,
  `cabang` varchar(32) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `img_bukti` varchar(128) DEFAULT NULL,
  `tgl_periksa` varchar(128) NOT NULL,
  `tgl_ambil` varchar(128) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medcek`
--

INSERT INTO `medcek` (`id`, `id_pasien`, `nama_pasien`, `tgl_lahir`, `layanan`, `cabang`, `alamat`, `nomor_hp`, `img_bukti`, `tgl_periksa`, `tgl_ambil`, `status`) VALUES
(6, 'MC-4', 'M. Daffa Haris', '2000-02-10', 'cek Darah', 'Cabang Surakarta', 'Sukabirus, Surakarta', '000000000', '', '19 April 2020', '22 April 2020', 2),
(7, 'MC-4', 'Mochammad Daffa Haris', '2000-10-20', 'cek Darah', 'Cabang Surakarta', 'Sukabirus, Surakarta', '1234567890', NULL, '20 April 2020', '23 April 2020', 0),
(8, 'MC-4', 'Mochammad Daffa Haris', '2000-02-20', 'cek Urin', 'Cabang Bekasi', 'Sukabirus, Surakarta', '123456890', NULL, '20 April 2020', '23 April 2020', 0),
(9, 'MC-13', 'finishing', '2000-10-28', 'cek Urin', 'Cabang Bekasi', 'Sukabirus, Bandung', '08111512711', 'logo.jpg', '20 April 2020', '23 April 2020', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akun_role`
--
ALTER TABLE `akun_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medcek`
--
ALTER TABLE `medcek`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `akun_role`
--
ALTER TABLE `akun_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medcek`
--
ALTER TABLE `medcek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
