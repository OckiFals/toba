-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 19 Des 2015 pada 06.56
-- Versi Server: 10.0.21-MariaDB
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toba`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE `account` (
  `id` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `type` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`id`, `password`, `type`, `name`, `created_at`) VALUES
('gajahmungkur', '21232f297a57a5a743894a0e4a801fc3', 2, 'Gajah Mungkur Sejahtera', '2015-11-21 08:01:47'),
('kopama', '21232f297a57a5a743894a0e4a801fc3', 2, 'Koperasi Angkutan Malang', '2015-12-10 14:28:56'),
('root', '21232f297a57a5a743894a0e4a801fc3', 1, 'Pemilik Akun Dewa', '2015-11-16 03:13:06'),
('rosalia', '21232f297a57a5a743894a0e4a801fc3', 2, 'Rosalia Indah', '2015-12-10 14:26:10'),
('widya', '21232f297a57a5a743894a0e4a801fc3', 2, 'Widya', '2015-12-10 14:24:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bus`
--

CREATE TABLE `bus` (
  `id` int(10) NOT NULL,
  `po` varchar(16) NOT NULL,
  `bus_name` varchar(15) NOT NULL,
  `destination` varchar(5) NOT NULL,
  `class` int(5) NOT NULL COMMENT '1 Executive; 2 Business; 3 Economy',
  `capacity` int(5) NOT NULL,
  `ticket_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bus`
--

INSERT INTO `bus` (`id`, `po`, `bus_name`, `destination`, `class`, `capacity`, `ticket_price`) VALUES
(3, 'rosalia', 'Arjuno', 'JGJ', 1, 48, 135000),
(4, 'rosalia', 'Bimasena', 'JKT', 2, 52, 225000),
(5, 'gajahmungkur', 'Mayasari Bhakti', 'JGJ', 3, 50, 78000),
(6, 'kopama', 'SLOTIP', 'SMRG', 2, 42, 140000),
(7, 'kopama', 'SMRG20', 'SMRG', 1, 42, 220000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `destination`
--

CREATE TABLE `destination` (
  `id` int(4) NOT NULL,
  `alias` varchar(5) NOT NULL,
  `region` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `destination`
--

INSERT INTO `destination` (`id`, `alias`, `region`) VALUES
(1, 'jkt', 'Jakarta'),
(2, 'jgj', 'Jogjakarta'),
(3, 'sby', 'Surabaya'),
(4, 'kdri', 'Kediri'),
(5, 'slo', 'Solo'),
(6, 'smrg', 'Semarang'),
(7, 'pmlg', 'Pemalang'),
(8, 'crb', 'Cirebon'),
(9, 'dnps', 'Denpasar'),
(10, 'bngkl', 'Bangkalan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `reservation_id` int(11) NOT NULL,
  `account_holder` varchar(32) NOT NULL,
  `transfer_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `payment`
--

INSERT INTO `payment` (`id`, `reservation_id`, `account_holder`, `transfer_time`) VALUES
(1, 6, 'Sugirwa', '2015-12-11 20:00:00'),
(2, 5, 'Subali', '2015-12-12 01:00:00'),
(8, 6, 'Sugirwa', '2015-12-19 18:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `po`
--

CREATE TABLE `po` (
  `id` varchar(16) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `po`
--

INSERT INTO `po` (`id`, `name`) VALUES
('gajahmungkur', 'Gajah Mungkur Sejahtera'),
('kopama', 'Koperasi Angkutan Malang'),
('rosalia', 'Rosalia Indah'),
('widya', 'Widya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `po_id` varchar(16) NOT NULL,
  `booking_code` varchar(20) NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` int(11) DEFAULT '1' COMMENT '1: new; 2: confirm; 3:validate'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reservation`
--

INSERT INTO `reservation` (`id`, `po_id`, `booking_code`, `customer_name`, `phone`, `status`) VALUES
(5, 'kopama', 'SLOTIP6-49-5', 'Subali', '08567757000', 3),
(6, 'kopama', 'SLOTIP6-49-6', 'Sugirwa', '08567757000', 3),
(7, 'gajahmungkur', 'MAYASARI5-25-7', 'Dyah Pitaloka R C', '08567757000', 1),
(8, 'kopama', 'SMRG207-37-8', 'Dyah Pitaloka R C', '08567757000', 1),
(9, 'kopama', 'SMRG207-38-9', 'Rendra Genta', '085677570222', 1),
(10, 'kopama', 'SMRG207-37-10', 'Dyah Pitaloka R C', '085677570222', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `schedule`
--

INSERT INTO `schedule` (`id`, `bus_id`, `time`) VALUES
(24, 5, '2015-12-19 12:53:00'),
(25, 5, '2015-12-19 08:25:00'),
(26, 5, '2015-12-26 08:25:00'),
(27, 5, '2016-01-02 08:25:00'),
(28, 5, '2016-01-09 08:25:00'),
(29, 5, '2016-01-16 08:25:00'),
(30, 5, '2016-01-23 08:25:00'),
(31, 5, '2016-01-30 08:25:00'),
(32, 5, '2016-02-06 08:25:00'),
(33, 5, '2016-02-13 08:25:00'),
(34, 5, '2016-02-20 08:25:00'),
(36, 7, '2015-12-21 04:15:00'),
(37, 7, '2015-12-28 04:15:00'),
(38, 7, '2016-01-04 04:15:00'),
(39, 7, '2016-01-11 04:15:00'),
(40, 7, '2016-01-18 04:15:00'),
(41, 7, '2016-01-25 04:15:00'),
(42, 7, '2016-02-01 04:15:00'),
(43, 7, '2016-02-08 04:15:00'),
(44, 7, '2016-02-15 04:15:00'),
(45, 7, '2016-02-22 04:15:00'),
(46, 7, '2016-02-29 04:15:00'),
(47, 3, '2015-12-14 07:35:00'),
(48, 6, '2015-12-21 07:35:00'),
(49, 6, '2015-12-28 07:35:00'),
(50, 6, '2016-01-04 07:35:00'),
(51, 6, '2016-01-11 07:35:00'),
(52, 6, '2016-01-18 07:35:00'),
(53, 6, '2016-01-25 07:35:00'),
(54, 6, '2016-02-01 07:35:00'),
(55, 6, '2016-02-08 07:35:00'),
(56, 6, '2016-02-15 07:35:00'),
(57, 6, '2016-02-22 07:35:00'),
(58, 6, '2016-02-29 07:35:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `passenger_name` varchar(20) NOT NULL,
  `identity_no` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `schedule_id` int(10) NOT NULL,
  `reservation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ticket`
--

INSERT INTO `ticket` (`id`, `passenger_name`, `identity_no`, `date_of_birth`, `schedule_id`, `reservation_id`) VALUES
(1, 'Subali', '135150200000', '1998-12-11', 49, 5),
(2, 'Subali', '135150200000', '1998-02-20', 49, 6),
(3, 'Sugirwa', '13515020001', '1996-12-26', 49, 6),
(4, 'Dyah Pitaloka R C', '135150200000', '1996-02-23', 25, 7),
(5, 'Rendra Genta', '135150200034', '2012-12-12', 38, 9),
(6, 'Dyah Pitaloka R C', '135150200034', '1996-12-12', 37, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `po_name` (`po`) USING BTREE,
  ADD KEY `destination` (`destination`) USING BTREE;

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservation_id` (`reservation_id`) USING BTREE;

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bus_id` (`po_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `bus_id` (`bus_id`) USING BTREE;

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idBus` (`schedule_id`),
  ADD KEY `idReservasi` (`reservation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_ibfk_2` FOREIGN KEY (`po`) REFERENCES `po` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bus_ibfk_3` FOREIGN KEY (`destination`) REFERENCES `destination` (`alias`);

--
-- Ketidakleluasaan untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `po`
--
ALTER TABLE `po`
  ADD CONSTRAINT `po_ibfk_1` FOREIGN KEY (`id`) REFERENCES `account` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`po_id`) REFERENCES `po` (`id`);

--
-- Ketidakleluasaan untuk tabel `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
