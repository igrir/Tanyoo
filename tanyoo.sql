-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2013 at 12:08 AM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tanyoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `celengan`
--

CREATE TABLE IF NOT EXISTS `celengan` (
  `id_celengan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_celengan` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  PRIMARY KEY (`id_celengan`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `celengan`
--


-- --------------------------------------------------------

--
-- Table structure for table `isi_celengan`
--

CREATE TABLE IF NOT EXISTS `isi_celengan` (
  `id_celengan` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  KEY `id_soal` (`id_soal`),
  KEY `id_celengan` (`id_celengan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `isi_celengan`
--


-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `log_type` int(11) NOT NULL COMMENT 'jawab soal = 1, flag = 2, salah = 3',
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'waktu menjawab, agar ada ranking 1',
  PRIMARY KEY (`id_log`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='tabel yang menjelaskan penggunaan user terhadap menjawab soa' AUTO_INCREMENT=30 ;

--
-- Dumping data for table `log`
--


-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE IF NOT EXISTS `password_reset` (
  `id_reset` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `random` varchar(1000) NOT NULL,
  `used` int(11) NOT NULL COMMENT '0 = belum dipake, 1 = sudah dipake, 2=timeout',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_reset`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id_reset`, `username`, `email`, `random`, `used`, `time`) VALUES
(6, 'giri', 'giri.prahasta@student.upi.edu', '32b452785032a305736e946e88131b1c21398942f6d3c093c8bdfd27fa23850cb0d9e841142f6d3c093c8bdfd27fa23850cb0d9e8253a86c450b76fb8c371afead6410d55534', 2, '2013-04-10 23:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `penghargaan`
--

CREATE TABLE IF NOT EXISTS `penghargaan` (
  `id_penghargaan` int(11) NOT NULL AUTO_INCREMENT,
  `nm_penghargaan` varchar(100) NOT NULL,
  `Tanya` int(11) NOT NULL,
  `Jawab` int(11) NOT NULL,
  `Skor` int(11) NOT NULL,
  PRIMARY KEY (`id_penghargaan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `penghargaan`
--

INSERT INTO `penghargaan` (`id_penghargaan`, `nm_penghargaan`, `Tanya`, `Jawab`, `Skor`) VALUES
(1, 'Selamat Anda Telah Menjawab 10 Pertanyaan', 0, 10, 0),
(2, 'Selamat Anda Telah Bertanya 10 Pertanyaan', 10, 0, 0),
(3, 'Selamat Anda Mendapatkan Menjadi Newbie', 10, 10, 0),
(4, 'Selamat Anda Telah Menjawab 50 Pertanyaan', 0, 50, 0),
(5, 'Selamat Anda Telah Bertanya 50 Pertanyaan', 50, 0, 0),
(6, 'Selamat Anda Mendapatkan Menjadi Tanyooku', 50, 50, 0),
(7, 'Selamat Skor Anda Telah Mencapai 10', 0, 0, 10),
(8, 'Selamat Skor Anda Telah Mencapai 50', 0, 0, 50);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE IF NOT EXISTS `soal` (
  `id_soal` int(11) NOT NULL AUTO_INCREMENT,
  `text_soal` varchar(80) NOT NULL,
  `jawaban` varchar(80) NOT NULL,
  `flag` int(11) NOT NULL,
  `tag` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `locked` int(11) NOT NULL COMMENT '1 berarti lock, 0 nggak',
  PRIMARY KEY (`id_soal`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `soal`
--


-- --------------------------------------------------------

--
-- Table structure for table `static`
--

CREATE TABLE IF NOT EXISTS `static` (
  `bagian` varchar(32) NOT NULL,
  `text` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `static`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bio` varchar(250) NOT NULL,
  `minat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `bio`, `minat`, `email`) VALUES
('erwin', '123', 'erwingw', 'komputer', 'giri.prahasta@student.upi.edu'),
('giri', 'giri123', 'Orang ganteng', 'gitu', 'giri.prahasta@student.upi.edu'),
('madelhaq', '12345', 'senyum selalu', 'fisika', 'giri.prahasta@student.upi.edu');

-- --------------------------------------------------------

--
-- Table structure for table `user_penghargaan`
--

CREATE TABLE IF NOT EXISTS `user_penghargaan` (
  `id_penghargaan` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  KEY `id_penghargaan` (`id_penghargaan`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_penghargaan`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `celengan`
--
ALTER TABLE `celengan`
  ADD CONSTRAINT `celengan_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `isi_celengan`
--
ALTER TABLE `isi_celengan`
  ADD CONSTRAINT `isi_celengan_ibfk_1` FOREIGN KEY (`id_celengan`) REFERENCES `celengan` (`id_celengan`),
  ADD CONSTRAINT `isi_celengan_ibfk_2` FOREIGN KEY (`id_soal`) REFERENCES `soal` (`id_soal`);

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `user_penghargaan`
--
ALTER TABLE `user_penghargaan`
  ADD CONSTRAINT `user_penghargaan_ibfk_1` FOREIGN KEY (`id_penghargaan`) REFERENCES `penghargaan` (`id_penghargaan`),
  ADD CONSTRAINT `user_penghargaan_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`);
