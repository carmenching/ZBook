-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 16 juin 2019 à 01:10
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `zbook`
--

-- --------------------------------------------------------

--
-- Structure de la table `friend`
--

DROP TABLE IF EXISTS `friend`;
CREATE TABLE IF NOT EXISTS `friend` (
  `IDFriendship` int(11) NOT NULL AUTO_INCREMENT,
  `IDUser_Sender` int(100) NOT NULL,
  `DateFriendship` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IDUser` int(100) NOT NULL,
  `requestStatus` enum('Accept','Pending','Cancel','Reject') CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`IDFriendship`),
  KEY `IDUser` (`IDUser`),
  KEY `IDUser_Sender` (`IDUser_Sender`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `friend`
--

INSERT INTO `friend` (`IDFriendship`, `IDUser_Sender`, `DateFriendship`, `IDUser`, `requestStatus`) VALUES
(1, 3, '2019-06-13 21:31:56', 4, 'Accept'),
(2, 3, '2019-06-14 21:21:46', 2, 'Accept'),
(3, 4, '2019-06-14 21:23:56', 5, 'Accept'),
(4, 5, '2019-06-14 21:24:20', 4, 'Accept'),
(5, 5, '2019-06-14 21:33:19', 3, 'Accept'),
(7, 3, '2019-06-14 21:44:32', 5, 'Accept'),
(40, 2, '2019-06-14 22:11:25', 3, 'Accept'),
(41, 4, '2019-06-15 21:27:56', 3, 'Accept');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `messageID` int(11) NOT NULL AUTO_INCREMENT,
  `messageContent` text,
  `messageSentBy` int(11) NOT NULL,
  `messageSentTo` int(11) NOT NULL,
  `messageDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message_userID` int(100) NOT NULL,
  PRIMARY KEY (`messageID`),
  KEY `messageSentBy` (`messageSentBy`,`messageSentTo`),
  KEY `messageSentTo` (`messageSentTo`),
  KEY `message_userID` (`message_userID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`messageID`, `messageContent`, `messageSentBy`, `messageSentTo`, `messageDate`, `message_userID`) VALUES
(1, 'test user1 to user2', 2, 3, '2019-06-15 16:25:07', 11),
(2, 'test user2 to user3', 3, 4, '2019-06-15 16:25:07', 12),
(3, 'test', 3, 2, '2019-06-15 19:04:23', 11),
(4, 'test2', 3, 2, '2019-06-15 19:05:56', 11),
(5, 'test3', 3, 2, '2019-06-15 19:14:48', 11),
(6, 'test3', 3, 2, '2019-06-15 19:16:07', 11),
(7, NULL, 3, 2, '2019-06-15 19:18:55', 11),
(8, 'test4', 3, 2, '2019-06-15 19:20:21', 11),
(9, 'test 5', 3, 2, '2019-06-15 19:20:45', 11),
(10, 'test 5', 3, 2, '2019-06-15 19:21:48', 11),
(11, 'test6', 3, 2, '2019-06-15 19:21:56', 11),
(12, 'test7\n', 3, 2, '2019-06-15 19:22:35', 11),
(13, 'test3', 3, 2, '2019-06-15 21:53:03', 11);

-- --------------------------------------------------------

--
-- Structure de la table `message_user`
--

