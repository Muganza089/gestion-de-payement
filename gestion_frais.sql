-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 13 juin 2024 à 09:34
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
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `motDePasse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `nom`, `motDePasse`) VALUES
(1, 'user', 1234),
(2, 'user', 1234);

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `id` int(11) NOT NULL,
  `matricule` varchar(50) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `postnom` varchar(100) NOT NULL,
  `promotion` varchar(50) NOT NULL,
  `motdepasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiants`
--

INSERT INTO `etudiants` (`id`, `matricule`, `nom`, `postnom`, `promotion`, `motdepasse`) VALUES
(1, 'hdgdhhg', 'kalenga', 'mutombo', 'l4', '1234'),
(2, 'hdgdhhg', 'kalenga', 'mutombo', 'l4', '1234'),
(3, '20MS353', 'israel Shindano', 'sdasd', 'dsasdf', '1234'),
(6, 'abcd', 'muganza', 'shindano', 'l4', ''),
(7, 'abcd', 'muganza', 'shindano', 'l4', ''),
(8, 'abcd', 'muganza', 'shindano', 'l4', ''),
(9, 'abcd', 'israel', 'kalala', 'L4', ''),
(10, 'abcd', 'israel', 'kalala', 'L4', ''),
(11, 'tttt', 'kasongo', 'mukendi', 'L4', ''),
(12, 'tttt', 'kasongo', 'mukendi', 'L4', ''),
(13, 'tttt', 'kasongo', 'mukendi', 'L4', ''),
(14, 'tttt', 'kasongo', 'mukendi', 'L4', ''),
(15, 'abcd', 'israel', 'kalala', 'L4', ''),
(16, 'abcd', 'israel', 'kalala', 'L4', '');

-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `etudiant_id` int(11) NOT NULL,
  `tranche` int(11) NOT NULL,
  `montant` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `payments`
--

INSERT INTO `payments` (`id`, `etudiant_id`, `tranche`, `montant`, `created_at`) VALUES
(1, 1, 1, 56, '2024-06-10 19:31:38'),
(4, 2, 2, 250, '2024-06-10 22:27:24'),
(5, 3, 1, 100, '2024-06-10 22:38:14'),
(11, 3, 1, 250, '2024-06-12 21:49:32'),
(12, 3, 1, 250, '2024-06-12 21:56:14'),
(13, 3, 1, 250, '2024-06-12 21:58:17'),
(14, 3, 1, 250, '2024-06-12 21:58:21'),
(15, 3, 2, 250, '2024-06-12 21:58:43'),
(16, 3, 2, 250, '2024-06-12 21:59:27'),
(17, 3, 2, 250, '2024-06-12 21:59:49');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etudiant_id` (`etudiant_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
