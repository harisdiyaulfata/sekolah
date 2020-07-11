-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2017 at 05:18 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simsekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `ID_ABSENSI` int(11) NOT NULL,
  `STATUS_ABSENSI` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`ID_ABSENSI`, `STATUS_ABSENSI`) VALUES
(500, 'Hadir'),
(501, 'Izin'),
(502, 'Sakit'),
(503, 'Alfa');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_ADMIN` int(11) NOT NULL,
  `NAMA_ADMIN` varchar(50) DEFAULT NULL,
  `U_ADMIN` varchar(25) DEFAULT NULL,
  `P_ADMIN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `NAMA_ADMIN`, `U_ADMIN`, `P_ADMIN`) VALUES
(8000, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `d_absensi`
--

CREATE TABLE `d_absensi` (
  `ID_D_ABSENSI` int(11) NOT NULL,
  `ID_D_KELAS` int(11) NOT NULL,
  `ID_ABSENSI` int(11) NOT NULL,
  `TGL_D_ABSENSI` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `d_kelas`
--

CREATE TABLE `d_kelas` (
  `ID_D_KELAS` int(11) NOT NULL,
  `ID_KELAS` int(11) DEFAULT NULL,
  `NISN` varchar(11) DEFAULT NULL,
  `STATUS_KELAS` varchar(15) NOT NULL,
  `TAHUN_D_KELAS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d_kelas`
--

INSERT INTO `d_kelas` (`ID_D_KELAS`, `ID_KELAS`, `NISN`, `STATUS_KELAS`, `TAHUN_D_KELAS`) VALUES
(5279, 212, '26175378678', 'Aktif', 2017),
(5280, 211, '12839128639', 'Aktif', 2017),
(5281, 213, '58768789', 'Aktif', 2017),
(5282, 211, '868897897', 'Aktif', 2017),
(5283, 212, '3726738628', 'Aktif', 2017);

-- --------------------------------------------------------

--
-- Table structure for table `h_ujian`
--

CREATE TABLE `h_ujian` (
  `ID_D_KELAS` int(11) NOT NULL,
  `ID_SOAL` int(11) NOT NULL,
  `NILAI_H_UJIAN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `ID_KELAS` int(11) NOT NULL,
  `KELAS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`ID_KELAS`, `KELAS`) VALUES
(211, 'X'),
(212, 'XI'),
(213, 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `ID_MAPEL` int(11) NOT NULL,
  `NAMA_MAPEL` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`ID_MAPEL`, `NAMA_MAPEL`) VALUES
(400, 'B. Indonesia'),
(401, 'B. inggris'),
(402, 'Matematika'),
(403, 'Agama'),
(404, 'Olahraga'),
(405, 'TIK'),
(406, 'Fisika'),
(407, 'Biologi'),
(408, 'Kimia'),
(409, 'Geografi'),
(410, 'Sosiologi'),
(411, 'Ekonomi'),
(412, 'Sejarah'),
(413, 'PKN'),
(414, 'Seni dan Budaya');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `NISN` varchar(11) NOT NULL,
  `NAMA_SISWA` varchar(50) DEFAULT NULL,
  `JENIS_KELAMIN` varchar(10) DEFAULT NULL,
  `AGAMA_SISWA` varchar(10) DEFAULT NULL,
  `ALAMAT_SISWA` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `STATUS_SISWA` varchar(15) DEFAULT NULL,
  `NAMA_AYAH` varchar(50) DEFAULT NULL,
  `NAMA_IBU` varchar(50) DEFAULT NULL,
  `ALAMAT_ORTU` varchar(100) DEFAULT NULL,
  `PEKERJAAN_AYAH` varchar(20) DEFAULT NULL,
  `PEKERJAAN_IBU` varchar(20) DEFAULT NULL,
  `TLP_AYAH` int(11) DEFAULT NULL,
  `TLP_IBU` int(11) DEFAULT NULL,
  `NAMA_WALI` varchar(50) DEFAULT NULL,
  `ALAMAT_WALI` varchar(100) DEFAULT NULL,
  `PEKERJAAN_WALI` varchar(20) DEFAULT NULL,
  `TLP_WALI` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`NISN`, `NAMA_SISWA`, `JENIS_KELAMIN`, `AGAMA_SISWA`, `ALAMAT_SISWA`, `PASSWORD`, `STATUS_SISWA`, `NAMA_AYAH`, `NAMA_IBU`, `ALAMAT_ORTU`, `PEKERJAAN_AYAH`, `PEKERJAAN_IBU`, `TLP_AYAH`, `TLP_IBU`, `NAMA_WALI`, `ALAMAT_WALI`, `PEKERJAAN_WALI`, `TLP_WALI`) VALUES
('12839128639', 'teo', 'Laki-laki', 'Islam', 'iqwuqwr', '25d55ad283aa400af464c76d713c07ad', 'Aktif', 'qwr', 'qwr', 'qwrafqf', 'qwrqr', 'qwrqw', 1297023, 112918221, 'qwrasf', 'aeqeqf', 'etqfq', 12123134),
('26175378678', 'Yoga', 'Laki-laki', 'Islam', 'nbnksbnmb', '25d55ad283aa400af464c76d713c07ad', 'Aktif', 'dsjkhdjkshjk', 'hghjgjh', 'gjhhgjh', 'gjhghjkh', 'jhkhk', 98908, 8908, 'jkjhkjh', 'bkjbkjnb', 'm,n,mn,', 988080),
('3726738628', 'Agus Hermanto', 'Laki-laki', 'Islam', 'Dsn. Jeret Maleng Kec. Sepulu Kab. Bangkalan Madur', '25d55ad283aa400af464c76d713c07ad', 'Aktif', 'jadhjakhd', 'hjkhjkhkjh', 'hkjhkjhjkh', 'jdkhskajahdkj', 'hkjhkjhkjh', 2147483647, 987897897, 'ajhdjkahdjkhkjh', 'hjkhkjhkjhjkhjk', 'hjkhjhkjh', 2147483647),
('58768789', 'Haris', 'Perempuan', 'lain-lain', 'jhjihjh uyuiiuhi', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', '', '', '', '', 0, 0, '', '', '', 0),
('868897897', 'baib', 'Laki-laki', 'Kristen', 'knlkjl', '25d55ad283aa400af464c76d713c07ad', 'Aktif', '', '', '', '', '', 0, 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `ID_SOAL` int(11) NOT NULL,
  `ID_TPUJIAN` int(11) DEFAULT NULL,
  `ID_MAPEL` int(11) DEFAULT NULL,
  `ID_KELAS` int(11) DEFAULT NULL,
  `SOAL` varchar(50) DEFAULT NULL,
  `PLH1` varchar(50) DEFAULT NULL,
  `PLH2` varchar(50) DEFAULT NULL,
  `PLH3` varchar(50) DEFAULT NULL,
  `PLH4` varchar(50) DEFAULT NULL,
  `JWB` varchar(50) DEFAULT NULL,
  `TGL_SOAL` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`ID_SOAL`, `ID_TPUJIAN`, `ID_MAPEL`, `ID_KELAS`, `SOAL`, `PLH1`, `PLH2`, `PLH3`, `PLH4`, `JWB`, `TGL_SOAL`) VALUES
(999379, 311, 414, 211, 'asdfggfgddfg', 'asdsfdsfds', 'sgeddgdfrgser', 'swrgswgswregdrg', 'swrgrgerger', 'a', '2017-02-09'),
(999380, 311, 413, 211, 'Manusia selalu memiliki keinginan dan dorongan unt', 'Makhluk individualis', ' Makhluk monodualistik', 'Makhluk sosial', 'Homo sapien', 'Makhluk sosial', '2017-02-13'),
(999381, 311, 413, 211, 'Manusia sebagai makhluk tuhan yang paling sempurna', 'Materi dan hidup', 'Akal budi, insting/naluri dan materi', ' Materi, akal budi, hidup dan naluri', 'Hidup, akal budi, materi', ' Materi, akal budi, hidup dan naluri', '2017-02-13'),
(999382, 311, 413, 211, 'Secara harfiah istilah Zoon Politicon berarti...', 'Terdiri atas jasmani dan rohani', 'Sebagai makhluk pribadi dan sosial', ' Tidak bisa hhidup sendiri tanpa bantuan orang lai', 'Bisa menyesuaikan dengan makhluk lain', ' Tidak bisa hhidup sendiri tanpa bantuan orang lai', '2017-02-13'),
(999383, 311, 413, 211, ' Sekelompok manusia yang berada dalam suatu ikatan', 'Aristoteles', 'Karl Renan', 'Hans Kohn', 'Ernest Renan', 'Ernest Renan', '2017-02-13'),
(999384, 311, 413, 211, 'Berikut ini yang bukan unsur pembentuk bangsa adal', 'persamaan nasib', 'persamaan karakter', 'persamaan fisik', 'persamaan agama', 'persamaan agama', '2017-02-13'),
(999385, 311, 413, 211, '  Peristiwa terjadinya sumpah pemuda yaitu pada ta', '27 Oktober 1928', '28 Oktober 1928', '29 Oktober 1928', ' 30 Oktober 1928', '28 Oktober 1928', '2017-02-13'),
(999386, 311, 413, 211, 'de’ staat adalah  istilah negara dari bahasa...', 'Belanda', 'Perancis', 'Yunani', '  Inggris', 'Belanda', '2017-02-13'),
(999387, 311, 413, 211, 'Semua orang yang berdiam di suatu negara atau menj', 'Warga negara ', '  Rakyat', 'Masyarakal', ' Penduduk', '  Rakyat', '2017-02-13'),
(999388, 311, 413, 211, 'Pengakuan komunitas internasional bahwa suatu nega', 'de facto', 'de tente', 'de jure', 'de droit', 'de facto', '2017-02-13'),
(999389, 311, 413, 211, 'Berikut ini adalah negara yang terjadi secara spar', 'Amerika', ' Indonesia', 'Malaysia', 'Timor timur', 'Timor timur', '2017-02-13'),
(999390, 312, 412, 211, 'Ciri kha dari zaman mesozoikum adalah …', 'Kehidupannya didominasi oleh kehidupan reptil-rept', 'Mulai muncul kehidupan manusia yang berjalan tegak', 'Mulai maraknya kehidupan binatang-binatang mamalia', 'Belum menunjukan adanya tanda-tanda kehidupan', 'Mulai maraknya kehidupan binatang-binatang mamalia', '2017-02-13'),
(999391, 312, 412, 211, ' Perkembangan kehidupan jenis kera terjadi pada za', 'Kuatiar', 'Pleistosen', 'Tersier', 'Paleozoikum', 'Tersier', '2017-02-13'),
(999392, 312, 412, 211, 'Peralatan yang ditemukan pada budaya pacitan adala', 'Kapak bulat', 'Kapak perimbas', 'Kapak lengkung', 'Kapak persegi', 'Kapak perimbas', '2017-02-13'),
(999393, 312, 412, 211, 'Proses munculnya masyarakat paling awal di Kepulau', 'Mesozoikum', 'Neolithikum', 'Palaeolithikum', 'Megalithikum', 'Palaeolithikum', '2017-02-13'),
(999394, 312, 412, 211, 'Pada zaman batu tua, masyarakatnya hidup dengan po', 'Berburu', 'Bercocok tanam', 'Bertani', 'Nomaden', 'Nomaden', '2017-02-13'),
(999395, 312, 412, 211, 'Pithecanthropus atau manusia kera memiliki volume ', '800 cc', '900 cc', '1000 cc', '1100 cc', '900 cc', '2017-02-13'),
(999396, 312, 412, 211, 'Pada tahun 1941 Von Koenigwald mengadakan penggali', 'Pithecanthropus Erectus', ' Meganthropus Paleojavanicus', 'Homo Soloensis', 'Homo mojokertensis', ' Meganthropus Paleojavanicus', '2017-02-13'),
(999397, 312, 412, 211, 'Jenis manusia purba yang sudah lebih maju karena s', 'Homo soloensis', 'Homo mojokertensis', 'Homo wajakensis', 'Homo Sapiensis', 'Homo Sapiensis', '2017-02-13'),
(999398, 312, 412, 211, 'Perhatikan data dibawah ini!\r\n1.      Zaman Logam\r', '1, 2, 3, 4, dan 5', '3, 2, 5, 4, dan 1', '2, 3, 4, 1 dan 5', '1, 3, 2, 5, dan 4', '3, 2, 5, 4, dan 1', '2017-02-13'),
(999399, 312, 412, 211, 'Salah satu ciri khas kebudayaan pada zaman Batu Te', 'Abris sous roche', 'Kjokkenmoddinger', 'Hache courte', 'Chalcedon', 'Kjokkenmoddinger', '2017-02-13'),
(999400, 312, 412, 211, ' Menhir, punden berundak dan arca-arcaa statis mer', 'Megalithik Tua', 'Megalithik Muda', 'Paleolithikum', 'Neolithikum', 'Megalithik Tua', '2017-02-13'),
(999401, 312, 412, 211, 'Teknik pembuatan alat-alat dari logam yang disebut', 'Alat celup', 'Cetakan lilin', 'Cetakan baker', ' Tanah liat', 'Cetakan lilin', '2017-02-13'),
(999402, 312, 412, 211, 'Kapak corong kecil yang dibuat secara halus dan be', 'Obsidian', 'Medallion', 'Candrasa', 'Binggel', 'Candrasa', '2017-02-13'),
(999403, 312, 412, 211, ' Masa peralihan dari kehidupan berburu ke masa ber', 'Mesolithikum', 'Paleolithikum', 'Neothikum', 'Megalithikum', 'Mesolithikum', '2017-02-13'),
(999404, 312, 412, 211, 'Seorang pemimpin masyarakat masa purba yang dipili', 'Primus yustisius', 'Primus internals', 'Primus interpares', 'Primus Uranus', 'Primus interpares', '2017-02-13'),
(999405, 312, 412, 211, 'Perhatikan data di bawah ini!\r\n1.      Beternak\r\n2', '1, 2, dan 3', '1, 3, dan 4', '1, 3, dan 5', '2, 3, dan 5', '2, 3, dan 5', '2017-02-13'),
(999406, 312, 412, 211, 'Berdasarkan penelitian arkeologinya pada lapisan P', 'Pithecanthropus Erectus', 'Pithecanthropus Robustus', 'Homo Soloensis', 'Homo Mojokertensis', 'Homo Soloensis', '2017-02-13'),
(999407, 312, 412, 211, 'Puncak perkembangan system kepercayaan masyarakat ', 'Paleolithikum', 'Mesolthikum', 'Megalithikum', 'Neolithikum', 'Megalithikum', '2017-02-13'),
(999408, 312, 412, 211, 'Pernyataan yang tepat mengenai masa bercocok tanam', 'Manusia purba pada masa bercocok tanam sudah mulai', 'Kehidupan mereka sepenuhnya tergantung pada alam', '  Peraalatan yang mereka gunakan masih terbuat dar', ' Cara hidupnya nomaden', 'Manusia purba pada masa bercocok tanam sudah mulai', '2017-02-13'),
(999409, 312, 412, 211, 'Yang terkenal sebagai tempat tinggal awal masyarak', 'Abris sous rache', ' Rumah panggung', 'Flakes culture', 'Bone culture', 'Abris sous rache', '2017-02-13'),
(999410, 312, 412, 211, 'Bangsa Proto Melayu masuk ke Indonesia membawa keb', 'Kapak persegi dan kapak perimbas', 'Kapak persegi dan kapak lonjong', 'Kapak perssegi dan kapak genggam', 'Kapak perunggu dan kapak corong', 'Kapak persegi dan kapak lonjong', '2017-02-13'),
(999411, 312, 412, 211, 'Kebudayaan yang dibawa oleh bangsa Proto Melayu ke', 'Neolithikum', 'Megolithikum', 'Mesolithikum', 'Mesozoikum', 'Neolithikum', '2017-02-13'),
(999412, 312, 412, 211, 'Bangsa luar yang mendatangi Indonesia pada gelomba', ' Deutro Melayu', 'Indonesia Melanesoid', 'Proto Melayu', 'Weddoid', ' Deutro Melayu', '2017-02-13'),
(999413, 312, 412, 211, 'Bangsa Deutro Melayu dating ke Indonesia, ketika I', 'Batu Tua', 'Logam', 'Batu Muda', 'Batu Besar', 'Logam', '2017-02-13'),
(999414, 312, 412, 211, 'Di bawah ini yang bukan ilmu pengetahuan yang dimi', '  Angin', 'Musim', 'Kompas', 'Laut', 'Kompas', '2017-02-13'),
(999415, 312, 412, 211, 'Teori yang mendukung keberadaan masyarakat awal di', 'Teori Migrasi', 'Teori Imigrasi', 'Teori Emigrasi', 'Teori Urbanisasi', 'Teori Imigrasi', '2017-02-13'),
(999416, 312, 412, 211, 'Yang menjadi dasar Van Heine Geldern mengatakan ba', 'Penemuan artefak', ' Penggunaan perahu bercadik', ' Penemuan fosil', 'Akibat penemuan daerah dalam pengembangannya', 'Penemuan artefak', '2017-02-13'),
(999417, 312, 412, 211, ' Bangsa Austronesia yang berasal dari Asia Tenggar', ' Melayu Austronesia', ' Hindia Austronesia', ' Indo Austronesia', 'Wedoid', ' Melayu Austronesia', '2017-02-13'),
(999418, 312, 412, 211, 'Jenis alat transportasi yang dominan dipakai untuk', 'Kapal laut', 'Perahu layar ganda', 'Perahu layar Satu', 'perahu bercadik', 'perahu bercadik', '2017-02-13'),
(999419, 312, 412, 211, 'Budaya perunggu pada zaman logam di Indonesia mend', 'Kamboja', 'Vietnam', 'Myanmar', 'Bima', 'Vietnam', '2017-02-13'),
(999420, 312, 412, 211, 'Gelombang perpindahan nenek moyang bangsa Indonesi', 'Satu kali', ' Dua kali', 'Tiga kali', ' Lima kali', ' Dua kali', '2017-02-13'),
(999421, 312, 412, 211, 'Gelombang perpindahan nenek moyang bangsa Indonesi', 'Kern', 'Van Hekkeren', 'Von Heine Geldern', 'Muhamad Yamin', 'Von Heine Geldern', '2017-02-13'),
(999422, 312, 412, 211, 'Gelombang pertama kedatangan nenek moyang bangsa I', '1500-500 SM', ' 2000-15000 SM', '1100-500 SM', ' 500-250 SM', '1500-500 SM', '2017-02-13'),
(999423, 312, 412, 211, 'Perhatikan nama-nama suku di bawah ini!\r\n1.      S', '1, 2, 3', '1, 2, 4', '1, 2, 5', '1, 3, 5', '1, 3, 5', '2017-02-13'),
(999424, 312, 412, 211, 'Bangsa Proto Melayu dan Deuntro Melayu termasuk da', 'Australoid', 'Kaukasoid', 'Negroid', 'Melayu Mongoloid', 'Melayu Mongoloid', '2017-02-13'),
(999425, 312, 412, 211, ' Asal bangsa yang bermigrasi ke Indonesia adalah …', ' Indochina', 'Vietnam', 'Jepang', 'Yunan', 'Yunan', '2017-02-13'),
(999426, 312, 412, 211, 'Ras bangsa yang melakukan migrasi ke Indonesia tah', 'Melayu Mongoloid', 'Austronesia', 'Deutro Melayu', '  Proto Melayu', 'Melayu Mongoloid', '2017-02-13'),
(999427, 312, 412, 211, 'Kebudayaan Neolithikum masuk ke Indonesia dibawa l', ' Proto Melayu', 'Papua Melanesoid', 'Ras weddid', 'Deuteron Melayu', ' Proto Melayu', '2017-02-13'),
(999428, 312, 412, 211, 'Suku bangsa di Indonesia yang menjadi keturunan ba', 'Minang, Jawa, dan Bugis', ' Papua, Batak, dan Dayak', 'Kubu, Mentawai, dan Toba', 'Sunda, Dayak, dan Minang', 'Minang, Jawa, dan Bugis', '2017-02-13'),
(999429, 312, 412, 211, 'Masuknya bangsa luar ke Indonesia dengan membawa k', 'Disintegrasi kebudayaan', ' Asimilasi kebudayaan', 'Akulturasi kebudayaan', 'Migrasi kebudayaan', 'Akulturasi kebudayaan', '2017-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `tpujian`
--

CREATE TABLE `tpujian` (
  `ID_TPUJIAN` int(11) NOT NULL,
  `NAMA_TPUJIAN` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tpujian`
--

INSERT INTO `tpujian` (`ID_TPUJIAN`, `NAMA_TPUJIAN`) VALUES
(311, 'UTS'),
(312, 'UAS'),
(313, 'SPSB');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`ID_ABSENSI`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`);

--
-- Indexes for table `d_absensi`
--
ALTER TABLE `d_absensi`
  ADD PRIMARY KEY (`ID_D_ABSENSI`),
  ADD KEY `FK_D_KELAS_RELATIONS_D_KELAS` (`ID_D_KELAS`),
  ADD KEY `FK_D_KELAS_RELATIONS_ABSENSI` (`ID_ABSENSI`);

--
-- Indexes for table `d_kelas`
--
ALTER TABLE `d_kelas`
  ADD PRIMARY KEY (`ID_D_KELAS`),
  ADD KEY `FK_D_KELAS_RELATIONS_SISWA` (`NISN`),
  ADD KEY `FK_D_KELAS_RELATIONS_KELAS` (`ID_KELAS`);

--
-- Indexes for table `h_ujian`
--
ALTER TABLE `h_ujian`
  ADD PRIMARY KEY (`ID_D_KELAS`,`ID_SOAL`),
  ADD KEY `FK_H_UJIAN_RELATIONS_SOAL` (`ID_SOAL`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`ID_KELAS`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`ID_MAPEL`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`NISN`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`ID_SOAL`),
  ADD KEY `FK_SOAL_RELATIONS_TPUJIAN` (`ID_TPUJIAN`),
  ADD KEY `FK_SOAL_RELATIONS_MAPEL` (`ID_MAPEL`),
  ADD KEY `FK_SOAL_RELATIONS_KELAS` (`ID_KELAS`);

--
-- Indexes for table `tpujian`
--
ALTER TABLE `tpujian`
  ADD PRIMARY KEY (`ID_TPUJIAN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `d_absensi`
--
ALTER TABLE `d_absensi`
  MODIFY `ID_D_ABSENSI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `d_absensi`
--
ALTER TABLE `d_absensi`
  ADD CONSTRAINT `FK_D_ABSENS_RELATIONS_ABSENSI` FOREIGN KEY (`ID_ABSENSI`) REFERENCES `absensi` (`ID_ABSENSI`),
  ADD CONSTRAINT `FK_D_ABSENS_RELATIONS_D_KELAS` FOREIGN KEY (`ID_D_KELAS`) REFERENCES `d_kelas` (`ID_D_KELAS`);

--
-- Constraints for table `d_kelas`
--
ALTER TABLE `d_kelas`
  ADD CONSTRAINT `FK_D_KELAS_RELATIONS_KELAS` FOREIGN KEY (`ID_KELAS`) REFERENCES `kelas` (`ID_KELAS`),
  ADD CONSTRAINT `FK_D_KELAS_RELATIONS_SISWA` FOREIGN KEY (`NISN`) REFERENCES `siswa` (`NISN`);

--
-- Constraints for table `h_ujian`
--
ALTER TABLE `h_ujian`
  ADD CONSTRAINT `FK_H_UJIAN_RELATIONS_D_KELAS` FOREIGN KEY (`ID_D_KELAS`) REFERENCES `d_kelas` (`ID_D_KELAS`),
  ADD CONSTRAINT `FK_H_UJIAN_RELATIONS_SOAL` FOREIGN KEY (`ID_SOAL`) REFERENCES `soal` (`ID_SOAL`);

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `FK_SOAL_RELATIONS_KELAS` FOREIGN KEY (`ID_KELAS`) REFERENCES `kelas` (`ID_KELAS`),
  ADD CONSTRAINT `FK_SOAL_RELATIONS_MAPEL` FOREIGN KEY (`ID_MAPEL`) REFERENCES `mapel` (`ID_MAPEL`),
  ADD CONSTRAINT `FK_SOAL_RELATIONS_TPUJIAN` FOREIGN KEY (`ID_TPUJIAN`) REFERENCES `tpujian` (`ID_TPUJIAN`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
