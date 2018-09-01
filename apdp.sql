-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30 Agu 2018 pada 07.57
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
-- Struktur dari tabel `data_warga`
--

CREATE TABLE IF NOT EXISTS `data_warga` (
  `id` varchar(10) NOT NULL,
  `nik` bigint(16) unsigned zerofill DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `no_kk` bigint(16) unsigned zerofill DEFAULT NULL,
  `jk` enum('Laki - Laki','Perempuan') NOT NULL,
  `tempat_lhr` varchar(50) NOT NULL,
  `tanggal_lhr` date NOT NULL,
  `gol_dar` varchar(3) NOT NULL,
  `kewarganegaraan` enum('WNI','WNA') NOT NULL,
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
('ID001', 0123123123123123, 'Firsa Faruq Riyadi', 0123123123123123, 'Perempuan', 'Tasikmalaya', '0000-00-00', 'O', 'WNA', 'Islam', 'Diploma I/II', 'PNS', 'Kawin', 'Kepala Keluarga', 'Marsudi', 'Popong', 'Kawalu', 'Gunung Tandala', 002, 007),
('ID002', 0123123123123129, 'rere', 0123123123123123, 'Perempuan', 'Tasikmalaya', '0000-00-00', 'O', 'WNI', 'Islam', 'Diploma IV/Strata I', 'PNS', 'Kawin', 'Istri', 'Haryanto', 'Nurliah', 'Kawalu', 'Gunung Tandala', 002, 007);

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
  `tempat_dilahirkan` varchar(10) NOT NULL,
  `pukul_lahir` time NOT NULL,
  `jenis_kelahiran` varchar(10) NOT NULL,
  `kelahiran_ke` varchar(10) NOT NULL,
  `penolong` varchar(15) NOT NULL,
  `nama_penolong` varchar(50) NOT NULL,
  `berat_bayi` int(5) NOT NULL,
  `panjang_bayi` int(5) NOT NULL,
  `id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelahiran`
--

INSERT INTO `kelahiran` (`id_kelahiran`, `tempat_dilahirkan`, `pukul_lahir`, `jenis_kelahiran`, `kelahiran_ke`, `penolong`, `nama_penolong`, `berat_bayi`, `panjang_bayi`, `id`) VALUES
('ID001', 'PILIH TEMP', '00:00:00', 'PILIH JENI', '', 'PENOLONG KELAHI', '', 0, 0, 'ID001'),
('ID002', 'PILIH TEMP', '00:00:00', 'PILIH JENI', '', 'PENOLONG KELAHI', '', 0, 0, 'ID002');

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
('IDK001', 'Mati', '2018-08-30', '21:09:00', 'Sakit', 'ID002');

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
('IDP002', '0000-00-00', '', 'ID002');

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
('23/KE/08/18/0001', '2018-08-27', '08/25/2018 - 08/25/2018', 'sdfsdf', 'sad', 'sdfsdf', 'ID003'),
('23/KE/08/18/0002', '2018-08-25', '08/25/2018 - 08/25/2018', 'sdfsdf', 'hvh', 'SDFSDF', 'ID004'),
('23/KE/08/18/0003', '2018-08-30', '08/01/2018 - 08/01/2018', 'Berdasarakan surat pengantar', 'pembuatan skck', 'nama tersebut termasuk warga cilolohan berkelakuan baik', 'ID001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(10) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `level` enum('admin-kelurahan','admin-kecamatan') NOT NULL,
  `blokir` enum('N','Y') NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `user`, `pass`, `nama`, `level`, `blokir`, `no_hp`) VALUES
('USR001', 'adminkel', 'adminkel', 'Rellita Fikka Rahajeng', 'admin-kelurahan', 'N', '+6282217063800'),
('USR005', 'adminkec', 'adminkec', 'R Rita Merjanti', 'admin-kecamatan', 'N', '+6282217063801'),
('USR006', 'firsafaruq', 'firsafaruq', 'Firsa Faruq Riyadi', 'admin-kelurahan', 'N', '+6282217063803');

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
 ADD PRIMARY KEY (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
