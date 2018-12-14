-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2018 at 02:38 AM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hoitruong`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `MSCB` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TenCB` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `SDTCB` int(12) NOT NULL,
  `EmailCB` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `pass` int(10) NOT NULL,
  PRIMARY KEY (`MSCB`),
  UNIQUE KEY `MSCB` (`MSCB`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`MSCB`, `TenCB`, `SDTCB`, `EmailCB`, `pass`) VALUES
('b123', 'Nguyen Van A', 99999999, 'a123@gmail', 1234);

-- --------------------------------------------------------

--
-- Table structure for table `bomon`
--

CREATE TABLE IF NOT EXISTS `bomon` (
  `MaBoMon` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TenBM` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `MSCB` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaBoMon`),
  KEY `TenBM` (`TenBM`),
  KEY `fk_bomon` (`MSCB`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bomon`
--

INSERT INTO `bomon` (`MaBoMon`, `TenBM`, `MSCB`) VALUES
('KHMT', 'Khoa học máy tính', NULL),
('KTPM', 'Kỹ thuật phần mềm', NULL),
('MMTTT', 'Mạng máy tính', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ca`
--

CREATE TABLE IF NOT EXISTS `ca` (
  `MaCa` int(5) NOT NULL,
  `TenCa` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `MSCB` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaCa`),
  KEY `ca_ibfk_1` (`MSCB`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ca`
--

INSERT INTO `ca` (`MaCa`, `TenCa`, `MSCB`) VALUES
(1, 'Sáng', 'b123'),
(2, 'Chiều', 'b123');

-- --------------------------------------------------------

--
-- Table structure for table `chitiettb`
--

CREATE TABLE IF NOT EXISTS `chitiettb` (
  `SoLuong` int(11) NOT NULL,
  `stt` int(5) NOT NULL,
  `MaTB` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `MaHT` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`stt`),
  KEY `chitiettb_ibfk_2` (`MaTB`),
  KEY `chitiettb_ibfk_1` (`MaHT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitiettb`
--

INSERT INTO `chitiettb` (`SoLuong`, `stt`, `MaTB`, `MaHT`) VALUES
(1, 0, 'B01', 'HT1'),
(100, 2, 'MS01', 'HT1'),
(2, 3, 'DH01', 'HT1'),
(5, 4, 'Mi01', 'HT1'),
(1, 5, 'BHT01', 'HT1'),
(1, 6, 'M01', 'HT1'),
(1, 7, 'Mi02', 'HT1'),
(1, 8, 'P01', 'HT1'),
(1, 9, 'W01', 'HT1'),
(1, 10, 'B01', 'HT2'),
(1, 11, 'BHT01', 'HT2'),
(1, 12, 'BT01', 'HT2'),
(4, 13, 'DH01', 'HT2'),
(1, 14, 'M01', 'HT2'),
(5, 15, 'Mi01', 'HT2'),
(1, 16, 'Mi02', 'HT2'),
(500, 17, 'MS01', 'HT2'),
(1, 18, 'P01', 'HT2');

-- --------------------------------------------------------

--
-- Table structure for table `giangvien`
--

CREATE TABLE IF NOT EXISTS `giangvien` (
  `stt` int(11) NOT NULL AUTO_INCREMENT,
  `MaSo` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `MaBoMon` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`stt`),
  KEY `giangvien_ibfk_1` (`MaSo`),
  KEY `giangvien_ibfk_2` (`MaBoMon`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `giangvien`
--

INSERT INTO `giangvien` (`stt`, `MaSo`, `MaBoMon`) VALUES
(1, 'gv1234', 'MMTTT'),
(3, '34t3', 'MMTTT');

-- --------------------------------------------------------

--
-- Table structure for table `hoitruong`
--

CREATE TABLE IF NOT EXISTS `hoitruong` (
  `MaHT` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TenHT` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `SoCho` int(3) NOT NULL,
  `DiaDiem` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MSCB` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaHT`),
  KEY `fk_ht` (`MSCB`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoitruong`
--

INSERT INTO `hoitruong` (`MaHT`, `TenHT`, `SoCho`, `DiaDiem`, `MSCB`) VALUES
('HT1', 'hội trường 1', 100, 'lầu 1 KHOA CNTT', 'b123'),
('HT2', 'Hội trường 2', 500, 'Lầu 2, khoa CNTT & TT', 'b123');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE IF NOT EXISTS `lop` (
  `MaLop` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TenLop` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `MaNganh` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MSCB` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaLop`),
  UNIQUE KEY `MaLop` (`MaLop`),
  KEY `fk_lop` (`MSCB`),
  KEY `fk_nganh` (`MaNganh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`MaLop`, `TenLop`, `MaNganh`, `MSCB`) VALUES
('DI1A1', 'Hệ thống thông tin A1', 'HTTT', 'b123'),
('DI1A2', 'Hệ thống thông tin A2', 'CNTT', 'b123'),
('DI2A1', 'Công nghệ thông tin A1', 'CNTT', NULL),
('dvcd', 'sxdcsd', 'CNTT', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nganh`
--

CREATE TABLE IF NOT EXISTS `nganh` (
  `MaNganh` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TenNganh` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `MSCB` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaNganh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nganh`
--

INSERT INTO `nganh` (`MaNganh`, `TenNganh`, `MSCB`) VALUES
('CNTT', 'Công nghệ thông tin', NULL),
('HTTT', 'Hệ thống thông tin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nguoimuon`
--

CREATE TABLE IF NOT EXISTS `nguoimuon` (
  `MaSo` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `HoTen` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` char(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` int(10) NOT NULL,
  `MSCB` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaSo`),
  UNIQUE KEY `MaSo` (`MaSo`),
  KEY `nguoimuon_ibfk_1` (`MSCB`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nguoimuon`
--

INSERT INTO `nguoimuon` (`MaSo`, `HoTen`, `Email`, `SDT`, `username`, `password`, `MSCB`) VALUES
('34t3', 'rw4r544r', '3er4@', '114424', 'r43', 2434, 'b123'),
('b1234', 'Nguyễn Thị B', 'ntb@gmail', '01234567', 'ntb', 1234, 'b123'),
('b1235', 'Trần Văn D', 'tvd@gmail', '01234567', 'tvd', 1234, 'b123'),
('b1236', 'anna', 'a@', '1233', 'ad', 13345, 'b123'),
('gv1234', 'Lê Thị T', 'ltt@gmail', '01234567', 'llt', 1234, 'b123');

-- --------------------------------------------------------

--
-- Table structure for table `phieudk`
--

CREATE TABLE IF NOT EXISTS `phieudk` (
  `MaDK` int(4) NOT NULL AUTO_INCREMENT,
  `NgayDK` datetime NOT NULL,
  `NgayMuon` date NOT NULL,
  `Tinhtrang` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Mucdich` text COLLATE utf8_unicode_ci NOT NULL,
  `MaSo` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaHT` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MSCB` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaCa` int(5) DEFAULT NULL,
  PRIMARY KEY (`MaDK`),
  UNIQUE KEY `MaDK` (`MaDK`),
  KEY `MaDK_2` (`MaDK`),
  KEY `MSCB` (`MSCB`),
  KEY `MaHT` (`MaHT`),
  KEY `MaCa` (`MaCa`),
  KEY `MaSo` (`MaSo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `phieudk`
--

INSERT INTO `phieudk` (`MaDK`, `NgayDK`, `NgayMuon`, `Tinhtrang`, `Mucdich`, `MaSo`, `MaHT`, `MSCB`, `MaCa`) VALUES
(2, '2018-04-03 00:00:00', '2018-04-22', 'đã xét duyệt', 'Tổ chức chuyên đề', 'b1235', 'HT1', 'b123', 1),
(3, '2018-05-29 00:00:00', '2018-05-31', 'đã xét duyệt', 'vfwsfgvwrg', 'b1234', 'HT1', 'b123', 2),
(14, '2018-04-30 00:00:00', '2018-05-08', 'Hủy', 'asdfyujkm fhjk\r\nl;;ojo', 'gv1234', 'HT2', NULL, 2),
(15, '2018-01-08 06:13:00', '2018-01-16', 'Đã hủy', 'qadwr frfrg', 'gv1234', 'HT2', 'b123', 1),
(16, '2018-02-01 06:13:00', '2018-02-12', 'Đã hủy', 'wsfrwe dsfer', 'b1236', 'HT1', 'b123', 1),
(17, '2018-03-01 06:13:00', '2018-03-12', 'đã xét duyệt', 'dewqdws\r\nxdasdawssd', 'b1235', 'HT1', 'b123', 2),
(18, '2018-06-08 06:13:00', '2018-06-16', 'đã xét duyệt', 'qadwr frfrg', 'gv1234', 'HT2', 'b123', 1),
(19, '2018-07-01 06:13:00', '2018-07-12', 'đã xét duyệt', 'wsfrwe dsfer', 'b1236', 'HT1', 'b123', 1),
(20, '2018-08-08 06:13:00', '2018-08-16', 'Hủy', 'qadwr frfrg', 'gv1234', 'HT2', 'b123', 1),
(21, '2018-09-30 00:00:00', '2018-09-08', 'Hủy', 'asdfyujkm fhjk\r\nl;;ojo', 'gv1234', 'HT2', NULL, 2),
(22, '2018-10-08 06:13:00', '2018-10-16', 'đã xét duyệt', 'qadwr frfrg', 'gv1234', 'HT2', 'b123', 1),
(23, '2018-11-30 00:00:00', '2018-11-08', 'đã xét duyệt', 'asdfyujkm fhjk\r\nl;;ojo', 'gv1234', 'HT2', NULL, 2),
(24, '2018-12-03 00:00:00', '2018-12-22', 'Đã hủy', 'Tổ chức chuyên đề', 'b1235', 'HT1', 'b123', 1),
(25, '2018-05-08 06:13:00', '2018-05-16', 'đã xét duyệt', 'qadwr frfrg', 'gv1234', 'HT2', 'b123', 1),
(26, '2018-05-08 06:13:00', '2018-05-16', 'đã hủy', 'qadwr frfrg', 'gv1234', 'HT2', 'b123', 1),
(27, '2018-05-08 06:13:00', '2018-05-16', 'đã hủy', 'qadwr frfrg', 'gv1234', 'HT2', 'b123', 1),
(28, '2018-05-11 14:51:57', '2018-05-12', 'Đã hủy', 'dseafe', 'b1234', 'HT1', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sinhvien`
--

CREATE TABLE IF NOT EXISTS `sinhvien` (
  `stt` int(5) NOT NULL AUTO_INCREMENT,
  `MaSo` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `MaLop` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`stt`),
  KEY `sinhvien_ibfk_1` (`MaSo`),
  KEY `sinhvien_ibfk_2` (`MaLop`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sinhvien`
--

INSERT INTO `sinhvien` (`stt`, `MaSo`, `MaLop`) VALUES
(1, 'b1234', 'DI1A2'),
(2, 'b1235', NULL),
(3, 'b1236', 'DI1A2');

-- --------------------------------------------------------

--
-- Table structure for table `thietbi`
--

CREATE TABLE IF NOT EXISTS `thietbi` (
  `MaTB` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TenTB` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaTB`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thietbi`
--

INSERT INTO `thietbi` (`MaTB`, `TenTB`) VALUES
('B01', 'Bục'),
('BHT01', 'Bàn'),
('BT01', 'bảng trắng'),
('DH01', 'Máy điều hòa'),
('M01', 'Máy chiếu'),
('Mi01', 'Micro không dây'),
('Mi02', 'Micro cổ cò'),
('MS01', 'Ghế'),
('P01', 'Phông màn'),
('W01', 'Wifi');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bomon`
--
ALTER TABLE `bomon`
  ADD CONSTRAINT `fk_bomon` FOREIGN KEY (`MSCB`) REFERENCES `admin` (`MSCB`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `ca`
--
ALTER TABLE `ca`
  ADD CONSTRAINT `ca_ibfk_1` FOREIGN KEY (`MSCB`) REFERENCES `admin` (`MSCB`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `chitiettb`
--
ALTER TABLE `chitiettb`
  ADD CONSTRAINT `chitiettb_ibfk_1` FOREIGN KEY (`MaHT`) REFERENCES `hoitruong` (`MaHT`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitiettb_ibfk_2` FOREIGN KEY (`MaTB`) REFERENCES `thietbi` (`MaTB`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `giangvien`
--
ALTER TABLE `giangvien`
  ADD CONSTRAINT `giangvien_ibfk_1` FOREIGN KEY (`MaSo`) REFERENCES `nguoimuon` (`MaSo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giangvien_ibfk_2` FOREIGN KEY (`MaBoMon`) REFERENCES `bomon` (`MaBoMon`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `hoitruong`
--
ALTER TABLE `hoitruong`
  ADD CONSTRAINT `fk_ht` FOREIGN KEY (`MSCB`) REFERENCES `admin` (`MSCB`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `fk_lop` FOREIGN KEY (`MSCB`) REFERENCES `admin` (`MSCB`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nganh` FOREIGN KEY (`MaNganh`) REFERENCES `nganh` (`MaNganh`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `nguoimuon`
--
ALTER TABLE `nguoimuon`
  ADD CONSTRAINT `nguoimuon_ibfk_1` FOREIGN KEY (`MSCB`) REFERENCES `admin` (`MSCB`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `phieudk`
--
ALTER TABLE `phieudk`
  ADD CONSTRAINT `phieudk_ibfk_1` FOREIGN KEY (`MSCB`) REFERENCES `admin` (`MSCB`),
  ADD CONSTRAINT `phieudk_ibfk_2` FOREIGN KEY (`MaHT`) REFERENCES `hoitruong` (`MaHT`),
  ADD CONSTRAINT `phieudk_ibfk_3` FOREIGN KEY (`MaCa`) REFERENCES `ca` (`MaCa`),
  ADD CONSTRAINT `phieudk_ibfk_4` FOREIGN KEY (`MaSo`) REFERENCES `nguoimuon` (`MaSo`);

--
-- Constraints for table `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD CONSTRAINT `sinhvien_ibfk_1` FOREIGN KEY (`MaSo`) REFERENCES `nguoimuon` (`MaSo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sinhvien_ibfk_2` FOREIGN KEY (`MaLop`) REFERENCES `lop` (`MaLop`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
