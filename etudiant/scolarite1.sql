-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2023 at 10:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scolarite1`
--

-- --------------------------------------------------------

--
-- Table structure for table `classe`
--

CREATE TABLE `classe` (
  `CodClasse` varchar(20) NOT NULL,
  `IntClasse` char(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classe`
--

INSERT INTO `classe` (`CodClasse`, `IntClasse`) VALUES
('dsi2', '1'),
('mdw', '2');

-- --------------------------------------------------------

--
-- Table structure for table `etudiant`
--

CREATE TABLE `etudiant` (
  `Nom` char(25) DEFAULT NULL,
  `DateNais` datetime DEFAULT NULL,
  `NCIN` char(30) NOT NULL,
  `NCE` char(15) NOT NULL,
  `TypBac` char(20) DEFAULT NULL,
  `Prénom` char(25) DEFAULT NULL,
  `Sexe` int(11) DEFAULT NULL,
  `LieuNais` char(60) DEFAULT NULL,
  `Adresse` char(100) DEFAULT NULL,
  `Ville` char(30) DEFAULT NULL,
  `CodePostal` varchar(20) DEFAULT NULL,
  `N_Tel` char(10) DEFAULT NULL,
  `CodClasse` varchar(20) DEFAULT NULL,
  `DecisionConseil` char(12) DEFAULT NULL,
  `AnneeUniversitaire` text DEFAULT NULL,
  `Semestre` tinyint(4) DEFAULT NULL,
  `Dispenser` bit(1) NOT NULL,
  `AnneesOpt` datetime DEFAULT NULL,
  `DatePremiereInscp` datetime DEFAULT NULL,
  `Gouvernorat` char(12) DEFAULT NULL,
  `MentionBac` char(12) DEFAULT NULL,
  `Nationalite` char(25) DEFAULT NULL,
  `CodeCNSS` char(3) DEFAULT NULL,
  `NomArabe` char(25) DEFAULT NULL,
  `PrenomArabe` char(25) DEFAULT NULL,
  `LieuNaisArabe` char(60) DEFAULT NULL,
  `AdresseArabe` char(100) DEFAULT NULL,
  `VilleArabe` char(30) DEFAULT NULL,
  `GouvernoratArabe` char(15) DEFAULT NULL,
  `TypeBacAB` char(15) DEFAULT NULL,
  `Photo` varchar(10) DEFAULT NULL,
  `Origine` char(20) DEFAULT NULL,
  `SituationDpart` char(25) DEFAULT NULL,
  `NBAC` char(12) DEFAULT NULL,
  `Redaut` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `etudiant`
--

INSERT INTO `etudiant` (`Nom`, `DateNais`, `NCIN`, `NCE`, `TypBac`, `Prénom`, `Sexe`, `LieuNais`, `Adresse`, `Ville`, `CodePostal`, `N_Tel`, `CodClasse`, `DecisionConseil`, `AnneeUniversitaire`, `Semestre`, `Dispenser`, `AnneesOpt`, `DatePremiereInscp`, `Gouvernorat`, `MentionBac`, `Nationalite`, `CodeCNSS`, `NomArabe`, `PrenomArabe`, `LieuNaisArabe`, `AdresseArabe`, `VilleArabe`, `GouvernoratArabe`, `TypeBacAB`, `Photo`, `Origine`, `SituationDpart`, `NBAC`, `Redaut`) VALUES
('Omar', '2023-10-15 00:00:00', '065998', 'somet', 'info', 'katar', 0, 'tataouine', 'Guermassa Chomrassen Tataouine', 'Tataouine', '3271', '25550364', 'dsi2', 'something', '2023-10-21', 0, b'1', '2023-10-21 00:00:00', '2023-10-22 00:00:00', 'tataouine', 'tres bien', 'tunisien', '065', 'Omar', 'katar', 'tataouine', 'Guermassa Chomrassen Tataouine', 'Tataouine', 'tatouine', 'sgsgsgsg', 'uploads/PO', 'tunis', 'dssi', 'anything', 0),
('Omar', '2023-10-15 00:00:00', '06599868', 'something', 'info', 'katar', 0, 'tataouine', 'Guermassa Chomrassen Tataouine', 'Tataouine', '3271', '25550364', 'dsi2', 'something', '2023-10-21', 0, b'1', '2023-10-21 00:00:00', '2023-10-22 00:00:00', 'tataouine', 'tres bien', 'tunisien', '065', 'Omar', 'katar', 'tataouine', 'Guermassa Chomrassen Tataouine', 'Tataouine', '', 'sgsgsgsg', 'uploads/de', 'tunis', '', 'anything', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`CodClasse`);

--
-- Indexes for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`NCE`),
  ADD UNIQUE KEY `NCIN` (`NCIN`),
  ADD KEY `CodClasse` (`CodClasse`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`CodClasse`) REFERENCES `classe` (`CodClasse`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`CodClasse`) REFERENCES `classe` (`CodClasse`),
  ADD CONSTRAINT `etudiant_ibfk_2` FOREIGN KEY (`CodClasse`) REFERENCES `classe` (`CodClasse`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
