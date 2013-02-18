-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 18, 2013 at 07:42 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sim`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_adm` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nip_adm` int(5) NOT NULL,
  `nama_adm` varchar(50) NOT NULL,
  `level` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_adm`, `username`, `password`, `nip_adm`, `nama_adm`, `level`) VALUES
(1, 'admin', 'admin', 12345, 'Vila Yustira', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE IF NOT EXISTS `applicant` (
  `no_applicant` int(11) NOT NULL,
  `no_identitas` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(20) NOT NULL,
  `no_tlp` int(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(6) NOT NULL,
  `status_pernikahan` varchar(13) NOT NULL,
  `agama` varchar(8) NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `pendidikan` varchar(3) NOT NULL,
  `penempatan` varchar(12) NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `status` int(1) NOT NULL COMMENT '1 = buffer (belum terjadwal), 2=hadir, 3=tidak hadir, 4=qualified, 5=not qualified, 6=hired, 7=terminate',
  PRIMARY KEY (`no_applicant`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`no_applicant`, `no_identitas`, `nama_lengkap`, `alamat`, `kota`, `no_tlp`, `email`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `status_pernikahan`, `agama`, `gol_darah`, `pendidikan`, `penempatan`, `posisi`, `image`, `status`) VALUES
(1, 0, 'yola', 'kota', 'yogyakarta', 2147483647, 'ardiirwanto@yahoo.com', 'klaten', '1989-02-02', 'wanita', 'belum menikah', 'Islam', 'A', 'SMA', 'DIY', 'AO', '', 1),
(2, 0, 'vila yustira', '', 'yogyakarta', 2147483647, 'yosiamalia@yahoo.com', 'medan', '1970-01-02', 'wanita', 'belum menikah', 'Islam', 'B', 'SMA', 'magelang', 'Admin', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hired`
--

CREATE TABLE IF NOT EXISTS `hired` (
  `no_applicant` int(11) NOT NULL,
  `nama_applicant` varchar(100) NOT NULL,
  `kantor` varchar(12) NOT NULL,
  `cabang` varchar(10) NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `tgl_hired` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE IF NOT EXISTS `konfirmasi` (
  `no_applicant` int(11) NOT NULL,
  `nama_applicant` varchar(100) NOT NULL,
  `konfirmasi` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjadwalan`
--

CREATE TABLE IF NOT EXISTS `penjadwalan` (
  `no_applicant` int(11) NOT NULL,
  `jadwal` date NOT NULL,
  `konfirmasi` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjadwalan`
--

INSERT INTO `penjadwalan` (`no_applicant`, `jadwal`, `konfirmasi`) VALUES
(2, '0000-00-00', ''),
(1, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `no_applicant` int(11) NOT NULL,
  `nama_applicant` varchar(100) NOT NULL,
  `result` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(1) NOT NULL AUTO_INCREMENT,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'Buffer'),
(2, 'Hadir'),
(3, 'Tidak Hadir'),
(4, 'Qualified'),
(5, 'Not Qualified'),
(6, 'Hired'),
(7, 'Terminate');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
