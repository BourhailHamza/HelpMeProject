-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 12 juil. 2023 à 17:40
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
-- Base de données : `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `account`
--

INSERT INTO `account` (`email`, `password`, `creation_date`) VALUES
('cnam@cnam.fr', '$2y$10$pQ.LqD1SZvzbUGtglCp6IuTM0D4/9xnXnZnGxE7LC568TrsOQWmjG', '2023-07-09 22:01:15'),
('test@test.fr', '$2y$10$5C6EbWNkUzPpyJ75DAkAJ.Aq20yRx1vkkmj76vMHd7mDyxZ64enH2', '2023-07-09 11:16:56');

-- --------------------------------------------------------

--
-- Structure de la table `blacklist`
--

DROP TABLE IF EXISTS `blacklist`;
CREATE TABLE IF NOT EXISTS `blacklist` (
  `id_blacklist` int NOT NULL AUTO_INCREMENT,
  `fk_email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id_blacklist`),
  KEY `fk_email` (`fk_email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `blacklist`
--

INSERT INTO `blacklist` (`id_blacklist`, `fk_email`, `creation_date`) VALUES
(2, 'test@test.fr', '2023-07-10 20:30:31');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int NOT NULL AUTO_INCREMENT,
  `fk_id_topic` int NOT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `fk_id_topic` (`fk_id_topic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `id_profile` int NOT NULL AUTO_INCREMENT,
  `fk_email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `profile_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_profile`),
  KEY `fk_email` (`fk_email`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `profile`
--

INSERT INTO `profile` (`id_profile`, `fk_email`, `username`, `profile_image`, `role`) VALUES
(10, 'test@test.fr', 'as', '../public/pictures/Sand-Clock-PNG-Picture.png', 'user'),
(13, 'cnam@cnam.fr', 'cnam', '../public/pictures/Scema-passerelle-monetique.png', 'user');

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

DROP TABLE IF EXISTS `topic`;
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int NOT NULL AUTO_INCREMENT,
  `fk_id_profile` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id_topic`),
  KEY `fk_id_profile` (`fk_id_profile`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `topic`
--

INSERT INTO `topic` (`id_topic`, `fk_id_profile`, `title`, `description`, `creation_date`) VALUES
(9, 15, 'Meilleure carte graphique 2023', 'Meilleure carte graphique 2023', '2023-07-10 19:22:57');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
