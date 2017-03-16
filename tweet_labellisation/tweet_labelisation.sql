-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 16, 2017 at 04:08 PM
-- Server version: 5.6.33
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tweet_labelisation`
--

-- --------------------------------------------------------

--
-- Table structure for table `tweet`
--

CREATE TABLE `tweet` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `count_label1` int(11) NOT NULL DEFAULT '0',
  `count_label2` int(11) NOT NULL DEFAULT '0',
  `count_label3` int(11) NOT NULL DEFAULT '0',
  `id_tweet` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tweet`
--

INSERT INTO `tweet` (`id`, `text`, `count_label1`, `count_label2`, `count_label3`, `id_tweet`) VALUES
(1, 'If you could only pick ONE song to play to someone who had never heard a Michael Jackson song, which one would you choose @All?', 3, 1, 0, NULL),
(2, 'out in the sunshine working with the magic @rahki and everything is so colourful and nice ???', 1, 2, 0, NULL),
(5, 'Déjà la dernière Descente de la saison demain 16h30 heure française, sur cette belle piste d\'Aspen (USA)@Exemple.\n#novodis #aspen ', 0, 0, 0, NULL),
(6, 'ENERGY is fascinating @ISS_Research with many steps–it\'s not easy to measure exactly how much energy you consume & spend in a week! #science', 1, 1, 1, NULL),
(7, 'Sur l’#ISS nos calories consommées/dépensées sont passées à la loupe avec l’expérience ENERGY, notamment en examinant notre respiration @exemple', 0, 1, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tweet`
--
ALTER TABLE `tweet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tweet`
--
ALTER TABLE `tweet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;