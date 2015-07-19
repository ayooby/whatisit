-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2015 at 12:44 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `whatisit`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
`id` int(11) NOT NULL,
  `info` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `audio` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `title` varchar(150) COLLATE utf8_persian_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `info`, `audio`, `created_at`, `updated_at`, `title`, `user_id`) VALUES
(1, 'just want to test for english', '1436361218-IronMan.mp3', '2015-07-08', '2015-07-08', 'مرد آهنی', 0),
(2, 'چند دقیقه در مورد آهنگ حقیقت زشت بشونویم', '1436444087-The Ugly Truth 2.MP3', '2015-07-09', '2015-07-09', 'حقیقت زشت', 0),
(3, 'من موندم دراین مورد که چیکارکنم', '1436694843-12_ Dangerous And Moving.mp3', '2015-07-12', '2015-07-12', 'آهنگ قدیمی گروه تتو', 0),
(4, 'یه جیزی همین طوری دور همی رووو شیم اوستا', '1436886577-02_ All About Us.mp3', '2015-07-14', '2015-07-14', 'در یک راستا ', 2),
(5, 'تتو اون زمان با کیفیت تخمی', '1436886732-08_ Sacrifice.mp3', '2015-07-14', '2015-07-14', 'آهنگی زیبا از گروه خاک گرفته ت', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(11) NOT NULL,
  `categories_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories_title`, `created_at`, `updated_at`) VALUES
(1, 'Computer', '2015-05-12', '2015-05-12'),
(2, 'LifeStyle', '2015-05-12', '2015-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `answer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin`, `username`, `password`, `email`, `remember_token`, `created_at`, `updated_at`, `answer_id`) VALUES
(1, 0, 'sajad', '$2y$10$Jp90fpf3cTq1t2Kq/8fXuuocRWFx/j6jnALhE.44pFsFbIngsHSXa', 'sajad.hi@gmail.com', '', '2015-07-14', '2015-07-14', 0),
(2, 0, 'sajad666', '$2y$10$hxILtEYFa5wUHKZz0WWOneCTksWAKMqqKKQVKfzMhxQ5XyEQdq0dK', 'sajad666666@yahoo.com', '', '2015-07-14', '2015-07-14', 0),
(3, 1, 'admin', '$2y$10$ogAtbtrrj6HxsCI8UvvIRu333iqzUQ6mQEch0QhXCWAbrNNvyiiTq', 'admin@admin.com', '', '2015-07-15', '2015-07-15', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
