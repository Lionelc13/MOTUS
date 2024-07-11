-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 11 juil. 2024 à 11:28
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `motus`
--
CREATE DATABASE IF NOT EXISTS Motus;
-- --------------------------------------------------------

--
-- Structure de la table `chercher`
--

DROP TABLE IF EXISTS `chercher`;
CREATE TABLE IF NOT EXISTS `chercher` (
  `id_user` int NOT NULL,
  `id_word` int NOT NULL,
  PRIMARY KEY (`id_user`,`id_word`),
  KEY `id_word` (`id_word`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `chercher`
--

INSERT INTO `chercher` (`id_user`, `id_word`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 7),
(1, 10),
(1, 12),
(2, 12),
(3, 9),
(3, 10),
(3, 94),
(3, 101);

-- --------------------------------------------------------

--
-- Structure de la table `level`
--

DROP TABLE IF EXISTS `level`;
CREATE TABLE IF NOT EXISTS `level` (
  `id_level` int NOT NULL AUTO_INCREMENT,
  `name_level` varchar(50) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `level`
--

INSERT INTO `level` (`id_level`, `name_level`) VALUES
(1, 'easy'),
(2, 'medium'),
(3, 'hard');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `nickname` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `unique_nickname` (`nickname`(30))
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `lastname`, `firstname`, `nickname`, `email`, `password`) VALUES
(1, 'LIONEL', 'CAN', 'Lionel13', 'lionelc.13@gmail.com', '$2y$10$i0IBYEnIsSxNCySAN9HIketsoxV39eF0/XgiDS1uw1bb6BGgAoTvi'),
(2, 'Lou', 'CAN', 'Lou13', 'louc.13@gmail.com', '$2y$10$rzuUQx/n6aS//wWa0fz5W.wDya1YCPfSzqake.uBpuGUB/9Rh6l.y'),
(3, 'nathalie', 'CAN', 'nath', 'nathaliec.13@gmail.com', '$2y$10$nMQx4kFBruQHNpSlpeGLP.FCFHPrh0UC7zDectjlxdXo/scXmJiae'),
(4, 'Emma', 'CAN', 'Emma13', 'emmac.13@gmail.com', '$2y$10$oNBTLZnscJrMAXTT7ERcwuqNoG6z4XJztJbL3iPZYCQ7.wwpV3dkm'),
(5, 'Tortue', 'CAN', 'Tortue13', 'tortue13@gmail.com', '$2y$10$b9Kn4paa.LpQnNCfA2HiWevltTmB0Yx/NA9CFro76TM.8fmR/PPqq'),


-- --------------------------------------------------------

--
-- Structure de la table `word`
--

DROP TABLE IF EXISTS `word`;
CREATE TABLE IF NOT EXISTS `word` (
  `id_word` int NOT NULL AUTO_INCREMENT,
  `name_word` varchar(10) NOT NULL,
  `id_level` int NOT NULL,
  PRIMARY KEY (`id_word`),
  UNIQUE KEY `name_word` (`name_word`),
  KEY `id_level` (`id_level`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `word`
--

INSERT INTO `word` (`id_word`, `name_word`, `id_level`) VALUES
(1, 'MAISON', 1),
(2, 'VALISE', 1),
(3, 'COURSE', 1),
(4, 'MANGER', 1),
(5, 'DORMIR', 1),
(6, 'RANGER', 1),
(7, 'FACILE', 1),
(8, 'NIVEAU', 1),
(9, 'CHAISE', 1),
(10, 'TABLES', 1),
(11, 'CARTES', 1),
(12, 'ECRANS', 1),
(13, 'FRAISE', 1),
(14, 'AMPLEUR', 2),
(15, 'ABREGEE', 2),
(16, 'BURSITE', 2),
(17, 'BALCONS', 2),
(18, 'ACTIONS', 2),
(20, 'CARTONS', 2),
(21, 'CHIPEUR', 2),
(22, 'COMBLEE', 2),
(23, 'DIRECTS', 2),
(24, 'DEVALUE', 2),
(25, 'DUMPING', 2),
(26, 'ENCULES', 2),
(27, 'ETIRAGE', 2),
(28, 'EPOXYDE', 2),
(29, 'FARINES', 2),
(30, 'FLUCTUE', 2),
(31, 'FIBROME', 2),
(32, 'GRATINS', 2),
(33, 'GOLFEUR', 2),
(34, 'GAMBADE', 2),
(35, 'HURLANT', 2),
(36, 'HOSPICE', 2),
(37, 'INSURGE', 2),
(38, 'IMPACTS', 2),
(39, 'IDOINES', 2),
(40, 'JESUITE', 2),
(41, 'JOURNAL', 2),
(42, 'KASCHER', 2),
(43, 'KARTING', 2),
(44, 'LUTINER', 2),
(45, 'LASCIVE', 2),
(47, 'MODULEE', 2),
(48, 'NAUTILE', 2),
(49, 'NOCIVES', 2),
(50, 'OBSTRUE', 2),
(51, 'ORDINAL', 2),
(52, 'PASTOUR', 2),
(53, 'PELVIEN', 2),
(54, 'PROCEDE', 2),
(55, 'QUALITE', 2),
(56, 'QUINTES', 2),
(57, 'RANIMES', 2),
(58, 'RECOLTE', 2),
(59, 'REPERDU', 2),
(60, 'SAURETS', 2),
(61, 'SINOPLE', 2),
(62, 'SMICARD', 2),
(63, 'TAMISER', 2),
(64, 'TOLUENE', 2),
(65, 'TRICARD', 2),
(66, 'URBAINS', 2),
(67, 'UNICITE', 2),
(68, 'VALIDES', 2),
(69, 'VENGEUR', 2),
(71, 'WALLABY', 2),
(72, 'YAOURTS', 2),
(73, 'YAKUZAS', 2),
(74, 'ZAIROIS', 2),
(75, 'ZAPPANT', 2),
(76, 'ALPHABET', 3),
(77, 'BANANAIS', 3),
(78, 'CAPTIVES', 3),
(79, 'DIALOGUE', 3),
(80, 'EFFORTIF', 3),
(81, 'FORMULES', 3),
(82, 'GRANITES', 3),
(83, 'HORIZONS', 3),
(84, 'ILLUMINE', 3),
(85, 'JOLIMENT', 3),
(86, 'KILOWATT', 3),
(87, 'LEGALEMENT', 3),
(89, 'NATATION', 3),
(90, 'OPTIQUES', 3),
(92, 'QUOTIENT', 3),
(94, 'SALAIRES', 3),
(95, 'TABLEAUX', 3),
(96, 'UNIFORME', 3),
(97, 'VALIDEES', 3),
(98, 'WAGONETS', 3),
(99, 'APERITIF', 3),
(100, 'ASSIETTE', 3),
(101, 'ZOOLOGIE', 3);

CREATE USER 'adminMotus'@'%localhost' IDENTIFIED WITH caching_sha2_password BY '***';GRANT SELECT, INSERT, UPDATE, DELETE, RELOAD, SHUTDOWN, PROCESS, FILE, REFERENCES, SHOW DATABASES, SUPER, LOCK TABLES, REPLICATION SLAVE, REPLICATION CLIENT, CREATE USER ON *.* TO 'adminMotus'@'%adminMotus' WITH GRANT OPTION;ALTER USER 'adminMotus'@'%adminMotus' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;GRANT ALL PRIVILEGES ON `motus`.* TO 'adminMotus'@'%adminMotus';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
