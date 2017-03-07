-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 07 Mars 2017 à 10:48
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
-- Structure de la table `amis`
--

CREATE TABLE `amis` (
  `utilisateur1` int(11) NOT NULL,
  `utilisateur2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `id_utilisateur` int(11) NOT NULL,
  `confirmation_token` varchar(60) DEFAULT NULL,
  `token_stat` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`id`, `username`, `password`, `email`, `id_utilisateur`, `confirmation_token`, `token_stat`) VALUES
(35, 'moi@chezmoi.com', '$2y$10$8L/Rq5M9V8OCW3GvGBMe0uQ4eektk5mTa7TpBaeI99YD00QbXf.Dm', '123456', 82, '2jdxfve7mejMLdE6ADXxFJBg0NPPPIl9vQUdXBGVqIkY3A4uoFcDEqQJaMqT', 0),
(36, 'moi@chezmoi.com', '$2y$10$DiR8ARQmvwipzCrLQ9dat.dMDllSly2j2k4pPXuafLOPRufSjBxwm', '123456', 83, 'KX8iTXa4jnksN5uyy0gmrqnvlMRHWi7El4VLfvTMzfnrtoPGa4KVhzBUPiCu', 0),
(37, 'moi@chezmoi.com', '$2y$10$CxzYQ6Gu6lD/i6P2JFyZy.uTbEdC9k.bZQ38z.mQHtnPzKOPuWXA2', '123456', 84, 'FD76gsgu05hSRal6mOnyM1St5yPguKIhkOqS8bwmIB6OTOyeQb48Ig3GPeNM', 0),
(38, NULL, '$2y$10$C7mmASbRYlj9ee1SZnLOce0z14ypZnTXLVLzeUOoFEYQyMg.3uJ1q', 'moi@chezmoi.com', 85, 'QuMMRVTpe7Ue3Xs65ZcwLrf0ZPFKZqQ7pGijZqlKZSyCtuDH4eVR40moEdvW', 0),
(39, 'nouveau', '$2y$10$2tTIg173v9N9ymsPNyV63uWOxuPPcYW4SqP44yvaSLJC8DBSGqV7q', 'moi@chezmoi.com', 86, 'DEsRIalHani4HoP2JT6gG6Ey33XM0J7wuWv8Q2JwSfH8V46myy4wWzLFWQps', 0),
(40, 'coucou', '$2y$10$44e3RtCKO262SJwY57IkyO/NtOOV8BUipMor.ciFQ.Xas6zbzl1SO', 'moi@chezmoi.com', 87, 'GeGNibUJ5nHxwW0AKT07S6L5FTKyh1wu0sj6iKW8Bc0pTaUge32j56lc1QXD', 0),
(41, 'nounous', '$2y$10$uCX4eRqpViy3UkEWNv4hgu15UJSkFN.GjpwThUVzuHrPBWV8ulykW', 'moi@chezmoi.com', 88, '6qTwOFLXp8q5a180pqO6i5WVDXjQGgC67jYqP31Clq1Kf2orPt9X4AxkMtiB', 0),
(42, 'nouveaun', '$2y$10$XdiT./je0AcK.OvkyAY51.xgxasEM6EUpNngpOqqxkkHLP0SP5nHu', 'moi@chezmoi.com', 89, 'cO4CpXdOZb7g5KSyceEvyPZG7v4FTfTVynuqahZTa9agEe37rNCzaZuMjRwV', 0),
(43, 'nouveaunm', '$2y$10$20oxldiXH/Tir/utWsAcNOqeAxqIPYPwNY2IAK7VLkCJVHLxgdEG2', 'moi@chezmoi.com', 90, 'bw6FmyoG3K3CsckWszPEEcckE5MxWB1ttwkppGw1I10WDGVO5012X17hSFqG', 0),
(44, 'Alex', '$2y$10$ozHil14q7fgH/R2llQfcl.1xI4aiklOHi8Wty/sge8y45djpWVIVC', 'moi@chezmoi.com', 91, 'WCKMP75Q8SzahWiHxOcJE3wXdnTPFDztCdQ2REPay6AfVfvGBSx2f92mwmoY', 0),
(45, 'Alex26', '$2y$10$ddsItAQNnB9CjcmG99pJKOKRL8UIb4gAM5hWIVjqIqMEZhP20TNaS', 'moi@chezmoi.com', 92, 'oh3UUQB68yCAteaTKfZMKDLLN7TVPqrxIQwcIxuwJvGG7Qn2imuf8egMKmdC', 0),
(46, 'catin', '$2y$10$lQiqC1OJr1/t1jVWIzmb5.Dx56KWbI2U5XSaAQh3J.dEvIYsHwEh6', 'moi@chezmoi.com', 93, '5VbT3oMIWu8SHZI8g2KvBgB9gypkDUSAQPSIebFaFYlZwwaoT9iv6SMpPcNH', 0),
(47, 'Julienmmm', '$2y$10$fmLfO.UJchUvlUrz8c0raOENLWHyuzd6UtVPfglh3FpHgv0yQ3kee', 'moi@chezmoi.com', 94, '03vTvKQGZ2HHggTLRMTZ8avH7Ibylk63pMllkTYVkVIPGYaDNRzWhARxRtJq', 0),
(48, 'hxtfyjxd', '$2y$10$VP0PBC39lt4mGB7RtTSMa.eSJ9dznhNc7iESUbGaY0Uvjq6wBS8N.', 'moi@chezmoi.com', 95, '2R1L369ssD3ZiKQtuC6ajAF4y9Y0Duz6ijLCjtWJwQ2f3ZAsSZokhSntm9gL', 0),
(49, 'ygfkuytfÃ¨urtf', '$2y$10$jWA78ILlJS5D/7/xCFNsT.njf.yfWP0.1IBtyTxy.h/mDksPOKapG', 'moi@chezmoi.com', 96, 'q3zJwV48HMLeaOyAkUAsLgliDRLxBQnkNSE8PLNPKjA6BgOL0SeNB69ZQ8XQ', 0),
(50, 'utdydrtuy', '$2y$10$m0ohKPyAMX.CNvAZifmEyO6/.z.2UUyTCA/iktCAYJQuC34Cdm0om', 'test@chezmoi.com', 97, 'nvTDLIE6KyhYIMqotwpnaquEAF2kzZeQHhqev8SxHpUOn34pm0z0oXur2qIx', 0),
(51, 'kgdqigigyayigd', '$2y$10$EQsCMvpH3sGCar5tplazFOFLYHIZm9YzHY/jh0wb5HFMbjaqCejCS', 'mqoi@chezmoi.com', 98, 'WFquan0Pyzjyd3MYjUOYJDe56W3ogyf0Wyn01609XzpaavQk2u1k3FT8DRhj', 0),
(52, 'fxcjydfy', '$2y$10$1qkPbBiPFGVZzz7TWl9XMeGfKGtWSthmqLP1rVk6VlEApvk8SxGL2', 'test@chezmoi.com', 99, 'TebfLdFng49rmVfO828sPeGZ0beVYpNnzwBjQ4Hif4Tf88PR7yNItKQWq5qg', 0),
(53, 'hdrjry', '$2y$10$1zBT/bPAnZs9RXQlVbh85OjF8MoQ/uvzDR1aqUxa7ZAs//k.lWIYS', 'test@chezmoi.com', 100, 'i5olGlw9B2d9rioNyE067fbtB1XCmrlvftsV91SCk9RsiDQnENIMIWp6Kh7z', 0),
(54, 'nouveau645', '$2y$10$ci5eyUAuGxxm36Y.sxw60uJnWf6Q1wIPmGA3Fegue0PPRVojxJtOy', 'test@chezmoi.com', 101, 'Rc8CzMEzlAGGcMiolIF8sWV3vzCSQmbzIZj36q5147p5hFqk6gBRwf0szP7j', 0),
(55, 'nouveau789', '$2y$10$IIq6weP1wKy/2fXXDc2nSejbYlmP6AQnNqgUGEA9h7tuVKHweyWu2', 'test@chezmoi.com', 102, 'hsbHrl8pmTk9uRgwbRcd8sAJoKUZXsI9xKxv1TKS6VwNMeu5WC1r8JRWQzzd', 0),
(56, 'camenerve', '$2y$10$p.oOWtYFYqz4O3iL9j7.fOgBVBDbUCoGUE3tdf7fIm2tQSnBPUxX6', 'kat@kayhome.fr', 103, '0PuxhULSz2nAYfX4LgF8HHOiFfT1m6hlZrMRzM7rZB7ukfttp3NQpD99oa1U', 0),
(57, 'msdjgfzyrzrt', '$2y$10$toiT/QFIALjACrqzU7UW5.g0vajkBz7vN4LY870Ls7/agFmnVOqLK', 'son@chezsoi.com', 104, 'vf4Mv5Z7DUuKmskYI2l0uC1m0zTNvEKEYg1InSZsXMMBGZvrdjAv0sqbofhu', 0),
(58, 'rggerffszsdd', '$2y$10$NtEFFHFa0QScyu0nK0sO6.NR385M8bMOMRIBTxaP4ELf3x53b3ki2', 'moi@chezmoi.com', 105, 'k9ThyleetW9GhGBBWFgQxLlwGYsuAPNs51js2cX7u2afKLsRD3K1EqgbCNZs', 0);

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
  `email` varchar(255) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `photo` varchar(45) DEFAULT NULL,
  `date_naissance` datetime DEFAULT NULL,
  `pays` varchar(45) DEFAULT NULL,
  `ville` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `email`, `description`, `photo`, `date_naissance`, `pays`, `ville`, `prenom`, `age`, `nom`) VALUES
(82, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unset'),
(83, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unset'),
(84, '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unset'),
(85, 'moi@chezmoi.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unset'),
(86, 'moi@chezmoi.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unset'),
(87, 'moi@chezmoi.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unset'),
(88, 'moi@chezmoi.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unset'),
(89, 'moi@chezmoi.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unset'),
(90, 'moi@chezmoi.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unset'),
(91, 'moi@chezmoi.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unset'),
(92, 'moi@chezmoi.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unset'),
(93, 'moi@chezmoi.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unset'),
(94, 'moi@chezmoi.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unset'),
(95, 'moi@chezmoi.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unset'),
(96, 'moi@chezmoi.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unset'),
(97, 'test@chezmoi.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unset'),
(98, 'mqoi@chezmoi.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unset'),
(99, 'test@chezmoi.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unset'),
(100, 'test@chezmoi.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unset'),
(101, 'test@chezmoi.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unset'),
(102, 'test@chezmoi.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unset'),
(103, 'kat@kayhome.fr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unset'),
(104, 'son@chezsoi.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unset'),
(105, 'moi@chezmoi.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'unset');

-- --------------------------------------------------------

--
-- Structure de la table `validation`
--

CREATE TABLE `validation` (
  `confirmatio_token` varchar(60) DEFAULT NULL,
  `confirmed_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `amis`
--
ALTER TABLE `amis`
  ADD KEY `utilisateur` (`utilisateur1`),
  ADD KEY `ami` (`utilisateur2`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT pour la table `mur`
--
ALTER TABLE `mur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;
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
