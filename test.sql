-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2018 at 03:59 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(50) NOT NULL,
  `nisn` char(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas` int(255) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(50) NOT NULL,
  `wali` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `member` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `wali`, `kelas`, `member`) VALUES
(3, 'Amin Tajudin S.Kom', 'XI-TKJ3', '38'),
(4, 'Josua Simajuntak', 'X-TKJ1', '39');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(50) NOT NULL,
  `nisn` char(16) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `tl` date NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `nope` varchar(255) NOT NULL,
  `ayah` varchar(255) NOT NULL,
  `ibu` varchar(255) NOT NULL,
  `kelas` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nisn`, `nama`, `gender`, `tl`, `tempat`, `nope`, `ayah`, `ibu`, `kelas`) VALUES
(11, '69696969', 'Muhammad Junaidi iskandar', 'Perempuan', '2017-11-13', 'Bogor', '089765765676', '-', '-', 3),
(12, '00106680592', 'Risma Sari FM', 'Perempuan', '2001-11-15', 'Bogor', '081281733957', '-', '-', 4),
(14, '0010668058', 'Ramadhan Aksan N', 'Laki-Laki', '1905-01-12', 'Bogor', '089765765676', 'Masrur Alamsyah', 'Aisyah', 3),
(17, '213912392139', 'Ramadhan Aksan N', 'Laki-Laki', '2017-12-14', 'Jakarta', '-', '-', '-', 3),
(18, '09120201', 'Muhammad Junaidi iskandar', 'Laki-Laki', '2017-12-13', 'Jakarta', '-', '-', '-', 3),
(19, '49494949', 'Muhammad Junaidi iskandar', 'Laki-Laki', '2017-12-07', 'Jakarta', '-', '-', '-', 3),
(20, '00160279072', 'Givari Refa Fahrezi', 'Laki-Laki', '2001-05-11', 'Bogor', '0895343375485', 'Sapa ae', 'kagatau', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('administrator','sekretaris','siswa','guru') NOT NULL DEFAULT 'siswa',
  `kelas` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`, `kelas`) VALUES
(46, 'sek_XI-TKJ3', '21232f297a57a5a743894a0e4a801fc3', '', 3),
(47, 'XI-TKJ3', '21232f297a57a5a743894a0e4a801fc3', 'siswa', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas` (`kelas`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kelas` (`kelas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD KEY `kelas` (`kelas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas` (`kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `relasi_kelas` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
