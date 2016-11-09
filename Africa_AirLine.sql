-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 09 Novembre 2016 à 00:40
-- Version du serveur :  5.6.30
-- Version de PHP :  5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `Africa_AirLine`
--

-- --------------------------------------------------------

--
-- Structure de la table `Bookings`
--

CREATE TABLE IF NOT EXISTS `Bookings` (
  `id` int(11) NOT NULL,
  `passanger_id` int(11) NOT NULL,
  `datebooking` date NOT NULL,
  `numberinparty` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE IF NOT EXISTS `evenements` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_done` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `evenements`
--

INSERT INTO `evenements` (`id`, `name`, `is_done`) VALUES
(1, 'swag life', 1),
(20, 'air plane crashing', 1),
(21, 'air plane crashing', 1),
(22, 'asdsad', 1),
(23, 'dsad', 0),
(24, 'ez life', 1),
(25, 'swag', 1),
(26, 'wowssadsad', 0),
(27, 'swag', 1),
(28, 'kiet momo', 1),
(29, 'asds', 1),
(30, 'dsadasd', 0);

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 = Active, 0 = Inactive'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `files`
--

INSERT INTO `files` (`id`, `name`, `path`, `created`, `modified`, `status`) VALUES
(1, 'hello.png', 'uploads/files/', '2016-09-21 21:44:54', '2016-09-21 21:44:54', 1),
(2, 'Koala.jpg', 'uploads/files/', '2016-09-21 22:29:34', '2016-09-21 22:29:34', 1),
(3, 'Hydrangeas.jpg', 'uploads/files/', '2016-09-21 22:36:27', '2016-09-21 22:36:27', 1),
(4, 'Lighthouse.jpg', 'uploads/files/', '2016-09-23 13:43:46', '2016-09-23 13:43:46', 1),
(5, 'Chrysanthemum.jpg', 'uploads/files/', '2016-10-27 18:31:02', '2016-10-27 18:31:02', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Journey_Legs`
--

CREATE TABLE IF NOT EXISTS `Journey_Legs` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `leg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Legs`
--

CREATE TABLE IF NOT EXISTS `Legs` (
  `id` int(11) NOT NULL,
  `actual_departure_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `actual_arrival_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Legs`
--

INSERT INTO `Legs` (`id`, `actual_departure_time`, `actual_arrival_time`) VALUES
(1, '2021-11-30 00:00:00', '2021-11-30 00:00:00'),
(2, '2021-11-30 00:00:00', '2021-11-30 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `Passangers`
--

CREATE TABLE IF NOT EXISTS `Passangers` (
  `id` int(11) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `adresse` varchar(40) NOT NULL,
  `ville` varchar(30) NOT NULL,
  `province` varchar(30) NOT NULL,
  `pays` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Passangers`
--

INSERT INTO `Passangers` (`id`, `prenom`, `nom`, `telephone`, `email`, `adresse`, `ville`, `province`, `pays`) VALUES
(8, 'users', 'wdas', 'sdfad', 'asd@asd.com', 'sadasd', 'saad', 'Aguascalientes', 'Mexique'),
(9, 'sdasd', 'sadds', 'dsadsa', 'asdas@asd.com', 'sadsada', 'sadas', 'Quebec', 'Canada');

-- --------------------------------------------------------

--
-- Structure de la table `Passanger_File`
--

CREATE TABLE IF NOT EXISTS `Passanger_File` (
  `id` int(11) NOT NULL,
  `passanger_id` int(11) NOT NULL,
  `files_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Pays`
--

CREATE TABLE IF NOT EXISTS `Pays` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Pays`
--

INSERT INTO `Pays` (`id`, `nom`) VALUES
(1, 'Canada'),
(2, 'États-Unis'),
(3, 'Mexique');

-- --------------------------------------------------------

--
-- Structure de la table `Provinces`
--

CREATE TABLE IF NOT EXISTS `Provinces` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `pays_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Provinces`
--

INSERT INTO `Provinces` (`id`, `nom`, `pays_id`) VALUES
(5, 'Quebec', 1),
(6, 'Ontario', 1),
(8, 'Maine', 2),
(9, 'Massachusetts', 2),
(10, 'Aguascalientes', 3),
(11, 'Baja California', 3),
(12, 'Baja California Sur', 3);

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Users`
--

INSERT INTO `Users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(16, 'users', '$2y$10$Q4OHyVA0qBdJKIoDY/EsgeCHCjB8bdn4riRCqSD/tdaZhy4VxJKP.', 'admin', '2016-09-21 18:18:01', '2016-09-21 18:18:01'),
(17, 'superuse', '$2y$10$tDrlnKfPx11qA/EIWr.CoueoFc/6yyfgMq7vInFkClC200oO/XOTa', 'superuser', '2016-09-21 18:36:05', '2016-09-21 19:34:17');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Bookings`
--
ALTER TABLE `Bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `passagerid` (`passanger_id`);

--
-- Index pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Journey_Legs`
--
ALTER TABLE `Journey_Legs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Booking_id` (`booking_id`),
  ADD KEY `leg_id` (`leg_id`);

--
-- Index pour la table `Legs`
--
ALTER TABLE `Legs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Passangers`
--
ALTER TABLE `Passangers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Passanger_File`
--
ALTER TABLE `Passanger_File`
  ADD PRIMARY KEY (`id`),
  ADD KEY `passanger_id` (`passanger_id`),
  ADD KEY `files_id` (`files_id`);

--
-- Index pour la table `Pays`
--
ALTER TABLE `Pays`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Provinces`
--
ALTER TABLE `Provinces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pays_id` (`pays_id`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Bookings`
--
ALTER TABLE `Bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `evenements`
--
ALTER TABLE `evenements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `Journey_Legs`
--
ALTER TABLE `Journey_Legs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Legs`
--
ALTER TABLE `Legs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `Passangers`
--
ALTER TABLE `Passangers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `Passanger_File`
--
ALTER TABLE `Passanger_File`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Pays`
--
ALTER TABLE `Pays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Provinces`
--
ALTER TABLE `Provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Bookings`
--
ALTER TABLE `Bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`passanger_id`) REFERENCES `Passangers` (`id`);

--
-- Contraintes pour la table `Journey_Legs`
--
ALTER TABLE `Journey_Legs`
  ADD CONSTRAINT `booking_id` FOREIGN KEY (`booking_id`) REFERENCES `Bookings` (`id`),
  ADD CONSTRAINT `leg_id` FOREIGN KEY (`leg_id`) REFERENCES `Legs` (`id`);

--
-- Contraintes pour la table `Passanger_File`
--
ALTER TABLE `Passanger_File`
  ADD CONSTRAINT `filesId` FOREIGN KEY (`files_id`) REFERENCES `files` (`id`),
  ADD CONSTRAINT `passagerId` FOREIGN KEY (`passanger_id`) REFERENCES `Passangers` (`id`);

--
-- Contraintes pour la table `Provinces`
--
ALTER TABLE `Provinces`
  ADD CONSTRAINT `pays` FOREIGN KEY (`pays_id`) REFERENCES `Pays` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
