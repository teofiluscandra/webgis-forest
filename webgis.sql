-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 06, 2018 at 10:15 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `webgis`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_penanaman`
--

CREATE TABLE `detail_penanaman` (
  `id_detail` int(11) NOT NULL,
  `id_penanaman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `lat` varchar(24) DEFAULT NULL,
  `lon` varchar(24) DEFAULT NULL,
  `status_pohon` int(11) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=194 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penanaman`
--

INSERT INTO `detail_penanaman` (`id_detail`, `id_penanaman`, `id_user`, `lat`, `lon`, `status_pohon`, `keterangan`) VALUES
(12, 28, 109, '-8.0066217404', '113.313589096', 1, NULL),
(13, 28, 109, '-8.0072166', '113.312301635', 1, NULL),
(14, 28, 109, '-8.0072143', '113.312301635', 1, NULL),
(15, 28, 109, '-8.0072132', '113.312301635', 1, NULL),
(16, 28, 109, '-8.00721632', '113.312301635', 1, NULL),
(17, 30, 116, '-8.00398669', '113.31526279444', 1, NULL),
(18, 30, 116, '-8.00398669', '113.31526279434', 1, NULL),
(19, 30, 116, '-8.00398669', '113.31526279476', 1, NULL),
(20, 30, 116, '-8.00398669', '113.3152627946', 1, NULL),
(21, 30, 116, '-8.00398669', '113.3152627945', 1, NULL),
(22, 30, 118, '-8.00398669', '113.3152627942', 1, NULL),
(23, 30, 118, '-8.00398669', '113.3152627945', 1, NULL),
(24, 30, 118, '-8.00398669', '113.315262794433', 1, NULL),
(25, 30, 118, '-8.00398669', '113.315262794423', 1, NULL),
(26, 30, 118, '-8.00398669', '113.315262794422', 1, NULL),
(27, 30, 118, '-8.00398669', '113.3152627944223', 1, NULL),
(28, 30, 118, '-8.00398669', '113.315262794425', 1, NULL),
(29, 30, 118, '-8.00398669', '113.315262794424', 1, NULL),
(30, 30, 118, '-8.00398669', '113.315262794423', 1, NULL),
(31, 30, 118, '-8.00398669', '113.315262794412', 1, NULL),
(32, 29, 99, '-7.9861376699698272', '113.3371925354003923', 1, NULL),
(33, 29, 99, '-7.9861376699698272', '113.337192535400332', 1, NULL),
(34, 29, 99, '-7.9861376699698272', '113.33719253540034', 1, NULL),
(35, 29, 99, '-7.9861376699698272', '113.33719253540033', 1, NULL),
(36, 29, 99, '-7.9861376699698272', '113.33719253540034', 1, NULL),
(37, 29, 99, '-7.9861376699698272', '113.33719253540059', 1, NULL),
(38, 29, 99, '-7.9861376699698272', '113.33719253540039', 1, NULL),
(39, 29, 99, '-7.9861376699698272', '113.33719253540049', 1, NULL),
(40, 29, 99, '-7.9861376699698272', '113.33719253540019', 1, NULL),
(41, 29, 99, '-7.9861376699698272', '113.33719253540040', 1, NULL),
(42, 29, 99, '-7.9861376699698272', '113.33719253540029', 1, NULL),
(43, 33, 123, '-7.98617272', '113.33719253540039', 1, NULL),
(44, 33, 123, '-7.986321', '113.33719253540039', 1, NULL),
(45, 29, 99, '-7.9861376699698279', '113.33719253540039', 1, NULL),
(46, 29, 99, '-7.9861376699698221', '113.33719253540039', 1, NULL),
(47, 35, 125, '-8.00152206800710', '113.33101272583008', 1, NULL),
(48, 35, 125, '-8.00152206800721', '113.33101272583008', 1, NULL),
(49, 35, 125, '-8.00152206800708', '113.33101272583008', 1, NULL),
(50, 35, 125, '-8.00152206800707', '113.33101272583008', 1, NULL),
(51, 35, 125, '-8.00152206800705', '113.33101272583008', 1, NULL),
(52, 35, 125, '-8.00152206800709', '113.33101272583808', 1, NULL),
(53, 35, 125, '-8.00152206800709', '113.33101272583608', 1, NULL),
(54, 35, 125, '-8.00152206800709', '113.33101272584008', 1, NULL),
(55, 35, 125, '-8.00152206800709', '113.33101272583098', 1, NULL),
(56, 35, 125, '-8.00152206800709', '113.33101272565008', 1, NULL),
(57, 35, 125, '-8.00152206832709', '113.33101272583008', 1, NULL),
(58, 35, 125, '-8.00152206800709', '113.33101272598008', 1, NULL),
(59, 35, 125, '-8.00152206806509', '113.33101272589808', 1, NULL),
(60, 35, 125, '-8.00152206804309', '113.33101272588008', 1, NULL),
(61, 35, 125, '-8.00153206800709', '113.33101272583008', 1, NULL),
(62, 35, 125, '-8.00152206800709', '113.33106272583008', 1, NULL),
(63, 35, 125, '-8.00152206800709', '113.33141272583008', 1, NULL),
(64, 35, 125, '-8.00152206800909', '113.33101272583008', 1, NULL),
(65, 35, 125, '-8.00152206800709', '113.33101272593008', 1, NULL),
(66, 35, 125, '-8.00152206800706', '113.33101272583098', 1, NULL),
(67, 35, 125, '-8.00152206800707', '113.33101272583908', 1, NULL),
(68, 35, 125, '-8.00152206800703', '113.33101272583078', 1, NULL),
(69, 35, 125, '-8.001522068007096', '113.33101272583008', 1, NULL),
(70, 35, 125, '-8.00152206800709', '113.33101272783008', 1, NULL),
(71, 35, 125, '-8.00152206800509', '113.33101272585008', 1, NULL),
(72, 35, 125, '-8.00152206800709', '113.33101272583008', 1, NULL),
(73, 35, 125, '-8.00152206808709', '113.33101272583008', 1, NULL),
(74, 35, 125, '-8.00152206800709', '113.33101275583008', 1, NULL),
(75, 35, 125, '-8.00152206800709', '113.33101279583008', 1, NULL),
(76, 35, 125, '-8.00152206800709', '113.33101272783008', 1, NULL),
(77, 34, 124, '-7.988007627526602', '113.31315994262695', 1, NULL),
(78, 34, 124, '-7.988007627546702', '113.31315994262695', 1, NULL),
(79, 34, 124, '-7.988007627526702', '113.31315995262695', 1, NULL),
(80, 34, 124, '-7.988007627526702', '113.31315994562695', 1, NULL),
(81, 34, 124, '-7.988007657526702', '113.31315994262695', 1, NULL),
(82, 34, 124, '-7.988007527526702', '113.31315993262695', 1, NULL),
(83, 34, 124, '-7.988007627526802', '113.31315994262695', 1, NULL),
(84, 34, 124, '-7.988007627526702', '113.31315994162695', 1, NULL),
(85, 34, 124, '-7.988007627526702', '113.31315294262695', 1, NULL),
(86, 34, 124, '-7.988007627525702', '113.31315994262695', 1, NULL),
(87, 34, 124, '-7.988007627526802', '113.31315994262695', 1, NULL),
(88, 34, 124, '-7.988007627526702', '113.31314994262695', 1, NULL),
(89, 34, 124, '-7.988007627526702', '113.31315994262695', 1, NULL),
(90, 34, 124, '-7.988007627526702', '113.31315993262695', 1, NULL),
(91, 34, 124, '-7.988007627524702', '113.31315994262695', 1, NULL),
(92, 34, 124, '-7.988007627526702', '113.31315994242695', 1, NULL),
(93, 34, 124, '-7.988007627546702', '113.31315994262695', 1, NULL),
(94, 34, 124, '-7.988007627526702', '113.31315994263695', 1, NULL),
(95, 34, 124, '-7.988007647526702', '113.31315994262695', 1, NULL),
(96, 34, 124, '-7.988007627526702', '113.31315994262495', 1, NULL),
(97, 34, 124, '-7.988007647526702', '113.31315994262695', 1, NULL),
(98, 34, 124, '-7.988007627526702', '113.31315995262695', 1, NULL),
(99, 34, 124, '-7.988007627526702', '113.31315996262695', 1, NULL),
(100, 34, 124, '-7.988007627526602', '113.31315994262695', 1, NULL),
(101, 34, 124, '-7.988007627526702', '113.31315994252695', 1, NULL),
(102, 34, 124, '-7.988007627516702', '113.31315994262695', 1, NULL),
(103, 34, 124, '-7.988007627526702', '113.31315974262695', 1, NULL),
(104, 34, 124, '-7.988007627525702', '113.31315994262695', 1, NULL),
(105, 34, 124, '-7.988007627526702', '113.31315994362695', 1, NULL),
(106, 34, 124, '-7.988007627526702', '113.31315494262695', 1, NULL),
(107, 37, 131, '-7.998292242447543', '113.31110000610352', 1, NULL),
(108, 37, 131, '-7.998292242447532', '113.31110000610252', 1, NULL),
(109, 37, 131, '-7.998292242447532', '113.31110000610352', 1, NULL),
(110, 37, 131, '-7.998292242447552', '113.31110000610252', 1, NULL),
(111, 37, 131, '-7.998292242447552', '113.31110000610355', 1, NULL),
(112, 37, 131, '-7.998292242447552', '113.31110000610354', 1, NULL),
(113, 37, 131, '-7.998292242447552', '113.31110000610351', 1, NULL),
(114, 37, 131, '-7.998292242447552', '113.31110000610352', 1, NULL),
(115, 37, 131, '-7.998292242447552', '113.31110000610350', 1, NULL),
(116, 37, 131, '-7.998292242447552', '113.31110000610349', 1, NULL),
(117, 37, 131, '-7.998292242447552', '113.31110000610252', 1, NULL),
(118, 37, 131, '-7.998292242447552', '113.31110000610332', 1, NULL),
(119, 37, 131, '-7.998292242447552', '113.31110000610331', 1, NULL),
(120, 37, 131, '-7.998292242447552', '113.31110000610341', 1, NULL),
(121, 37, 131, '-7.998292242447552', '113.31110000610352', 1, NULL),
(122, 36, 127, '-8.00730169196814', '113.35126876831055', 1, NULL),
(123, 36, 127, '-8.00730169196815', '113.35126876831055', 1, NULL),
(124, 36, 127, '-8.00730169196813', '113.35126876831055', 1, NULL),
(125, 36, 127, '-8.00730169196812', '113.35126876831055', 1, NULL),
(126, 36, 127, '-8.007301691968111', '113.35126876831055', 1, NULL),
(127, 36, 127, '-8.00730169196821', '113.35126876831055', 1, NULL),
(128, 36, 127, '-8.00730169196822', '113.35126876831055', 1, NULL),
(129, 36, 127, '-8.00730169196823', '113.35126876831055', 1, NULL),
(130, 36, 127, '-8.00730169196824', '113.35126876831055', 1, NULL),
(131, 36, 127, '-8.00730169196825', '113.35126876831055', 1, NULL),
(132, 36, 127, '-8.00730169196826', '113.35126876831055', 1, NULL),
(133, 36, 127, '-8.00730169196827', '113.35126876831055', 1, NULL),
(134, 36, 127, '-8.00730169196828', '113.35126876831055', 1, NULL),
(135, 36, 127, '-8.00730169196829', '113.35126876831055', 1, NULL),
(136, 36, 127, '-8.00730169196830', '113.35126876831055', 1, NULL),
(137, 36, 127, '-8.00730169196812', '113.35126876831155', 1, NULL),
(138, 36, 127, '-8.00730169196813', '113.35126876831055', 1, NULL),
(139, 36, 127, '-8.00730169196213', '113.35126876831055', 1, NULL),
(140, 36, 127, '-8.00730169191213', '113.35126876831055', 1, NULL),
(141, 36, 127, '-8.00730169196211', '113.35126876831055', 1, NULL),
(146, 31, 100, '-7.9577182', '112.5896599', 1, NULL),
(147, 31, 100, '-7.9577182', '112.5896599', 1, NULL),
(148, 31, 100, '-7.9577182', '112.5896599', 1, NULL),
(149, 31, 100, '-7.9577182', '112.5896599', 1, NULL),
(150, 31, 100, '-7.9577182', '112.5896599', 1, NULL),
(152, 31, 100, '-8.0218163', '112.6326417', 1, NULL),
(153, 31, 100, '-8.0218161', '112.6326414', 1, NULL),
(154, 31, 100, '-8.0219362', '112.6322973', 1, NULL),
(155, 31, 100, '-8.0219362', '112.6322973', 1, NULL),
(183, 39, 126, '-8.0219393', '112.6322803', 1, NULL),
(184, 42, 132, '-8.0219393', '112.6322803', 1, NULL),
(185, 43, 130, '-8.0219393', '112.6322825', 1, NULL),
(186, 41, 129, '-8.0219393', '112.6322825', 1, NULL),
(187, 40, 128, '-8.0219393', '112.6322825', 1, NULL),
(189, 31, 100, '-8.0066217404', '113.313589096', 1, NULL),
(190, 31, 100, '-8.0066217404', '113.313589096', 1, NULL),
(191, 31, 100, '-8.0066217404', '113.313589096', 1, NULL),
(192, 31, 100, '-8.0066217404', '113.313589096', 1, NULL),
(193, 31, 100, '-8.0219592', '112.6322862', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penanaman`
--

