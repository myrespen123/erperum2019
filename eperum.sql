-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2019 at 07:35 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eperum`
--

-- --------------------------------------------------------

--
-- Table structure for table `bangunan`
--

CREATE TABLE `bangunan` (
  `id_bangunan` int(11) NOT NULL,
  `id_pengembang` int(11) DEFAULT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `kategori_bangunan` varchar(100) NOT NULL,
  `nama_bangunan` varchar(100) NOT NULL,
  `deskripsi_bangunan` text NOT NULL,
  `harga_bangunan` int(11) NOT NULL,
  `lokasi_bangunan` text NOT NULL,
  `luas_bangunan` int(11) NOT NULL,
  `luas_tanah` int(11) NOT NULL,
  `jumlah_lantai` varchar(20) NOT NULL,
  `jumlah_kamar` varchar(20) NOT NULL,
  `jumlah_kamar_mandi` varchar(20) NOT NULL,
  `jumlah_garasi` varchar(10) NOT NULL,
  `listrik` varchar(20) NOT NULL,
  `longitude` varchar(200) NOT NULL,
  `latitude` varchar(200) NOT NULL,
  `sertifikat` text NOT NULL,
  `status_publish` varchar(10) NOT NULL,
  `bangunan_slug` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bangunan`
--

INSERT INTO `bangunan` (`id_bangunan`, `id_pengembang`, `id_kecamatan`, `id_kelurahan`, `kategori_bangunan`, `nama_bangunan`, `deskripsi_bangunan`, `harga_bangunan`, `lokasi_bangunan`, `luas_bangunan`, `luas_tanah`, `jumlah_lantai`, `jumlah_kamar`, `jumlah_kamar_mandi`, `jumlah_garasi`, `listrik`, `longitude`, `latitude`, `sertifikat`, `status_publish`, `bangunan_slug`) VALUES
(1, 7, 6, 16, '1', 'Rumah With Kecamatan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 450000000, 'Jalan Kadrie Onenge No. 999', 300, 300, '3', '5', '5', '2', '2100', '', '', 'Screenshot_(144).png', '1', 'rumah-with'),
(2, 7, 6, 14, '1', 'Rumah with Keluarahan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 210000000, 'Pelabuhan Samarinda', 500, 500, '2', '3', '2', '1', '900', '', '', 'PERSYARATAN_DAN_KETENTUAN_LOMBA.pdf', '1', 'rumah-kel'),
(4, 7, 9, 40, '1', 'Nice House With Good Material', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 540000000, 'Jalan Terluk lerong', 700, 500, '2', '5', '3', '1', '2100', '', '', 'PERSYARATAN_DAN_KETENTUAN_LOMBA2.pdf', '1', 'nice-house'),
(5, 7, 5, 6, '1', 'rumah 2018', 'deksiprsi', 450000000, 'sungai keledang', 36, 100, '2', '4', '2', '1', '900', '117.10357629858322', '-0.488253224627087', 'PERSYARATAN_DAN_KETENTUAN_LOMBA3.pdf', '1', 'rumah-2018'),
(10, 7, 2, 3, '1', 'Perumahan Perumahan', 'preg_replace(\'~[^\\\\pL\\d]+~u\', \'-\', $text);preg_replace(\'~[^\\\\pL\\d]+~u\', \'-\', $text);preg_replace(\'~[^\\\\pL\\d]+~u\', \'-\', $text);preg_replace(\'~[^\\\\pL\\d]+~u\', \'-\', $text);preg_replace(\'~[^\\\\pL\\d]+~u\', \'-\', $text);preg_replace(\'~[^\\\\pL\\d]+~u\', \'-\', $text);preg_replace(\'~[^\\\\pL\\d]+~u\', \'-\', $text);preg_replace(\'~[^\\\\pL\\d]+~u\', \'-\', $text);', 990000000, 'preg_replace(\'~[^\\\\pL\\d]+~u\', \'-\', $text);', 90, 100, '2', '4', '2', '1', '900', '117.13969977551619', '-0.4903661509407442', 'background_website_perumahan1.png', '1', 'perumahan-perumahan'),
(13, 7, 9, 39, '1', 'perumahan murah1', 'deskripsi', 150000000, 'perumahan gawl', 80, 100, '4', '2', '2', '1', '900', '117.13781414000005', '-0.49807364609655735', 'automation.png', '1', 'perumahan-murah');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `id_bangunan` int(11) NOT NULL,
  `nama_fasilitas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `id_bangunan`, `nama_fasilitas`) VALUES
(1, 1, 'fasilitas'),
(2, 1, 'fasilitas2'),
(3, 1, 'fasilitas3'),
(4, 2, 'atm'),
(6, 4, 'keamanan 24 jam'),
(7, 5, 'fasilitas2'),
(8, 5, 'fasilitas3'),
(16, 10, 'Kolam Renang'),
(17, 10, 'Puskesmas'),
(20, 13, 'jembatan');

-- --------------------------------------------------------

--
-- Table structure for table `foto_bangunan`
--

CREATE TABLE `foto_bangunan` (
  `id_foto_bangunan` int(11) NOT NULL,
  `id_bangunan` int(11) NOT NULL,
  `foto_bangunan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto_bangunan`
--

INSERT INTO `foto_bangunan` (`id_foto_bangunan`, `id_bangunan`, `foto_bangunan`) VALUES
(1, 1, 'Screenshot_(1).png'),
(2, 1, 'Screenshot_(3).png'),
(6, 4, 'Screenshot_(85).png'),
(22, 2, 'rumah.jpg'),
(23, 2, 'rumah2.jpg'),
(24, 10, 'rumah1.jpg'),
(25, 5, 'rumah21.jpg'),
(26, 2, 'november_2017.jpg'),
(27, 2, 'home_slider_1.jpg'),
(28, 13, 'rumah22.jpg'),
(29, 13, 'rumah4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `nama_kecamatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
(1, 'Loa Janan Ilir'),
(2, 'Palaran'),
(3, 'Samarinda Ilir'),
(4, 'Samarinda Kota'),
(5, 'Samarinda Seberang'),
(6, 'Samarinda Ulu'),
(7, 'Samarinda Utara'),
(8, 'Sambutan'),
(9, 'Sungai Kunjang'),
(10, 'Sungai Pinang');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kelurahan` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `nama_kelurahan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `id_kecamatan`, `nama_kelurahan`) VALUES
(1, 2, 'Rawa Makmur'),
(2, 2, 'Handil Bakti'),
(3, 2, 'Bukuan'),
(4, 2, 'Simpang Pasir'),
(5, 2, 'Bantuas'),
(6, 5, 'Sungai Keledang'),
(7, 5, 'Baqa'),
(8, 5, 'Mesjid'),
(9, 5, 'Mangkupalas'),
(10, 5, 'Tenun'),
(11, 5, 'Gunung Panjang'),
(12, 6, 'Teluk Lerong Ilir'),
(13, 6, 'Jawa'),
(14, 6, 'Air Putih'),
(15, 6, 'Sidodadi'),
(16, 6, 'Air Hitam'),
(17, 6, 'Dadi Mulya'),
(18, 6, 'Gunung Kelua'),
(19, 6, 'Bukit Pinang'),
(20, 3, 'Selili'),
(21, 3, 'Sungai Dama'),
(24, 3, 'Sidomulyo'),
(25, 3, 'Sidodamai'),
(26, 3, 'Pelita'),
(27, 7, 'Sempaja Selatan'),
(29, 7, 'Lempake'),
(30, 7, 'Sungai Siring'),
(31, 7, 'Sempaja Utara'),
(32, 7, 'Tanah Merah'),
(33, 7, 'Sempaja Barat'),
(34, 7, 'Sempaja Timur'),
(35, 7, 'Budaya Pampang'),
(36, 9, 'Loa Bakung'),
(37, 9, 'Loa Buah'),
(38, 9, 'Karang Asam Ulu'),
(39, 9, 'Lok Bahu'),
(40, 9, 'Teluk Lerong Ulu'),
(41, 9, 'Karang Asam Ilir'),
(42, 9, 'Karang Anyar'),
(43, 8, 'Sungai Kapih'),
(44, 8, 'Sambutan'),
(45, 8, 'Makroman'),
(46, 8, 'Sindang Sari'),
(47, 8, 'Pulau Atas'),
(48, 10, 'Temindung Permai'),
(49, 10, 'Sungai Pinang Dalam'),
(50, 10, 'Gunung Lingai'),
(51, 10, 'Mugirejo'),
(52, 10, 'Bandara'),
(53, 4, 'Karang Mumus'),
(54, 4, 'Pelabuhan'),
(55, 4, 'Pasar Pagi'),
(56, 4, 'Bugis'),
(57, 4, 'Sungai Pinang Luar'),
(58, 1, 'Simpang Tiga'),
(59, 1, 'Tani Aman'),
(60, 1, 'Sengkotek'),
(61, 1, 'Harapan Baru'),
(62, 1, 'Rapak Dalam');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `kontak_nama` text NOT NULL,
  `kontak_telepon` text NOT NULL,
  `kontak_pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `kontak_nama`, `kontak_telepon`, `kontak_pesan`) VALUES
(2, 'iqbal wahyudi2', '082352260345', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod'),
(3, 'iqbal wahyudi', '082352260345', 'pesan pesan'),
(4, 'iqbal wahyudi', '0823542222341', 'ini pesanssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss');

-- --------------------------------------------------------

--
-- Table structure for table `main_bg`
--

CREATE TABLE `main_bg` (
  `id_main_bg` int(11) NOT NULL,
  `judul` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_bg`
--

INSERT INTO `main_bg` (`id_main_bg`, `judul`, `foto`) VALUES
(1, 'header', 'home_slider_1.jpg'),
(2, 'middle', 'Backgrounds_web_transparan1.jpg'),
(3, 'footer', 'background_line_art.png');

-- --------------------------------------------------------

--
-- Table structure for table `main_info`
--

CREATE TABLE `main_info` (
  `id_main_info` int(11) NOT NULL,
  `judul` text NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` text NOT NULL,
  `level_info` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_info`
--

INSERT INTO `main_info` (`id_main_info`, `judul`, `deskripsi`, `foto`, `level_info`) VALUES
(1, 'Info Satu', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo1', 'alien.png', 1),
(2, 'Info Dua', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo2', 'info-dua.png', 1),
(3, 'Info Tiga', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo3', 'info-tiga.png', 1),
(4, 'Tentang Kami1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo1\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo1', 'pplwapple.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id_masyarakat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `umur` int(3) NOT NULL,
  `status_penduduk` varchar(20) NOT NULL,
  `pekerjaan` varchar(200) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengembang`
--

CREATE TABLE `pengembang` (
  `id_pengembang` int(11) NOT NULL,
  `nik_pengembang` varchar(20) NOT NULL,
  `nama_pengembang` varchar(100) NOT NULL,
  `telepon_pengembang` varchar(15) NOT NULL,
  `email_pengembang` varchar(100) NOT NULL,
  `alamat_pengembang` text NOT NULL,
  `foto_pengembang` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengembang`
--

INSERT INTO `pengembang` (`id_pengembang`, `nik_pengembang`, `nama_pengembang`, `telepon_pengembang`, `email_pengembang`, `alamat_pengembang`, `foto_pengembang`, `id_user`) VALUES
(6, '01283981028', 'nama', '0823123121', 'emaaail@email.com1', 'jalan alamat1', 'logo-stmik.jpg', 16),
(7, '6473839303183785', 'Iqbal wahyudi1', '082352260345', 'iqbal.wahyudi_25@gmail.com', 'jalan m.said', 'auth-img.jpg', 17),
(8, '6472939181281823', 'Charlotte Von Einsbern', '08235227182', 'email@email.com', 'jalan alamat', 'Screenshot_(4).png', 19);

-- --------------------------------------------------------

--
-- Table structure for table `perumahan`
--

CREATE TABLE `perumahan` (
  `id_perumahan` int(11) NOT NULL,
  `id_pengembang` int(11) NOT NULL,
  `nama_perumahan` varchar(200) NOT NULL,
  `lokasi` text NOT NULL,
  `longitude` varchar(200) NOT NULL,
  `latitude` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sarana_prasarana`
--

CREATE TABLE `sarana_prasarana` (
  `id_sarana_prasarana` int(11) NOT NULL,
  `id_bangunan` int(11) NOT NULL,
  `nama_sarana_prasarana` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sarana_prasarana`
--

INSERT INTO `sarana_prasarana` (`id_sarana_prasarana`, `id_bangunan`, `nama_sarana_prasarana`) VALUES
(1, 1, 'sarana'),
(2, 1, 'sarana2'),
(3, 2, 'keamanan 24 jam'),
(5, 4, 'keamanan 24 jam'),
(6, 5, 'sarna1'),
(7, 5, 'sarna2'),
(8, 1, 'saran3'),
(17, 10, 'Lapangan Bola'),
(18, 10, 'Tempat Parkir Umum'),
(21, 13, 'lapangan'),
(22, 13, 'parkiran umum');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(11) NOT NULL,
  `nama_website` varchar(255) NOT NULL,
  `deskripsi_website` text NOT NULL,
  `slogan_setting` text NOT NULL,
  `alamat_setting` text NOT NULL,
  `telepon_setting` varchar(50) NOT NULL,
  `email_setting` varchar(200) NOT NULL,
  `jam_setting` text NOT NULL,
  `copyright` varchar(200) NOT NULL,
  `embed_gmap` text NOT NULL,
  `logo_setting` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `nama_website`, `deskripsi_website`, `slogan_setting`, `alamat_setting`, `telepon_setting`, `email_setting`, `jam_setting`, `copyright`, `embed_gmap`, `logo_setting`) VALUES
(1, 'E-Perumahan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo1', 'CARI RUMAH LEGAL IMPIANMU1', 'Jl. Alamat alamat1', '+ 123 345 6781', 'email@email.com1', 'Senin - Jumat, 08.00 - 16.00 1', 'Copyright © 2018 . Powered by TIM IT Disperkim1', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.670691944743!2d117.14358171475344!3d-0.49288699964039895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67f12748846d1%3A0x36ec5987bac50811!2sDinas+Perumahan+dan+Permukiman+Kota+Samarinda+(Disperkim)!5e0!3m2!1sid!2sid!4v1544076507895\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', 'alien1.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(25) NOT NULL,
  `status` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `status`) VALUES
(1, 'admin', '$2y$10$Ulm8EOyVxp29rkF4UpOPSesezZ7n5LA.n5bpECrnkEgK.tNTYfHO.', '1', 1),
(16, 'emaaasil@email.com', '$2y$10$O11DvMKYkN2K6VyWa0MDN.DIjp.mBWuoHCG3NG4M1TdITN6yni9I2', '2', 0),
(17, 'pengembang', '$2y$10$5GFJ9cLPXLdpn4LLh1YQ5OYESiJcnKD5yGmhPl1/s74lXNIIjmZHC', '2', 1),
(18, 'operator', '$2y$10$LBeUI2ZYQtIrqio2SmOaWuD3UbcHbNnXto7xYeFS4N2o5kxarj/ga', '3', 1),
(19, 'email@email.com', '$2y$10$RCIm3Hqj.9TaRF6QyvX2f.k2tUpF7tWNShu4s8fbJrhSTxpwaBz..', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id_wishlist` int(11) NOT NULL,
  `id_masyarakat` int(11) NOT NULL,
  `id_bangunan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bangunan`
--
ALTER TABLE `bangunan`
  ADD PRIMARY KEY (`id_bangunan`),
  ADD KEY `id_pengembang` (`id_pengembang`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_kelurahan` (`id_kelurahan`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`),
  ADD KEY `id_bangunan` (`id_bangunan`);

--
-- Indexes for table `foto_bangunan`
--
ALTER TABLE `foto_bangunan`
  ADD PRIMARY KEY (`id_foto_bangunan`),
  ADD KEY `id_bangunan` (`id_bangunan`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `main_bg`
--
ALTER TABLE `main_bg`
  ADD PRIMARY KEY (`id_main_bg`);

--
-- Indexes for table `main_info`
--
ALTER TABLE `main_info`
  ADD PRIMARY KEY (`id_main_info`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id_masyarakat`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pengembang`
--
ALTER TABLE `pengembang`
  ADD PRIMARY KEY (`id_pengembang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `perumahan`
--
ALTER TABLE `perumahan`
  ADD PRIMARY KEY (`id_perumahan`);

--
-- Indexes for table `sarana_prasarana`
--
ALTER TABLE `sarana_prasarana`
  ADD PRIMARY KEY (`id_sarana_prasarana`),
  ADD KEY `id_bangunan` (`id_bangunan`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id_wishlist`),
  ADD KEY `id_masyarakat` (`id_masyarakat`),
  ADD KEY `id_bangunan` (`id_bangunan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bangunan`
--
ALTER TABLE `bangunan`
  MODIFY `id_bangunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `foto_bangunan`
--
ALTER TABLE `foto_bangunan`
  MODIFY `id_foto_bangunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `main_bg`
--
ALTER TABLE `main_bg`
  MODIFY `id_main_bg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `main_info`
--
ALTER TABLE `main_info`
  MODIFY `id_main_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id_masyarakat` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengembang`
--
ALTER TABLE `pengembang`
  MODIFY `id_pengembang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `perumahan`
--
ALTER TABLE `perumahan`
  MODIFY `id_perumahan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sarana_prasarana`
--
ALTER TABLE `sarana_prasarana`
  MODIFY `id_sarana_prasarana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id_wishlist` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bangunan`
--
ALTER TABLE `bangunan`
  ADD CONSTRAINT `bangunan_ibfk_4` FOREIGN KEY (`id_pengembang`) REFERENCES `pengembang` (`id_pengembang`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `bangunan_ibfk_5` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `bangunan_ibfk_6` FOREIGN KEY (`id_kelurahan`) REFERENCES `kelurahan` (`id_kelurahan`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `fasilitas_ibfk_1` FOREIGN KEY (`id_bangunan`) REFERENCES `bangunan` (`id_bangunan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `foto_bangunan`
--
ALTER TABLE `foto_bangunan`
  ADD CONSTRAINT `foto_bangunan_ibfk_1` FOREIGN KEY (`id_bangunan`) REFERENCES `bangunan` (`id_bangunan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `kelurahan_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD CONSTRAINT `masyarakat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `pengembang`
--
ALTER TABLE `pengembang`
  ADD CONSTRAINT `pengembang_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE;

--
-- Constraints for table `sarana_prasarana`
--
ALTER TABLE `sarana_prasarana`
  ADD CONSTRAINT `sarana_prasarana_ibfk_1` FOREIGN KEY (`id_bangunan`) REFERENCES `bangunan` (`id_bangunan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`id_masyarakat`) REFERENCES `masyarakat` (`id_masyarakat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`id_bangunan`) REFERENCES `bangunan` (`id_bangunan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
