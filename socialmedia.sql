-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 24 Février 2017 à 10:46
-- Version du serveur :  5.7.17-0ubuntu0.16.04.1
-- Version de PHP :  7.0.15-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `socialmedia`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `commentaire` varchar(255) DEFAULT NULL,
  `heure` varchar(45) DEFAULT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_mur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `mur`
--

CREATE TABLE `mur` (
  `id` int(11) NOT NULL,
  `id_message` varchar(45) DEFAULT NULL,
  `id_mur` int(11) DEFAULT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `heure` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `amis` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `photo` varchar(45) DEFAULT NULL,
  `date_naissance` datetime DEFAULT NULL,
  `pays` varchar(45) DEFAULT NULL,
  `ville` varchar(45) DEFAULT NULL,
  `prenom_nom` varchar(45) DEFAULT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `amis`, `email`, `description`, `photo`, `date_naissance`, `pays`, `ville`, `prenom_nom`, `age`) VALUES
(1, 'Ya quelqu\'un ? ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`,`id_utilisateur`,`id_mur`),
  ADD KEY `fk_commentaire_utilisateur1_idx` (`id_utilisateur`),
  ADD KEY `fk_commentaire_mur1_idx` (`id_mur`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id`,`id_utilisateur`),
  ADD KEY `fk_compte_utilisateur1_idx` (`id_utilisateur`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_utilisateur_2` (`id_utilisateur`),
  ADD KEY `id_utilisateur_3` (`id_utilisateur`);

--
-- Index pour la table `mur`
--
ALTER TABLE `mur`
  ADD PRIMARY KEY (`id`,`id_utilisateur`),
  ADD KEY `fk_mur_utilisateur1_idx` (`id_utilisateur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `mur`
--
ALTER TABLE `mur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_commentaire_mur1` FOREIGN KEY (`id_mur`) REFERENCES `mur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_commentaire_utilisateur1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `fk_compte_utilisateur1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `mur`
--
ALTER TABLE `mur`
  ADD CONSTRAINT `fk_mur_utilisateur1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
