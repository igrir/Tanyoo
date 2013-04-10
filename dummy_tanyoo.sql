-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2013 at 09:32 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `celengan`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `celengan`
--
ALTER TABLE `celengan`
  ADD CONSTRAINT `celengan_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);
