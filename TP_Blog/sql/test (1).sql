-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2018 at 12:04 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(10) UNSIGNED NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `contenu` text COLLATE utf8mb4_bin NOT NULL,
  `date_publication` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_categorie` int(11) UNSIGNED NOT NULL,
  `id_auteur` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `titre`, `contenu`, `date_publication`, `id_categorie`, `id_auteur`) VALUES
(1, 'test Article', 'Ce comportement a changé en PHP 5 : le chemin est normalisé d\'abord, donc, le fichier C:\\PROGRA~1\\A.php est reconnu comme étant identique au fichier C:\\Program Files\\a.php et le fichier ne sera inclus qu\'une seule fois.', '2018-03-01 13:34:23', 1, 4),
(2, 'Toto va a la plage', 'Toto va a la plageToto va a la plageToto va a la plageToto va a la plageToto va a la plageToto va a la plageToto va a la plageToto va a la plageToto va a la plageToto va a la plageToto va a la plageToto va a la plageToto va a la plageToto va a la plageToto va a la plageToto va a la plageToto va a la plageToto va a la plageToto va a la plageToto va a la plageToto va a la plageToto va a la plageToto va a la plageToto va a la plageToto va a la plageToto va a la plageToto va a la plageToto va a la plage', '2018-03-01 22:08:39', 2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(10) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'titi'),
(2, 'Livre'),
(3, 'Video');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) UNSIGNED NOT NULL,
  `nom` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `prenom` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `password` char(70) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `password`) VALUES
(1, 'dede', 'dede', 'dede', 'aaaa'),
(2, 'dede', 'dddd', 'ddd', 'dddd'),
(3, '', 'ddzda', '', ''),
(4, 'ddddd', 'zzzzz', 'z', 'z'),
(5, 'ddddd', 'zzzzz', 'z', 'z'),
(6, 'ddddd', 'zzzzz', 'z', 'z'),
(7, 'ddddd', '.deded.', 'z', 'z'),
(8, 'ddddd', '.dddddddd.', 'z', 'z'),
(9, 'ddddd', '.dddddddddd.', 'z', 'z'),
(10, 'ddddd', 'ddddddddddddd', 'z', 'z'),
(11, 'ddddd', 'ddd', 'z', 'z'),
(12, 'ddddd', 'bcdedede', 'z', 'z'),
(13, 'ddddd', 'abcd', 'z', 'z'),
(14, 'ddddd', 'aaaaaa', 'z', 'z'),
(15, 'ddddd', 'bbbbbbbbb', 'z', 'z'),
(16, 'ddddd', 'cccccccc', 'z', 'z'),
(17, 'jean', 'ddddddddddddddddddd', 'email', '0b9c2625dc21ef05f6ad4ddf47c5f203837aa32c'),
(18, 'jean', 'aaaaaaabbbbbb', 'email', '0b9c2625dc21ef05f6ad4ddf47c5f203837aa32c'),
(19, 'imie', 'imie', 'imie', '043df858e9bcfa679a13828ae1f1171fe2c08868'),
(20, 'admin', 'admin', 'admin@admin.com', '$2y$10$rkNXCruCMbf.hXHlrbbX5u0s4wOwOmA4Hptx.BlCYLO5O7Hu4YdNq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_article` (`id_categorie`),
  ADD KEY `article_utilisateur__fk` (`id_auteur`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_categorie__fk` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`),
  ADD CONSTRAINT `article_utilisateur__fk` FOREIGN KEY (`id_auteur`) REFERENCES `utilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
