-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2018 at 10:30 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `nisn` char(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas` int(255) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `nisn`, `nama`, `kelas`, `bulan`, `tanggal`, `status`) VALUES
(62, '0010668058', 'Ramadhan Aksan N', 3, '05', '18/05/2018', 'Hadir'),
(63, '00160279072', 'Givari Refa Fahrezi', 3, '05', '18/05/2018', 'Hadir'),
(64, '59595951924', 'Bolai', 3, '05', '18/05/2018', 'Izin'),
(65, '59595951924', 'Bolai', 3, '06', '05/06/2018', 'Hadir'),
(66, '00106680592', 'Risma Sari', 4, '06', '05/06/2018', 'Hadir'),
(67, '00160279072', 'Givari Refa Fahrezi', 3, '06', '05/06/2018', 'Hadir'),
(68, '69696969', 'Muhammad Junaidi iskandar', 3, '06', '05/06/2018', 'Hadir');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(16) NOT NULL,
  `useradm` varchar(255) NOT NULL,
  `passadm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `useradm`, `passadm`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(50) NOT NULL,
  `wali` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `wali`, `kelas`) VALUES
(3, 'Amin Tajudin S.Kom', 'XI-TKJ3'),
(4, 'Josua Simajuntak', 'X-TKJ1'),
(5, 'Imam sulaiman', 'X-TOI'),
(6, 'Selvi Martini Fitriah.S,M.Pd', 'XI-TKJ1'),
(7, 'David Nahemia', 'XI-TOI'),
(8, 'Pak Adzy', 'XI-MM');

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
(12, '00106680592', 'Risma Sari', 'Perempuan', '2001-11-15', 'Bogor', '081281733957', '-', '-', 4),
(14, '0010668058', 'Ramadhan Aksan N', 'Laki-Laki', '1905-01-12', 'Bogor', '089765765676', 'Masrur Alamsyah', 'Aisyah', 3),
(18, '09120201', 'Muhammad Junaidi iskandar', 'Laki-Laki', '2017-12-13', 'Jakarta', '-', '-', '-', 3),
(20, '00160279072', 'Givari Refa Fahrezi', 'Laki-Laki', '2001-05-11', 'Bogor', '0895343375485', 'Sapa ae', 'kagatau', 3),
(21, '0102130123', 'givpare', 'Laki-Laki', '2001-05-14', 'Jakarta', '081281733957', '-', '-', 5),
(22, '595959519249', 'Bolai', 'Laki-Laki', '2001-04-11', 'Bondowoso', '-', '-', '-', 3),
(23, '0012348694380', 'Adrian Maulana', 'Laki-Laki', '2001-07-11', 'Bogor', '-', 'Sugito', 'Aisyah', 6),
(24, '0013540123', 'Dani Bagus', 'Laki-Laki', '2001-10-09', 'Bogor', '-', '-', '-', 7);

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
(46, 'sek_XI-TKJ3', '21232f297a57a5a743894a0e4a801fc3', 'sekretaris', 3),
(47, 'XI-TKJ3', '21232f297a57a5a743894a0e4a801fc3', 'siswa', 3),
(48, 'sek_X-tkj1', '21232f297a57a5a743894a0e4a801fc3', 'sekretaris', 4);

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
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
