-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2020 at 03:57 PM
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
(1, 'MC-1', 'Muhammad Afif Raihan', 'mafifraihan', 'raihangeorgia@gmail.com', 'default.jpg', '$2y$10$O7VgbRTxKzXvuadr12YBfeE1/D9ILL3fp9EtxeBzHueZS7c3D4MFi', 2, 1, 1586698741),
(2, 'MC-2', 'Afif Raihan', 'arai', 'afifraihan@gmail.com', 'default.jpg', '$2y$10$DvmBzbfOqbe3FwAvPtfHaOW7T3ZXIAGlmYzEq4.rpZAkWs0XdDQHO', 2, 1, 1586698755);

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
  `img_bukti` varchar(128) NOT NULL,
  `tgl_periksa` varchar(128) NOT NULL,
  `tgl_ambil` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medcek`
--

INSERT INTO `medcek` (`id`, `id_pasien`, `nama_pasien`, `tgl_lahir`, `layanan`, `cabang`, `alamat`, `nomor_hp`, `img_bukti`, `tgl_periksa`, `tgl_ambil`) VALUES
(1, 'MC-1', 'Muhammad Afif Raihan', '2000-11-27', 'Cek Darah', 'Cabang Bandung', 'Sukabirus, Bandung', '08111512711', 'MuhammadAfifRaihan_MC-1.jpg', '14 April 2020', '17 April 2020'),
(2, 'MC-1', 'Muhammad Afif Raihan', '2000-11-27', 'Cek Darah', 'Cabang Bandung', 'Sukabirus, Bandung', '08111512711', 'MuhammadAfifRaihan_MC-1.jpg', '14 April 2020', '17 April 2020'),
(3, 'MC-1', 'Muhammad Afif Raihan', '2000-11-27', 'Cek Darah', 'Cabang Bandung', 'Sukabirus, Bandung', '08111512711', 'MuhammadAfifRaihan_MC-1.jpg', '14 April 2020', '17 April 2020'),
(4, 'MC-1', 'Muhammad Afif Raihan', '2222-02-22', 'Cek Darah', 'Cabang Bandung', 'secret', '1234567890', 'MuhammadAfifRaihan_MC-1.jpg', '14 April 2020', '17 April 2020');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `akun_role`
--
ALTER TABLE `akun_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medcek`
--
ALTER TABLE `medcek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