DROP TABLE IF EXISTS `message_user`;
CREATE TABLE IF NOT EXISTS `message_user` (
  `IDConvUser` int(100) NOT NULL AUTO_INCREMENT,
  `IDUser` int(100) NOT NULL,
  `IDUserWith` int(100) NOT NULL,
  PRIMARY KEY (`IDConvUser`),
  KEY `IDUser` (`IDUser`),
  KEY `IDUserWith` (`IDUserWith`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `message_user`
--

INSERT INTO `message_user` (`IDConvUser`, `IDUser`, `IDUserWith`) VALUES
(11, 2, 3),
(12, 3, 4),
(14, 3, 5);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `IDPost` int(100) NOT NULL AUTO_INCREMENT,
  `DatePost` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ContentPost` text NOT NULL,
  `IDUser` int(100) NOT NULL,
  PRIMARY KEY (`IDPost`),
  KEY `IDUser` (`IDUser`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`IDPost`, `DatePost`, `ContentPost`, `IDUser`) VALUES
(57, '2019-05-30 19:37:47', 'test2', 1),
(58, '2019-05-30 19:37:50', 'test3', 1),
(59, '2019-05-30 19:37:52', 'test4', 1),
(60, '2019-05-30 19:37:54', 'test5', 1),
(61, '2019-05-30 20:07:28', 'test6', 1),
(62, '2019-05-30 20:07:30', 'test7', 1),
(63, '2019-05-30 20:42:36', 'test7', 1),
(64, '2019-06-01 21:53:18', 'test2', 1),
(65, '2019-06-01 21:58:36', 'test2', 1),
(66, '2019-06-01 21:59:32', 'yrdy', 1),
(67, '2019-06-01 22:00:04', 'user2 says something', 3),
(68, '2019-06-01 22:00:23', 'user2 says something', 3),
(69, '2019-06-01 22:07:02', 'user2 says something again', 3),
(70, '2019-06-02 17:18:08', 'test', 3),
(71, '2019-06-02 17:21:35', 'test3', 3),
(72, '2019-06-09 11:59:05', 'test3', 3),
(73, '2019-06-09 12:00:04', 'test4', 3),
(74, '2019-06-09 12:00:23', 'test5', 3),
(75, '2019-06-09 12:01:40', 'test6', 3),
(76, '2019-06-09 12:01:44', 'test7', 3),
(77, '2019-06-09 12:02:06', 'test8', 3),
(78, '2019-06-09 12:02:09', 'test9', 3),
(79, '2019-06-14 20:07:23', 'test test', 4),
(80, '2019-06-15 22:19:57', 'test1', 3),
(81, '2019-06-16 00:24:28', 'test', 2),
(82, '2019-06-16 00:25:58', 'test2', 2),
(83, '2019-06-16 00:29:28', 'test3', 2);

-- --------------------------------------------------------

--
-- Structure de la table `post_like`
--

DROP TABLE IF EXISTS `post_like`;
CREATE TABLE IF NOT EXISTS `post_like` (
  `IDPostLike` int(100) NOT NULL AUTO_INCREMENT,
  `IDPost` int(100) NOT NULL,
  `IDUser` int(100) NOT NULL,
  PRIMARY KEY (`IDPostLike`),
  KEY `IDPost` (`IDPost`),
  KEY `IDUser` (`IDUser`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post_like`
--

INSERT INTO `post_like` (`IDPostLike`, `IDPost`, `IDUser`) VALUES
(1, 69, 3),
(2, 69, 3),
(3, 71, 3),
(4, 70, 3),
(5, 71, 3),
(6, 71, 3),
(7, 71, 3),
(8, 71, 3),
(9, 71, 3),
(10, 71, 3),
(11, 71, 3),
(12, 71, 3),
(13, 71, 3),
(14, 69, 3),
(15, 69, 3),
(16, 69, 3),
(17, 69, 3),
(18, 70, 3),
(19, 70, 3),
(20, 70, 3),
(21, 70, 3),
(22, 70, 3),
(23, 70, 3),
(24, 68, 3),
(25, 68, 3),
(26, 66, 3),
(27, 66, 3),
(28, 66, 3),
(29, 66, 3),
(30, 68, 3),
(31, 78, 3),
(32, 80, 3),
(33, 80, 3),
(34, 83, 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
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
  `lastActive` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`IDUser`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`IDUser`, `LastNameUser`, `FirstNameUser`, `PseudoUser`, `PasswordUser`, `MailUser`, `BirthDateUser`, `lastActive`) VALUES
(1, 'Roger', 'Robert', 'robertRoger', 'test1234', 'robert.roger@gmail.com', '2018-11-01', '2019-06-12 13:22:41'),
(2, 'zbookuser', 'user1', 'user1', '$2y$10$QxxCtWtEH.jdXmT4rkbwq.8tRfAOQ4pv4FjXWhqycHUjq1EMaDMby', 'test@test.com', '2019-06-01', '2019-06-16 00:31:41'),
(3, 'zbookuser', 'user2', 'user2', '$2y$10$ZZYhTjnzfFXa3f5fJ1MDsuyUHBk9hPNo7EeFQddrNp63HBECkev6O', 'test@test.com', '2016-06-09', '2019-06-16 00:37:42'),
(4, 'zbookuser', 'user3', 'user3', '$2y$10$BRM23kjsbCAZkw3GEVQrTe91Ga64lwUw7D/uyxbkVdVaT0dxR6tEO', 'test@test.com', '2003-11-01', '2019-06-14 21:24:04'),
(5, 'zbookuser', 'user4', 'user4', '$2y$10$h0XyA/E5FDCu9PMDmf9ZxenU3QJ7/rMULNPwtUDYys.VWWuh3VLSu', 'test@test.com', '2003-11-01', '2019-06-14 21:41:54'),
(6, 'Farcloud', 'Seladaern', 'sfarcloud', '$2y$10$JXrq4cVRoYfu6wUfzcfuFuxWAexHXdgyUfhF.5Jyeu4GJZ5PnFsXG', 'sfcloud@test.com', '1968-12-13', '2019-06-16 00:48:17'),
(7, 'test', 'user5', 'user5', '$2y$10$c5wdI.BXn0PKBmdPzyBFMudq38/95AY6vBKTkqDk9IUL8XzwmD6fW', 'test@test.com', '1989-05-17', '2019-06-16 01:07:22'),
(8, 'test', 'user5', 'user5', '$2y$10$dYVz9LIgO99E0DPnByIno.pecmym6mcR4NET9HteuR1XHMiOcAuDe', 'test@test.com', '1989-05-17', '2019-06-16 01:08:17'),
(9, 'test', 'user5', 'user5', '$2y$10$zoVcuJL35.c819w6NfeZneFNHQGUEAWAqzJfRWwymjmyiSjiIZ11y', 'test@test.com', '1989-05-17', '2019-06-16 01:08:27');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `friend`
--
ALTER TABLE `friend`
  ADD CONSTRAINT `FRIEND_ibfk_1` FOREIGN KEY (`IDUser`) REFERENCES `user` (`IDUser`),
  ADD CONSTRAINT `FRIEND_ibfk_2` FOREIGN KEY (`IDUser_Sender`) REFERENCES `user` (`IDUser`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`messageSentBy`) REFERENCES `user` (`IDUser`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`messageSentTo`) REFERENCES `user` (`IDUser`),
  ADD CONSTRAINT `message_ibfk_3` FOREIGN KEY (`message_userID`) REFERENCES `message_user` (`IDConvUser`);

--
-- Contraintes pour la table `message_user`
--
ALTER TABLE `message_user`
  ADD CONSTRAINT `message_user_ibfk_2` FOREIGN KEY (`IDUser`) REFERENCES `user` (`IDUser`),
  ADD CONSTRAINT `message_user_ibfk_3` FOREIGN KEY (`IDUserWith`) REFERENCES `user` (`IDUser`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `POST_ibfk_1` FOREIGN KEY (`IDUser`) REFERENCES `user` (`IDUser`);

--
-- Contraintes pour la table `post_like`
--
ALTER TABLE `post_like`
  ADD CONSTRAINT `POST_LIKE_ibfk_1` FOREIGN KEY (`IDPost`) REFERENCES `post` (`IDPost`),
  ADD CONSTRAINT `POST_LIKE_ibfk_2` FOREIGN KEY (`IDUser`) REFERENCES `user` (`IDUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
