-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 20 nov. 2023 à 12:47
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `salle`
--

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `Salle` char(20) NOT NULL,
  `Departement` char(55) DEFAULT NULL,
  `Catégorie` char(12) DEFAULT NULL,
  `Responsable` char(10) DEFAULT NULL,
  `Charge` tinyint(30) DEFAULT NULL,
  `NbPlaceExamen` tinyint(30) DEFAULT NULL,
  `NbLignes` tinyint(30) DEFAULT NULL,
  `NBCol` tinyint(30) DEFAULT NULL,
  `NBSurv` smallint(30) DEFAULT NULL,
  `Type` varchar(25) NOT NULL DEFAULT current_timestamp(),
  `Disponible` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`Salle`, `Departement`, `Catégorie`, `Responsable`, `Charge`, `NbPlaceExamen`, `NbLignes`, `NBCol`, `NBSurv`, `Type`, `Disponible`) VALUES
('C103', 'informatique', 'TP', 'adnan kamm', 30, 44, 5, 5, 2, 'rien', 'Disponible'),
('C108', 'informatique', 'TP', 'adem', 30, 30, 5, 5, 2, 'dsi', 'Disponible'),
('C109', 'informatique', 'TP', 'adnan kamm', 30, 44, 5, 5, 2, 'rien', 'Non Disponible'),
('C110', 'informatique', 'TP', 'adnan kamm', 30, 44, 5, 5, 2, 'rien', 'Disponible'),
('C114', 'informatique', 'TP', 'adnan kamm', 30, 44, 5, 6, 2, 'je ne sais pas', 'Disponible'),
('C117', 'informatique', 'cour', 'amna tka', 30, 25, 5, 5, 3, 'rien', 'Disponible');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`Salle`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