CREATE TABLE `penanaman` (
  `id_penanaman` int(11) NOT NULL,
  `nama_penanam` int(11) NOT NULL,
  `tgl_tanam` date DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_pohon` int(11) NOT NULL,
  `id_petak` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jumlahinput` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penanaman`
--

INSERT INTO `penanaman` (`id_penanaman`, `nama_penanam`, `tgl_tanam`, `id_user`, `id_pohon`, `id_petak`, `status`, `jumlah`, `jumlahinput`) VALUES
(28, 13, '2016-05-07', 102, 10, 5, 2, 5, 5),
(29, 16, '2016-05-10', 99, 18, 2, 2, 13, 13),
(30, 24, '2016-05-09', 116, 9, 5, 2, 15, 15),
(31, 18, '2016-06-21', 100, 17, 1, 0, 20, 10),
(32, 21, NULL, 95, 16, 2, 0, 3, 0),
(33, 26, '2016-05-10', 123, 20, 3, 3, 2, 2),
(34, 29, '2016-05-10', 124, 17, 1, 2, 30, 30),
(35, 25, '2016-05-10', 125, 11, 4, 2, 30, 30),
(36, 20, '2016-05-10', 127, 22, 6, 2, 20, 20),
(37, 28, '2016-05-10', 131, 20, 3, 2, 15, 15),
(38, 30, '2016-06-14', 134, 10, 3, 0, 5, 0),
(39, 16, '2016-06-15', 126, 9, 2, 1, 1, 1),
(40, 17, '2016-06-15', 128, 10, 3, 1, 1, 1),
(41, 19, '2016-06-15', 129, 9, 2, 1, 1, 1),
(42, 17, '2016-06-15', 132, 9, 3, 1, 1, 1),
(43, 20, '2016-06-15', 130, 10, 5, 1, 1, 1),
(44, 16, NULL, 136, 9, 4, 0, 12, 0),
(45, 16, NULL, 138, 10, 4, 0, 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nama_komunitas` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `gambaran_komunitas` text NOT NULL,
  `no_telp` varchar(25) NOT NULL,
  `website` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `nama`, `nama_komunitas`, `tanggal`, `gambaran_komunitas`, `no_telp`, `website`, `email`, `alamat`) VALUES
