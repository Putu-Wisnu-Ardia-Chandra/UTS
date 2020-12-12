-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2020 at 02:30 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desa_tianyar_barat`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `isi`) VALUES
(5, 'Laksanakan pilkada kabupaten karangasem : Warga desa tianyar barat antusias dalam pemilihan', 'Komisi Pemilihan Umum Kabupaten Karangasem yang bekerjasama dengan pemerintah Desa Tianyar Barat menyelenggarakan pemilu untuk memilih calon bupati Karangasem dengan kandidat pasangan nomor urut 1 yaitu I Gede Dana, S.Pd., M.Si. dan Dr. I Wayan Artha Dipa, S.H., M.H. dan pasangan nomor urut 2 yaitu I Gusti Ayu Mas Sumantri, S.Sos., M.A.P. dan I Made Sukerena, S.H. Pelaksanaan pemilihan umum digelar di beberapa pos pemilihan dangan tetap menerapkan protocol kesehatan untuk mencegah penyebaran COVID-19.');

-- --------------------------------------------------------

--
-- Table structure for table `data_login`
--

CREATE TABLE `data_login` (
  `id_login` int(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `psw` varchar(30) NOT NULL,
  `active` set('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_login`
--

INSERT INTO `data_login` (`id_login`, `email`, `psw`, `active`) VALUES
(3, 'hanosi@undiksha.ac.id', '123', 'Y'),
(4, 'evi@undiksha.ac.id', '123', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `krisan`
--

CREATE TABLE `krisan` (
  `id_krisan` int(11) NOT NULL,
  `nama` varchar(1000) NOT NULL,
  `kritik` varchar(1000) NOT NULL,
  `saran` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `krisan`
--

INSERT INTO `krisan` (`id_krisan`, `nama`, `kritik`, `saran`) VALUES
(1, 'Rudi', 'Yang koruptor itu tolong ditangkapin pak!', 'Yang merasa dirinya koruptor harap minggat saja!\r\nhehehehe'),
(3, 'Tabuti', 'Sama dengan yang diatas', 'Sarannya sama juga');

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id_masyarakat` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `nama_masyarakat` varchar(100) NOT NULL,
  `no_kk` varchar(25) NOT NULL,
  `id_pendidikan` int(11) NOT NULL,
  `id_pekerjaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`id_masyarakat`, `photo`, `nama_masyarakat`, `no_kk`, `id_pendidikan`, `id_pekerjaan`) VALUES
(2, 'binomo.jpg', 'Uzumaki Binomo', '10241041041', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(15) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `no_id` char(25) NOT NULL,
  `no_pegawai` varchar(25) NOT NULL,
  `id_spesialisasi` int(15) DEFAULT NULL,
  `id_pendidikan` int(15) DEFAULT NULL,
  `photo` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `no_id`, `no_pegawai`, `id_spesialisasi`, `id_pendidikan`, `photo`, `jenis_kelamin`) VALUES
(8, 'Sakura', '12031203', '031203201', 4, 2, '', 'Perempuan'),
(9, 'Uchiha Asep', '042034410', '341414', 3, 1, 'asep.png', 'Laki-Laki');

-- --------------------------------------------------------

--
-- Table structure for table `ref_pekerjaan`
--

CREATE TABLE `ref_pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ref_pekerjaan`
--

INSERT INTO `ref_pekerjaan` (`id_pekerjaan`, `pekerjaan`) VALUES
(1, 'PNS'),
(2, 'TNI/POLRI'),
(3, 'Pegawai Swasta'),
(4, 'Petani/Buruh/Nelayan'),
(5, 'Wirausaha'),
(6, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `ref_pendidikan`
--

CREATE TABLE `ref_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `pendidikan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_pendidikan`
--

INSERT INTO `ref_pendidikan` (`id_pendidikan`, `pendidikan`) VALUES
(1, 'S1'),
(2, 'S2'),
(3, 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `ref_spesialisasi`
--

CREATE TABLE `ref_spesialisasi` (
  `id_spesialisasi` int(11) NOT NULL,
  `nama_spesialisasi` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_spesialisasi`
--

INSERT INTO `ref_spesialisasi` (`id_spesialisasi`, `nama_spesialisasi`) VALUES
(1, 'Kepala Desa'),
(2, 'Sekretaris Desa'),
(3, 'Kepala Seksi Pemerintahan'),
(4, 'Kepala Seksi Kesejahteraan'),
(5, 'Kepala Seksi Pelayanan'),
(6, 'Kepala Urusan Tata Usaha dan Umum'),
(7, 'Kepala Urusan Keuangan'),
(8, 'Kepala Urusan Perencanaan'),
(9, 'Kepala Dusun'),
(10, 'Babinkabtibmas'),
(11, 'Babinsa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `data_login`
--
ALTER TABLE `data_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `krisan`
--
ALTER TABLE `krisan`
  ADD PRIMARY KEY (`id_krisan`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id_masyarakat`),
  ADD KEY `id_pendidikan` (`id_pendidikan`),
  ADD KEY `id_pekerjaan` (`id_pekerjaan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `fk_dokter_ref_spesialisasi1_idx` (`id_spesialisasi`),
  ADD KEY `fk_dokter_ref_pendidikan1_idx` (`id_pendidikan`);

--
-- Indexes for table `ref_pekerjaan`
--
ALTER TABLE `ref_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `ref_pendidikan`
--
ALTER TABLE `ref_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `ref_spesialisasi`
--
ALTER TABLE `ref_spesialisasi`
  ADD PRIMARY KEY (`id_spesialisasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_login`
--
ALTER TABLE `data_login`
  MODIFY `id_login` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `krisan`
--
ALTER TABLE `krisan`
  MODIFY `id_krisan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id_masyarakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ref_pekerjaan`
--
ALTER TABLE `ref_pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ref_pendidikan`
--
ALTER TABLE `ref_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ref_spesialisasi`
--
ALTER TABLE `ref_spesialisasi`
  MODIFY `id_spesialisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `fk_dokter_ref_pendidikan1` FOREIGN KEY (`id_pendidikan`) REFERENCES `ref_pendidikan` (`id_pendidikan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dokter_ref_spesialisasi1` FOREIGN KEY (`id_spesialisasi`) REFERENCES `ref_spesialisasi` (`id_spesialisasi`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
