-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time:  7 юли 2020 в 14:50
-- Версия на сървъра: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni_club`
--

-- --------------------------------------------------------

--
-- Структура на таблица `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created` datetime NOT NULL,
  `visibility` tinyint(4) NOT NULL,
  `title` varchar(40) NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `message`, `created`, `visibility`, `title`) VALUES
(1, 1, 'naskdfpasdflasdfasdffasdfa', '2020-07-06 20:19:48', 0, 'title1'),
(2, 1, '2ri post', '2020-07-15 22:33:30', 0, 'titel2'),
(3, 1, 'a', '0000-00-00 00:00:00', 0, 'adsas'),
(4, 1, 'a', '0000-00-00 00:00:00', 0, 'adsas'),
(5, 1, 'dasdas', '0000-00-00 00:00:00', 0, 'adsas'),
(6, 1, 'adfasdfasdfasdfasd', '2020-07-07 12:40:20', 0, 'TTTTT'),
(7, 1, 'dadas', '2020-07-07 00:40:57', 0, 'TTTTTasdasd'),
(8, 1, '', '2020-07-07 00:41:47', 0, 'dasd');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `speciality` varchar(50) NOT NULL,
  `uni_group` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `graduation` year(4) DEFAULT 1970,
  `password` varchar(25) NOT NULL,
  `location` point DEFAULT NULL,
  `visibility` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `type`, `speciality`, `uni_group`, `email`, `graduation`, `password`, `location`, `visibility`) VALUES
(1, 'mitakashi', 'Di', 'Naydenov', 'student', 'Software Engineering', 4, 'mitko@gmail.com', 2020, '', 0x000000000101000000e63bf889035245409a982ec4ea573740, 3),
(2, 'akyoseva', 'Antonina', 'Kyoseva', 'student', 'Software Engineering', 4, 'akyoseva@abv.bg', 2021, 'ani1234', NULL, 2),
(3, 'kasenova', 'Kristina ', 'Asenova', 'student', 'Software Engineering', 4, 'kasenova@abv.bg', 2021, 'krisi1234', NULL, 1),
(7, 'adasd', 'някой ', 'непознат', 'не се знае', 'нещо си ', 123, '', 1970, '123', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_uk` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
