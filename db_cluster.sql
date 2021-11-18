-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Nov 2021 pada 14.49
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cluster`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `item`
--

CREATE TABLE `item` (
  `id_item` int(11) NOT NULL,
  `nama_item` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `item`
--

INSERT INTO `item` (`id_item`, `nama_item`) VALUES
(1, 'Albacore'),
(2, 'Big Eye'),
(3, 'Euth'),
(4, 'Skipjack'),
(5, 'Tonggol'),
(6, 'Yellow Fin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'IN'),
(2, 'OUT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kapal`
--

CREATE TABLE `kapal` (
  `id_kapal` int(11) NOT NULL,
  `nama_kapal` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kapal`
--

INSERT INTO `kapal` (`id_kapal`, `nama_kapal`) VALUES
(1, 'ADDIN AKBAR'),
(2, 'ALSYA 01'),
(3, 'ALSYA 02'),
(4, 'AMANDA-08'),
(5, 'ANITA 02'),
(6, 'ARAWUNGAN RATU PANTAI'),
(7, 'ARUMI JAYA 22'),
(8, 'BAHARI-89'),
(9, 'BAHARI NUSANTARA-23'),
(10, 'BINTANG SAMUDERA DUNIA'),
(11, 'BURAPANDENG 02'),
(12, 'CAHAYA MAS'),
(13, 'CAHAYA NURUL 04'),
(14, 'CAHAYA PARAGUAY'),
(15, 'CAHAYA TASBIH'),
(16, 'CHIU SHIH - 2'),
(17, 'CINTA MAKKA 02'),
(18, 'CITRA MAS 88'),
(19, 'DELFI 35'),
(20, 'DIOSKURI - 8'),
(21, 'DIOSKURI - 9'),
(22, 'FATNI 27'),
(23, 'FLOTIM - 12B'),
(24, 'FLOTIM 15'),
(25, 'FLOTIM 22'),
(26, 'FLOTIM 30'),
(27, 'GOD BLESS - 02'),
(28, 'HARAPAN TIDAYONA'),
(29, 'HASIL JAYA SEJATI'),
(30, 'HASRAT ABADI 02'),
(31, 'HEN'),
(32, 'HERLIAN 88'),
(33, 'INKA MINA 260'),
(34, 'INKA MINA 699'),
(35, 'INKA MINA 709'),
(36, 'INKAMINA - 911'),
(37, 'JAYA BITUNG 89'),
(38, 'KURNIA ILAHI 14'),
(39, 'LAGONA'),
(40, 'LAYARI NUSANTARA'),
(41, 'LUTFIA 01'),
(42, 'MARLYNDA 01'),
(43, 'MASAGENA 1'),
(44, 'MATSAM JAYA - 08'),
(45, 'MEGA BUANA 03'),
(46, 'MUTIARA - 7'),
(47, 'NAGA MAS PERKASA - 19'),
(48, 'NAGA MAS PERKASA - 26'),
(49, 'NAJWA 01'),
(50, 'NELAYAN BAKTI - 091'),
(51, 'NELAYAN BAKTI - 114'),
(52, 'NELAYAN BAKTI - 137'),
(53, 'NELAYAN BAKTI - 64'),
(54, 'NELAYAN BAKTI - 66'),
(55, 'NELAYAN BAKTI - 80'),
(56, 'NELAYAN BAKTI GUFRAN SELL 146'),
(57, 'NELAYAN BHAKTI 01'),
(58, 'NELAYAN BHAKTI 08'),
(59, 'NELAYAN BHAKTI 120'),
(60, 'NELAYAN BHAKTI 16'),
(61, 'NELAYAN BHAKTI 25'),
(62, 'NELAYAN BHAKTI 32'),
(63, 'NELAYAN BHAKTI 34'),
(64, 'NELAYAN BHAKTI 36'),
(65, 'NELAYAN BHAKTI 44'),
(66, 'NELAYAN BHAKTI 77'),
(67, 'NELAYAN BHAKTY - 118'),
(68, 'NELAYAN BHAKTY - 136'),
(69, 'NELAYAN BHAKTY - 87'),
(70, 'NUR FATIMA II'),
(71, 'NURASMI INDAH 02'),
(72, 'NURUL HIKMAH 1'),
(73, 'NUSANTARA - 368'),
(74, 'PATRIA MULIA - 02'),
(75, 'PELITA JAYA'),
(76, 'PERINTIS JAYA - 69'),
(77, 'PERINTIS JAYA - 88'),
(78, 'PLUTO'),
(79, 'PRIMUS JAYA'),
(80, 'PUTRA IDAMAN 33'),
(81, 'QARBALA'),
(82, 'RACHMAT'),
(83, 'RAHMAT ILAHI 46'),
(84, 'REZKI TIDAYONA'),
(85, 'RIDHA 03'),
(86, 'RIFKI 02'),
(87, 'RONALD FISHING'),
(88, 'SELEBES 73'),
(89, 'SETIA JAYA MAKMUR'),
(90, 'SETIA MULYA'),
(91, 'SINAR BAHARI'),
(92, 'SULTRA INDAH'),
(93, 'SURYA MAS - II'),
(94, 'SURYA MAS 88'),
(95, 'SURYA TERANG - 88'),
(96, 'SURYA TERANG 02'),
(97, 'SURYAWAN - 134'),
(98, 'VENIO'),
(99, 'VENIO - 07'),
(100, 'YULIEN 01 EKS NURJANAH'),
(101, 'ZAM ZAM 04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tangkap`
--

CREATE TABLE `tangkap` (
  `id_catch` int(11) NOT NULL,
  `nama_catch` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tangkap`
--

INSERT INTO `tangkap` (`id_catch`, `nama_catch`) VALUES
(1, 'Hand Line'),
(2, 'Long Line'),
(3, 'Pole And Line'),
(4, 'Purse Seine');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_biling` varchar(150) NOT NULL,
  `id_item` int(11) NOT NULL,
  `id_kapal` int(11) NOT NULL,
  `id_catch` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `no_biling`, `id_item`, `id_kapal`, `id_catch`, `qty`, `id_jenis`, `tanggal`) VALUES
(1, 'ID-LA-06-01-127-006-11', 4, 20, 3, 40700, 1, '2020-08-25'),
(2, 'ID-LA-06-01-127-006-11', 6, 20, 3, 3100, 1, '2020-08-25'),
(3, 'ID-LA-06-04-120-005-11', 4, 21, 3, 12000, 1, '2020-08-25'),
(4, 'ID-LA-06-04-120-005-11', 6, 21, 3, 3000, 1, '2020-08-25'),
(5, 'ID-LA-06-01-127-002-11', 4, 98, 3, 38300, 1, '2020-08-25'),
(6, 'ID-LA-06-01-127-002-11', 6, 98, 3, 16700, 1, '2020-08-25'),
(7, '523.3/370', 4, 2, 3, 86250, 1, '2020-09-01'),
(8, '523.3/370', 6, 2, 3, 99001, 1, '2020-09-01'),
(9, '523.3/342', 4, 3, 3, 19667, 1, '2020-09-01'),
(10, '523.3/342', 6, 3, 3, 16939, 1, '2021-09-01'),
(11, '523.3/364', 4, 22, 3, 103678, 1, '2020-09-01'),
(12, '523.3/364', 6, 22, 3, 77643, 1, '2020-09-01'),
(13, '523.3/403', 4, 57, 3, 116798, 1, '2020-09-01'),
(14, '523.3/403', 6, 57, 3, 33334, 1, '2020-09-01'),
(15, '523.3/373', 4, 58, 3, 379540, 1, '2020-09-01'),
(16, '523.3/373', 6, 58, 3, 108336, 1, '2020-09-01'),
(17, '523.3/361', 4, 59, 3, 90021, 1, '2020-09-01'),
(18, '523.3/361', 6, 59, 3, 92395, 1, '2020-09-01'),
(19, '523.3/389', 4, 64, 3, 188145, 1, '2020-09-01'),
(20, '523.3/389', 6, 64, 3, 128228, 1, '2020-09-01'),
(21, '523.3/381', 4, 65, 3, 353534, 1, '2020-09-01'),
(22, '523.3/381', 6, 65, 3, 139382, 1, '2020-09-01'),
(23, '523.3/340', 4, 3, 3, 79879, 1, '2020-09-02'),
(24, '523.3/340', 6, 3, 3, 56785, 1, '2020-09-02'),
(25, '523.3/394', 4, 7, 3, 132748, 1, '2020-09-02'),
(26, '523.3/394', 6, 7, 3, 100651, 1, '2020-09-02'),
(27, '523.3/398', 4, 42, 3, 187358, 1, '2020-09-02'),
(28, '523.3/398', 6, 42, 3, 82310, 1, '2020-09-02'),
(29, '523.3/355', 4, 60, 3, 94623, 1, '2020-09-02'),
(30, '523.3/355', 6, 60, 3, 87982, 1, '2020-09-02'),
(31, '523.3/346', 4, 61, 3, 98775, 1, '2020-09-02'),
(32, '523.3/346', 6, 61, 3, 84108, 1, '2020-09-02'),
(33, '523.3/349', 4, 62, 3, 104727, 1, '2020-09-02'),
(34, '523.3/349', 6, 62, 3, 87028, 1, '2020-09-02'),
(35, '523.3/352', 4, 63, 3, 95221, 1, '2020-09-02'),
(36, '523.3/352', 6, 63, 3, 94044, 1, '2020-09-02'),
(37, '523.3/343', 4, 66, 3, 103236, 1, '2020-09-02'),
(38, '523.3/343', 6, 66, 3, 72581, 1, '2020-09-02'),
(39, '523.3/337', 4, 80, 3, 94823, 1, '2020-09-02'),
(40, '523.3/337', 6, 80, 3, 86857, 1, '2020-09-02'),
(41, '523.3/358', 4, 87, 3, 92517, 1, '2020-09-02'),
(42, '523.3/358', 6, 87, 3, 96967, 1, '2020-09-02'),
(43, 'UM.050/S1.56/SKPI/VIII/2020', 4, 50, 3, 64400, 1, '2020-09-14'),
(44, 'UM.050/S1.56/SKPI/VIII/2020', 6, 50, 3, 26300, 1, '2020-09-14'),
(45, 'UM.050/S1.44/SKPI/VIII/2020', 4, 51, 3, 73700, 1, '2020-09-14'),
(46, 'UM.050/S1.44/SKPI/VIII/2020', 6, 51, 3, 34500, 1, '2020-09-14'),
(47, 'UM.050/S1.47/SKPI/VIII/2020', 4, 52, 3, 69200, 1, '2020-09-14'),
(48, 'UM.050/S1.47/SKPI/VIII/2020', 6, 52, 3, 26500, 1, '2020-09-14'),
(49, 'UM.050/S1.50/SKPI/VIII/2020', 4, 53, 3, 66500, 1, '2020-09-14'),
(50, 'UM.050/S1.50/SKPI/VIII/2020', 6, 53, 3, 24600, 1, '2020-09-14'),
(51, 'UM.050/S1.45/SKPI/VIII/2020', 4, 54, 3, 96700, 1, '2020-09-14'),
(52, 'UM.050/S1.45/SKPI/VIII/2020', 6, 54, 3, 36000, 1, '2020-09-14'),
(53, 'UM.050/S1.48/SKPI/VIII/2020', 4, 55, 3, 66400, 1, '2020-09-14'),
(54, 'UM.050/S1.48/SKPI/VIII/2020', 6, 55, 3, 24400, 1, '2020-09-14'),
(55, 'UM.050/S1.51/SKPI/VIII/2020', 4, 56, 3, 66100, 1, '2020-09-14'),
(56, 'UM.050/S1.51/SKPI/VIII/2020', 6, 56, 3, 22900, 1, '2020-09-14'),
(57, 'UM.050/S1.41/SKPI/V/2020', 4, 67, 3, 79200, 1, '2020-09-14'),
(58, 'UM.050/S1.41/SKPI/V/2020', 6, 67, 3, 46300, 1, '2020-09-14'),
(59, 'UM.050/S1.54/SKPI/VIII/2020', 4, 68, 3, 33100, 1, '2020-09-14'),
(60, 'UM.050/S1.54/SKPI/VIII/2020', 6, 68, 3, 18900, 1, '2020-09-14'),
(61, 'UM.050/S1.53/SKPI/VIII/2020', 4, 69, 3, 17400, 1, '2020-09-14'),
(62, 'UM.050/S1.53/SKPI/VIII/2020', 6, 69, 3, 10200, 1, '2020-09-14'),
(63, 'UM.050/S1.52/SKPI/VIII/2020', 4, 81, 3, 71000, 1, '2020-09-14'),
(64, 'UM.050/S1.52/SKPI/VIII/2020', 6, 81, 3, 19700, 1, '2020-09-14'),
(65, 'UM.050/S1.410/SKPI/VIII/2020', 4, 97, 3, 63000, 1, '2020-09-14'),
(66, 'UM.050/S1.410/SKPI/VIII/2020', 6, 97, 3, 21600, 1, '2020-09-14'),
(67, 'ID-LA-18-03-248-003-11', 1, 9, 2, 1335, 1, '2020-09-15'),
(68, 'ID-LA-18-03-248-003-11', 2, 9, 2, 415, 1, '2020-09-15'),
(69, 'ID-LA-18-03-248-003-11', 6, 9, 2, 960, 1, '2020-09-15'),
(70, 'ID-LA-18-03-248-002-11', 1, 47, 2, 34868, 1, '2020-09-15'),
(71, 'ID-LA-18-03-248-002-11', 2, 47, 2, 934, 1, '2020-09-15'),
(72, 'ID-LA-18-03-248-002-11', 6, 47, 2, 9142, 1, '2020-09-15'),
(73, 'ID-LA-18-03-248-001-11', 1, 73, 2, 3846, 1, '2020-09-15'),
(74, 'ID-LA-18-03-248-001-11', 2, 73, 2, 765, 1, '2020-09-15'),
(75, 'ID-LA-18-03-248-001-11', 6, 73, 2, 1532, 1, '2020-09-15'),
(76, 'ID-LA-18-03-248-005-11', 1, 76, 2, 8229, 1, '2020-09-15'),
(77, 'ID-LA-18-03-248-005-11', 2, 76, 2, 7523, 1, '2020-09-15'),
(78, 'ID-LA-18-03-248-005-11', 6, 76, 2, 3120, 1, '2020-09-15'),
(79, 'ID-LA-18-03-241-009-11', 1, 77, 2, 4500, 1, '2020-09-15'),
(80, 'ID-LA-18-03-241-009-11', 2, 77, 2, 7364, 1, '2020-09-15'),
(81, 'ID-LA-18-03-241-009-11', 6, 77, 2, 2207, 1, '2020-09-15'),
(82, 'ID-LA-18-03-248-004-11', 1, 79, 2, 7590, 1, '2020-09-15'),
(83, 'ID-LA-18-03-248-004-11', 2, 79, 2, 20865, 1, '2020-09-15'),
(84, 'ID-LA-18-03-248-004-11', 6, 79, 2, 4045, 1, '2020-09-15'),
(85, 'ID-LA-02-01-238-001-11', 4, 92, 3, 16537, 1, '2020-09-18'),
(86, 'ID-LA-02-01-238-001-11', 6, 92, 3, 9472, 1, '2020-09-18'),
(87, 'ID-LA-14-02-259-020-11', 4, 33, 3, 54650, 1, '2020-09-21'),
(88, 'ID-LA-14-02-259-020-11', 6, 33, 3, 43953, 1, '2020-09-21'),
(89, 'ID-LA-14-02-258-020-11', 6, 35, 3, 92541, 1, '2020-09-21'),
(90, 'ID-LA-14-02-258-020-11', 6, 35, 3, 70441, 1, '2020-09-21'),
(91, 'ID-LA-14-02-258-002-11', 4, 70, 3, 42299, 1, '2020-09-21'),
(92, 'ID-LA-14-02-258-002-11', 6, 70, 3, 40375, 1, '2020-09-21'),
(93, 'ID-LA-14-02-259-010-11', 4, 93, 3, 46736, 1, '2020-09-21'),
(94, 'ID-LA-14-02-259-010-11', 6, 93, 3, 41374, 1, '2020-09-21'),
(95, 'ID-LA-02-02-259-012-11', 4, 28, 3, 22631, 1, '2020-09-22'),
(96, 'ID-LA-02-02-259-012-11', 6, 28, 3, 11854, 1, '2020-09-22'),
(97, 'ID-LA-02-02-259-005-11', 4, 32, 3, 38678, 1, '2020-09-22'),
(98, 'ID-LA-02-02-259-005-11', 6, 32, 3, 47471, 1, '2020-09-22'),
(99, 'ID-LA-02-02-259-001-11', 4, 39, 3, 32857, 1, '2020-09-22'),
(100, 'ID-LA-02-02-259-001-11', 6, 39, 3, 37207, 1, '2020-09-22'),
(101, 'ID-LA-02-02-259-014-11', 4, 82, 3, 19353, 1, '2020-09-22'),
(102, 'ID-LA-02-02-259-014-11', 6, 82, 3, 14385, 1, '2020-09-22'),
(103, 'ID-LA-02-02-259-010-11', 4, 84, 3, 18169, 1, '2020-09-22'),
(104, 'ID-LA-02-02-259-010-11', 6, 84, 3, 14569, 1, '2020-09-22'),
(105, 'ID-LA-06-04-204-005-11', 4, 37, 3, 41000, 1, '2020-09-23'),
(106, 'ID-LA-06-04-204-005-11', 6, 37, 3, 13000, 1, '2020-09-23'),
(107, 'ID-LA-06-01-216-004-11', 4, 98, 3, 48000, 1, '2020-09-23'),
(108, 'ID-LA-06-01-216-004-11', 6, 98, 3, 23500, 1, '2020-09-23'),
(109, 'ID-LA-06-01-169-001-11', 6, 27, 3, 28750, 1, '2020-09-24'),
(110, 'ID-LA-06-01-167-003-11', 6, 78, 3, 10650, 1, '2020-09-24'),
(111, 'ID-LA-06-01-132-007-11', 6, 91, 3, 30350, 1, '2020-09-24'),
(112, 'ID-LA-06-01-171-001-11', 6, 99, 3, 24150, 1, '2020-09-24'),
(113, '523/511/UPTD/PPI-TPI/IX/2020', 4, 5, 1, 54363, 1, '2020-09-29'),
(114, '523/511/UPTD/PPI-TPI/IX/2020', 6, 5, 1, 27992, 1, '2020-09-29'),
(115, '523/511/UPTD/PPI-TPI/IX/2020', 4, 5, 3, 6229, 1, '2020-09-29'),
(116, '523/511/UPTD/PPI-TPI/IX/2020', 6, 5, 3, 2319, 1, '2020-09-29'),
(117, '523/523/UPTD/PPI-TPI/V/2020', 1, 6, 1, 51974, 1, '2020-09-29'),
(118, '523/523/UPTD/PPI-TPI/V/2020', 6, 6, 1, 277932, 1, '2020-09-29'),
(119, '523/524/UPTD/PPI-TPI/VI/2020', 1, 6, 4, 15991, 1, '2020-09-29'),
(120, '523/524/UPTD/PPI-TPI/VI/2020', 6, 6, 4, 79314, 1, '2020-09-29'),
(121, '523/517/UPTD/PPI-TPI/IX/2020', 5, 11, 1, 58704, 1, '2020-09-29'),
(122, '523/517/UPTD/PPI-TPI/IX/2020', 6, 11, 1, 17720, 1, '2020-09-29'),
(123, '523/513/UPTD/PPI-TPI/IX/2020', 2, 13, 1, 75544, 1, '2020-09-29'),
(124, '523/513/UPTD/PPI-TPI/IX/2020', 6, 11, 1, 19538, 1, '2020-09-29'),
(125, '523/527/UPTD/PPI-TPI/V/2020', 1, 14, 1, 52106, 1, '2020-09-29'),
(126, '523/527/UPTD/PPI-TPI/V/2020', 6, 14, 1, 281779, 1, '2020-09-29'),
(127, '523/518/UPTD/PPI-TPI/IX/2020', 5, 15, 3, 58869, 1, '2020-09-29'),
(128, '523/518/UPTD/PPI-TPI/IX/2020', 6, 15, 3, 31152, 1, '2020-09-29'),
(129, '523/519/UPTD/PPI-TPI/IX/2020', 1, 17, 1, 11962, 1, '2020-09-29'),
(130, '523/519/UPTD/PPI-TPI/IX/2020', 6, 17, 1, 68295, 1, '2020-09-29'),
(131, '523/512/UPTD/PPI-TPI/IX/2020', 4, 30, 1, 72217, 1, '2020-09-29'),
(132, '523/512/UPTD/PPI-TPI/IX/2020', 6, 30, 1, 20254, 1, '2020-09-29'),
(133, '523/510/UPTD/PPI-TPI/IX/2020', 4, 38, 1, 67389, 1, '2020-09-29'),
(134, '523/510/UPTD/PPI-TPI/IX/2020', 6, 38, 1, 22204, 1, '2020-09-29'),
(135, '523/520/UPTD/PPI-TPI/IX/2020', 1, 41, 1, 14139, 1, '2020-09-29'),
(136, '523/520/UPTD/PPI-TPI/IX/2020', 6, 41, 1, 66720, 1, '2020-09-29'),
(137, '523/515/UPTD/PPI-TPI/IX/2020', 2, 45, 1, 73951, 1, '2020-09-29'),
(138, '523/515/UPTD/PPI-TPI/IX/2020', 6, 45, 1, 20534, 1, '2020-09-29'),
(139, '523/522/UPTD/PPI-TPI/IX/2020', 1, 49, 1, 11281, 1, '2020-09-29'),
(140, '523/522/UPTD/PPI-TPI/IX/2020', 6, 49, 1, 57174, 1, '2020-09-29'),
(141, '523/516/UPTD/PPI-TPI/IX/2020', 5, 83, 1, 67848, 1, '2020-09-29'),
(142, '523/516/UPTD/PPI-TPI/IX/2020', 6, 83, 1, 17748, 1, '2020-09-29'),
(143, '523/521/UPTD/PPI-TPI/IX/2020', 1, 86, 1, 14240, 1, '2020-09-29'),
(144, '523/521/UPTD/PPI-TPI/IX/2020', 6, 86, 1, 68466, 1, '2020-09-29'),
(145, '523/514/UPTD/PPI-TPI/IX/2020', 2, 88, 1, 50961, 1, '2020-09-29'),
(146, '523/514/UPTD/PPI-TPI/IX/2020', 6, 88, 1, 19086, 1, '2020-09-29'),
(147, 'ID-LA-33-01-210-002-11', 4, 1, 3, 22100, 1, '2020-10-01'),
(148, 'ID-LA-33-01-136-002-11', 4, 72, 3, 20400, 1, '2020-10-01'),
(149, 'ID-LA-33-01-136-002-11', 6, 72, 3, 9200, 1, '2020-10-01'),
(150, 'ID-LA-51-01-161-008-11', 4, 24, 3, 6392, 1, '2020-10-01'),
(151, 'ID-LA-51-01-161-008-11', 6, 24, 3, 350, 1, '2020-10-01'),
(152, 'ID-LA-33-01-224-001-11', 4, 25, 3, 800, 1, '2020-10-01'),
(153, 'ID-LA-33-01-224-001-11', 6, 25, 3, 126, 1, '2020-10-01'),
(154, 'ID-LA-33-01-223-002-11', 4, 26, 3, 6925, 1, '2020-10-01'),
(155, 'ID-LA-33-01-223-002-11', 6, 26, 3, 120, 1, '2020-10-01'),
(156, 'ID-LA-33-01-224-003-11', 4, 34, 3, 6008, 1, '2020-10-01'),
(157, 'ID-LA-33-01-224-003-11', 6, 34, 3, 151, 1, '2020-10-01'),
(158, 'ID-LA-33-01-217-005-11', 4, 43, 3, 13910, 1, '2020-10-02'),
(159, 'ID-LA-33-01-217-005-11', 6, 43, 3, 15690, 1, '2020-10-02'),
(160, '523/518/UPTD/PPI-TPI/IX/2020', 4, 71, 4, 34903, 1, '2020-10-07'),
(162, '523/516/UPTD/PPI-TPI/IX/2020', 4, 85, 4, 30653, 1, '2020-10-07'),
(163, '523/516/UPTD/PPI-TPI/IX/2020', 6, 85, 4, 33856, 1, '2020-10-07'),
(164, '523/517/UPTD/PPI-TPI/IX/2020', 4, 101, 4, 35042, 1, '2020-10-07'),
(165, '523/517/UPTD/PPI-TPI/IX/2020', 6, 101, 4, 33084, 1, '2020-10-07'),
(166, 'ID-LA-01-01-259-001-11', 1, 89, 4, 42, 1, '2020-10-08'),
(167, 'ID-LA-01-01-259-001-11', 3, 89, 4, 5095, 1, '2020-10-08'),
(168, 'ID-LA-01-01-259-001-11', 6, 89, 4, 3023, 1, '2020-10-08'),
(169, 'ID-LA-01-01-258-006-11', 4, 90, 4, 23980, 1, '2020-10-08'),
(170, 'ID-LA-01-01-258-006-11', 6, 90, 4, 9245, 1, '2020-10-08'),
(171, 'ID-LA-18-03-276-010-11', 1, 8, 2, 18404, 1, '2020-10-05'),
(172, 'ID-LA-18-03-276-010-11', 2, 8, 2, 39736, 1, '2020-10-05'),
(173, 'ID-LA-18-03-276-010-11', 6, 8, 2, 52204, 1, '2020-10-05'),
(174, 'ID-LA-18-03-276-020-11', 1, 9, 2, 16037, 1, '2020-10-05'),
(175, 'ID-LA-18-03-276-020-11', 2, 9, 2, 14096, 1, '2020-10-05'),
(176, 'ID-LA-18-03-276-020-11', 6, 9, 2, 23316, 1, '2020-10-05'),
(177, 'ID-LA-18-03-276-017-11', 1, 16, 2, 14000, 1, '2020-10-05'),
(178, 'ID-LA-18-03-276-017-11', 2, 16, 2, 30369, 1, '2020-10-05'),
(179, 'ID-LA-18-03-276-017-11', 6, 16, 2, 24080, 1, '2020-10-05'),
(180, 'ID-LA-18-03-276-003-11', 1, 29, 2, 2745, 1, '2020-10-05'),
(181, 'ID-LA-18-03-276-003-11', 2, 29, 2, 14345, 1, '2020-10-05'),
(182, 'ID-LA-18-03-276-003-11', 6, 29, 2, 14000, 1, '2020-10-05'),
(183, 'ID-LA-18-03-276-004-11', 1, 31, 2, 21472, 1, '2020-10-05'),
(184, 'ID-LA-18-03-276-004-11', 2, 31, 2, 15704, 1, '2020-10-05'),
(185, 'ID-LA-18-03-276-004-11', 6, 31, 2, 10363, 1, '2020-10-05'),
(186, 'ID-LA-18-03-276-001-11', 1, 40, 2, 291, 1, '2020-10-05'),
(187, 'ID-LA-18-03-276-001-11', 2, 40, 2, 14400, 1, '2020-10-05'),
(188, 'ID-LA-18-03-276-001-11', 6, 40, 2, 11465, 1, '2020-10-05'),
(189, 'ID-LA-18-03-276-019-11', 1, 44, 2, 2337, 1, '2020-10-05'),
(190, 'ID-LA-18-03-276-019-11', 2, 44, 2, 22570, 1, '2020-10-05'),
(191, 'ID-LA-18-03-276-019-11', 6, 44, 2, 18470, 1, '2020-10-05'),
(192, 'ID-LA-18-03-276-014-11', 1, 46, 2, 3113, 1, '2020-10-05'),
(193, 'ID-LA-18-03-276-014-11', 2, 46, 2, 12223, 1, '2020-10-05'),
(194, 'ID-LA-18-03-276-014-11', 6, 46, 2, 17070, 1, '2020-10-05'),
(195, 'ID-LA-18-03-276-012-11', 1, 48, 2, 1801, 1, '2020-10-05'),
(196, 'ID-LA-18-03-276-012-11', 2, 48, 2, 9650, 1, '2020-10-05'),
(197, 'ID-LA-18-03-276-012-11', 6, 48, 2, 13945, 1, '2020-10-05'),
(198, 'ID-LA-18-03-276-002-11', 1, 74, 2, 269, 1, '2020-10-05'),
(199, 'ID-LA-18-03-276-002-11', 2, 74, 2, 15300, 1, '2020-10-05'),
(200, 'ID-LA-18-03-276-002-11', 6, 74, 2, 11850, 1, '2020-10-05'),
(201, 'ID-LA-18-03-276-007-11', 1, 77, 2, 4794, 1, '2020-10-05'),
(202, 'ID-LA-18-03-276-007-11', 2, 77, 2, 16368, 1, '2020-10-05'),
(203, 'ID-LA-18-03-276-007-11', 6, 77, 2, 30790, 1, '2020-10-05'),
(204, 'ID-LA-18-03-276-016-11', 1, 95, 2, 7405, 1, '2020-10-05'),
(205, 'ID-LA-18-03-276-016-11', 2, 95, 2, 18282, 1, '2020-10-05'),
(206, 'ID-LA-18-03-276-016-11', 6, 95, 2, 12712, 1, '2020-10-05'),
(207, 'ID-LA-18-03-276-005-11', 1, 96, 2, 2879, 1, '2020-10-05'),
(208, 'ID-LA-18-03-276-005-11', 2, 96, 2, 13279, 1, '2020-10-05'),
(209, 'ID-LA-18-03-276-005-11', 6, 96, 2, 13160, 1, '2020-10-05'),
(210, 'ID-LA-18-03-276-018-11', 1, 4, 2, 3021, 1, '2020-10-05'),
(211, 'ID-LA-18-03-276-018-11', 2, 4, 2, 24466, 1, '2020-10-05'),
(212, 'ID-LA-18-03-276-018-11', 6, 4, 2, 11851, 1, '2020-10-05'),
(214, '523/518/UPTD/PPI-TPI/IX/2020', 6, 71, 4, 33313, 1, '2020-10-07'),
(219, 'ID-LA-02-01-282-001-11', 4, 12, 3, 106994, 1, '2020-10-14'),
(220, 'ID-LA-02-01-282-001-11', 6, 12, 3, 95825, 1, '2020-10-14'),
(221, 'ID-LA-02-01-282-020-11', 4, 18, 3, 18752, 1, '2020-10-14'),
(222, 'ID-LA-02-01-282-020-11', 6, 18, 3, 14125, 1, '2020-10-14'),
(223, 'ID-LA-02-01-282-024-11', 4, 32, 3, 20078, 1, '2020-10-14'),
(224, 'ID-LA-02-01-282-024-11', 6, 32, 3, 14388, 1, '2020-10-14'),
(225, 'ID-LA-02-01-282-013-11', 4, 75, 3, 62284, 1, '2020-10-14'),
(226, 'ID-LA-02-01-282-013-11', 6, 75, 3, 54994, 1, '2020-10-14'),
(227, 'ID-LA-02-01-282-022-11', 4, 94, 3, 15571, 1, '2020-10-14'),
(228, 'ID-LA-02-01-282-022-11', 6, 94, 3, 15442, 1, '2020-10-14'),
(229, 'ID-LA-22-02-265-018-11', 4, 33, 3, 96131, 1, '2020-10-16'),
(230, 'ID-LA-22-02-265-018-11', 6, 33, 3, 29299, 1, '2020-10-16'),
(231, 'ID-LA-51-01-274-005-11', 4, 23, 3, 1811, 1, '2020-10-19'),
(232, 'ID-LA-51-01-274-005-11', 6, 23, 3, 102, 1, '2020-10-16'),
(233, 'ID-LA-51-01-274-006-11', 4, 24, 3, 6250, 1, '2020-10-19'),
(234, 'ID-LA-51-01-274-006-11', 6, 24, 3, 950, 1, '2020-10-19'),
(235, 'ID-LA-51-01-274-007-11', 4, 26, 3, 10458, 1, '2020-10-19'),
(236, 'ID-LA-51-01-274-007-11', 6, 26, 3, 161, 1, '2020-10-19'),
(237, 'ID-LA-51-01-274-011-11', 4, 34, 3, 14226, 1, '2020-10-19'),
(238, 'ID-LA-51-01-274-011-11', 6, 34, 3, 2796, 1, '2020-10-19'),
(239, 'ID-LA-33-01-255-001-11', 4, 36, 3, 6885, 1, '2020-10-19'),
(240, 'ID-LA-33-01-255-001-11', 6, 36, 3, 283, 1, '2020-10-19'),
(241, 'ID-LA-51-01-274-015-11', 4, 100, 3, 6157, 1, '2020-10-19'),
(242, 'ID-LA-51-01-274-015-11', 6, 100, 3, 221, 1, '2020-10-19'),
(243, 'ID-LA-01-01-265-001-11', 2, 10, 4, 5657, 1, '2020-10-19'),
(244, 'ID-LA-01-01-265-001-11', 4, 10, 4, 56190, 1, '2020-10-19'),
(245, 'ID-LA-06-01-198-004-11', 4, 20, 3, 21500, 1, '2020-10-23'),
(246, 'ID-LA-06-01-216-006-11', 4, 98, 3, 3800, 1, '2020-10-23'),
(247, 'ID-LA-06-01-216-006-11', 6, 98, 3, 2200, 1, '2020-10-23'),
(248, '523/755/UPTD/PPI-TPI/IX/2020', 1, 6, 1, 11563, 1, '2020-10-28'),
(249, '523/755/UPTD/PPI-TPI/IX/2020', 6, 6, 1, 72829, 1, '2020-10-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `status_user`) VALUES
(1, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(2, 'Hada', 'd47ed0194cf5ddb1bb5460d4f5e2b54a', 'Employee');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `kapal`
--
ALTER TABLE `kapal`
  ADD PRIMARY KEY (`id_kapal`);

--
-- Indeks untuk tabel `tangkap`
--
ALTER TABLE `tangkap`
  ADD PRIMARY KEY (`id_catch`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kapal`
--
ALTER TABLE `kapal`
  MODIFY `id_kapal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `tangkap`
--
ALTER TABLE `tangkap`
  MODIFY `id_catch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
