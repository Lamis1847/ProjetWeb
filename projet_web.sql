-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 20 déc. 2022 à 16:09
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_web`
--

-- --------------------------------------------------------

--
-- Structure de la table `kanban`
--

DROP TABLE IF EXISTS `kanban`;
CREATE TABLE IF NOT EXISTS `kanban` (
  `Id` int(255) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `visibilite` enum('public','prive') COLLATE utf8mb4_bin NOT NULL,
  `IdCreateur` int(255) NOT NULL,
  `nbTable` int(255) NOT NULL,
  `Statut1` enum('A_FAIRE','EN_COURS','TERMINE') COLLATE utf8mb4_bin NOT NULL,
  `Statut2` enum('A_FAIRE','EN_COURS','TERMINE') COLLATE utf8mb4_bin NOT NULL,
  `Statut3` enum('A_FAIRE','EN_COURS','TERMINE') COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `kanban`
--

INSERT INTO `kanban` (`Id`, `titre`, `description`, `visibilite`, `IdCreateur`, `nbTable`, `Statut1`, `Statut2`, `Statut3`) VALUES
(1, 'kanban', 'kanban description', 'public', 1, 0, 'A_FAIRE', 'A_FAIRE', 'A_FAIRE'),
(2, 'ABCD', 'kanban 2 description', 'public', 1, 0, 'A_FAIRE', 'A_FAIRE', 'A_FAIRE'),
(3, 'news9', 'hello', 'public', 1, 1, 'A_FAIRE', 'A_FAIRE', 'A_FAIRE');

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

DROP TABLE IF EXISTS `participant`;
CREATE TABLE IF NOT EXISTS `participant` (
  `Id` int(255) NOT NULL AUTO_INCREMENT,
  `Iduser` int(255) NOT NULL,
  `Idkanban` int(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `participant`
--

INSERT INTO `participant` (`Id`, `Iduser`, `Idkanban`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

DROP TABLE IF EXISTS `tache`;
CREATE TABLE IF NOT EXISTS `tache` (
  `Id` int(255) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `idKanban` int(255) NOT NULL,
  `idUser` int(255) NOT NULL,
  `dateLimite` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `tache`
--

INSERT INTO `tache` (`Id`, `titre`, `description`, `idKanban`, `idUser`, `dateLimite`, `status`) VALUES
(1, 'tache1', 'description tache', 1, 1, '2022-12-15', 'affectee'),
(2, 'tache2', 'description tache', 2, 1, '2022-12-14', 'affectee');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `Id` int(255) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `motDePasse` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `userName` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `numero` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`Id`, `nom`, `prenom`, `email`, `motDePasse`, `userName`, `numero`) VALUES
(1, 'boufafa', 'lamis', 'lamisboufafa@esi.dz', '0000', 'lamis', ''),
(3, 'Chebbi', 'Lakhdar', 'lakhdar7606@gmail.com', '123', 'chebbi', '0745642982'),
(6, 'test', 'test', 'test@esi.dz', '$1$Cx/ip1vO$5J.D8XUv6aR1ivn8ojh6H.', 'test', '0553351917'),
(10, 'test', 'test', 'test', 'test', '', ''),
(9, 'imed', 'imed', 'imed@esi.dz', '$1$C4Cqe8h.$uiNNCw9.i.RWOvDXjngvq1', 'imed', '0553351917');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
