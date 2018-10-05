# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.2.13-MariaDB)
# Database: apdp
# Generation Time: 2018-09-01 10:15:03 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table data_anak
# ------------------------------------------------------------

DROP VIEW IF EXISTS `data_anak`;

CREATE TABLE `data_anak` (
   `id_ayah` VARCHAR(10) NULL DEFAULT NULL,
   `id_ibu` VARCHAR(10) NULL DEFAULT NULL,
   `id` VARCHAR(10) NOT NULL,
   `nik` BIGINT(16) UNSIGNED ZEROFILL NULL DEFAULT NULL,
   `nama` VARCHAR(50) NOT NULL,
   `no_kk` BIGINT(16) UNSIGNED ZEROFILL NULL DEFAULT NULL,
   `jk` ENUM('Laki-laki','Perempuan') NOT NULL,
   `tempat_lhr` VARCHAR(50) NOT NULL,
   `tanggal_lhr` DATE NOT NULL,
   `gol_dar` VARCHAR(3) NOT NULL,
   `kewarganegaraan` ENUM('wni','wna') NOT NULL,
   `agama` VARCHAR(10) NOT NULL,
   `pendidikan` VARCHAR(30) NOT NULL,
   `pekerjaan` VARCHAR(20) NOT NULL,
   `status_nikah` VARCHAR(25) NOT NULL,
   `status_keluarga` VARCHAR(25) NOT NULL,
   `nama_ayah` VARCHAR(50) NOT NULL,
   `nama_ibu` VARCHAR(50) NOT NULL,
   `alamat` TEXT NOT NULL,
   `desa` VARCHAR(40) NOT NULL,
   `rt` INT(3) UNSIGNED ZEROFILL NOT NULL,
   `rw` INT(3) UNSIGNED ZEROFILL NOT NULL
) ENGINE=MyISAM;



# Dump of table data_istri
# ------------------------------------------------------------

DROP VIEW IF EXISTS `data_istri`;

CREATE TABLE `data_istri` (
   `id_suami` VARCHAR(10) NULL DEFAULT NULL,
   `id` VARCHAR(10) NOT NULL,
   `nik` BIGINT(16) UNSIGNED ZEROFILL NULL DEFAULT NULL,
   `nama` VARCHAR(50) NOT NULL,
   `no_kk` BIGINT(16) UNSIGNED ZEROFILL NULL DEFAULT NULL,
   `jk` ENUM('Laki-laki','Perempuan') NOT NULL,
   `tempat_lhr` VARCHAR(50) NOT NULL,
   `tanggal_lhr` DATE NOT NULL,
   `gol_dar` VARCHAR(3) NOT NULL,
   `kewarganegaraan` ENUM('wni','wna') NOT NULL,
   `agama` VARCHAR(10) NOT NULL,
   `pendidikan` VARCHAR(30) NOT NULL,
   `pekerjaan` VARCHAR(20) NOT NULL,
   `status_nikah` VARCHAR(25) NOT NULL,
   `status_keluarga` VARCHAR(25) NOT NULL,
   `nama_ayah` VARCHAR(50) NOT NULL,
   `nama_ibu` VARCHAR(50) NOT NULL,
   `alamat` TEXT NOT NULL,
   `desa` VARCHAR(40) NOT NULL,
   `rt` INT(3) UNSIGNED ZEROFILL NOT NULL,
   `rw` INT(3) UNSIGNED ZEROFILL NOT NULL
) ENGINE=MyISAM;



# Dump of table data_warga
# ------------------------------------------------------------

DROP TABLE IF EXISTS `data_warga`;

