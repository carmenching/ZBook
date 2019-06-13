-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 09 juin 2019 à 19:46
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `messagerie`
--

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `auteur` varchar(255) NOT NULL DEFAULT 'Anon',
  `corps` text NOT NULL,
  `poste` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `poste` (`poste`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`message_id`, `auteur`, `corps`, `poste`) VALUES
(16, 'bb', 'cvc', 1559555104),
(15, 'vx', 'xvx', 1559553852),
(14, 'hv', 'hvhv', 1559553594),
(13, 'ih', 'iuiu', 1559550313),
(12, 'Guillaume', 'tre', 1559550010),
(11, 'Guillaume', 'saliut', 1559550006),
(10, 'Guillaume', 'azert', 1559550000),
(17, 'tf', 'tftf', 1559555632),
(18, 'tfftf', 'tftfftf', 1559555635),
(19, 'tfftf', 'tftfftf', 1559555638),
(20, 'tfftf', 'tftfftf', 1559555639),
(21, 'tfftf', 'tftfftf', 1559555639),
(22, 'ihyuy', 'yuyuy', 1559555870),
(23, 'rtr', 'rtr', 1559556113),
(24, 'rtr', 'rtr', 1559556114),
(25, 'rtr', 'rtr', 1559556114),
(26, 'rtr', 'rtr', 1559556114),
(27, 'rtr', 'rtr', 1559556115),
(28, 'rtr', 'rtr', 1559556115),
(29, 'trt', 'rtr', 1559556129),
(30, 'trt', 'rtr', 1559556130),
(31, 'trt', 'rtr', 1559556130);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
