-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2019 at 08:46 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testImport`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userId` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dateJoined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `selfIntro` longtext NOT NULL,
  `workExperience` longtext NOT NULL,
  `education` longtext NOT NULL,
  `contactNumber` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `otherHobbies` longtext NOT NULL,
  `country` varchar(255) NOT NULL,
  `greeting` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userId`, `username`, `firstname`, `surname`, `email`, `dateJoined`, `selfIntro`, `workExperience`, `education`, `contactNumber`, `dob`, `otherHobbies`, `country`, `greeting`) VALUES
(8, 0, 'testUser01', 'Potato', 'Salad', 'potatoSalad001@contadel.co.uk', '2019-04-06 18:27:21', 'Hello this is test user 001', 'a:2:{i:0;a:5:{i:0;s:5:\"Job 1\";i:1;s:7:\"Place 1\";i:2;s:10:\"2019-04-06\";i:3;s:10:\"2019-04-06\";i:4;s:17:\"Job 1 description\";}i:1;a:5:{i:0;s:5:\"Job 2\";i:1;s:7:\"Place 2\";i:2;s:10:\"2019-04-06\";i:3;s:10:\"2019-04-06\";i:4;s:17:\"Job 2 description\";}}', 'a:2:{i:0;a:5:{i:0;s:11:\"Education 1\";i:1;s:7:\"Place 1\";i:2;s:10:\"2019-04-06\";i:3;s:10:\"2019-04-06\";i:4;s:23:\"Education 1 description\";}i:1;a:5:{i:0;s:11:\"Education 2\";i:1;s:7:\"Place 2\";i:2;s:10:\"2019-04-06\";i:3;s:10:\"2019-04-06\";i:4;s:23:\"Education 2 description\";}}', '123456789', '2019-04-06', 'Hobbies and stuff', 'UK', 'Hello world');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