CREATE TABLE `data_warga` (
  `id` varchar(10) NOT NULL,
  `nik` bigint(16) unsigned zerofill DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `no_kk` bigint(16) unsigned zerofill DEFAULT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lhr` varchar(50) NOT NULL,
  `tanggal_lhr` date NOT NULL,
  `gol_dar` varchar(3) NOT NULL,
  `kewarganegaraan` enum('wni','wna') NOT NULL,
  `agama` varchar(10) NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `status_nikah` varchar(25) NOT NULL,
  `status_keluarga` varchar(25) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `desa` varchar(40) NOT NULL,
  `rt` int(3) unsigned zerofill NOT NULL,
  `rw` int(3) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `data_warga` WRITE;
/*!40000 ALTER TABLE `data_warga` DISABLE KEYS */;

INSERT INTO `data_warga` (`id`, `nik`, `nama`, `no_kk`, `jk`, `tempat_lhr`, `tanggal_lhr`, `gol_dar`, `kewarganegaraan`, `agama`, `pendidikan`, `pekerjaan`, `status_nikah`, `status_keluarga`, `nama_ayah`, `nama_ibu`, `alamat`, `desa`, `rt`, `rw`)
VALUES
	('ID001',0026482364823682,'jojo',63547326478427389,'Laki-laki','jakarta','1997-08-09','O','wna','Islam','Diploma I/II','Pegawai Swasta','Kawin','Kepala Keluarga','jeje','een','cilolohan','Kahuripan',002,007),
	('ID002',0026482364823682,'cici',63547326478427389,'Perempuan','tasik','1996-03-09','O','wni','Islam','Diploma IV/Strata I','PNS','Kawin','Istri','jiel','lisa','batu','indah',009,002),
	('ID003',0834247923792920,'ken',63547326478427389,'Laki-laki','kuningan','2001-04-07','O','wni','Islam','SMA/Sederajat','Belum Bekerja','Belum Kawin','Anak','jojo','cici','batu','indah',009,002),
	('ID004',0834247923792920,'kein',63547326478427389,'Laki-laki','kuningan','2001-04-07','O','wni','Islam','SMA/Sederajat','Belum Bekerja','Belum Kawin','Anak','jojo','cici','batu','indah',009,002),
	('ID005',0026482364823682,'Jajang Suherman',63547326478427400,'Laki-laki','jakarta','1997-08-09','O','wna','Islam','Diploma I/II','Pegawai Swasta','Kawin','Kepala Keluarga','jeje','een','cilolohan','Kahuripan',002,007),
	('ID006',0834247923792920,'Maman',63547326478427400,'Laki-laki','kuningan','2001-04-07','O','wni','Islam','SMA/Sederajat','Belum Bekerja','Belum Kawin','Anak','jojo','cici','batu','indah',009,002),
	('ID008',0026482364823682,'Mimin',63547326478427400,'Perempuan','tasik','1996-03-09','O','wni','Islam','Diploma IV/Strata I','PNS','Kawin','Istri','jiel','lisa','batu','indah',009,002);

/*!40000 ALTER TABLE `data_warga` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table istri
# ------------------------------------------------------------

DROP TABLE IF EXISTS `istri`;

CREATE TABLE `istri` (
  `id_istri` varchar(20) NOT NULL,
  `nik_istri` bigint(16) NOT NULL,
  `nama_istri` varchar(50) NOT NULL,
  `tempat_lhr_istri` varchar(50) NOT NULL,
  `tanggal_lhr_istri` date NOT NULL,
  `gol_dar_istri` varchar(3) NOT NULL,
  `kewarganegaraan_istri` varchar(3) NOT NULL,
  `agama_istri` varchar(10) NOT NULL,
  `pendidikan_istri` varchar(30) NOT NULL,
  `pekerjaan_istri` varchar(20) NOT NULL,
  `status_nikah_istri` varchar(25) NOT NULL,
  `status_keluarga_istri` varchar(25) NOT NULL,
  `nama_ayah_istri` varchar(50) NOT NULL,
  `nama_ibu_istri` varchar(50) NOT NULL,
  `id` varchar(10) NOT NULL,
  PRIMARY KEY (`id_istri`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table kelahiran
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kelahiran`;

CREATE TABLE `kelahiran` (
  `id_kelahiran` varchar(10) NOT NULL,
  `tempat_dilahirkan` varchar(10) NOT NULL,
  `pukul_lahir` time NOT NULL,
  `jenis_kelahiran` varchar(10) NOT NULL,
  `kelahiran_ke` varchar(10) NOT NULL,
  `penolong` varchar(15) NOT NULL,
  `nama_penolong` varchar(50) NOT NULL,
  `berat_bayi` int(5) NOT NULL,
  `panjang_bayi` int(5) NOT NULL,
  `id` varchar(10) NOT NULL,
  PRIMARY KEY (`id_kelahiran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `kelahiran` WRITE;
/*!40000 ALTER TABLE `kelahiran` DISABLE KEYS */;

INSERT INTO `kelahiran` (`id_kelahiran`, `tempat_dilahirkan`, `pukul_lahir`, `jenis_kelahiran`, `kelahiran_ke`, `penolong`, `nama_penolong`, `berat_bayi`, `panjang_bayi`, `id`)
VALUES
	('ID001','PILIH TEMP','00:00:00','PILIH JENI','','PENOLONG KELAHI','',0,0,'ID001'),
	('ID002','PILIH TEMP','00:00:00','PILIH JENI','','PENOLONG KELAHI','',0,0,'ID002'),
	('ID003','PILIH TEMP','00:00:00','PILIH JENI','','PENOLONG KELAHI','',0,0,'ID003');

/*!40000 ALTER TABLE `kelahiran` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kematian
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kematian`;

CREATE TABLE `kematian` (
  `id_kematian` varchar(10) NOT NULL,
  `status_hidup` varchar(25) NOT NULL,
  `tanggal_wafat` date NOT NULL,
  `pukul_wafat` time NOT NULL,
  `sebab_kematian` varchar(20) NOT NULL,
  `id` varchar(10) NOT NULL,
  PRIMARY KEY (`id_kematian`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `kematian` WRITE;
/*!40000 ALTER TABLE `kematian` DISABLE KEYS */;

INSERT INTO `kematian` (`id_kematian`, `status_hidup`, `tanggal_wafat`, `pukul_wafat`, `sebab_kematian`, `id`)
VALUES
	('IDK001','Mati','2018-08-31','02:01:00','Sakit','ID002');

/*!40000 ALTER TABLE `kematian` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pendatang
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pendatang`;

CREATE TABLE `pendatang` (
  `id_pendatang` varchar(10) NOT NULL,
  `tanggal_datang` date NOT NULL,
  `alamat_datang` text NOT NULL,
  `id` varchar(10) NOT NULL,
  PRIMARY KEY (`id_pendatang`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pendatang` WRITE;
/*!40000 ALTER TABLE `pendatang` DISABLE KEYS */;

INSERT INTO `pendatang` (`id_pendatang`, `tanggal_datang`, `alamat_datang`, `id`)
VALUES
	('IDP001','0000-00-00','','ID001'),
	('IDP002','0000-00-00','','ID002'),
	('IDP003','0000-00-00','','ID003');

/*!40000 ALTER TABLE `pendatang` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pindah
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pindah`;

CREATE TABLE `pindah` (
  `id_pindah` varchar(10) NOT NULL,
  `status_pindah` varchar(25) NOT NULL,
  `tanggal_pindah` date NOT NULL,
  `alamat_pindah` text NOT NULL,
  `id` varchar(10) NOT NULL,
  PRIMARY KEY (`id_pindah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pindah` WRITE;
/*!40000 ALTER TABLE `pindah` DISABLE KEYS */;

INSERT INTO `pindah` (`id_pindah`, `status_pindah`, `tanggal_pindah`, `alamat_pindah`, `id`)
VALUES
	('IDP001','Pindah','2018-08-31','jonggol','ID003');

/*!40000 ALTER TABLE `pindah` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table surat_keterangan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `surat_keterangan`;

CREATE TABLE `surat_keterangan` (
  `id_surat_keterangan` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `masa_berlaku` text NOT NULL,
  `pernyataan` text NOT NULL,
  `keperluan` text NOT NULL,
  `keterangan` text NOT NULL,
  `id` varchar(10) NOT NULL,
  PRIMARY KEY (`id_surat_keterangan`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `surat_keterangan` WRITE;
/*!40000 ALTER TABLE `surat_keterangan` DISABLE KEYS */;

INSERT INTO `surat_keterangan` (`id_surat_keterangan`, `tanggal`, `masa_berlaku`, `pernyataan`, `keperluan`, `keterangan`, `id`)
VALUES
	('23/KE/08/18/0002','2018-08-25','08/25/2018 - 08/25/2018','sdfsdf','hvh','SDFSDF','ID004'),
	('23/KE/08/18/0003','2018-08-31','08/31/2018 - 08/31/2018','Berdasarakan surat pengantar','pembuatan skck','nama tersebut termasuk warga cilolohan berkelakuan baik','ID002');

/*!40000 ALTER TABLE `surat_keterangan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `level` enum('admin-kelurahan','admin-kecamatan') NOT NULL,
  `blokir` enum('N','Y') NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id_user`, `user`, `pass`, `nama`, `level`, `blokir`, `no_hp`)
VALUES
	('USR001','adminkel','adminkel','Rellita Fikka Rahajeng','admin-kelurahan','N','+6282217063800'),
	('USR005','adminkec','adminkec','R Rita Merjanti','admin-kecamatan','N','+6282217063801'),
	('USR006','firsafaruq','firsafaruq','Firsa Faruq Riyadi','admin-kelurahan','N','+6282217063803');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;




# Replace placeholder table for data_anak with correct view syntax
# ------------------------------------------------------------

DROP TABLE `data_anak`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_anak`
AS SELECT
   `ds`.`id` AS `id_ayah`,
   `di`.`id` AS `id_ibu`,
   `da`.`id` AS `id`,
   `da`.`nik` AS `nik`,
   `da`.`nama` AS `nama`,
   `da`.`no_kk` AS `no_kk`,
   `da`.`jk` AS `jk`,
   `da`.`tempat_lhr` AS `tempat_lhr`,
   `da`.`tanggal_lhr` AS `tanggal_lhr`,
   `da`.`gol_dar` AS `gol_dar`,
   `da`.`kewarganegaraan` AS `kewarganegaraan`,
   `da`.`agama` AS `agama`,
   `da`.`pendidikan` AS `pendidikan`,
   `da`.`pekerjaan` AS `pekerjaan`,
   `da`.`status_nikah` AS `status_nikah`,
   `da`.`status_keluarga` AS `status_keluarga`,
   `da`.`nama_ayah` AS `nama_ayah`,
   `da`.`nama_ibu` AS `nama_ibu`,
   `da`.`alamat` AS `alamat`,
   `da`.`desa` AS `desa`,
   `da`.`rt` AS `rt`,
   `da`.`rw` AS `rw`
FROM ((`data_warga` `da` left join `data_warga` `ds` on(`ds`.`no_kk` = `da`.`no_kk` and `ds`.`status_keluarga` = 'Kepala Keluarga')) left join `data_warga` `di` on(`di`.`no_kk` = `da`.`no_kk` and `di`.`status_keluarga` = 'Istri')) where `da`.`status_keluarga` = 'Anak';


# Replace placeholder table for data_istri with correct view syntax
# ------------------------------------------------------------

DROP TABLE `data_istri`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_istri`
AS SELECT
   `dw`.`id` AS `id_suami`,
   `dt`.`id` AS `id`,
   `dt`.`nik` AS `nik`,
   `dt`.`nama` AS `nama`,
   `dt`.`no_kk` AS `no_kk`,
   `dt`.`jk` AS `jk`,
   `dt`.`tempat_lhr` AS `tempat_lhr`,
   `dt`.`tanggal_lhr` AS `tanggal_lhr`,
   `dt`.`gol_dar` AS `gol_dar`,
   `dt`.`kewarganegaraan` AS `kewarganegaraan`,
   `dt`.`agama` AS `agama`,
   `dt`.`pendidikan` AS `pendidikan`,
   `dt`.`pekerjaan` AS `pekerjaan`,
   `dt`.`status_nikah` AS `status_nikah`,
   `dt`.`status_keluarga` AS `status_keluarga`,
   `dt`.`nama_ayah` AS `nama_ayah`,
   `dt`.`nama_ibu` AS `nama_ibu`,
   `dt`.`alamat` AS `alamat`,
   `dt`.`desa` AS `desa`,
   `dt`.`rt` AS `rt`,
   `dt`.`rw` AS `rw`
FROM (`data_warga` `dt` left join `data_warga` `dw` on(`dt`.`no_kk` = `dw`.`no_kk` and `dw`.`status_keluarga` = 'Kepala Keluarga')) where `dt`.`status_keluarga` = 'Istri';

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
