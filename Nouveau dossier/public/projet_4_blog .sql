-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 26, 2020 at 09:20 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet_4_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment_date` datetime NOT NULL,
  `comment` text NOT NULL,
  `flag` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment_date`, `comment`, `flag`) VALUES
(46, 1, 'vvv', '2020-08-19 12:15:11', 'qsdqsdqsd', 0),
(47, 1, 'dqsdqsd', '2020-08-19 12:15:15', 'dqsdqsdqsd', 0),
(48, 1, 'vvv', '2020-08-19 12:15:21', 'dqdqsdqsd', 1),
(49, 1, 'dqdqd', '2020-08-19 12:15:26', 'dqsdqsd', 0),
(50, 1, 'qsdqsd', '2020-08-19 12:43:42', 'qdqdqsd', 0),
(22, 47, 'eee', '2020-08-03 14:30:59', 'eee', 0),
(23, 48, 'eeeeeeeeeeeeee', '2020-08-03 14:47:53', 'eeeeeeeeeeeee', 0),
(24, 49, 'dsqd', '2020-08-03 14:57:42', 'dddddddd', 0),
(51, 1, 'azeaze', '2020-08-19 14:33:30', 'azeazeaze', 0),
(53, 1, 'qsdqsd', '2020-08-19 14:36:49', 'qsdqsdq', 1),
(54, 1, 'sqdqsdqsdqsdqsdsdddddd', '2020-08-19 14:36:57', 'sssssssssssssssssssssssssssssssssssssss', 1),
(55, 1, 'qsdqsdqs', '2020-08-19 14:37:05', 'qddddddddddddddddddddddddddddddddddddd', 0),
(56, 1, 'dd', '2020-08-19 19:21:06', 'dddd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `author`, `content`, `creation_date`) VALUES
(1, 'Bienvenue sur mon blog !', 'YoannV', 'Je vous souhaite toutes et tous la bienvenue sur mon blog qui parlera de... PHP bien!', '2020-08-11 12:40:07'),
(2, 'Le PHP à la conquête du monde !', 'YoannV', 'C\'est officiel, l\'éléPHPant a annoncé à la radio hier soir \"J\'ai l\'intention de conquérir le monde !\".\r\nIl a en outre précisé que le monde serait à sa botte en moins de temps qu\'il n\'en fallait pour dire \"éléPHPant\". Pas dur, ceci dit', '2020-08-11 12:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` char(60) NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `creation_date`) VALUES
(1, 'admin', '$2y$10$32xCWjXZkb3yC.G/nhuugOa0Vcj2rJGqYXfvipX1KXrHVgQqi0POe', '2020-07-30 13:58:58');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
