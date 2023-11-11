-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 12 nov. 2023 à 00:09
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
-- Base de données : `enregistrement_contacts`
--

-- --------------------------------------------------------

--
-- Structure de la table `connexions`
--

CREATE TABLE `connexions` (
  `id` int(2) NOT NULL,
  `email` varchar(30) NOT NULL,
  `motdepasse` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `connexions`
--

INSERT INTO `connexions` (`id`, `email`, `motdepasse`) VALUES
(1, 'moustaphafek@gmail.com', 'LoveSex');

-- --------------------------------------------------------

--
-- Structure de la table `inserercontacts`
--

CREATE TABLE `inserercontacts` (
  `Nom` varchar(20) NOT NULL,
  `Numero` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `inserercontacts`
--

INSERT INTO `inserercontacts` (`Nom`, `Numero`) VALUES
('Japhleth', 42471516),
('Moustapha', 51827150),
('Jeovani', 67675433),
('Eustache ', 90776654),
('Kailisthename', 97323377);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `connexions`
--
ALTER TABLE `connexions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inserercontacts`
--
ALTER TABLE `inserercontacts`
  ADD PRIMARY KEY (`Numero`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `connexions`
--
ALTER TABLE `connexions`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
