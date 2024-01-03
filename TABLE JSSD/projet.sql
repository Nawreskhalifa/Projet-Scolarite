-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 31 oct. 2023 à 10:19
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `jssd`
--

CREATE TABLE `jssd` (
  `Jour` char(10) NOT NULL,
  `Séance` char(3) NOT NULL,
  `Salle` char(10) NOT NULL,
  `NDist` int(11) NOT NULL,
  `Groupe` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `jssd`
--

INSERT INTO `jssd` (`Jour`, `Séance`, `Salle`, `NDist`, `Groupe`) VALUES
('lundi', '5', 'gjf2', 100, 'dsi'),
('mardi', '3', 'o7', 789, 'ti1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `jssd`
--
ALTER TABLE `jssd`
  ADD UNIQUE KEY `unique_combination` (`Jour`,`Séance`,`Salle`,`NDist`,`Groupe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
