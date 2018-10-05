-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 11 Sep 2018 pada 09.36
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `apdp`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `data_anak`
--
CREATE TABLE IF NOT EXISTS `data_anak` (
`id_ayah` varchar(10)
,`id_ibu` varchar(10)
,`id` varchar(10)
,`nik` bigint(16) unsigned zerofill
,`nama` varchar(50)
,`no_kk` bigint(16) unsigned zerofill
,`jk` enum('Laki-laki','Perempuan')
,`tempat_lhr` varchar(50)
,`tanggal_lhr` date
,`gol_dar` varchar(3)
,`kewarganegaraan` enum('wni','wna')
,`agama` varchar(10)
,`pendidikan` varchar(30)
,`pekerjaan` varchar(20)
,`status_nikah` varchar(25)
,`status_keluarga` varchar(25)
,`nama_ayah` varchar(50)
,`nama_ibu` varchar(50)
,`alamat` text
,`desa` varchar(40)
,`rt` int(3) unsigned zerofill
,`rw` int(3) unsigned zerofill
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `data_istri`
--
CREATE TABLE IF NOT EXISTS `data_istri` (
`id_suami` varchar(10)
,`id` varchar(10)
,`nik` bigint(16) unsigned zerofill
,`nama` varchar(50)
,`no_kk` bigint(16) unsigned zerofill
,`jk` enum('Laki-laki','Perempuan')
,`tempat_lhr` varchar(50)
,`tanggal_lhr` date
,`gol_dar` varchar(3)
,`kewarganegaraan` enum('wni','wna')
,`agama` varchar(10)
,`pendidikan` varchar(30)
,`pekerjaan` varchar(20)
,`status_nikah` varchar(25)
,`status_keluarga` varchar(25)
,`nama_ayah` varchar(50)
,`nama_ibu` varchar(50)
,`alamat` text
,`desa` varchar(40)
,`rt` int(3) unsigned zerofill
,`rw` int(3) unsigned zerofill
);
-- --------------------------------------------------------

--
-- Struktur dari tabel `data_warga`
--

CREATE TABLE IF NOT EXISTS `data_warga` (
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
  `rw` int(3) unsigned zerofill NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_warga`
--

INSERT INTO `data_warga` (`id`, `nik`, `nama`, `no_kk`, `jk`, `tempat_lhr`, `tanggal_lhr`, `gol_dar`, `kewarganegaraan`, `agama`, `pendidikan`, `pekerjaan`, `status_nikah`, `status_keluarga`, `nama_ayah`, `nama_ibu`, `alamat`, `desa`, `rt`, `rw`) VALUES
('ID001', 0026482364823682, 'jojo', 63547326478427389, 'Laki-laki', 'jakarta', '1997-08-09', 'O', 'wna', 'Islam', 'Diploma I/II', 'Pegawai Swasta', 'Kawin', 'Kepala Keluarga', 'jeje', 'een', 'cilolohan', 'Kahuripan', 002, 007),
('ID002', 0026482364823682, 'cici', 63547326478427389, 'Perempuan', 'tasik', '1996-03-09', 'O', 'wni', 'Islam', 'Diploma IV/Strata I', 'PNS', 'Kawin', 'Istri', 'jiel', 'lisa', 'batu', 'indah', 009, 002),
('ID003', 0834247923792920, 'ken', 63547326478427389, 'Laki-laki', 'kuningan', '2001-04-07', 'O', 'wni', 'Islam', 'SMA/Sederajat', 'Belum Bekerja', 'Belum Kawin', 'Anak', 'jojo', 'cici', 'batu', 'indah', 009, 002),
('ID004', 3648624862862862, 'rere', 3278054111500012, 'Perempuan', 'tasik', '2018-09-17', 'A', 'wni', 'Islam', 'Akademi/Diploma III/Sarjana Mu', 'PNS', 'Belum Kawin', 'Anak', 'suji', 'euis', 'jdjdhks', 'nbsdha', 002, 007);

-- --------------------------------------------------------

--
-- Struktur dari tabel `istri`
--

CREATE TABLE IF NOT EXISTS `istri` (
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
  `id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelahiran`
--

CREATE TABLE IF NOT EXISTS `kelahiran` (
  `id_kelahiran` varchar(10) NOT NULL,
  `tempat_dilahirkan` varchar(30) NOT NULL,
  `pukul_lahir` time NOT NULL,
  `jenis_kelahiran` varchar(30) NOT NULL,
  `kelahiran_ke` varchar(10) NOT NULL,
  `penolong` varchar(30) NOT NULL,
  `nama_penolong` varchar(50) NOT NULL,
  `berat_bayi` int(5) NOT NULL,
  `panjang_bayi` int(5) NOT NULL,
  `id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelahiran`
--

INSERT INTO `kelahiran` (`id_kelahiran`, `tempat_dilahirkan`, `pukul_lahir`, `jenis_kelahiran`, `kelahiran_ke`, `penolong`, `nama_penolong`, `berat_bayi`, `panjang_bayi`, `id`) VALUES
('ID001', 'PILIH TEMPAT', '00:00:00', 'PILIH JENIS KELAHIRAN', '', 'PENOLONG KELAHIRAN', '', 0, 0, 'ID001'),
('ID002', 'PILIH TEMP', '00:00:00', 'PILIH JENI', '', 'PENOLONG KELAHI', '', 0, 0, 'ID002'),
('ID003', 'PILIH TEMP', '00:00:00', 'PILIH JENI', '', 'PENOLONG KELAHI', '', 0, 0, 'ID003'),
('IDL004', 'Pilih Tempat', '00:00:00', 'Pilih Jenis Kelahiran', '', 'Pilih Penolong', '', 0, 0, 'ID004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE IF NOT EXISTS `kelurahan` (
  `id_kelurahan` varchar(30) NOT NULL,
  `nm_kelurahan` varchar(30) NOT NULL,
  `nm_lurah` varchar(30) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `nm_kelurahan`, `nm_lurah`, `alamat`) VALUES
('KLH001', 'Empangsari', 'Bambang Gunawan, S.Sos', 'Empangsari'),
('KLH002', 'Cikalang', 'I. Sopyan S.Sos', 'Cikalang'),
('KLH003', 'Kahuripan', 'Asep Rusliadi, S.Sos', 'Kahuripan'),
('KLH004', 'Lengkongsari', 'xxxx', 'Lengkongsari'),
('KLH005', 'Tawangsari', 'xixixi', 'Tawangsari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kematian`
--

CREATE TABLE IF NOT EXISTS `kematian` (
  `id_kematian` varchar(10) NOT NULL,
  `status_hidup` varchar(25) NOT NULL,
  `tanggal_wafat` date NOT NULL,
  `pukul_wafat` time NOT NULL,
  `sebab_kematian` varchar(20) NOT NULL,
  `id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kematian`
--

INSERT INTO `kematian` (`id_kematian`, `status_hidup`, `tanggal_wafat`, `pukul_wafat`, `sebab_kematian`, `id`) VALUES
('IDK001', 'Mati', '2018-08-31', '02:01:00', 'Sakit', 'ID002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendatang`
--

CREATE TABLE IF NOT EXISTS `pendatang` (
  `id_pendatang` varchar(10) NOT NULL,
  `tanggal_datang` date NOT NULL,
  `alamat_datang` text NOT NULL,
  `id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendatang`
--

INSERT INTO `pendatang` (`id_pendatang`, `tanggal_datang`, `alamat_datang`, `id`) VALUES
('IDP001', '0000-00-00', '', 'ID001'),
('IDP002', '0000-00-00', '', 'ID002'),
('IDP003', '0000-00-00', '', 'ID003'),
('IDP004', '0000-00-00', '', 'ID004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pindah`
--

CREATE TABLE IF NOT EXISTS `pindah` (
  `id_pindah` varchar(10) NOT NULL,
  `status_pindah` varchar(25) NOT NULL,
  `tanggal_pindah` date NOT NULL,
  `alamat_pindah` text NOT NULL,
  `id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pindah`
--

INSERT INTO `pindah` (`id_pindah`, `status_pindah`, `tanggal_pindah`, `alamat_pindah`, `id`) VALUES
('IDP001', 'Tetap', '2018-09-05', 'Cendrawasih', 'ID001'),
('IDP002', 'Pindah', '2018-09-05', 'jonggol', 'ID002'),
('IDP003', 'Pindah', '2018-09-05', 'cirebon', 'ID003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keterangan`
--

CREATE TABLE IF NOT EXISTS `surat_keterangan` (
  `id_surat_keterangan` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `masa_berlaku` text NOT NULL,
  `pernyataan` text NOT NULL,
  `keperluan` text NOT NULL,
  `keterangan` text NOT NULL,
  `id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat_keterangan`
--

INSERT INTO `surat_keterangan` (`id_surat_keterangan`, `tanggal`, `masa_berlaku`, `pernyataan`, `keperluan`, `keterangan`, `id`) VALUES
('23/KE/08/18/0002', '2018-09-02', '08/25/2018 - 08/25/2018', 'sdfsdf', 'hvh', 'SDFSDF', 'ID004'),
('23/KE/08/18/0003', '2018-08-31', '08/31/2018 - 08/31/2018', 'Berdasarakan surat pengantar', 'pembuatan skck', 'nama tersebut termasuk warga cilolohan berkelakuan baik', 'ID002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(10) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `level` enum('admin','admin-kelurahan','admin-kecamatan') NOT NULL,
  `blokir` enum('N','Y') NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `id_kelurahan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `user`, `pass`, `nama`, `level`, `blokir`, `no_hp`, `id_kelurahan`) VALUES
('USR001', 'admin', 'admin', 'Admin Ganteng', 'admin', 'N', '+62567567567', 'KLH004'),
('USR002', 'adminkel', 'adminkel', 'Rere', 'admin-kelurahan', 'N', '+6234534534', 'KLH001'),
('USR003', 'adminkec', 'adminkec', 'Kecamatan', 'admin-kecamatan', 'N', '+6246456456', 'KLH004'),
('USR004', 'qwerty', 'qwerty', 'qwqerty', 'admin-kelurahan', 'N', '+62456456', 'KLH003');

-- --------------------------------------------------------

--
-- Struktur untuk view `data_anak`
--
DROP TABLE IF EXISTS `data_anak`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_anak` AS select `ds`.`id` AS `id_ayah`,`di`.`id` AS `id_ibu`,`da`.`id` AS `id`,`da`.`nik` AS `nik`,`da`.`nama` AS `nama`,`da`.`no_kk` AS `no_kk`,`da`.`jk` AS `jk`,`da`.`tempat_lhr` AS `tempat_lhr`,`da`.`tanggal_lhr` AS `tanggal_lhr`,`da`.`gol_dar` AS `gol_dar`,`da`.`kewarganegaraan` AS `kewarganegaraan`,`da`.`agama` AS `agama`,`da`.`pendidikan` AS `pendidikan`,`da`.`pekerjaan` AS `pekerjaan`,`da`.`status_nikah` AS `status_nikah`,`da`.`status_keluarga` AS `status_keluarga`,`da`.`nama_ayah` AS `nama_ayah`,`da`.`nama_ibu` AS `nama_ibu`,`da`.`alamat` AS `alamat`,`da`.`desa` AS `desa`,`da`.`rt` AS `rt`,`da`.`rw` AS `rw` from ((`data_warga` `da` left join `data_warga` `ds` on(((`ds`.`no_kk` = `da`.`no_kk`) and (`ds`.`status_keluarga` = 'Kepala Keluarga')))) left join `data_warga` `di` on(((`di`.`no_kk` = `da`.`no_kk`) and (`di`.`status_keluarga` = 'Istri')))) where (`da`.`status_keluarga` = 'Anak');

-- --------------------------------------------------------

--
-- Struktur untuk view `data_istri`
--
DROP TABLE IF EXISTS `data_istri`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_istri` AS select `dw`.`id` AS `id_suami`,`dt`.`id` AS `id`,`dt`.`nik` AS `nik`,`dt`.`nama` AS `nama`,`dt`.`no_kk` AS `no_kk`,`dt`.`jk` AS `jk`,`dt`.`tempat_lhr` AS `tempat_lhr`,`dt`.`tanggal_lhr` AS `tanggal_lhr`,`dt`.`gol_dar` AS `gol_dar`,`dt`.`kewarganegaraan` AS `kewarganegaraan`,`dt`.`agama` AS `agama`,`dt`.`pendidikan` AS `pendidikan`,`dt`.`pekerjaan` AS `pekerjaan`,`dt`.`status_nikah` AS `status_nikah`,`dt`.`status_keluarga` AS `status_keluarga`,`dt`.`nama_ayah` AS `nama_ayah`,`dt`.`nama_ibu` AS `nama_ibu`,`dt`.`alamat` AS `alamat`,`dt`.`desa` AS `desa`,`dt`.`rt` AS `rt`,`dt`.`rw` AS `rw` from (`data_warga` `dt` left join `data_warga` `dw` on(((`dt`.`no_kk` = `dw`.`no_kk`) and (`dw`.`status_keluarga` = 'Kepala Keluarga')))) where (`dt`.`status_keluarga` = 'Istri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_warga`
--
ALTER TABLE `data_warga`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `istri`
--
ALTER TABLE `istri`
 ADD PRIMARY KEY (`id_istri`);

--
-- Indexes for table `kelahiran`
--
ALTER TABLE `kelahiran`
 ADD PRIMARY KEY (`id_kelahiran`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
 ADD PRIMARY KEY (`id_kelurahan`);

--
-- Indexes for table `kematian`
--
ALTER TABLE `kematian`
 ADD PRIMARY KEY (`id_kematian`), ADD KEY `id` (`id`);

--
-- Indexes for table `pendatang`
--
ALTER TABLE `pendatang`
 ADD PRIMARY KEY (`id_pendatang`), ADD KEY `id` (`id`);

--
-- Indexes for table `pindah`
--
ALTER TABLE `pindah`
 ADD PRIMARY KEY (`id_pindah`);

--
-- Indexes for table `surat_keterangan`
--
ALTER TABLE `surat_keterangan`
 ADD PRIMARY KEY (`id_surat_keterangan`), ADD KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`), ADD KEY `id_kelurahan` (`id_kelurahan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
