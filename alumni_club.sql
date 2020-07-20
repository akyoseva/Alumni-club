-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 20 юли 2020 в 20:35
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
-- Структура на таблица `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` varchar(2000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `creation_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `comments`
--

INSERT INTO `comments` (`id`, `text`, `user_id`, `post_id`, `creation_time`) VALUES
(1, '21.10.2020', 3, 2, '20:42:26'),
(2, '09.10.2020', 1, 2, '20:48:26'),
(3, 'Okey.', 8, 3, '21:33:13');

-- --------------------------------------------------------

--
-- Структура на таблица `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `visibility` int(11) NOT NULL,
  `creation_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `description`, `visibility`, `creation_time`) VALUES
(1, 1, 'How to use Alumni-club', '5 easy steps..', 0, '18:12:45'),
(2, 2, 'Alumni meeting', 'When to hold the meeting?', 0, '18:16:15'),
(3, 3, 'Some post..', 'Some text..', 1, '18:19:51'),
(4, 12, 'Wellcome to Alumni club', '..', 0, '20:41:30');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `specialty` varchar(45) NOT NULL,
  `graduation` year(4) NOT NULL,
  `password` varchar(45) NOT NULL,
  `visibility` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `uni_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `specialty`, `graduation`, `password`, `visibility`, `email`, `uni_group`) VALUES
(1, 'akyoseva', 'Antonina', 'Kyoseva', 'Software engineering', 2021, 'Ani12345$', '0', 'ani@abv.bg', 4),
(2, 'dnaydenov', 'Dimitar', 'Naydenov', 'Software engineering', 2021, 'Mitko12345$', '1', 'mitko@abv.bg', 4),
(3, 'kasenova', 'Kristina ', 'Asenova', 'Software engineering', 2021, 'Krisi12345$', '2', 'krisi@abv.bg', 3),
(4, 'kstoimenova', 'Katrin', 'Stoimenova', 'Software engineering', 2021, 'Kate12345$', '3', 'katrin@abv.bg', 5),
(5, 'mvardzhieva', 'Maria', 'Vardzhieva', 'Software engineering', 2021, 'Mime12345$', '0', 'maria@abv.bg', 5),
(6, 'sbenderova', 'Sara', 'Benderova', 'Informatics', 2023, 'Sara12345$', '0', 'sara@abv.bg', 1),
(7, 'aandreev', 'Andrey', 'Andreev', 'Computer science', 2022, 'Andi12345$', '1', 'andrey@abv.bg', 7),
(8, 'ypetkov', 'Yavor', 'Petkov', 'Computer science', 2021, 'Yavor12345$', '3', 'yavor@abv.bg', 2),
(9, 'tstoyanov', 'Toni', 'Stoyanov', 'Informatics', 2023, 'Toni12345$', '0', 'toni@abv.bg', 1),
(10, 'vseldarov', 'Vladimir', 'Seldarov', 'Mathematics', 2021, 'Vladi12345$', '2', 'vladi@abv.bg', 3),
(11, 'mpavlov', 'Martin ', 'Pavlov', 'Mathemics', 2022, 'Marto12345$', '0', 'marto@abv.bg', 4),
(12, 'istoyanov', 'Ivaylo', 'Stoyanov', 'Computer science', 2023, 'Ivo12345$', '1', 'ivo@abv.bg', 2),
(13, 'sdimitriv', 'Stoyan', 'Dimitrov', 'Software engineering', 2020, 'Stoyan12345$', '0', 'stoyan@abv.bg', 6),
(14, 'vmateev', 'Veselin', 'Mateev', 'Informatics', 2021, 'Veso12345$', '3', 'veso@abv.bg', 1),
(15, 'ipetrov', 'Ivan', 'Petrov', 'Computer science', 2020, 'Ivan12345$', '2', 'ivan@abv.bg', 7),
(16, 'imustafa', 'Ilknur', 'Mustafa', 'Software engineering', 2021, 'Ilknur12345$', '1', 'ilknur@abv.bg', 3),
(17, 'nyancheva', 'Nataliya', 'Yancheva', 'Software engineering', 2021, 'Nati12345$', '0', 'nataliya@abv.bg', 5),
(18, 'adragnev', 'Aleksandur', 'Dragnev', 'Mathematics', 2023, 'Sasho12345$', '0', 'sasho@abv.bg', 1),
(19, 'ahadzhieva', 'Alya', 'Hadzhieva', 'Mathematics', 2020, 'Alya12345$', '0', 'alya@abv.bg', 8),
(20, 'ydimitrov', 'Yana', 'Dimitrova', 'Informatics', 2023, 'Yana12345$', '0', 'yana@abv.bg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_fk_users_idx` (`user_id`),
  ADD KEY `comments_fk_posts_idx` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_fk_users_idx` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_fk_posts` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `comments_fk_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения за таблица `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_fk_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

CREATE TABLE `visibility` (
  `user_id` int(11) NOT NULL,
  `username` int(11) NOT NULL,
  `first_name` int(11) NOT NULL,
  `last_name` int(11) NOT NULL,
  `specialty` int(11) NOT NULL,
  `graduation` int(11) NOT NULL,
  `email` int(11) DEFAULT NULL,
  `uni_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `visibility`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `visibility`
  ADD KEY `visibility_fk_users_idx` (`user_id`);

ALTER TABLE `visibility`
  ADD CONSTRAINT `visibility_fk_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
