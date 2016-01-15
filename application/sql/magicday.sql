-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 15 Janvier 2016 à 21:22
-- Version du serveur :  10.0.21-MariaDB
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `magicday`
--

-- --------------------------------------------------------

--
-- Structure de la table `album`
--

CREATE TABLE `album` (
  `idAlbum` int(11) NOT NULL,
  `libelleAlbum` varchar(45) NOT NULL,
  `afficherAlbum` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `association`
--

CREATE TABLE `association` (
  `idAssociation` int(11) NOT NULL,
  `libelleAssociation` varchar(45) NOT NULL,
  `urlPhotoAssociation` varchar(45) NOT NULL,
  `afficherAssociation` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `atelier`
--

CREATE TABLE `atelier` (
  `idAtelier` int(11) NOT NULL,
  `libelleAtelier` varchar(45) NOT NULL,
  `descriptionAtelier` varchar(45) NOT NULL,
  `afficherAtelier` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contenu`
--

CREATE TABLE `contenu` (
  `idcontenu` int(11) NOT NULL,
  `TitreContenu` varchar(45) NOT NULL,
  `TexteContenu` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `idImage` int(11) NOT NULL,
  `libelleLogo` varchar(45) NOT NULL,
  `urlIMAGE` varchar(45) NOT NULL,
  `afficherImage` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
  `idJoueur` int(11) NOT NULL,
  `pseudo` varchar(45) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `table` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `jeton` int(11) NOT NULL,
  `preinscription` tinyint(1) NOT NULL,
  `inscription` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `logo`
--

CREATE TABLE `logo` (
  `idLogo` int(11) NOT NULL,
  `libelleLogo` varchar(45) NOT NULL,
  `urlLogo` varchar(45) NOT NULL,
  `afficherLogo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `idPhoto` int(11) NOT NULL,
  `libellePhoto` varchar(45) NOT NULL,
  `urlPhoto` varchar(45) NOT NULL,
  `afficherPhoto` tinyint(1) NOT NULL,
  `idAlbum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `score_atelier`
--

CREATE TABLE `score_atelier` (
  `idScoreAtelier` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `idJoueur` int(11) DEFAULT NULL,
  `idAtelier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`idAlbum`);

--
-- Index pour la table `association`
--
ALTER TABLE `association`
  ADD PRIMARY KEY (`idAssociation`);

--
-- Index pour la table `atelier`
--
ALTER TABLE `atelier`
  ADD PRIMARY KEY (`idAtelier`);

--
-- Index pour la table `contenu`
--
ALTER TABLE `contenu`
  ADD PRIMARY KEY (`idcontenu`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`idImage`);

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`idJoueur`);

--
-- Index pour la table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`idLogo`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`idPhoto`),
  ADD KEY `FK_Photo_Album` (`idAlbum`);

--
-- Index pour la table `score_atelier`
--
ALTER TABLE `score_atelier`
  ADD PRIMARY KEY (`idScoreAtelier`),
  ADD KEY `fk_score_atelier_joueur` (`idJoueur`),
  ADD KEY `fk_score_atelier_atelier` (`idAtelier`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `album`
--
ALTER TABLE `album`
  MODIFY `idAlbum` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `association`
--
ALTER TABLE `association`
  MODIFY `idAssociation` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `atelier`
--
ALTER TABLE `atelier`
  MODIFY `idAtelier` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `contenu`
--
ALTER TABLE `contenu`
  MODIFY `idcontenu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `idImage` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `joueur`
--
ALTER TABLE `joueur`
  MODIFY `idJoueur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `logo`
--
ALTER TABLE `logo`
  MODIFY `idLogo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `idPhoto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `score_atelier`
--
ALTER TABLE `score_atelier`
  MODIFY `idScoreAtelier` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `FK_Photo_Album` FOREIGN KEY (`idAlbum`) REFERENCES `album` (`idAlbum`);

--
-- Contraintes pour la table `score_atelier`
--
ALTER TABLE `score_atelier`
  ADD CONSTRAINT `fk_score_atelier_atelier` FOREIGN KEY (`idAtelier`) REFERENCES `album` (`idAlbum`),
  ADD CONSTRAINT `fk_score_atelier_joueur` FOREIGN KEY (`idJoueur`) REFERENCES `joueur` (`idJoueur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
