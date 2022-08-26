-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 26 août 2022 à 06:31
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mediatheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `creator` text NOT NULL,
  `type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`id`, `title`, `creator`, `type_id`) VALUES
(1, 'Terry Murray', 'Nutolbob', 1),
(2, 'Jessie Sparks', 'Rekufsu', 2),
(3, 'Beulah Jimenez', 'Ceirile', 1),
(4, 'Ryan Reese', 'Misdadol', 2),
(5, 'Timothy Nunez', 'Lecvedkem', 4),
(6, 'Isaac Hall', 'Etokojul', 2),
(7, 'Hunter Summers', 'Kavufzav', 1),
(8, 'Herbert Miles', 'Saazil', 4),
(9, 'Belle Hines', 'Wazuvvi', 3),
(10, 'Genevieve Hawkins', 'Jewimi', 4),
(11, 'Black Album', 'Metalliquoi', 4),
(12, 'Virtual XI', 'Iron Maiden', 4);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'DVD'),
(2, 'Blue-Ray'),
(3, 'Livre'),
(4, 'CD'),
(5, 'Cassette Audio'),
(6, 'Disque Vinyle (33 Tours)');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `media_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `media_id`) VALUES
(1, 'Han Solo', 'hansolo@gmail.com', 'hanSolo1', 1),
(2, 'Hermione Granger', 'hermionegranger@gmail.com', 'hermioneGranger1', 2),
(3, 'Clark Kent', 'clarkkent@gmail.com', 'clarkKent1', 4),
(4, 'Homer Simpson', 'homersimpson@gmail.com', 'homerSimpson1', 3),
(5, 'Hey Arnold', 'heyarnold@gmail.com', 'heyArnold1', 6),
(6, 'Mowgli', 'Mowgli@gmail.com', 'mowgli1', 5),
(7, 'Nom Test1', 'nomtest1@test.fr', '$2y$10$nXKnKQmOhsRQd0vr.LmKuuiNcvFebgXm.N5jL8z7GI1gpAeZuWqfy', NULL),
(8, 'Nom Test2', 'nomtest2@test.fr', '$2y$10$FDb3na2U7KliIVZ/55KHoedNQixEYkiVDBjE4ZK8.zSjU1SkzZiW.', NULL),
(9, 'Nom Test3', 'nomtest3@test.fr', '$2y$10$QsthNchVaDtatDENjQ0DGOS.tfyoUXbQsRXUst5Wm.TLFcaVfU/v6', NULL),
(10, 'Nom Test4', 'nomtest4@test.fr', '$2y$10$3.FC0thh.dK6u2Locj7BkusSoyz8iNqTvKQXCnc78/07C7XF06HtK', NULL),
(11, 'Nom Test5', 'nomtest5@test.fr', '$2y$10$hQyBrCcMAN16q.wrJ/XiWeBtdDCKXQU/W6AiE5ynmgQat.APvuxne', NULL),
(12, 'Nom Test6', 'nomtest6@test.fr', '$2y$10$GMhQMasd1AkjD7sZs/1aNuJRzl/lqz1KKmWI/JFjY/JJddPglBuzG', NULL),
(13, 'Nom Test7', 'nomtest7@test.fr', '$2y$10$aSkFCg0cNt2xxqifo1KhsOsR08oX5CFlXlLQo4hADrIs3VgWbrCa.', NULL),
(14, 'Nom Test8', 'nomtest8@test.fr', '$2y$10$YEO9VcFsbgxglNnLa8YTAerAPzD2ZaG/ejv/NjaMi4Ah9R6Pa4DI2', NULL),
(15, 'Nom Test9', 'nomtest9@test.fr', '$2y$10$/OJludV9sN.ZgK5AitcpCeYhO/4YBebLO6M9ks2./yohQdkRPSh1O', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
