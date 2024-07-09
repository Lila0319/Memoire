-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 09 juil. 2024 à 11:08
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
-- Base de données : `lm`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id_admin`, `username`, `password`) VALUES
(1, 'Admin', 'admin'),
(3, 'admin', 'admin'),
(4, 'orne', '$2y$10$OVUaojLYJpEjmyH3UcLGCeJpfDg6mkTeJvyj9ezrIbaBhiAwKRpGu'),
(5, 'lila', '$2y$10$UTPiXFIlvNMwHtrPf.gM/emE6o/SAijdG4wwWLkdgETqIawwa8dkK'),
(6, 'admin', 'LILA{uSername_Valid_2024}'),
(7, 'root', '$2y$10$EEDtPjY0YaNIH7AQtMIjNeo2wCzk55H5WqVqPl3t84t4vDVnSrkTG');

-- --------------------------------------------------------

--
-- Structure de la table `demandes`
--

CREATE TABLE `demandes` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenoms` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `adresse` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenoms` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `numero` varchar(100) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `login_attempts` int(11) DEFAULT 0,
  `lockout_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `prenoms`, `email`, `numero`, `adresse`, `username`, `password`, `login_attempts`, `lockout_time`) VALUES
(1, 'HOUESSOU', 'Lilance', 'septucehouessou@gmail.com', '94568120', 'cotonou', 'lilance', '$2y$10$.PGRXz2I7R7aV7Dk.OZEr.aZn5yQshbATlvuJHfWPGx3IavD2XTDa', 3, '2024-06-21 11:12:14'),
(2, 'HOUESSOU', 'Lilance', 'septucehouessou@gmail.com', '94568120', 'cotonou', 'lilance', '$2y$10$Bw8M7ZJMNLyvnQGJ5ncqt.jFnZG0BhTmdIpejIl.KregkYbbyG/Qa', 3, '2024-06-21 11:12:14'),
(3, 'HOUESSOU', 'Lilance', 'septucehouessou@gmail.com', '94568120', 'cotonou', 'lilance', '$2y$10$o89vTemN.AEH8S/0RnZileXNs65YcjsgN1Leq6uDwQydlvrUt6OCC', 3, '2024-06-21 11:12:14'),
(8, 'orné ', 'lila', 'septucehouessou@gmail.com', '94568120', 'cotonou', 'orne', '$2y$10$5hO94Oy9UKWHc5V5f1gtG.kSvshBVDtFCUuIpt3bXKDF2Jr2DVGpa', 0, NULL),
(9, 'jjj', 'hhh', 'septucehouessou@gmail.com', 'juuu', 'kkk', 'lila', '$2y$10$KHRJGa2sftBY.39ssM0ZmuH9w67MwuWWh.ecqpyDZf1DUcHKR93lq', 0, NULL),
(10, 'kjj', 'hhh', 'septucehouessou@gmail.com', 'hhh', 'hhh', 'lila', '$2y$10$xksl/ZfTg0V74WX.ODtxwu0M9cryQWdiEq.dcyiNQR5XCk.zHA9nW', 0, NULL),
(12, NULL, NULL, NULL, NULL, NULL, 'flag', 'LILA{userNam3_c0mpT3_Invalid}', 0, NULL),
(13, NULL, NULL, NULL, NULL, NULL, 'jdoe', '*A0F874BC7F54EE086FCE60A37CE7887D8B31086B', 0, NULL),
(14, NULL, NULL, NULL, NULL, NULL, 'asmith', '*A0F874BC7F54EE086FCE60A37CE7887D8B31086B', 0, NULL),
(15, NULL, NULL, NULL, NULL, NULL, 'bjones', '*A0F874BC7F54EE086FCE60A37CE7887D8B31086B', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `users2`
--

CREATE TABLE `users2` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users2`
--

INSERT INTO `users2` (`id`, `username`, `email`, `password`) VALUES
(1, 'lilance', 'septucehouessou@gmail.com', '$2y$10$uKHrYavr0dWFOiSwciC/VeLs3.PQfp5c3LVt60gs3g1ZYBk6xLYWy');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `demandes`
--
ALTER TABLE `demandes`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `users2`
--
ALTER TABLE `users2`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `demandes`
--
ALTER TABLE `demandes`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `users2`
--
ALTER TABLE `users2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
