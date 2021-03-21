-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2021 at 11:22 AM
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
-- Table structure for table `misi`
--

CREATE TABLE `misi` (
  `id` int(11) NOT NULL,
  `misi` text NOT NULL,
  `no_urut_pasang_calon` int(11) NOT NULL,
  `no_urut_bpm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pasang_calon`
--

CREATE TABLE `pasang_calon` (
  `no_urut` int(11) NOT NULL,
  `nama_pasangan` varchar(100) NOT NULL,
  `nim_ketua` varchar(15) NOT NULL,
  `nim_wakil` varchar(15) NOT NULL,
  `id_prodi_ketua` int(11) NOT NULL,
  `id_prodi_wakil` int(11) NOT NULL
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
  `id_prodi` int(11) NOT NULL,
  `no_pilihan_pasangan` int(11) DEFAULT NULL,
  `no_pilihan_bpm` int(11) DEFAULT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `visi`
--

CREATE TABLE `visi` (
  `id` int(11) NOT NULL,
  `visi` text NOT NULL,
  `no_urut_pasang_calon` int(11) NOT NULL,
  `no_urut_bpm` int(11) NOT NULL
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
-- Indexes for table `misi`
--
ALTER TABLE `misi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_urut_pasang_calon` (`no_urut_pasang_calon`),
  ADD KEY `no_urut_bpm` (`no_urut_bpm`);

--
-- Indexes for table `pasang_calon`
--
ALTER TABLE `pasang_calon`
  ADD PRIMARY KEY (`no_urut`),
  ADD KEY `nim_ketua` (`nim_ketua`),
  ADD KEY `nim_wakil` (`nim_wakil`),
  ADD KEY `id_prodi_ketua` (`id_prodi_ketua`),
  ADD KEY `id_prodi_wakil` (`id_prodi_wakil`);

--
-- Indexes for table `pemilih`
--
ALTER TABLE `pemilih`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `no_pilihan_pasangan` (`no_pilihan_pasangan`),
  ADD KEY `no_pilihan_bpm` (`no_pilihan_bpm`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `visi`
--
ALTER TABLE `visi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_urut_pasang_calon` (`no_urut_pasang_calon`),
  ADD KEY `no_urut_bpm` (`no_urut_bpm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calon_bpm`
--
ALTER TABLE `calon_bpm`
  MODIFY `no_urut` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `misi`
--
ALTER TABLE `misi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pasang_calon`
--
ALTER TABLE `pasang_calon`
  MODIFY `no_urut` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visi`
--
ALTER TABLE `visi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `misi`
--
ALTER TABLE `misi`
  ADD CONSTRAINT `misi_ibfk_1` FOREIGN KEY (`no_urut_pasang_calon`) REFERENCES `pasang_calon` (`no_urut`),
  ADD CONSTRAINT `misi_ibfk_2` FOREIGN KEY (`no_urut_bpm`) REFERENCES `calon_bpm` (`no_urut`);

--
-- Constraints for table `pasang_calon`
--
ALTER TABLE `pasang_calon`
  ADD CONSTRAINT `pasang_calon_ibfk_1` FOREIGN KEY (`nim_ketua`) REFERENCES `pemilih` (`nim`),
  ADD CONSTRAINT `pasang_calon_ibfk_2` FOREIGN KEY (`nim_wakil`) REFERENCES `pemilih` (`nim`),
  ADD CONSTRAINT `pasang_calon_ibfk_3` FOREIGN KEY (`id_prodi_ketua`) REFERENCES `prodi` (`id_prodi`),
  ADD CONSTRAINT `pasang_calon_ibfk_4` FOREIGN KEY (`id_prodi_wakil`) REFERENCES `prodi` (`id_prodi`);

--
-- Constraints for table `pemilih`
--
ALTER TABLE `pemilih`
  ADD CONSTRAINT `pemilih_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`),
  ADD CONSTRAINT `pemilih_ibfk_2` FOREIGN KEY (`no_pilihan_pasangan`) REFERENCES `pasang_calon` (`no_urut`),
  ADD CONSTRAINT `pemilih_ibfk_3` FOREIGN KEY (`no_pilihan_bpm`) REFERENCES `calon_bpm` (`no_urut`);

--
-- Constraints for table `visi`
--
ALTER TABLE `visi`
  ADD CONSTRAINT `visi_ibfk_1` FOREIGN KEY (`no_urut_pasang_calon`) REFERENCES `pasang_calon` (`no_urut`),
  ADD CONSTRAINT `visi_ibfk_2` FOREIGN KEY (`no_urut_bpm`) REFERENCES `calon_bpm` (`no_urut`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
