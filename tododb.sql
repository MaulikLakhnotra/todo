-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2021 at 02:17 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tododb`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL,
  `time1` time NOT NULL,
  `time2` time NOT NULL,
  `priority` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `userid`, `title`, `note`, `date`, `time1`, `time2`, `priority`) VALUES
(1, 23, 'BOOK TICKET', 'BOOK MOVIE TICKET', '2020-11-30', '22:58:00', '23:59:00', 1),
(3, 23, 'asd', 'dasasd', '2021-09-03', '00:00:00', '00:00:00', 1),
(4, 23, 'test event', 'dasdasd', '2021-09-03', '17:16:00', '17:16:00', 1),
(5, 23, 'test event1', 'asdads', '2021-09-03', '00:00:00', '00:00:00', 2),
(6, 23, 'test event2', 'asdad', '2021-09-03', '00:00:00', '00:00:00', 3),
(7, 23, 'test event3', 'asd', '2021-09-04', '00:00:00', '00:00:00', 1),
(8, 24, 'go to home', 'get lost', '2021-09-03', '18:30:00', '18:35:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(21, 'MIHIR GOHEL', 'gohelmihir@gmail.com', '25603f465e5f1bb27633c288ed479d0f'),
(22, 'MIHIR GOHEL', 'gohelmihir@gmail.com', '8a73a59a8e9f2f6048624e4dd5149cf7'),
(23, 'OMKAR OZA', 'omkar@oza.com', '68115705108ddd6f7ba9a458bb175363'),
(24, 'mihir', 'mihir@mihir.com', '25603f465e5f1bb27633c288ed479d0f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
