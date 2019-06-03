-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 03, 2019 at 09:23 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `comm`
--

DROP TABLE IF EXISTS `comm`;
CREATE TABLE IF NOT EXISTS `comm` (
  `IDComm` int(100) NOT NULL AUTO_INCREMENT,
  `DateComm` date NOT NULL,
  `ContentComm` text NOT NULL,
  `IDPost` int(100) NOT NULL,
  `IDUser` int(100) NOT NULL,
  PRIMARY KEY (`IDComm`),
  KEY `IDPost` (`IDPost`),
  KEY `IDUser` (`IDUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comm_like`
--

DROP TABLE IF EXISTS `comm_like`;
CREATE TABLE IF NOT EXISTS `comm_like` (
  `IDCommLike` int(100) NOT NULL AUTO_INCREMENT,
  `IDComm` int(100) NOT NULL,
  `IDUser` int(100) NOT NULL,
  PRIMARY KEY (`IDCommLike`),
  KEY `IDComm` (`IDComm`),
  KEY `IDUser` (`IDUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conv`
--

DROP TABLE IF EXISTS `conv`;
CREATE TABLE IF NOT EXISTS `conv` (
  `IDConv` int(100) NOT NULL AUTO_INCREMENT,
  `DateConv` date NOT NULL,
  PRIMARY KEY (`IDConv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conv_admin`
--

DROP TABLE IF EXISTS `conv_admin`;
CREATE TABLE IF NOT EXISTS `conv_admin` (
  `IDConvAdmin` int(100) NOT NULL AUTO_INCREMENT,
  `IDConv` int(100) NOT NULL,
  `IDUser` int(100) NOT NULL,
  PRIMARY KEY (`IDConvAdmin`),
  KEY `IDConv` (`IDConv`),
  KEY `IDUser` (`IDUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conv_like`
--

DROP TABLE IF EXISTS `conv_like`;
CREATE TABLE IF NOT EXISTS `conv_like` (
  `IDConvLike` int(100) NOT NULL AUTO_INCREMENT,
  `IDConv_Msg` int(100) NOT NULL,
  `IDUser` int(100) NOT NULL,
  PRIMARY KEY (`IDConvLike`),
  KEY `IDConv` (`IDConv_Msg`),
  KEY `IDUser` (`IDUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conv_msg`
--

DROP TABLE IF EXISTS `conv_msg`;
CREATE TABLE IF NOT EXISTS `conv_msg` (
  `IDConvMsg` int(100) NOT NULL AUTO_INCREMENT,
  `DateConvMsg` date NOT NULL,
  `ConvMsgContent` text NOT NULL,
  `IDConv` int(100) NOT NULL,
  `IDUser` int(100) NOT NULL,
  PRIMARY KEY (`IDConvMsg`),
  KEY `IDUser` (`IDUser`),
  KEY `IDConv` (`IDConv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conv_user`
--

DROP TABLE IF EXISTS `conv_user`;
CREATE TABLE IF NOT EXISTS `conv_user` (
  `IDConvUser` int(100) NOT NULL AUTO_INCREMENT,
  `IDConv` int(100) NOT NULL,
  `IDUser` int(100) NOT NULL,
  PRIMARY KEY (`IDConvUser`),
  KEY `IDConv` (`IDConv`),
  KEY `IDUser` (`IDUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friend`
--

DROP TABLE IF EXISTS `friend`;
CREATE TABLE IF NOT EXISTS `friend` (
  `IDUser_Sender` int(100) NOT NULL,
  `DateFriendShip` date NOT NULL,
  `TypeFriendship` enum('Père','Mère','Frère','Soeur','Conjoint') NOT NULL,
  `IDUser` int(100) NOT NULL,
  KEY `IDUser` (`IDUser`),
  KEY `IDUser_Sender` (`IDUser_Sender`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `IDPost` int(100) NOT NULL AUTO_INCREMENT,
  `DatePost` date NOT NULL,
  `ContentPost` text NOT NULL,
  `IDUser` int(100) NOT NULL,
  PRIMARY KEY (`IDPost`),
  KEY `IDUser` (`IDUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post_like`
--

DROP TABLE IF EXISTS `post_like`;
CREATE TABLE IF NOT EXISTS `post_like` (
  `IDPostLike` int(100) NOT NULL AUTO_INCREMENT,
  `IDPost` int(100) NOT NULL,
  `IDUser` int(100) NOT NULL,
  PRIMARY KEY (`IDPostLike`),
  KEY `IDPost` (`IDPost`),
  KEY `IDUser` (`IDUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `IDUser` int(100) NOT NULL AUTO_INCREMENT,
  `LastNameUser` varchar(150) NOT NULL,
  `FirstNameUser` varchar(150) NOT NULL,
  `PseudoUser` varchar(150) NOT NULL,
  `PasswordUser` varchar(150) NOT NULL,
  `MailUser` varchar(300) NOT NULL,
  `BirthDateUser` date NOT NULL,
  PRIMARY KEY (`IDUser`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`IDUser`, `LastNameUser`, `FirstNameUser`, `PseudoUser`, `PasswordUser`, `MailUser`, `BirthDateUser`) VALUES
(1, 'Heartcloud', 'Teral', 'teral.heartcloud', 'test1234', 'teral.heartcloud@zbook.com', '1993-08-01'),
(2, 'Bonneau', 'Georges', 'georges.bonneau', 'test1234', 'georges.bonneau@zbook.com', '1990-09-30');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comm`
--
ALTER TABLE `comm`
  ADD CONSTRAINT `COMM_ibfk_1` FOREIGN KEY (`IDPost`) REFERENCES `post` (`IDPost`),
  ADD CONSTRAINT `COMM_ibfk_2` FOREIGN KEY (`IDUser`) REFERENCES `user` (`IDUser`);

--
-- Constraints for table `comm_like`
--
ALTER TABLE `comm_like`
  ADD CONSTRAINT `COMM_LIKE_ibfk_1` FOREIGN KEY (`IDComm`) REFERENCES `comm` (`IDComm`),
  ADD CONSTRAINT `COMM_LIKE_ibfk_2` FOREIGN KEY (`IDUser`) REFERENCES `user` (`IDUser`);

--
-- Constraints for table `conv_admin`
--
ALTER TABLE `conv_admin`
  ADD CONSTRAINT `CONV_ADMIN_ibfk_1` FOREIGN KEY (`IDUser`) REFERENCES `user` (`IDUser`),
  ADD CONSTRAINT `CONV_ADMIN_ibfk_2` FOREIGN KEY (`IDConv`) REFERENCES `conv` (`IDConv`);

--
-- Constraints for table `conv_like`
--
ALTER TABLE `conv_like`
  ADD CONSTRAINT `CONV_LIKE_ibfk_1` FOREIGN KEY (`IDConv_Msg`) REFERENCES `conv_msg` (`IDConvMsg`),
  ADD CONSTRAINT `CONV_LIKE_ibfk_2` FOREIGN KEY (`IDUser`) REFERENCES `user` (`IDUser`);

--
-- Constraints for table `conv_msg`
--
ALTER TABLE `conv_msg`
  ADD CONSTRAINT `CONV_MSG_ibfk_1` FOREIGN KEY (`IDUser`) REFERENCES `user` (`IDUser`),
  ADD CONSTRAINT `CONV_MSG_ibfk_2` FOREIGN KEY (`IDConv`) REFERENCES `conv` (`IDConv`);

--
-- Constraints for table `conv_user`
--
ALTER TABLE `conv_user`
  ADD CONSTRAINT `CONV_USER_ibfk_1` FOREIGN KEY (`IDUser`) REFERENCES `user` (`IDUser`),
  ADD CONSTRAINT `CONV_USER_ibfk_2` FOREIGN KEY (`IDConv`) REFERENCES `conv` (`IDConv`);

--
-- Constraints for table `friend`
--
ALTER TABLE `friend`
  ADD CONSTRAINT `FRIEND_ibfk_1` FOREIGN KEY (`IDUser`) REFERENCES `user` (`IDUser`),
  ADD CONSTRAINT `FRIEND_ibfk_2` FOREIGN KEY (`IDUser_Sender`) REFERENCES `user` (`IDUser`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `POST_ibfk_1` FOREIGN KEY (`IDUser`) REFERENCES `user` (`IDUser`);

--
-- Constraints for table `post_like`
--
ALTER TABLE `post_like`
  ADD CONSTRAINT `POST_LIKE_ibfk_1` FOREIGN KEY (`IDPost`) REFERENCES `post` (`IDPost`),
  ADD CONSTRAINT `POST_LIKE_ibfk_2` FOREIGN KEY (`IDUser`) REFERENCES `user` (`IDUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
