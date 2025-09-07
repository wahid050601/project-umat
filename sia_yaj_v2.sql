-- MySQL dump 10.13  Distrib 9.2.0, for Linux (x86_64)
--
-- Host: localhost    Database: sia_yaj
-- ------------------------------------------------------
-- Server version	9.2.0

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
  `no_guru` varchar(50) DEFAULT NULL,
  `nama_guru` varchar(50) DEFAULT NULL,
  `nuptk` varchar(50) DEFAULT NULL,
  `mapel_guru` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `alamat_guru` varchar(100) DEFAULT NULL,
  `tlp_guru` varchar(20) DEFAULT NULL,
  `email_guru` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_guru`
--

LOCK TABLES `tb_guru` WRITE;
/*!40000 ALTER TABLE `tb_guru` DISABLE KEYS */;
INSERT INTO `tb_guru` VALUES (1,'GAD57220','Wahidin Prayogo','8234287364279',NULL,'guru','Kembangan Utara','082123827346','wahidcllucetia@gmail.com'),(3,'GAD71785','Royhan Assalam','',NULL,'guru','Duri Kosambi','0823812682734','royunderated@gmail.com');
/*!40000 ALTER TABLE `tb_guru` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_jadwal_mapel`
--

DROP TABLE IF EXISTS `tb_jadwal_mapel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_jadwal_mapel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hari` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `jam_ke` int NOT NULL,
  `waktu_mulai` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `waktu_selesai` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `mapel` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `guru_mapel` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_jadwal_mapel`
--

LOCK TABLES `tb_jadwal_mapel` WRITE;
/*!40000 ALTER TABLE `tb_jadwal_mapel` DISABLE KEYS */;
INSERT INTO `tb_jadwal_mapel` VALUES (1,'Senin',1,'07.00','08.00','Pendidikan Jasmani','Muzahidin, S.Pd'),(2,'Rabu',2,'8.30','9.00','Akidah akhlak','Muzahidin, S.Pd'),(3,'Senin',2,'08.00','09.00','Akidah akhlak','Harisuddin'),(4,'Rabu',5,'07.00','08.00','Pendidikan Jasmani','Zaini');
/*!40000 ALTER TABLE `tb_jadwal_mapel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_jenjang`
--

DROP TABLE IF EXISTS `tb_jenjang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_jenjang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenjang` int DEFAULT NULL,
  `romawi` varchar(5) DEFAULT NULL,
  `ket` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_jenjang`
--

LOCK TABLES `tb_jenjang` WRITE;
/*!40000 ALTER TABLE `tb_jenjang` DISABLE KEYS */;
INSERT INTO `tb_jenjang` VALUES (1,1,'I','satu'),(2,2,'II','dua'),(3,3,'III','tiga');
/*!40000 ALTER TABLE `tb_jenjang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_profil_lembaga`
--

DROP TABLE IF EXISTS `tb_profil_lembaga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_profil_lembaga` (
  `id_lembaga` int NOT NULL AUTO_INCREMENT,
  `nama_sekolah` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `jenjang_sekolah` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nsm` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `npsn` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `status_sekolah` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `nomor_siop` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_siop` date NOT NULL,
  `berlaku_siop` date NOT NULL,
  `habis_siop` date NOT NULL,
  `status_akreditasi` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `nilai_akreditasi` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_akreditasi` date NOT NULL,
  `berlaku_akreditasi` date NOT NULL,
  `no_akreditasi` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `npwp` int NOT NULL,
  `tahun_berdiri` int NOT NULL,
  PRIMARY KEY (`id_lembaga`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_profil_lembaga`
--

LOCK TABLES `tb_profil_lembaga` WRITE;
/*!40000 ALTER TABLE `tb_profil_lembaga` DISABLE KEYS */;
INSERT INTO `tb_profil_lembaga` VALUES (1,'MI AD-DA\'WAH','MI','-','20101590','swasta','','2025-06-21','2025-06-21','2025-06-21','A','95','2025-06-21','2025-06-21','B029',93849234,1945);
/*!40000 ALTER TABLE `tb_profil_lembaga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_rombel`
--

DROP TABLE IF EXISTS `tb_rombel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_rombel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenjang_rombel` varchar(5) DEFAULT NULL,
  `ket_rombel` varchar(30) DEFAULT NULL,
  `tp_rombel` varchar(15) DEFAULT NULL,
  `walkel_rombel` int DEFAULT NULL,
  `max_siswa` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_rombel`
--

LOCK TABLES `tb_rombel` WRITE;
/*!40000 ALTER TABLE `tb_rombel` DISABLE KEYS */;
INSERT INTO `tb_rombel` VALUES (1,'1','1A','2025/2026',3,25),(2,'2','2A','2025/2026',3,30),(3,'1','1B','2025/2026',1,27),(8,'2','2B','2025/2026',3,30);
/*!40000 ALTER TABLE `tb_rombel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_rombel_set`
--

DROP TABLE IF EXISTS `tb_rombel_set`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_rombel_set` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_rombel` int DEFAULT NULL,
  `id_siswa` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_rombel_set`
--

LOCK TABLES `tb_rombel_set` WRITE;
/*!40000 ALTER TABLE `tb_rombel_set` DISABLE KEYS */;
INSERT INTO `tb_rombel_set` VALUES (1,1,2);
/*!40000 ALTER TABLE `tb_rombel_set` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_siswa`
--

DROP TABLE IF EXISTS `tb_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_siswa` (
  `id_siswa` int NOT NULL AUTO_INCREMENT,
  `nis_siswa` varchar(8) NOT NULL,
  `nisn_siswa` varchar(12) DEFAULT NULL,
  `nik_siswa` varchar(20) DEFAULT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jk_siswa` varchar(20) NOT NULL,
  `tplahir_siswa` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `ayah_siswa` varchar(50) DEFAULT NULL,
  `ibu_siswa` varchar(50) DEFAULT NULL,
  `kelas_siswa` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rombel_siswa` varchar(10) DEFAULT NULL,
  `telp_siswa` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_siswa`
--

LOCK TABLES `tb_siswa` WRITE;
/*!40000 ALTER TABLE `tb_siswa` DISABLE KEYS */;
INSERT INTO `tb_siswa` VALUES (1,'16.0023','0021627384','31730288394627','Rahid Dihaw Rayogo','L','Jakarta','2000-07-07','Rangga','Ratna','VII',NULL,'0821253257256'),(2,'18.0239','883728394','31732893829839','Randi','L','Jakarta','2003-01-08','Yanto','Rahayu','VII',NULL,'0821276263682');
/*!40000 ALTER TABLE `tb_siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `no_telp` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `level` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_user`
--

LOCK TABLES `tb_user` WRITE;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` VALUES (1,'admin','admin','rivansyah','rivansyah@gmail.com','kp.cantiga kota tangerang','081233445567','admin');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-07 12:28:07
