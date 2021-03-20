-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2021 at 04:35 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemilwa`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon_bpm`
--

CREATE TABLE `calon_bpm` (
  `no_urut` int(11) NOT NULL,
  `nama_lengkap` varchar(60) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `id_prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pasang_calon`
--

CREATE TABLE `pasang_calon` (
  `id` int(11) NOT NULL,
  `no_urut` int(11) NOT NULL,
  `nama_ketua` varchar(60) NOT NULL,
  `nama_wakil` varchar(60) NOT NULL,
  `nim_ketua` varchar(15) NOT NULL,
  `nim_wakil` varchar(15) NOT NULL,
  `id_prodi_ketua` int(11) NOT NULL,
  `id_prodi_wakil` int(11) NOT NULL,
  `nim_pemilih` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pemilih`
--

CREATE TABLE `pemilih` (
  `nim` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama_lengkap` varchar(60) NOT NULL,
  `angkatan` varchar(4) NOT NULL,
  `id_prodi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `prodi` varchar(30) NOT NULL,
  `singkatan` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon_bpm`
--
ALTER TABLE `calon_bpm`
  ADD PRIMARY KEY (`no_urut`),
  ADD KEY `nim` (`nim`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `pasang_calon`
--
ALTER TABLE `pasang_calon`
  ADD KEY `nim_ketua` (`nim_ketua`),
  ADD KEY `nim_wakil` (`nim_wakil`),
  ADD KEY `id_prodi_ketua` (`id_prodi_ketua`),
  ADD KEY `id_prodi_wakil` (`id_prodi_wakil`),
  ADD KEY `nim_pemilih` (`nim_pemilih`);

--
-- Indexes for table `pemilih`
--
ALTER TABLE `pemilih`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon_bpm`
--
ALTER TABLE `calon_bpm`
  MODIFY `no_urut` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calon_bpm`
--
ALTER TABLE `calon_bpm`
  ADD CONSTRAINT `calon_bpm_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `pemilih` (`nim`),
  ADD CONSTRAINT `calon_bpm_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Constraints for table `pasang_calon`
--
ALTER TABLE `pasang_calon`
  ADD CONSTRAINT `pasang_calon_ibfk_1` FOREIGN KEY (`nim_ketua`) REFERENCES `pemilih` (`nim`),
  ADD CONSTRAINT `pasang_calon_ibfk_2` FOREIGN KEY (`nim_wakil`) REFERENCES `pemilih` (`nim`),
  ADD CONSTRAINT `pasang_calon_ibfk_3` FOREIGN KEY (`id_prodi_ketua`) REFERENCES `prodi` (`id_prodi`),
  ADD CONSTRAINT `pasang_calon_ibfk_4` FOREIGN KEY (`id_prodi_wakil`) REFERENCES `prodi` (`id_prodi`),
  ADD CONSTRAINT `pasang_calon_ibfk_5` FOREIGN KEY (`nim_pemilih`) REFERENCES `pemilih` (`nim`);

--
-- Constraints for table `pemilih`
--
ALTER TABLE `pemilih`
  ADD CONSTRAINT `pemilih_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