(13, 'Teofilus Candra', 'Sekolah Rimba', '2016-04-25', 'Komunitas untuk anak jalanan.', '089681180786', '', 'teofiluschandra@gmail.com', 'Jalan Dharmawangsa 5 Surabaya'),
(16, 'Frans', 'BEM Machung', '2016-05-04', 'Organisasi Kampus', '08977665544', '-', 'admin@machung.ac.id', 'VPT'),
(17, 'Subagio', 'Makalantas', '2016-05-09', 'UKM Makalantas pecinta alam dari Akademi Komunitas Negeri Lumajang', '08785952908', 'aknlumajang.ac.id', 'aknlumajang@gmail.com', 'Lumajang'),
(18, 'Zamroni', 'Kampoeng Sinaoe', '2016-05-09', 'Kampoeng sinaoe adalah tempat belajar untuk anak-anak di sidoarjo, menawarkan fasilitas pembelajaran bahasa inggris dan komputer', '081334211234', 'kampoengsinaoe.org', 'kampoengsinaoe@gmail.com', 'Buduran Sidoarjo'),
(19, 'Iwan', 'Oi Lumajang', '2016-05-09', 'Pecinta Iwan Fals Lumajang', '089213112113', '-', 'iwan_fals@gmail.com', 'Lumajang'),
(20, 'Ali', 'Tim SAR Lumajang', '2016-05-09', 'penyelamat apbila terjadi bencana yang merupakan lembaga pemerintah yang sifatnya non atau tidak dalam kementrian yang memiliki peran sebagai tim penanganan bencana yang cepat dan tanggap setiap kali dibutuhkan tindakan evakuasi korban.', '08132127899', 'basarnas.go.id', 'cs@basarnas.go.id', 'Lumajang'),
(21, 'lonceng', 'SMKN Klakah', '2016-05-09', 'SMKN di klakah', '0878595662233', 'http://smknlakah.blogspot.co.id', 'smknklakah@gmail.com', 'Jl. Raya Randuagung No. 17'),
(22, 'hasyim', 'MA Hasyim', '2016-05-09', 'Madrasah Aliyah di Lumajang', '087832212334', '-', 'mahasyimasyari@gmail.com', 'Jl. Wahid Hasyim No.03'),
(23, 'saktiawan', 'Garuda Sakti', '2016-05-09', 'Tim basket kabupaten lumajang', '089432211384', '-', 'garudasakti@gmail.com', 'jl.Kahuripan lumajang'),
(24, 'muiz', 'Gusdurian Malang', '2016-05-09', 'Komunitas pengagum gusdur', '0813121234455', 'www.gusdurianmalang.net', 'admin@gusdurianmalang.net', 'Joyogrand Malang'),
(25, 'fauzan', 'Gubuk Tulis', '2016-05-09', 'Komunitas penulis progresif', '0878685112121', 'gubuktulis.com', 'gubuktulis@gmail.com', 'Ayam Totoh Sigura-gura malang'),
(26, 'Eka', 'Hipalapa', '2016-05-09', 'Hipalapa pecinta alam dari pasirian kabupaten lumajang', '0891233787665', '-', 'hipalapalumajang@gmail.com', 'Pasirian Lumajang'),
(28, 'Giri', 'Sahabat Giri Warna', '2016-05-09', 'Komunitas pendidikan', '0812345112343', '-', 'sahabatgiriwarna@gmail.com', '089786712457'),
(29, 'angeline', 'Uklam Ngalam', '2016-05-09', 'Komunitas traveling kota malang', '081211983847', '-', 'ngalamuklam@gmail.com', 'Jalan Basuki Rahmat 08 Malang'),
(30, 'Hendra Setia Ligawn', 'Rotaract Club of Ma Chung Univ', '2016-06-08', 'Merupakan ....', '0812345678910', '-', 'ligawan.hendra@gmail.com', 'Villa Puncak Tidar'),
(31, 'Teofilus Candra', 'Ma Chung', '2016-08-12', 'Universitas', '089681189786', 'www.machung.ac.id', 'admin@machung.ac.id', 'Villa Puncak Tidar');

