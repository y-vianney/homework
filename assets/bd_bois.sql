-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 20 juin 2023 à 20:01
-- Version du serveur : 5.7.39
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_bois`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `mat_cli` varchar(15) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `type_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`mat_cli`, `nom`, `prenom`, `contact`, `type_client`) VALUES
('0072902', 'ADJUMANY', 'Yann Axel Vianney', '0554604510', 2),
('0073124', 'Sehe Bi', 'Lebon Campbell', '0704116960', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `cmd_id` varchar(10) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `prix` int(11) NOT NULL,
  `statut` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`cmd_id`, `libelle`, `prix`, `statut`) VALUES
('1', 'Commande de biscuit QUADRATINI pour 50', 162500, '1');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `code_prod` varchar(10) NOT NULL,
  `libelle` varchar(55) NOT NULL,
  `prix` int(7) NOT NULL,
  `disponibilite` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`code_prod`, `libelle`, `prix`, `disponibilite`) VALUES
('1', 'Quadratini', 3625, 1);

-- --------------------------------------------------------

--
-- Structure de la table `type_client`
--

CREATE TABLE `type_client` (
  `type_id` int(11) NOT NULL,
  `libelle` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_client`
--

INSERT INTO `type_client` (`type_id`, `libelle`) VALUES
(1, 'VIP'),
(2, 'ORDINAIRE'),
(3, 'VIP ENTREPRISE');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`mat_cli`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`cmd_id`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`code_prod`);

--
-- Index pour la table `type_client`
--
ALTER TABLE `type_client`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `type_client`
--
ALTER TABLE `type_client`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
