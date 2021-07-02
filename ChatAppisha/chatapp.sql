-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 13, 2021 at 05:42 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `msg_id` int(10) NOT NULL AUTO_INCREMENT,
  `incoming_msg_id` int(100) NOT NULL,
  `outgoing_msg_id` int(100) NOT NULL,
  `msg` varchar(500) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(14, 1272768897, 240605996, 'hii..'),
(15, 240605996, 1272768897, 'hlo'),
(16, 240605996, 1174839025, 'hiiii'),
(17, 1352176495, 1174839025, 'hii'),
(18, 1174839025, 1352176495, 'hlo'),
(19, 1352176495, 522794316, 'hiiiii'),
(20, 522794316, 1352176495, 'hlo'),
(21, 1174839025, 1352176495, 'heyy'),
(22, 1352176495, 1174839025, 'hii'),
(23, 1352176495, 1174839025, 'hiii'),
(24, 1174839025, 1352176495, 'heyyy'),
(25, 1174839025, 1352176495, '......'),
(26, 1352176495, 1174839025, 'zzzz'),
(27, 1352176495, 1174839025, 'sd'),
(28, 1352176495, 1174839025, 'fdsfsd'),
(29, 1352176495, 1174839025, 'sfsdf'),
(30, 1352176495, 1174839025, 'sf'),
(31, 1352176495, 1174839025, 'sd'),
(32, 1352176495, 1174839025, 'sdf'),
(33, 1352176495, 1174839025, 'df'),
(34, 1352176495, 659264631, 'hii');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(10) NOT NULL AUTO_INCREMENT,
  `img` varchar(500) NOT NULL,
  `caption` varchar(500) NOT NULL,
  `user_id` int(100) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `img`, `caption`, `user_id`) VALUES
(3, '1621931772wp2724278.jpg', 'good', 1352176495),
(5, '1621936058Picture1.jpg', 'hello', 1352176495),
(7, '1622027239WIN_20201001_15_09_14_Pro.jpg', 'Chasly ,.........Love .....', 1272768897),
(8, '1622027322Screenshot (8).png', 'Screenshot', 1174839025);

-- --------------------------------------------------------

--
-- Table structure for table `thoughts`
--

DROP TABLE IF EXISTS `thoughts`;
CREATE TABLE IF NOT EXISTS `thoughts` (
  `thought_id` int(10) NOT NULL AUTO_INCREMENT,
  `thought` varchar(500) NOT NULL,
  `user_id` int(100) NOT NULL,
  PRIMARY KEY (`thought_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `thoughts`
--

INSERT INTO `thoughts` (`thought_id`, `thought`, `user_id`) VALUES
(1, 'fdfgdg', 1174839025),
(2, 'fdfgdg', 1174839025),
(3, 'hiii  i ndjjnf jhdbfhj', 659264631),
(4, 'hiii nce day ahead', 1352176495);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `unique_id` int(100) NOT NULL,
  `fname` varchar(280) NOT NULL,
  `lname` varchar(280) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(100) NOT NULL,
  `about` varchar(500) NOT NULL,
  `img` varchar(500) NOT NULL,
  `status` varchar(70) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `address`, `city`, `about`, `img`, `status`) VALUES
(12, 1272768897, 'vansh', 'Gupta', 'v@gmail.com', '2323', 'Indra nagar', 'Merut', 'I am calm and cool', '1621590560ishagupta.jpeg', 'Offline now'),
(13, 240605996, 'Isha', 'Gupta', 'isha@gmail.com', '1234', 'Madhavpuram', 'Meerut', 'Hii kjk jjshjd,m ', '1621590891lord-shiva-angry-images-hd.jpg', 'Offline now'),
(14, 1174839025, 'tripti12', 'Gupta', 't@gmail.com', '1234', 'india', 'gaziabad', 'simplicity is the key of happiness', '1621593518neha.jpg', 'Offline now'),
(15, 1352176495, 'Isha', 'Gupta', 'i@gmail.com', '1212', 'badjk', 'meeurt', 'love is chalsy', '1621594577ishagupta.jpeg', 'Offline now'),
(16, 522794316, 'sushil', 'sinha', 'sushil@gmail.com', 'sushil', 'uegugnmd', 'noida', 'life is chalsy', '1621595178g6.jpg', 'Offline now'),
(17, 659264631, 'Agam', 'Gupta', 'agam@gmail.com', 'agam', 'hjdgsg ', 'noida', 'soooo cute she is ', '1621838848radha.jpg', 'Active now'),
(18, 1536901973, 'Ishu', 'Gupta', 'ishu@gmail.com', 'ishu', 'aiU', 'meerut', 'love to kiss chalsy', '162209232019866646_1350830041698613_1253586855_n.jpg', 'Active now');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `video_id` int(100) NOT NULL AUTO_INCREMENT,
  `video` varchar(500) NOT NULL,
  `user_id` int(200) NOT NULL,
  `caption` varchar(500) NOT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`video_id`, `video`, `user_id`, `caption`) VALUES
(3, '1622030513fhhbfjf.webm', 659264631, 'People may understand animals emotions i shows the humaninity.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