-- --------------------------------------------------------

--
-- Table structure for table `petak`
--

CREATE TABLE `petak` (
  `id_petak` int(11) NOT NULL,
  `nama_petak` varchar(50) NOT NULL,
  `luas_petak` double NOT NULL,
  `lokasi_petak` polygon DEFAULT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `desa` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petak`
--

,
(2, 'B', 249, NULL, 'Akan ada acara KEPO', 'Sumber Petung', 'Ranuyoso'),
(3, 'C', 552, NULL, '-', 'Papringan', 'Klakah'),
(4, 'D', 273, NULL, '-', 'Papringan', 'Klakah'),
(5, 'E', 536, NULL, '-', 'Duren', 'Klakah'),
(6, 'F', 101, NULL, 'Aman', 'Sumber Wringin', 'Klakah');

-- --------------------------------------------------------

--
-- Table structure for table `pohon`
--

CREATE TABLE `pohon` (
  `id_pohon` int(11) NOT NULL,
  `nama_pohon` varchar(50) NOT NULL,
  `jenis_pohon` varchar(50) NOT NULL,
  `nama_gambar` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pohon`
--

INSERT INTO `pohon` (`id_pohon`, `nama_pohon`, `jenis_pohon`, `nama_gambar`) VALUES
(8, 'Acacia Mangium', 'Kayu-kayuan', 'assets/marker/acacia_thumb.png'),
(9, 'Alpukat', 'Buah-buahan', 'assets/marker/alpukat_thumb.png'),
(10, 'Balsa', 'Kayu-kayuan', 'assets/marker/balsa_thumb.png'),
(11, 'Bambu Hijau', 'Bambu', 'assets/marker/bamboo_thumb.png'),
(12, 'Bambu Hitam', 'Bambu', 'assets/marker/bambuhitam_thumb.png'),
(13, 'Jabon', 'Kayu-kayuan', 'assets/marker/jabon_thumb.png'),
(14, 'Kayu Manis', 'Kayu-kayuan', 'assets/marker/kayumanis_thumb.png'),
(15, 'Klirisidi', 'Kayu-kayuan', 'assets/marker/klirisidi_thumb.png'),
(16, 'Trembesi', 'Kayu-kayuan', 'assets/marker/trembesi_thumb.jpg'),
(17, 'Durian', 'Buah-buahan', 'assets/marker/durian_thumb.png'),
(18, 'Jambu Biji', 'Buah-buahan', 'assets/marker/jambubiji_thumb.png'),
(19, 'Kelengkeng', 'Buah-buahan', 'assets/marker/kelengkeng_thumb.png'),
(20, 'Mangga', 'Buah-buahan', 'assets/marker/mangga_thumb.jpg'),
(21, 'Manggis', 'Buah-buahan', 'assets/marker/manggis_thumb.png'),
(22, 'Rambutan', 'Buah-buahan', 'assets/marker/rambutan_thumb.png'),
(24, 'Sirsak', 'Buah-buahan', 'assets/marker/sirsak1_thumb.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `id_koordinator` int(11) NOT NULL,
  `tanggal_expired` date NOT NULL,
  `isAlready` int(11) NOT NULL,
  `nomor_ktp` varchar(16) NOT NULL,
  `nomor_telp` varchar(14) NOT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nama_lengkap`, `level`, `id_koordinator`, `tanggal_expired`, `isAlready`, `nomor_ktp`, `nomor_telp`, `email`) VALUES
(89, 'superadmin', 'a07d0e036500d8ff7119dead7dfe3531', 'Super Admin', 0, 0, '0000-00-00', 0, '', '', NULL),
(95, 'Relawan', '827ccb0eea8a706c4c34a16891f84e7b', 'Madiono', 2, 0, '2016-06-16', 1, '1456321456123467', '21345643234563', 'teofiluschandra@gmail.com'),
(98, 'Admin', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', 1, 0, '0000-00-00', 0, '', '', NULL),
(99, 'frans', '827ccb0eea8a706c4c34a16891f84e7b', 'Frans', 2, 0, '2016-05-10', 1, '83199221199382', '089681180786', ''),
(100, 'boiman', '827ccb0eea8a706c4c34a16891f84e7b', 'Boiman Wicaksono', 2, 0, '2016-07-30', 1, '83144556782038', '08976657481123', ''),
(102, 'yoyok', '827ccb0eea8a706c4c34a16891f84e7b', 'Yoyok Subagio', 2, 0, '2016-05-09', 1, '8311211994837', '081333425617', ''),
(105, 'relawan2', '827ccb0eea8a706c4c34a16891f84e7b', '', 3, 102, '0000-00-00', 0, '', '', NULL),
(106, 'relawan3', '827ccb0eea8a706c4c34a16891f84e7b', '', 3, 102, '0000-00-00', 0, '', '', NULL),
(107, 'relawan4', '827ccb0eea8a706c4c34a16891f84e7b', '', 3, 102, '0000-00-00', 0, '', '', NULL),
(109, 'relawan1', '827ccb0eea8a706c4c34a16891f84e7b', '', 3, 102, '0000-00-00', 0, '', '', NULL),
(113, 'we', 'ff1ccf57e98c817df1efcd9fe44a8aeb', '', 3, 99, '0000-00-00', 0, '', '', NULL),
(116, 'yunita', '827ccb0eea8a706c4c34a16891f84e7b', 'Yunita Hardiyanti Putri', 2, 0, '2016-07-01', 1, '83123847820129', '0897733219383', 'yunitahardiyanti@gmail.com'),
(118, 'relawan01', '827ccb0eea8a706c4c34a16891f84e7b', '', 3, 116, '0000-00-00', 0, '', '', NULL),
(119, 'relawan02', '827ccb0eea8a706c4c34a16891f84e7b', '', 3, 116, '0000-00-00', 0, '', '', NULL),
(120, 'relawan03', '827ccb0eea8a706c4c34a16891f84e7b', '', 3, 116, '0000-00-00', 0, '', '', NULL),
(121, 'relawan04', '29515bb9a5d5e558e2b3ba71e3b6e037', '', 3, 116, '0000-00-00', 0, '', '', NULL),
(122, 'relawan05', '827ccb0eea8a706c4c34a16891f84e7b', '', 3, 116, '0000-00-00', 0, '', '', NULL),
(123, 'sonya', '827ccb0eea8a706c4c34a16891f84e7b', 'sonya depari', 2, 0, '2016-05-13', 1, '83122344281938', '089681180786', ''),
(124, 'feri', '827ccb0eea8a706c4c34a16891f84e7b', 'feri setiawan', 2, 0, '2016-05-13', 1, '8319884737822', '089681127364', ''),
(125, 'felix', '827ccb0eea8a706c4c34a16891f84e7b', 'felix tan', 2, 0, '2016-05-13', 1, '831293874728819', '0878477366128', ''),
(126, 'aria', '827ccb0eea8a706c4c34a16891f84e7b', 'aria ghora', 2, 0, '2016-06-18', 1, '83128849389284', '0896855773392', ''),
(127, 'ali', '827ccb0eea8a706c4c34a16891f84e7b', 'ali lonceng', 2, 0, '2016-05-13', 1, '83122345213384', '089681180783', ''),
(128, 'john', '827ccb0eea8a706c4c34a16891f84e7b', 'john doe', 2, 0, '2016-06-18', 1, '8112334030394', '083221848475', 'john@doe.com'),
(129, 'tini', '827ccb0eea8a706c4c34a16891f84e7b', 'tini', 2, 0, '2016-06-18', 1, '83127889388477', '0896877548298', ''),
(130, 'yanti', '827ccb0eea8a706c4c34a16891f84e7b', 'yanti', 2, 0, '2016-06-18', 1, '831275758392884', '0896944382849', ''),
(131, 'rara', '827ccb0eea8a706c4c34a16891f84e7b', 'rara sekar', 2, 0, '2016-07-30', 1, '8312284775888', '0813312334985', ''),
(132, 'ananda', '827ccb0eea8a706c4c34a16891f84e7b', 'ananda badudu', 2, 0, '2016-06-18', 1, '83122129387489', '0812887239928', ''),
(133, 'bayu', '827ccb0eea8a706c4c34a16891f84e7b', '', 3, 100, '0000-00-00', 0, '', '', NULL),
(134, 'hendrasetia', '827ccb0eea8a706c4c34a16891f84e7b', 'Hendra Setia Ligawan', 2, 0, '2016-06-30', 1, '8312198398129', '', ''),
(135, 'farich.rinaldy', '827ccb0eea8a706c4c34a16891f84e7b', '', 3, 134, '0000-00-00', 0, '', '', NULL),
(136, 'teofilus', '827ccb0eea8a706c4c34a16891f84e7b', 'Teofilus Candra', 2, 0, '2016-08-15', 1, '9182377384872728', '93278392', 'teofiluschandra@gmail.com'),
(137, 'relawan12', '827ccb0eea8a706c4c34a16891f84e7b', '', 3, 136, '0000-00-00', 0, '', '', NULL),
(138, 'oke', '827ccb0eea8a706c4c34a16891f84e7b', 'oke', 2, 0, '2016-11-03', 1, '123', '123', 'teofiluschandra@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_penanaman`
--
ALTER TABLE `detail_penanaman`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_penanaman` (`id_penanaman`);

--
-- Indexes for table `penanaman`
--
ALTER TABLE `penanaman`
  ADD PRIMARY KEY (`id_penanaman`),
  ADD KEY `id_petak` (`id_petak`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_pohon` (`id_pohon`),
  ADD KEY `nama_penanam` (`nama_penanam`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `petak`
--
ALTER TABLE `petak`
  ADD PRIMARY KEY (`id_petak`);

--
-- Indexes for table `pohon`
--
ALTER TABLE `pohon`
  ADD PRIMARY KEY (`id_pohon`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_penanaman`
--
ALTER TABLE `detail_penanaman`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=194;
--
-- AUTO_INCREMENT for table `penanaman`
--
ALTER TABLE `penanaman`
  MODIFY `id_penanaman` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `petak`
--
ALTER TABLE `petak`
  MODIFY `id_petak` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pohon`
--
ALTER TABLE `pohon`
  MODIFY `id_pohon` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=139;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_penanaman`
--
ALTER TABLE `detail_penanaman`
  ADD CONSTRAINT `detail_penanaman_ibfk_1` FOREIGN KEY (`id_penanaman`) REFERENCES `penanaman` (`id_penanaman`);

--
-- Constraints for table `penanaman`
--
ALTER TABLE `penanaman`
  ADD CONSTRAINT `penanaman_ibfk_1` FOREIGN KEY (`id_petak`) REFERENCES `petak` (`id_petak`),
  ADD CONSTRAINT `penanaman_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `penanaman_ibfk_3` FOREIGN KEY (`id_pohon`) REFERENCES `pohon` (`id_pohon`),
  ADD CONSTRAINT `penanaman_ibfk_4` FOREIGN KEY (`nama_penanam`) REFERENCES `pendaftaran` (`id_pendaftaran`);
