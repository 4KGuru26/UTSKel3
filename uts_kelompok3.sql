-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2023 at 11:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts_kelompok3`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas_siswa`
--

CREATE TABLE `berkas_siswa` (
  `ID_Berkas` int(11) NOT NULL,
  `ID_Siswa` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `nama_ayah` text NOT NULL,
  `nama_ibu` text NOT NULL,
  `ijazah` varchar(100) NOT NULL,
  `akte` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berkas_siswa`
--

INSERT INTO `berkas_siswa` (`ID_Berkas`, `ID_Siswa`, `nama_siswa`, `nama_ayah`, `nama_ibu`, `ijazah`, `akte`) VALUES
(1, 2, 'Michael Harry Setiawan', 'Ayahku', 'Ibuku', 'assignment_04.pdf', 'Soal-Quiz1-Kelas-K.pdf'),
(2, 1, 'siswa', 'Ayahku', 'Ibuku', 'Tugas 2 (1).pdf', 'Soal-Quiz1-Kelas-K (1).pdf'),
(8, 31, 'test1', 'Ayahku', 'Ibuku', 'onsite-CE432L-Microprocessor System Lab-MidTerm-2223.pdf', 'Michael Harry Setiawan (00000055653)_506207_0.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `username_admin`
--

CREATE TABLE `username_admin` (
  `ID_Admin` int(5) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `username_admin`
--

INSERT INTO `username_admin` (`ID_Admin`, `Nama`, `Username`, `Password`, `Jabatan`) VALUES
(1, 'admin', 'admin', '$2y$10$BMicXxX7aWTM71xGbG7zOeDDJiW2AgiP3i3pmEfNdQxOnx3CDvsru', 'Admin Tinggi'),
(3, 'Michael', 'michael', '$2y$10$XgF3Wo42qSNZYTHDz6V8QebZjerF7KckwlW50Yztci./4RsTzZ31e', 'Admin Bawah');

-- --------------------------------------------------------

--
-- Table structure for table `username_siswa`
--

CREATE TABLE `username_siswa` (
  `ID_Siswa` int(5) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `nama` text NOT NULL,
  `Password` varchar(255) NOT NULL,
  `tempatLahir` varchar(100) NOT NULL,
  `tanggalLahir` date NOT NULL DEFAULT current_timestamp(),
  `alamat` varchar(100) NOT NULL,
  `jarak` float NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `username_siswa`
--

INSERT INTO `username_siswa` (`ID_Siswa`, `Username`, `nama`, `Password`, `tempatLahir`, `tanggalLahir`, `alamat`, `jarak`, `foto`, `status`) VALUES
(1, 'siswa', 'siswa', '$2y$10$J/lTQJLhdwmmhHImmD38ceNIu/92tA4ZTCGNzYErl2c6z/zaTNaTm', 'Jambi', '2007-03-14', 'Jakarta', 1.68, '4275-valorant-pheonix-my-eyes.png', 'Diterima'),
(2, 'michael.harry@tadika.com', 'Michael Harry Setiawan', '$2y$10$/Qlw2/XqtOlUFsKLP2oN8.IVmgdRARyUkZbC28mi9bmc7IwUuRfMK', 'Jakarta', '2023-03-28', 'Tangerang', 1.89335, '309554641_838001837333181_4714657499967804429_n.jpg', 'Belum Terdaftar'),
(14, 'richard.tandean@tadika.com', 'Richard Tandean', '$2y$10$3z4K3TOFW0j.Sm52lDtToOdWHeG7OVdkL2QGwb09TOBZmgi44879S', 'Jambi', '2012-01-31', 'Alloggio barat 6', 1.89218, 'FB_IMG_15883909854803125.jpg', 'Belum Terdaftar'),
(31, 'test1@tadika.com', 'test1', '$2y$10$lCvDYo4neCyiWBPUd5iUKOk6tYDIOEryo6z.it5x.Vztz.1ZEEgom', 'Jakarta', '2023-03-16', 'Alloggio barat 6', 1.89218, '4349_honkler_clown.png', 'Belum Terdaftar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas_siswa`
--
ALTER TABLE `berkas_siswa`
  ADD PRIMARY KEY (`ID_Berkas`);

--
-- Indexes for table `username_admin`
--
ALTER TABLE `username_admin`
  ADD PRIMARY KEY (`ID_Admin`);

--
-- Indexes for table `username_siswa`
--
ALTER TABLE `username_siswa`
  ADD PRIMARY KEY (`ID_Siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas_siswa`
--
ALTER TABLE `berkas_siswa`
  MODIFY `ID_Berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `username_admin`
--
ALTER TABLE `username_admin`
  MODIFY `ID_Admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `username_siswa`
--
ALTER TABLE `username_siswa`
  MODIFY `ID_Siswa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
