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
-- Table structure for table `tb_ekskul`
--

DROP TABLE IF EXISTS `tb_ekskul`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_ekskul` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ekskul` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pelatih` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_ekskul`
--

LOCK TABLES `tb_ekskul` WRITE;
/*!40000 ALTER TABLE `tb_ekskul` DISABLE KEYS */;
INSERT INTO `tb_ekskul` VALUES (2,'Paskibra','Ruslan Didu'),(3,'Pramuka','Royhan Asmr'),(4,'PMR','Ery Zem Boat');
/*!40000 ALTER TABLE `tb_ekskul` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_ekskul_nilai`
--

DROP TABLE IF EXISTS `tb_ekskul_nilai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_ekskul_nilai` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_ekskul` int DEFAULT NULL,
  `id_kelas` int DEFAULT NULL,
  `id_siswa` int DEFAULT NULL,
  `nilai` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_ekskul_nilai`
--

LOCK TABLES `tb_ekskul_nilai` WRITE;
/*!40000 ALTER TABLE `tb_ekskul_nilai` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_ekskul_nilai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_guru`
--

DROP TABLE IF EXISTS `tb_guru`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_guru` (
  `id_guru` int NOT NULL AUTO_INCREMENT,
  `no_guru` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_guru` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nuptk` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mapel_guru` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jabatan` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat_guru` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tlp_guru` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_guru` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_guru`
--

LOCK TABLES `tb_guru` WRITE;
/*!40000 ALTER TABLE `tb_guru` DISABLE KEYS */;
INSERT INTO `tb_guru` VALUES (1,'GAD57220','Wahidin Prayogo','8234287364279',NULL,'guru','Kembangan Utara','082123827346','wahidcllucetia@gmail.com'),(3,'GAD71785','Royhan Assalam','',NULL,'guru','Duri Kosambi','0823812682734','royunderated@gmail.com'),(5,'GAD87151','Rivansyah','',NULL,'guru','Tangerang','0821287462873','riv@vansyah.com');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_jadwal_mapel`
--

LOCK TABLES `tb_jadwal_mapel` WRITE;
/*!40000 ALTER TABLE `tb_jadwal_mapel` DISABLE KEYS */;
INSERT INTO `tb_jadwal_mapel` VALUES (1,'Senin',1,'07.00','08.00','Pendidikan Jasmani','1'),(2,'Rabu',2,'8.30','9.00','Akidah akhlak','1'),(3,'Senin',2,'08.00','09.00','Akidah akhlak','3'),(4,'Rabu',5,'07.00','08.00','Pendidikan Jasmani','3'),(5,'Selasa',1,'07.00','08.00','mtk','1'),(6,'Selasa',2,'08.00','09.00','Ilmu Pengetahuan Alam (IPA)','3'),(7,'Kamis',1,'07.00','08.00','Seni Budaya & Keterampilan (SBK)','3'),(8,'Senin',3,'09.00','10.00','Ilmu Pengetahuan Sosial (IPS)','3'),(9,'Senin',4,'10.00','11.00','Pendidikan Agama','5');
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
  `romawi` varchar(5) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ket` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_sekolah` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenjang_sekolah` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nsm` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `npsn` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_sekolah` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_akreditasi` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nilai_akreditasi` int DEFAULT NULL,
  `tgl_akreditasi` date DEFAULT NULL,
  `berlaku_akreditasi` date DEFAULT NULL,
  `no_akreditasi` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `npwp` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tahun_berdiri` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_sekolah` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_profil_lembaga`
--

LOCK TABLES `tb_profil_lembaga` WRITE;
/*!40000 ALTER TABLE `tb_profil_lembaga` DISABLE KEYS */;
INSERT INTO `tb_profil_lembaga` VALUES (3,'MI AD-DA\'WAH','MI','','20101950','swasta','B',85,'2021-05-20','2026-05-20','AK-2021-05-20','','1991','(021) 77328738','miaddawah@addawah.com');
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
  `jenjang_rombel` varchar(5) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ket_rombel` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tp_rombel` varchar(15) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `walkel_rombel` int DEFAULT NULL,
  `max_siswa` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_rombel_set`
--

LOCK TABLES `tb_rombel_set` WRITE;
/*!40000 ALTER TABLE `tb_rombel_set` DISABLE KEYS */;
INSERT INTO `tb_rombel_set` VALUES (3,1,4),(4,1,6);
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
  `nis_siswa` varchar(8) COLLATE utf8mb4_general_ci NOT NULL,
  `nisn_siswa` varchar(12) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nik_siswa` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_siswa` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `jk_siswa` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tplahir_siswa` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `ayah_siswa` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ibu_siswa` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kelas_siswa` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rombel_siswa` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telp_siswa` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_siswa`
--

LOCK TABLES `tb_siswa` WRITE;
/*!40000 ALTER TABLE `tb_siswa` DISABLE KEYS */;
INSERT INTO `tb_siswa` VALUES (4,'11.001','983749283','31713029342039','Wahyu Sonoan','L','Jakarta','2015-02-01','Yusup','Rani','1',NULL,''),(5,'11.002','928348923','3173129038222','Rani Sanuri','P','Jakarta','2015-02-10','Roni','Ratna','1',NULL,''),(6,'11.003','2983749823','31720301293423','Wahidin','L','Yogyakarta','2015-06-05','Mustofa','Warni','1',NULL,'');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_user`
--

LOCK TABLES `tb_user` WRITE;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` VALUES (1,'admin','admin','Rivansyah Belom Makan','rivansyah@gmail.com','Cantiga','081233445567','admin'),(4,'wahid','wahid','Wahid Prayogo','wahid@wah.id','Jakarta Barat','082123634234','admin');
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

-- Dump completed on 2025-10-19 11:10:26
