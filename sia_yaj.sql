-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 02:37 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sia_yaj`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `nuptk` varchar(50) NOT NULL,
  `mapel_guru` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nama_guru`, `nuptk`, `mapel_guru`) VALUES
(101011, 'Muzahidin, S.Pd', '01234567891021', 'Pendidikan Jasmani'),
(23102120, 'Zaini', '3142755657200023', 'Pendidikan Jasmani PJOK'),
(23102122, 'Harisuddin', '832742940181', 'Akidah akhlak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil_lembaga`
--

CREATE TABLE `tb_profil_lembaga` (
  `id_lembaga` int(20) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `jenjang_sekolah` varchar(50) NOT NULL,
  `nsm` varchar(30) NOT NULL,
  `npsn` varchar(10) NOT NULL,
  `status_sekolah` varchar(20) NOT NULL,
  `nomor_siop` varchar(30) NOT NULL,
  `tgl_siop` date NOT NULL,
  `berlaku_siop` date NOT NULL,
  `habis_siop` date NOT NULL,
  `status_akreditasi` varchar(10) NOT NULL,
  `nilai_akreditasi` varchar(10) NOT NULL,
  `tgl_akreditasi` date NOT NULL,
  `berlaku_akreditasi` date NOT NULL,
  `no_akreditasi` varchar(20) NOT NULL,
  `npwp` int(11) NOT NULL,
  `tahun_berdiri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis_siswa` varchar(8) NOT NULL,
  `nisn_siswa` varchar(12) NOT NULL,
  `nik_siswa` varchar(20) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jk_siswa` varchar(20) NOT NULL,
  `tplahir_siswa` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `ayah_siswa` varchar(50) NOT NULL,
  `ibu_siswa` varchar(50) NOT NULL,
  `kelas_siswa` varchar(10) NOT NULL,
  `rombel_siswa` varchar(10) NOT NULL,
  `telp_siswa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis_siswa`, `nisn_siswa`, `nik_siswa`, `nama_siswa`, `jk_siswa`, `tplahir_siswa`, `tgl_lahir`, `ayah_siswa`, `ibu_siswa`, `kelas_siswa`, `rombel_siswa`, `telp_siswa`) VALUES
(2, '2115115', '3010204010', '3671512318241', 'Muhammad Wahid', 'laki-laki', 'Jakarta', '2023-03-08', 'Munir', 'Rohaya', '8', 'VIII B', '08822101292'),
(5, '129301', '001231231', '12093791027401', 'Wahyudi', 'laki-laki', 'Tangerang', '0000-00-00', 'Romlih', 'Mulyanah', '8', 'VIII B', '021203192381'),
(7, '123123', '21312313', '29037123719073', 'Wahid', 'laki-laki', 'Gunung Kidul', '2023-09-05', 'Marno', 'marni', '7', 'VII B', '123810293');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(30) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama`, `email`, `alamat`, `no_telp`, `level`) VALUES
(1, 'admin', 'admin', 'rivansyah', 'rivansyah@gmail.com', 'kp.cantiga kota tangerang', '081233445567', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tb_profil_lembaga`
--
ALTER TABLE `tb_profil_lembaga`
  ADD PRIMARY KEY (`id_lembaga`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23102134;

--
-- AUTO_INCREMENT for table `tb_profil_lembaga`
--
ALTER TABLE `tb_profil_lembaga`
  MODIFY `id_lembaga` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
