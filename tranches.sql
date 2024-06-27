-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 27 juin 2024 à 23:41
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_frais`
--

-- --------------------------------------------------------

--
-- Structure de la table `tranches`
--

CREATE TABLE `tranches` (
  `idtranche` int(11) NOT NULL,
  `nomtranche` varchar(255) NOT NULL,
  `amounttranche` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tranches`
--

INSERT INTO `tranches` (`idtranche`, `nomtranche`, `amounttranche`) VALUES
(1, 'tranche 1', 100),
(2, 'tranche 2', 200),
(3, 'tranche 3', 400);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tranches`
--
ALTER TABLE `tranches`
  ADD PRIMARY KEY (`idtranche`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tranches`
--
ALTER TABLE `tranches`
  MODIFY `idtranche` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
