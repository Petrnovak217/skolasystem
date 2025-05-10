-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Počítač: md420.wedos.net:3306
-- Vygenerováno: Sob 10. kvě 2025, 21:10
-- Verze serveru: 10.4.34-MariaDB-log
-- Verze PHP: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databáze: `d375198_skola`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `image_name` varchar(300) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=21 ;

--
-- Vypisuji data pro tabulku `image`
--

INSERT INTO `image` (`image_id`, `user_id`, `image_name`) VALUES
(6, 2, 'IMG-67eeddf42df454.93609616.png'),
(7, 2, 'IMG-67eeddf8c1b140.91465581.png'),
(17, 1, 'IMG-67f4d817b69d76.48564758.png'),
(19, 1, 'IMG-67f4d937ca6320.89550149.png');

-- --------------------------------------------------------

--
-- Struktura tabulky `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `second_name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `life` text NOT NULL,
  `college` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=16 ;

--
-- Vypisuji data pro tabulku `student`
--

INSERT INTO `student` (`id`, `first_name`, `second_name`, `age`, `life`, `college`) VALUES
(1, 'Petr', 'Novák', 555, 'test', 'Nebelvír'),
(2, 'Jan', 'Novák', 22, 'čte', 'Univerzita Karlova'),
(3, 'Petra', 'Svobodová', 20, 'chodí', 'Masarykova univerzita'),
(5, 'Klára', 'Horáková', 23, 'alive', 'VUT Brno'),
(8, 'Martin', 'Procházka', 21, 'alive', 'Mendelova univerzita'),
(10, 'Lukáš', 'Kučera', 28, 'alive', 'Ostravská univerzita'),
(12, 'Petr', 'Novák', 66, ' je to borec', 'neznámá'),
(15, 'Petr', 'Stránský', 66, '  testuju systém', 'Nebelvír');

-- --------------------------------------------------------

--
-- Struktura tabulky `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `second_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci AUTO_INCREMENT=6 ;

--
-- Vypisuji data pro tabulku `user`
--

INSERT INTO `user` (`id`, `first_name`, `second_name`, `email`, `password`, `role`) VALUES
(1, 'Petr', 'Novák', 'p@gmail.com', '$2y$10$x8LNgfNS/MSUt7rzT4LK0OStjM8C5ParKkM.25Tylq89Ch34hRlB.', 'admin'),
(2, 'Petr', 'test', 'p@gmail', '$2y$10$sVDL51S/KDwcQmAEUcLu3u8f0hUGY6eMboge3Jzz40KWRAClBrZTi', 'user'),
(4, 'Petr', 'Novák', 'petruj@gmail.com', '$2y$10$G.JF0873LMOixLgLjqanyecevf0HV/hcn9ws2YH94Xv3nOwPq/zYi', 'user'),
(5, 'test', 'test', 't@gmail.com', '$2y$10$7aXmbcOs7s8f.Z2HrlmkVe5cMMBvK/0l/h2CryF20NzpIub2Vitc.', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
