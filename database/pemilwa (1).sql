-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 03:28 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(4, 'cinta', 'aku', '$2y$10$42xaaCtVJlA.NANOzN8l7exP9tGNGjBO4LzZyCsifq8dEyKT4mjjS');

-- --------------------------------------------------------

--
-- Table structure for table `calon_bpm`
--

CREATE TABLE `calon_bpm` (
  `no_urut` int(11) NOT NULL,
  `nama_lengkap` varchar(60) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `calon_bpm`
--

INSERT INTO `calon_bpm` (`no_urut`, `nama_lengkap`, `nim`, `id_prodi`, `gambar`, `visi`, `misi`) VALUES
(2, 'Dewik', '205150400111014', 1, '2051504001110142.PNG', 'maju filkom', 'jaya'),
(4, 'farah', '205150400111012', 1, '205150400111012.png', 'memajukan filkom', 'mensejahterakan filkom');

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
  `id_prodi_wakil` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasang_calon`
--

INSERT INTO `pasang_calon` (`no_urut`, `nama_pasangan`, `nim_ketua`, `nim_wakil`, `id_prodi_ketua`, `id_prodi_wakil`, `gambar`, `visi`, `misi`) VALUES
(2, 'oli dan kikii', '2061849184', '2918912849', 1, 1, '20618491842.PNG', 'memajukan filkom', 'maju terus'),
(3, 'farah dan aulia', '205150400111012', '205150400111013', 1, 2, '205150400111012.PNG', 'a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `pemilih`
--

CREATE TABLE `pemilih` (
  `nim` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `nama_lengkap` varchar(60) NOT NULL,
  `angkatan` varchar(4) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `no_pilihan_pasangan` int(11) DEFAULT NULL,
  `no_pilihan_bpm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemilih`
--

INSERT INTO `pemilih` (`nim`, `password`, `nama_lengkap`, `angkatan`, `id_prodi`, `no_pilihan_pasangan`, `no_pilihan_bpm`) VALUES
('205150400111012', '$2y$10$w/9VPAFc3C/zfZ9IGLHDf.WeUclT8rx2Chtf12Ozs2GKDZPgmq1Py', 'farah', '2020', 1, 3, 2),
('205150400111013', '$2y$10$6iFUvakVS0kYm3sWbXD1iuP9PV842bhpxfHfSLKgOBh9pg3a78Xfu', 'aulia', '2020', 2, 2, 2),
('205150400111014', '$2y$10$Ju1kBOjeX0E9XkEqjl16LezuOQhh4orXJ1Dm5C/59Cb9BolkwmvOy', 'Dewi Ayu Alamanda Purnama', '2020', 2, 2, 2),
('2061849184', '$2y$10$XMnMdgm.5SrgJOPLjIX.EeFbVAcH/6x4q', 'oli', '2018', 1, NULL, NULL),
('2918912849', '$2y$10$kAWTrNGSHiNo3IJknZ6RkOlvJS/wRPY0r', 'kiki', '2018', 1, NULL, NULL);

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
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `prodi`, `singkatan`) VALUES
(1, 'Sistem Informasi', 'SI'),
(2, 'Teknik Informatika', 'TIF'),
(3, 'Teknologi Informasi', 'TI'),
(4, 'Pendidikan Teknologi Informasi', 'PTI'),
(5, 'Teknik Komputer', 'TEKOM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `calon_bpm`
--
ALTER TABLE `calon_bpm`
  ADD PRIMARY KEY (`no_urut`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `pasang_calon`
--
ALTER TABLE `pasang_calon`
  ADD PRIMARY KEY (`no_urut`),
  ADD KEY `id_prodi_ketua` (`id_prodi_ketua`),
  ADD KEY `id_prodi_wakil` (`id_prodi_wakil`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `calon_bpm`
--
ALTER TABLE `calon_bpm`
  MODIFY `no_urut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pasang_calon`
--
ALTER TABLE `pasang_calon`
  MODIFY `no_urut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calon_bpm`
--
ALTER TABLE `calon_bpm`
  ADD CONSTRAINT `calon_bpm_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Constraints for table `pasang_calon`
--
ALTER TABLE `pasang_calon`
  ADD CONSTRAINT `pasang_calon_ibfk_3` FOREIGN KEY (`id_prodi_ketua`) REFERENCES `prodi` (`id_prodi`),
  ADD CONSTRAINT `pasang_calon_ibfk_4` FOREIGN KEY (`id_prodi_wakil`) REFERENCES `prodi` (`id_prodi`);

--
-- Constraints for table `pemilih`
--
ALTER TABLE `pemilih`
  ADD CONSTRAINT `pemilih_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`),
  ADD CONSTRAINT `pemilih_ibfk_3` FOREIGN KEY (`no_pilihan_bpm`) REFERENCES `calon_bpm` (`no_urut`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
