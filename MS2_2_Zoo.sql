-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 22 fév. 2024 à 11:44
-- Version du serveur : 5.7.39
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `MS2_2_Zoo`
--

-- --------------------------------------------------------

--
-- Structure de la table `Animaux`
--

CREATE TABLE `Animaux` (
  `id_animaux` int(11) NOT NULL,
  `id_race` int(11) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `sexe` char(1) DEFAULT NULL,
  `pseudo` varchar(50) NOT NULL,
  `commentaire` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Animaux`
--

INSERT INTO `Animaux` (`id_animaux`, `id_race`, `date_naissance`, `sexe`, `pseudo`, `commentaire`) VALUES
(4, 1, '2010-06-04', 'M', 'bibou', 'test'),
(5, 1, '0015-11-13', 'F', 'blou', 'testtt'),
(9, 2, '1994-09-08', 'F', 'biloute', ''),
(13, 3, '2000-04-23', 'M', 'bliblou', ''),
(14, 4, '2024-01-01', 'M', 'Loupus', 'blanc aux yeux bleux'),
(15, 4, '2010-04-03', 'F', 'titiu', 'testtttt'),
(16, 1, '2010-04-03', 'F', 'tatiu', 'testtttt');

-- --------------------------------------------------------

--
-- Structure de la table `Enclos`
--

CREATE TABLE `Enclos` (
  `id_enclos` varchar(50) NOT NULL,
  `nom_enclos` varchar(50) NOT NULL,
  `capacite_max_animaux` int(11) NOT NULL,
  `taille_m2` int(11) DEFAULT NULL,
  `presence_eau` tinyint(1) NOT NULL,
  `id_responsable` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Especes`
--

CREATE TABLE `Especes` (
  `id_especes` int(11) NOT NULL,
  `nom_race` varchar(50) NOT NULL,
  `type_nourriture` enum('Carnivore','Herbivore','Omnivore') NOT NULL,
  `duree_vie_moyenne` decimal(4,1) NOT NULL,
  `aquatique` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Especes`
--

INSERT INTO `Especes` (`id_especes`, `nom_race`, `type_nourriture`, `duree_vie_moyenne`, `aquatique`) VALUES
(1, 'Faucon', 'Carnivore', '25.0', 0),
(2, 'Pingouin', 'Carnivore', '30.0', 1),
(3, 'Ours', 'Carnivore', '50.0', 0),
(4, 'Loup', 'Carnivore', '15.0', 0);

-- --------------------------------------------------------

--
-- Structure de la table `Loc_animaux`
--

CREATE TABLE `Loc_animaux` (
  `id_loc_animaux` int(11) NOT NULL,
  `id_animaux` int(11) NOT NULL,
  `id_enclos` varchar(50) DEFAULT NULL,
  `date_arrivee` date DEFAULT NULL,
  `date_sortie` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Personnels`
--

CREATE TABLE `Personnels` (
  `id_personnels` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `sexe` char(1) NOT NULL,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `fonction` enum('Directeur','Employe') NOT NULL,
  `salaire` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Personnels`
--

INSERT INTO `Personnels` (`id_personnels`, `nom`, `prenom`, `date_naissance`, `sexe`, `login`, `mdp`, `fonction`, `salaire`) VALUES
(1, 'test', 'test', '2024-01-02', 'M', 'test', 'test', 'Employe', '15000.00'),
(27, 'ee', 'ee', NULL, 'M', 'ee', 'ee', 'Employe', NULL),
(28, 'test1', 'test1', NULL, 'M', 'test1', 'test1', 'Directeur', NULL),
(29, 'Davida', 'Bella', '1998-02-02', 'F', 'davbel', 'davidabella', 'Employe', '15000.00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Animaux`
--
ALTER TABLE `Animaux`
  ADD PRIMARY KEY (`id_animaux`),
  ADD KEY `id_race` (`id_race`);

--
-- Index pour la table `Enclos`
--
ALTER TABLE `Enclos`
  ADD PRIMARY KEY (`id_enclos`),
  ADD KEY `id_responsable` (`id_responsable`);

--
-- Index pour la table `Especes`
--
ALTER TABLE `Especes`
  ADD PRIMARY KEY (`id_especes`);

--
-- Index pour la table `Loc_animaux`
--
ALTER TABLE `Loc_animaux`
  ADD PRIMARY KEY (`id_loc_animaux`),
  ADD KEY `id_animaux` (`id_animaux`),
  ADD KEY `id_enclos` (`id_enclos`);

--
-- Index pour la table `Personnels`
--
ALTER TABLE `Personnels`
  ADD PRIMARY KEY (`id_personnels`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Animaux`
--
ALTER TABLE `Animaux`
  MODIFY `id_animaux` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `Especes`
--
ALTER TABLE `Especes`
  MODIFY `id_especes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `Loc_animaux`
--
ALTER TABLE `Loc_animaux`
  MODIFY `id_loc_animaux` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Personnels`
--
ALTER TABLE `Personnels`
  MODIFY `id_personnels` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Animaux`
--
ALTER TABLE `Animaux`
  ADD CONSTRAINT `animaux_ibfk_1` FOREIGN KEY (`id_race`) REFERENCES `Especes` (`id_especes`);

--
-- Contraintes pour la table `Enclos`
--
ALTER TABLE `Enclos`
  ADD CONSTRAINT `enclos_ibfk_1` FOREIGN KEY (`id_responsable`) REFERENCES `Personnels` (`id_personnels`);

--
-- Contraintes pour la table `Loc_animaux`
--
ALTER TABLE `Loc_animaux`
  ADD CONSTRAINT `loc_animaux_ibfk_1` FOREIGN KEY (`id_animaux`) REFERENCES `Animaux` (`id_animaux`),
  ADD CONSTRAINT `loc_animaux_ibfk_2` FOREIGN KEY (`id_enclos`) REFERENCES `Enclos` (`id_enclos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
