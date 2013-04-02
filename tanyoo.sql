-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 02, 2013 at 09:20 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `celengan`
--

INSERT INTO `celengan` (`id_celengan`, `nama_celengan`, `username`) VALUES
(9, 'giri', 'giri'),
(10, 'Bank Fisika', 'giri'),
(11, 'Komputer', 'giri'),
(12, 'Oke', 'erwin');

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

INSERT INTO `isi_celengan` (`id_celengan`, `id_soal`) VALUES
(9, 2),
(11, 9),
(9, 10);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `log_type` int(11) NOT NULL COMMENT 'jawab soal = 1, flag = 2',
  PRIMARY KEY (`id_log`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COMMENT='tabel yang menjelaskan penggunaan user terhadap menjawab soa' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `username`, `id_soal`, `log_type`) VALUES
(1, 'giri', 6, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `text_soal`, `jawaban`, `flag`, `tag`, `username`, `locked`) VALUES
(2, 'Siapakah penemu lampu?', 'Thomas Alva Edison', 0, 'Penemu2', 'giri', 0),
(3, 'Siapakah penemu gravitasi dengan apel jatuh?', 'newton', 0, 'penemu', 'giri', 0),
(4, 'Bahasa sundanya "dua"?', 'dua', 0, 'yaya', 'giri', 0),
(5, 'Bahasa jermannya "tiga"?', 'drei', 0, 'deutsch', 'giri', 0),
(6, 'Bahasa inggrisnya "dua"', 'two', 0, 'english', 'giri', 0),
(7, 'Bahasa inggrisnya "Satu" adalah?', 'one', 0, 'inggris', 'giri', 0),
(8, 'Apa nama buah yang dimakan putri tidur?', 'apel', 0, 'dongeng', 'giri', 1),
(9, 'komputer steve', 'apple', 0, 'komputer', 'giri', 0),
(10, 'Presiden wanita Indonesia', 'mega', 0, 'Indonesia', 'giri', 0),
(11, 'a', 'a', 0, 'a', 'giri', 0),
(12, 'b', 'b', 0, 'b', 'giri', 0),
(13, 'a', 'a', 0, '', 'giri', 0),
(14, 'a', 'a', 0, 'a', 'giri', 0),
(15, 'b', 'b', 0, 'b', 'giri', 0),
(16, 'c', 'c', 0, 'c', 'giri', 0),
(17, 'd', 'd', 0, 'd', 'giri', 0),
(18, 'f', 'f', 0, 'f', 'giri', 0),
(19, 'h', 'h', 0, 'h', 'giri', 0),
(20, 'j', 'j', 0, 'j', 'giri', 0),
(21, 'i', 'i', 0, 'i', 'giri', 0),
(22, 'l', 'l', 0, 'l', 'giri', 0),
(23, 'a`', 'a', 0, 'a', 'giri', 0);

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
  `id_fb` varchar(50) NOT NULL,
  `skor` int(11) NOT NULL,
  `bio` varchar(250) NOT NULL,
  `minat` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `id_fb`, `skor`, `bio`, `minat`) VALUES
('erwin', '123', '', 0, 'erwingw', 'komputer'),
('giri', '123', '', 30, '123123', '1 2 3'),
('giri2', '123', '', 0, '123', '123'),
('igrir', '123', '1227196016', 0, 'Penyuka penanya jawaban', 'biologi fisika matematika'),
('indana', '123', '', 0, 'indana zf', 'fisika kimia');

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
