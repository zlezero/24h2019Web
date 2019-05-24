-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 24 mai 2019 à 13:44
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `equipevelizy2`
--
CREATE DATABASE IF NOT EXISTS `equipevelizy2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `equipevelizy2`;

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NumRue` varchar(255) NOT NULL,
  `CodePostal` varchar(255) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `IdPays` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Type` int(11) NOT NULL,
  `Origine` int(11) NOT NULL,
  `QteCafe` int(11) NOT NULL,
  `Exportateur` int(11) NOT NULL,
  `Date` date NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NbrHab` int(11) NOT NULL,
  `Surface` varchar(255) NOT NULL,
  `QteCafeProd` varchar(255) NOT NULL,
  `PourcentageProdMondiale` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `CheminDrapeau` varchar(255) NOT NULL,
  `Capitale` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `typecafe`
--

DROP TABLE IF EXISTS `typecafe`;
CREATE TABLE IF NOT EXISTS `typecafe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TypeCafe` varchar(255) NOT NULL,
  `Provenance` int(11) NOT NULL,
  `QteStock` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TypeUtilisateur` varchar(255) NOT NULL,
  `Identifiant` varchar(255) NOT NULL,
  `Mdp` varchar(255) NOT NULL,
  `NomEntreprise` varchar(255) NOT NULL,
  `NumTel` varchar(255) NOT NULL,
  `IdAdresse` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `TypeUtilisateur`, `Identifiant`, `Mdp`, `NomEntreprise`, `NumTel`, `IdAdresse`) VALUES
(1, 'Exportateur', 'Test', 'ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff', 'Entreprise test', '0101010101', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
