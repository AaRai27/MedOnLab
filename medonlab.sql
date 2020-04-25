-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2020 at 09:40 AM
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
(2, 'MC-2', 'Rayhan Aja', 'Ray', 'rayrahmanda@gmail.com', 'default1.jpg', '$2y$10$I3im0rRASsluDAFsjkkxqeT67meplbBp3wC1wZpV13jaJ5yO1ZaJ6', 2, 1, 1587013215),
(14, 'MC-3', 'Afif Raihan', 'afifraihan', 'afifraihan@gmail.com', 'lingkaran_merah_tengah2.png', '$2y$10$AFZ37WAaiTh.tBoOaoIPvOhfzPKOagEzIAxLU71g6PamqDWghPZ.S', 2, 1, 1587379276);

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
  `status` int(1) NOT NULL,
  `hasil_lab` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medcek`
--

INSERT INTO `medcek` (`id`, `id_pasien`, `nama_pasien`, `tgl_lahir`, `layanan`, `cabang`, `alamat`, `nomor_hp`, `img_bukti`, `tgl_periksa`, `tgl_ambil`, `status`, `hasil_lab`) VALUES
(4, 'MC-3', 'Afif Raihan', '2000-11-27', 'Cek Darah dan Urin', 'Cabang Surakarta', 'Solo', '08111512711', 'lingkaran_merah_tengah3.png', '22 April 2020', '25 April 2020', 2, 'Input_hasil_(1).pdf'),
(7, 'MC-3', 'Afif Raihan', '2000-11-27', 'Cek Darah dan Urin', 'Cabang Bandung', 'Sukabirus, Bandung', '08111512711', NULL, '27 April 2020', '30 April 2020', 0, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `akun_role`
--
ALTER TABLE `akun_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medcek`
--
ALTER TABLE `medcek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
