-- MySQL dump 10.13  Distrib 8.2.0, for Linux (x86_64)
--
-- Host: localhost    Database: sia_yaj
-- ------------------------------------------------------
-- Server version	8.2.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_guru`
--

DROP TABLE IF EXISTS `tb_guru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_guru` (
  `id_guru` int NOT NULL AUTO_INCREMENT,
  `nama_guru` varchar(50) NOT NULL,
  `nuptk` varchar(50) NOT NULL,
  `mapel_guru` varchar(50) NOT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB AUTO_INCREMENT=23102134 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tb_jadwal_mapel`
--

DROP TABLE IF EXISTS `tb_jadwal_mapel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_jadwal_mapel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hari` varchar(20) NOT NULL,
  `kelas` varchar(15) DEFAULT NULL,
  `jam_ke` int NOT NULL,
  `waktu_mulai` varchar(20) NOT NULL,
  `waktu_selesai` varchar(20) NOT NULL,
  `mapel` varchar(50) NOT NULL,
  `guru_mapel` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tb_profil_lembaga`
--

DROP TABLE IF EXISTS `tb_profil_lembaga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_profil_lembaga` (
  `id_lembaga` int NOT NULL AUTO_INCREMENT,
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
  `npwp` int NOT NULL,
  `tahun_berdiri` int NOT NULL,
  PRIMARY KEY (`id_lembaga`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tb_siswa`
--

DROP TABLE IF EXISTS `tb_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_siswa` (
  `id_siswa` int NOT NULL AUTO_INCREMENT,
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
  `telp_siswa` varchar(20) NOT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(30) NOT NULL,
  `level` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-23  3:40:44
